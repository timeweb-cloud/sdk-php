# OpenAPI\Client\ProjectsApi

All URIs are relative to https://api.timeweb.cloud, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**addBalancerToProject()**](ProjectsApi.md#addBalancerToProject) | **POST** /api/v1/projects/{project_id}/resources/balancers | Добавление балансировщика в проект |
| [**addClusterToProject()**](ProjectsApi.md#addClusterToProject) | **POST** /api/v1/projects/{project_id}/resources/clusters | Добавление кластера в проект |
| [**addDatabaseToProject()**](ProjectsApi.md#addDatabaseToProject) | **POST** /api/v1/projects/{project_id}/resources/databases | Добавление базы данных в проект |
| [**addDedicatedServerToProject()**](ProjectsApi.md#addDedicatedServerToProject) | **POST** /api/v1/projects/{project_id}/resources/dedicated | Добавление выделенного сервера в проект |
| [**addServerToProject()**](ProjectsApi.md#addServerToProject) | **POST** /api/v1/projects/{project_id}/resources/servers | Добавление сервера в проект |
| [**addStorageToProject()**](ProjectsApi.md#addStorageToProject) | **POST** /api/v1/projects/{project_id}/resources/buckets | Добавление хранилища в проект |
| [**createProject()**](ProjectsApi.md#createProject) | **POST** /api/v1/projects | Создание проекта |
| [**deleteProject()**](ProjectsApi.md#deleteProject) | **DELETE** /api/v1/projects/{project_id} | Удаление проекта |
| [**getAccountBalancers()**](ProjectsApi.md#getAccountBalancers) | **GET** /api/v1/projects/resources/balancers | Получение списка всех балансировщиков на аккаунте |
| [**getAccountClusters()**](ProjectsApi.md#getAccountClusters) | **GET** /api/v1/projects/resources/clusters | Получение списка всех кластеров на аккаунте |
| [**getAccountDatabases()**](ProjectsApi.md#getAccountDatabases) | **GET** /api/v1/projects/resources/databases | Получение списка всех баз данных на аккаунте |
| [**getAccountDedicatedServers()**](ProjectsApi.md#getAccountDedicatedServers) | **GET** /api/v1/projects/resources/dedicated | Получение списка всех выделенных серверов на аккаунте |
| [**getAccountServers()**](ProjectsApi.md#getAccountServers) | **GET** /api/v1/projects/resources/servers | Получение списка всех серверов на аккаунте |
| [**getAccountStorages()**](ProjectsApi.md#getAccountStorages) | **GET** /api/v1/projects/resources/buckets | Получение списка всех хранилищ на аккаунте |
| [**getAllProjectResources()**](ProjectsApi.md#getAllProjectResources) | **GET** /api/v1/projects/{project_id}/resources | Получение всех ресурсов проекта |
| [**getProject()**](ProjectsApi.md#getProject) | **GET** /api/v1/projects/{project_id} | Получение проекта по идентификатору |
| [**getProjectBalancers()**](ProjectsApi.md#getProjectBalancers) | **GET** /api/v1/projects/{project_id}/resources/balancers | Получение списка балансировщиков проекта |
| [**getProjectClusters()**](ProjectsApi.md#getProjectClusters) | **GET** /api/v1/projects/{project_id}/resources/clusters | Получение списка кластеров проекта |
| [**getProjectDatabases()**](ProjectsApi.md#getProjectDatabases) | **GET** /api/v1/projects/{project_id}/resources/databases | Получение списка баз данных проекта |
| [**getProjectDedicatedServers()**](ProjectsApi.md#getProjectDedicatedServers) | **GET** /api/v1/projects/{project_id}/resources/dedicated | Получение списка выделенных серверов проекта |
| [**getProjectServers()**](ProjectsApi.md#getProjectServers) | **GET** /api/v1/projects/{project_id}/resources/servers | Получение списка серверов проекта |
| [**getProjectStorages()**](ProjectsApi.md#getProjectStorages) | **GET** /api/v1/projects/{project_id}/resources/buckets | Получение списка хранилищ проекта |
| [**getProjects()**](ProjectsApi.md#getProjects) | **GET** /api/v1/projects | Получение списка проектов |
| [**transferResourceToAnotherProject()**](ProjectsApi.md#transferResourceToAnotherProject) | **PUT** /api/v1/projects/{project_id}/resources/transfer | Перенести ресурс в другой проект |
| [**updateProject()**](ProjectsApi.md#updateProject) | **PUT** /api/v1/projects/{project_id} | Изменение проекта |


## `addBalancerToProject()`

```php
addBalancerToProject($project_id, $add_balancer_to_project_request): \OpenAPI\Client\Model\AddBalancerToProject200Response
```

Добавление балансировщика в проект

Чтобы добавить балансировщик в проект, отправьте POST-запрос на `/api/v1/projects/{project_id}/resources/balancers`, задав необходимые атрибуты.  Балансировщик будет добавлен в указанный проект. Тело ответа будет содержать объект JSON с информацией о добавленном балансировщике.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ProjectsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_id = 99; // int | Уникальный идентификатор проекта.
$add_balancer_to_project_request = new \OpenAPI\Client\Model\AddBalancerToProjectRequest(); // \OpenAPI\Client\Model\AddBalancerToProjectRequest

try {
    $result = $apiInstance->addBalancerToProject($project_id, $add_balancer_to_project_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->addBalancerToProject: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **project_id** | **int**| Уникальный идентификатор проекта. | |
| **add_balancer_to_project_request** | [**\OpenAPI\Client\Model\AddBalancerToProjectRequest**](../Model/AddBalancerToProjectRequest.md)|  | |

### Return type

[**\OpenAPI\Client\Model\AddBalancerToProject200Response**](../Model/AddBalancerToProject200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `addClusterToProject()`

```php
addClusterToProject($project_id, $add_cluster_to_project_request): \OpenAPI\Client\Model\AddBalancerToProject200Response
```

Добавление кластера в проект

Чтобы добавить кластер в проект, отправьте POST-запрос на `/api/v1/projects/{project_id}/resources/clusters`, задав необходимые атрибуты.  Кластер будет добавлен в указанный проект. Тело ответа будет содержать объект JSON с информацией о добавленном кластере.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ProjectsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_id = 99; // int | Уникальный идентификатор проекта.
$add_cluster_to_project_request = new \OpenAPI\Client\Model\AddClusterToProjectRequest(); // \OpenAPI\Client\Model\AddClusterToProjectRequest

try {
    $result = $apiInstance->addClusterToProject($project_id, $add_cluster_to_project_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->addClusterToProject: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **project_id** | **int**| Уникальный идентификатор проекта. | |
| **add_cluster_to_project_request** | [**\OpenAPI\Client\Model\AddClusterToProjectRequest**](../Model/AddClusterToProjectRequest.md)|  | |

### Return type

[**\OpenAPI\Client\Model\AddBalancerToProject200Response**](../Model/AddBalancerToProject200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `addDatabaseToProject()`

```php
addDatabaseToProject($project_id, $add_database_to_project_request): \OpenAPI\Client\Model\AddBalancerToProject200Response
```

Добавление базы данных в проект

Чтобы добавить базу данных в проект, отправьте POST-запрос на `/api/v1/projects/{project_id}/resources/databases`, задав необходимые атрибуты.  База данных будет добавлена в указанный проект. Тело ответа будет содержать объект JSON с информацией о добавленной базе данных.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ProjectsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_id = 99; // int | Уникальный идентификатор проекта.
$add_database_to_project_request = new \OpenAPI\Client\Model\AddDatabaseToProjectRequest(); // \OpenAPI\Client\Model\AddDatabaseToProjectRequest

try {
    $result = $apiInstance->addDatabaseToProject($project_id, $add_database_to_project_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->addDatabaseToProject: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **project_id** | **int**| Уникальный идентификатор проекта. | |
| **add_database_to_project_request** | [**\OpenAPI\Client\Model\AddDatabaseToProjectRequest**](../Model/AddDatabaseToProjectRequest.md)|  | |

### Return type

[**\OpenAPI\Client\Model\AddBalancerToProject200Response**](../Model/AddBalancerToProject200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `addDedicatedServerToProject()`

```php
addDedicatedServerToProject($project_id, $add_dedicated_server_to_project_request): \OpenAPI\Client\Model\AddBalancerToProject200Response
```

Добавление выделенного сервера в проект

Чтобы добавить выделенный сервер в проект, отправьте POST-запрос на `/api/v1/projects/{project_id}/resources/dedicated`, задав необходимые атрибуты.  Выделенный сервер будет добавлен в указанный проект. Тело ответа будет содержать объект JSON с информацией о добавленном выделенном сервере.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ProjectsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_id = 99; // int | Уникальный идентификатор проекта.
$add_dedicated_server_to_project_request = new \OpenAPI\Client\Model\AddDedicatedServerToProjectRequest(); // \OpenAPI\Client\Model\AddDedicatedServerToProjectRequest

try {
    $result = $apiInstance->addDedicatedServerToProject($project_id, $add_dedicated_server_to_project_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->addDedicatedServerToProject: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **project_id** | **int**| Уникальный идентификатор проекта. | |
| **add_dedicated_server_to_project_request** | [**\OpenAPI\Client\Model\AddDedicatedServerToProjectRequest**](../Model/AddDedicatedServerToProjectRequest.md)|  | |

### Return type

[**\OpenAPI\Client\Model\AddBalancerToProject200Response**](../Model/AddBalancerToProject200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `addServerToProject()`

```php
addServerToProject($project_id, $add_server_to_project_request): \OpenAPI\Client\Model\AddBalancerToProject200Response
```

Добавление сервера в проект

Чтобы добавить сервер в проект, отправьте POST-запрос на `/api/v1/projects/{project_id}/resources/servers`, задав необходимые атрибуты.  Сервер будет добавлен в указанный проект. Тело ответа будет содержать объект JSON с информацией о добавленном сервере.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ProjectsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_id = 99; // int | Уникальный идентификатор проекта.
$add_server_to_project_request = new \OpenAPI\Client\Model\AddServerToProjectRequest(); // \OpenAPI\Client\Model\AddServerToProjectRequest

try {
    $result = $apiInstance->addServerToProject($project_id, $add_server_to_project_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->addServerToProject: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **project_id** | **int**| Уникальный идентификатор проекта. | |
| **add_server_to_project_request** | [**\OpenAPI\Client\Model\AddServerToProjectRequest**](../Model/AddServerToProjectRequest.md)|  | |

### Return type

[**\OpenAPI\Client\Model\AddBalancerToProject200Response**](../Model/AddBalancerToProject200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `addStorageToProject()`

```php
addStorageToProject($project_id, $add_storage_to_project_request): \OpenAPI\Client\Model\AddBalancerToProject200Response
```

Добавление хранилища в проект

Чтобы добавить хранилище в проект, отправьте POST-запрос на `/api/v1/projects/{project_id}/resources/buckets`, задав необходимые атрибуты.  Хранилище будет добавлено в указанный проект. Тело ответа будет содержать объект JSON с информацией о добавленном хранилище.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ProjectsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_id = 99; // int | Уникальный идентификатор проекта.
$add_storage_to_project_request = new \OpenAPI\Client\Model\AddStorageToProjectRequest(); // \OpenAPI\Client\Model\AddStorageToProjectRequest

try {
    $result = $apiInstance->addStorageToProject($project_id, $add_storage_to_project_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->addStorageToProject: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **project_id** | **int**| Уникальный идентификатор проекта. | |
| **add_storage_to_project_request** | [**\OpenAPI\Client\Model\AddStorageToProjectRequest**](../Model/AddStorageToProjectRequest.md)|  | |

### Return type

[**\OpenAPI\Client\Model\AddBalancerToProject200Response**](../Model/AddBalancerToProject200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createProject()`

```php
createProject($create_project): \OpenAPI\Client\Model\CreateProject201Response
```

Создание проекта

Чтобы создать проект, отправьте POST-запрос в `api/v1/projects`, задав необходимые атрибуты.  Проект будет создан с использованием предоставленной информации. Тело ответа будет содержать объект JSON с информацией о созданном проекте.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ProjectsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_project = new \OpenAPI\Client\Model\CreateProject(); // \OpenAPI\Client\Model\CreateProject

try {
    $result = $apiInstance->createProject($create_project);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->createProject: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_project** | [**\OpenAPI\Client\Model\CreateProject**](../Model/CreateProject.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateProject201Response**](../Model/CreateProject201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteProject()`

```php
deleteProject($project_id)
```

Удаление проекта

Чтобы удалить проект, отправьте запрос DELETE в `api/v1/projects/{project_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ProjectsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_id = 99; // int | Уникальный идентификатор проекта.

try {
    $apiInstance->deleteProject($project_id);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->deleteProject: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **project_id** | **int**| Уникальный идентификатор проекта. | |

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

## `getAccountBalancers()`

```php
getAccountBalancers(): \OpenAPI\Client\Model\GetProjectBalancers200Response
```

Получение списка всех балансировщиков на аккаунте

Чтобы получить список всех балансировщиков на аккаунте, отправьте GET-запрос на `/api/v1/projects/resources/balancers`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ProjectsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getAccountBalancers();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->getAccountBalancers: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\GetProjectBalancers200Response**](../Model/GetProjectBalancers200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAccountClusters()`

```php
getAccountClusters(): \OpenAPI\Client\Model\GetProjectClusters200Response
```

Получение списка всех кластеров на аккаунте

Чтобы получить список всех кластеров на аккаунте, отправьте GET-запрос на `/api/v1/projects/resources/clusters`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ProjectsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getAccountClusters();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->getAccountClusters: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\GetProjectClusters200Response**](../Model/GetProjectClusters200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAccountDatabases()`

```php
getAccountDatabases(): \OpenAPI\Client\Model\GetProjectDatabases200Response
```

Получение списка всех баз данных на аккаунте

Чтобы получить список всех баз данных на аккаунте, отправьте GET-запрос на `/api/v1/projects/resources/databases`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ProjectsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getAccountDatabases();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->getAccountDatabases: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\GetProjectDatabases200Response**](../Model/GetProjectDatabases200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAccountDedicatedServers()`

```php
getAccountDedicatedServers(): \OpenAPI\Client\Model\GetProjectDedicatedServers200Response
```

Получение списка всех выделенных серверов на аккаунте

Чтобы получить список всех выделенных серверов на аккаунте, отправьте GET-запрос на `/api/v1/projects/resources/dedicated`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ProjectsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getAccountDedicatedServers();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->getAccountDedicatedServers: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\GetProjectDedicatedServers200Response**](../Model/GetProjectDedicatedServers200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAccountServers()`

```php
getAccountServers(): \OpenAPI\Client\Model\GetProjectServers200Response
```

Получение списка всех серверов на аккаунте

Чтобы получить список всех серверов на аккаунте, отправьте GET-запрос на `/api/v1/projects/resources/servers`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ProjectsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getAccountServers();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->getAccountServers: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\GetProjectServers200Response**](../Model/GetProjectServers200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAccountStorages()`

```php
getAccountStorages(): \OpenAPI\Client\Model\GetProjectStorages200Response
```

Получение списка всех хранилищ на аккаунте

Чтобы получить список всех хранилищ на аккаунте, отправьте GET-запрос на `/api/v1/projects/resources/buckets`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ProjectsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getAccountStorages();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->getAccountStorages: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\GetProjectStorages200Response**](../Model/GetProjectStorages200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAllProjectResources()`

```php
getAllProjectResources($project_id): \OpenAPI\Client\Model\GetAllProjectResources200Response
```

Получение всех ресурсов проекта

Чтобы получить все ресурсы проекта, отправьте GET-запрос на `/api/v1/projects/{project_id}/resources`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ProjectsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_id = 99; // int | Уникальный идентификатор проекта.

try {
    $result = $apiInstance->getAllProjectResources($project_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->getAllProjectResources: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **project_id** | **int**| Уникальный идентификатор проекта. | |

### Return type

[**\OpenAPI\Client\Model\GetAllProjectResources200Response**](../Model/GetAllProjectResources200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getProject()`

```php
getProject($project_id): \OpenAPI\Client\Model\CreateProject201Response
```

Получение проекта по идентификатору

Чтобы получить проект по идентификатору, отправьте GET-запрос на `/api/v1/projects/{project_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ProjectsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_id = 99; // int | Уникальный идентификатор проекта.

try {
    $result = $apiInstance->getProject($project_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->getProject: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **project_id** | **int**| Уникальный идентификатор проекта. | |

### Return type

[**\OpenAPI\Client\Model\CreateProject201Response**](../Model/CreateProject201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getProjectBalancers()`

```php
getProjectBalancers($project_id): \OpenAPI\Client\Model\GetProjectBalancers200Response
```

Получение списка балансировщиков проекта

Чтобы получить список балансировщиков проекта, отправьте GET-запрос на `/api/v1/projects/{project_id}/resources/balancers`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ProjectsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_id = 99; // int | Уникальный идентификатор проекта.

try {
    $result = $apiInstance->getProjectBalancers($project_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->getProjectBalancers: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **project_id** | **int**| Уникальный идентификатор проекта. | |

### Return type

[**\OpenAPI\Client\Model\GetProjectBalancers200Response**](../Model/GetProjectBalancers200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getProjectClusters()`

```php
getProjectClusters($project_id): \OpenAPI\Client\Model\GetProjectClusters200Response
```

Получение списка кластеров проекта

Чтобы получить список кластеров проекта, отправьте GET-запрос на `/api/v1/projects/{project_id}/resources/clusters`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ProjectsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_id = 99; // int | Уникальный идентификатор проекта.

try {
    $result = $apiInstance->getProjectClusters($project_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->getProjectClusters: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **project_id** | **int**| Уникальный идентификатор проекта. | |

### Return type

[**\OpenAPI\Client\Model\GetProjectClusters200Response**](../Model/GetProjectClusters200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getProjectDatabases()`

```php
getProjectDatabases($project_id): \OpenAPI\Client\Model\GetProjectDatabases200Response
```

Получение списка баз данных проекта

Чтобы получить список баз данных проекта, отправьте GET-запрос на `/api/v1/projects/{project_id}/resources/databases`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ProjectsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_id = 99; // int | Уникальный идентификатор проекта.

try {
    $result = $apiInstance->getProjectDatabases($project_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->getProjectDatabases: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **project_id** | **int**| Уникальный идентификатор проекта. | |

### Return type

[**\OpenAPI\Client\Model\GetProjectDatabases200Response**](../Model/GetProjectDatabases200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getProjectDedicatedServers()`

```php
getProjectDedicatedServers($project_id): \OpenAPI\Client\Model\GetProjectDedicatedServers200Response
```

Получение списка выделенных серверов проекта

Чтобы получить список выделенных серверов проекта, отправьте GET-запрос на `/api/v1/projects/{project_id}/resources/dedicated`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ProjectsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_id = 99; // int | Уникальный идентификатор проекта.

try {
    $result = $apiInstance->getProjectDedicatedServers($project_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->getProjectDedicatedServers: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **project_id** | **int**| Уникальный идентификатор проекта. | |

### Return type

[**\OpenAPI\Client\Model\GetProjectDedicatedServers200Response**](../Model/GetProjectDedicatedServers200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getProjectServers()`

```php
getProjectServers($project_id): \OpenAPI\Client\Model\GetProjectServers200Response
```

Получение списка серверов проекта

Чтобы получить список серверов проекта, отправьте GET-запрос на `/api/v1/projects/{project_id}/resources/servers`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ProjectsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_id = 99; // int | Уникальный идентификатор проекта.

try {
    $result = $apiInstance->getProjectServers($project_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->getProjectServers: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **project_id** | **int**| Уникальный идентификатор проекта. | |

### Return type

[**\OpenAPI\Client\Model\GetProjectServers200Response**](../Model/GetProjectServers200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getProjectStorages()`

```php
getProjectStorages($project_id): \OpenAPI\Client\Model\GetProjectStorages200Response
```

Получение списка хранилищ проекта

Чтобы получить список хранилищ проекта, отправьте GET-запрос на `/api/v1/projects/{project_id}/resources/buckets`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ProjectsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_id = 99; // int | Уникальный идентификатор проекта.

try {
    $result = $apiInstance->getProjectStorages($project_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->getProjectStorages: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **project_id** | **int**| Уникальный идентификатор проекта. | |

### Return type

[**\OpenAPI\Client\Model\GetProjectStorages200Response**](../Model/GetProjectStorages200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getProjects()`

```php
getProjects(): \OpenAPI\Client\Model\GetProjects200Response
```

Получение списка проектов

Чтобы получить список всех проектов на вашем аккаунте, отправьте GET-запрос на `/api/v1/projects`.   Тело ответа будет представлять собой объект JSON с ключом `projects`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ProjectsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getProjects();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->getProjects: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\GetProjects200Response**](../Model/GetProjects200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `transferResourceToAnotherProject()`

```php
transferResourceToAnotherProject($project_id, $resource_transfer): \OpenAPI\Client\Model\AddBalancerToProject200Response
```

Перенести ресурс в другой проект

Чтобы перенести ресурс в другой проект, отправьте запрос PUT в `api/v1/projects/{project_id}/resources/transfer`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ProjectsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_id = 99; // int | Уникальный идентификатор проекта.
$resource_transfer = new \OpenAPI\Client\Model\ResourceTransfer(); // \OpenAPI\Client\Model\ResourceTransfer

try {
    $result = $apiInstance->transferResourceToAnotherProject($project_id, $resource_transfer);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->transferResourceToAnotherProject: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **project_id** | **int**| Уникальный идентификатор проекта. | |
| **resource_transfer** | [**\OpenAPI\Client\Model\ResourceTransfer**](../Model/ResourceTransfer.md)|  | |

### Return type

[**\OpenAPI\Client\Model\AddBalancerToProject200Response**](../Model/AddBalancerToProject200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateProject()`

```php
updateProject($project_id, $update_project): \OpenAPI\Client\Model\CreateProject201Response
```

Изменение проекта

Чтобы изменить проект, отправьте запрос PUT в `api/v1/projects/{project_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ProjectsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_id = 99; // int | Уникальный идентификатор проекта.
$update_project = new \OpenAPI\Client\Model\UpdateProject(); // \OpenAPI\Client\Model\UpdateProject

try {
    $result = $apiInstance->updateProject($project_id, $update_project);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->updateProject: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **project_id** | **int**| Уникальный идентификатор проекта. | |
| **update_project** | [**\OpenAPI\Client\Model\UpdateProject**](../Model/UpdateProject.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateProject201Response**](../Model/CreateProject201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
