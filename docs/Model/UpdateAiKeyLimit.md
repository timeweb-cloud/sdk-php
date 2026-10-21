# # UpdateAiKeyLimit

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**limit** | **int** | Лимит в токенах за период. Не передан — не меняется. &#x60;0&#x60; — запросы запрещены | [optional]
**money_limit** | **float** | Лимит в деньгах за период, в валюте аккаунта, не больше 8 знаков после точки. Приоритетнее &#x60;limit&#x60;. Не передан — не меняется; &#x60;null&#x60; — снять денежный лимит (только вместе с &#x60;limit&#x60;); &#x60;0&#x60; — запросы запрещены | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
