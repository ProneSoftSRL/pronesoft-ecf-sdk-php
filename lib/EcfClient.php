<?php

declare(strict_types=1);

namespace PronesoftEcfSdk;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use PronesoftEcfSdk\Api\AssociatedCompaniesApi;
use PronesoftEcfSdk\Api\AuthenticationApi;
use PronesoftEcfSdk\Api\AutomatedCertificationApi;
use PronesoftEcfSdk\Api\CommercialApprovalsApi;
use PronesoftEcfSdk\Api\DigitalCertificatesApi;
use PronesoftEcfSdk\Api\DocumentsReceivedApi;
use PronesoftEcfSdk\Api\DocumentsSentApi;
use PronesoftEcfSdk\Api\ECFSubmissionApi;
use PronesoftEcfSdk\Api\ReportsApi;
use PronesoftEcfSdk\Api\TaxSequencesApi;
use PronesoftEcfSdk\Api\WebhookConfigurationApi;
use PronesoftEcfSdk\Model\OAuthTokenRequest;

/**
 * Clase EcfClient
 *
 * Actúa como punto de entrada único para interactuar con la API de eCF de Pronesoft.
 * Encapsula la autenticación automática (OAuth 2.0 Client Credentials), la gestión del token,
 * su renovación transparente antes de expirar y la delegación opcional multi-empresa (x-tenant-id).
 */
class EcfClient
{
    private string $host;
    private string $clientId;
    private string $clientSecret;
    private ?string $accessToken = null;
    private int $expiresAt = 0;
    private int $refreshSkewSeconds;
    private ?string $tenantId = null;

    private Configuration $config;
    private ClientInterface $httpClient;
    private AuthenticationApi $authApi;

    // Servicios de negocio del SDK
    private AssociatedCompaniesApi $associatedCompanies;
    private AuthenticationApi $authentication;
    private AutomatedCertificationApi $automatedCertification;
    private CommercialApprovalsApi $commercialApprovals;
    private DigitalCertificatesApi $digitalCertificates;
    private DocumentsReceivedApi $documentsReceived;
    private DocumentsSentApi $documentsSent;
    private ECFSubmissionApi $ecfSubmission;
    private ReportsApi $reports;
    private TaxSequencesApi $taxSequences;
    private WebhookConfigurationApi $webhookConfiguration;

    /**
     * Constructor de EcfClient.
     *
     * @param string $host URL base del API de eCF (ej. https://api.ecf.sandbox.pronesoft.com/api/v1).
     * @param string $clientId ID de cliente de la empresa (mapeado como client_id).
     * @param string $clientSecret Secreto de cliente de la empresa.
     * @param string|null $tenantId ID de la empresa/sucursal activa (inyecta x-tenant-id si no es nulo).
     * @param int $refreshSkewSeconds Margen de seguridad en segundos antes de expirar para renovar el token (por defecto 300s).
     *
     * @throws \InvalidArgumentException Si faltan parámetros obligatorios.
     */
    public function __construct(
        string $host,
        string $clientId,
        string $clientSecret,
        ?string $tenantId = null,
        int $refreshSkewSeconds = 300
    ) {
        $this->host = rtrim($host, '/');
        $this->clientId = trim($clientId);
        $this->clientSecret = trim($clientSecret);
        $this->tenantId = $tenantId !== null ? trim($tenantId) : null;
        $this->refreshSkewSeconds = $refreshSkewSeconds > 0 ? $refreshSkewSeconds : 300;

        if (empty($this->host)) {
            throw new \InvalidArgumentException('El host (base URL) es obligatorio.');
        }
        if (empty($this->clientId)) {
            throw new \InvalidArgumentException('El clientId es obligatorio.');
        }
        if (empty($this->clientSecret)) {
            throw new \InvalidArgumentException('El clientSecret es obligatorio.');
        }

        // Configuración interna nativa del SDK
        $this->config = new Configuration();
        $this->config->setHost($this->host);

        // Cliente exclusivo de autenticación (sin interceptores recursivos)
        $authConfig = new Configuration();
        $authConfig->setHost($this->host);
        $this->authApi = new AuthenticationApi(new Client(), $authConfig);

        // Autenticación síncrona inicial para garantizar token disponible
        $this->getValidToken(false);

        // Inicializar cliente HTTP de Guzzle con middlewares de autenticación y reintento
        $this->initializeHttpClient();

        // Inicializar todas las instancias de los servicios del SDK
        $this->initializeApis();
    }

    /**
     * Clonación profunda para evitar compartir referencias mutables.
     */
    public function __clone()
    {
        $this->config = clone $this->config;
    }

    /**
     * Retorna una copia del cliente configurada para actuar en nombre de una empresa asociada (sucursal).
     * Inyectará la cabecera 'x-tenant-id' en cada petición.
     *
     * @param string|null $tenantId UUID de la empresa asociada (sucursal), o null para volver a la empresa principal.
     * @return self
     */
    public function forTenant(?string $tenantId): self
    {
        $clone = clone $this;
        $clone->tenantId = $tenantId !== null ? trim($tenantId) : null;
        
        // Re-inicializar el cliente HTTP para que las clausuras de los middlewares
        // se vinculen a la nueva instancia clonada y lean su $tenantId.
        $clone->initializeHttpClient();
        $clone->initializeApis();
        
        return $clone;
    }

    /**
     * Obtiene el token de acceso actual o solicita uno nuevo si ha expirado.
     *
     * @param bool $forceRefresh Indica si se debe forzar la solicitud de un nuevo token.
     * @return string Token de acceso válido.
     *
     * @throws \RuntimeException Si la autenticación falla o no devuelve un token válido.
     */
    private function getValidToken(bool $forceRefresh = false): string
    {
        $now = time();
        if (!$forceRefresh && $this->accessToken !== null && $now < ($this->expiresAt - $this->refreshSkewSeconds)) {
            return $this->accessToken;
        }

        try {
            $tokenRequest = new OAuthTokenRequest([
                'client_id' => $this->clientId,
                'client_secret' => $this->clientSecret,
            ]);

            $tokenResponse = $this->authApi->getAccessToken($tokenRequest);
            $accessToken = $tokenResponse->getAccessToken();

            if (empty($accessToken)) {
                throw new \RuntimeException('La respuesta del servidor no contiene un "access_token" válido.');
            }

            $expiresIn = $tokenResponse->getExpiresIn() ?? 86400;

            $this->accessToken = $accessToken;
            $this->expiresAt = $now + $expiresIn;

            // Mantener actualizada la configuración interna por consistencia
            $this->config->setAccessToken($this->accessToken);

            return $this->accessToken;
        } catch (\Exception $e) {
            throw new \RuntimeException('Fallo en la autenticación transparente contra eCF: ' . $e->getMessage(), (int)$e->getCode(), $e);
        }
    }

    /**
     * Configura el cliente HTTP de Guzzle y los middlewares de control de token.
     */
    private function initializeHttpClient(): void
    {
        $stack = HandlerStack::create();

        // Middleware 1: Reintentar ante código de error HTTP 401 (Token Expirado)
        $stack->push(Middleware::retry(
            function (
                int $retries,
                RequestInterface $request,
                ?ResponseInterface $response = null,
                ?\Exception $exception = null
            ): bool {
                // Limitar a un único intento de renovación y reintento
                if ($retries >= 1) {
                    return false;
                }

                $path = $request->getUri()->getPath();
                if (str_ends_with($path, '/oauth/token')) {
                    return false;
                }

                if ($response && $response->getStatusCode() === 401) {
                    try {
                        // Forzar refresco del token
                        $this->getValidToken(true);
                        return true;
                    } catch (\Exception $e) {
                        return false;
                    }
                }

                return false;
            },
            function (int $retries, ?ResponseInterface $response = null): int {
                return 0; // Reintentar de inmediato sin retraso
            }
        ));

        // Middleware 2: Inyección dinámica de cabeceras de autorización y delegación
        $stack->push(Middleware::mapRequest(function (RequestInterface $request): RequestInterface {
            $path = $request->getUri()->getPath();
            if (str_ends_with($path, '/oauth/token')) {
                return $request;
            }

            $token = $this->getValidToken(false);
            $request = $request->withHeader('Authorization', 'Bearer ' . $token);

            if ($this->tenantId !== null) {
                $request = $request->withHeader('x-tenant-id', $this->tenantId);
            }

            return $request;
        }));

        $this->httpClient = new Client(['handler' => $stack]);
    }

    /**
     * Inicializa los servicios del SDK con el cliente HTTP y configuración autenticados.
     */
    private function initializeApis(): void
    {
        $this->associatedCompanies = new AssociatedCompaniesApi($this->httpClient, $this->config);
        $this->authentication = new AuthenticationApi($this->httpClient, $this->config);
        $this->automatedCertification = new AutomatedCertificationApi($this->httpClient, $this->config);
        $this->commercialApprovals = new CommercialApprovalsApi($this->httpClient, $this->config);
        $this->digitalCertificates = new DigitalCertificatesApi($this->httpClient, $this->config);
        $this->documentsReceived = new DocumentsReceivedApi($this->httpClient, $this->config);
        $this->documentsSent = new DocumentsSentApi($this->httpClient, $this->config);
        $this->ecfSubmission = new ECFSubmissionApi($this->httpClient, $this->config);
        $this->reports = new ReportsApi($this->httpClient, $this->config);
        $this->taxSequences = new TaxSequencesApi($this->httpClient, $this->config);
        $this->webhookConfiguration = new WebhookConfigurationApi($this->httpClient, $this->config);
    }

    // ==========================================
    // Métodos de Acceso a Servicios (Inglés)
    // ==========================================

    /**
     * Obtiene el servicio de empresas asociadas.
     *
     * @return AssociatedCompaniesApi
     */
    public function associatedCompanies(): AssociatedCompaniesApi
    {
        return $this->associatedCompanies;
    }

    /**
     * Obtiene el servicio de autenticación.
     *
     * @return AuthenticationApi
     */
    public function authentication(): AuthenticationApi
    {
        return $this->authentication;
    }

    /**
     * Obtiene el servicio de certificación automática.
     *
     * @return AutomatedCertificationApi
     */
    public function automatedCertification(): AutomatedCertificationApi
    {
        return $this->automatedCertification;
    }

    /**
     * Obtiene el servicio de aprobaciones comerciales.
     *
     * @return CommercialApprovalsApi
     */
    public function commercialApprovals(): CommercialApprovalsApi
    {
        return $this->commercialApprovals;
    }

    /**
     * Obtiene el servicio de certificados digitales.
     *
     * @return DigitalCertificatesApi
     */
    public function digitalCertificates(): DigitalCertificatesApi
    {
        return $this->digitalCertificates;
    }

    /**
     * Obtiene el servicio de documentos recibidos.
     *
     * @return DocumentsReceivedApi
     */
    public function documentsReceived(): DocumentsReceivedApi
    {
        return $this->documentsReceived;
    }

    /**
     * Obtiene el servicio de documentos enviados.
     *
     * @return DocumentsSentApi
     */
    public function documentsSent(): DocumentsSentApi
    {
        return $this->documentsSent;
    }

    /**
     * Obtiene el servicio de envío de eCF.
     *
     * @return ECFSubmissionApi
     */
    public function ecfSubmission(): ECFSubmissionApi
    {
        return $this->ecfSubmission;
    }

    /**
     * Obtiene el servicio de reportes.
     *
     * @return ReportsApi
     */
    public function reports(): ReportsApi
    {
        return $this->reports;
    }

    /**
     * Obtiene el servicio de secuencias fiscales.
     *
     * @return TaxSequencesApi
     */
    public function taxSequences(): TaxSequencesApi
    {
        return $this->taxSequences;
    }

    /**
     * Obtiene el servicio de configuración de webhooks.
     *
     * @return WebhookConfigurationApi
     */
    public function webhookConfiguration(): WebhookConfigurationApi
    {
        return $this->webhookConfiguration;
    }
}
