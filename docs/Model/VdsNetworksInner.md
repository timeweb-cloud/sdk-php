# # VdsNetworksInner

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Уникальный идентификатор сети. Есть только у приватных сетей. | [optional]
**type** | **string** | Тип сети. |
**nat_mode** | **string** | Тип преобразования сетевых адресов. | [optional]
**bandwidth** | **float** | Пропускная способность сети. | [optional]
**ips** | [**\OpenAPI\Client\Model\VdsNetworksInnerIpsInner[]**](VdsNetworksInnerIpsInner.md) | Список IP-адресов сети. |
**is_ddos_guard** | **bool** | Подключена ли DDoS-защита. Только для публичных сетей. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
