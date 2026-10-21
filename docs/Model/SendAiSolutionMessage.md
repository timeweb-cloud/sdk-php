# # SendAiSolutionMessage

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**message** | **string** | Текст сообщения, до 32 000 символов. Если не передать, агент сам отправит приветствие — так можно получить первую реплику чата | [optional]
**conversation_id** | **string** | ID разговора. Если не передать, сообщение уйдёт в основной разговор решения (&#x60;solution-&lt;solution_id&gt;&#x60;). Чтобы начать отдельный разговор, передайте новый ID. Буквы, цифры и дефисы, до 64 символов | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
