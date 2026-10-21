# # AiGatewayCompletionRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**model** | **string** | ID модели из &#x60;GET /v1/models&#x60; |
**prompt** | **string** | Текст или список текстов для продолжения |
**max_tokens** | **int** | Максимум выходных токенов | [optional]
**temperature** | **float** | Температура выборки | [optional]
**top_p** | **float** | Порог nucleus sampling | [optional]
**stop** | **string** | Строка или список строк, на которых генерация останавливается | [optional]
**stream** | **bool** | Отправлять ответ потоком Server-Sent Events (&#x60;text/event-stream&#x60;) | [optional] [default to false]
**stream_options** | [**\OpenAPI\Client\Model\AiGatewayChatCompletionRequestStreamOptions**](AiGatewayChatCompletionRequestStreamOptions.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
