# # CreateCluster

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | Название кластера базы данных. |
**type** | [**\OpenAPI\Client\Model\DbType**](DbType.md) |  |
**admin** | [**\OpenAPI\Client\Model\CreateClusterAdmin**](CreateClusterAdmin.md) |  | [optional]
**instance** | [**\OpenAPI\Client\Model\CreateClusterInstance**](CreateClusterInstance.md) |  | [optional]
**hash_type** | **string** | Тип хеширования базы данных (mysql | postgres). | [optional]
**preset_id** | **int** | ID тарифа. Нельзя передавать вместе с &#x60;configuration&#x60; | [optional]
**configuration** | [**\OpenAPI\Client\Model\CreateClusterConfiguration**](CreateClusterConfiguration.md) |  | [optional]
**project_id** | **int** | ID проекта. | [optional]
**config_parameters** | [**\OpenAPI\Client\Model\Mysql**](Mysql.md) |  | [optional]
**replication** | [**\OpenAPI\Client\Model\DbReplication**](DbReplication.md) |  | [optional]
**network** | [**\OpenAPI\Client\Model\Network**](Network.md) |  | [optional]
**is_public_ipv6** | **bool** | Использование IPv6 адреса. | [optional]
**description** | **string** | Описание кластера базы данных | [optional]
**availability_zone** | [**\OpenAPI\Client\Model\AvailabilityZone**](AvailabilityZone.md) |  | [optional]
**auto_backups** | [**\OpenAPI\Client\Model\CreateDbAutoBackups**](CreateDbAutoBackups.md) |  | [optional]
**backup_schedule** | [**\OpenAPI\Client\Model\CreateClusterBackupSchedule**](CreateClusterBackupSchedule.md) |  | [optional]
**maintenance_slot** | [**\OpenAPI\Client\Model\CreateClusterMaintenanceSlot**](CreateClusterMaintenanceSlot.md) |  | [optional]
**disk_autoscaling** | [**\OpenAPI\Client\Model\CreateClusterDiskAutoscaling**](CreateClusterDiskAutoscaling.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
