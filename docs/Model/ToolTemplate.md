# # ToolTemplate

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | ID шаблона. Передаётся в &#x60;template_id&#x60; при установке |
**name** | **string** | Название |
**key** | **string** | Уникальный ключ шаблона | [optional]
**description** | **string** | Описание |
**type** | **string** | Тип инструмента |
**version** | **string** | Версия шаблона |
**is_approved** | **int** | Шаблон одобрен для маркетплейса: &#x60;1&#x60; — да, &#x60;0&#x60; — нет |
**author_account_id** | **string** | Автор шаблона. &#x60;null&#x60; — шаблон Timeweb Cloud | [optional]
**is_system** | **int** | Системный шаблон платформы: &#x60;1&#x60; — да, &#x60;0&#x60; — нет |
**install_count** | **int** | Сколько раз шаблон установлен |
**category** | **string** | Категория шаблона | [optional]
**config_schema** | [**\OpenAPI\Client\Model\ToolTemplateConfigSchema**](ToolTemplateConfigSchema.md) |  | [optional]
**auth_type** | **string** | Способ авторизации на MCP-сервере |
**deployment_type** | **string** | Где работает MCP-сервер: &#x60;managed&#x60; — на стороне Timeweb Cloud, &#x60;external&#x60; — у стороннего сервиса |
**created_at** | **\DateTime** | Дата и время создания |
**updated_at** | **\DateTime** | Дата и время последнего изменения |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
