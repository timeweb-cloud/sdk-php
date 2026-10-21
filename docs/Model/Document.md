# # Document

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | ID документа |
**name** | **string** | Название документа |
**size** | **int** | Размер в байтах. Для документа по ссылке — значение заголовка &#x60;Content-Length&#x60; на момент добавления, &#x60;0&#x60;, если сервер его не вернул |
**status** | **string** | Статус индексации: - &#x60;new&#x60; — документ добавлен и ждёт индексации - &#x60;indexing&#x60; — индексируется - &#x60;indexed&#x60; — проиндексирован, используется в поиске - &#x60;error&#x60; — ошибка индексации, подробности в &#x60;status_info&#x60; |
**type** | **string** | Тип документа: &#x60;file&#x60; — загруженный файл, &#x60;link&#x60; — документ по ссылке |
**indexing_schedule** | [**\OpenAPI\Client\Model\IndexingSchedule**](IndexingSchedule.md) |  |
**indexing_version** | **string** | Версия индексации документа |
**status_info** | [**\OpenAPI\Client\Model\DocumentStatusInfo**](DocumentStatusInfo.md) |  |
**link** | **string** | URL документа. Только для документов типа &#x60;link&#x60; | [optional]
**created_at** | **\DateTime** | Дата и время добавления документа |
**updated_at** | **\DateTime** | Дата и время последнего изменения документа |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
