# # ModelParameter

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**code** | **string** | Код характеристики — ключ в &#x60;parameter_values&#x60; модели |
**name** | **string** | Название характеристики | [optional]
**description** | **string** | Описание характеристики | [optional]
**type** | **string** | Тип значения |
**unit** | **string** | Единица измерения (&#x60;tokens&#x60;, &#x60;tokens_per_second&#x60;, &#x60;currency_per_million&#x60;, ...). &#x60;null&#x60;, если нет |
**group** | **string** | Группа характеристик: &#x60;pricing&#x60;, &#x60;quality&#x60;, &#x60;performance&#x60;, &#x60;capabilities&#x60;, &#x60;limits&#x60;, &#x60;meta&#x60; |
**sort_order** | **int** | Порядок отображения |
**comparison_direction** | **string** | Какое значение лучше при сравнении моделей |
**format** | **string** | Подсказка для отображения значения. &#x60;currency_per_million_tokens&#x60; — значение в &#x60;parameter_values&#x60; указано за 1 токен, показывать его удобно за 1 млн токенов |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
