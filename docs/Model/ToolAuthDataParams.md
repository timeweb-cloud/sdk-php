# # ToolAuthDataParams

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**token** | **string** | Токен для заголовка &#x60;Authorization: Bearer&#x60; (для &#x60;bearer&#x60;). В ответах заменён на &#x60;********&#x60; | [optional]
**headers** | **array<string,string>** | HTTP-заголовки, которые передаются MCP-серверу (для &#x60;custom_headers&#x60;). В ответах значения заменены на &#x60;********&#x60; | [optional]
**client_id** | **string** | ID OAuth2-клиента (для &#x60;oauth2&#x60;). Не нужен, если сервер поддерживает динамическую регистрацию клиентов | [optional]
**client_secret** | **string** | Секрет OAuth2-клиента (для &#x60;oauth2&#x60;). В ответах заменён на &#x60;********&#x60; | [optional]
**authorization_url** | **string** | Адрес страницы авторизации провайдера (для &#x60;oauth2&#x60;). Если не задан, определяется по метаданным сервера | [optional]
**token_url** | **string** | Адрес получения токенов провайдера (для &#x60;oauth2&#x60;). Если не задан, определяется по метаданным сервера | [optional]
**registration_url** | **string** | Адрес динамической регистрации клиента (для &#x60;oauth2&#x60;) | [optional]
**scopes** | **string[]** | Запрашиваемые права (для &#x60;oauth2&#x60;). Если не заданы, берутся из метаданных сервера | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
