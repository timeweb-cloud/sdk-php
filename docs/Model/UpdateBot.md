# # UpdateBot

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**token** | **string** | Новый токен того же бота (например, после перевыпуска в @BotFather). Токен другого бота не принимается | [optional]
**description** | **string** | Комментарий к боту | [optional]
**whitelist_enabled** | **bool** | Ограничить доступ к боту списком &#x60;whitelist_usernames&#x60; | [optional]
**whitelist_usernames** | **string[]** | Username пользователей Telegram, которым разрешено писать боту. Можно с &#x60;@&#x60; и в любом регистре — они будут приведены к нижнему регистру без &#x60;@&#x60;, дубли удаляются. Действует, только если &#x60;whitelist_enabled&#x60; равен &#x60;true&#x60; и список не пуст. Переданный список полностью заменяет текущий | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
