# EcfStatusResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | ID interno del documento. |
**stamp_date** | **\DateTime** | Fecha de emisión del documento (YYYY-MM-DD). | [optional]
**status** | **string** | Estado del proceso de envío a DGII. |
**legal_status** | **string** | Estado fiscal según la respuesta de DGII. null mientras no hay respuesta. | [optional]
**company_identification** | [**\PronesoftEcfSdk\Model\EcfSubmitResponseCompanyIdentification**](EcfSubmitResponseCompanyIdentification.md) |  |
**track_id** | **string** | ID de seguimiento asignado por DGII. | [optional]
**document_number** | **string** | Número de control electrónico (e-NCF). | [optional]
**encf** | **string** | Número e-NCF del documento. | [optional]
**contingency_mode** | **bool** | true si fue emitido en modo contingencia. | [optional]
**contingency_message** | **string** | Mensaje oficial DGII cuando contingencyMode es true. | [optional]
**document_stamp_url** | **string** | URL del código QR del documento. | [optional]
**pdf** | **string** | URL pre-firmada del PDF (expira en 1 hora). | [optional]
**xml_url** | **string** | URL pre-firmada del XML firmado (expira en 1 hora). | [optional]
**signature_date** | **\DateTime** | Fecha y hora de la firma digital. | [optional]
**security_code** | **string** | Código de seguridad del documento. | [optional]
**sequence_consumed** | **bool** | true si DGII confirmó el consumo de la secuencia. |
**government_response** | **array<string,mixed>** | Respuesta completa de DGII (disponible cuando status es FINISHED). | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
