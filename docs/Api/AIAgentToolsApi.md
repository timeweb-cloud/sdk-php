# OpenAPI\Client\AIAgentToolsApi

All URIs are relative to https://api.timeweb.cloud, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**connectAgentToolToAgent()**](AIAgentToolsApi.md#connectAgentToolToAgent) | **POST** /api/v1/cloud-ai/agents/{agent_id}/tools | Подключение MCP-инструмента к агенту |
| [**createAgentTool()**](AIAgentToolsApi.md#createAgentTool) | **POST** /api/v1/cloud-ai/tools | Подключение собственного MCP-сервера |
| [**deleteAgentTool()**](AIAgentToolsApi.md#deleteAgentTool) | **DELETE** /api/v1/cloud-ai/tools/{id} | Удаление MCP-инструмента |
| [**disconnectAgentToolFromAgent()**](AIAgentToolsApi.md#disconnectAgentToolFromAgent) | **DELETE** /api/v1/cloud-ai/agents/{agent_id}/tools/{tool_id} | Отключение MCP-инструмента от агента |
| [**getAgentTool()**](AIAgentToolsApi.md#getAgentTool) | **GET** /api/v1/cloud-ai/tools/{id} | Получение MCP-инструмента |
| [**getAgentToolOAuth2AuthorizeUrl()**](AIAgentToolsApi.md#getAgentToolOAuth2AuthorizeUrl) | **GET** /api/v1/cloud-ai/tools/oauth2/authorize-url/{tool_id} | Получение ссылки на OAuth2-авторизацию инструмента |
| [**getAgentToolTemplatePrices()**](AIAgentToolsApi.md#getAgentToolTemplatePrices) | **GET** /api/v1/cloud-ai/tools/templates/prices | Получение цен системных инструментов |
| [**getAgentToolTemplates()**](AIAgentToolsApi.md#getAgentToolTemplates) | **GET** /api/v1/cloud-ai/tools/templates/marketplace | Получение шаблонов MCP-инструментов из маркетплейса |
| [**getAgentTools()**](AIAgentToolsApi.md#getAgentTools) | **GET** /api/v1/cloud-ai/tools | Получение списка MCP-инструментов |
| [**getAgentToolsByAgent()**](AIAgentToolsApi.md#getAgentToolsByAgent) | **GET** /api/v1/cloud-ai/agents/{agent_id}/tools | Получение MCP-инструментов агента |
| [**installAgentToolFromTemplate()**](AIAgentToolsApi.md#installAgentToolFromTemplate) | **POST** /api/v1/cloud-ai/tools/install | Установка MCP-инструмента из маркетплейса |
| [**refreshAgentToolMethods()**](AIAgentToolsApi.md#refreshAgentToolMethods) | **POST** /api/v1/cloud-ai/tools/{id}/refresh-methods | Обновление списка методов MCP-инструмента |
| [**updateAgentTool()**](AIAgentToolsApi.md#updateAgentTool) | **PUT** /api/v1/cloud-ai/tools/{id} | Изменение MCP-инструмента |
| [**updateAgentToolConnection()**](AIAgentToolsApi.md#updateAgentToolConnection) | **PUT** /api/v1/cloud-ai/agents/{agent_id}/tools/{tool_id} | Изменение разрешённых методов MCP-инструмента у агента |


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


$apiInstance = new OpenAPI\Client\Api\AIAgentToolsApi(
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
    echo 'Exception when calling AIAgentToolsApi->connectAgentToolToAgent: ', $e->getMessage(), PHP_EOL;
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


$apiInstance = new OpenAPI\Client\Api\AIAgentToolsApi(
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
    echo 'Exception when calling AIAgentToolsApi->createAgentTool: ', $e->getMessage(), PHP_EOL;
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


$apiInstance = new OpenAPI\Client\Api\AIAgentToolsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 417; // int | ID инструмента

try {
    $apiInstance->deleteAgentTool($id);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentToolsApi->deleteAgentTool: ', $e->getMessage(), PHP_EOL;
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


$apiInstance = new OpenAPI\Client\Api\AIAgentToolsApi(
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
    echo 'Exception when calling AIAgentToolsApi->disconnectAgentToolFromAgent: ', $e->getMessage(), PHP_EOL;
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


$apiInstance = new OpenAPI\Client\Api\AIAgentToolsApi(
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
    echo 'Exception when calling AIAgentToolsApi->getAgentTool: ', $e->getMessage(), PHP_EOL;
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


$apiInstance = new OpenAPI\Client\Api\AIAgentToolsApi(
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
    echo 'Exception when calling AIAgentToolsApi->getAgentToolOAuth2AuthorizeUrl: ', $e->getMessage(), PHP_EOL;
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


$apiInstance = new OpenAPI\Client\Api\AIAgentToolsApi(
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
    echo 'Exception when calling AIAgentToolsApi->getAgentToolTemplatePrices: ', $e->getMessage(), PHP_EOL;
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


$apiInstance = new OpenAPI\Client\Api\AIAgentToolsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getAgentToolTemplates();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentToolsApi->getAgentToolTemplates: ', $e->getMessage(), PHP_EOL;
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


$apiInstance = new OpenAPI\Client\Api\AIAgentToolsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getAgentTools();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentToolsApi->getAgentTools: ', $e->getMessage(), PHP_EOL;
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


$apiInstance = new OpenAPI\Client\Api\AIAgentToolsApi(
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
    echo 'Exception when calling AIAgentToolsApi->getAgentToolsByAgent: ', $e->getMessage(), PHP_EOL;
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


$apiInstance = new OpenAPI\Client\Api\AIAgentToolsApi(
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
    echo 'Exception when calling AIAgentToolsApi->installAgentToolFromTemplate: ', $e->getMessage(), PHP_EOL;
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


$apiInstance = new OpenAPI\Client\Api\AIAgentToolsApi(
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
    echo 'Exception when calling AIAgentToolsApi->refreshAgentToolMethods: ', $e->getMessage(), PHP_EOL;
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


$apiInstance = new OpenAPI\Client\Api\AIAgentToolsApi(
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
    echo 'Exception when calling AIAgentToolsApi->updateAgentTool: ', $e->getMessage(), PHP_EOL;
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


$apiInstance = new OpenAPI\Client\Api\AIAgentToolsApi(
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
    echo 'Exception when calling AIAgentToolsApi->updateAgentToolConnection: ', $e->getMessage(), PHP_EOL;
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
