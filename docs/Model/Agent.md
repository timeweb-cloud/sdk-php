# # Agent

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **float** | Уникальный идентификатор агента |
**name** | **string** | Название агента |
**description** | **string** | Описание агента |
**model_id** | **float** | ID модели |
**provider_id** | **float** | ID провайдера |
**settings** | [**\OpenAPI\Client\Model\AgentSettings**](AgentSettings.md) |  |
**status** | **string** | Статус агента |
**access_type** | **string** | Тип доступа к агенту |
**total_tokens** | **float** | Всего токенов выделено агенту |
**used_tokens** | **float** | Использовано токенов |
**remaining_tokens** | **float** | Осталось токенов |
**token_package_id** | **float** | ID пакета токенов |
**subscription_renewal_date** | **\DateTime** | Дата обновления подписки |
**knowledge_bases_ids** | **float[]** | ID баз знаний, связанных с агентом |
**access_id** | **float** | ID доступа |
**created_at** | **\DateTime** | Дата создания агента |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
