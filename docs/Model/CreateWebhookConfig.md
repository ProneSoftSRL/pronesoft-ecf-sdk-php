# CreateWebhookConfig

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**url** | **string** | Your HTTPS endpoint that will receive POST notifications. |
**event_types** | [**\PronesoftEcf\Model\WebhookEventType[]**](WebhookEventType.md) | List of events to subscribe to. |
**description** | **string** | Optional label for this webhook (for your reference). | [optional]
**secret** | **string** | Optional HMAC signing secret (min 16 characters). Pronesoft will sign payloads so you can verify they are authentic. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
