# # UpdateCluster

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
**is_secure_connection_enable** | **bool** | Включить защищенное подключение к кластеру базы данных | [optional]
**maintenance_slot** | [**\OpenAPI\Client\Model\CreateClusterMaintenanceSlot**](CreateClusterMaintenanceSlot.md) |  | [optional]
**disk_autoscaling** | [**\OpenAPI\Client\Model\CreateClusterDiskAutoscaling**](CreateClusterDiskAutoscaling.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
