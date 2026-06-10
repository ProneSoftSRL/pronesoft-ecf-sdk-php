# PronesoftEcfSdk\ReportsApi

Descarga reportes contables (Documentos Enviados, Formato 606) para cumplimiento DGII.

All URIs are relative to https://api.ecf.sandbox.pronesoft.com/api/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**export606()**](ReportsApi.md#export606) | **GET** /dgii/606/export | Exportar Formato 606 (Compras) |
| [**exportSentDocuments()**](ReportsApi.md#exportSentDocuments) | **GET** /dgii/sent/export | Exportar reporte de documentos enviados |


## `export606()`

```php
export606($from, $to, $format, $status, $type, $encf): string
```

Exportar Formato 606 (Compras)

Descarga el Formato 606 oficial para DGII en TXT (oficial) o Excel.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oauth2
$config = PronesoftEcfSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new PronesoftEcfSdk\Api\ReportsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$from = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime
$to = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime
$format = 'format_example'; // string
$status = 'status_example'; // string
$type = 'type_example'; // string
$encf = 'encf_example'; // string

try {
    $result = $apiInstance->export606($from, $to, $format, $status, $type, $encf);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReportsApi->export606: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **from** | **\DateTime**|  | |
| **to** | **\DateTime**|  | |
| **format** | **string**|  | |
| **status** | **string**|  | [optional] |
| **type** | **string**|  | [optional] |
| **encf** | **string**|  | [optional] |

### Return type

**string**

### Authorization

[oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `text/plain`, `application/vnd.openxmlformats-officedocument.spreadsheetml.sheet`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `exportSentDocuments()`

```php
exportSentDocuments($from, $to, $env, $encf, $type, $status, $track_id): \SplFileObject
```

Exportar reporte de documentos enviados

Descarga los documentos enviados en un rango de fechas en formato Excel. Requiere el scope reports:read.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oauth2
$config = PronesoftEcfSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new PronesoftEcfSdk\Api\ReportsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$from = 2024-01-01; // \DateTime
$to = 2024-01-31; // \DateTime
$env = new \PronesoftEcfSdk\Model\\PronesoftEcfSdk\Model\Environment(); // \PronesoftEcfSdk\Model\Environment
$encf = 'encf_example'; // string
$type = 'type_example'; // string
$status = 'status_example'; // string
$track_id = 'track_id_example'; // string

try {
    $result = $apiInstance->exportSentDocuments($from, $to, $env, $encf, $type, $status, $track_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReportsApi->exportSentDocuments: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **from** | **\DateTime**|  | |
| **to** | **\DateTime**|  | |
| **env** | [**\PronesoftEcfSdk\Model\Environment**](../Model/.md)|  | [optional] |
| **encf** | **string**|  | [optional] |
| **type** | **string**|  | [optional] |
| **status** | **string**|  | [optional] |
| **track_id** | **string**|  | [optional] |

### Return type

**\SplFileObject**

### Authorization

[oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/vnd.openxmlformats-officedocument.spreadsheetml.sheet`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
