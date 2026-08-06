<?php
/**
 * GetDatabaseDefaultParameters200ResponseConfigParams
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Timeweb Cloud API
 *
 * # Введение API Timeweb Cloud позволяет вам управлять ресурсами в облаке программным способом с использованием обычных HTTP-запросов.  Множество функций, которые доступны в панели управления Timeweb Cloud, также доступны через API, что позволяет вам автоматизировать ваши собственные сценарии.  В этой документации сперва будет описан общий дизайн и принципы работы API, а после этого конкретные конечные точки. Также будут приведены примеры запросов к ним.   ## Запросы Запросы должны выполняться по протоколу `HTTPS`, чтобы гарантировать шифрование транзакций. Поддерживаются следующие методы запроса: |Метод|Применение| |--- |--- | |GET|Извлекает данные о коллекциях и отдельных ресурсах.| |POST|Для коллекций создает новый ресурс этого типа. Также используется для выполнения действий с конкретным ресурсом.| |PUT|Обновляет существующий ресурс.| |PATCH|Некоторые ресурсы поддерживают частичное обновление, то есть обновление только части атрибутов ресурса, в этом случае вместо метода PUT будет использован PATCH.| |DELETE|Удаляет ресурс.|  Методы `POST`, `PUT` и `PATCH` могут включать объект в тело запроса с типом содержимого `application/json`.  ### Параметры в запросах Некоторые коллекции поддерживают пагинацию, поиск или сортировку в запросах. В параметрах запроса требуется передать: - `limit` — обозначает количество записей, которое необходимо вернуть  - `offset` — указывает на смещение, относительно начала списка  - `search` — позволяет указать набор символов для поиска  - `sort` — можно задать правило сортировки коллекции  ## Ответы Запросы вернут один из следующих кодов состояния ответа HTTP:  |Статус|Описание| |--- |--- | |200 OK|Действие с ресурсом было выполнено успешно.| |201 Created|Ресурс был успешно создан. При этом ресурс может быть как уже готовым к использованию, так и находиться в процессе запуска.| |204 No Content|Действие с ресурсом было выполнено успешно, и ответ не содержит дополнительной информации в теле.| |400 Bad Request|Был отправлен неверный запрос, например, в нем отсутствуют обязательные параметры и т. д. Тело ответа будет содержать дополнительную информацию об ошибке.| |401 Unauthorized|Ошибка аутентификации.| |403 Forbidden|Аутентификация прошла успешно, но недостаточно прав для выполнения действия.| |404 Not Found|Запрашиваемый ресурс не найден.| |409 Conflict|Запрос конфликтует с текущим состоянием.| |423 Locked|Ресурс из запроса заблокирован от применения к нему указанного метода.| |429 Too Many Requests|Был достигнут лимит по количеству запросов в единицу времени.| |500 Internal Server Error|При выполнении запроса произошла какая-то внутренняя ошибка. Чтобы решить эту проблему, лучше всего создать тикет в панели управления.|  ### Структура успешного ответа Все конечные точки будут возвращать данные в формате `JSON`. Ответы на `GET`-запросы будут иметь на верхнем уровне следующую структуру атрибутов:  |Название поля|Тип|Описание| |--- |--- |--- | |[entity_name]|object, object[], string[], number[], boolean|Динамическое поле, которое будет меняться в зависимости от запрашиваемого ресурса и будет содержать все атрибуты, необходимые для описания этого ресурса. Например, при запросе списка баз данных будет возвращаться поле `dbs`, а при запросе конкретного облачного сервера `server`. Для некоторых конечных точек в ответе может возвращаться сразу несколько ресурсов.| |meta|object|Опционально. Объект, который содержит вспомогательную информацию о ресурсе. Чаще всего будет встречаться при запросе коллекций и содержать поле `total`, которое будет указывать на количество элементов в коллекции.| |response_id|string|Опционально. В большинстве случаев в ответе будет содержаться ID ответа в формате UUIDv4, который однозначно указывает на ваш запрос внутри нашей системы. Если вам потребуется задать вопрос нашей поддержке, приложите к вопросу этот ID— так мы сможем найти ответ на него намного быстрее. Также вы можете использовать этот ID, чтобы убедиться, что это новый ответ на запрос и результат не был получен из кэша.|  Пример запроса на получение списка SSH-ключей: ```     HTTP/2.0 200 OK     {       \"ssh_keys\":[           {             \"body\":\"ssh-rsa AAAAB3NzaC1sdfghjkOAsBwWhs= example@device.local\",             \"created_at\":\"2021-09-15T19:52:27Z\",             \"expired_at\":null,             \"id\":5297,             \"is_default\":false,             \"name\":\"example@device.local\",             \"used_at\":null,             \"used_by\":[]           }       ],       \"meta\":{           \"total\":1       },       \"response_id\":\"94608d15-8672-4eed-8ab6-28bd6fa3cdf7\"     } ```  ### Структура ответа с ошибкой |Название поля|Тип|Описание| |--- |--- |--- | |status_code|number|Короткий числовой идентификатор ошибки.| |error_code|string|Короткий текстовый идентификатор ошибки, который уточняет числовой идентификатор и удобен для программной обработки. Самый простой пример — это код `not_found` для ошибки 404.| |message|string, string[]|Опционально. В большинстве случаев в ответе будет содержаться человекочитаемое подробное описание ошибки или ошибок, которые помогут понять, что нужно исправить.| |response_id|string|Опционально. В большинстве случае в ответе будет содержаться ID ответа в формате UUIDv4, который однозначно указывает на ваш запрос внутри нашей системы. Если вам потребуется задать вопрос нашей поддержке, приложите к вопросу этот ID — так мы сможем найти ответ на него намного быстрее.|  Пример: ```     HTTP/2.0 403 Forbidden     {       \"status_code\": 403,       \"error_code\":  \"forbidden\",       \"message\":     \"You do not have access for the attempted action\",       \"response_id\": \"94608d15-8672-4eed-8ab6-28bd6fa3cdf7\"     } ```  ## Статусы ресурсов Важно учесть, что при создании большинства ресурсов внутри платформы вам будет сразу возвращен ответ от сервера со статусом `200 OK` или `201 Created` и ID созданного ресурса в теле ответа, но при этом этот ресурс может быть ещё в *состоянии запуска*.  Для того чтобы понять, в каком состоянии сейчас находится ваш ресурс, мы добавили поле `status` в ответ на получение информации о ресурсе.  Список статусов будет отличаться в зависимости от типа ресурса. Увидеть поддерживаемый список статусов вы сможете в описании каждого конкретного ресурса.     ## Ограничение скорости запросов (Rate Limiting) Чтобы обеспечить стабильность для всех пользователей, Timeweb Cloud защищает API от всплесков входящего трафика, анализируя количество запросов c каждого аккаунта к каждой конечной точке.  Если ваше приложение отправляет более 20 запросов в секунду на одну конечную точку, то для этого запроса API может вернуть код состояния HTTP `429 Too Many Requests`.   ## Аутентификация Доступ к API осуществляется с помощью JWT-токена. Токенами можно управлять внутри панели управления Timeweb Cloud в разделе *API и Terraform*.  Токен необходимо передавать в заголовке каждого запроса в формате: ```   Authorization: Bearer $TIMEWEB_CLOUD_TOKEN ```  ## Формат примеров API Примеры в этой документации описаны с помощью `curl`, HTTP-клиента командной строки. На компьютерах `Linux` и `macOS` обычно по умолчанию установлен `curl`, и он доступен для загрузки на всех популярных платформах, включая `Windows`.  Каждый пример разделен на несколько строк символом `\\`, который совместим с `bash`. Типичный пример выглядит так: ```   curl -X PATCH      -H \"Content-Type: application/json\"      -H \"Authorization: Bearer $TIMEWEB_CLOUD_TOKEN\"      -d '{\"name\":\"Cute Corvus\",\"comment\":\"Development Server\"}'      \"https://api.timeweb.cloud/api/v1/dedicated/1051\" ``` - Параметр `-X` задает метод запроса. Для согласованности метод будет указан во всех примерах, даже если он явно не требуется для методов `GET`. - Строки `-H` задают требуемые HTTP-заголовки. - Примеры, для которых требуется объект JSON в теле запроса, передают требуемые данные через параметр `-d`.  Чтобы использовать приведенные примеры, не подставляя каждый раз в них свой токен, вы можете добавить токен один раз в переменные окружения в вашей консоли. Например, на `Linux` это можно сделать с помощью команды:  ``` TIMEWEB_CLOUD_TOKEN=\"token\" ```  После этого токен будет автоматически подставляться в ваши запросы.  Обратите внимание, что все значения в этой документации являются примерами. Не полагайтесь на IDы операционных систем, тарифов и т.д., используемые в примерах. Используйте соответствующую конечную точку для получения значений перед созданием ресурсов.   ## Версионирование API построено согласно принципам [семантического версионирования](https://semver.org/lang/ru). Это значит, что мы гарантируем обратную совместимость всех изменений в пределах одной мажорной версии.  Мажорная версия каждой конечной точки обозначается в пути запроса, например, запрос `/api/v1/servers` указывает, что этот метод имеет версию 1.
 *
 * The version of the OpenAPI document: 1.0.0
 * Contact: info@timeweb.cloud
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 7.0.0-beta
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace OpenAPI\Client\Model;

use \ArrayAccess;
use \OpenAPI\Client\ObjectSerializer;

/**
 * GetDatabaseDefaultParameters200ResponseConfigParams Class Doc Comment
 *
 * @category Class
 * @description Рекомендуемые значения параметров базы данных (mysql | postgres | valkey).
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class GetDatabaseDefaultParameters200ResponseConfigParams implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'getDatabaseDefaultParameters_200_response_config_params';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'join_buffer_size' => 'string',
        'max_connections' => 'string',
        'sort_buffer_size' => 'string',
        'thread_cache_size' => 'string',
        'innodb_buffer_pool_size' => 'string',
        'auto_increment_increment' => 'string',
        'auto_increment_offset' => 'string',
        'innodb_io_capacity' => 'string',
        'innodb_purge_threads' => 'string',
        'innodb_read_io_threads' => 'string',
        'innodb_thread_concurrency' => 'string',
        'innodb_write_io_threads' => 'string',
        'innodb_log_file_size' => 'string',
        'max_allowed_packet' => 'string',
        'max_heap_table_size' => 'string',
        'sql_mode' => 'string',
        'query_cache_type' => 'string',
        'query_cache_size' => 'string',
        'query_cache_limit' => 'string',
        'innodb_flush_log_at_trx_commit' => 'string',
        'transaction_isolation' => 'string',
        'long_query_time' => 'string',
        'tmp_table_size' => 'string',
        'table_open_cache' => 'string',
        'table_open_cache_instances' => 'string',
        'innodb_flush_method' => 'string',
        'innodb_strict_mode' => 'string',
        'slow_query_log' => 'string',
        'binlog_cache_size' => 'string',
        'binlog_group_commit_sync_delay' => 'string',
        'binlog_row_image' => 'string',
        'binlog_rows_query_log_events' => 'string',
        'character_set_server' => 'string',
        'explicit_defaults_for_timestamp' => 'string',
        'group_concat_max_len' => 'string',
        'innodb_adaptive_hash_index' => 'string',
        'innodb_lock_wait_timeout' => 'string',
        'innodb_numa_interleave' => 'string',
        'net_read_timeout' => 'string',
        'net_write_timeout' => 'string',
        'regexp_time_limit' => 'string',
        'sync_binlog' => 'string',
        'table_definition_cache' => 'string',
        'log_bin_trust_function_creators' => 'string',
        'skip_name_resolve' => 'string',
        'innodb_redo_log_capacity' => 'string',
        'wait_timeout' => 'string',
        'interactive_timeout' => 'string',
        'default_time_zone' => 'string',
        'pxc_strict_mode' => 'string',
        'autovacuum_analyze_scale_factor' => 'string',
        'autovacuum_max_workers' => 'string',
        'autovacuum_naptime' => 'string',
        'autovacuum_vacuum_insert_scale_factor' => 'string',
        'autovacuum_vacuum_scale_factor' => 'string',
        'autovacuum_work_mem' => 'string',
        'bgwriter_delay' => 'string',
        'bgwriter_lru_maxpages' => 'string',
        'deadlock_timeout' => 'string',
        'gin_pending_list_limit' => 'string',
        'idle_in_transaction_session_timeout' => 'string',
        'join_collapse_limit' => 'string',
        'lock_timeout' => 'string',
        'max_prepared_transactions' => 'string',
        'shared_buffers' => 'string',
        'log_min_duration_statement' => 'string',
        'wal_buffers' => 'string',
        'temp_buffers' => 'string',
        'work_mem' => 'string',
        'default_transaction_isolation' => 'string',
        'effective_cache_size' => 'string',
        'max_wal_size' => 'string',
        'min_wal_size' => 'string',
        'wal_level' => 'string',
        'max_replication_slots' => 'string',
        'max_wal_senders' => 'string',
        'max_worker_processes' => 'string',
        'max_logical_replication_workers' => 'string',
        'max_parallel_maintenance_workers' => 'string',
        'max_parallel_workers' => 'string',
        'max_parallel_workers_per_gather' => 'string',
        'array_nulls' => 'string',
        'backend_flush_after' => 'string',
        'backslash_quote' => 'string',
        'bgwriter_flush_after' => 'string',
        'bgwriter_lru_multiplier' => 'string',
        'default_transaction_read_only' => 'string',
        'enable_hashagg' => 'string',
        'enable_hashjoin' => 'string',
        'enable_incremental_sort' => 'string',
        'enable_indexscan' => 'string',
        'enable_indexonlyscan' => 'string',
        'enable_material' => 'string',
        'enable_memoize' => 'string',
        'enable_mergejoin' => 'string',
        'enable_parallel_append' => 'string',
        'enable_parallel_hash' => 'string',
        'enable_partition_pruning' => 'string',
        'enable_partitionwise_join' => 'string',
        'enable_partitionwise_aggregate' => 'string',
        'enable_seqscan' => 'string',
        'enable_sort' => 'string',
        'enable_tidscan' => 'string',
        'exit_on_error' => 'string',
        'from_collapse_limit' => 'string',
        'jit' => 'string',
        'plan_cache_mode' => 'string',
        'quote_all_identifiers' => 'string',
        'standard_conforming_strings' => 'string',
        'statement_timeout' => 'string',
        'timezone' => 'string',
        'transform_null_equals' => 'string',
        'max_locks_per_transaction' => 'string',
        'autovacuum_vacuum_cost_limit' => 'string',
        'checkpoint_timeout' => 'string',
        'checkpoint_completion_target' => 'string',
        'wal_compression' => 'string',
        'random_page_cost' => 'string',
        'effective_io_concurrency' => 'string',
        'log_lock_waits' => 'string',
        'log_temp_files' => 'string',
        'track_io_timing' => 'string',
        'maintenance_work_mem' => 'string',
        'idle_session_timeout' => 'string',
        'io_method' => 'string',
        'io_workers' => 'string',
        'client_output_buffer_limit_normal' => 'string',
        'notify_keyspace_events' => 'string',
        'client_output_buffer_limit_pubsub' => 'string',
        'databases' => 'string',
        'timeout' => 'string',
        'maxmemory_policy' => 'string',
        'slowlog_log_slower_than' => 'string',
        'slowlog_max_len' => 'string',
        'save' => 'string',
        'appendonly' => 'string',
        'appendfsync' => 'string',
        'tcp_keepalive' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'join_buffer_size' => null,
        'max_connections' => null,
        'sort_buffer_size' => null,
        'thread_cache_size' => null,
        'innodb_buffer_pool_size' => null,
        'auto_increment_increment' => null,
        'auto_increment_offset' => null,
        'innodb_io_capacity' => null,
        'innodb_purge_threads' => null,
        'innodb_read_io_threads' => null,
        'innodb_thread_concurrency' => null,
        'innodb_write_io_threads' => null,
        'innodb_log_file_size' => null,
        'max_allowed_packet' => null,
        'max_heap_table_size' => null,
        'sql_mode' => null,
        'query_cache_type' => null,
        'query_cache_size' => null,
        'query_cache_limit' => null,
        'innodb_flush_log_at_trx_commit' => null,
        'transaction_isolation' => null,
        'long_query_time' => null,
        'tmp_table_size' => null,
        'table_open_cache' => null,
        'table_open_cache_instances' => null,
        'innodb_flush_method' => null,
        'innodb_strict_mode' => null,
        'slow_query_log' => null,
        'binlog_cache_size' => null,
        'binlog_group_commit_sync_delay' => null,
        'binlog_row_image' => null,
        'binlog_rows_query_log_events' => null,
        'character_set_server' => null,
        'explicit_defaults_for_timestamp' => null,
        'group_concat_max_len' => null,
        'innodb_adaptive_hash_index' => null,
        'innodb_lock_wait_timeout' => null,
        'innodb_numa_interleave' => null,
        'net_read_timeout' => null,
        'net_write_timeout' => null,
        'regexp_time_limit' => null,
        'sync_binlog' => null,
        'table_definition_cache' => null,
        'log_bin_trust_function_creators' => null,
        'skip_name_resolve' => null,
        'innodb_redo_log_capacity' => null,
        'wait_timeout' => null,
        'interactive_timeout' => null,
        'default_time_zone' => null,
        'pxc_strict_mode' => null,
        'autovacuum_analyze_scale_factor' => null,
        'autovacuum_max_workers' => null,
        'autovacuum_naptime' => null,
        'autovacuum_vacuum_insert_scale_factor' => null,
        'autovacuum_vacuum_scale_factor' => null,
        'autovacuum_work_mem' => null,
        'bgwriter_delay' => null,
        'bgwriter_lru_maxpages' => null,
        'deadlock_timeout' => null,
        'gin_pending_list_limit' => null,
        'idle_in_transaction_session_timeout' => null,
        'join_collapse_limit' => null,
        'lock_timeout' => null,
        'max_prepared_transactions' => null,
        'shared_buffers' => null,
        'log_min_duration_statement' => null,
        'wal_buffers' => null,
        'temp_buffers' => null,
        'work_mem' => null,
        'default_transaction_isolation' => null,
        'effective_cache_size' => null,
        'max_wal_size' => null,
        'min_wal_size' => null,
        'wal_level' => null,
        'max_replication_slots' => null,
        'max_wal_senders' => null,
        'max_worker_processes' => null,
        'max_logical_replication_workers' => null,
        'max_parallel_maintenance_workers' => null,
        'max_parallel_workers' => null,
        'max_parallel_workers_per_gather' => null,
        'array_nulls' => null,
        'backend_flush_after' => null,
        'backslash_quote' => null,
        'bgwriter_flush_after' => null,
        'bgwriter_lru_multiplier' => null,
        'default_transaction_read_only' => null,
        'enable_hashagg' => null,
        'enable_hashjoin' => null,
        'enable_incremental_sort' => null,
        'enable_indexscan' => null,
        'enable_indexonlyscan' => null,
        'enable_material' => null,
        'enable_memoize' => null,
        'enable_mergejoin' => null,
        'enable_parallel_append' => null,
        'enable_parallel_hash' => null,
        'enable_partition_pruning' => null,
        'enable_partitionwise_join' => null,
        'enable_partitionwise_aggregate' => null,
        'enable_seqscan' => null,
        'enable_sort' => null,
        'enable_tidscan' => null,
        'exit_on_error' => null,
        'from_collapse_limit' => null,
        'jit' => null,
        'plan_cache_mode' => null,
        'quote_all_identifiers' => null,
        'standard_conforming_strings' => null,
        'statement_timeout' => null,
        'timezone' => null,
        'transform_null_equals' => null,
        'max_locks_per_transaction' => null,
        'autovacuum_vacuum_cost_limit' => null,
        'checkpoint_timeout' => null,
        'checkpoint_completion_target' => null,
        'wal_compression' => null,
        'random_page_cost' => null,
        'effective_io_concurrency' => null,
        'log_lock_waits' => null,
        'log_temp_files' => null,
        'track_io_timing' => null,
        'maintenance_work_mem' => null,
        'idle_session_timeout' => null,
        'io_method' => null,
        'io_workers' => null,
        'client_output_buffer_limit_normal' => null,
        'notify_keyspace_events' => null,
        'client_output_buffer_limit_pubsub' => null,
        'databases' => null,
        'timeout' => null,
        'maxmemory_policy' => null,
        'slowlog_log_slower_than' => null,
        'slowlog_max_len' => null,
        'save' => null,
        'appendonly' => null,
        'appendfsync' => null,
        'tcp_keepalive' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'join_buffer_size' => false,
		'max_connections' => false,
		'sort_buffer_size' => false,
		'thread_cache_size' => false,
		'innodb_buffer_pool_size' => false,
		'auto_increment_increment' => false,
		'auto_increment_offset' => false,
		'innodb_io_capacity' => false,
		'innodb_purge_threads' => false,
		'innodb_read_io_threads' => false,
		'innodb_thread_concurrency' => false,
		'innodb_write_io_threads' => false,
		'innodb_log_file_size' => false,
		'max_allowed_packet' => false,
		'max_heap_table_size' => false,
		'sql_mode' => false,
		'query_cache_type' => false,
		'query_cache_size' => false,
		'query_cache_limit' => false,
		'innodb_flush_log_at_trx_commit' => false,
		'transaction_isolation' => false,
		'long_query_time' => false,
		'tmp_table_size' => false,
		'table_open_cache' => false,
		'table_open_cache_instances' => false,
		'innodb_flush_method' => false,
		'innodb_strict_mode' => false,
		'slow_query_log' => false,
		'binlog_cache_size' => false,
		'binlog_group_commit_sync_delay' => false,
		'binlog_row_image' => false,
		'binlog_rows_query_log_events' => false,
		'character_set_server' => false,
		'explicit_defaults_for_timestamp' => false,
		'group_concat_max_len' => false,
		'innodb_adaptive_hash_index' => false,
		'innodb_lock_wait_timeout' => false,
		'innodb_numa_interleave' => false,
		'net_read_timeout' => false,
		'net_write_timeout' => false,
		'regexp_time_limit' => false,
		'sync_binlog' => false,
		'table_definition_cache' => false,
		'log_bin_trust_function_creators' => false,
		'skip_name_resolve' => false,
		'innodb_redo_log_capacity' => false,
		'wait_timeout' => false,
		'interactive_timeout' => false,
		'default_time_zone' => false,
		'pxc_strict_mode' => false,
		'autovacuum_analyze_scale_factor' => false,
		'autovacuum_max_workers' => false,
		'autovacuum_naptime' => false,
		'autovacuum_vacuum_insert_scale_factor' => false,
		'autovacuum_vacuum_scale_factor' => false,
		'autovacuum_work_mem' => false,
		'bgwriter_delay' => false,
		'bgwriter_lru_maxpages' => false,
		'deadlock_timeout' => false,
		'gin_pending_list_limit' => false,
		'idle_in_transaction_session_timeout' => false,
		'join_collapse_limit' => false,
		'lock_timeout' => false,
		'max_prepared_transactions' => false,
		'shared_buffers' => false,
		'log_min_duration_statement' => false,
		'wal_buffers' => false,
		'temp_buffers' => false,
		'work_mem' => false,
		'default_transaction_isolation' => false,
		'effective_cache_size' => false,
		'max_wal_size' => false,
		'min_wal_size' => false,
		'wal_level' => false,
		'max_replication_slots' => false,
		'max_wal_senders' => false,
		'max_worker_processes' => false,
		'max_logical_replication_workers' => false,
		'max_parallel_maintenance_workers' => false,
		'max_parallel_workers' => false,
		'max_parallel_workers_per_gather' => false,
		'array_nulls' => false,
		'backend_flush_after' => false,
		'backslash_quote' => false,
		'bgwriter_flush_after' => false,
		'bgwriter_lru_multiplier' => false,
		'default_transaction_read_only' => false,
		'enable_hashagg' => false,
		'enable_hashjoin' => false,
		'enable_incremental_sort' => false,
		'enable_indexscan' => false,
		'enable_indexonlyscan' => false,
		'enable_material' => false,
		'enable_memoize' => false,
		'enable_mergejoin' => false,
		'enable_parallel_append' => false,
		'enable_parallel_hash' => false,
		'enable_partition_pruning' => false,
		'enable_partitionwise_join' => false,
		'enable_partitionwise_aggregate' => false,
		'enable_seqscan' => false,
		'enable_sort' => false,
		'enable_tidscan' => false,
		'exit_on_error' => false,
		'from_collapse_limit' => false,
		'jit' => false,
		'plan_cache_mode' => false,
		'quote_all_identifiers' => false,
		'standard_conforming_strings' => false,
		'statement_timeout' => false,
		'timezone' => false,
		'transform_null_equals' => false,
		'max_locks_per_transaction' => false,
		'autovacuum_vacuum_cost_limit' => false,
		'checkpoint_timeout' => false,
		'checkpoint_completion_target' => false,
		'wal_compression' => false,
		'random_page_cost' => false,
		'effective_io_concurrency' => false,
		'log_lock_waits' => false,
		'log_temp_files' => false,
		'track_io_timing' => false,
		'maintenance_work_mem' => false,
		'idle_session_timeout' => false,
		'io_method' => false,
		'io_workers' => false,
		'client_output_buffer_limit_normal' => false,
		'notify_keyspace_events' => false,
		'client_output_buffer_limit_pubsub' => false,
		'databases' => false,
		'timeout' => false,
		'maxmemory_policy' => false,
		'slowlog_log_slower_than' => false,
		'slowlog_max_len' => false,
		'save' => false,
		'appendonly' => false,
		'appendfsync' => false,
		'tcp_keepalive' => false
    ];

    /**
      * If a nullable field gets set to null, insert it here
      *
      * @var boolean[]
      */
    protected array $openAPINullablesSetToNull = [];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of nullable properties
     *
     * @return array
     */
    protected static function openAPINullables(): array
    {
        return self::$openAPINullables;
    }

    /**
     * Array of nullable field names deliberately set to null
     *
     * @return boolean[]
     */
    private function getOpenAPINullablesSetToNull(): array
    {
        return $this->openAPINullablesSetToNull;
    }

    /**
     * Setter - Array of nullable field names deliberately set to null
     *
     * @param boolean[] $openAPINullablesSetToNull
     */
    private function setOpenAPINullablesSetToNull(array $openAPINullablesSetToNull): void
    {
        $this->openAPINullablesSetToNull = $openAPINullablesSetToNull;
    }

    /**
     * Checks if a property is nullable
     *
     * @param string $property
     * @return bool
     */
    public static function isNullable(string $property): bool
    {
        return self::openAPINullables()[$property] ?? false;
    }

    /**
     * Checks if a nullable property is set to null.
     *
     * @param string $property
     * @return bool
     */
    public function isNullableSetToNull(string $property): bool
    {
        return in_array($property, $this->getOpenAPINullablesSetToNull(), true);
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'join_buffer_size' => 'join_buffer_size',
        'max_connections' => 'max_connections',
        'sort_buffer_size' => 'sort_buffer_size',
        'thread_cache_size' => 'thread_cache_size',
        'innodb_buffer_pool_size' => 'innodb_buffer_pool_size',
        'auto_increment_increment' => 'auto_increment_increment',
        'auto_increment_offset' => 'auto_increment_offset',
        'innodb_io_capacity' => 'innodb_io_capacity',
        'innodb_purge_threads' => 'innodb_purge_threads',
        'innodb_read_io_threads' => 'innodb_read_io_threads',
        'innodb_thread_concurrency' => 'innodb_thread_concurrency',
        'innodb_write_io_threads' => 'innodb_write_io_threads',
        'innodb_log_file_size' => 'innodb_log_file_size',
        'max_allowed_packet' => 'max_allowed_packet',
        'max_heap_table_size' => 'max_heap_table_size',
        'sql_mode' => 'sql_mode',
        'query_cache_type' => 'query_cache_type',
        'query_cache_size' => 'query_cache_size',
        'query_cache_limit' => 'query_cache_limit',
        'innodb_flush_log_at_trx_commit' => 'innodb_flush_log_at_trx_commit',
        'transaction_isolation' => 'transaction_isolation',
        'long_query_time' => 'long_query_time',
        'tmp_table_size' => 'tmp_table_size',
        'table_open_cache' => 'table_open_cache',
        'table_open_cache_instances' => 'table_open_cache_instances',
        'innodb_flush_method' => 'innodb_flush_method',
        'innodb_strict_mode' => 'innodb_strict_mode',
        'slow_query_log' => 'slow_query_log',
        'binlog_cache_size' => 'binlog_cache_size',
        'binlog_group_commit_sync_delay' => 'binlog_group_commit_sync_delay',
        'binlog_row_image' => 'binlog_row_image',
        'binlog_rows_query_log_events' => 'binlog_rows_query_log_events',
        'character_set_server' => 'character_set_server',
        'explicit_defaults_for_timestamp' => 'explicit_defaults_for_timestamp',
        'group_concat_max_len' => 'group_concat_max_len',
        'innodb_adaptive_hash_index' => 'innodb_adaptive_hash_index',
        'innodb_lock_wait_timeout' => 'innodb_lock_wait_timeout',
        'innodb_numa_interleave' => 'innodb_numa_interleave',
        'net_read_timeout' => 'net_read_timeout',
        'net_write_timeout' => 'net_write_timeout',
        'regexp_time_limit' => 'regexp_time_limit',
        'sync_binlog' => 'sync_binlog',
        'table_definition_cache' => 'table_definition_cache',
        'log_bin_trust_function_creators' => 'log_bin_trust_function_creators',
        'skip_name_resolve' => 'skip_name_resolve',
        'innodb_redo_log_capacity' => 'innodb_redo_log_capacity',
        'wait_timeout' => 'wait_timeout',
        'interactive_timeout' => 'interactive_timeout',
        'default_time_zone' => 'default-time-zone',
        'pxc_strict_mode' => 'pxc_strict_mode',
        'autovacuum_analyze_scale_factor' => 'autovacuum_analyze_scale_factor',
        'autovacuum_max_workers' => 'autovacuum_max_workers',
        'autovacuum_naptime' => 'autovacuum_naptime',
        'autovacuum_vacuum_insert_scale_factor' => 'autovacuum_vacuum_insert_scale_factor',
        'autovacuum_vacuum_scale_factor' => 'autovacuum_vacuum_scale_factor',
        'autovacuum_work_mem' => 'autovacuum_work_mem',
        'bgwriter_delay' => 'bgwriter_delay',
        'bgwriter_lru_maxpages' => 'bgwriter_lru_maxpages',
        'deadlock_timeout' => 'deadlock_timeout',
        'gin_pending_list_limit' => 'gin_pending_list_limit',
        'idle_in_transaction_session_timeout' => 'idle_in_transaction_session_timeout',
        'join_collapse_limit' => 'join_collapse_limit',
        'lock_timeout' => 'lock_timeout',
        'max_prepared_transactions' => 'max_prepared_transactions',
        'shared_buffers' => 'shared_buffers',
        'log_min_duration_statement' => 'log_min_duration_statement',
        'wal_buffers' => 'wal_buffers',
        'temp_buffers' => 'temp_buffers',
        'work_mem' => 'work_mem',
        'default_transaction_isolation' => 'default_transaction_isolation',
        'effective_cache_size' => 'effective_cache_size',
        'max_wal_size' => 'max_wal_size',
        'min_wal_size' => 'min_wal_size',
        'wal_level' => 'wal_level',
        'max_replication_slots' => 'max_replication_slots',
        'max_wal_senders' => 'max_wal_senders',
        'max_worker_processes' => 'max_worker_processes',
        'max_logical_replication_workers' => 'max_logical_replication_workers',
        'max_parallel_maintenance_workers' => 'max_parallel_maintenance_workers',
        'max_parallel_workers' => 'max_parallel_workers',
        'max_parallel_workers_per_gather' => 'max_parallel_workers_per_gather',
        'array_nulls' => 'array_nulls',
        'backend_flush_after' => 'backend_flush_after',
        'backslash_quote' => 'backslash_quote',
        'bgwriter_flush_after' => 'bgwriter_flush_after',
        'bgwriter_lru_multiplier' => 'bgwriter_lru_multiplier',
        'default_transaction_read_only' => 'default_transaction_read_only',
        'enable_hashagg' => 'enable_hashagg',
        'enable_hashjoin' => 'enable_hashjoin',
        'enable_incremental_sort' => 'enable_incremental_sort',
        'enable_indexscan' => 'enable_indexscan',
        'enable_indexonlyscan' => 'enable_indexonlyscan',
        'enable_material' => 'enable_material',
        'enable_memoize' => 'enable_memoize',
        'enable_mergejoin' => 'enable_mergejoin',
        'enable_parallel_append' => 'enable_parallel_append',
        'enable_parallel_hash' => 'enable_parallel_hash',
        'enable_partition_pruning' => 'enable_partition_pruning',
        'enable_partitionwise_join' => 'enable_partitionwise_join',
        'enable_partitionwise_aggregate' => 'enable_partitionwise_aggregate',
        'enable_seqscan' => 'enable_seqscan',
        'enable_sort' => 'enable_sort',
        'enable_tidscan' => 'enable_tidscan',
        'exit_on_error' => 'exit_on_error',
        'from_collapse_limit' => 'from_collapse_limit',
        'jit' => 'jit',
        'plan_cache_mode' => 'plan_cache_mode',
        'quote_all_identifiers' => 'quote_all_identifiers',
        'standard_conforming_strings' => 'standard_conforming_strings',
        'statement_timeout' => 'statement_timeout',
        'timezone' => 'timezone',
        'transform_null_equals' => 'transform_null_equals',
        'max_locks_per_transaction' => 'max_locks_per_transaction',
        'autovacuum_vacuum_cost_limit' => 'autovacuum_vacuum_cost_limit',
        'checkpoint_timeout' => 'checkpoint_timeout',
        'checkpoint_completion_target' => 'checkpoint_completion_target',
        'wal_compression' => 'wal_compression',
        'random_page_cost' => 'random_page_cost',
        'effective_io_concurrency' => 'effective_io_concurrency',
        'log_lock_waits' => 'log_lock_waits',
        'log_temp_files' => 'log_temp_files',
        'track_io_timing' => 'track_io_timing',
        'maintenance_work_mem' => 'maintenance_work_mem',
        'idle_session_timeout' => 'idle_session_timeout',
        'io_method' => 'io_method',
        'io_workers' => 'io_workers',
        'client_output_buffer_limit_normal' => 'client-output-buffer-limit normal',
        'notify_keyspace_events' => 'notify-keyspace-events',
        'client_output_buffer_limit_pubsub' => 'client-output-buffer-limit pubsub',
        'databases' => 'databases',
        'timeout' => 'timeout',
        'maxmemory_policy' => 'maxmemory-policy',
        'slowlog_log_slower_than' => 'slowlog-log-slower-than',
        'slowlog_max_len' => 'slowlog-max-len',
        'save' => 'save',
        'appendonly' => 'appendonly',
        'appendfsync' => 'appendfsync',
        'tcp_keepalive' => 'tcp-keepalive'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'join_buffer_size' => 'setJoinBufferSize',
        'max_connections' => 'setMaxConnections',
        'sort_buffer_size' => 'setSortBufferSize',
        'thread_cache_size' => 'setThreadCacheSize',
        'innodb_buffer_pool_size' => 'setInnodbBufferPoolSize',
        'auto_increment_increment' => 'setAutoIncrementIncrement',
        'auto_increment_offset' => 'setAutoIncrementOffset',
        'innodb_io_capacity' => 'setInnodbIoCapacity',
        'innodb_purge_threads' => 'setInnodbPurgeThreads',
        'innodb_read_io_threads' => 'setInnodbReadIoThreads',
        'innodb_thread_concurrency' => 'setInnodbThreadConcurrency',
        'innodb_write_io_threads' => 'setInnodbWriteIoThreads',
        'innodb_log_file_size' => 'setInnodbLogFileSize',
        'max_allowed_packet' => 'setMaxAllowedPacket',
        'max_heap_table_size' => 'setMaxHeapTableSize',
        'sql_mode' => 'setSqlMode',
        'query_cache_type' => 'setQueryCacheType',
        'query_cache_size' => 'setQueryCacheSize',
        'query_cache_limit' => 'setQueryCacheLimit',
        'innodb_flush_log_at_trx_commit' => 'setInnodbFlushLogAtTrxCommit',
        'transaction_isolation' => 'setTransactionIsolation',
        'long_query_time' => 'setLongQueryTime',
        'tmp_table_size' => 'setTmpTableSize',
        'table_open_cache' => 'setTableOpenCache',
        'table_open_cache_instances' => 'setTableOpenCacheInstances',
        'innodb_flush_method' => 'setInnodbFlushMethod',
        'innodb_strict_mode' => 'setInnodbStrictMode',
        'slow_query_log' => 'setSlowQueryLog',
        'binlog_cache_size' => 'setBinlogCacheSize',
        'binlog_group_commit_sync_delay' => 'setBinlogGroupCommitSyncDelay',
        'binlog_row_image' => 'setBinlogRowImage',
        'binlog_rows_query_log_events' => 'setBinlogRowsQueryLogEvents',
        'character_set_server' => 'setCharacterSetServer',
        'explicit_defaults_for_timestamp' => 'setExplicitDefaultsForTimestamp',
        'group_concat_max_len' => 'setGroupConcatMaxLen',
        'innodb_adaptive_hash_index' => 'setInnodbAdaptiveHashIndex',
        'innodb_lock_wait_timeout' => 'setInnodbLockWaitTimeout',
        'innodb_numa_interleave' => 'setInnodbNumaInterleave',
        'net_read_timeout' => 'setNetReadTimeout',
        'net_write_timeout' => 'setNetWriteTimeout',
        'regexp_time_limit' => 'setRegexpTimeLimit',
        'sync_binlog' => 'setSyncBinlog',
        'table_definition_cache' => 'setTableDefinitionCache',
        'log_bin_trust_function_creators' => 'setLogBinTrustFunctionCreators',
        'skip_name_resolve' => 'setSkipNameResolve',
        'innodb_redo_log_capacity' => 'setInnodbRedoLogCapacity',
        'wait_timeout' => 'setWaitTimeout',
        'interactive_timeout' => 'setInteractiveTimeout',
        'default_time_zone' => 'setDefaultTimeZone',
        'pxc_strict_mode' => 'setPxcStrictMode',
        'autovacuum_analyze_scale_factor' => 'setAutovacuumAnalyzeScaleFactor',
        'autovacuum_max_workers' => 'setAutovacuumMaxWorkers',
        'autovacuum_naptime' => 'setAutovacuumNaptime',
        'autovacuum_vacuum_insert_scale_factor' => 'setAutovacuumVacuumInsertScaleFactor',
        'autovacuum_vacuum_scale_factor' => 'setAutovacuumVacuumScaleFactor',
        'autovacuum_work_mem' => 'setAutovacuumWorkMem',
        'bgwriter_delay' => 'setBgwriterDelay',
        'bgwriter_lru_maxpages' => 'setBgwriterLruMaxpages',
        'deadlock_timeout' => 'setDeadlockTimeout',
        'gin_pending_list_limit' => 'setGinPendingListLimit',
        'idle_in_transaction_session_timeout' => 'setIdleInTransactionSessionTimeout',
        'join_collapse_limit' => 'setJoinCollapseLimit',
        'lock_timeout' => 'setLockTimeout',
        'max_prepared_transactions' => 'setMaxPreparedTransactions',
        'shared_buffers' => 'setSharedBuffers',
        'log_min_duration_statement' => 'setLogMinDurationStatement',
        'wal_buffers' => 'setWalBuffers',
        'temp_buffers' => 'setTempBuffers',
        'work_mem' => 'setWorkMem',
        'default_transaction_isolation' => 'setDefaultTransactionIsolation',
        'effective_cache_size' => 'setEffectiveCacheSize',
        'max_wal_size' => 'setMaxWalSize',
        'min_wal_size' => 'setMinWalSize',
        'wal_level' => 'setWalLevel',
        'max_replication_slots' => 'setMaxReplicationSlots',
        'max_wal_senders' => 'setMaxWalSenders',
        'max_worker_processes' => 'setMaxWorkerProcesses',
        'max_logical_replication_workers' => 'setMaxLogicalReplicationWorkers',
        'max_parallel_maintenance_workers' => 'setMaxParallelMaintenanceWorkers',
        'max_parallel_workers' => 'setMaxParallelWorkers',
        'max_parallel_workers_per_gather' => 'setMaxParallelWorkersPerGather',
        'array_nulls' => 'setArrayNulls',
        'backend_flush_after' => 'setBackendFlushAfter',
        'backslash_quote' => 'setBackslashQuote',
        'bgwriter_flush_after' => 'setBgwriterFlushAfter',
        'bgwriter_lru_multiplier' => 'setBgwriterLruMultiplier',
        'default_transaction_read_only' => 'setDefaultTransactionReadOnly',
        'enable_hashagg' => 'setEnableHashagg',
        'enable_hashjoin' => 'setEnableHashjoin',
        'enable_incremental_sort' => 'setEnableIncrementalSort',
        'enable_indexscan' => 'setEnableIndexscan',
        'enable_indexonlyscan' => 'setEnableIndexonlyscan',
        'enable_material' => 'setEnableMaterial',
        'enable_memoize' => 'setEnableMemoize',
        'enable_mergejoin' => 'setEnableMergejoin',
        'enable_parallel_append' => 'setEnableParallelAppend',
        'enable_parallel_hash' => 'setEnableParallelHash',
        'enable_partition_pruning' => 'setEnablePartitionPruning',
        'enable_partitionwise_join' => 'setEnablePartitionwiseJoin',
        'enable_partitionwise_aggregate' => 'setEnablePartitionwiseAggregate',
        'enable_seqscan' => 'setEnableSeqscan',
        'enable_sort' => 'setEnableSort',
        'enable_tidscan' => 'setEnableTidscan',
        'exit_on_error' => 'setExitOnError',
        'from_collapse_limit' => 'setFromCollapseLimit',
        'jit' => 'setJit',
        'plan_cache_mode' => 'setPlanCacheMode',
        'quote_all_identifiers' => 'setQuoteAllIdentifiers',
        'standard_conforming_strings' => 'setStandardConformingStrings',
        'statement_timeout' => 'setStatementTimeout',
        'timezone' => 'setTimezone',
        'transform_null_equals' => 'setTransformNullEquals',
        'max_locks_per_transaction' => 'setMaxLocksPerTransaction',
        'autovacuum_vacuum_cost_limit' => 'setAutovacuumVacuumCostLimit',
        'checkpoint_timeout' => 'setCheckpointTimeout',
        'checkpoint_completion_target' => 'setCheckpointCompletionTarget',
        'wal_compression' => 'setWalCompression',
        'random_page_cost' => 'setRandomPageCost',
        'effective_io_concurrency' => 'setEffectiveIoConcurrency',
        'log_lock_waits' => 'setLogLockWaits',
        'log_temp_files' => 'setLogTempFiles',
        'track_io_timing' => 'setTrackIoTiming',
        'maintenance_work_mem' => 'setMaintenanceWorkMem',
        'idle_session_timeout' => 'setIdleSessionTimeout',
        'io_method' => 'setIoMethod',
        'io_workers' => 'setIoWorkers',
        'client_output_buffer_limit_normal' => 'setClientOutputBufferLimitNormal',
        'notify_keyspace_events' => 'setNotifyKeyspaceEvents',
        'client_output_buffer_limit_pubsub' => 'setClientOutputBufferLimitPubsub',
        'databases' => 'setDatabases',
        'timeout' => 'setTimeout',
        'maxmemory_policy' => 'setMaxmemoryPolicy',
        'slowlog_log_slower_than' => 'setSlowlogLogSlowerThan',
        'slowlog_max_len' => 'setSlowlogMaxLen',
        'save' => 'setSave',
        'appendonly' => 'setAppendonly',
        'appendfsync' => 'setAppendfsync',
        'tcp_keepalive' => 'setTcpKeepalive'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'join_buffer_size' => 'getJoinBufferSize',
        'max_connections' => 'getMaxConnections',
        'sort_buffer_size' => 'getSortBufferSize',
        'thread_cache_size' => 'getThreadCacheSize',
        'innodb_buffer_pool_size' => 'getInnodbBufferPoolSize',
        'auto_increment_increment' => 'getAutoIncrementIncrement',
        'auto_increment_offset' => 'getAutoIncrementOffset',
        'innodb_io_capacity' => 'getInnodbIoCapacity',
        'innodb_purge_threads' => 'getInnodbPurgeThreads',
        'innodb_read_io_threads' => 'getInnodbReadIoThreads',
        'innodb_thread_concurrency' => 'getInnodbThreadConcurrency',
        'innodb_write_io_threads' => 'getInnodbWriteIoThreads',
        'innodb_log_file_size' => 'getInnodbLogFileSize',
        'max_allowed_packet' => 'getMaxAllowedPacket',
        'max_heap_table_size' => 'getMaxHeapTableSize',
        'sql_mode' => 'getSqlMode',
        'query_cache_type' => 'getQueryCacheType',
        'query_cache_size' => 'getQueryCacheSize',
        'query_cache_limit' => 'getQueryCacheLimit',
        'innodb_flush_log_at_trx_commit' => 'getInnodbFlushLogAtTrxCommit',
        'transaction_isolation' => 'getTransactionIsolation',
        'long_query_time' => 'getLongQueryTime',
        'tmp_table_size' => 'getTmpTableSize',
        'table_open_cache' => 'getTableOpenCache',
        'table_open_cache_instances' => 'getTableOpenCacheInstances',
        'innodb_flush_method' => 'getInnodbFlushMethod',
        'innodb_strict_mode' => 'getInnodbStrictMode',
        'slow_query_log' => 'getSlowQueryLog',
        'binlog_cache_size' => 'getBinlogCacheSize',
        'binlog_group_commit_sync_delay' => 'getBinlogGroupCommitSyncDelay',
        'binlog_row_image' => 'getBinlogRowImage',
        'binlog_rows_query_log_events' => 'getBinlogRowsQueryLogEvents',
        'character_set_server' => 'getCharacterSetServer',
        'explicit_defaults_for_timestamp' => 'getExplicitDefaultsForTimestamp',
        'group_concat_max_len' => 'getGroupConcatMaxLen',
        'innodb_adaptive_hash_index' => 'getInnodbAdaptiveHashIndex',
        'innodb_lock_wait_timeout' => 'getInnodbLockWaitTimeout',
        'innodb_numa_interleave' => 'getInnodbNumaInterleave',
        'net_read_timeout' => 'getNetReadTimeout',
        'net_write_timeout' => 'getNetWriteTimeout',
        'regexp_time_limit' => 'getRegexpTimeLimit',
        'sync_binlog' => 'getSyncBinlog',
        'table_definition_cache' => 'getTableDefinitionCache',
        'log_bin_trust_function_creators' => 'getLogBinTrustFunctionCreators',
        'skip_name_resolve' => 'getSkipNameResolve',
        'innodb_redo_log_capacity' => 'getInnodbRedoLogCapacity',
        'wait_timeout' => 'getWaitTimeout',
        'interactive_timeout' => 'getInteractiveTimeout',
        'default_time_zone' => 'getDefaultTimeZone',
        'pxc_strict_mode' => 'getPxcStrictMode',
        'autovacuum_analyze_scale_factor' => 'getAutovacuumAnalyzeScaleFactor',
        'autovacuum_max_workers' => 'getAutovacuumMaxWorkers',
        'autovacuum_naptime' => 'getAutovacuumNaptime',
        'autovacuum_vacuum_insert_scale_factor' => 'getAutovacuumVacuumInsertScaleFactor',
        'autovacuum_vacuum_scale_factor' => 'getAutovacuumVacuumScaleFactor',
        'autovacuum_work_mem' => 'getAutovacuumWorkMem',
        'bgwriter_delay' => 'getBgwriterDelay',
        'bgwriter_lru_maxpages' => 'getBgwriterLruMaxpages',
        'deadlock_timeout' => 'getDeadlockTimeout',
        'gin_pending_list_limit' => 'getGinPendingListLimit',
        'idle_in_transaction_session_timeout' => 'getIdleInTransactionSessionTimeout',
        'join_collapse_limit' => 'getJoinCollapseLimit',
        'lock_timeout' => 'getLockTimeout',
        'max_prepared_transactions' => 'getMaxPreparedTransactions',
        'shared_buffers' => 'getSharedBuffers',
        'log_min_duration_statement' => 'getLogMinDurationStatement',
        'wal_buffers' => 'getWalBuffers',
        'temp_buffers' => 'getTempBuffers',
        'work_mem' => 'getWorkMem',
        'default_transaction_isolation' => 'getDefaultTransactionIsolation',
        'effective_cache_size' => 'getEffectiveCacheSize',
        'max_wal_size' => 'getMaxWalSize',
        'min_wal_size' => 'getMinWalSize',
        'wal_level' => 'getWalLevel',
        'max_replication_slots' => 'getMaxReplicationSlots',
        'max_wal_senders' => 'getMaxWalSenders',
        'max_worker_processes' => 'getMaxWorkerProcesses',
        'max_logical_replication_workers' => 'getMaxLogicalReplicationWorkers',
        'max_parallel_maintenance_workers' => 'getMaxParallelMaintenanceWorkers',
        'max_parallel_workers' => 'getMaxParallelWorkers',
        'max_parallel_workers_per_gather' => 'getMaxParallelWorkersPerGather',
        'array_nulls' => 'getArrayNulls',
        'backend_flush_after' => 'getBackendFlushAfter',
        'backslash_quote' => 'getBackslashQuote',
        'bgwriter_flush_after' => 'getBgwriterFlushAfter',
        'bgwriter_lru_multiplier' => 'getBgwriterLruMultiplier',
        'default_transaction_read_only' => 'getDefaultTransactionReadOnly',
        'enable_hashagg' => 'getEnableHashagg',
        'enable_hashjoin' => 'getEnableHashjoin',
        'enable_incremental_sort' => 'getEnableIncrementalSort',
        'enable_indexscan' => 'getEnableIndexscan',
        'enable_indexonlyscan' => 'getEnableIndexonlyscan',
        'enable_material' => 'getEnableMaterial',
        'enable_memoize' => 'getEnableMemoize',
        'enable_mergejoin' => 'getEnableMergejoin',
        'enable_parallel_append' => 'getEnableParallelAppend',
        'enable_parallel_hash' => 'getEnableParallelHash',
        'enable_partition_pruning' => 'getEnablePartitionPruning',
        'enable_partitionwise_join' => 'getEnablePartitionwiseJoin',
        'enable_partitionwise_aggregate' => 'getEnablePartitionwiseAggregate',
        'enable_seqscan' => 'getEnableSeqscan',
        'enable_sort' => 'getEnableSort',
        'enable_tidscan' => 'getEnableTidscan',
        'exit_on_error' => 'getExitOnError',
        'from_collapse_limit' => 'getFromCollapseLimit',
        'jit' => 'getJit',
        'plan_cache_mode' => 'getPlanCacheMode',
        'quote_all_identifiers' => 'getQuoteAllIdentifiers',
        'standard_conforming_strings' => 'getStandardConformingStrings',
        'statement_timeout' => 'getStatementTimeout',
        'timezone' => 'getTimezone',
        'transform_null_equals' => 'getTransformNullEquals',
        'max_locks_per_transaction' => 'getMaxLocksPerTransaction',
        'autovacuum_vacuum_cost_limit' => 'getAutovacuumVacuumCostLimit',
        'checkpoint_timeout' => 'getCheckpointTimeout',
        'checkpoint_completion_target' => 'getCheckpointCompletionTarget',
        'wal_compression' => 'getWalCompression',
        'random_page_cost' => 'getRandomPageCost',
        'effective_io_concurrency' => 'getEffectiveIoConcurrency',
        'log_lock_waits' => 'getLogLockWaits',
        'log_temp_files' => 'getLogTempFiles',
        'track_io_timing' => 'getTrackIoTiming',
        'maintenance_work_mem' => 'getMaintenanceWorkMem',
        'idle_session_timeout' => 'getIdleSessionTimeout',
        'io_method' => 'getIoMethod',
        'io_workers' => 'getIoWorkers',
        'client_output_buffer_limit_normal' => 'getClientOutputBufferLimitNormal',
        'notify_keyspace_events' => 'getNotifyKeyspaceEvents',
        'client_output_buffer_limit_pubsub' => 'getClientOutputBufferLimitPubsub',
        'databases' => 'getDatabases',
        'timeout' => 'getTimeout',
        'maxmemory_policy' => 'getMaxmemoryPolicy',
        'slowlog_log_slower_than' => 'getSlowlogLogSlowerThan',
        'slowlog_max_len' => 'getSlowlogMaxLen',
        'save' => 'getSave',
        'appendonly' => 'getAppendonly',
        'appendfsync' => 'getAppendfsync',
        'tcp_keepalive' => 'getTcpKeepalive'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }


    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->setIfExists('join_buffer_size', $data ?? [], null);
        $this->setIfExists('max_connections', $data ?? [], null);
        $this->setIfExists('sort_buffer_size', $data ?? [], null);
        $this->setIfExists('thread_cache_size', $data ?? [], null);
        $this->setIfExists('innodb_buffer_pool_size', $data ?? [], null);
        $this->setIfExists('auto_increment_increment', $data ?? [], null);
        $this->setIfExists('auto_increment_offset', $data ?? [], null);
        $this->setIfExists('innodb_io_capacity', $data ?? [], null);
        $this->setIfExists('innodb_purge_threads', $data ?? [], null);
        $this->setIfExists('innodb_read_io_threads', $data ?? [], null);
        $this->setIfExists('innodb_thread_concurrency', $data ?? [], null);
        $this->setIfExists('innodb_write_io_threads', $data ?? [], null);
        $this->setIfExists('innodb_log_file_size', $data ?? [], null);
        $this->setIfExists('max_allowed_packet', $data ?? [], null);
        $this->setIfExists('max_heap_table_size', $data ?? [], null);
        $this->setIfExists('sql_mode', $data ?? [], null);
        $this->setIfExists('query_cache_type', $data ?? [], null);
        $this->setIfExists('query_cache_size', $data ?? [], null);
        $this->setIfExists('query_cache_limit', $data ?? [], null);
        $this->setIfExists('innodb_flush_log_at_trx_commit', $data ?? [], null);
        $this->setIfExists('transaction_isolation', $data ?? [], null);
        $this->setIfExists('long_query_time', $data ?? [], null);
        $this->setIfExists('tmp_table_size', $data ?? [], null);
        $this->setIfExists('table_open_cache', $data ?? [], null);
        $this->setIfExists('table_open_cache_instances', $data ?? [], null);
        $this->setIfExists('innodb_flush_method', $data ?? [], null);
        $this->setIfExists('innodb_strict_mode', $data ?? [], null);
        $this->setIfExists('slow_query_log', $data ?? [], null);
        $this->setIfExists('binlog_cache_size', $data ?? [], null);
        $this->setIfExists('binlog_group_commit_sync_delay', $data ?? [], null);
        $this->setIfExists('binlog_row_image', $data ?? [], null);
        $this->setIfExists('binlog_rows_query_log_events', $data ?? [], null);
        $this->setIfExists('character_set_server', $data ?? [], null);
        $this->setIfExists('explicit_defaults_for_timestamp', $data ?? [], null);
        $this->setIfExists('group_concat_max_len', $data ?? [], null);
        $this->setIfExists('innodb_adaptive_hash_index', $data ?? [], null);
        $this->setIfExists('innodb_lock_wait_timeout', $data ?? [], null);
        $this->setIfExists('innodb_numa_interleave', $data ?? [], null);
        $this->setIfExists('net_read_timeout', $data ?? [], null);
        $this->setIfExists('net_write_timeout', $data ?? [], null);
        $this->setIfExists('regexp_time_limit', $data ?? [], null);
        $this->setIfExists('sync_binlog', $data ?? [], null);
        $this->setIfExists('table_definition_cache', $data ?? [], null);
        $this->setIfExists('log_bin_trust_function_creators', $data ?? [], null);
        $this->setIfExists('skip_name_resolve', $data ?? [], null);
        $this->setIfExists('innodb_redo_log_capacity', $data ?? [], null);
        $this->setIfExists('wait_timeout', $data ?? [], null);
        $this->setIfExists('interactive_timeout', $data ?? [], null);
        $this->setIfExists('default_time_zone', $data ?? [], null);
        $this->setIfExists('pxc_strict_mode', $data ?? [], null);
        $this->setIfExists('autovacuum_analyze_scale_factor', $data ?? [], null);
        $this->setIfExists('autovacuum_max_workers', $data ?? [], null);
        $this->setIfExists('autovacuum_naptime', $data ?? [], null);
        $this->setIfExists('autovacuum_vacuum_insert_scale_factor', $data ?? [], null);
        $this->setIfExists('autovacuum_vacuum_scale_factor', $data ?? [], null);
        $this->setIfExists('autovacuum_work_mem', $data ?? [], null);
        $this->setIfExists('bgwriter_delay', $data ?? [], null);
        $this->setIfExists('bgwriter_lru_maxpages', $data ?? [], null);
        $this->setIfExists('deadlock_timeout', $data ?? [], null);
        $this->setIfExists('gin_pending_list_limit', $data ?? [], null);
        $this->setIfExists('idle_in_transaction_session_timeout', $data ?? [], null);
        $this->setIfExists('join_collapse_limit', $data ?? [], null);
        $this->setIfExists('lock_timeout', $data ?? [], null);
        $this->setIfExists('max_prepared_transactions', $data ?? [], null);
        $this->setIfExists('shared_buffers', $data ?? [], null);
        $this->setIfExists('log_min_duration_statement', $data ?? [], null);
        $this->setIfExists('wal_buffers', $data ?? [], null);
        $this->setIfExists('temp_buffers', $data ?? [], null);
        $this->setIfExists('work_mem', $data ?? [], null);
        $this->setIfExists('default_transaction_isolation', $data ?? [], null);
        $this->setIfExists('effective_cache_size', $data ?? [], null);
        $this->setIfExists('max_wal_size', $data ?? [], null);
        $this->setIfExists('min_wal_size', $data ?? [], null);
        $this->setIfExists('wal_level', $data ?? [], null);
        $this->setIfExists('max_replication_slots', $data ?? [], null);
        $this->setIfExists('max_wal_senders', $data ?? [], null);
        $this->setIfExists('max_worker_processes', $data ?? [], null);
        $this->setIfExists('max_logical_replication_workers', $data ?? [], null);
        $this->setIfExists('max_parallel_maintenance_workers', $data ?? [], null);
        $this->setIfExists('max_parallel_workers', $data ?? [], null);
        $this->setIfExists('max_parallel_workers_per_gather', $data ?? [], null);
        $this->setIfExists('array_nulls', $data ?? [], null);
        $this->setIfExists('backend_flush_after', $data ?? [], null);
        $this->setIfExists('backslash_quote', $data ?? [], null);
        $this->setIfExists('bgwriter_flush_after', $data ?? [], null);
        $this->setIfExists('bgwriter_lru_multiplier', $data ?? [], null);
        $this->setIfExists('default_transaction_read_only', $data ?? [], null);
        $this->setIfExists('enable_hashagg', $data ?? [], null);
        $this->setIfExists('enable_hashjoin', $data ?? [], null);
        $this->setIfExists('enable_incremental_sort', $data ?? [], null);
        $this->setIfExists('enable_indexscan', $data ?? [], null);
        $this->setIfExists('enable_indexonlyscan', $data ?? [], null);
        $this->setIfExists('enable_material', $data ?? [], null);
        $this->setIfExists('enable_memoize', $data ?? [], null);
        $this->setIfExists('enable_mergejoin', $data ?? [], null);
        $this->setIfExists('enable_parallel_append', $data ?? [], null);
        $this->setIfExists('enable_parallel_hash', $data ?? [], null);
        $this->setIfExists('enable_partition_pruning', $data ?? [], null);
        $this->setIfExists('enable_partitionwise_join', $data ?? [], null);
        $this->setIfExists('enable_partitionwise_aggregate', $data ?? [], null);
        $this->setIfExists('enable_seqscan', $data ?? [], null);
        $this->setIfExists('enable_sort', $data ?? [], null);
        $this->setIfExists('enable_tidscan', $data ?? [], null);
        $this->setIfExists('exit_on_error', $data ?? [], null);
        $this->setIfExists('from_collapse_limit', $data ?? [], null);
        $this->setIfExists('jit', $data ?? [], null);
        $this->setIfExists('plan_cache_mode', $data ?? [], null);
        $this->setIfExists('quote_all_identifiers', $data ?? [], null);
        $this->setIfExists('standard_conforming_strings', $data ?? [], null);
        $this->setIfExists('statement_timeout', $data ?? [], null);
        $this->setIfExists('timezone', $data ?? [], null);
        $this->setIfExists('transform_null_equals', $data ?? [], null);
        $this->setIfExists('max_locks_per_transaction', $data ?? [], null);
        $this->setIfExists('autovacuum_vacuum_cost_limit', $data ?? [], null);
        $this->setIfExists('checkpoint_timeout', $data ?? [], null);
        $this->setIfExists('checkpoint_completion_target', $data ?? [], null);
        $this->setIfExists('wal_compression', $data ?? [], null);
        $this->setIfExists('random_page_cost', $data ?? [], null);
        $this->setIfExists('effective_io_concurrency', $data ?? [], null);
        $this->setIfExists('log_lock_waits', $data ?? [], null);
        $this->setIfExists('log_temp_files', $data ?? [], null);
        $this->setIfExists('track_io_timing', $data ?? [], null);
        $this->setIfExists('maintenance_work_mem', $data ?? [], null);
        $this->setIfExists('idle_session_timeout', $data ?? [], null);
        $this->setIfExists('io_method', $data ?? [], null);
        $this->setIfExists('io_workers', $data ?? [], null);
        $this->setIfExists('client_output_buffer_limit_normal', $data ?? [], null);
        $this->setIfExists('notify_keyspace_events', $data ?? [], null);
        $this->setIfExists('client_output_buffer_limit_pubsub', $data ?? [], null);
        $this->setIfExists('databases', $data ?? [], null);
        $this->setIfExists('timeout', $data ?? [], null);
        $this->setIfExists('maxmemory_policy', $data ?? [], null);
        $this->setIfExists('slowlog_log_slower_than', $data ?? [], null);
        $this->setIfExists('slowlog_max_len', $data ?? [], null);
        $this->setIfExists('save', $data ?? [], null);
        $this->setIfExists('appendonly', $data ?? [], null);
        $this->setIfExists('appendfsync', $data ?? [], null);
        $this->setIfExists('tcp_keepalive', $data ?? [], null);
    }

    /**
    * Sets $this->container[$variableName] to the given data or to the given default Value; if $variableName
    * is nullable and its value is set to null in the $fields array, then mark it as "set to null" in the
    * $this->openAPINullablesSetToNull array
    *
    * @param string $variableName
    * @param array  $fields
    * @param mixed  $defaultValue
    */
    private function setIfExists(string $variableName, array $fields, $defaultValue): void
    {
        if (self::isNullable($variableName) && array_key_exists($variableName, $fields) && is_null($fields[$variableName])) {
            $this->openAPINullablesSetToNull[] = $variableName;
        }

        $this->container[$variableName] = $fields[$variableName] ?? $defaultValue;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets join_buffer_size
     *
     * @return string|null
     */
    public function getJoinBufferSize()
    {
        return $this->container['join_buffer_size'];
    }

    /**
     * Sets join_buffer_size
     *
     * @param string|null $join_buffer_size Размер буфера, используемого при соединениях таблиц без индексов (`mysql5` | `mysql` | `mysql8_4`).
     *
     * @return self
     */
    public function setJoinBufferSize($join_buffer_size)
    {
        if (is_null($join_buffer_size)) {
            throw new \InvalidArgumentException('non-nullable join_buffer_size cannot be null');
        }
        $this->container['join_buffer_size'] = $join_buffer_size;

        return $this;
    }

    /**
     * Gets max_connections
     *
     * @return string|null
     */
    public function getMaxConnections()
    {
        return $this->container['max_connections'];
    }

    /**
     * Sets max_connections
     *
     * @param string|null $max_connections Максимальное количество одновременных подключений к серверу (`mysql5` | `mysql` | `mysql8_4` | `postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setMaxConnections($max_connections)
    {
        if (is_null($max_connections)) {
            throw new \InvalidArgumentException('non-nullable max_connections cannot be null');
        }
        $this->container['max_connections'] = $max_connections;

        return $this;
    }

    /**
     * Gets sort_buffer_size
     *
     * @return string|null
     */
    public function getSortBufferSize()
    {
        return $this->container['sort_buffer_size'];
    }

    /**
     * Sets sort_buffer_size
     *
     * @param string|null $sort_buffer_size Размер буфера сортировки для операций ORDER BY и GROUP BY (`mysql5` | `mysql` | `mysql8_4`).
     *
     * @return self
     */
    public function setSortBufferSize($sort_buffer_size)
    {
        if (is_null($sort_buffer_size)) {
            throw new \InvalidArgumentException('non-nullable sort_buffer_size cannot be null');
        }
        $this->container['sort_buffer_size'] = $sort_buffer_size;

        return $this;
    }

    /**
     * Gets thread_cache_size
     *
     * @return string|null
     */
    public function getThreadCacheSize()
    {
        return $this->container['thread_cache_size'];
    }

    /**
     * Sets thread_cache_size
     *
     * @param string|null $thread_cache_size Количество потоков, которые сервер сохраняет для повторного использования (`mysql5` | `mysql` | `mysql8_4`).
     *
     * @return self
     */
    public function setThreadCacheSize($thread_cache_size)
    {
        if (is_null($thread_cache_size)) {
            throw new \InvalidArgumentException('non-nullable thread_cache_size cannot be null');
        }
        $this->container['thread_cache_size'] = $thread_cache_size;

        return $this;
    }

    /**
     * Gets innodb_buffer_pool_size
     *
     * @return string|null
     */
    public function getInnodbBufferPoolSize()
    {
        return $this->container['innodb_buffer_pool_size'];
    }

    /**
     * Sets innodb_buffer_pool_size
     *
     * @param string|null $innodb_buffer_pool_size Размер буферного пула InnoDB для хранения данных и индексов в памяти (`mysql5` | `mysql` | `mysql8_4`).
     *
     * @return self
     */
    public function setInnodbBufferPoolSize($innodb_buffer_pool_size)
    {
        if (is_null($innodb_buffer_pool_size)) {
            throw new \InvalidArgumentException('non-nullable innodb_buffer_pool_size cannot be null');
        }
        $this->container['innodb_buffer_pool_size'] = $innodb_buffer_pool_size;

        return $this;
    }

    /**
     * Gets auto_increment_increment
     *
     * @return string|null
     */
    public function getAutoIncrementIncrement()
    {
        return $this->container['auto_increment_increment'];
    }

    /**
     * Sets auto_increment_increment
     *
     * @param string|null $auto_increment_increment Интервал между значениями столбцов с атрибутом `AUTO_INCREMENT` (`mysql5` | `mysql` | `mysql8_4`).
     *
     * @return self
     */
    public function setAutoIncrementIncrement($auto_increment_increment)
    {
        if (is_null($auto_increment_increment)) {
            throw new \InvalidArgumentException('non-nullable auto_increment_increment cannot be null');
        }
        $this->container['auto_increment_increment'] = $auto_increment_increment;

        return $this;
    }

    /**
     * Gets auto_increment_offset
     *
     * @return string|null
     */
    public function getAutoIncrementOffset()
    {
        return $this->container['auto_increment_offset'];
    }

    /**
     * Sets auto_increment_offset
     *
     * @param string|null $auto_increment_offset Начальное значение для столбцов с атрибутом `AUTO_INCREMENT` (`mysql5` | `mysql` | `mysql8_4`).
     *
     * @return self
     */
    public function setAutoIncrementOffset($auto_increment_offset)
    {
        if (is_null($auto_increment_offset)) {
            throw new \InvalidArgumentException('non-nullable auto_increment_offset cannot be null');
        }
        $this->container['auto_increment_offset'] = $auto_increment_offset;

        return $this;
    }

    /**
     * Gets innodb_io_capacity
     *
     * @return string|null
     */
    public function getInnodbIoCapacity()
    {
        return $this->container['innodb_io_capacity'];
    }

    /**
     * Sets innodb_io_capacity
     *
     * @param string|null $innodb_io_capacity Количество операций ввода-вывода в секунду `IOPS`, используемых InnoDB (`mysql5` | `mysql` | `mysql8_4`).
     *
     * @return self
     */
    public function setInnodbIoCapacity($innodb_io_capacity)
    {
        if (is_null($innodb_io_capacity)) {
            throw new \InvalidArgumentException('non-nullable innodb_io_capacity cannot be null');
        }
        $this->container['innodb_io_capacity'] = $innodb_io_capacity;

        return $this;
    }

    /**
     * Gets innodb_purge_threads
     *
     * @return string|null
     */
    public function getInnodbPurgeThreads()
    {
        return $this->container['innodb_purge_threads'];
    }

    /**
     * Sets innodb_purge_threads
     *
     * @param string|null $innodb_purge_threads Количество потоков, используемых для фоновой очистки undo-записей InnoDB (`mysql5` | `mysql` | `mysql8_4`).
     *
     * @return self
     */
    public function setInnodbPurgeThreads($innodb_purge_threads)
    {
        if (is_null($innodb_purge_threads)) {
            throw new \InvalidArgumentException('non-nullable innodb_purge_threads cannot be null');
        }
        $this->container['innodb_purge_threads'] = $innodb_purge_threads;

        return $this;
    }

    /**
     * Gets innodb_read_io_threads
     *
     * @return string|null
     */
    public function getInnodbReadIoThreads()
    {
        return $this->container['innodb_read_io_threads'];
    }

    /**
     * Sets innodb_read_io_threads
     *
     * @param string|null $innodb_read_io_threads Количество потоков ввода-вывода для операций чтения InnoDB (`mysql5` | `mysql` | `mysql8_4`).
     *
     * @return self
     */
    public function setInnodbReadIoThreads($innodb_read_io_threads)
    {
        if (is_null($innodb_read_io_threads)) {
            throw new \InvalidArgumentException('non-nullable innodb_read_io_threads cannot be null');
        }
        $this->container['innodb_read_io_threads'] = $innodb_read_io_threads;

        return $this;
    }

    /**
     * Gets innodb_thread_concurrency
     *
     * @return string|null
     */
    public function getInnodbThreadConcurrency()
    {
        return $this->container['innodb_thread_concurrency'];
    }

    /**
     * Sets innodb_thread_concurrency
     *
     * @param string|null $innodb_thread_concurrency Ограничение количества одновременно выполняющихся потоков InnoDB (`mysql5` | `mysql` | `mysql8_4`).
     *
     * @return self
     */
    public function setInnodbThreadConcurrency($innodb_thread_concurrency)
    {
        if (is_null($innodb_thread_concurrency)) {
            throw new \InvalidArgumentException('non-nullable innodb_thread_concurrency cannot be null');
        }
        $this->container['innodb_thread_concurrency'] = $innodb_thread_concurrency;

        return $this;
    }

    /**
     * Gets innodb_write_io_threads
     *
     * @return string|null
     */
    public function getInnodbWriteIoThreads()
    {
        return $this->container['innodb_write_io_threads'];
    }

    /**
     * Sets innodb_write_io_threads
     *
     * @param string|null $innodb_write_io_threads Количество потоков ввода-вывода для операций записи InnoDB (`mysql5` | `mysql` | `mysql8_4`).
     *
     * @return self
     */
    public function setInnodbWriteIoThreads($innodb_write_io_threads)
    {
        if (is_null($innodb_write_io_threads)) {
            throw new \InvalidArgumentException('non-nullable innodb_write_io_threads cannot be null');
        }
        $this->container['innodb_write_io_threads'] = $innodb_write_io_threads;

        return $this;
    }

    /**
     * Gets innodb_log_file_size
     *
     * @return string|null
     */
    public function getInnodbLogFileSize()
    {
        return $this->container['innodb_log_file_size'];
    }

    /**
     * Sets innodb_log_file_size
     *
     * @param string|null $innodb_log_file_size Размер файла журнала транзакций InnoDB redo log (`mysql5` | `mysql` | `mysql8_4`).
     *
     * @return self
     */
    public function setInnodbLogFileSize($innodb_log_file_size)
    {
        if (is_null($innodb_log_file_size)) {
            throw new \InvalidArgumentException('non-nullable innodb_log_file_size cannot be null');
        }
        $this->container['innodb_log_file_size'] = $innodb_log_file_size;

        return $this;
    }

    /**
     * Gets max_allowed_packet
     *
     * @return string|null
     */
    public function getMaxAllowedPacket()
    {
        return $this->container['max_allowed_packet'];
    }

    /**
     * Sets max_allowed_packet
     *
     * @param string|null $max_allowed_packet Максимальный размер пакета данных, который может передаваться между клиентом и сервером (`mysql5` | `mysql` | `mysql8_4`).
     *
     * @return self
     */
    public function setMaxAllowedPacket($max_allowed_packet)
    {
        if (is_null($max_allowed_packet)) {
            throw new \InvalidArgumentException('non-nullable max_allowed_packet cannot be null');
        }
        $this->container['max_allowed_packet'] = $max_allowed_packet;

        return $this;
    }

    /**
     * Gets max_heap_table_size
     *
     * @return string|null
     */
    public function getMaxHeapTableSize()
    {
        return $this->container['max_heap_table_size'];
    }

    /**
     * Sets max_heap_table_size
     *
     * @param string|null $max_heap_table_size Максимальный размер таблиц типа MEMORY (`mysql5` | `mysql` | `mysql8_4`).
     *
     * @return self
     */
    public function setMaxHeapTableSize($max_heap_table_size)
    {
        if (is_null($max_heap_table_size)) {
            throw new \InvalidArgumentException('non-nullable max_heap_table_size cannot be null');
        }
        $this->container['max_heap_table_size'] = $max_heap_table_size;

        return $this;
    }

    /**
     * Gets sql_mode
     *
     * @return string|null
     */
    public function getSqlMode()
    {
        return $this->container['sql_mode'];
    }

    /**
     * Sets sql_mode
     *
     * @param string|null $sql_mode Режим работы SQL сервера, определяющий поведение обработки запросов (`mysql5` | `mysql` | `mysql8_4`).
     *
     * @return self
     */
    public function setSqlMode($sql_mode)
    {
        if (is_null($sql_mode)) {
            throw new \InvalidArgumentException('non-nullable sql_mode cannot be null');
        }
        $this->container['sql_mode'] = $sql_mode;

        return $this;
    }

    /**
     * Gets query_cache_type
     *
     * @return string|null
     */
    public function getQueryCacheType()
    {
        return $this->container['query_cache_type'];
    }

    /**
     * Sets query_cache_type
     *
     * @param string|null $query_cache_type Тип кэша запросов (`mysql5`).
     *
     * @return self
     */
    public function setQueryCacheType($query_cache_type)
    {
        if (is_null($query_cache_type)) {
            throw new \InvalidArgumentException('non-nullable query_cache_type cannot be null');
        }
        $this->container['query_cache_type'] = $query_cache_type;

        return $this;
    }

    /**
     * Gets query_cache_size
     *
     * @return string|null
     */
    public function getQueryCacheSize()
    {
        return $this->container['query_cache_size'];
    }

    /**
     * Sets query_cache_size
     *
     * @param string|null $query_cache_size Объем памяти, выделяемый для кэширования результатов запросов (`mysql5`).
     *
     * @return self
     */
    public function setQueryCacheSize($query_cache_size)
    {
        if (is_null($query_cache_size)) {
            throw new \InvalidArgumentException('non-nullable query_cache_size cannot be null');
        }
        $this->container['query_cache_size'] = $query_cache_size;

        return $this;
    }

    /**
     * Gets query_cache_limit
     *
     * @return string|null
     */
    public function getQueryCacheLimit()
    {
        return $this->container['query_cache_limit'];
    }

    /**
     * Sets query_cache_limit
     *
     * @param string|null $query_cache_limit Максимальный размер результата запроса, который может быть закэширован (`mysql5`).
     *
     * @return self
     */
    public function setQueryCacheLimit($query_cache_limit)
    {
        if (is_null($query_cache_limit)) {
            throw new \InvalidArgumentException('non-nullable query_cache_limit cannot be null');
        }
        $this->container['query_cache_limit'] = $query_cache_limit;

        return $this;
    }

    /**
     * Gets innodb_flush_log_at_trx_commit
     *
     * @return string|null
     */
    public function getInnodbFlushLogAtTrxCommit()
    {
        return $this->container['innodb_flush_log_at_trx_commit'];
    }

    /**
     * Sets innodb_flush_log_at_trx_commit
     *
     * @param string|null $innodb_flush_log_at_trx_commit Режим записи журнала InnoDB при фиксации транзакций (`mysql5` | `mysql` | `mysql8_4`).
     *
     * @return self
     */
    public function setInnodbFlushLogAtTrxCommit($innodb_flush_log_at_trx_commit)
    {
        if (is_null($innodb_flush_log_at_trx_commit)) {
            throw new \InvalidArgumentException('non-nullable innodb_flush_log_at_trx_commit cannot be null');
        }
        $this->container['innodb_flush_log_at_trx_commit'] = $innodb_flush_log_at_trx_commit;

        return $this;
    }

    /**
     * Gets transaction_isolation
     *
     * @return string|null
     */
    public function getTransactionIsolation()
    {
        return $this->container['transaction_isolation'];
    }

    /**
     * Sets transaction_isolation
     *
     * @param string|null $transaction_isolation Уровень изоляции транзакций по умолчанию (`mysql5` | `mysql` | `mysql8_4`).
     *
     * @return self
     */
    public function setTransactionIsolation($transaction_isolation)
    {
        if (is_null($transaction_isolation)) {
            throw new \InvalidArgumentException('non-nullable transaction_isolation cannot be null');
        }
        $this->container['transaction_isolation'] = $transaction_isolation;

        return $this;
    }

    /**
     * Gets long_query_time
     *
     * @return string|null
     */
    public function getLongQueryTime()
    {
        return $this->container['long_query_time'];
    }

    /**
     * Sets long_query_time
     *
     * @param string|null $long_query_time Время выполнения запроса, после которого он считается долгим и может попасть в slow query log (`mysql5` | `mysql` | `mysql8_4`).
     *
     * @return self
     */
    public function setLongQueryTime($long_query_time)
    {
        if (is_null($long_query_time)) {
            throw new \InvalidArgumentException('non-nullable long_query_time cannot be null');
        }
        $this->container['long_query_time'] = $long_query_time;

        return $this;
    }

    /**
     * Gets tmp_table_size
     *
     * @return string|null
     */
    public function getTmpTableSize()
    {
        return $this->container['tmp_table_size'];
    }

    /**
     * Sets tmp_table_size
     *
     * @param string|null $tmp_table_size Максимальный размер временных таблиц в памяти (`mysql5` | `mysql` | `mysql8_4`).
     *
     * @return self
     */
    public function setTmpTableSize($tmp_table_size)
    {
        if (is_null($tmp_table_size)) {
            throw new \InvalidArgumentException('non-nullable tmp_table_size cannot be null');
        }
        $this->container['tmp_table_size'] = $tmp_table_size;

        return $this;
    }

    /**
     * Gets table_open_cache
     *
     * @return string|null
     */
    public function getTableOpenCache()
    {
        return $this->container['table_open_cache'];
    }

    /**
     * Sets table_open_cache
     *
     * @param string|null $table_open_cache Количество открытых таблиц, которые сервер может хранить в кэше (`mysql5` | `mysql` | `mysql8_4`).
     *
     * @return self
     */
    public function setTableOpenCache($table_open_cache)
    {
        if (is_null($table_open_cache)) {
            throw new \InvalidArgumentException('non-nullable table_open_cache cannot be null');
        }
        $this->container['table_open_cache'] = $table_open_cache;

        return $this;
    }

    /**
     * Gets table_open_cache_instances
     *
     * @return string|null
     */
    public function getTableOpenCacheInstances()
    {
        return $this->container['table_open_cache_instances'];
    }

    /**
     * Sets table_open_cache_instances
     *
     * @param string|null $table_open_cache_instances Количество экземпляров кэша открытых таблиц для снижения конкуренции между потоками (`mysql5` | `mysql` | `mysql8_4`).
     *
     * @return self
     */
    public function setTableOpenCacheInstances($table_open_cache_instances)
    {
        if (is_null($table_open_cache_instances)) {
            throw new \InvalidArgumentException('non-nullable table_open_cache_instances cannot be null');
        }
        $this->container['table_open_cache_instances'] = $table_open_cache_instances;

        return $this;
    }

    /**
     * Gets innodb_flush_method
     *
     * @return string|null
     */
    public function getInnodbFlushMethod()
    {
        return $this->container['innodb_flush_method'];
    }

    /**
     * Sets innodb_flush_method
     *
     * @param string|null $innodb_flush_method Метод выполнения операций записи и синхронизации файлов InnoDB (`mysql5` | `mysql` | `mysql8_4`).
     *
     * @return self
     */
    public function setInnodbFlushMethod($innodb_flush_method)
    {
        if (is_null($innodb_flush_method)) {
            throw new \InvalidArgumentException('non-nullable innodb_flush_method cannot be null');
        }
        $this->container['innodb_flush_method'] = $innodb_flush_method;

        return $this;
    }

    /**
     * Gets innodb_strict_mode
     *
     * @return string|null
     */
    public function getInnodbStrictMode()
    {
        return $this->container['innodb_strict_mode'];
    }

    /**
     * Sets innodb_strict_mode
     *
     * @param string|null $innodb_strict_mode Включение строгой проверки операций InnoDB (`mysql5` | `mysql` | `mysql8_4`).
     *
     * @return self
     */
    public function setInnodbStrictMode($innodb_strict_mode)
    {
        if (is_null($innodb_strict_mode)) {
            throw new \InvalidArgumentException('non-nullable innodb_strict_mode cannot be null');
        }
        $this->container['innodb_strict_mode'] = $innodb_strict_mode;

        return $this;
    }

    /**
     * Gets slow_query_log
     *
     * @return string|null
     */
    public function getSlowQueryLog()
    {
        return $this->container['slow_query_log'];
    }

    /**
     * Sets slow_query_log
     *
     * @param string|null $slow_query_log Включение журнала медленных запросов (`mysql5` | `mysql` | `mysql8_4`).
     *
     * @return self
     */
    public function setSlowQueryLog($slow_query_log)
    {
        if (is_null($slow_query_log)) {
            throw new \InvalidArgumentException('non-nullable slow_query_log cannot be null');
        }
        $this->container['slow_query_log'] = $slow_query_log;

        return $this;
    }

    /**
     * Gets binlog_cache_size
     *
     * @return string|null
     */
    public function getBinlogCacheSize()
    {
        return $this->container['binlog_cache_size'];
    }

    /**
     * Sets binlog_cache_size
     *
     * @param string|null $binlog_cache_size Размер кэша бинарного журнала для транзакций (`mysql5` | `mysql` | `mysql8_4`).
     *
     * @return self
     */
    public function setBinlogCacheSize($binlog_cache_size)
    {
        if (is_null($binlog_cache_size)) {
            throw new \InvalidArgumentException('non-nullable binlog_cache_size cannot be null');
        }
        $this->container['binlog_cache_size'] = $binlog_cache_size;

        return $this;
    }

    /**
     * Gets binlog_group_commit_sync_delay
     *
     * @return string|null
     */
    public function getBinlogGroupCommitSyncDelay()
    {
        return $this->container['binlog_group_commit_sync_delay'];
    }

    /**
     * Sets binlog_group_commit_sync_delay
     *
     * @param string|null $binlog_group_commit_sync_delay Задержка синхронизации групповой фиксации бинарного журнала в микросекундах (`mysql5` | `mysql` | `mysql8_4`).
     *
     * @return self
     */
    public function setBinlogGroupCommitSyncDelay($binlog_group_commit_sync_delay)
    {
        if (is_null($binlog_group_commit_sync_delay)) {
            throw new \InvalidArgumentException('non-nullable binlog_group_commit_sync_delay cannot be null');
        }
        $this->container['binlog_group_commit_sync_delay'] = $binlog_group_commit_sync_delay;

        return $this;
    }

    /**
     * Gets binlog_row_image
     *
     * @return string|null
     */
    public function getBinlogRowImage()
    {
        return $this->container['binlog_row_image'];
    }

    /**
     * Sets binlog_row_image
     *
     * @param string|null $binlog_row_image Количество информации, записываемой в бинарный журнал при row-based репликации (`mysql5` | `mysql` | `mysql8_4`).
     *
     * @return self
     */
    public function setBinlogRowImage($binlog_row_image)
    {
        if (is_null($binlog_row_image)) {
            throw new \InvalidArgumentException('non-nullable binlog_row_image cannot be null');
        }
        $this->container['binlog_row_image'] = $binlog_row_image;

        return $this;
    }

    /**
     * Gets binlog_rows_query_log_events
     *
     * @return string|null
     */
    public function getBinlogRowsQueryLogEvents()
    {
        return $this->container['binlog_rows_query_log_events'];
    }

    /**
     * Sets binlog_rows_query_log_events
     *
     * @param string|null $binlog_rows_query_log_events Включение записи SQL-запросов в бинарный журнал при row-based репликации (`mysql5` | `mysql` | `mysql8_4`).
     *
     * @return self
     */
    public function setBinlogRowsQueryLogEvents($binlog_rows_query_log_events)
    {
        if (is_null($binlog_rows_query_log_events)) {
            throw new \InvalidArgumentException('non-nullable binlog_rows_query_log_events cannot be null');
        }
        $this->container['binlog_rows_query_log_events'] = $binlog_rows_query_log_events;

        return $this;
    }

    /**
     * Gets character_set_server
     *
     * @return string|null
     */
    public function getCharacterSetServer()
    {
        return $this->container['character_set_server'];
    }

    /**
     * Sets character_set_server
     *
     * @param string|null $character_set_server Кодировка по умолчанию для сервера MySQL (`mysql5` | `mysql` | `mysql8_4`).
     *
     * @return self
     */
    public function setCharacterSetServer($character_set_server)
    {
        if (is_null($character_set_server)) {
            throw new \InvalidArgumentException('non-nullable character_set_server cannot be null');
        }
        $this->container['character_set_server'] = $character_set_server;

        return $this;
    }

    /**
     * Gets explicit_defaults_for_timestamp
     *
     * @return string|null
     */
    public function getExplicitDefaultsForTimestamp()
    {
        return $this->container['explicit_defaults_for_timestamp'];
    }

    /**
     * Sets explicit_defaults_for_timestamp
     *
     * @param string|null $explicit_defaults_for_timestamp Определяет автоматическое поведение TIMESTAMP без явных значений по умолчанию (`mysql5` | `mysql` | `mysql8_4`).
     *
     * @return self
     */
    public function setExplicitDefaultsForTimestamp($explicit_defaults_for_timestamp)
    {
        if (is_null($explicit_defaults_for_timestamp)) {
            throw new \InvalidArgumentException('non-nullable explicit_defaults_for_timestamp cannot be null');
        }
        $this->container['explicit_defaults_for_timestamp'] = $explicit_defaults_for_timestamp;

        return $this;
    }

    /**
     * Gets group_concat_max_len
     *
     * @return string|null
     */
    public function getGroupConcatMaxLen()
    {
        return $this->container['group_concat_max_len'];
    }

    /**
     * Sets group_concat_max_len
     *
     * @param string|null $group_concat_max_len Максимальная длина результата функции GROUP_CONCAT (`mysql5` | `mysql` | `mysql8_4`).
     *
     * @return self
     */
    public function setGroupConcatMaxLen($group_concat_max_len)
    {
        if (is_null($group_concat_max_len)) {
            throw new \InvalidArgumentException('non-nullable group_concat_max_len cannot be null');
        }
        $this->container['group_concat_max_len'] = $group_concat_max_len;

        return $this;
    }

    /**
     * Gets innodb_adaptive_hash_index
     *
     * @return string|null
     */
    public function getInnodbAdaptiveHashIndex()
    {
        return $this->container['innodb_adaptive_hash_index'];
    }

    /**
     * Sets innodb_adaptive_hash_index
     *
     * @param string|null $innodb_adaptive_hash_index Включение или отключение адаптивного хэш-индекса InnoDB для ускорения поиска по индексам (`mysql5` | `mysql` | `mysql8_4`).
     *
     * @return self
     */
    public function setInnodbAdaptiveHashIndex($innodb_adaptive_hash_index)
    {
        if (is_null($innodb_adaptive_hash_index)) {
            throw new \InvalidArgumentException('non-nullable innodb_adaptive_hash_index cannot be null');
        }
        $this->container['innodb_adaptive_hash_index'] = $innodb_adaptive_hash_index;

        return $this;
    }

    /**
     * Gets innodb_lock_wait_timeout
     *
     * @return string|null
     */
    public function getInnodbLockWaitTimeout()
    {
        return $this->container['innodb_lock_wait_timeout'];
    }

    /**
     * Sets innodb_lock_wait_timeout
     *
     * @param string|null $innodb_lock_wait_timeout Время ожидания блокировки InnoDB перед завершением транзакции с ошибкой (`mysql5` | `mysql` | `mysql8_4`).
     *
     * @return self
     */
    public function setInnodbLockWaitTimeout($innodb_lock_wait_timeout)
    {
        if (is_null($innodb_lock_wait_timeout)) {
            throw new \InvalidArgumentException('non-nullable innodb_lock_wait_timeout cannot be null');
        }
        $this->container['innodb_lock_wait_timeout'] = $innodb_lock_wait_timeout;

        return $this;
    }

    /**
     * Gets innodb_numa_interleave
     *
     * @return string|null
     */
    public function getInnodbNumaInterleave()
    {
        return $this->container['innodb_numa_interleave'];
    }

    /**
     * Sets innodb_numa_interleave
     *
     * @param string|null $innodb_numa_interleave Включение распределения памяти InnoDB между NUMA-узлами (`mysql5` | `mysql` | `mysql8_4`).
     *
     * @return self
     */
    public function setInnodbNumaInterleave($innodb_numa_interleave)
    {
        if (is_null($innodb_numa_interleave)) {
            throw new \InvalidArgumentException('non-nullable innodb_numa_interleave cannot be null');
        }
        $this->container['innodb_numa_interleave'] = $innodb_numa_interleave;

        return $this;
    }

    /**
     * Gets net_read_timeout
     *
     * @return string|null
     */
    public function getNetReadTimeout()
    {
        return $this->container['net_read_timeout'];
    }

    /**
     * Sets net_read_timeout
     *
     * @param string|null $net_read_timeout Время ожидания данных от клиента при чтении сетевого соединения (`mysql5` | `mysql` | `mysql8_4`).
     *
     * @return self
     */
    public function setNetReadTimeout($net_read_timeout)
    {
        if (is_null($net_read_timeout)) {
            throw new \InvalidArgumentException('non-nullable net_read_timeout cannot be null');
        }
        $this->container['net_read_timeout'] = $net_read_timeout;

        return $this;
    }

    /**
     * Gets net_write_timeout
     *
     * @return string|null
     */
    public function getNetWriteTimeout()
    {
        return $this->container['net_write_timeout'];
    }

    /**
     * Sets net_write_timeout
     *
     * @param string|null $net_write_timeout Время ожидания записи данных клиенту через сетевое соединение (`mysql5` | `mysql` | `mysql8_4`).
     *
     * @return self
     */
    public function setNetWriteTimeout($net_write_timeout)
    {
        if (is_null($net_write_timeout)) {
            throw new \InvalidArgumentException('non-nullable net_write_timeout cannot be null');
        }
        $this->container['net_write_timeout'] = $net_write_timeout;

        return $this;
    }

    /**
     * Gets regexp_time_limit
     *
     * @return string|null
     */
    public function getRegexpTimeLimit()
    {
        return $this->container['regexp_time_limit'];
    }

    /**
     * Sets regexp_time_limit
     *
     * @param string|null $regexp_time_limit Максимальное время выполнения регулярных выражений (`mysql` | `mysql8_4`).
     *
     * @return self
     */
    public function setRegexpTimeLimit($regexp_time_limit)
    {
        if (is_null($regexp_time_limit)) {
            throw new \InvalidArgumentException('non-nullable regexp_time_limit cannot be null');
        }
        $this->container['regexp_time_limit'] = $regexp_time_limit;

        return $this;
    }

    /**
     * Gets sync_binlog
     *
     * @return string|null
     */
    public function getSyncBinlog()
    {
        return $this->container['sync_binlog'];
    }

    /**
     * Sets sync_binlog
     *
     * @param string|null $sync_binlog Количество операций записи бинарного журнала перед принудительной синхронизацией на диск (`mysql5` | `mysql` | `mysql8_4`).
     *
     * @return self
     */
    public function setSyncBinlog($sync_binlog)
    {
        if (is_null($sync_binlog)) {
            throw new \InvalidArgumentException('non-nullable sync_binlog cannot be null');
        }
        $this->container['sync_binlog'] = $sync_binlog;

        return $this;
    }

    /**
     * Gets table_definition_cache
     *
     * @return string|null
     */
    public function getTableDefinitionCache()
    {
        return $this->container['table_definition_cache'];
    }

    /**
     * Sets table_definition_cache
     *
     * @param string|null $table_definition_cache Количество определений таблиц, хранящихся в кэше (`mysql5` | `mysql` | `mysql8_4`).
     *
     * @return self
     */
    public function setTableDefinitionCache($table_definition_cache)
    {
        if (is_null($table_definition_cache)) {
            throw new \InvalidArgumentException('non-nullable table_definition_cache cannot be null');
        }
        $this->container['table_definition_cache'] = $table_definition_cache;

        return $this;
    }

    /**
     * Gets log_bin_trust_function_creators
     *
     * @return string|null
     */
    public function getLogBinTrustFunctionCreators()
    {
        return $this->container['log_bin_trust_function_creators'];
    }

    /**
     * Sets log_bin_trust_function_creators
     *
     * @param string|null $log_bin_trust_function_creators Разрешение создания хранимых функций без проверки бинарной регистрации (`mysql5` | `mysql` | `mysql8_4`).
     *
     * @return self
     */
    public function setLogBinTrustFunctionCreators($log_bin_trust_function_creators)
    {
        if (is_null($log_bin_trust_function_creators)) {
            throw new \InvalidArgumentException('non-nullable log_bin_trust_function_creators cannot be null');
        }
        $this->container['log_bin_trust_function_creators'] = $log_bin_trust_function_creators;

        return $this;
    }

    /**
     * Gets skip_name_resolve
     *
     * @return string|null
     */
    public function getSkipNameResolve()
    {
        return $this->container['skip_name_resolve'];
    }

    /**
     * Sets skip_name_resolve
     *
     * @param string|null $skip_name_resolve Отключение DNS-разрешения имен клиентов при подключении к серверу (`mysql5` | `mysql` | `mysql8_4`).
     *
     * @return self
     */
    public function setSkipNameResolve($skip_name_resolve)
    {
        if (is_null($skip_name_resolve)) {
            throw new \InvalidArgumentException('non-nullable skip_name_resolve cannot be null');
        }
        $this->container['skip_name_resolve'] = $skip_name_resolve;

        return $this;
    }

    /**
     * Gets innodb_redo_log_capacity
     *
     * @return string|null
     */
    public function getInnodbRedoLogCapacity()
    {
        return $this->container['innodb_redo_log_capacity'];
    }

    /**
     * Sets innodb_redo_log_capacity
     *
     * @param string|null $innodb_redo_log_capacity Общий размер redo log InnoDB для хранения журнала восстановления (`mysql8_4`).
     *
     * @return self
     */
    public function setInnodbRedoLogCapacity($innodb_redo_log_capacity)
    {
        if (is_null($innodb_redo_log_capacity)) {
            throw new \InvalidArgumentException('non-nullable innodb_redo_log_capacity cannot be null');
        }
        $this->container['innodb_redo_log_capacity'] = $innodb_redo_log_capacity;

        return $this;
    }

    /**
     * Gets wait_timeout
     *
     * @return string|null
     */
    public function getWaitTimeout()
    {
        return $this->container['wait_timeout'];
    }

    /**
     * Sets wait_timeout
     *
     * @param string|null $wait_timeout Время ожидания неактивного клиентского соединения перед закрытием (`mysql5` | `mysql` | `mysql8_4`).
     *
     * @return self
     */
    public function setWaitTimeout($wait_timeout)
    {
        if (is_null($wait_timeout)) {
            throw new \InvalidArgumentException('non-nullable wait_timeout cannot be null');
        }
        $this->container['wait_timeout'] = $wait_timeout;

        return $this;
    }

    /**
     * Gets interactive_timeout
     *
     * @return string|null
     */
    public function getInteractiveTimeout()
    {
        return $this->container['interactive_timeout'];
    }

    /**
     * Sets interactive_timeout
     *
     * @param string|null $interactive_timeout Время ожидания неактивного интерактивного соединения перед закрытием (`mysql5` | `mysql` | `mysql8_4`).
     *
     * @return self
     */
    public function setInteractiveTimeout($interactive_timeout)
    {
        if (is_null($interactive_timeout)) {
            throw new \InvalidArgumentException('non-nullable interactive_timeout cannot be null');
        }
        $this->container['interactive_timeout'] = $interactive_timeout;

        return $this;
    }

    /**
     * Gets default_time_zone
     *
     * @return string|null
     */
    public function getDefaultTimeZone()
    {
        return $this->container['default_time_zone'];
    }

    /**
     * Sets default_time_zone
     *
     * @param string|null $default_time_zone Часовой пояс сервера MySQL по умолчанию (`mysql5` | `mysql` | `mysql8_4`).
     *
     * @return self
     */
    public function setDefaultTimeZone($default_time_zone)
    {
        if (is_null($default_time_zone)) {
            throw new \InvalidArgumentException('non-nullable default_time_zone cannot be null');
        }
        $this->container['default_time_zone'] = $default_time_zone;

        return $this;
    }

    /**
     * Gets pxc_strict_mode
     *
     * @return string|null
     */
    public function getPxcStrictMode()
    {
        return $this->container['pxc_strict_mode'];
    }

    /**
     * Sets pxc_strict_mode
     *
     * @param string|null $pxc_strict_mode Режим строгой проверки операций в Percona XtraDB Cluster (`mysql5` | `mysql` | `mysql8_4`).
     *
     * @return self
     */
    public function setPxcStrictMode($pxc_strict_mode)
    {
        if (is_null($pxc_strict_mode)) {
            throw new \InvalidArgumentException('non-nullable pxc_strict_mode cannot be null');
        }
        $this->container['pxc_strict_mode'] = $pxc_strict_mode;

        return $this;
    }

    /**
     * Gets autovacuum_analyze_scale_factor
     *
     * @return string|null
     */
    public function getAutovacuumAnalyzeScaleFactor()
    {
        return $this->container['autovacuum_analyze_scale_factor'];
    }

    /**
     * Sets autovacuum_analyze_scale_factor
     *
     * @param string|null $autovacuum_analyze_scale_factor Доля изменения строк таблицы перед запуском автоматического анализа (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setAutovacuumAnalyzeScaleFactor($autovacuum_analyze_scale_factor)
    {
        if (is_null($autovacuum_analyze_scale_factor)) {
            throw new \InvalidArgumentException('non-nullable autovacuum_analyze_scale_factor cannot be null');
        }
        $this->container['autovacuum_analyze_scale_factor'] = $autovacuum_analyze_scale_factor;

        return $this;
    }

    /**
     * Gets autovacuum_max_workers
     *
     * @return string|null
     */
    public function getAutovacuumMaxWorkers()
    {
        return $this->container['autovacuum_max_workers'];
    }

    /**
     * Sets autovacuum_max_workers
     *
     * @param string|null $autovacuum_max_workers Максимальное количество процессов autovacuum, которые могут работать одновременно (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setAutovacuumMaxWorkers($autovacuum_max_workers)
    {
        if (is_null($autovacuum_max_workers)) {
            throw new \InvalidArgumentException('non-nullable autovacuum_max_workers cannot be null');
        }
        $this->container['autovacuum_max_workers'] = $autovacuum_max_workers;

        return $this;
    }

    /**
     * Gets autovacuum_naptime
     *
     * @return string|null
     */
    public function getAutovacuumNaptime()
    {
        return $this->container['autovacuum_naptime'];
    }

    /**
     * Sets autovacuum_naptime
     *
     * @param string|null $autovacuum_naptime Интервал между запусками процессов autovacuum (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setAutovacuumNaptime($autovacuum_naptime)
    {
        if (is_null($autovacuum_naptime)) {
            throw new \InvalidArgumentException('non-nullable autovacuum_naptime cannot be null');
        }
        $this->container['autovacuum_naptime'] = $autovacuum_naptime;

        return $this;
    }

    /**
     * Gets autovacuum_vacuum_insert_scale_factor
     *
     * @return string|null
     */
    public function getAutovacuumVacuumInsertScaleFactor()
    {
        return $this->container['autovacuum_vacuum_insert_scale_factor'];
    }

    /**
     * Sets autovacuum_vacuum_insert_scale_factor
     *
     * @param string|null $autovacuum_vacuum_insert_scale_factor Доля вставленных строк перед запуском vacuum для таблиц с большим количеством вставок (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setAutovacuumVacuumInsertScaleFactor($autovacuum_vacuum_insert_scale_factor)
    {
        if (is_null($autovacuum_vacuum_insert_scale_factor)) {
            throw new \InvalidArgumentException('non-nullable autovacuum_vacuum_insert_scale_factor cannot be null');
        }
        $this->container['autovacuum_vacuum_insert_scale_factor'] = $autovacuum_vacuum_insert_scale_factor;

        return $this;
    }

    /**
     * Gets autovacuum_vacuum_scale_factor
     *
     * @return string|null
     */
    public function getAutovacuumVacuumScaleFactor()
    {
        return $this->container['autovacuum_vacuum_scale_factor'];
    }

    /**
     * Sets autovacuum_vacuum_scale_factor
     *
     * @param string|null $autovacuum_vacuum_scale_factor Доля измененных или удаленных строк перед запуском autovacuum (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setAutovacuumVacuumScaleFactor($autovacuum_vacuum_scale_factor)
    {
        if (is_null($autovacuum_vacuum_scale_factor)) {
            throw new \InvalidArgumentException('non-nullable autovacuum_vacuum_scale_factor cannot be null');
        }
        $this->container['autovacuum_vacuum_scale_factor'] = $autovacuum_vacuum_scale_factor;

        return $this;
    }

    /**
     * Gets autovacuum_work_mem
     *
     * @return string|null
     */
    public function getAutovacuumWorkMem()
    {
        return $this->container['autovacuum_work_mem'];
    }

    /**
     * Sets autovacuum_work_mem
     *
     * @param string|null $autovacuum_work_mem Объем памяти, используемый одним процессом autovacuum (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setAutovacuumWorkMem($autovacuum_work_mem)
    {
        if (is_null($autovacuum_work_mem)) {
            throw new \InvalidArgumentException('non-nullable autovacuum_work_mem cannot be null');
        }
        $this->container['autovacuum_work_mem'] = $autovacuum_work_mem;

        return $this;
    }

    /**
     * Gets bgwriter_delay
     *
     * @return string|null
     */
    public function getBgwriterDelay()
    {
        return $this->container['bgwriter_delay'];
    }

    /**
     * Sets bgwriter_delay
     *
     * @param string|null $bgwriter_delay Интервал между циклами фонового процесса записи страниц (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setBgwriterDelay($bgwriter_delay)
    {
        if (is_null($bgwriter_delay)) {
            throw new \InvalidArgumentException('non-nullable bgwriter_delay cannot be null');
        }
        $this->container['bgwriter_delay'] = $bgwriter_delay;

        return $this;
    }

    /**
     * Gets bgwriter_lru_maxpages
     *
     * @return string|null
     */
    public function getBgwriterLruMaxpages()
    {
        return $this->container['bgwriter_lru_maxpages'];
    }

    /**
     * Sets bgwriter_lru_maxpages
     *
     * @param string|null $bgwriter_lru_maxpages Максимальное количество страниц, записываемых background writer за один цикл (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setBgwriterLruMaxpages($bgwriter_lru_maxpages)
    {
        if (is_null($bgwriter_lru_maxpages)) {
            throw new \InvalidArgumentException('non-nullable bgwriter_lru_maxpages cannot be null');
        }
        $this->container['bgwriter_lru_maxpages'] = $bgwriter_lru_maxpages;

        return $this;
    }

    /**
     * Gets deadlock_timeout
     *
     * @return string|null
     */
    public function getDeadlockTimeout()
    {
        return $this->container['deadlock_timeout'];
    }

    /**
     * Sets deadlock_timeout
     *
     * @param string|null $deadlock_timeout Время ожидания блокировки перед проверкой взаимной блокировки (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setDeadlockTimeout($deadlock_timeout)
    {
        if (is_null($deadlock_timeout)) {
            throw new \InvalidArgumentException('non-nullable deadlock_timeout cannot be null');
        }
        $this->container['deadlock_timeout'] = $deadlock_timeout;

        return $this;
    }

    /**
     * Gets gin_pending_list_limit
     *
     * @return string|null
     */
    public function getGinPendingListLimit()
    {
        return $this->container['gin_pending_list_limit'];
    }

    /**
     * Sets gin_pending_list_limit
     *
     * @param string|null $gin_pending_list_limit Максимальный размер списка ожидающих вставок индекса GIN (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setGinPendingListLimit($gin_pending_list_limit)
    {
        if (is_null($gin_pending_list_limit)) {
            throw new \InvalidArgumentException('non-nullable gin_pending_list_limit cannot be null');
        }
        $this->container['gin_pending_list_limit'] = $gin_pending_list_limit;

        return $this;
    }

    /**
     * Gets idle_in_transaction_session_timeout
     *
     * @return string|null
     */
    public function getIdleInTransactionSessionTimeout()
    {
        return $this->container['idle_in_transaction_session_timeout'];
    }

    /**
     * Sets idle_in_transaction_session_timeout
     *
     * @param string|null $idle_in_transaction_session_timeout Время ожидания неактивной транзакционной сессии перед завершением соединения (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setIdleInTransactionSessionTimeout($idle_in_transaction_session_timeout)
    {
        if (is_null($idle_in_transaction_session_timeout)) {
            throw new \InvalidArgumentException('non-nullable idle_in_transaction_session_timeout cannot be null');
        }
        $this->container['idle_in_transaction_session_timeout'] = $idle_in_transaction_session_timeout;

        return $this;
    }

    /**
     * Gets join_collapse_limit
     *
     * @return string|null
     */
    public function getJoinCollapseLimit()
    {
        return $this->container['join_collapse_limit'];
    }

    /**
     * Sets join_collapse_limit
     *
     * @param string|null $join_collapse_limit Максимальное количество таблиц в JOIN, которые планировщик может переупорядочить (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setJoinCollapseLimit($join_collapse_limit)
    {
        if (is_null($join_collapse_limit)) {
            throw new \InvalidArgumentException('non-nullable join_collapse_limit cannot be null');
        }
        $this->container['join_collapse_limit'] = $join_collapse_limit;

        return $this;
    }

    /**
     * Gets lock_timeout
     *
     * @return string|null
     */
    public function getLockTimeout()
    {
        return $this->container['lock_timeout'];
    }

    /**
     * Sets lock_timeout
     *
     * @param string|null $lock_timeout Максимальное время ожидания блокировки перед отменой запроса (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setLockTimeout($lock_timeout)
    {
        if (is_null($lock_timeout)) {
            throw new \InvalidArgumentException('non-nullable lock_timeout cannot be null');
        }
        $this->container['lock_timeout'] = $lock_timeout;

        return $this;
    }

    /**
     * Gets max_prepared_transactions
     *
     * @return string|null
     */
    public function getMaxPreparedTransactions()
    {
        return $this->container['max_prepared_transactions'];
    }

    /**
     * Sets max_prepared_transactions
     *
     * @param string|null $max_prepared_transactions Максимальное количество подготовленных транзакций, которые могут существовать одновременно (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setMaxPreparedTransactions($max_prepared_transactions)
    {
        if (is_null($max_prepared_transactions)) {
            throw new \InvalidArgumentException('non-nullable max_prepared_transactions cannot be null');
        }
        $this->container['max_prepared_transactions'] = $max_prepared_transactions;

        return $this;
    }

    /**
     * Gets shared_buffers
     *
     * @return string|null
     */
    public function getSharedBuffers()
    {
        return $this->container['shared_buffers'];
    }

    /**
     * Sets shared_buffers
     *
     * @param string|null $shared_buffers Размер общей памяти, используемой PostgreSQL для буферного кэша (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setSharedBuffers($shared_buffers)
    {
        if (is_null($shared_buffers)) {
            throw new \InvalidArgumentException('non-nullable shared_buffers cannot be null');
        }
        $this->container['shared_buffers'] = $shared_buffers;

        return $this;
    }

    /**
     * Gets log_min_duration_statement
     *
     * @return string|null
     */
    public function getLogMinDurationStatement()
    {
        return $this->container['log_min_duration_statement'];
    }

    /**
     * Sets log_min_duration_statement
     *
     * @param string|null $log_min_duration_statement Минимальное время выполнения запроса, после которого он записывается в журнал (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setLogMinDurationStatement($log_min_duration_statement)
    {
        if (is_null($log_min_duration_statement)) {
            throw new \InvalidArgumentException('non-nullable log_min_duration_statement cannot be null');
        }
        $this->container['log_min_duration_statement'] = $log_min_duration_statement;

        return $this;
    }

    /**
     * Gets wal_buffers
     *
     * @return string|null
     */
    public function getWalBuffers()
    {
        return $this->container['wal_buffers'];
    }

    /**
     * Sets wal_buffers
     *
     * @param string|null $wal_buffers Размер памяти, используемой для буферизации WAL-записей (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setWalBuffers($wal_buffers)
    {
        if (is_null($wal_buffers)) {
            throw new \InvalidArgumentException('non-nullable wal_buffers cannot be null');
        }
        $this->container['wal_buffers'] = $wal_buffers;

        return $this;
    }

    /**
     * Gets temp_buffers
     *
     * @return string|null
     */
    public function getTempBuffers()
    {
        return $this->container['temp_buffers'];
    }

    /**
     * Sets temp_buffers
     *
     * @param string|null $temp_buffers Максимальный объем памяти для временных таблиц каждой сессии (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setTempBuffers($temp_buffers)
    {
        if (is_null($temp_buffers)) {
            throw new \InvalidArgumentException('non-nullable temp_buffers cannot be null');
        }
        $this->container['temp_buffers'] = $temp_buffers;

        return $this;
    }

    /**
     * Gets work_mem
     *
     * @return string|null
     */
    public function getWorkMem()
    {
        return $this->container['work_mem'];
    }

    /**
     * Sets work_mem
     *
     * @param string|null $work_mem Объем памяти, используемый одной операцией сортировки или хеширования (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setWorkMem($work_mem)
    {
        if (is_null($work_mem)) {
            throw new \InvalidArgumentException('non-nullable work_mem cannot be null');
        }
        $this->container['work_mem'] = $work_mem;

        return $this;
    }

    /**
     * Gets default_transaction_isolation
     *
     * @return string|null
     */
    public function getDefaultTransactionIsolation()
    {
        return $this->container['default_transaction_isolation'];
    }

    /**
     * Sets default_transaction_isolation
     *
     * @param string|null $default_transaction_isolation Уровень изоляции транзакций по умолчанию (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setDefaultTransactionIsolation($default_transaction_isolation)
    {
        if (is_null($default_transaction_isolation)) {
            throw new \InvalidArgumentException('non-nullable default_transaction_isolation cannot be null');
        }
        $this->container['default_transaction_isolation'] = $default_transaction_isolation;

        return $this;
    }

    /**
     * Gets effective_cache_size
     *
     * @return string|null
     */
    public function getEffectiveCacheSize()
    {
        return $this->container['effective_cache_size'];
    }

    /**
     * Sets effective_cache_size
     *
     * @param string|null $effective_cache_size Оценка объема дискового кэша, доступного планировщику запросов (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setEffectiveCacheSize($effective_cache_size)
    {
        if (is_null($effective_cache_size)) {
            throw new \InvalidArgumentException('non-nullable effective_cache_size cannot be null');
        }
        $this->container['effective_cache_size'] = $effective_cache_size;

        return $this;
    }

    /**
     * Gets max_wal_size
     *
     * @return string|null
     */
    public function getMaxWalSize()
    {
        return $this->container['max_wal_size'];
    }

    /**
     * Sets max_wal_size
     *
     * @param string|null $max_wal_size Максимальный размер WAL перед запуском контрольной точки (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setMaxWalSize($max_wal_size)
    {
        if (is_null($max_wal_size)) {
            throw new \InvalidArgumentException('non-nullable max_wal_size cannot be null');
        }
        $this->container['max_wal_size'] = $max_wal_size;

        return $this;
    }

    /**
     * Gets min_wal_size
     *
     * @return string|null
     */
    public function getMinWalSize()
    {
        return $this->container['min_wal_size'];
    }

    /**
     * Sets min_wal_size
     *
     * @param string|null $min_wal_size Минимальный размер WAL, который сохраняется между контрольными точками (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setMinWalSize($min_wal_size)
    {
        if (is_null($min_wal_size)) {
            throw new \InvalidArgumentException('non-nullable min_wal_size cannot be null');
        }
        $this->container['min_wal_size'] = $min_wal_size;

        return $this;
    }

    /**
     * Gets wal_level
     *
     * @return string|null
     */
    public function getWalLevel()
    {
        return $this->container['wal_level'];
    }

    /**
     * Sets wal_level
     *
     * @param string|null $wal_level Уровень детализации записи WAL для восстановления и репликации (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setWalLevel($wal_level)
    {
        if (is_null($wal_level)) {
            throw new \InvalidArgumentException('non-nullable wal_level cannot be null');
        }
        $this->container['wal_level'] = $wal_level;

        return $this;
    }

    /**
     * Gets max_replication_slots
     *
     * @return string|null
     */
    public function getMaxReplicationSlots()
    {
        return $this->container['max_replication_slots'];
    }

    /**
     * Sets max_replication_slots
     *
     * @param string|null $max_replication_slots Максимальное количество слотов репликации, которые могут быть созданы (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setMaxReplicationSlots($max_replication_slots)
    {
        if (is_null($max_replication_slots)) {
            throw new \InvalidArgumentException('non-nullable max_replication_slots cannot be null');
        }
        $this->container['max_replication_slots'] = $max_replication_slots;

        return $this;
    }

    /**
     * Gets max_wal_senders
     *
     * @return string|null
     */
    public function getMaxWalSenders()
    {
        return $this->container['max_wal_senders'];
    }

    /**
     * Sets max_wal_senders
     *
     * @param string|null $max_wal_senders Максимальное количество процессов отправки WAL для репликации (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setMaxWalSenders($max_wal_senders)
    {
        if (is_null($max_wal_senders)) {
            throw new \InvalidArgumentException('non-nullable max_wal_senders cannot be null');
        }
        $this->container['max_wal_senders'] = $max_wal_senders;

        return $this;
    }

    /**
     * Gets max_worker_processes
     *
     * @return string|null
     */
    public function getMaxWorkerProcesses()
    {
        return $this->container['max_worker_processes'];
    }

    /**
     * Sets max_worker_processes
     *
     * @param string|null $max_worker_processes Максимальное количество фоновых процессов PostgreSQL (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setMaxWorkerProcesses($max_worker_processes)
    {
        if (is_null($max_worker_processes)) {
            throw new \InvalidArgumentException('non-nullable max_worker_processes cannot be null');
        }
        $this->container['max_worker_processes'] = $max_worker_processes;

        return $this;
    }

    /**
     * Gets max_logical_replication_workers
     *
     * @return string|null
     */
    public function getMaxLogicalReplicationWorkers()
    {
        return $this->container['max_logical_replication_workers'];
    }

    /**
     * Sets max_logical_replication_workers
     *
     * @param string|null $max_logical_replication_workers Максимальное количество процессов логической репликации (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setMaxLogicalReplicationWorkers($max_logical_replication_workers)
    {
        if (is_null($max_logical_replication_workers)) {
            throw new \InvalidArgumentException('non-nullable max_logical_replication_workers cannot be null');
        }
        $this->container['max_logical_replication_workers'] = $max_logical_replication_workers;

        return $this;
    }

    /**
     * Gets max_parallel_maintenance_workers
     *
     * @return string|null
     */
    public function getMaxParallelMaintenanceWorkers()
    {
        return $this->container['max_parallel_maintenance_workers'];
    }

    /**
     * Sets max_parallel_maintenance_workers
     *
     * @param string|null $max_parallel_maintenance_workers Максимальное количество параллельных процессов для операций обслуживания (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setMaxParallelMaintenanceWorkers($max_parallel_maintenance_workers)
    {
        if (is_null($max_parallel_maintenance_workers)) {
            throw new \InvalidArgumentException('non-nullable max_parallel_maintenance_workers cannot be null');
        }
        $this->container['max_parallel_maintenance_workers'] = $max_parallel_maintenance_workers;

        return $this;
    }

    /**
     * Gets max_parallel_workers
     *
     * @return string|null
     */
    public function getMaxParallelWorkers()
    {
        return $this->container['max_parallel_workers'];
    }

    /**
     * Sets max_parallel_workers
     *
     * @param string|null $max_parallel_workers Максимальное количество параллельных рабочих процессов для запросов (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setMaxParallelWorkers($max_parallel_workers)
    {
        if (is_null($max_parallel_workers)) {
            throw new \InvalidArgumentException('non-nullable max_parallel_workers cannot be null');
        }
        $this->container['max_parallel_workers'] = $max_parallel_workers;

        return $this;
    }

    /**
     * Gets max_parallel_workers_per_gather
     *
     * @return string|null
     */
    public function getMaxParallelWorkersPerGather()
    {
        return $this->container['max_parallel_workers_per_gather'];
    }

    /**
     * Sets max_parallel_workers_per_gather
     *
     * @param string|null $max_parallel_workers_per_gather Максимальное количество параллельных рабочих процессов на один Gather-узел (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setMaxParallelWorkersPerGather($max_parallel_workers_per_gather)
    {
        if (is_null($max_parallel_workers_per_gather)) {
            throw new \InvalidArgumentException('non-nullable max_parallel_workers_per_gather cannot be null');
        }
        $this->container['max_parallel_workers_per_gather'] = $max_parallel_workers_per_gather;

        return $this;
    }

    /**
     * Gets array_nulls
     *
     * @return string|null
     */
    public function getArrayNulls()
    {
        return $this->container['array_nulls'];
    }

    /**
     * Sets array_nulls
     *
     * @param string|null $array_nulls Разрешение использования NULL в массивах PostgreSQL (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setArrayNulls($array_nulls)
    {
        if (is_null($array_nulls)) {
            throw new \InvalidArgumentException('non-nullable array_nulls cannot be null');
        }
        $this->container['array_nulls'] = $array_nulls;

        return $this;
    }

    /**
     * Gets backend_flush_after
     *
     * @return string|null
     */
    public function getBackendFlushAfter()
    {
        return $this->container['backend_flush_after'];
    }

    /**
     * Sets backend_flush_after
     *
     * @param string|null $backend_flush_after Количество страниц, после записи которых выполняется принудительная очистка данных на диск серверным процессом (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setBackendFlushAfter($backend_flush_after)
    {
        if (is_null($backend_flush_after)) {
            throw new \InvalidArgumentException('non-nullable backend_flush_after cannot be null');
        }
        $this->container['backend_flush_after'] = $backend_flush_after;

        return $this;
    }

    /**
     * Gets backslash_quote
     *
     * @return string|null
     */
    public function getBackslashQuote()
    {
        return $this->container['backslash_quote'];
    }

    /**
     * Sets backslash_quote
     *
     * @param string|null $backslash_quote Управление использованием обратного слеша в строковых литералах (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setBackslashQuote($backslash_quote)
    {
        if (is_null($backslash_quote)) {
            throw new \InvalidArgumentException('non-nullable backslash_quote cannot be null');
        }
        $this->container['backslash_quote'] = $backslash_quote;

        return $this;
    }

    /**
     * Gets bgwriter_flush_after
     *
     * @return string|null
     */
    public function getBgwriterFlushAfter()
    {
        return $this->container['bgwriter_flush_after'];
    }

    /**
     * Sets bgwriter_flush_after
     *
     * @param string|null $bgwriter_flush_after Количество страниц, после которого background writer выполняет очистку данных на диск (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setBgwriterFlushAfter($bgwriter_flush_after)
    {
        if (is_null($bgwriter_flush_after)) {
            throw new \InvalidArgumentException('non-nullable bgwriter_flush_after cannot be null');
        }
        $this->container['bgwriter_flush_after'] = $bgwriter_flush_after;

        return $this;
    }

    /**
     * Gets bgwriter_lru_multiplier
     *
     * @return string|null
     */
    public function getBgwriterLruMultiplier()
    {
        return $this->container['bgwriter_lru_multiplier'];
    }

    /**
     * Sets bgwriter_lru_multiplier
     *
     * @param string|null $bgwriter_lru_multiplier Множитель количества страниц, которые background writer пытается очистить (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setBgwriterLruMultiplier($bgwriter_lru_multiplier)
    {
        if (is_null($bgwriter_lru_multiplier)) {
            throw new \InvalidArgumentException('non-nullable bgwriter_lru_multiplier cannot be null');
        }
        $this->container['bgwriter_lru_multiplier'] = $bgwriter_lru_multiplier;

        return $this;
    }

    /**
     * Gets default_transaction_read_only
     *
     * @return string|null
     */
    public function getDefaultTransactionReadOnly()
    {
        return $this->container['default_transaction_read_only'];
    }

    /**
     * Sets default_transaction_read_only
     *
     * @param string|null $default_transaction_read_only Определяет режим транзакций только для чтения по умолчанию (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setDefaultTransactionReadOnly($default_transaction_read_only)
    {
        if (is_null($default_transaction_read_only)) {
            throw new \InvalidArgumentException('non-nullable default_transaction_read_only cannot be null');
        }
        $this->container['default_transaction_read_only'] = $default_transaction_read_only;

        return $this;
    }

    /**
     * Gets enable_hashagg
     *
     * @return string|null
     */
    public function getEnableHashagg()
    {
        return $this->container['enable_hashagg'];
    }

    /**
     * Sets enable_hashagg
     *
     * @param string|null $enable_hashagg Разрешение использования Hash Aggregate планировщиком запросов (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setEnableHashagg($enable_hashagg)
    {
        if (is_null($enable_hashagg)) {
            throw new \InvalidArgumentException('non-nullable enable_hashagg cannot be null');
        }
        $this->container['enable_hashagg'] = $enable_hashagg;

        return $this;
    }

    /**
     * Gets enable_hashjoin
     *
     * @return string|null
     */
    public function getEnableHashjoin()
    {
        return $this->container['enable_hashjoin'];
    }

    /**
     * Sets enable_hashjoin
     *
     * @param string|null $enable_hashjoin Разрешение использования Hash Join планировщиком запросов (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setEnableHashjoin($enable_hashjoin)
    {
        if (is_null($enable_hashjoin)) {
            throw new \InvalidArgumentException('non-nullable enable_hashjoin cannot be null');
        }
        $this->container['enable_hashjoin'] = $enable_hashjoin;

        return $this;
    }

    /**
     * Gets enable_incremental_sort
     *
     * @return string|null
     */
    public function getEnableIncrementalSort()
    {
        return $this->container['enable_incremental_sort'];
    }

    /**
     * Sets enable_incremental_sort
     *
     * @param string|null $enable_incremental_sort Разрешение использования инкрементальной сортировки планировщиком (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setEnableIncrementalSort($enable_incremental_sort)
    {
        if (is_null($enable_incremental_sort)) {
            throw new \InvalidArgumentException('non-nullable enable_incremental_sort cannot be null');
        }
        $this->container['enable_incremental_sort'] = $enable_incremental_sort;

        return $this;
    }

    /**
     * Gets enable_indexscan
     *
     * @return string|null
     */
    public function getEnableIndexscan()
    {
        return $this->container['enable_indexscan'];
    }

    /**
     * Sets enable_indexscan
     *
     * @param string|null $enable_indexscan Разрешение использования обычного индексного сканирования (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setEnableIndexscan($enable_indexscan)
    {
        if (is_null($enable_indexscan)) {
            throw new \InvalidArgumentException('non-nullable enable_indexscan cannot be null');
        }
        $this->container['enable_indexscan'] = $enable_indexscan;

        return $this;
    }

    /**
     * Gets enable_indexonlyscan
     *
     * @return string|null
     */
    public function getEnableIndexonlyscan()
    {
        return $this->container['enable_indexonlyscan'];
    }

    /**
     * Sets enable_indexonlyscan
     *
     * @param string|null $enable_indexonlyscan Разрешение использования index-only scan (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setEnableIndexonlyscan($enable_indexonlyscan)
    {
        if (is_null($enable_indexonlyscan)) {
            throw new \InvalidArgumentException('non-nullable enable_indexonlyscan cannot be null');
        }
        $this->container['enable_indexonlyscan'] = $enable_indexonlyscan;

        return $this;
    }

    /**
     * Gets enable_material
     *
     * @return string|null
     */
    public function getEnableMaterial()
    {
        return $this->container['enable_material'];
    }

    /**
     * Sets enable_material
     *
     * @param string|null $enable_material Разрешение использования материализации промежуточных результатов запросов (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setEnableMaterial($enable_material)
    {
        if (is_null($enable_material)) {
            throw new \InvalidArgumentException('non-nullable enable_material cannot be null');
        }
        $this->container['enable_material'] = $enable_material;

        return $this;
    }

    /**
     * Gets enable_memoize
     *
     * @return string|null
     */
    public function getEnableMemoize()
    {
        return $this->container['enable_memoize'];
    }

    /**
     * Sets enable_memoize
     *
     * @param string|null $enable_memoize Разрешение использования Memoize узлов планировщиком запросов (`postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setEnableMemoize($enable_memoize)
    {
        if (is_null($enable_memoize)) {
            throw new \InvalidArgumentException('non-nullable enable_memoize cannot be null');
        }
        $this->container['enable_memoize'] = $enable_memoize;

        return $this;
    }

    /**
     * Gets enable_mergejoin
     *
     * @return string|null
     */
    public function getEnableMergejoin()
    {
        return $this->container['enable_mergejoin'];
    }

    /**
     * Sets enable_mergejoin
     *
     * @param string|null $enable_mergejoin Разрешение использования Merge Join планировщиком запросов (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setEnableMergejoin($enable_mergejoin)
    {
        if (is_null($enable_mergejoin)) {
            throw new \InvalidArgumentException('non-nullable enable_mergejoin cannot be null');
        }
        $this->container['enable_mergejoin'] = $enable_mergejoin;

        return $this;
    }

    /**
     * Gets enable_parallel_append
     *
     * @return string|null
     */
    public function getEnableParallelAppend()
    {
        return $this->container['enable_parallel_append'];
    }

    /**
     * Sets enable_parallel_append
     *
     * @param string|null $enable_parallel_append Разрешение использования параллельного Append для запросов (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setEnableParallelAppend($enable_parallel_append)
    {
        if (is_null($enable_parallel_append)) {
            throw new \InvalidArgumentException('non-nullable enable_parallel_append cannot be null');
        }
        $this->container['enable_parallel_append'] = $enable_parallel_append;

        return $this;
    }

    /**
     * Gets enable_parallel_hash
     *
     * @return string|null
     */
    public function getEnableParallelHash()
    {
        return $this->container['enable_parallel_hash'];
    }

    /**
     * Sets enable_parallel_hash
     *
     * @param string|null $enable_parallel_hash Разрешение использования параллельных Hash операций (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setEnableParallelHash($enable_parallel_hash)
    {
        if (is_null($enable_parallel_hash)) {
            throw new \InvalidArgumentException('non-nullable enable_parallel_hash cannot be null');
        }
        $this->container['enable_parallel_hash'] = $enable_parallel_hash;

        return $this;
    }

    /**
     * Gets enable_partition_pruning
     *
     * @return string|null
     */
    public function getEnablePartitionPruning()
    {
        return $this->container['enable_partition_pruning'];
    }

    /**
     * Sets enable_partition_pruning
     *
     * @param string|null $enable_partition_pruning Разрешение удаления ненужных разделов таблицы при планировании запроса (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setEnablePartitionPruning($enable_partition_pruning)
    {
        if (is_null($enable_partition_pruning)) {
            throw new \InvalidArgumentException('non-nullable enable_partition_pruning cannot be null');
        }
        $this->container['enable_partition_pruning'] = $enable_partition_pruning;

        return $this;
    }

    /**
     * Gets enable_partitionwise_join
     *
     * @return string|null
     */
    public function getEnablePartitionwiseJoin()
    {
        return $this->container['enable_partitionwise_join'];
    }

    /**
     * Sets enable_partitionwise_join
     *
     * @param string|null $enable_partitionwise_join Разрешение выполнения соединений между секционированными таблицами с учетом секций (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setEnablePartitionwiseJoin($enable_partitionwise_join)
    {
        if (is_null($enable_partitionwise_join)) {
            throw new \InvalidArgumentException('non-nullable enable_partitionwise_join cannot be null');
        }
        $this->container['enable_partitionwise_join'] = $enable_partitionwise_join;

        return $this;
    }

    /**
     * Gets enable_partitionwise_aggregate
     *
     * @return string|null
     */
    public function getEnablePartitionwiseAggregate()
    {
        return $this->container['enable_partitionwise_aggregate'];
    }

    /**
     * Sets enable_partitionwise_aggregate
     *
     * @param string|null $enable_partitionwise_aggregate Разрешение выполнения агрегатных операций отдельно для секций таблиц (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setEnablePartitionwiseAggregate($enable_partitionwise_aggregate)
    {
        if (is_null($enable_partitionwise_aggregate)) {
            throw new \InvalidArgumentException('non-nullable enable_partitionwise_aggregate cannot be null');
        }
        $this->container['enable_partitionwise_aggregate'] = $enable_partitionwise_aggregate;

        return $this;
    }

    /**
     * Gets enable_seqscan
     *
     * @return string|null
     */
    public function getEnableSeqscan()
    {
        return $this->container['enable_seqscan'];
    }

    /**
     * Sets enable_seqscan
     *
     * @param string|null $enable_seqscan Разрешение использования последовательного сканирования таблиц планировщиком запросов (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setEnableSeqscan($enable_seqscan)
    {
        if (is_null($enable_seqscan)) {
            throw new \InvalidArgumentException('non-nullable enable_seqscan cannot be null');
        }
        $this->container['enable_seqscan'] = $enable_seqscan;

        return $this;
    }

    /**
     * Gets enable_sort
     *
     * @return string|null
     */
    public function getEnableSort()
    {
        return $this->container['enable_sort'];
    }

    /**
     * Sets enable_sort
     *
     * @param string|null $enable_sort Разрешение использования операций сортировки планировщиком запросов (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setEnableSort($enable_sort)
    {
        if (is_null($enable_sort)) {
            throw new \InvalidArgumentException('non-nullable enable_sort cannot be null');
        }
        $this->container['enable_sort'] = $enable_sort;

        return $this;
    }

    /**
     * Gets enable_tidscan
     *
     * @return string|null
     */
    public function getEnableTidscan()
    {
        return $this->container['enable_tidscan'];
    }

    /**
     * Sets enable_tidscan
     *
     * @param string|null $enable_tidscan Разрешение использования TID Scan для поиска строк по физическим идентификаторам (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setEnableTidscan($enable_tidscan)
    {
        if (is_null($enable_tidscan)) {
            throw new \InvalidArgumentException('non-nullable enable_tidscan cannot be null');
        }
        $this->container['enable_tidscan'] = $enable_tidscan;

        return $this;
    }

    /**
     * Gets exit_on_error
     *
     * @return string|null
     */
    public function getExitOnError()
    {
        return $this->container['exit_on_error'];
    }

    /**
     * Sets exit_on_error
     *
     * @param string|null $exit_on_error Завершение сессии при возникновении ошибки SQL (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setExitOnError($exit_on_error)
    {
        if (is_null($exit_on_error)) {
            throw new \InvalidArgumentException('non-nullable exit_on_error cannot be null');
        }
        $this->container['exit_on_error'] = $exit_on_error;

        return $this;
    }

    /**
     * Gets from_collapse_limit
     *
     * @return string|null
     */
    public function getFromCollapseLimit()
    {
        return $this->container['from_collapse_limit'];
    }

    /**
     * Sets from_collapse_limit
     *
     * @param string|null $from_collapse_limit Максимальное количество элементов FROM, которые планировщик может объединять при оптимизации запросов (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setFromCollapseLimit($from_collapse_limit)
    {
        if (is_null($from_collapse_limit)) {
            throw new \InvalidArgumentException('non-nullable from_collapse_limit cannot be null');
        }
        $this->container['from_collapse_limit'] = $from_collapse_limit;

        return $this;
    }

    /**
     * Gets jit
     *
     * @return string|null
     */
    public function getJit()
    {
        return $this->container['jit'];
    }

    /**
     * Sets jit
     *
     * @param string|null $jit Включение JIT-компиляции для ускорения выполнения запросов (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setJit($jit)
    {
        if (is_null($jit)) {
            throw new \InvalidArgumentException('non-nullable jit cannot be null');
        }
        $this->container['jit'] = $jit;

        return $this;
    }

    /**
     * Gets plan_cache_mode
     *
     * @return string|null
     */
    public function getPlanCacheMode()
    {
        return $this->container['plan_cache_mode'];
    }

    /**
     * Sets plan_cache_mode
     *
     * @param string|null $plan_cache_mode Режим использования кэша планов подготовленных запросов (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setPlanCacheMode($plan_cache_mode)
    {
        if (is_null($plan_cache_mode)) {
            throw new \InvalidArgumentException('non-nullable plan_cache_mode cannot be null');
        }
        $this->container['plan_cache_mode'] = $plan_cache_mode;

        return $this;
    }

    /**
     * Gets quote_all_identifiers
     *
     * @return string|null
     */
    public function getQuoteAllIdentifiers()
    {
        return $this->container['quote_all_identifiers'];
    }

    /**
     * Sets quote_all_identifiers
     *
     * @param string|null $quote_all_identifiers Всегда заключать идентификаторы в кавычки при генерации SQL (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setQuoteAllIdentifiers($quote_all_identifiers)
    {
        if (is_null($quote_all_identifiers)) {
            throw new \InvalidArgumentException('non-nullable quote_all_identifiers cannot be null');
        }
        $this->container['quote_all_identifiers'] = $quote_all_identifiers;

        return $this;
    }

    /**
     * Gets standard_conforming_strings
     *
     * @return string|null
     */
    public function getStandardConformingStrings()
    {
        return $this->container['standard_conforming_strings'];
    }

    /**
     * Sets standard_conforming_strings
     *
     * @param string|null $standard_conforming_strings Использование стандартного поведения строковых литералов SQL (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setStandardConformingStrings($standard_conforming_strings)
    {
        if (is_null($standard_conforming_strings)) {
            throw new \InvalidArgumentException('non-nullable standard_conforming_strings cannot be null');
        }
        $this->container['standard_conforming_strings'] = $standard_conforming_strings;

        return $this;
    }

    /**
     * Gets statement_timeout
     *
     * @return string|null
     */
    public function getStatementTimeout()
    {
        return $this->container['statement_timeout'];
    }

    /**
     * Sets statement_timeout
     *
     * @param string|null $statement_timeout Максимальное время выполнения SQL-запроса перед автоматической отменой (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setStatementTimeout($statement_timeout)
    {
        if (is_null($statement_timeout)) {
            throw new \InvalidArgumentException('non-nullable statement_timeout cannot be null');
        }
        $this->container['statement_timeout'] = $statement_timeout;

        return $this;
    }

    /**
     * Gets timezone
     *
     * @return string|null
     */
    public function getTimezone()
    {
        return $this->container['timezone'];
    }

    /**
     * Sets timezone
     *
     * @param string|null $timezone Часовой пояс сервера PostgreSQL по умолчанию (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setTimezone($timezone)
    {
        if (is_null($timezone)) {
            throw new \InvalidArgumentException('non-nullable timezone cannot be null');
        }
        $this->container['timezone'] = $timezone;

        return $this;
    }

    /**
     * Gets transform_null_equals
     *
     * @return string|null
     */
    public function getTransformNullEquals()
    {
        return $this->container['transform_null_equals'];
    }

    /**
     * Sets transform_null_equals
     *
     * @param string|null $transform_null_equals Преобразование выражений вида `NULL = NULL` в проверку IS NULL (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setTransformNullEquals($transform_null_equals)
    {
        if (is_null($transform_null_equals)) {
            throw new \InvalidArgumentException('non-nullable transform_null_equals cannot be null');
        }
        $this->container['transform_null_equals'] = $transform_null_equals;

        return $this;
    }

    /**
     * Gets max_locks_per_transaction
     *
     * @return string|null
     */
    public function getMaxLocksPerTransaction()
    {
        return $this->container['max_locks_per_transaction'];
    }

    /**
     * Sets max_locks_per_transaction
     *
     * @param string|null $max_locks_per_transaction Количество объектов, которые может блокировать одна транзакция (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setMaxLocksPerTransaction($max_locks_per_transaction)
    {
        if (is_null($max_locks_per_transaction)) {
            throw new \InvalidArgumentException('non-nullable max_locks_per_transaction cannot be null');
        }
        $this->container['max_locks_per_transaction'] = $max_locks_per_transaction;

        return $this;
    }

    /**
     * Gets autovacuum_vacuum_cost_limit
     *
     * @return string|null
     */
    public function getAutovacuumVacuumCostLimit()
    {
        return $this->container['autovacuum_vacuum_cost_limit'];
    }

    /**
     * Sets autovacuum_vacuum_cost_limit
     *
     * @param string|null $autovacuum_vacuum_cost_limit Лимит стоимости операций autovacuum перед приостановкой работы (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setAutovacuumVacuumCostLimit($autovacuum_vacuum_cost_limit)
    {
        if (is_null($autovacuum_vacuum_cost_limit)) {
            throw new \InvalidArgumentException('non-nullable autovacuum_vacuum_cost_limit cannot be null');
        }
        $this->container['autovacuum_vacuum_cost_limit'] = $autovacuum_vacuum_cost_limit;

        return $this;
    }

    /**
     * Gets checkpoint_timeout
     *
     * @return string|null
     */
    public function getCheckpointTimeout()
    {
        return $this->container['checkpoint_timeout'];
    }

    /**
     * Sets checkpoint_timeout
     *
     * @param string|null $checkpoint_timeout Максимальный интервал времени между автоматическими контрольными точками (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setCheckpointTimeout($checkpoint_timeout)
    {
        if (is_null($checkpoint_timeout)) {
            throw new \InvalidArgumentException('non-nullable checkpoint_timeout cannot be null');
        }
        $this->container['checkpoint_timeout'] = $checkpoint_timeout;

        return $this;
    }

    /**
     * Gets checkpoint_completion_target
     *
     * @return string|null
     */
    public function getCheckpointCompletionTarget()
    {
        return $this->container['checkpoint_completion_target'];
    }

    /**
     * Sets checkpoint_completion_target
     *
     * @param string|null $checkpoint_completion_target Доля интервала checkpoint, за которую PostgreSQL распределяет запись данных (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setCheckpointCompletionTarget($checkpoint_completion_target)
    {
        if (is_null($checkpoint_completion_target)) {
            throw new \InvalidArgumentException('non-nullable checkpoint_completion_target cannot be null');
        }
        $this->container['checkpoint_completion_target'] = $checkpoint_completion_target;

        return $this;
    }

    /**
     * Gets wal_compression
     *
     * @return string|null
     */
    public function getWalCompression()
    {
        return $this->container['wal_compression'];
    }

    /**
     * Sets wal_compression
     *
     * @param string|null $wal_compression Включение сжатия WAL-записей для уменьшения объема журнала (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setWalCompression($wal_compression)
    {
        if (is_null($wal_compression)) {
            throw new \InvalidArgumentException('non-nullable wal_compression cannot be null');
        }
        $this->container['wal_compression'] = $wal_compression;

        return $this;
    }

    /**
     * Gets random_page_cost
     *
     * @return string|null
     */
    public function getRandomPageCost()
    {
        return $this->container['random_page_cost'];
    }

    /**
     * Sets random_page_cost
     *
     * @param string|null $random_page_cost Оценочная стоимость случайного чтения страницы для планировщика запросов (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setRandomPageCost($random_page_cost)
    {
        if (is_null($random_page_cost)) {
            throw new \InvalidArgumentException('non-nullable random_page_cost cannot be null');
        }
        $this->container['random_page_cost'] = $random_page_cost;

        return $this;
    }

    /**
     * Gets effective_io_concurrency
     *
     * @return string|null
     */
    public function getEffectiveIoConcurrency()
    {
        return $this->container['effective_io_concurrency'];
    }

    /**
     * Sets effective_io_concurrency
     *
     * @param string|null $effective_io_concurrency Количество параллельных операций ввода-вывода, которые планировщик может учитывать (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setEffectiveIoConcurrency($effective_io_concurrency)
    {
        if (is_null($effective_io_concurrency)) {
            throw new \InvalidArgumentException('non-nullable effective_io_concurrency cannot be null');
        }
        $this->container['effective_io_concurrency'] = $effective_io_concurrency;

        return $this;
    }

    /**
     * Gets log_lock_waits
     *
     * @return string|null
     */
    public function getLogLockWaits()
    {
        return $this->container['log_lock_waits'];
    }

    /**
     * Sets log_lock_waits
     *
     * @param string|null $log_lock_waits Включение записи в журнал информации об ожидании блокировок дольше deadlock_timeout (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setLogLockWaits($log_lock_waits)
    {
        if (is_null($log_lock_waits)) {
            throw new \InvalidArgumentException('non-nullable log_lock_waits cannot be null');
        }
        $this->container['log_lock_waits'] = $log_lock_waits;

        return $this;
    }

    /**
     * Gets log_temp_files
     *
     * @return string|null
     */
    public function getLogTempFiles()
    {
        return $this->container['log_temp_files'];
    }

    /**
     * Sets log_temp_files
     *
     * @param string|null $log_temp_files Минимальный размер временных файлов, при котором они записываются в журнал (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setLogTempFiles($log_temp_files)
    {
        if (is_null($log_temp_files)) {
            throw new \InvalidArgumentException('non-nullable log_temp_files cannot be null');
        }
        $this->container['log_temp_files'] = $log_temp_files;

        return $this;
    }

    /**
     * Gets track_io_timing
     *
     * @return string|null
     */
    public function getTrackIoTiming()
    {
        return $this->container['track_io_timing'];
    }

    /**
     * Sets track_io_timing
     *
     * @param string|null $track_io_timing Включение сбора статистики времени операций ввода-вывода (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setTrackIoTiming($track_io_timing)
    {
        if (is_null($track_io_timing)) {
            throw new \InvalidArgumentException('non-nullable track_io_timing cannot be null');
        }
        $this->container['track_io_timing'] = $track_io_timing;

        return $this;
    }

    /**
     * Gets maintenance_work_mem
     *
     * @return string|null
     */
    public function getMaintenanceWorkMem()
    {
        return $this->container['maintenance_work_mem'];
    }

    /**
     * Sets maintenance_work_mem
     *
     * @param string|null $maintenance_work_mem Максимальный объем памяти для операций обслуживания, таких как VACUUM и CREATE INDEX (`postgres` | `postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setMaintenanceWorkMem($maintenance_work_mem)
    {
        if (is_null($maintenance_work_mem)) {
            throw new \InvalidArgumentException('non-nullable maintenance_work_mem cannot be null');
        }
        $this->container['maintenance_work_mem'] = $maintenance_work_mem;

        return $this;
    }

    /**
     * Gets idle_session_timeout
     *
     * @return string|null
     */
    public function getIdleSessionTimeout()
    {
        return $this->container['idle_session_timeout'];
    }

    /**
     * Sets idle_session_timeout
     *
     * @param string|null $idle_session_timeout Время ожидания неактивной сессии перед автоматическим завершением соединения (`postgres14` | `postgres15` | `postgres16` | `postgres17` | `postgres18`).
     *
     * @return self
     */
    public function setIdleSessionTimeout($idle_session_timeout)
    {
        if (is_null($idle_session_timeout)) {
            throw new \InvalidArgumentException('non-nullable idle_session_timeout cannot be null');
        }
        $this->container['idle_session_timeout'] = $idle_session_timeout;

        return $this;
    }

    /**
     * Gets io_method
     *
     * @return string|null
     */
    public function getIoMethod()
    {
        return $this->container['io_method'];
    }

    /**
     * Sets io_method
     *
     * @param string|null $io_method Метод выполнения операций ввода-вывода PostgreSQL (`postgres18`).
     *
     * @return self
     */
    public function setIoMethod($io_method)
    {
        if (is_null($io_method)) {
            throw new \InvalidArgumentException('non-nullable io_method cannot be null');
        }
        $this->container['io_method'] = $io_method;

        return $this;
    }

    /**
     * Gets io_workers
     *
     * @return string|null
     */
    public function getIoWorkers()
    {
        return $this->container['io_workers'];
    }

    /**
     * Sets io_workers
     *
     * @param string|null $io_workers Количество фоновых процессов для выполнения операций ввода-вывода (`postgres18`).
     *
     * @return self
     */
    public function setIoWorkers($io_workers)
    {
        if (is_null($io_workers)) {
            throw new \InvalidArgumentException('non-nullable io_workers cannot be null');
        }
        $this->container['io_workers'] = $io_workers;

        return $this;
    }

    /**
     * Gets client_output_buffer_limit_normal
     *
     * @return string|null
     */
    public function getClientOutputBufferLimitNormal()
    {
        return $this->container['client_output_buffer_limit_normal'];
    }

    /**
     * Sets client_output_buffer_limit_normal
     *
     * @param string|null $client_output_buffer_limit_normal Ограничение буфера вывода для обычных клиентских подключений. Формат: `hard-limit soft-limit soft-seconds` (`valkey` | `valkey7` | `valkey8_1` | `valkey9_1`).
     *
     * @return self
     */
    public function setClientOutputBufferLimitNormal($client_output_buffer_limit_normal)
    {
        if (is_null($client_output_buffer_limit_normal)) {
            throw new \InvalidArgumentException('non-nullable client_output_buffer_limit_normal cannot be null');
        }
        $this->container['client_output_buffer_limit_normal'] = $client_output_buffer_limit_normal;

        return $this;
    }

    /**
     * Gets notify_keyspace_events
     *
     * @return string|null
     */
    public function getNotifyKeyspaceEvents()
    {
        return $this->container['notify_keyspace_events'];
    }

    /**
     * Sets notify_keyspace_events
     *
     * @param string|null $notify_keyspace_events Настройка уведомлений о событиях пространства ключей (`valkey` | `valkey7` | `valkey8_1` | `valkey9_1`).
     *
     * @return self
     */
    public function setNotifyKeyspaceEvents($notify_keyspace_events)
    {
        if (is_null($notify_keyspace_events)) {
            throw new \InvalidArgumentException('non-nullable notify_keyspace_events cannot be null');
        }
        $this->container['notify_keyspace_events'] = $notify_keyspace_events;

        return $this;
    }

    /**
     * Gets client_output_buffer_limit_pubsub
     *
     * @return string|null
     */
    public function getClientOutputBufferLimitPubsub()
    {
        return $this->container['client_output_buffer_limit_pubsub'];
    }

    /**
     * Sets client_output_buffer_limit_pubsub
     *
     * @param string|null $client_output_buffer_limit_pubsub Ограничение буфера вывода для клиентов pub/sub. Формат: `hard-limit soft-limit soft-seconds` (`valkey` | `valkey7` | `valkey8_1` | `valkey9_1`).
     *
     * @return self
     */
    public function setClientOutputBufferLimitPubsub($client_output_buffer_limit_pubsub)
    {
        if (is_null($client_output_buffer_limit_pubsub)) {
            throw new \InvalidArgumentException('non-nullable client_output_buffer_limit_pubsub cannot be null');
        }
        $this->container['client_output_buffer_limit_pubsub'] = $client_output_buffer_limit_pubsub;

        return $this;
    }

    /**
     * Gets databases
     *
     * @return string|null
     */
    public function getDatabases()
    {
        return $this->container['databases'];
    }

    /**
     * Sets databases
     *
     * @param string|null $databases Количество логических баз данных на сервере (`valkey` | `valkey7` | `valkey8_1` | `valkey9_1`).
     *
     * @return self
     */
    public function setDatabases($databases)
    {
        if (is_null($databases)) {
            throw new \InvalidArgumentException('non-nullable databases cannot be null');
        }
        $this->container['databases'] = $databases;

        return $this;
    }

    /**
     * Gets timeout
     *
     * @return string|null
     */
    public function getTimeout()
    {
        return $this->container['timeout'];
    }

    /**
     * Sets timeout
     *
     * @param string|null $timeout Время ожидания в секундах перед закрытием неактивного клиентского соединения. `0` — отключено (`valkey` | `valkey7` | `valkey8_1` | `valkey9_1`).
     *
     * @return self
     */
    public function setTimeout($timeout)
    {
        if (is_null($timeout)) {
            throw new \InvalidArgumentException('non-nullable timeout cannot be null');
        }
        $this->container['timeout'] = $timeout;

        return $this;
    }

    /**
     * Gets maxmemory_policy
     *
     * @return string|null
     */
    public function getMaxmemoryPolicy()
    {
        return $this->container['maxmemory_policy'];
    }

    /**
     * Sets maxmemory_policy
     *
     * @param string|null $maxmemory_policy Политика вытеснения ключей при достижении лимита памяти (`valkey` | `valkey7` | `valkey8_1` | `valkey9_1`).
     *
     * @return self
     */
    public function setMaxmemoryPolicy($maxmemory_policy)
    {
        if (is_null($maxmemory_policy)) {
            throw new \InvalidArgumentException('non-nullable maxmemory_policy cannot be null');
        }
        $this->container['maxmemory_policy'] = $maxmemory_policy;

        return $this;
    }

    /**
     * Gets slowlog_log_slower_than
     *
     * @return string|null
     */
    public function getSlowlogLogSlowerThan()
    {
        return $this->container['slowlog_log_slower_than'];
    }

    /**
     * Sets slowlog_log_slower_than
     *
     * @param string|null $slowlog_log_slower_than Минимальное время выполнения команды в микросекундах для записи в журнал медленных команд (`valkey` | `valkey7` | `valkey8_1` | `valkey9_1`).
     *
     * @return self
     */
    public function setSlowlogLogSlowerThan($slowlog_log_slower_than)
    {
        if (is_null($slowlog_log_slower_than)) {
            throw new \InvalidArgumentException('non-nullable slowlog_log_slower_than cannot be null');
        }
        $this->container['slowlog_log_slower_than'] = $slowlog_log_slower_than;

        return $this;
    }

    /**
     * Gets slowlog_max_len
     *
     * @return string|null
     */
    public function getSlowlogMaxLen()
    {
        return $this->container['slowlog_max_len'];
    }

    /**
     * Sets slowlog_max_len
     *
     * @param string|null $slowlog_max_len Максимальное количество записей, хранящихся в журнале медленных команд (`valkey` | `valkey7` | `valkey8_1` | `valkey9_1`).
     *
     * @return self
     */
    public function setSlowlogMaxLen($slowlog_max_len)
    {
        if (is_null($slowlog_max_len)) {
            throw new \InvalidArgumentException('non-nullable slowlog_max_len cannot be null');
        }
        $this->container['slowlog_max_len'] = $slowlog_max_len;

        return $this;
    }

    /**
     * Gets save
     *
     * @return string|null
     */
    public function getSave()
    {
        return $this->container['save'];
    }

    /**
     * Sets save
     *
     * @param string|null $save Условие создания снимка RDB на диск. Формат: `seconds changes` — сохранение выполняется, если за указанное время было сделано не менее указанного количества изменений (`valkey` | `valkey7` | `valkey8_1` | `valkey9_1`).
     *
     * @return self
     */
    public function setSave($save)
    {
        if (is_null($save)) {
            throw new \InvalidArgumentException('non-nullable save cannot be null');
        }
        $this->container['save'] = $save;

        return $this;
    }

    /**
     * Gets appendonly
     *
     * @return string|null
     */
    public function getAppendonly()
    {
        return $this->container['appendonly'];
    }

    /**
     * Sets appendonly
     *
     * @param string|null $appendonly Включение режима AOF (Append Only File) для персистентного хранения данных (`valkey` | `valkey7` | `valkey8_1` | `valkey9_1`).
     *
     * @return self
     */
    public function setAppendonly($appendonly)
    {
        if (is_null($appendonly)) {
            throw new \InvalidArgumentException('non-nullable appendonly cannot be null');
        }
        $this->container['appendonly'] = $appendonly;

        return $this;
    }

    /**
     * Gets appendfsync
     *
     * @return string|null
     */
    public function getAppendfsync()
    {
        return $this->container['appendfsync'];
    }

    /**
     * Sets appendfsync
     *
     * @param string|null $appendfsync Режим синхронизации AOF-файла с диском: `always` — при каждой записи, `everysec` — раз в секунду, `no` — управление передаётся ОС (`valkey` | `valkey7` | `valkey8_1` | `valkey9_1`).
     *
     * @return self
     */
    public function setAppendfsync($appendfsync)
    {
        if (is_null($appendfsync)) {
            throw new \InvalidArgumentException('non-nullable appendfsync cannot be null');
        }
        $this->container['appendfsync'] = $appendfsync;

        return $this;
    }

    /**
     * Gets tcp_keepalive
     *
     * @return string|null
     */
    public function getTcpKeepalive()
    {
        return $this->container['tcp_keepalive'];
    }

    /**
     * Sets tcp_keepalive
     *
     * @param string|null $tcp_keepalive Интервал проверки активности TCP-соединения в секундах. `0` — отключено (`valkey` | `valkey7` | `valkey8_1` | `valkey9_1`).
     *
     * @return self
     */
    public function setTcpKeepalive($tcp_keepalive)
    {
        if (is_null($tcp_keepalive)) {
            throw new \InvalidArgumentException('non-nullable tcp_keepalive cannot be null');
        }
        $this->container['tcp_keepalive'] = $tcp_keepalive;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed|null
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
       return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


