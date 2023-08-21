# OpenAPI\Client\DomainsApi

All URIs are relative to https://api.timeweb.cloud, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**addDomain()**](DomainsApi.md#addDomain) | **POST** /api/v1/add-domain/{fqdn} | Добавление домена на аккаунт |
| [**addSubdomain()**](DomainsApi.md#addSubdomain) | **POST** /api/v1/domains/{fqdn}/subdomains/{subdomain_fqdn} | Добавление поддомена |
| [**checkDomain()**](DomainsApi.md#checkDomain) | **GET** /api/v1/check-domain/{fqdn} | Проверить, доступен ли домен для регистрации |
| [**createDomainDNSRecord()**](DomainsApi.md#createDomainDNSRecord) | **POST** /api/v1/domains/{fqdn}/dns-records | Добавить информацию о DNS-записи для домена или поддомена |
| [**createDomainRequest()**](DomainsApi.md#createDomainRequest) | **POST** /api/v1/domains-requests | Создание заявки на регистрацию/продление/трансфер домена |
| [**deleteDomain()**](DomainsApi.md#deleteDomain) | **DELETE** /api/v1/domains/{fqdn} | Удаление домена |
| [**deleteDomainDNSRecord()**](DomainsApi.md#deleteDomainDNSRecord) | **DELETE** /api/v1/domains/{fqdn}/dns-records/{record_id} | Удалить информацию о DNS-записи для домена или поддомена |
| [**deleteSubdomain()**](DomainsApi.md#deleteSubdomain) | **DELETE** /api/v1/domains/{fqdn}/subdomains/{subdomain_fqdn} | Удаление поддомена |
| [**getDomain()**](DomainsApi.md#getDomain) | **GET** /api/v1/domains/{fqdn} | Получение информации о домене |
| [**getDomainDNSRecords()**](DomainsApi.md#getDomainDNSRecords) | **GET** /api/v1/domains/{fqdn}/dns-records | Получить информацию обо всех пользовательских DNS-записях домена или поддомена |
| [**getDomainDefaultDNSRecords()**](DomainsApi.md#getDomainDefaultDNSRecords) | **GET** /api/v1/domains/{fqdn}/default-dns-records | Получить информацию обо всех DNS-записях по умолчанию домена или поддомена |
| [**getDomainNameServers()**](DomainsApi.md#getDomainNameServers) | **GET** /api/v1/domains/{fqdn}/name-servers | Получение списка name-серверов домена |
| [**getDomainRequest()**](DomainsApi.md#getDomainRequest) | **GET** /api/v1/domains-requests/{request_id} | Получение заявки на регистрацию/продление/трансфер домена |
| [**getDomainRequests()**](DomainsApi.md#getDomainRequests) | **GET** /api/v1/domains-requests | Получение списка заявок на регистрацию/продление/трансфер домена |
| [**getDomains()**](DomainsApi.md#getDomains) | **GET** /api/v1/domains | Получение списка всех доменов |
| [**getTLD()**](DomainsApi.md#getTLD) | **GET** /api/v1/tlds/{tld_id} | Получить информацию о доменной зоне по идентификатору |
| [**getTLDs()**](DomainsApi.md#getTLDs) | **GET** /api/v1/tlds | Получить информацию о доменных зонах |
| [**updateDomainAutoProlongation()**](DomainsApi.md#updateDomainAutoProlongation) | **PATCH** /api/v1/domains/{fqdn} | Включение/выключение автопродления домена |
| [**updateDomainDNSRecord()**](DomainsApi.md#updateDomainDNSRecord) | **PATCH** /api/v1/domains/{fqdn}/dns-records/{record_id} | Обновить информацию о DNS-записи домена или поддомена |
| [**updateDomainNameServers()**](DomainsApi.md#updateDomainNameServers) | **PUT** /api/v1/domains/{fqdn}/name-servers | Изменение name-серверов домена |
| [**updateDomainRequest()**](DomainsApi.md#updateDomainRequest) | **PATCH** /api/v1/domains-requests/{request_id} | Оплата/обновление заявки на регистрацию/продление/трансфер домена |


## `addDomain()`

```php
addDomain($fqdn)
```

Добавление домена на аккаунт

Чтобы добавить домен на свой аккаунт, отправьте запрос POST на `/api/v1/add-domain/{fqdn}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DomainsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$fqdn = somedomain.ru; // string | Полное имя домена.

try {
    $apiInstance->addDomain($fqdn);
} catch (Exception $e) {
    echo 'Exception when calling DomainsApi->addDomain: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **fqdn** | **string**| Полное имя домена. | |

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

## `addSubdomain()`

```php
addSubdomain($fqdn, $subdomain_fqdn): \OpenAPI\Client\Model\AddSubdomain201Response
```

Добавление поддомена

Чтобы добавить поддомен, отправьте запрос POST на `/api/v1/domains/{fqdn}/subdomains/{subdomain_fqdn}`, задав необходимые атрибуты.  Поддомен будет добавлен с использованием предоставленной информации. Тело ответа будет содержать объект JSON с информацией о добавленном поддомене.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DomainsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$fqdn = somedomain.ru; // string | Полное имя домена.
$subdomain_fqdn = sub.somedomain.ru; // string | Полное имя поддомена.

try {
    $result = $apiInstance->addSubdomain($fqdn, $subdomain_fqdn);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DomainsApi->addSubdomain: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **fqdn** | **string**| Полное имя домена. | |
| **subdomain_fqdn** | **string**| Полное имя поддомена. | |

### Return type

[**\OpenAPI\Client\Model\AddSubdomain201Response**](../Model/AddSubdomain201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `checkDomain()`

```php
checkDomain($fqdn): \OpenAPI\Client\Model\CheckDomain200Response
```

Проверить, доступен ли домен для регистрации

Чтобы проверить, доступен ли домен для регистрации, отправьте запрос GET на `/api/v1/check-domain/{fqdn}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DomainsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$fqdn = somedomain.ru; // string | Полное имя домена.

try {
    $result = $apiInstance->checkDomain($fqdn);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DomainsApi->checkDomain: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **fqdn** | **string**| Полное имя домена. | |

### Return type

[**\OpenAPI\Client\Model\CheckDomain200Response**](../Model/CheckDomain200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createDomainDNSRecord()`

```php
createDomainDNSRecord($fqdn, $create_dns): \OpenAPI\Client\Model\CreateDomainDNSRecord201Response
```

Добавить информацию о DNS-записи для домена или поддомена

Чтобы добавить информацию о DNS-записи для домена или поддомена, отправьте запрос POST на `/api/v1/domains/{fqdn}/dns-records`, задав необходимые атрибуты.  DNS-запись будет добавлена с использованием предоставленной информации. Тело ответа будет содержать объект JSON с информацией о добавленной DNS-записи.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DomainsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$fqdn = somedomain.ru; // string | Полное имя домена или поддомена.
$create_dns = new \OpenAPI\Client\Model\CreateDns(); // \OpenAPI\Client\Model\CreateDns

try {
    $result = $apiInstance->createDomainDNSRecord($fqdn, $create_dns);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DomainsApi->createDomainDNSRecord: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **fqdn** | **string**| Полное имя домена или поддомена. | |
| **create_dns** | [**\OpenAPI\Client\Model\CreateDns**](../Model/CreateDns.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateDomainDNSRecord201Response**](../Model/CreateDomainDNSRecord201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createDomainRequest()`

```php
createDomainRequest($create_domain_request_request): \OpenAPI\Client\Model\CreateDomainRequest201Response
```

Создание заявки на регистрацию/продление/трансфер домена

Чтобы создать заявку на регистрацию/продление/трансфер домена, отправьте POST-запрос в `api/v1/domains-requests`, задав необходимые атрибуты.  Заявка будет создана с использованием предоставленной информации. Тело ответа будет содержать объект JSON с информацией о созданной заявке.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DomainsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_domain_request_request = new \OpenAPI\Client\Model\CreateDomainRequestRequest(); // \OpenAPI\Client\Model\CreateDomainRequestRequest

try {
    $result = $apiInstance->createDomainRequest($create_domain_request_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DomainsApi->createDomainRequest: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_domain_request_request** | [**\OpenAPI\Client\Model\CreateDomainRequestRequest**](../Model/CreateDomainRequestRequest.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateDomainRequest201Response**](../Model/CreateDomainRequest201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteDomain()`

```php
deleteDomain($fqdn)
```

Удаление домена

Чтобы удалить домен, отправьте запрос DELETE на `/api/v1/domains/{fqdn}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DomainsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$fqdn = somedomain.ru; // string | Полное имя домена.

try {
    $apiInstance->deleteDomain($fqdn);
} catch (Exception $e) {
    echo 'Exception when calling DomainsApi->deleteDomain: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **fqdn** | **string**| Полное имя домена. | |

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

## `deleteDomainDNSRecord()`

```php
deleteDomainDNSRecord($fqdn, $record_id)
```

Удалить информацию о DNS-записи для домена или поддомена

Чтобы удалить информацию о DNS-записи для домена или поддомена, отправьте запрос DELETE на `/api/v1/domains/{fqdn}/dns-records/{record_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DomainsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$fqdn = somedomain.ru; // string | Полное имя домена или поддомена.
$record_id = 123; // int | Идентификатор DNS-записи домена или поддомена.

try {
    $apiInstance->deleteDomainDNSRecord($fqdn, $record_id);
} catch (Exception $e) {
    echo 'Exception when calling DomainsApi->deleteDomainDNSRecord: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **fqdn** | **string**| Полное имя домена или поддомена. | |
| **record_id** | **int**| Идентификатор DNS-записи домена или поддомена. | |

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

## `deleteSubdomain()`

```php
deleteSubdomain($fqdn, $subdomain_fqdn)
```

Удаление поддомена

Чтобы удалить поддомен, отправьте запрос DELETE на `/api/v1/domains/{fqdn}/subdomains/{subdomain_fqdn}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DomainsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$fqdn = somedomain.ru; // string | Полное имя домена.
$subdomain_fqdn = sub.somedomain.ru; // string | Полное имя поддомена.

try {
    $apiInstance->deleteSubdomain($fqdn, $subdomain_fqdn);
} catch (Exception $e) {
    echo 'Exception when calling DomainsApi->deleteSubdomain: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **fqdn** | **string**| Полное имя домена. | |
| **subdomain_fqdn** | **string**| Полное имя поддомена. | |

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

## `getDomain()`

```php
getDomain($fqdn): \OpenAPI\Client\Model\GetDomain200Response
```

Получение информации о домене

Чтобы отобразить информацию об отдельном домене, отправьте запрос GET на `/api/v1/domains/{fqdn}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DomainsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$fqdn = somedomain.ru; // string | Полное имя домена.

try {
    $result = $apiInstance->getDomain($fqdn);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DomainsApi->getDomain: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **fqdn** | **string**| Полное имя домена. | |

### Return type

[**\OpenAPI\Client\Model\GetDomain200Response**](../Model/GetDomain200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDomainDNSRecords()`

```php
getDomainDNSRecords($fqdn, $limit, $offset): \OpenAPI\Client\Model\GetDomainDNSRecords200Response
```

Получить информацию обо всех пользовательских DNS-записях домена или поддомена

Чтобы получить информацию обо всех пользовательских DNS-записях домена или поддомена, отправьте запрос GET на `/api/v1/domains/{fqdn}/dns-records`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DomainsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$fqdn = somedomain.ru; // string | Полное имя домена или поддомена.
$limit = 100; // int | Обозначает количество записей, которое необходимо вернуть.
$offset = 0; // int | Указывает на смещение относительно начала списка.

try {
    $result = $apiInstance->getDomainDNSRecords($fqdn, $limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DomainsApi->getDomainDNSRecords: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **fqdn** | **string**| Полное имя домена или поддомена. | |
| **limit** | **int**| Обозначает количество записей, которое необходимо вернуть. | [optional] [default to 100] |
| **offset** | **int**| Указывает на смещение относительно начала списка. | [optional] [default to 0] |

### Return type

[**\OpenAPI\Client\Model\GetDomainDNSRecords200Response**](../Model/GetDomainDNSRecords200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDomainDefaultDNSRecords()`

```php
getDomainDefaultDNSRecords($fqdn, $limit, $offset): \OpenAPI\Client\Model\GetDomainDNSRecords200Response
```

Получить информацию обо всех DNS-записях по умолчанию домена или поддомена

Чтобы получить информацию обо всех DNS-записях по умолчанию домена или поддомена, отправьте запрос GET на `/api/v1/domains/{fqdn}/default-dns-records`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DomainsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$fqdn = somedomain.ru; // string | Полное имя домена или поддомена.
$limit = 100; // int | Обозначает количество записей, которое необходимо вернуть.
$offset = 0; // int | Указывает на смещение относительно начала списка.

try {
    $result = $apiInstance->getDomainDefaultDNSRecords($fqdn, $limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DomainsApi->getDomainDefaultDNSRecords: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **fqdn** | **string**| Полное имя домена или поддомена. | |
| **limit** | **int**| Обозначает количество записей, которое необходимо вернуть. | [optional] [default to 100] |
| **offset** | **int**| Указывает на смещение относительно начала списка. | [optional] [default to 0] |

### Return type

[**\OpenAPI\Client\Model\GetDomainDNSRecords200Response**](../Model/GetDomainDNSRecords200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDomainNameServers()`

```php
getDomainNameServers($fqdn): \OpenAPI\Client\Model\GetDomainNameServers200Response
```

Получение списка name-серверов домена

Чтобы получить список name-серверов домена, отправьте запрос GET на `/api/v1/domains/{fqdn}/name-servers`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DomainsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$fqdn = somedomain.ru; // string | Полное имя домена.

try {
    $result = $apiInstance->getDomainNameServers($fqdn);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DomainsApi->getDomainNameServers: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **fqdn** | **string**| Полное имя домена. | |

### Return type

[**\OpenAPI\Client\Model\GetDomainNameServers200Response**](../Model/GetDomainNameServers200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDomainRequest()`

```php
getDomainRequest($request_id): \OpenAPI\Client\Model\CreateDomainRequest201Response
```

Получение заявки на регистрацию/продление/трансфер домена

Чтобы получить заявку на регистрацию/продление/трансфер домена, отправьте запрос GET на `/api/v1/domains-requests/{request_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DomainsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$request_id = 123; // int | Идентификатор заявки на регистрацию/продление/трансфер домена.

try {
    $result = $apiInstance->getDomainRequest($request_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DomainsApi->getDomainRequest: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **request_id** | **int**| Идентификатор заявки на регистрацию/продление/трансфер домена. | |

### Return type

[**\OpenAPI\Client\Model\CreateDomainRequest201Response**](../Model/CreateDomainRequest201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDomainRequests()`

```php
getDomainRequests($person_id): \OpenAPI\Client\Model\GetDomainRequests200Response
```

Получение списка заявок на регистрацию/продление/трансфер домена

Чтобы получить список заявок на регистрацию/продление/трансфер домена, отправьте запрос GET на `/api/v1/domains-requests`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DomainsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$person_id = 123; // int | Идентификатор администратора, на которого зарегистрирован домен.

try {
    $result = $apiInstance->getDomainRequests($person_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DomainsApi->getDomainRequests: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **person_id** | **int**| Идентификатор администратора, на которого зарегистрирован домен. | [optional] |

### Return type

[**\OpenAPI\Client\Model\GetDomainRequests200Response**](../Model/GetDomainRequests200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDomains()`

```php
getDomains($limit, $offset, $idn_name, $linked_ip, $order, $sort): \OpenAPI\Client\Model\GetDomains200Response
```

Получение списка всех доменов

Чтобы получить список всех доменов на вашем аккаунте, отправьте GET-запрос на `/api/v1/domains`.   Тело ответа будет представлять собой объект JSON с ключом `domains`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DomainsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$limit = 100; // int | Обозначает количество записей, которое необходимо вернуть.
$offset = 0; // int | Указывает на смещение относительно начала списка.
$idn_name = xn--e1afmkfd.xn--p1ai; // string | Интернационализированное доменное имя.
$linked_ip = 192.168.1.1; // string | Привязанный к домену IP-адрес.
$order = asc; // string | Порядок доменов.
$sort = idn_name; // string | Сортировка доменов.

try {
    $result = $apiInstance->getDomains($limit, $offset, $idn_name, $linked_ip, $order, $sort);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DomainsApi->getDomains: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **limit** | **int**| Обозначает количество записей, которое необходимо вернуть. | [optional] [default to 100] |
| **offset** | **int**| Указывает на смещение относительно начала списка. | [optional] [default to 0] |
| **idn_name** | **string**| Интернационализированное доменное имя. | [optional] |
| **linked_ip** | **string**| Привязанный к домену IP-адрес. | [optional] |
| **order** | **string**| Порядок доменов. | [optional] |
| **sort** | **string**| Сортировка доменов. | [optional] |

### Return type

[**\OpenAPI\Client\Model\GetDomains200Response**](../Model/GetDomains200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getTLD()`

```php
getTLD($tld_id): \OpenAPI\Client\Model\GetTLD200Response
```

Получить информацию о доменной зоне по идентификатору

Чтобы получить информацию о доменной зоне по идентификатору, отправьте запрос GET на `/api/v1/tlds/{tld_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DomainsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$tld_id = 123; // int | Идентификатор доменной зоны.

try {
    $result = $apiInstance->getTLD($tld_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DomainsApi->getTLD: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **tld_id** | **int**| Идентификатор доменной зоны. | |

### Return type

[**\OpenAPI\Client\Model\GetTLD200Response**](../Model/GetTLD200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getTLDs()`

```php
getTLDs($is_published, $is_registered): \OpenAPI\Client\Model\GetTLDs200Response
```

Получить информацию о доменных зонах

Чтобы получить информацию о доменных зонах, отправьте запрос GET на `/api/v1/tlds`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DomainsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$is_published = true; // bool | Это логическое значение, которое показывает, опубликована ли доменная зона.
$is_registered = true; // bool | Это логическое значение, которое показывает, зарегистрирована ли доменная зона.

try {
    $result = $apiInstance->getTLDs($is_published, $is_registered);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DomainsApi->getTLDs: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **is_published** | **bool**| Это логическое значение, которое показывает, опубликована ли доменная зона. | [optional] |
| **is_registered** | **bool**| Это логическое значение, которое показывает, зарегистрирована ли доменная зона. | [optional] |

### Return type

[**\OpenAPI\Client\Model\GetTLDs200Response**](../Model/GetTLDs200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateDomainAutoProlongation()`

```php
updateDomainAutoProlongation($fqdn, $update_domain): \OpenAPI\Client\Model\UpdateDomainAutoProlongation200Response
```

Включение/выключение автопродления домена

Чтобы включить/выключить автопродление домена, отправьте запрос PATCH на `/api/v1/domains/{fqdn}`, передав в теле запроса параметр `is_autoprolong_enabled`

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DomainsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$fqdn = somedomain.ru; // string | Полное имя домена.
$update_domain = new \OpenAPI\Client\Model\UpdateDomain(); // \OpenAPI\Client\Model\UpdateDomain

try {
    $result = $apiInstance->updateDomainAutoProlongation($fqdn, $update_domain);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DomainsApi->updateDomainAutoProlongation: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **fqdn** | **string**| Полное имя домена. | |
| **update_domain** | [**\OpenAPI\Client\Model\UpdateDomain**](../Model/UpdateDomain.md)|  | |

### Return type

[**\OpenAPI\Client\Model\UpdateDomainAutoProlongation200Response**](../Model/UpdateDomainAutoProlongation200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateDomainDNSRecord()`

```php
updateDomainDNSRecord($fqdn, $record_id, $create_dns): \OpenAPI\Client\Model\CreateDomainDNSRecord201Response
```

Обновить информацию о DNS-записи домена или поддомена

Чтобы обновить информацию о DNS-записи для домена или поддомена, отправьте запрос PATCH на `/api/v1/domains/{fqdn}/dns-records/{record_id}`, задав необходимые атрибуты.  DNS-запись будет обновлена с использованием предоставленной информации. Тело ответа будет содержать объект JSON с информацией об добавленной DNS-записи.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DomainsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$fqdn = somedomain.ru; // string | Полное имя домена или поддомена.
$record_id = 123; // int | Идентификатор DNS-записи домена или поддомена.
$create_dns = new \OpenAPI\Client\Model\CreateDns(); // \OpenAPI\Client\Model\CreateDns

try {
    $result = $apiInstance->updateDomainDNSRecord($fqdn, $record_id, $create_dns);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DomainsApi->updateDomainDNSRecord: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **fqdn** | **string**| Полное имя домена или поддомена. | |
| **record_id** | **int**| Идентификатор DNS-записи домена или поддомена. | |
| **create_dns** | [**\OpenAPI\Client\Model\CreateDns**](../Model/CreateDns.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateDomainDNSRecord201Response**](../Model/CreateDomainDNSRecord201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateDomainNameServers()`

```php
updateDomainNameServers($fqdn, $update_domain_name_servers): \OpenAPI\Client\Model\GetDomainNameServers200Response
```

Изменение name-серверов домена

Чтобы изменить name-серверы домена, отправьте запрос PUT на `/api/v1/domains/{fqdn}/name-servers`, задав необходимые атрибуты.  Name-серверы будут изменены с использованием предоставленной информации. Тело ответа будет содержать объект JSON с информацией о name-серверах домена.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DomainsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$fqdn = somedomain.ru; // string | Полное имя домена.
$update_domain_name_servers = new \OpenAPI\Client\Model\UpdateDomainNameServers(); // \OpenAPI\Client\Model\UpdateDomainNameServers

try {
    $result = $apiInstance->updateDomainNameServers($fqdn, $update_domain_name_servers);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DomainsApi->updateDomainNameServers: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **fqdn** | **string**| Полное имя домена. | |
| **update_domain_name_servers** | [**\OpenAPI\Client\Model\UpdateDomainNameServers**](../Model/UpdateDomainNameServers.md)|  | |

### Return type

[**\OpenAPI\Client\Model\GetDomainNameServers200Response**](../Model/GetDomainNameServers200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateDomainRequest()`

```php
updateDomainRequest($request_id, $update_domain_request_request): \OpenAPI\Client\Model\CreateDomainRequest201Response
```

Оплата/обновление заявки на регистрацию/продление/трансфер домена

Чтобы оплатить/обновить заявку на регистрацию/продление/трансфер домена, отправьте запрос PATCH на `/api/v1/domains-requests/{request_id}`, задав необходимые атрибуты.  Заявка будет обновлена с использованием предоставленной информации. Тело ответа будет содержать объект JSON с информацией о обновленной заявке.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DomainsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$request_id = 123; // int | Идентификатор заявки на регистрацию/продление/трансфер домена.
$update_domain_request_request = new \OpenAPI\Client\Model\UpdateDomainRequestRequest(); // \OpenAPI\Client\Model\UpdateDomainRequestRequest

try {
    $result = $apiInstance->updateDomainRequest($request_id, $update_domain_request_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DomainsApi->updateDomainRequest: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **request_id** | **int**| Идентификатор заявки на регистрацию/продление/трансфер домена. | |
| **update_domain_request_request** | [**\OpenAPI\Client\Model\UpdateDomainRequestRequest**](../Model/UpdateDomainRequestRequest.md)|  | |

### Return type

[**\OpenAPI\Client\Model\CreateDomainRequest201Response**](../Model/CreateDomainRequest201Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
