# # CreateBalancer

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | Удобочитаемое имя, установленное для балансировщика. |
**algo** | **string** | Алгоритм переключений балансировщика. |
**is_sticky** | **bool** | Это логическое значение, которое показывает, сохраняется ли сессия. |
**is_use_proxy** | **bool** | Это логическое значение, которое показывает, выступает ли балансировщик в качестве прокси. |
**is_ssl** | **bool** | Это логическое значение, которое показывает, требуется ли перенаправление на SSL. |
**is_keepalive** | **bool** | Это логическое значение, которое показывает, выдает ли балансировщик сигнал о проверке жизнеспособности. |
**proto** | **string** | Протокол. |
**port** | **float** | Порт балансировщика. |
**path** | **string** | Адрес балансировщика. |
**inter** | **float** | Интервал проверки. |
**timeout** | **float** | Таймаут ответа балансировщика. |
**fall** | **float** | Порог количества ошибок. |
**rise** | **float** | Порог количества успешных ответов. |
**preset_id** | **float** | Идентификатор тарифа. |
**network** | [**\OpenAPI\Client\Model\Network**](Network.md) |  | [optional]
**availability_zone** | [**\OpenAPI\Client\Model\AvailabilityZone**](AvailabilityZone.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
