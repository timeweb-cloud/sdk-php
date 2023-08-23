# # DomainRegister

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**action** | **string** | Тип создаваемой заявки. |
**fqdn** | **string** | Полное имя домена. |
**is_autoprolong_enabled** | **bool** | Это логическое значение, которое показывает, включено ли автопродление домена. | [optional]
**is_whois_privacy_enabled** | **bool** | Это логическое значение, которое показывает, включено ли скрытие данных администратора домена для whois. Опция недоступна для доменов в зонах .ru и .рф. | [optional]
**ns** | [**\OpenAPI\Client\Model\DomainRegisterNsInner[]**](DomainRegisterNsInner.md) | Name-серверы для регистрации домена. Если не передавать этот параметр, будут использованы наши стандартные name-серверы. Нужно указать как минимум 2 name-сервера. | [optional]
**period** | [**\OpenAPI\Client\Model\DomainPaymentPeriod**](DomainPaymentPeriod.md) |  | [optional]
**person_id** | **float** | Идентификатор администратора, на которого регистрируется домен. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
