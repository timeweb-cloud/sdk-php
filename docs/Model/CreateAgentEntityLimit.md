# # CreateAgentEntityLimit

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**limit_type** | **string** | Период лимита |
**model_id** | **int** | ID модели, на запросы к которой действует лимит. Не передан или &#x60;null&#x60; — лимит на все модели агента. | [optional]
**limit** | **int** | Лимит в токенах за период. Если не передан — &#x60;0&#x60;, тогда обязателен &#x60;money_limit&#x60;. Не действует, если задан &#x60;money_limit&#x60;. &#x60;0&#x60; при отсутствии &#x60;money_limit&#x60; — запрещены все запросы. | [optional]
**money_limit** | **float** | Лимит расходов за период в валюте аккаунта, до 8 знаков после запятой. Приоритетнее &#x60;limit&#x60;. &#x60;0&#x60; — запрещены все запросы. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
