# PronesoftEcfSdk\DigitalCertificatesApi



All URIs are relative to https://api.ecf.sandbox.pronesoft.com/api/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**uploadCertificate()**](DigitalCertificatesApi.md#uploadCertificate) | **POST** /{rnc}/certificates | Subir certificado digital (P12/PFX) |


## `uploadCertificate()`

```php
uploadCertificate($rnc, $file, $password): \PronesoftEcfSdk\Model\UploadCertificateResponse
```

Subir certificado digital (P12/PFX)

Sube el certificado de firma digital emitido por DGII para una empresa. Se almacena cifrado con AES-256-CBC. No existe endpoint de descarga. Tip Sandbox: Los RNC con prefijo SBX no requieren certificado.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oauth2
$config = PronesoftEcfSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new PronesoftEcfSdk\Api\DigitalCertificatesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$rnc = 133190907; // string | RNC de la empresa (9 u 11 dígitos). En Sandbox usar valores con prefijo SBX.
$file = '/path/to/file.txt'; // \SplFileObject | Archivo del certificado en formato .p12 o .pfx.
$password = 'password_example'; // string | Contraseña para desbloquear el certificado.

try {
    $result = $apiInstance->uploadCertificate($rnc, $file, $password);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DigitalCertificatesApi->uploadCertificate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **rnc** | **string**| RNC de la empresa (9 u 11 dígitos). En Sandbox usar valores con prefijo SBX. | |
| **file** | **\SplFileObject****\SplFileObject**| Archivo del certificado en formato .p12 o .pfx. | |
| **password** | **string**| Contraseña para desbloquear el certificado. | |

### Return type

[**\PronesoftEcfSdk\Model\UploadCertificateResponse**](../Model/UploadCertificateResponse.md)

### Authorization

[oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
