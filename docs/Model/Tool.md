# # Tool

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | ID инструмента |
**account_id** | **string** | Логин аккаунта-владельца |
**template_id** | **int** | ID шаблона маркетплейса, из которого установлен инструмент. &#x60;null&#x60; — собственный MCP-сервер |
**key** | **string** | Ключ шаблона маркетплейса. Сейчас в ответах не возвращается | [optional]
**name** | **string** | Название инструмента |
**description** | **string** | Описание инструмента |
**type** | **string** | Тип инструмента. У инструментов из шаблонов может быть &#x60;null&#x60; |
**protocol** | **string** | Транспорт MCP: &#x60;http&#x60; — Streamable HTTP, &#x60;sse&#x60; — Server-Sent Events. У инструментов из шаблонов всегда &#x60;null&#x60; |
**url** | **string** | Адрес MCP-сервера. У инструментов из шаблонов всегда &#x60;null&#x60; |
**methods** | [**\OpenAPI\Client\Model\ToolMethod[]**](ToolMethod.md) | Методы MCP-сервера. &#x60;null&#x60; или пустой массив — методы ещё не получены, например до завершения OAuth2-авторизации |
**auth_data** | [**\OpenAPI\Client\Model\ToolAuthData**](ToolAuthData.md) |  |
**status** | **string** | Статус инструмента: &#x60;active&#x60; — работает, &#x60;inactive&#x60; — выключен вручную, &#x60;pending_auth&#x60; — ожидает OAuth2-авторизации, &#x60;error&#x60; — последнее обновление методов завершилось ошибкой (причина в &#x60;status_info&#x60;). Агент вызывает только инструменты в статусе &#x60;active&#x60; |
**status_info** | **string** | Причина статуса &#x60;error&#x60; |
**created_at** | **\DateTime** | Дата и время создания |
**updated_at** | **\DateTime** | Дата и время последнего изменения |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
