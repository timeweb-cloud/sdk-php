# # DocumentStatusInfo

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**type** | **string** | Тип состояния, совпадает со статусом документа |
**timestamp** | **\DateTime** | Время, когда записано состояние |
**error_code** | **string** | Код ошибки, только для &#x60;type: error&#x60;: - &#x60;INSUFFICIENT_TOKENS&#x60; — недостаточно токенов для индексации - &#x60;CRITICAL_BALANCE&#x60; — критически низкий остаток токенов - &#x60;NEGATIVE_BALANCE&#x60; — отрицательный остаток токенов - &#x60;INDEXING_ERROR&#x60; — не удалось обработать документ | [optional]
**stage** | **string** | Этап индексации, на котором произошла ошибка | [optional]
**trace_id** | **string** | Идентификатор операции индексации — укажите его при обращении в поддержку | [optional]
**details** | [**\OpenAPI\Client\Model\DocumentStatusInfoDetails**](DocumentStatusInfoDetails.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
