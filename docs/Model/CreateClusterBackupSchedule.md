# # CreateClusterBackupSchedule

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**copy_count** | **int** | Количество хранимых резервных копий. | [optional]
**interval** | **string** | Периодичность создания резервных копий. | [optional]
**day_of_week** | **int** | День недели (от 1 до 7) для создания резервной копии. Учитывается только при &#x60;interval: week&#x60;. | [optional]
**day_of_month** | **int** | День месяца (от 1 до 28) для создания резервной копии. Учитывается только при &#x60;interval: month&#x60;. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
