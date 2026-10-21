# # TokenPackage

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | ID пакета |
**model_id** | **int** | ID модели, к которой относится пакет |
**service_type_id** | **int** | ID тарифа пакета в биллинге |
**name** | **string** | Название пакета |
**package_type** | **string** | Тип пакета: &#x60;base&#x60; — пакет подписки, &#x60;additional&#x60; — дополнительный пакет, &#x60;promo&#x60; — промо-пакет |
**type** | **string** | Для чего пакет: &#x60;agent&#x60; — AI агент, &#x60;knowledgebase&#x60; — база знаний |
**token_amount** | **int** | Количество токенов в пакете |
**price** | **float** | Цена пакета в рублях |
**duration_days** | **int** | Период подписки в днях. &#x60;null&#x60; для дополнительных пакетов |
**is_available** | **bool** | Пакет доступен для покупки |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
