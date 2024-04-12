# OpenAPI\Client\FloatingIPApi

All URIs are relative to https://api.timeweb.cloud, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**bindFloatingIp()**](FloatingIPApi.md#bindFloatingIp) | **POST** /api/v1/floating-ips/{floating_ip_id}/bind | Привязать IP к сервису |
| [**createFloatingIp()**](FloatingIPApi.md#createFloatingIp) | **POST** /api/v1/floating-ips | Создание плавающего IP |
| [**deleteFloatingIP()**](FloatingIPApi.md#deleteFloatingIP) | **DELETE** /api/v1/floating-ips/{floating_ip_id} | Удаление плавающего IP по идентификатору |
| [**getFloatingIp()**](FloatingIPApi.md#getFloatingIp) | **GET** /api/v1/floating-ips/{floating_ip_id} | Получение плавающего IP |
| [**getFloatingIps()**](FloatingIPApi.md#getFloatingIps) | **GET** /api/v1/floating-ips | Получение списка плавающих IP |
| [**unbindFloatingIp()**](FloatingIPApi.md#unbindFloatingIp) | **POST** /api/v1/floating-ips/{floating_ip_id}/unbind | Отвязать IP от сервиса |
| [**updateFloatingIP()**](FloatingIPApi.md#updateFloatingIP) | **PATCH** /api/v1/floating-ips/{floating_ip_id} | Изменение плавающего IP по идентификатору |


## `bindFloatingIp()`

```php
bindFloatingIp($floating_ip_id, $bind_floating_ip)
```

Привязать IP к сервису

Чтобы привязать IP к сервису, отправьте POST-запрос на `/api/v1/floating-ip/{floating_ip_id}/bind`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\FloatingIPApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$floating_ip_id = 87fa289f-1513-4c4d-8d49-5707f411f14b; // string | Идентификатор плавающего IP
$bind_floating_ip = new \OpenAPI\Client\Model\BindFloatingIp(); // \OpenAPI\Client\Model\BindFloatingIp

try {
    $apiInstance->bindFloatingIp($floating_ip_id, $bind_floating_ip);
} catch (Exception $e) {
    echo 'Exception when calling FloatingIPApi->bindFloatingIp: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **floating_ip_id** | **string**| Идентификатор плавающего IP | |
| **bind_floating_ip** | [**\OpenAPI\Client\Model\BindFloatingIp**](../Model/BindFloatingIp.md)|  | |

### Return type

void (empty response body)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createFloatingIp()`

```php
createFloatingIp($create_floating_ip): \OpenAPI\Client\Model\CreateFloatingIp201Response
```

Создание плавающего IP

Чтобы создать создать плавающий IP, отправьте POST-запрос в `/api/v1/floating-ips`, задав необходимые атрибуты.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\FloatingIPApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_floating_ip = new \OpenAPI\Client\Model\CreateFloatingIp(); // \OpenAPI\Client\Model\CreateFloatingIp

try {
    $result = $apiInstance->createFloatingIp($create_floating_ip);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FloatingIPApi->createFloatingIp: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_floating_ip** | [**\OpenAPI\Client\Model\CreateFloatingIp**](../Model/CreateFloatingIp.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateFloatingIp201Response**](../Model/CreateFloatingIp201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteFloatingIP()`

```php
deleteFloatingIP($floating_ip_id)
```

Удаление плавающего IP по идентификатору

Чтобы удалить плавающий IP, отправьте DELETE-запрос на `/api/v1/floating-ips/{floating_ip_id}`

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\FloatingIPApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$floating_ip_id = 87fa289f-1513-4c4d-8d49-5707f411f14b; // string | Идентификатор плавающего IP

try {
    $apiInstance->deleteFloatingIP($floating_ip_id);
} catch (Exception $e) {
    echo 'Exception when calling FloatingIPApi->deleteFloatingIP: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **floating_ip_id** | **string**| Идентификатор плавающего IP | |

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

## `getFloatingIp()`

```php
getFloatingIp($floating_ip_id): \OpenAPI\Client\Model\CreateFloatingIp201Response
```

Получение плавающего IP

Чтобы отобразить информацию об отдельном плавающем IP, отправьте запрос GET на `api/v1/floating-ips/{floating_ip_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\FloatingIPApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$floating_ip_id = 87fa289f-1513-4c4d-8d49-5707f411f14b; // string | Идентификатор плавающего IP

try {
    $result = $apiInstance->getFloatingIp($floating_ip_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FloatingIPApi->getFloatingIp: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **floating_ip_id** | **string**| Идентификатор плавающего IP | |

### Return type

[**\OpenAPI\Client\Model\CreateFloatingIp201Response**](../Model/CreateFloatingIp201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getFloatingIps()`

```php
getFloatingIps(): \OpenAPI\Client\Model\GetFloatingIps200Response
```

Получение списка плавающих IP

Чтобы получить список плавающих IP, отправьте GET-запрос на `/api/v1/floating-ips`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\FloatingIPApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getFloatingIps();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FloatingIPApi->getFloatingIps: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\GetFloatingIps200Response**](../Model/GetFloatingIps200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `unbindFloatingIp()`

```php
unbindFloatingIp($floating_ip_id)
```

Отвязать IP от сервиса

Чтобы отвязать IP от сервиса, отправьте POST-запрос на `/api/v1/floating-ip/{floating_ip_id}/unbind`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\FloatingIPApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$floating_ip_id = 87fa289f-1513-4c4d-8d49-5707f411f14b; // string | Идентификатор плавающего IP

try {
    $apiInstance->unbindFloatingIp($floating_ip_id);
} catch (Exception $e) {
    echo 'Exception when calling FloatingIPApi->unbindFloatingIp: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **floating_ip_id** | **string**| Идентификатор плавающего IP | |

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

## `updateFloatingIP()`

```php
updateFloatingIP($floating_ip_id, $update_floating_ip): \OpenAPI\Client\Model\CreateFloatingIp201Response
```

Изменение плавающего IP по идентификатору

Чтобы изменить плавающий IP, отправьте PATCH-запрос на `/api/v1/floating-ips/{floating_ip_id}`

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\FloatingIPApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$floating_ip_id = 87fa289f-1513-4c4d-8d49-5707f411f14b; // string | Идентификатор плавающего IP
$update_floating_ip = new \OpenAPI\Client\Model\UpdateFloatingIp(); // \OpenAPI\Client\Model\UpdateFloatingIp

try {
    $result = $apiInstance->updateFloatingIP($floating_ip_id, $update_floating_ip);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FloatingIPApi->updateFloatingIP: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **floating_ip_id** | **string**| Идентификатор плавающего IP | |
| **update_floating_ip** | [**\OpenAPI\Client\Model\UpdateFloatingIp**](../Model/UpdateFloatingIp.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateFloatingIp201Response**](../Model/CreateFloatingIp201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
