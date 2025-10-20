# # Knowledgebase

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **float** | Уникальный идентификатор базы знаний |
**name** | **string** | Название базы знаний |
**description** | **string** | Описание базы знаний | [optional]
**dbaas_id** | **float** | ID базы данных (opensearch или qdrant) |
**status** | **string** | Статус базы знаний |
**last_sync** | **\DateTime** | Дата последней синхронизации | [optional]
**total_tokens** | **float** | Всего токенов выделено |
**used_tokens** | **float** | Использовано токенов |
**remaining_tokens** | **float** | Осталось токенов |
**token_package_id** | **float** | ID пакета токенов |
**subscription_renewal_date** | **\DateTime** | Дата обновления подписки |
**documents** | [**\OpenAPI\Client\Model\Document[]**](Document.md) | Документы в базе знаний |
**agents_ids** | **float[]** | ID агентов, связанных с базой знаний |
**created_at** | **\DateTime** | Дата создания базы знаний |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
