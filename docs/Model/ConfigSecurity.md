# # ConfigSecurity

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**redirect** | **bool** | Перенаправлять запросы с HTTP на HTTPS. | [optional]
**certificate_id** | **int** | ID SSL-сертификата, который используется для доменов ресурса. &#x60;null&#x60; — отвязать сертификат. | [optional]
**ssl_protocols** | **string[]** | Версии SSL/TLS, по которым CDN принимает HTTPS-подключения. &#x60;null&#x60; — принимать все версии. | [optional]
**secure_token** | [**\OpenAPI\Client\Model\ConfigSecuritySecureToken**](ConfigSecuritySecureToken.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
