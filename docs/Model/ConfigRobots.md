# # ConfigRobots

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**type** | **string** | Режим отдачи &#x60;robots.txt&#x60;. - &#x60;deny&#x60; — CDN отдает &#x60;robots.txt&#x60;, запрещающий индексацию; - &#x60;cached&#x60; — &#x60;robots.txt&#x60; берется с источника контента; - &#x60;custom&#x60; — CDN отдает содержимое из поля &#x60;content&#x60;. |
**content** | **string** | Содержимое &#x60;robots.txt&#x60;. Обязательно и учитывается только при &#x60;type&#x60; &#x3D; &#x60;custom&#x60;. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
