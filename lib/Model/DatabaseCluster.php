<?php
/**
 * DatabaseCluster
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
 * DatabaseCluster Class Doc Comment
 *
 * @category Class
 * @description Кластер базы данных
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class DatabaseCluster implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'database-cluster';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'id' => 'float',
        'created_at' => 'string',
        'location' => 'string',
        'name' => 'string',
        'description' => 'string',
        'networks' => '\OpenAPI\Client\Model\DatabaseClusterNetworksInner[]',
        'is_enabled_public_ipv6' => 'bool',
        'type' => 'string',
        'hash_type' => 'string',
        'avatar_link' => 'string',
        'port' => 'int',
        'status' => 'string',
        'preset_id' => 'int',
        'configurator_id' => 'int',
        'cpu' => 'int',
        'cpu_frequency' => 'string',
        'is_dedicated_cpu' => 'bool',
        'ram' => 'int',
        'disk' => '\OpenAPI\Client\Model\DatabaseClusterDisk',
        'has_additional_disk' => 'bool',
        'disk_autoscaling' => '\OpenAPI\Client\Model\DatabaseClusterDiskAutoscaling',
        'config_parameters' => '\OpenAPI\Client\Model\Mysql',
        'is_enabled_public_network' => 'bool',
        'is_secure_connection_enabled' => 'bool',
        'is_autobackups_enabled' => 'bool',
        'is_backup_schedule_enabled' => 'bool',
        'availability_zone' => '\OpenAPI\Client\Model\AvailabilityZone',
        'project_id' => 'int',
        'replica_list' => '\OpenAPI\Client\Model\DatabaseClusterReplicaListInner[]',
        'domains' => '\OpenAPI\Client\Model\DatabaseClusterDomainsInner[]',
        'child_services' => '\OpenAPI\Client\Model\DatabaseClusterChildServicesInner[]',
        'parent_services' => '\OpenAPI\Client\Model\DatabaseClusterParentServicesInner[]',
        'maintenance_slot' => '\OpenAPI\Client\Model\DatabaseClusterMaintenanceSlot'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'id' => null,
        'created_at' => null,
        'location' => null,
        'name' => null,
        'description' => null,
        'networks' => null,
        'is_enabled_public_ipv6' => null,
        'type' => null,
        'hash_type' => null,
        'avatar_link' => null,
        'port' => null,
        'status' => null,
        'preset_id' => null,
        'configurator_id' => null,
        'cpu' => null,
        'cpu_frequency' => null,
        'is_dedicated_cpu' => null,
        'ram' => null,
        'disk' => null,
        'has_additional_disk' => null,
        'disk_autoscaling' => null,
        'config_parameters' => null,
        'is_enabled_public_network' => null,
        'is_secure_connection_enabled' => null,
        'is_autobackups_enabled' => null,
        'is_backup_schedule_enabled' => null,
        'availability_zone' => null,
        'project_id' => null,
        'replica_list' => null,
        'domains' => null,
        'child_services' => null,
        'parent_services' => null,
        'maintenance_slot' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'id' => false,
		'created_at' => false,
		'location' => true,
		'name' => false,
		'description' => false,
		'networks' => false,
		'is_enabled_public_ipv6' => false,
		'type' => true,
		'hash_type' => true,
		'avatar_link' => true,
		'port' => true,
		'status' => false,
		'preset_id' => true,
		'configurator_id' => true,
		'cpu' => true,
		'cpu_frequency' => true,
		'is_dedicated_cpu' => false,
		'ram' => true,
		'disk' => true,
		'has_additional_disk' => false,
		'disk_autoscaling' => true,
		'config_parameters' => false,
		'is_enabled_public_network' => false,
		'is_secure_connection_enabled' => false,
		'is_autobackups_enabled' => false,
		'is_backup_schedule_enabled' => false,
		'availability_zone' => false,
		'project_id' => false,
		'replica_list' => false,
		'domains' => false,
		'child_services' => false,
		'parent_services' => false,
		'maintenance_slot' => false
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
        'id' => 'id',
        'created_at' => 'created_at',
        'location' => 'location',
        'name' => 'name',
        'description' => 'description',
        'networks' => 'networks',
        'is_enabled_public_ipv6' => 'is_enabled_public_ipv6',
        'type' => 'type',
        'hash_type' => 'hash_type',
        'avatar_link' => 'avatar_link',
        'port' => 'port',
        'status' => 'status',
        'preset_id' => 'preset_id',
        'configurator_id' => 'configurator_id',
        'cpu' => 'cpu',
        'cpu_frequency' => 'cpu_frequency',
        'is_dedicated_cpu' => 'is_dedicated_cpu',
        'ram' => 'ram',
        'disk' => 'disk',
        'has_additional_disk' => 'has_additional_disk',
        'disk_autoscaling' => 'disk_autoscaling',
        'config_parameters' => 'config_parameters',
        'is_enabled_public_network' => 'is_enabled_public_network',
        'is_secure_connection_enabled' => 'is_secure_connection_enabled',
        'is_autobackups_enabled' => 'is_autobackups_enabled',
        'is_backup_schedule_enabled' => 'is_backup_schedule_enabled',
        'availability_zone' => 'availability_zone',
        'project_id' => 'project_id',
        'replica_list' => 'replica_list',
        'domains' => 'domains',
        'child_services' => 'child_services',
        'parent_services' => 'parent_services',
        'maintenance_slot' => 'maintenance_slot'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'created_at' => 'setCreatedAt',
        'location' => 'setLocation',
        'name' => 'setName',
        'description' => 'setDescription',
        'networks' => 'setNetworks',
        'is_enabled_public_ipv6' => 'setIsEnabledPublicIpv6',
        'type' => 'setType',
        'hash_type' => 'setHashType',
        'avatar_link' => 'setAvatarLink',
        'port' => 'setPort',
        'status' => 'setStatus',
        'preset_id' => 'setPresetId',
        'configurator_id' => 'setConfiguratorId',
        'cpu' => 'setCpu',
        'cpu_frequency' => 'setCpuFrequency',
        'is_dedicated_cpu' => 'setIsDedicatedCpu',
        'ram' => 'setRam',
        'disk' => 'setDisk',
        'has_additional_disk' => 'setHasAdditionalDisk',
        'disk_autoscaling' => 'setDiskAutoscaling',
        'config_parameters' => 'setConfigParameters',
        'is_enabled_public_network' => 'setIsEnabledPublicNetwork',
        'is_secure_connection_enabled' => 'setIsSecureConnectionEnabled',
        'is_autobackups_enabled' => 'setIsAutobackupsEnabled',
        'is_backup_schedule_enabled' => 'setIsBackupScheduleEnabled',
        'availability_zone' => 'setAvailabilityZone',
        'project_id' => 'setProjectId',
        'replica_list' => 'setReplicaList',
        'domains' => 'setDomains',
        'child_services' => 'setChildServices',
        'parent_services' => 'setParentServices',
        'maintenance_slot' => 'setMaintenanceSlot'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'created_at' => 'getCreatedAt',
        'location' => 'getLocation',
        'name' => 'getName',
        'description' => 'getDescription',
        'networks' => 'getNetworks',
        'is_enabled_public_ipv6' => 'getIsEnabledPublicIpv6',
        'type' => 'getType',
        'hash_type' => 'getHashType',
        'avatar_link' => 'getAvatarLink',
        'port' => 'getPort',
        'status' => 'getStatus',
        'preset_id' => 'getPresetId',
        'configurator_id' => 'getConfiguratorId',
        'cpu' => 'getCpu',
        'cpu_frequency' => 'getCpuFrequency',
        'is_dedicated_cpu' => 'getIsDedicatedCpu',
        'ram' => 'getRam',
        'disk' => 'getDisk',
        'has_additional_disk' => 'getHasAdditionalDisk',
        'disk_autoscaling' => 'getDiskAutoscaling',
        'config_parameters' => 'getConfigParameters',
        'is_enabled_public_network' => 'getIsEnabledPublicNetwork',
        'is_secure_connection_enabled' => 'getIsSecureConnectionEnabled',
        'is_autobackups_enabled' => 'getIsAutobackupsEnabled',
        'is_backup_schedule_enabled' => 'getIsBackupScheduleEnabled',
        'availability_zone' => 'getAvailabilityZone',
        'project_id' => 'getProjectId',
        'replica_list' => 'getReplicaList',
        'domains' => 'getDomains',
        'child_services' => 'getChildServices',
        'parent_services' => 'getParentServices',
        'maintenance_slot' => 'getMaintenanceSlot'
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

    public const LOCATION_RU_1 = 'ru-1';
    public const LOCATION_RU_3 = 'ru-3';
    public const LOCATION_PL_1 = 'pl-1';
    public const LOCATION_NL_1 = 'nl-1';
    public const LOCATION_DE_1 = 'de-1';
    public const LOCATION_US_2 = 'us-2';
    public const LOCATION_US_3 = 'us-3';
    public const TYPE_MYSQL = 'mysql';
    public const TYPE_MYSQL5 = 'mysql5';
    public const TYPE_MYSQL8_4 = 'mysql8_4';
    public const TYPE_POSTGRES = 'postgres';
    public const TYPE_POSTGRES14 = 'postgres14';
    public const TYPE_POSTGRES15 = 'postgres15';
    public const TYPE_POSTGRES16 = 'postgres16';
    public const TYPE_POSTGRES17 = 'postgres17';
    public const TYPE_POSTGRES18 = 'postgres18';
    public const TYPE_REDIS = 'redis';
    public const TYPE_REDIS7 = 'redis7';
    public const TYPE_REDIS8_1 = 'redis8_1';
    public const TYPE_VALKEY = 'valkey';
    public const TYPE_VALKEY7 = 'valkey7';
    public const TYPE_VALKEY8_1 = 'valkey8_1';
    public const TYPE_VALKEY9_1 = 'valkey9_1';
    public const TYPE_MONGODB = 'mongodb';
    public const TYPE_MONGODB4 = 'mongodb4';
    public const TYPE_MONGODB6 = 'mongodb6';
    public const TYPE_MONGODB7 = 'mongodb7';
    public const TYPE_MONGODB8_0 = 'mongodb8_0';
    public const TYPE_OPENSEARCH = 'opensearch';
    public const TYPE_OPENSEARCH2_19 = 'opensearch2_19';
    public const TYPE_CLICKHOUSE = 'clickhouse';
    public const TYPE_CLICKHOUSE24 = 'clickhouse24';
    public const TYPE_CLICKHOUSE25 = 'clickhouse25';
    public const TYPE_KAFKA = 'kafka';
    public const TYPE_RABBITMQ = 'rabbitmq';
    public const TYPE_RABBITMQ4_0 = 'rabbitmq4_0';
    public const HASH_TYPE_CACHING_SHA2 = 'caching_sha2';
    public const HASH_TYPE_MYSQL_NATIVE = 'mysql_native';
    public const HASH_TYPE_NULL = 'null';
    public const STATUS_STARTED = 'started';
    public const STATUS_STARTING = 'starting';
    public const STATUS_STOPPED = 'stopped';
    public const STATUS_NO_PAID = 'no_paid';
    public const STATUS_LAN_TRANSFER = 'lan_transfer';
    public const STATUS_ERROR = 'error';
    public const STATUS_BLOCKED = 'blocked';
    public const STATUS_BACKUP_RECOVERY = 'backup_recovery';
    public const STATUS_TRANSFER = 'transfer';
    public const STATUS_REBOOTING = 'rebooting';
    public const STATUS_TURNING_OFF = 'turning_off';
    public const STATUS_TURNING_ON = 'turning_on';
    public const STATUS_READ_ONLY = 'read_only';
    public const STATUS_USER_TRANSFER = 'user_transfer';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getLocationAllowableValues()
    {
        return [
            self::LOCATION_RU_1,
            self::LOCATION_RU_3,
            self::LOCATION_PL_1,
            self::LOCATION_NL_1,
            self::LOCATION_DE_1,
            self::LOCATION_US_2,
            self::LOCATION_US_3,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getTypeAllowableValues()
    {
        return [
            self::TYPE_MYSQL,
            self::TYPE_MYSQL5,
            self::TYPE_MYSQL8_4,
            self::TYPE_POSTGRES,
            self::TYPE_POSTGRES14,
            self::TYPE_POSTGRES15,
            self::TYPE_POSTGRES16,
            self::TYPE_POSTGRES17,
            self::TYPE_POSTGRES18,
            self::TYPE_REDIS,
            self::TYPE_REDIS7,
            self::TYPE_REDIS8_1,
            self::TYPE_VALKEY,
            self::TYPE_VALKEY7,
            self::TYPE_VALKEY8_1,
            self::TYPE_VALKEY9_1,
            self::TYPE_MONGODB,
            self::TYPE_MONGODB4,
            self::TYPE_MONGODB6,
            self::TYPE_MONGODB7,
            self::TYPE_MONGODB8_0,
            self::TYPE_OPENSEARCH,
            self::TYPE_OPENSEARCH2_19,
            self::TYPE_CLICKHOUSE,
            self::TYPE_CLICKHOUSE24,
            self::TYPE_CLICKHOUSE25,
            self::TYPE_KAFKA,
            self::TYPE_RABBITMQ,
            self::TYPE_RABBITMQ4_0,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getHashTypeAllowableValues()
    {
        return [
            self::HASH_TYPE_CACHING_SHA2,
            self::HASH_TYPE_MYSQL_NATIVE,
            self::HASH_TYPE_NULL,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStatusAllowableValues()
    {
        return [
            self::STATUS_STARTED,
            self::STATUS_STARTING,
            self::STATUS_STOPPED,
            self::STATUS_NO_PAID,
            self::STATUS_LAN_TRANSFER,
            self::STATUS_ERROR,
            self::STATUS_BLOCKED,
            self::STATUS_BACKUP_RECOVERY,
            self::STATUS_TRANSFER,
            self::STATUS_REBOOTING,
            self::STATUS_TURNING_OFF,
            self::STATUS_TURNING_ON,
            self::STATUS_READ_ONLY,
            self::STATUS_USER_TRANSFER,
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
        $this->setIfExists('id', $data ?? [], null);
        $this->setIfExists('created_at', $data ?? [], null);
        $this->setIfExists('location', $data ?? [], null);
        $this->setIfExists('name', $data ?? [], null);
        $this->setIfExists('description', $data ?? [], null);
        $this->setIfExists('networks', $data ?? [], null);
        $this->setIfExists('is_enabled_public_ipv6', $data ?? [], null);
        $this->setIfExists('type', $data ?? [], null);
        $this->setIfExists('hash_type', $data ?? [], null);
        $this->setIfExists('avatar_link', $data ?? [], null);
        $this->setIfExists('port', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
        $this->setIfExists('preset_id', $data ?? [], null);
        $this->setIfExists('configurator_id', $data ?? [], null);
        $this->setIfExists('cpu', $data ?? [], null);
        $this->setIfExists('cpu_frequency', $data ?? [], null);
        $this->setIfExists('is_dedicated_cpu', $data ?? [], null);
        $this->setIfExists('ram', $data ?? [], null);
        $this->setIfExists('disk', $data ?? [], null);
        $this->setIfExists('has_additional_disk', $data ?? [], null);
        $this->setIfExists('disk_autoscaling', $data ?? [], null);
        $this->setIfExists('config_parameters', $data ?? [], null);
        $this->setIfExists('is_enabled_public_network', $data ?? [], null);
        $this->setIfExists('is_secure_connection_enabled', $data ?? [], null);
        $this->setIfExists('is_autobackups_enabled', $data ?? [], null);
        $this->setIfExists('is_backup_schedule_enabled', $data ?? [], null);
        $this->setIfExists('availability_zone', $data ?? [], null);
        $this->setIfExists('project_id', $data ?? [], null);
        $this->setIfExists('replica_list', $data ?? [], null);
        $this->setIfExists('domains', $data ?? [], null);
        $this->setIfExists('child_services', $data ?? [], null);
        $this->setIfExists('parent_services', $data ?? [], null);
        $this->setIfExists('maintenance_slot', $data ?? [], null);
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

        if ($this->container['id'] === null) {
            $invalidProperties[] = "'id' can't be null";
        }
        if ($this->container['created_at'] === null) {
            $invalidProperties[] = "'created_at' can't be null";
        }
        if ($this->container['location'] === null) {
            $invalidProperties[] = "'location' can't be null";
        }
        $allowedValues = $this->getLocationAllowableValues();
        if (!is_null($this->container['location']) && !in_array($this->container['location'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'location', must be one of '%s'",
                $this->container['location'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['name'] === null) {
            $invalidProperties[] = "'name' can't be null";
        }
        if ($this->container['description'] === null) {
            $invalidProperties[] = "'description' can't be null";
        }
        if ($this->container['networks'] === null) {
            $invalidProperties[] = "'networks' can't be null";
        }
        if ($this->container['is_enabled_public_ipv6'] === null) {
            $invalidProperties[] = "'is_enabled_public_ipv6' can't be null";
        }
        if ($this->container['type'] === null) {
            $invalidProperties[] = "'type' can't be null";
        }
        $allowedValues = $this->getTypeAllowableValues();
        if (!is_null($this->container['type']) && !in_array($this->container['type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'type', must be one of '%s'",
                $this->container['type'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['hash_type'] === null) {
            $invalidProperties[] = "'hash_type' can't be null";
        }
        $allowedValues = $this->getHashTypeAllowableValues();
        if (!is_null($this->container['hash_type']) && !in_array($this->container['hash_type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'hash_type', must be one of '%s'",
                $this->container['hash_type'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['avatar_link'] === null) {
            $invalidProperties[] = "'avatar_link' can't be null";
        }
        if ($this->container['port'] === null) {
            $invalidProperties[] = "'port' can't be null";
        }
        if ($this->container['status'] === null) {
            $invalidProperties[] = "'status' can't be null";
        }
        $allowedValues = $this->getStatusAllowableValues();
        if (!is_null($this->container['status']) && !in_array($this->container['status'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'status', must be one of '%s'",
                $this->container['status'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['preset_id'] === null) {
            $invalidProperties[] = "'preset_id' can't be null";
        }
        if ($this->container['configurator_id'] === null) {
            $invalidProperties[] = "'configurator_id' can't be null";
        }
        if ($this->container['cpu'] === null) {
            $invalidProperties[] = "'cpu' can't be null";
        }
        if ($this->container['cpu_frequency'] === null) {
            $invalidProperties[] = "'cpu_frequency' can't be null";
        }
        if ($this->container['is_dedicated_cpu'] === null) {
            $invalidProperties[] = "'is_dedicated_cpu' can't be null";
        }
        if ($this->container['ram'] === null) {
            $invalidProperties[] = "'ram' can't be null";
        }
        if ($this->container['disk'] === null) {
            $invalidProperties[] = "'disk' can't be null";
        }
        if ($this->container['has_additional_disk'] === null) {
            $invalidProperties[] = "'has_additional_disk' can't be null";
        }
        if ($this->container['disk_autoscaling'] === null) {
            $invalidProperties[] = "'disk_autoscaling' can't be null";
        }
        if ($this->container['config_parameters'] === null) {
            $invalidProperties[] = "'config_parameters' can't be null";
        }
        if ($this->container['is_enabled_public_network'] === null) {
            $invalidProperties[] = "'is_enabled_public_network' can't be null";
        }
        if ($this->container['is_secure_connection_enabled'] === null) {
            $invalidProperties[] = "'is_secure_connection_enabled' can't be null";
        }
        if ($this->container['is_autobackups_enabled'] === null) {
            $invalidProperties[] = "'is_autobackups_enabled' can't be null";
        }
        if ($this->container['is_backup_schedule_enabled'] === null) {
            $invalidProperties[] = "'is_backup_schedule_enabled' can't be null";
        }
        if ($this->container['availability_zone'] === null) {
            $invalidProperties[] = "'availability_zone' can't be null";
        }
        if ($this->container['replica_list'] === null) {
            $invalidProperties[] = "'replica_list' can't be null";
        }
        if ($this->container['domains'] === null) {
            $invalidProperties[] = "'domains' can't be null";
        }
        if ($this->container['child_services'] === null) {
            $invalidProperties[] = "'child_services' can't be null";
        }
        if ($this->container['parent_services'] === null) {
            $invalidProperties[] = "'parent_services' can't be null";
        }
        if ($this->container['maintenance_slot'] === null) {
            $invalidProperties[] = "'maintenance_slot' can't be null";
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
     * Gets id
     *
     * @return float
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param float $id ID для каждого экземпляра базы данных. Автоматически генерируется при создании.
     *
     * @return self
     */
    public function setId($id)
    {
        if (is_null($id)) {
            throw new \InvalidArgumentException('non-nullable id cannot be null');
        }
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets created_at
     *
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->container['created_at'];
    }

    /**
     * Sets created_at
     *
     * @param string $created_at Значение времени, указанное в комбинированном формате даты и времени ISO8601, которое представляет, когда была создана база данных.
     *
     * @return self
     */
    public function setCreatedAt($created_at)
    {
        if (is_null($created_at)) {
            throw new \InvalidArgumentException('non-nullable created_at cannot be null');
        }
        $this->container['created_at'] = $created_at;

        return $this;
    }

    /**
     * Gets location
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->container['location'];
    }

    /**
     * Sets location
     *
     * @param string $location Локация сервера.
     *
     * @return self
     */
    public function setLocation($location)
    {
        if (is_null($location)) {
            array_push($this->openAPINullablesSetToNull, 'location');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('location', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $allowedValues = $this->getLocationAllowableValues();
        if (!is_null($location) && !in_array($location, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'location', must be one of '%s'",
                    $location,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['location'] = $location;

        return $this;
    }

    /**
     * Gets name
     *
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string $name Название кластера базы данных.
     *
     * @return self
     */
    public function setName($name)
    {
        if (is_null($name)) {
            throw new \InvalidArgumentException('non-nullable name cannot be null');
        }
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->container['description'];
    }

    /**
     * Sets description
     *
     * @param string $description Описание кластера базы данных.
     *
     * @return self
     */
    public function setDescription($description)
    {
        if (is_null($description)) {
            throw new \InvalidArgumentException('non-nullable description cannot be null');
        }
        $this->container['description'] = $description;

        return $this;
    }

    /**
     * Gets networks
     *
     * @return \OpenAPI\Client\Model\DatabaseClusterNetworksInner[]
     */
    public function getNetworks()
    {
        return $this->container['networks'];
    }

    /**
     * Sets networks
     *
     * @param \OpenAPI\Client\Model\DatabaseClusterNetworksInner[] $networks Список сетей кластера базы данных.
     *
     * @return self
     */
    public function setNetworks($networks)
    {
        if (is_null($networks)) {
            throw new \InvalidArgumentException('non-nullable networks cannot be null');
        }
        $this->container['networks'] = $networks;

        return $this;
    }

    /**
     * Gets is_enabled_public_ipv6
     *
     * @return bool
     */
    public function getIsEnabledPublicIpv6()
    {
        return $this->container['is_enabled_public_ipv6'];
    }

    /**
     * Sets is_enabled_public_ipv6
     *
     * @param bool $is_enabled_public_ipv6 Использование публичного IPv6-адреса.
     *
     * @return self
     */
    public function setIsEnabledPublicIpv6($is_enabled_public_ipv6)
    {
        if (is_null($is_enabled_public_ipv6)) {
            throw new \InvalidArgumentException('non-nullable is_enabled_public_ipv6 cannot be null');
        }
        $this->container['is_enabled_public_ipv6'] = $is_enabled_public_ipv6;

        return $this;
    }

    /**
     * Gets type
     *
     * @return string
     */
    public function getType()
    {
        return $this->container['type'];
    }

    /**
     * Sets type
     *
     * @param string $type Тип базы данных. Список возможных значений шире, чем список типов, доступных при создании нового кластера.
     *
     * @return self
     */
    public function setType($type)
    {
        if (is_null($type)) {
            array_push($this->openAPINullablesSetToNull, 'type');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('type', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $allowedValues = $this->getTypeAllowableValues();
        if (!is_null($type) && !in_array($type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'type', must be one of '%s'",
                    $type,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['type'] = $type;

        return $this;
    }

    /**
     * Gets hash_type
     *
     * @return string
     */
    public function getHashType()
    {
        return $this->container['hash_type'];
    }

    /**
     * Sets hash_type
     *
     * @param string $hash_type Тип хеширования кластера базы данных (mysql5 | mysql | postgres).
     *
     * @return self
     */
    public function setHashType($hash_type)
    {
        if (is_null($hash_type)) {
            array_push($this->openAPINullablesSetToNull, 'hash_type');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('hash_type', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $allowedValues = $this->getHashTypeAllowableValues();
        if (!is_null($hash_type) && !in_array($hash_type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'hash_type', must be one of '%s'",
                    $hash_type,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['hash_type'] = $hash_type;

        return $this;
    }

    /**
     * Gets avatar_link
     *
     * @return string
     */
    public function getAvatarLink()
    {
        return $this->container['avatar_link'];
    }

    /**
     * Sets avatar_link
     *
     * @param string $avatar_link Ссылка на аватар для базы данных.
     *
     * @return self
     */
    public function setAvatarLink($avatar_link)
    {
        if (is_null($avatar_link)) {
            array_push($this->openAPINullablesSetToNull, 'avatar_link');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('avatar_link', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['avatar_link'] = $avatar_link;

        return $this;
    }

    /**
     * Gets port
     *
     * @return int
     */
    public function getPort()
    {
        return $this->container['port'];
    }

    /**
     * Sets port
     *
     * @param int $port Порт
     *
     * @return self
     */
    public function setPort($port)
    {
        if (is_null($port)) {
            array_push($this->openAPINullablesSetToNull, 'port');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('port', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['port'] = $port;

        return $this;
    }

    /**
     * Gets status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param string $status Текущий статус кластера базы данных. Значение `read_only` означает, что запись в кластер заблокирована из-за переполнения диска — чтобы снять блокировку, освободите место или увеличьте размер диска.
     *
     * @return self
     */
    public function setStatus($status)
    {
        if (is_null($status)) {
            throw new \InvalidArgumentException('non-nullable status cannot be null');
        }
        $allowedValues = $this->getStatusAllowableValues();
        if (!in_array($status, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'status', must be one of '%s'",
                    $status,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets preset_id
     *
     * @return int
     */
    public function getPresetId()
    {
        return $this->container['preset_id'];
    }

    /**
     * Sets preset_id
     *
     * @param int $preset_id ID тарифа. Равен `null` у кластеров, созданных через конфигуратор — в этом случае заполнен `configurator_id`.
     *
     * @return self
     */
    public function setPresetId($preset_id)
    {
        if (is_null($preset_id)) {
            array_push($this->openAPINullablesSetToNull, 'preset_id');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('preset_id', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['preset_id'] = $preset_id;

        return $this;
    }

    /**
     * Gets configurator_id
     *
     * @return int
     */
    public function getConfiguratorId()
    {
        return $this->container['configurator_id'];
    }

    /**
     * Sets configurator_id
     *
     * @param int $configurator_id ID конфигуратора. Равен `null` у кластеров, созданных по тарифу.
     *
     * @return self
     */
    public function setConfiguratorId($configurator_id)
    {
        if (is_null($configurator_id)) {
            array_push($this->openAPINullablesSetToNull, 'configurator_id');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('configurator_id', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['configurator_id'] = $configurator_id;

        return $this;
    }

    /**
     * Gets cpu
     *
     * @return int
     */
    public function getCpu()
    {
        return $this->container['cpu'];
    }

    /**
     * Sets cpu
     *
     * @param int $cpu Количество ядер процессора.
     *
     * @return self
     */
    public function setCpu($cpu)
    {
        if (is_null($cpu)) {
            array_push($this->openAPINullablesSetToNull, 'cpu');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('cpu', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['cpu'] = $cpu;

        return $this;
    }

    /**
     * Gets cpu_frequency
     *
     * @return string
     */
    public function getCpuFrequency()
    {
        return $this->container['cpu_frequency'];
    }

    /**
     * Sets cpu_frequency
     *
     * @param string $cpu_frequency Частота процессора.
     *
     * @return self
     */
    public function setCpuFrequency($cpu_frequency)
    {
        if (is_null($cpu_frequency)) {
            array_push($this->openAPINullablesSetToNull, 'cpu_frequency');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('cpu_frequency', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['cpu_frequency'] = $cpu_frequency;

        return $this;
    }

    /**
     * Gets is_dedicated_cpu
     *
     * @return bool
     */
    public function getIsDedicatedCpu()
    {
        return $this->container['is_dedicated_cpu'];
    }

    /**
     * Sets is_dedicated_cpu
     *
     * @param bool $is_dedicated_cpu Используются ли выделенные ядра процессора.
     *
     * @return self
     */
    public function setIsDedicatedCpu($is_dedicated_cpu)
    {
        if (is_null($is_dedicated_cpu)) {
            throw new \InvalidArgumentException('non-nullable is_dedicated_cpu cannot be null');
        }
        $this->container['is_dedicated_cpu'] = $is_dedicated_cpu;

        return $this;
    }

    /**
     * Gets ram
     *
     * @return int
     */
    public function getRam()
    {
        return $this->container['ram'];
    }

    /**
     * Sets ram
     *
     * @param int $ram Объем оперативной памяти (в Мб).
     *
     * @return self
     */
    public function setRam($ram)
    {
        if (is_null($ram)) {
            array_push($this->openAPINullablesSetToNull, 'ram');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('ram', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['ram'] = $ram;

        return $this;
    }

    /**
     * Gets disk
     *
     * @return \OpenAPI\Client\Model\DatabaseClusterDisk
     */
    public function getDisk()
    {
        return $this->container['disk'];
    }

    /**
     * Sets disk
     *
     * @param \OpenAPI\Client\Model\DatabaseClusterDisk $disk disk
     *
     * @return self
     */
    public function setDisk($disk)
    {
        if (is_null($disk)) {
            array_push($this->openAPINullablesSetToNull, 'disk');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('disk', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['disk'] = $disk;

        return $this;
    }

    /**
     * Gets has_additional_disk
     *
     * @return bool
     */
    public function getHasAdditionalDisk()
    {
        return $this->container['has_additional_disk'];
    }

    /**
     * Sets has_additional_disk
     *
     * @param bool $has_additional_disk Подключен ли к кластеру дополнительный диск.
     *
     * @return self
     */
    public function setHasAdditionalDisk($has_additional_disk)
    {
        if (is_null($has_additional_disk)) {
            throw new \InvalidArgumentException('non-nullable has_additional_disk cannot be null');
        }
        $this->container['has_additional_disk'] = $has_additional_disk;

        return $this;
    }

    /**
     * Gets disk_autoscaling
     *
     * @return \OpenAPI\Client\Model\DatabaseClusterDiskAutoscaling
     */
    public function getDiskAutoscaling()
    {
        return $this->container['disk_autoscaling'];
    }

    /**
     * Sets disk_autoscaling
     *
     * @param \OpenAPI\Client\Model\DatabaseClusterDiskAutoscaling $disk_autoscaling disk_autoscaling
     *
     * @return self
     */
    public function setDiskAutoscaling($disk_autoscaling)
    {
        if (is_null($disk_autoscaling)) {
            array_push($this->openAPINullablesSetToNull, 'disk_autoscaling');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('disk_autoscaling', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['disk_autoscaling'] = $disk_autoscaling;

        return $this;
    }

    /**
     * Gets config_parameters
     *
     * @return \OpenAPI\Client\Model\Mysql
     */
    public function getConfigParameters()
    {
        return $this->container['config_parameters'];
    }

    /**
     * Sets config_parameters
     *
     * @param \OpenAPI\Client\Model\Mysql $config_parameters config_parameters
     *
     * @return self
     */
    public function setConfigParameters($config_parameters)
    {
        if (is_null($config_parameters)) {
            throw new \InvalidArgumentException('non-nullable config_parameters cannot be null');
        }
        $this->container['config_parameters'] = $config_parameters;

        return $this;
    }

    /**
     * Gets is_enabled_public_network
     *
     * @return bool
     */
    public function getIsEnabledPublicNetwork()
    {
        return $this->container['is_enabled_public_network'];
    }

    /**
     * Sets is_enabled_public_network
     *
     * @param bool $is_enabled_public_network Доступность публичного IP-адреса
     *
     * @return self
     */
    public function setIsEnabledPublicNetwork($is_enabled_public_network)
    {
        if (is_null($is_enabled_public_network)) {
            throw new \InvalidArgumentException('non-nullable is_enabled_public_network cannot be null');
        }
        $this->container['is_enabled_public_network'] = $is_enabled_public_network;

        return $this;
    }

    /**
     * Gets is_secure_connection_enabled
     *
     * @return bool
     */
    public function getIsSecureConnectionEnabled()
    {
        return $this->container['is_secure_connection_enabled'];
    }

    /**
     * Sets is_secure_connection_enabled
     *
     * @param bool $is_secure_connection_enabled Включено ли защищенное подключение к кластеру базы данных.
     *
     * @return self
     */
    public function setIsSecureConnectionEnabled($is_secure_connection_enabled)
    {
        if (is_null($is_secure_connection_enabled)) {
            throw new \InvalidArgumentException('non-nullable is_secure_connection_enabled cannot be null');
        }
        $this->container['is_secure_connection_enabled'] = $is_secure_connection_enabled;

        return $this;
    }

    /**
     * Gets is_autobackups_enabled
     *
     * @return bool
     */
    public function getIsAutobackupsEnabled()
    {
        return $this->container['is_autobackups_enabled'];
    }

    /**
     * Sets is_autobackups_enabled
     *
     * @param bool $is_autobackups_enabled Включены ли автоматические резервные копии кластера базы данных.
     *
     * @return self
     */
    public function setIsAutobackupsEnabled($is_autobackups_enabled)
    {
        if (is_null($is_autobackups_enabled)) {
            throw new \InvalidArgumentException('non-nullable is_autobackups_enabled cannot be null');
        }
        $this->container['is_autobackups_enabled'] = $is_autobackups_enabled;

        return $this;
    }

    /**
     * Gets is_backup_schedule_enabled
     *
     * @return bool
     */
    public function getIsBackupScheduleEnabled()
    {
        return $this->container['is_backup_schedule_enabled'];
    }

    /**
     * Sets is_backup_schedule_enabled
     *
     * @param bool $is_backup_schedule_enabled Включено ли расписание резервного копирования кластера базы данных.
     *
     * @return self
     */
    public function setIsBackupScheduleEnabled($is_backup_schedule_enabled)
    {
        if (is_null($is_backup_schedule_enabled)) {
            throw new \InvalidArgumentException('non-nullable is_backup_schedule_enabled cannot be null');
        }
        $this->container['is_backup_schedule_enabled'] = $is_backup_schedule_enabled;

        return $this;
    }

    /**
     * Gets availability_zone
     *
     * @return \OpenAPI\Client\Model\AvailabilityZone
     */
    public function getAvailabilityZone()
    {
        return $this->container['availability_zone'];
    }

    /**
     * Sets availability_zone
     *
     * @param \OpenAPI\Client\Model\AvailabilityZone $availability_zone availability_zone
     *
     * @return self
     */
    public function setAvailabilityZone($availability_zone)
    {
        if (is_null($availability_zone)) {
            throw new \InvalidArgumentException('non-nullable availability_zone cannot be null');
        }
        $this->container['availability_zone'] = $availability_zone;

        return $this;
    }

    /**
     * Gets project_id
     *
     * @return int|null
     */
    public function getProjectId()
    {
        return $this->container['project_id'];
    }

    /**
     * Sets project_id
     *
     * @param int|null $project_id ID проекта, в котором находится кластер базы данных.
     *
     * @return self
     */
    public function setProjectId($project_id)
    {
        if (is_null($project_id)) {
            throw new \InvalidArgumentException('non-nullable project_id cannot be null');
        }
        $this->container['project_id'] = $project_id;

        return $this;
    }

    /**
     * Gets replica_list
     *
     * @return \OpenAPI\Client\Model\DatabaseClusterReplicaListInner[]
     */
    public function getReplicaList()
    {
        return $this->container['replica_list'];
    }

    /**
     * Sets replica_list
     *
     * @param \OpenAPI\Client\Model\DatabaseClusterReplicaListInner[] $replica_list Список реплик кластера базы данных.
     *
     * @return self
     */
    public function setReplicaList($replica_list)
    {
        if (is_null($replica_list)) {
            throw new \InvalidArgumentException('non-nullable replica_list cannot be null');
        }
        $this->container['replica_list'] = $replica_list;

        return $this;
    }

    /**
     * Gets domains
     *
     * @return \OpenAPI\Client\Model\DatabaseClusterDomainsInner[]
     */
    public function getDomains()
    {
        return $this->container['domains'];
    }

    /**
     * Sets domains
     *
     * @param \OpenAPI\Client\Model\DatabaseClusterDomainsInner[] $domains Список доменов кластера базы данных. Если публичная сеть отключена (`is_enabled_public_network: false`), список всегда пустой.
     *
     * @return self
     */
    public function setDomains($domains)
    {
        if (is_null($domains)) {
            throw new \InvalidArgumentException('non-nullable domains cannot be null');
        }
        $this->container['domains'] = $domains;

        return $this;
    }

    /**
     * Gets child_services
     *
     * @return \OpenAPI\Client\Model\DatabaseClusterChildServicesInner[]
     */
    public function getChildServices()
    {
        return $this->container['child_services'];
    }

    /**
     * Sets child_services
     *
     * @param \OpenAPI\Client\Model\DatabaseClusterChildServicesInner[] $child_services Список дочерних сервисов кластера базы данных.
     *
     * @return self
     */
    public function setChildServices($child_services)
    {
        if (is_null($child_services)) {
            throw new \InvalidArgumentException('non-nullable child_services cannot be null');
        }
        $this->container['child_services'] = $child_services;

        return $this;
    }

    /**
     * Gets parent_services
     *
     * @return \OpenAPI\Client\Model\DatabaseClusterParentServicesInner[]
     */
    public function getParentServices()
    {
        return $this->container['parent_services'];
    }

    /**
     * Sets parent_services
     *
     * @param \OpenAPI\Client\Model\DatabaseClusterParentServicesInner[] $parent_services Список родительских сервисов кластера базы данных.
     *
     * @return self
     */
    public function setParentServices($parent_services)
    {
        if (is_null($parent_services)) {
            throw new \InvalidArgumentException('non-nullable parent_services cannot be null');
        }
        $this->container['parent_services'] = $parent_services;

        return $this;
    }

    /**
     * Gets maintenance_slot
     *
     * @return \OpenAPI\Client\Model\DatabaseClusterMaintenanceSlot
     */
    public function getMaintenanceSlot()
    {
        return $this->container['maintenance_slot'];
    }

    /**
     * Sets maintenance_slot
     *
     * @param \OpenAPI\Client\Model\DatabaseClusterMaintenanceSlot $maintenance_slot maintenance_slot
     *
     * @return self
     */
    public function setMaintenanceSlot($maintenance_slot)
    {
        if (is_null($maintenance_slot)) {
            throw new \InvalidArgumentException('non-nullable maintenance_slot cannot be null');
        }
        $this->container['maintenance_slot'] = $maintenance_slot;

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


