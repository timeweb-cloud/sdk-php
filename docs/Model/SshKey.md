# # SshKey

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **float** | ID SSH-ключа |
**name** | **string** | Название SSH-ключа |
**body** | **string** | Тело SSH-ключа |
**created_at** | **\DateTime** | Дата создания ключа |
**used_by** | [**\OpenAPI\Client\Model\SshKeyUsedByInner[]**](SshKeyUsedByInner.md) | Список серверов, которые используют SSH-ключ |
**is_default** | **bool** | Будет ли выбираться SSh-ключ по умолчанию при создании сервера | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
