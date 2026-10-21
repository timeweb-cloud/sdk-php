# # AiGatewayChatMessage

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**role** | **string** | Роль автора сообщения |
**content** | **string** | Текст сообщения или массив частей (&#x60;text&#x60;, &#x60;image_url&#x60;, &#x60;input_audio&#x60;, &#x60;file&#x60;) для моделей, которые их принимают | [optional]
**name** | **string** | Имя автора сообщения | [optional]
**tool_calls** | [**\OpenAPI\Client\Model\AiGatewayToolCall[]**](AiGatewayToolCall.md) | Вызовы функций (в сообщениях &#x60;assistant&#x60;) | [optional]
**tool_call_id** | **string** | ID вызова функции, на который отвечает сообщение (в сообщениях &#x60;tool&#x60;) | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
