# # ClusterInOidcProvider

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | Название создаваемого подключения. Используется только для идентификации и не влияет на остальные параметры |
**issuer_url** | **string** | Адрес OIDC-провайдера, используемый для аутентификации пользователей, запрашивающих доступ к кластеру |
**client_id** | **string** | Идентификатор сервиса, выданный OIDC-провайдером, от имени которого осуществляется запрос к ресурсам |
**username_claim** | **string** | Поле в JSON Web Token (JWT), используемое для идентификации пользователя | [optional]
**groups_claim** | **string** | Поле в JSON Web Token (JWT), содержащее названии группы, к которой принадлежит пользователь | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
