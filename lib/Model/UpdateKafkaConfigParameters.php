<?php
/**
 * UpdateKafkaConfigParameters
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
 * UpdateKafkaConfigParameters Class Doc Comment
 *
 * @category Class
 * @description Настройки топика Kafka. Передаются только для кластеров Kafka: для кластеров других типов запрос вернется с ошибкой &#x60;forbidden_change_configuration&#x60;. Не переданные параметры получают значения по умолчанию. Числовые значения можно передавать как числом, так и строкой.
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class UpdateKafkaConfigParameters implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'update-kafka-config-parameters';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'partitions' => 'int',
        'cleanup_policy' => 'string',
        'compression_type' => 'string',
        'delete_retention_ms' => 'int',
        'file_delete_delay_ms' => 'int',
        'flush_messages' => 'int',
        'flush_ms' => 'int',
        'index_interval_bytes' => 'int',
        'min_compaction_lag_ms' => 'int',
        'max_compaction_lag_ms' => 'int',
        'max_message_bytes' => 'int',
        'message_format_version' => 'string',
        'message_timestamp_difference_max_ms' => 'int',
        'message_downconversion_enable' => 'string',
        'message_timestamp_type' => 'string',
        'min_cleanable_dirty_ratio' => 'float',
        'min_insync_replicas' => 'int',
        'preallocate' => 'string',
        'retention_bytes' => 'int',
        'retention_ms' => 'int',
        'segment_bytes' => 'int',
        'segment_index_bytes' => 'int',
        'segment_jitter_ms' => 'int',
        'segment_ms' => 'int',
        'unclean_leader_election_enable' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'partitions' => null,
        'cleanup_policy' => null,
        'compression_type' => null,
        'delete_retention_ms' => 'int64',
        'file_delete_delay_ms' => 'int64',
        'flush_messages' => 'int64',
        'flush_ms' => 'int64',
        'index_interval_bytes' => null,
        'min_compaction_lag_ms' => 'int64',
        'max_compaction_lag_ms' => 'int64',
        'max_message_bytes' => null,
        'message_format_version' => null,
        'message_timestamp_difference_max_ms' => 'int64',
        'message_downconversion_enable' => null,
        'message_timestamp_type' => null,
        'min_cleanable_dirty_ratio' => null,
        'min_insync_replicas' => null,
        'preallocate' => null,
        'retention_bytes' => 'int64',
        'retention_ms' => 'int64',
        'segment_bytes' => null,
        'segment_index_bytes' => null,
        'segment_jitter_ms' => 'int64',
        'segment_ms' => 'int64',
        'unclean_leader_election_enable' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'partitions' => false,
		'cleanup_policy' => false,
		'compression_type' => false,
		'delete_retention_ms' => false,
		'file_delete_delay_ms' => false,
		'flush_messages' => false,
		'flush_ms' => false,
		'index_interval_bytes' => false,
		'min_compaction_lag_ms' => false,
		'max_compaction_lag_ms' => false,
		'max_message_bytes' => false,
		'message_format_version' => false,
		'message_timestamp_difference_max_ms' => false,
		'message_downconversion_enable' => false,
		'message_timestamp_type' => false,
		'min_cleanable_dirty_ratio' => false,
		'min_insync_replicas' => false,
		'preallocate' => false,
		'retention_bytes' => false,
		'retention_ms' => false,
		'segment_bytes' => false,
		'segment_index_bytes' => false,
		'segment_jitter_ms' => false,
		'segment_ms' => false,
		'unclean_leader_election_enable' => false
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
        'partitions' => 'partitions',
        'cleanup_policy' => 'cleanup_policy',
        'compression_type' => 'compression_type',
        'delete_retention_ms' => 'delete_retention_ms',
        'file_delete_delay_ms' => 'file_delete_delay_ms',
        'flush_messages' => 'flush_messages',
        'flush_ms' => 'flush_ms',
        'index_interval_bytes' => 'index_interval_bytes',
        'min_compaction_lag_ms' => 'min_compaction_lag_ms',
        'max_compaction_lag_ms' => 'max_compaction_lag_ms',
        'max_message_bytes' => 'max_message_bytes',
        'message_format_version' => 'message_format_version',
        'message_timestamp_difference_max_ms' => 'message_timestamp_difference_max_ms',
        'message_downconversion_enable' => 'message_downconversion_enable',
        'message_timestamp_type' => 'message_timestamp_type',
        'min_cleanable_dirty_ratio' => 'min_cleanable_dirty_ratio',
        'min_insync_replicas' => 'min_insync_replicas',
        'preallocate' => 'preallocate',
        'retention_bytes' => 'retention_bytes',
        'retention_ms' => 'retention_ms',
        'segment_bytes' => 'segment_bytes',
        'segment_index_bytes' => 'segment_index_bytes',
        'segment_jitter_ms' => 'segment_jitter_ms',
        'segment_ms' => 'segment_ms',
        'unclean_leader_election_enable' => 'unclean_leader_election_enable'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'partitions' => 'setPartitions',
        'cleanup_policy' => 'setCleanupPolicy',
        'compression_type' => 'setCompressionType',
        'delete_retention_ms' => 'setDeleteRetentionMs',
        'file_delete_delay_ms' => 'setFileDeleteDelayMs',
        'flush_messages' => 'setFlushMessages',
        'flush_ms' => 'setFlushMs',
        'index_interval_bytes' => 'setIndexIntervalBytes',
        'min_compaction_lag_ms' => 'setMinCompactionLagMs',
        'max_compaction_lag_ms' => 'setMaxCompactionLagMs',
        'max_message_bytes' => 'setMaxMessageBytes',
        'message_format_version' => 'setMessageFormatVersion',
        'message_timestamp_difference_max_ms' => 'setMessageTimestampDifferenceMaxMs',
        'message_downconversion_enable' => 'setMessageDownconversionEnable',
        'message_timestamp_type' => 'setMessageTimestampType',
        'min_cleanable_dirty_ratio' => 'setMinCleanableDirtyRatio',
        'min_insync_replicas' => 'setMinInsyncReplicas',
        'preallocate' => 'setPreallocate',
        'retention_bytes' => 'setRetentionBytes',
        'retention_ms' => 'setRetentionMs',
        'segment_bytes' => 'setSegmentBytes',
        'segment_index_bytes' => 'setSegmentIndexBytes',
        'segment_jitter_ms' => 'setSegmentJitterMs',
        'segment_ms' => 'setSegmentMs',
        'unclean_leader_election_enable' => 'setUncleanLeaderElectionEnable'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'partitions' => 'getPartitions',
        'cleanup_policy' => 'getCleanupPolicy',
        'compression_type' => 'getCompressionType',
        'delete_retention_ms' => 'getDeleteRetentionMs',
        'file_delete_delay_ms' => 'getFileDeleteDelayMs',
        'flush_messages' => 'getFlushMessages',
        'flush_ms' => 'getFlushMs',
        'index_interval_bytes' => 'getIndexIntervalBytes',
        'min_compaction_lag_ms' => 'getMinCompactionLagMs',
        'max_compaction_lag_ms' => 'getMaxCompactionLagMs',
        'max_message_bytes' => 'getMaxMessageBytes',
        'message_format_version' => 'getMessageFormatVersion',
        'message_timestamp_difference_max_ms' => 'getMessageTimestampDifferenceMaxMs',
        'message_downconversion_enable' => 'getMessageDownconversionEnable',
        'message_timestamp_type' => 'getMessageTimestampType',
        'min_cleanable_dirty_ratio' => 'getMinCleanableDirtyRatio',
        'min_insync_replicas' => 'getMinInsyncReplicas',
        'preallocate' => 'getPreallocate',
        'retention_bytes' => 'getRetentionBytes',
        'retention_ms' => 'getRetentionMs',
        'segment_bytes' => 'getSegmentBytes',
        'segment_index_bytes' => 'getSegmentIndexBytes',
        'segment_jitter_ms' => 'getSegmentJitterMs',
        'segment_ms' => 'getSegmentMs',
        'unclean_leader_election_enable' => 'getUncleanLeaderElectionEnable'
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

    public const CLEANUP_POLICY_DELETE = 'delete';
    public const CLEANUP_POLICY_COMPACT = 'compact';
    public const COMPRESSION_TYPE_UNCOMPRESSED = 'uncompressed';
    public const COMPRESSION_TYPE_ZSTD = 'zstd';
    public const COMPRESSION_TYPE_LZ4 = 'lz4';
    public const COMPRESSION_TYPE_SNAPPY = 'snappy';
    public const COMPRESSION_TYPE_GZIP = 'gzip';
    public const COMPRESSION_TYPE_PRODUCER = 'producer';
    public const MESSAGE_FORMAT_VERSION__0_8_0 = '0.8.0';
    public const MESSAGE_FORMAT_VERSION__0_8_1 = '0.8.1';
    public const MESSAGE_FORMAT_VERSION__0_8_2 = '0.8.2';
    public const MESSAGE_FORMAT_VERSION__0_9_0 = '0.9.0';
    public const MESSAGE_FORMAT_VERSION__0_10_0_IV0 = '0.10.0-IV0';
    public const MESSAGE_FORMAT_VERSION__0_10_0_IV1 = '0.10.0-IV1';
    public const MESSAGE_FORMAT_VERSION__0_10_1_IV0 = '0.10.1-IV0';
    public const MESSAGE_FORMAT_VERSION__0_10_1_IV1 = '0.10.1-IV1';
    public const MESSAGE_FORMAT_VERSION__0_10_1_IV2 = '0.10.1-IV2';
    public const MESSAGE_FORMAT_VERSION__0_10_2_IV0 = '0.10.2-IV0';
    public const MESSAGE_FORMAT_VERSION__0_11_0_IV0 = '0.11.0-IV0';
    public const MESSAGE_FORMAT_VERSION__0_11_0_IV1 = '0.11.0-IV1';
    public const MESSAGE_FORMAT_VERSION__0_11_0_IV2 = '0.11.0-IV2';
    public const MESSAGE_FORMAT_VERSION__1_0_IV0 = '1.0-IV0';
    public const MESSAGE_FORMAT_VERSION__1_1_IV0 = '1.1-IV0';
    public const MESSAGE_FORMAT_VERSION__2_0_IV0 = '2.0-IV0';
    public const MESSAGE_FORMAT_VERSION__2_0_IV1 = '2.0-IV1';
    public const MESSAGE_FORMAT_VERSION__2_1_IV0 = '2.1-IV0';
    public const MESSAGE_FORMAT_VERSION__2_1_IV1 = '2.1-IV1';
    public const MESSAGE_FORMAT_VERSION__2_1_IV2 = '2.1-IV2';
    public const MESSAGE_FORMAT_VERSION__2_2_IV0 = '2.2-IV0';
    public const MESSAGE_FORMAT_VERSION__2_2_IV1 = '2.2-IV1';
    public const MESSAGE_FORMAT_VERSION__2_3_IV0 = '2.3-IV0';
    public const MESSAGE_FORMAT_VERSION__2_3_IV1 = '2.3-IV1';
    public const MESSAGE_FORMAT_VERSION__2_4_IV0 = '2.4-IV0';
    public const MESSAGE_FORMAT_VERSION__2_4_IV1 = '2.4-IV1';
    public const MESSAGE_FORMAT_VERSION__2_5_IV0 = '2.5-IV0';
    public const MESSAGE_FORMAT_VERSION__2_6_IV0 = '2.6-IV0';
    public const MESSAGE_FORMAT_VERSION__2_7_IV0 = '2.7-IV0';
    public const MESSAGE_FORMAT_VERSION__2_7_IV1 = '2.7-IV1';
    public const MESSAGE_FORMAT_VERSION__2_7_IV2 = '2.7-IV2';
    public const MESSAGE_FORMAT_VERSION__2_8_IV0 = '2.8-IV0';
    public const MESSAGE_FORMAT_VERSION__2_8_IV1 = '2.8-IV1';
    public const MESSAGE_FORMAT_VERSION__3_0_IV0 = '3.0-IV0';
    public const MESSAGE_FORMAT_VERSION__3_0_IV1 = '3.0-IV1';
    public const MESSAGE_FORMAT_VERSION__3_1_IV0 = '3.1-IV0';
    public const MESSAGE_FORMAT_VERSION__3_2_IV0 = '3.2-IV0';
    public const MESSAGE_FORMAT_VERSION__3_3_IV0 = '3.3-IV0';
    public const MESSAGE_FORMAT_VERSION__3_3_IV1 = '3.3-IV1';
    public const MESSAGE_FORMAT_VERSION__3_3_IV2 = '3.3-IV2';
    public const MESSAGE_FORMAT_VERSION__3_3_IV3 = '3.3-IV3';
    public const MESSAGE_FORMAT_VERSION__3_4_IV0 = '3.4-IV0';
    public const MESSAGE_FORMAT_VERSION__3_5_IV0 = '3.5-IV0';
    public const MESSAGE_FORMAT_VERSION__3_5_IV1 = '3.5-IV1';
    public const MESSAGE_FORMAT_VERSION__3_5_IV2 = '3.5-IV2';
    public const MESSAGE_DOWNCONVERSION_ENABLE_ON = 'ON';
    public const MESSAGE_DOWNCONVERSION_ENABLE_OFF = 'OFF';
    public const MESSAGE_TIMESTAMP_TYPE_CREATE_TIME = 'CreateTime';
    public const MESSAGE_TIMESTAMP_TYPE_LOG_APPEND_TIME = 'LogAppendTime';
    public const PREALLOCATE_ON = 'ON';
    public const PREALLOCATE_OFF = 'OFF';
    public const UNCLEAN_LEADER_ELECTION_ENABLE_ON = 'ON';
    public const UNCLEAN_LEADER_ELECTION_ENABLE_OFF = 'OFF';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getCleanupPolicyAllowableValues()
    {
        return [
            self::CLEANUP_POLICY_DELETE,
            self::CLEANUP_POLICY_COMPACT,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getCompressionTypeAllowableValues()
    {
        return [
            self::COMPRESSION_TYPE_UNCOMPRESSED,
            self::COMPRESSION_TYPE_ZSTD,
            self::COMPRESSION_TYPE_LZ4,
            self::COMPRESSION_TYPE_SNAPPY,
            self::COMPRESSION_TYPE_GZIP,
            self::COMPRESSION_TYPE_PRODUCER,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getMessageFormatVersionAllowableValues()
    {
        return [
            self::MESSAGE_FORMAT_VERSION__0_8_0,
            self::MESSAGE_FORMAT_VERSION__0_8_1,
            self::MESSAGE_FORMAT_VERSION__0_8_2,
            self::MESSAGE_FORMAT_VERSION__0_9_0,
            self::MESSAGE_FORMAT_VERSION__0_10_0_IV0,
            self::MESSAGE_FORMAT_VERSION__0_10_0_IV1,
            self::MESSAGE_FORMAT_VERSION__0_10_1_IV0,
            self::MESSAGE_FORMAT_VERSION__0_10_1_IV1,
            self::MESSAGE_FORMAT_VERSION__0_10_1_IV2,
            self::MESSAGE_FORMAT_VERSION__0_10_2_IV0,
            self::MESSAGE_FORMAT_VERSION__0_11_0_IV0,
            self::MESSAGE_FORMAT_VERSION__0_11_0_IV1,
            self::MESSAGE_FORMAT_VERSION__0_11_0_IV2,
            self::MESSAGE_FORMAT_VERSION__1_0_IV0,
            self::MESSAGE_FORMAT_VERSION__1_1_IV0,
            self::MESSAGE_FORMAT_VERSION__2_0_IV0,
            self::MESSAGE_FORMAT_VERSION__2_0_IV1,
            self::MESSAGE_FORMAT_VERSION__2_1_IV0,
            self::MESSAGE_FORMAT_VERSION__2_1_IV1,
            self::MESSAGE_FORMAT_VERSION__2_1_IV2,
            self::MESSAGE_FORMAT_VERSION__2_2_IV0,
            self::MESSAGE_FORMAT_VERSION__2_2_IV1,
            self::MESSAGE_FORMAT_VERSION__2_3_IV0,
            self::MESSAGE_FORMAT_VERSION__2_3_IV1,
            self::MESSAGE_FORMAT_VERSION__2_4_IV0,
            self::MESSAGE_FORMAT_VERSION__2_4_IV1,
            self::MESSAGE_FORMAT_VERSION__2_5_IV0,
            self::MESSAGE_FORMAT_VERSION__2_6_IV0,
            self::MESSAGE_FORMAT_VERSION__2_7_IV0,
            self::MESSAGE_FORMAT_VERSION__2_7_IV1,
            self::MESSAGE_FORMAT_VERSION__2_7_IV2,
            self::MESSAGE_FORMAT_VERSION__2_8_IV0,
            self::MESSAGE_FORMAT_VERSION__2_8_IV1,
            self::MESSAGE_FORMAT_VERSION__3_0_IV0,
            self::MESSAGE_FORMAT_VERSION__3_0_IV1,
            self::MESSAGE_FORMAT_VERSION__3_1_IV0,
            self::MESSAGE_FORMAT_VERSION__3_2_IV0,
            self::MESSAGE_FORMAT_VERSION__3_3_IV0,
            self::MESSAGE_FORMAT_VERSION__3_3_IV1,
            self::MESSAGE_FORMAT_VERSION__3_3_IV2,
            self::MESSAGE_FORMAT_VERSION__3_3_IV3,
            self::MESSAGE_FORMAT_VERSION__3_4_IV0,
            self::MESSAGE_FORMAT_VERSION__3_5_IV0,
            self::MESSAGE_FORMAT_VERSION__3_5_IV1,
            self::MESSAGE_FORMAT_VERSION__3_5_IV2,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getMessageDownconversionEnableAllowableValues()
    {
        return [
            self::MESSAGE_DOWNCONVERSION_ENABLE_ON,
            self::MESSAGE_DOWNCONVERSION_ENABLE_OFF,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getMessageTimestampTypeAllowableValues()
    {
        return [
            self::MESSAGE_TIMESTAMP_TYPE_CREATE_TIME,
            self::MESSAGE_TIMESTAMP_TYPE_LOG_APPEND_TIME,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getPreallocateAllowableValues()
    {
        return [
            self::PREALLOCATE_ON,
            self::PREALLOCATE_OFF,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getUncleanLeaderElectionEnableAllowableValues()
    {
        return [
            self::UNCLEAN_LEADER_ELECTION_ENABLE_ON,
            self::UNCLEAN_LEADER_ELECTION_ENABLE_OFF,
        ];
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
        $this->setIfExists('partitions', $data ?? [], null);
        $this->setIfExists('cleanup_policy', $data ?? [], null);
        $this->setIfExists('compression_type', $data ?? [], null);
        $this->setIfExists('delete_retention_ms', $data ?? [], null);
        $this->setIfExists('file_delete_delay_ms', $data ?? [], null);
        $this->setIfExists('flush_messages', $data ?? [], null);
        $this->setIfExists('flush_ms', $data ?? [], null);
        $this->setIfExists('index_interval_bytes', $data ?? [], null);
        $this->setIfExists('min_compaction_lag_ms', $data ?? [], null);
        $this->setIfExists('max_compaction_lag_ms', $data ?? [], null);
        $this->setIfExists('max_message_bytes', $data ?? [], null);
        $this->setIfExists('message_format_version', $data ?? [], null);
        $this->setIfExists('message_timestamp_difference_max_ms', $data ?? [], null);
        $this->setIfExists('message_downconversion_enable', $data ?? [], null);
        $this->setIfExists('message_timestamp_type', $data ?? [], null);
        $this->setIfExists('min_cleanable_dirty_ratio', $data ?? [], null);
        $this->setIfExists('min_insync_replicas', $data ?? [], null);
        $this->setIfExists('preallocate', $data ?? [], null);
        $this->setIfExists('retention_bytes', $data ?? [], null);
        $this->setIfExists('retention_ms', $data ?? [], null);
        $this->setIfExists('segment_bytes', $data ?? [], null);
        $this->setIfExists('segment_index_bytes', $data ?? [], null);
        $this->setIfExists('segment_jitter_ms', $data ?? [], null);
        $this->setIfExists('segment_ms', $data ?? [], null);
        $this->setIfExists('unclean_leader_election_enable', $data ?? [], null);
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

        if (!is_null($this->container['partitions']) && ($this->container['partitions'] > 4294967295)) {
            $invalidProperties[] = "invalid value for 'partitions', must be smaller than or equal to 4294967295.";
        }

        if (!is_null($this->container['partitions']) && ($this->container['partitions'] < 1)) {
            $invalidProperties[] = "invalid value for 'partitions', must be bigger than or equal to 1.";
        }

        $allowedValues = $this->getCleanupPolicyAllowableValues();
        if (!is_null($this->container['cleanup_policy']) && !in_array($this->container['cleanup_policy'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'cleanup_policy', must be one of '%s'",
                $this->container['cleanup_policy'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getCompressionTypeAllowableValues();
        if (!is_null($this->container['compression_type']) && !in_array($this->container['compression_type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'compression_type', must be one of '%s'",
                $this->container['compression_type'],
                implode("', '", $allowedValues)
            );
        }

        if (!is_null($this->container['delete_retention_ms']) && ($this->container['delete_retention_ms'] < 0)) {
            $invalidProperties[] = "invalid value for 'delete_retention_ms', must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['file_delete_delay_ms']) && ($this->container['file_delete_delay_ms'] < 0)) {
            $invalidProperties[] = "invalid value for 'file_delete_delay_ms', must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['flush_messages']) && ($this->container['flush_messages'] < 1)) {
            $invalidProperties[] = "invalid value for 'flush_messages', must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['flush_ms']) && ($this->container['flush_ms'] < 0)) {
            $invalidProperties[] = "invalid value for 'flush_ms', must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['index_interval_bytes']) && ($this->container['index_interval_bytes'] > 4294967295)) {
            $invalidProperties[] = "invalid value for 'index_interval_bytes', must be smaller than or equal to 4294967295.";
        }

        if (!is_null($this->container['index_interval_bytes']) && ($this->container['index_interval_bytes'] < 0)) {
            $invalidProperties[] = "invalid value for 'index_interval_bytes', must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['min_compaction_lag_ms']) && ($this->container['min_compaction_lag_ms'] < 0)) {
            $invalidProperties[] = "invalid value for 'min_compaction_lag_ms', must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['max_compaction_lag_ms']) && ($this->container['max_compaction_lag_ms'] < 0)) {
            $invalidProperties[] = "invalid value for 'max_compaction_lag_ms', must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['max_message_bytes']) && ($this->container['max_message_bytes'] > 4294967295)) {
            $invalidProperties[] = "invalid value for 'max_message_bytes', must be smaller than or equal to 4294967295.";
        }

        if (!is_null($this->container['max_message_bytes']) && ($this->container['max_message_bytes'] < 0)) {
            $invalidProperties[] = "invalid value for 'max_message_bytes', must be bigger than or equal to 0.";
        }

        $allowedValues = $this->getMessageFormatVersionAllowableValues();
        if (!is_null($this->container['message_format_version']) && !in_array($this->container['message_format_version'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'message_format_version', must be one of '%s'",
                $this->container['message_format_version'],
                implode("', '", $allowedValues)
            );
        }

        if (!is_null($this->container['message_timestamp_difference_max_ms']) && ($this->container['message_timestamp_difference_max_ms'] < 0)) {
            $invalidProperties[] = "invalid value for 'message_timestamp_difference_max_ms', must be bigger than or equal to 0.";
        }

        $allowedValues = $this->getMessageDownconversionEnableAllowableValues();
        if (!is_null($this->container['message_downconversion_enable']) && !in_array($this->container['message_downconversion_enable'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'message_downconversion_enable', must be one of '%s'",
                $this->container['message_downconversion_enable'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getMessageTimestampTypeAllowableValues();
        if (!is_null($this->container['message_timestamp_type']) && !in_array($this->container['message_timestamp_type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'message_timestamp_type', must be one of '%s'",
                $this->container['message_timestamp_type'],
                implode("', '", $allowedValues)
            );
        }

        if (!is_null($this->container['min_cleanable_dirty_ratio']) && ($this->container['min_cleanable_dirty_ratio'] > 1)) {
            $invalidProperties[] = "invalid value for 'min_cleanable_dirty_ratio', must be smaller than or equal to 1.";
        }

        if (!is_null($this->container['min_cleanable_dirty_ratio']) && ($this->container['min_cleanable_dirty_ratio'] < 0)) {
            $invalidProperties[] = "invalid value for 'min_cleanable_dirty_ratio', must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['min_insync_replicas']) && ($this->container['min_insync_replicas'] > 4294967295)) {
            $invalidProperties[] = "invalid value for 'min_insync_replicas', must be smaller than or equal to 4294967295.";
        }

        if (!is_null($this->container['min_insync_replicas']) && ($this->container['min_insync_replicas'] < 0)) {
            $invalidProperties[] = "invalid value for 'min_insync_replicas', must be bigger than or equal to 0.";
        }

        $allowedValues = $this->getPreallocateAllowableValues();
        if (!is_null($this->container['preallocate']) && !in_array($this->container['preallocate'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'preallocate', must be one of '%s'",
                $this->container['preallocate'],
                implode("', '", $allowedValues)
            );
        }

        if (!is_null($this->container['retention_bytes']) && ($this->container['retention_bytes'] < -1)) {
            $invalidProperties[] = "invalid value for 'retention_bytes', must be bigger than or equal to -1.";
        }

        if (!is_null($this->container['retention_ms']) && ($this->container['retention_ms'] < -1)) {
            $invalidProperties[] = "invalid value for 'retention_ms', must be bigger than or equal to -1.";
        }

        if (!is_null($this->container['segment_bytes']) && ($this->container['segment_bytes'] > 4294967295)) {
            $invalidProperties[] = "invalid value for 'segment_bytes', must be smaller than or equal to 4294967295.";
        }

        if (!is_null($this->container['segment_bytes']) && ($this->container['segment_bytes'] < 14)) {
            $invalidProperties[] = "invalid value for 'segment_bytes', must be bigger than or equal to 14.";
        }

        if (!is_null($this->container['segment_index_bytes']) && ($this->container['segment_index_bytes'] > 4294967295)) {
            $invalidProperties[] = "invalid value for 'segment_index_bytes', must be smaller than or equal to 4294967295.";
        }

        if (!is_null($this->container['segment_index_bytes']) && ($this->container['segment_index_bytes'] < 4)) {
            $invalidProperties[] = "invalid value for 'segment_index_bytes', must be bigger than or equal to 4.";
        }

        if (!is_null($this->container['segment_jitter_ms']) && ($this->container['segment_jitter_ms'] < 0)) {
            $invalidProperties[] = "invalid value for 'segment_jitter_ms', must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['segment_ms']) && ($this->container['segment_ms'] < 1)) {
            $invalidProperties[] = "invalid value for 'segment_ms', must be bigger than or equal to 1.";
        }

        $allowedValues = $this->getUncleanLeaderElectionEnableAllowableValues();
        if (!is_null($this->container['unclean_leader_election_enable']) && !in_array($this->container['unclean_leader_election_enable'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'unclean_leader_election_enable', must be one of '%s'",
                $this->container['unclean_leader_election_enable'],
                implode("', '", $allowedValues)
            );
        }

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
     * Gets partitions
     *
     * @return int|null
     */
    public function getPartitions()
    {
        return $this->container['partitions'];
    }

    /**
     * Sets partitions
     *
     * @param int|null $partitions Количество партиций топика. Количество партиций нельзя уменьшить: если передать значение меньше текущего, останется текущее.
     *
     * @return self
     */
    public function setPartitions($partitions)
    {
        if (is_null($partitions)) {
            throw new \InvalidArgumentException('non-nullable partitions cannot be null');
        }

        if (($partitions > 4294967295)) {
            throw new \InvalidArgumentException('invalid value for $partitions when calling UpdateKafkaConfigParameters., must be smaller than or equal to 4294967295.');
        }
        if (($partitions < 1)) {
            throw new \InvalidArgumentException('invalid value for $partitions when calling UpdateKafkaConfigParameters., must be bigger than or equal to 1.');
        }

        $this->container['partitions'] = $partitions;

        return $this;
    }

    /**
     * Gets cleanup_policy
     *
     * @return string|null
     */
    public function getCleanupPolicy()
    {
        return $this->container['cleanup_policy'];
    }

    /**
     * Sets cleanup_policy
     *
     * @param string|null $cleanup_policy Политика очистки старых сегментов лога: `delete` — удалять, `compact` — уплотнять.
     *
     * @return self
     */
    public function setCleanupPolicy($cleanup_policy)
    {
        if (is_null($cleanup_policy)) {
            throw new \InvalidArgumentException('non-nullable cleanup_policy cannot be null');
        }
        $allowedValues = $this->getCleanupPolicyAllowableValues();
        if (!in_array($cleanup_policy, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'cleanup_policy', must be one of '%s'",
                    $cleanup_policy,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['cleanup_policy'] = $cleanup_policy;

        return $this;
    }

    /**
     * Gets compression_type
     *
     * @return string|null
     */
    public function getCompressionType()
    {
        return $this->container['compression_type'];
    }

    /**
     * Sets compression_type
     *
     * @param string|null $compression_type Тип сжатия сообщений в топике.
     *
     * @return self
     */
    public function setCompressionType($compression_type)
    {
        if (is_null($compression_type)) {
            throw new \InvalidArgumentException('non-nullable compression_type cannot be null');
        }
        $allowedValues = $this->getCompressionTypeAllowableValues();
        if (!in_array($compression_type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'compression_type', must be one of '%s'",
                    $compression_type,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['compression_type'] = $compression_type;

        return $this;
    }

    /**
     * Gets delete_retention_ms
     *
     * @return int|null
     */
    public function getDeleteRetentionMs()
    {
        return $this->container['delete_retention_ms'];
    }

    /**
     * Sets delete_retention_ms
     *
     * @param int|null $delete_retention_ms Время (в мс) хранения меток удаления для уплотняемых топиков. Максимальное значение — 9223372036854775807.
     *
     * @return self
     */
    public function setDeleteRetentionMs($delete_retention_ms)
    {
        if (is_null($delete_retention_ms)) {
            throw new \InvalidArgumentException('non-nullable delete_retention_ms cannot be null');
        }

        if (($delete_retention_ms < 0)) {
            throw new \InvalidArgumentException('invalid value for $delete_retention_ms when calling UpdateKafkaConfigParameters., must be bigger than or equal to 0.');
        }

        $this->container['delete_retention_ms'] = $delete_retention_ms;

        return $this;
    }

    /**
     * Gets file_delete_delay_ms
     *
     * @return int|null
     */
    public function getFileDeleteDelayMs()
    {
        return $this->container['file_delete_delay_ms'];
    }

    /**
     * Sets file_delete_delay_ms
     *
     * @param int|null $file_delete_delay_ms Задержка (в мс) перед удалением файла из файловой системы. Максимальное значение — 9223372036854775807.
     *
     * @return self
     */
    public function setFileDeleteDelayMs($file_delete_delay_ms)
    {
        if (is_null($file_delete_delay_ms)) {
            throw new \InvalidArgumentException('non-nullable file_delete_delay_ms cannot be null');
        }

        if (($file_delete_delay_ms < 0)) {
            throw new \InvalidArgumentException('invalid value for $file_delete_delay_ms when calling UpdateKafkaConfigParameters., must be bigger than or equal to 0.');
        }

        $this->container['file_delete_delay_ms'] = $file_delete_delay_ms;

        return $this;
    }

    /**
     * Gets flush_messages
     *
     * @return int|null
     */
    public function getFlushMessages()
    {
        return $this->container['flush_messages'];
    }

    /**
     * Sets flush_messages
     *
     * @param int|null $flush_messages Количество сообщений, после которого данные принудительно сбрасываются на диск. Максимальное значение — 9223372036854775807.
     *
     * @return self
     */
    public function setFlushMessages($flush_messages)
    {
        if (is_null($flush_messages)) {
            throw new \InvalidArgumentException('non-nullable flush_messages cannot be null');
        }

        if (($flush_messages < 1)) {
            throw new \InvalidArgumentException('invalid value for $flush_messages when calling UpdateKafkaConfigParameters., must be bigger than or equal to 1.');
        }

        $this->container['flush_messages'] = $flush_messages;

        return $this;
    }

    /**
     * Gets flush_ms
     *
     * @return int|null
     */
    public function getFlushMs()
    {
        return $this->container['flush_ms'];
    }

    /**
     * Sets flush_ms
     *
     * @param int|null $flush_ms Интервал (в мс), после которого данные принудительно сбрасываются на диск. Максимальное значение — 9223372036854775807.
     *
     * @return self
     */
    public function setFlushMs($flush_ms)
    {
        if (is_null($flush_ms)) {
            throw new \InvalidArgumentException('non-nullable flush_ms cannot be null');
        }

        if (($flush_ms < 0)) {
            throw new \InvalidArgumentException('invalid value for $flush_ms when calling UpdateKafkaConfigParameters., must be bigger than or equal to 0.');
        }

        $this->container['flush_ms'] = $flush_ms;

        return $this;
    }

    /**
     * Gets index_interval_bytes
     *
     * @return int|null
     */
    public function getIndexIntervalBytes()
    {
        return $this->container['index_interval_bytes'];
    }

    /**
     * Sets index_interval_bytes
     *
     * @param int|null $index_interval_bytes Интервал (в байтах), с которым Kafka добавляет запись в индекс смещений.
     *
     * @return self
     */
    public function setIndexIntervalBytes($index_interval_bytes)
    {
        if (is_null($index_interval_bytes)) {
            throw new \InvalidArgumentException('non-nullable index_interval_bytes cannot be null');
        }

        if (($index_interval_bytes > 4294967295)) {
            throw new \InvalidArgumentException('invalid value for $index_interval_bytes when calling UpdateKafkaConfigParameters., must be smaller than or equal to 4294967295.');
        }
        if (($index_interval_bytes < 0)) {
            throw new \InvalidArgumentException('invalid value for $index_interval_bytes when calling UpdateKafkaConfigParameters., must be bigger than or equal to 0.');
        }

        $this->container['index_interval_bytes'] = $index_interval_bytes;

        return $this;
    }

    /**
     * Gets min_compaction_lag_ms
     *
     * @return int|null
     */
    public function getMinCompactionLagMs()
    {
        return $this->container['min_compaction_lag_ms'];
    }

    /**
     * Sets min_compaction_lag_ms
     *
     * @param int|null $min_compaction_lag_ms Минимальное время (в мс), в течение которого сообщение остается неуплотненным. Максимальное значение — 9223372036854775807.
     *
     * @return self
     */
    public function setMinCompactionLagMs($min_compaction_lag_ms)
    {
        if (is_null($min_compaction_lag_ms)) {
            throw new \InvalidArgumentException('non-nullable min_compaction_lag_ms cannot be null');
        }

        if (($min_compaction_lag_ms < 0)) {
            throw new \InvalidArgumentException('invalid value for $min_compaction_lag_ms when calling UpdateKafkaConfigParameters., must be bigger than or equal to 0.');
        }

        $this->container['min_compaction_lag_ms'] = $min_compaction_lag_ms;

        return $this;
    }

    /**
     * Gets max_compaction_lag_ms
     *
     * @return int|null
     */
    public function getMaxCompactionLagMs()
    {
        return $this->container['max_compaction_lag_ms'];
    }

    /**
     * Sets max_compaction_lag_ms
     *
     * @param int|null $max_compaction_lag_ms Максимальное время (в мс), в течение которого сообщение может оставаться неуплотненным. Максимальное значение — 9223372036854775807.
     *
     * @return self
     */
    public function setMaxCompactionLagMs($max_compaction_lag_ms)
    {
        if (is_null($max_compaction_lag_ms)) {
            throw new \InvalidArgumentException('non-nullable max_compaction_lag_ms cannot be null');
        }

        if (($max_compaction_lag_ms < 0)) {
            throw new \InvalidArgumentException('invalid value for $max_compaction_lag_ms when calling UpdateKafkaConfigParameters., must be bigger than or equal to 0.');
        }

        $this->container['max_compaction_lag_ms'] = $max_compaction_lag_ms;

        return $this;
    }

    /**
     * Gets max_message_bytes
     *
     * @return int|null
     */
    public function getMaxMessageBytes()
    {
        return $this->container['max_message_bytes'];
    }

    /**
     * Sets max_message_bytes
     *
     * @param int|null $max_message_bytes Максимальный размер (в байтах) пакета сообщений.
     *
     * @return self
     */
    public function setMaxMessageBytes($max_message_bytes)
    {
        if (is_null($max_message_bytes)) {
            throw new \InvalidArgumentException('non-nullable max_message_bytes cannot be null');
        }

        if (($max_message_bytes > 4294967295)) {
            throw new \InvalidArgumentException('invalid value for $max_message_bytes when calling UpdateKafkaConfigParameters., must be smaller than or equal to 4294967295.');
        }
        if (($max_message_bytes < 0)) {
            throw new \InvalidArgumentException('invalid value for $max_message_bytes when calling UpdateKafkaConfigParameters., must be bigger than or equal to 0.');
        }

        $this->container['max_message_bytes'] = $max_message_bytes;

        return $this;
    }

    /**
     * Gets message_format_version
     *
     * @return string|null
     */
    public function getMessageFormatVersion()
    {
        return $this->container['message_format_version'];
    }

    /**
     * Sets message_format_version
     *
     * @param string|null $message_format_version Версия формата сообщений, в котором Kafka добавляет сообщения в лог.
     *
     * @return self
     */
    public function setMessageFormatVersion($message_format_version)
    {
        if (is_null($message_format_version)) {
            throw new \InvalidArgumentException('non-nullable message_format_version cannot be null');
        }
        $allowedValues = $this->getMessageFormatVersionAllowableValues();
        if (!in_array($message_format_version, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'message_format_version', must be one of '%s'",
                    $message_format_version,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['message_format_version'] = $message_format_version;

        return $this;
    }

    /**
     * Gets message_timestamp_difference_max_ms
     *
     * @return int|null
     */
    public function getMessageTimestampDifferenceMaxMs()
    {
        return $this->container['message_timestamp_difference_max_ms'];
    }

    /**
     * Sets message_timestamp_difference_max_ms
     *
     * @param int|null $message_timestamp_difference_max_ms Максимально допустимая разница (в мс) между временной меткой сообщения и временем его получения брокером. Максимальное значение — 9223372036854775807.
     *
     * @return self
     */
    public function setMessageTimestampDifferenceMaxMs($message_timestamp_difference_max_ms)
    {
        if (is_null($message_timestamp_difference_max_ms)) {
            throw new \InvalidArgumentException('non-nullable message_timestamp_difference_max_ms cannot be null');
        }

        if (($message_timestamp_difference_max_ms < 0)) {
            throw new \InvalidArgumentException('invalid value for $message_timestamp_difference_max_ms when calling UpdateKafkaConfigParameters., must be bigger than or equal to 0.');
        }

        $this->container['message_timestamp_difference_max_ms'] = $message_timestamp_difference_max_ms;

        return $this;
    }

    /**
     * Gets message_downconversion_enable
     *
     * @return string|null
     */
    public function getMessageDownconversionEnable()
    {
        return $this->container['message_downconversion_enable'];
    }

    /**
     * Sets message_downconversion_enable
     *
     * @param string|null $message_downconversion_enable Понижение версии формата сообщений для старых клиентов.
     *
     * @return self
     */
    public function setMessageDownconversionEnable($message_downconversion_enable)
    {
        if (is_null($message_downconversion_enable)) {
            throw new \InvalidArgumentException('non-nullable message_downconversion_enable cannot be null');
        }
        $allowedValues = $this->getMessageDownconversionEnableAllowableValues();
        if (!in_array($message_downconversion_enable, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'message_downconversion_enable', must be one of '%s'",
                    $message_downconversion_enable,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['message_downconversion_enable'] = $message_downconversion_enable;

        return $this;
    }

    /**
     * Gets message_timestamp_type
     *
     * @return string|null
     */
    public function getMessageTimestampType()
    {
        return $this->container['message_timestamp_type'];
    }

    /**
     * Sets message_timestamp_type
     *
     * @param string|null $message_timestamp_type Источник временной метки сообщения: `CreateTime` — время создания сообщения клиентом, `LogAppendTime` — время добавления сообщения в лог брокером.
     *
     * @return self
     */
    public function setMessageTimestampType($message_timestamp_type)
    {
        if (is_null($message_timestamp_type)) {
            throw new \InvalidArgumentException('non-nullable message_timestamp_type cannot be null');
        }
        $allowedValues = $this->getMessageTimestampTypeAllowableValues();
        if (!in_array($message_timestamp_type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'message_timestamp_type', must be one of '%s'",
                    $message_timestamp_type,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['message_timestamp_type'] = $message_timestamp_type;

        return $this;
    }

    /**
     * Gets min_cleanable_dirty_ratio
     *
     * @return float|null
     */
    public function getMinCleanableDirtyRatio()
    {
        return $this->container['min_cleanable_dirty_ratio'];
    }

    /**
     * Sets min_cleanable_dirty_ratio
     *
     * @param float|null $min_cleanable_dirty_ratio Доля неуплотненных данных в логе, при которой запускается уплотнение.
     *
     * @return self
     */
    public function setMinCleanableDirtyRatio($min_cleanable_dirty_ratio)
    {
        if (is_null($min_cleanable_dirty_ratio)) {
            throw new \InvalidArgumentException('non-nullable min_cleanable_dirty_ratio cannot be null');
        }

        if (($min_cleanable_dirty_ratio > 1)) {
            throw new \InvalidArgumentException('invalid value for $min_cleanable_dirty_ratio when calling UpdateKafkaConfigParameters., must be smaller than or equal to 1.');
        }
        if (($min_cleanable_dirty_ratio < 0)) {
            throw new \InvalidArgumentException('invalid value for $min_cleanable_dirty_ratio when calling UpdateKafkaConfigParameters., must be bigger than or equal to 0.');
        }

        $this->container['min_cleanable_dirty_ratio'] = $min_cleanable_dirty_ratio;

        return $this;
    }

    /**
     * Gets min_insync_replicas
     *
     * @return int|null
     */
    public function getMinInsyncReplicas()
    {
        return $this->container['min_insync_replicas'];
    }

    /**
     * Sets min_insync_replicas
     *
     * @param int|null $min_insync_replicas Минимальное количество синхронизированных реплик, необходимое для подтверждения записи.
     *
     * @return self
     */
    public function setMinInsyncReplicas($min_insync_replicas)
    {
        if (is_null($min_insync_replicas)) {
            throw new \InvalidArgumentException('non-nullable min_insync_replicas cannot be null');
        }

        if (($min_insync_replicas > 4294967295)) {
            throw new \InvalidArgumentException('invalid value for $min_insync_replicas when calling UpdateKafkaConfigParameters., must be smaller than or equal to 4294967295.');
        }
        if (($min_insync_replicas < 0)) {
            throw new \InvalidArgumentException('invalid value for $min_insync_replicas when calling UpdateKafkaConfigParameters., must be bigger than or equal to 0.');
        }

        $this->container['min_insync_replicas'] = $min_insync_replicas;

        return $this;
    }

    /**
     * Gets preallocate
     *
     * @return string|null
     */
    public function getPreallocate()
    {
        return $this->container['preallocate'];
    }

    /**
     * Sets preallocate
     *
     * @param string|null $preallocate Предварительное выделение места на диске при создании нового сегмента лога.
     *
     * @return self
     */
    public function setPreallocate($preallocate)
    {
        if (is_null($preallocate)) {
            throw new \InvalidArgumentException('non-nullable preallocate cannot be null');
        }
        $allowedValues = $this->getPreallocateAllowableValues();
        if (!in_array($preallocate, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'preallocate', must be one of '%s'",
                    $preallocate,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['preallocate'] = $preallocate;

        return $this;
    }

    /**
     * Gets retention_bytes
     *
     * @return int|null
     */
    public function getRetentionBytes()
    {
        return $this->container['retention_bytes'];
    }

    /**
     * Sets retention_bytes
     *
     * @param int|null $retention_bytes Максимальный размер (в байтах) партиции топика, после которого старые сегменты удаляются. `-1` — без ограничения. Максимальное значение — 9223372036854775807.
     *
     * @return self
     */
    public function setRetentionBytes($retention_bytes)
    {
        if (is_null($retention_bytes)) {
            throw new \InvalidArgumentException('non-nullable retention_bytes cannot be null');
        }

        if (($retention_bytes < -1)) {
            throw new \InvalidArgumentException('invalid value for $retention_bytes when calling UpdateKafkaConfigParameters., must be bigger than or equal to -1.');
        }

        $this->container['retention_bytes'] = $retention_bytes;

        return $this;
    }

    /**
     * Gets retention_ms
     *
     * @return int|null
     */
    public function getRetentionMs()
    {
        return $this->container['retention_ms'];
    }

    /**
     * Sets retention_ms
     *
     * @param int|null $retention_ms Время (в мс) хранения сообщений в топике. `-1` — хранить бессрочно. Максимальное значение — 9223372036854775807.
     *
     * @return self
     */
    public function setRetentionMs($retention_ms)
    {
        if (is_null($retention_ms)) {
            throw new \InvalidArgumentException('non-nullable retention_ms cannot be null');
        }

        if (($retention_ms < -1)) {
            throw new \InvalidArgumentException('invalid value for $retention_ms when calling UpdateKafkaConfigParameters., must be bigger than or equal to -1.');
        }

        $this->container['retention_ms'] = $retention_ms;

        return $this;
    }

    /**
     * Gets segment_bytes
     *
     * @return int|null
     */
    public function getSegmentBytes()
    {
        return $this->container['segment_bytes'];
    }

    /**
     * Sets segment_bytes
     *
     * @param int|null $segment_bytes Максимальный размер (в байтах) одного сегмента лога.
     *
     * @return self
     */
    public function setSegmentBytes($segment_bytes)
    {
        if (is_null($segment_bytes)) {
            throw new \InvalidArgumentException('non-nullable segment_bytes cannot be null');
        }

        if (($segment_bytes > 4294967295)) {
            throw new \InvalidArgumentException('invalid value for $segment_bytes when calling UpdateKafkaConfigParameters., must be smaller than or equal to 4294967295.');
        }
        if (($segment_bytes < 14)) {
            throw new \InvalidArgumentException('invalid value for $segment_bytes when calling UpdateKafkaConfigParameters., must be bigger than or equal to 14.');
        }

        $this->container['segment_bytes'] = $segment_bytes;

        return $this;
    }

    /**
     * Gets segment_index_bytes
     *
     * @return int|null
     */
    public function getSegmentIndexBytes()
    {
        return $this->container['segment_index_bytes'];
    }

    /**
     * Sets segment_index_bytes
     *
     * @param int|null $segment_index_bytes Максимальный размер (в байтах) индексного файла сегмента лога.
     *
     * @return self
     */
    public function setSegmentIndexBytes($segment_index_bytes)
    {
        if (is_null($segment_index_bytes)) {
            throw new \InvalidArgumentException('non-nullable segment_index_bytes cannot be null');
        }

        if (($segment_index_bytes > 4294967295)) {
            throw new \InvalidArgumentException('invalid value for $segment_index_bytes when calling UpdateKafkaConfigParameters., must be smaller than or equal to 4294967295.');
        }
        if (($segment_index_bytes < 4)) {
            throw new \InvalidArgumentException('invalid value for $segment_index_bytes when calling UpdateKafkaConfigParameters., must be bigger than or equal to 4.');
        }

        $this->container['segment_index_bytes'] = $segment_index_bytes;

        return $this;
    }

    /**
     * Gets segment_jitter_ms
     *
     * @return int|null
     */
    public function getSegmentJitterMs()
    {
        return $this->container['segment_jitter_ms'];
    }

    /**
     * Sets segment_jitter_ms
     *
     * @param int|null $segment_jitter_ms Максимальное случайное отклонение (в мс) от времени ротации сегмента. Максимальное значение — 9223372036854775807.
     *
     * @return self
     */
    public function setSegmentJitterMs($segment_jitter_ms)
    {
        if (is_null($segment_jitter_ms)) {
            throw new \InvalidArgumentException('non-nullable segment_jitter_ms cannot be null');
        }

        if (($segment_jitter_ms < 0)) {
            throw new \InvalidArgumentException('invalid value for $segment_jitter_ms when calling UpdateKafkaConfigParameters., must be bigger than or equal to 0.');
        }

        $this->container['segment_jitter_ms'] = $segment_jitter_ms;

        return $this;
    }

    /**
     * Gets segment_ms
     *
     * @return int|null
     */
    public function getSegmentMs()
    {
        return $this->container['segment_ms'];
    }

    /**
     * Sets segment_ms
     *
     * @param int|null $segment_ms Период (в мс), после которого Kafka создает новый сегмент лога. Максимальное значение — 9223372036854775807.
     *
     * @return self
     */
    public function setSegmentMs($segment_ms)
    {
        if (is_null($segment_ms)) {
            throw new \InvalidArgumentException('non-nullable segment_ms cannot be null');
        }

        if (($segment_ms < 1)) {
            throw new \InvalidArgumentException('invalid value for $segment_ms when calling UpdateKafkaConfigParameters., must be bigger than or equal to 1.');
        }

        $this->container['segment_ms'] = $segment_ms;

        return $this;
    }

    /**
     * Gets unclean_leader_election_enable
     *
     * @return string|null
     */
    public function getUncleanLeaderElectionEnable()
    {
        return $this->container['unclean_leader_election_enable'];
    }

    /**
     * Sets unclean_leader_election_enable
     *
     * @param string|null $unclean_leader_election_enable Возможность выбрать лидером партиции реплику, которая не входит в число синхронизированных.
     *
     * @return self
     */
    public function setUncleanLeaderElectionEnable($unclean_leader_election_enable)
    {
        if (is_null($unclean_leader_election_enable)) {
            throw new \InvalidArgumentException('non-nullable unclean_leader_election_enable cannot be null');
        }
        $allowedValues = $this->getUncleanLeaderElectionEnableAllowableValues();
        if (!in_array($unclean_leader_election_enable, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'unclean_leader_election_enable', must be one of '%s'",
                    $unclean_leader_election_enable,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['unclean_leader_election_enable'] = $unclean_leader_election_enable;

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


