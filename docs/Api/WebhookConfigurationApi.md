# PronesoftEcfSdk\WebhookConfigurationApi



All URIs are relative to https://api.ecf.sandbox.pronesoft.com/api/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getWebhook()**](WebhookConfigurationApi.md#getWebhook) | **GET** /{rnc}/webhooks/{webhookId} | Detalle de un webhook |
| [**getWebhookStats()**](WebhookConfigurationApi.md#getWebhookStats) | **GET** /{rnc}/webhooks/{webhookId}/stats | Estadísticas de entregas del webhook |
| [**listWebhooks()**](WebhookConfigurationApi.md#listWebhooks) | **GET** /{rnc}/webhooks | Listar configuraciones de webhooks |


## `getWebhook()`

```php
getWebhook($rnc, $webhook_id): \PronesoftEcfSdk\Model\WebhookConfigDetail
```

Detalle de un webhook

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oauth2
$config = PronesoftEcfSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new PronesoftEcfSdk\Api\WebhookConfigurationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$rnc = 133190907; // string | RNC de la empresa (9 u 11 dígitos). En Sandbox usar valores con prefijo SBX.
$webhook_id = 'webhook_id_example'; // string

try {
    $result = $apiInstance->getWebhook($rnc, $webhook_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhookConfigurationApi->getWebhook: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **rnc** | **string**| RNC de la empresa (9 u 11 dígitos). En Sandbox usar valores con prefijo SBX. | |
| **webhook_id** | **string**|  | |

### Return type

[**\PronesoftEcfSdk\Model\WebhookConfigDetail**](../Model/WebhookConfigDetail.md)

### Authorization

[oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getWebhookStats()`

```php
getWebhookStats($rnc, $webhook_id, $period): \PronesoftEcfSdk\Model\WebhookStats
```

Estadísticas de entregas del webhook

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oauth2
$config = PronesoftEcfSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new PronesoftEcfSdk\Api\WebhookConfigurationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$rnc = 133190907; // string | RNC de la empresa (9 u 11 dígitos). En Sandbox usar valores con prefijo SBX.
$webhook_id = 'webhook_id_example'; // string
$period = 'month'; // string

try {
    $result = $apiInstance->getWebhookStats($rnc, $webhook_id, $period);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhookConfigurationApi->getWebhookStats: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **rnc** | **string**| RNC de la empresa (9 u 11 dígitos). En Sandbox usar valores con prefijo SBX. | |
| **webhook_id** | **string**|  | |
| **period** | **string**|  | [optional] [default to &#39;month&#39;] |

### Return type

[**\PronesoftEcfSdk\Model\WebhookStats**](../Model/WebhookStats.md)

### Authorization

[oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listWebhooks()`

```php
listWebhooks($rnc): \PronesoftEcfSdk\Model\WebhookConfigResponse[]
```

Listar configuraciones de webhooks

Retorna todos los webhooks del RNC. Los webhooks se crean solo desde el Portal.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oauth2
$config = PronesoftEcfSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new PronesoftEcfSdk\Api\WebhookConfigurationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$rnc = 133190907; // string | RNC de la empresa (9 u 11 dígitos). En Sandbox usar valores con prefijo SBX.

try {
    $result = $apiInstance->listWebhooks($rnc);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhookConfigurationApi->listWebhooks: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **rnc** | **string**| RNC de la empresa (9 u 11 dígitos). En Sandbox usar valores con prefijo SBX. | |

### Return type

[**\PronesoftEcfSdk\Model\WebhookConfigResponse[]**](../Model/WebhookConfigResponse.md)

### Authorization

[oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
