# OpenAPI\Client\VPCApi

All URIs are relative to https://api.timeweb.cloud, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createVPC()**](VPCApi.md#createVPC) | **POST** /api/v2/vpcs | Создание VPC |
| [**deleteVPC()**](VPCApi.md#deleteVPC) | **DELETE** /api/v1/vpcs/{vpc_id} | Удаление VPC по ID сети |
| [**getVPC()**](VPCApi.md#getVPC) | **GET** /api/v2/vpcs/{vpc_id} | Получение VPC |
| [**getVPCPorts()**](VPCApi.md#getVPCPorts) | **GET** /api/v1/vpcs/{vpc_id}/ports | Получение списка портов для VPC |
| [**getVPCServices()**](VPCApi.md#getVPCServices) | **GET** /api/v2/vpcs/{vpc_id}/services | Получение списка сервисов в VPC |
| [**getVPCs()**](VPCApi.md#getVPCs) | **GET** /api/v2/vpcs | Получение списка VPCs |
| [**updateVPCs()**](VPCApi.md#updateVPCs) | **PATCH** /api/v2/vpcs/{vpc_id} | Изменение VPC по ID сети |


## `createVPC()`

```php
createVPC($create_vpc): \OpenAPI\Client\Model\CreateVPC201Response
```

Создание VPC

Чтобы создать создать VPC, отправьте POST-запрос в `/api/v2/vpcs`, задав необходимые атрибуты.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\VPCApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_vpc = new \OpenAPI\Client\Model\CreateVpc(); // \OpenAPI\Client\Model\CreateVpc

try {
    $result = $apiInstance->createVPC($create_vpc);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VPCApi->createVPC: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_vpc** | [**\OpenAPI\Client\Model\CreateVpc**](../Model/CreateVpc.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateVPC201Response**](../Model/CreateVPC201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteVPC()`

```php
deleteVPC($vpc_id)
```

Удаление VPC по ID сети

Чтобы удалить VPC, отправьте DELETE-запрос на `/api/v1/vpcs/{vpc_id}`

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\VPCApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$vpc_id = network-1234567890; // string | ID сети

try {
    $apiInstance->deleteVPC($vpc_id);
} catch (Exception $e) {
    echo 'Exception when calling VPCApi->deleteVPC: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **vpc_id** | **string**| ID сети | |

### Return type

void (empty response body)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getVPC()`

```php
getVPC($vpc_id): \OpenAPI\Client\Model\CreateVPC201Response
```

Получение VPC

Чтобы отобразить информацию об отдельном VPC, отправьте запрос GET на `api/v2/vpcs/{vpc_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\VPCApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$vpc_id = network-1234567890; // string | ID сети

try {
    $result = $apiInstance->getVPC($vpc_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VPCApi->getVPC: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **vpc_id** | **string**| ID сети | |

### Return type

[**\OpenAPI\Client\Model\CreateVPC201Response**](../Model/CreateVPC201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getVPCPorts()`

```php
getVPCPorts($vpc_id): \OpenAPI\Client\Model\GetVPCPorts200Response
```

Получение списка портов для VPC

Чтобы получить список портов для VPC, отправьте GET-запрос на `/api/v1/vpcs/{vpc_id}/ports`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\VPCApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$vpc_id = network-1234567890; // string | ID сети

try {
    $result = $apiInstance->getVPCPorts($vpc_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VPCApi->getVPCPorts: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **vpc_id** | **string**| ID сети | |

### Return type

[**\OpenAPI\Client\Model\GetVPCPorts200Response**](../Model/GetVPCPorts200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getVPCServices()`

```php
getVPCServices($vpc_id): \OpenAPI\Client\Model\GetVPCServices200Response
```

Получение списка сервисов в VPC

Чтобы получить список сервисов, отправьте GET-запрос на `/api/v2/vpcs/{vpc_id}/services`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\VPCApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$vpc_id = network-1234567890; // string | ID сети

try {
    $result = $apiInstance->getVPCServices($vpc_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VPCApi->getVPCServices: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **vpc_id** | **string**| ID сети | |

### Return type

[**\OpenAPI\Client\Model\GetVPCServices200Response**](../Model/GetVPCServices200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getVPCs()`

```php
getVPCs(): \OpenAPI\Client\Model\GetVPCs200Response
```

Получение списка VPCs

Чтобы получить список VPCs, отправьте GET-запрос на `/api/v2/vpcs`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\VPCApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getVPCs();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VPCApi->getVPCs: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\GetVPCs200Response**](../Model/GetVPCs200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateVPCs()`

```php
updateVPCs($vpc_id, $update_vpc): \OpenAPI\Client\Model\CreateVPC201Response
```

Изменение VPC по ID сети

Чтобы изменить VPC, отправьте PATCH-запрос на `/api/v2/vpcs/{vpc_id}`

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\VPCApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$vpc_id = network-1234567890; // string | ID сети
$update_vpc = new \OpenAPI\Client\Model\UpdateVpc(); // \OpenAPI\Client\Model\UpdateVpc

try {
    $result = $apiInstance->updateVPCs($vpc_id, $update_vpc);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VPCApi->updateVPCs: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **vpc_id** | **string**| ID сети | |
| **update_vpc** | [**\OpenAPI\Client\Model\UpdateVpc**](../Model/UpdateVpc.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateVPC201Response**](../Model/CreateVPC201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
