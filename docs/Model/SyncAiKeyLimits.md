# # SyncAiKeyLimits

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**limits** | [**\OpenAPI\Client\Model\SyncAiKeyLimitsLimitsInner[]**](SyncAiKeyLimitsLimitsInner.md) | Лимиты по моделям. &#x60;model_id&#x60; в списке не должны повторяться. Пустой список удаляет все лимиты периода |
**limit_type** | **string** | Период лимита: &#x60;hour&#x60; — час, &#x60;day&#x60; — сутки, &#x60;week&#x60; — 7 дней, &#x60;month&#x60; — 30 дней |
**entity_type** | **string** | Тип сущности. По умолчанию — тип ключа (лимиты на сам ключ) | [optional]
**entity_id** | **string** | ID сущности. Для лимитов на сам ключ не нужен | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
