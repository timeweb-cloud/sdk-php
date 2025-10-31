# OpenAPI\Client\MailApi

All URIs are relative to https://api.timeweb.cloud, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createDomainMailbox()**](MailApi.md#createDomainMailbox) | **POST** /api/v1/mail/domains/{domain} | Создание почтового ящика |
| [**createMultipleDomainMailboxes()**](MailApi.md#createMultipleDomainMailboxes) | **POST** /api/v1/mail/domains/{domain}/batch | Множественное создание почтовых ящиков |
| [**deleteMailbox()**](MailApi.md#deleteMailbox) | **DELETE** /api/v1/mail/domains/{domain}/mailboxes/{mailbox} | Удаление почтового ящика |
| [**getDomainMailInfo()**](MailApi.md#getDomainMailInfo) | **GET** /api/v1/mail/domains/{domain}/info | Получение почтовой информации о домене |
| [**getDomainMailboxes()**](MailApi.md#getDomainMailboxes) | **GET** /api/v1/mail/domains/{domain} | Получение списка почтовых ящиков домена |
| [**getMailbox()**](MailApi.md#getMailbox) | **GET** /api/v1/mail/domains/{domain}/mailboxes/{mailbox} | Получение почтового ящика |
| [**getMailboxes()**](MailApi.md#getMailboxes) | **GET** /api/v1/mail | Получение списка почтовых ящиков аккаунта |
| [**updateDomainMailInfo()**](MailApi.md#updateDomainMailInfo) | **PATCH** /api/v1/mail/domains/{domain}/info | Изменение почтовой информации о домене |
| [**updateMailbox()**](MailApi.md#updateMailbox) | **PATCH** /api/v1/mail/domains/{domain}/mailboxes/{mailbox} | Изменение почтового ящика |
| [**updateMailboxV2()**](MailApi.md#updateMailboxV2) | **PATCH** /api/v2/mail/domains/{domain}/mailboxes/{mailbox} | Изменение почтового ящика |


## `createDomainMailbox()`

```php
createDomainMailbox($domain, $create_domain_mailbox_request): \OpenAPI\Client\Model\CreateDomainMailbox201Response
```

Создание почтового ящика

Чтобы создать почтовый ящик, отправьте POST-запрос на `/api/v1/mail/domains/{domain}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\MailApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$domain = somedomain.ru; // string | Полное имя домена
$create_domain_mailbox_request = new \OpenAPI\Client\Model\CreateDomainMailboxRequest(); // \OpenAPI\Client\Model\CreateDomainMailboxRequest

try {
    $result = $apiInstance->createDomainMailbox($domain, $create_domain_mailbox_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MailApi->createDomainMailbox: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **domain** | **string**| Полное имя домена | |
| **create_domain_mailbox_request** | [**\OpenAPI\Client\Model\CreateDomainMailboxRequest**](../Model/CreateDomainMailboxRequest.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateDomainMailbox201Response**](../Model/CreateDomainMailbox201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createMultipleDomainMailboxes()`

```php
createMultipleDomainMailboxes($domain, $create_multiple_domain_mailboxes_request): \OpenAPI\Client\Model\CreateMultipleDomainMailboxes201Response
```

Множественное создание почтовых ящиков

Чтобы создать почтовый ящики, отправьте POST-запрос на `/api/v1/mail/domains/{domain}/batch`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\MailApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$domain = somedomain.ru; // string | Полное имя домена
$create_multiple_domain_mailboxes_request = new \OpenAPI\Client\Model\CreateMultipleDomainMailboxesRequest(); // \OpenAPI\Client\Model\CreateMultipleDomainMailboxesRequest

try {
    $result = $apiInstance->createMultipleDomainMailboxes($domain, $create_multiple_domain_mailboxes_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MailApi->createMultipleDomainMailboxes: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **domain** | **string**| Полное имя домена | |
| **create_multiple_domain_mailboxes_request** | [**\OpenAPI\Client\Model\CreateMultipleDomainMailboxesRequest**](../Model/CreateMultipleDomainMailboxesRequest.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateMultipleDomainMailboxes201Response**](../Model/CreateMultipleDomainMailboxes201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteMailbox()`

```php
deleteMailbox($domain, $mailbox)
```

Удаление почтового ящика

Чтобы удалить почтовый ящик, отправьте DELETE-запрос на `/api/v1/mail/domains/{domain}/mailboxes/{mailbox}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\MailApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$domain = somedomain.ru; // string | Полное имя домена
$mailbox = mailbox; // string | Название почтового ящика

try {
    $apiInstance->deleteMailbox($domain, $mailbox);
} catch (Exception $e) {
    echo 'Exception when calling MailApi->deleteMailbox: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **domain** | **string**| Полное имя домена | |
| **mailbox** | **string**| Название почтового ящика | |

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

## `getDomainMailInfo()`

```php
getDomainMailInfo($domain): \OpenAPI\Client\Model\GetDomainMailInfo200Response
```

Получение почтовой информации о домене

Чтобы получить почтовую информацию о домене, отправьте GET-запрос на `/api/v1/mail/domains/{domain}/info`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\MailApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$domain = somedomain.ru; // string | Полное имя домена

try {
    $result = $apiInstance->getDomainMailInfo($domain);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MailApi->getDomainMailInfo: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **domain** | **string**| Полное имя домена | |

### Return type

[**\OpenAPI\Client\Model\GetDomainMailInfo200Response**](../Model/GetDomainMailInfo200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDomainMailboxes()`

```php
getDomainMailboxes($domain, $limit, $offset, $search): \OpenAPI\Client\Model\GetMailboxes200Response
```

Получение списка почтовых ящиков домена

Чтобы получить список почтовых ящиков домена, отправьте GET-запрос на `/api/v1/mail/domains/{domain}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\MailApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$domain = somedomain.ru; // string | Полное имя домена
$limit = 100; // int | Обозначает количество записей, которое необходимо вернуть.
$offset = 0; // int | Указывает на смещение относительно начала списка.
$search = 'search_example'; // string | Поиск почтового ящика по названию

try {
    $result = $apiInstance->getDomainMailboxes($domain, $limit, $offset, $search);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MailApi->getDomainMailboxes: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **domain** | **string**| Полное имя домена | |
| **limit** | **int**| Обозначает количество записей, которое необходимо вернуть. | [optional] [default to 100] |
| **offset** | **int**| Указывает на смещение относительно начала списка. | [optional] [default to 0] |
| **search** | **string**| Поиск почтового ящика по названию | [optional] |

### Return type

[**\OpenAPI\Client\Model\GetMailboxes200Response**](../Model/GetMailboxes200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getMailbox()`

```php
getMailbox($domain, $mailbox): \OpenAPI\Client\Model\CreateDomainMailbox201Response
```

Получение почтового ящика

Чтобы получить почтовый ящик, отправьте GET-запрос на `/api/v1/mail/domains/{domain}/mailboxes/{mailbox}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\MailApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$domain = somedomain.ru; // string | Полное имя домена
$mailbox = mailbox; // string | Название почтового ящика

try {
    $result = $apiInstance->getMailbox($domain, $mailbox);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MailApi->getMailbox: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **domain** | **string**| Полное имя домена | |
| **mailbox** | **string**| Название почтового ящика | |

### Return type

[**\OpenAPI\Client\Model\CreateDomainMailbox201Response**](../Model/CreateDomainMailbox201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getMailboxes()`

```php
getMailboxes($limit, $offset, $search): \OpenAPI\Client\Model\GetMailboxes200Response
```

Получение списка почтовых ящиков аккаунта

Чтобы получить список почтовых ящиков аккаунта, отправьте GET-запрос на `/api/v1/mail`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\MailApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$limit = 100; // int | Обозначает количество записей, которое необходимо вернуть.
$offset = 0; // int | Указывает на смещение относительно начала списка.
$search = 'search_example'; // string | Поиск почтового ящика по названию

try {
    $result = $apiInstance->getMailboxes($limit, $offset, $search);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MailApi->getMailboxes: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **limit** | **int**| Обозначает количество записей, которое необходимо вернуть. | [optional] [default to 100] |
| **offset** | **int**| Указывает на смещение относительно начала списка. | [optional] [default to 0] |
| **search** | **string**| Поиск почтового ящика по названию | [optional] |

### Return type

[**\OpenAPI\Client\Model\GetMailboxes200Response**](../Model/GetMailboxes200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateDomainMailInfo()`

```php
updateDomainMailInfo($domain, $update_domain_mail_info_request): \OpenAPI\Client\Model\GetDomainMailInfo200Response
```

Изменение почтовой информации о домене

Чтобы изменить почтовую информацию о домене, отправьте PATCH-запрос на `/api/v1/mail/domains/{domain}/info`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\MailApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$domain = somedomain.ru; // string | Полное имя домена
$update_domain_mail_info_request = new \OpenAPI\Client\Model\UpdateDomainMailInfoRequest(); // \OpenAPI\Client\Model\UpdateDomainMailInfoRequest

try {
    $result = $apiInstance->updateDomainMailInfo($domain, $update_domain_mail_info_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MailApi->updateDomainMailInfo: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **domain** | **string**| Полное имя домена | |
| **update_domain_mail_info_request** | [**\OpenAPI\Client\Model\UpdateDomainMailInfoRequest**](../Model/UpdateDomainMailInfoRequest.md)|  | |

### Return type

[**\OpenAPI\Client\Model\GetDomainMailInfo200Response**](../Model/GetDomainMailInfo200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateMailbox()`

```php
updateMailbox($domain, $mailbox, $update_mailbox): \OpenAPI\Client\Model\CreateDomainMailbox201Response
```

Изменение почтового ящика

Чтобы изменить почтовый ящик, отправьте PATCH-запрос на `/api/v1/mail/domains/{domain}/mailboxes/{mailbox}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\MailApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$domain = somedomain.ru; // string | Полное имя домена
$mailbox = mailbox; // string | Название почтового ящика
$update_mailbox = new \OpenAPI\Client\Model\UpdateMailbox(); // \OpenAPI\Client\Model\UpdateMailbox

try {
    $result = $apiInstance->updateMailbox($domain, $mailbox, $update_mailbox);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MailApi->updateMailbox: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **domain** | **string**| Полное имя домена | |
| **mailbox** | **string**| Название почтового ящика | |
| **update_mailbox** | [**\OpenAPI\Client\Model\UpdateMailbox**](../Model/UpdateMailbox.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateDomainMailbox201Response**](../Model/CreateDomainMailbox201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateMailboxV2()`

```php
updateMailboxV2($domain, $mailbox, $update_mailbox_v2): \OpenAPI\Client\Model\UpdateMailboxV2200Response
```

Изменение почтового ящика

Чтобы изменить почтовый ящик, отправьте PATCH-запрос на `/api/v2/mail/domains/{domain}/mailboxes/{mailbox}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\MailApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$domain = somedomain.ru; // string | Полное имя домена
$mailbox = mailbox; // string | Название почтового ящика
$update_mailbox_v2 = new \OpenAPI\Client\Model\UpdateMailboxV2(); // \OpenAPI\Client\Model\UpdateMailboxV2

try {
    $result = $apiInstance->updateMailboxV2($domain, $mailbox, $update_mailbox_v2);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MailApi->updateMailboxV2: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **domain** | **string**| Полное имя домена | |
| **mailbox** | **string**| Название почтового ящика | |
| **update_mailbox_v2** | [**\OpenAPI\Client\Model\UpdateMailboxV2**](../Model/UpdateMailboxV2.md)|  | |

### Return type

[**\OpenAPI\Client\Model\UpdateMailboxV2200Response**](../Model/UpdateMailboxV2200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
