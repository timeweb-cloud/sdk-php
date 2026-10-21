# # UpdateAgent

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | Название агента | [optional]
**description** | **string** | Описание агента | [optional]
**access_type** | **string** | Тип доступа | [optional]
**status** | **string** | Статус агента: &#x60;suspended&#x60; — приостановить, &#x60;active&#x60; — возобновить. Статус заблокированного или удалённого агента изменить нельзя. | [optional]
**settings** | [**\OpenAPI\Client\Model\AgentSettings**](AgentSettings.md) |  | [optional]
**project_id** | **int** | Не используется: перенести агента в другой проект можно методами проектов. | [optional]
**additional_model_ids** | **int[]** | ID дополнительных моделей агента (например, для генерации изображений). Список заменяет текущий целиком. | [optional]
**additional_models** | [**\OpenAPI\Client\Model\AgentAdditionalModel[]**](AgentAdditionalModel.md) | Дополнительные модели вместе с настройками (для моделей генерации изображений — &#x60;width&#x60;/&#x60;height&#x60;). Если переданы и &#x60;additional_models&#x60;, и &#x60;additional_model_ids&#x60;, используется &#x60;additional_models&#x60;. | [optional]
**is_web_search_enabled** | **bool** | Включить или выключить веб-поиск | [optional]
**ai_gateway_key_id** | **string** | ID ключа AI Gateway, к которому нужно привязать агента. Привязка доступна, только если в ответе агента &#x60;ai_gateway_key_id&#x60; равен &#x60;null&#x60; (агент без баз знаний, инструментов и интеграций, созданный до 9 октября 2026 года), и делается один раз. При первой привязке на аккаунт однократно начисляется временная скидка 10% на запросы через ключи AI Gateway. | [optional]
**token_package_id** | **int** | Новый пакет токенов. Только для агентов с пакетом токенов (устаревшая схема оплаты): пакет должен относиться к модели агента и быть не меньше текущего, его стоимость сразу списывается с баланса. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
