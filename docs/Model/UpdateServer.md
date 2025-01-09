# # UpdateServer

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**configurator** | [**\OpenAPI\Client\Model\UpdateServerConfigurator**](UpdateServerConfigurator.md) |  | [optional]
**os_id** | **float** | ID операционной системы, которая будет установлена на облачный сервер. | [optional]
**software_id** | **float** | ID программного обеспечения сервера. | [optional]
**preset_id** | **float** | ID тарифа сервера. Нельзя передавать вместе с ключом &#x60;configurator&#x60;. | [optional]
**bandwidth** | **float** | Пропускная способность тарифа. Доступные значения от 100 до 1000 с шагом 100. | [optional]
**name** | **string** | Имя облачного сервера. Максимальная длина — 255 символов, имя должно быть уникальным. | [optional]
**avatar_id** | **string** | ID аватара сервера. Описание методов работы с аватарами появится позднее. | [optional]
**comment** | **string** | Комментарий к облачному серверу. Максимальная длина — 255 символов. | [optional]
**image_id** | **string** | ID образа, который будет установлен на облачный сервер. Нельзя передавать вместе с &#x60;os_id&#x60;. | [optional]
**cloud_init** | **string** | Cloud-init скрипт | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
