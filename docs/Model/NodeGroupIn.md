# # NodeGroupIn

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | Название группы |
**preset_id** | **int** | Идентификатор тарифа воркер-ноды. Нельзя передавать вместе с &#x60;configuration&#x60;. Локация воркер-нод должна совпадать с локацией кластера | [optional]
**configuration** | [**\OpenAPI\Client\Model\NodeGroupInConfiguration**](NodeGroupInConfiguration.md) |  | [optional]
**node_count** | **int** | Количество нод в группе |
**labels** | [**\OpenAPI\Client\Model\SetLabels[]**](SetLabels.md) | Лейблы для группы нод | [optional]
**is_autoscaling** | **bool** | Автомасштабирование. Автоматическое увеличение и уменьшение количества нод в группе в зависимости от текущей нагрузки | [optional]
**min_size** | **int** | Минимальное количество нод. Передавать в связке с параметрами &#x60;is_autoscaling&#x60; и &#x60;max_size&#x60; | [optional]
**max_size** | **int** | Максимальное количество нод. Передавать в связке с параметрами &#x60;is_autoscaling&#x60; и &#x60;min_size&#x60;. Максимальное количество нод ограничено тарифом кластера | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
