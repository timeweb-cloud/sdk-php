# # UpdateClusterV2

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | Название кластера базы данных. | [optional]
**preset_id** | **int** | ID тарифа. Нельзя передавать вместе с &#x60;configuration&#x60; | [optional]
**configuration** | [**\OpenAPI\Client\Model\UpdateClusterConfiguration**](UpdateClusterConfiguration.md) |  | [optional]
**config_parameters** | [**\OpenAPI\Client\Model\Mysql**](Mysql.md) |  | [optional]
**hash_type** | **string** | Тип хеширования базы данных (mysql | postgres). | [optional]
**description** | **string** | Описание кластера базы данных | [optional]
**is_enabled_public_network** | **bool** | Доступность публичного IP-адреса | [optional]
**is_enabled_public_ipv6** | **bool** | Использование публичного IPv6-адреса. | [optional]
**floating_ip** | **string** | Плавающий IP-адрес, который нужно привязать к кластеру базы данных. Передается сам адрес, а не его ID; адрес должен быть свободен (не привязан к другому сервису). | [optional]
**is_secure_connection_enable** | **bool** | Включить защищенное подключение к кластеру базы данных. Обратите внимание: в ответе это же значение возвращается под ключом &#x60;is_secure_connection_enabled&#x60;. | [optional]
**maintenance_slot** | [**\OpenAPI\Client\Model\UpdateClusterV2MaintenanceSlot**](UpdateClusterV2MaintenanceSlot.md) |  | [optional]
**disk_autoscaling** | [**\OpenAPI\Client\Model\UpdateClusterV2DiskAutoscaling**](UpdateClusterV2DiskAutoscaling.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
