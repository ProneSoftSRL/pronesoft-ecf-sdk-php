# PronesoftEcfSdk\TaxSequencesApi



All URIs are relative to https://api.ecf.sandbox.pronesoft.com/api/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createTaxSequence()**](TaxSequencesApi.md#createTaxSequence) | **POST** /tax-sequences/create | Crear nueva secuencia de NCF |
| [**getNextNumber()**](TaxSequencesApi.md#getNextNumber) | **GET** /tax-sequences/next | Obtener siguiente número fiscal disponible |
| [**listTaxSequences()**](TaxSequencesApi.md#listTaxSequences) | **GET** /tax-sequences | Listar secuencias de NCF |
| [**updateTaxSequence()**](TaxSequencesApi.md#updateTaxSequence) | **PATCH** /tax-sequences/update | Actualizar secuencia de NCF |
| [**voidTaxSequence()**](TaxSequencesApi.md#voidTaxSequence) | **POST** /tax-sequences/void | Anular rango de números fiscales |


## `createTaxSequence()`

```php
createTaxSequence($create_tax_sequence_request, $x_tenant_id): \PronesoftEcfSdk\Model\CreateTaxSequence201Response
```

Crear nueva secuencia de NCF

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oauth2
$config = PronesoftEcfSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new PronesoftEcfSdk\Api\TaxSequencesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_tax_sequence_request = {"type":"E32","from":1,"to":10000,"quantity":10000,"expiration":"2025-12-31","environment":"TesteCF"}; // \PronesoftEcfSdk\Model\CreateTaxSequenceRequest
$x_tenant_id = 468a4aa1-1b80-447e-9ecb-400e39f7d798; // string | UUID de la empresa asociada (sucursal). Incluir SOLO cuando se actúa en nombre de una sucursal. Omitir cuando se actúa como empresa principal.

try {
    $result = $apiInstance->createTaxSequence($create_tax_sequence_request, $x_tenant_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TaxSequencesApi->createTaxSequence: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_tax_sequence_request** | [**\PronesoftEcfSdk\Model\CreateTaxSequenceRequest**](../Model/CreateTaxSequenceRequest.md)|  | |
| **x_tenant_id** | **string**| UUID de la empresa asociada (sucursal). Incluir SOLO cuando se actúa en nombre de una sucursal. Omitir cuando se actúa como empresa principal. | [optional] |

### Return type

[**\PronesoftEcfSdk\Model\CreateTaxSequence201Response**](../Model/CreateTaxSequence201Response.md)

### Authorization

[oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getNextNumber()`

```php
getNextNumber($type, $environment, $x_tenant_id): \PronesoftEcfSdk\Model\GetNextNumber200Response
```

Obtener siguiente número fiscal disponible

Retorna el siguiente número e-NCF disponible. Úsalo como invoiceNumber al enviar.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oauth2
$config = PronesoftEcfSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new PronesoftEcfSdk\Api\TaxSequencesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$type = new \PronesoftEcfSdk\Model\\PronesoftEcfSdk\Model\InvoiceTypeSequence(); // \PronesoftEcfSdk\Model\InvoiceTypeSequence
$environment = new \PronesoftEcfSdk\Model\\PronesoftEcfSdk\Model\Environment(); // \PronesoftEcfSdk\Model\Environment
$x_tenant_id = 468a4aa1-1b80-447e-9ecb-400e39f7d798; // string | UUID de la empresa asociada (sucursal). Incluir SOLO cuando se actúa en nombre de una sucursal. Omitir cuando se actúa como empresa principal.

try {
    $result = $apiInstance->getNextNumber($type, $environment, $x_tenant_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TaxSequencesApi->getNextNumber: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **type** | [**\PronesoftEcfSdk\Model\InvoiceTypeSequence**](../Model/.md)|  | |
| **environment** | [**\PronesoftEcfSdk\Model\Environment**](../Model/.md)|  | |
| **x_tenant_id** | **string**| UUID de la empresa asociada (sucursal). Incluir SOLO cuando se actúa en nombre de una sucursal. Omitir cuando se actúa como empresa principal. | [optional] |

### Return type

[**\PronesoftEcfSdk\Model\GetNextNumber200Response**](../Model/GetNextNumber200Response.md)

### Authorization

[oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listTaxSequences()`

```php
listTaxSequences($x_tenant_id, $type, $environment, $page, $limit): \PronesoftEcfSdk\Model\ListTaxSequences200Response
```

Listar secuencias de NCF

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oauth2
$config = PronesoftEcfSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new PronesoftEcfSdk\Api\TaxSequencesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$x_tenant_id = 468a4aa1-1b80-447e-9ecb-400e39f7d798; // string | UUID de la empresa asociada (sucursal). Incluir SOLO cuando se actúa en nombre de una sucursal. Omitir cuando se actúa como empresa principal.
$type = new \PronesoftEcfSdk\Model\\PronesoftEcfSdk\Model\InvoiceTypeSequence(); // \PronesoftEcfSdk\Model\InvoiceTypeSequence
$environment = new \PronesoftEcfSdk\Model\\PronesoftEcfSdk\Model\Environment(); // \PronesoftEcfSdk\Model\Environment
$page = 1; // int
$limit = 10; // int

try {
    $result = $apiInstance->listTaxSequences($x_tenant_id, $type, $environment, $page, $limit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TaxSequencesApi->listTaxSequences: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **x_tenant_id** | **string**| UUID de la empresa asociada (sucursal). Incluir SOLO cuando se actúa en nombre de una sucursal. Omitir cuando se actúa como empresa principal. | [optional] |
| **type** | [**\PronesoftEcfSdk\Model\InvoiceTypeSequence**](../Model/.md)|  | [optional] |
| **environment** | [**\PronesoftEcfSdk\Model\Environment**](../Model/.md)|  | [optional] |
| **page** | **int**|  | [optional] [default to 1] |
| **limit** | **int**|  | [optional] [default to 10] |

### Return type

[**\PronesoftEcfSdk\Model\ListTaxSequences200Response**](../Model/ListTaxSequences200Response.md)

### Authorization

[oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateTaxSequence()`

```php
updateTaxSequence($id, $update_tax_sequence_request, $x_tenant_id)
```

Actualizar secuencia de NCF

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oauth2
$config = PronesoftEcfSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new PronesoftEcfSdk\Api\TaxSequencesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string
$update_tax_sequence_request = new \PronesoftEcfSdk\Model\UpdateTaxSequenceRequest(); // \PronesoftEcfSdk\Model\UpdateTaxSequenceRequest
$x_tenant_id = 468a4aa1-1b80-447e-9ecb-400e39f7d798; // string | UUID de la empresa asociada (sucursal). Incluir SOLO cuando se actúa en nombre de una sucursal. Omitir cuando se actúa como empresa principal.

try {
    $apiInstance->updateTaxSequence($id, $update_tax_sequence_request, $x_tenant_id);
} catch (Exception $e) {
    echo 'Exception when calling TaxSequencesApi->updateTaxSequence: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |
| **update_tax_sequence_request** | [**\PronesoftEcfSdk\Model\UpdateTaxSequenceRequest**](../Model/UpdateTaxSequenceRequest.md)|  | |
| **x_tenant_id** | **string**| UUID de la empresa asociada (sucursal). Incluir SOLO cuando se actúa en nombre de una sucursal. Omitir cuando se actúa como empresa principal. | [optional] |

### Return type

void (empty response body)

### Authorization

[oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `voidTaxSequence()`

```php
voidTaxSequence($void_tax_sequence_request, $x_tenant_id): \PronesoftEcfSdk\Model\VoidTaxSequence200Response
```

Anular rango de números fiscales

Cancela números fiscales no utilizados y notifica a la DGII.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oauth2
$config = PronesoftEcfSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new PronesoftEcfSdk\Api\TaxSequencesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$void_tax_sequence_request = new \PronesoftEcfSdk\Model\VoidTaxSequenceRequest(); // \PronesoftEcfSdk\Model\VoidTaxSequenceRequest
$x_tenant_id = 468a4aa1-1b80-447e-9ecb-400e39f7d798; // string | UUID de la empresa asociada (sucursal). Incluir SOLO cuando se actúa en nombre de una sucursal. Omitir cuando se actúa como empresa principal.

try {
    $result = $apiInstance->voidTaxSequence($void_tax_sequence_request, $x_tenant_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TaxSequencesApi->voidTaxSequence: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **void_tax_sequence_request** | [**\PronesoftEcfSdk\Model\VoidTaxSequenceRequest**](../Model/VoidTaxSequenceRequest.md)|  | |
| **x_tenant_id** | **string**| UUID de la empresa asociada (sucursal). Incluir SOLO cuando se actúa en nombre de una sucursal. Omitir cuando se actúa como empresa principal. | [optional] |

### Return type

[**\PronesoftEcfSdk\Model\VoidTaxSequence200Response**](../Model/VoidTaxSequence200Response.md)

### Authorization

[oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
