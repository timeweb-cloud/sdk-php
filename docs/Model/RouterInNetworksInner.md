# # RouterInNetworksInner

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | ID локальной сети |
**gateway** | **string** | IP-адрес шлюза. При отсутствии подставляется первый свободный IP в подсети | [optional]
**reserved_ips** | **string[]** | Зарезервированные IP-адреса. При отсутствии — пустой массив | [optional]
**is_dhcp_enabled** | **bool** | Включен ли DHCP | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
