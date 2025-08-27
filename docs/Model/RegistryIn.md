# # RegistryIn

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | Имя реестра. Должно быть уникальным, от 3 до 48 символов, начинаться и заканчиваться буквой или числом, содержать только латинские буквы в нижнем регистре, цифры и символ «-», без пробелов |
**description** | **string** | Описание реестра | [optional]
**preset_id** | **int** | ID тарифа. Нельзя передавать вместе с &#x60;configuration&#x60; | [optional]
**configuration** | [**\OpenAPI\Client\Model\RegistryInConfiguration**](RegistryInConfiguration.md) |  | [optional]
**project_id** | **int** | ID проекта | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
