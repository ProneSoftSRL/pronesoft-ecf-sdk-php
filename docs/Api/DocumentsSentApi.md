# PronesoftEcfSdk\DocumentsSentApi



All URIs are relative to https://api.ecf.sandbox.pronesoft.com/api/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**downloadSentDocumentXml()**](DocumentsSentApi.md#downloadSentDocumentXml) | **GET** /documents/download | Descargar XML del documento |
| [**getSentDocumentById()**](DocumentsSentApi.md#getSentDocumentById) | **GET** /documents/{id} | Obtener detalle del documento |
| [**getSentDocumentLogs()**](DocumentsSentApi.md#getSentDocumentLogs) | **GET** /documents/logs/{id} | Logs de procesamiento del documento |
| [**getSentDocumentStats()**](DocumentsSentApi.md#getSentDocumentStats) | **GET** /documents/stats/summary | Estadísticas de documentos enviados |
| [**getSentDocumentStatsByEnvironment()**](DocumentsSentApi.md#getSentDocumentStatsByEnvironment) | **GET** /documents/stats/by-environment | Estadísticas agrupadas por ambiente y estado |
| [**getSentDocumentStatusOptions()**](DocumentsSentApi.md#getSentDocumentStatusOptions) | **GET** /documents/status-options | Opciones de filtro de estado disponibles |
| [**getSentDocumentXml()**](DocumentsSentApi.md#getSentDocumentXml) | **GET** /documents/sent/{id}/xml | Descargar XML del documento por ID |
| [**listSentDocuments()**](DocumentsSentApi.md#listSentDocuments) | **GET** /documents/sent | Listar documentos enviados |


## `downloadSentDocumentXml()`

```php
downloadSentDocumentXml($id, $file_url, $inline): string
```

Descargar XML del documento

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oauth2
$config = PronesoftEcfSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new PronesoftEcfSdk\Api\DocumentsSentApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | ID interno del documento
$file_url = 'file_url_example'; // string
$inline = 'inline_example'; // string | true para ver en el navegador, false para descargar

try {
    $result = $apiInstance->downloadSentDocumentXml($id, $file_url, $inline);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentsSentApi->downloadSentDocumentXml: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| ID interno del documento | [optional] |
| **file_url** | **string**|  | [optional] |
| **inline** | **string**| true para ver en el navegador, false para descargar | [optional] |

### Return type

**string**

### Authorization

[oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/xml`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getSentDocumentById()`

```php
getSentDocumentById($id, $x_tenant_id): \PronesoftEcfSdk\Model\SentDocumentDetail
```

Obtener detalle del documento

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oauth2
$config = PronesoftEcfSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new PronesoftEcfSdk\Api\DocumentsSentApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string
$x_tenant_id = 468a4aa1-1b80-447e-9ecb-400e39f7d798; // string | UUID de la empresa asociada (sucursal). Incluir SOLO cuando se actúa en nombre de una sucursal. Omitir cuando se actúa como empresa principal.

try {
    $result = $apiInstance->getSentDocumentById($id, $x_tenant_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentsSentApi->getSentDocumentById: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |
| **x_tenant_id** | **string**| UUID de la empresa asociada (sucursal). Incluir SOLO cuando se actúa en nombre de una sucursal. Omitir cuando se actúa como empresa principal. | [optional] |

### Return type

[**\PronesoftEcfSdk\Model\SentDocumentDetail**](../Model/SentDocumentDetail.md)

### Authorization

[oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getSentDocumentLogs()`

```php
getSentDocumentLogs($id, $x_tenant_id): \PronesoftEcfSdk\Model\GetSentDocumentLogs200ResponseInner[]
```

Logs de procesamiento del documento

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oauth2
$config = PronesoftEcfSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new PronesoftEcfSdk\Api\DocumentsSentApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string
$x_tenant_id = 468a4aa1-1b80-447e-9ecb-400e39f7d798; // string | UUID de la empresa asociada (sucursal). Incluir SOLO cuando se actúa en nombre de una sucursal. Omitir cuando se actúa como empresa principal.

try {
    $result = $apiInstance->getSentDocumentLogs($id, $x_tenant_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentsSentApi->getSentDocumentLogs: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |
| **x_tenant_id** | **string**| UUID de la empresa asociada (sucursal). Incluir SOLO cuando se actúa en nombre de una sucursal. Omitir cuando se actúa como empresa principal. | [optional] |

### Return type

[**\PronesoftEcfSdk\Model\GetSentDocumentLogs200ResponseInner[]**](../Model/GetSentDocumentLogs200ResponseInner.md)

### Authorization

[oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getSentDocumentStats()`

```php
getSentDocumentStats($x_tenant_id): \PronesoftEcfSdk\Model\DocumentStatsResponse
```

Estadísticas de documentos enviados

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oauth2
$config = PronesoftEcfSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new PronesoftEcfSdk\Api\DocumentsSentApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$x_tenant_id = 468a4aa1-1b80-447e-9ecb-400e39f7d798; // string | UUID de la empresa asociada (sucursal). Incluir SOLO cuando se actúa en nombre de una sucursal. Omitir cuando se actúa como empresa principal.

try {
    $result = $apiInstance->getSentDocumentStats($x_tenant_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentsSentApi->getSentDocumentStats: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **x_tenant_id** | **string**| UUID de la empresa asociada (sucursal). Incluir SOLO cuando se actúa en nombre de una sucursal. Omitir cuando se actúa como empresa principal. | [optional] |

### Return type

[**\PronesoftEcfSdk\Model\DocumentStatsResponse**](../Model/DocumentStatsResponse.md)

### Authorization

[oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getSentDocumentStatsByEnvironment()`

```php
getSentDocumentStatsByEnvironment($x_tenant_id): array<string,object>
```

Estadísticas agrupadas por ambiente y estado

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oauth2
$config = PronesoftEcfSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new PronesoftEcfSdk\Api\DocumentsSentApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$x_tenant_id = 468a4aa1-1b80-447e-9ecb-400e39f7d798; // string | UUID de la empresa asociada (sucursal). Incluir SOLO cuando se actúa en nombre de una sucursal. Omitir cuando se actúa como empresa principal.

try {
    $result = $apiInstance->getSentDocumentStatsByEnvironment($x_tenant_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentsSentApi->getSentDocumentStatsByEnvironment: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **x_tenant_id** | **string**| UUID de la empresa asociada (sucursal). Incluir SOLO cuando se actúa en nombre de una sucursal. Omitir cuando se actúa como empresa principal. | [optional] |

### Return type

**array<string,object>**

### Authorization

[oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getSentDocumentStatusOptions()`

```php
getSentDocumentStatusOptions(): \PronesoftEcfSdk\Model\GetSentDocumentStatusOptions200ResponseInner[]
```

Opciones de filtro de estado disponibles

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oauth2
$config = PronesoftEcfSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new PronesoftEcfSdk\Api\DocumentsSentApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getSentDocumentStatusOptions();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentsSentApi->getSentDocumentStatusOptions: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\PronesoftEcfSdk\Model\GetSentDocumentStatusOptions200ResponseInner[]**](../Model/GetSentDocumentStatusOptions200ResponseInner.md)

### Authorization

[oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getSentDocumentXml()`

```php
getSentDocumentXml($id, $inline): string
```

Descargar XML del documento por ID

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oauth2
$config = PronesoftEcfSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new PronesoftEcfSdk\Api\DocumentsSentApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | ID interno del documento
$inline = 'inline_example'; // string | true para ver en el navegador, false para descargar

try {
    $result = $apiInstance->getSentDocumentXml($id, $inline);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentsSentApi->getSentDocumentXml: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| ID interno del documento | |
| **inline** | **string**| true para ver en el navegador, false para descargar | [optional] |

### Return type

**string**

### Authorization

[oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/xml`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listSentDocuments()`

```php
listSentDocuments($x_tenant_id, $env, $ecf, $type, $status, $date_from, $date_to, $page, $limit): \PronesoftEcfSdk\Model\SentDocumentListResponse
```

Listar documentos enviados

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oauth2
$config = PronesoftEcfSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new PronesoftEcfSdk\Api\DocumentsSentApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$x_tenant_id = 468a4aa1-1b80-447e-9ecb-400e39f7d798; // string | UUID de la empresa asociada (sucursal). Incluir SOLO cuando se actúa en nombre de una sucursal. Omitir cuando se actúa como empresa principal.
$env = new \PronesoftEcfSdk\Model\\PronesoftEcfSdk\Model\Environment(); // \PronesoftEcfSdk\Model\Environment
$ecf = 'ecf_example'; // string
$type = 'type_example'; // string
$status = 'status_example'; // string
$date_from = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime
$date_to = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime
$page = 1; // int
$limit = 10; // int

try {
    $result = $apiInstance->listSentDocuments($x_tenant_id, $env, $ecf, $type, $status, $date_from, $date_to, $page, $limit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentsSentApi->listSentDocuments: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **x_tenant_id** | **string**| UUID de la empresa asociada (sucursal). Incluir SOLO cuando se actúa en nombre de una sucursal. Omitir cuando se actúa como empresa principal. | [optional] |
| **env** | [**\PronesoftEcfSdk\Model\Environment**](../Model/.md)|  | [optional] |
| **ecf** | **string**|  | [optional] |
| **type** | **string**|  | [optional] |
| **status** | **string**|  | [optional] |
| **date_from** | **\DateTime**|  | [optional] |
| **date_to** | **\DateTime**|  | [optional] |
| **page** | **int**|  | [optional] [default to 1] |
| **limit** | **int**|  | [optional] [default to 10] |

### Return type

[**\PronesoftEcfSdk\Model\SentDocumentListResponse**](../Model/SentDocumentListResponse.md)

### Authorization

[oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
