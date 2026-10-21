# # Bot

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | ID бота в Timeweb Cloud |
**account_id** | **string** | Логин аккаунта, которому принадлежит бот |
**agent_id** | **int** | ID агента, который отвечает от имени бота |
**username** | **string** | Username бота в мессенджере (без &#x60;@&#x60;) |
**first_name** | **string** | Имя бота в мессенджере |
**description** | **string** | Комментарий к боту. Пустая строка, если не задан |
**status** | **string** | Статус подключения: &#x60;pending&#x60; — ожидает подключения, &#x60;active&#x60; — работает, &#x60;error&#x60; — ошибка подключения |
**whitelist_enabled** | **bool** | Включено ли ограничение доступа по списку username. У MAX-ботов всегда &#x60;false&#x60; |
**whitelist_usernames** | **string[]** | Username пользователей, которым разрешено писать боту: в нижнем регистре, без &#x60;@&#x60;. У MAX-ботов всегда пустой |
**created_at** | **\DateTime** | Дата и время создания |
**updated_at** | **\DateTime** | Дата и время последнего обновления |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
