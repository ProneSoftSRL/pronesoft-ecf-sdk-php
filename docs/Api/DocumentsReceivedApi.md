# PronesoftEcfSdk\DocumentsReceivedApi



All URIs are relative to https://api.ecf.sandbox.pronesoft.com/api/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getReceivedDocumentById()**](DocumentsReceivedApi.md#getReceivedDocumentById) | **GET** /documents/received/{id} | Obtener documento recibido por ID |
| [**getReceivedDocumentStatsBySupplier()**](DocumentsReceivedApi.md#getReceivedDocumentStatsBySupplier) | **GET** /documents/received/stats/by-supplier | Top 10 proveedores por volumen de documentos recibidos |
| [**getReceivedDocumentStatsSummary()**](DocumentsReceivedApi.md#getReceivedDocumentStatsSummary) | **GET** /documents/received/stats/summary | Estadísticas de documentos recibidos |
| [**listReceivedDocuments()**](DocumentsReceivedApi.md#listReceivedDocuments) | **GET** /documents/received | Listar documentos recibidos |


## `getReceivedDocumentById()`

```php
getReceivedDocumentById($id, $x_tenant_id): \PronesoftEcfSdk\Model\ReceivedDocument
```

Obtener documento recibido por ID

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oauth2
$config = PronesoftEcfSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new PronesoftEcfSdk\Api\DocumentsReceivedApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string
$x_tenant_id = 468a4aa1-1b80-447e-9ecb-400e39f7d798; // string | UUID de la empresa asociada (sucursal). Incluir SOLO cuando se actúa en nombre de una sucursal. Omitir cuando se actúa como empresa principal.

try {
    $result = $apiInstance->getReceivedDocumentById($id, $x_tenant_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentsReceivedApi->getReceivedDocumentById: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |
| **x_tenant_id** | **string**| UUID de la empresa asociada (sucursal). Incluir SOLO cuando se actúa en nombre de una sucursal. Omitir cuando se actúa como empresa principal. | [optional] |

### Return type

[**\PronesoftEcfSdk\Model\ReceivedDocument**](../Model/ReceivedDocument.md)

### Authorization

[oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getReceivedDocumentStatsBySupplier()`

```php
getReceivedDocumentStatsBySupplier($x_tenant_id): \PronesoftEcfSdk\Model\GetReceivedDocumentStatsBySupplier200ResponseInner[]
```

Top 10 proveedores por volumen de documentos recibidos

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oauth2
$config = PronesoftEcfSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new PronesoftEcfSdk\Api\DocumentsReceivedApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$x_tenant_id = 468a4aa1-1b80-447e-9ecb-400e39f7d798; // string | UUID de la empresa asociada (sucursal). Incluir SOLO cuando se actúa en nombre de una sucursal. Omitir cuando se actúa como empresa principal.

try {
    $result = $apiInstance->getReceivedDocumentStatsBySupplier($x_tenant_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentsReceivedApi->getReceivedDocumentStatsBySupplier: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **x_tenant_id** | **string**| UUID de la empresa asociada (sucursal). Incluir SOLO cuando se actúa en nombre de una sucursal. Omitir cuando se actúa como empresa principal. | [optional] |

### Return type

[**\PronesoftEcfSdk\Model\GetReceivedDocumentStatsBySupplier200ResponseInner[]**](../Model/GetReceivedDocumentStatsBySupplier200ResponseInner.md)

### Authorization

[oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getReceivedDocumentStatsSummary()`

```php
getReceivedDocumentStatsSummary($x_tenant_id): \PronesoftEcfSdk\Model\ReceivedDocumentStatsResponse
```

Estadísticas de documentos recibidos

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oauth2
$config = PronesoftEcfSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new PronesoftEcfSdk\Api\DocumentsReceivedApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$x_tenant_id = 468a4aa1-1b80-447e-9ecb-400e39f7d798; // string | UUID de la empresa asociada (sucursal). Incluir SOLO cuando se actúa en nombre de una sucursal. Omitir cuando se actúa como empresa principal.

try {
    $result = $apiInstance->getReceivedDocumentStatsSummary($x_tenant_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentsReceivedApi->getReceivedDocumentStatsSummary: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **x_tenant_id** | **string**| UUID de la empresa asociada (sucursal). Incluir SOLO cuando se actúa en nombre de una sucursal. Omitir cuando se actúa como empresa principal. | [optional] |

### Return type

[**\PronesoftEcfSdk\Model\ReceivedDocumentStatsResponse**](../Model/ReceivedDocumentStatsResponse.md)

### Authorization

[oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listReceivedDocuments()`

```php
listReceivedDocuments($x_tenant_id, $ecf, $type, $status, $supplier_rnc, $amount_from, $amount_to, $processed, $date_from, $date_to, $page, $limit): \PronesoftEcfSdk\Model\ReceivedDocumentListResponse
```

Listar documentos recibidos

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oauth2
$config = PronesoftEcfSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new PronesoftEcfSdk\Api\DocumentsReceivedApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$x_tenant_id = 468a4aa1-1b80-447e-9ecb-400e39f7d798; // string | UUID de la empresa asociada (sucursal). Incluir SOLO cuando se actúa en nombre de una sucursal. Omitir cuando se actúa como empresa principal.
$ecf = 'ecf_example'; // string
$type = 'type_example'; // string | Tipo de documento (31, 32, 33, etc.)
$status = 56; // int
$supplier_rnc = 'supplier_rnc_example'; // string | RNC del emisor/proveedor
$amount_from = 3.4; // float
$amount_to = 3.4; // float
$processed = True; // bool
$date_from = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime
$date_to = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime
$page = 1; // int
$limit = 10; // int

try {
    $result = $apiInstance->listReceivedDocuments($x_tenant_id, $ecf, $type, $status, $supplier_rnc, $amount_from, $amount_to, $processed, $date_from, $date_to, $page, $limit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentsReceivedApi->listReceivedDocuments: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **x_tenant_id** | **string**| UUID de la empresa asociada (sucursal). Incluir SOLO cuando se actúa en nombre de una sucursal. Omitir cuando se actúa como empresa principal. | [optional] |
| **ecf** | **string**|  | [optional] |
| **type** | **string**| Tipo de documento (31, 32, 33, etc.) | [optional] |
| **status** | **int**|  | [optional] |
| **supplier_rnc** | **string**| RNC del emisor/proveedor | [optional] |
| **amount_from** | **float**|  | [optional] |
| **amount_to** | **float**|  | [optional] |
| **processed** | **bool**|  | [optional] |
| **date_from** | **\DateTime**|  | [optional] |
| **date_to** | **\DateTime**|  | [optional] |
| **page** | **int**|  | [optional] [default to 1] |
| **limit** | **int**|  | [optional] [default to 10] |

### Return type

[**\PronesoftEcfSdk\Model\ReceivedDocumentListResponse**](../Model/ReceivedDocumentListResponse.md)

### Authorization

[oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
