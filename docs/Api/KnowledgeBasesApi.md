# OpenAPI\Client\KnowledgeBasesApi

All URIs are relative to https://api.timeweb.cloud, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**addAdditionalTokenPackageToKnowledgebase()**](KnowledgeBasesApi.md#addAdditionalTokenPackageToKnowledgebase) | **POST** /api/v1/cloud-ai/knowledge-bases/{id}/add-additional-token-package | Покупка дополнительных пакетов токенов |
| [**createKnowledgebase()**](KnowledgeBasesApi.md#createKnowledgebase) | **POST** /api/v1/cloud-ai/knowledge-bases | Создание базы знаний |
| [**createKnowledgebaseDocument()**](KnowledgeBasesApi.md#createKnowledgebaseDocument) | **POST** /api/v1/cloud-ai/knowledge-bases/{id}/documents | Добавление документа по ссылке |
| [**deleteDocument()**](KnowledgeBasesApi.md#deleteDocument) | **DELETE** /api/v1/cloud-ai/knowledge-bases/{id}/documents/{document_id} | Удаление документа из базы знаний |
| [**deleteKnowledgebase()**](KnowledgeBasesApi.md#deleteKnowledgebase) | **DELETE** /api/v1/cloud-ai/knowledge-bases/{id} | Удаление базы знаний |
| [**downloadDocument()**](KnowledgeBasesApi.md#downloadDocument) | **GET** /api/v1/cloud-ai/knowledge-bases/{id}/documents/{document_id}/download | Скачивание файла документа |
| [**getKnowledgebase()**](KnowledgeBasesApi.md#getKnowledgebase) | **GET** /api/v1/cloud-ai/knowledge-bases/{id} | Получение базы знаний со списком документов |
| [**getKnowledgebaseDocumentsV2()**](KnowledgeBasesApi.md#getKnowledgebaseDocumentsV2) | **GET** /api/v2/cloud-ai/knowledge-bases/{id}/documents | Получение списка документов базы знаний |
| [**getKnowledgebaseV3()**](KnowledgeBasesApi.md#getKnowledgebaseV3) | **GET** /api/v3/cloud-ai/knowledge-bases/{id} | Получение базы знаний |
| [**getKnowledgebases()**](KnowledgeBasesApi.md#getKnowledgebases) | **GET** /api/v1/cloud-ai/knowledge-bases | Получение списка баз знаний (v1) |
| [**getKnowledgebasesV2()**](KnowledgeBasesApi.md#getKnowledgebasesV2) | **GET** /api/v2/cloud-ai/knowledge-bases | Получение списка баз знаний (v2) |
| [**getKnowledgebasesV3()**](KnowledgeBasesApi.md#getKnowledgebasesV3) | **GET** /api/v3/cloud-ai/knowledge-bases | Получение списка баз знаний |
| [**linkKnowledgebaseToAgent()**](KnowledgeBasesApi.md#linkKnowledgebaseToAgent) | **POST** /api/v1/cloud-ai/knowledge-bases/{id}/link/{agent_id} | Привязка базы знаний к агенту |
| [**reindexDocument()**](KnowledgeBasesApi.md#reindexDocument) | **POST** /api/v1/cloud-ai/knowledge-bases/{id}/documents/{document_id}/reindex | Переиндексация документа |
| [**unlinkKnowledgebaseFromAgent()**](KnowledgeBasesApi.md#unlinkKnowledgebaseFromAgent) | **DELETE** /api/v1/cloud-ai/knowledge-bases/{id}/link/{agent_id} | Отвязка базы знаний от агента |
| [**updateKnowledgebase()**](KnowledgeBasesApi.md#updateKnowledgebase) | **PATCH** /api/v1/cloud-ai/knowledge-bases/{id} | Изменение базы знаний |
| [**updateKnowledgebaseAgentLink()**](KnowledgeBasesApi.md#updateKnowledgebaseAgentLink) | **PATCH** /api/v1/cloud-ai/knowledge-bases/{id}/link/{agent_id} | Изменение режима поиска по базе знаний для агента |
| [**updateKnowledgebaseDocument()**](KnowledgeBasesApi.md#updateKnowledgebaseDocument) | **PATCH** /api/v1/cloud-ai/knowledge-bases/{id}/documents/{document_id} | Изменение документа |
| [**uploadFilesToKnowledgebase()**](KnowledgeBasesApi.md#uploadFilesToKnowledgebase) | **POST** /api/v1/cloud-ai/knowledge-bases/{id}/upload | Загрузка файлов в базу знаний |


## `addAdditionalTokenPackageToKnowledgebase()`

```php
addAdditionalTokenPackageToKnowledgebase($id, $knowledgebase_add_token_package)
```

Покупка дополнительных пакетов токенов

Чтобы докупить токены для базы знаний, отправьте POST-запрос на `/api/v1/cloud-ai/knowledge-bases/{id}/add-additional-token-package`.  Покупается дополнительный пакет (`package_type: additional`) из `GET /api/v1/cloud-ai/token-packages/knowledge-bases` в количестве `count`. Стоимость списывается с баланса, токены добавляются к текущему периоду подписки, заблокированная база знаний разблокируется.  Возможные ошибки: - `400 insufficient_balance` — на балансе недостаточно средств - `400 subscription_expired` — база знаний заблокирована и дата продления подписки прошла: продлите подписку в панели управления - `404 additional_token_package_not_found` — дополнительный пакет недоступен

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
$knowledgebase_add_token_package = new \OpenAPI\Client\Model\KnowledgebaseAddTokenPackage(); // \OpenAPI\Client\Model\KnowledgebaseAddTokenPackage

try {
    $apiInstance->addAdditionalTokenPackageToKnowledgebase($id, $knowledgebase_add_token_package);
} catch (Exception $e) {
    echo 'Exception when calling KnowledgeBasesApi->addAdditionalTokenPackageToKnowledgebase: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| ID базы знаний | |
| **knowledgebase_add_token_package** | [**\OpenAPI\Client\Model\KnowledgebaseAddTokenPackage**](../Model/KnowledgebaseAddTokenPackage.md)|  | [optional] |

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

Чтобы создать базу знаний, отправьте POST-запрос на `/api/v1/cloud-ai/knowledge-bases`, задав необходимые атрибуты.  Для базы знаний в вашем аккаунте создаётся кластер базы данных OpenSearch по выбранному тарифу в указанной приватной сети, а с баланса сразу списывается стоимость пакета токенов. Подписка продлевается автоматически раз в период пакета.  Пока кластер создаётся, база знаний находится в статусе `creating`; документы, добавленные в это время, будут проиндексированы после перехода в `active`.  Возможные ошибки: - `404 token_package_not_found` — пакет токенов не найден или недоступен - `400 invalid_token_package_type` — пакет не является базовым пакетом для баз знаний - `400 insufficient_balance` — на балансе недостаточно средств для оплаты пакета  Тело ответа будет представлять собой объект JSON с ключом `knowledge_base`.

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

## `createKnowledgebaseDocument()`

```php
createKnowledgebaseDocument($id, $create_document): \OpenAPI\Client\Model\CreateKnowledgebaseDocument201Response
```

Добавление документа по ссылке

Чтобы добавить в базу знаний документ по ссылке, отправьте POST-запрос на `/api/v1/cloud-ai/knowledge-bases/{id}/documents`.  Перед добавлением выполняется HEAD-запрос к `url`: адрес должен быть публично доступен, а ответ — содержать заголовок `Content-Type` одного из поддерживаемых форматов (текст, Markdown, HTML, XML, CSV, PDF, DOC, DOCX, XLS, XLSX; JSON не поддерживается). Документ сразу ставится в очередь на индексацию. Чтобы содержимое по ссылке переиндексировалось автоматически, задайте `indexing_schedule`.  Возможные ошибки: - `400 url_is_not_accessible` — адрес недоступен или вернул ошибку - `400 unsupported_file_type` — неподдерживаемый `Content-Type`  Тело ответа будет представлять собой объект JSON с ключом `document`.

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
$create_document = new \OpenAPI\Client\Model\CreateDocument(); // \OpenAPI\Client\Model\CreateDocument

try {
    $result = $apiInstance->createKnowledgebaseDocument($id, $create_document);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling KnowledgeBasesApi->createKnowledgebaseDocument: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| ID базы знаний | |
| **create_document** | [**\OpenAPI\Client\Model\CreateDocument**](../Model/CreateDocument.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateKnowledgebaseDocument201Response**](../Model/CreateKnowledgebaseDocument201Response.md)

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

Чтобы удалить документ из базы знаний, отправьте DELETE-запрос на `/api/v1/cloud-ai/knowledge-bases/{id}/documents/{document_id}`.  Документ удаляется вместе с его фрагментами в поисковом индексе.

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
$document_id = 286071; // int | ID документа

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

Чтобы удалить базу знаний, отправьте DELETE-запрос на `/api/v1/cloud-ai/knowledge-bases/{id}`.  База знаний отвязывается от всех агентов, её кластер базы данных OpenSearch удаляется, подписка закрывается.

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

Скачивание файла документа

Чтобы скачать загруженный файл документа, отправьте GET-запрос на `/api/v1/cloud-ai/knowledge-bases/{id}/documents/{document_id}/download`.  Доступно только для документов типа `file`. Файл возвращается потоком с исходным MIME-типом в заголовке `Content-Type` и именем в `Content-Disposition`.

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
$document_id = 286071; // int | ID документа

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

Получение базы знаний со списком документов

Чтобы получить информацию о базе знаний вместе со всеми её документами, отправьте GET-запрос на `/api/v1/cloud-ai/knowledge-bases/{id}`.  Тело ответа будет представлять собой объект JSON с ключом `knowledge_base`.

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

## `getKnowledgebaseDocumentsV2()`

```php
getKnowledgebaseDocumentsV2($id, $limit, $offset, $sort_by, $sort_order, $search): \OpenAPI\Client\Model\GetKnowledgebaseDocumentsV2200Response
```

Получение списка документов базы знаний

Чтобы получить список документов базы знаний с пагинацией, отправьте GET-запрос на `/api/v2/cloud-ai/knowledge-bases/{id}/documents`.  Некорректные значения параметров пагинации и сортировки не приводят к ошибке — вместо них применяются значения по умолчанию.  Тело ответа будет представлять собой объект JSON с ключами `knowledgebase_documents` и `meta`.

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
$limit = 20; // int | Количество документов на странице. Значения больше 100 уменьшаются до 100
$offset = 0; // int | Количество документов, которые нужно пропустить
$sort_by = name; // string | Поле сортировки. `indexing_timestamp` — время последнего изменения документа
$sort_order = ASC; // string | Порядок сортировки
$search = faq; // string | Фильтр по подстроке в названии документа

try {
    $result = $apiInstance->getKnowledgebaseDocumentsV2($id, $limit, $offset, $sort_by, $sort_order, $search);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling KnowledgeBasesApi->getKnowledgebaseDocumentsV2: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| ID базы знаний | |
| **limit** | **int**| Количество документов на странице. Значения больше 100 уменьшаются до 100 | [optional] [default to 10] |
| **offset** | **int**| Количество документов, которые нужно пропустить | [optional] [default to 0] |
| **sort_by** | **string**| Поле сортировки. &#x60;indexing_timestamp&#x60; — время последнего изменения документа | [optional] [default to &#39;indexing_timestamp&#39;] |
| **sort_order** | **string**| Порядок сортировки | [optional] [default to &#39;DESC&#39;] |
| **search** | **string**| Фильтр по подстроке в названии документа | [optional] |

### Return type

[**\OpenAPI\Client\Model\GetKnowledgebaseDocumentsV2200Response**](../Model/GetKnowledgebaseDocumentsV2200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getKnowledgebaseV3()`

```php
getKnowledgebaseV3($id): \OpenAPI\Client\Model\GetKnowledgebaseV3200Response
```

Получение базы знаний

Чтобы получить информацию о базе знаний, отправьте GET-запрос на `/api/v3/cloud-ai/knowledge-bases/{id}`.  Тело ответа будет представлять собой объект JSON с ключом `knowledge_base`.

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
    $result = $apiInstance->getKnowledgebaseV3($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling KnowledgeBasesApi->getKnowledgebaseV3: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| ID базы знаний | |

### Return type

[**\OpenAPI\Client\Model\GetKnowledgebaseV3200Response**](../Model/GetKnowledgebaseV3200Response.md)

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

Получение списка баз знаний (v1)

Метод устарел — используйте `GET /api/v3/cloud-ai/knowledge-bases`.  Чтобы получить список баз знаний вместе со всеми их документами, отправьте GET-запрос на `/api/v1/cloud-ai/knowledge-bases`.  Тело ответа будет представлять собой объект JSON с ключами `knowledge_bases` и `meta`.

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

## `getKnowledgebasesV2()`

```php
getKnowledgebasesV2(): \OpenAPI\Client\Model\GetKnowledgebasesV2200Response
```

Получение списка баз знаний (v2)

Чтобы получить список баз знаний, отправьте GET-запрос на `/api/v2/cloud-ai/knowledge-bases`.  Вместо списка документов возвращается их количество, привязанные агенты — списком ID. Режим поиска для каждого агента возвращает `GET /api/v3/cloud-ai/knowledge-bases`.  Тело ответа будет представлять собой объект JSON с ключами `knowledge_bases` и `meta`.

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
    $result = $apiInstance->getKnowledgebasesV2();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling KnowledgeBasesApi->getKnowledgebasesV2: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\GetKnowledgebasesV2200Response**](../Model/GetKnowledgebasesV2200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getKnowledgebasesV3()`

```php
getKnowledgebasesV3(): \OpenAPI\Client\Model\GetKnowledgebasesV3200Response
```

Получение списка баз знаний

Чтобы получить список баз знаний, отправьте GET-запрос на `/api/v3/cloud-ai/knowledge-bases`.  Ответ содержит количество документов и привязанных агентов с режимом поиска. Документы базы знаний запрашивайте отдельно — `GET /api/v2/cloud-ai/knowledge-bases/{id}/documents`.  Тело ответа будет представлять собой объект JSON с ключами `knowledge_bases` и `meta`.

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
    $result = $apiInstance->getKnowledgebasesV3();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling KnowledgeBasesApi->getKnowledgebasesV3: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\GetKnowledgebasesV3200Response**](../Model/GetKnowledgebasesV3200Response.md)

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
linkKnowledgebaseToAgent($id, $agent_id, $link_knowledgebase)
```

Привязка базы знаний к агенту

Чтобы привязать базу знаний к AI агенту, отправьте POST-запрос на `/api/v1/cloud-ai/knowledge-bases/{id}/link/{agent_id}`.  Тело запроса необязательно: в нём можно выбрать режим поиска `retrievalMode` (по умолчанию `agentic`). Изменить режим для существующей привязки можно запросом PATCH на тот же адрес.  Возможные ошибки: `404 knowledgebase_not_found`, `404 agent_not_found`.

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
$agent_id = 101; // int | ID AI агента
$link_knowledgebase = new \OpenAPI\Client\Model\LinkKnowledgebase(); // \OpenAPI\Client\Model\LinkKnowledgebase

try {
    $apiInstance->linkKnowledgebaseToAgent($id, $agent_id, $link_knowledgebase);
} catch (Exception $e) {
    echo 'Exception when calling KnowledgeBasesApi->linkKnowledgebaseToAgent: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| ID базы знаний | |
| **agent_id** | **int**| ID AI агента | |
| **link_knowledgebase** | [**\OpenAPI\Client\Model\LinkKnowledgebase**](../Model/LinkKnowledgebase.md)|  | [optional] |

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

## `reindexDocument()`

```php
reindexDocument($id, $document_id)
```

Переиндексация документа

Чтобы переиндексировать документ, отправьте POST-запрос на `/api/v1/cloud-ai/knowledge-bases/{id}/documents/{document_id}/reindex`.  Документ ставится в очередь на индексацию; следите за полем `status` документа. Для документа по ссылке содержимое скачивается заново. Если база знаний не в статусе `active`, документ будет проиндексирован после активации.  Возможные ошибки: `404 knowledgebase_not_found`, `404 document_not_found`.

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
$document_id = 286071; // int | ID документа

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

Чтобы отвязать базу знаний от AI агента, отправьте DELETE-запрос на `/api/v1/cloud-ai/knowledge-bases/{id}/link/{agent_id}`.  Возможные ошибки: `404 knowledgebase_not_found`, `404 agent_not_found`.

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
$agent_id = 101; // int | ID AI агента

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
| **agent_id** | **int**| ID AI агента | |

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

Изменение базы знаний

Чтобы изменить название или описание базы знаний, отправьте PATCH-запрос на `/api/v1/cloud-ai/knowledge-bases/{id}`.  Тело ответа будет представлять собой объект JSON с ключом `knowledge_base`.

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

## `updateKnowledgebaseAgentLink()`

```php
updateKnowledgebaseAgentLink($id, $agent_id, $link_knowledgebase)
```

Изменение режима поиска по базе знаний для агента

Чтобы изменить режим поиска по привязанной базе знаний для AI агента, отправьте PATCH-запрос на `/api/v1/cloud-ai/knowledge-bases/{id}/link/{agent_id}`.  Если `retrievalMode` не передан, устанавливается `agentic`. Если база знаний не привязана к агенту, запрос ничего не меняет и также возвращает `204`.  Возможные ошибки: `404 knowledgebase_not_found`, `404 agent_not_found`.

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
$agent_id = 101; // int | ID AI агента
$link_knowledgebase = new \OpenAPI\Client\Model\LinkKnowledgebase(); // \OpenAPI\Client\Model\LinkKnowledgebase

try {
    $apiInstance->updateKnowledgebaseAgentLink($id, $agent_id, $link_knowledgebase);
} catch (Exception $e) {
    echo 'Exception when calling KnowledgeBasesApi->updateKnowledgebaseAgentLink: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| ID базы знаний | |
| **agent_id** | **int**| ID AI агента | |
| **link_knowledgebase** | [**\OpenAPI\Client\Model\LinkKnowledgebase**](../Model/LinkKnowledgebase.md)|  | [optional] |

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

## `updateKnowledgebaseDocument()`

```php
updateKnowledgebaseDocument($id, $document_id, $update_document): \OpenAPI\Client\Model\CreateKnowledgebaseDocument201Response
```

Изменение документа

Чтобы изменить документ базы знаний, отправьте PATCH-запрос на `/api/v1/cloud-ai/knowledge-bases/{id}/documents/{document_id}`.  Можно изменить название, расписание переиндексации и — только для документов типа `link` — адрес. После смены адреса документ переиндексируется; изменение названия и расписания переиндексацию не запускает. Новый адрес проверяется так же, как при добавлении документа.  Тело ответа будет представлять собой объект JSON с ключом `document`.

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
$document_id = 286071; // int | ID документа
$update_document = new \OpenAPI\Client\Model\UpdateDocument(); // \OpenAPI\Client\Model\UpdateDocument

try {
    $result = $apiInstance->updateKnowledgebaseDocument($id, $document_id, $update_document);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling KnowledgeBasesApi->updateKnowledgebaseDocument: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| ID базы знаний | |
| **document_id** | **int**| ID документа | |
| **update_document** | [**\OpenAPI\Client\Model\UpdateDocument**](../Model/UpdateDocument.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateKnowledgebaseDocument201Response**](../Model/CreateKnowledgebaseDocument201Response.md)

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
uploadFilesToKnowledgebase($id, $files): \OpenAPI\Client\Model\UploadResult
```

Загрузка файлов в базу знаний

Чтобы загрузить файлы в базу знаний, отправьте POST-запрос на `/api/v1/cloud-ai/knowledge-bases/{id}/upload` с файлами в поле `files` формата `multipart/form-data`. Для каждого файла создаётся документ типа `file`, после загрузки документы ставятся в очередь на индексацию (если база знаний в статусе `active`; иначе — после активации).  Поддерживаемые форматы: TXT, Markdown (`md`, `markdown`), HTML (`html`, `htm`), XML, CSV, PDF, DOC, DOCX, XLS, XLSX, а также другие файлы с MIME-типом `text/_*`. JSON (`json`, `jsonl`, `ndjson`) не поддерживается. Размер одного файла — не более 50 МБ.  Если хотя бы один файл неподдерживаемого формата, запрос завершается ошибкой.  Тело ответа будет представлять собой объект JSON с ключами `uploadedFiles` и `documents`.

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
$files = array("/path/to/file.txt"); // \SplFileObject[] | Файлы для загрузки

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
| **files** | **\SplFileObject[]**| Файлы для загрузки | |

### Return type

[**\OpenAPI\Client\Model\UploadResult**](../Model/UploadResult.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
