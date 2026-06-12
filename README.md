# SDK de PHP para eCF-Pronesoft

## Descripción general
API de nivel productivo para emitir Comprobantes Fiscales Electrónicos (e-CF) en la República Dominicana a través de la plataforma Pronesoft.

Este SDK encapsula por completo el flujo de autenticación, renovación y reintento de tokens de seguridad mediante el wrapper principal `EcfClient`.

---

## Primeros Pasos (Getting Started)

La forma recomendada de interactuar con el SDK es a través del cliente unificado `EcfClient`. Este se encarga de realizar la autenticación inicial, refrescar el token antes de su vencimiento e inyectar las cabeceras requeridas de forma transparente.

```php
<?php
require_once __DIR__ . '/vendor/autoload.php';

use PronesoftEcfSdk\EcfClient;
use PronesoftEcfSdk\ApiException;

// 1. Configurar credenciales (ejemplo con Sandbox)
$host = 'https://api.ecf.sandbox.pronesoft.com/api/v1';
$clientId = 'SBX-TU-EMPRESA-UUID';
$clientSecret = 'tu-client-secret-aqui';
$tenantId = 'SBX-RNC-DE-LA-EMPRESA-ACTIVA'; // Opcional: ID de la empresa activa (inyecta x-tenant-id)

try {
    // 2. Inicializar el cliente único (se autentica automáticamente y establece el tenant de sesión)
    $client = new EcfClient($host, $clientId, $clientSecret, $tenantId);
    
    // 3. Consumir cualquier servicio de negocio directamente
    $documentsSentApi = $client->documentsSent();
    $logs = $documentsSentApi->getSentDocumentLogs('uuid-del-documento');
    
    print_r($logs);

} catch (ApiException $e) {
    echo "Error retornado por la API: " . $e->getResponseBody() . "\n";
} catch (\Exception $e) {
    echo "Error general: " . $e->getMessage() . "\n";
}
```

### Delegación multi-empresa (Sucursales)
Para actuar en nombre de una empresa asociada (sucursal), puedes usar el método `forTenant` para obtener una instancia del cliente configurada con la cabecera `x-tenant-id`:

```php
$sucursalClient = $client->forTenant('uuid-de-la-sucursal');
$logs = $sucursalClient->documentsSent()->getSentDocumentLogs('uuid-del-documento');
```

---

## Instalación y Uso

### Requisitos

PHP 8.1 y superior.

### Instalación vía Composer

Para instalar las dependencias en tu proyecto utilizando [Composer](https://getcomposer.org/), agrega lo siguiente a tu archivo `composer.json`:

```json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/ProneSoftSRL/pronesoft-ecf-sdk-php.git"
    }
  ],
  "require": {
    "pronesoft-rd/ecf-sdk-php": "dev-main"
  }
}
```

Luego ejecuta en tu terminal:

```bash
composer install
```

### Instalación Manual

Descarga los archivos del repositorio e incluye el cargador automático:

```php
<?php
require_once('/ruta/a/pronesoft-ecf-sdk-php/vendor/autoload.php');
```

## API Endpoints

All URIs are relative to *https://api.ecf.sandbox.pronesoft.com/api/v1*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*AssociatedCompaniesApi* | [**createAssociatedCompany**](docs/Api/AssociatedCompaniesApi.md#createassociatedcompany) | **POST** /associated-companies | Crear empresa asociada / sucursal
*AssociatedCompaniesApi* | [**deleteAssociatedCompany**](docs/Api/AssociatedCompaniesApi.md#deleteassociatedcompany) | **DELETE** /associated-companies/{companyId} | Eliminar empresa asociada
*AssociatedCompaniesApi* | [**getCompanyDocumentMetrics**](docs/Api/AssociatedCompaniesApi.md#getcompanydocumentmetrics) | **GET** /associated-companies/{companyId}/documents-metrics | Métricas de documentos de la empresa
*AssociatedCompaniesApi* | [**getCompanyMetrics**](docs/Api/AssociatedCompaniesApi.md#getcompanymetrics) | **GET** /associated-companies/{companyId}/metrics | Métricas de la empresa
*AssociatedCompaniesApi* | [**listAssociatedCompanies**](docs/Api/AssociatedCompaniesApi.md#listassociatedcompanies) | **GET** /associated-companies | Listar empresas asociadas / sucursales
*AssociatedCompaniesApi* | [**updateAssociatedCompany**](docs/Api/AssociatedCompaniesApi.md#updateassociatedcompany) | **PUT** /associated-companies/{companyId} | Actualizar empresa asociada
*AuthenticationApi* | [**getAccessToken**](docs/Api/AuthenticationApi.md#getaccesstoken) | **POST** /oauth/token | Obtener token de acceso (OAuth 2.0)
*AutomatedCertificationApi* | [**downloadCertification**](docs/Api/AutomatedCertificationApi.md#downloadcertification) | **GET** /dgii-ecf/automated-certification/{id}/download | Descargar ZIP de certificación
*AutomatedCertificationApi* | [**getCertificationStatus**](docs/Api/AutomatedCertificationApi.md#getcertificationstatus) | **GET** /dgii-ecf/automated-certification/{id}/status | Estado del proceso de certificación
*AutomatedCertificationApi* | [**listCertificationNiches**](docs/Api/AutomatedCertificationApi.md#listcertificationniches) | **GET** /dgii-ecf/automated-certification/niches | Listar nichos de certificación
*AutomatedCertificationApi* | [**startCertification**](docs/Api/AutomatedCertificationApi.md#startcertification) | **POST** /dgii-ecf/automated-certification/start | Iniciar proceso de certificación
*CommercialApprovalsApi* | [**getCommercialApprovalById**](docs/Api/CommercialApprovalsApi.md#getcommercialapprovalbyid) | **GET** /documents/approvals/{id} | Obtener aprobación comercial por ID
*CommercialApprovalsApi* | [**listCommercialApprovals**](docs/Api/CommercialApprovalsApi.md#listcommercialapprovals) | **GET** /documents/approvals | Listar aprobaciones comerciales
*DigitalCertificatesApi* | [**uploadCertificate**](docs/Api/DigitalCertificatesApi.md#uploadcertificate) | **POST** /{rnc}/certificates | Subir certificado digital (P12/PFX)
*DocumentsReceivedApi* | [**getReceivedDocumentById**](docs/Api/DocumentsReceivedApi.md#getreceiveddocumentbyid) | **GET** /documents/received/{id} | Obtener documento recibido por ID
*DocumentsReceivedApi* | [**getReceivedDocumentStatsBySupplier**](docs/Api/DocumentsReceivedApi.md#getreceiveddocumentstatsbysupplier) | **GET** /documents/received/stats/by-supplier | Top 10 proveedores por volumen de documentos recibidos
*DocumentsReceivedApi* | [**getReceivedDocumentStatsSummary**](docs/Api/DocumentsReceivedApi.md#getreceiveddocumentstatssummary) | **GET** /documents/received/stats/summary | Estadísticas de documentos recibidos
*DocumentsReceivedApi* | [**listReceivedDocuments**](docs/Api/DocumentsReceivedApi.md#listreceiveddocuments) | **GET** /documents/received | Listar documentos recibidos
*DocumentsSentApi* | [**downloadSentDocumentXml**](docs/Api/DocumentsSentApi.md#downloadsentdocumentxml) | **GET** /documents/download | Descargar XML del documento
*DocumentsSentApi* | [**getSentDocumentById**](docs/Api/DocumentsSentApi.md#getsentdocumentbyid) | **GET** /documents/{id} | Obtener detalle del documento
*DocumentsSentApi* | [**getSentDocumentLogs**](docs/Api/DocumentsSentApi.md#getsentdocumentlogs) | **GET** /documents/logs/{id} | Logs de procesamiento del documento
*DocumentsSentApi* | [**getSentDocumentStats**](docs/Api/DocumentsSentApi.md#getsentdocumentstats) | **GET** /documents/stats/summary | Estadísticas de documentos enviados
*DocumentsSentApi* | [**getSentDocumentStatsByEnvironment**](docs/Api/DocumentsSentApi.md#getsentdocumentstatsbyenvironment) | **GET** /documents/stats/by-environment | Estadísticas agrupadas por ambiente y estado
*DocumentsSentApi* | [**getSentDocumentStatusOptions**](docs/Api/DocumentsSentApi.md#getsentdocumentstatusoptions) | **GET** /documents/status-options | Opciones de filtro de estado disponibles
*DocumentsSentApi* | [**getSentDocumentXml**](docs/Api/DocumentsSentApi.md#getsentdocumentxml) | **GET** /documents/sent/{id}/xml | Descargar XML del documento por ID
*DocumentsSentApi* | [**listSentDocuments**](docs/Api/DocumentsSentApi.md#listsentdocuments) | **GET** /documents/sent | Listar documentos enviados
*ECFSubmissionApi* | [**getEcfStats**](docs/Api/ECFSubmissionApi.md#getecfstats) | **GET** /{environment}/ecf/responses/stats | Obtener estadísticas de envíos (últimos 30 días)
*ECFSubmissionApi* | [**getEcfStatus**](docs/Api/ECFSubmissionApi.md#getecfstatus) | **GET** /{environment}/ecf/status/{id} | Consultar estado del documento por ID interno
*ECFSubmissionApi* | [**getEcfSubmissionHistory**](docs/Api/ECFSubmissionApi.md#getecfsubmissionhistory) | **GET** /{environment}/ecf/responses/history | Historial de envíos (paginado)
*ECFSubmissionApi* | [**submitEcf**](docs/Api/ECFSubmissionApi.md#submitecf) | **POST** /{environment}/ecf/submit | Enviar documento e-CF a la DGII
*ReportsApi* | [**export606**](docs/Api/ReportsApi.md#export606) | **GET** /dgii/606/export | Exportar Formato 606 (Compras)
*ReportsApi* | [**exportSentDocuments**](docs/Api/ReportsApi.md#exportsentdocuments) | **GET** /dgii/sent/export | Exportar reporte de documentos enviados
*TaxSequencesApi* | [**createTaxSequence**](docs/Api/TaxSequencesApi.md#createtaxsequence) | **POST** /tax-sequences/create | Crear nueva secuencia de NCF
*TaxSequencesApi* | [**getNextNumber**](docs/Api/TaxSequencesApi.md#getnextnumber) | **GET** /tax-sequences/next | Obtener siguiente número fiscal disponible
*TaxSequencesApi* | [**listTaxSequences**](docs/Api/TaxSequencesApi.md#listtaxsequences) | **GET** /tax-sequences | Listar secuencias de NCF
*TaxSequencesApi* | [**updateTaxSequence**](docs/Api/TaxSequencesApi.md#updatetaxsequence) | **PATCH** /tax-sequences/update | Actualizar secuencia de NCF
*TaxSequencesApi* | [**voidTaxSequence**](docs/Api/TaxSequencesApi.md#voidtaxsequence) | **POST** /tax-sequences/void | Anular rango de números fiscales
*WebhookConfigurationApi* | [**getWebhook**](docs/Api/WebhookConfigurationApi.md#getwebhook) | **GET** /{rnc}/webhooks/{webhookId} | Detalle de un webhook
*WebhookConfigurationApi* | [**getWebhookStats**](docs/Api/WebhookConfigurationApi.md#getwebhookstats) | **GET** /{rnc}/webhooks/{webhookId}/stats | Estadísticas de entregas del webhook
*WebhookConfigurationApi* | [**listWebhooks**](docs/Api/WebhookConfigurationApi.md#listwebhooks) | **GET** /{rnc}/webhooks | Listar configuraciones de webhooks

## Models

- [AccountType](docs/Model/AccountType.md)
- [AdditionalInfo](docs/Model/AdditionalInfo.md)
- [AdditionalTax](docs/Model/AdditionalTax.md)
- [AlternativeCurrency](docs/Model/AlternativeCurrency.md)
- [ApprovalItem](docs/Model/ApprovalItem.md)
- [ApprovalListResponse](docs/Model/ApprovalListResponse.md)
- [AssociatedCompany](docs/Model/AssociatedCompany.md)
- [AssociatedCompanySubscription](docs/Model/AssociatedCompanySubscription.md)
- [AssociatedCompanySubscriptionPlan](docs/Model/AssociatedCompanySubscriptionPlan.md)
- [BillingIndicator](docs/Model/BillingIndicator.md)
- [BillingInvoiceReadyPayload](docs/Model/BillingInvoiceReadyPayload.md)
- [BranchCreatedPayload](docs/Model/BranchCreatedPayload.md)
- [BranchStatusChangedPayload](docs/Model/BranchStatusChangedPayload.md)
- [Buyer](docs/Model/Buyer.md)
- [CertificateExpiringPayload](docs/Model/CertificateExpiringPayload.md)
- [CertificationCompletedPayload](docs/Model/CertificationCompletedPayload.md)
- [CertificationNiche](docs/Model/CertificationNiche.md)
- [CertificationNicheNicheItemsInner](docs/Model/CertificationNicheNicheItemsInner.md)
- [CertificationStatus](docs/Model/CertificationStatus.md)
- [CommercialApprovalPayload](docs/Model/CommercialApprovalPayload.md)
- [CompanyDocumentMetrics](docs/Model/CompanyDocumentMetrics.md)
- [CompanyDocumentMetricsGroupByStatusInner](docs/Model/CompanyDocumentMetricsGroupByStatusInner.md)
- [CompanyDocumentMetricsGroupByStatusInnerCount](docs/Model/CompanyDocumentMetricsGroupByStatusInnerCount.md)
- [CompanyDocumentMetricsMainBusiness](docs/Model/CompanyDocumentMetricsMainBusiness.md)
- [CompanyDocumentMetricsTotals](docs/Model/CompanyDocumentMetricsTotals.md)
- [CompanyMetrics](docs/Model/CompanyMetrics.md)
- [CompanyMetricsDocumentsStatus](docs/Model/CompanyMetricsDocumentsStatus.md)
- [ContingencyActivatedPayload](docs/Model/ContingencyActivatedPayload.md)
- [CreateAssociatedCompany201Response](docs/Model/CreateAssociatedCompany201Response.md)
- [CreateTaxSequence201Response](docs/Model/CreateTaxSequence201Response.md)
- [CreateTaxSequenceRequest](docs/Model/CreateTaxSequenceRequest.md)
- [DeleteAssociatedCompany200Response](docs/Model/DeleteAssociatedCompany200Response.md)
- [DgiiMessage](docs/Model/DgiiMessage.md)
- [DiscountOrSurcharge](docs/Model/DiscountOrSurcharge.md)
- [DocumentReceivedPayload](docs/Model/DocumentReceivedPayload.md)
- [DocumentStatsResponse](docs/Model/DocumentStatsResponse.md)
- [DocumentStatsResponseByStatusValue](docs/Model/DocumentStatsResponseByStatusValue.md)
- [DocumentStatus](docs/Model/DocumentStatus.md)
- [DocumentStatusChangedPayload](docs/Model/DocumentStatusChangedPayload.md)
- [DocumentValidationErrorPayload](docs/Model/DocumentValidationErrorPayload.md)
- [EcfHistoryItem](docs/Model/EcfHistoryItem.md)
- [EcfStatsResponse](docs/Model/EcfStatsResponse.md)
- [EcfStatusResponse](docs/Model/EcfStatusResponse.md)
- [EcfSubmitResponse](docs/Model/EcfSubmitResponse.md)
- [EcfSubmitResponseCompanyIdentification](docs/Model/EcfSubmitResponseCompanyIdentification.md)
- [ElectronicDocument](docs/Model/ElectronicDocument.md)
- [Environment](docs/Model/Environment.md)
- [ErrorResponse](docs/Model/ErrorResponse.md)
- [GetEcfSubmissionHistory200Response](docs/Model/GetEcfSubmissionHistory200Response.md)
- [GetNextNumber200Response](docs/Model/GetNextNumber200Response.md)
- [GetNextNumber200ResponseData](docs/Model/GetNextNumber200ResponseData.md)
- [GetReceivedDocumentStatsBySupplier200ResponseInner](docs/Model/GetReceivedDocumentStatsBySupplier200ResponseInner.md)
- [GetSentDocumentLogs200ResponseInner](docs/Model/GetSentDocumentLogs200ResponseInner.md)
- [GetSentDocumentStatusOptions200ResponseInner](docs/Model/GetSentDocumentStatusOptions200ResponseInner.md)
- [InvoiceType](docs/Model/InvoiceType.md)
- [InvoiceTypeSequence](docs/Model/InvoiceTypeSequence.md)
- [Item](docs/Model/Item.md)
- [ItemAdditionalTax](docs/Model/ItemAdditionalTax.md)
- [ItemAlternativeCurrency](docs/Model/ItemAlternativeCurrency.md)
- [ItemAmount](docs/Model/ItemAmount.md)
- [ItemCodesInner](docs/Model/ItemCodesInner.md)
- [ItemDiscountInner](docs/Model/ItemDiscountInner.md)
- [ItemMiningInfo](docs/Model/ItemMiningInfo.md)
- [ItemQuantity](docs/Model/ItemQuantity.md)
- [ItemSurchargeInner](docs/Model/ItemSurchargeInner.md)
- [ItemUnitPrice](docs/Model/ItemUnitPrice.md)
- [ItemWithheldITBISAmount](docs/Model/ItemWithheldITBISAmount.md)
- [LegalStatus](docs/Model/LegalStatus.md)
- [ListTaxSequences200Response](docs/Model/ListTaxSequences200Response.md)
- [MemberInvitedPayload](docs/Model/MemberInvitedPayload.md)
- [MemberJoinedPayload](docs/Model/MemberJoinedPayload.md)
- [MemberRemovedPayload](docs/Model/MemberRemovedPayload.md)
- [OAuthTokenRequest](docs/Model/OAuthTokenRequest.md)
- [OAuthTokenResponse](docs/Model/OAuthTokenResponse.md)
- [Page](docs/Model/Page.md)
- [PaginationMeta](docs/Model/PaginationMeta.md)
- [PaymentForm](docs/Model/PaymentForm.md)
- [PaymentMethod](docs/Model/PaymentMethod.md)
- [PlanPaymentFailedPayload](docs/Model/PlanPaymentFailedPayload.md)
- [PlanUsageAlertPayload](docs/Model/PlanUsageAlertPayload.md)
- [PrintFormat](docs/Model/PrintFormat.md)
- [ProcessingLog](docs/Model/ProcessingLog.md)
- [PublicDocumentStatus](docs/Model/PublicDocumentStatus.md)
- [RateLimitErrorResponse](docs/Model/RateLimitErrorResponse.md)
- [ReceivedDocument](docs/Model/ReceivedDocument.md)
- [ReceivedDocumentListResponse](docs/Model/ReceivedDocumentListResponse.md)
- [ReceivedDocumentStatsResponse](docs/Model/ReceivedDocumentStatsResponse.md)
- [ReferenceInfo](docs/Model/ReferenceInfo.md)
- [SecurityApiKeyRotatedPayload](docs/Model/SecurityApiKeyRotatedPayload.md)
- [SecurityNewLoginPayload](docs/Model/SecurityNewLoginPayload.md)
- [SentDocumentDetail](docs/Model/SentDocumentDetail.md)
- [SentDocumentListResponse](docs/Model/SentDocumentListResponse.md)
- [SentDocumentSummary](docs/Model/SentDocumentSummary.md)
- [SentDocumentSummaryBusiness](docs/Model/SentDocumentSummaryBusiness.md)
- [SequenceDepletedPayload](docs/Model/SequenceDepletedPayload.md)
- [SequenceVoidedPayload](docs/Model/SequenceVoidedPayload.md)
- [StartCertification200Response](docs/Model/StartCertification200Response.md)
- [StartCertificationRequest](docs/Model/StartCertificationRequest.md)
- [Subquantity](docs/Model/Subquantity.md)
- [Subtotal](docs/Model/Subtotal.md)
- [TaxSequence](docs/Model/TaxSequence.md)
- [TaxSequenceCreated](docs/Model/TaxSequenceCreated.md)
- [Totals](docs/Model/Totals.md)
- [TotalsItbisRate1](docs/Model/TotalsItbisRate1.md)
- [TotalsItbisRate2](docs/Model/TotalsItbisRate2.md)
- [TotalsItbisRate3](docs/Model/TotalsItbisRate3.md)
- [TotalsTotalAmount](docs/Model/TotalsTotalAmount.md)
- [Transport](docs/Model/Transport.md)
- [UpdateTaxSequenceRequest](docs/Model/UpdateTaxSequenceRequest.md)
- [UploadCertificateResponse](docs/Model/UploadCertificateResponse.md)
- [VoidTaxSequence200Response](docs/Model/VoidTaxSequence200Response.md)
- [VoidTaxSequence200ResponseData](docs/Model/VoidTaxSequence200ResponseData.md)
- [VoidTaxSequenceRequest](docs/Model/VoidTaxSequenceRequest.md)
- [WebhookConfigDetail](docs/Model/WebhookConfigDetail.md)
- [WebhookConfigResponse](docs/Model/WebhookConfigResponse.md)
- [WebhookEventType](docs/Model/WebhookEventType.md)
- [WebhookNotificationPayload](docs/Model/WebhookNotificationPayload.md)
- [WebhookNotificationPayloadData](docs/Model/WebhookNotificationPayloadData.md)
- [WebhookStats](docs/Model/WebhookStats.md)
- [WebhookStatsStats](docs/Model/WebhookStatsStats.md)

## Authorization

Authentication schemes defined for the API:
### bearerAuth

- **Type**: Bearer authentication (JWT)

### oauth2

- **Type**: `OAuth`
- **Flow**: `application`
- **Authorization URL**: ``
- **Scopes**: 
    - **business:read**: Consultar datos de la empresa.
    - **business:create**: Crear una nueva empresa.
    - **business:update**: Actualizar datos de la empresa.
    - **members:read**: Ver miembros del equipo.
    - **members:invite**: Invitar nuevos miembros.
    - **members:revoke**: Revocar acceso de miembros.
    - **certificates:read**: Ver certificados digitales.
    - **certificates:upload**: Subir nuevos certificados.
    - **certificates:update**: Actualizar certificados existentes.
    - **documents:read**: Listar y consultar detalles de documentos.
    - **documents:create**: Crear borradores o documentos internos.
    - **documents:send**: Enviar e-CF a la DGII.
    - **documents:receive**: Recibir e-CF de terceros.
    - **documents:update**: Modificar metadatos de documentos.
    - **approvals:read**: Ver estados de aprobación.
    - **approvals:commercial**: Realizar aprobaciones o rechazos comerciales.
    - **sequences:read**: Ver rangos de NCF/e-NCF.
    - **sequences:create**: Solicitar o agregar nuevas secuencias.
    - **sequences:update**: Modificar configuraciones de secuencias.
    - **sequences:cancel**: Cancelar secuencias no utilizadas.
    - **business_info:read**: Acceder a estadísticas y métricas del dashboard.
    - **certification:read**: Ver progreso de certificación DGII.
    - **certification:write**: Ejecutar pruebas de certificación automática DGII.
    - **reports:read**: Generar y exportar reportes (ej. formato 606).

## Tests

To run the tests, use:

```bash
composer install
vendor/bin/phpunit
```

## Author

support@pronesoft.com

## About this package

This PHP package is automatically generated by the [OpenAPI Generator](https://openapi-generator.tech) project:

- API version: `1.2.0`
    - Generator version: `7.21.0`
- Build package: `org.openapitools.codegen.languages.PhpClientCodegen`
