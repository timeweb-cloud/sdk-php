# # DatabaseConfigurator

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **float** | ID конфигуратора. Передаётся при создании кластера в поле &#x60;configurator_id&#x60;. |
**disk_type** | **string** | Тип диска. |
**cpu_frequency** | **string** | Частота процессора (в ГГц). |
**is_allowed_local_network** | **bool** | Есть возможность подключения локальной сети. |
**location** | **string** | Географическое расположение конфигуратора. |
**requirements** | [**\OpenAPI\Client\Model\DatabaseConfiguratorRequirements**](DatabaseConfiguratorRequirements.md) |  |
**prices** | [**\OpenAPI\Client\Model\DatabaseConfiguratorPrices**](DatabaseConfiguratorPrices.md) |  | [optional]
**tags** | **string[]** | Теги конфигуратора, в том числе тег группы, в пределах которой доступна смена конфигурации кластера. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
