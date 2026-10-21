# # AiGatewayChatCompletionRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**model** | **string** | ID модели из &#x60;GET /v1/models&#x60; |
**messages** | [**\OpenAPI\Client\Model\AiGatewayChatMessage[]**](AiGatewayChatMessage.md) | История диалога целиком |
**stream** | **bool** | Отправлять ответ потоком Server-Sent Events (&#x60;text/event-stream&#x60;) | [optional] [default to false]
**stream_options** | [**\OpenAPI\Client\Model\AiGatewayChatCompletionRequestStreamOptions**](AiGatewayChatCompletionRequestStreamOptions.md) |  | [optional]
**max_completion_tokens** | **int** | Максимум выходных токенов, включая рассуждения | [optional]
**max_tokens** | **int** | Устаревший синоним &#x60;max_completion_tokens&#x60; | [optional]
**temperature** | **float** | Температура выборки | [optional]
**top_p** | **float** | Порог nucleus sampling | [optional]
**n** | **int** | Количество вариантов ответа | [optional] [default to 1]
**stop** | **string** | Строка или список строк, на которых генерация останавливается | [optional]
**tools** | **array<string,mixed>[]** | Функции, которые может вызвать модель | [optional]
**tool_choice** | **string** | Режим вызова функций: &#x60;none&#x60;, &#x60;auto&#x60;, &#x60;required&#x60; или объект с конкретной функцией | [optional]
**response_format** | **array<string,mixed>** | Формат ответа: &#x60;{\&quot;type\&quot;: \&quot;json_object\&quot;}&#x60; или &#x60;{\&quot;type\&quot;: \&quot;json_schema\&quot;, \&quot;json_schema\&quot;: {...}}&#x60; | [optional]
**reasoning_effort** | **string** | Уровень рассуждений для моделей с рассуждениями, например &#x60;low&#x60;, &#x60;high&#x60; | [optional]
**user** | **string** | Идентификатор вашего конечного пользователя | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
