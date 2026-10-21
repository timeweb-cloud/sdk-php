# # UpdateTool

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | Название инструмента | [optional]
**description** | **string** | Описание инструмента | [optional]
**type** | **string** | Тип инструмента | [optional]
**protocol** | **string** | Транспорт MCP | [optional]
**url** | **string** | Адрес MCP-сервера. Список методов при смене адреса не обновляется — вызовите обновление методов | [optional]
**auth_data** | [**\OpenAPI\Client\Model\ToolAuthData**](ToolAuthData.md) |  | [optional]
**status** | **string** | Статус инструмента. Чтобы временно выключить инструмент у всех агентов, передайте &#x60;inactive&#x60;, чтобы включить — &#x60;active&#x60; | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
