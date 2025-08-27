<?php
/**
 * Bucket
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
 * Bucket Class Doc Comment
 *
 * @category Class
 * @description Хранилище S3
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class Bucket implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'bucket';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'id' => 'float',
        'name' => 'string',
        'description' => 'string',
        'disk_stats' => '\OpenAPI\Client\Model\BucketDiskStats',
        'type' => 'string',
        'preset_id' => 'float',
        'configurator_id' => 'float',
        'avatar_link' => 'string',
        'status' => 'string',
        'object_amount' => 'float',
        'location' => 'string',
        'hostname' => 'string',
        'access_key' => 'string',
        'secret_key' => 'string',
        'moved_in_quarantine_at' => '\DateTime',
        'storage_class' => 'string',
        'project_id' => 'float',
        'rate_id' => 'float',
        'website_config' => '\OpenAPI\Client\Model\BucketWebsiteConfig'
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
        'name' => null,
        'description' => null,
        'disk_stats' => null,
        'type' => null,
        'preset_id' => null,
        'configurator_id' => null,
        'avatar_link' => null,
        'status' => null,
        'object_amount' => null,
        'location' => null,
        'hostname' => null,
        'access_key' => null,
        'secret_key' => null,
        'moved_in_quarantine_at' => 'date-time',
        'storage_class' => null,
        'project_id' => null,
        'rate_id' => null,
        'website_config' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'id' => false,
		'name' => false,
		'description' => false,
		'disk_stats' => false,
		'type' => false,
		'preset_id' => true,
		'configurator_id' => true,
		'avatar_link' => true,
		'status' => false,
		'object_amount' => false,
		'location' => false,
		'hostname' => false,
		'access_key' => false,
		'secret_key' => false,
		'moved_in_quarantine_at' => true,
		'storage_class' => false,
		'project_id' => false,
		'rate_id' => false,
		'website_config' => false
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
        'name' => 'name',
        'description' => 'description',
        'disk_stats' => 'disk_stats',
        'type' => 'type',
        'preset_id' => 'preset_id',
        'configurator_id' => 'configurator_id',
        'avatar_link' => 'avatar_link',
        'status' => 'status',
        'object_amount' => 'object_amount',
        'location' => 'location',
        'hostname' => 'hostname',
        'access_key' => 'access_key',
        'secret_key' => 'secret_key',
        'moved_in_quarantine_at' => 'moved_in_quarantine_at',
        'storage_class' => 'storage_class',
        'project_id' => 'project_id',
        'rate_id' => 'rate_id',
        'website_config' => 'website_config'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'name' => 'setName',
        'description' => 'setDescription',
        'disk_stats' => 'setDiskStats',
        'type' => 'setType',
        'preset_id' => 'setPresetId',
        'configurator_id' => 'setConfiguratorId',
        'avatar_link' => 'setAvatarLink',
        'status' => 'setStatus',
        'object_amount' => 'setObjectAmount',
        'location' => 'setLocation',
        'hostname' => 'setHostname',
        'access_key' => 'setAccessKey',
        'secret_key' => 'setSecretKey',
        'moved_in_quarantine_at' => 'setMovedInQuarantineAt',
        'storage_class' => 'setStorageClass',
        'project_id' => 'setProjectId',
        'rate_id' => 'setRateId',
        'website_config' => 'setWebsiteConfig'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'name' => 'getName',
        'description' => 'getDescription',
        'disk_stats' => 'getDiskStats',
        'type' => 'getType',
        'preset_id' => 'getPresetId',
        'configurator_id' => 'getConfiguratorId',
        'avatar_link' => 'getAvatarLink',
        'status' => 'getStatus',
        'object_amount' => 'getObjectAmount',
        'location' => 'getLocation',
        'hostname' => 'getHostname',
        'access_key' => 'getAccessKey',
        'secret_key' => 'getSecretKey',
        'moved_in_quarantine_at' => 'getMovedInQuarantineAt',
        'storage_class' => 'getStorageClass',
        'project_id' => 'getProjectId',
        'rate_id' => 'getRateId',
        'website_config' => 'getWebsiteConfig'
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

    public const TYPE__PRIVATE = 'private';
    public const TYPE__PUBLIC = 'public';
    public const STATUS_NO_PAID = 'no_paid';
    public const STATUS_CREATED = 'created';
    public const STATUS_TRANSFER = 'transfer';
    public const STORAGE_CLASS_COLD = 'cold';
    public const STORAGE_CLASS_HOT = 'hot';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getTypeAllowableValues()
    {
        return [
            self::TYPE__PRIVATE,
            self::TYPE__PUBLIC,
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
            self::STATUS_NO_PAID,
            self::STATUS_CREATED,
            self::STATUS_TRANSFER,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStorageClassAllowableValues()
    {
        return [
            self::STORAGE_CLASS_COLD,
            self::STORAGE_CLASS_HOT,
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
        $this->setIfExists('name', $data ?? [], null);
        $this->setIfExists('description', $data ?? [], null);
        $this->setIfExists('disk_stats', $data ?? [], null);
        $this->setIfExists('type', $data ?? [], null);
        $this->setIfExists('preset_id', $data ?? [], null);
        $this->setIfExists('configurator_id', $data ?? [], null);
        $this->setIfExists('avatar_link', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
        $this->setIfExists('object_amount', $data ?? [], null);
        $this->setIfExists('location', $data ?? [], null);
        $this->setIfExists('hostname', $data ?? [], null);
        $this->setIfExists('access_key', $data ?? [], null);
        $this->setIfExists('secret_key', $data ?? [], null);
        $this->setIfExists('moved_in_quarantine_at', $data ?? [], null);
        $this->setIfExists('storage_class', $data ?? [], null);
        $this->setIfExists('project_id', $data ?? [], null);
        $this->setIfExists('rate_id', $data ?? [], null);
        $this->setIfExists('website_config', $data ?? [], null);
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
        if ($this->container['name'] === null) {
            $invalidProperties[] = "'name' can't be null";
        }
        if ($this->container['disk_stats'] === null) {
            $invalidProperties[] = "'disk_stats' can't be null";
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

        if ($this->container['preset_id'] === null) {
            $invalidProperties[] = "'preset_id' can't be null";
        }
        if ($this->container['configurator_id'] === null) {
            $invalidProperties[] = "'configurator_id' can't be null";
        }
        if ($this->container['avatar_link'] === null) {
            $invalidProperties[] = "'avatar_link' can't be null";
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

        if ($this->container['object_amount'] === null) {
            $invalidProperties[] = "'object_amount' can't be null";
        }
        if ($this->container['location'] === null) {
            $invalidProperties[] = "'location' can't be null";
        }
        if ($this->container['hostname'] === null) {
            $invalidProperties[] = "'hostname' can't be null";
        }
        if ($this->container['access_key'] === null) {
            $invalidProperties[] = "'access_key' can't be null";
        }
        if ($this->container['secret_key'] === null) {
            $invalidProperties[] = "'secret_key' can't be null";
        }
        if ($this->container['moved_in_quarantine_at'] === null) {
            $invalidProperties[] = "'moved_in_quarantine_at' can't be null";
        }
        if ($this->container['storage_class'] === null) {
            $invalidProperties[] = "'storage_class' can't be null";
        }
        $allowedValues = $this->getStorageClassAllowableValues();
        if (!is_null($this->container['storage_class']) && !in_array($this->container['storage_class'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'storage_class', must be one of '%s'",
                $this->container['storage_class'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['project_id'] === null) {
            $invalidProperties[] = "'project_id' can't be null";
        }
        if ($this->container['rate_id'] === null) {
            $invalidProperties[] = "'rate_id' can't be null";
        }
        if ($this->container['website_config'] === null) {
            $invalidProperties[] = "'website_config' can't be null";
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
     * @param float $id ID для каждого экземпляра хранилища. Автоматически генерируется при создании.
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
     * @param string $name Удобочитаемое имя, установленное для хранилища.
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
     * @return string|null
     */
    public function getDescription()
    {
        return $this->container['description'];
    }

    /**
     * Sets description
     *
     * @param string|null $description Комментарий к хранилищу.
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
     * Gets disk_stats
     *
     * @return \OpenAPI\Client\Model\BucketDiskStats
     */
    public function getDiskStats()
    {
        return $this->container['disk_stats'];
    }

    /**
     * Sets disk_stats
     *
     * @param \OpenAPI\Client\Model\BucketDiskStats $disk_stats disk_stats
     *
     * @return self
     */
    public function setDiskStats($disk_stats)
    {
        if (is_null($disk_stats)) {
            throw new \InvalidArgumentException('non-nullable disk_stats cannot be null');
        }
        $this->container['disk_stats'] = $disk_stats;

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
     * @param string $type Тип хранилища.
     *
     * @return self
     */
    public function setType($type)
    {
        if (is_null($type)) {
            throw new \InvalidArgumentException('non-nullable type cannot be null');
        }
        $allowedValues = $this->getTypeAllowableValues();
        if (!in_array($type, $allowedValues, true)) {
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
     * Gets preset_id
     *
     * @return float
     */
    public function getPresetId()
    {
        return $this->container['preset_id'];
    }

    /**
     * Sets preset_id
     *
     * @param float $preset_id ID тарифа хранилища.
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
     * @return float
     */
    public function getConfiguratorId()
    {
        return $this->container['configurator_id'];
    }

    /**
     * Sets configurator_id
     *
     * @param float $configurator_id ID конфигуратора хранилища.
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
     * @param string $avatar_link Ссылка на аватар хранилища.
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
     * @param string $status Статус хранилища.
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
     * Gets object_amount
     *
     * @return float
     */
    public function getObjectAmount()
    {
        return $this->container['object_amount'];
    }

    /**
     * Sets object_amount
     *
     * @param float $object_amount Количество файлов в хранилище.
     *
     * @return self
     */
    public function setObjectAmount($object_amount)
    {
        if (is_null($object_amount)) {
            throw new \InvalidArgumentException('non-nullable object_amount cannot be null');
        }
        $this->container['object_amount'] = $object_amount;

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
     * @param string $location Регион хранилища.
     *
     * @return self
     */
    public function setLocation($location)
    {
        if (is_null($location)) {
            throw new \InvalidArgumentException('non-nullable location cannot be null');
        }
        $this->container['location'] = $location;

        return $this;
    }

    /**
     * Gets hostname
     *
     * @return string
     */
    public function getHostname()
    {
        return $this->container['hostname'];
    }

    /**
     * Sets hostname
     *
     * @param string $hostname Адрес хранилища для подключения.
     *
     * @return self
     */
    public function setHostname($hostname)
    {
        if (is_null($hostname)) {
            throw new \InvalidArgumentException('non-nullable hostname cannot be null');
        }
        $this->container['hostname'] = $hostname;

        return $this;
    }

    /**
     * Gets access_key
     *
     * @return string
     */
    public function getAccessKey()
    {
        return $this->container['access_key'];
    }

    /**
     * Sets access_key
     *
     * @param string $access_key Ключ доступа от хранилища.
     *
     * @return self
     */
    public function setAccessKey($access_key)
    {
        if (is_null($access_key)) {
            throw new \InvalidArgumentException('non-nullable access_key cannot be null');
        }
        $this->container['access_key'] = $access_key;

        return $this;
    }

    /**
     * Gets secret_key
     *
     * @return string
     */
    public function getSecretKey()
    {
        return $this->container['secret_key'];
    }

    /**
     * Sets secret_key
     *
     * @param string $secret_key Секретный ключ доступа от хранилища.
     *
     * @return self
     */
    public function setSecretKey($secret_key)
    {
        if (is_null($secret_key)) {
            throw new \InvalidArgumentException('non-nullable secret_key cannot be null');
        }
        $this->container['secret_key'] = $secret_key;

        return $this;
    }

    /**
     * Gets moved_in_quarantine_at
     *
     * @return \DateTime
     */
    public function getMovedInQuarantineAt()
    {
        return $this->container['moved_in_quarantine_at'];
    }

    /**
     * Sets moved_in_quarantine_at
     *
     * @param \DateTime $moved_in_quarantine_at Дата перемещения в карантин.
     *
     * @return self
     */
    public function setMovedInQuarantineAt($moved_in_quarantine_at)
    {
        if (is_null($moved_in_quarantine_at)) {
            array_push($this->openAPINullablesSetToNull, 'moved_in_quarantine_at');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('moved_in_quarantine_at', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['moved_in_quarantine_at'] = $moved_in_quarantine_at;

        return $this;
    }

    /**
     * Gets storage_class
     *
     * @return string
     */
    public function getStorageClass()
    {
        return $this->container['storage_class'];
    }

    /**
     * Sets storage_class
     *
     * @param string $storage_class Класс хранилища.
     *
     * @return self
     */
    public function setStorageClass($storage_class)
    {
        if (is_null($storage_class)) {
            throw new \InvalidArgumentException('non-nullable storage_class cannot be null');
        }
        $allowedValues = $this->getStorageClassAllowableValues();
        if (!in_array($storage_class, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'storage_class', must be one of '%s'",
                    $storage_class,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['storage_class'] = $storage_class;

        return $this;
    }

    /**
     * Gets project_id
     *
     * @return float
     */
    public function getProjectId()
    {
        return $this->container['project_id'];
    }

    /**
     * Sets project_id
     *
     * @param float $project_id ID проекта.
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
     * Gets rate_id
     *
     * @return float
     */
    public function getRateId()
    {
        return $this->container['rate_id'];
    }

    /**
     * Sets rate_id
     *
     * @param float $rate_id ID тарифа.
     *
     * @return self
     */
    public function setRateId($rate_id)
    {
        if (is_null($rate_id)) {
            throw new \InvalidArgumentException('non-nullable rate_id cannot be null');
        }
        $this->container['rate_id'] = $rate_id;

        return $this;
    }

    /**
     * Gets website_config
     *
     * @return \OpenAPI\Client\Model\BucketWebsiteConfig
     */
    public function getWebsiteConfig()
    {
        return $this->container['website_config'];
    }

    /**
     * Sets website_config
     *
     * @param \OpenAPI\Client\Model\BucketWebsiteConfig $website_config website_config
     *
     * @return self
     */
    public function setWebsiteConfig($website_config)
    {
        if (is_null($website_config)) {
            throw new \InvalidArgumentException('non-nullable website_config cannot be null');
        }
        $this->container['website_config'] = $website_config;

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


