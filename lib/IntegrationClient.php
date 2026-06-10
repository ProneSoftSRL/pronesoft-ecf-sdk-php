<?php

declare(strict_types=1);

namespace PronesoftEcf;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use PronesoftEcf\Api\AssociatedCompaniesApi;
use PronesoftEcf\Api\AuthenticationApi;
use PronesoftEcf\Api\AutomatedCertificationApi;
use PronesoftEcf\Api\CommercialApprovalsApi;
use PronesoftEcf\Api\DigitalCertificatesApi;
use PronesoftEcf\Api\DocumentsReceivedApi;
use PronesoftEcf\Api\DocumentsSentApi;
use PronesoftEcf\Api\ECFSubmissionApi;
use PronesoftEcf\Api\ReportsApi;
use PronesoftEcf\Api\TaxSequencesApi;
use PronesoftEcf\Api\WebhookConfigurationApi;
use PronesoftEcf\Model\OAuthTokenRequest;

class IntegrationClient
{
    public AssociatedCompaniesApi $associatedCompanies;
    public AuthenticationApi $authentication;
    public AutomatedCertificationApi $automatedCertification;
    public CommercialApprovalsApi $commercialApprovals;
    public DigitalCertificatesApi $digitalCertificates;
    public DocumentsReceivedApi $documentsReceived;
    public DocumentsSentApi $documentsSent;
    public ECFSubmissionApi $ecfSubmission;
    public ReportsApi $reports;
    public TaxSequencesApi $taxSequences;
    public WebhookConfigurationApi $webhooks;

    private AuthenticationApi $authApi;
    private string $clientId;
    private string $clientSecret;
    private string $normalizedBaseUrl;
    private int $refreshSkewSeconds;

    private ?string $accessToken = null;
    private int $expiresAtEpoch = 0;

    public function __construct(
        string $baseUrl,
        string $clientId,
        string $clientSecret,
        int $refreshSkewSeconds = 300
    ) {
        $normalizedBaseUrl = rtrim($baseUrl, '/');
        if ($normalizedBaseUrl === '') {
            throw new \InvalidArgumentException('baseUrl is required');
        }
        if (trim($clientId) === '') {
            throw new \InvalidArgumentException('clientId is required');
        }
        if (trim($clientSecret) === '') {
            throw new \InvalidArgumentException('clientSecret is required');
        }

        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->normalizedBaseUrl = $normalizedBaseUrl;
        $this->refreshSkewSeconds = $refreshSkewSeconds > 0 ? $refreshSkewSeconds : 300;

        $authConfig = new Configuration();
        $authConfig->setHost($normalizedBaseUrl);
        $this->authApi = new AuthenticationApi(new Client(), $authConfig);

        $stack = HandlerStack::create();
        $stack->push(Middleware::mapRequest(function (RequestInterface $request): RequestInterface {
            $path = $request->getUri()->getPath();
            if (str_ends_with($path, '/oauth/token')) {
                return $request;
            }

            $token = $this->getValidToken(false);
            return $request->withHeader('Authorization', 'Bearer ' . $token);
        }));

        $stack->push(Middleware::retry(
            function (
                int $retries,
                RequestInterface $request,
                ?ResponseInterface $response = null,
                ?\Exception $exception = null
            ): bool {
                if ($retries >= 1) {
                    return false;
                }
                if (str_ends_with($request->getUri()->getPath(), '/oauth/token')) {
                    return false;
                }
                if ($response === null || $response->getStatusCode() !== 401) {
                    return false;
                }

                $this->getValidToken(true);
                return true;
            },
            fn (): int => 0
        ));

        $apiClient = new Client(['handler' => $stack]);
        $sdkConfig = new Configuration();
        $sdkConfig->setHost($normalizedBaseUrl);

        $this->associatedCompanies = new AssociatedCompaniesApi($apiClient, $sdkConfig);
        $this->authentication = new AuthenticationApi($apiClient, $sdkConfig);
        $this->automatedCertification = new AutomatedCertificationApi($apiClient, $sdkConfig);
        $this->commercialApprovals = new CommercialApprovalsApi($apiClient, $sdkConfig);
        $this->digitalCertificates = new DigitalCertificatesApi($apiClient, $sdkConfig);
        $this->documentsReceived = new DocumentsReceivedApi($apiClient, $sdkConfig);
        $this->documentsSent = new DocumentsSentApi($apiClient, $sdkConfig);
        $this->ecfSubmission = new ECFSubmissionApi($apiClient, $sdkConfig);
        $this->reports = new ReportsApi($apiClient, $sdkConfig);
        $this->taxSequences = new TaxSequencesApi($apiClient, $sdkConfig);
        $this->webhooks = new WebhookConfigurationApi($apiClient, $sdkConfig);
    }

    public function forTenant(string $tenantId): TenantScopedClient
    {
        $tenantId = trim($tenantId);
        if ($tenantId === '') {
            throw new \InvalidArgumentException('tenantId is required');
        }
        $tokenProvider = fn(bool $forceRefresh): string => $this->getValidToken($forceRefresh);
        return new TenantScopedClient($this->normalizedBaseUrl, $tenantId, $tokenProvider);
    }

    public function startSession(?string $initialTenantId = null): TenantSessionClient
    {
        return new TenantSessionClient($this, $initialTenantId);
    }

    private function getValidToken(bool $forceRefresh): string
    {
        $now = time();
        if (!$forceRefresh && $this->accessToken !== null && $now < ($this->expiresAtEpoch - $this->refreshSkewSeconds)) {
            return $this->accessToken;
        }

        $tokenResponse = $this->authApi->getAccessToken(new OAuthTokenRequest([
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
        ]));

        $accessToken = $tokenResponse->getAccessToken();
        if ($accessToken === null || trim($accessToken) === '') {
            throw new \RuntimeException('OAuth token response did not include accessToken');
        }

        $expiresIn = $tokenResponse->getExpiresIn() ?? 86400;
        $this->accessToken = $accessToken;
        $this->expiresAtEpoch = $now + (int) $expiresIn;

        return $this->accessToken;
    }
}

class TenantScopedClient
{
    public AssociatedCompaniesApi $associatedCompanies;
    public AuthenticationApi $authentication;
    public AutomatedCertificationApi $automatedCertification;
    public CommercialApprovalsApi $commercialApprovals;
    public DigitalCertificatesApi $digitalCertificates;
    public DocumentsReceivedApi $documentsReceived;
    public DocumentsSentApi $documentsSent;
    public ECFSubmissionApi $ecfSubmission;
    public ReportsApi $reports;
    public TaxSequencesApi $taxSequences;
    public WebhookConfigurationApi $webhooks;

    public function __construct(string $normalizedBaseUrl, string $tenantId, callable $tokenProvider)
    {
        $stack = HandlerStack::create();
        $stack->push(Middleware::mapRequest(
            function (RequestInterface $request) use ($tenantId, $tokenProvider): RequestInterface {
                $path = $request->getUri()->getPath();
                if (str_ends_with($path, '/oauth/token')) {
                    return $request;
                }
                $token = $tokenProvider(false);
                return $request
                    ->withHeader('Authorization', 'Bearer ' . $token)
                    ->withHeader('x-tenant-id', $tenantId);
            }
        ));

        $stack->push(Middleware::retry(
            function (
                int $retries,
                RequestInterface $request,
                ?ResponseInterface $response = null,
                ?\Exception $exception = null
            ) use ($tokenProvider): bool {
                if ($retries >= 1) {
                    return false;
                }
                if (str_ends_with($request->getUri()->getPath(), '/oauth/token')) {
                    return false;
                }
                if ($response === null || $response->getStatusCode() !== 401) {
                    return false;
                }
                $tokenProvider(true);
                return true;
            },
            fn (): int => 0
        ));

        $apiClient = new Client(['handler' => $stack]);
        $config = new Configuration();
        $config->setHost($normalizedBaseUrl);

        $this->associatedCompanies = new AssociatedCompaniesApi($apiClient, $config);
        $this->authentication = new AuthenticationApi($apiClient, $config);
        $this->automatedCertification = new AutomatedCertificationApi($apiClient, $config);
        $this->commercialApprovals = new CommercialApprovalsApi($apiClient, $config);
        $this->digitalCertificates = new DigitalCertificatesApi($apiClient, $config);
        $this->documentsReceived = new DocumentsReceivedApi($apiClient, $config);
        $this->documentsSent = new DocumentsSentApi($apiClient, $config);
        $this->ecfSubmission = new ECFSubmissionApi($apiClient, $config);
        $this->reports = new ReportsApi($apiClient, $config);
        $this->taxSequences = new TaxSequencesApi($apiClient, $config);
        $this->webhooks = new WebhookConfigurationApi($apiClient, $config);
    }
}

class TenantSessionClient
{
    private IntegrationClient $integrationClient;
    private ?string $currentTenantId = null;

    public function __construct(IntegrationClient $integrationClient, ?string $initialTenantId = null)
    {
        $this->integrationClient = $integrationClient;
        if ($initialTenantId !== null) {
            $this->setCurrentTenant($initialTenantId);
        }
    }

    public function setCurrentTenant(string $tenantId): self
    {
        $tenantId = trim($tenantId);
        if ($tenantId === '') {
            throw new \InvalidArgumentException('tenantId is required');
        }
        $this->currentTenantId = $tenantId;
        return $this;
    }

    public function clearCurrentTenant(): self
    {
        $this->currentTenantId = null;
        return $this;
    }

    public function getCurrentTenantId(): ?string
    {
        return $this->currentTenantId;
    }

    public function getClient(): TenantScopedClient
    {
        if ($this->currentTenantId === null) {
            throw new \RuntimeException('Current tenant is not set');
        }
        return $this->integrationClient->forTenant($this->currentTenantId);
    }
}
