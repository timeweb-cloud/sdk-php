# OpenAPI\Client\AIModelsApi

All URIs are relative to https://api.timeweb.cloud, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getAgentsTokenPackages()**](AIModelsApi.md#getAgentsTokenPackages) | **GET** /api/v1/cloud-ai/token-packages/agents | Получение списка пакетов токенов для агентов |
| [**getAiModelParameters()**](AIModelsApi.md#getAiModelParameters) | **GET** /api/v3/cloud-ai/model-parameters | Получение справочника характеристик моделей |
| [**getAiModelTokenPackages()**](AIModelsApi.md#getAiModelTokenPackages) | **GET** /api/v1/cloud-ai/models/{id}/token-packages | Получение пакетов токенов модели |
| [**getAiProvider()**](AIModelsApi.md#getAiProvider) | **GET** /api/v1/cloud-ai/providers/{id} | Получение провайдера моделей |
| [**getAiProviders()**](AIModelsApi.md#getAiProviders) | **GET** /api/v1/cloud-ai/providers | Получение списка провайдеров моделей |
| [**getKnowledgebasesTokenPackages()**](AIModelsApi.md#getKnowledgebasesTokenPackages) | **GET** /api/v1/cloud-ai/token-packages/knowledge-bases | Получение списка пакетов токенов для баз знаний |
| [**getModels()**](AIModelsApi.md#getModels) | **GET** /api/v1/cloud-ai/models | Получение списка моделей (v1) |
| [**getModelsV3()**](AIModelsApi.md#getModelsV3) | **GET** /api/v3/cloud-ai/models | Получение списка моделей |


## `getAgentsTokenPackages()`

```php
getAgentsTokenPackages(): \OpenAPI\Client\Model\GetAgentsTokenPackages200Response
```

Получение списка пакетов токенов для агентов

Метод устарел.  Чтобы получить список пакетов токенов для AI агентов всех моделей, отправьте GET-запрос на `/api/v1/cloud-ai/token-packages/agents`.  Тело ответа будет представлять собой объект JSON с ключами `token_packages` и `meta`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIModelsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getAgentsTokenPackages();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIModelsApi->getAgentsTokenPackages: ', $e->getMessage(), PHP_EOL;
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

## `getAiModelParameters()`

```php
getAiModelParameters(): \OpenAPI\Client\Model\GetAiModelParameters200Response
```

Получение справочника характеристик моделей

Чтобы получить справочник характеристик, которые возвращаются в `parameter_values` моделей, отправьте GET-запрос на `/api/v3/cloud-ai/model-parameters`.  Справочник описывает название, тип, единицу измерения и направление сравнения каждой характеристики. Цены кэша (`cost_cache_read`, `cost_cache_write`) в справочник не входят.  Тело ответа будет представлять собой объект JSON с ключами `model_parameters` и `meta`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIModelsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getAiModelParameters();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIModelsApi->getAiModelParameters: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\GetAiModelParameters200Response**](../Model/GetAiModelParameters200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAiModelTokenPackages()`

```php
getAiModelTokenPackages($id): \OpenAPI\Client\Model\GetAiModelTokenPackages200Response
```

Получение пакетов токенов модели

Чтобы получить пакеты токенов, доступные для AI модели, отправьте GET-запрос на `/api/v1/cloud-ai/models/{id}/token-packages`.  Тело ответа будет представлять собой объект JSON с ключами `token_packages` и `meta`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIModelsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 17; // int | ID модели

try {
    $result = $apiInstance->getAiModelTokenPackages($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIModelsApi->getAiModelTokenPackages: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| ID модели | |

### Return type

[**\OpenAPI\Client\Model\GetAiModelTokenPackages200Response**](../Model/GetAiModelTokenPackages200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAiProvider()`

```php
getAiProvider($id): \OpenAPI\Client\Model\GetAiProvider200Response
```

Получение провайдера моделей

Чтобы получить информацию о провайдере AI моделей, отправьте GET-запрос на `/api/v1/cloud-ai/providers/{id}`.  Тело ответа будет представлять собой объект JSON с ключом `provider`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIModelsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 1; // int | ID провайдера

try {
    $result = $apiInstance->getAiProvider($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIModelsApi->getAiProvider: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| ID провайдера | |

### Return type

[**\OpenAPI\Client\Model\GetAiProvider200Response**](../Model/GetAiProvider200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAiProviders()`

```php
getAiProviders(): \OpenAPI\Client\Model\GetAiProviders200Response
```

Получение списка провайдеров моделей

Чтобы получить список провайдеров AI моделей, отправьте GET-запрос на `/api/v1/cloud-ai/providers`.  Провайдер модели — поле `provider_id` модели.  Тело ответа будет представлять собой объект JSON с ключами `providers` и `meta`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIModelsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getAiProviders();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIModelsApi->getAiProviders: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\GetAiProviders200Response**](../Model/GetAiProviders200Response.md)

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
getKnowledgebasesTokenPackages(): \OpenAPI\Client\Model\GetKnowledgebasesTokenPackages200Response
```

Получение списка пакетов токенов для баз знаний

Чтобы получить список пакетов токенов для баз знаний, отправьте GET-запрос на `/api/v1/cloud-ai/token-packages/knowledge-bases`.  Базовый пакет (`package_type: base`) указывается при создании базы знаний, дополнительный (`package_type: additional`) покупается через `POST /api/v1/cloud-ai/knowledge-bases/{id}/add-additional-token-package`.  Тело ответа будет представлять собой объект JSON с ключами `token_packages` и `meta`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIModelsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getKnowledgebasesTokenPackages();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIModelsApi->getKnowledgebasesTokenPackages: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\GetKnowledgebasesTokenPackages200Response**](../Model/GetKnowledgebasesTokenPackages200Response.md)

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

Получение списка моделей (v1)

Метод устарел — используйте `GET /api/v3/cloud-ai/models`.  Чтобы получить список AI моделей, отправьте GET-запрос на `/api/v1/cloud-ai/models`.  Тело ответа будет представлять собой объект JSON с ключами `models` и `meta`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIModelsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getModels();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIModelsApi->getModels: ', $e->getMessage(), PHP_EOL;
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

## `getModelsV3()`

```php
getModelsV3(): \OpenAPI\Client\Model\GetModelsV3200Response
```

Получение списка моделей

Чтобы получить список AI моделей с ценами и характеристиками, отправьте GET-запрос на `/api/v3/cloud-ai/models`.  Цены и характеристики (контекст, модальности, индексы качества) возвращаются в словаре `parameter_values`, их названия и единицы — в справочнике `GET /api/v3/cloud-ai/model-parameters`. В списке есть и устаревшие модели — проверяйте `is_deprecated` и `is_stopped`.  Тело ответа будет представлять собой объект JSON с ключами `models` и `meta`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIModelsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getModelsV3();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIModelsApi->getModelsV3: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\GetModelsV3200Response**](../Model/GetModelsV3200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
