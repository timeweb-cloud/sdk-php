# OpenAPI\Client\NetworkDrivesApi

All URIs are relative to https://api.timeweb.cloud, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createNetworkDrive()**](NetworkDrivesApi.md#createNetworkDrive) | **POST** /api/v1/network-drives | Создание сетевого диска |
| [**deleteNetworkDrive()**](NetworkDrivesApi.md#deleteNetworkDrive) | **DELETE** /api/v1/network-drives/{network_drive_id} | Удаление сетевого диска по идентификатору |
| [**getNetworkDrive()**](NetworkDrivesApi.md#getNetworkDrive) | **GET** /api/v1/network-drives/{network_drive_id} | Получение сетевого диска |
| [**getNetworkDrives()**](NetworkDrivesApi.md#getNetworkDrives) | **GET** /api/v1/network-drives | Получение списка cетевых дисков |
| [**getNetworkDrivesAvailableResources()**](NetworkDrivesApi.md#getNetworkDrivesAvailableResources) | **GET** /api/v1/network-drives/available-resources | Получение списка сервисов доступных для подключения диска |
| [**getNetworkDrivesPresets()**](NetworkDrivesApi.md#getNetworkDrivesPresets) | **GET** /api/v1/presets/network-drives | Получение списка доступных тарифов для сетевого диска |
| [**mountNetworkDrive()**](NetworkDrivesApi.md#mountNetworkDrive) | **POST** /api/v1/network-drives/{network_drive_id}/bind | Подключить сетевой диск к сервису |
| [**unmountNetworkDrive()**](NetworkDrivesApi.md#unmountNetworkDrive) | **POST** /api/v1/network-drives/{network_drive_id}/unbind | Отключить сетевой диск от сервиса |
| [**updateNetworkDrive()**](NetworkDrivesApi.md#updateNetworkDrive) | **PATCH** /api/v1/network-drives/{network_drive_id} | Изменение сетевого диска по ID |


## `createNetworkDrive()`

```php
createNetworkDrive($create_network_drive): \OpenAPI\Client\Model\CreateNetworkDrive201Response
```

Создание сетевого диска

Чтобы создать создать сетевой диск, отправьте POST-запрос в `/api/v1/network-drives`, задав необходимые атрибуты.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\NetworkDrivesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_network_drive = new \OpenAPI\Client\Model\CreateNetworkDrive(); // \OpenAPI\Client\Model\CreateNetworkDrive

try {
    $result = $apiInstance->createNetworkDrive($create_network_drive);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NetworkDrivesApi->createNetworkDrive: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_network_drive** | [**\OpenAPI\Client\Model\CreateNetworkDrive**](../Model/CreateNetworkDrive.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateNetworkDrive201Response**](../Model/CreateNetworkDrive201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteNetworkDrive()`

```php
deleteNetworkDrive($network_drive_id)
```

Удаление сетевого диска по идентификатору

Чтобы удалить сетевой диск, отправьте DELETE-запрос на `/api/v1/network-drives/{network_drive_id}`

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\NetworkDrivesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$network_drive_id = 87fa289f-1513-4c4d-8d49-5707f411f14b; // string | ID сетевого диска

try {
    $apiInstance->deleteNetworkDrive($network_drive_id);
} catch (Exception $e) {
    echo 'Exception when calling NetworkDrivesApi->deleteNetworkDrive: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **network_drive_id** | **string**| ID сетевого диска | |

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

## `getNetworkDrive()`

```php
getNetworkDrive($network_drive_id): \OpenAPI\Client\Model\CreateNetworkDrive201Response
```

Получение сетевого диска

Чтобы отобразить информацию об отдельном сетевом диске, отправьте запрос GET на `api/v1/network-drives/{network_drive_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\NetworkDrivesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$network_drive_id = 87fa289f-1513-4c4d-8d49-5707f411f14b; // string | ID сетевого диска

try {
    $result = $apiInstance->getNetworkDrive($network_drive_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NetworkDrivesApi->getNetworkDrive: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **network_drive_id** | **string**| ID сетевого диска | |

### Return type

[**\OpenAPI\Client\Model\CreateNetworkDrive201Response**](../Model/CreateNetworkDrive201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getNetworkDrives()`

```php
getNetworkDrives(): \OpenAPI\Client\Model\GetNetworkDrives200Response
```

Получение списка cетевых дисков

Чтобы получить список сетевых дисков, отправьте GET-запрос на `/api/v1/network-drives`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\NetworkDrivesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getNetworkDrives();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NetworkDrivesApi->getNetworkDrives: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\GetNetworkDrives200Response**](../Model/GetNetworkDrives200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getNetworkDrivesAvailableResources()`

```php
getNetworkDrivesAvailableResources(): \OpenAPI\Client\Model\GetNetworkDrivesAvailableResources200Response
```

Получение списка сервисов доступных для подключения диска

Чтобы получить список сервисов, отправьте GET-запрос на `/api/v1/network-drives/available-resources`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\NetworkDrivesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getNetworkDrivesAvailableResources();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NetworkDrivesApi->getNetworkDrivesAvailableResources: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\GetNetworkDrivesAvailableResources200Response**](../Model/GetNetworkDrivesAvailableResources200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getNetworkDrivesPresets()`

```php
getNetworkDrivesPresets(): \OpenAPI\Client\Model\GetNetworkDrivesPresets200Response
```

Получение списка доступных тарифов для сетевого диска

Чтобы получить список тарифов, отправьте GET-запрос на `/api/v1/presets/network-drives`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\NetworkDrivesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getNetworkDrivesPresets();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NetworkDrivesApi->getNetworkDrivesPresets: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\GetNetworkDrivesPresets200Response**](../Model/GetNetworkDrivesPresets200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `mountNetworkDrive()`

```php
mountNetworkDrive($network_drive_id, $mount_network_drive)
```

Подключить сетевой диск к сервису

Чтобы подключить сетевой диск к сервису, отправьте POST-запрос на `/api/v1/network-drives/{network_drive_id}/mount`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\NetworkDrivesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$network_drive_id = 87fa289f-1513-4c4d-8d49-5707f411f14b; // string | ID сетевого диска
$mount_network_drive = new \OpenAPI\Client\Model\MountNetworkDrive(); // \OpenAPI\Client\Model\MountNetworkDrive

try {
    $apiInstance->mountNetworkDrive($network_drive_id, $mount_network_drive);
} catch (Exception $e) {
    echo 'Exception when calling NetworkDrivesApi->mountNetworkDrive: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **network_drive_id** | **string**| ID сетевого диска | |
| **mount_network_drive** | [**\OpenAPI\Client\Model\MountNetworkDrive**](../Model/MountNetworkDrive.md)|  | |

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

## `unmountNetworkDrive()`

```php
unmountNetworkDrive($network_drive_id)
```

Отключить сетевой диск от сервиса

Чтобы отключить сетевой диск от сервиса, отправьте POST-запрос на `/api/v1/network-drives/{network_drive_id}/unmount`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\NetworkDrivesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$network_drive_id = 87fa289f-1513-4c4d-8d49-5707f411f14b; // string | ID сетевого диска

try {
    $apiInstance->unmountNetworkDrive($network_drive_id);
} catch (Exception $e) {
    echo 'Exception when calling NetworkDrivesApi->unmountNetworkDrive: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **network_drive_id** | **string**| ID сетевого диска | |

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

## `updateNetworkDrive()`

```php
updateNetworkDrive($network_drive_id, $update_network_drive): \OpenAPI\Client\Model\CreateNetworkDrive201Response
```

Изменение сетевого диска по ID

Чтобы изменить сетевой диск, отправьте PATCH-запрос на `/api/v1/network-drives/{network_drive_id}`

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\NetworkDrivesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$network_drive_id = 87fa289f-1513-4c4d-8d49-5707f411f14b; // string | ID сетевого диска
$update_network_drive = new \OpenAPI\Client\Model\UpdateNetworkDrive(); // \OpenAPI\Client\Model\UpdateNetworkDrive

try {
    $result = $apiInstance->updateNetworkDrive($network_drive_id, $update_network_drive);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NetworkDrivesApi->updateNetworkDrive: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **network_drive_id** | **string**| ID сетевого диска | |
| **update_network_drive** | [**\OpenAPI\Client\Model\UpdateNetworkDrive**](../Model/UpdateNetworkDrive.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateNetworkDrive201Response**](../Model/CreateNetworkDrive201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
