# # DocumentStatusInfoDetails

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**started_at** | **\DateTime** | &#x60;indexing&#x60;: время начала индексации | [optional]
**current_stage** | **string** | &#x60;indexing&#x60;: текущий этап | [optional]
**progress** | **float** | &#x60;indexing&#x60;: прогресс в процентах | [optional]
**indexing_duration_ms** | **float** | &#x60;indexed&#x60;: длительность индексации в миллисекундах | [optional]
**tokens_used** | **float** | &#x60;indexed&#x60;: израсходовано токенов | [optional]
**tokens_estimated** | **float** | &#x60;indexed&#x60;: оценка количества токенов перед индексацией | [optional]
**chunks_count** | **float** | &#x60;indexed&#x60;: количество фрагментов, на которые разбит документ | [optional]
**needed** | **float** | &#x60;INSUFFICIENT_TOKENS&#x60;: сколько токенов нужно | [optional]
**available** | **float** | &#x60;INSUFFICIENT_TOKENS&#x60;: сколько токенов доступно | [optional]
**estimated** | **float** | &#x60;INSUFFICIENT_TOKENS&#x60;: оценка без запаса | [optional]
**balance** | **float** | &#x60;CRITICAL_BALANCE&#x60;, &#x60;NEGATIVE_BALANCE&#x60;: текущий остаток токенов | [optional]
**min_required** | **float** | &#x60;CRITICAL_BALANCE&#x60;: минимально необходимый остаток | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
