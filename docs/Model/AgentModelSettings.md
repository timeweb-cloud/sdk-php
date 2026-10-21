# # AgentModelSettings

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**temperature** | **float** | Температура: чем выше, тем случайнее ответы модели. | [optional]
**top_p** | **float** | Nucleus sampling: доля вероятностной массы, из которой выбираются токены. | [optional]
**max_tokens** | **int** | Максимальное количество токенов в ответе модели. | [optional]
**frequency_penalty** | **float** | Штраф за частоту: положительные значения снижают повторы уже использованных токенов. | [optional]
**presence_penalty** | **float** | Штраф за присутствие: положительные значения поощряют новые темы. | [optional]
**enable_thinking** | **bool** | Включает режим рассуждений (thinking) для моделей, которые его поддерживают. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
