# OpenAPI\Client\KubernetesApi

All URIs are relative to https://api.timeweb.cloud, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createCluster()**](KubernetesApi.md#createCluster) | **POST** /api/v1/k8s/clusters | Создание кластера |
| [**createClusterNodeGroup()**](KubernetesApi.md#createClusterNodeGroup) | **POST** /api/v1/k8s/clusters/{cluster_id}/groups | Создание группы нод |
| [**deleteCluster()**](KubernetesApi.md#deleteCluster) | **DELETE** /api/v1/k8s/clusters/{cluster_id} | Удаление кластера |
| [**deleteClusterNode()**](KubernetesApi.md#deleteClusterNode) | **DELETE** /api/v1/k8s/clusters/{cluster_id}/nodes/{node_id} | Удаление ноды |
| [**deleteClusterNodeGroup()**](KubernetesApi.md#deleteClusterNodeGroup) | **DELETE** /api/v1/k8s/clusters/{cluster_id}/groups/{group_id} | Удаление группы нод |
| [**getCluster()**](KubernetesApi.md#getCluster) | **GET** /api/v1/k8s/clusters/{cluster_id} | Получение информации о кластере |
| [**getClusterKubeconfig()**](KubernetesApi.md#getClusterKubeconfig) | **GET** /api/v1/k8s/clusters/{cluster_id}/kubeconfig | Получение файла kubeconfig |
| [**getClusterNodeGroup()**](KubernetesApi.md#getClusterNodeGroup) | **GET** /api/v1/k8s/clusters/{cluster_id}/groups/{group_id} | Получение информации о группе нод |
| [**getClusterNodeGroups()**](KubernetesApi.md#getClusterNodeGroups) | **GET** /api/v1/k8s/clusters/{cluster_id}/groups | Получение групп нод кластера |
| [**getClusterNodes()**](KubernetesApi.md#getClusterNodes) | **GET** /api/v1/k8s/clusters/{cluster_id}/nodes | Получение списка нод |
| [**getClusterNodesFromGroup()**](KubernetesApi.md#getClusterNodesFromGroup) | **GET** /api/v1/k8s/clusters/{cluster_id}/groups/{group_id}/nodes | Получение списка нод, принадлежащих группе |
| [**getClusterResources()**](KubernetesApi.md#getClusterResources) | **GET** /api/v1/k8s/clusters/{cluster_id}/resources | Получение ресурсов кластера |
| [**getClusters()**](KubernetesApi.md#getClusters) | **GET** /api/v1/k8s/clusters | Получение списка кластеров |
| [**getK8SNetworkDrivers()**](KubernetesApi.md#getK8SNetworkDrivers) | **GET** /api/v1/k8s/network-drivers | Получение списка сетевых драйверов k8s |
| [**getK8SVersions()**](KubernetesApi.md#getK8SVersions) | **GET** /api/v1/k8s/k8s-versions | Получение списка версий k8s |
| [**getKubernetesPresets()**](KubernetesApi.md#getKubernetesPresets) | **GET** /api/v1/presets/k8s | Получение списка тарифов |
| [**increaseCountOfNodesInGroup()**](KubernetesApi.md#increaseCountOfNodesInGroup) | **POST** /api/v1/k8s/clusters/{cluster_id}/groups/{group_id}/nodes | Увеличение количества нод в группе на указанное количество |
| [**reduceCountOfNodesInGroup()**](KubernetesApi.md#reduceCountOfNodesInGroup) | **DELETE** /api/v1/k8s/clusters/{cluster_id}/groups/{group_id}/nodes | Уменьшение количества нод в группе на указанное количество |
| [**updateCluster()**](KubernetesApi.md#updateCluster) | **PATCH** /api/v1/k8s/clusters/{cluster_id} | Обновление информации о кластере |


## `createCluster()`

```php
createCluster($cluster_in): \OpenAPI\Client\Model\ClusterResponse
```

Создание кластера

Чтобы создать кластер, отправьте POST-запрос на `/api/v1/k8s/clusters`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\KubernetesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$cluster_in = new \OpenAPI\Client\Model\ClusterIn(); // \OpenAPI\Client\Model\ClusterIn

try {
    $result = $apiInstance->createCluster($cluster_in);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling KubernetesApi->createCluster: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **cluster_in** | [**\OpenAPI\Client\Model\ClusterIn**](../Model/ClusterIn.md)|  | |

### Return type

[**\OpenAPI\Client\Model\ClusterResponse**](../Model/ClusterResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createClusterNodeGroup()`

```php
createClusterNodeGroup($cluster_id, $node_group_in): \OpenAPI\Client\Model\NodeGroupResponse
```

Создание группы нод

Чтобы создать группу нод кластера, отправьте POST-запрос в `/api/v1/k8s/clusters/{cluster_id}/groups`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\KubernetesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$cluster_id = 56; // int | ID кластера
$node_group_in = new \OpenAPI\Client\Model\NodeGroupIn(); // \OpenAPI\Client\Model\NodeGroupIn

try {
    $result = $apiInstance->createClusterNodeGroup($cluster_id, $node_group_in);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling KubernetesApi->createClusterNodeGroup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **cluster_id** | **int**| ID кластера | |
| **node_group_in** | [**\OpenAPI\Client\Model\NodeGroupIn**](../Model/NodeGroupIn.md)|  | |

### Return type

[**\OpenAPI\Client\Model\NodeGroupResponse**](../Model/NodeGroupResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteCluster()`

```php
deleteCluster($cluster_id, $hash, $code): \OpenAPI\Client\Model\DeleteCluster200Response
```

Удаление кластера

Чтобы удалить кластер, отправьте DELETE-запрос в `/api/v1/k8s/clusters/{cluster_id}`

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\KubernetesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$cluster_id = 56; // int | ID кластера
$hash = 15095f25-aac3-4d60-a788-96cb5136f186; // string | Хеш, который совместно с кодом авторизации надо отправить для удаления, если включено подтверждение удаления сервисов через Телеграм.
$code = 0000; // string | Код подтверждения, который придет к вам в Телеграм, после запроса удаления, если включено подтверждение удаления сервисов.  При помощи API токена сервисы можно удалять без подтверждения, если параметр токена `is_able_to_delete` установлен в значение `true`

try {
    $result = $apiInstance->deleteCluster($cluster_id, $hash, $code);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling KubernetesApi->deleteCluster: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **cluster_id** | **int**| ID кластера | |
| **hash** | **string**| Хеш, который совместно с кодом авторизации надо отправить для удаления, если включено подтверждение удаления сервисов через Телеграм. | [optional] |
| **code** | **string**| Код подтверждения, который придет к вам в Телеграм, после запроса удаления, если включено подтверждение удаления сервисов.  При помощи API токена сервисы можно удалять без подтверждения, если параметр токена &#x60;is_able_to_delete&#x60; установлен в значение &#x60;true&#x60; | [optional] |

### Return type

[**\OpenAPI\Client\Model\DeleteCluster200Response**](../Model/DeleteCluster200Response.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteClusterNode()`

```php
deleteClusterNode($cluster_id, $node_id)
```

Удаление ноды

Чтобы удалить ноду, отправьте DELETE-запрос в `/api/v1/k8s/clusters/{cluster_id}/nodes/{node_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\KubernetesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$cluster_id = 56; // int | ID кластера
$node_id = 56; // int | ID группы нод

try {
    $apiInstance->deleteClusterNode($cluster_id, $node_id);
} catch (Exception $e) {
    echo 'Exception when calling KubernetesApi->deleteClusterNode: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **cluster_id** | **int**| ID кластера | |
| **node_id** | **int**| ID группы нод | |

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

## `deleteClusterNodeGroup()`

```php
deleteClusterNodeGroup($cluster_id, $group_id)
```

Удаление группы нод

Чтобы удалить группу нод, отправьте DELETE-запрос в `/api/v1/k8s/clusters/{cluster_id}/groups/{group_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\KubernetesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$cluster_id = 56; // int | ID кластера
$group_id = 56; // int | ID группы

try {
    $apiInstance->deleteClusterNodeGroup($cluster_id, $group_id);
} catch (Exception $e) {
    echo 'Exception when calling KubernetesApi->deleteClusterNodeGroup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **cluster_id** | **int**| ID кластера | |
| **group_id** | **int**| ID группы | |

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

## `getCluster()`

```php
getCluster($cluster_id): \OpenAPI\Client\Model\ClusterResponse
```

Получение информации о кластере

Чтобы получить информацию о кластере, отправьте GET-запрос в `/api/v1/k8s/clusters/{cluster_id}`

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\KubernetesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$cluster_id = 56; // int | ID кластера

try {
    $result = $apiInstance->getCluster($cluster_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling KubernetesApi->getCluster: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **cluster_id** | **int**| ID кластера | |

### Return type

[**\OpenAPI\Client\Model\ClusterResponse**](../Model/ClusterResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getClusterKubeconfig()`

```php
getClusterKubeconfig($cluster_id): string
```

Получение файла kubeconfig

Чтобы получить файл kubeconfig, отправьте GET-запрос в `/api/v1/k8s/clusters/{cluster_id}/kubeconfig`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\KubernetesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$cluster_id = 56; // int | ID кластера

try {
    $result = $apiInstance->getClusterKubeconfig($cluster_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling KubernetesApi->getClusterKubeconfig: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **cluster_id** | **int**| ID кластера | |

### Return type

**string**

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/yaml`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getClusterNodeGroup()`

```php
getClusterNodeGroup($cluster_id, $group_id): \OpenAPI\Client\Model\NodeGroupResponse
```

Получение информации о группе нод

Чтобы получить информацию о группе нод, отправьте GET-запрос в `/api/v1/k8s/clusters/{cluster_id}/groups/{group_id}`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\KubernetesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$cluster_id = 56; // int | ID кластера
$group_id = 56; // int | ID группы

try {
    $result = $apiInstance->getClusterNodeGroup($cluster_id, $group_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling KubernetesApi->getClusterNodeGroup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **cluster_id** | **int**| ID кластера | |
| **group_id** | **int**| ID группы | |

### Return type

[**\OpenAPI\Client\Model\NodeGroupResponse**](../Model/NodeGroupResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getClusterNodeGroups()`

```php
getClusterNodeGroups($cluster_id): \OpenAPI\Client\Model\NodeGroupsResponse
```

Получение групп нод кластера

Чтобы получить группы нод кластера, отправьте GET-запрос в `/api/v1/k8s/clusters/{cluster_id}/groups`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\KubernetesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$cluster_id = 56; // int | ID кластера

try {
    $result = $apiInstance->getClusterNodeGroups($cluster_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling KubernetesApi->getClusterNodeGroups: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **cluster_id** | **int**| ID кластера | |

### Return type

[**\OpenAPI\Client\Model\NodeGroupsResponse**](../Model/NodeGroupsResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getClusterNodes()`

```php
getClusterNodes($cluster_id): \OpenAPI\Client\Model\NodesResponse
```

Получение списка нод

Чтобы получить список нод, отправьте GET-запрос в `/api/v1/k8s/clusters/{cluster_id}/nodes`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\KubernetesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$cluster_id = 56; // int | ID кластера

try {
    $result = $apiInstance->getClusterNodes($cluster_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling KubernetesApi->getClusterNodes: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **cluster_id** | **int**| ID кластера | |

### Return type

[**\OpenAPI\Client\Model\NodesResponse**](../Model/NodesResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getClusterNodesFromGroup()`

```php
getClusterNodesFromGroup($cluster_id, $group_id, $limit, $offset): \OpenAPI\Client\Model\NodesResponse
```

Получение списка нод, принадлежащих группе

Чтобы получить список нод принадлежащих группе, отправьте GET-запрос в `/api/v1/k8s/clusters/{cluster_id}/groups/{group_id}/nodes`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\KubernetesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$cluster_id = 56; // int | ID кластера
$group_id = 56; // int | ID группы
$limit = 100; // int | Обозначает количество записей, которое необходимо вернуть.
$offset = 0; // int | Указывает на смещение, относительно начала списка.

try {
    $result = $apiInstance->getClusterNodesFromGroup($cluster_id, $group_id, $limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling KubernetesApi->getClusterNodesFromGroup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **cluster_id** | **int**| ID кластера | |
| **group_id** | **int**| ID группы | |
| **limit** | **int**| Обозначает количество записей, которое необходимо вернуть. | [optional] [default to 100] |
| **offset** | **int**| Указывает на смещение, относительно начала списка. | [optional] [default to 0] |

### Return type

[**\OpenAPI\Client\Model\NodesResponse**](../Model/NodesResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getClusterResources()`

```php
getClusterResources($cluster_id): \OpenAPI\Client\Model\ResourcesResponse
```

Получение ресурсов кластера

Устаревший метод, работает только для старых кластеров. \\  Чтобы получить ресурсы кластера, отправьте GET-запрос в `/api/v1/k8s/clusters/{cluster_id}/resources`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\KubernetesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$cluster_id = 56; // int | ID кластера

try {
    $result = $apiInstance->getClusterResources($cluster_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling KubernetesApi->getClusterResources: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **cluster_id** | **int**| ID кластера | |

### Return type

[**\OpenAPI\Client\Model\ResourcesResponse**](../Model/ResourcesResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getClusters()`

```php
getClusters($limit, $offset): \OpenAPI\Client\Model\ClustersResponse
```

Получение списка кластеров

Чтобы получить список кластеров, отправьте GET-запрос на `/api/v1/k8s/clusters`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\KubernetesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$limit = 100; // int | Обозначает количество записей, которое необходимо вернуть.
$offset = 0; // int | Указывает на смещение относительно начала списка.

try {
    $result = $apiInstance->getClusters($limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling KubernetesApi->getClusters: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **limit** | **int**| Обозначает количество записей, которое необходимо вернуть. | [optional] [default to 100] |
| **offset** | **int**| Указывает на смещение относительно начала списка. | [optional] [default to 0] |

### Return type

[**\OpenAPI\Client\Model\ClustersResponse**](../Model/ClustersResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getK8SNetworkDrivers()`

```php
getK8SNetworkDrivers(): \OpenAPI\Client\Model\NetworkDriversResponse
```

Получение списка сетевых драйверов k8s

Чтобы получить список сетевых драйверов k8s, отправьте GET-запрос в `/api/v1/k8s/network-drivers`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\KubernetesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getK8SNetworkDrivers();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling KubernetesApi->getK8SNetworkDrivers: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\NetworkDriversResponse**](../Model/NetworkDriversResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getK8SVersions()`

```php
getK8SVersions(): \OpenAPI\Client\Model\K8SVersionsResponse
```

Получение списка версий k8s

Чтобы получить список версий k8s, отправьте GET-запрос в `/api/v1/k8s/k8s-versions`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\KubernetesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getK8SVersions();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling KubernetesApi->getK8SVersions: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\K8SVersionsResponse**](../Model/K8SVersionsResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getKubernetesPresets()`

```php
getKubernetesPresets(): \OpenAPI\Client\Model\PresetsResponse
```

Получение списка тарифов

Чтобы получить список тарифов, отправьте GET-запрос в `/api/v1/presets/k8s`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\KubernetesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getKubernetesPresets();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling KubernetesApi->getKubernetesPresets: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\PresetsResponse**](../Model/PresetsResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `increaseCountOfNodesInGroup()`

```php
increaseCountOfNodesInGroup($cluster_id, $group_id, $increase_nodes): \OpenAPI\Client\Model\NodesResponse
```

Увеличение количества нод в группе на указанное количество

Чтобы увеличить количество нод в группе на указанное значение, отправьте POST-запрос на `/api/v1/k8s/clusters/{cluster_id}/groups/{group_id}/nodes`

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\KubernetesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$cluster_id = 56; // int | ID кластера
$group_id = 56; // int | ID группы
$increase_nodes = new \OpenAPI\Client\Model\IncreaseNodes(); // \OpenAPI\Client\Model\IncreaseNodes

try {
    $result = $apiInstance->increaseCountOfNodesInGroup($cluster_id, $group_id, $increase_nodes);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling KubernetesApi->increaseCountOfNodesInGroup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **cluster_id** | **int**| ID кластера | |
| **group_id** | **int**| ID группы | |
| **increase_nodes** | [**\OpenAPI\Client\Model\IncreaseNodes**](../Model/IncreaseNodes.md)|  | |

### Return type

[**\OpenAPI\Client\Model\NodesResponse**](../Model/NodesResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `reduceCountOfNodesInGroup()`

```php
reduceCountOfNodesInGroup($cluster_id, $group_id, $reduce_nodes)
```

Уменьшение количества нод в группе на указанное количество

Чтобы уменьшить количество нод в группе на указанное значение, отправьте DELETE-запрос в `/api/v1/k8s/clusters/{cluster_id}/groups/{group_id}/nodes`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\KubernetesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$cluster_id = 56; // int | ID кластера
$group_id = 56; // int | ID группы
$reduce_nodes = new \OpenAPI\Client\Model\ReduceNodes(); // \OpenAPI\Client\Model\ReduceNodes

try {
    $apiInstance->reduceCountOfNodesInGroup($cluster_id, $group_id, $reduce_nodes);
} catch (Exception $e) {
    echo 'Exception when calling KubernetesApi->reduceCountOfNodesInGroup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **cluster_id** | **int**| ID кластера | |
| **group_id** | **int**| ID группы | |
| **reduce_nodes** | [**\OpenAPI\Client\Model\ReduceNodes**](../Model/ReduceNodes.md)|  | |

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

## `updateCluster()`

```php
updateCluster($cluster_id, $cluster_edit): \OpenAPI\Client\Model\ClusterResponse
```

Обновление информации о кластере

Чтобы обновить информацию о кластере, отправьте PATCH-запрос в `/api/v1/k8s/clusters/{cluster_id}`

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\KubernetesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$cluster_id = 56; // int | ID кластера
$cluster_edit = new \OpenAPI\Client\Model\ClusterEdit(); // \OpenAPI\Client\Model\ClusterEdit

try {
    $result = $apiInstance->updateCluster($cluster_id, $cluster_edit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling KubernetesApi->updateCluster: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **cluster_id** | **int**| ID кластера | |
| **cluster_edit** | [**\OpenAPI\Client\Model\ClusterEdit**](../Model/ClusterEdit.md)|  | |

### Return type

[**\OpenAPI\Client\Model\ClusterResponse**](../Model/ClusterResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
