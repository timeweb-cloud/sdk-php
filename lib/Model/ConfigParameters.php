<?php
/**
 * ConfigParameters
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
 * ConfigParameters Class Doc Comment
 *
 * @category Class
 * @description Параметры базы данных
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class ConfigParameters implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'config-parameters';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'auto_increment_increment' => 'string',
        'auto_increment_offset' => 'string',
        'innodb_io_capacity' => 'string',
        'innodb_purge_threads' => 'string',
        'innodb_read_io_threads' => 'string',
        'innodb_thread_concurrency' => 'string',
        'innodb_write_io_threads' => 'string',
        'join_buffer_size' => 'string',
        'max_allowed_packet' => 'string',
        'max_heap_table_size' => 'string',
        'autovacuum_analyze_scale_factor' => 'string',
        'bgwriter_delay' => 'string',
        'bgwriter_lru_maxpages' => 'string',
        'deadlock_timeout' => 'string',
        'gin_pending_list_limit' => 'string',
        'idle_in_transaction_session_timeout' => 'string',
        'idle_session_timeout' => 'string',
        'join_collapse_limit' => 'string',
        'lock_timeout' => 'string',
        'max_prepared_transactions' => 'string',
        'max_connections' => 'string',
        'shared_buffers' => 'string',
        'wal_buffers' => 'string',
        'temp_buffers' => 'string',
        'work_mem' => 'string',
        'sql_mode' => 'string',
        'query_cache_type' => 'string',
        'query_cache_size' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'auto_increment_increment' => null,
        'auto_increment_offset' => null,
        'innodb_io_capacity' => null,
        'innodb_purge_threads' => null,
        'innodb_read_io_threads' => null,
        'innodb_thread_concurrency' => null,
        'innodb_write_io_threads' => null,
        'join_buffer_size' => null,
        'max_allowed_packet' => null,
        'max_heap_table_size' => null,
        'autovacuum_analyze_scale_factor' => null,
        'bgwriter_delay' => null,
        'bgwriter_lru_maxpages' => null,
        'deadlock_timeout' => null,
        'gin_pending_list_limit' => null,
        'idle_in_transaction_session_timeout' => null,
        'idle_session_timeout' => null,
        'join_collapse_limit' => null,
        'lock_timeout' => null,
        'max_prepared_transactions' => null,
        'max_connections' => null,
        'shared_buffers' => null,
        'wal_buffers' => null,
        'temp_buffers' => null,
        'work_mem' => null,
        'sql_mode' => null,
        'query_cache_type' => null,
        'query_cache_size' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'auto_increment_increment' => false,
		'auto_increment_offset' => false,
		'innodb_io_capacity' => false,
		'innodb_purge_threads' => false,
		'innodb_read_io_threads' => false,
		'innodb_thread_concurrency' => false,
		'innodb_write_io_threads' => false,
		'join_buffer_size' => false,
		'max_allowed_packet' => false,
		'max_heap_table_size' => false,
		'autovacuum_analyze_scale_factor' => false,
		'bgwriter_delay' => false,
		'bgwriter_lru_maxpages' => false,
		'deadlock_timeout' => false,
		'gin_pending_list_limit' => false,
		'idle_in_transaction_session_timeout' => false,
		'idle_session_timeout' => false,
		'join_collapse_limit' => false,
		'lock_timeout' => false,
		'max_prepared_transactions' => false,
		'max_connections' => false,
		'shared_buffers' => false,
		'wal_buffers' => false,
		'temp_buffers' => false,
		'work_mem' => false,
		'sql_mode' => false,
		'query_cache_type' => false,
		'query_cache_size' => false
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
        'auto_increment_increment' => 'auto_increment_increment',
        'auto_increment_offset' => 'auto_increment_offset',
        'innodb_io_capacity' => 'innodb_io_capacity',
        'innodb_purge_threads' => 'innodb_purge_threads',
        'innodb_read_io_threads' => 'innodb_read_io_threads',
        'innodb_thread_concurrency' => 'innodb_thread_concurrency',
        'innodb_write_io_threads' => 'innodb_write_io_threads',
        'join_buffer_size' => 'join_buffer_size',
        'max_allowed_packet' => 'max_allowed_packet',
        'max_heap_table_size' => 'max_heap_table_size',
        'autovacuum_analyze_scale_factor' => 'autovacuum_analyze_scale_factor',
        'bgwriter_delay' => 'bgwriter_delay',
        'bgwriter_lru_maxpages' => 'bgwriter_lru_maxpages',
        'deadlock_timeout' => 'deadlock_timeout',
        'gin_pending_list_limit' => 'gin_pending_list_limit',
        'idle_in_transaction_session_timeout' => 'idle_in_transaction_session_timeout',
        'idle_session_timeout' => 'idle_session_timeout',
        'join_collapse_limit' => 'join_collapse_limit',
        'lock_timeout' => 'lock_timeout',
        'max_prepared_transactions' => 'max_prepared_transactions',
        'max_connections' => 'max_connections',
        'shared_buffers' => 'shared_buffers',
        'wal_buffers' => 'wal_buffers',
        'temp_buffers' => 'temp_buffers',
        'work_mem' => 'work_mem',
        'sql_mode' => 'sql_mode',
        'query_cache_type' => 'query_cache_type',
        'query_cache_size' => 'query_cache_size'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'auto_increment_increment' => 'setAutoIncrementIncrement',
        'auto_increment_offset' => 'setAutoIncrementOffset',
        'innodb_io_capacity' => 'setInnodbIoCapacity',
        'innodb_purge_threads' => 'setInnodbPurgeThreads',
        'innodb_read_io_threads' => 'setInnodbReadIoThreads',
        'innodb_thread_concurrency' => 'setInnodbThreadConcurrency',
        'innodb_write_io_threads' => 'setInnodbWriteIoThreads',
        'join_buffer_size' => 'setJoinBufferSize',
        'max_allowed_packet' => 'setMaxAllowedPacket',
        'max_heap_table_size' => 'setMaxHeapTableSize',
        'autovacuum_analyze_scale_factor' => 'setAutovacuumAnalyzeScaleFactor',
        'bgwriter_delay' => 'setBgwriterDelay',
        'bgwriter_lru_maxpages' => 'setBgwriterLruMaxpages',
        'deadlock_timeout' => 'setDeadlockTimeout',
        'gin_pending_list_limit' => 'setGinPendingListLimit',
        'idle_in_transaction_session_timeout' => 'setIdleInTransactionSessionTimeout',
        'idle_session_timeout' => 'setIdleSessionTimeout',
        'join_collapse_limit' => 'setJoinCollapseLimit',
        'lock_timeout' => 'setLockTimeout',
        'max_prepared_transactions' => 'setMaxPreparedTransactions',
        'max_connections' => 'setMaxConnections',
        'shared_buffers' => 'setSharedBuffers',
        'wal_buffers' => 'setWalBuffers',
        'temp_buffers' => 'setTempBuffers',
        'work_mem' => 'setWorkMem',
        'sql_mode' => 'setSqlMode',
        'query_cache_type' => 'setQueryCacheType',
        'query_cache_size' => 'setQueryCacheSize'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'auto_increment_increment' => 'getAutoIncrementIncrement',
        'auto_increment_offset' => 'getAutoIncrementOffset',
        'innodb_io_capacity' => 'getInnodbIoCapacity',
        'innodb_purge_threads' => 'getInnodbPurgeThreads',
        'innodb_read_io_threads' => 'getInnodbReadIoThreads',
        'innodb_thread_concurrency' => 'getInnodbThreadConcurrency',
        'innodb_write_io_threads' => 'getInnodbWriteIoThreads',
        'join_buffer_size' => 'getJoinBufferSize',
        'max_allowed_packet' => 'getMaxAllowedPacket',
        'max_heap_table_size' => 'getMaxHeapTableSize',
        'autovacuum_analyze_scale_factor' => 'getAutovacuumAnalyzeScaleFactor',
        'bgwriter_delay' => 'getBgwriterDelay',
        'bgwriter_lru_maxpages' => 'getBgwriterLruMaxpages',
        'deadlock_timeout' => 'getDeadlockTimeout',
        'gin_pending_list_limit' => 'getGinPendingListLimit',
        'idle_in_transaction_session_timeout' => 'getIdleInTransactionSessionTimeout',
        'idle_session_timeout' => 'getIdleSessionTimeout',
        'join_collapse_limit' => 'getJoinCollapseLimit',
        'lock_timeout' => 'getLockTimeout',
        'max_prepared_transactions' => 'getMaxPreparedTransactions',
        'max_connections' => 'getMaxConnections',
        'shared_buffers' => 'getSharedBuffers',
        'wal_buffers' => 'getWalBuffers',
        'temp_buffers' => 'getTempBuffers',
        'work_mem' => 'getWorkMem',
        'sql_mode' => 'getSqlMode',
        'query_cache_type' => 'getQueryCacheType',
        'query_cache_size' => 'getQueryCacheSize'
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
        $this->setIfExists('auto_increment_increment', $data ?? [], null);
        $this->setIfExists('auto_increment_offset', $data ?? [], null);
        $this->setIfExists('innodb_io_capacity', $data ?? [], null);
        $this->setIfExists('innodb_purge_threads', $data ?? [], null);
        $this->setIfExists('innodb_read_io_threads', $data ?? [], null);
        $this->setIfExists('innodb_thread_concurrency', $data ?? [], null);
        $this->setIfExists('innodb_write_io_threads', $data ?? [], null);
        $this->setIfExists('join_buffer_size', $data ?? [], null);
        $this->setIfExists('max_allowed_packet', $data ?? [], null);
        $this->setIfExists('max_heap_table_size', $data ?? [], null);
        $this->setIfExists('autovacuum_analyze_scale_factor', $data ?? [], null);
        $this->setIfExists('bgwriter_delay', $data ?? [], null);
        $this->setIfExists('bgwriter_lru_maxpages', $data ?? [], null);
        $this->setIfExists('deadlock_timeout', $data ?? [], null);
        $this->setIfExists('gin_pending_list_limit', $data ?? [], null);
        $this->setIfExists('idle_in_transaction_session_timeout', $data ?? [], null);
        $this->setIfExists('idle_session_timeout', $data ?? [], null);
        $this->setIfExists('join_collapse_limit', $data ?? [], null);
        $this->setIfExists('lock_timeout', $data ?? [], null);
        $this->setIfExists('max_prepared_transactions', $data ?? [], null);
        $this->setIfExists('max_connections', $data ?? [], null);
        $this->setIfExists('shared_buffers', $data ?? [], null);
        $this->setIfExists('wal_buffers', $data ?? [], null);
        $this->setIfExists('temp_buffers', $data ?? [], null);
        $this->setIfExists('work_mem', $data ?? [], null);
        $this->setIfExists('sql_mode', $data ?? [], null);
        $this->setIfExists('query_cache_type', $data ?? [], null);
        $this->setIfExists('query_cache_size', $data ?? [], null);
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
     * @param string|null $auto_increment_increment Интервал между значениями столбцов с атрибутом `AUTO_INCREMENT` (`mysql5` | `mysql`).
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
     * @param string|null $auto_increment_offset Начальное значение для столбцов с атрибутом `AUTO_INCREMENT` (`mysql5` | `mysql`).
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
     * @param string|null $innodb_io_capacity Количество операций ввода-вывода в секунду `IOPS` (`mysql5` | `mysql`).
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
     * @param string|null $innodb_purge_threads Количество потоков ввода-вывода, используемых для операций очистки (`mysql5` | `mysql`).
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
     * @param string|null $innodb_read_io_threads Количество потоков ввода-вывода, используемых для операций чтения (`mysql5` | `mysql`).
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
     * @param string|null $innodb_thread_concurrency Максимальное число потоков, которые могут исполняться (`mysql5` | `mysql`).
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
     * @param string|null $innodb_write_io_threads Количество потоков ввода-вывода, используемых для операций записи (`mysql5` | `mysql`).
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
     * @param string|null $join_buffer_size Минимальный размер буфера (`mysql5` | `mysql`).
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
     * @param string|null $max_allowed_packet Максимальный размер одного пакета, строки или параметра, отправляемого функцией `mysql_stmt_send_long_data()` (`mysql5` | `mysql`).
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
     * @param string|null $max_heap_table_size Максимальный размер пользовательских MEMORY-таблиц (`mysql5` | `mysql`).
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
     * @param string|null $autovacuum_analyze_scale_factor Доля измененных или удаленных записей в таблице, при которой процесс автоочистки выполнит команду `ANALYZE` (`postgres` | `postgres14`| `postgres15`).
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
     * @param string|null $bgwriter_delay Задержка между запусками процесса фоновой записи (`postgres` | `postgres14`| `postgres15`).
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
     * @param string|null $bgwriter_lru_maxpages Максимальное число элементов буферного кеша (`postgres` | `postgres14`| `postgres15`).
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
     * @param string|null $deadlock_timeout Время ожидания, по истечении которого будет выполняться проверка состояния перекрестной блокировки (`postgres` | `postgres14`| `postgres15`).
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
     * @param string|null $gin_pending_list_limit Максимальный размер очереди записей индекса `GIN` (`postgres` | `postgres14`| `postgres15`).
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
     * @param string|null $idle_in_transaction_session_timeout Время простоя открытой транзакции, при превышении которого будет завершена сессия с этой транзакцией (`postgres` | `postgres14`| `postgres15`).
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
     * @param string|null $idle_session_timeout Время простоя не открытой транзакции, при превышении которого будет завершена сессия с этой транзакцией (`postgres` | `postgres14`| `postgres15`).
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
     * @param string|null $join_collapse_limit Значение количества элементов в списке `FROM` при превышении которого, планировщик будет переносить в список явные инструкции `JOIN` (`postgres` | `postgres14`| `postgres15`).
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
     * @param string|null $lock_timeout Время ожидания освобождения блокировки (`postgres` | `postgres14`| `postgres15`).
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
     * @param string|null $max_prepared_transactions Максимальное число транзакций, которые могут одновременно находиться в подготовленном состоянии (`postgres` | `postgres14`| `postgres15`).
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
     * @param string|null $max_connections Допустимое количество соединений (`postgres` | `postgres14`| `postgres15` | `mysql`).
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
     * @param string|null $shared_buffers Устанавливает количество буферов общей памяти, используемых сервером (`postgres` | `postgres14`| `postgres15`).
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
     * @param string|null $wal_buffers Устанавливает количество буферов дисковых страниц в общей памяти для WAL (`postgres` | `postgres14`| `postgres15`).
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
     * @param string|null $temp_buffers Устанавливает максимальное количество временных буферов, используемых каждой сессией (`postgres` | `postgres14`| `postgres15`).
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
     * @param string|null $work_mem Устанавливает максимальное количество памяти, используемое для рабочих пространств запросов (`postgres` | `postgres14`| `postgres15`).
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
     * @param string|null $sql_mode Устанавливает режим SQL. Можно задать несколько режимов, разделяя их запятой. (`mysql`).
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
     * @param string|null $query_cache_type Параметр включает или отключает работу MySQL Query Cache (`mysql`).
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
     * @param string|null $query_cache_size Размер в байтах, доступный для кэша запросов (`mysql`).
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


