# # RestorePoint

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **float** | ID снапшота. |
**created_at** | **\DateTime** | Дата и время создания снапшота в формате ISO 8601. |
**expired_at** | **\DateTime** | Дата и время истечения снапшота в формате ISO 8601. |
**status** | **string** | Статус снапшота.  - &#x60;creating&#x60; — создаётся; - &#x60;created&#x60; — создан; - &#x60;committed&#x60; — зафиксирован; - &#x60;rolled_back&#x60; — откачен; - &#x60;error&#x60; — ошибка; - &#x60;deleted&#x60; — удалён. |
**vds_id** | **float** | ID облачного сервера (VDS), к которому относится снапшот. |
**account_id** | **string** | ID аккаунта-владельца снапшота. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
