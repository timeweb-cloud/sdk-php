# OpenAPI\Client\AIAgentSkillsApi

All URIs are relative to https://api.timeweb.cloud, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**applyAgentSkillCatalogUpdate()**](AIAgentSkillsApi.md#applyAgentSkillCatalogUpdate) | **POST** /api/v1/cloud-ai/skills/{skill_id}/apply-catalog-update | Применение обновления навыка из каталога |
| [**connectAgentSkillsToAgent()**](AIAgentSkillsApi.md#connectAgentSkillsToAgent) | **POST** /api/v1/cloud-ai/agents/{agent_id}/skills/connect | Подключение нескольких навыков к агенту |
| [**createAgentSkill()**](AIAgentSkillsApi.md#createAgentSkill) | **POST** /api/v1/cloud-ai/skills | Создание навыка |
| [**deleteAgentSkill()**](AIAgentSkillsApi.md#deleteAgentSkill) | **DELETE** /api/v1/cloud-ai/skills/{skill_id} | Удаление навыка |
| [**disconnectAgentSkillFromAgent()**](AIAgentSkillsApi.md#disconnectAgentSkillFromAgent) | **DELETE** /api/v1/cloud-ai/agents/{agent_id}/skills/{skill_id} | Отключение навыка от агента |
| [**duplicateAgentSkill()**](AIAgentSkillsApi.md#duplicateAgentSkill) | **POST** /api/v1/cloud-ai/skills/{skill_id}/duplicate | Копирование навыка |
| [**getAgentSkill()**](AIAgentSkillsApi.md#getAgentSkill) | **GET** /api/v1/cloud-ai/skills/{skill_id} | Получение навыка |
| [**getAgentSkillCatalog()**](AIAgentSkillsApi.md#getAgentSkillCatalog) | **GET** /api/v1/cloud-ai/skill-catalog | Получение каталога навыков |
| [**getAgentSkillLibrary()**](AIAgentSkillsApi.md#getAgentSkillLibrary) | **GET** /api/v1/cloud-ai/skills | Получение списка навыков |
| [**getAgentSkillVersion()**](AIAgentSkillsApi.md#getAgentSkillVersion) | **GET** /api/v1/cloud-ai/skills/{skill_id}/versions/{version} | Получение версии навыка |
| [**getAgentSkillVersions()**](AIAgentSkillsApi.md#getAgentSkillVersions) | **GET** /api/v1/cloud-ai/skills/{skill_id}/versions | Получение истории версий навыка |
| [**getAgentSkillsForAgent()**](AIAgentSkillsApi.md#getAgentSkillsForAgent) | **GET** /api/v1/cloud-ai/agents/{agent_id}/skills | Получение навыков агента |
| [**installAgentSkillFromCatalog()**](AIAgentSkillsApi.md#installAgentSkillFromCatalog) | **POST** /api/v1/cloud-ai/skill-catalog/{catalog_item_id}/install | Установка навыка из каталога |
| [**installAndConnectAgentSkill()**](AIAgentSkillsApi.md#installAndConnectAgentSkill) | **POST** /api/v1/cloud-ai/agents/{agent_id}/skills/install-and-connect | Установка навыка из каталога и включение у агента |
| [**rollbackAgentSkillVersion()**](AIAgentSkillsApi.md#rollbackAgentSkillVersion) | **POST** /api/v1/cloud-ai/skills/{skill_id}/versions/{version}/rollback | Переключение навыка на версию из истории |
| [**setAgentSkillForAgent()**](AIAgentSkillsApi.md#setAgentSkillForAgent) | **PUT** /api/v1/cloud-ai/agents/{agent_id}/skills/{skill_id} | Включение и выключение навыка у агента |
| [**syncAgentSkillAgentsVersions()**](AIAgentSkillsApi.md#syncAgentSkillAgentsVersions) | **POST** /api/v1/cloud-ai/skills/{skill_id}/agents/sync-versions | Перевод всех агентов навыка на текущую версию |
| [**syncAgentSkillVersionsForAgent()**](AIAgentSkillsApi.md#syncAgentSkillVersionsForAgent) | **POST** /api/v1/cloud-ai/agents/{agent_id}/skills/sync-versions | Перевод всех навыков агента на текущие версии |
| [**updateAgentSkill()**](AIAgentSkillsApi.md#updateAgentSkill) | **PATCH** /api/v1/cloud-ai/skills/{skill_id} | Изменение навыка |
| [**updateAgentSkillVersionForAgent()**](AIAgentSkillsApi.md#updateAgentSkillVersionForAgent) | **POST** /api/v1/cloud-ai/agents/{agent_id}/skills/{skill_id}/update-version | Перевод агента на текущую версию навыка |


## `applyAgentSkillCatalogUpdate()`

```php
applyAgentSkillCatalogUpdate($skill_id): \OpenAPI\Client\Model\CreateAgentSkill201Response
```

Применение обновления навыка из каталога

Чтобы применить к установленному навыку новую версию из каталога, отправьте POST-запрос на `/api/v1/cloud-ai/skills/{skill_id}/apply-catalog-update`.  Текст «когда применять» и инструкция заменяются каталожными, при этом создаётся новая версия: прежний текст, в том числе ваши правки, остаётся в истории. Название навыка не меняется. Если обновления нет, ничего не меняется (`meta.version_created` — `false`).  Для навыка, установленного не из каталога, вернётся 409 с `error_code` `skill_is_not_installed_from_catalog`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIAgentSkillsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$skill_id = 12; // int | ID навыка

try {
    $result = $apiInstance->applyAgentSkillCatalogUpdate($skill_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentSkillsApi->applyAgentSkillCatalogUpdate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **skill_id** | **int**| ID навыка | |

### Return type

[**\OpenAPI\Client\Model\CreateAgentSkill201Response**](../Model/CreateAgentSkill201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `connectAgentSkillsToAgent()`

```php
connectAgentSkillsToAgent($agent_id, $connect_skills): \OpenAPI\Client\Model\GetAgentSkillsForAgent200Response
```

Подключение нескольких навыков к агенту

Чтобы подключить и сразу включить у агента несколько навыков, отправьте POST-запрос на `/api/v1/cloud-ai/agents/{agent_id}/skills/connect`.  Навыки, которых нет в аккаунте, пропускаются без ошибки. Уже подключённые навыки включаются; если для них передана версия, агент закрепляется на ней. В ответе — только навыки, которые удалось подключить.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIAgentSkillsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$agent_id = 113191; // int | ID агента
$connect_skills = new \OpenAPI\Client\Model\ConnectSkills(); // \OpenAPI\Client\Model\ConnectSkills

try {
    $result = $apiInstance->connectAgentSkillsToAgent($agent_id, $connect_skills);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentSkillsApi->connectAgentSkillsToAgent: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **agent_id** | **int**| ID агента | |
| **connect_skills** | [**\OpenAPI\Client\Model\ConnectSkills**](../Model/ConnectSkills.md)|  | |

### Return type

[**\OpenAPI\Client\Model\GetAgentSkillsForAgent200Response**](../Model/GetAgentSkillsForAgent200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createAgentSkill()`

```php
createAgentSkill($create_skill): \OpenAPI\Client\Model\CreateAgentSkill201Response
```

Создание навыка

Чтобы создать навык, отправьте POST-запрос на `/api/v1/cloud-ai/skills`.  Навык создаётся с версией 1 и ни к одному агенту не подключается. Предупреждения о качестве текста приходят в `meta.warnings` и не мешают сохранению. Скрипты передаются в теле запроса. Их общий размер — до 10 МБ, а всё тело запроса — до 16 МБ; запрос с телом больше отклоняется до проверки.  Если навык с таким названием уже есть, вернётся 409 с `error_code` `skill_name_already_exists`. Если скрипты не прошли проверку (больше 20 файлов, повторяющиеся имена, общий размер больше 10 МБ, файл без содержимого), вернётся 400 с `error_code` `skill_scripts_invalid`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIAgentSkillsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_skill = new \OpenAPI\Client\Model\CreateSkill(); // \OpenAPI\Client\Model\CreateSkill

try {
    $result = $apiInstance->createAgentSkill($create_skill);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentSkillsApi->createAgentSkill: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_skill** | [**\OpenAPI\Client\Model\CreateSkill**](../Model/CreateSkill.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateAgentSkill201Response**](../Model/CreateAgentSkill201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteAgentSkill()`

```php
deleteAgentSkill($skill_id)
```

Удаление навыка

Чтобы удалить навык, отправьте DELETE-запрос на `/api/v1/cloud-ai/skills/{skill_id}`.  Навык отключается от всех агентов, история версий и скрипты удаляются. Срабатывания навыка под старыми ответами агентов сохраняются.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIAgentSkillsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$skill_id = 12; // int | ID навыка

try {
    $apiInstance->deleteAgentSkill($skill_id);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentSkillsApi->deleteAgentSkill: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **skill_id** | **int**| ID навыка | |

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

## `disconnectAgentSkillFromAgent()`

```php
disconnectAgentSkillFromAgent($agent_id, $skill_id)
```

Отключение навыка от агента

Чтобы полностью отключить навык от агента, отправьте DELETE-запрос на `/api/v1/cloud-ai/agents/{agent_id}/skills/{skill_id}`.  Закреплённая версия при этом не сохраняется. Чтобы выключить навык на время, используйте PUT-запрос с `is_enabled: false`. Если навык не подключён к агенту, вернётся 404 с `error_code` `agent_skill_link_not_found`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIAgentSkillsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$agent_id = 113191; // int | ID агента
$skill_id = 12; // int | ID навыка

try {
    $apiInstance->disconnectAgentSkillFromAgent($agent_id, $skill_id);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentSkillsApi->disconnectAgentSkillFromAgent: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **agent_id** | **int**| ID агента | |
| **skill_id** | **int**| ID навыка | |

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

## `duplicateAgentSkill()`

```php
duplicateAgentSkill($skill_id): \OpenAPI\Client\Model\CreateAgentSkill201Response
```

Копирование навыка

Чтобы создать копию навыка, отправьте POST-запрос на `/api/v1/cloud-ai/skills/{skill_id}/duplicate`.  Копия получает свободное название вида «Название (копия)» или «Название (копия 2)», текст и скрипты текущей версии оригинала и собственную историю с версии 1. К агентам копия не подключается. Копия навыка из каталога становится обычным навыком аккаунта.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIAgentSkillsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$skill_id = 12; // int | ID навыка

try {
    $result = $apiInstance->duplicateAgentSkill($skill_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentSkillsApi->duplicateAgentSkill: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **skill_id** | **int**| ID навыка | |

### Return type

[**\OpenAPI\Client\Model\CreateAgentSkill201Response**](../Model/CreateAgentSkill201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAgentSkill()`

```php
getAgentSkill($skill_id): \OpenAPI\Client\Model\GetAgentSkill200Response
```

Получение навыка

Чтобы получить карточку навыка, отправьте GET-запрос на `/api/v1/cloud-ai/skills/{skill_id}`.  В карточке есть скрипты текущей версии (без содержимого), счётчик версий и агенты, к которым подключён навык.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIAgentSkillsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$skill_id = 12; // int | ID навыка

try {
    $result = $apiInstance->getAgentSkill($skill_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentSkillsApi->getAgentSkill: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **skill_id** | **int**| ID навыка | |

### Return type

[**\OpenAPI\Client\Model\GetAgentSkill200Response**](../Model/GetAgentSkill200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAgentSkillCatalog()`

```php
getAgentSkillCatalog(): \OpenAPI\Client\Model\GetAgentSkillCatalog200Response
```

Получение каталога навыков

Чтобы получить каталог готовых навыков Timeweb Cloud, отправьте GET-запрос на `/api/v1/cloud-ai/skill-catalog`.  Навыки приходят в порядке показа, сгруппированные по `category`. Инструкция возвращается полностью, чтобы её можно было прочитать до установки. Для установленных навыков заполнены `is_installed`, `installed_skill_id`, `is_modified` и `has_catalog_update`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIAgentSkillsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getAgentSkillCatalog();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentSkillsApi->getAgentSkillCatalog: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\GetAgentSkillCatalog200Response**](../Model/GetAgentSkillCatalog200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAgentSkillLibrary()`

```php
getAgentSkillLibrary($search): \OpenAPI\Client\Model\GetAgentSkillLibrary200Response
```

Получение списка навыков

Чтобы получить навыки аккаунта, отправьте GET-запрос на `/api/v1/cloud-ai/skills`.  Сначала идут недавно изменённые. Параметр `search` ищет по названию и по тексту инструкции.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIAgentSkillsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$search = возврат; // string | Поиск по названию навыка и по тексту инструкции

try {
    $result = $apiInstance->getAgentSkillLibrary($search);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentSkillsApi->getAgentSkillLibrary: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **search** | **string**| Поиск по названию навыка и по тексту инструкции | [optional] |

### Return type

[**\OpenAPI\Client\Model\GetAgentSkillLibrary200Response**](../Model/GetAgentSkillLibrary200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAgentSkillVersion()`

```php
getAgentSkillVersion($skill_id, $version): \OpenAPI\Client\Model\GetAgentSkillVersion200Response
```

Получение версии навыка

Чтобы получить текст конкретной версии навыка, отправьте GET-запрос на `/api/v1/cloud-ai/skills/{skill_id}/versions/{version}`.  Номер версии сработавшего навыка есть в срабатываниях под ответами агента.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIAgentSkillsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$skill_id = 12; // int | ID навыка
$version = 2; // int | Номер версии навыка

try {
    $result = $apiInstance->getAgentSkillVersion($skill_id, $version);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentSkillsApi->getAgentSkillVersion: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **skill_id** | **int**| ID навыка | |
| **version** | **int**| Номер версии навыка | |

### Return type

[**\OpenAPI\Client\Model\GetAgentSkillVersion200Response**](../Model/GetAgentSkillVersion200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAgentSkillVersions()`

```php
getAgentSkillVersions($skill_id): \OpenAPI\Client\Model\GetAgentSkillVersions200Response
```

Получение истории версий навыка

Чтобы получить историю версий навыка, отправьте GET-запрос на `/api/v1/cloud-ai/skills/{skill_id}/versions`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIAgentSkillsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$skill_id = 12; // int | ID навыка

try {
    $result = $apiInstance->getAgentSkillVersions($skill_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentSkillsApi->getAgentSkillVersions: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **skill_id** | **int**| ID навыка | |

### Return type

[**\OpenAPI\Client\Model\GetAgentSkillVersions200Response**](../Model/GetAgentSkillVersions200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAgentSkillsForAgent()`

```php
getAgentSkillsForAgent($agent_id): \OpenAPI\Client\Model\GetAgentSkillsForAgent200Response
```

Получение навыков агента

Чтобы получить навыки агента, отправьте GET-запрос на `/api/v1/cloud-ai/agents/{agent_id}/skills`.  В ответе все навыки аккаунта: неподключённые приходят с `is_connected: false`. `has_newer_version: true` означает, что агент закреплён на устаревшей версии.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIAgentSkillsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$agent_id = 113191; // int | ID агента

try {
    $result = $apiInstance->getAgentSkillsForAgent($agent_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentSkillsApi->getAgentSkillsForAgent: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **agent_id** | **int**| ID агента | |

### Return type

[**\OpenAPI\Client\Model\GetAgentSkillsForAgent200Response**](../Model/GetAgentSkillsForAgent200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `installAgentSkillFromCatalog()`

```php
installAgentSkillFromCatalog($catalog_item_id): \OpenAPI\Client\Model\InstallAgentSkillFromCatalog200Response
```

Установка навыка из каталога

Чтобы установить навык из каталога в библиотеку аккаунта, отправьте POST-запрос на `/api/v1/cloud-ai/skill-catalog/{catalog_item_id}/install`.  Повторная установка не создаёт копию, а возвращает уже установленный навык с `meta.already_installed: true`. Если название занято вашим навыком, к нему добавляется «(копия)». Чтобы сразу включить навык у агента, используйте `POST /api/v1/cloud-ai/agents/{agent_id}/skills/install-and-connect`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIAgentSkillsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$catalog_item_id = 3; // int | ID навыка в каталоге

try {
    $result = $apiInstance->installAgentSkillFromCatalog($catalog_item_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentSkillsApi->installAgentSkillFromCatalog: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **catalog_item_id** | **int**| ID навыка в каталоге | |

### Return type

[**\OpenAPI\Client\Model\InstallAgentSkillFromCatalog200Response**](../Model/InstallAgentSkillFromCatalog200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `installAndConnectAgentSkill()`

```php
installAndConnectAgentSkill($agent_id, $install_and_connect_skill): \OpenAPI\Client\Model\InstallAndConnectAgentSkill200Response
```

Установка навыка из каталога и включение у агента

Чтобы установить навык из каталога и сразу включить его у агента, отправьте POST-запрос на `/api/v1/cloud-ai/agents/{agent_id}/skills/install-and-connect`.  Если навык уже установлен, копия не создаётся (`meta.already_installed: true`), навык просто включается у агента.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIAgentSkillsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$agent_id = 113191; // int | ID агента
$install_and_connect_skill = new \OpenAPI\Client\Model\InstallAndConnectSkill(); // \OpenAPI\Client\Model\InstallAndConnectSkill

try {
    $result = $apiInstance->installAndConnectAgentSkill($agent_id, $install_and_connect_skill);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentSkillsApi->installAndConnectAgentSkill: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **agent_id** | **int**| ID агента | |
| **install_and_connect_skill** | [**\OpenAPI\Client\Model\InstallAndConnectSkill**](../Model/InstallAndConnectSkill.md)|  | |

### Return type

[**\OpenAPI\Client\Model\InstallAndConnectAgentSkill200Response**](../Model/InstallAndConnectAgentSkill200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `rollbackAgentSkillVersion()`

```php
rollbackAgentSkillVersion($skill_id, $version): \OpenAPI\Client\Model\CreateAgentSkill201Response
```

Переключение навыка на версию из истории

Чтобы сделать версию из истории текущей, отправьте POST-запрос на `/api/v1/cloud-ai/skills/{skill_id}/versions/{version}/rollback`.  Новая версия не создаётся (`meta.version_created` — `false`), название навыка не меняется. Агенты остаются на своих закреплённых версиях. Если выбранная версия уже текущая, ничего не меняется.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIAgentSkillsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$skill_id = 12; // int | ID навыка
$version = 2; // int | Номер версии навыка

try {
    $result = $apiInstance->rollbackAgentSkillVersion($skill_id, $version);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentSkillsApi->rollbackAgentSkillVersion: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **skill_id** | **int**| ID навыка | |
| **version** | **int**| Номер версии навыка | |

### Return type

[**\OpenAPI\Client\Model\CreateAgentSkill201Response**](../Model/CreateAgentSkill201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `setAgentSkillForAgent()`

```php
setAgentSkillForAgent($agent_id, $skill_id, $set_agent_skill): \OpenAPI\Client\Model\SetAgentSkillForAgent200Response
```

Включение и выключение навыка у агента

Чтобы включить или выключить навык у агента, отправьте PUT-запрос на `/api/v1/cloud-ai/agents/{agent_id}/skills/{skill_id}`.  Первое включение подключает навык и закрепляет агента на текущей версии навыка или на версии из `version`. Выключение сохраняет закреплённую версию, поэтому повторное включение вернёт то же поведение. Изменения действуют сразу. Выключение неподключённого навыка ничего не меняет.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIAgentSkillsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$agent_id = 113191; // int | ID агента
$skill_id = 12; // int | ID навыка
$set_agent_skill = new \OpenAPI\Client\Model\SetAgentSkill(); // \OpenAPI\Client\Model\SetAgentSkill

try {
    $result = $apiInstance->setAgentSkillForAgent($agent_id, $skill_id, $set_agent_skill);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentSkillsApi->setAgentSkillForAgent: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **agent_id** | **int**| ID агента | |
| **skill_id** | **int**| ID навыка | |
| **set_agent_skill** | [**\OpenAPI\Client\Model\SetAgentSkill**](../Model/SetAgentSkill.md)|  | |

### Return type

[**\OpenAPI\Client\Model\SetAgentSkillForAgent200Response**](../Model/SetAgentSkillForAgent200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `syncAgentSkillAgentsVersions()`

```php
syncAgentSkillAgentsVersions($skill_id): \OpenAPI\Client\Model\SyncAgentSkillAgentsVersions200Response
```

Перевод всех агентов навыка на текущую версию

Чтобы перевести всех агентов, у которых включён навык, на его текущую версию, отправьте POST-запрос на `/api/v1/cloud-ai/skills/{skill_id}/agents/sync-versions`.  Агенты, у которых навык выключен, остаются на своих версиях. Сколько агентов переведено, видно в `meta.updated_count`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIAgentSkillsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$skill_id = 12; // int | ID навыка

try {
    $result = $apiInstance->syncAgentSkillAgentsVersions($skill_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentSkillsApi->syncAgentSkillAgentsVersions: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **skill_id** | **int**| ID навыка | |

### Return type

[**\OpenAPI\Client\Model\SyncAgentSkillAgentsVersions200Response**](../Model/SyncAgentSkillAgentsVersions200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `syncAgentSkillVersionsForAgent()`

```php
syncAgentSkillVersionsForAgent($agent_id): \OpenAPI\Client\Model\SyncAgentSkillVersionsForAgent200Response
```

Перевод всех навыков агента на текущие версии

Чтобы перевести все включённые у агента навыки на их текущие версии, отправьте POST-запрос на `/api/v1/cloud-ai/agents/{agent_id}/skills/sync-versions`.  В ответе все навыки аккаунта с состоянием у агента, как в списке навыков агента. Сколько навыков переведено, видно в `updated_count` в корне ответа.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIAgentSkillsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$agent_id = 113191; // int | ID агента

try {
    $result = $apiInstance->syncAgentSkillVersionsForAgent($agent_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentSkillsApi->syncAgentSkillVersionsForAgent: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **agent_id** | **int**| ID агента | |

### Return type

[**\OpenAPI\Client\Model\SyncAgentSkillVersionsForAgent200Response**](../Model/SyncAgentSkillVersionsForAgent200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateAgentSkill()`

```php
updateAgentSkill($skill_id, $update_skill): \OpenAPI\Client\Model\CreateAgentSkill201Response
```

Изменение навыка

Чтобы изменить навык, отправьте PATCH-запрос на `/api/v1/cloud-ai/skills/{skill_id}`, передав только изменяемые поля.  Изменение «когда применять», инструкции или скриптов создаёт новую версию. Переименование и сохранение без изменений версию не создают (`meta.version_created`). Подключённые агенты остаются на своих версиях. Сколько агентов затронуто, видно в `meta.affected_agents_count`. Если в истории уже 50 версий, самая старая свободная версия удаляется (`meta.pruned_versions`). Скрипты передаются в теле запроса. Их общий размер — до 10 МБ, а всё тело запроса — до 16 МБ; запрос с телом больше отклоняется до проверки.  Возможные ошибки 409: `skill_name_already_exists` — название занято; `skill_versions_limit_exceeded` — все 50 версий заняты текущей и закреплёнными за агентами; `skill_was_modified_concurrently` — навык одновременно изменён другим запросом, повторите сохранение.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIAgentSkillsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$skill_id = 12; // int | ID навыка
$update_skill = new \OpenAPI\Client\Model\UpdateSkill(); // \OpenAPI\Client\Model\UpdateSkill

try {
    $result = $apiInstance->updateAgentSkill($skill_id, $update_skill);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentSkillsApi->updateAgentSkill: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **skill_id** | **int**| ID навыка | |
| **update_skill** | [**\OpenAPI\Client\Model\UpdateSkill**](../Model/UpdateSkill.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateAgentSkill201Response**](../Model/CreateAgentSkill201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateAgentSkillVersionForAgent()`

```php
updateAgentSkillVersionForAgent($agent_id, $skill_id): \OpenAPI\Client\Model\SetAgentSkillForAgent200Response
```

Перевод агента на текущую версию навыка

Чтобы перевести агента на текущую версию навыка, отправьте POST-запрос на `/api/v1/cloud-ai/agents/{agent_id}/skills/{skill_id}/update-version`.  Если навык не подключён к агенту, вернётся 404 с `error_code` `agent_skill_link_not_found`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIAgentSkillsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$agent_id = 113191; // int | ID агента
$skill_id = 12; // int | ID навыка

try {
    $result = $apiInstance->updateAgentSkillVersionForAgent($agent_id, $skill_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIAgentSkillsApi->updateAgentSkillVersionForAgent: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **agent_id** | **int**| ID агента | |
| **skill_id** | **int**| ID навыка | |

### Return type

[**\OpenAPI\Client\Model\SetAgentSkillForAgent200Response**](../Model/SetAgentSkillForAgent200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
