# # SshKey

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **float** | ID SSH-ключа. |
**name** | **string** | Название SSH-ключа. |
**body** | **string** | Тело SSH-ключа. |
**created_at** | **\DateTime** | Значение времени, указанное в комбинированном формате даты и времени ISO8601, которое представляет, когда был создан SSH-ключ. |
**used_by** | [**\OpenAPI\Client\Model\SshKeyUsedByInner[]**](SshKeyUsedByInner.md) | Список серверов, которые используют SSH-ключ. |
**is_default** | **bool** | Это логическое значение, которое показывает, будет ли выбираться SSH-ключ по умолчанию при создании сервера. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
