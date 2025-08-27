# # CreateAdmin

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**login** | **string** | Имя пользователя базы данных |
**password** | **string** | Пароль пользователя базы данных |
**host** | **string** | Хост пользователя | [optional]
**instance_id** | **float** | ID инстанса базы данных для применения привилегий. В данных момент поле доступно только для кластеров MySQL. Если поле не передано, то привилегии будут применены ко всем инстансам | [optional]
**privileges** | **string[]** | Список привилегий пользователя базы данных |
**description** | **string** | Описание пользователя базы данных | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
