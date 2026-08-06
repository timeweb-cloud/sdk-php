# # UpdateHttpResource

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | Название CDN-ресурса. | [optional]
**description** | **string** | Описание CDN-ресурса. | [optional]
**preset_id** | **int** | ID тарифа CDN. Список доступных тарифов можно получить в &#x60;/api/v1/cdn/presets&#x60;. | [optional]
**storage_id** | **int** | ID S3-хранилища, которое будет источником контента. Нельзя передавать вместе с &#x60;config.origin.servers&#x60;. | [optional]
**traffic_limit_bytes** | **int** | Лимит исходящего трафика на расчетный месяц, в байтах. &#x60;null&#x60; — снять лимит. Если ресурс был остановлен по лимиту, при снятии или увеличении лимита раздача возобновится. | [optional]
**config** | [**\OpenAPI\Client\Model\HttpResourceConfig**](HttpResourceConfig.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
