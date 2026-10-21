# # AgentTokenStatistic

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**time** | **\DateTime** | Начало интервала |
**model_name** | **string** | Модель, на которую пришлись запросы. В интервалах без запросов поле отсутствует. | [optional]
**ingoing_tokens** | **int** | Входящие токены (промпты). Если для аккаунта включена тарификация кэша, токены из кэша считаются отдельно. |
**outgoing_tokens** | **int** | Исходящие токены (ответы) |
**cache_read_tokens** | **int** | Входящие токены, прочитанные из кэша |
**cache_write_tokens** | **int** | Входящие токены, записанные в кэш |
**total_cost** | **float** | Стоимость токенов интервала до учёта бонусов, в валюте аккаунта. &#x60;null&#x60; — стоимость посчитать не удалось. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
