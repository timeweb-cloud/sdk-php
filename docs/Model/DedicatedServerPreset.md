# # DedicatedServerPreset

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **float** | ID тарифа выделенного сервера. |
**description** | **string** | Описание характеристик тарифа выделенного сервера. |
**is_ipmi_enabled** | **bool** | Это логическое значение, которое показывает, доступен ли IPMI у данного тарифа. |
**cpu** | [**\OpenAPI\Client\Model\DedicatedServerPresetCpu**](DedicatedServerPresetCpu.md) |  |
**disk** | [**\OpenAPI\Client\Model\DedicatedServerPresetDisk**](DedicatedServerPresetDisk.md) |  |
**price** | **float** | Стоимость тарифа выделенного сервера | [optional]
**memory** | [**\OpenAPI\Client\Model\DedicatedServerPresetMemory**](DedicatedServerPresetMemory.md) |  |
**location** | **string** | Локация. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
