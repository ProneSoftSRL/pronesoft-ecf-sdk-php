# PronesoftEcfSdk\AssociatedCompaniesApi



All URIs are relative to https://api.ecf.sandbox.pronesoft.com/api/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createAssociatedCompany()**](AssociatedCompaniesApi.md#createAssociatedCompany) | **POST** /associated-companies | Crear empresa asociada / sucursal |
| [**deleteAssociatedCompany()**](AssociatedCompaniesApi.md#deleteAssociatedCompany) | **DELETE** /associated-companies/{companyId} | Eliminar empresa asociada |
| [**getCompanyDocumentMetrics()**](AssociatedCompaniesApi.md#getCompanyDocumentMetrics) | **GET** /associated-companies/{companyId}/documents-metrics | Métricas de documentos de la empresa |
| [**getCompanyMetrics()**](AssociatedCompaniesApi.md#getCompanyMetrics) | **GET** /associated-companies/{companyId}/metrics | Métricas de la empresa |
| [**listAssociatedCompanies()**](AssociatedCompaniesApi.md#listAssociatedCompanies) | **GET** /associated-companies | Listar empresas asociadas / sucursales |
| [**updateAssociatedCompany()**](AssociatedCompaniesApi.md#updateAssociatedCompany) | **PUT** /associated-companies/{companyId} | Actualizar empresa asociada |


## `createAssociatedCompany()`

```php
createAssociatedCompany($email, $password, $name, $rnc, $phone, $address, $city, $country, $printer_type, $first_name, $last_name, $job_title, $website, $category, $monthly_sales_range, $logo): \PronesoftEcfSdk\Model\CreateAssociatedCompany201Response
```

Crear empresa asociada / sucursal

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oauth2
$config = PronesoftEcfSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new PronesoftEcfSdk\Api\AssociatedCompaniesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$email = 'email_example'; // string
$password = 'password_example'; // string
$name = 'name_example'; // string
$rnc = 'rnc_example'; // string
$phone = 'phone_example'; // string
$address = 'address_example'; // string
$city = 'city_example'; // string
$country = 'country_example'; // string
$printer_type = new \PronesoftEcfSdk\Model\PrintFormat(); // \PronesoftEcfSdk\Model\PrintFormat
$first_name = 'first_name_example'; // string
$last_name = 'last_name_example'; // string
$job_title = 'job_title_example'; // string
$website = 'website_example'; // string
$category = 'category_example'; // string
$monthly_sales_range = 'monthly_sales_range_example'; // string
$logo = '/path/to/file.txt'; // \SplFileObject

try {
    $result = $apiInstance->createAssociatedCompany($email, $password, $name, $rnc, $phone, $address, $city, $country, $printer_type, $first_name, $last_name, $job_title, $website, $category, $monthly_sales_range, $logo);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AssociatedCompaniesApi->createAssociatedCompany: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **email** | **string**|  | |
| **password** | **string**|  | |
| **name** | **string**|  | |
| **rnc** | **string**|  | |
| **phone** | **string**|  | |
| **address** | **string**|  | |
| **city** | **string**|  | |
| **country** | **string**|  | |
| **printer_type** | [**\PronesoftEcfSdk\Model\PrintFormat**](../Model/PrintFormat.md)|  | |
| **first_name** | **string**|  | [optional] |
| **last_name** | **string**|  | [optional] |
| **job_title** | **string**|  | [optional] |
| **website** | **string**|  | [optional] |
| **category** | **string**|  | [optional] |
| **monthly_sales_range** | **string**|  | [optional] |
| **logo** | **\SplFileObject****\SplFileObject**|  | [optional] |

### Return type

[**\PronesoftEcfSdk\Model\CreateAssociatedCompany201Response**](../Model/CreateAssociatedCompany201Response.md)

### Authorization

[oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteAssociatedCompany()`

```php
deleteAssociatedCompany($company_id): \PronesoftEcfSdk\Model\DeleteAssociatedCompany200Response
```

Eliminar empresa asociada

Elimina permanentemente una empresa asociada. Esta acción es irreversible.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oauth2
$config = PronesoftEcfSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new PronesoftEcfSdk\Api\AssociatedCompaniesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_id = 'company_id_example'; // string

try {
    $result = $apiInstance->deleteAssociatedCompany($company_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AssociatedCompaniesApi->deleteAssociatedCompany: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_id** | **string**|  | |

### Return type

[**\PronesoftEcfSdk\Model\DeleteAssociatedCompany200Response**](../Model/DeleteAssociatedCompany200Response.md)

### Authorization

[oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCompanyDocumentMetrics()`

```php
getCompanyDocumentMetrics($company_id): \PronesoftEcfSdk\Model\CompanyDocumentMetrics
```

Métricas de documentos de la empresa

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oauth2
$config = PronesoftEcfSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new PronesoftEcfSdk\Api\AssociatedCompaniesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_id = 'company_id_example'; // string

try {
    $result = $apiInstance->getCompanyDocumentMetrics($company_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AssociatedCompaniesApi->getCompanyDocumentMetrics: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_id** | **string**|  | |

### Return type

[**\PronesoftEcfSdk\Model\CompanyDocumentMetrics**](../Model/CompanyDocumentMetrics.md)

### Authorization

[oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCompanyMetrics()`

```php
getCompanyMetrics($company_id): \PronesoftEcfSdk\Model\CompanyMetrics
```

Métricas de la empresa

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oauth2
$config = PronesoftEcfSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new PronesoftEcfSdk\Api\AssociatedCompaniesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_id = 'company_id_example'; // string

try {
    $result = $apiInstance->getCompanyMetrics($company_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AssociatedCompaniesApi->getCompanyMetrics: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_id** | **string**|  | |

### Return type

[**\PronesoftEcfSdk\Model\CompanyMetrics**](../Model/CompanyMetrics.md)

### Authorization

[oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listAssociatedCompanies()`

```php
listAssociatedCompanies($page, $limit): \PronesoftEcfSdk\Model\AssociatedCompany[]
```

Listar empresas asociadas / sucursales

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oauth2
$config = PronesoftEcfSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new PronesoftEcfSdk\Api\AssociatedCompaniesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page = 1; // int
$limit = 10; // int

try {
    $result = $apiInstance->listAssociatedCompanies($page, $limit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AssociatedCompaniesApi->listAssociatedCompanies: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page** | **int**|  | [optional] [default to 1] |
| **limit** | **int**|  | [optional] [default to 10] |

### Return type

[**\PronesoftEcfSdk\Model\AssociatedCompany[]**](../Model/AssociatedCompany.md)

### Authorization

[oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateAssociatedCompany()`

```php
updateAssociatedCompany($company_id, $name, $phone, $website, $city, $country, $logo): \PronesoftEcfSdk\Model\CreateAssociatedCompany201Response
```

Actualizar empresa asociada

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oauth2
$config = PronesoftEcfSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new PronesoftEcfSdk\Api\AssociatedCompaniesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_id = 'company_id_example'; // string
$name = 'name_example'; // string
$phone = 'phone_example'; // string
$website = 'website_example'; // string
$city = 'city_example'; // string
$country = 'country_example'; // string
$logo = '/path/to/file.txt'; // \SplFileObject

try {
    $result = $apiInstance->updateAssociatedCompany($company_id, $name, $phone, $website, $city, $country, $logo);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AssociatedCompaniesApi->updateAssociatedCompany: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_id** | **string**|  | |
| **name** | **string**|  | [optional] |
| **phone** | **string**|  | [optional] |
| **website** | **string**|  | [optional] |
| **city** | **string**|  | [optional] |
| **country** | **string**|  | [optional] |
| **logo** | **\SplFileObject****\SplFileObject**|  | [optional] |

### Return type

[**\PronesoftEcfSdk\Model\CreateAssociatedCompany201Response**](../Model/CreateAssociatedCompany201Response.md)

### Authorization

[oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
