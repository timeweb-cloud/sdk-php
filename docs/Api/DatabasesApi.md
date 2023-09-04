# OpenAPI\Client\DatabasesApi

All URIs are relative to https://api.timeweb.cloud, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createDatabase()**](DatabasesApi.md#createDatabase) | **POST** /api/v1/dbs | Создание базы данных |
| [**createDatabaseBackup()**](DatabasesApi.md#createDatabaseBackup) | **POST** /api/v1/dbs/{db_id}/backups | Создание бэкапа базы данных |
| [**createDatabaseCluster()**](DatabasesApi.md#createDatabaseCluster) | **POST** /api/v1/databases | Создание кластера базы данных |
| [**createDatabaseInstance()**](DatabasesApi.md#createDatabaseInstance) | **POST** /api/v1/databases/{db_cluster_id}/instances | Создание инстанса базы данных |
| [**createDatabaseUser()**](DatabasesApi.md#createDatabaseUser) | **POST** /api/v1/databases/{db_cluster_id}/admins | Создание пользователя базы данных |
| [**deleteDatabase()**](DatabasesApi.md#deleteDatabase) | **DELETE** /api/v1/dbs/{db_id} | Удаление базы данных |
| [**deleteDatabaseBackup()**](DatabasesApi.md#deleteDatabaseBackup) | **DELETE** /api/v1/dbs/{db_id}/backups/{backup_id} | Удаление бэкапа базы данных |
| [**deleteDatabaseCluster()**](DatabasesApi.md#deleteDatabaseCluster) | **DELETE** /api/v1/databases/{db_cluster_id} | Удаление кластера базы данных |
| [**deleteDatabaseInstance()**](DatabasesApi.md#deleteDatabaseInstance) | **DELETE** /api/v1/databases/{db_cluster_id}/instances/{instance_id} | Удаление инстанса базы данных |
| [**deleteDatabaseUser()**](DatabasesApi.md#deleteDatabaseUser) | **DELETE** /api/v1/databases/{db_cluster_id}/admins/{admin_id} | Удаление пользователя базы данных |
| [**getDatabase()**](DatabasesApi.md#getDatabase) | **GET** /api/v1/dbs/{db_id} | Получение базы данных |
| [**getDatabaseAutoBackupsSettings()**](DatabasesApi.md#getDatabaseAutoBackupsSettings) | **GET** /api/v1/dbs/{db_id}/auto-backups | Получение настроек автобэкапов базы данных |
| [**getDatabaseBackup()**](DatabasesApi.md#getDatabaseBackup) | **GET** /api/v1/dbs/{db_id}/backups/{backup_id} | Получение бэкапа базы данных |
| [**getDatabaseBackups()**](DatabasesApi.md#getDatabaseBackups) | **GET** /api/v1/dbs/{db_id}/backups | Список бэкапов базы данных |
| [**getDatabaseCluster()**](DatabasesApi.md#getDatabaseCluster) | **GET** /api/v1/databases/{db_cluster_id} | Получение кластера базы данных |
| [**getDatabaseClusters()**](DatabasesApi.md#getDatabaseClusters) | **GET** /api/v1/databases | Получение списка кластеров баз данных |
| [**getDatabaseInstance()**](DatabasesApi.md#getDatabaseInstance) | **GET** /api/v1/databases/{db_cluster_id}/instances/{instance_id} | Получение инстанса базы данных |
| [**getDatabaseInstances()**](DatabasesApi.md#getDatabaseInstances) | **GET** /api/v1/databases/{db_cluster_id}/instances | Получение списка инстансов баз данных |
| [**getDatabaseUser()**](DatabasesApi.md#getDatabaseUser) | **GET** /api/v1/databases/{db_cluster_id}/admins/{admin_id} | Получение пользователя базы данных |
| [**getDatabaseUsers()**](DatabasesApi.md#getDatabaseUsers) | **GET** /api/v1/databases/{db_cluster_id}/admins | Получение списка пользователей базы данных |
| [**getDatabases()**](DatabasesApi.md#getDatabases) | **GET** /api/v1/dbs | Получение списка всех баз данных |
| [**getDatabasesPresets()**](DatabasesApi.md#getDatabasesPresets) | **GET** /api/v1/presets/dbs | Получение списка тарифов для баз данных |
| [**restoreDatabaseFromBackup()**](DatabasesApi.md#restoreDatabaseFromBackup) | **PUT** /api/v1/dbs/{db_id}/backups/{backup_id} | Восстановление базы данных из бэкапа |
| [**updateDatabase()**](DatabasesApi.md#updateDatabase) | **PATCH** /api/v1/dbs/{db_id} | Обновление базы данных |
| [**updateDatabaseAutoBackupsSettings()**](DatabasesApi.md#updateDatabaseAutoBackupsSettings) | **PATCH** /api/v1/dbs/{db_id}/auto-backups | Изменение настроек автобэкапов базы данных |
| [**updateDatabaseCluster()**](DatabasesApi.md#updateDatabaseCluster) | **PATCH** /api/v1/databases/{db_cluster_id} | Изменение кластера базы данных |
| [**updateDatabaseInstance()**](DatabasesApi.md#updateDatabaseInstance) | **PATCH** /api/v1/databases/{db_cluster_id}/instances/{instance_id} | Изменение инстанса базы данных |
| [**updateDatabaseUser()**](DatabasesApi.md#updateDatabaseUser) | **PATCH** /api/v1/databases/{db_cluster_id}/admins/{admin_id} | Изменение пользователя базы данных |


## `createDatabase()`

```php
createDatabase($create_db): \OpenAPI\Client\Model\CreateDatabase201Response
```

Создание базы данных

Чтобы создать базу данных на вашем аккаунте, отправьте POST-запрос на `/api/v1/dbs`, задав необходимые атрибуты.  База данных будет создана с использованием предоставленной информации. Тело ответа будет содержать объект JSON с информацией о созданной базе данных.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DatabasesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_db = new \OpenAPI\Client\Model\CreateDb(); // \OpenAPI\Client\Model\CreateDb

try {
    $result = $apiInstance->createDatabase($create_db);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DatabasesApi->createDatabase: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_db** | [**\OpenAPI\Client\Model\CreateDb**](../Model/CreateDb.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateDatabase201Response**](../Model/CreateDatabase201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createDatabaseBackup()`

```php
createDatabaseBackup($db_id): \OpenAPI\Client\Model\CreateDatabaseBackup201Response
```

Создание бэкапа базы данных

Чтобы создать бэкап базы данных, отправьте запрос POST в `api/v1/dbs/{db_id}/backups`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DatabasesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$db_id = 56; // int | Идентификатор базы данных

try {
    $result = $apiInstance->createDatabaseBackup($db_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DatabasesApi->createDatabaseBackup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **db_id** | **int**| Идентификатор базы данных | |

### Return type

[**\OpenAPI\Client\Model\CreateDatabaseBackup201Response**](../Model/CreateDatabaseBackup201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createDatabaseCluster()`

```php
createDatabaseCluster($create_cluster): \OpenAPI\Client\Model\CreateDatabaseCluster201Response
```

Создание кластера базы данных

Чтобы создать кластер базы данных на вашем аккаунте, отправьте POST-запрос на `/api/v1/databases`.   Вместе с кластером будет создан один инстанс базы данных и один пользователь.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DatabasesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_cluster = new \OpenAPI\Client\Model\CreateCluster(); // \OpenAPI\Client\Model\CreateCluster

try {
    $result = $apiInstance->createDatabaseCluster($create_cluster);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DatabasesApi->createDatabaseCluster: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_cluster** | [**\OpenAPI\Client\Model\CreateCluster**](../Model/CreateCluster.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateDatabaseCluster201Response**](../Model/CreateDatabaseCluster201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createDatabaseInstance()`

```php
createDatabaseInstance($db_cluster_id, $create_instance): \OpenAPI\Client\Model\CreateDatabaseInstance201Response
```

Создание инстанса базы данных

Чтобы создать инстанс базы данных, отправьте POST-запрос на `/api/v1/databases/{db_cluster_id}/instances`.\\    Существующие пользователи не будут иметь доступа к новой базе данных после создания. Вы можете изменить привилегии для пользователя через <a href='#tag/Bazy-dannyh/operation/updateDatabaseUser'>метод изменения пользователя</a>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DatabasesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$db_cluster_id = 56; // int | Идентификатор кластера базы данных
$create_instance = new \OpenAPI\Client\Model\CreateInstance(); // \OpenAPI\Client\Model\CreateInstance

try {
    $result = $apiInstance->createDatabaseInstance($db_cluster_id, $create_instance);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DatabasesApi->createDatabaseInstance: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **db_cluster_id** | **int**| Идентификатор кластера базы данных | |
| **create_instance** | [**\OpenAPI\Client\Model\CreateInstance**](../Model/CreateInstance.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateDatabaseInstance201Response**](../Model/CreateDatabaseInstance201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createDatabaseUser()`

```php
createDatabaseUser($db_cluster_id, $create_admin): \OpenAPI\Client\Model\CreateDatabaseUser201Response
```

Создание пользователя базы данных

Чтобы создать пользователя базы данных, отправьте POST-запрос на `/api/v1/databases/{db_cluster_id}/admins`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DatabasesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$db_cluster_id = 56; // int | Идентификатор кластера базы данных
$create_admin = new \OpenAPI\Client\Model\CreateAdmin(); // \OpenAPI\Client\Model\CreateAdmin

try {
    $result = $apiInstance->createDatabaseUser($db_cluster_id, $create_admin);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DatabasesApi->createDatabaseUser: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **db_cluster_id** | **int**| Идентификатор кластера базы данных | |
| **create_admin** | [**\OpenAPI\Client\Model\CreateAdmin**](../Model/CreateAdmin.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateDatabaseUser201Response**](../Model/CreateDatabaseUser201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteDatabase()`

```php
deleteDatabase($db_id, $hash, $code): \OpenAPI\Client\Model\DeleteDatabase200Response
```

Удаление базы данных

Чтобы удалить базу данных, отправьте запрос DELETE в `api/v1/dbs/{db_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DatabasesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$db_id = 56; // int | Идентификатор базы данных
$hash = 15095f25-aac3-4d60-a788-96cb5136f186; // string | Хеш, который совместно с кодом авторизации надо отправить для удаления, если включено подтверждение удаления сервисов через Телеграм.
$code = 0000; // string | Код подтверждения, который придет к вам в Телеграм, после запроса удаления, если включено подтверждение удаления сервисов.  При помощи API токена сервисы можно удалять без подтверждения, если параметр токена `is_able_to_delete` установлен в значение `true`

try {
    $result = $apiInstance->deleteDatabase($db_id, $hash, $code);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DatabasesApi->deleteDatabase: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **db_id** | **int**| Идентификатор базы данных | |
| **hash** | **string**| Хеш, который совместно с кодом авторизации надо отправить для удаления, если включено подтверждение удаления сервисов через Телеграм. | [optional] |
| **code** | **string**| Код подтверждения, который придет к вам в Телеграм, после запроса удаления, если включено подтверждение удаления сервисов.  При помощи API токена сервисы можно удалять без подтверждения, если параметр токена &#x60;is_able_to_delete&#x60; установлен в значение &#x60;true&#x60; | [optional] |

### Return type

[**\OpenAPI\Client\Model\DeleteDatabase200Response**](../Model/DeleteDatabase200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteDatabaseBackup()`

```php
deleteDatabaseBackup($db_id, $backup_id)
```

Удаление бэкапа базы данных

Чтобы удалить бэкап базы данных, отправьте запрос DELETE в `api/v1/dbs/{db_id}/backups/{backup_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DatabasesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$db_id = 56; // int | Идентификатор базы данных
$backup_id = 56; // int | Идентификатор резевной копии

try {
    $apiInstance->deleteDatabaseBackup($db_id, $backup_id);
} catch (Exception $e) {
    echo 'Exception when calling DatabasesApi->deleteDatabaseBackup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **db_id** | **int**| Идентификатор базы данных | |
| **backup_id** | **int**| Идентификатор резевной копии | |

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

## `deleteDatabaseCluster()`

```php
deleteDatabaseCluster($db_cluster_id, $hash, $code): \OpenAPI\Client\Model\DeleteDatabaseCluster200Response
```

Удаление кластера базы данных

Чтобы удалить кластер базы данных, отправьте DELETE-запрос на `/api/v1/databases/{db_cluster_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DatabasesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$db_cluster_id = 56; // int | Идентификатор кластера базы данных
$hash = 15095f25-aac3-4d60-a788-96cb5136f186; // string | Хеш, который совместно с кодом авторизации надо отправить для удаления, если включено подтверждение удаления сервисов через Телеграм.
$code = 0000; // string | Код подтверждения, который придет к вам в Телеграм, после запроса удаления, если включено подтверждение удаления сервисов.  При помощи API токена сервисы можно удалять без подтверждения, если параметр токена `is_able_to_delete` установлен в значение `true`

try {
    $result = $apiInstance->deleteDatabaseCluster($db_cluster_id, $hash, $code);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DatabasesApi->deleteDatabaseCluster: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **db_cluster_id** | **int**| Идентификатор кластера базы данных | |
| **hash** | **string**| Хеш, который совместно с кодом авторизации надо отправить для удаления, если включено подтверждение удаления сервисов через Телеграм. | [optional] |
| **code** | **string**| Код подтверждения, который придет к вам в Телеграм, после запроса удаления, если включено подтверждение удаления сервисов.  При помощи API токена сервисы можно удалять без подтверждения, если параметр токена &#x60;is_able_to_delete&#x60; установлен в значение &#x60;true&#x60; | [optional] |

### Return type

[**\OpenAPI\Client\Model\DeleteDatabaseCluster200Response**](../Model/DeleteDatabaseCluster200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteDatabaseInstance()`

```php
deleteDatabaseInstance($db_cluster_id, $instance_id)
```

Удаление инстанса базы данных

Чтобы удалить инстанс базы данных, отправьте DELETE-запрос на `/api/v1/databases/{db_cluster_id}/instances/{instance_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DatabasesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$db_cluster_id = 56; // int | Идентификатор кластера базы данных
$instance_id = 56; // int | Идентификатор инстанса базы данных

try {
    $apiInstance->deleteDatabaseInstance($db_cluster_id, $instance_id);
} catch (Exception $e) {
    echo 'Exception when calling DatabasesApi->deleteDatabaseInstance: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **db_cluster_id** | **int**| Идентификатор кластера базы данных | |
| **instance_id** | **int**| Идентификатор инстанса базы данных | |

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

## `deleteDatabaseUser()`

```php
deleteDatabaseUser($db_cluster_id, $admin_id)
```

Удаление пользователя базы данных

Чтобы удалить пользователя базы данных на вашем аккаунте, отправьте DELETE-запрос на `/api/v1/databases/{db_cluster_id}/admins/{admin_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DatabasesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$db_cluster_id = 56; // int | Идентификатор кластера базы данных
$admin_id = 56; // int | Идентификатор пользователя базы данных

try {
    $apiInstance->deleteDatabaseUser($db_cluster_id, $admin_id);
} catch (Exception $e) {
    echo 'Exception when calling DatabasesApi->deleteDatabaseUser: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **db_cluster_id** | **int**| Идентификатор кластера базы данных | |
| **admin_id** | **int**| Идентификатор пользователя базы данных | |

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

## `getDatabase()`

```php
getDatabase($db_id): \OpenAPI\Client\Model\CreateDatabase201Response
```

Получение базы данных

Чтобы отобразить информацию об отдельной базе данных, отправьте запрос GET на `api/v1/dbs/{db_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DatabasesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$db_id = 56; // int | Идентификатор базы данных

try {
    $result = $apiInstance->getDatabase($db_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DatabasesApi->getDatabase: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **db_id** | **int**| Идентификатор базы данных | |

### Return type

[**\OpenAPI\Client\Model\CreateDatabase201Response**](../Model/CreateDatabase201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDatabaseAutoBackupsSettings()`

```php
getDatabaseAutoBackupsSettings($db_id): \OpenAPI\Client\Model\GetDatabaseAutoBackupsSettings200Response
```

Получение настроек автобэкапов базы данных

Чтобы получить список настроек автобэкапов базы данных, отправьте запрос GET в `api/v1/dbs/{db_id}/auto-backups`

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DatabasesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$db_id = 56; // int | Идентификатор базы данных

try {
    $result = $apiInstance->getDatabaseAutoBackupsSettings($db_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DatabasesApi->getDatabaseAutoBackupsSettings: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **db_id** | **int**| Идентификатор базы данных | |

### Return type

[**\OpenAPI\Client\Model\GetDatabaseAutoBackupsSettings200Response**](../Model/GetDatabaseAutoBackupsSettings200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDatabaseBackup()`

```php
getDatabaseBackup($db_id, $backup_id): \OpenAPI\Client\Model\CreateDatabaseBackup201Response
```

Получение бэкапа базы данных

Чтобы получить бэкап базы данных, отправьте запрос GET в `api/v1/dbs/{db_id}/backups/{backup_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DatabasesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$db_id = 56; // int | Идентификатор базы данных
$backup_id = 56; // int | Идентификатор резевной копии

try {
    $result = $apiInstance->getDatabaseBackup($db_id, $backup_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DatabasesApi->getDatabaseBackup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **db_id** | **int**| Идентификатор базы данных | |
| **backup_id** | **int**| Идентификатор резевной копии | |

### Return type

[**\OpenAPI\Client\Model\CreateDatabaseBackup201Response**](../Model/CreateDatabaseBackup201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDatabaseBackups()`

```php
getDatabaseBackups($db_id, $limit, $offset): \OpenAPI\Client\Model\GetDatabaseBackups200Response
```

Список бэкапов базы данных

Чтобы получить список бэкапов базы данных, отправьте запрос GET в `api/v1/dbs/{db_id}/backups`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DatabasesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$db_id = 56; // int | Идентификатор базы данных
$limit = 100; // int | Обозначает количество записей, которое необходимо вернуть.
$offset = 0; // int | Указывает на смещение относительно начала списка.

try {
    $result = $apiInstance->getDatabaseBackups($db_id, $limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DatabasesApi->getDatabaseBackups: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **db_id** | **int**| Идентификатор базы данных | |
| **limit** | **int**| Обозначает количество записей, которое необходимо вернуть. | [optional] [default to 100] |
| **offset** | **int**| Указывает на смещение относительно начала списка. | [optional] [default to 0] |

### Return type

[**\OpenAPI\Client\Model\GetDatabaseBackups200Response**](../Model/GetDatabaseBackups200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDatabaseCluster()`

```php
getDatabaseCluster($db_cluster_id): \OpenAPI\Client\Model\CreateDatabaseCluster201Response
```

Получение кластера базы данных

Чтобы получить кластер базы данных на вашем аккаунте, отправьте GET-запрос на `/api/v1/databases/{db_cluster_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DatabasesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$db_cluster_id = 56; // int | Идентификатор кластера базы данных

try {
    $result = $apiInstance->getDatabaseCluster($db_cluster_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DatabasesApi->getDatabaseCluster: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **db_cluster_id** | **int**| Идентификатор кластера базы данных | |

### Return type

[**\OpenAPI\Client\Model\CreateDatabaseCluster201Response**](../Model/CreateDatabaseCluster201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDatabaseClusters()`

```php
getDatabaseClusters($limit, $offset): \OpenAPI\Client\Model\GetDatabaseClusters200Response
```

Получение списка кластеров баз данных

Чтобы получить список кластеров баз данных, отправьте GET-запрос на `/api/v1/databases`.   Тело ответа будет представлять собой объект JSON с ключом `dbs`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DatabasesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$limit = 100; // int | Обозначает количество записей, которое необходимо вернуть.
$offset = 0; // int | Указывает на смещение относительно начала списка.

try {
    $result = $apiInstance->getDatabaseClusters($limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DatabasesApi->getDatabaseClusters: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **limit** | **int**| Обозначает количество записей, которое необходимо вернуть. | [optional] [default to 100] |
| **offset** | **int**| Указывает на смещение относительно начала списка. | [optional] [default to 0] |

### Return type

[**\OpenAPI\Client\Model\GetDatabaseClusters200Response**](../Model/GetDatabaseClusters200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDatabaseInstance()`

```php
getDatabaseInstance($db_cluster_id, $instance_id): \OpenAPI\Client\Model\CreateDatabaseInstance201Response
```

Получение инстанса базы данных

Чтобы получить инстанс базы данных, отправьте GET-запрос на `/api/v1/databases/{db_cluster_id}/instances/{instance_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DatabasesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$db_cluster_id = 56; // int | Идентификатор кластера базы данных
$instance_id = 56; // int | Идентификатор инстанса базы данных

try {
    $result = $apiInstance->getDatabaseInstance($db_cluster_id, $instance_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DatabasesApi->getDatabaseInstance: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **db_cluster_id** | **int**| Идентификатор кластера базы данных | |
| **instance_id** | **int**| Идентификатор инстанса базы данных | |

### Return type

[**\OpenAPI\Client\Model\CreateDatabaseInstance201Response**](../Model/CreateDatabaseInstance201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDatabaseInstances()`

```php
getDatabaseInstances($db_cluster_id): \OpenAPI\Client\Model\GetDatabaseInstances200Response
```

Получение списка инстансов баз данных

Чтобы получить список баз данных на вашем аккаунте, отправьте GET-запрос на `/api/v1/databases/{db_cluster_id}/instances`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DatabasesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$db_cluster_id = 56; // int | Идентификатор кластера базы данных

try {
    $result = $apiInstance->getDatabaseInstances($db_cluster_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DatabasesApi->getDatabaseInstances: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **db_cluster_id** | **int**| Идентификатор кластера базы данных | |

### Return type

[**\OpenAPI\Client\Model\GetDatabaseInstances200Response**](../Model/GetDatabaseInstances200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDatabaseUser()`

```php
getDatabaseUser($db_cluster_id, $admin_id): \OpenAPI\Client\Model\CreateDatabaseUser201Response
```

Получение пользователя базы данных

Чтобы получить пользователя базы данных на вашем аккаунте, отправьте GET-запрос на `/api/v1/databases/{db_cluster_id}/admins/{admin_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DatabasesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$db_cluster_id = 56; // int | Идентификатор кластера базы данных
$admin_id = 56; // int | Идентификатор пользователя базы данных

try {
    $result = $apiInstance->getDatabaseUser($db_cluster_id, $admin_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DatabasesApi->getDatabaseUser: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **db_cluster_id** | **int**| Идентификатор кластера базы данных | |
| **admin_id** | **int**| Идентификатор пользователя базы данных | |

### Return type

[**\OpenAPI\Client\Model\CreateDatabaseUser201Response**](../Model/CreateDatabaseUser201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDatabaseUsers()`

```php
getDatabaseUsers($db_cluster_id): \OpenAPI\Client\Model\GetDatabaseUsers200Response
```

Получение списка пользователей базы данных

Чтобы получить список пользователей базы данных на вашем аккаунте, отправьте GET-запрос на `/api/v1/databases/{db_cluster_id}/admins`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DatabasesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$db_cluster_id = 56; // int | Идентификатор кластера базы данных

try {
    $result = $apiInstance->getDatabaseUsers($db_cluster_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DatabasesApi->getDatabaseUsers: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **db_cluster_id** | **int**| Идентификатор кластера базы данных | |

### Return type

[**\OpenAPI\Client\Model\GetDatabaseUsers200Response**](../Model/GetDatabaseUsers200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDatabases()`

```php
getDatabases($limit, $offset): \OpenAPI\Client\Model\GetDatabases200Response
```

Получение списка всех баз данных

Чтобы получить список всех баз данных на вашем аккаунте, отправьте GET-запрос на `/api/v1/dbs`.   Тело ответа будет представлять собой объект JSON с ключом `dbs`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DatabasesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$limit = 100; // int | Обозначает количество записей, которое необходимо вернуть.
$offset = 0; // int | Указывает на смещение относительно начала списка.

try {
    $result = $apiInstance->getDatabases($limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DatabasesApi->getDatabases: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **limit** | **int**| Обозначает количество записей, которое необходимо вернуть. | [optional] [default to 100] |
| **offset** | **int**| Указывает на смещение относительно начала списка. | [optional] [default to 0] |

### Return type

[**\OpenAPI\Client\Model\GetDatabases200Response**](../Model/GetDatabases200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDatabasesPresets()`

```php
getDatabasesPresets(): \OpenAPI\Client\Model\GetDatabasesPresets200Response
```

Получение списка тарифов для баз данных

Чтобы получить список тарифов для баз данных, отправьте GET-запрос на `/api/v1/presets/dbs`.   Тело ответа будет представлять собой объект JSON с ключом `databases_presets`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DatabasesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getDatabasesPresets();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DatabasesApi->getDatabasesPresets: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\GetDatabasesPresets200Response**](../Model/GetDatabasesPresets200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `restoreDatabaseFromBackup()`

```php
restoreDatabaseFromBackup($db_id, $backup_id)
```

Восстановление базы данных из бэкапа

Чтобы восстановить базу данных из бэкапа, отправьте запрос PUT в `api/v1/dbs/{db_id}/backups/{backup_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DatabasesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$db_id = 56; // int | Идентификатор базы данных
$backup_id = 56; // int | Идентификатор резевной копии

try {
    $apiInstance->restoreDatabaseFromBackup($db_id, $backup_id);
} catch (Exception $e) {
    echo 'Exception when calling DatabasesApi->restoreDatabaseFromBackup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **db_id** | **int**| Идентификатор базы данных | |
| **backup_id** | **int**| Идентификатор резевной копии | |

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

## `updateDatabase()`

```php
updateDatabase($db_id, $update_db): \OpenAPI\Client\Model\CreateDatabase201Response
```

Обновление базы данных

Чтобы обновить только определенные атрибуты базы данных, отправьте запрос PATCH в `api/v1/dbs/{db_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DatabasesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$db_id = 56; // int | Идентификатор базы данных
$update_db = new \OpenAPI\Client\Model\UpdateDb(); // \OpenAPI\Client\Model\UpdateDb

try {
    $result = $apiInstance->updateDatabase($db_id, $update_db);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DatabasesApi->updateDatabase: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **db_id** | **int**| Идентификатор базы данных | |
| **update_db** | [**\OpenAPI\Client\Model\UpdateDb**](../Model/UpdateDb.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateDatabase201Response**](../Model/CreateDatabase201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateDatabaseAutoBackupsSettings()`

```php
updateDatabaseAutoBackupsSettings($db_id, $auto_backup): \OpenAPI\Client\Model\GetDatabaseAutoBackupsSettings200Response
```

Изменение настроек автобэкапов базы данных

Чтобы изменить список настроек автобэкапов базы данных, отправьте запрос PATCH в `api/v1/dbs/{db_id}/auto-backups`

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DatabasesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$db_id = 56; // int | Идентификатор базы данных
$auto_backup = new \OpenAPI\Client\Model\AutoBackup(); // \OpenAPI\Client\Model\AutoBackup | При значении `is_enabled`: `true`, поля `copy_count`, `creation_start_at`, `interval` являются обязательными

try {
    $result = $apiInstance->updateDatabaseAutoBackupsSettings($db_id, $auto_backup);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DatabasesApi->updateDatabaseAutoBackupsSettings: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **db_id** | **int**| Идентификатор базы данных | |
| **auto_backup** | [**\OpenAPI\Client\Model\AutoBackup**](../Model/AutoBackup.md)| При значении &#x60;is_enabled&#x60;: &#x60;true&#x60;, поля &#x60;copy_count&#x60;, &#x60;creation_start_at&#x60;, &#x60;interval&#x60; являются обязательными | [optional] |

### Return type

[**\OpenAPI\Client\Model\GetDatabaseAutoBackupsSettings200Response**](../Model/GetDatabaseAutoBackupsSettings200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateDatabaseCluster()`

```php
updateDatabaseCluster($db_cluster_id, $update_cluster): \OpenAPI\Client\Model\CreateDatabaseCluster201Response
```

Изменение кластера базы данных

Чтобы изменить кластер базы данных на вашем аккаунте, отправьте PATCH-запрос на `/api/v1/databases/{db_cluster_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DatabasesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$db_cluster_id = 56; // int | Идентификатор кластера базы данных
$update_cluster = new \OpenAPI\Client\Model\UpdateCluster(); // \OpenAPI\Client\Model\UpdateCluster

try {
    $result = $apiInstance->updateDatabaseCluster($db_cluster_id, $update_cluster);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DatabasesApi->updateDatabaseCluster: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **db_cluster_id** | **int**| Идентификатор кластера базы данных | |
| **update_cluster** | [**\OpenAPI\Client\Model\UpdateCluster**](../Model/UpdateCluster.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateDatabaseCluster201Response**](../Model/CreateDatabaseCluster201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateDatabaseInstance()`

```php
updateDatabaseInstance($db_cluster_id, $update_instance): \OpenAPI\Client\Model\CreateDatabaseInstance201Response
```

Изменение инстанса базы данных

Чтобы изменить инстанс базы данных, отправьте PATCH-запрос на `/api/v1/databases/{db_cluster_id}/instances/{instance_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DatabasesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$db_cluster_id = 56; // int | Идентификатор кластера базы данных
$update_instance = new \OpenAPI\Client\Model\UpdateInstance(); // \OpenAPI\Client\Model\UpdateInstance

try {
    $result = $apiInstance->updateDatabaseInstance($db_cluster_id, $update_instance);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DatabasesApi->updateDatabaseInstance: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **db_cluster_id** | **int**| Идентификатор кластера базы данных | |
| **update_instance** | [**\OpenAPI\Client\Model\UpdateInstance**](../Model/UpdateInstance.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateDatabaseInstance201Response**](../Model/CreateDatabaseInstance201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateDatabaseUser()`

```php
updateDatabaseUser($db_cluster_id, $admin_id, $update_admin): \OpenAPI\Client\Model\CreateDatabaseUser201Response
```

Изменение пользователя базы данных

Чтобы изменить пользователя базы данных на вашем аккаунте, отправьте PATCH-запрос на `/api/v1/databases/{db_cluster_id}/admins/{admin_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DatabasesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$db_cluster_id = 56; // int | Идентификатор кластера базы данных
$admin_id = 56; // int | Идентификатор пользователя базы данных
$update_admin = new \OpenAPI\Client\Model\UpdateAdmin(); // \OpenAPI\Client\Model\UpdateAdmin

try {
    $result = $apiInstance->updateDatabaseUser($db_cluster_id, $admin_id, $update_admin);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DatabasesApi->updateDatabaseUser: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **db_cluster_id** | **int**| Идентификатор кластера базы данных | |
| **admin_id** | **int**| Идентификатор пользователя базы данных | |
| **update_admin** | [**\OpenAPI\Client\Model\UpdateAdmin**](../Model/UpdateAdmin.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateDatabaseUser201Response**](../Model/CreateDatabaseUser201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
