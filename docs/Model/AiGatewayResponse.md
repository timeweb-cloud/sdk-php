# # AiGatewayResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | ID ответа. Передавайте его как есть в остальные запросы &#x60;/v1/responses&#x60; | [optional]
**object** | **string** | Тип объекта | [optional]
**created_at** | **int** | Время создания, Unix-время в секундах | [optional]
**status** | **string** | Статус ответа: &#x60;queued&#x60;, &#x60;in_progress&#x60;, &#x60;completed&#x60;, &#x60;incomplete&#x60; (достигнут лимит выходных токенов), &#x60;failed&#x60;, &#x60;cancelling&#x60; (отмена выполняется), &#x60;cancelled&#x60; | [optional]
**model** | **string** | Модель, которая ответила | [optional]
**output** | **array<string,mixed>[]** | Выходные элементы: сообщения, вызовы функций, рассуждения | [optional]
**incomplete_details** | [**\OpenAPI\Client\Model\AiGatewayResponseIncompleteDetails**](AiGatewayResponseIncompleteDetails.md) |  | [optional]
**usage** | [**\OpenAPI\Client\Model\AiGatewayResponseUsage**](AiGatewayResponseUsage.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
