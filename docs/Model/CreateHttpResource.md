# # CreateHttpResource

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | Название CDN-ресурса. |
**preset_id** | **int** | ID тарифа CDN. Список доступных тарифов можно получить в &#x60;/api/v1/cdn/presets&#x60;. |
**description** | **string** | Описание CDN-ресурса. | [optional]
**storage_id** | **int** | ID S3-хранилища, которое будет источником контента. Нельзя передавать вместе с &#x60;server&#x60;. | [optional]
**server** | [**\OpenAPI\Client\Model\OriginServer**](OriginServer.md) |  | [optional]
**use_https** | **bool** | Обращаться к источнику контента по HTTPS. | [optional]
**delivery_domain** | **string** | Собственный домен, с которого будет раздаваться контент. Домен добавляется к техническому домену ресурса, для его работы нужно направить CNAME-запись на &#x60;cdn_domain&#x60;. | [optional]
**project_id** | **int** | ID проекта, в который нужно поместить ресурс. Если не указан, ресурс попадет в проект по умолчанию. | [optional]
**traffic_limit_bytes** | **int** | Лимит исходящего трафика на расчетный месяц, в байтах. При достижении лимита раздача останавливается автоматически. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
