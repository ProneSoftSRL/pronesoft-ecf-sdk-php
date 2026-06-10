# PronesoftEcfSdk\ECFSubmissionApi



All URIs are relative to https://api.ecf.sandbox.pronesoft.com/api/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getEcfStats()**](ECFSubmissionApi.md#getEcfStats) | **GET** /{environment}/ecf/responses/stats | Obtener estadísticas de envíos (últimos 30 días) |
| [**getEcfStatus()**](ECFSubmissionApi.md#getEcfStatus) | **GET** /{environment}/ecf/status/{id} | Consultar estado del documento por ID interno |
| [**getEcfSubmissionHistory()**](ECFSubmissionApi.md#getEcfSubmissionHistory) | **GET** /{environment}/ecf/responses/history | Historial de envíos (paginado) |
| [**submitEcf()**](ECFSubmissionApi.md#submitEcf) | **POST** /{environment}/ecf/submit | Enviar documento e-CF a la DGII |


## `getEcfStats()`

```php
getEcfStats($environment, $x_tenant_id): \PronesoftEcfSdk\Model\EcfStatsResponse
```

Obtener estadísticas de envíos (últimos 30 días)

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oauth2
$config = PronesoftEcfSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new PronesoftEcfSdk\Api\ECFSubmissionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$environment = new \PronesoftEcfSdk\Model\\PronesoftEcfSdk\Model\Environment(); // \PronesoftEcfSdk\Model\Environment
$x_tenant_id = 468a4aa1-1b80-447e-9ecb-400e39f7d798; // string | UUID de la empresa asociada (sucursal). Incluir SOLO cuando se actúa en nombre de una sucursal. Omitir cuando se actúa como empresa principal.

try {
    $result = $apiInstance->getEcfStats($environment, $x_tenant_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ECFSubmissionApi->getEcfStats: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **environment** | [**\PronesoftEcfSdk\Model\Environment**](../Model/.md)|  | |
| **x_tenant_id** | **string**| UUID de la empresa asociada (sucursal). Incluir SOLO cuando se actúa en nombre de una sucursal. Omitir cuando se actúa como empresa principal. | [optional] |

### Return type

[**\PronesoftEcfSdk\Model\EcfStatsResponse**](../Model/EcfStatsResponse.md)

### Authorization

[oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getEcfStatus()`

```php
getEcfStatus($environment, $id, $x_tenant_id): \PronesoftEcfSdk\Model\EcfStatusResponse
```

Consultar estado del documento por ID interno

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oauth2
$config = PronesoftEcfSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new PronesoftEcfSdk\Api\ECFSubmissionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$environment = new \PronesoftEcfSdk\Model\\PronesoftEcfSdk\Model\Environment(); // \PronesoftEcfSdk\Model\Environment
$id = 'id_example'; // string
$x_tenant_id = 468a4aa1-1b80-447e-9ecb-400e39f7d798; // string | UUID de la empresa asociada (sucursal). Incluir SOLO cuando se actúa en nombre de una sucursal. Omitir cuando se actúa como empresa principal.

try {
    $result = $apiInstance->getEcfStatus($environment, $id, $x_tenant_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ECFSubmissionApi->getEcfStatus: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **environment** | [**\PronesoftEcfSdk\Model\Environment**](../Model/.md)|  | |
| **id** | **string**|  | |
| **x_tenant_id** | **string**| UUID de la empresa asociada (sucursal). Incluir SOLO cuando se actúa en nombre de una sucursal. Omitir cuando se actúa como empresa principal. | [optional] |

### Return type

[**\PronesoftEcfSdk\Model\EcfStatusResponse**](../Model/EcfStatusResponse.md)

### Authorization

[oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getEcfSubmissionHistory()`

```php
getEcfSubmissionHistory($environment, $x_tenant_id, $page, $limit): \PronesoftEcfSdk\Model\GetEcfSubmissionHistory200Response
```

Historial de envíos (paginado)

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oauth2
$config = PronesoftEcfSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new PronesoftEcfSdk\Api\ECFSubmissionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$environment = new \PronesoftEcfSdk\Model\\PronesoftEcfSdk\Model\Environment(); // \PronesoftEcfSdk\Model\Environment
$x_tenant_id = 468a4aa1-1b80-447e-9ecb-400e39f7d798; // string | UUID de la empresa asociada (sucursal). Incluir SOLO cuando se actúa en nombre de una sucursal. Omitir cuando se actúa como empresa principal.
$page = 1; // int
$limit = 20; // int

try {
    $result = $apiInstance->getEcfSubmissionHistory($environment, $x_tenant_id, $page, $limit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ECFSubmissionApi->getEcfSubmissionHistory: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **environment** | [**\PronesoftEcfSdk\Model\Environment**](../Model/.md)|  | |
| **x_tenant_id** | **string**| UUID de la empresa asociada (sucursal). Incluir SOLO cuando se actúa en nombre de una sucursal. Omitir cuando se actúa como empresa principal. | [optional] |
| **page** | **int**|  | [optional] [default to 1] |
| **limit** | **int**|  | [optional] [default to 20] |

### Return type

[**\PronesoftEcfSdk\Model\GetEcfSubmissionHistory200Response**](../Model/GetEcfSubmissionHistory200Response.md)

### Authorization

[oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `submitEcf()`

```php
submitEcf($environment, $electronic_document, $x_tenant_id): \PronesoftEcfSdk\Model\EcfSubmitResponse
```

Enviar documento e-CF a la DGII

Envía un comprobante fiscal electrónico. Maneja automáticamente la firma XML, la cola de envío, el modo contingencia y la comunicación con la DGII. IMPORTANTE: En Sandbox el campo environment en el cuerpo DEBE ser TesteCF.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oauth2
$config = PronesoftEcfSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new PronesoftEcfSdk\Api\ECFSubmissionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$environment = new \PronesoftEcfSdk\Model\\PronesoftEcfSdk\Model\Environment(); // \PronesoftEcfSdk\Model\Environment
$electronic_document = {"invoiceType":"31","issueDate":"2025-06-04","paymentType":"1","incomeType":"01","taxedAmountIndicator":"0","issuerRNC":"133190907","issuerBusinessName":"Mi Empresa SRL","issuerAddress":"Av. Winston Churchill 1099, Santo Domingo","buyer":{"taxId":"101234567","name":"Cliente Corporativo SRL"},"items":[{"name":"Servicio de desarrollo de software","quantity":1,"unitPrice":"50000.00","unitOfMeasure":1,"type":"2","billingIndicator":"1"}],"totals":{"taxableAmount":50000.0,"exemptAmount":0,"totalITBIS":9000.0,"totalAmount":59000.0},"paymentForms":[{"method":"1","amount":59000.0}]}; // \PronesoftEcfSdk\Model\ElectronicDocument
$x_tenant_id = 468a4aa1-1b80-447e-9ecb-400e39f7d798; // string | UUID de la empresa asociada (sucursal). Incluir SOLO cuando se actúa en nombre de una sucursal. Omitir cuando se actúa como empresa principal.

try {
    $result = $apiInstance->submitEcf($environment, $electronic_document, $x_tenant_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ECFSubmissionApi->submitEcf: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **environment** | [**\PronesoftEcfSdk\Model\Environment**](../Model/.md)|  | |
| **electronic_document** | [**\PronesoftEcfSdk\Model\ElectronicDocument**](../Model/ElectronicDocument.md)|  | |
| **x_tenant_id** | **string**| UUID de la empresa asociada (sucursal). Incluir SOLO cuando se actúa en nombre de una sucursal. Omitir cuando se actúa como empresa principal. | [optional] |

### Return type

[**\PronesoftEcfSdk\Model\EcfSubmitResponse**](../Model/EcfSubmitResponse.md)

### Authorization

[oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
