# DocumentReceivedPayload

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**encf** | **string** | Número de comprobante fiscal electrónico. |
**sender_rnc** | **string** | RNC del emisor del documento. |
**receiver_rnc** | **string** | RNC del receptor del documento. |
**total_amount** | **float** | Monto total del documento. |
**issue_date** | **\DateTime** | Fecha de emisión del documento. |
**received_at** | **\DateTime** | Fecha de recepción del documento. |
**status** | **string** | Estado del documento recibido. |
**rejection_reason** | **string** | Razón del rechazo (solo si status es &#39;rejected&#39;). | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
