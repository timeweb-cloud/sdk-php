# # DomainProlong

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**action** | **string** | Тип создаваемой заявки. |
**fqdn** | **string** | Полное имя домена. |
**is_antispam_enabled** | **bool** | Это логическое значение, которое показывает включена ли услуга \&quot;Антиспам\&quot; для домена | [optional]
**is_autoprolong_enabled** | **bool** | Это логическое значение, которое показывает, включено ли автопродление домена. | [optional]
**is_whois_privacy_enabled** | **bool** | Это логическое значение, которое показывает, включено ли скрытие данных администратора домена для whois. Опция недоступна для доменов в зонах .ru и .рф. | [optional]
**period** | [**\OpenAPI\Client\Model\DomainPaymentPeriod**](DomainPaymentPeriod.md) |  | [optional]
**person_id** | **float** | ID администратора, на которого зарегистрирован домен. | [optional]
**prime** | [**\OpenAPI\Client\Model\DomainPrimeType**](DomainPrimeType.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
