# # CreateDbAutoBackups

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**copy_count** | **float** | Количество копий для хранения. Минимальное количество &#x60;1&#x60;, максимальное &#x60;99&#x60; |
**creation_start_at** | **\DateTime** | Дата начала создания первого автобэкапа. Значение в формате &#x60;ISO8601&#x60;. Время не учитывается. |
**interval** | **string** | Периодичность создания автобэкапов |
**day_of_week** | **float** | День недели, в который будут создаваться автобэкапы. Работает только со значением &#x60;interval&#x60;: &#x60;week&#x60;. Доступные значение от &#x60;1 &#x60;до &#x60;7&#x60;. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
