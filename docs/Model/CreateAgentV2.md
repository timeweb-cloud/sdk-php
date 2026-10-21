# # CreateAgentV2

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | Название агента |
**description** | **string** | Описание агента | [optional]
**access_type** | **string** | Тип доступа: &#x60;public&#x60; — агент отвечает анонимным посетителям сайта через виджет; &#x60;private&#x60; — только по токену аккаунта. |
**model_id** | **int** | ID основной модели агента |
**settings** | [**\OpenAPI\Client\Model\AgentSettings**](AgentSettings.md) |  |
**project_id** | **int** | ID проекта, в который нужно добавить агента. По умолчанию — проект по умолчанию. | [optional]
**is_web_search_enabled** | **bool** | Включить веб-поиск | [optional] [default to false]
**money_limit** | **float** | Дневной лимит расходов агента в валюте аккаунта. &#x60;0&#x60; или не передан — без лимита. Создаётся как лимит агента с периодом &#x60;day&#x60;; изменить его можно через лимиты агента. | [optional]
**token_limit** | **int** | Устарело: дневной лимит агента в токенах. &#x60;0&#x60; или не передан — без лимита. Не учитывается, если передан &#x60;money_limit&#x60;. | [optional]
**token_package_id** | **int** | Устарело и не учитывается: агент всегда создаётся с поресурсной оплатой. | [optional]
**additional_model_ids** | **int[]** | ID дополнительных моделей агента (например, для генерации изображений). Список заменяет текущий целиком. | [optional]
**additional_models** | [**\OpenAPI\Client\Model\AgentAdditionalModel[]**](AgentAdditionalModel.md) | Дополнительные модели вместе с настройками (для моделей генерации изображений — &#x60;width&#x60;/&#x60;height&#x60;). Если переданы и &#x60;additional_models&#x60;, и &#x60;additional_model_ids&#x60;, используется &#x60;additional_models&#x60;. | [optional]
**skill_ids** | **int[]** | ID навыков, которые нужно подключить к агенту сразу после создания (текущие версии навыков). Неизвестные ID пропускаются; ошибка подключения навыков не отменяет создание агента. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
