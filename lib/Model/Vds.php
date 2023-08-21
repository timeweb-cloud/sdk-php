<?php
/**
 * Vds
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
 * # Введение API Timeweb Cloud позволяет вам управлять ресурсами в облаке программным способом с использованием обычных HTTP-запросов.  Множество функций, которые доступны в панели управления Timeweb Cloud, также доступны через API, что позволяет вам автоматизировать ваши собственные сценарии.  В этой документации сперва будет описан общий дизайн и принципы работы API, а после этого конкретные конечные точки. Также будут приведены примеры запросов к ним.   ## Запросы Запросы должны выполняться по протоколу `HTTPS`, чтобы гарантировать шифрование транзакций. Поддерживаются следующие методы запроса: |Метод|Применение| |--- |--- | |GET|Извлекает данные о коллекциях и отдельных ресурсах.| |POST|Для коллекций создает новый ресурс этого типа. Также используется для выполнения действий с конкретным ресурсом.| |PUT|Обновляет существующий ресурс.| |PATCH|Некоторые ресурсы поддерживают частичное обновление, то есть обновление только части атрибутов ресурса, в этом случае вместо метода PUT будет использован PATCH.| |DELETE|Удаляет ресурс.|  Методы `POST`, `PUT` и `PATCH` могут включать объект в тело запроса с типом содержимого `application/json`.  ### Параметры в запросах Некоторые коллекции поддерживают пагинацию, поиск или сортировку в запросах. В параметрах запроса требуется передать: - `limit` — обозначает количество записей, которое необходимо вернуть  - `offset` — указывает на смещение, относительно начала списка  - `search` — позволяет указать набор символов для поиска  - `sort` — можно задать правило сортировки коллекции  ## Ответы Запросы вернут один из следующих кодов состояния ответа HTTP:  |Статус|Описание| |--- |--- | |200 OK|Действие с ресурсом было выполнено успешно.| |201 Created|Ресурс был успешно создан. При этом ресурс может быть как уже готовым к использованию, так и находиться в процессе запуска.| |204 No Content|Действие с ресурсом было выполнено успешно, и ответ не содержит дополнительной информации в теле.| |400 Bad Request|Был отправлен неверный запрос, например, в нем отсутствуют обязательные параметры и т. д. Тело ответа будет содержать дополнительную информацию об ошибке.| |401 Unauthorized|Ошибка аутентификации.| |403 Forbidden|Аутентификация прошла успешно, но недостаточно прав для выполнения действия.| |404 Not Found|Запрашиваемый ресурс не найден.| |409 Conflict|Запрос конфликтует с текущим состоянием.| |423 Locked|Ресурс из запроса заблокирован от применения к нему указанного метода.| |429 Too Many Requests|Был достигнут лимит по количеству запросов в единицу времени.| |500 Internal Server Error|При выполнении запроса произошла какая-то внутренняя ошибка. Чтобы решить эту проблему, лучше всего создать тикет в панели управления.|  ### Структура успешного ответа Все конечные точки будут возвращать данные в формате `JSON`. Ответы на `GET`-запросы будут иметь на верхнем уровне следующую структуру атрибутов:  |Название поля|Тип|Описание| |--- |--- |--- | |[entity_name]|object, object[], string[], number[], boolean|Динамическое поле, которое будет меняться в зависимости от запрашиваемого ресурса и будет содержать все атрибуты, необходимые для описания этого ресурса. Например, при запросе списка баз данных будет возвращаться поле `dbs`, а при запросе конкретного облачного сервера `server`. Для некоторых конечных точек в ответе может возвращаться сразу несколько ресурсов.| |meta|object|Опционально. Объект, который содержит вспомогательную информацию о ресурсе. Чаще всего будет встречаться при запросе коллекций и содержать поле `total`, которое будет указывать на количество элементов в коллекции.| |response_id|string|Опционально. В большинстве случаев в ответе будет содержаться уникальный идентификатор ответа в формате UUIDv4, который однозначно указывает на ваш запрос внутри нашей системы. Если вам потребуется задать вопрос нашей поддержке, приложите к вопросу этот идентификатор — так мы сможем найти ответ на него намного быстрее. Также вы можете использовать этот идентификатор, чтобы убедиться, что это новый ответ на запрос и результат не был получен из кэша.|  Пример запроса на получение списка SSH-ключей: ```     HTTP/2.0 200 OK     {       \"ssh_keys\":[           {             \"body\":\"ssh-rsa AAAAB3NzaC1sdfghjkOAsBwWhs= example@device.local\",             \"created_at\":\"2021-09-15T19:52:27Z\",             \"expired_at\":null,             \"id\":5297,             \"is_default\":false,             \"name\":\"example@device.local\",             \"used_at\":null,             \"used_by\":[]           }       ],       \"meta\":{           \"total\":1       },       \"response_id\":\"94608d15-8672-4eed-8ab6-28bd6fa3cdf7\"     } ```  ### Структура ответа с ошибкой |Название поля|Тип|Описание| |--- |--- |--- | |status_code|number|Короткий числовой идентификатор ошибки.| |error_code|string|Короткий текстовый идентификатор ошибки, который уточняет числовой идентификатор и удобен для программной обработки. Самый простой пример — это код `not_found` для ошибки 404.| |message|string, string[]|Опционально. В большинстве случаев в ответе будет содержаться человекочитаемое подробное описание ошибки или ошибок, которые помогут понять, что нужно исправить.| |response_id|string|Опционально. В большинстве случае в ответе будет содержаться уникальный идентификатор ответа в формате UUIDv4, который однозначно указывает на ваш запрос внутри нашей системы. Если вам потребуется задать вопрос нашей поддержке, приложите к вопросу этот идентификатор — так мы сможем найти ответ на него намного быстрее.|  Пример: ```     HTTP/2.0 403 Forbidden     {       \"status_code\": 403,       \"error_code\":  \"forbidden\",       \"message\":     \"You do not have access for the attempted action\",       \"response_id\": \"94608d15-8672-4eed-8ab6-28bd6fa3cdf7\"     } ```  ## Статусы ресурсов Важно учесть, что при создании большинства ресурсов внутри платформы вам будет сразу возвращен ответ от сервера со статусом `200 OK` или `201 Created` и идентификатором созданного ресурса в теле ответа, но при этом этот ресурс может быть ещё в *состоянии запуска*.  Для того чтобы понять, в каком состоянии сейчас находится ваш ресурс, мы добавили поле `status` в ответ на получение информации о ресурсе.  Список статусов будет отличаться в зависимости от типа ресурса. Увидеть поддерживаемый список статусов вы сможете в описании каждого конкретного ресурса.     ## Ограничение скорости запросов (Rate Limiting) Чтобы обеспечить стабильность для всех пользователей, Timeweb Cloud защищает API от всплесков входящего трафика, анализируя количество запросов c каждого аккаунта к каждой конечной точке.  Если ваше приложение отправляет более 20 запросов в секунду на одну конечную точку, то для этого запроса API может вернуть код состояния HTTP `429 Too Many Requests`.   ## Аутентификация Доступ к API осуществляется с помощью JWT-токена. Токенами можно управлять внутри панели управления Timeweb Cloud в разделе *API и Terraform*.  Токен необходимо передавать в заголовке каждого запроса в формате: ```   Authorization: Bearer $TIMEWEB_CLOUD_TOKEN ```  ## Формат примеров API Примеры в этой документации описаны с помощью `curl`, HTTP-клиента командной строки. На компьютерах `Linux` и `macOS` обычно по умолчанию установлен `curl`, и он доступен для загрузки на всех популярных платформах, включая `Windows`.  Каждый пример разделен на несколько строк символом `\\`, который совместим с `bash`. Типичный пример выглядит так: ```   curl -X PATCH      -H \"Content-Type: application/json\"      -H \"Authorization: Bearer $TIMEWEB_CLOUD_TOKEN\"      -d '{\"name\":\"Cute Corvus\",\"comment\":\"Development Server\"}'      \"https://api.timeweb.cloud/api/v1/dedicated/1051\" ``` - Параметр `-X` задает метод запроса. Для согласованности метод будет указан во всех примерах, даже если он явно не требуется для методов `GET`. - Строки `-H` задают требуемые HTTP-заголовки. - Примеры, для которых требуется объект JSON в теле запроса, передают требуемые данные через параметр `-d`.  Чтобы использовать приведенные примеры, не подставляя каждый раз в них свой токен, вы можете добавить токен один раз в переменные окружения в вашей консоли. Например, на `Linux` это можно сделать с помощью команды:  ``` TIMEWEB_CLOUD_TOKEN=\"token\" ```  После этого токен будет автоматически подставляться в ваши запросы.  Обратите внимание, что все значения в этой документации являются примерами. Не полагайтесь на идентификаторы операционных систем, тарифов и т.д., используемые в примерах. Используйте соответствующую конечную точку для получения значений перед созданием ресурсов.   ## Версионирование API построено согласно принципам [семантического версионирования](https://semver.org/lang/ru). Это значит, что мы гарантируем обратную совместимость всех изменений в пределах одной мажорной версии.  Мажорная версия каждой конечной точки обозначается в пути запроса, например, запрос `/api/v1/servers` указывает, что этот метод имеет версию 1.
 *
 * The version of the OpenAPI document: 
 * Contact: info@timeweb.cloud
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 7.0.0-SNAPSHOT
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
 * Vds Class Doc Comment
 *
 * @category Class
 * @description Сервер
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class Vds implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'vds';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'id' => 'float',
        'name' => 'string',
        'comment' => 'string',
        'created_at' => 'string',
        'os' => '\OpenAPI\Client\Model\VdsOs',
        'software' => '\OpenAPI\Client\Model\VdsSoftware',
        'preset_id' => 'float',
        'location' => 'string',
        'configurator_id' => 'float',
        'boot_mode' => 'string',
        'status' => 'string',
        'start_at' => '\DateTime',
        'is_ddos_guard' => 'bool',
        'cpu' => 'float',
        'cpu_frequency' => 'string',
        'ram' => 'float',
        'disks' => '\OpenAPI\Client\Model\VdsDisksInner[]',
        'avatar_id' => 'string',
        'vnc_pass' => 'string',
        'root_pass' => 'string',
        'networks' => '\OpenAPI\Client\Model\VdsNetworksInner[]'
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
        'comment' => null,
        'created_at' => null,
        'os' => null,
        'software' => null,
        'preset_id' => null,
        'location' => null,
        'configurator_id' => null,
        'boot_mode' => null,
        'status' => null,
        'start_at' => 'date-time',
        'is_ddos_guard' => null,
        'cpu' => null,
        'cpu_frequency' => null,
        'ram' => null,
        'disks' => null,
        'avatar_id' => null,
        'vnc_pass' => null,
        'root_pass' => null,
        'networks' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'id' => false,
		'name' => false,
		'comment' => false,
		'created_at' => false,
		'os' => false,
		'software' => true,
		'preset_id' => true,
		'location' => false,
		'configurator_id' => true,
		'boot_mode' => false,
		'status' => false,
		'start_at' => true,
		'is_ddos_guard' => false,
		'cpu' => false,
		'cpu_frequency' => false,
		'ram' => false,
		'disks' => false,
		'avatar_id' => true,
		'vnc_pass' => false,
		'root_pass' => true,
		'networks' => false
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
        'comment' => 'comment',
        'created_at' => 'created_at',
        'os' => 'os',
        'software' => 'software',
        'preset_id' => 'preset_id',
        'location' => 'location',
        'configurator_id' => 'configurator_id',
        'boot_mode' => 'boot_mode',
        'status' => 'status',
        'start_at' => 'start_at',
        'is_ddos_guard' => 'is_ddos_guard',
        'cpu' => 'cpu',
        'cpu_frequency' => 'cpu_frequency',
        'ram' => 'ram',
        'disks' => 'disks',
        'avatar_id' => 'avatar_id',
        'vnc_pass' => 'vnc_pass',
        'root_pass' => 'root_pass',
        'networks' => 'networks'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'name' => 'setName',
        'comment' => 'setComment',
        'created_at' => 'setCreatedAt',
        'os' => 'setOs',
        'software' => 'setSoftware',
        'preset_id' => 'setPresetId',
        'location' => 'setLocation',
        'configurator_id' => 'setConfiguratorId',
        'boot_mode' => 'setBootMode',
        'status' => 'setStatus',
        'start_at' => 'setStartAt',
        'is_ddos_guard' => 'setIsDdosGuard',
        'cpu' => 'setCpu',
        'cpu_frequency' => 'setCpuFrequency',
        'ram' => 'setRam',
        'disks' => 'setDisks',
        'avatar_id' => 'setAvatarId',
        'vnc_pass' => 'setVncPass',
        'root_pass' => 'setRootPass',
        'networks' => 'setNetworks'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'name' => 'getName',
        'comment' => 'getComment',
        'created_at' => 'getCreatedAt',
        'os' => 'getOs',
        'software' => 'getSoftware',
        'preset_id' => 'getPresetId',
        'location' => 'getLocation',
        'configurator_id' => 'getConfiguratorId',
        'boot_mode' => 'getBootMode',
        'status' => 'getStatus',
        'start_at' => 'getStartAt',
        'is_ddos_guard' => 'getIsDdosGuard',
        'cpu' => 'getCpu',
        'cpu_frequency' => 'getCpuFrequency',
        'ram' => 'getRam',
        'disks' => 'getDisks',
        'avatar_id' => 'getAvatarId',
        'vnc_pass' => 'getVncPass',
        'root_pass' => 'getRootPass',
        'networks' => 'getNetworks'
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
    public const LOCATION_RU_2 = 'ru-2';
    public const LOCATION_PL_1 = 'pl-1';
    public const LOCATION_KZ_1 = 'kz-1';
    public const BOOT_MODE_STD = 'std';
    public const BOOT_MODE_SINGLE = 'single';
    public const BOOT_MODE_CD = 'cd';
    public const STATUS_INSTALLING = 'installing';
    public const STATUS_SOFTWARE_INSTALL = 'software_install';
    public const STATUS_REINSTALLING = 'reinstalling';
    public const STATUS_ON = 'on';
    public const STATUS_OFF = 'off';
    public const STATUS_TURNING_ON = 'turning_on';
    public const STATUS_TURNING_OFF = 'turning_off';
    public const STATUS_HARD_TURNING_OFF = 'hard_turning_off';
    public const STATUS_REBOOTING = 'rebooting';
    public const STATUS_HARD_REBOOTING = 'hard_rebooting';
    public const STATUS_REMOVING = 'removing';
    public const STATUS_REMOVED = 'removed';
    public const STATUS_CLONING = 'cloning';
    public const STATUS_TRANSFER = 'transfer';
    public const STATUS_BLOCKED = 'blocked';
    public const STATUS_CONFIGURING = 'configuring';
    public const STATUS_NO_PAID = 'no_paid';
    public const STATUS_PERMANENT_BLOCKED = 'permanent_blocked';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getLocationAllowableValues()
    {
        return [
            self::LOCATION_RU_1,
            self::LOCATION_RU_2,
            self::LOCATION_PL_1,
            self::LOCATION_KZ_1,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getBootModeAllowableValues()
    {
        return [
            self::BOOT_MODE_STD,
            self::BOOT_MODE_SINGLE,
            self::BOOT_MODE_CD,
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
            self::STATUS_INSTALLING,
            self::STATUS_SOFTWARE_INSTALL,
            self::STATUS_REINSTALLING,
            self::STATUS_ON,
            self::STATUS_OFF,
            self::STATUS_TURNING_ON,
            self::STATUS_TURNING_OFF,
            self::STATUS_HARD_TURNING_OFF,
            self::STATUS_REBOOTING,
            self::STATUS_HARD_REBOOTING,
            self::STATUS_REMOVING,
            self::STATUS_REMOVED,
            self::STATUS_CLONING,
            self::STATUS_TRANSFER,
            self::STATUS_BLOCKED,
            self::STATUS_CONFIGURING,
            self::STATUS_NO_PAID,
            self::STATUS_PERMANENT_BLOCKED,
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
        $this->setIfExists('comment', $data ?? [], null);
        $this->setIfExists('created_at', $data ?? [], null);
        $this->setIfExists('os', $data ?? [], null);
        $this->setIfExists('software', $data ?? [], null);
        $this->setIfExists('preset_id', $data ?? [], null);
        $this->setIfExists('location', $data ?? [], null);
        $this->setIfExists('configurator_id', $data ?? [], null);
        $this->setIfExists('boot_mode', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
        $this->setIfExists('start_at', $data ?? [], null);
        $this->setIfExists('is_ddos_guard', $data ?? [], null);
        $this->setIfExists('cpu', $data ?? [], null);
        $this->setIfExists('cpu_frequency', $data ?? [], null);
        $this->setIfExists('ram', $data ?? [], null);
        $this->setIfExists('disks', $data ?? [], null);
        $this->setIfExists('avatar_id', $data ?? [], null);
        $this->setIfExists('vnc_pass', $data ?? [], null);
        $this->setIfExists('root_pass', $data ?? [], null);
        $this->setIfExists('networks', $data ?? [], null);
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
        if ($this->container['comment'] === null) {
            $invalidProperties[] = "'comment' can't be null";
        }
        if ($this->container['created_at'] === null) {
            $invalidProperties[] = "'created_at' can't be null";
        }
        if ($this->container['os'] === null) {
            $invalidProperties[] = "'os' can't be null";
        }
        if ($this->container['software'] === null) {
            $invalidProperties[] = "'software' can't be null";
        }
        if ($this->container['preset_id'] === null) {
            $invalidProperties[] = "'preset_id' can't be null";
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

        if ($this->container['configurator_id'] === null) {
            $invalidProperties[] = "'configurator_id' can't be null";
        }
        if ($this->container['boot_mode'] === null) {
            $invalidProperties[] = "'boot_mode' can't be null";
        }
        $allowedValues = $this->getBootModeAllowableValues();
        if (!is_null($this->container['boot_mode']) && !in_array($this->container['boot_mode'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'boot_mode', must be one of '%s'",
                $this->container['boot_mode'],
                implode("', '", $allowedValues)
            );
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

        if ($this->container['start_at'] === null) {
            $invalidProperties[] = "'start_at' can't be null";
        }
        if ($this->container['is_ddos_guard'] === null) {
            $invalidProperties[] = "'is_ddos_guard' can't be null";
        }
        if ($this->container['cpu'] === null) {
            $invalidProperties[] = "'cpu' can't be null";
        }
        if ($this->container['cpu_frequency'] === null) {
            $invalidProperties[] = "'cpu_frequency' can't be null";
        }
        if ($this->container['ram'] === null) {
            $invalidProperties[] = "'ram' can't be null";
        }
        if ($this->container['disks'] === null) {
            $invalidProperties[] = "'disks' can't be null";
        }
        if ($this->container['avatar_id'] === null) {
            $invalidProperties[] = "'avatar_id' can't be null";
        }
        if ($this->container['vnc_pass'] === null) {
            $invalidProperties[] = "'vnc_pass' can't be null";
        }
        if ($this->container['root_pass'] === null) {
            $invalidProperties[] = "'root_pass' can't be null";
        }
        if ($this->container['networks'] === null) {
            $invalidProperties[] = "'networks' can't be null";
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
     * @param float $id Уникальный идентификатор для каждого экземпляра сервера. Автоматически генерируется при создании.
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
     * @param string $name Удобочитаемое имя, установленное для выделенного сервера.
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
     * Gets comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->container['comment'];
    }

    /**
     * Sets comment
     *
     * @param string $comment Комментарий к выделенному серверу.
     *
     * @return self
     */
    public function setComment($comment)
    {
        if (is_null($comment)) {
            throw new \InvalidArgumentException('non-nullable comment cannot be null');
        }
        $this->container['comment'] = $comment;

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
     * @param string $created_at Дата создания сервера в формате ISO8061.
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
     * Gets os
     *
     * @return \OpenAPI\Client\Model\VdsOs
     */
    public function getOs()
    {
        return $this->container['os'];
    }

    /**
     * Sets os
     *
     * @param \OpenAPI\Client\Model\VdsOs $os os
     *
     * @return self
     */
    public function setOs($os)
    {
        if (is_null($os)) {
            throw new \InvalidArgumentException('non-nullable os cannot be null');
        }
        $this->container['os'] = $os;

        return $this;
    }

    /**
     * Gets software
     *
     * @return \OpenAPI\Client\Model\VdsSoftware
     */
    public function getSoftware()
    {
        return $this->container['software'];
    }

    /**
     * Sets software
     *
     * @param \OpenAPI\Client\Model\VdsSoftware $software software
     *
     * @return self
     */
    public function setSoftware($software)
    {
        if (is_null($software)) {
            array_push($this->openAPINullablesSetToNull, 'software');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('software', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['software'] = $software;

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
     * @param float $preset_id Уникальный идентификатор тарифа сервера.
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
            throw new \InvalidArgumentException('non-nullable location cannot be null');
        }
        $allowedValues = $this->getLocationAllowableValues();
        if (!in_array($location, $allowedValues, true)) {
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
     * @param float $configurator_id Уникальный идентификатор конфигуратора сервера.
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
     * Gets boot_mode
     *
     * @return string
     */
    public function getBootMode()
    {
        return $this->container['boot_mode'];
    }

    /**
     * Sets boot_mode
     *
     * @param string $boot_mode Режим загрузки ОС сервера.
     *
     * @return self
     */
    public function setBootMode($boot_mode)
    {
        if (is_null($boot_mode)) {
            throw new \InvalidArgumentException('non-nullable boot_mode cannot be null');
        }
        $allowedValues = $this->getBootModeAllowableValues();
        if (!in_array($boot_mode, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'boot_mode', must be one of '%s'",
                    $boot_mode,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['boot_mode'] = $boot_mode;

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
     * @param string $status Статус сервера.
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
     * Gets start_at
     *
     * @return \DateTime
     */
    public function getStartAt()
    {
        return $this->container['start_at'];
    }

    /**
     * Sets start_at
     *
     * @param \DateTime $start_at Значение времени, указанное в комбинированном формате даты и времени ISO8601, которое представляет, когда был запущен сервер.
     *
     * @return self
     */
    public function setStartAt($start_at)
    {
        if (is_null($start_at)) {
            array_push($this->openAPINullablesSetToNull, 'start_at');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('start_at', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['start_at'] = $start_at;

        return $this;
    }

    /**
     * Gets is_ddos_guard
     *
     * @return bool
     */
    public function getIsDdosGuard()
    {
        return $this->container['is_ddos_guard'];
    }

    /**
     * Sets is_ddos_guard
     *
     * @param bool $is_ddos_guard Это логическое значение, которое показывает, включена ли защита от DDOS у данного сервера.
     *
     * @return self
     */
    public function setIsDdosGuard($is_ddos_guard)
    {
        if (is_null($is_ddos_guard)) {
            throw new \InvalidArgumentException('non-nullable is_ddos_guard cannot be null');
        }
        $this->container['is_ddos_guard'] = $is_ddos_guard;

        return $this;
    }

    /**
     * Gets cpu
     *
     * @return float
     */
    public function getCpu()
    {
        return $this->container['cpu'];
    }

    /**
     * Sets cpu
     *
     * @param float $cpu Количество ядер процессора сервера.
     *
     * @return self
     */
    public function setCpu($cpu)
    {
        if (is_null($cpu)) {
            throw new \InvalidArgumentException('non-nullable cpu cannot be null');
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
     * @param string $cpu_frequency Частота ядер процессора сервера.
     *
     * @return self
     */
    public function setCpuFrequency($cpu_frequency)
    {
        if (is_null($cpu_frequency)) {
            throw new \InvalidArgumentException('non-nullable cpu_frequency cannot be null');
        }
        $this->container['cpu_frequency'] = $cpu_frequency;

        return $this;
    }

    /**
     * Gets ram
     *
     * @return float
     */
    public function getRam()
    {
        return $this->container['ram'];
    }

    /**
     * Sets ram
     *
     * @param float $ram Размер (в Мб) ОЗУ сервера.
     *
     * @return self
     */
    public function setRam($ram)
    {
        if (is_null($ram)) {
            throw new \InvalidArgumentException('non-nullable ram cannot be null');
        }
        $this->container['ram'] = $ram;

        return $this;
    }

    /**
     * Gets disks
     *
     * @return \OpenAPI\Client\Model\VdsDisksInner[]
     */
    public function getDisks()
    {
        return $this->container['disks'];
    }

    /**
     * Sets disks
     *
     * @param \OpenAPI\Client\Model\VdsDisksInner[] $disks Список дисков сервера.
     *
     * @return self
     */
    public function setDisks($disks)
    {
        if (is_null($disks)) {
            throw new \InvalidArgumentException('non-nullable disks cannot be null');
        }
        $this->container['disks'] = $disks;

        return $this;
    }

    /**
     * Gets avatar_id
     *
     * @return string
     */
    public function getAvatarId()
    {
        return $this->container['avatar_id'];
    }

    /**
     * Sets avatar_id
     *
     * @param string $avatar_id Уникальный идентификатор аватара сервера. Описание методов работы с аватарами появится позднее.
     *
     * @return self
     */
    public function setAvatarId($avatar_id)
    {
        if (is_null($avatar_id)) {
            array_push($this->openAPINullablesSetToNull, 'avatar_id');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('avatar_id', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['avatar_id'] = $avatar_id;

        return $this;
    }

    /**
     * Gets vnc_pass
     *
     * @return string
     */
    public function getVncPass()
    {
        return $this->container['vnc_pass'];
    }

    /**
     * Sets vnc_pass
     *
     * @param string $vnc_pass Пароль от VNC.
     *
     * @return self
     */
    public function setVncPass($vnc_pass)
    {
        if (is_null($vnc_pass)) {
            throw new \InvalidArgumentException('non-nullable vnc_pass cannot be null');
        }
        $this->container['vnc_pass'] = $vnc_pass;

        return $this;
    }

    /**
     * Gets root_pass
     *
     * @return string
     */
    public function getRootPass()
    {
        return $this->container['root_pass'];
    }

    /**
     * Sets root_pass
     *
     * @param string $root_pass Пароль root сервера или пароль Администратора для серверов Windows.
     *
     * @return self
     */
    public function setRootPass($root_pass)
    {
        if (is_null($root_pass)) {
            array_push($this->openAPINullablesSetToNull, 'root_pass');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('root_pass', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['root_pass'] = $root_pass;

        return $this;
    }

    /**
     * Gets networks
     *
     * @return \OpenAPI\Client\Model\VdsNetworksInner[]
     */
    public function getNetworks()
    {
        return $this->container['networks'];
    }

    /**
     * Sets networks
     *
     * @param \OpenAPI\Client\Model\VdsNetworksInner[] $networks Список сетей диска.
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


