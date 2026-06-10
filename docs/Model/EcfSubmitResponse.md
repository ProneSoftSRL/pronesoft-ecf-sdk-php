# EcfSubmitResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | ID interno del documento. Úsalo para &#x60;GET /ecf/status/{id}&#x60;. |
**stamp_date** | **\DateTime** | Fecha de emisión del documento (YYYY-MM-DD). | [optional]
**status** | **string** | Siempre &#x60;REGISTERED&#x60; al enviar. El estado fiscal llega vía webhook o polling. |
**legal_status** | **string** | Siempre &#x60;null&#x60; al enviar. Se actualiza tras la respuesta de DGII. | [optional]
**company_identification** | [**\PronesoftEcfSdk\Model\EcfSubmitResponseCompanyIdentification**](EcfSubmitResponseCompanyIdentification.md) |  |
**track_id** | **string** | Siempre &#x60;null&#x60; al enviar. Lo asigna DGII al procesar el documento. | [optional]
**document_number** | **string** | Número de control electrónico (e-NCF). Igual a &#x60;encf&#x60;. | [optional]
**encf** | **string** | Número e-NCF asignado al documento (ej. E310000000001). | [optional]
**contingency_mode** | **bool** | &#x60;true&#x60; si el documento fue emitido en modo contingencia (DGII no disponible). | [optional]
**contingency_message** | **string** | Mensaje oficial DGII cuando &#x60;contingencyMode&#x60; es &#x60;true&#x60;. | [optional]
**document_stamp_url** | **string** | URL del código QR del documento. | [optional]
**pdf** | **string** | URL pre-firmada del PDF (expira en 1 hora). | [optional]
**xml_url** | **string** | URL pre-firmada del XML firmado (expira en 1 hora). | [optional]
**signature_date** | **\DateTime** | Fecha y hora de la firma digital. | [optional]
**security_code** | **string** | Código de seguridad del documento. | [optional]
**sequence_consumed** | **bool** | Siempre &#x60;false&#x60; en el submit. Se confirma como &#x60;true&#x60; solo tras respuesta de DGII. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
