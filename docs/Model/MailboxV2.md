# # MailboxV2

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**idn_name** | **string** | IDN домен почтового ящика |
**autoreply_message** | **string** | Сообщение автоответчика на входящие письма |
**autoreply_status** | **bool** | Включен ли автоответчик на входящие письма |
**autoreply_subject** | **string** | Тема сообщения автоответчика на входящие письма |
**comment** | **string** | Комментарий к почтовому ящику |
**filter_action** | **string** | Что делать с письмами, которые попадают в спам |
**filter_status** | **bool** | Включен ли спам-фильтр |
**forward_list** | **string[]** | Список адресов для пересылки входящих писем |
**forward_status** | **bool** | Включена ли пересылка входящих писем |
**outgoing_control** | **bool** | Включена ли пересылка исходящих писем |
**outgoing_email** | **string** | Адрес для пересылки исходящих писем |
**password** | **string** | Пароль почтового ящика (всегда возвращается пустой строкой) |
**spambox** | **string** | Адрес для пересылки спама при выбранном действии forward |
**white_list** | **string[]** | Белый список адресов от которых письма не будут попадать в спам |
**webmail** | **bool** | Доступен ли Webmail |
**dovecot** | **bool** | Есть ли доступ через dovecot |
**fqdn** | **string** | Домен почты |
**leave_messages** | **bool** | Оставлять ли сообщения на сервере при пересылке |
**mailbox** | **string** | Название почтового ящика |
**owner_full_name** | **string** | ФИО владельца почтового ящика |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
