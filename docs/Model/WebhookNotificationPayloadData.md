# WebhookNotificationPayloadData

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**document_id** | **string** | Internal document ID for polling. |
**encf** | **string** |  |
**issuer_rnc** | **string** | RNC of the issuing company (associated or main). |
**status** | **string** | Estado final del proceso. |
**legal_status** | **string** | Fiscal result from DGII. Only present when status&#x3D;FINISHED. | [optional]
**document_type** | **string** | Tipo de documento code (31&#x3D;Invoice, 32&#x3D;Credit Note, etc.) | [optional]
**track_id** | **string** | DGII tracking ID. | [optional]
**dgii_message** | **string** | Human-readable DGII response message. | [optional]
**sender_rnc** | **string** |  |
**receiver_rnc** | **string** |  |
**total_amount** | **float** |  |
**issue_date** | **\DateTime** |  |
**received_at** | **\DateTime** | Fecha de recepción del documento. |
**rejection_reason** | **string** | Razón del rechazo (solo si status es &#39;rejected&#39;). | [optional]
**error_code** | **string** | Código de error de validación. |
**message** | **string** | Descripción del error. |
**reason** | **string** | Motivo de la anulación. |
**retry_at** | **\DateTime** | Fecha estimada de reintento de envío. | [optional]
**approval_status** | **string** |  |
**approval_date** | **\DateTime** |  |
**rejection_code** | **string** | Código de rechazo (solo si approvalStatus es &#39;rejected&#39;). | [optional]
**rejection_description** | **string** | Descripción del rechazo (solo si approvalStatus es &#39;rejected&#39;). | [optional]
**expiration_date** | **\DateTime** |  |
**days_left** | **int** | Días restantes hasta el vencimiento. |
**ip** | **string** |  |
**user_agent** | **string** |  |
**city** | **string** | Ciudad detectada por geolocalización. | [optional]
**app_id** | **string** | ID de la aplicación cuya clave fue rotada. |
**rotated_at** | **\DateTime** |  |
**usage_percent** | **float** | Porcentaje de uso del plan. |
**remaining_docs** | **int** | Documentos restantes en el plan. |
**invoice_id** | **string** |  |
**amount** | **float** |  |
**pdf_url** | **string** | URL de descarga del PDF de la factura. |
**sequence_type** | **string** |  |
**remaining** | **int** | Cantidad de NCF restantes. |
**alert_level** | **string** | Nivel de alerta. &#x60;warning&#x60; &#x3D; bajo; &#x60;danger&#x60; &#x3D; crítico. |
**voided_range** | **string** | Rango de NCF anulados. |
**branch_id** | **string** |  |
**rnc** | **string** |  |
**name** | **string** | Nombre de la empresa asociada. |
**new_status** | **string** | Nuevo estado de la sucursal. |
**email** | **string** |  |
**role** | **string** |  |
**invited_by** | **string** | Email del usuario que realizó la invitación. |
**user_id** | **string** |  |
**joined_at** | **\DateTime** |  |
**removed_by** | **string** | Email del usuario que realizó la remoción. |
**process_id** | **string** |  |
**business_name** | **string** |  |
**download_url** | **string** | URL de descarga del certificado (si aplica). | [optional]
**completed_at** | **\DateTime** |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
