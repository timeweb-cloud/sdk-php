# OpenAPI\Client\PaymentsApi

All URIs are relative to https://api.timeweb.cloud, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getFinances()**](PaymentsApi.md#getFinances) | **GET** /api/v1/account/finances | Получение платежной информации |
| [**getLinkCardPayment()**](PaymentsApi.md#getLinkCardPayment) | **POST** /api/v1/account/payment-link | Получение ссылки на оплату |
| [**getServicePrices()**](PaymentsApi.md#getServicePrices) | **GET** /api/v1/account/services/cost | Получение стоимости сервисов |


## `getFinances()`

```php
getFinances(): \OpenAPI\Client\Model\GetFinances200Response
```

Получение платежной информации

Чтобы получить платежную информацию, отправьте GET-запрос на `/api/v1/account/finances`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\PaymentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getFinances();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentsApi->getFinances: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\GetFinances200Response**](../Model/GetFinances200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getLinkCardPayment()`

```php
getLinkCardPayment($create_payment): \OpenAPI\Client\Model\GetLinkCardPayment200Response
```

Получение ссылки на оплату

Чтобы получить ссылку на оплату, отправьте POST-запрос на `/api/v1/account/payment-link`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\PaymentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_payment = new \OpenAPI\Client\Model\CreatePayment(); // \OpenAPI\Client\Model\CreatePayment

try {
    $result = $apiInstance->getLinkCardPayment($create_payment);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentsApi->getLinkCardPayment: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_payment** | [**\OpenAPI\Client\Model\CreatePayment**](../Model/CreatePayment.md)|  | |

### Return type

[**\OpenAPI\Client\Model\GetLinkCardPayment200Response**](../Model/GetLinkCardPayment200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getServicePrices()`

```php
getServicePrices(): \OpenAPI\Client\Model\GetServicePrices200Response
```

Получение стоимости сервисов

Чтобы получить информацию о стоимости всех активных сервисов аккаунта, отправьте GET-запрос на `/api/v1/account/services/cost`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\PaymentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getServicePrices();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentsApi->getServicePrices: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\GetServicePrices200Response**](../Model/GetServicePrices200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
