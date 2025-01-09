# OpenAPI\Client\ImagesApi

All URIs are relative to https://api.timeweb.cloud, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createImage()**](ImagesApi.md#createImage) | **POST** /api/v1/images | Создание образа |
| [**createImageDownloadUrl()**](ImagesApi.md#createImageDownloadUrl) | **POST** /api/v1/images/{image_id}/download-url | Создание ссылки на скачивание образа |
| [**deleteImage()**](ImagesApi.md#deleteImage) | **DELETE** /api/v1/images/{image_id} | Удаление образа |
| [**deleteImageDownloadURL()**](ImagesApi.md#deleteImageDownloadURL) | **DELETE** /api/v1/images/{image_id}/download-url/{image_url_id} | Удаление ссылки на образ |
| [**getImage()**](ImagesApi.md#getImage) | **GET** /api/v1/images/{image_id} | Получение информации о образе |
| [**getImageDownloadURL()**](ImagesApi.md#getImageDownloadURL) | **GET** /api/v1/images/{image_id}/download-url/{image_url_id} | Получение информации о ссылке на скачивание образа |
| [**getImageDownloadURLs()**](ImagesApi.md#getImageDownloadURLs) | **GET** /api/v1/images/{image_id}/download-url | Получение информации о ссылках на скачивание образов |
| [**getImages()**](ImagesApi.md#getImages) | **GET** /api/v1/images | Получение списка образов |
| [**updateImage()**](ImagesApi.md#updateImage) | **PATCH** /api/v1/images/{image_id} | Обновление информации о образе |
| [**uploadImage()**](ImagesApi.md#uploadImage) | **POST** /api/v1/images/{image_id} | Загрузка образа |


## `createImage()`

```php
createImage($image_in_api): \OpenAPI\Client\Model\ImageOutResponse
```

Создание образа

Чтобы создать образ, отправьте POST запрос в `/api/v1/images`, задав необходимые атрибуты.   Для загрузки собственного образа вам нужно отправить параметры `location`, `os` и не указывать `disk_id`. Поддерживается два способа загрузки:  1. По ссылке. Для этого укажите `upload_url` с ссылкой на загрузку образа 2. Из файла. Для этого воспользуйтесь методом POST `/api/v1/images/{image_id}` Образ будет создан с использованием предоставленной информации.    Тело ответа будет содержать объект JSON с информацией о созданном образе.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ImagesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$image_in_api = new \OpenAPI\Client\Model\ImageInAPI(); // \OpenAPI\Client\Model\ImageInAPI

try {
    $result = $apiInstance->createImage($image_in_api);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ImagesApi->createImage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **image_in_api** | [**\OpenAPI\Client\Model\ImageInAPI**](../Model/ImageInAPI.md)|  | |

### Return type

[**\OpenAPI\Client\Model\ImageOutResponse**](../Model/ImageOutResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createImageDownloadUrl()`

```php
createImageDownloadUrl($image_id, $image_url_in): \OpenAPI\Client\Model\ImageDownloadResponse
```

Создание ссылки на скачивание образа

Чтобы создать ссылку на скачивание образа, отправьте запрос POST в `/api/v1/images/{image_id}/download-url`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ImagesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$image_id = 'image_id_example'; // string | ID образа
$image_url_in = new \OpenAPI\Client\Model\ImageUrlIn(); // \OpenAPI\Client\Model\ImageUrlIn

try {
    $result = $apiInstance->createImageDownloadUrl($image_id, $image_url_in);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ImagesApi->createImageDownloadUrl: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **image_id** | **string**| ID образа | |
| **image_url_in** | [**\OpenAPI\Client\Model\ImageUrlIn**](../Model/ImageUrlIn.md)|  | |

### Return type

[**\OpenAPI\Client\Model\ImageDownloadResponse**](../Model/ImageDownloadResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteImage()`

```php
deleteImage($image_id)
```

Удаление образа

Чтобы удалить образ, отправьте запрос DELETE в `/api/v1/images/{image_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ImagesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$image_id = 'image_id_example'; // string | ID образа

try {
    $apiInstance->deleteImage($image_id);
} catch (Exception $e) {
    echo 'Exception when calling ImagesApi->deleteImage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **image_id** | **string**| ID образа | |

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

## `deleteImageDownloadURL()`

```php
deleteImageDownloadURL($image_id, $image_url_id)
```

Удаление ссылки на образ

Чтобы удалить ссылку на образ, отправьте DELETE запрос в `/api/v1/images/{image_id}/download-url/{image_url_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ImagesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$image_id = 'image_id_example'; // string | ID образа
$image_url_id = 'image_url_id_example'; // string | ID ссылки

try {
    $apiInstance->deleteImageDownloadURL($image_id, $image_url_id);
} catch (Exception $e) {
    echo 'Exception when calling ImagesApi->deleteImageDownloadURL: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **image_id** | **string**| ID образа | |
| **image_url_id** | **string**| ID ссылки | |

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

## `getImage()`

```php
getImage($image_id): \OpenAPI\Client\Model\ImageOutResponse
```

Получение информации о образе

Чтобы получить образ, отправьте запрос GET в `/api/v1/images/{image_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ImagesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$image_id = 'image_id_example'; // string | ID образа

try {
    $result = $apiInstance->getImage($image_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ImagesApi->getImage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **image_id** | **string**| ID образа | |

### Return type

[**\OpenAPI\Client\Model\ImageOutResponse**](../Model/ImageOutResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getImageDownloadURL()`

```php
getImageDownloadURL($image_id, $image_url_id): \OpenAPI\Client\Model\ImageDownloadResponse
```

Получение информации о ссылке на скачивание образа

Чтобы получить информацию о ссылке на скачивание образа, отправьте запрос GET в `/api/v1/images/{image_id}/download-url/{image_url_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ImagesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$image_id = 'image_id_example'; // string | ID образа
$image_url_id = 'image_url_id_example'; // string | ID ссылки

try {
    $result = $apiInstance->getImageDownloadURL($image_id, $image_url_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ImagesApi->getImageDownloadURL: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **image_id** | **string**| ID образа | |
| **image_url_id** | **string**| ID ссылки | |

### Return type

[**\OpenAPI\Client\Model\ImageDownloadResponse**](../Model/ImageDownloadResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getImageDownloadURLs()`

```php
getImageDownloadURLs($image_id, $limit, $offset): \OpenAPI\Client\Model\ImageDownloadsResponse
```

Получение информации о ссылках на скачивание образов

Чтобы получить информацию о ссылках на скачивание образов, отправьте запрос GET в `/api/v1/images/{image_id}/download-url`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ImagesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$image_id = 'image_id_example'; // string | ID образа
$limit = 100; // int
$offset = 0; // int

try {
    $result = $apiInstance->getImageDownloadURLs($image_id, $limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ImagesApi->getImageDownloadURLs: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **image_id** | **string**| ID образа | |
| **limit** | **int**|  | [optional] [default to 100] |
| **offset** | **int**|  | [optional] [default to 0] |

### Return type

[**\OpenAPI\Client\Model\ImageDownloadsResponse**](../Model/ImageDownloadsResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getImages()`

```php
getImages($limit, $offset): \OpenAPI\Client\Model\ImagesOutResponse
```

Получение списка образов

Чтобы получить список образов, отправьте GET запрос на `/api/v1/images`

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ImagesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$limit = 100; // int
$offset = 0; // int

try {
    $result = $apiInstance->getImages($limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ImagesApi->getImages: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **limit** | **int**|  | [optional] [default to 100] |
| **offset** | **int**|  | [optional] [default to 0] |

### Return type

[**\OpenAPI\Client\Model\ImagesOutResponse**](../Model/ImagesOutResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateImage()`

```php
updateImage($image_id, $image_update_api): \OpenAPI\Client\Model\ImageOutResponse
```

Обновление информации о образе

Чтобы обновить только определенные атрибуты образа, отправьте запрос PATCH в `/api/v1/images/{image_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ImagesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$image_id = 'image_id_example'; // string | ID образа
$image_update_api = new \OpenAPI\Client\Model\ImageUpdateAPI(); // \OpenAPI\Client\Model\ImageUpdateAPI

try {
    $result = $apiInstance->updateImage($image_id, $image_update_api);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ImagesApi->updateImage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **image_id** | **string**| ID образа | |
| **image_update_api** | [**\OpenAPI\Client\Model\ImageUpdateAPI**](../Model/ImageUpdateAPI.md)|  | |

### Return type

[**\OpenAPI\Client\Model\ImageOutResponse**](../Model/ImageOutResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `uploadImage()`

```php
uploadImage($image_id, $content_disposition): \OpenAPI\Client\Model\UploadSuccessfulResponse
```

Загрузка образа

Чтобы загрузить свой образ, отправьте POST запрос в `/api/v1/images/{image_id}`, отправив файл как `multipart/form-data`, указав имя файла в заголовке `Content-Disposition`.   Перед загрузкой, нужно создать образ используя POST `/api/v1/images`, указав параметры `location`, `os`   Тело ответа будет содержать объект JSON с информацией о загруженном образе.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ImagesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$image_id = 'image_id_example'; // string
$content_disposition = 'content_disposition_example'; // string

try {
    $result = $apiInstance->uploadImage($image_id, $content_disposition);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ImagesApi->uploadImage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **image_id** | **string**|  | |
| **content_disposition** | **string**|  | [optional] |

### Return type

[**\OpenAPI\Client\Model\UploadSuccessfulResponse**](../Model/UploadSuccessfulResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
