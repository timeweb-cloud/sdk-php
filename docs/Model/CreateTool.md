# # CreateTool

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | Название инструмента |
**description** | **string** | Описание инструмента | [optional]
**type** | **string** | Тип инструмента. Поддерживается только &#x60;MCP&#x60; |
**protocol** | **string** | Транспорт MCP: &#x60;http&#x60; — Streamable HTTP, &#x60;sse&#x60; — Server-Sent Events |
**url** | **string** | Адрес MCP-сервера. Сервер должен быть доступен из интернета |
**auth_data** | [**\OpenAPI\Client\Model\ToolAuthData**](ToolAuthData.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
