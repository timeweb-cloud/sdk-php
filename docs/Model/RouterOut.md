# # RouterOut

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | ID роутера |
**account_id** | **string** | ID аккаунта |
**avatar_link** | **string** | Ссылка на аватар роутера |
**name** | **string** | Имя роутера |
**comment** | **string** | Описание роутера |
**status** | **string** | Статус роутера |
**zone** | **string** | Зона доступности |
**ips** | [**\OpenAPI\Client\Model\RouterOutIpsInner[]**](RouterOutIpsInner.md) | IP-адреса |
**preset_id** | **int** | ID тарифа |
**preset** | [**\OpenAPI\Client\Model\RouterPreset**](RouterPreset.md) |  |
**nodes** | [**\OpenAPI\Client\Model\RouterOutNodesInner[]**](RouterOutNodesInner.md) | Ноды |
**networks** | [**\OpenAPI\Client\Model\RouterNetworkMeta[]**](RouterNetworkMeta.md) | Сети |
**created_at** | **\DateTime** | Дата и время создания роутера в формате ISO8601 |
**project_id** | **int** | ID проекта | [optional]
**parent_services** | [**\OpenAPI\Client\Model\RouterOutParentServicesInner[]**](RouterOutParentServicesInner.md) | Родительские сервисы |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
