# ElectronicDocument

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**version** | **string** | Siempre \&quot;1.0\&quot;. | [optional] [default to '1.0']
**invoice_type** | [**\PronesoftEcfSdk\Model\InvoiceType**](InvoiceType.md) |  |
**invoice_number** | **string** | Número e-NCF (ej. E310000000001 — E + 2 dígitos tipo + 9 dígitos secuencia). **Opcional**: si se omite, el sistema lo asigna automáticamente desde la secuencia registrada para ese &#x60;invoiceType&#x60;. | [optional]
**group_id** | **string** | Optional Group ID for batch processing | [optional]
**issue_date** | **\DateTime** |  |
**expiration_date** | **\DateTime** |  | [optional]
**credit_note_indicator** | **string** | Credit Notes only: 0&#x3D;affected invoice &lt;&#x3D;30 days, 1&#x3D;&gt;30 days | [optional]
**deferred_sending_indicator** | **string** |  | [optional]
**taxed_amount_indicator** | **string** |  | [optional]
**income_type** | **string** | 01&#x3D;Operations, 02&#x3D;Financial, 03&#x3D;Extraordinary, 04&#x3D;Leasing, 05&#x3D;Assets, 06&#x3D;Other | [optional]
**payment_type** | **string** | 1&#x3D;Cash, 2&#x3D;Credit, 3&#x3D;Mixed | [optional]
**payment_deadline** | **\DateTime** |  | [optional]
**payment_terms** | **string** |  | [optional]
**payment_forms** | [**\PronesoftEcfSdk\Model\PaymentForm[]**](PaymentForm.md) | Payment breakdown. Required. |
**payment_account_type** | [**\PronesoftEcfSdk\Model\AccountType**](AccountType.md) |  | [optional]
**payment_account_number** | **string** |  | [optional]
**payment_bank** | **string** |  | [optional]
**service_start_date** | **\DateTime** |  | [optional]
**service_end_date** | **\DateTime** |  | [optional]
**total_pages** | **int** |  | [optional]
**issuer_rnc** | **string** | RNC of the issuing company. | [optional]
**issuer_business_name** | **string** |  | [optional]
**issuer_commercial_name** | **string** |  | [optional]
**branch_name** | **string** |  | [optional]
**issuer_address** | **string** |  | [optional]
**municipality_code** | **string** |  | [optional]
**province_code** | **string** |  | [optional]
**issuer_phones** | **string[]** |  | [optional]
**issuer_email** | **string** |  | [optional]
**issuer_website** | **string** |  | [optional]
**issuer_economic_activity** | **string** |  | [optional]
**seller_code** | **string** |  | [optional]
**internal_invoice_number** | **string** |  | [optional]
**internal_order_number** | **int** |  | [optional]
**sales_zone** | **string** |  | [optional]
**sales_route** | **string** |  | [optional]
**additional_issuer_info** | **string** |  | [optional]
**buyer** | [**\PronesoftEcfSdk\Model\Buyer**](Buyer.md) |  | [optional]
**items** | [**\PronesoftEcfSdk\Model\Item[]**](Item.md) |  |
**totals** | [**\PronesoftEcfSdk\Model\Totals**](Totals.md) |  |
**transport** | [**\PronesoftEcfSdk\Model\Transport**](Transport.md) |  | [optional]
**additional_info** | [**\PronesoftEcfSdk\Model\AdditionalInfo**](AdditionalInfo.md) |  | [optional]
**alternative_currency** | [**\PronesoftEcfSdk\Model\AlternativeCurrency**](AlternativeCurrency.md) |  | [optional]
**reference_info** | [**\PronesoftEcfSdk\Model\ReferenceInfo**](ReferenceInfo.md) |  | [optional]
**subtotals** | [**\PronesoftEcfSdk\Model\Subtotal**](Subtotal.md) |  | [optional]
**discounts_or_surcharges** | [**\PronesoftEcfSdk\Model\DiscountOrSurcharge[]**](DiscountOrSurcharge.md) |  | [optional]
**pages** | [**\PronesoftEcfSdk\Model\Page**](Page.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
