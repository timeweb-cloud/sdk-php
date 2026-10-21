# # AgentSettings

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**model** | [**\OpenAPI\Client\Model\AgentModelSettings**](AgentModelSettings.md) |  |
**system_prompt** | **string** | Системный промпт (инструкция) агента |
**refine_query** | **bool** | Уточнять (переформулировать) запрос пользователя перед поиском по базам знаний |
**memory_enabled** | **bool** | Запоминать факты о каждом авторизованном пользователе и учитывать их в ответах. В виджете не работает. | [optional] [default to false]
**widget** | [**\OpenAPI\Client\Model\AgentWidgetSettings**](AgentWidgetSettings.md) |  | [optional]
**web_search_allowed_sites** | **string[]** | Домены, которыми ограничивается веб-поиск агента (не более 5). Каждый элемент — домен (&#x60;timeweb.ru&#x60;) или домен с путём (&#x60;timeweb.ru/docs&#x60;). Если поле не передано при обновлении, сохранённый список не меняется. | [optional]
**additional_models** | [**\OpenAPI\Client\Model\AgentAdditionalModel[]**](AgentAdditionalModel.md) | Настройки дополнительных моделей. Заполняется автоматически из поля &#x60;additional_models&#x60; запроса создания или обновления агента, передавать здесь не нужно. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
