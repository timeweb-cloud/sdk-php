# # AiGatewayResponseCreateRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**model** | **string** | ID модели из &#x60;GET /v1/models&#x60; |
**input** | **string** | Текст или массив входных элементов (сообщения, результаты вызова функций и т. п.) |
**instructions** | **string** | Системные инструкции | [optional]
**previous_response_id** | **string** | ID сохранённого ответа, чтобы продолжить диалог | [optional]
**stream** | **bool** | Отправлять ответ потоком типизированных событий Server-Sent Events | [optional] [default to false]
**background** | **bool** | Выполнить запрос в фоне: результат получайте через &#x60;GET /v1/responses/{response_id}&#x60; | [optional]
**store** | **bool** | Сохранить ответ, чтобы получить его позже или продолжить диалог | [optional]
**max_output_tokens** | **int** | Максимум выходных токенов | [optional]
**tools** | **array<string,mixed>[]** | Инструменты, которые может вызвать модель | [optional]
**reasoning** | [**\OpenAPI\Client\Model\AiGatewayResponseCreateRequestReasoning**](AiGatewayResponseCreateRequestReasoning.md) |  | [optional]
**text** | **array<string,mixed>** | Настройки формата текста ответа | [optional]
**temperature** | **float** | Температура выборки | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
