# # SyncAiKeyLimitsLimitsInner

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**model_id** | **int** | ID модели из каталога. &#x60;null&#x60; — лимит на все модели |
**limit** | **int** | Лимит в токенах за период. Не передан — у существующего лимита не меняется, новый получает &#x60;0&#x60;. Нужен &#x60;limit&#x60; или &#x60;money_limit&#x60; | [optional]
**money_limit** | **float** | Лимит в деньгах за период, в валюте аккаунта. Приоритетнее &#x60;limit&#x60;. Не передан — у существующего лимита не меняется; &#x60;null&#x60; — снять денежный лимит (только вместе с &#x60;limit&#x60;); &#x60;0&#x60; — запросы запрещены | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
