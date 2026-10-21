# # AgentV3

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | ID агента |
**name** | **string** | Название агента |
**description** | **string** | Описание агента |
**project_id** | **int** | ID проекта, в котором находится агент | [optional]
**model_id** | **int** | ID основной модели агента |
**provider_id** | **int** | ID провайдера модели |
**settings** | [**\OpenAPI\Client\Model\AgentSettings**](AgentSettings.md) |  |
**status** | **string** | Статус агента: - &#x60;active&#x60; — работает; - &#x60;suspended&#x60; — приостановлен владельцем; - &#x60;blocked&#x60; — заблокирован (для агентов с пакетом токенов — закончились токены или подписка); - &#x60;deleted&#x60; — удалён. |
**access_type** | **string** | Тип доступа: &#x60;public&#x60; — агент отвечает анонимным посетителям сайта через виджет; &#x60;private&#x60; — только по токену аккаунта. |
**access_id** | **string** | Идентификатор доступа агента. Используется для вызова агента из своих приложений через OpenAI-совместимое API (см. https://agent.timeweb.cloud/docs) и для встраивания виджета. |
**token_limit** | **int** | Устарело. Дневной лимит агента в токенах без привязки к модели, если он задан; &#x60;0&#x60; — такого лимита нет. Лимиты в деньгах, по моделям и за другие периоды здесь не отражаются — используйте лимиты агента (&#x60;/api/v1/cloud-ai/agents/{id}/entity-limits&#x60;). |
**total_tokens** | **int** | Всего токенов в пакете. Только для агентов с пакетом токенов (устаревшая схема оплаты). | [optional]
**used_tokens** | **int** | Использовано токенов пакета. Для агентов с поресурсной оплатой — &#x60;null&#x60;. |
**remaining_tokens** | **int** | Осталось токенов в пакете. Только для агентов с пакетом токенов. | [optional]
**token_package_id** | **int** | ID пакета токенов. Только для агентов с пакетом токенов; у агентов с поресурсной оплатой поле отсутствует. | [optional]
**subscription_renewal_date** | **\DateTime** | Дата продления подписки на пакет токенов. Только для агентов с пакетом токенов. | [optional]
**auto_buy_additional_tokens** | **bool** | Включена ли автоматическая докупка пакетов токенов |
**tools** | [**\OpenAPI\Client\Model\AgentToolsInner[]**](AgentToolsInner.md) | Инструменты, подключённые к агенту |
**additional_model_ids** | **int[]** | ID дополнительных моделей агента |
**additional_models** | [**\OpenAPI\Client\Model\AgentAdditionalModel[]**](AgentAdditionalModel.md) | Дополнительные модели агента с настройками |
**is_web_search_enabled** | **bool** | Включён ли веб-поиск |
**ai_gateway_key_id** | **string** | ID ключа AI Gateway, к которому привязан агент. &#x60;null&#x60; — агента можно привязать к ключу (см. обновление агента); поле отсутствует — привязка недоступна. | [optional]
**created_at** | **\DateTime** | Дата создания агента |
**knowledge_bases** | [**\OpenAPI\Client\Model\AgentV3KnowledgeBasesInner[]**](AgentV3KnowledgeBasesInner.md) | Базы знаний, подключённые к агенту, с режимом поиска |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
