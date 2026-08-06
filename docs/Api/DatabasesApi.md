# OpenAPI\Client\DatabasesApi

All URIs are relative to https://api.timeweb.cloud, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createDatabaseBackup()**](DatabasesApi.md#createDatabaseBackup) | **POST** /api/v1/dbs/{db_id}/backups | Создание бэкапа базы данных |
| [**createDatabaseBackupDownloadUrl()**](DatabasesApi.md#createDatabaseBackupDownloadUrl) | **POST** /api/v1/dbs/{db_id}/backups/{backup_id}/download-url | Получение ссылки для скачивания бэкапа базы данных |
| [**createDatabaseCluster()**](DatabasesApi.md#createDatabaseCluster) | **POST** /api/v1/databases | Создание кластера базы данных |
| [**createDatabaseInstance()**](DatabasesApi.md#createDatabaseInstance) | **POST** /api/v1/databases/{db_cluster_id}/instances | Создание инстанса базы данных |
| [**createDatabaseS3Backup()**](DatabasesApi.md#createDatabaseS3Backup) | **POST** /api/v2/databases/{db_id}/backups | Создание S3-бэкапа базы данных |
| [**createDatabaseUser()**](DatabasesApi.md#createDatabaseUser) | **POST** /api/v1/databases/{db_cluster_id}/admins | Создание пользователя базы данных |
| [**deleteDatabaseBackup()**](DatabasesApi.md#deleteDatabaseBackup) | **DELETE** /api/v1/dbs/{db_id}/backups/{backup_id} | Удаление бэкапа базы данных |
| [**deleteDatabaseCluster()**](DatabasesApi.md#deleteDatabaseCluster) | **DELETE** /api/v1/databases/{db_cluster_id} | Удаление кластера базы данных |
| [**deleteDatabaseInstance()**](DatabasesApi.md#deleteDatabaseInstance) | **DELETE** /api/v1/databases/{db_cluster_id}/instances/{instance_id} | Удаление инстанса базы данных |
| [**deleteDatabaseS3Backup()**](DatabasesApi.md#deleteDatabaseS3Backup) | **DELETE** /api/v2/databases/{db_id}/backups/{backup_id} | Удаление S3-бэкапа базы данных |
| [**deleteDatabaseUser()**](DatabasesApi.md#deleteDatabaseUser) | **DELETE** /api/v1/databases/{db_cluster_id}/admins/{admin_id} | Удаление пользователя базы данных |
| [**getDatabaseAutoBackupsSettings()**](DatabasesApi.md#getDatabaseAutoBackupsSettings) | **GET** /api/v1/dbs/{db_id}/auto-backups | Получение настроек автобэкапов базы данных |
| [**getDatabaseBackup()**](DatabasesApi.md#getDatabaseBackup) | **GET** /api/v1/dbs/{db_id}/backups/{backup_id} | Получение бэкапа базы данных |
| [**getDatabaseBackups()**](DatabasesApi.md#getDatabaseBackups) | **GET** /api/v1/dbs/{db_id}/backups | Список бэкапов базы данных |
| [**getDatabaseCluster()**](DatabasesApi.md#getDatabaseCluster) | **GET** /api/v1/databases/{db_cluster_id} | Получение кластера базы данных |
| [**getDatabaseClusterReplicas()**](DatabasesApi.md#getDatabaseClusterReplicas) | **GET** /api/v1/databases/{db_cluster_id}/replicas | Получение списка реплик кластера базы данных |
| [**getDatabaseClusterTypes()**](DatabasesApi.md#getDatabaseClusterTypes) | **GET** /api/v1/database-types | Получение списка типов кластеров баз данных |
| [**getDatabaseClusters()**](DatabasesApi.md#getDatabaseClusters) | **GET** /api/v1/databases | Получение списка кластеров баз данных |
| [**getDatabaseConfigurators()**](DatabasesApi.md#getDatabaseConfigurators) | **GET** /api/v1/configurator/databases | Получение списка конфигураторов баз данных |
| [**getDatabaseDefaultParameters()**](DatabasesApi.md#getDatabaseDefaultParameters) | **GET** /api/v1/dbs/default-parameters | Получение рекомендуемых значений параметров баз данных |
| [**getDatabaseInstance()**](DatabasesApi.md#getDatabaseInstance) | **GET** /api/v1/databases/{db_cluster_id}/instances/{instance_id} | Получение инстанса базы данных |
| [**getDatabaseInstances()**](DatabasesApi.md#getDatabaseInstances) | **GET** /api/v1/databases/{db_cluster_id}/instances | Получение списка инстансов баз данных |
| [**getDatabaseParameters()**](DatabasesApi.md#getDatabaseParameters) | **GET** /api/v1/dbs/parameters | Получение списка параметров баз данных |
| [**getDatabasePreset()**](DatabasesApi.md#getDatabasePreset) | **GET** /api/v2/dbs/presets/{preset_id} | Получение тарифа для базы данных |
| [**getDatabasePrivileges()**](DatabasesApi.md#getDatabasePrivileges) | **GET** /api/v1/databases/{db_cluster_id}/privileges | Получение привилегий кластера базы данных |
| [**getDatabaseS3Backup()**](DatabasesApi.md#getDatabaseS3Backup) | **GET** /api/v2/databases/{db_id}/backups/{backup_id} | Получение S3-бэкапа базы данных |
| [**getDatabaseS3Backups()**](DatabasesApi.md#getDatabaseS3Backups) | **GET** /api/v2/databases/{db_id}/backups | Список S3-бэкапов базы данных |
| [**getDatabaseUser()**](DatabasesApi.md#getDatabaseUser) | **GET** /api/v1/databases/{db_cluster_id}/admins/{admin_id} | Получение пользователя базы данных |
| [**getDatabaseUsers()**](DatabasesApi.md#getDatabaseUsers) | **GET** /api/v1/databases/{db_cluster_id}/admins | Получение списка пользователей базы данных |
| [**getDatabasesPresets()**](DatabasesApi.md#getDatabasesPresets) | **GET** /api/v2/presets/dbs | Получение списка тарифов для баз данных |
| [**performDatabaseClusterAction()**](DatabasesApi.md#performDatabaseClusterAction) | **POST** /api/v1/databases/{db_cluster_id}/action | Выполнение действия над кластером базы данных |
| [**restoreDatabaseFromBackup()**](DatabasesApi.md#restoreDatabaseFromBackup) | **PUT** /api/v1/dbs/{db_id}/backups/{backup_id} | Восстановление базы данных из бэкапа |
| [**restoreDatabaseFromS3Backup()**](DatabasesApi.md#restoreDatabaseFromS3Backup) | **POST** /api/v2/databases/{db_id}/backups/{backup_id}/restore | Восстановление базы данных из S3-бэкапа |
| [**updateDatabaseAutoBackupsSettings()**](DatabasesApi.md#updateDatabaseAutoBackupsSettings) | **PATCH** /api/v1/dbs/{db_id}/auto-backups | Изменение настроек автобэкапов базы данных |
| [**updateDatabaseBackup()**](DatabasesApi.md#updateDatabaseBackup) | **PATCH** /api/v1/dbs/{db_id}/backups/{backup_id} | Изменение комментария к бэкапу базы данных |
| [**updateDatabaseCluster()**](DatabasesApi.md#updateDatabaseCluster) | **PATCH** /api/v1/databases/{db_cluster_id} | Изменение кластера базы данных |
| [**updateDatabaseClusterV2()**](DatabasesApi.md#updateDatabaseClusterV2) | **PATCH** /api/v2/databases/{db_cluster_id} | Изменение кластера базы данных (v2) |
| [**updateDatabaseInstance()**](DatabasesApi.md#updateDatabaseInstance) | **PATCH** /api/v1/databases/{db_cluster_id}/instances/{instance_id} | Изменение инстанса базы данных |
| [**updateDatabaseS3Backup()**](DatabasesApi.md#updateDatabaseS3Backup) | **PATCH** /api/v2/databases/{db_id}/backups/{backup_id} | Изменение комментария S3-бэкапа базы данных |
| [**updateDatabaseUser()**](DatabasesApi.md#updateDatabaseUser) | **PATCH** /api/v1/databases/{db_cluster_id}/admins/{admin_id} | Изменение пользователя базы данных |


## `createDatabaseBackup()`

```php
createDatabaseBackup($db_id, $dbs_create_backup): \OpenAPI\Client\Model\CreateDatabaseBackup201Response
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
$db_id = 56; // int | ID базы данных
$dbs_create_backup = new \OpenAPI\Client\Model\DbsCreateBackup(); // \OpenAPI\Client\Model\DbsCreateBackup

try {
    $result = $apiInstance->createDatabaseBackup($db_id, $dbs_create_backup);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DatabasesApi->createDatabaseBackup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **db_id** | **int**| ID базы данных | |
| **dbs_create_backup** | [**\OpenAPI\Client\Model\DbsCreateBackup**](../Model/DbsCreateBackup.md)|  | [optional] |

### Return type

[**\OpenAPI\Client\Model\CreateDatabaseBackup201Response**](../Model/CreateDatabaseBackup201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createDatabaseBackupDownloadUrl()`

```php
createDatabaseBackupDownloadUrl($db_id, $backup_id, $backup_download_url_request): \OpenAPI\Client\Model\CreateDatabaseBackupDownloadUrl201Response
```

Получение ссылки для скачивания бэкапа базы данных

Чтобы получить ссылку для скачивания резервной копии базы данных, отправьте POST-запрос на `/api/v1/dbs/{db_id}/backups/{backup_id}/download-url`.   Скачивание резервных копий доступно не для всех кластеров. Если для вашего кластера оно недоступно, метод вернет ошибку со статусом `400`.   Тело ответа будет представлять собой объект JSON с ключом `backup_url`.

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
$db_id = 56; // int | ID базы данных
$backup_id = 56; // int | ID резервной копии
$backup_download_url_request = new \OpenAPI\Client\Model\BackupDownloadUrlRequest(); // \OpenAPI\Client\Model\BackupDownloadUrlRequest

try {
    $result = $apiInstance->createDatabaseBackupDownloadUrl($db_id, $backup_id, $backup_download_url_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DatabasesApi->createDatabaseBackupDownloadUrl: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **db_id** | **int**| ID базы данных | |
| **backup_id** | **int**| ID резервной копии | |
| **backup_download_url_request** | [**\OpenAPI\Client\Model\BackupDownloadUrlRequest**](../Model/BackupDownloadUrlRequest.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateDatabaseBackupDownloadUrl201Response**](../Model/CreateDatabaseBackupDownloadUrl201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createDatabaseCluster()`

```php
createDatabaseCluster($create_cluster): \OpenAPI\Client\Model\CreateDatabaseCluster201Response
```

Создание кластера базы данных

Чтобы создать кластер базы данных на вашем аккаунте, отправьте POST-запрос на `/api/v1/databases`.   Вместе с кластером будет создан один инстанс базы данных и один пользователь.   Размер кластера задается либо тарифом (`preset_id`), либо конфигуратором (`configuration`). Эти поля взаимоисключающие, но одно из них передать обязательно — запрос без обоих вернется с ошибкой.

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
$db_cluster_id = 56; // int | ID кластера базы данных
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
| **db_cluster_id** | **int**| ID кластера базы данных | |
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

## `createDatabaseS3Backup()`

```php
createDatabaseS3Backup($db_id, $create_s3_backup): \OpenAPI\Client\Model\CreateDatabaseS3Backup201Response
```

Создание S3-бэкапа базы данных

Чтобы создать резервную копию кластера базы данных в объектном хранилище, отправьте POST-запрос на `/api/v2/databases/{db_id}/backups`.   Тело запроса необязательно: единственное поле `comment` можно не передавать. Тело ответа будет представлять собой объект JSON с ключом `backup`.   Копия создается асинхронно. Пока она создается, ее статус — `running`, и восстановиться из нее нельзя. Дождитесь статуса `success`, опрашивая `/api/v2/databases/{db_id}/backups/{backup_id}`.

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
$db_id = 56; // int | ID базы данных
$create_s3_backup = new \OpenAPI\Client\Model\CreateS3Backup(); // \OpenAPI\Client\Model\CreateS3Backup

try {
    $result = $apiInstance->createDatabaseS3Backup($db_id, $create_s3_backup);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DatabasesApi->createDatabaseS3Backup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **db_id** | **int**| ID базы данных | |
| **create_s3_backup** | [**\OpenAPI\Client\Model\CreateS3Backup**](../Model/CreateS3Backup.md)|  | [optional] |

### Return type

[**\OpenAPI\Client\Model\CreateDatabaseS3Backup201Response**](../Model/CreateDatabaseS3Backup201Response.md)

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
$db_cluster_id = 56; // int | ID кластера базы данных
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
| **db_cluster_id** | **int**| ID кластера базы данных | |
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
$db_id = 56; // int | ID базы данных
$backup_id = 56; // int | ID резервной копии

try {
    $apiInstance->deleteDatabaseBackup($db_id, $backup_id);
} catch (Exception $e) {
    echo 'Exception when calling DatabasesApi->deleteDatabaseBackup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **db_id** | **int**| ID базы данных | |
| **backup_id** | **int**| ID резервной копии | |

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
deleteDatabaseCluster($db_cluster_id): \OpenAPI\Client\Model\DeleteDatabaseCluster200Response
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
$db_cluster_id = 56; // int | ID кластера базы данных

try {
    $result = $apiInstance->deleteDatabaseCluster($db_cluster_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DatabasesApi->deleteDatabaseCluster: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **db_cluster_id** | **int**| ID кластера базы данных | |

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
$db_cluster_id = 56; // int | ID кластера базы данных
$instance_id = 56; // int | ID инстанса базы данных

try {
    $apiInstance->deleteDatabaseInstance($db_cluster_id, $instance_id);
} catch (Exception $e) {
    echo 'Exception when calling DatabasesApi->deleteDatabaseInstance: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **db_cluster_id** | **int**| ID кластера базы данных | |
| **instance_id** | **int**| ID инстанса базы данных | |

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

## `deleteDatabaseS3Backup()`

```php
deleteDatabaseS3Backup($db_id, $backup_id)
```

Удаление S3-бэкапа базы данных

Чтобы удалить резервную копию кластера базы данных из объектного хранилища, отправьте DELETE-запрос на `/api/v2/databases/{db_id}/backups/{backup_id}`.   Копия удаляется безвозвратно, тело ответа пустое. На резервные копии из `/api/v1/dbs/{db_id}/backups/{backup_id}` этот метод не действует — они удаляются отдельным запросом.

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
$db_id = 56; // int | ID базы данных
$backup_id = 'backup_id_example'; // string | ID резервной копии в формате UUID

try {
    $apiInstance->deleteDatabaseS3Backup($db_id, $backup_id);
} catch (Exception $e) {
    echo 'Exception when calling DatabasesApi->deleteDatabaseS3Backup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **db_id** | **int**| ID базы данных | |
| **backup_id** | **string**| ID резервной копии в формате UUID | |

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
$db_cluster_id = 56; // int | ID кластера базы данных
$admin_id = 56; // int | ID пользователя базы данных

try {
    $apiInstance->deleteDatabaseUser($db_cluster_id, $admin_id);
} catch (Exception $e) {
    echo 'Exception when calling DatabasesApi->deleteDatabaseUser: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **db_cluster_id** | **int**| ID кластера базы данных | |
| **admin_id** | **int**| ID пользователя базы данных | |

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
$db_id = 56; // int | ID базы данных

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
| **db_id** | **int**| ID базы данных | |

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
getDatabaseBackup($db_id, $backup_id): \OpenAPI\Client\Model\GetDatabaseBackup200Response
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
$db_id = 56; // int | ID базы данных
$backup_id = 56; // int | ID резервной копии

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
| **db_id** | **int**| ID базы данных | |
| **backup_id** | **int**| ID резервной копии | |

### Return type

[**\OpenAPI\Client\Model\GetDatabaseBackup200Response**](../Model/GetDatabaseBackup200Response.md)

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
$db_id = 56; // int | ID базы данных
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
| **db_id** | **int**| ID базы данных | |
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
$db_cluster_id = 56; // int | ID кластера базы данных

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
| **db_cluster_id** | **int**| ID кластера базы данных | |

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

## `getDatabaseClusterReplicas()`

```php
getDatabaseClusterReplicas($db_cluster_id): \OpenAPI\Client\Model\GetDatabaseClusterReplicas200Response
```

Получение списка реплик кластера базы данных

Чтобы получить список реплик кластера базы данных, отправьте GET-запрос на `/api/v1/databases/{db_cluster_id}/replicas`.   Тело ответа будет представлять собой объект JSON с ключом `replicas`.

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
$db_cluster_id = 56; // int | ID кластера базы данных

try {
    $result = $apiInstance->getDatabaseClusterReplicas($db_cluster_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DatabasesApi->getDatabaseClusterReplicas: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **db_cluster_id** | **int**| ID кластера базы данных | |

### Return type

[**\OpenAPI\Client\Model\GetDatabaseClusterReplicas200Response**](../Model/GetDatabaseClusterReplicas200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDatabaseClusterTypes()`

```php
getDatabaseClusterTypes(): \OpenAPI\Client\Model\GetDatabaseClusterTypes200Response
```

Получение списка типов кластеров баз данных

Чтобы получить список типов баз данных на вашем аккаунте, отправьте GET-запрос на `/api/v1/database-types`.

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
    $result = $apiInstance->getDatabaseClusterTypes();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DatabasesApi->getDatabaseClusterTypes: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\GetDatabaseClusterTypes200Response**](../Model/GetDatabaseClusterTypes200Response.md)

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

## `getDatabaseConfigurators()`

```php
getDatabaseConfigurators($cluster_id, $with_unavailable): \OpenAPI\Client\Model\GetDatabaseConfigurators200Response
```

Получение списка конфигураторов баз данных

Чтобы получить список конфигураторов баз данных, отправьте GET-запрос на `/api/v1/configurator/databases`.   Конфигуратор позволяет создать кластер с произвольным количеством ресурсов вместо готового тарифа: его ID передается при создании кластера в поле `configuration.configurator_id`, а допустимые значения ресурсов ограничены объектом `requirements`.   Тело ответа будет представлять собой объект JSON с ключом `database_configurators`.

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
$cluster_id = 56; // int | ID кластера базы данных. Возвращает конфигураторы группы, в пределах которой доступна смена конфигурации этого кластера (сценарий изменения кластера).
$with_unavailable = True; // bool | Включить в ответ конфигураторы, недоступные к заказу из-за нехватки свободных ресурсов. Учитывается только при запросе без `cluster_id`.

try {
    $result = $apiInstance->getDatabaseConfigurators($cluster_id, $with_unavailable);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DatabasesApi->getDatabaseConfigurators: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **cluster_id** | **int**| ID кластера базы данных. Возвращает конфигураторы группы, в пределах которой доступна смена конфигурации этого кластера (сценарий изменения кластера). | [optional] |
| **with_unavailable** | **bool**| Включить в ответ конфигураторы, недоступные к заказу из-за нехватки свободных ресурсов. Учитывается только при запросе без &#x60;cluster_id&#x60;. | [optional] |

### Return type

[**\OpenAPI\Client\Model\GetDatabaseConfigurators200Response**](../Model/GetDatabaseConfigurators200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDatabaseDefaultParameters()`

```php
getDatabaseDefaultParameters($type, $ram, $replica_count): \OpenAPI\Client\Model\GetDatabaseDefaultParameters200Response
```

Получение рекомендуемых значений параметров баз данных

Чтобы получить рекомендуемые значения параметров базы данных, отправьте GET-запрос на `/api/v1/dbs/default-parameters`.   Значения рассчитываются для указанного типа кластера, объема оперативной памяти и количества реплик — их можно передать при создании кластера в поле `config_parameters`. Список имен параметров, доступных для каждого типа кластера, возвращает `GET /api/v1/dbs/parameters`.   Тело ответа будет представлять собой объект JSON с ключом `config_params`. Рекомендуемые значения рассчитываются только для кластеров MySQL, PostgreSQL и Valkey — для остальных типов возвращается пустой объект.

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
$type = postgres17; // string | Тип кластера базы данных.
$ram = 2048; // int | Объём оперативной памяти кластера (в Мб).
$replica_count = 1; // int | Количество нод (реплик) кластера.

try {
    $result = $apiInstance->getDatabaseDefaultParameters($type, $ram, $replica_count);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DatabasesApi->getDatabaseDefaultParameters: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **type** | **string**| Тип кластера базы данных. | |
| **ram** | **int**| Объём оперативной памяти кластера (в Мб). | |
| **replica_count** | **int**| Количество нод (реплик) кластера. | [optional] [default to 1] |

### Return type

[**\OpenAPI\Client\Model\GetDatabaseDefaultParameters200Response**](../Model/GetDatabaseDefaultParameters200Response.md)

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
$db_cluster_id = 56; // int | ID кластера базы данных
$instance_id = 56; // int | ID инстанса базы данных

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
| **db_cluster_id** | **int**| ID кластера базы данных | |
| **instance_id** | **int**| ID инстанса базы данных | |

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
$db_cluster_id = 56; // int | ID кластера базы данных

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
| **db_cluster_id** | **int**| ID кластера базы данных | |

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

## `getDatabaseParameters()`

```php
getDatabaseParameters(): \OpenAPI\Client\Model\DbParametersByType
```

Получение списка параметров баз данных

Чтобы получить список параметров баз данных, отправьте GET-запрос на `/api/v1/dbs/parameters`.   Ответ содержит только имена параметров, доступных для каждого типа кластера. Рекомендуемые значения этих параметров для конкретной конфигурации возвращает `GET /api/v1/dbs/default-parameters`.

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
    $result = $apiInstance->getDatabaseParameters();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DatabasesApi->getDatabaseParameters: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\DbParametersByType**](../Model/DbParametersByType.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDatabasePreset()`

```php
getDatabasePreset($preset_id): \OpenAPI\Client\Model\GetDatabasePreset200Response
```

Получение тарифа для базы данных

Чтобы получить тариф для базы данных, отправьте GET-запрос на `/api/v2/dbs/presets/{preset_id}`.   Тело ответа будет представлять собой объект JSON с ключом `databases_preset`.

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
$preset_id = 56; // int | ID тарифа

try {
    $result = $apiInstance->getDatabasePreset($preset_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DatabasesApi->getDatabasePreset: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **preset_id** | **int**| ID тарифа | |

### Return type

[**\OpenAPI\Client\Model\GetDatabasePreset200Response**](../Model/GetDatabasePreset200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDatabasePrivileges()`

```php
getDatabasePrivileges($db_cluster_id): \OpenAPI\Client\Model\GetDatabasePrivileges200Response
```

Получение привилегий кластера базы данных

Чтобы получить список привилегий, которые можно выдать пользователям кластера базы данных, отправьте GET-запрос на `/api/v1/databases/{db_cluster_id}/privileges`.\\    Список зависит от типа СУБД кластера и определяется сервером автоматически: возвращаются только те привилегии, которые допустимы для этого кластера. Используйте его, чтобы заполнить поле `privileges` при <a href='#tag/Bazy-dannyh/operation/createDatabaseUser'>создании</a> или <a href='#tag/Bazy-dannyh/operation/updateDatabaseUser'>изменении</a> пользователя базы данных.

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
$db_cluster_id = 56; // int | ID кластера базы данных

try {
    $result = $apiInstance->getDatabasePrivileges($db_cluster_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DatabasesApi->getDatabasePrivileges: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **db_cluster_id** | **int**| ID кластера базы данных | |

### Return type

[**\OpenAPI\Client\Model\GetDatabasePrivileges200Response**](../Model/GetDatabasePrivileges200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDatabaseS3Backup()`

```php
getDatabaseS3Backup($db_id, $backup_id): \OpenAPI\Client\Model\CreateDatabaseS3Backup201Response
```

Получение S3-бэкапа базы данных

Чтобы получить информацию о резервной копии кластера базы данных в объектном хранилище, отправьте GET-запрос на `/api/v2/databases/{db_id}/backups/{backup_id}`.   Тело ответа будет представлять собой объект JSON с ключом `backup`. Обратите внимание, что `backup_id` здесь — строка в формате UUID, а не число, как в `/api/v1/dbs/{db_id}/backups/{backup_id}`.

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
$db_id = 56; // int | ID базы данных
$backup_id = 'backup_id_example'; // string | ID резервной копии в формате UUID

try {
    $result = $apiInstance->getDatabaseS3Backup($db_id, $backup_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DatabasesApi->getDatabaseS3Backup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **db_id** | **int**| ID базы данных | |
| **backup_id** | **string**| ID резервной копии в формате UUID | |

### Return type

[**\OpenAPI\Client\Model\CreateDatabaseS3Backup201Response**](../Model/CreateDatabaseS3Backup201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDatabaseS3Backups()`

```php
getDatabaseS3Backups($db_id): \OpenAPI\Client\Model\GetDatabaseS3Backups200Response
```

Список S3-бэкапов базы данных

Чтобы получить список резервных копий кластера базы данных в объектном хранилище, отправьте GET-запрос на `/api/v2/databases/{db_id}/backups`.   Тело ответа будет представлять собой объект JSON с ключом `backups`. Копии отсортированы по дате создания по убыванию — сначала самые свежие.   Резервное копирование в объектное хранилище доступно для кластеров MySQL и PostgreSQL. Идентификатор такой копии — строка в формате UUID; это отдельный от `/api/v1/dbs/{db_id}/backups` механизм, и идентификаторы копий между ними не взаимозаменяемы.

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
$db_id = 56; // int | ID базы данных

try {
    $result = $apiInstance->getDatabaseS3Backups($db_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DatabasesApi->getDatabaseS3Backups: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **db_id** | **int**| ID базы данных | |

### Return type

[**\OpenAPI\Client\Model\GetDatabaseS3Backups200Response**](../Model/GetDatabaseS3Backups200Response.md)

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
$db_cluster_id = 56; // int | ID кластера базы данных
$admin_id = 56; // int | ID пользователя базы данных

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
| **db_cluster_id** | **int**| ID кластера базы данных | |
| **admin_id** | **int**| ID пользователя базы данных | |

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
$db_cluster_id = 56; // int | ID кластера базы данных

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
| **db_cluster_id** | **int**| ID кластера базы данных | |

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

## `getDatabasesPresets()`

```php
getDatabasesPresets($cluster_id, $with_unavailable): \OpenAPI\Client\Model\GetDatabasesPresets200Response
```

Получение списка тарифов для баз данных

Чтобы получить список тарифов для баз данных, отправьте GET-запрос на `/api/v2/presets/dbs`.   Без параметров возвращаются тарифы, доступные к заказу — этот список используется при создании кластера. Если передать `cluster_id`, вернутся тарифы группы, в пределах которой можно сменить тариф указанного кластера.   Тело ответа будет представлять собой объект JSON с ключом `databases_presets`.

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
$cluster_id = 56; // int | ID кластера базы данных. Возвращает тарифы группы, в пределах которой доступна смена тарифа этого кластера (сценарий изменения кластера).
$with_unavailable = True; // bool | Включить в ответ тарифы, недоступные к заказу из-за нехватки свободных ресурсов. Учитывается только при запросе без `cluster_id`: вместе с `cluster_id` фильтр по свободным ресурсам и так не применяется.

try {
    $result = $apiInstance->getDatabasesPresets($cluster_id, $with_unavailable);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DatabasesApi->getDatabasesPresets: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **cluster_id** | **int**| ID кластера базы данных. Возвращает тарифы группы, в пределах которой доступна смена тарифа этого кластера (сценарий изменения кластера). | [optional] |
| **with_unavailable** | **bool**| Включить в ответ тарифы, недоступные к заказу из-за нехватки свободных ресурсов. Учитывается только при запросе без &#x60;cluster_id&#x60;: вместе с &#x60;cluster_id&#x60; фильтр по свободным ресурсам и так не применяется. | [optional] |

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

## `performDatabaseClusterAction()`

```php
performDatabaseClusterAction($db_cluster_id, $cluster_action)
```

Выполнение действия над кластером базы данных

Чтобы выполнить действие над кластером базы данных, отправьте POST-запрос на `/api/v1/databases/{db_cluster_id}/action`.   Доступные действия: `reboot` — перезагрузка кластера, `shutdown` — выключение кластера, `start` — включение кластера.

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
$db_cluster_id = 56; // int | ID кластера базы данных
$cluster_action = new \OpenAPI\Client\Model\ClusterAction(); // \OpenAPI\Client\Model\ClusterAction

try {
    $apiInstance->performDatabaseClusterAction($db_cluster_id, $cluster_action);
} catch (Exception $e) {
    echo 'Exception when calling DatabasesApi->performDatabaseClusterAction: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **db_cluster_id** | **int**| ID кластера базы данных | |
| **cluster_action** | [**\OpenAPI\Client\Model\ClusterAction**](../Model/ClusterAction.md)|  | |

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
$db_id = 56; // int | ID базы данных
$backup_id = 56; // int | ID резервной копии

try {
    $apiInstance->restoreDatabaseFromBackup($db_id, $backup_id);
} catch (Exception $e) {
    echo 'Exception when calling DatabasesApi->restoreDatabaseFromBackup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **db_id** | **int**| ID базы данных | |
| **backup_id** | **int**| ID резервной копии | |

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

## `restoreDatabaseFromS3Backup()`

```php
restoreDatabaseFromS3Backup($db_id, $backup_id)
```

Восстановление базы данных из S3-бэкапа

Чтобы восстановить кластер базы данных из резервной копии в объектном хранилище, отправьте POST-запрос на `/api/v2/databases/{db_id}/backups/{backup_id}/restore`.   Тела запроса нет, тело ответа пустое. Восстановиться можно только из копии со статусом `success`.   Сразу после запуска кластер переходит в статус `backup_recovery`. Пока восстановление не завершится, создание, изменение и удаление резервных копий, а также повторный запуск восстановления недоступны.

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
$db_id = 56; // int | ID базы данных
$backup_id = 'backup_id_example'; // string | ID резервной копии в формате UUID

try {
    $apiInstance->restoreDatabaseFromS3Backup($db_id, $backup_id);
} catch (Exception $e) {
    echo 'Exception when calling DatabasesApi->restoreDatabaseFromS3Backup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **db_id** | **int**| ID базы данных | |
| **backup_id** | **string**| ID резервной копии в формате UUID | |

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

## `updateDatabaseAutoBackupsSettings()`

```php
updateDatabaseAutoBackupsSettings($db_id, $update_auto_backup): \OpenAPI\Client\Model\GetDatabaseAutoBackupsSettings200Response
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
$db_id = 56; // int | ID базы данных
$update_auto_backup = new \OpenAPI\Client\Model\UpdateAutoBackup(); // \OpenAPI\Client\Model\UpdateAutoBackup | При значении `is_enabled`: `true`, поля `copy_count`, `creation_start_at`, `interval` являются обязательными

try {
    $result = $apiInstance->updateDatabaseAutoBackupsSettings($db_id, $update_auto_backup);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DatabasesApi->updateDatabaseAutoBackupsSettings: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **db_id** | **int**| ID базы данных | |
| **update_auto_backup** | [**\OpenAPI\Client\Model\UpdateAutoBackup**](../Model/UpdateAutoBackup.md)| При значении &#x60;is_enabled&#x60;: &#x60;true&#x60;, поля &#x60;copy_count&#x60;, &#x60;creation_start_at&#x60;, &#x60;interval&#x60; являются обязательными | |

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

## `updateDatabaseBackup()`

```php
updateDatabaseBackup($db_id, $backup_id, $dbs_update_backup): \OpenAPI\Client\Model\GetDatabaseBackup200Response
```

Изменение комментария к бэкапу базы данных

Чтобы изменить комментарий к бэкапу базы данных, отправьте PATCH-запрос на `/api/v1/dbs/{db_id}/backups/{backup_id}`.  Тело ответа будет представлять собой объект JSON с ключом `backup`.

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
$db_id = 56; // int | ID базы данных
$backup_id = 56; // int | ID резервной копии
$dbs_update_backup = new \OpenAPI\Client\Model\DbsUpdateBackup(); // \OpenAPI\Client\Model\DbsUpdateBackup

try {
    $result = $apiInstance->updateDatabaseBackup($db_id, $backup_id, $dbs_update_backup);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DatabasesApi->updateDatabaseBackup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **db_id** | **int**| ID базы данных | |
| **backup_id** | **int**| ID резервной копии | |
| **dbs_update_backup** | [**\OpenAPI\Client\Model\DbsUpdateBackup**](../Model/DbsUpdateBackup.md)|  | |

### Return type

[**\OpenAPI\Client\Model\GetDatabaseBackup200Response**](../Model/GetDatabaseBackup200Response.md)

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
updateDatabaseCluster($db_cluster_id, $update_cluster): \OpenAPI\Client\Model\UpdateDatabaseCluster200Response
```

Изменение кластера базы данных

Чтобы изменить кластер базы данных на вашем аккаунте, отправьте PATCH-запрос на `/api/v1/databases/{db_cluster_id}`.   Размер кластера задается либо тарифом (`preset_id`), либо конфигуратором (`configuration`) — эти поля взаимоисключающие.

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
$db_cluster_id = 56; // int | ID кластера базы данных
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
| **db_cluster_id** | **int**| ID кластера базы данных | |
| **update_cluster** | [**\OpenAPI\Client\Model\UpdateCluster**](../Model/UpdateCluster.md)|  | |

### Return type

[**\OpenAPI\Client\Model\UpdateDatabaseCluster200Response**](../Model/UpdateDatabaseCluster200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateDatabaseClusterV2()`

```php
updateDatabaseClusterV2($db_cluster_id, $update_cluster_v2): \OpenAPI\Client\Model\UpdateDatabaseCluster200Response
```

Изменение кластера базы данных (v2)

Чтобы изменить кластер базы данных на вашем аккаунте, отправьте PATCH-запрос на `/api/v2/databases/{db_cluster_id}`.   В отличие от `/api/v1/databases/{db_cluster_id}`, эта версия дополнительно позволяет привязать плавающий IP-адрес (`floating_ip`).   Размер кластера задается либо тарифом (`preset_id`), либо конфигуратором (`configuration`) — эти поля взаимоисключающие.

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
$db_cluster_id = 56; // int | ID кластера базы данных
$update_cluster_v2 = new \OpenAPI\Client\Model\UpdateClusterV2(); // \OpenAPI\Client\Model\UpdateClusterV2

try {
    $result = $apiInstance->updateDatabaseClusterV2($db_cluster_id, $update_cluster_v2);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DatabasesApi->updateDatabaseClusterV2: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **db_cluster_id** | **int**| ID кластера базы данных | |
| **update_cluster_v2** | [**\OpenAPI\Client\Model\UpdateClusterV2**](../Model/UpdateClusterV2.md)|  | |

### Return type

[**\OpenAPI\Client\Model\UpdateDatabaseCluster200Response**](../Model/UpdateDatabaseCluster200Response.md)

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
updateDatabaseInstance($db_cluster_id, $instance_id, $update_instance): \OpenAPI\Client\Model\CreateDatabaseInstance201Response
```

Изменение инстанса базы данных

Чтобы изменить инстанс базы данных, отправьте PATCH-запрос на `/api/v1/databases/{db_cluster_id}/instances/{instance_id}`.   Изменить название базы данных (`name`) и ее владельца (`owner_id`) можно только в кластере PostgreSQL, а настройки топика (`config_parameters`) — только в кластере Kafka. Если один из этих трех параметров передан для неподходящего типа кластера, запрос вернется с ошибкой 409.   Расширения (`extensions`) применимы к кластерам PostgreSQL и RabbitMQ.

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
$db_cluster_id = 56; // int | ID кластера базы данных
$instance_id = 56; // int | ID инстанса базы данных
$update_instance = new \OpenAPI\Client\Model\UpdateInstance(); // \OpenAPI\Client\Model\UpdateInstance

try {
    $result = $apiInstance->updateDatabaseInstance($db_cluster_id, $instance_id, $update_instance);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DatabasesApi->updateDatabaseInstance: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **db_cluster_id** | **int**| ID кластера базы данных | |
| **instance_id** | **int**| ID инстанса базы данных | |
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

## `updateDatabaseS3Backup()`

```php
updateDatabaseS3Backup($db_id, $backup_id, $update_s3_backup): \OpenAPI\Client\Model\CreateDatabaseS3Backup201Response
```

Изменение комментария S3-бэкапа базы данных

Чтобы изменить комментарий к резервной копии кластера базы данных, отправьте PATCH-запрос на `/api/v2/databases/{db_id}/backups/{backup_id}`.   Изменить можно только комментарий: других полей метод не принимает, сама резервная копия при этом не пересоздается. Тело ответа будет представлять собой объект JSON с ключом `backup`.

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
$db_id = 56; // int | ID базы данных
$backup_id = 'backup_id_example'; // string | ID резервной копии в формате UUID
$update_s3_backup = new \OpenAPI\Client\Model\UpdateS3Backup(); // \OpenAPI\Client\Model\UpdateS3Backup

try {
    $result = $apiInstance->updateDatabaseS3Backup($db_id, $backup_id, $update_s3_backup);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DatabasesApi->updateDatabaseS3Backup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **db_id** | **int**| ID базы данных | |
| **backup_id** | **string**| ID резервной копии в формате UUID | |
| **update_s3_backup** | [**\OpenAPI\Client\Model\UpdateS3Backup**](../Model/UpdateS3Backup.md)|  | [optional] |

### Return type

[**\OpenAPI\Client\Model\CreateDatabaseS3Backup201Response**](../Model/CreateDatabaseS3Backup201Response.md)

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
$db_cluster_id = 56; // int | ID кластера базы данных
$admin_id = 56; // int | ID пользователя базы данных
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
| **db_cluster_id** | **int**| ID кластера базы данных | |
| **admin_id** | **int**| ID пользователя базы данных | |
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
