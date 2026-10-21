# # CreateAgent

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | Название агента |
**description** | **string** | Описание агента | [optional]
**access_type** | **string** | Тип доступа: &#x60;public&#x60; — агент отвечает анонимным посетителям сайта через виджет; &#x60;private&#x60; — только по токену аккаунта. |
**model_id** | **int** | ID основной модели агента |
**settings** | [**\OpenAPI\Client\Model\AgentSettings**](AgentSettings.md) |  |
**project_id** | **int** | ID проекта, в который нужно добавить агента. По умолчанию — проект по умолчанию. | [optional]
**is_web_search_enabled** | **bool** | Включить веб-поиск | [optional] [default to false]
**token_package_id** | **int** | ID пакета токенов. Обязателен для совместимости, но не учитывается: агент всегда создаётся с поресурсной оплатой. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
