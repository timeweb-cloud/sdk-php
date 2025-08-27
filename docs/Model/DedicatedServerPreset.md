# # DedicatedServerPreset

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **float** | ID тарифа выделенного сервера. |
**description** | **string** | Описание характеристик тарифа выделенного сервера. |
**is_ipmi_enabled** | **bool** | Это логическое значение, которое показывает, доступен ли IPMI у данного тарифа. |
**is_pre_installed** | **bool** | Это логическое значение, которое показывает, готов ли выделенный сервер к моментальной выдаче. |
**cpu** | [**\OpenAPI\Client\Model\DedicatedServerPresetCpu**](DedicatedServerPresetCpu.md) |  |
**disk** | [**\OpenAPI\Client\Model\DedicatedServerPresetDisk**](DedicatedServerPresetDisk.md) |  |
**price** | **float** | Стоимость тарифа выделенного сервера |
**memory** | [**\OpenAPI\Client\Model\DedicatedServerPresetMemory**](DedicatedServerPresetMemory.md) |  |
**location** | **string** | Локация. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
