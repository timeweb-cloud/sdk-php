# # CreateKnowledgebase

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | Название базы знаний |
**description** | **string** | Описание базы знаний | [optional]
**dbaas_preset_id** | **int** | ID тарифа кластера OpenSearch, который будет создан для базы знаний. Список тарифов баз данных — &#x60;GET /api/v2/presets/dbs&#x60; |
**network_id** | **string** | ID приватной сети (VPC), в которой будет создан кластер |
**token_package_id** | **int** | ID пакета токенов подписки. Подходят только базовые пакеты (&#x60;package_type: base&#x60;) из &#x60;GET /api/v1/cloud-ai/token-packages/knowledge-bases&#x60; |
**project_id** | **int** | ID проекта, в который нужно добавить базу знаний | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
