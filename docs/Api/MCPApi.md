# OpenAPI\Client\MCPApi

All URIs are relative to https://api.timeweb.cloud, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**connectAgentToolToAgent()**](MCPApi.md#connectAgentToolToAgent) | **POST** /api/v1/cloud-ai/agents/{agent_id}/tools | Подключение MCP-инструмента к агенту |
| [**createAgentTool()**](MCPApi.md#createAgentTool) | **POST** /api/v1/cloud-ai/tools | Подключение собственного MCP-сервера |
| [**deleteAgentTool()**](MCPApi.md#deleteAgentTool) | **DELETE** /api/v1/cloud-ai/tools/{id} | Удаление MCP-инструмента |
| [**deleteMcpSearchSession()**](MCPApi.md#deleteMcpSearchSession) | **DELETE** /api/v1/mcp/search | Завершение сессии сервера MCP с поиском инструментов |
| [**deleteMcpSession()**](MCPApi.md#deleteMcpSession) | **DELETE** /api/v1/mcp | Завершение сессии сервера MCP |
| [**disconnectAgentToolFromAgent()**](MCPApi.md#disconnectAgentToolFromAgent) | **DELETE** /api/v1/cloud-ai/agents/{agent_id}/tools/{tool_id} | Отключение MCP-инструмента от агента |
| [**getAgentTool()**](MCPApi.md#getAgentTool) | **GET** /api/v1/cloud-ai/tools/{id} | Получение MCP-инструмента |
| [**getAgentToolOAuth2AuthorizeUrl()**](MCPApi.md#getAgentToolOAuth2AuthorizeUrl) | **GET** /api/v1/cloud-ai/tools/oauth2/authorize-url/{tool_id} | Получение ссылки на OAuth2-авторизацию инструмента |
| [**getAgentToolTemplatePrices()**](MCPApi.md#getAgentToolTemplatePrices) | **GET** /api/v1/cloud-ai/tools/templates/prices | Получение цен системных инструментов |
| [**getAgentToolTemplates()**](MCPApi.md#getAgentToolTemplates) | **GET** /api/v1/cloud-ai/tools/templates/marketplace | Получение шаблонов MCP-инструментов из маркетплейса |
| [**getAgentTools()**](MCPApi.md#getAgentTools) | **GET** /api/v1/cloud-ai/tools | Получение списка MCP-инструментов |
| [**getAgentToolsByAgent()**](MCPApi.md#getAgentToolsByAgent) | **GET** /api/v1/cloud-ai/agents/{agent_id}/tools | Получение MCP-инструментов агента |
| [**installAgentToolFromTemplate()**](MCPApi.md#installAgentToolFromTemplate) | **POST** /api/v1/cloud-ai/tools/install | Установка MCP-инструмента из маркетплейса |
| [**openMcpSearchStream()**](MCPApi.md#openMcpSearchStream) | **GET** /api/v1/mcp/search | Открытие потока событий сервера MCP с поиском инструментов |
| [**openMcpStream()**](MCPApi.md#openMcpStream) | **GET** /api/v1/mcp | Открытие потока событий сервера MCP |
| [**refreshAgentToolMethods()**](MCPApi.md#refreshAgentToolMethods) | **POST** /api/v1/cloud-ai/tools/{id}/refresh-methods | Обновление списка методов MCP-инструмента |
| [**sendMcpMessage()**](MCPApi.md#sendMcpMessage) | **POST** /api/v1/mcp | Отправка JSON-RPC-сообщения серверу MCP |
| [**sendMcpSearchMessage()**](MCPApi.md#sendMcpSearchMessage) | **POST** /api/v1/mcp/search | Отправка JSON-RPC-сообщения серверу MCP с поиском инструментов |
| [**updateAgentTool()**](MCPApi.md#updateAgentTool) | **PUT** /api/v1/cloud-ai/tools/{id} | Изменение MCP-инструмента |
| [**updateAgentToolConnection()**](MCPApi.md#updateAgentToolConnection) | **PUT** /api/v1/cloud-ai/agents/{agent_id}/tools/{tool_id} | Изменение разрешённых методов MCP-инструмента у агента |


## `connectAgentToolToAgent()`

```php
connectAgentToolToAgent($agent_id, $connect_agent_tool)
```

Подключение MCP-инструмента к агенту

Чтобы подключить MCP-инструмент к агенту, отправьте POST-запрос на `/api/v1/cloud-ai/agents/{agent_id}/tools`.  В `allowed_methods` перечислите методы, которые агенту разрешено вызывать. Подходят только имена из `methods[].name` инструмента, иначе вернётся 400 с `error_code` `invalid_methods_provided`. Повторно подключить уже подключённый инструмент нельзя. Чтобы изменить список методов, используйте PUT-запрос.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\MCPApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$agent_id = 113191; // int | ID агента
$connect_agent_tool = new \OpenAPI\Client\Model\ConnectAgentTool(); // \OpenAPI\Client\Model\ConnectAgentTool

try {
    $apiInstance->connectAgentToolToAgent($agent_id, $connect_agent_tool);
} catch (Exception $e) {
    echo 'Exception when calling MCPApi->connectAgentToolToAgent: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **agent_id** | **int**| ID агента | |
| **connect_agent_tool** | [**\OpenAPI\Client\Model\ConnectAgentTool**](../Model/ConnectAgentTool.md)|  | |

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

## `createAgentTool()`

```php
createAgentTool($create_tool): \OpenAPI\Client\Model\CreateAgentTool201Response
```

Подключение собственного MCP-сервера

Чтобы подключить собственный MCP-сервер, отправьте POST-запрос на `/api/v1/cloud-ai/tools`.  Платформа сразу подключается к серверу и сохраняет список его методов. Если сервер недоступен или отвечает ошибкой, инструмент не создаётся: вернётся 400 с `error_code` `invalid_methods_provided`. Адреса частных сетей и localhost отклоняются с ошибкой 400.  Для `auth_data.type = oauth2` подключение к серверу при создании не проверяется. Инструмент создаётся в статусе `pending_auth` с пустым списком методов, а методы загружаются после авторизации пользователя: см. «Получение ссылки на OAuth2-авторизацию инструмента». Если не удалось определить адреса авторизации или зарегистрировать клиента, вернётся 401 с `error_code` `tool_authentication_failed`.  Чтобы агент мог пользоваться инструментом, подключите его к агенту.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\MCPApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_tool = new \OpenAPI\Client\Model\CreateTool(); // \OpenAPI\Client\Model\CreateTool

try {
    $result = $apiInstance->createAgentTool($create_tool);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MCPApi->createAgentTool: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_tool** | [**\OpenAPI\Client\Model\CreateTool**](../Model/CreateTool.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateAgentTool201Response**](../Model/CreateAgentTool201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteAgentTool()`

```php
deleteAgentTool($id)
```

Удаление MCP-инструмента

Чтобы удалить MCP-инструмент, отправьте DELETE-запрос на `/api/v1/cloud-ai/tools/{id}`.  Инструмент автоматически отключается от всех агентов.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\MCPApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 417; // int | ID инструмента

try {
    $apiInstance->deleteAgentTool($id);
} catch (Exception $e) {
    echo 'Exception when calling MCPApi->deleteAgentTool: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| ID инструмента | |

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

## `deleteMcpSearchSession()`

```php
deleteMcpSearchSession()
```
### URI(s):
- https://api.timeweb.cloud 
Завершение сессии сервера MCP с поиском инструментов

Чтобы завершить сессию сервера MCP `timeweb-cloud-mcp-search`, отправьте DELETE-запрос на `/api/v1/mcp/search`.  Сервер не хранит сессий (не выдаёт `Mcp-Session-Id`), поэтому завершать нечего: ответ всегда 200 без тела.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\MCPApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$hostIndex = 0;
$variables = [
];

try {
    $apiInstance->deleteMcpSearchSession($hostIndex, $variables);
} catch (Exception $e) {
    echo 'Exception when calling MCPApi->deleteMcpSearchSession: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

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

## `deleteMcpSession()`

```php
deleteMcpSession()
```
### URI(s):
- https://api.timeweb.cloud 
Завершение сессии сервера MCP

Чтобы завершить сессию сервера MCP `timeweb-cloud-mcp`, отправьте DELETE-запрос на `/api/v1/mcp`.  Сервер не хранит сессий (не выдаёт `Mcp-Session-Id`), поэтому завершать нечего: ответ всегда 200 без тела.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\MCPApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$hostIndex = 0;
$variables = [
];

try {
    $apiInstance->deleteMcpSession($hostIndex, $variables);
} catch (Exception $e) {
    echo 'Exception when calling MCPApi->deleteMcpSession: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

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

## `disconnectAgentToolFromAgent()`

```php
disconnectAgentToolFromAgent($agent_id, $tool_id)
```

Отключение MCP-инструмента от агента

Чтобы отключить MCP-инструмент от агента, отправьте DELETE-запрос на `/api/v1/cloud-ai/agents/{agent_id}/tools/{tool_id}`.  Сам инструмент остаётся в аккаунте и у других агентов.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\MCPApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$agent_id = 113191; // int | ID агента
$tool_id = 417; // int | ID инструмента

try {
    $apiInstance->disconnectAgentToolFromAgent($agent_id, $tool_id);
} catch (Exception $e) {
    echo 'Exception when calling MCPApi->disconnectAgentToolFromAgent: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **agent_id** | **int**| ID агента | |
| **tool_id** | **int**| ID инструмента | |

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

## `getAgentTool()`

```php
getAgentTool($id): \OpenAPI\Client\Model\CreateAgentTool201Response
```

Получение MCP-инструмента

Чтобы получить MCP-инструмент, отправьте GET-запрос на `/api/v1/cloud-ai/tools/{id}`.  По полю `status` можно отследить завершение OAuth2-авторизации: после неё статус меняется с `pending_auth` на `active`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\MCPApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 417; // int | ID инструмента

try {
    $result = $apiInstance->getAgentTool($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MCPApi->getAgentTool: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| ID инструмента | |

### Return type

[**\OpenAPI\Client\Model\CreateAgentTool201Response**](../Model/CreateAgentTool201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAgentToolOAuth2AuthorizeUrl()`

```php
getAgentToolOAuth2AuthorizeUrl($tool_id, $redirect_url): \OpenAPI\Client\Model\AuthorizeUrl
```

Получение ссылки на OAuth2-авторизацию инструмента

Чтобы получить ссылку на OAuth2-авторизацию MCP-инструмента, отправьте GET-запрос на `/api/v1/cloud-ai/tools/oauth2/authorize-url/{tool_id}`.  Откройте `authorize_url` в браузере пользователя. Ссылка действует 30 минут. После входа и согласия провайдер вернёт пользователя на адрес возврата платформы `https://api.timeweb.cloud/api/v1/cloud-ai/oauth2/callback`. Платформа обменяет код на токены, переведёт инструмент в статус `active` и загрузит список методов.  Чтобы узнать результат, запрашивайте инструмент, пока его статус не сменится с `pending_auth` на `active`. Этим же запросом можно повторно авторизовать уже активный инструмент.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\MCPApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$tool_id = 417; // int | ID инструмента
$redirect_url = https://timeweb.cloud/my/cloud-ai; // string | Куда вернуть пользователя после авторизации. Принимаются только адреса на доменах `timeweb.cloud` и `timeweb.net` и их поддоменах; другие адреса молча игнорируются. После успешной авторизации к адресу добавляются `oauth_success=true&tool_id=<id>`, после ошибки — `oauth_error=<текст>&tool_id=<id>`. Без параметра страница возврата показывает результат в виде JSON.

try {
    $result = $apiInstance->getAgentToolOAuth2AuthorizeUrl($tool_id, $redirect_url);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MCPApi->getAgentToolOAuth2AuthorizeUrl: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **tool_id** | **int**| ID инструмента | |
| **redirect_url** | **string**| Куда вернуть пользователя после авторизации. Принимаются только адреса на доменах &#x60;timeweb.cloud&#x60; и &#x60;timeweb.net&#x60; и их поддоменах; другие адреса молча игнорируются. После успешной авторизации к адресу добавляются &#x60;oauth_success&#x3D;true&amp;tool_id&#x3D;&lt;id&gt;&#x60;, после ошибки — &#x60;oauth_error&#x3D;&lt;текст&gt;&amp;tool_id&#x3D;&lt;id&gt;&#x60;. Без параметра страница возврата показывает результат в виде JSON. | [optional] |

### Return type

[**\OpenAPI\Client\Model\AuthorizeUrl**](../Model/AuthorizeUrl.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAgentToolTemplatePrices()`

```php
getAgentToolTemplatePrices($locale): \OpenAPI\Client\Model\GetAgentToolTemplatePrices200Response
```

Получение цен системных инструментов

Чтобы получить цены системных инструментов платформы, например веб-поиска, отправьте GET-запрос на `/api/v1/cloud-ai/tools/templates/prices`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\MCPApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$locale = ru; // string | Валюта цены: `ru` — в рублях, `en` — в долларах США. По умолчанию `ru`.

try {
    $result = $apiInstance->getAgentToolTemplatePrices($locale);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MCPApi->getAgentToolTemplatePrices: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **locale** | **string**| Валюта цены: &#x60;ru&#x60; — в рублях, &#x60;en&#x60; — в долларах США. По умолчанию &#x60;ru&#x60;. | [optional] [default to &#39;ru&#39;] |

### Return type

[**\OpenAPI\Client\Model\GetAgentToolTemplatePrices200Response**](../Model/GetAgentToolTemplatePrices200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAgentToolTemplates()`

```php
getAgentToolTemplates(): \OpenAPI\Client\Model\GetAgentToolTemplates200Response
```

Получение шаблонов MCP-инструментов из маркетплейса

Чтобы получить готовые интеграции маркетплейса, отправьте GET-запрос на `/api/v1/cloud-ai/tools/templates/marketplace`.  Сначала идут самые популярные шаблоны. Поле `config_schema` описывает, что нужно передать в `config_values` при установке.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\MCPApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getAgentToolTemplates();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MCPApi->getAgentToolTemplates: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\GetAgentToolTemplates200Response**](../Model/GetAgentToolTemplates200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAgentTools()`

```php
getAgentTools(): \OpenAPI\Client\Model\GetAgentTools200Response
```

Получение списка MCP-инструментов

Чтобы получить список MCP-инструментов аккаунта, отправьте GET-запрос на `/api/v1/cloud-ai/tools`.  В списке есть и собственные MCP-серверы, и инструменты, установленные из маркетплейса. Сначала идут новые. Удалённые инструменты не возвращаются. Секреты в `auth_data` заменены на `********`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\MCPApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getAgentTools();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MCPApi->getAgentTools: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\GetAgentTools200Response**](../Model/GetAgentTools200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAgentToolsByAgent()`

```php
getAgentToolsByAgent($agent_id): \OpenAPI\Client\Model\GetAgentToolsByAgent200Response
```

Получение MCP-инструментов агента

Чтобы получить MCP-инструменты, подключённые к агенту, отправьте GET-запрос на `/api/v1/cloud-ai/agents/{agent_id}/tools`.  В ответе — инструменты целиком, в том же виде, что и в списке инструментов аккаунта. Списка разрешённых агенту методов в ответе нет.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\MCPApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$agent_id = 113191; // int | ID агента

try {
    $result = $apiInstance->getAgentToolsByAgent($agent_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MCPApi->getAgentToolsByAgent: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **agent_id** | **int**| ID агента | |

### Return type

[**\OpenAPI\Client\Model\GetAgentToolsByAgent200Response**](../Model/GetAgentToolsByAgent200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `installAgentToolFromTemplate()`

```php
installAgentToolFromTemplate($install_tool): \OpenAPI\Client\Model\CreateAgentTool201Response
```

Установка MCP-инструмента из маркетплейса

Чтобы установить MCP-инструмент из шаблона маркетплейса, отправьте POST-запрос на `/api/v1/cloud-ai/tools/install`.  Значения полей из `config_schema` шаблона передайте в `config_values`. Платформа соберёт из них заголовки авторизации, подключится к MCP-серверу и сохранит список методов. Если у шаблона есть `config_schema`, поле `auth_data` не используется. Если подключиться к серверу не удалось, вернётся 400 с `error_code` `invalid_methods_provided`.  Один шаблон можно установить несколько раз, например с разными ключами.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\MCPApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$install_tool = new \OpenAPI\Client\Model\InstallTool(); // \OpenAPI\Client\Model\InstallTool

try {
    $result = $apiInstance->installAgentToolFromTemplate($install_tool);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MCPApi->installAgentToolFromTemplate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **install_tool** | [**\OpenAPI\Client\Model\InstallTool**](../Model/InstallTool.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateAgentTool201Response**](../Model/CreateAgentTool201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `openMcpSearchStream()`

```php
openMcpSearchStream($accept, $mcp_protocol_version): string
```
### URI(s):
- https://api.timeweb.cloud 
Открытие потока событий сервера MCP с поиском инструментов

Чтобы открыть поток сообщений, которые сервер MCP `timeweb-cloud-mcp-search` отправляет по своей инициативе, отправьте GET-запрос на `/api/v1/mcp/search`.  Сервер не отправляет сообщений по своей инициативе, поэтому поток не содержит событий и остаётся открытым, пока его не закроет шлюз. Через шлюз заголовки ответа на этот запрос могут долго не приходить. Открывать поток не нужно: работайте с сервером только POST-запросами — если клиент позволяет выбрать режим, отключите в нём GET-поток.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\MCPApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$accept = text/event-stream; // string | Должен содержать `text/event-stream`, иначе сервер ответит 406
$mcp_protocol_version = 2025-06-18; // string | Версия протокола, согласованная в `initialize`. Неподдерживаемое значение — ответ 400

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->openMcpSearchStream($accept, $mcp_protocol_version, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MCPApi->openMcpSearchStream: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **accept** | **string**| Должен содержать &#x60;text/event-stream&#x60;, иначе сервер ответит 406 | |
| **mcp_protocol_version** | **string**| Версия протокола, согласованная в &#x60;initialize&#x60;. Неподдерживаемое значение — ответ 400 | [optional] |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

**string**

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `text/event-stream`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `openMcpStream()`

```php
openMcpStream($accept, $mcp_protocol_version): string
```
### URI(s):
- https://api.timeweb.cloud 
Открытие потока событий сервера MCP

Чтобы открыть поток сообщений, которые сервер MCP `timeweb-cloud-mcp` отправляет по своей инициативе, отправьте GET-запрос на `/api/v1/mcp`.  Сервер не отправляет сообщений по своей инициативе, поэтому поток не содержит событий и остаётся открытым, пока его не закроет шлюз. Через шлюз заголовки ответа на этот запрос могут долго не приходить. Открывать поток не нужно: работайте с сервером только POST-запросами — если клиент позволяет выбрать режим, отключите в нём GET-поток.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\MCPApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$accept = text/event-stream; // string | Должен содержать `text/event-stream`, иначе сервер ответит 406
$mcp_protocol_version = 2025-06-18; // string | Версия протокола, согласованная в `initialize`. Неподдерживаемое значение — ответ 400

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->openMcpStream($accept, $mcp_protocol_version, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MCPApi->openMcpStream: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **accept** | **string**| Должен содержать &#x60;text/event-stream&#x60;, иначе сервер ответит 406 | |
| **mcp_protocol_version** | **string**| Версия протокола, согласованная в &#x60;initialize&#x60;. Неподдерживаемое значение — ответ 400 | [optional] |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

**string**

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `text/event-stream`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `refreshAgentToolMethods()`

```php
refreshAgentToolMethods($id): \OpenAPI\Client\Model\CreateAgentTool201Response
```

Обновление списка методов MCP-инструмента

Чтобы заново получить список методов с MCP-сервера, отправьте POST-запрос на `/api/v1/cloud-ai/tools/{id}/refresh-methods`.  Список `methods` заменяется полученным с сервера, а методы, которых больше нет, убираются из разрешённых у всех агентов. Если обновление прошло успешно, инструмент переходит в статус `active`. Если сервер недоступен, инструмент переходит в статус `error` с причиной в `status_info`, а запрос возвращает 400 с `error_code` `invalid_methods_provided`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\MCPApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 417; // int | ID инструмента

try {
    $result = $apiInstance->refreshAgentToolMethods($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MCPApi->refreshAgentToolMethods: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| ID инструмента | |

### Return type

[**\OpenAPI\Client\Model\CreateAgentTool201Response**](../Model/CreateAgentTool201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `sendMcpMessage()`

```php
sendMcpMessage($accept, $json_rpc_request, $mcp_protocol_version, $x_mcp_confirmation_ui): \OpenAPI\Client\Model\JsonRpcResultResponse
```
### URI(s):
- https://api.timeweb.cloud 
Отправка JSON-RPC-сообщения серверу MCP

Чтобы отправить запрос или уведомление серверу MCP `timeweb-cloud-mcp`, отправьте POST-запрос на `/api/v1/mcp` с сообщением JSON-RPC 2.0 в теле.  Через этот метод идут все запросы MCP: `initialize`, `tools/list` (все инструменты сразу), `tools/call`, `resources/list`, `resources/read`, `ping`. Ответ на запрос приходит потоком `text/event-stream` с одним событием `message`, уведомление принимается с кодом 202 без тела. Изменяющие инструменты выполняются в два вызова с `confirm_token` — см. описание раздела.  Заголовки `x-tool-access` и `x-allowed-tools` здесь не действуют — используйте `/api/v1/mcp/search`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\MCPApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$accept = application/json, text/event-stream; // string | Должен содержать и `application/json`, и `text/event-stream`, иначе сервер ответит 406
$json_rpc_request = {"jsonrpc":"2.0","id":1,"method":"initialize","params":{"protocolVersion":"2025-06-18","capabilities":{},"clientInfo":{"name":"my-agent","version":"1.0.0"}}}; // \OpenAPI\Client\Model\JsonRpcRequest
$mcp_protocol_version = 2025-06-18; // string | Версия протокола, согласованная в `initialize`. Неподдерживаемое значение — ответ 400
$x_mcp_confirmation_ui = text; // string | Как `request_user_confirmation` спрашивает пользователя. `text` (по умолчанию) — пользователь отвечает в чате, на `/api/v1/mcp` инструмент в этом режиме не выводится. `buttons` — инструмент возвращает `ui_action` с кнопками для клиентов, которые умеют их показывать. Регистр не важен, другие значения игнорируются

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->sendMcpMessage($accept, $json_rpc_request, $mcp_protocol_version, $x_mcp_confirmation_ui, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MCPApi->sendMcpMessage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **accept** | **string**| Должен содержать и &#x60;application/json&#x60;, и &#x60;text/event-stream&#x60;, иначе сервер ответит 406 | |
| **json_rpc_request** | [**\OpenAPI\Client\Model\JsonRpcRequest**](../Model/JsonRpcRequest.md)|  | |
| **mcp_protocol_version** | **string**| Версия протокола, согласованная в &#x60;initialize&#x60;. Неподдерживаемое значение — ответ 400 | [optional] |
| **x_mcp_confirmation_ui** | **string**| Как &#x60;request_user_confirmation&#x60; спрашивает пользователя. &#x60;text&#x60; (по умолчанию) — пользователь отвечает в чате, на &#x60;/api/v1/mcp&#x60; инструмент в этом режиме не выводится. &#x60;buttons&#x60; — инструмент возвращает &#x60;ui_action&#x60; с кнопками для клиентов, которые умеют их показывать. Регистр не важен, другие значения игнорируются | [optional] |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

[**\OpenAPI\Client\Model\JsonRpcResultResponse**](../Model/JsonRpcResultResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `text/event-stream`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `sendMcpSearchMessage()`

```php
sendMcpSearchMessage($accept, $json_rpc_request, $mcp_protocol_version, $x_tool_access, $x_allowed_tools, $x_mcp_confirmation_ui): \OpenAPI\Client\Model\JsonRpcResultResponse
```
### URI(s):
- https://api.timeweb.cloud 
Отправка JSON-RPC-сообщения серверу MCP с поиском инструментов

Чтобы отправить запрос или уведомление серверу MCP `timeweb-cloud-mcp-search`, отправьте POST-запрос на `/api/v1/mcp/search` с сообщением JSON-RPC 2.0 в теле.  `tools/list` возвращает четыре инструмента: `search_tools`, `get_tool_definition`, `execute_tool` и `request_user_confirmation`. Все операции облака находятся через `search_tools` и выполняются через `execute_tool`; изменяющие операции — в два вызова `execute_tool` с `confirm_token` внутри `arguments`.  Доступ модели можно сузить заголовками `x-tool-access` и `x-allowed-tools`. Недопустимое значение `x-tool-access` — ответ 400 с ошибкой `-32600`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\MCPApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$accept = application/json, text/event-stream; // string | Должен содержать и `application/json`, и `text/event-stream`, иначе сервер ответит 406
$json_rpc_request = {"jsonrpc":"2.0","id":1,"method":"initialize","params":{"protocolVersion":"2025-06-18","capabilities":{},"clientInfo":{"name":"my-agent","version":"1.0.0"}}}; // \OpenAPI\Client\Model\JsonRpcRequest
$mcp_protocol_version = 2025-06-18; // string | Версия протокола, согласованная в `initialize`. Неподдерживаемое значение — ответ 400
$x_tool_access = read-only; // string | Только операции чтения: поиск и определения пропускают изменяющие инструменты, а `execute_tool` отказывает с `tool_not_allowed`. Единственное допустимое значение — `read-only` (регистр не важен); любое другое, в том числе пустое, — ответ 400 с ошибкой `-32600`
$x_allowed_tools = list_servers,get_server,server_action; // string | Имена разрешённых операций через запятую — все остальные недоступны. Неизвестные имена игнорируются, пустое значение не разрешает ничего. Вместе с `x-tool-access` операция должна пройти оба ограничения
$x_mcp_confirmation_ui = text; // string | Как `request_user_confirmation` спрашивает пользователя. `text` (по умолчанию) — пользователь отвечает в чате, на `/api/v1/mcp` инструмент в этом режиме не выводится. `buttons` — инструмент возвращает `ui_action` с кнопками для клиентов, которые умеют их показывать. Регистр не важен, другие значения игнорируются

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->sendMcpSearchMessage($accept, $json_rpc_request, $mcp_protocol_version, $x_tool_access, $x_allowed_tools, $x_mcp_confirmation_ui, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MCPApi->sendMcpSearchMessage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **accept** | **string**| Должен содержать и &#x60;application/json&#x60;, и &#x60;text/event-stream&#x60;, иначе сервер ответит 406 | |
| **json_rpc_request** | [**\OpenAPI\Client\Model\JsonRpcRequest**](../Model/JsonRpcRequest.md)|  | |
| **mcp_protocol_version** | **string**| Версия протокола, согласованная в &#x60;initialize&#x60;. Неподдерживаемое значение — ответ 400 | [optional] |
| **x_tool_access** | **string**| Только операции чтения: поиск и определения пропускают изменяющие инструменты, а &#x60;execute_tool&#x60; отказывает с &#x60;tool_not_allowed&#x60;. Единственное допустимое значение — &#x60;read-only&#x60; (регистр не важен); любое другое, в том числе пустое, — ответ 400 с ошибкой &#x60;-32600&#x60; | [optional] |
| **x_allowed_tools** | **string**| Имена разрешённых операций через запятую — все остальные недоступны. Неизвестные имена игнорируются, пустое значение не разрешает ничего. Вместе с &#x60;x-tool-access&#x60; операция должна пройти оба ограничения | [optional] |
| **x_mcp_confirmation_ui** | **string**| Как &#x60;request_user_confirmation&#x60; спрашивает пользователя. &#x60;text&#x60; (по умолчанию) — пользователь отвечает в чате, на &#x60;/api/v1/mcp&#x60; инструмент в этом режиме не выводится. &#x60;buttons&#x60; — инструмент возвращает &#x60;ui_action&#x60; с кнопками для клиентов, которые умеют их показывать. Регистр не важен, другие значения игнорируются | [optional] |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

[**\OpenAPI\Client\Model\JsonRpcResultResponse**](../Model/JsonRpcResultResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `text/event-stream`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateAgentTool()`

```php
updateAgentTool($id, $update_tool): \OpenAPI\Client\Model\CreateAgentTool201Response
```

Изменение MCP-инструмента

Чтобы изменить MCP-инструмент, отправьте PUT-запрос на `/api/v1/cloud-ai/tools/{id}`, передав только изменяемые поля.  Если передать в `auth_data` секрет `********` из ответа API, сохранённый секрет не изменится. Изменение адреса или авторизации не обновляет список методов: после него вызовите обновление методов. Статус `inactive` выключает инструмент у всех агентов, к которым он подключён.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\MCPApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 417; // int | ID инструмента
$update_tool = new \OpenAPI\Client\Model\UpdateTool(); // \OpenAPI\Client\Model\UpdateTool

try {
    $result = $apiInstance->updateAgentTool($id, $update_tool);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MCPApi->updateAgentTool: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| ID инструмента | |
| **update_tool** | [**\OpenAPI\Client\Model\UpdateTool**](../Model/UpdateTool.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateAgentTool201Response**](../Model/CreateAgentTool201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateAgentToolConnection()`

```php
updateAgentToolConnection($agent_id, $tool_id, $update_agent_tool)
```

Изменение разрешённых методов MCP-инструмента у агента

Чтобы изменить список методов, которые агенту разрешено вызывать, отправьте PUT-запрос на `/api/v1/cloud-ai/agents/{agent_id}/tools/{tool_id}`.  Список заменяется целиком. Подходят только имена из `methods[].name` инструмента, иначе вернётся 400 с `error_code` `invalid_methods_provided`. Если инструмент не подключён к агенту, вернётся 404 с `error_code` `agent-tool_link_not_found`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\MCPApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$agent_id = 113191; // int | ID агента
$tool_id = 417; // int | ID инструмента
$update_agent_tool = new \OpenAPI\Client\Model\UpdateAgentTool(); // \OpenAPI\Client\Model\UpdateAgentTool

try {
    $apiInstance->updateAgentToolConnection($agent_id, $tool_id, $update_agent_tool);
} catch (Exception $e) {
    echo 'Exception when calling MCPApi->updateAgentToolConnection: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **agent_id** | **int**| ID агента | |
| **tool_id** | **int**| ID инструмента | |
| **update_agent_tool** | [**\OpenAPI\Client\Model\UpdateAgentTool**](../Model/UpdateAgentTool.md)|  | |

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
