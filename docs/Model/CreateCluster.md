# # CreateCluster

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | Название кластера базы данных. |
**type** | [**\OpenAPI\Client\Model\DbType**](DbType.md) |  |
**admin** | [**\OpenAPI\Client\Model\CreateClusterAdmin**](CreateClusterAdmin.md) |  | [optional]
**instance** | [**\OpenAPI\Client\Model\CreateClusterInstance**](CreateClusterInstance.md) |  | [optional]
**hash_type** | **string** | Тип хеширования базы данных (mysql5 | mysql | postgres). | [optional]
**preset_id** | **int** | ID тарифа. |
**config_parameters** | [**\OpenAPI\Client\Model\ConfigParameters**](ConfigParameters.md) |  | [optional]
**network** | [**\OpenAPI\Client\Model\Network**](Network.md) |  | [optional]
**description** | **string** | Описание кластера базы данных | [optional]
**availability_zone** | [**\OpenAPI\Client\Model\AvailabilityZone**](AvailabilityZone.md) |  | [optional]
**auto_backups** | [**\OpenAPI\Client\Model\CreateDbAutoBackups**](CreateDbAutoBackups.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
