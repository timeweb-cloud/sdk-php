# # InitializeResult

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**protocol_version** | **string** | Версия протокола: запрошенная клиентом, если сервер её поддерживает, иначе &#x60;2025-11-25&#x60; |
**capabilities** | **array<string,mixed>** | Возможности сервера |
**server_info** | [**\OpenAPI\Client\Model\InitializeResultServerInfo**](InitializeResultServerInfo.md) |  |
**instructions** | **string** | Правила для модели: какой инструмент на какой вопрос отвечает. MCP-клиенты передают их модели автоматически | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
