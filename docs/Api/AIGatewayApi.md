# OpenAPI\Client\AIGatewayApi

All URIs are relative to https://api.timeweb.cloud, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createAiKey()**](AIGatewayApi.md#createAiKey) | **POST** /api/v1/cloud-ai/ai-keys | Создание ключа AI Gateway |
| [**createAiKeyLimit()**](AIGatewayApi.md#createAiKeyLimit) | **POST** /api/v1/cloud-ai/ai-keys/{key_id}/entity-limits | Создание лимита ключа AI Gateway |
| [**deleteAiKey()**](AIGatewayApi.md#deleteAiKey) | **DELETE** /api/v1/cloud-ai/ai-keys/{key_id} | Удаление ключа AI Gateway |
| [**deleteAiKeyLimit()**](AIGatewayApi.md#deleteAiKeyLimit) | **DELETE** /api/v1/cloud-ai/ai-keys/{key_id}/entity-limits/{limit_id} | Удаление лимита ключа AI Gateway |
| [**getAiKeyCallsStatistic()**](AIGatewayApi.md#getAiKeyCallsStatistic) | **GET** /api/v1/cloud-ai/ai-keys/statistic/calls | Получение статистики запросов ключа AI Gateway |
| [**getAiKeyLimit()**](AIGatewayApi.md#getAiKeyLimit) | **GET** /api/v1/cloud-ai/ai-keys/{key_id}/entity-limits/{limit_id} | Получение лимита ключа AI Gateway |
| [**getAiKeyLimits()**](AIGatewayApi.md#getAiKeyLimits) | **GET** /api/v1/cloud-ai/ai-keys/{key_id}/entity-limits | Получение списка лимитов ключа AI Gateway |
| [**getAiKeyModelsStatistic()**](AIGatewayApi.md#getAiKeyModelsStatistic) | **GET** /api/v1/cloud-ai/ai-keys/statistic/models | Получение списка моделей, использованных ключом AI Gateway |
| [**getAiKeyTokenUsageStatistic()**](AIGatewayApi.md#getAiKeyTokenUsageStatistic) | **GET** /api/v1/cloud-ai/ai-keys/statistic/token-usage | Получение статистики расхода токенов ключа AI Gateway |
| [**getAiKeys()**](AIGatewayApi.md#getAiKeys) | **GET** /api/v1/cloud-ai/ai-keys | Получение списка ключей AI Gateway |
| [**regenerateAiKey()**](AIGatewayApi.md#regenerateAiKey) | **PUT** /api/v1/cloud-ai/ai-keys/{key_id}/regenerate | Перевыпуск ключа AI Gateway |
| [**syncAiKeyLimits()**](AIGatewayApi.md#syncAiKeyLimits) | **PUT** /api/v1/cloud-ai/ai-keys/{key_id}/entity-limits/sync | Синхронизация лимитов ключа AI Gateway |
| [**updateAiKey()**](AIGatewayApi.md#updateAiKey) | **PATCH** /api/v1/cloud-ai/ai-keys/{key_id} | Изменение ключа AI Gateway |
| [**updateAiKeyLimit()**](AIGatewayApi.md#updateAiKeyLimit) | **PATCH** /api/v1/cloud-ai/ai-keys/{key_id}/entity-limits/{limit_id} | Изменение лимита ключа AI Gateway |


## `createAiKey()`

```php
createAiKey($create_ai_key): \OpenAPI\Client\Model\CreateAiKey201Response
```

Создание ключа AI Gateway

Чтобы создать ключ AI Gateway, отправьте POST-запрос на `/api/v1/cloud-ai/ai-keys`.  Значение ключа (`sk-...`) возвращается в поле `key` только в ответе на этот запрос — сохраните его. Если значение утеряно, перевыпустите ключ.  Если список `fallback_models` некорректен, вернётся 400 с `error_code` `fallback_chain_invalid` (больше двух моделей или повторы, правило — в `details.reason`) или `fallback_model_not_found` (модели нет среди действующих текстовых моделей, список — в `details.model_names`).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIGatewayApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_ai_key = new \OpenAPI\Client\Model\CreateAiKey(); // \OpenAPI\Client\Model\CreateAiKey

try {
    $result = $apiInstance->createAiKey($create_ai_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIGatewayApi->createAiKey: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_ai_key** | [**\OpenAPI\Client\Model\CreateAiKey**](../Model/CreateAiKey.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateAiKey201Response**](../Model/CreateAiKey201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createAiKeyLimit()`

```php
createAiKeyLimit($key_id, $create_ai_key_limit): \OpenAPI\Client\Model\CreateAiKeyLimit201Response
```

Создание лимита ключа AI Gateway

Чтобы ограничить расход ключа AI Gateway, отправьте POST-запрос на `/api/v1/cloud-ai/ai-keys/{key_id}/entity-limits`.  Лимит задаётся в токенах (`limit`) или в деньгах (`money_limit`, приоритетнее) на период `limit_type` — для всех моделей или для одной (`model_id`). Когда лимит исчерпан, запросы ключа к AI Gateway API завершаются ошибкой 422 до начала следующего периода. Если от лимита осталась часть, максимальный размер ответа текстового запроса уменьшается так, чтобы уложиться в остаток.  На один период и одну модель (или на все модели) можно завести только один лимит — повторный вернёт 409 с `error_code` `entity_keys_limit_already_exists`. Если не передан ни `limit`, ни `money_limit`, вернётся 400 с `error_code` `entity_keys_limit_value_required`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIGatewayApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$key_id = 550e8400-e29b-41d4-a716-446655440000; // string | ID ключа AI Gateway (UUID)
$create_ai_key_limit = new \OpenAPI\Client\Model\CreateAiKeyLimit(); // \OpenAPI\Client\Model\CreateAiKeyLimit

try {
    $result = $apiInstance->createAiKeyLimit($key_id, $create_ai_key_limit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIGatewayApi->createAiKeyLimit: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **key_id** | **string**| ID ключа AI Gateway (UUID) | |
| **create_ai_key_limit** | [**\OpenAPI\Client\Model\CreateAiKeyLimit**](../Model/CreateAiKeyLimit.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateAiKeyLimit201Response**](../Model/CreateAiKeyLimit201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteAiKey()`

```php
deleteAiKey($key_id)
```

Удаление ключа AI Gateway

Чтобы удалить ключ AI Gateway, отправьте DELETE-запрос на `/api/v1/cloud-ai/ai-keys/{key_id}`.  После удаления запросы с этим ключом перестают приниматься. Ключи, которыми управляет платформа (`is_readonly: true`), удалить нельзя: вернётся 403 с `error_code` `ai_key_is_readonly`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIGatewayApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$key_id = 550e8400-e29b-41d4-a716-446655440000; // string | ID ключа AI Gateway (UUID)

try {
    $apiInstance->deleteAiKey($key_id);
} catch (Exception $e) {
    echo 'Exception when calling AIGatewayApi->deleteAiKey: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **key_id** | **string**| ID ключа AI Gateway (UUID) | |

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

## `deleteAiKeyLimit()`

```php
deleteAiKeyLimit($key_id, $limit_id)
```

Удаление лимита ключа AI Gateway

Чтобы удалить лимит ключа AI Gateway, отправьте DELETE-запрос на `/api/v1/cloud-ai/ai-keys/{key_id}/entity-limits/{limit_id}`.  Если лимит относится к другому ключу, вернётся 403.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIGatewayApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$key_id = 550e8400-e29b-41d4-a716-446655440000; // string | ID ключа AI Gateway (UUID)
$limit_id = 0f6b7d8e-1c2a-4b3d-9e8f-7a6b5c4d3e2f; // string | ID лимита (UUID)

try {
    $apiInstance->deleteAiKeyLimit($key_id, $limit_id);
} catch (Exception $e) {
    echo 'Exception when calling AIGatewayApi->deleteAiKeyLimit: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **key_id** | **string**| ID ключа AI Gateway (UUID) | |
| **limit_id** | **string**| ID лимита (UUID) | |

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

## `getAiKeyCallsStatistic()`

```php
getAiKeyCallsStatistic($entity_id, $entity_type, $model_name, $start_time, $end_time, $interval): \OpenAPI\Client\Model\GetAiKeyCallsStatistic200Response
```

Получение статистики запросов ключа AI Gateway

Чтобы получить количество запросов ключа по интервалам времени, отправьте GET-запрос на `/api/v1/cloud-ai/ai-keys/statistic/calls`.  Ключ задаётся параметрами `entity_id` (ID ключа) и `entity_type` (тип ключа). Если ключ не найден, вернётся 404. Период по умолчанию — последние 24 часа. Точки возвращаются для каждого интервала периода, включая интервалы без запросов.  Тело ответа будет представлять собой объект JSON с ключами `ai_key_calls_statistics` и `meta`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIGatewayApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$entity_id = 550e8400-e29b-41d4-a716-446655440000; // string | ID ключа — поле `id` из списка ключей.
$entity_type = aikey; // string | Тип ключа — поле `entity_type` из списка ключей: `aikey` — ключ, созданный пользователем, `k8s` — ключ кластера Kubernetes. Если тип не совпадает с типом ключа, вернётся 404.
$model_name = openai/gpt-5.4-mini,openai/gpt-4.1-mini; // string | Фильтр по моделям: ID модели или несколько ID через запятую. Значение другого формата (например, с заглавными буквами) игнорируется — статистика возвращается по всем моделям.
$start_time = 2026-10-19T00:00Z; // \DateTime | Начало периода в формате ISO 8601. По умолчанию — за 24 часа до `end_time`.
$end_time = 2026-10-20T00:00Z; // \DateTime | Конец периода в формате ISO 8601. По умолчанию — текущий момент.
$interval = 60; // int | Шаг агрегации в минутах.

try {
    $result = $apiInstance->getAiKeyCallsStatistic($entity_id, $entity_type, $model_name, $start_time, $end_time, $interval);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIGatewayApi->getAiKeyCallsStatistic: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **entity_id** | **string**| ID ключа — поле &#x60;id&#x60; из списка ключей. | |
| **entity_type** | **string**| Тип ключа — поле &#x60;entity_type&#x60; из списка ключей: &#x60;aikey&#x60; — ключ, созданный пользователем, &#x60;k8s&#x60; — ключ кластера Kubernetes. Если тип не совпадает с типом ключа, вернётся 404. | |
| **model_name** | **string**| Фильтр по моделям: ID модели или несколько ID через запятую. Значение другого формата (например, с заглавными буквами) игнорируется — статистика возвращается по всем моделям. | [optional] |
| **start_time** | **\DateTime**| Начало периода в формате ISO 8601. По умолчанию — за 24 часа до &#x60;end_time&#x60;. | [optional] |
| **end_time** | **\DateTime**| Конец периода в формате ISO 8601. По умолчанию — текущий момент. | [optional] |
| **interval** | **int**| Шаг агрегации в минутах. | [optional] [default to 60] |

### Return type

[**\OpenAPI\Client\Model\GetAiKeyCallsStatistic200Response**](../Model/GetAiKeyCallsStatistic200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAiKeyLimit()`

```php
getAiKeyLimit($key_id, $limit_id): \OpenAPI\Client\Model\CreateAiKeyLimit201Response
```

Получение лимита ключа AI Gateway

Чтобы получить лимит ключа AI Gateway, отправьте GET-запрос на `/api/v1/cloud-ai/ai-keys/{key_id}/entity-limits/{limit_id}`.  Если лимит относится к другому ключу, вернётся 403 с `error_code` `entity_keys_limit_forbidden`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIGatewayApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$key_id = 550e8400-e29b-41d4-a716-446655440000; // string | ID ключа AI Gateway (UUID)
$limit_id = 0f6b7d8e-1c2a-4b3d-9e8f-7a6b5c4d3e2f; // string | ID лимита (UUID)

try {
    $result = $apiInstance->getAiKeyLimit($key_id, $limit_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIGatewayApi->getAiKeyLimit: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **key_id** | **string**| ID ключа AI Gateway (UUID) | |
| **limit_id** | **string**| ID лимита (UUID) | |

### Return type

[**\OpenAPI\Client\Model\CreateAiKeyLimit201Response**](../Model/CreateAiKeyLimit201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAiKeyLimits()`

```php
getAiKeyLimits($key_id, $entity_type, $limit_type): \OpenAPI\Client\Model\GetAiKeyLimits200Response
```

Получение списка лимитов ключа AI Gateway

Чтобы получить лимиты расхода ключа AI Gateway, отправьте GET-запрос на `/api/v1/cloud-ai/ai-keys/{key_id}/entity-limits`.  Тело ответа будет представлять собой объект JSON с ключами `ai_key_entity_limits` и `meta`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIGatewayApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$key_id = 550e8400-e29b-41d4-a716-446655440000; // string | ID ключа AI Gateway (UUID)
$entity_type = aikey; // string | Фильтр по типу сущности лимита (`entity_type`).
$limit_type = day; // string | Фильтр по периоду лимита.

try {
    $result = $apiInstance->getAiKeyLimits($key_id, $entity_type, $limit_type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIGatewayApi->getAiKeyLimits: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **key_id** | **string**| ID ключа AI Gateway (UUID) | |
| **entity_type** | **string**| Фильтр по типу сущности лимита (&#x60;entity_type&#x60;). | [optional] |
| **limit_type** | **string**| Фильтр по периоду лимита. | [optional] |

### Return type

[**\OpenAPI\Client\Model\GetAiKeyLimits200Response**](../Model/GetAiKeyLimits200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAiKeyModelsStatistic()`

```php
getAiKeyModelsStatistic($entity_id, $entity_type, $model_name, $start_time, $end_time): \OpenAPI\Client\Model\GetAiKeyModelsStatistic200Response
```

Получение списка моделей, использованных ключом AI Gateway

Чтобы получить список моделей, к которым обращался ключ за период, отправьте GET-запрос на `/api/v1/cloud-ai/ai-keys/statistic/models`.  Ключ задаётся параметрами `entity_id` (ID ключа) и `entity_type` (тип ключа). Если ключ не найден, вернётся 404. Период по умолчанию — последние 24 часа. Модели отсортированы по алфавиту.  Тело ответа будет представлять собой объект JSON с ключами `ai_key_models_statistics` и `meta`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIGatewayApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$entity_id = 550e8400-e29b-41d4-a716-446655440000; // string | ID ключа — поле `id` из списка ключей.
$entity_type = aikey; // string | Тип ключа — поле `entity_type` из списка ключей: `aikey` — ключ, созданный пользователем, `k8s` — ключ кластера Kubernetes. Если тип не совпадает с типом ключа, вернётся 404.
$model_name = openai/gpt-5.4-mini,openai/gpt-4.1-mini; // string | Фильтр по моделям: ID модели или несколько ID через запятую. Значение другого формата (например, с заглавными буквами) игнорируется — статистика возвращается по всем моделям.
$start_time = 2026-10-19T00:00Z; // \DateTime | Начало периода в формате ISO 8601. По умолчанию — за 24 часа до `end_time`.
$end_time = 2026-10-20T00:00Z; // \DateTime | Конец периода в формате ISO 8601. По умолчанию — текущий момент.

try {
    $result = $apiInstance->getAiKeyModelsStatistic($entity_id, $entity_type, $model_name, $start_time, $end_time);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIGatewayApi->getAiKeyModelsStatistic: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **entity_id** | **string**| ID ключа — поле &#x60;id&#x60; из списка ключей. | |
| **entity_type** | **string**| Тип ключа — поле &#x60;entity_type&#x60; из списка ключей: &#x60;aikey&#x60; — ключ, созданный пользователем, &#x60;k8s&#x60; — ключ кластера Kubernetes. Если тип не совпадает с типом ключа, вернётся 404. | |
| **model_name** | **string**| Фильтр по моделям: ID модели или несколько ID через запятую. Значение другого формата (например, с заглавными буквами) игнорируется — статистика возвращается по всем моделям. | [optional] |
| **start_time** | **\DateTime**| Начало периода в формате ISO 8601. По умолчанию — за 24 часа до &#x60;end_time&#x60;. | [optional] |
| **end_time** | **\DateTime**| Конец периода в формате ISO 8601. По умолчанию — текущий момент. | [optional] |

### Return type

[**\OpenAPI\Client\Model\GetAiKeyModelsStatistic200Response**](../Model/GetAiKeyModelsStatistic200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAiKeyTokenUsageStatistic()`

```php
getAiKeyTokenUsageStatistic($entity_id, $entity_type, $model_name, $start_time, $end_time, $interval): \OpenAPI\Client\Model\GetAiKeyTokenUsageStatistic200Response
```

Получение статистики расхода токенов ключа AI Gateway

Чтобы получить расход токенов и стоимость запросов ключа по интервалам времени, отправьте GET-запрос на `/api/v1/cloud-ai/ai-keys/statistic/token-usage`.  Ключ задаётся параметрами `entity_id` (ID ключа) и `entity_type` (тип ключа). Если ключ не найден, вернётся 404. Период по умолчанию — последние 24 часа. Точки возвращаются для каждого интервала периода, включая интервалы без запросов.  Тело ответа будет представлять собой объект JSON с ключами `ai_key_token_statistics` и `meta`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIGatewayApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$entity_id = 550e8400-e29b-41d4-a716-446655440000; // string | ID ключа — поле `id` из списка ключей.
$entity_type = aikey; // string | Тип ключа — поле `entity_type` из списка ключей: `aikey` — ключ, созданный пользователем, `k8s` — ключ кластера Kubernetes. Если тип не совпадает с типом ключа, вернётся 404.
$model_name = openai/gpt-5.4-mini,openai/gpt-4.1-mini; // string | Фильтр по моделям: ID модели или несколько ID через запятую. Значение другого формата (например, с заглавными буквами) игнорируется — статистика возвращается по всем моделям.
$start_time = 2026-10-19T00:00Z; // \DateTime | Начало периода в формате ISO 8601. По умолчанию — за 24 часа до `end_time`.
$end_time = 2026-10-20T00:00Z; // \DateTime | Конец периода в формате ISO 8601. По умолчанию — текущий момент.
$interval = 60; // int | Шаг агрегации в минутах.

try {
    $result = $apiInstance->getAiKeyTokenUsageStatistic($entity_id, $entity_type, $model_name, $start_time, $end_time, $interval);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIGatewayApi->getAiKeyTokenUsageStatistic: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **entity_id** | **string**| ID ключа — поле &#x60;id&#x60; из списка ключей. | |
| **entity_type** | **string**| Тип ключа — поле &#x60;entity_type&#x60; из списка ключей: &#x60;aikey&#x60; — ключ, созданный пользователем, &#x60;k8s&#x60; — ключ кластера Kubernetes. Если тип не совпадает с типом ключа, вернётся 404. | |
| **model_name** | **string**| Фильтр по моделям: ID модели или несколько ID через запятую. Значение другого формата (например, с заглавными буквами) игнорируется — статистика возвращается по всем моделям. | [optional] |
| **start_time** | **\DateTime**| Начало периода в формате ISO 8601. По умолчанию — за 24 часа до &#x60;end_time&#x60;. | [optional] |
| **end_time** | **\DateTime**| Конец периода в формате ISO 8601. По умолчанию — текущий момент. | [optional] |
| **interval** | **int**| Шаг агрегации в минутах. | [optional] [default to 60] |

### Return type

[**\OpenAPI\Client\Model\GetAiKeyTokenUsageStatistic200Response**](../Model/GetAiKeyTokenUsageStatistic200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAiKeys()`

```php
getAiKeys(): \OpenAPI\Client\Model\GetAiKeys200Response
```

Получение списка ключей AI Gateway

Чтобы получить список ключей AI Gateway, отправьте GET-запрос на `/api/v1/cloud-ai/ai-keys`.  В списке — ключи, созданные пользователем, и ключи кластеров Kubernetes, выпущенные платформой. Значения ключей (`sk-...`) не возвращаются.  Тело ответа будет представлять собой объект JSON с ключами `ai_keys` и `meta`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIGatewayApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getAiKeys();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIGatewayApi->getAiKeys: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\GetAiKeys200Response**](../Model/GetAiKeys200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `regenerateAiKey()`

```php
regenerateAiKey($key_id): \OpenAPI\Client\Model\CreateAiKey201Response
```

Перевыпуск ключа AI Gateway

Чтобы перевыпустить ключ AI Gateway, отправьте PUT-запрос на `/api/v1/cloud-ai/ai-keys/{key_id}/regenerate`.  Ключ получает новое значение, старое перестаёт действовать сразу. Название, лимиты, запасные модели и статистика сохраняются. Новое значение (`sk-...`) возвращается в поле `key` только в ответе на этот запрос — сохраните его. Поле `expires_at` в ответе не заполняется.  Ключи, которыми управляет платформа (`is_readonly: true`), перевыпустить нельзя: вернётся 403 с `error_code` `ai_key_is_readonly`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIGatewayApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$key_id = 550e8400-e29b-41d4-a716-446655440000; // string | ID ключа AI Gateway (UUID)

try {
    $result = $apiInstance->regenerateAiKey($key_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIGatewayApi->regenerateAiKey: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **key_id** | **string**| ID ключа AI Gateway (UUID) | |

### Return type

[**\OpenAPI\Client\Model\CreateAiKey201Response**](../Model/CreateAiKey201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `syncAiKeyLimits()`

```php
syncAiKeyLimits($key_id, $sync_ai_key_limits): \OpenAPI\Client\Model\GetAiKeyLimits200Response
```

Синхронизация лимитов ключа AI Gateway

Чтобы задать все лимиты ключа AI Gateway на один период одним запросом, отправьте PUT-запрос на `/api/v1/cloud-ai/ai-keys/{key_id}/entity-limits/sync`.  Лимиты из `limits` создаются или обновляются (по `model_id`), а лимиты того же периода, которых нет в запросе, удаляются. Изменения применяются целиком или не применяются совсем.  Если в записи не задан ни `limit`, ни `money_limit` или `money_limit` снимается без `limit`, вернётся 400 с `error_code` `entity_keys_limit_value_required`. Если лимиты одновременно изменил другой запрос, вернётся 409 с `error_code` `entity_keys_limits_sync_conflict` — повторите запрос.  Тело ответа будет представлять собой объект JSON с ключами `ai_key_entity_limits` и `meta` — лимиты периода после синхронизации.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIGatewayApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$key_id = 550e8400-e29b-41d4-a716-446655440000; // string | ID ключа AI Gateway (UUID)
$sync_ai_key_limits = new \OpenAPI\Client\Model\SyncAiKeyLimits(); // \OpenAPI\Client\Model\SyncAiKeyLimits

try {
    $result = $apiInstance->syncAiKeyLimits($key_id, $sync_ai_key_limits);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIGatewayApi->syncAiKeyLimits: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **key_id** | **string**| ID ключа AI Gateway (UUID) | |
| **sync_ai_key_limits** | [**\OpenAPI\Client\Model\SyncAiKeyLimits**](../Model/SyncAiKeyLimits.md)|  | |

### Return type

[**\OpenAPI\Client\Model\GetAiKeyLimits200Response**](../Model/GetAiKeyLimits200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateAiKey()`

```php
updateAiKey($key_id, $update_ai_key): \OpenAPI\Client\Model\UpdateAiKey200Response
```

Изменение ключа AI Gateway

Чтобы изменить ключ AI Gateway, отправьте PATCH-запрос на `/api/v1/cloud-ai/ai-keys/{key_id}`, передав изменяемые поля.  Ключи, которыми управляет платформа (`is_readonly: true` — ключи AI-решений и кластеров Kubernetes), изменить нельзя: вернётся 403 с `error_code` `ai_key_is_readonly`.  Ошибки в `fallback_models` — как при создании ключа (400). Поле `expires_at` в ответе этого запроса не заполняется — срок действия ключа смотрите в списке ключей.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIGatewayApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$key_id = 550e8400-e29b-41d4-a716-446655440000; // string | ID ключа AI Gateway (UUID)
$update_ai_key = new \OpenAPI\Client\Model\UpdateAiKey(); // \OpenAPI\Client\Model\UpdateAiKey

try {
    $result = $apiInstance->updateAiKey($key_id, $update_ai_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIGatewayApi->updateAiKey: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **key_id** | **string**| ID ключа AI Gateway (UUID) | |
| **update_ai_key** | [**\OpenAPI\Client\Model\UpdateAiKey**](../Model/UpdateAiKey.md)|  | |

### Return type

[**\OpenAPI\Client\Model\UpdateAiKey200Response**](../Model/UpdateAiKey200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateAiKeyLimit()`

```php
updateAiKeyLimit($key_id, $limit_id, $update_ai_key_limit): \OpenAPI\Client\Model\CreateAiKeyLimit201Response
```

Изменение лимита ключа AI Gateway

Чтобы изменить лимит ключа AI Gateway, отправьте PATCH-запрос на `/api/v1/cloud-ai/ai-keys/{key_id}/entity-limits/{limit_id}`.  Не переданные поля не меняются. Если не передан ни `limit`, ни `money_limit` или `money_limit` снимается без `limit`, вернётся 400 с `error_code` `entity_keys_limit_value_required`. Если лимит относится к другому ключу, вернётся 403.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIGatewayApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$key_id = 550e8400-e29b-41d4-a716-446655440000; // string | ID ключа AI Gateway (UUID)
$limit_id = 0f6b7d8e-1c2a-4b3d-9e8f-7a6b5c4d3e2f; // string | ID лимита (UUID)
$update_ai_key_limit = new \OpenAPI\Client\Model\UpdateAiKeyLimit(); // \OpenAPI\Client\Model\UpdateAiKeyLimit

try {
    $result = $apiInstance->updateAiKeyLimit($key_id, $limit_id, $update_ai_key_limit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIGatewayApi->updateAiKeyLimit: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **key_id** | **string**| ID ключа AI Gateway (UUID) | |
| **limit_id** | **string**| ID лимита (UUID) | |
| **update_ai_key_limit** | [**\OpenAPI\Client\Model\UpdateAiKeyLimit**](../Model/UpdateAiKeyLimit.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateAiKeyLimit201Response**](../Model/CreateAiKeyLimit201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
