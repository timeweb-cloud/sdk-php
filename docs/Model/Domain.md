# # Domain

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**allowed_buy_periods** | [**\OpenAPI\Client\Model\DomainAllowedBuyPeriodsInner[]**](DomainAllowedBuyPeriodsInner.md) | Допустимые периоды продления домена. |
**days_left** | **float** | Количество дней, оставшихся до конца срока регистрации домена. |
**domain_status** | **string** | Статус домена. |
**expiration** | **string** | Дата окончания срока регистрации домена, для доменов без срока окончания регистрации будет приходить 0000-00-00. |
**fqdn** | **string** | Полное имя домена. |
**id** | **float** | ID домена. |
**avatar_link** | **string** | Ссылка на аватар домена. |
**is_autoprolong_enabled** | **bool** | Это логическое значение, которое показывает, включено ли автопродление домена. |
**is_premium** | **bool** | Это логическое значение, которое показывает, является ли домен премиальным. |
**is_prolong_allowed** | **bool** | Это логическое значение, которое показывает, можно ли сейчас продлить домен. |
**is_technical** | **bool** | Это логическое значение, которое показывает, является ли домен техническим. |
**is_whois_privacy_enabled** | **bool** | Это логическое значение, которое показывает, включено ли скрытие данных администратора домена для whois. Если приходит null, значит для данной зоны эта услуга не доступна. |
**linked_ip** | **string** | Привязанный к домену IP-адрес. |
**paid_till** | **string** | До какого числа оплачен домен. |
**person_id** | **float** | ID администратора, на которого зарегистрирован домен. |
**premium_prolong_cost** | **float** | Стоимость премиального домена. |
**provider** | **string** | ID регистратора домена. |
**request_status** | **string** | Статус заявки на продление/регистрацию/трансфер домена. |
**subdomains** | [**\OpenAPI\Client\Model\Subdomain[]**](Subdomain.md) | Список поддоменов. |
**tld_id** | **float** | ID доменной зоны. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
