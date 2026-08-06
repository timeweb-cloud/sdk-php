# # CreateAdmin

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**login** | **string** | Имя пользователя базы данных |
**password** | **string** | Пароль пользователя базы данных |
**host** | **string** | Хост пользователя | [optional]
**instance_id** | **float** | ID инстанса базы данных для применения привилегий. Если поле не передано, то привилегии будут применены ко всем инстансам | [optional]
**for_all** | **bool** | Выдать привилегии на все инстансы базы данных | [optional]
**privileges** | [**\OpenAPI\Client\Model\PropertiesMysql[]**](PropertiesMysql.md) | Список привилегий пользователя базы данных | [optional]
**description** | **string** | Описание пользователя базы данных | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
