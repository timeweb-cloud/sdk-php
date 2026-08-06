# # ConfigOrigin

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**servers** | [**\OpenAPI\Client\Model\OriginServer[]**](OriginServer.md) | Origin-серверы, с которых CDN забирает контент. Передача этого поля переключает ресурс с S3-хранилища на origin-сервер. | [optional]
**use_https** | **bool** | Обращаться к источнику контента по HTTPS. | [optional]
**aws** | [**\OpenAPI\Client\Model\ConfigOriginAws**](ConfigOriginAws.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
