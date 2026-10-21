# # CrispIntegration

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | ID интеграции |
**account_id** | **string** | Логин аккаунта, которому принадлежит интеграция |
**agent_id** | **int** | ID агента |
**website_id** | **string** | Website ID сайта в Crisp |
**webhook_secret** | **string** | Секрет вебхука — последний сегмент адреса вебхука, который нужно добавить в Crisp: &#x60;https://api.timeweb.cloud/api/v1/crisp/{website_id}/webhook/{webhook_secret}&#x60; |
**status** | **string** | Статус интеграции: &#x60;pending&#x60; — ожидает подключения, &#x60;active&#x60; — работает, &#x60;error&#x60; — ошибка подключения |
**created_at** | **\DateTime** | Дата и время создания |
**updated_at** | **\DateTime** | Дата и время последнего обновления |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
