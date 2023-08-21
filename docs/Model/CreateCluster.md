# # CreateCluster

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | Название кластера базы данных. |
**type** | **string** | Тип базы данных. |
**admin** | [**\OpenAPI\Client\Model\CreateClusterAdmin**](CreateClusterAdmin.md) |  | [optional]
**instance** | [**\OpenAPI\Client\Model\CreateClusterInstance**](CreateClusterInstance.md) |  | [optional]
**hash_type** | **string** | Тип хеширования базы данных (mysql5 | mysql | postgres). | [optional]
**preset_id** | **int** | Идентификатор тарифа. |
**config_parameters** | [**\OpenAPI\Client\Model\ConfigParameters**](ConfigParameters.md) |  | [optional]
**network** | [**\OpenAPI\Client\Model\Network**](Network.md) |  | [optional]
**description** | **string** | Описание кластера базы данных | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
