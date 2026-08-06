# # Certificate

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | ID сертификата. Указывается в поле &#x60;config.security.certificate_id&#x60; при привязке сертификата к ресурсу. |
**type** | **string** | Тип сертификата. - &#x60;lets_encrypt&#x60; — сертификат, выпущенный через Let&#39;s Encrypt; - &#x60;uploaded&#x60; — сертификат, загруженный вами. |
**cn** | **string** | Основное доменное имя сертификата. |
**domains** | **string[]** | Все доменные имена сертификата, включая указанные в SAN. |
**issued_at** | **\DateTime** | Дата выпуска сертификата. |
**expires_at** | **\DateTime** | Дата окончания действия сертификата. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
