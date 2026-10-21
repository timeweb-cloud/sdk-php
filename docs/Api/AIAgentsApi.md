# OpenAPI\Client\AIAgentsApi

All URIs are relative to https://api.timeweb.cloud, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**addAdditionalTokenPackage()**](AIAgentsApi.md#addAdditionalTokenPackage) | **POST** /api/v1/cloud-ai/agents/{id}/add-additional-token-package | Добавление дополнительного пакета токенов |
| [**changeAgentModel()**](AIAgentsApi.md#changeAgentModel) | **PATCH** /api/v1/cloud-ai/agents/{id}/model | Смена модели AI агента |
| [**createAgent()**](AIAgentsApi.md#createAgent) | **POST** /api/v1/cloud-ai/agents | Создание AI агента |
| [**createAgentEntityLimit()**](AIAgentsApi.md#createAgentEntityLimit) | **POST** /api/v1/cloud-ai/agents/{id}/entity-limits | Создание лимита агента |
| [**createAgentV2()**](AIAgentsApi.md#createAgentV2) | **POST** /api/v2/cloud-ai/agents | Создание AI агента |
| [**deleteAgent()**](AIAgentsApi.md#deleteAgent) | **DELETE** /api/v1/cloud-ai/agents/{id} | Удаление AI агента |
| [**deleteAgentEntityLimit()**](AIAgentsApi.md#deleteAgentEntityLimit) | **DELETE** /api/v1/cloud-ai/agents/{id}/entity-limits/{limit_id} | Удаление лимита агента |
| [**exportAgentChatsCsv()**](AIAgentsApi.md#exportAgentChatsCsv) | **GET** /api/v1/cloud-ai/agents/{id}/chats/docs | Выгрузка чатов агента в CSV |
| [**getAgent()**](AIAgentsApi.md#getAgent) | **GET** /api/v1/cloud-ai/agents/{id} | Получение AI агента |
| [**getAgentChatList()**](AIAgentsApi.md#getAgentChatList) | **GET** /api/v1/cloud-ai/agents/{id}/chat-list | Получение списка чатов агента |
| [**getAgentChatMessages()**](AIAgentsApi.md#getAgentChatMessages) | **GET** /api/v1/cloud-ai/agents/{id}/chat-list/{chat_id}/messages | Получение сообщений чата агента |
| [**getAgentEntityLimit()**](AIAgentsApi.md#getAgentEntityLimit) | **GET** /api/v1/cloud-ai/agents/{id}/entity-limits/{limit_id} | Получение лимита агента |
| [**getAgentEntityLimits()**](AIAgentsApi.md#getAgentEntityLimits) | **GET** /api/v1/cloud-ai/agents/{id}/entity-limits | Получение лимитов агента |
| [**getAgentStatistics()**](AIAgentsApi.md#getAgentStatistics) | **GET** /api/v1/cloud-ai/agents/{id}/statistic | Получение статистики использования токенов агента |
| [**getAgentV3()**](AIAgentsApi.md#getAgentV3) | **GET** /api/v3/cloud-ai/agents/{id} | Получение AI агента (v3) |
| [**getAgents()**](AIAgentsApi.md#getAgents) | **GET** /api/v1/cloud-ai/agents | Получение списка AI агентов |
| [**getAgentsV3()**](AIAgentsApi.md#getAgentsV3) | **GET** /api/v3/cloud-ai/agents | Получение списка AI агентов (v3) |
| [**syncAgentEntityLimits()**](AIAgentsApi.md#syncAgentEntityLimits) | **PUT** /api/v1/cloud-ai/agents/{id}/entity-limits/sync | Синхронизация лимитов агента за период |
| [**updateAgent()**](AIAgentsApi.md#updateAgent) | **PATCH** /api/v1/cloud-ai/agents/{id} | Обновление AI агента |
| [**updateAgentEntityLimit()**](AIAgentsApi.md#updateAgentEntityLimit) | **PATCH** /api/v1/cloud-ai/agents/{id}/entity-limits/{limit_id} | Изменение лимита агента |


## `addAdditionalTokenPackage()`

```php
addAdditionalTokenPackage($id, $add_token_package)
```

Добавление дополнительного пакета токенов

Чтобы докупить дополнительные пакеты токенов для AI агента, отправьте POST-запрос на `/api/v1/cloud-ai/agents/{id}/add-additional-token-package`.  Метод относится к устаревшей схеме оплаты пакетами токенов и работает только для агентов с пакетом (`token_package_id` в ответе агента). Для агентов с поресурсной оплатой вернётся 400 `per-resource_agents_do_not_support_additional_token_packages`. Стоимость (цена дополнительного пакета модели агента × `count`) сразу списывается с баланса; при нехватке средств — 400 `insufficient_balance`, если подписка агента истекла — 400 `subscription_expired`. После покупки заблокированный агент разблокируется.  Для токенов дополнительных пользователей аккаунта нужна роль `ai:write`.

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

## `changeAgentModel()`

```php
changeAgentModel($id, $change_agent_model): \OpenAPI\Client\Model\CreateAgent201Response
```

Смена модели AI агента

Чтобы сменить основную модель AI агента, отправьте PATCH-запрос на `/api/v1/cloud-ai/agents/{id}/model`.  Параметры модели из `settings.model`, которые новая модель не поддерживает, отбрасываются. Смена модели доступна только агентам с поресурсной оплатой (для агента с пакетом токенов — 400 `model_change_is_allowed_only_for_per-resource_account_and_agent`). Если модель не найдена или недоступна — 404 `model_not_found`.  Для токенов дополнительных пользователей аккаунта нужна роль `ai:write`.

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
$change_agent_model = new \OpenAPI\Client\Model\ChangeAgentModel(); // \OpenAPI\Client\Model\ChangeAgentModel

try {
    $result = $apiInstance->changeAgentModel($id, $change_agent_model);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentsApi->changeAgentModel: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| ID агента | |
| **change_agent_model** | [**\OpenAPI\Client\Model\ChangeAgentModel**](../Model/ChangeAgentModel.md)|  | |

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

## `createAgent()`

```php
createAgent($create_agent): \OpenAPI\Client\Model\CreateAgent201Response
```

Создание AI агента

Чтобы создать AI агента, отправьте POST-запрос на `/api/v1/cloud-ai/agents`, задав необходимые атрибуты.  Метод устарел — используйте `POST /api/v2/cloud-ai/agents`. Поле `token_package_id` обязательно, но не учитывается: агент всегда создаётся с поресурсной оплатой (оплачиваются фактические запросы к модели).  Для токенов дополнительных пользователей аккаунта нужна роль `ai:write`.

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

## `createAgentEntityLimit()`

```php
createAgentEntityLimit($id, $create_agent_entity_limit): \OpenAPI\Client\Model\CreateAgentEntityLimit201Response
```

Создание лимита агента

Чтобы создать лимит AI агента, отправьте POST-запрос на `/api/v1/cloud-ai/agents/{id}/entity-limits`.  Лимиты агента ограничивают расход на его запросы за период (`hour`, `day`, `week`, `month`) — в токенах (`limit`) или в деньгах (`money_limit`, приоритетнее). Лимит действует на все модели агента (`model_id` = `null`) или на одну модель. При достижении лимита запросы к агенту отклоняются до конца периода.  Нужно передать `limit` или `money_limit` (иначе — 400 `entity_keys_limit_value_required`). Если лимит с тем же периодом и моделью уже есть — 409 `entity_keys_limit_already_exists` (измените его или используйте синхронизацию).  Для токенов дополнительных пользователей аккаунта нужна роль `ai:write`.

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
$create_agent_entity_limit = new \OpenAPI\Client\Model\CreateAgentEntityLimit(); // \OpenAPI\Client\Model\CreateAgentEntityLimit

try {
    $result = $apiInstance->createAgentEntityLimit($id, $create_agent_entity_limit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentsApi->createAgentEntityLimit: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| ID агента | |
| **create_agent_entity_limit** | [**\OpenAPI\Client\Model\CreateAgentEntityLimit**](../Model/CreateAgentEntityLimit.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateAgentEntityLimit201Response**](../Model/CreateAgentEntityLimit201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createAgentV2()`

```php
createAgentV2($create_agent_v2): \OpenAPI\Client\Model\CreateAgent201Response
```

Создание AI агента

Чтобы создать AI агента, отправьте POST-запрос на `/api/v2/cloud-ai/agents`, задав необходимые атрибуты.  Агент создаётся с поресурсной оплатой: оплачиваются фактические запросы к модели. Если не переданы настройки виджета, подставляются значения по умолчанию. Дневной лимит расходов можно задать сразу полем `money_limit`, остальные лимиты — через лимиты агента (`/api/v1/cloud-ai/agents/{id}/entity-limits`).  Если модель не найдена или недоступна, вернётся 404 `model_not_found`; если модель не поддерживается — 400 `model_not_supported`; недопустимые параметры модели в `settings.model` — 400.  Вызывать созданного агента из своих приложений можно через OpenAI-совместимое API по его `access_id` — см. [документацию](https://agent.timeweb.cloud/docs).  Для токенов дополнительных пользователей аккаунта нужна роль `ai:write`.

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
$create_agent_v2 = new \OpenAPI\Client\Model\CreateAgentV2(); // \OpenAPI\Client\Model\CreateAgentV2

try {
    $result = $apiInstance->createAgentV2($create_agent_v2);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentsApi->createAgentV2: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_agent_v2** | [**\OpenAPI\Client\Model\CreateAgentV2**](../Model/CreateAgentV2.md)|  | |

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
deleteAgent($id, $delete_agent)
```

Удаление AI агента

Чтобы удалить AI агента, отправьте DELETE-запрос на `/api/v1/cloud-ai/agents/{id}`.  Вместе с агентом отключаются его базы знаний, навыки и интеграции (Telegram, MAX, Jivo, Crisp). В теле запроса можно необязательно указать причину удаления.  Для токенов дополнительных пользователей аккаунта нужна роль `ai:write`.

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
$delete_agent = new \OpenAPI\Client\Model\DeleteAgent(); // \OpenAPI\Client\Model\DeleteAgent

try {
    $apiInstance->deleteAgent($id, $delete_agent);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentsApi->deleteAgent: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| ID агента | |
| **delete_agent** | [**\OpenAPI\Client\Model\DeleteAgent**](../Model/DeleteAgent.md)|  | [optional] |

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

## `deleteAgentEntityLimit()`

```php
deleteAgentEntityLimit($id, $limit_id)
```

Удаление лимита агента

Чтобы удалить лимит AI агента, отправьте DELETE-запрос на `/api/v1/cloud-ai/agents/{id}/entity-limits/{limit_id}`.  Для токенов дополнительных пользователей аккаунта нужна роль `ai:write`.

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
$limit_id = 550e8400-e29b-41d4-a716-446655440000; // string | ID лимита агента

try {
    $apiInstance->deleteAgentEntityLimit($id, $limit_id);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentsApi->deleteAgentEntityLimit: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| ID агента | |
| **limit_id** | **string**| ID лимита агента | |

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

## `exportAgentChatsCsv()`

```php
exportAgentChatsCsv($id, $offset, $limit, $order, $from, $to, $locale): \OpenAPI\Client\Model\ExportAgentChatsCsv200Response
```

Выгрузка чатов агента в CSV

Чтобы выгрузить чаты AI агента в формате CSV, отправьте GET-запрос на `/api/v1/cloud-ai/agents/{id}/chats/docs`.  CSV возвращается строкой в поле `chats_csv.csv` тела JSON. `limit` и `offset` применяются к сообщениям, а не к чатам. Если передан `from`, выгружаются сообщения от `from` до `to` (по умолчанию — до текущего момента). Чаты внешнего чата не выгружаются.  Для токенов дополнительных пользователей аккаунта нужна роль `ai:read`.

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
$offset = 0; // int | Смещение относительно начала списка
$limit = 100; // int | Количество сообщений в ответе
$order = desc; // string | Сортировка по дате сообщения
$from = 2026-10-01T00:00Z; // \DateTime | Начало периода (дата и время в формате ISO 8601)
$to = 2026-10-20T23:59:59.999Z; // \DateTime | Конец периода (дата и время в формате ISO 8601)
$locale = ru; // string | Язык заголовков и значений CSV

try {
    $result = $apiInstance->exportAgentChatsCsv($id, $offset, $limit, $order, $from, $to, $locale);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentsApi->exportAgentChatsCsv: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| ID агента | |
| **offset** | **int**| Смещение относительно начала списка | [optional] [default to 0] |
| **limit** | **int**| Количество сообщений в ответе | [optional] [default to 100] |
| **order** | **string**| Сортировка по дате сообщения | [optional] [default to &#39;desc&#39;] |
| **from** | **\DateTime**| Начало периода (дата и время в формате ISO 8601) | [optional] |
| **to** | **\DateTime**| Конец периода (дата и время в формате ISO 8601) | [optional] |
| **locale** | **string**| Язык заголовков и значений CSV | [optional] [default to &#39;ru&#39;] |

### Return type

[**\OpenAPI\Client\Model\ExportAgentChatsCsv200Response**](../Model/ExportAgentChatsCsv200Response.md)

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

Чтобы получить информацию об AI агенте, отправьте GET-запрос на `/api/v1/cloud-ai/agents/{id}`.  Для токенов дополнительных пользователей аккаунта нужна роль `ai:read`.

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

## `getAgentChatList()`

```php
getAgentChatList($id, $offset, $limit, $order, $from, $to, $reaction_type, $response_time_ranges): \OpenAPI\Client\Model\GetAgentChatList200Response
```

Получение списка чатов агента

Чтобы получить список чатов (диалогов) AI агента, отправьте GET-запрос на `/api/v1/cloud-ai/agents/{id}/chat-list`.  Для каждого чата возвращаются первое сообщение пользователя, количество оценок и среднее время ответа. Чаты внешнего чата сюда не входят. Фильтр по периоду применяется, только если переданы оба параметра `from` и `to`. В `meta.metrics` — сводка по чатам для фильтров.  Для токенов дополнительных пользователей аккаунта нужна роль `ai:read`.

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
$offset = 0; // int | Смещение относительно начала списка
$limit = 100; // int | Количество чатов в ответе
$order = asc; // string | Сортировка по дате первого сообщения
$from = 2026-10-01T00:00Z; // \DateTime | Начало периода (дата и время в формате ISO 8601)
$to = 2026-10-20T23:59:59.999Z; // \DateTime | Конец периода (дата и время в формате ISO 8601)
$reaction_type = likes; // string | Фильтр по оценкам: `likes` — есть положительная, `dislikes` — есть отрицательная, `with` — есть любая, `none` — без оценок
$response_time_ranges = ["1-5","15-"]; // string[] | Фильтр по среднему времени ответа в секундах: диапазоны `мин-макс` или `мин-` («от мин и больше»). Можно передать несколько диапазонов — они объединяются по ИЛИ.

try {
    $result = $apiInstance->getAgentChatList($id, $offset, $limit, $order, $from, $to, $reaction_type, $response_time_ranges);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentsApi->getAgentChatList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| ID агента | |
| **offset** | **int**| Смещение относительно начала списка | [optional] [default to 0] |
| **limit** | **int**| Количество чатов в ответе | [optional] [default to 100] |
| **order** | **string**| Сортировка по дате первого сообщения | [optional] [default to &#39;asc&#39;] |
| **from** | **\DateTime**| Начало периода (дата и время в формате ISO 8601) | [optional] |
| **to** | **\DateTime**| Конец периода (дата и время в формате ISO 8601) | [optional] |
| **reaction_type** | **string**| Фильтр по оценкам: &#x60;likes&#x60; — есть положительная, &#x60;dislikes&#x60; — есть отрицательная, &#x60;with&#x60; — есть любая, &#x60;none&#x60; — без оценок | [optional] |
| **response_time_ranges** | [**string[]**](../Model/string.md)| Фильтр по среднему времени ответа в секундах: диапазоны &#x60;мин-макс&#x60; или &#x60;мин-&#x60; («от мин и больше»). Можно передать несколько диапазонов — они объединяются по ИЛИ. | [optional] |

### Return type

[**\OpenAPI\Client\Model\GetAgentChatList200Response**](../Model/GetAgentChatList200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAgentChatMessages()`

```php
getAgentChatMessages($id, $chat_id, $offset, $limit, $order, $from, $to): \OpenAPI\Client\Model\GetAgentChatMessages200Response
```

Получение сообщений чата агента

Чтобы получить сообщения чата AI агента, отправьте GET-запрос на `/api/v1/cloud-ai/agents/{id}/chat-list/{chat_id}/messages`.  Возвращаются сообщения пользователя и ответы агента. Фильтр по периоду применяется, только если переданы оба параметра `from` и `to`.  Для токенов дополнительных пользователей аккаунта нужна роль `ai:read`.

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
$chat_id = ai-agent-1-0b1c2d3e-4f50-4a6b-8c7d-9e0f1a2b3c4d; // string | ID чата (диалога) из поля `id` списка чатов агента
$offset = 0; // int | Смещение относительно начала списка
$limit = 100; // int | Количество сообщений в ответе
$order = desc; // string | Сортировка по дате сообщения
$from = 2026-10-01T00:00Z; // \DateTime | Начало периода (дата и время в формате ISO 8601)
$to = 2026-10-20T23:59:59.999Z; // \DateTime | Конец периода (дата и время в формате ISO 8601)

try {
    $result = $apiInstance->getAgentChatMessages($id, $chat_id, $offset, $limit, $order, $from, $to);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentsApi->getAgentChatMessages: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| ID агента | |
| **chat_id** | **string**| ID чата (диалога) из поля &#x60;id&#x60; списка чатов агента | |
| **offset** | **int**| Смещение относительно начала списка | [optional] [default to 0] |
| **limit** | **int**| Количество сообщений в ответе | [optional] [default to 100] |
| **order** | **string**| Сортировка по дате сообщения | [optional] [default to &#39;desc&#39;] |
| **from** | **\DateTime**| Начало периода (дата и время в формате ISO 8601) | [optional] |
| **to** | **\DateTime**| Конец периода (дата и время в формате ISO 8601) | [optional] |

### Return type

[**\OpenAPI\Client\Model\GetAgentChatMessages200Response**](../Model/GetAgentChatMessages200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAgentEntityLimit()`

```php
getAgentEntityLimit($id, $limit_id): \OpenAPI\Client\Model\CreateAgentEntityLimit201Response
```

Получение лимита агента

Чтобы получить лимит AI агента, отправьте GET-запрос на `/api/v1/cloud-ai/agents/{id}/entity-limits/{limit_id}`.  Для токенов дополнительных пользователей аккаунта нужна роль `ai:read`.

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
$limit_id = 550e8400-e29b-41d4-a716-446655440000; // string | ID лимита агента

try {
    $result = $apiInstance->getAgentEntityLimit($id, $limit_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentsApi->getAgentEntityLimit: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| ID агента | |
| **limit_id** | **string**| ID лимита агента | |

### Return type

[**\OpenAPI\Client\Model\CreateAgentEntityLimit201Response**](../Model/CreateAgentEntityLimit201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAgentEntityLimits()`

```php
getAgentEntityLimits($id, $limit_type): \OpenAPI\Client\Model\GetAgentEntityLimits200Response
```

Получение лимитов агента

Чтобы получить лимиты AI агента, отправьте GET-запрос на `/api/v1/cloud-ai/agents/{id}/entity-limits`.  Лимиты агента ограничивают расход на его запросы за период (`hour`, `day`, `week`, `month`) — в токенах (`limit`) или в деньгах (`money_limit`, приоритетнее). Лимит действует на все модели агента (`model_id` = `null`) или на одну модель. При достижении лимита запросы к агенту отклоняются до конца периода.  Для токенов дополнительных пользователей аккаунта нужна роль `ai:read`.

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
$limit_type = day; // string | Фильтр по периоду лимита

try {
    $result = $apiInstance->getAgentEntityLimits($id, $limit_type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentsApi->getAgentEntityLimits: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| ID агента | |
| **limit_type** | **string**| Фильтр по периоду лимита | [optional] |

### Return type

[**\OpenAPI\Client\Model\GetAgentEntityLimits200Response**](../Model/GetAgentEntityLimits200Response.md)

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

Чтобы получить статистику использования токенов AI агента, отправьте GET-запрос на `/api/v1/cloud-ai/agents/{id}/statistic`.  Статистика разбита на интервалы длиной `interval` минут: для каждого интервала возвращается по точке на каждую модель, к которой были запросы за период, а для интервалов без запросов — одна нулевая точка без `model_name`. По умолчанию возвращаются последние 24 часа.  Для токенов дополнительных пользователей аккаунта нужна роль `ai:read`.

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
$start_time = 2026-10-19T00:00Z; // \DateTime | Начало периода (ISO 8601). По умолчанию — за 24 часа до `endTime`.
$end_time = 2026-10-20T00:00Z; // \DateTime | Конец периода (ISO 8601). По умолчанию — текущий момент.
$interval = 60; // int | Длина интервала агрегации в минутах

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
| **start_time** | **\DateTime**| Начало периода (ISO 8601). По умолчанию — за 24 часа до &#x60;endTime&#x60;. | [optional] |
| **end_time** | **\DateTime**| Конец периода (ISO 8601). По умолчанию — текущий момент. | [optional] |
| **interval** | **int**| Длина интервала агрегации в минутах | [optional] [default to 60] |

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

## `getAgentV3()`

```php
getAgentV3($id): \OpenAPI\Client\Model\GetAgentV3200Response
```

Получение AI агента (v3)

Чтобы получить информацию об AI агенте, отправьте GET-запрос на `/api/v3/cloud-ai/agents/{id}`.  Отличается от `/api/v1/cloud-ai/agents/{id}` тем, что вместо `knowledge_bases_ids` возвращает `knowledge_bases` — подключённые базы знаний с режимом поиска.  Для токенов дополнительных пользователей аккаунта нужна роль `ai:read`.

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
    $result = $apiInstance->getAgentV3($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentsApi->getAgentV3: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| ID агента | |

### Return type

[**\OpenAPI\Client\Model\GetAgentV3200Response**](../Model/GetAgentV3200Response.md)

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

Чтобы получить список AI агентов, отправьте GET-запрос на `/api/v1/cloud-ai/agents`.  Возвращаются все агенты аккаунта (без пагинации), включая приостановленных и заблокированных. Тело ответа будет представлять собой объект JSON с ключами `agents` и `meta`. Подключённые базы знаний вместе с режимом поиска возвращает метод `/api/v3/cloud-ai/agents`.  Для токенов дополнительных пользователей аккаунта нужна роль `ai:read`.

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

## `getAgentsV3()`

```php
getAgentsV3(): \OpenAPI\Client\Model\GetAgentsV3200Response
```

Получение списка AI агентов (v3)

Чтобы получить список AI агентов, отправьте GET-запрос на `/api/v3/cloud-ai/agents`.  Отличается от `/api/v1/cloud-ai/agents` тем, что вместо `knowledge_bases_ids` возвращает `knowledge_bases` — подключённые базы знаний с режимом поиска.  Для токенов дополнительных пользователей аккаунта нужна роль `ai:read`.

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
    $result = $apiInstance->getAgentsV3();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentsApi->getAgentsV3: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\GetAgentsV3200Response**](../Model/GetAgentsV3200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `syncAgentEntityLimits()`

```php
syncAgentEntityLimits($id, $sync_agent_entity_limits): \OpenAPI\Client\Model\GetAgentEntityLimits200Response
```

Синхронизация лимитов агента за период

Чтобы задать полный набор лимитов AI агента за период, отправьте PUT-запрос на `/api/v1/cloud-ai/agents/{id}/entity-limits/sync`.  Лимиты из запроса создаются или обновляются (сопоставление по `model_id`), а лимиты этого периода, которых нет в запросе, удаляются. Лимиты других периодов не затрагиваются. В ответе — актуальные лимиты периода. Если лимиты одновременно изменил другой запрос, вернётся 409 `entity_keys_limits_sync_conflict` — повторите запрос.  Для токенов дополнительных пользователей аккаунта нужна роль `ai:write`.

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
$sync_agent_entity_limits = new \OpenAPI\Client\Model\SyncAgentEntityLimits(); // \OpenAPI\Client\Model\SyncAgentEntityLimits

try {
    $result = $apiInstance->syncAgentEntityLimits($id, $sync_agent_entity_limits);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentsApi->syncAgentEntityLimits: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| ID агента | |
| **sync_agent_entity_limits** | [**\OpenAPI\Client\Model\SyncAgentEntityLimits**](../Model/SyncAgentEntityLimits.md)|  | |

### Return type

[**\OpenAPI\Client\Model\GetAgentEntityLimits200Response**](../Model/GetAgentEntityLimits200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateAgent()`

```php
updateAgent($id, $update_agent): \OpenAPI\Client\Model\CreateAgent201Response
```

Обновление AI агента

Чтобы обновить AI агента, отправьте PATCH-запрос на `/api/v1/cloud-ai/agents/{id}`, передав изменяемые поля.  Особенности: - `settings` заменяются целиком (кроме `web_search_allowed_sites`, `additional_models` и `memory_enabled`, которые сохраняются, если не переданы) — передавайте полный объект настроек, включая `widget`; - основную модель меняет отдельный метод `PATCH /api/v1/cloud-ai/agents/{id}/model`; - поле `token_limit` больше не поддерживается: запрос с ним отклоняется с кодом 410 — лимиты задаются через `/api/v1/cloud-ai/agents/{id}/entity-limits`; - ошибки привязки `ai_gateway_key_id`: 400 `ai_gateway_key_not_found`, `agent_is_already_migrated_to_another_ai_gateway_key`, `agent_is_not_eligible_for_ai_gateway_migration`; 503 — проверку временно не удалось выполнить; - изменить статус заблокированного или удалённого агента нельзя (400 `agent_can't_change_status`).  Для токенов дополнительных пользователей аккаунта нужна роль `ai:write`.

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

## `updateAgentEntityLimit()`

```php
updateAgentEntityLimit($id, $limit_id, $update_agent_entity_limit): \OpenAPI\Client\Model\CreateAgentEntityLimit201Response
```

Изменение лимита агента

Чтобы изменить значение лимита AI агента, отправьте PATCH-запрос на `/api/v1/cloud-ai/agents/{id}/entity-limits/{limit_id}`.  Непереданные поля не меняются. Снять денежный лимит (`money_limit`: `null`) можно только вместе с передачей `limit`.  Для токенов дополнительных пользователей аккаунта нужна роль `ai:write`.

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
$limit_id = 550e8400-e29b-41d4-a716-446655440000; // string | ID лимита агента
$update_agent_entity_limit = new \OpenAPI\Client\Model\UpdateAgentEntityLimit(); // \OpenAPI\Client\Model\UpdateAgentEntityLimit

try {
    $result = $apiInstance->updateAgentEntityLimit($id, $limit_id, $update_agent_entity_limit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentsApi->updateAgentEntityLimit: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| ID агента | |
| **limit_id** | **string**| ID лимита агента | |
| **update_agent_entity_limit** | [**\OpenAPI\Client\Model\UpdateAgentEntityLimit**](../Model/UpdateAgentEntityLimit.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateAgentEntityLimit201Response**](../Model/CreateAgentEntityLimit201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
