# PronesoftEcfSdk\CommercialApprovalsApi



All URIs are relative to https://api.ecf.sandbox.pronesoft.com/api/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getCommercialApprovalById()**](CommercialApprovalsApi.md#getCommercialApprovalById) | **GET** /documents/approvals/{id} | Obtener aprobación comercial por ID |
| [**listCommercialApprovals()**](CommercialApprovalsApi.md#listCommercialApprovals) | **GET** /documents/approvals | Listar aprobaciones comerciales |


## `getCommercialApprovalById()`

```php
getCommercialApprovalById($id, $x_tenant_id): \PronesoftEcfSdk\Model\ApprovalItem
```

Obtener aprobación comercial por ID

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oauth2
$config = PronesoftEcfSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new PronesoftEcfSdk\Api\CommercialApprovalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string
$x_tenant_id = 468a4aa1-1b80-447e-9ecb-400e39f7d798; // string | UUID de la empresa asociada (sucursal). Incluir SOLO cuando se actúa en nombre de una sucursal. Omitir cuando se actúa como empresa principal.

try {
    $result = $apiInstance->getCommercialApprovalById($id, $x_tenant_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CommercialApprovalsApi->getCommercialApprovalById: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |
| **x_tenant_id** | **string**| UUID de la empresa asociada (sucursal). Incluir SOLO cuando se actúa en nombre de una sucursal. Omitir cuando se actúa como empresa principal. | [optional] |

### Return type

[**\PronesoftEcfSdk\Model\ApprovalItem**](../Model/ApprovalItem.md)

### Authorization

[oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listCommercialApprovals()`

```php
listCommercialApprovals($x_tenant_id, $ecf, $type, $status, $date_from, $date_to, $page, $limit): \PronesoftEcfSdk\Model\ApprovalListResponse
```

Listar aprobaciones comerciales

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oauth2
$config = PronesoftEcfSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new PronesoftEcfSdk\Api\CommercialApprovalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$x_tenant_id = 468a4aa1-1b80-447e-9ecb-400e39f7d798; // string | UUID de la empresa asociada (sucursal). Incluir SOLO cuando se actúa en nombre de una sucursal. Omitir cuando se actúa como empresa principal.
$ecf = 'ecf_example'; // string
$type = 'type_example'; // string | Tipo de documento
$status = 56; // int
$date_from = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime
$date_to = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime
$page = 1; // int
$limit = 10; // int

try {
    $result = $apiInstance->listCommercialApprovals($x_tenant_id, $ecf, $type, $status, $date_from, $date_to, $page, $limit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CommercialApprovalsApi->listCommercialApprovals: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **x_tenant_id** | **string**| UUID de la empresa asociada (sucursal). Incluir SOLO cuando se actúa en nombre de una sucursal. Omitir cuando se actúa como empresa principal. | [optional] |
| **ecf** | **string**|  | [optional] |
| **type** | **string**| Tipo de documento | [optional] |
| **status** | **int**|  | [optional] |
| **date_from** | **\DateTime**|  | [optional] |
| **date_to** | **\DateTime**|  | [optional] |
| **page** | **int**|  | [optional] [default to 1] |
| **limit** | **int**|  | [optional] [default to 10] |

### Return type

[**\PronesoftEcfSdk\Model\ApprovalListResponse**](../Model/ApprovalListResponse.md)

### Authorization

[oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
