# OpenAPI\Client\ContainerRegistryApi

All URIs are relative to https://api.timeweb.cloud, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createRegistry()**](ContainerRegistryApi.md#createRegistry) | **POST** /api/v1/container-registry | Создание реестра |
| [**deleteRegistry()**](ContainerRegistryApi.md#deleteRegistry) | **DELETE** /api/v1/container-registry/{registry_id} | Удаление реестра |
| [**getRegistries()**](ContainerRegistryApi.md#getRegistries) | **GET** /api/v1/container-registry | Получение списка реестров контейнеров |
| [**getRegistry()**](ContainerRegistryApi.md#getRegistry) | **GET** /api/v1/container-registry/{registry_id} | Получение информации о реестре |
| [**getRegistryPresets()**](ContainerRegistryApi.md#getRegistryPresets) | **GET** /api/v1/container-registry/presets | Получение списка тарифов |
| [**getRegistryRepositories()**](ContainerRegistryApi.md#getRegistryRepositories) | **GET** /api/v1/container-registry/{registry_id}/repositories | Получение списка репозиториев |
| [**updateRegistry()**](ContainerRegistryApi.md#updateRegistry) | **PATCH** /api/v1/container-registry/{registry_id} | Обновление информации о реестре |


## `createRegistry()`

```php
createRegistry($registry_in): \OpenAPI\Client\Model\RegistryResponse
```

Создание реестра

Чтобы создать реестр, отправьте POST-запрос на `/api/v1/container-registry`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ContainerRegistryApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$registry_in = new \OpenAPI\Client\Model\RegistryIn(); // \OpenAPI\Client\Model\RegistryIn

try {
    $result = $apiInstance->createRegistry($registry_in);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContainerRegistryApi->createRegistry: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **registry_in** | [**\OpenAPI\Client\Model\RegistryIn**](../Model/RegistryIn.md)|  | |

### Return type

[**\OpenAPI\Client\Model\RegistryResponse**](../Model/RegistryResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteRegistry()`

```php
deleteRegistry($registry_id)
```

Удаление реестра

Чтобы удалить реестр, отправьте DELETE-запрос в `/api/v1/container-registry/{registry_id}`

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ContainerRegistryApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$registry_id = 56; // int | ID реестра

try {
    $apiInstance->deleteRegistry($registry_id);
} catch (Exception $e) {
    echo 'Exception when calling ContainerRegistryApi->deleteRegistry: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **registry_id** | **int**| ID реестра | |

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

## `getRegistries()`

```php
getRegistries(): \OpenAPI\Client\Model\RegistriesResponse
```

Получение списка реестров контейнеров

Чтобы получить список реестров, отправьте GET-запрос на `/api/v1/container-registry`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ContainerRegistryApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getRegistries();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContainerRegistryApi->getRegistries: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\RegistriesResponse**](../Model/RegistriesResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getRegistry()`

```php
getRegistry($registry_id): \OpenAPI\Client\Model\RegistryResponse
```

Получение информации о реестре

Чтобы получить информацию о реестре, отправьте GET-запрос в `/api/v1/container-registry/{registry_id}`

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ContainerRegistryApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$registry_id = 56; // int | ID реестра

try {
    $result = $apiInstance->getRegistry($registry_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContainerRegistryApi->getRegistry: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **registry_id** | **int**| ID реестра | |

### Return type

[**\OpenAPI\Client\Model\RegistryResponse**](../Model/RegistryResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getRegistryPresets()`

```php
getRegistryPresets(): \OpenAPI\Client\Model\SchemasPresetsResponse
```

Получение списка тарифов

Чтобы получить список тарифов, отправьте GET-запрос в `/api/v1/container-registry/presets`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ContainerRegistryApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getRegistryPresets();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContainerRegistryApi->getRegistryPresets: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\SchemasPresetsResponse**](../Model/SchemasPresetsResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getRegistryRepositories()`

```php
getRegistryRepositories($registry_id): \OpenAPI\Client\Model\RepositoriesResponse
```

Получение списка репозиториев

Чтобы получить список репозиториев, отправьте GET-запрос в `/api/v1/container-registry/{registry_id}/repositories`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ContainerRegistryApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$registry_id = 56; // int | ID реестра

try {
    $result = $apiInstance->getRegistryRepositories($registry_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContainerRegistryApi->getRegistryRepositories: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **registry_id** | **int**| ID реестра | |

### Return type

[**\OpenAPI\Client\Model\RepositoriesResponse**](../Model/RepositoriesResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateRegistry()`

```php
updateRegistry($registry_id, $registry_edit): \OpenAPI\Client\Model\RegistryResponse
```

Обновление информации о реестре

Чтобы обновить информацию о реестре, отправьте PATCH-запрос в `/api/v1/container-registry/{registry_id}`

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ContainerRegistryApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$registry_id = 56; // int | ID реестра
$registry_edit = new \OpenAPI\Client\Model\RegistryEdit(); // \OpenAPI\Client\Model\RegistryEdit

try {
    $result = $apiInstance->updateRegistry($registry_id, $registry_edit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContainerRegistryApi->updateRegistry: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **registry_id** | **int**| ID реестра | |
| **registry_edit** | [**\OpenAPI\Client\Model\RegistryEdit**](../Model/RegistryEdit.md)|  | |

### Return type

[**\OpenAPI\Client\Model\RegistryResponse**](../Model/RegistryResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
