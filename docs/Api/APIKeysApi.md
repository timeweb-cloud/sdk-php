# OpenAPI\Client\APIKeysApi

All URIs are relative to https://api.timeweb.cloud, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createToken()**](APIKeysApi.md#createToken) | **POST** /api/v1/auth/api-keys | Создание токена |
| [**deleteToken()**](APIKeysApi.md#deleteToken) | **DELETE** /api/v1/auth/api-keys/{token_id} | Удалить токен |
| [**getTokens()**](APIKeysApi.md#getTokens) | **GET** /api/v1/auth/api-keys | Получение списка выпущенных токенов |
| [**reissueToken()**](APIKeysApi.md#reissueToken) | **PUT** /api/v1/auth/api-keys/{token_id} | Перевыпустить токен |
| [**updateToken()**](APIKeysApi.md#updateToken) | **PATCH** /api/v1/auth/api-keys/{token_id} | Изменить токен |


## `createToken()`

```php
createToken($create_api_key): \OpenAPI\Client\Model\CreateToken201Response
```

Создание токена

Чтобы создать токен, отправьте POST-запрос на `/api/v1/auth/api-keys`, задав необходимые атрибуты.  Токен будет создан с использованием предоставленной информации. Тело ответа будет содержать объект JSON с информацией о созданном токене.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\APIKeysApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_api_key = new \OpenAPI\Client\Model\CreateApiKey(); // \OpenAPI\Client\Model\CreateApiKey

try {
    $result = $apiInstance->createToken($create_api_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling APIKeysApi->createToken: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_api_key** | [**\OpenAPI\Client\Model\CreateApiKey**](../Model/CreateApiKey.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateToken201Response**](../Model/CreateToken201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteToken()`

```php
deleteToken($token_id)
```

Удалить токен

Чтобы удалить токен, отправьте DELETE-запрос на `/api/v1/auth/api-keys/{token_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\APIKeysApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$token_id = 'token_id_example'; // string | Идентификатор токена

try {
    $apiInstance->deleteToken($token_id);
} catch (Exception $e) {
    echo 'Exception when calling APIKeysApi->deleteToken: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **token_id** | **string**| Идентификатор токена | |

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

## `getTokens()`

```php
getTokens(): \OpenAPI\Client\Model\GetTokens200Response
```

Получение списка выпущенных токенов

Чтобы получить список выпущенных токенов, отправьте GET-запрос на `/api/v1/auth/api-keys`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\APIKeysApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getTokens();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling APIKeysApi->getTokens: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\GetTokens200Response**](../Model/GetTokens200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `reissueToken()`

```php
reissueToken($token_id, $refresh_api_key): \OpenAPI\Client\Model\CreateToken201Response
```

Перевыпустить токен

Чтобы перевыпустить токен, отправьте PUT-запрос на `/api/v1/auth/api-keys/{token_id}`, задав необходимые атрибуты.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\APIKeysApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$token_id = 'token_id_example'; // string | Идентификатор токена
$refresh_api_key = new \OpenAPI\Client\Model\RefreshApiKey(); // \OpenAPI\Client\Model\RefreshApiKey

try {
    $result = $apiInstance->reissueToken($token_id, $refresh_api_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling APIKeysApi->reissueToken: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **token_id** | **string**| Идентификатор токена | |
| **refresh_api_key** | [**\OpenAPI\Client\Model\RefreshApiKey**](../Model/RefreshApiKey.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateToken201Response**](../Model/CreateToken201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateToken()`

```php
updateToken($token_id, $edit_api_key): \OpenAPI\Client\Model\UpdateToken200Response
```

Изменить токен

Чтобы изменить токен, отправьте PATCH-запрос на `/api/v1/auth/api-keys/{token_id}`, задав необходимые атрибуты.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\APIKeysApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$token_id = 'token_id_example'; // string | Идентификатор токена
$edit_api_key = new \OpenAPI\Client\Model\EditApiKey(); // \OpenAPI\Client\Model\EditApiKey

try {
    $result = $apiInstance->updateToken($token_id, $edit_api_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling APIKeysApi->updateToken: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **token_id** | **string**| Идентификатор токена | |
| **edit_api_key** | [**\OpenAPI\Client\Model\EditApiKey**](../Model/EditApiKey.md)|  | |

### Return type

[**\OpenAPI\Client\Model\UpdateToken200Response**](../Model/UpdateToken200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
