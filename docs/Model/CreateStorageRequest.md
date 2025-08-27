# # CreateStorageRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | Название хранилища. |
**description** | **string** | Комментарий к хранилищу. | [optional]
**type** | **string** | Тип хранилища. |
**preset_id** | **float** | ID тарифа. Нельзя передавать вместе с &#x60;configurator&#x60;. | [optional]
**configurator** | [**\OpenAPI\Client\Model\CreateStorageRequestConfigurator**](CreateStorageRequestConfigurator.md) |  | [optional]
**project_id** | **float** | ID проекта. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
