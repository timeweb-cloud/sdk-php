# OpenAPI\Client\KnowledgeBasesApi

All URIs are relative to https://api.timeweb.cloud, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**addAdditionalTokenPackageToKnowledgebase()**](KnowledgeBasesApi.md#addAdditionalTokenPackageToKnowledgebase) | **POST** /api/v1/cloud-ai/knowledge-bases/{id}/add-additional-token-package | Добавление дополнительного пакета токенов |
| [**createKnowledgebase()**](KnowledgeBasesApi.md#createKnowledgebase) | **POST** /api/v1/cloud-ai/knowledge-bases | Создание базы знаний |
| [**deleteDocument()**](KnowledgeBasesApi.md#deleteDocument) | **DELETE** /api/v1/cloud-ai/knowledge-bases/{id}/documents/{document_id} | Удаление документа из базы знаний |
| [**deleteKnowledgebase()**](KnowledgeBasesApi.md#deleteKnowledgebase) | **DELETE** /api/v1/cloud-ai/knowledge-bases/{id} | Удаление базы знаний |
| [**downloadDocument()**](KnowledgeBasesApi.md#downloadDocument) | **GET** /api/v1/cloud-ai/knowledge-bases/{id}/documents/{document_id}/download | Скачивание документа из базы знаний |
| [**getKnowledgebase()**](KnowledgeBasesApi.md#getKnowledgebase) | **GET** /api/v1/cloud-ai/knowledge-bases/{id} | Получение базы знаний |
| [**getKnowledgebaseStatistics()**](KnowledgeBasesApi.md#getKnowledgebaseStatistics) | **GET** /api/v1/cloud-ai/knowledge-bases/{id}/statistic | Получение статистики использования токенов базы знаний |
| [**getKnowledgebases()**](KnowledgeBasesApi.md#getKnowledgebases) | **GET** /api/v1/cloud-ai/knowledge-bases | Получение списка баз знаний |
| [**linkKnowledgebaseToAgent()**](KnowledgeBasesApi.md#linkKnowledgebaseToAgent) | **POST** /api/v1/cloud-ai/knowledge-bases/{id}/link/{agent_id} | Привязка базы знаний к агенту |
| [**reindexDocument()**](KnowledgeBasesApi.md#reindexDocument) | **POST** /api/v1/cloud-ai/knowledge-bases/{id}/documents/{document_id}/reindex | Переиндексация документа |
| [**unlinkKnowledgebaseFromAgent()**](KnowledgeBasesApi.md#unlinkKnowledgebaseFromAgent) | **DELETE** /api/v1/cloud-ai/knowledge-bases/{id}/link/{agent_id} | Отвязка базы знаний от агента |
| [**updateKnowledgebase()**](KnowledgeBasesApi.md#updateKnowledgebase) | **PATCH** /api/v1/cloud-ai/knowledge-bases/{id} | Обновление базы знаний |
| [**uploadFilesToKnowledgebase()**](KnowledgeBasesApi.md#uploadFilesToKnowledgebase) | **POST** /api/v1/cloud-ai/knowledge-bases/{id}/upload | Загрузка файлов в базу знаний |


## `addAdditionalTokenPackageToKnowledgebase()`

```php
addAdditionalTokenPackageToKnowledgebase($id, $add_token_package)
```

Добавление дополнительного пакета токенов

Чтобы добавить дополнительный пакет токенов для базы знаний, отправьте POST-запрос на `/api/v1/cloud-ai/knowledge-bases/{id}/add-additional-token-package`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\KnowledgeBasesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 1; // int | ID базы знаний
$add_token_package = new \OpenAPI\Client\Model\AddTokenPackage(); // \OpenAPI\Client\Model\AddTokenPackage

try {
    $apiInstance->addAdditionalTokenPackageToKnowledgebase($id, $add_token_package);
} catch (Exception $e) {
    echo 'Exception when calling KnowledgeBasesApi->addAdditionalTokenPackageToKnowledgebase: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| ID базы знаний | |
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

## `createKnowledgebase()`

```php
createKnowledgebase($create_knowledgebase): \OpenAPI\Client\Model\CreateKnowledgebase201Response
```

Создание базы знаний

Чтобы создать базу знаний, отправьте POST-запрос на `/api/v1/cloud-ai/knowledge-bases`, задав необходимые атрибуты.  База знаний будет создана с использованием предоставленной информации. Тело ответа будет содержать объект JSON с информацией о созданной базе знаний.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\KnowledgeBasesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_knowledgebase = new \OpenAPI\Client\Model\CreateKnowledgebase(); // \OpenAPI\Client\Model\CreateKnowledgebase

try {
    $result = $apiInstance->createKnowledgebase($create_knowledgebase);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling KnowledgeBasesApi->createKnowledgebase: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_knowledgebase** | [**\OpenAPI\Client\Model\CreateKnowledgebase**](../Model/CreateKnowledgebase.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateKnowledgebase201Response**](../Model/CreateKnowledgebase201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteDocument()`

```php
deleteDocument($id, $document_id)
```

Удаление документа из базы знаний

Чтобы удалить документ из базы знаний, отправьте DELETE-запрос на `/api/v1/cloud-ai/knowledge-bases/{id}/documents/{document_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\KnowledgeBasesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 1; // int | ID базы знаний
$document_id = 1; // int | ID документа

try {
    $apiInstance->deleteDocument($id, $document_id);
} catch (Exception $e) {
    echo 'Exception when calling KnowledgeBasesApi->deleteDocument: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| ID базы знаний | |
| **document_id** | **int**| ID документа | |

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

## `deleteKnowledgebase()`

```php
deleteKnowledgebase($id)
```

Удаление базы знаний

Чтобы удалить базу знаний, отправьте DELETE-запрос на `/api/v1/cloud-ai/knowledge-bases/{id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\KnowledgeBasesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 1; // int | ID базы знаний

try {
    $apiInstance->deleteKnowledgebase($id);
} catch (Exception $e) {
    echo 'Exception when calling KnowledgeBasesApi->deleteKnowledgebase: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| ID базы знаний | |

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

## `downloadDocument()`

```php
downloadDocument($id, $document_id): \SplFileObject
```

Скачивание документа из базы знаний

Чтобы скачать документ из базы знаний, отправьте GET-запрос на `/api/v1/cloud-ai/knowledge-bases/{id}/documents/{document_id}/download`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\KnowledgeBasesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 1; // int | ID базы знаний
$document_id = 1; // int | ID документа

try {
    $result = $apiInstance->downloadDocument($id, $document_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling KnowledgeBasesApi->downloadDocument: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| ID базы знаний | |
| **document_id** | **int**| ID документа | |

### Return type

**\SplFileObject**

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/octet-stream`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getKnowledgebase()`

```php
getKnowledgebase($id): \OpenAPI\Client\Model\CreateKnowledgebase201Response
```

Получение базы знаний

Чтобы получить информацию о базе знаний, отправьте GET-запрос на `/api/v1/cloud-ai/knowledge-bases/{id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\KnowledgeBasesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 1; // int | ID базы знаний

try {
    $result = $apiInstance->getKnowledgebase($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling KnowledgeBasesApi->getKnowledgebase: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| ID базы знаний | |

### Return type

[**\OpenAPI\Client\Model\CreateKnowledgebase201Response**](../Model/CreateKnowledgebase201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getKnowledgebaseStatistics()`

```php
getKnowledgebaseStatistics($id, $start_time, $end_time, $interval): \OpenAPI\Client\Model\GetKnowledgebaseStatistics200Response
```

Получение статистики использования токенов базы знаний

Чтобы получить статистику использования токенов базы знаний, отправьте GET-запрос на `/api/v1/cloud-ai/knowledge-bases/{id}/statistic`.  Можно указать временной диапазон и интервал агрегации.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\KnowledgeBasesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 1; // int | ID базы знаний
$start_time = 2024-10-01T00:00Z; // \DateTime | Начало временного диапазона (ISO 8601)
$end_time = 2024-10-16T23:59:59.999Z; // \DateTime | Конец временного диапазона (ISO 8601)
$interval = 60; // float | Интервал в минутах (по умолчанию 60)

try {
    $result = $apiInstance->getKnowledgebaseStatistics($id, $start_time, $end_time, $interval);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling KnowledgeBasesApi->getKnowledgebaseStatistics: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| ID базы знаний | |
| **start_time** | **\DateTime**| Начало временного диапазона (ISO 8601) | [optional] |
| **end_time** | **\DateTime**| Конец временного диапазона (ISO 8601) | [optional] |
| **interval** | **float**| Интервал в минутах (по умолчанию 60) | [optional] [default to 60] |

### Return type

[**\OpenAPI\Client\Model\GetKnowledgebaseStatistics200Response**](../Model/GetKnowledgebaseStatistics200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getKnowledgebases()`

```php
getKnowledgebases(): \OpenAPI\Client\Model\GetKnowledgebases200Response
```

Получение списка баз знаний

Чтобы получить список баз знаний, отправьте GET-запрос на `/api/v1/cloud-ai/knowledge-bases`.  Тело ответа будет представлять собой объект JSON с ключом `knowledgebases`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\KnowledgeBasesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getKnowledgebases();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling KnowledgeBasesApi->getKnowledgebases: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\GetKnowledgebases200Response**](../Model/GetKnowledgebases200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `linkKnowledgebaseToAgent()`

```php
linkKnowledgebaseToAgent($id, $agent_id)
```

Привязка базы знаний к агенту

Чтобы привязать базу знаний к AI агенту, отправьте POST-запрос на `/api/v1/cloud-ai/knowledge-bases/{id}/link/{agent_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\KnowledgeBasesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 1; // int | ID базы знаний
$agent_id = 1; // int | ID агента

try {
    $apiInstance->linkKnowledgebaseToAgent($id, $agent_id);
} catch (Exception $e) {
    echo 'Exception when calling KnowledgeBasesApi->linkKnowledgebaseToAgent: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| ID базы знаний | |
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

## `reindexDocument()`

```php
reindexDocument($id, $document_id)
```

Переиндексация документа

Чтобы переиндексировать документ в базе знаний, отправьте POST-запрос на `/api/v1/cloud-ai/knowledge-bases/{id}/documents/{document_id}/reindex`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\KnowledgeBasesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 1; // int | ID базы знаний
$document_id = 1; // int | ID документа

try {
    $apiInstance->reindexDocument($id, $document_id);
} catch (Exception $e) {
    echo 'Exception when calling KnowledgeBasesApi->reindexDocument: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| ID базы знаний | |
| **document_id** | **int**| ID документа | |

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

## `unlinkKnowledgebaseFromAgent()`

```php
unlinkKnowledgebaseFromAgent($id, $agent_id)
```

Отвязка базы знаний от агента

Чтобы отвязать базу знаний от AI агента, отправьте DELETE-запрос на `/api/v1/cloud-ai/knowledge-bases/{id}/link/{agent_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\KnowledgeBasesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 1; // int | ID базы знаний
$agent_id = 1; // int | ID агента

try {
    $apiInstance->unlinkKnowledgebaseFromAgent($id, $agent_id);
} catch (Exception $e) {
    echo 'Exception when calling KnowledgeBasesApi->unlinkKnowledgebaseFromAgent: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| ID базы знаний | |
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

## `updateKnowledgebase()`

```php
updateKnowledgebase($id, $update_knowledgebase): \OpenAPI\Client\Model\CreateKnowledgebase201Response
```

Обновление базы знаний

Чтобы обновить базу знаний, отправьте PATCH-запрос на `/api/v1/cloud-ai/knowledge-bases/{id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\KnowledgeBasesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 1; // int | ID базы знаний
$update_knowledgebase = new \OpenAPI\Client\Model\UpdateKnowledgebase(); // \OpenAPI\Client\Model\UpdateKnowledgebase

try {
    $result = $apiInstance->updateKnowledgebase($id, $update_knowledgebase);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling KnowledgeBasesApi->updateKnowledgebase: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| ID базы знаний | |
| **update_knowledgebase** | [**\OpenAPI\Client\Model\UpdateKnowledgebase**](../Model/UpdateKnowledgebase.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateKnowledgebase201Response**](../Model/CreateKnowledgebase201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `uploadFilesToKnowledgebase()`

```php
uploadFilesToKnowledgebase($id, $files): \OpenAPI\Client\Model\UploadFilesToKnowledgebase200Response
```

Загрузка файлов в базу знаний

Чтобы загрузить файлы в базу знаний, отправьте POST-запрос на `/api/v1/cloud-ai/knowledge-bases/{id}/upload` с файлами в формате multipart/form-data.  Поддерживаемые форматы: CSV, XML, Markdown (md), HTML, TXT. JSON не поддерживается. Максимум 10 файлов, до 10 МБ каждый.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\KnowledgeBasesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 1; // int | ID базы знаний
$files = array("/path/to/file.txt"); // \SplFileObject[] | Файлы для загрузки (максимум 10 файлов, 10 МБ каждый)

try {
    $result = $apiInstance->uploadFilesToKnowledgebase($id, $files);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling KnowledgeBasesApi->uploadFilesToKnowledgebase: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| ID базы знаний | |
| **files** | **\SplFileObject[]**| Файлы для загрузки (максимум 10 файлов, 10 МБ каждый) | |

### Return type

[**\OpenAPI\Client\Model\UploadFilesToKnowledgebase200Response**](../Model/UploadFilesToKnowledgebase200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
