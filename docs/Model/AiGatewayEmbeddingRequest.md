# # AiGatewayEmbeddingRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**model** | **string** | ID модели эмбеддингов (&#x60;mode: embedding&#x60; в &#x60;GET /v1/models&#x60;) |
**input** | **string** | Текст или список текстов |
**dimensions** | **int** | Размерность вектора — для моделей, которые её поддерживают | [optional]
**encoding_format** | **string** | Формат векторов | [optional] [default to 'float']

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
