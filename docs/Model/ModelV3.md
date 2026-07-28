# # ModelV3

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **float** | Уникальный идентификатор модели |
**provider_id** | **float** | ID провайдера, который предоставляет модель |
**name** | **string** | Название модели |
**public_name** | **string** | Публичное имя модели |
**model_name** | **string** | Идентификатор модели, который передаётся в поле &#x60;model&#x60; тела запроса |
**type** | **string** | Тип модели (llm — языковая модель, hosted-llm — self-hosted языковая модель, embedding — модель для эмбеддингов, image — генерация изображений, audio — работа с аудио, moderation — модерация контента) |
**version** | **string** | Версия модели |
**is_deprecated** | **bool** | Признак, что модель устарела |
**is_stopped** | **bool** | Признак, что поддержка модели остановлена |
**deprecation_date** | **\DateTime** | Дата отключения модели у провайдера. &#x60;null&#x60;, если отключение не запланировано | [optional]
**created_at** | **\DateTime** | Дата и время добавления модели |
**updated_at** | **\DateTime** | Дата и время последнего обновления модели |
**params_info** | **object** | Информация о доступных параметрах модели с их ограничениями. Ключ — название параметра, значение — его тип, ограничения и значение по умолчанию | [optional]
**parameter_values** | **array<string,mixed>** | Характеристики модели. Ключ — код характеристики, значение — число, строка, булево значение или массив строк.  Основные коды: - &#x60;cost_in&#x60; — цена за 1 входной токен в рублях - &#x60;cost_out&#x60; — цена за 1 выходной токен в рублях - &#x60;context_window&#x60; — размер контекстного окна в токенах - &#x60;max_output_tokens&#x60; — максимальное количество токенов в ответе - &#x60;is_reasoning&#x60; — поддержка режима рассуждений - &#x60;supports_function_calling&#x60; — поддержка function calling - &#x60;supported_input_modalities&#x60; — поддерживаемые входные модальности (например, &#x60;text&#x60;, &#x60;image&#x60;) - &#x60;supported_output_modalities&#x60; — поддерживаемые выходные модальности - &#x60;avg_speed&#x60; — средняя скорость генерации в токенах в секунду - &#x60;aa_intelligence_index&#x60;, &#x60;aa_coding_index&#x60;, &#x60;aa_agentic_index&#x60; — индексы качества Artificial Analysis - &#x60;release_date&#x60; — дата релиза модели |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
