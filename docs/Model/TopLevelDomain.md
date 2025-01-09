# # TopLevelDomain

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**allowed_buy_periods** | [**\OpenAPI\Client\Model\TopLevelDomainAllowedBuyPeriodsInner[]**](TopLevelDomainAllowedBuyPeriodsInner.md) | Список доступных периодов для регистрации/продления доменов со стоимостью. |
**early_renew_period** | **float** | Количество дней до истечение срока регистрации, когда можно продлять домен. |
**grace_period** | **float** | Количество дней, которые действует льготный период когда вы ещё можете продлить домен, после окончания его регистрации |
**id** | **float** | ID доменной зоны. |
**is_published** | **bool** | Это логическое значение, которое показывает, опубликована ли доменная зона. |
**is_registered** | **bool** | Это логическое значение, которое показывает, зарегистрирована ли доменная зона. |
**is_whois_privacy_default_enabled** | **bool** | Это логическое значение, которое показывает, включено ли по умолчанию скрытие данных администратора для доменной зоны. |
**is_whois_privacy_enabled** | **bool** | Это логическое значение, которое показывает, доступно ли управление скрытием данных администратора для доменной зоны. |
**name** | **string** | Имя доменной зоны. |
**price** | **float** | Цена регистрации домена |
**prolong_price** | **float** | Цена продления домена. |
**registrar** | **string** | Регистратор доменной зоны. |
**transfer** | **float** | Цена услуги трансфера домена. |
**whois_privacy_price** | **float** | Цена услуги скрытия данных администратора для доменной зоны. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
