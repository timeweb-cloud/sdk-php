# OpenAPI\Client\ServersApi

All URIs are relative to https://api.timeweb.cloud, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**addServerIP()**](ServersApi.md#addServerIP) | **POST** /api/v1/servers/{server_id}/ips | Добавление IP-адреса сервера |
| [**cloneServer()**](ServersApi.md#cloneServer) | **POST** /api/v1/servers/{server_id}/clone | Клонирование сервера |
| [**createServer()**](ServersApi.md#createServer) | **POST** /api/v1/servers | Создание сервера |
| [**createServerDisk()**](ServersApi.md#createServerDisk) | **POST** /api/v1/servers/{server_id}/disks | Создание диска сервера |
| [**createServerDiskBackup()**](ServersApi.md#createServerDiskBackup) | **POST** /api/v1/servers/{server_id}/disks/{disk_id}/backups | Создание бэкапа диска сервера |
| [**deleteServer()**](ServersApi.md#deleteServer) | **DELETE** /api/v1/servers/{server_id} | Удаление сервера |
| [**deleteServerDisk()**](ServersApi.md#deleteServerDisk) | **DELETE** /api/v1/servers/{server_id}/disks/{disk_id} | Удаление диска сервера |
| [**deleteServerDiskBackup()**](ServersApi.md#deleteServerDiskBackup) | **DELETE** /api/v1/servers/{server_id}/disks/{disk_id}/backups/{backup_id} | Удаление бэкапа диска сервера |
| [**deleteServerIP()**](ServersApi.md#deleteServerIP) | **DELETE** /api/v1/servers/{server_id}/ips | Удаление IP-адреса сервера |
| [**getConfigurators()**](ServersApi.md#getConfigurators) | **GET** /api/v1/configurator/servers | Получение списка конфигураторов серверов |
| [**getOsList()**](ServersApi.md#getOsList) | **GET** /api/v1/os/servers | Получение списка операционных систем |
| [**getServer()**](ServersApi.md#getServer) | **GET** /api/v1/servers/{server_id} | Получение сервера |
| [**getServerDisk()**](ServersApi.md#getServerDisk) | **GET** /api/v1/servers/{server_id}/disks/{disk_id} | Получение диска сервера |
| [**getServerDiskAutoBackupSettings()**](ServersApi.md#getServerDiskAutoBackupSettings) | **GET** /api/v1/servers/{server_id}/disks/{disk_id}/auto-backups | Получить настройки автобэкапов диска сервера |
| [**getServerDiskBackup()**](ServersApi.md#getServerDiskBackup) | **GET** /api/v1/servers/{server_id}/disks/{disk_id}/backups/{backup_id} | Получение бэкапа диска сервера |
| [**getServerDiskBackups()**](ServersApi.md#getServerDiskBackups) | **GET** /api/v1/servers/{server_id}/disks/{disk_id}/backups | Получение списка бэкапов диска сервера |
| [**getServerDisks()**](ServersApi.md#getServerDisks) | **GET** /api/v1/servers/{server_id}/disks | Получение списка дисков сервера |
| [**getServerIPs()**](ServersApi.md#getServerIPs) | **GET** /api/v1/servers/{server_id}/ips | Получение списка IP-адресов сервера |
| [**getServerLogs()**](ServersApi.md#getServerLogs) | **GET** /api/v1/servers/{server_id}/logs | Получение списка логов сервера |
| [**getServerStatistics()**](ServersApi.md#getServerStatistics) | **GET** /api/v1/servers/{server_id}/statistics | Получение статистики сервера |
| [**getServers()**](ServersApi.md#getServers) | **GET** /api/v1/servers | Получение списка серверов |
| [**getServersPresets()**](ServersApi.md#getServersPresets) | **GET** /api/v1/presets/servers | Получение списка тарифов серверов |
| [**getSoftware()**](ServersApi.md#getSoftware) | **GET** /api/v1/software/servers | Получение списка ПО из маркетплейса |
| [**imageUnmountAndServerReload()**](ServersApi.md#imageUnmountAndServerReload) | **POST** /api/v1/servers/{server_id}/image-unmount | Отмонтирование ISO образа и перезагрузка сервера |
| [**performActionOnBackup()**](ServersApi.md#performActionOnBackup) | **POST** /api/v1/servers/{server_id}/disks/{disk_id}/backups/{backup_id}/action | Выполнение действия над бэкапом диска сервера |
| [**performActionOnServer()**](ServersApi.md#performActionOnServer) | **POST** /api/v1/servers/{server_id}/action | Выполнение действия над сервером |
| [**updateServer()**](ServersApi.md#updateServer) | **PATCH** /api/v1/servers/{server_id} | Изменение сервера |
| [**updateServerDisk()**](ServersApi.md#updateServerDisk) | **PATCH** /api/v1/servers/{server_id}/disks/{disk_id} | Изменение параметров диска сервера |
| [**updateServerDiskAutoBackupSettings()**](ServersApi.md#updateServerDiskAutoBackupSettings) | **PATCH** /api/v1/servers/{server_id}/disks/{disk_id}/auto-backups | Изменение настроек автобэкапов диска сервера |
| [**updateServerDiskBackup()**](ServersApi.md#updateServerDiskBackup) | **PATCH** /api/v1/servers/{server_id}/disks/{disk_id}/backups/{backup_id} | Изменение бэкапа диска сервера |
| [**updateServerIP()**](ServersApi.md#updateServerIP) | **PATCH** /api/v1/servers/{server_id}/ips | Изменение IP-адреса сервера |
| [**updateServerNAT()**](ServersApi.md#updateServerNAT) | **PATCH** /api/v1/servers/{server_id}/local-networks/nat-mode | Изменение правил маршрутизации трафика сервера (NAT) |
| [**updateServerOSBootMode()**](ServersApi.md#updateServerOSBootMode) | **POST** /api/v1/servers/{server_id}/boot-mode | Выбор типа загрузки операционной системы сервера |


## `addServerIP()`

```php
addServerIP($server_id, $add_server_ip_request): \OpenAPI\Client\Model\AddServerIP201Response
```

Добавление IP-адреса сервера

Чтобы добавить IP-адрес сервера, отправьте POST-запрос на `/api/v1/servers/{server_id}/ips`. \\  На данный момент IPv6 доступны только для серверов с локацией `ru-1`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ServersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$server_id = 1051; // int | Уникальный идентификатор облачного сервера.
$add_server_ip_request = new \OpenAPI\Client\Model\AddServerIPRequest(); // \OpenAPI\Client\Model\AddServerIPRequest

try {
    $result = $apiInstance->addServerIP($server_id, $add_server_ip_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServersApi->addServerIP: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **server_id** | **int**| Уникальный идентификатор облачного сервера. | |
| **add_server_ip_request** | [**\OpenAPI\Client\Model\AddServerIPRequest**](../Model/AddServerIPRequest.md)|  | |

### Return type

[**\OpenAPI\Client\Model\AddServerIP201Response**](../Model/AddServerIP201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `cloneServer()`

```php
cloneServer($server_id): \OpenAPI\Client\Model\CreateServer201Response
```

Клонирование сервера

Чтобы клонировать сервер, отправьте POST-запрос на `/api/v1/servers/{server_id}/clone`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ServersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$server_id = 1051; // int | Уникальный идентификатор облачного сервера.

try {
    $result = $apiInstance->cloneServer($server_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServersApi->cloneServer: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **server_id** | **int**| Уникальный идентификатор облачного сервера. | |

### Return type

[**\OpenAPI\Client\Model\CreateServer201Response**](../Model/CreateServer201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createServer()`

```php
createServer($create_server): \OpenAPI\Client\Model\CreateServer201Response
```

Создание сервера

Чтобы создать сервер, отправьте POST-запрос в `api/v1/servers`, задав необходимые атрибуты. Обязательно должен присутствовать один из параметров `configuration` или `preset_id`, а также `image_id` или `os_id`.  Cервер будет создан с использованием предоставленной информации. Тело ответа будет содержать объект JSON с информацией о созданном сервере.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ServersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_server = new \OpenAPI\Client\Model\CreateServer(); // \OpenAPI\Client\Model\CreateServer

try {
    $result = $apiInstance->createServer($create_server);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServersApi->createServer: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_server** | [**\OpenAPI\Client\Model\CreateServer**](../Model/CreateServer.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateServer201Response**](../Model/CreateServer201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createServerDisk()`

```php
createServerDisk($server_id, $create_server_disk_request): \OpenAPI\Client\Model\CreateServerDisk201Response
```

Создание диска сервера

Чтобы создать диск сервера, отправьте POST-запрос на `/api/v1/servers/{server_id}/disks`. Системный диск создать нельзя.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ServersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$server_id = 1051; // int | Уникальный идентификатор облачного сервера.
$create_server_disk_request = new \OpenAPI\Client\Model\CreateServerDiskRequest(); // \OpenAPI\Client\Model\CreateServerDiskRequest

try {
    $result = $apiInstance->createServerDisk($server_id, $create_server_disk_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServersApi->createServerDisk: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **server_id** | **int**| Уникальный идентификатор облачного сервера. | |
| **create_server_disk_request** | [**\OpenAPI\Client\Model\CreateServerDiskRequest**](../Model/CreateServerDiskRequest.md)|  | [optional] |

### Return type

[**\OpenAPI\Client\Model\CreateServerDisk201Response**](../Model/CreateServerDisk201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createServerDiskBackup()`

```php
createServerDiskBackup($server_id, $disk_id, $create_server_disk_backup_request): \OpenAPI\Client\Model\CreateServerDiskBackup201Response
```

Создание бэкапа диска сервера

Чтобы создать бэкап диска сервера, отправьте POST-запрос на `/api/v1/servers/{server_id}/disks/{disk_id}/backups`.   Тело ответа будет представлять собой объект JSON с ключом `backup`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ServersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$server_id = 1051; // int | Уникальный идентификатор облачного сервера.
$disk_id = 1051; // int | Уникальный идентификатор диска сервера.
$create_server_disk_backup_request = new \OpenAPI\Client\Model\CreateServerDiskBackupRequest(); // \OpenAPI\Client\Model\CreateServerDiskBackupRequest

try {
    $result = $apiInstance->createServerDiskBackup($server_id, $disk_id, $create_server_disk_backup_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServersApi->createServerDiskBackup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **server_id** | **int**| Уникальный идентификатор облачного сервера. | |
| **disk_id** | **int**| Уникальный идентификатор диска сервера. | |
| **create_server_disk_backup_request** | [**\OpenAPI\Client\Model\CreateServerDiskBackupRequest**](../Model/CreateServerDiskBackupRequest.md)|  | [optional] |

### Return type

[**\OpenAPI\Client\Model\CreateServerDiskBackup201Response**](../Model/CreateServerDiskBackup201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteServer()`

```php
deleteServer($server_id, $hash, $code): \OpenAPI\Client\Model\DeleteServer200Response
```

Удаление сервера

Чтобы удалить сервер, отправьте запрос DELETE в `/api/v1/servers/{server_id}`.\\  Обратите внимание, если на аккаунте включено удаление серверов по смс, то вернется ошибка 423.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ServersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$server_id = 1051; // int | Уникальный идентификатор облачного сервера.
$hash = 15095f25-aac3-4d60-a788-96cb5136f186; // string | Хеш, который совместно с кодом авторизации надо отправить для удаления, если включено подтверждение удаления сервисов через Телеграм.
$code = 0000; // string | Код подтверждения, который придет к вам в Телеграм, после запроса удаления, если включено подтверждение удаления сервисов.  При помощи API токена сервисы можно удалять без подтверждения, если параметр токена `is_able_to_delete` установлен в значение `true`

try {
    $result = $apiInstance->deleteServer($server_id, $hash, $code);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServersApi->deleteServer: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **server_id** | **int**| Уникальный идентификатор облачного сервера. | |
| **hash** | **string**| Хеш, который совместно с кодом авторизации надо отправить для удаления, если включено подтверждение удаления сервисов через Телеграм. | [optional] |
| **code** | **string**| Код подтверждения, который придет к вам в Телеграм, после запроса удаления, если включено подтверждение удаления сервисов.  При помощи API токена сервисы можно удалять без подтверждения, если параметр токена &#x60;is_able_to_delete&#x60; установлен в значение &#x60;true&#x60; | [optional] |

### Return type

[**\OpenAPI\Client\Model\DeleteServer200Response**](../Model/DeleteServer200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteServerDisk()`

```php
deleteServerDisk($server_id, $disk_id)
```

Удаление диска сервера

Чтобы удалить диск сервера, отправьте DELETE-запрос на `/api/v1/servers/{server_id}/disks/{disk_id}`. Нельзя удалять системный диск.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ServersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$server_id = 1051; // int | Уникальный идентификатор облачного сервера.
$disk_id = 1051; // int | Уникальный идентификатор диска сервера.

try {
    $apiInstance->deleteServerDisk($server_id, $disk_id);
} catch (Exception $e) {
    echo 'Exception when calling ServersApi->deleteServerDisk: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **server_id** | **int**| Уникальный идентификатор облачного сервера. | |
| **disk_id** | **int**| Уникальный идентификатор диска сервера. | |

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

## `deleteServerDiskBackup()`

```php
deleteServerDiskBackup($server_id, $disk_id, $backup_id)
```

Удаление бэкапа диска сервера

Чтобы удалить бэкап диска сервера, отправьте DELETE-запрос на `/api/v1/servers/{server_id}/disks/{disk_id}/backups/{backup_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ServersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$server_id = 1051; // int | Уникальный идентификатор облачного сервера.
$disk_id = 1051; // int | Уникальный идентификатор диска сервера.
$backup_id = 1051; // int | Уникальный идентификатор бэкапа сервера.

try {
    $apiInstance->deleteServerDiskBackup($server_id, $disk_id, $backup_id);
} catch (Exception $e) {
    echo 'Exception when calling ServersApi->deleteServerDiskBackup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **server_id** | **int**| Уникальный идентификатор облачного сервера. | |
| **disk_id** | **int**| Уникальный идентификатор диска сервера. | |
| **backup_id** | **int**| Уникальный идентификатор бэкапа сервера. | |

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

## `deleteServerIP()`

```php
deleteServerIP($server_id, $delete_server_ip_request)
```

Удаление IP-адреса сервера

Чтобы удалить IP-адрес сервера, отправьте DELETE-запрос на `/api/v1/servers/{server_id}/ips`. Нельзя удалить основной IP-адрес

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ServersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$server_id = 1051; // int | Уникальный идентификатор облачного сервера.
$delete_server_ip_request = new \OpenAPI\Client\Model\DeleteServerIPRequest(); // \OpenAPI\Client\Model\DeleteServerIPRequest

try {
    $apiInstance->deleteServerIP($server_id, $delete_server_ip_request);
} catch (Exception $e) {
    echo 'Exception when calling ServersApi->deleteServerIP: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **server_id** | **int**| Уникальный идентификатор облачного сервера. | |
| **delete_server_ip_request** | [**\OpenAPI\Client\Model\DeleteServerIPRequest**](../Model/DeleteServerIPRequest.md)|  | |

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

## `getConfigurators()`

```php
getConfigurators(): \OpenAPI\Client\Model\GetConfigurators200Response
```

Получение списка конфигураторов серверов

Чтобы получить список всех конфигураторов серверов, отправьте GET-запрос на `/api/v1/configurator/servers`.   Тело ответа будет представлять собой объект JSON с ключом `server_configurators`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ServersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getConfigurators();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServersApi->getConfigurators: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\GetConfigurators200Response**](../Model/GetConfigurators200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getOsList()`

```php
getOsList(): \OpenAPI\Client\Model\GetOsList200Response
```

Получение списка операционных систем

Чтобы получить список всех операционных систем, отправьте GET-запрос на `/api/v1/os/servers`.   Тело ответа будет представлять собой объект JSON с ключом `servers_os`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ServersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getOsList();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServersApi->getOsList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\GetOsList200Response**](../Model/GetOsList200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getServer()`

```php
getServer($server_id): \OpenAPI\Client\Model\CreateServer201Response
```

Получение сервера

Чтобы получить сервер, отправьте запрос GET в `/api/v1/servers/{server_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ServersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$server_id = 1051; // int | Уникальный идентификатор облачного сервера.

try {
    $result = $apiInstance->getServer($server_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServersApi->getServer: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **server_id** | **int**| Уникальный идентификатор облачного сервера. | |

### Return type

[**\OpenAPI\Client\Model\CreateServer201Response**](../Model/CreateServer201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getServerDisk()`

```php
getServerDisk($server_id, $disk_id): \OpenAPI\Client\Model\CreateServerDisk201Response
```

Получение диска сервера

Чтобы получить диск сервера, отправьте GET-запрос на `/api/v1/servers/{server_id}/disks/{disk_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ServersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$server_id = 1051; // int | Уникальный идентификатор облачного сервера.
$disk_id = 1051; // int | Уникальный идентификатор диска сервера.

try {
    $result = $apiInstance->getServerDisk($server_id, $disk_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServersApi->getServerDisk: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **server_id** | **int**| Уникальный идентификатор облачного сервера. | |
| **disk_id** | **int**| Уникальный идентификатор диска сервера. | |

### Return type

[**\OpenAPI\Client\Model\CreateServerDisk201Response**](../Model/CreateServerDisk201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getServerDiskAutoBackupSettings()`

```php
getServerDiskAutoBackupSettings($server_id, $disk_id): \OpenAPI\Client\Model\GetServerDiskAutoBackupSettings200Response
```

Получить настройки автобэкапов диска сервера

Чтобы полученить настройки автобэкапов диска сервера, отправьте GET-запрос на `/api/v1/servers/{server_id}/disks/{disk_id}/auto-backups`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ServersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$server_id = 1051; // int | Уникальный идентификатор облачного сервера.
$disk_id = 1051; // int | Уникальный идентификатор диска сервера.

try {
    $result = $apiInstance->getServerDiskAutoBackupSettings($server_id, $disk_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServersApi->getServerDiskAutoBackupSettings: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **server_id** | **int**| Уникальный идентификатор облачного сервера. | |
| **disk_id** | **int**| Уникальный идентификатор диска сервера. | |

### Return type

[**\OpenAPI\Client\Model\GetServerDiskAutoBackupSettings200Response**](../Model/GetServerDiskAutoBackupSettings200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getServerDiskBackup()`

```php
getServerDiskBackup($server_id, $disk_id, $backup_id): \OpenAPI\Client\Model\GetServerDiskBackup200Response
```

Получение бэкапа диска сервера

Чтобы получить бэкап диска сервера, отправьте GET-запрос на `/api/v1/servers/{server_id}/disks/{disk_id}/backups/{backup_id}`.   Тело ответа будет представлять собой объект JSON с ключом `backup`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ServersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$server_id = 1051; // int | Уникальный идентификатор облачного сервера.
$disk_id = 1051; // int | Уникальный идентификатор диска сервера.
$backup_id = 1051; // int | Уникальный идентификатор бэкапа сервера.

try {
    $result = $apiInstance->getServerDiskBackup($server_id, $disk_id, $backup_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServersApi->getServerDiskBackup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **server_id** | **int**| Уникальный идентификатор облачного сервера. | |
| **disk_id** | **int**| Уникальный идентификатор диска сервера. | |
| **backup_id** | **int**| Уникальный идентификатор бэкапа сервера. | |

### Return type

[**\OpenAPI\Client\Model\GetServerDiskBackup200Response**](../Model/GetServerDiskBackup200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getServerDiskBackups()`

```php
getServerDiskBackups($server_id, $disk_id): \OpenAPI\Client\Model\GetServerDiskBackups200Response
```

Получение списка бэкапов диска сервера

Чтобы получить список бэкапов диска сервера, отправьте GET-запрос на `/api/v1/servers/{server_id}/disks/{disk_id}/backups`.   Тело ответа будет представлять собой объект JSON с ключом `backups`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ServersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$server_id = 1051; // int | Уникальный идентификатор облачного сервера.
$disk_id = 1051; // int | Уникальный идентификатор диска сервера.

try {
    $result = $apiInstance->getServerDiskBackups($server_id, $disk_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServersApi->getServerDiskBackups: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **server_id** | **int**| Уникальный идентификатор облачного сервера. | |
| **disk_id** | **int**| Уникальный идентификатор диска сервера. | |

### Return type

[**\OpenAPI\Client\Model\GetServerDiskBackups200Response**](../Model/GetServerDiskBackups200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getServerDisks()`

```php
getServerDisks($server_id): \OpenAPI\Client\Model\GetServerDisks200Response
```

Получение списка дисков сервера

Чтобы получить список дисков сервера, отправьте GET-запрос на `/api/v1/servers/{server_id}/disks`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ServersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$server_id = 1051; // int | Уникальный идентификатор облачного сервера.

try {
    $result = $apiInstance->getServerDisks($server_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServersApi->getServerDisks: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **server_id** | **int**| Уникальный идентификатор облачного сервера. | |

### Return type

[**\OpenAPI\Client\Model\GetServerDisks200Response**](../Model/GetServerDisks200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getServerIPs()`

```php
getServerIPs($server_id): \OpenAPI\Client\Model\GetServerIPs200Response
```

Получение списка IP-адресов сервера

Чтобы получить список IP-адресов сервера, отправьте GET-запрос на `/api/v1/servers/{server_id}/ips`. \\  На данный момент IPv6 доступны только для локации `ru-1`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ServersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$server_id = 1051; // int | Уникальный идентификатор облачного сервера.

try {
    $result = $apiInstance->getServerIPs($server_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServersApi->getServerIPs: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **server_id** | **int**| Уникальный идентификатор облачного сервера. | |

### Return type

[**\OpenAPI\Client\Model\GetServerIPs200Response**](../Model/GetServerIPs200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getServerLogs()`

```php
getServerLogs($server_id, $limit, $offset, $order): \OpenAPI\Client\Model\GetServerLogs200Response
```

Получение списка логов сервера

Чтобы получить список логов сервера, отправьте GET-запрос на `/api/v1/servers/{server_id}/logs`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ServersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$server_id = 1051; // int | Уникальный идентификатор облачного сервера.
$limit = 100; // int | Обозначает количество записей, которое необходимо вернуть.
$offset = 0; // int | Указывает на смещение относительно начала списка.
$order = 'asc'; // string | Сортировка элементов по дате

try {
    $result = $apiInstance->getServerLogs($server_id, $limit, $offset, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServersApi->getServerLogs: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **server_id** | **int**| Уникальный идентификатор облачного сервера. | |
| **limit** | **int**| Обозначает количество записей, которое необходимо вернуть. | [optional] [default to 100] |
| **offset** | **int**| Указывает на смещение относительно начала списка. | [optional] [default to 0] |
| **order** | **string**| Сортировка элементов по дате | [optional] [default to &#39;asc&#39;] |

### Return type

[**\OpenAPI\Client\Model\GetServerLogs200Response**](../Model/GetServerLogs200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getServerStatistics()`

```php
getServerStatistics($server_id, $date_from, $date_to): \OpenAPI\Client\Model\GetServerStatistics200Response
```

Получение статистики сервера

Чтобы получить статистику сервера, отправьте GET-запрос на `/api/v1/servers/{server_id}/statistics`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ServersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$server_id = 1051; // int | Уникальный идентификатор облачного сервера.
$date_from = 'date_from_example'; // string | Дата начала сбора статистики. Строка в формате ISO 8061, закодированная в ASCII, пример: `2023-05-25%202023-05-25T14%3A35%3A38`
$date_to = 'date_to_example'; // string | Дата окончания сбора статистики. Строка в формате ISO 8061, закодированная в ASCII, пример: `2023-05-26%202023-05-25T14%3A35%3A38`

try {
    $result = $apiInstance->getServerStatistics($server_id, $date_from, $date_to);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServersApi->getServerStatistics: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **server_id** | **int**| Уникальный идентификатор облачного сервера. | |
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

## `getServers()`

```php
getServers($limit, $offset): \OpenAPI\Client\Model\GetServers200Response
```

Получение списка серверов

Чтобы получить список серверов, отправьте GET-запрос на `/api/v1/servers`.   Тело ответа будет представлять собой объект JSON с ключом `servers`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ServersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$limit = 100; // int | Обозначает количество записей, которое необходимо вернуть.
$offset = 0; // int | Указывает на смещение относительно начала списка.

try {
    $result = $apiInstance->getServers($limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServersApi->getServers: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **limit** | **int**| Обозначает количество записей, которое необходимо вернуть. | [optional] [default to 100] |
| **offset** | **int**| Указывает на смещение относительно начала списка. | [optional] [default to 0] |

### Return type

[**\OpenAPI\Client\Model\GetServers200Response**](../Model/GetServers200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getServersPresets()`

```php
getServersPresets(): \OpenAPI\Client\Model\GetServersPresets200Response
```

Получение списка тарифов серверов

Чтобы получить список всех тарифов серверов, отправьте GET-запрос на `/api/v1/presets/servers`.   Тело ответа будет представлять собой объект JSON с ключом `server_presets`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ServersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getServersPresets();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServersApi->getServersPresets: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\GetServersPresets200Response**](../Model/GetServersPresets200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getSoftware()`

```php
getSoftware(): \OpenAPI\Client\Model\GetSoftware200Response
```

Получение списка ПО из маркетплейса

Чтобы получить список ПО из маркетплейса, отправьте GET-запрос на `/api/v1/software/servers`.   Тело ответа будет представлять собой объект JSON с ключом `servers_software`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ServersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getSoftware();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServersApi->getSoftware: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\GetSoftware200Response**](../Model/GetSoftware200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `imageUnmountAndServerReload()`

```php
imageUnmountAndServerReload($server_id)
```

Отмонтирование ISO образа и перезагрузка сервера

Чтобы отмонтировать ISO образ и перезагрузить сервер, отправьте POST-запрос на `/api/v1/servers/{server_id}/image-unmount`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ServersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$server_id = 1051; // int | Уникальный идентификатор облачного сервера.

try {
    $apiInstance->imageUnmountAndServerReload($server_id);
} catch (Exception $e) {
    echo 'Exception when calling ServersApi->imageUnmountAndServerReload: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **server_id** | **int**| Уникальный идентификатор облачного сервера. | |

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

## `performActionOnBackup()`

```php
performActionOnBackup($server_id, $disk_id, $backup_id, $perform_action_on_backup_request)
```

Выполнение действия над бэкапом диска сервера

Чтобы выполнить действие над бэкапом диска сервера, отправьте POST-запрос на `/api/v1/servers/{server_id}/disks/{disk_id}/backups/{backup_id}/action`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ServersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$server_id = 1051; // int | Уникальный идентификатор облачного сервера.
$disk_id = 1051; // int | Уникальный идентификатор диска сервера.
$backup_id = 1051; // int | Уникальный идентификатор бэкапа сервера.
$perform_action_on_backup_request = new \OpenAPI\Client\Model\PerformActionOnBackupRequest(); // \OpenAPI\Client\Model\PerformActionOnBackupRequest

try {
    $apiInstance->performActionOnBackup($server_id, $disk_id, $backup_id, $perform_action_on_backup_request);
} catch (Exception $e) {
    echo 'Exception when calling ServersApi->performActionOnBackup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **server_id** | **int**| Уникальный идентификатор облачного сервера. | |
| **disk_id** | **int**| Уникальный идентификатор диска сервера. | |
| **backup_id** | **int**| Уникальный идентификатор бэкапа сервера. | |
| **perform_action_on_backup_request** | [**\OpenAPI\Client\Model\PerformActionOnBackupRequest**](../Model/PerformActionOnBackupRequest.md)|  | [optional] |

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

## `performActionOnServer()`

```php
performActionOnServer($server_id, $perform_action_on_server_request)
```

Выполнение действия над сервером

Чтобы выполнить действие над сервером, отправьте POST-запрос на `/api/v1/servers/{server_id}/action`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ServersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$server_id = 1051; // int | Уникальный идентификатор облачного сервера.
$perform_action_on_server_request = new \OpenAPI\Client\Model\PerformActionOnServerRequest(); // \OpenAPI\Client\Model\PerformActionOnServerRequest

try {
    $apiInstance->performActionOnServer($server_id, $perform_action_on_server_request);
} catch (Exception $e) {
    echo 'Exception when calling ServersApi->performActionOnServer: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **server_id** | **int**| Уникальный идентификатор облачного сервера. | |
| **perform_action_on_server_request** | [**\OpenAPI\Client\Model\PerformActionOnServerRequest**](../Model/PerformActionOnServerRequest.md)|  | |

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

## `updateServer()`

```php
updateServer($server_id, $update_server): \OpenAPI\Client\Model\CreateServer201Response
```

Изменение сервера

Чтобы обновить только определенные атрибуты сервера, отправьте запрос PATCH в `/api/v1/servers/{server_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ServersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$server_id = 1051; // int | Уникальный идентификатор облачного сервера.
$update_server = new \OpenAPI\Client\Model\UpdateServer(); // \OpenAPI\Client\Model\UpdateServer

try {
    $result = $apiInstance->updateServer($server_id, $update_server);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServersApi->updateServer: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **server_id** | **int**| Уникальный идентификатор облачного сервера. | |
| **update_server** | [**\OpenAPI\Client\Model\UpdateServer**](../Model/UpdateServer.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateServer201Response**](../Model/CreateServer201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateServerDisk()`

```php
updateServerDisk($server_id, $disk_id, $update_server_disk_request): \OpenAPI\Client\Model\CreateServerDisk201Response
```

Изменение параметров диска сервера

Чтобы изменить параметры диска сервера, отправьте PATCH-запрос на `/api/v1/servers/{server_id}/disks/{disk_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ServersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$server_id = 1051; // int | Уникальный идентификатор облачного сервера.
$disk_id = 1051; // int | Уникальный идентификатор диска сервера.
$update_server_disk_request = new \OpenAPI\Client\Model\UpdateServerDiskRequest(); // \OpenAPI\Client\Model\UpdateServerDiskRequest

try {
    $result = $apiInstance->updateServerDisk($server_id, $disk_id, $update_server_disk_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServersApi->updateServerDisk: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **server_id** | **int**| Уникальный идентификатор облачного сервера. | |
| **disk_id** | **int**| Уникальный идентификатор диска сервера. | |
| **update_server_disk_request** | [**\OpenAPI\Client\Model\UpdateServerDiskRequest**](../Model/UpdateServerDiskRequest.md)|  | [optional] |

### Return type

[**\OpenAPI\Client\Model\CreateServerDisk201Response**](../Model/CreateServerDisk201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateServerDiskAutoBackupSettings()`

```php
updateServerDiskAutoBackupSettings($server_id, $disk_id, $auto_backup): \OpenAPI\Client\Model\GetServerDiskAutoBackupSettings200Response
```

Изменение настроек автобэкапов диска сервера

Чтобы изменить настройки автобэкапов диска сервера, отправьте PATCH-запрос на `/api/v1/servers/{server_id}/disks/{disk_id}/auto-backups`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ServersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$server_id = 1051; // int | Уникальный идентификатор облачного сервера.
$disk_id = 1051; // int | Уникальный идентификатор диска сервера.
$auto_backup = new \OpenAPI\Client\Model\AutoBackup(); // \OpenAPI\Client\Model\AutoBackup | При значении `is_enabled`: `true`, поля `copy_count`, `creation_start_at`, `interval` являются обязательными

try {
    $result = $apiInstance->updateServerDiskAutoBackupSettings($server_id, $disk_id, $auto_backup);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServersApi->updateServerDiskAutoBackupSettings: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **server_id** | **int**| Уникальный идентификатор облачного сервера. | |
| **disk_id** | **int**| Уникальный идентификатор диска сервера. | |
| **auto_backup** | [**\OpenAPI\Client\Model\AutoBackup**](../Model/AutoBackup.md)| При значении &#x60;is_enabled&#x60;: &#x60;true&#x60;, поля &#x60;copy_count&#x60;, &#x60;creation_start_at&#x60;, &#x60;interval&#x60; являются обязательными | [optional] |

### Return type

[**\OpenAPI\Client\Model\GetServerDiskAutoBackupSettings200Response**](../Model/GetServerDiskAutoBackupSettings200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateServerDiskBackup()`

```php
updateServerDiskBackup($server_id, $disk_id, $backup_id, $update_server_disk_backup_request): \OpenAPI\Client\Model\GetServerDiskBackup200Response
```

Изменение бэкапа диска сервера

Чтобы изменить бэкап диска сервера, отправьте PATCH-запрос на `/api/v1/servers/{server_id}/disks/{disk_id}/backups/{backup_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ServersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$server_id = 1051; // int | Уникальный идентификатор облачного сервера.
$disk_id = 1051; // int | Уникальный идентификатор диска сервера.
$backup_id = 1051; // int | Уникальный идентификатор бэкапа сервера.
$update_server_disk_backup_request = new \OpenAPI\Client\Model\UpdateServerDiskBackupRequest(); // \OpenAPI\Client\Model\UpdateServerDiskBackupRequest

try {
    $result = $apiInstance->updateServerDiskBackup($server_id, $disk_id, $backup_id, $update_server_disk_backup_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServersApi->updateServerDiskBackup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **server_id** | **int**| Уникальный идентификатор облачного сервера. | |
| **disk_id** | **int**| Уникальный идентификатор диска сервера. | |
| **backup_id** | **int**| Уникальный идентификатор бэкапа сервера. | |
| **update_server_disk_backup_request** | [**\OpenAPI\Client\Model\UpdateServerDiskBackupRequest**](../Model/UpdateServerDiskBackupRequest.md)|  | [optional] |

### Return type

[**\OpenAPI\Client\Model\GetServerDiskBackup200Response**](../Model/GetServerDiskBackup200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateServerIP()`

```php
updateServerIP($server_id, $update_server_ip_request): \OpenAPI\Client\Model\AddServerIP201Response
```

Изменение IP-адреса сервера

Чтобы изменить IP-адрес сервера, отправьте POST-запрос на `/api/v1/servers/{server_id}/ips`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ServersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$server_id = 1051; // int | Уникальный идентификатор облачного сервера.
$update_server_ip_request = new \OpenAPI\Client\Model\UpdateServerIPRequest(); // \OpenAPI\Client\Model\UpdateServerIPRequest

try {
    $result = $apiInstance->updateServerIP($server_id, $update_server_ip_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServersApi->updateServerIP: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **server_id** | **int**| Уникальный идентификатор облачного сервера. | |
| **update_server_ip_request** | [**\OpenAPI\Client\Model\UpdateServerIPRequest**](../Model/UpdateServerIPRequest.md)|  | |

### Return type

[**\OpenAPI\Client\Model\AddServerIP201Response**](../Model/AddServerIP201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateServerNAT()`

```php
updateServerNAT($server_id, $update_server_nat_request)
```

Изменение правил маршрутизации трафика сервера (NAT)

Чтобы измененить правила маршрутизации трафика сервера (NAT), отправьте PATCH-запрос на `/api/v1/servers/{server_id}/local-networks/nat-mode`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ServersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$server_id = 1051; // int | Уникальный идентификатор облачного сервера.
$update_server_nat_request = new \OpenAPI\Client\Model\UpdateServerNATRequest(); // \OpenAPI\Client\Model\UpdateServerNATRequest

try {
    $apiInstance->updateServerNAT($server_id, $update_server_nat_request);
} catch (Exception $e) {
    echo 'Exception when calling ServersApi->updateServerNAT: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **server_id** | **int**| Уникальный идентификатор облачного сервера. | |
| **update_server_nat_request** | [**\OpenAPI\Client\Model\UpdateServerNATRequest**](../Model/UpdateServerNATRequest.md)|  | [optional] |

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

## `updateServerOSBootMode()`

```php
updateServerOSBootMode($server_id, $update_server_os_boot_mode_request)
```

Выбор типа загрузки операционной системы сервера

Чтобы изменить тип загрузки операционной системы сервера, отправьте POST-запрос на `/api/v1/servers/{server_id}/boot-mode`. \\  После смены типа загрузки сервер будет перезапущен.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ServersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$server_id = 1051; // int | Уникальный идентификатор облачного сервера.
$update_server_os_boot_mode_request = new \OpenAPI\Client\Model\UpdateServerOSBootModeRequest(); // \OpenAPI\Client\Model\UpdateServerOSBootModeRequest

try {
    $apiInstance->updateServerOSBootMode($server_id, $update_server_os_boot_mode_request);
} catch (Exception $e) {
    echo 'Exception when calling ServersApi->updateServerOSBootMode: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **server_id** | **int**| Уникальный идентификатор облачного сервера. | |
| **update_server_os_boot_mode_request** | [**\OpenAPI\Client\Model\UpdateServerOSBootModeRequest**](../Model/UpdateServerOSBootModeRequest.md)|  | [optional] |

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
