# # Model

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **float** | Уникальный идентификатор модели |
**provider_id** | **float** | ID провайдера, который предоставляет модель |
**name** | **string** | Название модели |
**public_name** | **string** | Публичное имя модели |
**type** | **string** | Тип модели (llm - языковая модель, embedding - модель для эмбеддингов) |
**is_deprecated** | **bool** | Признак, что модель устарела |
**is_reasoning** | **bool** | Признак поддержки режима рассуждения |
**version** | **string** | Версия модели |
**params_info** | [**\OpenAPI\Client\Model\ModelParamsInfo**](ModelParamsInfo.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
