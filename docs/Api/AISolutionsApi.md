# OpenAPI\Client\AISolutionsApi

All URIs are relative to https://api.timeweb.cloud, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**addAiSolutionTelegramBot()**](AISolutionsApi.md#addAiSolutionTelegramBot) | **POST** /api/v1/cloud-ai/solutions/{solution_id}/telegram/bots | Подключение Telegram-бота к AI-решению |
| [**approveAiSolutionTelegramPairing()**](AISolutionsApi.md#approveAiSolutionTelegramPairing) | **POST** /api/v1/cloud-ai/solutions/{solution_id}/telegram/bots/{account_key}/pairing/approve | Подтверждение владельца Telegram-бота AI-решения |
| [**createAiSolution()**](AISolutionsApi.md#createAiSolution) | **POST** /api/v1/cloud-ai/solutions | Создание AI-решения |
| [**deleteAiSolution()**](AISolutionsApi.md#deleteAiSolution) | **DELETE** /api/v1/cloud-ai/solutions/{solution_id} | Удаление AI-решения |
| [**getAiSolution()**](AISolutionsApi.md#getAiSolution) | **GET** /api/v1/cloud-ai/solutions/{solution_id} | Получение AI-решения |
| [**getAiSolutionChatFullHistory()**](AISolutionsApi.md#getAiSolutionChatFullHistory) | **GET** /api/v1/cloud-ai/solutions/{solution_id}/chat/history | Получение всей истории чата AI-решения |
| [**getAiSolutionChatHistory()**](AISolutionsApi.md#getAiSolutionChatHistory) | **GET** /api/v1/cloud-ai/solutions/{solution_id}/chat/conversations/{conversation_id}/messages | Получение истории разговора AI-решения |
| [**getAiSolutionChatStatus()**](AISolutionsApi.md#getAiSolutionChatStatus) | **GET** /api/v1/cloud-ai/solutions/{solution_id}/chat/status | Получение статуса чата AI-решения |
| [**getAiSolutionMainChatHistory()**](AISolutionsApi.md#getAiSolutionMainChatHistory) | **GET** /api/v1/cloud-ai/solutions/{solution_id}/chat/messages | Получение истории основного разговора AI-решения |
| [**listAiSolutionConversations()**](AISolutionsApi.md#listAiSolutionConversations) | **GET** /api/v1/cloud-ai/solutions/{solution_id}/chat/conversations | Получение списка разговоров AI-решения |
| [**listAiSolutionTelegramBots()**](AISolutionsApi.md#listAiSolutionTelegramBots) | **GET** /api/v1/cloud-ai/solutions/{solution_id}/telegram/bots | Получение списка Telegram-ботов AI-решения |
| [**listAiSolutionTypes()**](AISolutionsApi.md#listAiSolutionTypes) | **GET** /api/v1/cloud-ai/solutions/types | Получение списка типов AI-решений |
| [**listAiSolutions()**](AISolutionsApi.md#listAiSolutions) | **GET** /api/v1/cloud-ai/solutions | Получение списка AI-решений |
| [**regenerateAiSolutionAiKey()**](AISolutionsApi.md#regenerateAiSolutionAiKey) | **POST** /api/v1/cloud-ai/solutions/{solution_id}/ai-key/regenerate | Перевыпуск ключа AI Gateway решения |
| [**removeAiSolutionTelegramBot()**](AISolutionsApi.md#removeAiSolutionTelegramBot) | **DELETE** /api/v1/cloud-ai/solutions/{solution_id}/telegram/bots/{account_key} | Отключение Telegram-бота от AI-решения |
| [**resetAiSolutionChat()**](AISolutionsApi.md#resetAiSolutionChat) | **POST** /api/v1/cloud-ai/solutions/{solution_id}/chat/reset | Сброс контекста разговора AI-решения |
| [**sendAiSolutionMessage()**](AISolutionsApi.md#sendAiSolutionMessage) | **POST** /api/v1/cloud-ai/solutions/{solution_id}/chat/messages | Отправка сообщения агенту AI-решения |
| [**shutdownAiSolution()**](AISolutionsApi.md#shutdownAiSolution) | **POST** /api/v1/cloud-ai/solutions/{solution_id}/shutdown | Выключение AI-решения |
| [**startAiSolution()**](AISolutionsApi.md#startAiSolution) | **POST** /api/v1/cloud-ai/solutions/{solution_id}/start | Запуск AI-решения |
| [**stopAiSolutionChat()**](AISolutionsApi.md#stopAiSolutionChat) | **POST** /api/v1/cloud-ai/solutions/{solution_id}/chat/stop | Остановка хода агента AI-решения |
| [**streamAiSolutionChat()**](AISolutionsApi.md#streamAiSolutionChat) | **POST** /api/v1/cloud-ai/solutions/{solution_id}/chat/stream | Отправка сообщения агенту AI-решения с потоковым ответом |
| [**updateAiSolution()**](AISolutionsApi.md#updateAiSolution) | **PATCH** /api/v1/cloud-ai/solutions/{solution_id} | Изменение AI-решения |


## `addAiSolutionTelegramBot()`

```php
addAiSolutionTelegramBot($solution_id, $connect_telegram): \OpenAPI\Client\Model\AddAiSolutionTelegramBot201Response
```

Подключение Telegram-бота к AI-решению

Чтобы подключить Telegram-бота к решению, отправьте POST-запрос на `/api/v1/cloud-ai/solutions/{solution_id}/telegram/bots`.  Принимает токен бота от @BotFather, проверяет его в Telegram и настраивает бота на сервере решения. Владелец подтверждается кодом: пока он не подтверждён, бот никому не отвечает. Напишите боту в личные сообщения, получите в ответ код и передайте его в метод подтверждения владельца.  К решению можно подключить только одного бота: повторный запрос для того же бота обновляет его токен, для другого бота — возвращает 409 `ai_solution_already_has_a_connected_telegram_bot`. Если Telegram отклонил токен, ответ — 400 `ai_solution_telegram_token_is_invalid`.  Перед вызовом убедитесь, что чат готов (`ready: true` в методе получения статуса чата): пока сервер решения разворачивается или выключен, запрос завершается ошибкой.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AISolutionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$solution_id = 15; // int | ID AI-решения
$connect_telegram = new \OpenAPI\Client\Model\ConnectTelegram(); // \OpenAPI\Client\Model\ConnectTelegram

try {
    $result = $apiInstance->addAiSolutionTelegramBot($solution_id, $connect_telegram);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AISolutionsApi->addAiSolutionTelegramBot: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **solution_id** | **int**| ID AI-решения | |
| **connect_telegram** | [**\OpenAPI\Client\Model\ConnectTelegram**](../Model/ConnectTelegram.md)|  | |

### Return type

[**\OpenAPI\Client\Model\AddAiSolutionTelegramBot201Response**](../Model/AddAiSolutionTelegramBot201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `approveAiSolutionTelegramPairing()`

```php
approveAiSolutionTelegramPairing($solution_id, $account_key, $approve_telegram_pairing)
```

Подтверждение владельца Telegram-бота AI-решения

Чтобы подтвердить владельца Telegram-бота, отправьте POST-запрос на `/api/v1/cloud-ai/solutions/{solution_id}/telegram/bots/{account_key}/pairing/approve`.  Передайте код, который бот прислал в личные сообщения в ответ на первое сообщение. После подтверждения агент отвечает этому пользователю Telegram в боте, а бот переходит в состояние `connected`. Владелец привязывается к конкретному боту. Повторный запрос с кодом, уже подтверждённым в последние 15 минут, считается успешным. Некорректный `account_key` — ответ 400 `ai_solution_telegram_token_is_invalid`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AISolutionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$solution_id = 15; // int | ID AI-решения
$account_key = b123456789; // string | ID Telegram-бота в решении (`account_key` из списка ботов) в формате `b<число>`, например `b123456789`
$approve_telegram_pairing = new \OpenAPI\Client\Model\ApproveTelegramPairing(); // \OpenAPI\Client\Model\ApproveTelegramPairing

try {
    $apiInstance->approveAiSolutionTelegramPairing($solution_id, $account_key, $approve_telegram_pairing);
} catch (Exception $e) {
    echo 'Exception when calling AISolutionsApi->approveAiSolutionTelegramPairing: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **solution_id** | **int**| ID AI-решения | |
| **account_key** | **string**| ID Telegram-бота в решении (&#x60;account_key&#x60; из списка ботов) в формате &#x60;b&lt;число&gt;&#x60;, например &#x60;b123456789&#x60; | |
| **approve_telegram_pairing** | [**\OpenAPI\Client\Model\ApproveTelegramPairing**](../Model/ApproveTelegramPairing.md)|  | |

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

## `createAiSolution()`

```php
createAiSolution($create_ai_solution): \OpenAPI\Client\Model\CreateAiSolution201Response
```

Создание AI-решения

Чтобы создать AI-решение, отправьте POST-запрос на `/api/v1/cloud-ai/solutions`.  Выпускает для решения ключ AI Gateway и создаёт облачный сервер из образа решения; агент на сервере настраивается на выбранную модель через этот ключ. Сервер тарифицируется по выбранному тарифу, обращения к модели — через ключ AI Gateway.  Решение возвращается в статусе `creating`: развёртывание сервера и настройка агента занимают несколько минут. Дождитесь статуса `active`, а затем `ready: true` в методе получения статуса чата.  Тариф (`preset_id`) должен быть из той же локации, что и зона доступности (`availability_zone` или зона по умолчанию для региона аккаунта), иначе — 400 `invalid_location_zone`. Соответствие тарифа `requirements` типа решения при создании не проверяется — выбирайте тариф не ниже требований сами. Ответ 409 `no_free_node` означает, что в выбранной зоне сейчас нет свободных ресурсов под этот тариф — выберите другой тариф или зону. Неподходящая или устаревшая модель — 404 `model_not_found`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AISolutionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_ai_solution = new \OpenAPI\Client\Model\CreateAiSolution(); // \OpenAPI\Client\Model\CreateAiSolution

try {
    $result = $apiInstance->createAiSolution($create_ai_solution);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AISolutionsApi->createAiSolution: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_ai_solution** | [**\OpenAPI\Client\Model\CreateAiSolution**](../Model/CreateAiSolution.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateAiSolution201Response**](../Model/CreateAiSolution201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteAiSolution()`

```php
deleteAiSolution($solution_id)
```

Удаление AI-решения

Чтобы удалить AI-решение, отправьте DELETE-запрос на `/api/v1/cloud-ai/solutions/{solution_id}`.  Решение удаляется вместе с сервером и ключом AI Gateway. Действие необратимо: решение и история его чата становятся недоступны.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AISolutionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$solution_id = 15; // int | ID AI-решения

try {
    $apiInstance->deleteAiSolution($solution_id);
} catch (Exception $e) {
    echo 'Exception when calling AISolutionsApi->deleteAiSolution: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **solution_id** | **int**| ID AI-решения | |

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

## `getAiSolution()`

```php
getAiSolution($solution_id): \OpenAPI\Client\Model\CreateAiSolution201Response
```

Получение AI-решения

Чтобы получить AI-решение, отправьте GET-запрос на `/api/v1/cloud-ai/solutions/{solution_id}`.  Статус решения выводится из текущего состояния его сервера. Тело ответа будет представлять собой объект JSON с ключом `ai_solution`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AISolutionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$solution_id = 15; // int | ID AI-решения

try {
    $result = $apiInstance->getAiSolution($solution_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AISolutionsApi->getAiSolution: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **solution_id** | **int**| ID AI-решения | |

### Return type

[**\OpenAPI\Client\Model\CreateAiSolution201Response**](../Model/CreateAiSolution201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAiSolutionChatFullHistory()`

```php
getAiSolutionChatFullHistory($solution_id, $limit, $offset): \OpenAPI\Client\Model\GetAiSolutionMainChatHistory200Response
```

Получение всей истории чата AI-решения

Чтобы получить сообщения всех разговоров решения, отправьте GET-запрос на `/api/v1/cloud-ai/solutions/{solution_id}/chat/history`.  В отличие от `chat/messages` (только основной разговор) и `chat/conversations/{conversation_id}/messages` (конкретный разговор), возвращает сообщения из всех разговоров сразу. Сообщения отсортированы по дате создания от новых к старым. Тело ответа будет представлять собой объект JSON с ключами `ai_solution_chat_messages` и `meta`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AISolutionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$solution_id = 15; // int | ID AI-решения
$limit = 100; // int | Количество сообщений на странице, от 1 до 10 000
$offset = 0; // int | Количество сообщений, которые нужно пропустить

try {
    $result = $apiInstance->getAiSolutionChatFullHistory($solution_id, $limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AISolutionsApi->getAiSolutionChatFullHistory: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **solution_id** | **int**| ID AI-решения | |
| **limit** | **int**| Количество сообщений на странице, от 1 до 10 000 | [optional] [default to 100] |
| **offset** | **int**| Количество сообщений, которые нужно пропустить | [optional] [default to 0] |

### Return type

[**\OpenAPI\Client\Model\GetAiSolutionMainChatHistory200Response**](../Model/GetAiSolutionMainChatHistory200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAiSolutionChatHistory()`

```php
getAiSolutionChatHistory($solution_id, $conversation_id, $limit, $offset): \OpenAPI\Client\Model\GetAiSolutionMainChatHistory200Response
```

Получение истории разговора AI-решения

Чтобы получить историю разговора, отправьте GET-запрос на `/api/v1/cloud-ai/solutions/{solution_id}/chat/conversations/{conversation_id}/messages`.  Сообщения отсортированы по дате создания от новых к старым: первая страница — последние сообщения разговора. Для несуществующего разговора возвращается пустой список. Тело ответа будет представлять собой объект JSON с ключами `ai_solution_chat_messages` и `meta`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AISolutionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$solution_id = 15; // int | ID AI-решения
$conversation_id = solution-15; // string | ID разговора. У основного разговора решения — `solution-<solution_id>`
$limit = 100; // int | Количество сообщений на странице, от 1 до 10 000
$offset = 0; // int | Количество сообщений, которые нужно пропустить

try {
    $result = $apiInstance->getAiSolutionChatHistory($solution_id, $conversation_id, $limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AISolutionsApi->getAiSolutionChatHistory: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **solution_id** | **int**| ID AI-решения | |
| **conversation_id** | **string**| ID разговора. У основного разговора решения — &#x60;solution-&lt;solution_id&gt;&#x60; | |
| **limit** | **int**| Количество сообщений на странице, от 1 до 10 000 | [optional] [default to 100] |
| **offset** | **int**| Количество сообщений, которые нужно пропустить | [optional] [default to 0] |

### Return type

[**\OpenAPI\Client\Model\GetAiSolutionMainChatHistory200Response**](../Model/GetAiSolutionMainChatHistory200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAiSolutionChatStatus()`

```php
getAiSolutionChatStatus($solution_id): \OpenAPI\Client\Model\GetAiSolutionChatStatus200Response
```

Получение статуса чата AI-решения

Чтобы узнать, готов ли агент решения принимать сообщения, отправьте GET-запрос на `/api/v1/cloud-ai/solutions/{solution_id}/chat/status`.  Готовность чата отличается от статуса решения: тот выводится из состояния сервера, а сервер включается задолго до того, как будет установлено и настроено ПО агента. После создания или запуска решения опрашивайте этот метод, пока `ready` не станет `true`. Тело ответа будет представлять собой объект JSON с ключом `ai_solution_chat_status`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AISolutionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$solution_id = 15; // int | ID AI-решения

try {
    $result = $apiInstance->getAiSolutionChatStatus($solution_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AISolutionsApi->getAiSolutionChatStatus: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **solution_id** | **int**| ID AI-решения | |

### Return type

[**\OpenAPI\Client\Model\GetAiSolutionChatStatus200Response**](../Model/GetAiSolutionChatStatus200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAiSolutionMainChatHistory()`

```php
getAiSolutionMainChatHistory($solution_id, $limit, $offset): \OpenAPI\Client\Model\GetAiSolutionMainChatHistory200Response
```

Получение истории основного разговора AI-решения

Чтобы получить историю основного разговора решения, отправьте GET-запрос на `/api/v1/cloud-ai/solutions/{solution_id}/chat/messages`.  ID основного разговора знать не нужно; для других разговоров используйте метод с явным `conversation_id`. Сообщения отсортированы по дате создания от новых к старым: первая страница — последние сообщения. Тело ответа будет представлять собой объект JSON с ключами `ai_solution_chat_messages` и `meta` (`meta.total` — общее количество сообщений).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AISolutionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$solution_id = 15; // int | ID AI-решения
$limit = 100; // int | Количество сообщений на странице, от 1 до 10 000
$offset = 0; // int | Количество сообщений, которые нужно пропустить

try {
    $result = $apiInstance->getAiSolutionMainChatHistory($solution_id, $limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AISolutionsApi->getAiSolutionMainChatHistory: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **solution_id** | **int**| ID AI-решения | |
| **limit** | **int**| Количество сообщений на странице, от 1 до 10 000 | [optional] [default to 100] |
| **offset** | **int**| Количество сообщений, которые нужно пропустить | [optional] [default to 0] |

### Return type

[**\OpenAPI\Client\Model\GetAiSolutionMainChatHistory200Response**](../Model/GetAiSolutionMainChatHistory200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listAiSolutionConversations()`

```php
listAiSolutionConversations($solution_id): \OpenAPI\Client\Model\ListAiSolutionConversations200Response
```

Получение списка разговоров AI-решения

Чтобы получить список разговоров с агентом решения, отправьте GET-запрос на `/api/v1/cloud-ai/solutions/{solution_id}/chat/conversations`.  Возвращает все разговоры решения, в которых есть сообщения, включая основной, отсортированные по дате последнего сообщения от новых к старым. Тело ответа будет представлять собой объект JSON с ключами `ai_solution_conversations` и `meta`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AISolutionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$solution_id = 15; // int | ID AI-решения

try {
    $result = $apiInstance->listAiSolutionConversations($solution_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AISolutionsApi->listAiSolutionConversations: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **solution_id** | **int**| ID AI-решения | |

### Return type

[**\OpenAPI\Client\Model\ListAiSolutionConversations200Response**](../Model/ListAiSolutionConversations200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listAiSolutionTelegramBots()`

```php
listAiSolutionTelegramBots($solution_id): \OpenAPI\Client\Model\ListAiSolutionTelegramBots200Response
```

Получение списка Telegram-ботов AI-решения

Чтобы получить список Telegram-ботов решения, отправьте GET-запрос на `/api/v1/cloud-ai/solutions/{solution_id}/telegram/bots`.  Возвращает подключённых к решению ботов и состояние их подтверждения. Список читается с сервера решения. Тело ответа будет представлять собой объект JSON с ключами `ai_solution_telegram_bots` и `meta`.  Перед вызовом убедитесь, что чат готов (`ready: true` в методе получения статуса чата): пока сервер решения разворачивается или выключен, запрос завершается ошибкой.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AISolutionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$solution_id = 15; // int | ID AI-решения

try {
    $result = $apiInstance->listAiSolutionTelegramBots($solution_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AISolutionsApi->listAiSolutionTelegramBots: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **solution_id** | **int**| ID AI-решения | |

### Return type

[**\OpenAPI\Client\Model\ListAiSolutionTelegramBots200Response**](../Model/ListAiSolutionTelegramBots200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listAiSolutionTypes()`

```php
listAiSolutionTypes(): \OpenAPI\Client\Model\ListAiSolutionTypes200Response
```

Получение списка типов AI-решений

Чтобы получить список типов AI-решений, отправьте GET-запрос на `/api/v1/cloud-ai/solutions/types`.  Возвращает каталог готовых решений, которые можно развернуть на облачном сервере, с минимальными требованиями к конфигурации сервера (`requirements`). Тело ответа будет представлять собой объект JSON с ключами `ai_solution_types` и `meta`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AISolutionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->listAiSolutionTypes();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AISolutionsApi->listAiSolutionTypes: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\ListAiSolutionTypes200Response**](../Model/ListAiSolutionTypes200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listAiSolutions()`

```php
listAiSolutions(): \OpenAPI\Client\Model\ListAiSolutions200Response
```

Получение списка AI-решений

Чтобы получить список AI-решений аккаунта, отправьте GET-запрос на `/api/v1/cloud-ai/solutions`.  Возвращает все решения аккаунта, кроме удалённых. Статус каждого решения выводится из текущего состояния его сервера. Тело ответа будет представлять собой объект JSON с ключами `ai_solutions` и `meta`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AISolutionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->listAiSolutions();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AISolutionsApi->listAiSolutions: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\ListAiSolutions200Response**](../Model/ListAiSolutions200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `regenerateAiSolutionAiKey()`

```php
regenerateAiSolutionAiKey($solution_id): \OpenAPI\Client\Model\RegenerateAiSolutionAiKey200Response
```

Перевыпуск ключа AI Gateway решения

Чтобы перевыпустить ключ AI Gateway решения, отправьте POST-запрос на `/api/v1/cloud-ai/solutions/{solution_id}/ai-key/regenerate`.  Единственный способ сменить этот ключ: он выпущен платформой для решения и в разделе AI Gateway доступен только для чтения. Новый ключ сразу записывается в конфигурацию агента на сервере решения, старый перестаёт работать немедленно. Сервер должен быть включён и полностью развёрнут — это проверяется до перевыпуска, потому что отменить его нельзя. Если записать новый ключ на сервер не удалось, повторите запрос.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AISolutionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$solution_id = 15; // int | ID AI-решения

try {
    $result = $apiInstance->regenerateAiSolutionAiKey($solution_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AISolutionsApi->regenerateAiSolutionAiKey: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **solution_id** | **int**| ID AI-решения | |

### Return type

[**\OpenAPI\Client\Model\RegenerateAiSolutionAiKey200Response**](../Model/RegenerateAiSolutionAiKey200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `removeAiSolutionTelegramBot()`

```php
removeAiSolutionTelegramBot($solution_id, $account_key)
```

Отключение Telegram-бота от AI-решения

Чтобы отключить Telegram-бота от решения, отправьте DELETE-запрос на `/api/v1/cloud-ai/solutions/{solution_id}/telegram/bots/{account_key}`.  Удаляет бота из конфигурации сервера решения: агент перестаёт отвечать в этом боте. Если бот не подключён, запрос всё равно возвращает 204. Некорректный `account_key` — ответ 400 `ai_solution_telegram_token_is_invalid`.  Перед вызовом убедитесь, что чат готов (`ready: true` в методе получения статуса чата): пока сервер решения разворачивается или выключен, запрос завершается ошибкой.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AISolutionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$solution_id = 15; // int | ID AI-решения
$account_key = b123456789; // string | ID Telegram-бота в решении (`account_key` из списка ботов) в формате `b<число>`, например `b123456789`

try {
    $apiInstance->removeAiSolutionTelegramBot($solution_id, $account_key);
} catch (Exception $e) {
    echo 'Exception when calling AISolutionsApi->removeAiSolutionTelegramBot: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **solution_id** | **int**| ID AI-решения | |
| **account_key** | **string**| ID Telegram-бота в решении (&#x60;account_key&#x60; из списка ботов) в формате &#x60;b&lt;число&gt;&#x60;, например &#x60;b123456789&#x60; | |

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

## `resetAiSolutionChat()`

```php
resetAiSolutionChat($solution_id, $reset_ai_solution_chat): \OpenAPI\Client\Model\ResetAiSolutionChat200Response
```

Сброс контекста разговора AI-решения

Чтобы сбросить контекст разговора, отправьте POST-запрос на `/api/v1/cloud-ai/solutions/{solution_id}/chat/reset`.  Контекст сбрасывается на месте: разговор сохраняет `conversation_id`, но агент больше не видит предыдущих сообщений. Без `conversation_id` сбрасывается основной разговор решения. В историю добавляется служебное сообщение с ролью `context-reset`, отмечающее границу текущего контекста, — оно и возвращается в ответе (с ключом `ai_solution_chat_message`). Отметка добавляется и для разговора, в котором ещё не было сообщений.  Перед вызовом убедитесь, что чат готов (`ready: true` в методе получения статуса чата): пока сервер решения разворачивается или выключен, запрос завершается ошибкой.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AISolutionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$solution_id = 15; // int | ID AI-решения
$reset_ai_solution_chat = new \OpenAPI\Client\Model\ResetAiSolutionChat(); // \OpenAPI\Client\Model\ResetAiSolutionChat

try {
    $result = $apiInstance->resetAiSolutionChat($solution_id, $reset_ai_solution_chat);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AISolutionsApi->resetAiSolutionChat: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **solution_id** | **int**| ID AI-решения | |
| **reset_ai_solution_chat** | [**\OpenAPI\Client\Model\ResetAiSolutionChat**](../Model/ResetAiSolutionChat.md)|  | [optional] |

### Return type

[**\OpenAPI\Client\Model\ResetAiSolutionChat200Response**](../Model/ResetAiSolutionChat200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `sendAiSolutionMessage()`

```php
sendAiSolutionMessage($solution_id, $send_ai_solution_message): \OpenAPI\Client\Model\SendAiSolutionMessage200Response
```

Отправка сообщения агенту AI-решения

Чтобы отправить сообщение агенту решения, отправьте POST-запрос на `/api/v1/cloud-ai/solutions/{solution_id}/chat/messages`.  Ответ возвращается целиком после завершения хода агента (ожидание — до 3 минут). Без `conversation_id` сообщение уходит в основной разговор решения; новый разговор начинается только при явной передаче нового ID. Без `message` агент сам здоровается — так можно показать первую реплику чата. Чтобы получать ответ по мере генерации, используйте потоковый метод.  Перед вызовом убедитесь, что чат готов (`ready: true` в методе получения статуса чата): пока сервер решения разворачивается или выключен, запрос завершается ошибкой.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AISolutionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$solution_id = 15; // int | ID AI-решения
$send_ai_solution_message = new \OpenAPI\Client\Model\SendAiSolutionMessage(); // \OpenAPI\Client\Model\SendAiSolutionMessage

try {
    $result = $apiInstance->sendAiSolutionMessage($solution_id, $send_ai_solution_message);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AISolutionsApi->sendAiSolutionMessage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **solution_id** | **int**| ID AI-решения | |
| **send_ai_solution_message** | [**\OpenAPI\Client\Model\SendAiSolutionMessage**](../Model/SendAiSolutionMessage.md)|  | |

### Return type

[**\OpenAPI\Client\Model\SendAiSolutionMessage200Response**](../Model/SendAiSolutionMessage200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `shutdownAiSolution()`

```php
shutdownAiSolution($solution_id)
```

Выключение AI-решения

Чтобы выключить AI-решение, отправьте POST-запрос на `/api/v1/cloud-ai/solutions/{solution_id}/shutdown`.  Выключает сервер решения. Действие асинхронное: следите за результатом по статусу решения (обычно 1–2 минуты до `stopped`). Пока сервер выключен, чат недоступен, а сервер продолжает тарифицироваться. Выключение уже выключенного решения возвращает 204. Пока над сервером выполняется другое действие, ответ — 409 `ai_solution_is_busy`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AISolutionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$solution_id = 15; // int | ID AI-решения

try {
    $apiInstance->shutdownAiSolution($solution_id);
} catch (Exception $e) {
    echo 'Exception when calling AISolutionsApi->shutdownAiSolution: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **solution_id** | **int**| ID AI-решения | |

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

## `startAiSolution()`

```php
startAiSolution($solution_id)
```

Запуск AI-решения

Чтобы запустить AI-решение, отправьте POST-запрос на `/api/v1/cloud-ai/solutions/{solution_id}/start`.  Включает сервер решения. Действие асинхронное: следите за результатом по статусу решения, а готовность агента проверяйте методом получения статуса чата. Пока над сервером выполняется действие, запуск и выключение возвращают 409 `ai_solution_is_busy`.  Не вызывайте метод для работающего решения: запрос будет принят (204) и запустит действие над сервером, а решение на несколько минут станет занятым.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AISolutionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$solution_id = 15; // int | ID AI-решения

try {
    $apiInstance->startAiSolution($solution_id);
} catch (Exception $e) {
    echo 'Exception when calling AISolutionsApi->startAiSolution: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **solution_id** | **int**| ID AI-решения | |

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

## `stopAiSolutionChat()`

```php
stopAiSolutionChat($solution_id, $stop_ai_solution_chat)
```

Остановка хода агента AI-решения

Чтобы остановить текущий ход агента, отправьте POST-запрос на `/api/v1/cloud-ai/solutions/{solution_id}/chat/stop`.  Прерывает генерацию ответа — например, если ответ зациклился или тратит слишком много токенов. Без `conversation_id` останавливается текущий ход основного разговора решения. Ход прерывается на стороне агента: закрыть соединение недостаточно, потому что принятый агентом ход продолжает выполняться независимо от клиента. Если хода нет, запрос всё равно возвращает 204.  Перед вызовом убедитесь, что чат готов (`ready: true` в методе получения статуса чата): пока сервер решения разворачивается или выключен, запрос завершается ошибкой.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AISolutionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$solution_id = 15; // int | ID AI-решения
$stop_ai_solution_chat = new \OpenAPI\Client\Model\StopAiSolutionChat(); // \OpenAPI\Client\Model\StopAiSolutionChat

try {
    $apiInstance->stopAiSolutionChat($solution_id, $stop_ai_solution_chat);
} catch (Exception $e) {
    echo 'Exception when calling AISolutionsApi->stopAiSolutionChat: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **solution_id** | **int**| ID AI-решения | |
| **stop_ai_solution_chat** | [**\OpenAPI\Client\Model\StopAiSolutionChat**](../Model/StopAiSolutionChat.md)|  | [optional] |

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

## `streamAiSolutionChat()`

```php
streamAiSolutionChat($solution_id, $send_ai_solution_message): string
```
### URI(s):
- https://agent.timeweb.cloud 
Отправка сообщения агенту AI-решения с потоковым ответом

Чтобы отправить сообщение агенту решения и получать ответ потоком, отправьте POST-запрос на `https://agent.timeweb.cloud/api/v1/cloud-ai/solutions/{solution_id}/chat/stream`.  Метод работает на `https://agent.timeweb.cloud`, а не на `https://api.timeweb.cloud`: шлюз публичного API накапливает ответ целиком и не может передавать его по частям. Авторизация та же — API-токен в заголовке `Authorization`; токену с ограниченными правами нужен доступ на запись к AI-сервисам. Тело запроса такое же, как у метода отправки сообщения.  Ответ — `text/event-stream`: каждое событие приходит как `event: <тип>` и `data: <JSON>`. Отправка сообщения и подписка на ответ — один запрос, поэтому начало ответа не теряется. Строки, начинающиеся с `:`, — комментарии для поддержания соединения (каждые 15 секунд), их нужно игнорировать. ID разговора возвращается в заголовке ответа `X-Conversation-Id`.  Типы событий: - `subscribed` `{}` — ход принят; - `delta` `{text, seq, runId}` — очередной фрагмент ответа; - `tool` `{name, target, phase, status, seq, runId}` — агент использует инструмент; - `message` `{text, seq, id, stopReason}` — финальный ответ целиком, всегда после последнего `delta`; - `done` `{phase, seq, runId}` — ход завершён; - `error` `{reason, message, budget?}` — ход не удался. `reason`: `empty_reply` — агент не выдал текста; `stream_failed` — поток прервался; `agent_failed` — ход упал на стороне агента при исправном соединении, повтор имеет смысл; `budget_exceeded` — исчерпан лимит расходов ключа AI Gateway решения, в `budget` `{max, spent, resetAt}` — цифры лимита, если они известны. `error` всегда последнее событие потока и может прийти после `done` (например, с `empty_reply`).  Ошибки, возникшие до начала потока (решение не найдено, некорректный запрос, нет доступа), возвращаются обычным JSON-ответом с соответствующим HTTP-статусом. Если сервер решения выключен или недоступен, поток может открыться и сразу завершиться событием `error` с `reason: stream_failed` — проверяйте готовность чата заранее методом получения статуса чата.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AISolutionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$solution_id = 15; // int | ID AI-решения
$send_ai_solution_message = new \OpenAPI\Client\Model\SendAiSolutionMessage(); // \OpenAPI\Client\Model\SendAiSolutionMessage

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->streamAiSolutionChat($solution_id, $send_ai_solution_message, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AISolutionsApi->streamAiSolutionChat: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **solution_id** | **int**| ID AI-решения | |
| **send_ai_solution_message** | [**\OpenAPI\Client\Model\SendAiSolutionMessage**](../Model/SendAiSolutionMessage.md)|  | |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

**string**

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `text/event-stream`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateAiSolution()`

```php
updateAiSolution($solution_id, $update_ai_solution): \OpenAPI\Client\Model\CreateAiSolution201Response
```

Изменение AI-решения

Чтобы изменить AI-решение, отправьте PATCH-запрос на `/api/v1/cloud-ai/solutions/{solution_id}`.  Меняются только переданные поля; `description: null` очищает описание. Смена модели переписывает конфигурацию агента на сервере решения и перезапускает агента, поэтому сервер должен быть включён и полностью развёрнут — иначе запрос завершится ошибкой и ничего не изменится. Смена только названия или описания сервер не затрагивает. Неподходящая модель — 404 `model_not_found`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AISolutionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$solution_id = 15; // int | ID AI-решения
$update_ai_solution = new \OpenAPI\Client\Model\UpdateAiSolution(); // \OpenAPI\Client\Model\UpdateAiSolution

try {
    $result = $apiInstance->updateAiSolution($solution_id, $update_ai_solution);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AISolutionsApi->updateAiSolution: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **solution_id** | **int**| ID AI-решения | |
| **update_ai_solution** | [**\OpenAPI\Client\Model\UpdateAiSolution**](../Model/UpdateAiSolution.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateAiSolution201Response**](../Model/CreateAiSolution201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
