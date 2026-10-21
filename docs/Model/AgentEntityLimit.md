# # AgentEntityLimit

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | ID лимита |
**ai_key_id** | **string** | ID служебного ключа агента, на котором учитывается лимит |
**entity_type** | **string** | Тип сущности — всегда &#x60;agent&#x60; |
**entity_id** | **string** | ID агента |
**limit_type** | **string** | Период лимита |
**model_id** | **int** | ID модели, на запросы к которой действует лимит. &#x60;null&#x60; — лимит на все модели агента. |
**limit** | **int** | Лимит в токенах за период. Не действует, если задан &#x60;money_limit&#x60;. &#x60;0&#x60; — запрещены все запросы. |
**money_limit** | **float** | Лимит расходов за период в валюте аккаунта; &#x60;null&#x60; — не задан, действует &#x60;limit&#x60; |
**usage** | **int** | Израсходовано токенов в текущем периоде |
**money_usage** | **float** | Израсходовано денег в текущем периоде (полная стоимость запросов до бонусов) |
**created_at** | **\DateTime** | Дата создания лимита |
**expire_at** | **\DateTime** | Окончание текущего периода — после него расход обнуляется |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
