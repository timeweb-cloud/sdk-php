# # AiGatewayImageGenerationRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**model** | **string** | ID модели генерации изображений (&#x60;mode: image_generation&#x60; в &#x60;GET /v1/models&#x60;) |
**prompt** | **string** | Описание изображения |
**n** | **int** | Количество изображений | [optional] [default to 1]
**size** | **string** | Размер изображения | [optional]
**quality** | **string** | Качество изображения | [optional]
**response_format** | **string** | Формат изображения в ответе. Поддерживается не всеми моделями | [optional]
**output_format** | **string** | Формат файла изображения | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
