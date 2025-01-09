# # VdsNetworksInner

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | ID сети. Есть только у приватных сетей. | [optional]
**type** | **string** | Тип сети. |
**nat_mode** | **string** | Тип преобразования сетевых адресов. | [optional]
**bandwidth** | **float** | Пропускная способность сети. | [optional]
**ips** | [**\OpenAPI\Client\Model\VdsNetworksInnerIpsInner[]**](VdsNetworksInnerIpsInner.md) | Список IP-адресов сети. |
**is_ddos_guard** | **bool** | Это логическое значение, которое показывает, подключена ли DDoS-защита. Только для публичных сетей. | [optional]
**is_image_mounted** | **bool** | Это логическое значение, которое показывает, примонтирован ли образ к серверу. | [optional]
**blocked_ports** | **int[]** | Список заблокированных портов на сервере. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
