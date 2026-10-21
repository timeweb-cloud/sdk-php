# # AiGatewaySpeechRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**model** | **string** | ID модели синтеза речи (&#x60;mode: audio_speech&#x60; в &#x60;GET /v1/models&#x60;) |
**input** | **string** | Текст для озвучивания |
**voice** | **string** | Голос |
**instructions** | **string** | Инструкции к манере речи — для моделей, которые их поддерживают | [optional]
**response_format** | **string** | Формат аудио, например &#x60;mp3&#x60;, &#x60;wav&#x60;, &#x60;opus&#x60;. По умолчанию — &#x60;mp3&#x60; | [optional]
**speed** | **float** | Скорость речи | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
