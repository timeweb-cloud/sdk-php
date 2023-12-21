# OpenAPI\Client\FirewallApi

All URIs are relative to https://api.timeweb.cloud, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**addResourceToGroup()**](FirewallApi.md#addResourceToGroup) | **POST** /api/v1/firewall/groups/{group_id}/resources/{resource_id} | Линковка ресурса в firewall group |
| [**createGroup()**](FirewallApi.md#createGroup) | **POST** /api/v1/firewall/groups | Создание группы правил |
| [**createGroupRule()**](FirewallApi.md#createGroupRule) | **POST** /api/v1/firewall/groups/{group_id}/rules | Создание firewall правила |
| [**deleteGroup()**](FirewallApi.md#deleteGroup) | **DELETE** /api/v1/firewall/groups/{group_id} | Удаление группы правил |
| [**deleteGroupRule()**](FirewallApi.md#deleteGroupRule) | **DELETE** /api/v1/firewall/groups/{group_id}/rules/{rule_id} | Удаление firewall правила |
| [**deleteResourceFromGroup()**](FirewallApi.md#deleteResourceFromGroup) | **DELETE** /api/v1/firewall/groups/{group_id}/resources/{resource_id} | Отлинковка ресурса из firewall group |
| [**getGroup()**](FirewallApi.md#getGroup) | **GET** /api/v1/firewall/groups/{group_id} | Получение информации о группе правил |
| [**getGroupResources()**](FirewallApi.md#getGroupResources) | **GET** /api/v1/firewall/groups/{group_id}/resources | Получение слинкованных ресурсов |
| [**getGroupRule()**](FirewallApi.md#getGroupRule) | **GET** /api/v1/firewall/groups/{group_id}/rules/{rule_id} | Получение информации о правиле |
| [**getGroupRules()**](FirewallApi.md#getGroupRules) | **GET** /api/v1/firewall/groups/{group_id}/rules | Получение списка правил |
| [**getGroups()**](FirewallApi.md#getGroups) | **GET** /api/v1/firewall/groups | Получение групп правил |
| [**getRulesForResource()**](FirewallApi.md#getRulesForResource) | **GET** /api/v1/firewall/service/{resource_type}/{resource_id} | Получение групп правил для ресурса |
| [**updateGroup()**](FirewallApi.md#updateGroup) | **PATCH** /api/v1/firewall/groups/{group_id} | Обновление группы правил |
| [**updateGroupRule()**](FirewallApi.md#updateGroupRule) | **PATCH** /api/v1/firewall/groups/{group_id}/rules/{rule_id} | Обновление firewall правила |


## `addResourceToGroup()`

```php
addResourceToGroup($group_id, $resource_id, $resource_type): \OpenAPI\Client\Model\FirewallGroupResourceOutResponse
```

Линковка ресурса в firewall group

Чтобы слинковать ресурс с группой правил, отправьте POST запрос на `/api/v1/firewall/groups/{group_id}/resources/{resource_id}`

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\FirewallApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$group_id = 'group_id_example'; // string | Идентификатор группы правил
$resource_id = 'resource_id_example'; // string | Идентификатор ресурса
$resource_type = new \OpenAPI\Client\Model\ResourceType(); // ResourceType

try {
    $result = $apiInstance->addResourceToGroup($group_id, $resource_id, $resource_type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FirewallApi->addResourceToGroup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **group_id** | **string**| Идентификатор группы правил | |
| **resource_id** | **string**| Идентификатор ресурса | |
| **resource_type** | [**ResourceType**](../Model/.md)|  | [optional] |

### Return type

[**\OpenAPI\Client\Model\FirewallGroupResourceOutResponse**](../Model/FirewallGroupResourceOutResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createGroup()`

```php
createGroup($firewall_group_in_api, $policy): \OpenAPI\Client\Model\FirewallGroupOutResponse
```

Создание группы правил

Чтобы создать группу правил, отправьте POST запрос на `/api/v1/firewall/groups`

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\FirewallApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$firewall_group_in_api = new \OpenAPI\Client\Model\FirewallGroupInAPI(); // \OpenAPI\Client\Model\FirewallGroupInAPI
$policy = 'policy_example'; // string | Тип группы правил

try {
    $result = $apiInstance->createGroup($firewall_group_in_api, $policy);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FirewallApi->createGroup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **firewall_group_in_api** | [**\OpenAPI\Client\Model\FirewallGroupInAPI**](../Model/FirewallGroupInAPI.md)|  | |
| **policy** | **string**| Тип группы правил | [optional] |

### Return type

[**\OpenAPI\Client\Model\FirewallGroupOutResponse**](../Model/FirewallGroupOutResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createGroupRule()`

```php
createGroupRule($group_id, $firewall_rule_in_api): \OpenAPI\Client\Model\FirewallRuleOutResponse
```

Создание firewall правила

Чтобы создать правило в группе, отправьте POST запрос на `/api/v1/firewall/groups/{group_id}/rules`

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\FirewallApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$group_id = 'group_id_example'; // string | Идентификатор группы правил
$firewall_rule_in_api = new \OpenAPI\Client\Model\FirewallRuleInAPI(); // \OpenAPI\Client\Model\FirewallRuleInAPI

try {
    $result = $apiInstance->createGroupRule($group_id, $firewall_rule_in_api);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FirewallApi->createGroupRule: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **group_id** | **string**| Идентификатор группы правил | |
| **firewall_rule_in_api** | [**\OpenAPI\Client\Model\FirewallRuleInAPI**](../Model/FirewallRuleInAPI.md)|  | |

### Return type

[**\OpenAPI\Client\Model\FirewallRuleOutResponse**](../Model/FirewallRuleOutResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteGroup()`

```php
deleteGroup($group_id)
```

Удаление группы правил

Чтобы удалить группу правил, отправьте DELETE запрос на `/api/v1/firewall/groups/{group_id}`

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\FirewallApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$group_id = 'group_id_example'; // string | Идентификатор группы правил

try {
    $apiInstance->deleteGroup($group_id);
} catch (Exception $e) {
    echo 'Exception when calling FirewallApi->deleteGroup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **group_id** | **string**| Идентификатор группы правил | |

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

## `deleteGroupRule()`

```php
deleteGroupRule($group_id, $rule_id)
```

Удаление firewall правила

Чтобы удалить правило, отправьте DELETE запрос на `/api/v1/firewall/groups/{group_id}/rules/{rule_id}`

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\FirewallApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$group_id = 'group_id_example'; // string | Идентификатор группы правил
$rule_id = 'rule_id_example'; // string | Идентификатор правила

try {
    $apiInstance->deleteGroupRule($group_id, $rule_id);
} catch (Exception $e) {
    echo 'Exception when calling FirewallApi->deleteGroupRule: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **group_id** | **string**| Идентификатор группы правил | |
| **rule_id** | **string**| Идентификатор правила | |

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

## `deleteResourceFromGroup()`

```php
deleteResourceFromGroup($group_id, $resource_id, $resource_type)
```

Отлинковка ресурса из firewall group

Чтобы отлинковать ресурс от группы правил, отправьте DELETE запрос на `/api/v1/firewall/groups/{group_id}/resources/{resource_id}`

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\FirewallApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$group_id = 'group_id_example'; // string | Идентификатор группы правил
$resource_id = 'resource_id_example'; // string | Идентификатор ресурса
$resource_type = new \OpenAPI\Client\Model\ResourceType(); // ResourceType

try {
    $apiInstance->deleteResourceFromGroup($group_id, $resource_id, $resource_type);
} catch (Exception $e) {
    echo 'Exception when calling FirewallApi->deleteResourceFromGroup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **group_id** | **string**| Идентификатор группы правил | |
| **resource_id** | **string**| Идентификатор ресурса | |
| **resource_type** | [**ResourceType**](../Model/.md)|  | [optional] |

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

## `getGroup()`

```php
getGroup($group_id): \OpenAPI\Client\Model\FirewallGroupOutResponse
```

Получение информации о группе правил

Чтобы получить информацию о группе правил, отправьте GET запрос на `/api/v1/firewall/groups/{group_id}`

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\FirewallApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$group_id = 'group_id_example'; // string | Идентификатор группы правил

try {
    $result = $apiInstance->getGroup($group_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FirewallApi->getGroup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **group_id** | **string**| Идентификатор группы правил | |

### Return type

[**\OpenAPI\Client\Model\FirewallGroupOutResponse**](../Model/FirewallGroupOutResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getGroupResources()`

```php
getGroupResources($group_id, $limit, $offset): \OpenAPI\Client\Model\FirewallGroupResourcesOutResponse
```

Получение слинкованных ресурсов

Чтобы получить слинкованных ресурсов для группы правил, отправьте GET запрос на `/api/v1/firewall/groups/{group_id}/resources`

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\FirewallApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$group_id = 'group_id_example'; // string | Идентификатор группы правил
$limit = 100; // int | Обозначает количество записей, которое необходимо вернуть.
$offset = 0; // int | Указывает на смещение относительно начала списка.

try {
    $result = $apiInstance->getGroupResources($group_id, $limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FirewallApi->getGroupResources: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **group_id** | **string**| Идентификатор группы правил | |
| **limit** | **int**| Обозначает количество записей, которое необходимо вернуть. | [optional] [default to 100] |
| **offset** | **int**| Указывает на смещение относительно начала списка. | [optional] [default to 0] |

### Return type

[**\OpenAPI\Client\Model\FirewallGroupResourcesOutResponse**](../Model/FirewallGroupResourcesOutResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getGroupRule()`

```php
getGroupRule($rule_id, $group_id): \OpenAPI\Client\Model\FirewallRuleOutResponse
```

Получение информации о правиле

Чтобы получить инфомрацию о правиле, отправьте GET запрос на `/api/v1/firewall/groups/{group_id}/rules/{rule_id}`

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\FirewallApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$rule_id = 'rule_id_example'; // string | Идентификатор правила
$group_id = 'group_id_example'; // string | Идентификатор группы правил

try {
    $result = $apiInstance->getGroupRule($rule_id, $group_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FirewallApi->getGroupRule: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **rule_id** | **string**| Идентификатор правила | |
| **group_id** | **string**| Идентификатор группы правил | |

### Return type

[**\OpenAPI\Client\Model\FirewallRuleOutResponse**](../Model/FirewallRuleOutResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getGroupRules()`

```php
getGroupRules($group_id, $limit, $offset): \OpenAPI\Client\Model\FirewallRulesOutResponse
```

Получение списка правил

Чтобы получить список правил в группе, отправьте GET запрос на `/api/v1/firewall/groups/{group_id}/rules`

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\FirewallApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$group_id = 'group_id_example'; // string | Идентификатор группы правил
$limit = 100; // int | Обозначает количество записей, которое необходимо вернуть.
$offset = 0; // int | Указывает на смещение относительно начала списка.

try {
    $result = $apiInstance->getGroupRules($group_id, $limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FirewallApi->getGroupRules: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **group_id** | **string**| Идентификатор группы правил | |
| **limit** | **int**| Обозначает количество записей, которое необходимо вернуть. | [optional] [default to 100] |
| **offset** | **int**| Указывает на смещение относительно начала списка. | [optional] [default to 0] |

### Return type

[**\OpenAPI\Client\Model\FirewallRulesOutResponse**](../Model/FirewallRulesOutResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getGroups()`

```php
getGroups($limit, $offset): \OpenAPI\Client\Model\FirewallGroupsOutResponse
```

Получение групп правил

Чтобы получить групп правил для аккаунта, отправьте GET запрос на `/api/v1/firewall/groups`

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\FirewallApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$limit = 100; // int | Обозначает количество записей, которое необходимо вернуть.
$offset = 0; // int | Указывает на смещение относительно начала списка.

try {
    $result = $apiInstance->getGroups($limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FirewallApi->getGroups: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **limit** | **int**| Обозначает количество записей, которое необходимо вернуть. | [optional] [default to 100] |
| **offset** | **int**| Указывает на смещение относительно начала списка. | [optional] [default to 0] |

### Return type

[**\OpenAPI\Client\Model\FirewallGroupsOutResponse**](../Model/FirewallGroupsOutResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getRulesForResource()`

```php
getRulesForResource($resource_id, $resource_type, $limit, $offset): \OpenAPI\Client\Model\FirewallGroupsOutResponse
```

Получение групп правил для ресурса

Чтобы получить список групп правил, с которыми слинкован ресурс, отправьте GET запрос на `/api/v1/firewall/service/{resource_type}/{resource_id}`

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\FirewallApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$resource_id = 'resource_id_example'; // string | Идентификатор ресурса
$resource_type = new \OpenAPI\Client\Model\ResourceType(); // ResourceType
$limit = 100; // int | Обозначает количество записей, которое необходимо вернуть.
$offset = 0; // int | Указывает на смещение относительно начала списка.

try {
    $result = $apiInstance->getRulesForResource($resource_id, $resource_type, $limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FirewallApi->getRulesForResource: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **resource_id** | **string**| Идентификатор ресурса | |
| **resource_type** | [**ResourceType**](../Model/.md)|  | |
| **limit** | **int**| Обозначает количество записей, которое необходимо вернуть. | [optional] [default to 100] |
| **offset** | **int**| Указывает на смещение относительно начала списка. | [optional] [default to 0] |

### Return type

[**\OpenAPI\Client\Model\FirewallGroupsOutResponse**](../Model/FirewallGroupsOutResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateGroup()`

```php
updateGroup($group_id, $firewall_group_in_api): \OpenAPI\Client\Model\FirewallGroupOutResponse
```

Обновление группы правил

Чтобы изменить группу правил, отправьте PATCH запрос на `/api/v1/firewall/groups/{group_id}`

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\FirewallApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$group_id = 'group_id_example'; // string | Идентификатор группы правил
$firewall_group_in_api = new \OpenAPI\Client\Model\FirewallGroupInAPI(); // \OpenAPI\Client\Model\FirewallGroupInAPI

try {
    $result = $apiInstance->updateGroup($group_id, $firewall_group_in_api);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FirewallApi->updateGroup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **group_id** | **string**| Идентификатор группы правил | |
| **firewall_group_in_api** | [**\OpenAPI\Client\Model\FirewallGroupInAPI**](../Model/FirewallGroupInAPI.md)|  | |

### Return type

[**\OpenAPI\Client\Model\FirewallGroupOutResponse**](../Model/FirewallGroupOutResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateGroupRule()`

```php
updateGroupRule($group_id, $rule_id, $firewall_rule_in_api): \OpenAPI\Client\Model\FirewallRuleOutResponse
```

Обновление firewall правила

Чтобы изменить правило, отправьте PATCH запрос на `/api/v1/firewall/groups/{group_id}/rules/{rule_id}`

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\FirewallApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$group_id = 'group_id_example'; // string | Идентификатор группы правил
$rule_id = 'rule_id_example'; // string | Идентификатор правила
$firewall_rule_in_api = new \OpenAPI\Client\Model\FirewallRuleInAPI(); // \OpenAPI\Client\Model\FirewallRuleInAPI

try {
    $result = $apiInstance->updateGroupRule($group_id, $rule_id, $firewall_rule_in_api);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FirewallApi->updateGroupRule: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **group_id** | **string**| Идентификатор группы правил | |
| **rule_id** | **string**| Идентификатор правила | |
| **firewall_rule_in_api** | [**\OpenAPI\Client\Model\FirewallRuleInAPI**](../Model/FirewallRuleInAPI.md)|  | |

### Return type

[**\OpenAPI\Client\Model\FirewallRuleOutResponse**](../Model/FirewallRuleOutResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
