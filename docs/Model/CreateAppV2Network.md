# # CreateAppV2Network

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | ID VPC, к которой необходимо подключить приложение. | [optional]
**local_ip** | **string** | Локальный IP-адрес приложения в выбранной VPC. | [optional]
**floating_ip** | **string** | Публичный IPv4-адрес свободного плавающего IP аккаунта или create_ip для создания нового IP (оплачивается отдельно). IP остаётся на аккаунте и привязывается к приложению. Доступно для аккаунтов, которым включена эта возможность; для остальных поле игнорируется. Если поле не передано, публичный IP выделяется автоматически. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
