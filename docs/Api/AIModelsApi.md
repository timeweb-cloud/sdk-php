# OpenAPI\Client\AIModelsApi

All URIs are relative to https://api.timeweb.cloud, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getAgentsTokenPackages()**](AIModelsApi.md#getAgentsTokenPackages) | **GET** /api/v1/cloud-ai/token-packages/agents | Получение списка пакетов токенов для агентов |
| [**getKnowledgebasesTokenPackages()**](AIModelsApi.md#getKnowledgebasesTokenPackages) | **GET** /api/v1/cloud-ai/token-packages/knowledge-bases | Получение списка пакетов токенов для баз знаний |
| [**getModels()**](AIModelsApi.md#getModels) | **GET** /api/v1/cloud-ai/models | Получение списка моделей |


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
