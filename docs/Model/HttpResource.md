# # HttpResource

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | ID CDN-ресурса. Генерируется автоматически при создании. |
**name** | **string** | Название CDN-ресурса. |
**description** | **string** | Описание CDN-ресурса. | [optional]
**source** | **string** | Источник контента: имя S3-бакета, если ресурс создан поверх хранилища, либо хост origin-сервера. |
**traffic_usage** | [**\OpenAPI\Client\Model\TrafficUsage**](TrafficUsage.md) |  |
**status** | **string** | Статус CDN-ресурса. - &#x60;created&#x60; — ресурс создан и раздает контент; - &#x60;processing&#x60; — конфигурация применяется на стороне CDN; - &#x60;stopped&#x60; — раздача приостановлена; - &#x60;failed&#x60; — настройка ресурса завершилась с ошибкой; - &#x60;no_paid&#x60; — ресурс не оплачен; - &#x60;blocked&#x60; — ресурс заблокирован; - &#x60;traffic_limit_exceeded&#x60; — раздача остановлена автоматически из-за достижения лимита трафика &#x60;traffic_limit_bytes&#x60;. |
**cdn_domain** | **string** | Технический домен, выданный ресурсу. Доступен сразу после создания и всегда остается в списке доменов ресурса. |
**preset_id** | **int** | ID тарифа CDN. Список доступных тарифов можно получить в &#x60;/api/v1/cdn/presets&#x60;. |
**project_id** | **int** | ID проекта, к которому привязан ресурс. | [optional]
**avatar_link** | **string** | Ссылка на аватар ресурса. | [optional]
**storage_id** | **int** | ID S3-хранилища, которое используется в качестве источника контента. &#x60;null&#x60;, если источником является origin-сервер. | [optional]
**traffic_limit_bytes** | **int** | Лимит исходящего трафика на расчетный месяц, в байтах. При достижении лимита раздача останавливается, а ресурс переходит в статус &#x60;traffic_limit_exceeded&#x60;. &#x60;null&#x60; — лимит не задан. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
