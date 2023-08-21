# # UpdateBalancer

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | Удобочитаемое имя, установленное для балансировщика. | [optional]
**algo** | **string** | Алгоритм переключений балансировщика. | [optional]
**is_sticky** | **bool** | Это логическое значение, которое показывает, сохраняется ли сессия. | [optional]
**is_use_proxy** | **bool** | Это логическое значение, которое показывает, выступает ли балансировщик в качестве прокси. | [optional]
**is_ssl** | **bool** | Это логическое значение, которое показывает, требуется ли перенаправление на SSL. | [optional]
**is_keepalive** | **bool** | Это логическое значение, которое показывает, выдает ли балансировщик сигнал о проверке жизнеспособности. | [optional]
**proto** | **string** | Протокол. | [optional]
**port** | **float** | Порт балансировщика. | [optional]
**path** | **string** | Адрес балансировщика. | [optional]
**inter** | **float** | Интервал проверки. | [optional]
**timeout** | **float** | Таймаут ответа балансировщика. | [optional]
**fall** | **float** | Порог количества ошибок. | [optional]
**rise** | **float** | Порог количества успешных ответов. | [optional]
**preset_id** | **float** | Идентификатор тарифа. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
