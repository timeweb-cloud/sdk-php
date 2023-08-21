# OpenAPI\Client\DedicatedServersApi

All URIs are relative to https://api.timeweb.cloud, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createDedicatedServer()**](DedicatedServersApi.md#createDedicatedServer) | **POST** /api/v1/dedicated-servers | Создание выделенного сервера |
| [**deleteDedicatedServer()**](DedicatedServersApi.md#deleteDedicatedServer) | **DELETE** /api/v1/dedicated-servers/{dedicated_id} | Удаление выделенного сервера |
| [**getDedicatedServer()**](DedicatedServersApi.md#getDedicatedServer) | **GET** /api/v1/dedicated-servers/{dedicated_id} | Получение выделенного сервера |
| [**getDedicatedServerPresetAdditionalServices()**](DedicatedServersApi.md#getDedicatedServerPresetAdditionalServices) | **GET** /api/v1/presets/dedicated-servers/{preset_id}/additional-services | Получение дополнительных услуг для выделенного сервера |
| [**getDedicatedServers()**](DedicatedServersApi.md#getDedicatedServers) | **GET** /api/v1/dedicated-servers | Получение списка выделенных серверов |
| [**getDedicatedServersPresets()**](DedicatedServersApi.md#getDedicatedServersPresets) | **GET** /api/v1/presets/dedicated-servers | Получение списка тарифов для выделенного сервера |
| [**updateDedicatedServer()**](DedicatedServersApi.md#updateDedicatedServer) | **PATCH** /api/v1/dedicated-servers/{dedicated_id} | Обновление выделенного сервера |


## `createDedicatedServer()`

```php
createDedicatedServer($create_dedicated_server): \OpenAPI\Client\Model\CreateDedicatedServer201Response
```

Создание выделенного сервера

Чтобы создать выделенный сервер, отправьте POST-запрос в `api/v1/dedicated-servers`, задав необходимые атрибуты.  Выделенный сервер будет создан с использованием предоставленной информации. Тело ответа будет содержать объект JSON с информацией о созданном выделенном сервере.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DedicatedServersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_dedicated_server = new \OpenAPI\Client\Model\CreateDedicatedServer(); // \OpenAPI\Client\Model\CreateDedicatedServer

try {
    $result = $apiInstance->createDedicatedServer($create_dedicated_server);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DedicatedServersApi->createDedicatedServer: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_dedicated_server** | [**\OpenAPI\Client\Model\CreateDedicatedServer**](../Model/CreateDedicatedServer.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateDedicatedServer201Response**](../Model/CreateDedicatedServer201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteDedicatedServer()`

```php
deleteDedicatedServer($dedicated_id)
```

Удаление выделенного сервера

Чтобы удалить выделенный сервер, отправьте запрос DELETE в `api/v1/dedicated-servers/{dedicated_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DedicatedServersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$dedicated_id = 1051; // int | Уникальный идентификатор выделенного сервера.

try {
    $apiInstance->deleteDedicatedServer($dedicated_id);
} catch (Exception $e) {
    echo 'Exception when calling DedicatedServersApi->deleteDedicatedServer: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **dedicated_id** | **int**| Уникальный идентификатор выделенного сервера. | |

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

## `getDedicatedServer()`

```php
getDedicatedServer($dedicated_id): \OpenAPI\Client\Model\CreateDedicatedServer201Response
```

Получение выделенного сервера

Чтобы отобразить информацию об отдельном выделенном сервере, отправьте запрос GET на `api/v1/dedicated-servers/{dedicated_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DedicatedServersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$dedicated_id = 1051; // int | Уникальный идентификатор выделенного сервера.

try {
    $result = $apiInstance->getDedicatedServer($dedicated_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DedicatedServersApi->getDedicatedServer: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **dedicated_id** | **int**| Уникальный идентификатор выделенного сервера. | |

### Return type

[**\OpenAPI\Client\Model\CreateDedicatedServer201Response**](../Model/CreateDedicatedServer201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDedicatedServerPresetAdditionalServices()`

```php
getDedicatedServerPresetAdditionalServices($preset_id): \OpenAPI\Client\Model\GetDedicatedServerPresetAdditionalServices200Response
```

Получение дополнительных услуг для выделенного сервера

Чтобы получить список всех дополнительных услуг для выделенных серверов, отправьте GET-запрос на `/api/v1/presets/dedicated-servers/{preset_id}/additional-services`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DedicatedServersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$preset_id = 1051; // int | Уникальный идентификатор тарифа выделенного сервера.

try {
    $result = $apiInstance->getDedicatedServerPresetAdditionalServices($preset_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DedicatedServersApi->getDedicatedServerPresetAdditionalServices: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **preset_id** | **int**| Уникальный идентификатор тарифа выделенного сервера. | |

### Return type

[**\OpenAPI\Client\Model\GetDedicatedServerPresetAdditionalServices200Response**](../Model/GetDedicatedServerPresetAdditionalServices200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDedicatedServers()`

```php
getDedicatedServers(): \OpenAPI\Client\Model\GetDedicatedServers200Response
```

Получение списка выделенных серверов

Чтобы получить список всех выделенных серверов на вашем аккаунте, отправьте GET-запрос на `/api/v1/dedicated-servers`.   Тело ответа будет представлять собой объект JSON с ключом `dedicated_servers`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DedicatedServersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getDedicatedServers();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DedicatedServersApi->getDedicatedServers: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\GetDedicatedServers200Response**](../Model/GetDedicatedServers200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDedicatedServersPresets()`

```php
getDedicatedServersPresets($location): \OpenAPI\Client\Model\GetDedicatedServersPresets200Response
```

Получение списка тарифов для выделенного сервера

Чтобы получить список всех тарифов выделенных серверов, отправьте GET-запрос на `/api/v1/presets/dedicated-servers`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DedicatedServersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$location = 'location_example'; // string | Получение тарифов определенной локации.

try {
    $result = $apiInstance->getDedicatedServersPresets($location);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DedicatedServersApi->getDedicatedServersPresets: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **location** | **string**| Получение тарифов определенной локации. | [optional] |

### Return type

[**\OpenAPI\Client\Model\GetDedicatedServersPresets200Response**](../Model/GetDedicatedServersPresets200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateDedicatedServer()`

```php
updateDedicatedServer($dedicated_id, $update_dedicated_server_request): \OpenAPI\Client\Model\CreateDedicatedServer201Response
```

Обновление выделенного сервера

Чтобы обновить только определенные атрибуты выделенного сервера, отправьте запрос PATCH в `api/v1/dedicated-servers/{dedicated_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DedicatedServersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$dedicated_id = 1051; // int | Уникальный идентификатор выделенного сервера.
$update_dedicated_server_request = new \OpenAPI\Client\Model\UpdateDedicatedServerRequest(); // \OpenAPI\Client\Model\UpdateDedicatedServerRequest

try {
    $result = $apiInstance->updateDedicatedServer($dedicated_id, $update_dedicated_server_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DedicatedServersApi->updateDedicatedServer: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **dedicated_id** | **int**| Уникальный идентификатор выделенного сервера. | |
| **update_dedicated_server_request** | [**\OpenAPI\Client\Model\UpdateDedicatedServerRequest**](../Model/UpdateDedicatedServerRequest.md)|  | [optional] |

### Return type

[**\OpenAPI\Client\Model\CreateDedicatedServer201Response**](../Model/CreateDedicatedServer201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
