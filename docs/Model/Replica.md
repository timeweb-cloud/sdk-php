# # Replica

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | ID реплики. Автоматически генерируется при создании. |
**db_id** | **int** | ID кластера базы данных, которому принадлежит реплика. |
**status** | **string** | Текущий статус реплики. |
**local_ip** | **string** | IP-адрес реплики в локальной сети. Возвращается пустая строка, если адрес ещё не назначен. |
**disk** | [**\OpenAPI\Client\Model\ReplicaDisk**](ReplicaDisk.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
