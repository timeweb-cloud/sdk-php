# OpenAPI\Client\CDNApi

All URIs are relative to https://api.timeweb.cloud, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**addCdnCertificate()**](CDNApi.md#addCdnCertificate) | **POST** /api/v1/cdn/certificates | Загрузка собственного сертификата CDN |
| [**archiveCdnCertificateTask()**](CDNApi.md#archiveCdnCertificateTask) | **POST** /api/v1/cdn/certificates/tasks/{task_id}/archive | Архивация задачи на выпуск сертификата |
| [**clearCdnResourceCache()**](CDNApi.md#clearCdnResourceCache) | **POST** /api/v1/cdn/http-resources/{resource_id}/clear-cache | Очистка кэша CDN-ресурса |
| [**createCdnResource()**](CDNApi.md#createCdnResource) | **POST** /api/v1/cdn/http-resources | Создание CDN-ресурса |
| [**deleteCdnCertificate()**](CDNApi.md#deleteCdnCertificate) | **DELETE** /api/v1/cdn/certificates/{certificate_id} | Удаление сертификата CDN |
| [**deleteCdnResource()**](CDNApi.md#deleteCdnResource) | **DELETE** /api/v1/cdn/http-resources/{resource_id} | Удаление CDN-ресурса |
| [**getCdnCertificateTasks()**](CDNApi.md#getCdnCertificateTasks) | **GET** /api/v1/cdn/certificates/tasks | Получение списка задач на выпуск сертификатов |
| [**getCdnCertificates()**](CDNApi.md#getCdnCertificates) | **GET** /api/v1/cdn/certificates | Получение списка сертификатов CDN |
| [**getCdnOriginNodes()**](CDNApi.md#getCdnOriginNodes) | **GET** /api/v1/cdn/nodes/origin | Получение списка подсетей узлов CDN |
| [**getCdnPresets()**](CDNApi.md#getCdnPresets) | **GET** /api/v1/cdn/presets | Получение списка тарифов CDN |
| [**getCdnResource()**](CDNApi.md#getCdnResource) | **GET** /api/v1/cdn/http-resources/{resource_id} | Получение CDN-ресурса |
| [**getCdnResourceConfiguration()**](CDNApi.md#getCdnResourceConfiguration) | **GET** /api/v1/cdn/http-resources/{resource_id}/configuration | Получение конфигурации CDN-ресурса |
| [**getCdnResourceNodes()**](CDNApi.md#getCdnResourceNodes) | **GET** /api/v1/cdn/nodes/http-resources/{resource_id} | Получение списка раздающих узлов CDN-ресурса |
| [**getCdnResourceStatistics()**](CDNApi.md#getCdnResourceStatistics) | **GET** /api/v1/cdn/http-resources/{resource_id}/statistics | Получение статистики CDN-ресурса |
| [**getCdnResources()**](CDNApi.md#getCdnResources) | **GET** /api/v1/cdn/http-resources | Получение списка CDN-ресурсов |
| [**issueCdnCertificate()**](CDNApi.md#issueCdnCertificate) | **POST** /api/v1/cdn/certificates/issue | Выпуск сертификата Let&#39;s Encrypt для CDN-ресурса |
| [**preloadCdnResourceCache()**](CDNApi.md#preloadCdnResourceCache) | **POST** /api/v1/cdn/http-resources/{resource_id}/preload-cache | Предварительная загрузка кэша CDN-ресурса |
| [**resumeCdnResource()**](CDNApi.md#resumeCdnResource) | **POST** /api/v1/cdn/http-resources/{resource_id}/resume | Возобновление раздачи CDN-ресурса |
| [**suspendCdnResource()**](CDNApi.md#suspendCdnResource) | **POST** /api/v1/cdn/http-resources/{resource_id}/suspend | Приостановка раздачи CDN-ресурса |
| [**updateCdnResource()**](CDNApi.md#updateCdnResource) | **PATCH** /api/v1/cdn/http-resources/{resource_id} | Изменение CDN-ресурса |


## `addCdnCertificate()`

```php
addCdnCertificate($add_certificate)
```

Загрузка собственного сертификата CDN

Чтобы загрузить собственный SSL-сертификат, отправьте POST-запрос на `/api/v1/cdn/certificates`.  После загрузки сертификат появится в списке `/api/v1/cdn/certificates` — привязать его к ресурсу можно, передав его ID в поле `config.security.certificate_id` PATCH-запроса на `/api/v1/cdn/http-resources/{resource_id}`.  Если сертификат или приватный ключ не проходят проверку — например, истек срок действия или ключ не соответствует сертификату — вернется ошибка `422`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\CDNApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$add_certificate = new \OpenAPI\Client\Model\AddCertificate(); // \OpenAPI\Client\Model\AddCertificate

try {
    $apiInstance->addCdnCertificate($add_certificate);
} catch (Exception $e) {
    echo 'Exception when calling CDNApi->addCdnCertificate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **add_certificate** | [**\OpenAPI\Client\Model\AddCertificate**](../Model/AddCertificate.md)|  | |

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

## `archiveCdnCertificateTask()`

```php
archiveCdnCertificateTask($task_id)
```

Архивация задачи на выпуск сертификата

Чтобы убрать из списка задачу на выпуск сертификата, отправьте POST-запрос на `/api/v1/cdn/certificates/tasks/{task_id}/archive`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\CDNApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$task_id = 42; // int | ID задачи на выпуск сертификата

try {
    $apiInstance->archiveCdnCertificateTask($task_id);
} catch (Exception $e) {
    echo 'Exception when calling CDNApi->archiveCdnCertificateTask: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **task_id** | **int**| ID задачи на выпуск сертификата | |

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

## `clearCdnResourceCache()`

```php
clearCdnResourceCache($resource_id, $clear_cache)
```

Очистка кэша CDN-ресурса

Чтобы очистить кэш на узлах CDN, отправьте POST-запрос на `/api/v1/cdn/http-resources/{resource_id}/clear-cache`.  При `purge_type` = `full` очищается весь кэш ресурса, при `purge_type` = `partial` — только файлы из списка `paths`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\CDNApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$resource_id = 1234; // int | ID CDN-ресурса
$clear_cache = new \OpenAPI\Client\Model\ClearCache(); // \OpenAPI\Client\Model\ClearCache

try {
    $apiInstance->clearCdnResourceCache($resource_id, $clear_cache);
} catch (Exception $e) {
    echo 'Exception when calling CDNApi->clearCdnResourceCache: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **resource_id** | **int**| ID CDN-ресурса | |
| **clear_cache** | [**\OpenAPI\Client\Model\ClearCache**](../Model/ClearCache.md)|  | |

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

## `createCdnResource()`

```php
createCdnResource($create_http_resource): \OpenAPI\Client\Model\CreateCdnResource201Response
```

Создание CDN-ресурса

Чтобы создать CDN-ресурс, отправьте POST-запрос на `/api/v1/cdn/http-resources`.  Источник контента задается ровно одним из полей: `storage_id` для S3-хранилища или `server` для произвольного origin-сервера. Если ни одно из них не передано, вернется ошибка `400`.  Сразу после создания ресурсу выдается технический домен `cdn_domain`, а сам ресурс какое-то время находится в статусе `processing`, пока конфигурация применяется на узлах CDN.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\CDNApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_http_resource = new \OpenAPI\Client\Model\CreateHttpResource(); // \OpenAPI\Client\Model\CreateHttpResource

try {
    $result = $apiInstance->createCdnResource($create_http_resource);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CDNApi->createCdnResource: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_http_resource** | [**\OpenAPI\Client\Model\CreateHttpResource**](../Model/CreateHttpResource.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateCdnResource201Response**](../Model/CreateCdnResource201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteCdnCertificate()`

```php
deleteCdnCertificate($certificate_id)
```

Удаление сертификата CDN

Чтобы удалить SSL-сертификат, отправьте DELETE-запрос на `/api/v1/cdn/certificates/{certificate_id}`.  Если сертификат привязан к CDN-ресурсу, вернется ошибка `409` — сначала отвяжите его, передав `config.security.certificate_id` = `null` в PATCH-запросе на `/api/v1/cdn/http-resources/{resource_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\CDNApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$certificate_id = 5678; // int | ID сертификата

try {
    $apiInstance->deleteCdnCertificate($certificate_id);
} catch (Exception $e) {
    echo 'Exception when calling CDNApi->deleteCdnCertificate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **certificate_id** | **int**| ID сертификата | |

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

## `deleteCdnResource()`

```php
deleteCdnResource($resource_id)
```

Удаление CDN-ресурса

Чтобы удалить CDN-ресурс, отправьте DELETE-запрос на `/api/v1/cdn/http-resources/{resource_id}`. Вместе с ресурсом освобождается его технический домен, а привязанный сертификат отвязывается.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\CDNApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$resource_id = 1234; // int | ID CDN-ресурса

try {
    $apiInstance->deleteCdnResource($resource_id);
} catch (Exception $e) {
    echo 'Exception when calling CDNApi->deleteCdnResource: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **resource_id** | **int**| ID CDN-ресурса | |

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

## `getCdnCertificateTasks()`

```php
getCdnCertificateTasks($resource_id): \OpenAPI\Client\Model\GetCdnCertificateTasks200Response
```

Получение списка задач на выпуск сертификатов

Чтобы получить список задач на выпуск сертификатов Let's Encrypt, отправьте GET-запрос на `/api/v1/cdn/certificates/tasks`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\CDNApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$resource_id = 1234; // int | Оставить в выдаче только задачи указанного CDN-ресурса.

try {
    $result = $apiInstance->getCdnCertificateTasks($resource_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CDNApi->getCdnCertificateTasks: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **resource_id** | **int**| Оставить в выдаче только задачи указанного CDN-ресурса. | [optional] |

### Return type

[**\OpenAPI\Client\Model\GetCdnCertificateTasks200Response**](../Model/GetCdnCertificateTasks200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCdnCertificates()`

```php
getCdnCertificates($resource_id): \OpenAPI\Client\Model\GetCdnCertificates200Response
```

Получение списка сертификатов CDN

Чтобы получить список SSL-сертификатов, доступных для доменов CDN-ресурсов, отправьте GET-запрос на `/api/v1/cdn/certificates`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\CDNApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$resource_id = 1234; // int | Оставить в выдаче только сертификаты, подходящие для доменов указанного CDN-ресурса.

try {
    $result = $apiInstance->getCdnCertificates($resource_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CDNApi->getCdnCertificates: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **resource_id** | **int**| Оставить в выдаче только сертификаты, подходящие для доменов указанного CDN-ресурса. | [optional] |

### Return type

[**\OpenAPI\Client\Model\GetCdnCertificates200Response**](../Model/GetCdnCertificates200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCdnOriginNodes()`

```php
getCdnOriginNodes($with_extra_zones): \OpenAPI\Client\Model\GetCdnOriginNodes200Response
```

Получение списка подсетей узлов CDN

Чтобы получить список IP-адресов и подсетей, с которых узлы CDN обращаются к источнику контента, отправьте GET-запрос на `/api/v1/cdn/nodes/origin`. Этот список удобно использовать, чтобы разрешить доступ к origin-серверу только для узлов CDN.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\CDNApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$with_extra_zones = true; // bool | Добавить в выдачу узлы дополнительных зон раздачи.

try {
    $result = $apiInstance->getCdnOriginNodes($with_extra_zones);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CDNApi->getCdnOriginNodes: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **with_extra_zones** | **bool**| Добавить в выдачу узлы дополнительных зон раздачи. | [optional] [default to false] |

### Return type

[**\OpenAPI\Client\Model\GetCdnOriginNodes200Response**](../Model/GetCdnOriginNodes200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCdnPresets()`

```php
getCdnPresets(): \OpenAPI\Client\Model\GetCdnPresets200Response
```

Получение списка тарифов CDN

Чтобы получить список доступных тарифов CDN, отправьте GET-запрос на `/api/v1/cdn/presets`. ID тарифа из этого списка указывается в поле `preset_id` при создании и изменении ресурса.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\CDNApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getCdnPresets();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CDNApi->getCdnPresets: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\GetCdnPresets200Response**](../Model/GetCdnPresets200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCdnResource()`

```php
getCdnResource($resource_id): \OpenAPI\Client\Model\CreateCdnResource201Response
```

Получение CDN-ресурса

Чтобы получить информацию об отдельном CDN-ресурсе, отправьте GET-запрос на `/api/v1/cdn/http-resources/{resource_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\CDNApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$resource_id = 1234; // int | ID CDN-ресурса

try {
    $result = $apiInstance->getCdnResource($resource_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CDNApi->getCdnResource: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **resource_id** | **int**| ID CDN-ресурса | |

### Return type

[**\OpenAPI\Client\Model\CreateCdnResource201Response**](../Model/CreateCdnResource201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCdnResourceConfiguration()`

```php
getCdnResourceConfiguration($resource_id): \OpenAPI\Client\Model\GetCdnResourceConfiguration200Response
```

Получение конфигурации CDN-ресурса

Чтобы получить текущую конфигурацию CDN-ресурса, отправьте GET-запрос на `/api/v1/cdn/http-resources/{resource_id}/configuration`.  Изменить конфигурацию можно в поле `config` PATCH-запроса на `/api/v1/cdn/http-resources/{resource_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\CDNApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$resource_id = 1234; // int | ID CDN-ресурса

try {
    $result = $apiInstance->getCdnResourceConfiguration($resource_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CDNApi->getCdnResourceConfiguration: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **resource_id** | **int**| ID CDN-ресурса | |

### Return type

[**\OpenAPI\Client\Model\GetCdnResourceConfiguration200Response**](../Model/GetCdnResourceConfiguration200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCdnResourceNodes()`

```php
getCdnResourceNodes($resource_id, $with_extra_zones, $country): \OpenAPI\Client\Model\GetCdnResourceNodes200Response
```

Получение списка раздающих узлов CDN-ресурса

Чтобы получить список узлов, которые раздают контент доменов ресурса, отправьте GET-запрос на `/api/v1/cdn/nodes/http-resources/{resource_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\CDNApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$resource_id = 1234; // int | ID CDN-ресурса
$with_extra_zones = true; // bool | Добавить в выдачу узлы дополнительных зон раздачи.
$country = ["RU","KZ"]; // string[] | Оставить в выдаче только основные зоны раздачи в указанных странах. Коды стран в формате ISO 3166-1 alpha-2.

try {
    $result = $apiInstance->getCdnResourceNodes($resource_id, $with_extra_zones, $country);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CDNApi->getCdnResourceNodes: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **resource_id** | **int**| ID CDN-ресурса | |
| **with_extra_zones** | **bool**| Добавить в выдачу узлы дополнительных зон раздачи. | [optional] [default to false] |
| **country** | [**string[]**](../Model/string.md)| Оставить в выдаче только основные зоны раздачи в указанных странах. Коды стран в формате ISO 3166-1 alpha-2. | [optional] |

### Return type

[**\OpenAPI\Client\Model\GetCdnResourceNodes200Response**](../Model/GetCdnResourceNodes200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCdnResourceStatistics()`

```php
getCdnResourceStatistics($resource_id, $from, $to): \OpenAPI\Client\Model\GetCdnResourceStatistics200Response
```

Получение статистики CDN-ресурса

Чтобы получить статистику трафика и запросов CDN-ресурса, отправьте GET-запрос на `/api/v1/cdn/http-resources/{resource_id}/statistics`.  Данные возвращаются с разбивкой по часовым интервалам. Если период не указан, вернется статистика за последние 6 часов.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\CDNApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$resource_id = 1234; // int | ID CDN-ресурса
$from = 2026-04-16T00:00Z; // \DateTime | Начало периода в формате ISO 8601. По умолчанию — 6 часов назад.
$to = 2026-04-16T23:59:59Z; // \DateTime | Конец периода в формате ISO 8601. По умолчанию — текущий момент. Должен быть не раньше `from`.

try {
    $result = $apiInstance->getCdnResourceStatistics($resource_id, $from, $to);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CDNApi->getCdnResourceStatistics: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **resource_id** | **int**| ID CDN-ресурса | |
| **from** | **\DateTime**| Начало периода в формате ISO 8601. По умолчанию — 6 часов назад. | [optional] |
| **to** | **\DateTime**| Конец периода в формате ISO 8601. По умолчанию — текущий момент. Должен быть не раньше &#x60;from&#x60;. | [optional] |

### Return type

[**\OpenAPI\Client\Model\GetCdnResourceStatistics200Response**](../Model/GetCdnResourceStatistics200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCdnResources()`

```php
getCdnResources($bucket_id): \OpenAPI\Client\Model\GetCdnResources200Response
```

Получение списка CDN-ресурсов

Чтобы получить список CDN-ресурсов, отправьте GET-запрос на `/api/v1/cdn/http-resources`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\CDNApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$bucket_id = 4210; // int | Оставить в выдаче только ресурсы, источником контента которых является указанное S3-хранилище.

try {
    $result = $apiInstance->getCdnResources($bucket_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CDNApi->getCdnResources: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **bucket_id** | **int**| Оставить в выдаче только ресурсы, источником контента которых является указанное S3-хранилище. | [optional] |

### Return type

[**\OpenAPI\Client\Model\GetCdnResources200Response**](../Model/GetCdnResources200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `issueCdnCertificate()`

```php
issueCdnCertificate($issue_certificate)
```

Выпуск сертификата Let's Encrypt для CDN-ресурса

Чтобы выпустить бесплатный сертификат Let's Encrypt для доменов CDN-ресурса, отправьте POST-запрос на `/api/v1/cdn/certificates/issue`.  Выпуск выполняется асинхронно: в ответ возвращается код `202`, а следить за ходом выпуска можно по списку задач `/api/v1/cdn/certificates/tasks`. Готовый сертификат привязывается к ресурсу автоматически.  Перед выпуском убедитесь, что домены ресурса указывают на его технический домен `cdn_domain` — иначе вернется ошибка `422`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\CDNApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$issue_certificate = new \OpenAPI\Client\Model\IssueCertificate(); // \OpenAPI\Client\Model\IssueCertificate

try {
    $apiInstance->issueCdnCertificate($issue_certificate);
} catch (Exception $e) {
    echo 'Exception when calling CDNApi->issueCdnCertificate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **issue_certificate** | [**\OpenAPI\Client\Model\IssueCertificate**](../Model/IssueCertificate.md)|  | |

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

## `preloadCdnResourceCache()`

```php
preloadCdnResourceCache($resource_id, $preload_cache)
```

Предварительная загрузка кэша CDN-ресурса

Чтобы заранее загрузить файлы в кэш узлов CDN, не дожидаясь первого обращения пользователей, отправьте POST-запрос на `/api/v1/cdn/http-resources/{resource_id}/preload-cache`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\CDNApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$resource_id = 1234; // int | ID CDN-ресурса
$preload_cache = new \OpenAPI\Client\Model\PreloadCache(); // \OpenAPI\Client\Model\PreloadCache

try {
    $apiInstance->preloadCdnResourceCache($resource_id, $preload_cache);
} catch (Exception $e) {
    echo 'Exception when calling CDNApi->preloadCdnResourceCache: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **resource_id** | **int**| ID CDN-ресурса | |
| **preload_cache** | [**\OpenAPI\Client\Model\PreloadCache**](../Model/PreloadCache.md)|  | |

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

## `resumeCdnResource()`

```php
resumeCdnResource($resource_id): \OpenAPI\Client\Model\CreateCdnResource201Response
```

Возобновление раздачи CDN-ресурса

Чтобы возобновить раздачу контента после приостановки, отправьте POST-запрос на `/api/v1/cdn/http-resources/{resource_id}/resume`.  Если ресурс заблокирован, вернется ошибка `409`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\CDNApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$resource_id = 1234; // int | ID CDN-ресурса

try {
    $result = $apiInstance->resumeCdnResource($resource_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CDNApi->resumeCdnResource: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **resource_id** | **int**| ID CDN-ресурса | |

### Return type

[**\OpenAPI\Client\Model\CreateCdnResource201Response**](../Model/CreateCdnResource201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `suspendCdnResource()`

```php
suspendCdnResource($resource_id): \OpenAPI\Client\Model\CreateCdnResource201Response
```

Приостановка раздачи CDN-ресурса

Чтобы приостановить раздачу контента, отправьте POST-запрос на `/api/v1/cdn/http-resources/{resource_id}/suspend`. Ресурс перейдет в статус `stopped`, его настройки и домены сохранятся.  Если ресурс заблокирован, вернется ошибка `409`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\CDNApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$resource_id = 1234; // int | ID CDN-ресурса

try {
    $result = $apiInstance->suspendCdnResource($resource_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CDNApi->suspendCdnResource: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **resource_id** | **int**| ID CDN-ресурса | |

### Return type

[**\OpenAPI\Client\Model\CreateCdnResource201Response**](../Model/CreateCdnResource201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateCdnResource()`

```php
updateCdnResource($resource_id, $update_http_resource): \OpenAPI\Client\Model\CreateCdnResource201Response
```

Изменение CDN-ресурса

Чтобы изменить CDN-ресурс, отправьте PATCH-запрос на `/api/v1/cdn/http-resources/{resource_id}`.  Передавайте только те поля, которые нужно изменить: переданные значения накладываются на текущую конфигурацию, а непереданные остаются без изменений. Чтобы сбросить настройку, передайте в соответствующем поле `null`.  Поля `storage_id` и `config.origin.servers` нельзя передавать вместе — источник контента может быть только один.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\CDNApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$resource_id = 1234; // int | ID CDN-ресурса
$update_http_resource = new \OpenAPI\Client\Model\UpdateHttpResource(); // \OpenAPI\Client\Model\UpdateHttpResource

try {
    $result = $apiInstance->updateCdnResource($resource_id, $update_http_resource);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CDNApi->updateCdnResource: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **resource_id** | **int**| ID CDN-ресурса | |
| **update_http_resource** | [**\OpenAPI\Client\Model\UpdateHttpResource**](../Model/UpdateHttpResource.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateCdnResource201Response**](../Model/CreateCdnResource201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
