# # CertificateTask

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | ID задачи на выпуск сертификата. |
**status** | **string** | Статус выпуска сертификата. - &#x60;in_progress&#x60; — сертификат выпускается; - &#x60;success&#x60; — сертификат выпущен и привязан к ресурсу; - &#x60;failed&#x60; — выпустить сертификат не удалось. |
**domains** | **string[]** | Доменные имена, для которых выпускается сертификат. |
**resource_id** | **int** | ID CDN-ресурса, для которого выпускается сертификат. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
