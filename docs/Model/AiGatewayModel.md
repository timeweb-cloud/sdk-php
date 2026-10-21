# # AiGatewayModel

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | ID модели — передавайте его в поле &#x60;model&#x60; | [optional]
**object** | **string** | Тип объекта | [optional]
**created** | **int** | Время добавления, Unix-время в секундах | [optional]
**owned_by** | **string** | Владелец модели | [optional]
**mode** | **string** | Назначение модели: &#x60;chat&#x60;, &#x60;responses&#x60;, &#x60;embedding&#x60;, &#x60;image_generation&#x60;, &#x60;audio_speech&#x60;, &#x60;audio_transcription&#x60; и др. У части моделей не задано | [optional]
**max_input_tokens** | **int** | Контекстное окно, если известно | [optional]
**max_output_tokens** | **int** | Максимум выходных токенов, если известно | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
