# # DnsRecordV2

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **float** | ID DNS-записи. |
**type** | **string** | Тип DNS-записи. |
**data** | [**\OpenAPI\Client\Model\DnsRecordV2Data**](DnsRecordV2Data.md) |  |
**fqdn** | **string** | Домен, относительно которого указано &#x60;data.subdomain&#x60;. Полное имя записи — &#x60;data.subdomain&#x60; + &#x60;.&#x60; + &#x60;fqdn&#x60;, а если &#x60;data.subdomain&#x60; нет — &#x60;fqdn&#x60;. |
**ttl** | **float** | Время жизни DNS-записи в секундах. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
