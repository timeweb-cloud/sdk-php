# OpenAPI\Client\AIAgentsApi

All URIs are relative to https://api.timeweb.cloud, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**addAdditionalTokenPackage()**](AIAgentsApi.md#addAdditionalTokenPackage) | **POST** /api/v1/cloud-ai/agents/{id}/add-additional-token-package | Добавление дополнительного пакета токенов |
| [**createAgent()**](AIAgentsApi.md#createAgent) | **POST** /api/v1/cloud-ai/agents | Создание AI агента |
| [**deleteAgent()**](AIAgentsApi.md#deleteAgent) | **DELETE** /api/v1/cloud-ai/agents/{id} | Удаление AI агента |
| [**getAgent()**](AIAgentsApi.md#getAgent) | **GET** /api/v1/cloud-ai/agents/{id} | Получение AI агента |
| [**getAgentStatistics()**](AIAgentsApi.md#getAgentStatistics) | **GET** /api/v1/cloud-ai/agents/{id}/statistic | Получение статистики использования токенов агента |
| [**getAgents()**](AIAgentsApi.md#getAgents) | **GET** /api/v1/cloud-ai/agents | Получение списка AI агентов |
| [**getAgentsTokenPackages()**](AIAgentsApi.md#getAgentsTokenPackages) | **GET** /api/v1/cloud-ai/token-packages/agents | Получение списка пакетов токенов для агентов |
| [**getKnowledgebasesTokenPackages()**](AIAgentsApi.md#getKnowledgebasesTokenPackages) | **GET** /api/v1/cloud-ai/token-packages/knowledge-bases | Получение списка пакетов токенов для баз знаний |
| [**getModels()**](AIAgentsApi.md#getModels) | **GET** /api/v1/cloud-ai/models | Получение списка моделей |
| [**updateAgent()**](AIAgentsApi.md#updateAgent) | **PATCH** /api/v1/cloud-ai/agents/{id} | Обновление AI агента |


## `addAdditionalTokenPackage()`

```php
addAdditionalTokenPackage($id, $add_token_package)
```

Добавление дополнительного пакета токенов

Чтобы добавить дополнительный пакет токенов для AI агента, отправьте POST-запрос на `/api/v1/cloud-ai/agents/{id}/add-additional-token-package`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIAgentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 1; // int | ID агента
$add_token_package = new \OpenAPI\Client\Model\AddTokenPackage(); // \OpenAPI\Client\Model\AddTokenPackage

try {
    $apiInstance->addAdditionalTokenPackage($id, $add_token_package);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentsApi->addAdditionalTokenPackage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| ID агента | |
| **add_token_package** | [**\OpenAPI\Client\Model\AddTokenPackage**](../Model/AddTokenPackage.md)|  | [optional] |

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

## `createAgent()`

```php
createAgent($create_agent): \OpenAPI\Client\Model\CreateAgent201Response
```

Создание AI агента

Чтобы создать AI агента, отправьте POST-запрос на `/api/v1/cloud-ai/agents`, задав необходимые атрибуты.  Агент будет создан с использованием предоставленной информации. Тело ответа будет содержать объект JSON с информацией о созданном агенте.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIAgentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_agent = new \OpenAPI\Client\Model\CreateAgent(); // \OpenAPI\Client\Model\CreateAgent

try {
    $result = $apiInstance->createAgent($create_agent);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentsApi->createAgent: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_agent** | [**\OpenAPI\Client\Model\CreateAgent**](../Model/CreateAgent.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateAgent201Response**](../Model/CreateAgent201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteAgent()`

```php
deleteAgent($id)
```

Удаление AI агента

Чтобы удалить AI агента, отправьте DELETE-запрос на `/api/v1/cloud-ai/agents/{id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIAgentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 1; // int | ID агента

try {
    $apiInstance->deleteAgent($id);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentsApi->deleteAgent: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| ID агента | |

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

## `getAgent()`

```php
getAgent($id): \OpenAPI\Client\Model\CreateAgent201Response
```

Получение AI агента

Чтобы получить информацию об AI агенте, отправьте GET-запрос на `/api/v1/cloud-ai/agents/{id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIAgentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 1; // int | ID агента

try {
    $result = $apiInstance->getAgent($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentsApi->getAgent: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| ID агента | |

### Return type

[**\OpenAPI\Client\Model\CreateAgent201Response**](../Model/CreateAgent201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAgentStatistics()`

```php
getAgentStatistics($id, $start_time, $end_time, $interval): \OpenAPI\Client\Model\GetAgentStatistics200Response
```

Получение статистики использования токенов агента

Чтобы получить статистику использования токенов AI агента, отправьте GET-запрос на `/api/v1/cloud-ai/agents/{id}/statistic`.  Можно указать временной диапазон и интервал агрегации.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIAgentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 1; // int | ID агента
$start_time = 2024-10-01T00:00Z; // \DateTime | Начало временного диапазона (ISO 8601)
$end_time = 2024-10-16T23:59:59.999Z; // \DateTime | Конец временного диапазона (ISO 8601)
$interval = 60; // float | Интервал в минутах (по умолчанию 60)

try {
    $result = $apiInstance->getAgentStatistics($id, $start_time, $end_time, $interval);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentsApi->getAgentStatistics: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| ID агента | |
| **start_time** | **\DateTime**| Начало временного диапазона (ISO 8601) | [optional] |
| **end_time** | **\DateTime**| Конец временного диапазона (ISO 8601) | [optional] |
| **interval** | **float**| Интервал в минутах (по умолчанию 60) | [optional] [default to 60] |

### Return type

[**\OpenAPI\Client\Model\GetAgentStatistics200Response**](../Model/GetAgentStatistics200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAgents()`

```php
getAgents(): \OpenAPI\Client\Model\GetAgents200Response
```

Получение списка AI агентов

Чтобы получить список AI агентов, отправьте GET-запрос на `/api/v1/cloud-ai/agents`.  Тело ответа будет представлять собой объект JSON с ключом `agents`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIAgentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getAgents();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentsApi->getAgents: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\GetAgents200Response**](../Model/GetAgents200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAgentsTokenPackages()`

```php
getAgentsTokenPackages(): \OpenAPI\Client\Model\GetAgentsTokenPackages200Response
```

Получение списка пакетов токенов для агентов

Чтобы получить список доступных пакетов токенов для AI агентов, отправьте GET-запрос на `/api/v1/cloud-ai/token-packages/agents`.  Тело ответа будет представлять собой объект JSON с ключом `token_packages`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIAgentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getAgentsTokenPackages();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentsApi->getAgentsTokenPackages: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\GetAgentsTokenPackages200Response**](../Model/GetAgentsTokenPackages200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getKnowledgebasesTokenPackages()`

```php
getKnowledgebasesTokenPackages(): \OpenAPI\Client\Model\GetAgentsTokenPackages200Response
```

Получение списка пакетов токенов для баз знаний

Чтобы получить список доступных пакетов токенов для баз знаний, отправьте GET-запрос на `/api/v1/cloud-ai/token-packages/knowledge-bases`.  Тело ответа будет представлять собой объект JSON с ключом `token_packages`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIAgentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getKnowledgebasesTokenPackages();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentsApi->getKnowledgebasesTokenPackages: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\GetAgentsTokenPackages200Response**](../Model/GetAgentsTokenPackages200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getModels()`

```php
getModels(): \OpenAPI\Client\Model\GetModels200Response
```

Получение списка моделей

Чтобы получить список доступных AI моделей, отправьте GET-запрос на `/api/v1/cloud-ai/models`.  Тело ответа будет представлять собой объект JSON с ключом `models`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIAgentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getModels();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentsApi->getModels: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\GetModels200Response**](../Model/GetModels200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateAgent()`

```php
updateAgent($id, $update_agent): \OpenAPI\Client\Model\CreateAgent201Response
```

Обновление AI агента

Чтобы обновить AI агента, отправьте PATCH-запрос на `/api/v1/cloud-ai/agents/{id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIAgentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 1; // int | ID агента
$update_agent = new \OpenAPI\Client\Model\UpdateAgent(); // \OpenAPI\Client\Model\UpdateAgent

try {
    $result = $apiInstance->updateAgent($id, $update_agent);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentsApi->updateAgent: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| ID агента | |
| **update_agent** | [**\OpenAPI\Client\Model\UpdateAgent**](../Model/UpdateAgent.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateAgent201Response**](../Model/CreateAgent201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
