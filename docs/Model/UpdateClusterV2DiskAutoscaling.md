# # UpdateClusterV2DiskAutoscaling

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**is_enabled** | **bool** | Включить автоматическое расширение диска. |
**step_size** | **int** | Шаг расширения диска (в Мб). Значение должно быть кратно 5120, минимум — 5120, максимум — 102400. | [optional]
**threshold_percent** | **int** | Порог заполнения диска (в процентах), при достижении которого диск расширяется. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
