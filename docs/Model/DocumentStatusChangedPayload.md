# DocumentStatusChangedPayload

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**document_id** | **string** | Internal document ID for polling. |
**encf** | **string** | e-NCF fiscal number. |
**issuer_rnc** | **string** | RNC of the issuing company (associated or main). |
**status** | **string** | Public lifecycle status. |
**legal_status** | **string** | Fiscal result from DGII. Only present when status&#x3D;FINISHED. | [optional]
**document_type** | **string** | Tipo de documento code (31&#x3D;Invoice, 32&#x3D;Credit Note, etc.) | [optional]
**track_id** | **string** | DGII tracking ID. | [optional]
**dgii_message** | **string** | Human-readable DGII response message. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
