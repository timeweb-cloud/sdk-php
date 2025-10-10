# # CreateBalancer

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | Удобочитаемое имя, установленное для балансировщика. Должно быть уникальным в рамках аккаунта |
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
**maxconn** | **float** | Максимальное количество соединений. | [optional]
**connect_timeout** | **float** | Таймаут подключения. | [optional]
**client_timeout** | **float** | Таймаут клиента. | [optional]
**server_timeout** | **float** | Таймаут сервера. | [optional]
**httprequest_timeout** | **float** | Таймаут HTTP запроса. | [optional]
**preset_id** | **float** | ID тарифа. |
**network** | [**\OpenAPI\Client\Model\Network**](Network.md) |  | [optional]
**availability_zone** | [**\OpenAPI\Client\Model\AvailabilityZone**](AvailabilityZone.md) |  | [optional]
**project_id** | **int** | ID проекта | [optional]
**certificates** | [**\OpenAPI\Client\Model\CreateBalancerCertificates**](CreateBalancerCertificates.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
