# # Image

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | ID образа. |
**status** | [**\OpenAPI\Client\Model\ImageStatus**](ImageStatus.md) |  |
**created_at** | **string** | Значение времени, указанное в комбинированном формате даты и времени ISO8601, которое представляет, когда был создан образ. |
**deleted_at** | **string** | Значение времени, указанное в комбинированном формате даты и времени ISO8601, которое представляет, когда был удален образ. |
**size** | **int** | Размер физического диска в мегабайтах. |
**virtual_size** | **int** | Размер виртуального диска в мегабайтах. |
**name** | **string** | Имя образа. |
**description** | **string** | Описание образа. |
**disk_id** | **int** | ID связанного с образом диска. |
**location** | **string** | Локация образа. |
**os** | [**\OpenAPI\Client\Model\OS**](OS.md) |  |
**progress** | **int** | Процент создания образа. |
**is_custom** | **bool** | Логическое значение, которое показывает, является ли образ кастомным. |
**type** | **string** | Тип образа. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
