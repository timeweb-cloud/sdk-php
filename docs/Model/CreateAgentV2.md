# # CreateAgentV2

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | Название агента |
**description** | **string** | Описание агента | [optional]
**access_type** | **string** | Тип доступа к агенту |
**model_id** | **float** | ID основной модели |
**token_limit** | **float** | Дневной лимит токенов для агента (0 — без лимита) | [optional]
**settings** | [**\OpenAPI\Client\Model\AgentSettings**](AgentSettings.md) |  |
**project_id** | **float** | ID проекта | [optional]
**additional_model_ids** | **float[]** | Список ID дополнительных моделей агента | [optional]
**is_web_search_enabled** | **bool** | Признак использования веб-поиска агентом | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
