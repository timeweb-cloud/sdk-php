# # ServerBackup

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **float** | Уникальный идентификатор бэкапа сервера. |
**name** | **string** | Название бэкапа. |
**comment** | **string** | Комментарий к бэкапу. |
**created_at** | **string** | Дата создания бэкапа. |
**status** | **string** | Статус бэкапа. |
**size** | **float** | Размер бэкапа (в Мб). |
**type** | **string** | Тип бэкапа. |
**progress** | **float** | Прогресс создания бэкапа. Значение будет меняться в статусе бэкапа &#x60;create&#x60; от 0 до 99, для остальных статусов всегда будет возвращаться 0. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
