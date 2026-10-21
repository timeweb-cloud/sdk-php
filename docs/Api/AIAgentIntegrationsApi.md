# OpenAPI\Client\AIAgentIntegrationsApi

All URIs are relative to https://api.timeweb.cloud, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createAgentBotMaxBot()**](AIAgentIntegrationsApi.md#createAgentBotMaxBot) | **POST** /api/v1/cloud-ai/max-bots | Подключение бота MAX к агенту |
| [**createAgentBotTelegramBot()**](AIAgentIntegrationsApi.md#createAgentBotTelegramBot) | **POST** /api/v1/cloud-ai/bots | Подключение Telegram-бота к агенту |
| [**createAgentIntegrationCrisp()**](AIAgentIntegrationsApi.md#createAgentIntegrationCrisp) | **POST** /api/v1/cloud-ai/agent/{agent_id}/crisp | Подключение агента к Crisp |
| [**createAgentIntegrationJivo()**](AIAgentIntegrationsApi.md#createAgentIntegrationJivo) | **POST** /api/v1/cloud-ai/agent/{agent_id}/jivo | Подключение агента к Jivo |
| [**deleteAgentBotMaxBot()**](AIAgentIntegrationsApi.md#deleteAgentBotMaxBot) | **DELETE** /api/v1/cloud-ai/max-bots/{bot_id} | Отключение бота MAX |
| [**deleteAgentBotTelegramBot()**](AIAgentIntegrationsApi.md#deleteAgentBotTelegramBot) | **DELETE** /api/v1/cloud-ai/bots/{bot_id} | Отключение Telegram-бота |
| [**deleteAgentIntegrationCrisp()**](AIAgentIntegrationsApi.md#deleteAgentIntegrationCrisp) | **DELETE** /api/v1/cloud-ai/agent/{agent_id}/crisp | Отключение агента от Crisp |
| [**deleteAgentIntegrationJivo()**](AIAgentIntegrationsApi.md#deleteAgentIntegrationJivo) | **DELETE** /api/v1/cloud-ai/agent/{agent_id}/jivo | Отключение агента от Jivo |
| [**getAgentBotMaxBot()**](AIAgentIntegrationsApi.md#getAgentBotMaxBot) | **GET** /api/v1/cloud-ai/max-bots/{bot_id} | Получение информации о боте MAX |
| [**getAgentBotMaxBots()**](AIAgentIntegrationsApi.md#getAgentBotMaxBots) | **GET** /api/v1/cloud-ai/max-bots | Получение списка ботов MAX |
| [**getAgentBotMaxBotsByAgent()**](AIAgentIntegrationsApi.md#getAgentBotMaxBotsByAgent) | **GET** /api/v1/cloud-ai/agents/{agent_id}/max-bots | Получение списка ботов MAX агента |
| [**getAgentBotTelegramBot()**](AIAgentIntegrationsApi.md#getAgentBotTelegramBot) | **GET** /api/v1/cloud-ai/bots/{bot_id} | Получение информации о Telegram-боте |
| [**getAgentBotTelegramBots()**](AIAgentIntegrationsApi.md#getAgentBotTelegramBots) | **GET** /api/v1/cloud-ai/bots | Получение списка Telegram-ботов |
| [**getAgentBotTelegramBotsByAgent()**](AIAgentIntegrationsApi.md#getAgentBotTelegramBotsByAgent) | **GET** /api/v1/cloud-ai/agents/{agent_id}/bots | Получение списка Telegram-ботов агента |
| [**getAgentIntegrationCrisp()**](AIAgentIntegrationsApi.md#getAgentIntegrationCrisp) | **GET** /api/v1/cloud-ai/agent/{agent_id}/crisp | Получение интеграции агента с Crisp |
| [**getAgentIntegrationJivo()**](AIAgentIntegrationsApi.md#getAgentIntegrationJivo) | **GET** /api/v1/cloud-ai/agent/{agent_id}/jivo | Получение интеграции агента с Jivo |
| [**updateAgentBotMaxBot()**](AIAgentIntegrationsApi.md#updateAgentBotMaxBot) | **PATCH** /api/v1/cloud-ai/max-bots/{bot_id} | Изменение бота MAX |
| [**updateAgentBotTelegramBot()**](AIAgentIntegrationsApi.md#updateAgentBotTelegramBot) | **PATCH** /api/v1/cloud-ai/bots/{bot_id} | Изменение Telegram-бота |


## `createAgentBotMaxBot()`

```php
createAgentBotMaxBot($create_max_bot): \OpenAPI\Client\Model\CreateAgentBotTelegramBot201Response
```

Подключение бота MAX к агенту

Чтобы подключить бота MAX к AI агенту, отправьте POST-запрос на `/api/v1/cloud-ai/max-bots`, передав ID агента и токен бота от @MasterBot.  Платформа проверит токен в MAX, сохранит бота и сама подпишет его на события (вебхук) — настраивать подписку в MAX не нужно. После этого агент начинает отвечать пользователям бота.  Один бот может быть подключен только к одному агенту. Если бот уже подключен к агенту, который был удален, бот будет переподключен к новому агенту. Ограничение доступа по списку пользователей для ботов MAX не поддерживается.  Ошибки: - `400 invalid_max_token` — MAX не принял токен; - `400 max_webhook_error` — не удалось подписать бота на события; - `409 bot_already_exists` — бот уже подключен к существующему агенту или к другому аккаунту.  Тело ответа будет представлять собой объект JSON с ключом `bot`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIAgentIntegrationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_max_bot = new \OpenAPI\Client\Model\CreateMaxBot(); // \OpenAPI\Client\Model\CreateMaxBot

try {
    $result = $apiInstance->createAgentBotMaxBot($create_max_bot);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentIntegrationsApi->createAgentBotMaxBot: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_max_bot** | [**\OpenAPI\Client\Model\CreateMaxBot**](../Model/CreateMaxBot.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateAgentBotTelegramBot201Response**](../Model/CreateAgentBotTelegramBot201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createAgentBotTelegramBot()`

```php
createAgentBotTelegramBot($create_bot): \OpenAPI\Client\Model\CreateAgentBotTelegramBot201Response
```

Подключение Telegram-бота к агенту

Чтобы подключить Telegram-бота к AI агенту, отправьте POST-запрос на `/api/v1/cloud-ai/bots`, передав ID агента и токен бота от @BotFather.  Платформа проверит токен в Telegram, сохранит бота и сама установит ему вебхук — настраивать вебхук в Telegram не нужно. После этого агент начинает отвечать пользователям бота. Ранее накопленные у бота обновления сбрасываются.  Один бот может быть подключен только к одному агенту. Если бот уже подключен к агенту, который был удален, бот будет переподключен к новому агенту.  Ошибки: - `400 invalid_telegram_token` — Telegram не принял токен; - `400 telegram_webhook_error` — не удалось установить вебхук; - `409 bot_already_exists` — бот уже подключен к существующему агенту или к другому аккаунту.  Тело ответа будет представлять собой объект JSON с ключом `bot`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIAgentIntegrationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_bot = new \OpenAPI\Client\Model\CreateBot(); // \OpenAPI\Client\Model\CreateBot

try {
    $result = $apiInstance->createAgentBotTelegramBot($create_bot);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentIntegrationsApi->createAgentBotTelegramBot: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_bot** | [**\OpenAPI\Client\Model\CreateBot**](../Model/CreateBot.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateAgentBotTelegramBot201Response**](../Model/CreateAgentBotTelegramBot201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createAgentIntegrationCrisp()`

```php
createAgentIntegrationCrisp($agent_id, $create_crisp_integration): \OpenAPI\Client\Model\GetAgentIntegrationCrisp200Response
```

Подключение агента к Crisp

Чтобы подключить AI агента к Crisp, отправьте POST-запрос на `/api/v1/cloud-ai/agent/{agent_id}/crisp`, передав Website ID сайта и API-токен Crisp (Identifier и Key).  Платформа проверит токен в Crisp и вернет `webhook_secret`. Затем добавьте в Crisp вебхук `https://api.timeweb.cloud/api/v1/crisp/{website_id}/webhook/{webhook_secret}` — подробнее в разделе «Интеграции AI агентов».  К одному агенту можно подключить один сайт Crisp, и один сайт — только к одному агенту.  Ошибки: - `400 invalid_crisp_token` — Crisp не принял токен для этого сайта; - `409 bot_already_exists` — у агента уже есть интеграция с Crisp или сайт подключен к другому агенту; - `503` — интеграция с Crisp временно недоступна.  Тело ответа будет представлять собой объект JSON с ключом `crisp_integration`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIAgentIntegrationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$agent_id = 1; // int | ID агента
$create_crisp_integration = new \OpenAPI\Client\Model\CreateCrispIntegration(); // \OpenAPI\Client\Model\CreateCrispIntegration

try {
    $result = $apiInstance->createAgentIntegrationCrisp($agent_id, $create_crisp_integration);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentIntegrationsApi->createAgentIntegrationCrisp: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **agent_id** | **int**| ID агента | |
| **create_crisp_integration** | [**\OpenAPI\Client\Model\CreateCrispIntegration**](../Model/CreateCrispIntegration.md)|  | |

### Return type

[**\OpenAPI\Client\Model\GetAgentIntegrationCrisp200Response**](../Model/GetAgentIntegrationCrisp200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createAgentIntegrationJivo()`

```php
createAgentIntegrationJivo($agent_id, $create_jivo_integration): \OpenAPI\Client\Model\GetAgentIntegrationJivo200Response
```

Подключение агента к Jivo

Чтобы подключить AI агента к Jivo, отправьте POST-запрос на `/api/v1/cloud-ai/agent/{agent_id}/jivo`, передав Provider ID, выданный поддержкой Jivo.  Подготовка описана в разделе «Интеграции AI агентов»: адрес для событий и токен бота нужно заранее передать в поддержку Jivo.  Если агент не найден, вернется ошибка `404 agent_not_found`.  К одному агенту можно подключить одну интеграцию Jivo. Если она уже есть, вернется ошибка `409 bot_already_exists`.  Тело ответа будет представлять собой объект JSON с ключом `jivo_integration`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIAgentIntegrationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$agent_id = 1; // int | ID агента
$create_jivo_integration = new \OpenAPI\Client\Model\CreateJivoIntegration(); // \OpenAPI\Client\Model\CreateJivoIntegration

try {
    $result = $apiInstance->createAgentIntegrationJivo($agent_id, $create_jivo_integration);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentIntegrationsApi->createAgentIntegrationJivo: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **agent_id** | **int**| ID агента | |
| **create_jivo_integration** | [**\OpenAPI\Client\Model\CreateJivoIntegration**](../Model/CreateJivoIntegration.md)|  | |

### Return type

[**\OpenAPI\Client\Model\GetAgentIntegrationJivo200Response**](../Model/GetAgentIntegrationJivo200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteAgentBotMaxBot()`

```php
deleteAgentBotMaxBot($bot_id)
```

Отключение бота MAX

Чтобы отключить бота MAX от агента, отправьте DELETE-запрос на `/api/v1/cloud-ai/max-bots/{bot_id}`.  Платформа отпишет бота от событий в MAX и удалит подключение. Сам бот в MAX не удаляется — его можно подключить снова.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIAgentIntegrationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$bot_id = 550e8400-e29b-41d4-a716-446655440000; // string | ID бота (поле `id` из ответа)

try {
    $apiInstance->deleteAgentBotMaxBot($bot_id);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentIntegrationsApi->deleteAgentBotMaxBot: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **bot_id** | **string**| ID бота (поле &#x60;id&#x60; из ответа) | |

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

## `deleteAgentBotTelegramBot()`

```php
deleteAgentBotTelegramBot($bot_id)
```

Отключение Telegram-бота

Чтобы отключить Telegram-бота от агента, отправьте DELETE-запрос на `/api/v1/cloud-ai/bots/{bot_id}`.  Платформа снимет вебхук бота в Telegram и удалит подключение. Сам бот в Telegram не удаляется — его можно подключить снова.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIAgentIntegrationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$bot_id = 550e8400-e29b-41d4-a716-446655440000; // string | ID бота (поле `id` из ответа)

try {
    $apiInstance->deleteAgentBotTelegramBot($bot_id);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentIntegrationsApi->deleteAgentBotTelegramBot: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **bot_id** | **string**| ID бота (поле &#x60;id&#x60; из ответа) | |

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

## `deleteAgentIntegrationCrisp()`

```php
deleteAgentIntegrationCrisp($agent_id)
```

Отключение агента от Crisp

Чтобы отключить AI агента от Crisp, отправьте DELETE-запрос на `/api/v1/cloud-ai/agent/{agent_id}/crisp`.  После удаления интеграции агент перестает отвечать в чатах Crisp. Вебхук в настройках Crisp можно удалить вручную.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIAgentIntegrationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$agent_id = 1; // int | ID агента

try {
    $apiInstance->deleteAgentIntegrationCrisp($agent_id);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentIntegrationsApi->deleteAgentIntegrationCrisp: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **agent_id** | **int**| ID агента | |

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

## `deleteAgentIntegrationJivo()`

```php
deleteAgentIntegrationJivo($agent_id)
```

Отключение агента от Jivo

Чтобы отключить AI агента от Jivo, отправьте DELETE-запрос на `/api/v1/cloud-ai/agent/{agent_id}/jivo`.  После удаления интеграции агент перестает отвечать на события Jivo. Настройки бота в самом Jivo не меняются.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIAgentIntegrationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$agent_id = 1; // int | ID агента

try {
    $apiInstance->deleteAgentIntegrationJivo($agent_id);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentIntegrationsApi->deleteAgentIntegrationJivo: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **agent_id** | **int**| ID агента | |

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

## `getAgentBotMaxBot()`

```php
getAgentBotMaxBot($bot_id): \OpenAPI\Client\Model\CreateAgentBotTelegramBot201Response
```

Получение информации о боте MAX

Чтобы получить информацию о боте MAX, отправьте GET-запрос на `/api/v1/cloud-ai/max-bots/{bot_id}`.  Тело ответа будет представлять собой объект JSON с ключом `bot`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIAgentIntegrationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$bot_id = 550e8400-e29b-41d4-a716-446655440000; // string | ID бота (поле `id` из ответа)

try {
    $result = $apiInstance->getAgentBotMaxBot($bot_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentIntegrationsApi->getAgentBotMaxBot: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **bot_id** | **string**| ID бота (поле &#x60;id&#x60; из ответа) | |

### Return type

[**\OpenAPI\Client\Model\CreateAgentBotTelegramBot201Response**](../Model/CreateAgentBotTelegramBot201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAgentBotMaxBots()`

```php
getAgentBotMaxBots(): \OpenAPI\Client\Model\GetAgentBotMaxBots200Response
```

Получение списка ботов MAX

Чтобы получить список ботов MAX, подключенных к агентам аккаунта, отправьте GET-запрос на `/api/v1/cloud-ai/max-bots`.  Тело ответа будет представлять собой объект JSON с ключами `bots` и `meta`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIAgentIntegrationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getAgentBotMaxBots();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentIntegrationsApi->getAgentBotMaxBots: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\GetAgentBotMaxBots200Response**](../Model/GetAgentBotMaxBots200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAgentBotMaxBotsByAgent()`

```php
getAgentBotMaxBotsByAgent($agent_id): \OpenAPI\Client\Model\GetAgentBotMaxBotsByAgent200Response
```

Получение списка ботов MAX агента

Чтобы получить список ботов MAX, подключенных к AI агенту, отправьте GET-запрос на `/api/v1/cloud-ai/agents/{agent_id}/max-bots`.  Тело ответа будет представлять собой объект JSON с ключами `bots` и `meta`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIAgentIntegrationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$agent_id = 1; // int | ID агента

try {
    $result = $apiInstance->getAgentBotMaxBotsByAgent($agent_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentIntegrationsApi->getAgentBotMaxBotsByAgent: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **agent_id** | **int**| ID агента | |

### Return type

[**\OpenAPI\Client\Model\GetAgentBotMaxBotsByAgent200Response**](../Model/GetAgentBotMaxBotsByAgent200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAgentBotTelegramBot()`

```php
getAgentBotTelegramBot($bot_id): \OpenAPI\Client\Model\CreateAgentBotTelegramBot201Response
```

Получение информации о Telegram-боте

Чтобы получить информацию о Telegram-боте, отправьте GET-запрос на `/api/v1/cloud-ai/bots/{bot_id}`.  Тело ответа будет представлять собой объект JSON с ключом `bot`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIAgentIntegrationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$bot_id = 550e8400-e29b-41d4-a716-446655440000; // string | ID бота (поле `id` из ответа)

try {
    $result = $apiInstance->getAgentBotTelegramBot($bot_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentIntegrationsApi->getAgentBotTelegramBot: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **bot_id** | **string**| ID бота (поле &#x60;id&#x60; из ответа) | |

### Return type

[**\OpenAPI\Client\Model\CreateAgentBotTelegramBot201Response**](../Model/CreateAgentBotTelegramBot201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAgentBotTelegramBots()`

```php
getAgentBotTelegramBots(): \OpenAPI\Client\Model\GetAgentBotTelegramBots200Response
```

Получение списка Telegram-ботов

Чтобы получить список Telegram-ботов, подключенных к агентам аккаунта, отправьте GET-запрос на `/api/v1/cloud-ai/bots`.  Тело ответа будет представлять собой объект JSON с ключами `bots` и `meta`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIAgentIntegrationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getAgentBotTelegramBots();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentIntegrationsApi->getAgentBotTelegramBots: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\GetAgentBotTelegramBots200Response**](../Model/GetAgentBotTelegramBots200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAgentBotTelegramBotsByAgent()`

```php
getAgentBotTelegramBotsByAgent($agent_id): \OpenAPI\Client\Model\GetAgentBotTelegramBotsByAgent200Response
```

Получение списка Telegram-ботов агента

Чтобы получить список Telegram-ботов, подключенных к AI агенту, отправьте GET-запрос на `/api/v1/cloud-ai/agents/{agent_id}/bots`.  Тело ответа будет представлять собой объект JSON с ключами `bots` и `meta`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIAgentIntegrationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$agent_id = 1; // int | ID агента

try {
    $result = $apiInstance->getAgentBotTelegramBotsByAgent($agent_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentIntegrationsApi->getAgentBotTelegramBotsByAgent: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **agent_id** | **int**| ID агента | |

### Return type

[**\OpenAPI\Client\Model\GetAgentBotTelegramBotsByAgent200Response**](../Model/GetAgentBotTelegramBotsByAgent200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAgentIntegrationCrisp()`

```php
getAgentIntegrationCrisp($agent_id): \OpenAPI\Client\Model\GetAgentIntegrationCrisp200Response
```

Получение интеграции агента с Crisp

Чтобы получить интеграцию AI агента с Crisp, отправьте GET-запрос на `/api/v1/cloud-ai/agent/{agent_id}/crisp`.  В ответе есть `webhook_secret` — по нему можно восстановить адрес вебхука для Crisp. Если агент не подключен к Crisp, вернется ошибка 404.  Тело ответа будет представлять собой объект JSON с ключом `crisp_integration`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIAgentIntegrationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$agent_id = 1; // int | ID агента

try {
    $result = $apiInstance->getAgentIntegrationCrisp($agent_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentIntegrationsApi->getAgentIntegrationCrisp: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **agent_id** | **int**| ID агента | |

### Return type

[**\OpenAPI\Client\Model\GetAgentIntegrationCrisp200Response**](../Model/GetAgentIntegrationCrisp200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAgentIntegrationJivo()`

```php
getAgentIntegrationJivo($agent_id): \OpenAPI\Client\Model\GetAgentIntegrationJivo200Response
```

Получение интеграции агента с Jivo

Чтобы получить интеграцию AI агента с Jivo, отправьте GET-запрос на `/api/v1/cloud-ai/agent/{agent_id}/jivo`.  Если агент не подключен к Jivo, вернется ошибка 404.  Тело ответа будет представлять собой объект JSON с ключом `jivo_integration`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIAgentIntegrationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$agent_id = 1; // int | ID агента

try {
    $result = $apiInstance->getAgentIntegrationJivo($agent_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentIntegrationsApi->getAgentIntegrationJivo: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **agent_id** | **int**| ID агента | |

### Return type

[**\OpenAPI\Client\Model\GetAgentIntegrationJivo200Response**](../Model/GetAgentIntegrationJivo200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateAgentBotMaxBot()`

```php
updateAgentBotMaxBot($bot_id, $update_max_bot): \OpenAPI\Client\Model\CreateAgentBotTelegramBot201Response
```

Изменение бота MAX

Чтобы изменить бота MAX, отправьте PATCH-запрос на `/api/v1/cloud-ai/max-bots/{bot_id}`, передав только изменяемые поля.  Через `token` можно заменить токен того же бота: платформа проверит новый токен и заново подпишет бота на события. Перенести подключение на другого бота нельзя — для этого удалите бота и подключите новый.  Ошибки: - `400 invalid_max_token` — MAX не принял токен или токен принадлежит другому боту; - `400 max_webhook_error` — не удалось подписать бота на события.  Тело ответа будет представлять собой объект JSON с ключом `bot`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIAgentIntegrationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$bot_id = 550e8400-e29b-41d4-a716-446655440000; // string | ID бота (поле `id` из ответа)
$update_max_bot = new \OpenAPI\Client\Model\UpdateMaxBot(); // \OpenAPI\Client\Model\UpdateMaxBot

try {
    $result = $apiInstance->updateAgentBotMaxBot($bot_id, $update_max_bot);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentIntegrationsApi->updateAgentBotMaxBot: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **bot_id** | **string**| ID бота (поле &#x60;id&#x60; из ответа) | |
| **update_max_bot** | [**\OpenAPI\Client\Model\UpdateMaxBot**](../Model/UpdateMaxBot.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateAgentBotTelegramBot201Response**](../Model/CreateAgentBotTelegramBot201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateAgentBotTelegramBot()`

```php
updateAgentBotTelegramBot($bot_id, $update_bot): \OpenAPI\Client\Model\CreateAgentBotTelegramBot201Response
```

Изменение Telegram-бота

Чтобы изменить Telegram-бота, отправьте PATCH-запрос на `/api/v1/cloud-ai/bots/{bot_id}`, передав только изменяемые поля.  Через `token` можно заменить токен того же бота, например после его перевыпуска в @BotFather: платформа проверит новый токен и переустановит вебхук. Перенести подключение на другого бота нельзя — для этого удалите бота и подключите новый. Агента, к которому подключен бот, этим запросом сменить нельзя.  Ошибки: - `400 invalid_telegram_token` — Telegram не принял токен или токен принадлежит другому боту; - `400 telegram_webhook_error` — не удалось переустановить вебхук.  Тело ответа будет представлять собой объект JSON с ключом `bot`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIAgentIntegrationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$bot_id = 550e8400-e29b-41d4-a716-446655440000; // string | ID бота (поле `id` из ответа)
$update_bot = new \OpenAPI\Client\Model\UpdateBot(); // \OpenAPI\Client\Model\UpdateBot

try {
    $result = $apiInstance->updateAgentBotTelegramBot($bot_id, $update_bot);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentIntegrationsApi->updateAgentBotTelegramBot: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **bot_id** | **string**| ID бота (поле &#x60;id&#x60; из ответа) | |
| **update_bot** | [**\OpenAPI\Client\Model\UpdateBot**](../Model/UpdateBot.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateAgentBotTelegramBot201Response**](../Model/CreateAgentBotTelegramBot201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
