# # TokenPackage

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **float** | Уникальный идентификатор пакета |
**model_id** | **float** | ID модели, к которой применяется пакет токенов |
**name** | **string** | Название пакета токенов |
**package_type** | **string** | Тип пакета (base - базовый, additional - дополнительный, promo - промо) |
**type** | **string** | Тип сущности, к которой относится пакет (agent - агент, knowledgebase - база знаний) |
**token_amount** | **float** | Количество токенов в пакете |
**price** | **float** | Цена пакета в целых единицах |
**duration_days** | **float** | Продолжительность пакета в днях (null для дополнительных пакетов) | [optional]
**is_available** | **bool** | Флаг, указывающий доступность пакета |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
