# OpenAPI\Client\AppsApi

All URIs are relative to https://api.timeweb.cloud, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**addProvider()**](AppsApi.md#addProvider) | **POST** /api/v1/vcs-provider | Привязка vcs провайдера |
| [**createApp()**](AppsApi.md#createApp) | **POST** /api/v1/apps | Создание приложения |
| [**createDeploy()**](AppsApi.md#createDeploy) | **POST** /api/v1/apps/{app_id}/deploy | Запуск деплоя приложения |
| [**deleteApp()**](AppsApi.md#deleteApp) | **DELETE** /api/v1/apps/{app_id} | Удаление приложения |
| [**deleteProvider()**](AppsApi.md#deleteProvider) | **DELETE** /api/v1/vcs-provider/{provider_id} | Отвязка vcs провайдера от аккаунта |
| [**deployAction()**](AppsApi.md#deployAction) | **POST** /api/v1/apps/{app_id}/deploy/{deploy_id}/stop | Остановка деплоя приложения |
| [**getApp()**](AppsApi.md#getApp) | **GET** /api/v1/apps/{app_id} | Получение приложения по id |
| [**getAppDeploys()**](AppsApi.md#getAppDeploys) | **GET** /api/v1/apps/{app_id}/deploys | Получение списка деплоев приложения |
| [**getAppLogs()**](AppsApi.md#getAppLogs) | **GET** /api/v1/apps/{app_id}/logs | Получение логов приложения |
| [**getAppStatistics()**](AppsApi.md#getAppStatistics) | **GET** /api/v1/apps/{app_id}/statistics | Получение статистики приложения |
| [**getApps()**](AppsApi.md#getApps) | **GET** /api/v1/apps | Получение списка приложений |
| [**getAppsPresets()**](AppsApi.md#getAppsPresets) | **GET** /api/v1/presets/apps | Получение списка доступных тарифов для приложения |
| [**getBranches()**](AppsApi.md#getBranches) | **GET** /api/v1/vcs-provider/{provider_id}/repository/{repository_id} | Получение списка веток репозитория |
| [**getCommits()**](AppsApi.md#getCommits) | **GET** /api/v1/vcs-provider/{provider_id}/repository/{repository_id}/branch | Получение списка коммитов ветки репозитория |
| [**getDeployLogs()**](AppsApi.md#getDeployLogs) | **GET** /api/v1/apps/{app_id}/deploy/{deploy_id}/logs | Получение логов деплоя приложения |
| [**getDeploySettings()**](AppsApi.md#getDeploySettings) | **GET** /api/v1/deploy-settings/apps | Получение списка дефолтных настроек деплоя для приложения |
| [**getFrameworks()**](AppsApi.md#getFrameworks) | **GET** /api/v1/frameworks/apps | Получение списка доступных фреймворков для приложения |
| [**getProviders()**](AppsApi.md#getProviders) | **GET** /api/v1/vcs-provider | Получение списка vcs провайдеров |
| [**getRepositories()**](AppsApi.md#getRepositories) | **GET** /api/v1/vcs-provider/{provider_id} | Получение списка репозиториев vcs провайдера |
| [**updateAppSettings()**](AppsApi.md#updateAppSettings) | **PATCH** /api/v1/apps/{app_id} | Изменение настроек приложения |
| [**updateAppState()**](AppsApi.md#updateAppState) | **PATCH** /api/v1/apps/{app_id}/action/{action} | Изменение состояния приложения |


## `addProvider()`

```php
addProvider($add_github): \OpenAPI\Client\Model\AddProvider201Response
```

Привязка vcs провайдера

Чтобы привязать аккаунт провайдера отправьте POST-запрос в `/api/v1/vcs-provider`, задав необходимые атрибуты.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AppsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$add_github = new \OpenAPI\Client\Model\AddGithub(); // \OpenAPI\Client\Model\AddGithub

try {
    $result = $apiInstance->addProvider($add_github);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AppsApi->addProvider: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **add_github** | [**\OpenAPI\Client\Model\AddGithub**](../Model/AddGithub.md)|  | |

### Return type

[**\OpenAPI\Client\Model\AddProvider201Response**](../Model/AddProvider201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createApp()`

```php
createApp($create_app): \OpenAPI\Client\Model\CreateApp201Response
```

Создание приложения

Чтобы создать приложение, отправьте POST-запрос в `/api/v1/apps`, задав необходимые атрибуты.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AppsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_app = new \OpenAPI\Client\Model\CreateApp(); // \OpenAPI\Client\Model\CreateApp

try {
    $result = $apiInstance->createApp($create_app);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AppsApi->createApp: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_app** | [**\OpenAPI\Client\Model\CreateApp**](../Model/CreateApp.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateApp201Response**](../Model/CreateApp201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createDeploy()`

```php
createDeploy($app_id, $create_deploy_request): \OpenAPI\Client\Model\CreateDeploy201Response
```

Запуск деплоя приложения

Чтобы запустить деплой приложения, отправьте POST-запрос в `/api/v1/apps/{app_id}/deploy`, задав необходимые атрибуты.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AppsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$app_id = 'app_id_example'; // string
$create_deploy_request = new \OpenAPI\Client\Model\CreateDeployRequest(); // \OpenAPI\Client\Model\CreateDeployRequest

try {
    $result = $apiInstance->createDeploy($app_id, $create_deploy_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AppsApi->createDeploy: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **app_id** | **string**|  | |
| **create_deploy_request** | [**\OpenAPI\Client\Model\CreateDeployRequest**](../Model/CreateDeployRequest.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateDeploy201Response**](../Model/CreateDeploy201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteApp()`

```php
deleteApp($app_id)
```

Удаление приложения

Чтобы удалить приложение, отправьте DELETE-запрос в `/api/v1/apps/{app_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AppsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$app_id = 'app_id_example'; // string

try {
    $apiInstance->deleteApp($app_id);
} catch (Exception $e) {
    echo 'Exception when calling AppsApi->deleteApp: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **app_id** | **string**|  | |

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

## `deleteProvider()`

```php
deleteProvider($provider_id)
```

Отвязка vcs провайдера от аккаунта

Чтобы отвязать vcs провайдера от аккаунта, отправьте DELETE-запрос в `/api/v1/vcs-provider/{provider_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AppsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$provider_id = 'provider_id_example'; // string

try {
    $apiInstance->deleteProvider($provider_id);
} catch (Exception $e) {
    echo 'Exception when calling AppsApi->deleteProvider: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **provider_id** | **string**|  | |

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

## `deployAction()`

```php
deployAction($app_id, $deploy_id): \OpenAPI\Client\Model\CreateDeploy201Response
```

Остановка деплоя приложения

Чтобы остановить деплой приложения, отправьте POST-запрос в `api/v1/apps/{app_id}/deploy/{deploy_id}/stop`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AppsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$app_id = 'app_id_example'; // string
$deploy_id = 'deploy_id_example'; // string

try {
    $result = $apiInstance->deployAction($app_id, $deploy_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AppsApi->deployAction: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **app_id** | **string**|  | |
| **deploy_id** | **string**|  | |

### Return type

[**\OpenAPI\Client\Model\CreateDeploy201Response**](../Model/CreateDeploy201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getApp()`

```php
getApp($app_id): \OpenAPI\Client\Model\CreateApp201Response
```

Получение приложения по id

Чтобы получить приложение по id, отправьте GET-запрос на `/api/v1/apps/{app_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AppsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$app_id = 'app_id_example'; // string

try {
    $result = $apiInstance->getApp($app_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AppsApi->getApp: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **app_id** | **string**|  | |

### Return type

[**\OpenAPI\Client\Model\CreateApp201Response**](../Model/CreateApp201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAppDeploys()`

```php
getAppDeploys($app_id, $limit, $offset): \OpenAPI\Client\Model\GetAppDeploys200Response
```

Получение списка деплоев приложения

Чтобы получить список деплоев приложения, отправьте GET-запрос на `/api/v1/apps/{app_id}/deploys`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AppsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$app_id = 'app_id_example'; // string
$limit = 5; // int | Обозначает количество записей, которое необходимо вернуть.
$offset = 0; // int | Указывает на смещение относительно начала списка.

try {
    $result = $apiInstance->getAppDeploys($app_id, $limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AppsApi->getAppDeploys: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **app_id** | **string**|  | |
| **limit** | **int**| Обозначает количество записей, которое необходимо вернуть. | [optional] [default to 5] |
| **offset** | **int**| Указывает на смещение относительно начала списка. | [optional] [default to 0] |

### Return type

[**\OpenAPI\Client\Model\GetAppDeploys200Response**](../Model/GetAppDeploys200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAppLogs()`

```php
getAppLogs($app_id): \OpenAPI\Client\Model\GetAppLogs200Response
```

Получение логов приложения

Чтобы получить логи приложения, отправьте GET-запрос на `/api/v1/apps/{app_id}/logs`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AppsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$app_id = 'app_id_example'; // string

try {
    $result = $apiInstance->getAppLogs($app_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AppsApi->getAppLogs: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **app_id** | **string**|  | |

### Return type

[**\OpenAPI\Client\Model\GetAppLogs200Response**](../Model/GetAppLogs200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAppStatistics()`

```php
getAppStatistics($app_id, $date_from, $date_to): \OpenAPI\Client\Model\GetServerStatistics200Response
```

Получение статистики приложения

Чтобы получить статистику сервера, отправьте GET-запрос на `/api/v1/apps/{app_id}/statistics`. Метод поддерживает только приложения `type: backend`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AppsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$app_id = 'app_id_example'; // string
$date_from = 'date_from_example'; // string | Дата начала сбора статистики. Строка в формате ISO 8061, закодированная в ASCII, пример: `2023-05-25%202023-05-25T14%3A35%3A38`
$date_to = 'date_to_example'; // string | Дата окончания сбора статистики. Строка в формате ISO 8061, закодированная в ASCII, пример: `2023-05-26%202023-05-25T14%3A35%3A38`

try {
    $result = $apiInstance->getAppStatistics($app_id, $date_from, $date_to);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AppsApi->getAppStatistics: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **app_id** | **string**|  | |
| **date_from** | **string**| Дата начала сбора статистики. Строка в формате ISO 8061, закодированная в ASCII, пример: &#x60;2023-05-25%202023-05-25T14%3A35%3A38&#x60; | |
| **date_to** | **string**| Дата окончания сбора статистики. Строка в формате ISO 8061, закодированная в ASCII, пример: &#x60;2023-05-26%202023-05-25T14%3A35%3A38&#x60; | |

### Return type

[**\OpenAPI\Client\Model\GetServerStatistics200Response**](../Model/GetServerStatistics200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getApps()`

```php
getApps(): \OpenAPI\Client\Model\GetApps200Response
```

Получение списка приложений

Чтобы получить список приложений, отправьте GET-запрос на `/api/v1/apps`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AppsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getApps();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AppsApi->getApps: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\GetApps200Response**](../Model/GetApps200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAppsPresets()`

```php
getAppsPresets($app_id): \OpenAPI\Client\Model\AppsPresets
```

Получение списка доступных тарифов для приложения

Чтобы получить список доступных тарифов, отправьте GET-запрос на `/api/v1/presets/apps`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AppsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$app_id = 'app_id_example'; // string

try {
    $result = $apiInstance->getAppsPresets($app_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AppsApi->getAppsPresets: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **app_id** | **string**|  | |

### Return type

[**\OpenAPI\Client\Model\AppsPresets**](../Model/AppsPresets.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getBranches()`

```php
getBranches($provider_id, $repository_id): \OpenAPI\Client\Model\GetBranches200Response
```

Получение списка веток репозитория

Чтобы получить список веток репозитория, отправьте GET-запрос на `/api/v1/vcs-provider/{provider_id}/repository/{repository_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AppsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$provider_id = 'provider_id_example'; // string
$repository_id = 'repository_id_example'; // string

try {
    $result = $apiInstance->getBranches($provider_id, $repository_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AppsApi->getBranches: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **provider_id** | **string**|  | |
| **repository_id** | **string**|  | |

### Return type

[**\OpenAPI\Client\Model\GetBranches200Response**](../Model/GetBranches200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCommits()`

```php
getCommits($account_id, $provider_id, $repository_id, $name): \OpenAPI\Client\Model\GetCommits200Response
```

Получение списка коммитов ветки репозитория

Чтобы получить список коммитов ветки репозитория, отправьте GET-запрос на `/api/v1/vcs-provider/{provider_id}/repository/{repository_id}/branch`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AppsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 'account_id_example'; // string
$provider_id = 'provider_id_example'; // string
$repository_id = 'repository_id_example'; // string
$name = 'name_example'; // string | Название ветки

try {
    $result = $apiInstance->getCommits($account_id, $provider_id, $repository_id, $name);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AppsApi->getCommits: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account_id** | **string**|  | |
| **provider_id** | **string**|  | |
| **repository_id** | **string**|  | |
| **name** | **string**| Название ветки | |

### Return type

[**\OpenAPI\Client\Model\GetCommits200Response**](../Model/GetCommits200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDeployLogs()`

```php
getDeployLogs($app_id, $deploy_id, $debug): \OpenAPI\Client\Model\GetDeployLogs200Response
```

Получение логов деплоя приложения

Чтобы получить информацию о деплое, отправьте GET-запрос на `/app/{app_id}/deploy/{deploy_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AppsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$app_id = 'app_id_example'; // string
$deploy_id = 'deploy_id_example'; // string
$debug = True; // bool | Управляет выводом логов деплоя

try {
    $result = $apiInstance->getDeployLogs($app_id, $deploy_id, $debug);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AppsApi->getDeployLogs: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **app_id** | **string**|  | |
| **deploy_id** | **string**|  | |
| **debug** | **bool**| Управляет выводом логов деплоя | [optional] |

### Return type

[**\OpenAPI\Client\Model\GetDeployLogs200Response**](../Model/GetDeployLogs200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDeploySettings()`

```php
getDeploySettings($app_id): \OpenAPI\Client\Model\GetDeploySettings200Response
```

Получение списка дефолтных настроек деплоя для приложения

Чтобы получить список настроек деплоя, отправьте GET-запрос на `/api/v1/deploy-settings/apps`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AppsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$app_id = 'app_id_example'; // string

try {
    $result = $apiInstance->getDeploySettings($app_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AppsApi->getDeploySettings: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **app_id** | **string**|  | |

### Return type

[**\OpenAPI\Client\Model\GetDeploySettings200Response**](../Model/GetDeploySettings200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getFrameworks()`

```php
getFrameworks($app_id): \OpenAPI\Client\Model\AvailableFrameworks
```

Получение списка доступных фреймворков для приложения

Чтобы получить список доступных фреймворков, отправьте GET-запрос на `/api/v1/frameworks/apps`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AppsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$app_id = 'app_id_example'; // string

try {
    $result = $apiInstance->getFrameworks($app_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AppsApi->getFrameworks: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **app_id** | **string**|  | |

### Return type

[**\OpenAPI\Client\Model\AvailableFrameworks**](../Model/AvailableFrameworks.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getProviders()`

```php
getProviders(): \OpenAPI\Client\Model\GetProviders200Response
```

Получение списка vcs провайдеров

Чтобы получить список vcs провайдеров, отправьте GET-запрос на `/api/v1/vcs-provider`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AppsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getProviders();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AppsApi->getProviders: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\GetProviders200Response**](../Model/GetProviders200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getRepositories()`

```php
getRepositories($provider_id): \OpenAPI\Client\Model\GetRepositories200Response
```

Получение списка репозиториев vcs провайдера

Чтобы получить список репозиториев vcs провайдера, отправьте GET-запрос на `/api/v1/vcs-provider/{provider_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AppsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$provider_id = 'provider_id_example'; // string

try {
    $result = $apiInstance->getRepositories($provider_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AppsApi->getRepositories: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **provider_id** | **string**|  | |

### Return type

[**\OpenAPI\Client\Model\GetRepositories200Response**](../Model/GetRepositories200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateAppSettings()`

```php
updateAppSettings($app_id, $updete_settings): \OpenAPI\Client\Model\UpdateAppSettings200Response
```

Изменение настроек приложения

Чтобы изменить настройки приложения отправьте PATCH-запрос в `/api/v1/apps/{app_id}`, задав необходимые атрибуты.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AppsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$app_id = 'app_id_example'; // string
$updete_settings = new \OpenAPI\Client\Model\UpdeteSettings(); // \OpenAPI\Client\Model\UpdeteSettings

try {
    $result = $apiInstance->updateAppSettings($app_id, $updete_settings);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AppsApi->updateAppSettings: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **app_id** | **string**|  | |
| **updete_settings** | [**\OpenAPI\Client\Model\UpdeteSettings**](../Model/UpdeteSettings.md)|  | |

### Return type

[**\OpenAPI\Client\Model\UpdateAppSettings200Response**](../Model/UpdateAppSettings200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateAppState()`

```php
updateAppState($app_id, $action)
```

Изменение состояния приложения

Чтобы изменить состояние приложения отправьте PATCH-запрос в `/api/v1/apps/{app_id}/action/{action}`, задав необходимые атрибуты.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AppsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$app_id = 'app_id_example'; // string
$action = 'action_example'; // string

try {
    $apiInstance->updateAppState($app_id, $action);
} catch (Exception $e) {
    echo 'Exception when calling AppsApi->updateAppState: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **app_id** | **string**|  | |
| **action** | **string**|  | |

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
