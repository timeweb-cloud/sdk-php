# # Model

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | ID модели |
**provider_id** | **int** | ID провайдера модели |
**name** | **string** | Семейство модели |
**public_name** | **string** | Отображаемое название модели |
**model_name** | **string** | Идентификатор модели с префиксом провайдера — передаётся в поле &#x60;model&#x60; запросов к AI Gateway |
**type** | **string** | Тип модели: - &#x60;llm&#x60; — языковая модель - &#x60;hosted-llm&#x60; — языковая модель, размещённая в Timeweb Cloud - &#x60;embedding&#x60; — модель эмбеддингов - &#x60;image&#x60; — генерация изображений - &#x60;audio&#x60; — работа с аудио - &#x60;video&#x60; — генерация видео - &#x60;moderation&#x60; — модерация контента - &#x60;system-one&#x60; — служебная модель с собственным API |
**version** | **string** | Версия модели |
**is_deprecated** | **bool** | Модель устарела и недоступна для выбора в новых агентах |
**is_stopped** | **bool** | Поддержка модели остановлена: запросы к ней не выполняются |
**deprecation_date** | **\DateTime** | Дата отключения модели у провайдера. &#x60;null&#x60;, если отключение не запланировано |
**is_reasoning** | **bool** | Модель поддерживает режим рассуждений |
**params_info** | [**array<string,\OpenAPI\Client\Model\ModelParamInfo>**](ModelParamInfo.md) | Параметры генерации, которые можно настроить у агента с этой моделью. Ключ — имя параметра (&#x60;temperature&#x60;, &#x60;top_p&#x60;, &#x60;max_tokens&#x60;, &#x60;reasoning_effort&#x60; и т.д.). &#x60;null&#x60;, если параметры не заданы |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
