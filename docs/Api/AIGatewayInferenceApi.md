# OpenAPI\Client\AIGatewayInferenceApi

All URIs are relative to https://api.timeweb.cloud, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**cancelAiGatewayBatch()**](AIGatewayInferenceApi.md#cancelAiGatewayBatch) | **POST** /v1/batches/{batch_id}/cancel | Отмена батча |
| [**cancelAiGatewayResponse()**](AIGatewayInferenceApi.md#cancelAiGatewayResponse) | **POST** /v1/responses/{response_id}/cancel | Отмена фонового ответа (Responses API) |
| [**createAiGatewayBatch()**](AIGatewayInferenceApi.md#createAiGatewayBatch) | **POST** /v1/batches | Создание батча |
| [**createAiGatewayChatCompletion()**](AIGatewayInferenceApi.md#createAiGatewayChatCompletion) | **POST** /v1/chat/completions | Генерация ответа в диалоге (Chat Completions) |
| [**createAiGatewayCompletion()**](AIGatewayInferenceApi.md#createAiGatewayCompletion) | **POST** /v1/completions | Продолжение текста (Completions) |
| [**createAiGatewayEmbedding()**](AIGatewayInferenceApi.md#createAiGatewayEmbedding) | **POST** /v1/embeddings | Получение эмбеддингов |
| [**createAiGatewayImage()**](AIGatewayInferenceApi.md#createAiGatewayImage) | **POST** /v1/images/generations | Генерация изображений |
| [**createAiGatewayImageEdit()**](AIGatewayInferenceApi.md#createAiGatewayImageEdit) | **POST** /v1/images/edits | Редактирование изображений |
| [**createAiGatewayResponse()**](AIGatewayInferenceApi.md#createAiGatewayResponse) | **POST** /v1/responses | Создание ответа (Responses API) |
| [**createAiGatewaySpeech()**](AIGatewayInferenceApi.md#createAiGatewaySpeech) | **POST** /v1/audio/speech | Синтез речи |
| [**createAiGatewayTranscription()**](AIGatewayInferenceApi.md#createAiGatewayTranscription) | **POST** /v1/audio/transcriptions | Распознавание речи |
| [**deleteAiGatewayFile()**](AIGatewayInferenceApi.md#deleteAiGatewayFile) | **DELETE** /v1/files/{file_id} | Удаление файла |
| [**deleteAiGatewayResponse()**](AIGatewayInferenceApi.md#deleteAiGatewayResponse) | **DELETE** /v1/responses/{response_id} | Удаление ответа (Responses API) |
| [**downloadAiGatewayFileContent()**](AIGatewayInferenceApi.md#downloadAiGatewayFileContent) | **GET** /v1/files/{file_id}/content | Скачивание файла |
| [**getAiGatewayBatch()**](AIGatewayInferenceApi.md#getAiGatewayBatch) | **GET** /v1/batches/{batch_id} | Получение батча |
| [**getAiGatewayBatches()**](AIGatewayInferenceApi.md#getAiGatewayBatches) | **GET** /v1/batches | Получение списка батчей |
| [**getAiGatewayFile()**](AIGatewayInferenceApi.md#getAiGatewayFile) | **GET** /v1/files/{file_id} | Получение информации о файле |
| [**getAiGatewayModels()**](AIGatewayInferenceApi.md#getAiGatewayModels) | **GET** /v1/models | Получение списка моделей AI Gateway |
| [**getAiGatewayResponse()**](AIGatewayInferenceApi.md#getAiGatewayResponse) | **GET** /v1/responses/{response_id} | Получение ответа (Responses API) |
| [**uploadAiGatewayFile()**](AIGatewayInferenceApi.md#uploadAiGatewayFile) | **POST** /v1/files | Загрузка файла |


## `cancelAiGatewayBatch()`

```php
cancelAiGatewayBatch($batch_id): \OpenAPI\Client\Model\AiGatewayBatch
```
### URI(s):
- https://api.timeweb.ai 
Отмена батча

Чтобы отменить батч, отправьте POST-запрос на `/v1/batches/{batch_id}/cancel`.  Батч переходит в статус `cancelling`, отмена выполняется асинхронно и может занять несколько минут; итоговый статус `cancelled` проверяйте через `GET /v1/batches/{batch_id}`. Пока отмена не завершилась, входной файл батча удалить нельзя.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: AiGatewayKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIGatewayInferenceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$batch_id = batch_abc123; // string | ID батча

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->cancelAiGatewayBatch($batch_id, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIGatewayInferenceApi->cancelAiGatewayBatch: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **batch_id** | **string**| ID батча | |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

[**\OpenAPI\Client\Model\AiGatewayBatch**](../Model/AiGatewayBatch.md)

### Authorization

[AiGatewayKey](../../README.md#AiGatewayKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `cancelAiGatewayResponse()`

```php
cancelAiGatewayResponse($response_id): \OpenAPI\Client\Model\AiGatewayResponse
```
### URI(s):
- https://api.timeweb.ai 
Отмена фонового ответа (Responses API)

Чтобы отменить ответ, запущенный с `\"background\": true`, отправьте POST-запрос на `/v1/responses/{response_id}/cancel`.  Отмена может завершиться не сразу: итоговый статус `cancelled` проверяйте через `GET /v1/responses/{response_id}`. Ответ, созданный без `background`, отменить нельзя — вернётся ошибка 400. Неизвестный `response_id` также возвращает 400.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: AiGatewayKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIGatewayInferenceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$response_id = resp_abc123; // string | ID ответа Responses API

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->cancelAiGatewayResponse($response_id, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIGatewayInferenceApi->cancelAiGatewayResponse: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **response_id** | **string**| ID ответа Responses API | |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

[**\OpenAPI\Client\Model\AiGatewayResponse**](../Model/AiGatewayResponse.md)

### Authorization

[AiGatewayKey](../../README.md#AiGatewayKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createAiGatewayBatch()`

```php
createAiGatewayBatch($ai_gateway_batch_create_request): \OpenAPI\Client\Model\AiGatewayBatch
```
### URI(s):
- https://api.timeweb.ai 
Создание батча

Чтобы запустить асинхронную обработку входного файла, загруженного с `purpose=batch`, отправьте POST-запрос на `/v1/batches`.  При создании батча его оценочная стоимость резервируется на балансе, фактическая стоимость списывается по цене Batch API после выполнения. Модели, эндпоинты и коэффициенты цены Batch API — в поле `batch` каталога моделей (`GET https://api.timeweb.cloud/api/v3/cloud-ai/models`). Batch API доступен только для ключей AI Gateway.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: AiGatewayKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIGatewayInferenceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ai_gateway_batch_create_request = new \OpenAPI\Client\Model\AiGatewayBatchCreateRequest(); // \OpenAPI\Client\Model\AiGatewayBatchCreateRequest

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->createAiGatewayBatch($ai_gateway_batch_create_request, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIGatewayInferenceApi->createAiGatewayBatch: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ai_gateway_batch_create_request** | [**\OpenAPI\Client\Model\AiGatewayBatchCreateRequest**](../Model/AiGatewayBatchCreateRequest.md)|  | |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

[**\OpenAPI\Client\Model\AiGatewayBatch**](../Model/AiGatewayBatch.md)

### Authorization

[AiGatewayKey](../../README.md#AiGatewayKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createAiGatewayChatCompletion()`

```php
createAiGatewayChatCompletion($request_body): \OpenAPI\Client\Model\AiGatewayChatCompletion
```
### URI(s):
- https://api.timeweb.ai 
Генерация ответа в диалоге (Chat Completions)

Чтобы получить следующий ответ модели в диалоге, отправьте POST-запрос на `/v1/chat/completions`.  Запрос не хранит состояние: передавайте всю историю диалога в `messages`. Поддерживаются вызов функций (`tools`), структурированный ответ (`response_format`) и изображения во входных сообщениях (для моделей с поддержкой зрения).  С `\"stream\": true` ответ приходит потоком Server-Sent Events: события `chat.completion.chunk` в строках `data:`, в конце — `data: [DONE]`. С `\"stream_options\": {\"include_usage\": true}` последний чанк содержит расход токенов.  Если у ключа настроены запасные модели и запрошенная модель не ответила, запрос повторяется на запасных. Заголовок ответа `x-timeweb-attempted-fallbacks` показывает, сколько запасных моделей было опробовано.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: AiGatewayKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIGatewayInferenceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$request_body = NULL; // array<string,mixed>

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->createAiGatewayChatCompletion($request_body, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIGatewayInferenceApi->createAiGatewayChatCompletion: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **request_body** | [**array<string,mixed>**](../Model/mixed.md)|  | |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

[**\OpenAPI\Client\Model\AiGatewayChatCompletion**](../Model/AiGatewayChatCompletion.md)

### Authorization

[AiGatewayKey](../../README.md#AiGatewayKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `text/event-stream`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createAiGatewayCompletion()`

```php
createAiGatewayCompletion($request_body): \OpenAPI\Client\Model\AiGatewayCompletion
```
### URI(s):
- https://api.timeweb.ai 
Продолжение текста (Completions)

Чтобы получить продолжение текста `prompt`, отправьте POST-запрос на `/v1/completions`.  Это устаревший API OpenAI — для новых интеграций используйте `/v1/chat/completions`. С `\"stream\": true` ответ приходит потоком Server-Sent Events и заканчивается `data: [DONE]`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: AiGatewayKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIGatewayInferenceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$request_body = NULL; // array<string,mixed>

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->createAiGatewayCompletion($request_body, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIGatewayInferenceApi->createAiGatewayCompletion: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **request_body** | [**array<string,mixed>**](../Model/mixed.md)|  | |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

[**\OpenAPI\Client\Model\AiGatewayCompletion**](../Model/AiGatewayCompletion.md)

### Authorization

[AiGatewayKey](../../README.md#AiGatewayKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `text/event-stream`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createAiGatewayEmbedding()`

```php
createAiGatewayEmbedding($request_body): \OpenAPI\Client\Model\AiGatewayEmbeddingList
```
### URI(s):
- https://api.timeweb.ai 
Получение эмбеддингов

Чтобы получить векторные представления текстов, отправьте POST-запрос на `/v1/embeddings`.  Используйте модель с `mode: embedding` из `GET /v1/models`. Эмбеддинги возвращаются в порядке входных текстов.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: AiGatewayKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIGatewayInferenceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$request_body = NULL; // array<string,mixed>

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->createAiGatewayEmbedding($request_body, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIGatewayInferenceApi->createAiGatewayEmbedding: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **request_body** | [**array<string,mixed>**](../Model/mixed.md)|  | |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

[**\OpenAPI\Client\Model\AiGatewayEmbeddingList**](../Model/AiGatewayEmbeddingList.md)

### Authorization

[AiGatewayKey](../../README.md#AiGatewayKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createAiGatewayImage()`

```php
createAiGatewayImage($request_body): \OpenAPI\Client\Model\AiGatewayImagesResponse
```
### URI(s):
- https://api.timeweb.ai 
Генерация изображений

Чтобы сгенерировать изображения по текстовому описанию, отправьте POST-запрос на `/v1/images/generations`.  Используйте модель с `mode: image_generation` из `GET /v1/models`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: AiGatewayKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIGatewayInferenceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$request_body = NULL; // array<string,mixed>

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->createAiGatewayImage($request_body, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIGatewayInferenceApi->createAiGatewayImage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **request_body** | [**array<string,mixed>**](../Model/mixed.md)|  | |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

[**\OpenAPI\Client\Model\AiGatewayImagesResponse**](../Model/AiGatewayImagesResponse.md)

### Authorization

[AiGatewayKey](../../README.md#AiGatewayKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createAiGatewayImageEdit()`

```php
createAiGatewayImageEdit($model, $image, $prompt, $mask, $n, $size, $quality): \OpenAPI\Client\Model\AiGatewayImagesResponse
```
### URI(s):
- https://api.timeweb.ai 
Редактирование изображений

Чтобы изменить или дополнить изображения по описанию, отправьте POST-запрос на `/v1/images/edits` (multipart/form-data).  Доступно для моделей GPT Image (`openai/gpt-image-*`) и FLUX.2 (`black_forest_labs/flux-2-*`). Для других моделей, в том числе неизвестных, возвращается ошибка 405.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: AiGatewayKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIGatewayInferenceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$model = 'model_example'; // string | ID модели: GPT Image (`openai/gpt-image-*`) или FLUX.2 (`black_forest_labs/flux-2-*`)
$image = "/path/to/file.txt"; // \SplFileObject | Исходное изображение или несколько файлов в поле `image[]`
$prompt = 'prompt_example'; // string | Что изменить
$mask = "/path/to/file.txt"; // \SplFileObject | Маска: прозрачные области будут изменены
$n = 1; // int | Количество изображений
$size = 'size_example'; // string | Размер изображения
$quality = 'quality_example'; // string | Качество изображения

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->createAiGatewayImageEdit($model, $image, $prompt, $mask, $n, $size, $quality, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIGatewayInferenceApi->createAiGatewayImageEdit: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **model** | **string**| ID модели: GPT Image (&#x60;openai/gpt-image-*&#x60;) или FLUX.2 (&#x60;black_forest_labs/flux-2-*&#x60;) | |
| **image** | **\SplFileObject****\SplFileObject**| Исходное изображение или несколько файлов в поле &#x60;image[]&#x60; | |
| **prompt** | **string**| Что изменить | |
| **mask** | **\SplFileObject****\SplFileObject**| Маска: прозрачные области будут изменены | [optional] |
| **n** | **int**| Количество изображений | [optional] [default to 1] |
| **size** | **string**| Размер изображения | [optional] |
| **quality** | **string**| Качество изображения | [optional] |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

[**\OpenAPI\Client\Model\AiGatewayImagesResponse**](../Model/AiGatewayImagesResponse.md)

### Authorization

[AiGatewayKey](../../README.md#AiGatewayKey)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createAiGatewayResponse()`

```php
createAiGatewayResponse($request_body): \OpenAPI\Client\Model\AiGatewayResponse
```
### URI(s):
- https://api.timeweb.ai 
Создание ответа (Responses API)

Чтобы получить ответ модели через OpenAI Responses API, отправьте POST-запрос на `/v1/responses`.  Диалог можно продолжить по `previous_response_id`, долгие запросы — выполнить в фоне с `\"background\": true` и получать результат через `GET /v1/responses/{response_id}`.  С `\"stream\": true` ответ приходит потоком типизированных событий Server-Sent Events (`response.created`, `response.output_text.delta`, `response.completed` и др.), в конце потока — `data: [DONE]`.  Если у ключа настроены запасные модели и запрошенная модель не ответила, запрос повторяется на запасных (заголовок `x-timeweb-attempted-fallbacks`).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: AiGatewayKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIGatewayInferenceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$request_body = NULL; // array<string,mixed>

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->createAiGatewayResponse($request_body, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIGatewayInferenceApi->createAiGatewayResponse: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **request_body** | [**array<string,mixed>**](../Model/mixed.md)|  | |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

[**\OpenAPI\Client\Model\AiGatewayResponse**](../Model/AiGatewayResponse.md)

### Authorization

[AiGatewayKey](../../README.md#AiGatewayKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `text/event-stream`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createAiGatewaySpeech()`

```php
createAiGatewaySpeech($request_body): \SplFileObject
```
### URI(s):
- https://api.timeweb.ai 
Синтез речи

Чтобы озвучить текст, отправьте POST-запрос на `/v1/audio/speech`.  Используйте модель с `mode: audio_speech` из `GET /v1/models`. Ответ — аудиофайл в формате `response_format` (по умолчанию `mp3`).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: AiGatewayKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIGatewayInferenceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$request_body = NULL; // array<string,mixed>

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->createAiGatewaySpeech($request_body, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIGatewayInferenceApi->createAiGatewaySpeech: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **request_body** | [**array<string,mixed>**](../Model/mixed.md)|  | |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

**\SplFileObject**

### Authorization

[AiGatewayKey](../../README.md#AiGatewayKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `audio/mpeg`, `audio/wav`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createAiGatewayTranscription()`

```php
createAiGatewayTranscription($file, $model, $language, $prompt, $response_format, $temperature): \OpenAPI\Client\Model\AiGatewayTranscription
```
### URI(s):
- https://api.timeweb.ai 
Распознавание речи

Чтобы распознать речь в аудиофайле, отправьте POST-запрос на `/v1/audio/transcriptions` (multipart/form-data).  Доступно для моделей распознавания речи `*-transcribe` (например, `openai/gpt-4o-mini-transcribe`). Для других моделей, в том числе неизвестных, возвращается ошибка 405. Ответ возвращается в JSON.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: AiGatewayKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIGatewayInferenceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$file = "/path/to/file.txt"; // \SplFileObject | Аудиофайл
$model = 'model_example'; // string | ID модели распознавания речи (`*-transcribe`)
$language = 'language_example'; // string | Язык аудио в формате ISO-639-1
$prompt = 'prompt_example'; // string | Подсказка для распознавания: термины, имена, стиль
$response_format = 'response_format_example'; // string | Формат ответа
$temperature = 3.4; // float | Температура выборки

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->createAiGatewayTranscription($file, $model, $language, $prompt, $response_format, $temperature, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIGatewayInferenceApi->createAiGatewayTranscription: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **file** | **\SplFileObject****\SplFileObject**| Аудиофайл | |
| **model** | **string**| ID модели распознавания речи (&#x60;*-transcribe&#x60;) | |
| **language** | **string**| Язык аудио в формате ISO-639-1 | [optional] |
| **prompt** | **string**| Подсказка для распознавания: термины, имена, стиль | [optional] |
| **response_format** | **string**| Формат ответа | [optional] |
| **temperature** | **float**| Температура выборки | [optional] |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

[**\OpenAPI\Client\Model\AiGatewayTranscription**](../Model/AiGatewayTranscription.md)

### Authorization

[AiGatewayKey](../../README.md#AiGatewayKey)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteAiGatewayFile()`

```php
deleteAiGatewayFile($file_id): \OpenAPI\Client\Model\AiGatewayFileDeleted
```
### URI(s):
- https://api.timeweb.ai 
Удаление файла

Чтобы удалить файл, отправьте DELETE-запрос на `/v1/files/{file_id}`.  Входной файл батча, который ещё выполняется или отменяется, и результаты батча, расход которого ещё не списан, удалить нельзя — вернётся ошибка 409.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: AiGatewayKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIGatewayInferenceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$file_id = file-abc123; // string | ID файла

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->deleteAiGatewayFile($file_id, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIGatewayInferenceApi->deleteAiGatewayFile: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **file_id** | **string**| ID файла | |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

[**\OpenAPI\Client\Model\AiGatewayFileDeleted**](../Model/AiGatewayFileDeleted.md)

### Authorization

[AiGatewayKey](../../README.md#AiGatewayKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteAiGatewayResponse()`

```php
deleteAiGatewayResponse($response_id): \OpenAPI\Client\Model\AiGatewayResponseDeleted
```
### URI(s):
- https://api.timeweb.ai 
Удаление ответа (Responses API)

Чтобы удалить сохранённый ответ, отправьте DELETE-запрос на `/v1/responses/{response_id}`.  Неизвестный или уже удалённый `response_id` возвращает ошибку 400.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: AiGatewayKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIGatewayInferenceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$response_id = resp_abc123; // string | ID ответа Responses API

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->deleteAiGatewayResponse($response_id, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIGatewayInferenceApi->deleteAiGatewayResponse: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **response_id** | **string**| ID ответа Responses API | |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

[**\OpenAPI\Client\Model\AiGatewayResponseDeleted**](../Model/AiGatewayResponseDeleted.md)

### Authorization

[AiGatewayKey](../../README.md#AiGatewayKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `downloadAiGatewayFileContent()`

```php
downloadAiGatewayFileContent($file_id): \SplFileObject
```
### URI(s):
- https://api.timeweb.ai 
Скачивание файла

Чтобы скачать содержимое файла — например, результаты выполненного батча (`output_file_id`), — отправьте GET-запрос на `/v1/files/{file_id}/content`.  Перед скачиванием результатов получите батч через `GET /v1/batches/{batch_id}` и убедитесь, что он в статусе `completed`. Файлы с `purpose=user_data` скачать нельзя — вернётся ошибка 400.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: AiGatewayKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIGatewayInferenceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$file_id = file-abc123; // string | ID файла

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->downloadAiGatewayFileContent($file_id, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIGatewayInferenceApi->downloadAiGatewayFileContent: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **file_id** | **string**| ID файла | |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

**\SplFileObject**

### Authorization

[AiGatewayKey](../../README.md#AiGatewayKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/octet-stream`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAiGatewayBatch()`

```php
getAiGatewayBatch($batch_id): \OpenAPI\Client\Model\AiGatewayBatch
```
### URI(s):
- https://api.timeweb.ai 
Получение батча

Чтобы получить статус батча, отправьте GET-запрос на `/v1/batches/{batch_id}`.  Когда статус станет `completed`, скачайте результаты по `output_file_id` через `GET /v1/files/{file_id}/content`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: AiGatewayKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIGatewayInferenceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$batch_id = batch_abc123; // string | ID батча

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->getAiGatewayBatch($batch_id, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIGatewayInferenceApi->getAiGatewayBatch: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **batch_id** | **string**| ID батча | |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

[**\OpenAPI\Client\Model\AiGatewayBatch**](../Model/AiGatewayBatch.md)

### Authorization

[AiGatewayKey](../../README.md#AiGatewayKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAiGatewayBatches()`

```php
getAiGatewayBatches($limit, $after): \OpenAPI\Client\Model\AiGatewayBatchList
```
### URI(s):
- https://api.timeweb.ai 
Получение списка батчей

Чтобы получить список батчей, отправьте GET-запрос на `/v1/batches`.  Для следующей страницы передайте в `after` значение `last_id`, пока `has_more` равно `true`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: AiGatewayKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIGatewayInferenceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$limit = 20; // int | Количество батчей на странице
$after = batch_abc123; // string | Вернуть батчи после батча с этим ID (значение `last_id` предыдущей страницы)

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->getAiGatewayBatches($limit, $after, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIGatewayInferenceApi->getAiGatewayBatches: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **limit** | **int**| Количество батчей на странице | [optional] |
| **after** | **string**| Вернуть батчи после батча с этим ID (значение &#x60;last_id&#x60; предыдущей страницы) | [optional] |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

[**\OpenAPI\Client\Model\AiGatewayBatchList**](../Model/AiGatewayBatchList.md)

### Authorization

[AiGatewayKey](../../README.md#AiGatewayKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAiGatewayFile()`

```php
getAiGatewayFile($file_id): \OpenAPI\Client\Model\AiGatewayFile
```
### URI(s):
- https://api.timeweb.ai 
Получение информации о файле

Чтобы получить информацию о загруженном файле, отправьте GET-запрос на `/v1/files/{file_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: AiGatewayKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIGatewayInferenceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$file_id = file-abc123; // string | ID файла

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->getAiGatewayFile($file_id, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIGatewayInferenceApi->getAiGatewayFile: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **file_id** | **string**| ID файла | |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

[**\OpenAPI\Client\Model\AiGatewayFile**](../Model/AiGatewayFile.md)

### Authorization

[AiGatewayKey](../../README.md#AiGatewayKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAiGatewayModels()`

```php
getAiGatewayModels(): \OpenAPI\Client\Model\AiGatewayModelList
```
### URI(s):
- https://api.timeweb.ai 
Получение списка моделей AI Gateway

Чтобы получить список моделей, доступных ключу, отправьте GET-запрос на `/v1/models`.  Поле `mode` показывает назначение модели. В списке могут оставаться модели, снятые с обслуживания: запросы к ним возвращают ошибку 410. Актуальный статус, цены и возможности моделей — в каталоге `GET https://api.timeweb.cloud/api/v3/cloud-ai/models` (снятые модели — `is_stopped: true`).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: AiGatewayKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIGatewayInferenceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->getAiGatewayModels($hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIGatewayInferenceApi->getAiGatewayModels: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

[**\OpenAPI\Client\Model\AiGatewayModelList**](../Model/AiGatewayModelList.md)

### Authorization

[AiGatewayKey](../../README.md#AiGatewayKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAiGatewayResponse()`

```php
getAiGatewayResponse($response_id): \OpenAPI\Client\Model\AiGatewayResponse
```
### URI(s):
- https://api.timeweb.ai 
Получение ответа (Responses API)

Чтобы получить сохранённый ответ — например, дождаться завершения фонового ответа, — отправьте GET-запрос на `/v1/responses/{response_id}`.  Неизвестный или удалённый `response_id` возвращает ошибку 400.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: AiGatewayKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIGatewayInferenceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$response_id = resp_abc123; // string | ID ответа Responses API

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->getAiGatewayResponse($response_id, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIGatewayInferenceApi->getAiGatewayResponse: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **response_id** | **string**| ID ответа Responses API | |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

[**\OpenAPI\Client\Model\AiGatewayResponse**](../Model/AiGatewayResponse.md)

### Authorization

[AiGatewayKey](../../README.md#AiGatewayKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `uploadAiGatewayFile()`

```php
uploadAiGatewayFile($file, $purpose, $model, $target_model_names): \OpenAPI\Client\Model\AiGatewayFile
```
### URI(s):
- https://api.timeweb.ai 
Загрузка файла

Чтобы загрузить файл, отправьте POST-запрос на `/v1/files` (multipart/form-data).  Файл загружается для конкретной модели, поэтому `model` (или `target_model_names`) обязателен: - `purpose=batch` — входной JSONL-файл Batch API. Все строки должны обращаться к одной модели — той, что указана в `model`, иначе вернётся 400. Размер — до 50 МБ и до 50 000 запросов; - `user_data` и другие назначения OpenAI — файлы, на которые можно сослаться по `file_id` в сообщениях.  Загрузка бесплатна. Сохраняйте `id` загруженных файлов: получить список файлов нельзя (`GET /v1/files` возвращает 405).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: AiGatewayKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AIGatewayInferenceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$file = "/path/to/file.txt"; // \SplFileObject | Файл. Для Batch API — JSONL, по одному запросу в строке
$purpose = 'purpose_example'; // string | Назначение: `batch` — входной файл Batch API, `user_data` и другие назначения OpenAI — файлы для передачи модели
$model = 'model_example'; // string | Модель, для которой загружается файл. Обязателен, если не передан `target_model_names`
$target_model_names = 'target_model_names_example'; // string | Список моделей через запятую — вместо `model`

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->uploadAiGatewayFile($file, $purpose, $model, $target_model_names, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIGatewayInferenceApi->uploadAiGatewayFile: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **file** | **\SplFileObject****\SplFileObject**| Файл. Для Batch API — JSONL, по одному запросу в строке | |
| **purpose** | **string**| Назначение: &#x60;batch&#x60; — входной файл Batch API, &#x60;user_data&#x60; и другие назначения OpenAI — файлы для передачи модели | |
| **model** | **string**| Модель, для которой загружается файл. Обязателен, если не передан &#x60;target_model_names&#x60; | [optional] |
| **target_model_names** | **string**| Список моделей через запятую — вместо &#x60;model&#x60; | [optional] |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

[**\OpenAPI\Client\Model\AiGatewayFile**](../Model/AiGatewayFile.md)

### Authorization

[AiGatewayKey](../../README.md#AiGatewayKey)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
