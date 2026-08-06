# # DatabaseInstance

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **float** | ID для каждого экземпляра базы данных. Автоматически генерируется при создании. |
**created_at** | **string** | Значение времени, указанное в комбинированном формате даты и времени ISO8601, которое представляет, когда была создана база данных. |
**name** | **string** | Название базы данных. |
**description** | **string** | Описание базы данных |
**extensions** | [**\OpenAPI\Client\Model\DatabaseExtensions**](DatabaseExtensions.md) |  |
**owner_id** | **float** | ID администратора базы данных, который является владельцем этой базы данных. &#x60;null&#x60;, если владелец не задан. |
**config_parameters** | [**\OpenAPI\Client\Model\KafkaConfigParameters**](KafkaConfigParameters.md) |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
