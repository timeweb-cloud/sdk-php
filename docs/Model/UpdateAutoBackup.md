# # UpdateAutoBackup

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**is_enabled** | **bool** | Включено ли автобэкапирование |
**copy_count** | **float** | Количество копий для хранения. Минимальное количество &#x60;1&#x60;, максимальное &#x60;99&#x60;. Обязательно при &#x60;is_enabled&#x60;: &#x60;true&#x60;. | [optional]
**creation_start_at** | **\DateTime** | Дата начала создания первого автобэкапа. Значение в формате &#x60;ISO8601&#x60;. Время не учитывается. Обязательно при &#x60;is_enabled&#x60;: &#x60;true&#x60;. | [optional]
**interval** | **string** | Периодичность создания автобэкапов. Обязательно при &#x60;is_enabled&#x60;: &#x60;true&#x60;. | [optional]
**day_of_week** | **float** | День недели, в который будут создаваться автобэкапы. Доступные значения от &#x60;1&#x60; до &#x60;7&#x60;. Обязательно при &#x60;is_enabled&#x60;: &#x60;true&#x60; при любой периодичности, но на расписание влияет только при значении &#x60;interval&#x60;: &#x60;week&#x60;. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
