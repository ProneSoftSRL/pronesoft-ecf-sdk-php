# WebhookNotificationPayload

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | ID único de la notificación. Úsalo para deduplicar entregas. |
**event** | [**\PronesoftEcfSdk\Model\WebhookEventType**](WebhookEventType.md) |  |
**timestamp** | **\DateTime** | Fecha y hora del evento en ISO 8601. |
**business_rnc** | **string** | RNC de la empresa que generó el evento. |
**data** | [**\PronesoftEcfSdk\Model\WebhookNotificationPayloadData**](WebhookNotificationPayloadData.md) |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
