# OpenAPI\Client\BalancersApi

All URIs are relative to https://api.timeweb.cloud, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**addIPsToBalancer()**](BalancersApi.md#addIPsToBalancer) | **POST** /api/v1/balancers/{balancer_id}/ips | Добавление IP-адресов к балансировщику |
| [**createBalancer()**](BalancersApi.md#createBalancer) | **POST** /api/v1/balancers | Создание бaлансировщика |
| [**createBalancerRule()**](BalancersApi.md#createBalancerRule) | **POST** /api/v1/balancers/{balancer_id}/rules | Создание правила для балансировщика |
| [**deleteBalancer()**](BalancersApi.md#deleteBalancer) | **DELETE** /api/v1/balancers/{balancer_id} | Удаление балансировщика |
| [**deleteBalancerRule()**](BalancersApi.md#deleteBalancerRule) | **DELETE** /api/v1/balancers/{balancer_id}/rules/{rule_id} | Удаление правила для балансировщика |
| [**deleteIPsFromBalancer()**](BalancersApi.md#deleteIPsFromBalancer) | **DELETE** /api/v1/balancers/{balancer_id}/ips | Удаление IP-адресов из балансировщика |
| [**getBalancer()**](BalancersApi.md#getBalancer) | **GET** /api/v1/balancers/{balancer_id} | Получение бaлансировщика |
| [**getBalancerIPs()**](BalancersApi.md#getBalancerIPs) | **GET** /api/v1/balancers/{balancer_id}/ips | Получение списка IP-адресов балансировщика |
| [**getBalancerRules()**](BalancersApi.md#getBalancerRules) | **GET** /api/v1/balancers/{balancer_id}/rules | Получение правил балансировщика |
| [**getBalancers()**](BalancersApi.md#getBalancers) | **GET** /api/v1/balancers | Получение списка всех бaлансировщиков |
| [**getBalancersPresets()**](BalancersApi.md#getBalancersPresets) | **GET** /api/v1/presets/balancers | Получение списка тарифов для балансировщика |
| [**updateBalancer()**](BalancersApi.md#updateBalancer) | **PATCH** /api/v1/balancers/{balancer_id} | Обновление балансировщика |
| [**updateBalancerRule()**](BalancersApi.md#updateBalancerRule) | **PATCH** /api/v1/balancers/{balancer_id}/rules/{rule_id} | Обновление правила для балансировщика |


## `addIPsToBalancer()`

```php
addIPsToBalancer($balancer_id, $add_ips_to_balancer_request)
```

Добавление IP-адресов к балансировщику

Чтобы добавить `IP`-адреса к балансировщику, отправьте запрос POST в `api/v1/balancers/{balancer_id}/ips`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\BalancersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$balancer_id = 56; // int | ID балансировщика
$add_ips_to_balancer_request = new \OpenAPI\Client\Model\AddIPsToBalancerRequest(); // \OpenAPI\Client\Model\AddIPsToBalancerRequest

try {
    $apiInstance->addIPsToBalancer($balancer_id, $add_ips_to_balancer_request);
} catch (Exception $e) {
    echo 'Exception when calling BalancersApi->addIPsToBalancer: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **balancer_id** | **int**| ID балансировщика | |
| **add_ips_to_balancer_request** | [**\OpenAPI\Client\Model\AddIPsToBalancerRequest**](../Model/AddIPsToBalancerRequest.md)|  | |

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

## `createBalancer()`

```php
createBalancer($create_balancer): \OpenAPI\Client\Model\CreateBalancer200Response
```

Создание бaлансировщика

Чтобы создать бaлансировщик на вашем аккаунте, отправьте POST-запрос на `/api/v1/balancers`, задав необходимые атрибуты.  Балансировщик будет создан с использованием предоставленной информации. Тело ответа будет содержать объект JSON с информацией о созданном балансировщике.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\BalancersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_balancer = new \OpenAPI\Client\Model\CreateBalancer(); // \OpenAPI\Client\Model\CreateBalancer

try {
    $result = $apiInstance->createBalancer($create_balancer);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BalancersApi->createBalancer: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_balancer** | [**\OpenAPI\Client\Model\CreateBalancer**](../Model/CreateBalancer.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateBalancer200Response**](../Model/CreateBalancer200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createBalancerRule()`

```php
createBalancerRule($balancer_id, $create_rule): \OpenAPI\Client\Model\CreateBalancerRule200Response
```

Создание правила для балансировщика

Чтобы создать правило для балансировщика, отправьте запрос POST в `api/v1/balancers/{balancer_id}/rules`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\BalancersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$balancer_id = 56; // int | ID балансировщика
$create_rule = new \OpenAPI\Client\Model\CreateRule(); // \OpenAPI\Client\Model\CreateRule

try {
    $result = $apiInstance->createBalancerRule($balancer_id, $create_rule);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BalancersApi->createBalancerRule: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **balancer_id** | **int**| ID балансировщика | |
| **create_rule** | [**\OpenAPI\Client\Model\CreateRule**](../Model/CreateRule.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateBalancerRule200Response**](../Model/CreateBalancerRule200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteBalancer()`

```php
deleteBalancer($balancer_id, $hash, $code): \OpenAPI\Client\Model\DeleteBalancer200Response
```

Удаление балансировщика

Чтобы удалить балансировщик, отправьте запрос DELETE в `api/v1/balancers/{balancer_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\BalancersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$balancer_id = 56; // int | ID балансировщика
$hash = 15095f25-aac3-4d60-a788-96cb5136f186; // string | Хеш, который совместно с кодом авторизации надо отправить для удаления, если включено подтверждение удаления сервисов через Телеграм.
$code = 0000; // string | Код подтверждения, который придет к вам в Телеграм, после запроса удаления, если включено подтверждение удаления сервисов.  При помощи API токена сервисы можно удалять без подтверждения, если параметр токена `is_able_to_delete` установлен в значение `true`

try {
    $result = $apiInstance->deleteBalancer($balancer_id, $hash, $code);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BalancersApi->deleteBalancer: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **balancer_id** | **int**| ID балансировщика | |
| **hash** | **string**| Хеш, который совместно с кодом авторизации надо отправить для удаления, если включено подтверждение удаления сервисов через Телеграм. | [optional] |
| **code** | **string**| Код подтверждения, который придет к вам в Телеграм, после запроса удаления, если включено подтверждение удаления сервисов.  При помощи API токена сервисы можно удалять без подтверждения, если параметр токена &#x60;is_able_to_delete&#x60; установлен в значение &#x60;true&#x60; | [optional] |

### Return type

[**\OpenAPI\Client\Model\DeleteBalancer200Response**](../Model/DeleteBalancer200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteBalancerRule()`

```php
deleteBalancerRule($balancer_id, $rule_id)
```

Удаление правила для балансировщика

Чтобы удалить правило для балансировщика, отправьте запрос DELETE в `api/v1/balancers/{balancer_id}/rules/{rule_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\BalancersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$balancer_id = 56; // int | ID балансировщика
$rule_id = 56; // int | ID правила для балансировщика

try {
    $apiInstance->deleteBalancerRule($balancer_id, $rule_id);
} catch (Exception $e) {
    echo 'Exception when calling BalancersApi->deleteBalancerRule: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **balancer_id** | **int**| ID балансировщика | |
| **rule_id** | **int**| ID правила для балансировщика | |

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

## `deleteIPsFromBalancer()`

```php
deleteIPsFromBalancer($balancer_id, $add_ips_to_balancer_request)
```

Удаление IP-адресов из балансировщика

Чтобы удалить `IP`-адреса из балансировщика, отправьте запрос DELETE в `api/v1/balancers/{balancer_id}/ips`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\BalancersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$balancer_id = 56; // int | ID балансировщика
$add_ips_to_balancer_request = new \OpenAPI\Client\Model\AddIPsToBalancerRequest(); // \OpenAPI\Client\Model\AddIPsToBalancerRequest

try {
    $apiInstance->deleteIPsFromBalancer($balancer_id, $add_ips_to_balancer_request);
} catch (Exception $e) {
    echo 'Exception when calling BalancersApi->deleteIPsFromBalancer: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **balancer_id** | **int**| ID балансировщика | |
| **add_ips_to_balancer_request** | [**\OpenAPI\Client\Model\AddIPsToBalancerRequest**](../Model/AddIPsToBalancerRequest.md)|  | |

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

## `getBalancer()`

```php
getBalancer($balancer_id): \OpenAPI\Client\Model\CreateBalancer200Response
```

Получение бaлансировщика

Чтобы отобразить информацию об отдельном балансировщике, отправьте запрос GET на `api/v1/balancers/{balancer_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\BalancersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$balancer_id = 56; // int | ID балансировщика

try {
    $result = $apiInstance->getBalancer($balancer_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BalancersApi->getBalancer: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **balancer_id** | **int**| ID балансировщика | |

### Return type

[**\OpenAPI\Client\Model\CreateBalancer200Response**](../Model/CreateBalancer200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getBalancerIPs()`

```php
getBalancerIPs($balancer_id): \OpenAPI\Client\Model\GetBalancerIPs200Response
```

Получение списка IP-адресов балансировщика

Чтобы добавить `IP`-адреса к балансировщику, отправьте запрос GET в `api/v1/balancers/{balancer_id}/ips`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\BalancersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$balancer_id = 56; // int | ID балансировщика

try {
    $result = $apiInstance->getBalancerIPs($balancer_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BalancersApi->getBalancerIPs: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **balancer_id** | **int**| ID балансировщика | |

### Return type

[**\OpenAPI\Client\Model\GetBalancerIPs200Response**](../Model/GetBalancerIPs200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getBalancerRules()`

```php
getBalancerRules($balancer_id): \OpenAPI\Client\Model\GetBalancerRules200Response
```

Получение правил балансировщика

Чтобы получить правила балансировщика, отправьте запрос GET в `api/v1/balancers/{balancer_id}/rules`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\BalancersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$balancer_id = 56; // int | ID балансировщика

try {
    $result = $apiInstance->getBalancerRules($balancer_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BalancersApi->getBalancerRules: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **balancer_id** | **int**| ID балансировщика | |

### Return type

[**\OpenAPI\Client\Model\GetBalancerRules200Response**](../Model/GetBalancerRules200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getBalancers()`

```php
getBalancers($limit, $offset): \OpenAPI\Client\Model\GetBalancers200Response
```

Получение списка всех бaлансировщиков

Чтобы получить список всех бaлансировщиков на вашем аккаунте, отправьте GET-запрос на `/api/v1/balancers`.   Тело ответа будет представлять собой объект JSON с ключом `balancers`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\BalancersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$limit = 100; // int | Обозначает количество записей, которое необходимо вернуть.
$offset = 0; // int | Указывает на смещение относительно начала списка.

try {
    $result = $apiInstance->getBalancers($limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BalancersApi->getBalancers: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **limit** | **int**| Обозначает количество записей, которое необходимо вернуть. | [optional] [default to 100] |
| **offset** | **int**| Указывает на смещение относительно начала списка. | [optional] [default to 0] |

### Return type

[**\OpenAPI\Client\Model\GetBalancers200Response**](../Model/GetBalancers200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getBalancersPresets()`

```php
getBalancersPresets(): \OpenAPI\Client\Model\GetBalancersPresets200Response
```

Получение списка тарифов для балансировщика

Чтобы получить список тарифов для балансировщика, отправьте GET-запрос на `/api/v1/presets/balancers`.   Тело ответа будет представлять собой объект JSON с ключом `balancers_presets`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\BalancersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getBalancersPresets();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BalancersApi->getBalancersPresets: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\GetBalancersPresets200Response**](../Model/GetBalancersPresets200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateBalancer()`

```php
updateBalancer($balancer_id, $update_balancer): \OpenAPI\Client\Model\CreateBalancer200Response
```

Обновление балансировщика

Чтобы обновить только определенные атрибуты балансировщика, отправьте запрос PATCH в `api/v1/balancers/{balancer_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\BalancersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$balancer_id = 56; // int | ID балансировщика
$update_balancer = new \OpenAPI\Client\Model\UpdateBalancer(); // \OpenAPI\Client\Model\UpdateBalancer

try {
    $result = $apiInstance->updateBalancer($balancer_id, $update_balancer);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BalancersApi->updateBalancer: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **balancer_id** | **int**| ID балансировщика | |
| **update_balancer** | [**\OpenAPI\Client\Model\UpdateBalancer**](../Model/UpdateBalancer.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateBalancer200Response**](../Model/CreateBalancer200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateBalancerRule()`

```php
updateBalancerRule($balancer_id, $rule_id, $update_rule): \OpenAPI\Client\Model\CreateBalancerRule200Response
```

Обновление правила для балансировщика

Чтобы обновить правило для балансировщика, отправьте запрос PATCH в `api/v1/balancers/{balancer_id}/rules/{rule_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\BalancersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$balancer_id = 56; // int | ID балансировщика
$rule_id = 56; // int | ID правила для балансировщика
$update_rule = new \OpenAPI\Client\Model\UpdateRule(); // \OpenAPI\Client\Model\UpdateRule

try {
    $result = $apiInstance->updateBalancerRule($balancer_id, $rule_id, $update_rule);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BalancersApi->updateBalancerRule: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **balancer_id** | **int**| ID балансировщика | |
| **rule_id** | **int**| ID правила для балансировщика | |
| **update_rule** | [**\OpenAPI\Client\Model\UpdateRule**](../Model/UpdateRule.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateBalancerRule200Response**](../Model/CreateBalancerRule200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
