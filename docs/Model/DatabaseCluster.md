# # DatabaseCluster

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **float** | ID для каждого экземпляра базы данных. Автоматически генерируется при создании. |
**created_at** | **string** | Значение времени, указанное в комбинированном формате даты и времени ISO8601, которое представляет, когда была создана база данных. |
**location** | **string** | Локация сервера. |
**name** | **string** | Название кластера базы данных. |
**networks** | [**\OpenAPI\Client\Model\DatabaseClusterNetworksInner[]**](DatabaseClusterNetworksInner.md) | Список сетей кластера базы данных. |
**type** | [**\OpenAPI\Client\Model\DbType**](DbType.md) |  |
**hash_type** | **string** | Тип хеширования кластера базы данных (mysql5 | mysql | postgres). |
**avatar_link** | **string** | Ссылка на аватар для базы данных. |
**port** | **int** | Порт |
**status** | **string** | Текущий статус кластера базы данных. |
**preset_id** | **int** | ID тарифа. |
**disk** | [**\OpenAPI\Client\Model\DatabaseClusterDisk**](DatabaseClusterDisk.md) |  | [optional]
**config_parameters** | [**\OpenAPI\Client\Model\ConfigParameters**](ConfigParameters.md) |  |
**is_enabled_public_network** | **bool** | Доступность публичного IP-адреса |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
