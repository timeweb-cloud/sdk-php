# OpenAPI\Client\SSHApi

All URIs are relative to https://api.timeweb.cloud, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**addKeyToServer()**](SSHApi.md#addKeyToServer) | **POST** /api/v1/servers/{server_id}/ssh-keys | Добавление SSH-ключей на сервер |
| [**createKey()**](SSHApi.md#createKey) | **POST** /api/v1/ssh-keys | Создание SSH-ключа |
| [**deleteKey()**](SSHApi.md#deleteKey) | **DELETE** /api/v1/ssh-keys/{ssh_key_id} | Удаление SSH-ключа по ID |
| [**deleteKeyFromServer()**](SSHApi.md#deleteKeyFromServer) | **DELETE** /api/v1/servers/{server_id}/ssh-keys/{ssh_key_id} | Удаление SSH-ключей с сервера |
| [**getKey()**](SSHApi.md#getKey) | **GET** /api/v1/ssh-keys/{ssh_key_id} | Получение SSH-ключа по ID |
| [**getKeys()**](SSHApi.md#getKeys) | **GET** /api/v1/ssh-keys | Получение списка SSH-ключей |
| [**updateKey()**](SSHApi.md#updateKey) | **PATCH** /api/v1/ssh-keys/{ssh_key_id} | Изменение SSH-ключа по ID |


## `addKeyToServer()`

```php
addKeyToServer($server_id, $add_key_to_server_request)
```

Добавление SSH-ключей на сервер

Чтобы добавить SSH-ключи на сервер, отправьте POST-запрос на `/api/v1/servers/{server_id}/ssh-keys`

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\SSHApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$server_id = 1051; // int | ID облачного сервера.
$add_key_to_server_request = new \OpenAPI\Client\Model\AddKeyToServerRequest(); // \OpenAPI\Client\Model\AddKeyToServerRequest

try {
    $apiInstance->addKeyToServer($server_id, $add_key_to_server_request);
} catch (Exception $e) {
    echo 'Exception when calling SSHApi->addKeyToServer: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **server_id** | **int**| ID облачного сервера. | |
| **add_key_to_server_request** | [**\OpenAPI\Client\Model\AddKeyToServerRequest**](../Model/AddKeyToServerRequest.md)|  | |

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

## `createKey()`

```php
createKey($create_key_request): \OpenAPI\Client\Model\CreateKey201Response
```

Создание SSH-ключа

Чтобы создать создать SSH-ключ, отправьте POST-запрос в `/api/v1/ssh-keys`, задав необходимые атрибуты.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\SSHApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_key_request = new \OpenAPI\Client\Model\CreateKeyRequest(); // \OpenAPI\Client\Model\CreateKeyRequest

try {
    $result = $apiInstance->createKey($create_key_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SSHApi->createKey: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_key_request** | [**\OpenAPI\Client\Model\CreateKeyRequest**](../Model/CreateKeyRequest.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateKey201Response**](../Model/CreateKey201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteKey()`

```php
deleteKey($ssh_key_id)
```

Удаление SSH-ключа по ID

Чтобы удалить SSH-ключ, отправьте DELETE-запрос на `/api/v1/ssh-keys/{ssh_key_id}`

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\SSHApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ssh_key_id = 1051; // int | ID SSH-ключа.

try {
    $apiInstance->deleteKey($ssh_key_id);
} catch (Exception $e) {
    echo 'Exception when calling SSHApi->deleteKey: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ssh_key_id** | **int**| ID SSH-ключа. | |

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

## `deleteKeyFromServer()`

```php
deleteKeyFromServer($server_id, $ssh_key_id)
```

Удаление SSH-ключей с сервера

Чтобы удалить SSH-ключ с сервера, отправьте DELETE-запрос на `/api/v1/servers/{server_id}/ssh-keys/{ssh_key_id}`

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\SSHApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$server_id = 1051; // int | ID облачного сервера.
$ssh_key_id = 1051; // int | ID SSH-ключа.

try {
    $apiInstance->deleteKeyFromServer($server_id, $ssh_key_id);
} catch (Exception $e) {
    echo 'Exception when calling SSHApi->deleteKeyFromServer: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **server_id** | **int**| ID облачного сервера. | |
| **ssh_key_id** | **int**| ID SSH-ключа. | |

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

## `getKey()`

```php
getKey($ssh_key_id): \OpenAPI\Client\Model\GetKey200Response
```

Получение SSH-ключа по ID

Чтобы получить SSH-ключ, отправьте GET-запрос на `/api/v1/ssh-keys/{ssh_key_id}`

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\SSHApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ssh_key_id = 1051; // int | ID SSH-ключа.

try {
    $result = $apiInstance->getKey($ssh_key_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SSHApi->getKey: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ssh_key_id** | **int**| ID SSH-ключа. | |

### Return type

[**\OpenAPI\Client\Model\GetKey200Response**](../Model/GetKey200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getKeys()`

```php
getKeys(): \OpenAPI\Client\Model\GetKeys200Response
```

Получение списка SSH-ключей

Чтобы получить список SSH-ключей, отправьте GET-запрос на `/api/v1/ssh-keys`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\SSHApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getKeys();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SSHApi->getKeys: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\GetKeys200Response**](../Model/GetKeys200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateKey()`

```php
updateKey($ssh_key_id, $update_key_request): \OpenAPI\Client\Model\GetKey200Response
```

Изменение SSH-ключа по ID

Чтобы изменить SSH-ключ, отправьте PATCH-запрос на `/api/v1/ssh-keys/{ssh_key_id}`

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\SSHApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ssh_key_id = 1051; // int | ID SSH-ключа.
$update_key_request = new \OpenAPI\Client\Model\UpdateKeyRequest(); // \OpenAPI\Client\Model\UpdateKeyRequest

try {
    $result = $apiInstance->updateKey($ssh_key_id, $update_key_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SSHApi->updateKey: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ssh_key_id** | **int**| ID SSH-ключа. | |
| **update_key_request** | [**\OpenAPI\Client\Model\UpdateKeyRequest**](../Model/UpdateKeyRequest.md)|  | |

### Return type

[**\OpenAPI\Client\Model\GetKey200Response**](../Model/GetKey200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
