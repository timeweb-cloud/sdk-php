# OpenAPI\Client\RoutersApi

All URIs are relative to https://api.timeweb.cloud, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**addNetworks()**](RoutersApi.md#addNetworks) | **POST** /api/v1/routers/{router_id}/networks | Подключение сетей к роутеру |
| [**createRouter()**](RoutersApi.md#createRouter) | **POST** /api/v1/routers | Создание роутера |
| [**deleteDnat()**](RoutersApi.md#deleteDnat) | **DELETE** /api/v1/routers/{router_id}/dnat-rules/{dnat_id} | Удаление правила проброса портов |
| [**deleteRouter()**](RoutersApi.md#deleteRouter) | **DELETE** /api/v1/routers/{router_id} | Удаление роутера |
| [**deleteRouterNat()**](RoutersApi.md#deleteRouterNat) | **DELETE** /api/v1/routers/{router_id}/networks/{network_name}/nat | Выключение NAT для сети |
| [**deleteRouterNetwork()**](RoutersApi.md#deleteRouterNetwork) | **DELETE** /api/v1/routers/{router_id}/networks/{network_name} | Удаление сети из роутера |
| [**deleteStaticRoute()**](RoutersApi.md#deleteStaticRoute) | **DELETE** /api/v1/routers/{router_id}/static-routes/{static_route_id} | Удаление статического маршрута |
| [**getAvailableStaticRoutes()**](RoutersApi.md#getAvailableStaticRoutes) | **GET** /api/v1/routers/{router_id}/static-routes/available | Получение доступных подсетей для статических маршрутов |
| [**getDnat()**](RoutersApi.md#getDnat) | **GET** /api/v1/routers/{router_id}/dnat-rules | Получение списка правил проброса портов |
| [**getDnatRule()**](RoutersApi.md#getDnatRule) | **GET** /api/v1/routers/{router_id}/dnat-rules/{dnat_id} | Получение правила проброса портов |
| [**getNetworks()**](RoutersApi.md#getNetworks) | **GET** /api/v1/routers/{router_id}/networks | Получение списка сетей роутера |
| [**getRouter()**](RoutersApi.md#getRouter) | **GET** /api/v1/routers/{router_id} | Получение информации о роутере |
| [**getRouterAvailableNetworks()**](RoutersApi.md#getRouterAvailableNetworks) | **GET** /api/v1/routers/networks/available | Получение списка доступных сетей |
| [**getRouterPresets()**](RoutersApi.md#getRouterPresets) | **GET** /api/v1/presets/routers | Получение списка тарифов роутеров |
| [**getRouterStatistics()**](RoutersApi.md#getRouterStatistics) | **GET** /api/v1/routers/{router_id}/statistics/{time_from}/{period}/{keys} | Получение статистики роутера |
| [**getRouters()**](RoutersApi.md#getRouters) | **GET** /api/v1/routers | Получение списка роутеров |
| [**getStaticRoutes()**](RoutersApi.md#getStaticRoutes) | **GET** /api/v1/routers/{router_id}/static-routes | Получение списка статических маршрутов |
| [**patchNetwork()**](RoutersApi.md#patchNetwork) | **PATCH** /api/v1/routers/{router_id}/networks/{network_name} | Обновление информации о сети |
| [**patchNetworks()**](RoutersApi.md#patchNetworks) | **PATCH** /api/v1/routers/{router_id}/networks | Обновление сетей роутера |
| [**postDnat()**](RoutersApi.md#postDnat) | **POST** /api/v1/routers/{router_id}/dnat-rules | Добавление правила проброса портов |
| [**postStaticRoute()**](RoutersApi.md#postStaticRoute) | **POST** /api/v1/routers/{router_id}/static-routes | Добавление статического маршрута |
| [**updateRouter()**](RoutersApi.md#updateRouter) | **PATCH** /api/v1/routers/{router_id} | Обновление информации о роутере |
| [**updateRouterNat()**](RoutersApi.md#updateRouterNat) | **PATCH** /api/v1/routers/{router_id}/networks/{network_name}/nat | Включение NAT для сети |


## `addNetworks()`

```php
addNetworks($router_id, $network_in): \OpenAPI\Client\Model\NetworksResponse
```

Подключение сетей к роутеру

Чтобы подключить сети к роутеру, отправьте POST-запрос на `/api/v1/routers/{router_id}/networks`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\RoutersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$router_id = 'router_id_example'; // string | ID роутера
$network_in = new \OpenAPI\Client\Model\NetworkIn(); // \OpenAPI\Client\Model\NetworkIn

try {
    $result = $apiInstance->addNetworks($router_id, $network_in);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RoutersApi->addNetworks: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **router_id** | **string**| ID роутера | |
| **network_in** | [**\OpenAPI\Client\Model\NetworkIn**](../Model/NetworkIn.md)|  | |

### Return type

[**\OpenAPI\Client\Model\NetworksResponse**](../Model/NetworksResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createRouter()`

```php
createRouter($router_in): \OpenAPI\Client\Model\RouterResponse
```

Создание роутера

Чтобы создать роутер, отправьте POST-запрос на `/api/v1/routers`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\RoutersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$router_in = new \OpenAPI\Client\Model\RouterIn(); // \OpenAPI\Client\Model\RouterIn

try {
    $result = $apiInstance->createRouter($router_in);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RoutersApi->createRouter: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **router_in** | [**\OpenAPI\Client\Model\RouterIn**](../Model/RouterIn.md)|  | |

### Return type

[**\OpenAPI\Client\Model\RouterResponse**](../Model/RouterResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteDnat()`

```php
deleteDnat($router_id, $dnat_id)
```

Удаление правила проброса портов

Чтобы удалить правило проброса портов (DNAT), отправьте DELETE-запрос на `/api/v1/routers/{router_id}/dnat-rules/{dnat_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\RoutersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$router_id = 'router_id_example'; // string | ID роутера
$dnat_id = 'dnat_id_example'; // string | ID правила

try {
    $apiInstance->deleteDnat($router_id, $dnat_id);
} catch (Exception $e) {
    echo 'Exception when calling RoutersApi->deleteDnat: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **router_id** | **string**| ID роутера | |
| **dnat_id** | **string**| ID правила | |

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

## `deleteRouter()`

```php
deleteRouter($router_id)
```

Удаление роутера

Чтобы удалить роутер, отправьте DELETE-запрос на `/api/v1/routers/{router_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\RoutersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$router_id = 'router_id_example'; // string | ID роутера

try {
    $apiInstance->deleteRouter($router_id);
} catch (Exception $e) {
    echo 'Exception when calling RoutersApi->deleteRouter: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **router_id** | **string**| ID роутера | |

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

## `deleteRouterNat()`

```php
deleteRouterNat($router_id, $network_name): \OpenAPI\Client\Model\RouterResponse
```

Выключение NAT для сети

Чтобы выключить NAT для сети роутера, отправьте DELETE-запрос на `/api/v1/routers/{router_id}/networks/{network_name}/nat`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\RoutersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$router_id = 'router_id_example'; // string | ID роутера
$network_name = 'network_name_example'; // string | Имя сети

try {
    $result = $apiInstance->deleteRouterNat($router_id, $network_name);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RoutersApi->deleteRouterNat: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **router_id** | **string**| ID роутера | |
| **network_name** | **string**| Имя сети | |

### Return type

[**\OpenAPI\Client\Model\RouterResponse**](../Model/RouterResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteRouterNetwork()`

```php
deleteRouterNetwork($router_id, $network_name)
```

Удаление сети из роутера

Чтобы отключить сеть от роутера, отправьте DELETE-запрос на `/api/v1/routers/{router_id}/networks/{network_name}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\RoutersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$router_id = 'router_id_example'; // string | ID роутера
$network_name = 'network_name_example'; // string | Имя сети

try {
    $apiInstance->deleteRouterNetwork($router_id, $network_name);
} catch (Exception $e) {
    echo 'Exception when calling RoutersApi->deleteRouterNetwork: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **router_id** | **string**| ID роутера | |
| **network_name** | **string**| Имя сети | |

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

## `deleteStaticRoute()`

```php
deleteStaticRoute($router_id, $static_route_id)
```

Удаление статического маршрута

Чтобы удалить статический маршрут, отправьте DELETE-запрос на `/api/v1/routers/{router_id}/static-routes/{static_route_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\RoutersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$router_id = 'router_id_example'; // string | ID роутера
$static_route_id = 'static_route_id_example'; // string | ID статического маршрута

try {
    $apiInstance->deleteStaticRoute($router_id, $static_route_id);
} catch (Exception $e) {
    echo 'Exception when calling RoutersApi->deleteStaticRoute: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **router_id** | **string**| ID роутера | |
| **static_route_id** | **string**| ID статического маршрута | |

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

## `getAvailableStaticRoutes()`

```php
getAvailableStaticRoutes($router_id): \OpenAPI\Client\Model\AvailableStaticRoutesResponse
```

Получение доступных подсетей для статических маршрутов

Чтобы получить список подсетей, доступных для добавления статических маршрутов, отправьте GET-запрос на `/api/v1/routers/{router_id}/static-routes/available`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\RoutersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$router_id = 'router_id_example'; // string | ID роутера

try {
    $result = $apiInstance->getAvailableStaticRoutes($router_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RoutersApi->getAvailableStaticRoutes: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **router_id** | **string**| ID роутера | |

### Return type

[**\OpenAPI\Client\Model\AvailableStaticRoutesResponse**](../Model/AvailableStaticRoutesResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDnat()`

```php
getDnat($router_id): \OpenAPI\Client\Model\DnatRulesResponse
```

Получение списка правил проброса портов

Чтобы получить список правил проброса портов (DNAT), отправьте GET-запрос на `/api/v1/routers/{router_id}/dnat-rules`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\RoutersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$router_id = 'router_id_example'; // string | ID роутера

try {
    $result = $apiInstance->getDnat($router_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RoutersApi->getDnat: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **router_id** | **string**| ID роутера | |

### Return type

[**\OpenAPI\Client\Model\DnatRulesResponse**](../Model/DnatRulesResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDnatRule()`

```php
getDnatRule($router_id, $dnat_id): \OpenAPI\Client\Model\DnatRuleResponse
```

Получение правила проброса портов

Чтобы получить информацию о правиле проброса портов (DNAT), отправьте GET-запрос на `/api/v1/routers/{router_id}/dnat-rules/{dnat_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\RoutersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$router_id = 'router_id_example'; // string | ID роутера
$dnat_id = 'dnat_id_example'; // string | ID правила

try {
    $result = $apiInstance->getDnatRule($router_id, $dnat_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RoutersApi->getDnatRule: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **router_id** | **string**| ID роутера | |
| **dnat_id** | **string**| ID правила | |

### Return type

[**\OpenAPI\Client\Model\DnatRuleResponse**](../Model/DnatRuleResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getNetworks()`

```php
getNetworks($router_id): \OpenAPI\Client\Model\NetworksResponse
```

Получение списка сетей роутера

Чтобы получить список сетей роутера, отправьте GET-запрос на `/api/v1/routers/{router_id}/networks`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\RoutersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$router_id = 'router_id_example'; // string | ID роутера

try {
    $result = $apiInstance->getNetworks($router_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RoutersApi->getNetworks: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **router_id** | **string**| ID роутера | |

### Return type

[**\OpenAPI\Client\Model\NetworksResponse**](../Model/NetworksResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getRouter()`

```php
getRouter($router_id): \OpenAPI\Client\Model\RouterResponse
```

Получение информации о роутере

Чтобы получить информацию о роутере, отправьте GET-запрос на `/api/v1/routers/{router_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\RoutersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$router_id = 'router_id_example'; // string | ID роутера

try {
    $result = $apiInstance->getRouter($router_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RoutersApi->getRouter: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **router_id** | **string**| ID роутера | |

### Return type

[**\OpenAPI\Client\Model\RouterResponse**](../Model/RouterResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getRouterAvailableNetworks()`

```php
getRouterAvailableNetworks(): \OpenAPI\Client\Model\AvailableNetworksResponse
```

Получение списка доступных сетей

Чтобы получить список локальных сетей, доступных для подключения к роутеру, отправьте GET-запрос на `/api/v1/routers/networks/available`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\RoutersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getRouterAvailableNetworks();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RoutersApi->getRouterAvailableNetworks: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\AvailableNetworksResponse**](../Model/AvailableNetworksResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getRouterPresets()`

```php
getRouterPresets(): \OpenAPI\Client\Model\RouterPresetsResponse
```

Получение списка тарифов роутеров

Чтобы получить список доступных тарифов роутеров, отправьте GET-запрос на `/api/v1/presets/routers`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\RoutersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getRouterPresets();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RoutersApi->getRouterPresets: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\RouterPresetsResponse**](../Model/RouterPresetsResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getRouterStatistics()`

```php
getRouterStatistics($router_id, $time_from, $period, $keys, $node_id): \OpenAPI\Client\Model\RouterStatisticsResponse
```

Получение статистики роутера

Чтобы получить статистику роутера, отправьте GET-запрос на `/api/v1/routers/{router_id}/statistics/{time_from}/{period}/{keys}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\RoutersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$router_id = 'router_id_example'; // string | ID роутера
$time_from = 'time_from_example'; // string | Начало периода
$period = 'period_example'; // string | Период агрегации
$keys = 'keys_example'; // string | Ключи метрик
$node_id = 'node_id_example'; // string | ID ноды

try {
    $result = $apiInstance->getRouterStatistics($router_id, $time_from, $period, $keys, $node_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RoutersApi->getRouterStatistics: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **router_id** | **string**| ID роутера | |
| **time_from** | **string**| Начало периода | |
| **period** | **string**| Период агрегации | |
| **keys** | **string**| Ключи метрик | |
| **node_id** | **string**| ID ноды | [optional] |

### Return type

[**\OpenAPI\Client\Model\RouterStatisticsResponse**](../Model/RouterStatisticsResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getRouters()`

```php
getRouters(): \OpenAPI\Client\Model\RoutersResponse
```

Получение списка роутеров

Чтобы получить список роутеров, отправьте GET-запрос на `/api/v1/routers`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\RoutersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getRouters();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RoutersApi->getRouters: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\RoutersResponse**](../Model/RoutersResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getStaticRoutes()`

```php
getStaticRoutes($router_id): \OpenAPI\Client\Model\StaticRoutesResponse
```

Получение списка статических маршрутов

Чтобы получить список статических маршрутов роутера, отправьте GET-запрос на `/api/v1/routers/{router_id}/static-routes`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\RoutersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$router_id = 'router_id_example'; // string | ID роутера

try {
    $result = $apiInstance->getStaticRoutes($router_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RoutersApi->getStaticRoutes: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **router_id** | **string**| ID роутера | |

### Return type

[**\OpenAPI\Client\Model\StaticRoutesResponse**](../Model/StaticRoutesResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `patchNetwork()`

```php
patchNetwork($router_id, $network_name, $network_edit): \OpenAPI\Client\Model\NetworkResponse
```

Обновление информации о сети

Чтобы включить или выключить DHCP в сети роутера, отправьте PATCH-запрос на `/api/v1/routers/{router_id}/networks/{network_name}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\RoutersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$router_id = 'router_id_example'; // string | ID роутера
$network_name = 'network_name_example'; // string | Имя сети
$network_edit = new \OpenAPI\Client\Model\NetworkEdit(); // \OpenAPI\Client\Model\NetworkEdit

try {
    $result = $apiInstance->patchNetwork($router_id, $network_name, $network_edit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RoutersApi->patchNetwork: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **router_id** | **string**| ID роутера | |
| **network_name** | **string**| Имя сети | |
| **network_edit** | [**\OpenAPI\Client\Model\NetworkEdit**](../Model/NetworkEdit.md)|  | |

### Return type

[**\OpenAPI\Client\Model\NetworkResponse**](../Model/NetworkResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `patchNetworks()`

```php
patchNetworks($router_id, $network_in): \OpenAPI\Client\Model\NetworksResponse
```

Обновление сетей роутера

Чтобы обновить набор сетей роутера, отправьте PATCH-запрос на `/api/v1/routers/{router_id}/networks`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\RoutersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$router_id = 'router_id_example'; // string | ID роутера
$network_in = new \OpenAPI\Client\Model\NetworkIn(); // \OpenAPI\Client\Model\NetworkIn

try {
    $result = $apiInstance->patchNetworks($router_id, $network_in);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RoutersApi->patchNetworks: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **router_id** | **string**| ID роутера | |
| **network_in** | [**\OpenAPI\Client\Model\NetworkIn**](../Model/NetworkIn.md)|  | |

### Return type

[**\OpenAPI\Client\Model\NetworksResponse**](../Model/NetworksResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `postDnat()`

```php
postDnat($router_id, $dnat_in): \OpenAPI\Client\Model\DnatRuleResponse
```

Добавление правила проброса портов

Чтобы добавить правило проброса портов (DNAT), отправьте POST-запрос на `/api/v1/routers/{router_id}/dnat-rules`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\RoutersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$router_id = 'router_id_example'; // string | ID роутера
$dnat_in = new \OpenAPI\Client\Model\DnatIn(); // \OpenAPI\Client\Model\DnatIn

try {
    $result = $apiInstance->postDnat($router_id, $dnat_in);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RoutersApi->postDnat: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **router_id** | **string**| ID роутера | |
| **dnat_in** | [**\OpenAPI\Client\Model\DnatIn**](../Model/DnatIn.md)|  | |

### Return type

[**\OpenAPI\Client\Model\DnatRuleResponse**](../Model/DnatRuleResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `postStaticRoute()`

```php
postStaticRoute($router_id, $static_route_in): \OpenAPI\Client\Model\StaticRouteResponse
```

Добавление статического маршрута

Чтобы добавить статический маршрут, отправьте POST-запрос на `/api/v1/routers/{router_id}/static-routes`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\RoutersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$router_id = 'router_id_example'; // string | ID роутера
$static_route_in = new \OpenAPI\Client\Model\StaticRouteIn(); // \OpenAPI\Client\Model\StaticRouteIn

try {
    $result = $apiInstance->postStaticRoute($router_id, $static_route_in);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RoutersApi->postStaticRoute: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **router_id** | **string**| ID роутера | |
| **static_route_in** | [**\OpenAPI\Client\Model\StaticRouteIn**](../Model/StaticRouteIn.md)|  | |

### Return type

[**\OpenAPI\Client\Model\StaticRouteResponse**](../Model/StaticRouteResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateRouter()`

```php
updateRouter($router_id, $router_edit): \OpenAPI\Client\Model\RouterResponse
```

Обновление информации о роутере

Чтобы обновить информацию о роутере, отправьте PATCH-запрос на `/api/v1/routers/{router_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\RoutersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$router_id = 'router_id_example'; // string | ID роутера
$router_edit = new \OpenAPI\Client\Model\RouterEdit(); // \OpenAPI\Client\Model\RouterEdit

try {
    $result = $apiInstance->updateRouter($router_id, $router_edit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RoutersApi->updateRouter: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **router_id** | **string**| ID роутера | |
| **router_edit** | [**\OpenAPI\Client\Model\RouterEdit**](../Model/RouterEdit.md)|  | |

### Return type

[**\OpenAPI\Client\Model\RouterResponse**](../Model/RouterResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateRouterNat()`

```php
updateRouterNat($router_id, $network_name, $nat_in): \OpenAPI\Client\Model\RouterResponse
```

Включение NAT для сети

Чтобы включить NAT для сети роутера, отправьте PATCH-запрос на `/api/v1/routers/{router_id}/networks/{network_name}/nat`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\RoutersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$router_id = 'router_id_example'; // string | ID роутера
$network_name = 'network_name_example'; // string | Имя сети
$nat_in = new \OpenAPI\Client\Model\NatIn(); // \OpenAPI\Client\Model\NatIn

try {
    $result = $apiInstance->updateRouterNat($router_id, $network_name, $nat_in);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RoutersApi->updateRouterNat: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **router_id** | **string**| ID роутера | |
| **network_name** | **string**| Имя сети | |
| **nat_in** | [**\OpenAPI\Client\Model\NatIn**](../Model/NatIn.md)|  | |

### Return type

[**\OpenAPI\Client\Model\RouterResponse**](../Model/RouterResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
