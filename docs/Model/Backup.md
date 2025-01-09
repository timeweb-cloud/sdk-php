# # Backup

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | ID резервной копии. |
**name** | **string** | Название резервной копии. |
**comment** | **string** | Комментарий. |
**created_at** | **\DateTime** | Дата создания. |
**status** | **string** | Статус бэкапа. |
**size** | **int** | Размер резервной копии (Мб). |
**type** | **string** | Тип бэкапа. |
**progress** | **float** | Прогресс создания бэкапа. Значение будет меняться в статусе бэкапа &#x60;create&#x60; от 0 до 99, для остальных статусов всегда будет возвращаться 0. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
