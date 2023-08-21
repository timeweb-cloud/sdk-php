# # ImageOutAPI

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Идентификатор образа |
**status** | [**\OpenAPI\Client\Model\ImageStatus**](ImageStatus.md) |  |
**created_at** | **\DateTime** | Дата и время создания |
**deleted_at** | **\DateTime** | Дата и время удаления |
**size** | **int** | Размер в мегабайтах |
**name** | **string** | Имя образа |
**description** | **string** | Описание образа |
**disk_id** | **int** | Идентификатор связанного с образом диска |
**location** | **string** | Локация, в которой создан образ | [optional]
**os** | [**\OpenAPI\Client\Model\OS**](OS.md) |  |
**progress** | **int** | Процент создания образа |
**is_custom** | **bool** | Признак указывающий на то является ли образ кастомным |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
