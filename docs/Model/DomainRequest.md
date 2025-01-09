# # DomainRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**account_id** | **string** | ID пользователя |
**auth_code** | **string** | Код авторизации для переноса домена. |
**date** | **\DateTime** | Дата создания заявки. |
**domain_bundle_id** | **string** | Идентификационный номер бандла, в который входит данная заявка (null - если заявка не входит ни в один бандл). |
**error_code_transfer** | **string** | Код ошибки трансфера домена. |
**fqdn** | **string** | Полное имя домена. |
**group_id** | **float** | ID группы доменных зон. |
**id** | **float** | ID заявки. |
**is_antispam_enabled** | **bool** | Это логическое значение, которое показывает включена ли услуга \&quot;Антиспам\&quot; для домена |
**is_autoprolong_enabled** | **bool** | Это логическое значение, которое показывает, включено ли автопродление домена. |
**is_whois_privacy_enabled** | **bool** | Это логическое значение, которое показывает, включено ли скрытие данных администратора домена для whois. Опция недоступна для доменов в зонах .ru и .рф. |
**message** | **string** | Информационное сообщение о заявке. |
**money_source** | **string** | Источник (способ) оплаты заявки. |
**period** | [**\OpenAPI\Client\Model\DomainPaymentPeriod**](DomainPaymentPeriod.md) |  |
**person_id** | **float** | Идентификационный номер персоны для заявки на регистрацию. |
**prime** | [**\OpenAPI\Client\Model\DomainPrimeType**](DomainPrimeType.md) |  |
**soon_expire** | **float** | Количество дней до конца регистрации домена, за которые мы уведомим о необходимости продления. |
**sort_order** | **float** | Это значение используется для сортировки доменных зон в панели управления. |
**type** | **string** | Тип заявки. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
