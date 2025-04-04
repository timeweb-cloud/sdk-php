# # CreateServer

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**configuration** | [**\OpenAPI\Client\Model\CreateServerConfiguration**](CreateServerConfiguration.md) |  | [optional]
**is_ddos_guard** | **bool** | Защита от DDoS. Серверу выдается защищенный IP-адрес с защитой уровня L3 / L4. Для включения защиты уровня L7 необходимо создать тикет в техническую поддержку. | [optional]
**os_id** | **float** | ID операционной системы, которая будет установлена на облачный сервер. Нельзя передавать вместе с &#x60;image_id&#x60;. | [optional]
**image_id** | **string** | ID образа, который будет установлен на облачный сервер. Нельзя передавать вместе с &#x60;os_id&#x60;. | [optional]
**software_id** | **float** | ID программного обеспечения сервера. | [optional]
**preset_id** | **float** | ID тарифа сервера. Нельзя передавать вместе с ключом &#x60;configurator&#x60;. | [optional]
**bandwidth** | **float** | Пропускная способность тарифа. Доступные значения от 100 до 1000 с шагом 100. | [optional]
**name** | **string** | Имя облачного сервера. Максимальная длина — 255 символов, имя должно быть уникальным. |
**avatar_id** | **string** | ID аватара сервера. | [optional]
**comment** | **string** | Комментарий к облачному серверу. Максимальная длина — 255 символов. | [optional]
**ssh_keys_ids** | **float[]** | Список SSH-ключей. | [optional]
**is_local_network** | **bool** | Локальная сеть. | [optional]
**network** | [**\OpenAPI\Client\Model\CreateServerNetwork**](CreateServerNetwork.md) |  | [optional]
**cloud_init** | **string** | Cloud-init скрипт | [optional]
**availability_zone** | [**\OpenAPI\Client\Model\AvailabilityZone**](AvailabilityZone.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
