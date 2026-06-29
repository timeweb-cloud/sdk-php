<?php
/**
 * ConfigParametersMysql
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
 * ConfigParametersMysql Class Doc Comment
 *
 * @category Class
 * @description Параметры MySQL (&#x60;mysql5&#x60; | &#x60;mysql&#x60; | &#x60;mysql8_4&#x60;)
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class ConfigParametersMysql implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'config_parameters_mysql';

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
        'pxc_strict_mode' => 'string'
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
        'pxc_strict_mode' => null
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
		'pxc_strict_mode' => false
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
        'pxc_strict_mode' => 'pxc_strict_mode'
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
        'pxc_strict_mode' => 'setPxcStrictMode'
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
        'pxc_strict_mode' => 'getPxcStrictMode'
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
     * @param string|null $query_cache_type Тип кэша запросов (`mysql5` | `mysql` | `mysql8_4`).
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
     * @param string|null $query_cache_size Объем памяти, выделяемый для кэширования результатов запросов (`mysql5` | `mysql` | `mysql8_4`).
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


