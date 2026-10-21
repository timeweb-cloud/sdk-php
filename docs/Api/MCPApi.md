# OpenAPI\Client\MCPApi

All URIs are relative to https://api.timeweb.cloud, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**deleteMcpSearchSession()**](MCPApi.md#deleteMcpSearchSession) | **DELETE** /api/v1/mcp/search | Завершение сессии сервера MCP с поиском инструментов |
| [**deleteMcpSession()**](MCPApi.md#deleteMcpSession) | **DELETE** /api/v1/mcp | Завершение сессии сервера MCP |
| [**openMcpSearchStream()**](MCPApi.md#openMcpSearchStream) | **GET** /api/v1/mcp/search | Открытие потока событий сервера MCP с поиском инструментов |
| [**openMcpStream()**](MCPApi.md#openMcpStream) | **GET** /api/v1/mcp | Открытие потока событий сервера MCP |
| [**sendMcpMessage()**](MCPApi.md#sendMcpMessage) | **POST** /api/v1/mcp | Отправка JSON-RPC-сообщения серверу MCP |
| [**sendMcpSearchMessage()**](MCPApi.md#sendMcpSearchMessage) | **POST** /api/v1/mcp/search | Отправка JSON-RPC-сообщения серверу MCP с поиском инструментов |


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
