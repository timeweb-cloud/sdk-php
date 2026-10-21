# # CreateBot

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**agent_id** | **int** | ID агента, который будет отвечать от имени бота |
**token** | **string** | Токен бота, выданный @BotFather |
**description** | **string** | Комментарий к боту | [optional]
**whitelist_enabled** | **bool** | Ограничить доступ к боту списком &#x60;whitelist_usernames&#x60; | [optional]
**whitelist_usernames** | **string[]** | Username пользователей Telegram, которым разрешено писать боту. Можно с &#x60;@&#x60; и в любом регистре — они будут приведены к нижнему регистру без &#x60;@&#x60;, дубли удаляются. Действует, только если &#x60;whitelist_enabled&#x60; равен &#x60;true&#x60; и список не пуст | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
