# # FirewallRuleOutAPI

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Идентификатор правила |
**description** | **string** | Описание правила |
**direction** | [**\OpenAPI\Client\Model\FirewallRuleDirection**](FirewallRuleDirection.md) |  |
**protocol** | [**\OpenAPI\Client\Model\FirewallRuleProtocol**](FirewallRuleProtocol.md) |  |
**port** | **string** | Порт или диапазон портов, в случае tcp или udp | [optional]
**cidr** | **string** | Сетевой адрес или подсеть. Поддерживаются протоколы IPv4  и IPv6 | [optional]
**group_id** | **string** | Идентификатор группы правил |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
