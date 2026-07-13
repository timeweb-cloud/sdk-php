# OpenAPI\Client\SnapshotsApi

All URIs are relative to https://api.timeweb.cloud, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**commitRestorePoint()**](SnapshotsApi.md#commitRestorePoint) | **POST** /api/v1/restore-points/{vds_id}/commit | Фиксация снапшота |
| [**createRestorePoint()**](SnapshotsApi.md#createRestorePoint) | **POST** /api/v1/restore-points/{vds_id}/create | Создание снапшота |
| [**getRestorePoint()**](SnapshotsApi.md#getRestorePoint) | **GET** /api/v1/restore-points/{vds_id} | Получение снапшота сервера |
| [**getRestorePoints()**](SnapshotsApi.md#getRestorePoints) | **GET** /api/v1/restore-points | Получение списка снапшотов |
| [**rollbackRestorePoint()**](SnapshotsApi.md#rollbackRestorePoint) | **POST** /api/v1/restore-points/{vds_id}/rollback | Откат к снапшоту |


## `commitRestorePoint()`

```php
commitRestorePoint($vds_id)
```

Фиксация снапшота

Чтобы зафиксировать (применить) снапшот облачного сервера (VDS), отправьте POST-запрос на `/api/v1/restore-points/{vds_id}/commit`.  Фиксация подтверждает текущее состояние сервера. Действие выполняется асинхронно, ответ не содержит тела.  Для выполнения действия сервер должен быть включён, иначе вернётся ошибка `403`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\SnapshotsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$vds_id = 1051; // int | ID облачного сервера (VDS).

try {
    $apiInstance->commitRestorePoint($vds_id);
} catch (Exception $e) {
    echo 'Exception when calling SnapshotsApi->commitRestorePoint: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **vds_id** | **int**| ID облачного сервера (VDS). | |

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

## `createRestorePoint()`

```php
createRestorePoint($vds_id): \OpenAPI\Client\Model\GetRestorePoint200Response
```

Создание снапшота

Чтобы создать снапшот облачного сервера (VDS), отправьте POST-запрос на `/api/v1/restore-points/{vds_id}/create`.  Тело ответа будет содержать объект JSON с ключом `restore_point` и информацией о созданном снапшоте. Сразу после создания снапшот может находиться в статусе `creating`.  Для создания снапшота сервер должен быть включён, иначе вернётся ошибка `403`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\SnapshotsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$vds_id = 1051; // int | ID облачного сервера (VDS).

try {
    $result = $apiInstance->createRestorePoint($vds_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SnapshotsApi->createRestorePoint: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **vds_id** | **int**| ID облачного сервера (VDS). | |

### Return type

[**\OpenAPI\Client\Model\GetRestorePoint200Response**](../Model/GetRestorePoint200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getRestorePoint()`

```php
getRestorePoint($vds_id): \OpenAPI\Client\Model\GetRestorePoint200Response
```

Получение снапшота сервера

Чтобы получить снапшот облачного сервера (VDS), отправьте GET-запрос на `/api/v1/restore-points/{vds_id}`.  Тело ответа будет представлять собой объект JSON с ключом `restore_point`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\SnapshotsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$vds_id = 1051; // int | ID облачного сервера (VDS).

try {
    $result = $apiInstance->getRestorePoint($vds_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SnapshotsApi->getRestorePoint: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **vds_id** | **int**| ID облачного сервера (VDS). | |

### Return type

[**\OpenAPI\Client\Model\GetRestorePoint200Response**](../Model/GetRestorePoint200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getRestorePoints()`

```php
getRestorePoints(): \OpenAPI\Client\Model\GetRestorePoints200Response
```

Получение списка снапшотов

Чтобы получить список снапшотов аккаунта, отправьте GET-запрос на `/api/v1/restore-points`.  Тело ответа будет представлять собой объект JSON с ключом `restore_points`.  Снапшот — это снимок состояния облачного сервера (VDS), к которому можно вернуться. Каждому снапшоту соответствует один сервер.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\SnapshotsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getRestorePoints();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SnapshotsApi->getRestorePoints: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\GetRestorePoints200Response**](../Model/GetRestorePoints200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `rollbackRestorePoint()`

```php
rollbackRestorePoint($vds_id)
```

Откат к снапшоту

Чтобы откатить облачный сервер (VDS) к снапшоту, отправьте POST-запрос на `/api/v1/restore-points/{vds_id}/rollback`.  Откат возвращает сервер к состоянию, сохранённому в снапшоте. Действие выполняется асинхронно, ответ не содержит тела.  Для выполнения действия сервер должен быть включён, иначе вернётся ошибка `403`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\SnapshotsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$vds_id = 1051; // int | ID облачного сервера (VDS).

try {
    $apiInstance->rollbackRestorePoint($vds_id);
} catch (Exception $e) {
    echo 'Exception when calling SnapshotsApi->rollbackRestorePoint: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **vds_id** | **int**| ID облачного сервера (VDS). | |

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
