# # UpdateAdmin

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**password** | **string** | Пароль пользователя базы данных | [optional]
**privileges** | **string[]** | Список привилегий пользователя базы данных | [optional]
**description** | **string** | Описание пользователя базы данных | [optional]
**instance_id** | **float** | Уникальный идентификатор инстанса базы данных для приминения привилегий. В данных момент поле доступно только для кластеров MySQL. Если поле не передано, то привилегии будут применены ко всем инстансам | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
