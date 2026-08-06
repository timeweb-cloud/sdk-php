# # KafkaConfigParameters

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**partitions** | **string** | Количество партиций топика. | [optional]
**cleanup_policy** | **string** | Политика очистки старых сегментов лога: &#x60;delete&#x60; — удалять, &#x60;compact&#x60; — уплотнять. | [optional]
**compression_type** | **string** | Тип сжатия сообщений в топике. | [optional]
**delete_retention_ms** | **string** | Время (в мс) хранения меток удаления для уплотняемых топиков. | [optional]
**file_delete_delay_ms** | **string** | Задержка (в мс) перед удалением файла из файловой системы. | [optional]
**flush_messages** | **string** | Количество сообщений, после которого данные принудительно сбрасываются на диск. | [optional]
**flush_ms** | **string** | Интервал (в мс), после которого данные принудительно сбрасываются на диск. | [optional]
**index_interval_bytes** | **string** | Интервал (в байтах), с которым Kafka добавляет запись в индекс смещений. | [optional]
**min_compaction_lag_ms** | **string** | Минимальное время (в мс), в течение которого сообщение остается неуплотненным. | [optional]
**max_compaction_lag_ms** | **string** | Максимальное время (в мс), в течение которого сообщение может оставаться неуплотненным. | [optional]
**max_message_bytes** | **string** | Максимальный размер (в байтах) пакета сообщений. | [optional]
**message_format_version** | **string** | Версия формата сообщений, в котором Kafka добавляет сообщения в лог. | [optional]
**message_timestamp_difference_max_ms** | **string** | Максимально допустимая разница (в мс) между временной меткой сообщения и временем его получения брокером. | [optional]
**message_downconversion_enable** | **string** | Понижение версии формата сообщений для старых клиентов. | [optional]
**message_timestamp_type** | **string** | Источник временной метки сообщения: &#x60;CreateTime&#x60; — время создания сообщения клиентом, &#x60;LogAppendTime&#x60; — время добавления сообщения в лог брокером. | [optional]
**min_cleanable_dirty_ratio** | **string** | Доля неуплотненных данных в логе, при которой запускается уплотнение. | [optional]
**min_insync_replicas** | **string** | Минимальное количество синхронизированных реплик, необходимое для подтверждения записи. | [optional]
**preallocate** | **string** | Предварительное выделение места на диске при создании нового сегмента лога. | [optional]
**retention_bytes** | **string** | Максимальный размер (в байтах) партиции топика, после которого старые сегменты удаляются. &#x60;-1&#x60; — без ограничения. | [optional]
**retention_ms** | **string** | Время (в мс) хранения сообщений в топике. &#x60;-1&#x60; — хранить бессрочно. | [optional]
**segment_bytes** | **string** | Максимальный размер (в байтах) одного сегмента лога. | [optional]
**segment_index_bytes** | **string** | Максимальный размер (в байтах) индексного файла сегмента лога. | [optional]
**segment_jitter_ms** | **string** | Максимальное случайное отклонение (в мс) от времени ротации сегмента. | [optional]
**segment_ms** | **string** | Период (в мс), после которого Kafka создает новый сегмент лога. | [optional]
**unclean_leader_election_enable** | **string** | Возможность выбрать лидером партиции реплику, которая не входит в число синхронизированных. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
