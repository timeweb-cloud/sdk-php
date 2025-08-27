# OpenAPI\Client\S3Api

All URIs are relative to https://api.timeweb.cloud, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**addStorageSubdomainCertificate()**](S3Api.md#addStorageSubdomainCertificate) | **POST** /api/v1/storages/certificates/generate | Добавление сертификата для поддомена хранилища |
| [**addStorageSubdomains()**](S3Api.md#addStorageSubdomains) | **POST** /api/v1/storages/buckets/{bucket_id}/subdomains | Добавление поддоменов для хранилища |
| [**createStorage()**](S3Api.md#createStorage) | **POST** /api/v1/storages/buckets | Создание хранилища |
| [**deleteStorage()**](S3Api.md#deleteStorage) | **DELETE** /api/v1/storages/buckets/{bucket_id} | Удаление хранилища на аккаунте |
| [**deleteStorageSubdomains()**](S3Api.md#deleteStorageSubdomains) | **DELETE** /api/v1/storages/buckets/{bucket_id}/subdomains | Удаление поддоменов хранилища |
| [**getStorageSubdomains()**](S3Api.md#getStorageSubdomains) | **GET** /api/v1/storages/buckets/{bucket_id}/subdomains | Получение списка поддоменов хранилища |
| [**getStorageTransferStatus()**](S3Api.md#getStorageTransferStatus) | **GET** /api/v1/storages/buckets/{bucket_id}/transfer-status | Получение статуса переноса хранилища от стороннего S3 в Timeweb Cloud |
| [**getStorageUsers()**](S3Api.md#getStorageUsers) | **GET** /api/v1/storages/users | Получение списка пользователей хранилищ аккаунта |
| [**getStorages()**](S3Api.md#getStorages) | **GET** /api/v1/storages/buckets | Получение списка хранилищ аккаунта |
| [**getStoragesPresets()**](S3Api.md#getStoragesPresets) | **GET** /api/v1/presets/storages | Получение списка тарифов для хранилищ |
| [**transferStorage()**](S3Api.md#transferStorage) | **POST** /api/v1/storages/transfer | Перенос хранилища от стороннего провайдера S3 в Timeweb Cloud |
| [**updateStorage()**](S3Api.md#updateStorage) | **PATCH** /api/v1/storages/buckets/{bucket_id} | Изменение хранилища на аккаунте |
| [**updateStorageUser()**](S3Api.md#updateStorageUser) | **PATCH** /api/v1/storages/users/{user_id} | Изменение пароля пользователя-администратора хранилища |


## `addStorageSubdomainCertificate()`

```php
addStorageSubdomainCertificate($add_storage_subdomain_certificate_request)
```

Добавление сертификата для поддомена хранилища

Чтобы добавить сертификат для поддомена хранилища, отправьте POST-запрос на `/api/v1/storages/certificates/generate`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\S3Api(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$add_storage_subdomain_certificate_request = new \OpenAPI\Client\Model\AddStorageSubdomainCertificateRequest(); // \OpenAPI\Client\Model\AddStorageSubdomainCertificateRequest

try {
    $apiInstance->addStorageSubdomainCertificate($add_storage_subdomain_certificate_request);
} catch (Exception $e) {
    echo 'Exception when calling S3Api->addStorageSubdomainCertificate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **add_storage_subdomain_certificate_request** | [**\OpenAPI\Client\Model\AddStorageSubdomainCertificateRequest**](../Model/AddStorageSubdomainCertificateRequest.md)|  | |

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

## `addStorageSubdomains()`

```php
addStorageSubdomains($bucket_id, $add_storage_subdomains_request): \OpenAPI\Client\Model\AddStorageSubdomains200Response
```

Добавление поддоменов для хранилища

Чтобы добавить поддомены для хранилища, отправьте POST-запрос на `/api/v1/storages/buckets/{bucket_id}/subdomains`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\S3Api(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$bucket_id = 1051; // int | ID хранилища.
$add_storage_subdomains_request = new \OpenAPI\Client\Model\AddStorageSubdomainsRequest(); // \OpenAPI\Client\Model\AddStorageSubdomainsRequest

try {
    $result = $apiInstance->addStorageSubdomains($bucket_id, $add_storage_subdomains_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling S3Api->addStorageSubdomains: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **bucket_id** | **int**| ID хранилища. | |
| **add_storage_subdomains_request** | [**\OpenAPI\Client\Model\AddStorageSubdomainsRequest**](../Model/AddStorageSubdomainsRequest.md)|  | |

### Return type

[**\OpenAPI\Client\Model\AddStorageSubdomains200Response**](../Model/AddStorageSubdomains200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createStorage()`

```php
createStorage($create_storage_request): \OpenAPI\Client\Model\CreateStorage201Response
```

Создание хранилища

Чтобы создать хранилище, отправьте POST-запрос на `/api/v1/storages/buckets`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\S3Api(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_storage_request = new \OpenAPI\Client\Model\CreateStorageRequest(); // \OpenAPI\Client\Model\CreateStorageRequest

try {
    $result = $apiInstance->createStorage($create_storage_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling S3Api->createStorage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_storage_request** | [**\OpenAPI\Client\Model\CreateStorageRequest**](../Model/CreateStorageRequest.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateStorage201Response**](../Model/CreateStorage201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteStorage()`

```php
deleteStorage($bucket_id, $hash, $code): \OpenAPI\Client\Model\DeleteStorage200Response
```

Удаление хранилища на аккаунте

Чтобы удалить хранилище, отправьте DELETE-запрос на `/api/v1/storages/buckets/{bucket_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\S3Api(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$bucket_id = 1051; // int | ID хранилища.
$hash = 15095f25-aac3-4d60-a788-96cb5136f186; // string | Хеш, который совместно с кодом авторизации надо отправить для удаления, если включено подтверждение удаления сервисов через Телеграм.
$code = 0000; // string | Код подтверждения, который придет к вам в Телеграм, после запроса удаления, если включено подтверждение удаления сервисов.  При помощи API токена сервисы можно удалять без подтверждения, если параметр токена `is_able_to_delete` установлен в значение `true`

try {
    $result = $apiInstance->deleteStorage($bucket_id, $hash, $code);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling S3Api->deleteStorage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **bucket_id** | **int**| ID хранилища. | |
| **hash** | **string**| Хеш, который совместно с кодом авторизации надо отправить для удаления, если включено подтверждение удаления сервисов через Телеграм. | [optional] |
| **code** | **string**| Код подтверждения, который придет к вам в Телеграм, после запроса удаления, если включено подтверждение удаления сервисов.  При помощи API токена сервисы можно удалять без подтверждения, если параметр токена &#x60;is_able_to_delete&#x60; установлен в значение &#x60;true&#x60; | [optional] |

### Return type

[**\OpenAPI\Client\Model\DeleteStorage200Response**](../Model/DeleteStorage200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteStorageSubdomains()`

```php
deleteStorageSubdomains($bucket_id, $add_storage_subdomains_request): \OpenAPI\Client\Model\AddStorageSubdomains200Response
```

Удаление поддоменов хранилища

Чтобы удалить поддомены хранилища, отправьте DELETE-запрос на `/api/v1/storages/buckets/{bucket_id}/subdomains`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\S3Api(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$bucket_id = 1051; // int | ID хранилища.
$add_storage_subdomains_request = new \OpenAPI\Client\Model\AddStorageSubdomainsRequest(); // \OpenAPI\Client\Model\AddStorageSubdomainsRequest

try {
    $result = $apiInstance->deleteStorageSubdomains($bucket_id, $add_storage_subdomains_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling S3Api->deleteStorageSubdomains: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **bucket_id** | **int**| ID хранилища. | |
| **add_storage_subdomains_request** | [**\OpenAPI\Client\Model\AddStorageSubdomainsRequest**](../Model/AddStorageSubdomainsRequest.md)|  | |

### Return type

[**\OpenAPI\Client\Model\AddStorageSubdomains200Response**](../Model/AddStorageSubdomains200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getStorageSubdomains()`

```php
getStorageSubdomains($bucket_id): \OpenAPI\Client\Model\GetStorageSubdomains200Response
```

Получение списка поддоменов хранилища

Чтобы получить список поддоменов хранилища, отправьте GET-запрос на `/api/v1/storages/buckets/{bucket_id}/subdomains`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\S3Api(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$bucket_id = 1051; // int | ID хранилища.

try {
    $result = $apiInstance->getStorageSubdomains($bucket_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling S3Api->getStorageSubdomains: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **bucket_id** | **int**| ID хранилища. | |

### Return type

[**\OpenAPI\Client\Model\GetStorageSubdomains200Response**](../Model/GetStorageSubdomains200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getStorageTransferStatus()`

```php
getStorageTransferStatus($bucket_id): \OpenAPI\Client\Model\GetStorageTransferStatus200Response
```

Получение статуса переноса хранилища от стороннего S3 в Timeweb Cloud

Чтобы получить статус переноса хранилища от стороннего S3 в Timeweb Cloud, отправьте GET-запрос на `/api/v1/storages/buckets/{bucket_id}/transfer-status`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\S3Api(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$bucket_id = 1051; // int | ID хранилища.

try {
    $result = $apiInstance->getStorageTransferStatus($bucket_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling S3Api->getStorageTransferStatus: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **bucket_id** | **int**| ID хранилища. | |

### Return type

[**\OpenAPI\Client\Model\GetStorageTransferStatus200Response**](../Model/GetStorageTransferStatus200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getStorageUsers()`

```php
getStorageUsers(): \OpenAPI\Client\Model\GetStorageUsers200Response
```

Получение списка пользователей хранилищ аккаунта

Чтобы получить список пользователей хранилищ аккаунта, отправьте GET-запрос на `/api/v1/storages/users`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\S3Api(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getStorageUsers();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling S3Api->getStorageUsers: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\GetStorageUsers200Response**](../Model/GetStorageUsers200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getStorages()`

```php
getStorages(): \OpenAPI\Client\Model\GetProjectStorages200Response
```

Получение списка хранилищ аккаунта

Чтобы получить список хранилищ аккаунта, отправьте GET-запрос на `/api/v1/storages/buckets`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\S3Api(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getStorages();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling S3Api->getStorages: ', $e->getMessage(), PHP_EOL;
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

## `getStoragesPresets()`

```php
getStoragesPresets(): \OpenAPI\Client\Model\GetStoragesPresets200Response
```

Получение списка тарифов для хранилищ

Чтобы получить список тарифов для хранилищ, отправьте GET-запрос на `/api/v1/presets/storages`.   Тело ответа будет представлять собой объект JSON с ключом `storages_presets`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\S3Api(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getStoragesPresets();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling S3Api->getStoragesPresets: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\GetStoragesPresets200Response**](../Model/GetStoragesPresets200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `transferStorage()`

```php
transferStorage($transfer_storage_request)
```

Перенос хранилища от стороннего провайдера S3 в Timeweb Cloud

Чтобы перенести хранилище от стороннего провайдера S3 в Timeweb Cloud, отправьте POST-запрос на `/api/v1/storages/transfer`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\S3Api(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$transfer_storage_request = new \OpenAPI\Client\Model\TransferStorageRequest(); // \OpenAPI\Client\Model\TransferStorageRequest

try {
    $apiInstance->transferStorage($transfer_storage_request);
} catch (Exception $e) {
    echo 'Exception when calling S3Api->transferStorage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **transfer_storage_request** | [**\OpenAPI\Client\Model\TransferStorageRequest**](../Model/TransferStorageRequest.md)|  | |

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

## `updateStorage()`

```php
updateStorage($bucket_id, $update_storage_request): \OpenAPI\Client\Model\CreateStorage201Response
```

Изменение хранилища на аккаунте

Чтобы изменить хранилище, отправьте PATCH-запрос на `/api/v1/storages/buckets/{bucket_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\S3Api(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$bucket_id = 1051; // int | ID хранилища.
$update_storage_request = new \OpenAPI\Client\Model\UpdateStorageRequest(); // \OpenAPI\Client\Model\UpdateStorageRequest

try {
    $result = $apiInstance->updateStorage($bucket_id, $update_storage_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling S3Api->updateStorage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **bucket_id** | **int**| ID хранилища. | |
| **update_storage_request** | [**\OpenAPI\Client\Model\UpdateStorageRequest**](../Model/UpdateStorageRequest.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateStorage201Response**](../Model/CreateStorage201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateStorageUser()`

```php
updateStorageUser($user_id, $update_storage_user_request): \OpenAPI\Client\Model\UpdateStorageUser200Response
```

Изменение пароля пользователя-администратора хранилища

Чтобы изменить пароль пользователя-администратора хранилища, отправьте POST-запрос на `/api/v1/storages/users/{user_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\S3Api(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$user_id = 1051; // int | ID пользователя хранилища.
$update_storage_user_request = new \OpenAPI\Client\Model\UpdateStorageUserRequest(); // \OpenAPI\Client\Model\UpdateStorageUserRequest

try {
    $result = $apiInstance->updateStorageUser($user_id, $update_storage_user_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling S3Api->updateStorageUser: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **user_id** | **int**| ID пользователя хранилища. | |
| **update_storage_user_request** | [**\OpenAPI\Client\Model\UpdateStorageUserRequest**](../Model/UpdateStorageUserRequest.md)|  | |

### Return type

[**\OpenAPI\Client\Model\UpdateStorageUser200Response**](../Model/UpdateStorageUser200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
