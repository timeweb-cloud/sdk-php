# # DnsRecordV2Data

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**priority** | **float** | Приоритет DNS-записи (для MX и SRV записей). | [optional]
**subdomain** | **string** | Имя поддомена (только поддомен без основного домена, например &#x60;sub&#x60; для &#x60;sub.example.com&#x60;). Для записей на основном домене это поле отсутствует в ответе. | [optional]
**value** | **string** | Значение DNS-записи (для A, AAAA, TXT, CNAME, MX записей). | [optional]
**host** | **string** | Каноническое имя хоста, предоставляющего сервис (для SRV записей). | [optional]
**port** | **float** | TCP или UDP порт, на котором работает сервис (для SRV записей). | [optional]
**service** | **string** | Имя сервиса (для SRV записей). | [optional]
**protocol** | **string** | Протокол (для SRV записей). | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
