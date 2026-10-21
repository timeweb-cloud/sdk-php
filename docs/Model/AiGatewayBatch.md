# # AiGatewayBatch

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | ID батча | [optional]
**object** | **string** | Тип объекта | [optional]
**endpoint** | **string** | Эндпоинт запросов батча | [optional]
**model** | **string** | Модель батча. На этапе &#x60;validating&#x60; может быть &#x60;null&#x60; | [optional]
**input_file_id** | **string** | ID входного файла | [optional]
**output_file_id** | **string** | ID файла результатов — когда батч выполнен | [optional]
**error_file_id** | **string** | ID файла с ошибками отдельных запросов, если они были | [optional]
**completion_window** | **string** | Срок выполнения | [optional]
**status** | **string** | Статус батча. &#x60;cancelling&#x60; — отмена выполняется, может занять несколько минут | [optional]
**created_at** | **int** | Время создания, Unix-время в секундах | [optional]
**completed_at** | **int** | Время завершения, Unix-время в секундах | [optional]
**expires_at** | **int** | Крайний срок выполнения, Unix-время в секундах | [optional]
**request_counts** | [**\OpenAPI\Client\Model\AiGatewayBatchRequestCounts**](AiGatewayBatchRequestCounts.md) |  | [optional]
**metadata** | **array<string,mixed>** | Метки батча из запроса | [optional]
**usage** | **array<string,mixed>** | Расход токенов батча | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
