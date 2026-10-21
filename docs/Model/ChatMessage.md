# # ChatMessage

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | ID сообщения |
**message_id** | **string** | Строковый идентификатор сообщения. Есть не у всех сообщений. | [optional]
**role** | **string** | Автор сообщения |
**created_at** | **\DateTime** | Дата создания сообщения |
**text** | **string** | Текст сообщения |
**is_good** | **bool** | Оценка ответа: &#x60;true&#x60; — понравился, &#x60;false&#x60; — не понравился, &#x60;null&#x60; — без оценки |
**uptime_ms** | **int** | Время до начала ответа агента в миллисекундах (для ответов агента) |
**file** | [**\OpenAPI\Client\Model\ChatMessageFile**](ChatMessageFile.md) |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
