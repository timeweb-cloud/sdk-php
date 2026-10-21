# # AiKeyTokenStatisticPoint

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**time** | **\DateTime** | Начало интервала |
**ingoing_tokens** | **int** | Входные токены (запрос) |
**outgoing_tokens** | **int** | Выходные токены (ответ модели) |
**cache_read_tokens** | **int** | Входные токены, прочитанные из кэша |
**cache_write_tokens** | **int** | Входные токены, записанные в кэш |
**total_cost** | **float** | Стоимость запросов за интервал с учётом скидок аккаунта, до списания бонусов, в валюте аккаунта. &#x60;null&#x60; — стоимость части запросов интервала определить не удалось |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
