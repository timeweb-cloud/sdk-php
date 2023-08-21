<?php
/**
 * DedicatedServer
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
 * DedicatedServer Class Doc Comment
 *
 * @category Class
 * @description Выделенный сервер
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class DedicatedServer implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'dedicated-server';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'id' => 'float',
        'cpu_description' => 'string',
        'hdd_description' => 'string',
        'ram_description' => 'string',
        'created_at' => '\DateTime',
        'ip' => 'string',
        'ipmi_ip' => 'string',
        'ipmi_login' => 'string',
        'ipmi_password' => 'string',
        'ipv6' => 'string',
        'node_id' => 'float',
        'name' => 'string',
        'comment' => 'string',
        'vnc_pass' => 'string',
        'status' => 'string',
        'os_id' => 'float',
        'cp_id' => 'float',
        'bandwidth_id' => 'float',
        'network_drive_id' => 'float[]',
        'additional_ip_addr_id' => 'float[]',
        'plan_id' => 'float',
        'price' => 'float',
        'location' => 'string',
        'autoinstall_ready' => 'float'
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
        'cpu_description' => null,
        'hdd_description' => null,
        'ram_description' => null,
        'created_at' => 'date-time',
        'ip' => 'ipv4',
        'ipmi_ip' => 'ipv4',
        'ipmi_login' => null,
        'ipmi_password' => null,
        'ipv6' => 'ipv6',
        'node_id' => null,
        'name' => null,
        'comment' => null,
        'vnc_pass' => null,
        'status' => null,
        'os_id' => null,
        'cp_id' => null,
        'bandwidth_id' => null,
        'network_drive_id' => null,
        'additional_ip_addr_id' => null,
        'plan_id' => null,
        'price' => null,
        'location' => null,
        'autoinstall_ready' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'id' => false,
		'cpu_description' => false,
		'hdd_description' => false,
		'ram_description' => false,
		'created_at' => false,
		'ip' => true,
		'ipmi_ip' => true,
		'ipmi_login' => true,
		'ipmi_password' => true,
		'ipv6' => true,
		'node_id' => true,
		'name' => false,
		'comment' => false,
		'vnc_pass' => true,
		'status' => false,
		'os_id' => true,
		'cp_id' => true,
		'bandwidth_id' => true,
		'network_drive_id' => true,
		'additional_ip_addr_id' => true,
		'plan_id' => true,
		'price' => false,
		'location' => false,
		'autoinstall_ready' => false
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
        'cpu_description' => 'cpu_description',
        'hdd_description' => 'hdd_description',
        'ram_description' => 'ram_description',
        'created_at' => 'created_at',
        'ip' => 'ip',
        'ipmi_ip' => 'ipmi_ip',
        'ipmi_login' => 'ipmi_login',
        'ipmi_password' => 'ipmi_password',
        'ipv6' => 'ipv6',
        'node_id' => 'node_id',
        'name' => 'name',
        'comment' => 'comment',
        'vnc_pass' => 'vnc_pass',
        'status' => 'status',
        'os_id' => 'os_id',
        'cp_id' => 'cp_id',
        'bandwidth_id' => 'bandwidth_id',
        'network_drive_id' => 'network_drive_id',
        'additional_ip_addr_id' => 'additional_ip_addr_id',
        'plan_id' => 'plan_id',
        'price' => 'price',
        'location' => 'location',
        'autoinstall_ready' => 'autoinstall_ready'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'cpu_description' => 'setCpuDescription',
        'hdd_description' => 'setHddDescription',
        'ram_description' => 'setRamDescription',
        'created_at' => 'setCreatedAt',
        'ip' => 'setIp',
        'ipmi_ip' => 'setIpmiIp',
        'ipmi_login' => 'setIpmiLogin',
        'ipmi_password' => 'setIpmiPassword',
        'ipv6' => 'setIpv6',
        'node_id' => 'setNodeId',
        'name' => 'setName',
        'comment' => 'setComment',
        'vnc_pass' => 'setVncPass',
        'status' => 'setStatus',
        'os_id' => 'setOsId',
        'cp_id' => 'setCpId',
        'bandwidth_id' => 'setBandwidthId',
        'network_drive_id' => 'setNetworkDriveId',
        'additional_ip_addr_id' => 'setAdditionalIpAddrId',
        'plan_id' => 'setPlanId',
        'price' => 'setPrice',
        'location' => 'setLocation',
        'autoinstall_ready' => 'setAutoinstallReady'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'cpu_description' => 'getCpuDescription',
        'hdd_description' => 'getHddDescription',
        'ram_description' => 'getRamDescription',
        'created_at' => 'getCreatedAt',
        'ip' => 'getIp',
        'ipmi_ip' => 'getIpmiIp',
        'ipmi_login' => 'getIpmiLogin',
        'ipmi_password' => 'getIpmiPassword',
        'ipv6' => 'getIpv6',
        'node_id' => 'getNodeId',
        'name' => 'getName',
        'comment' => 'getComment',
        'vnc_pass' => 'getVncPass',
        'status' => 'getStatus',
        'os_id' => 'getOsId',
        'cp_id' => 'getCpId',
        'bandwidth_id' => 'getBandwidthId',
        'network_drive_id' => 'getNetworkDriveId',
        'additional_ip_addr_id' => 'getAdditionalIpAddrId',
        'plan_id' => 'getPlanId',
        'price' => 'getPrice',
        'location' => 'getLocation',
        'autoinstall_ready' => 'getAutoinstallReady'
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

    public const STATUS_INSTALLING = 'installing';
    public const STATUS_INSTALLED = 'installed';
    public const STATUS_ON = 'on';
    public const STATUS_OFF = 'off';
    public const LOCATION_RU_1 = 'ru-1';
    public const LOCATION_PL_1 = 'pl-1';
    public const LOCATION_KZ_1 = 'kz-1';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStatusAllowableValues()
    {
        return [
            self::STATUS_INSTALLING,
            self::STATUS_INSTALLED,
            self::STATUS_ON,
            self::STATUS_OFF,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getLocationAllowableValues()
    {
        return [
            self::LOCATION_RU_1,
            self::LOCATION_PL_1,
            self::LOCATION_KZ_1,
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
        $this->setIfExists('cpu_description', $data ?? [], null);
        $this->setIfExists('hdd_description', $data ?? [], null);
        $this->setIfExists('ram_description', $data ?? [], null);
        $this->setIfExists('created_at', $data ?? [], null);
        $this->setIfExists('ip', $data ?? [], null);
        $this->setIfExists('ipmi_ip', $data ?? [], null);
        $this->setIfExists('ipmi_login', $data ?? [], null);
        $this->setIfExists('ipmi_password', $data ?? [], null);
        $this->setIfExists('ipv6', $data ?? [], null);
        $this->setIfExists('node_id', $data ?? [], null);
        $this->setIfExists('name', $data ?? [], null);
        $this->setIfExists('comment', $data ?? [], null);
        $this->setIfExists('vnc_pass', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
        $this->setIfExists('os_id', $data ?? [], null);
        $this->setIfExists('cp_id', $data ?? [], null);
        $this->setIfExists('bandwidth_id', $data ?? [], null);
        $this->setIfExists('network_drive_id', $data ?? [], null);
        $this->setIfExists('additional_ip_addr_id', $data ?? [], null);
        $this->setIfExists('plan_id', $data ?? [], null);
        $this->setIfExists('price', $data ?? [], null);
        $this->setIfExists('location', $data ?? [], null);
        $this->setIfExists('autoinstall_ready', $data ?? [], null);
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
        if ($this->container['cpu_description'] === null) {
            $invalidProperties[] = "'cpu_description' can't be null";
        }
        if ($this->container['hdd_description'] === null) {
            $invalidProperties[] = "'hdd_description' can't be null";
        }
        if ($this->container['ram_description'] === null) {
            $invalidProperties[] = "'ram_description' can't be null";
        }
        if ($this->container['created_at'] === null) {
            $invalidProperties[] = "'created_at' can't be null";
        }
        if ($this->container['ip'] === null) {
            $invalidProperties[] = "'ip' can't be null";
        }
        if ($this->container['ipmi_ip'] === null) {
            $invalidProperties[] = "'ipmi_ip' can't be null";
        }
        if ($this->container['ipmi_login'] === null) {
            $invalidProperties[] = "'ipmi_login' can't be null";
        }
        if ($this->container['ipmi_password'] === null) {
            $invalidProperties[] = "'ipmi_password' can't be null";
        }
        if ($this->container['ipv6'] === null) {
            $invalidProperties[] = "'ipv6' can't be null";
        }
        if ($this->container['node_id'] === null) {
            $invalidProperties[] = "'node_id' can't be null";
        }
        if ($this->container['name'] === null) {
            $invalidProperties[] = "'name' can't be null";
        }
        if ($this->container['comment'] === null) {
            $invalidProperties[] = "'comment' can't be null";
        }
        if ($this->container['vnc_pass'] === null) {
            $invalidProperties[] = "'vnc_pass' can't be null";
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

        if ($this->container['os_id'] === null) {
            $invalidProperties[] = "'os_id' can't be null";
        }
        if ($this->container['cp_id'] === null) {
            $invalidProperties[] = "'cp_id' can't be null";
        }
        if ($this->container['bandwidth_id'] === null) {
            $invalidProperties[] = "'bandwidth_id' can't be null";
        }
        if ($this->container['network_drive_id'] === null) {
            $invalidProperties[] = "'network_drive_id' can't be null";
        }
        if ($this->container['additional_ip_addr_id'] === null) {
            $invalidProperties[] = "'additional_ip_addr_id' can't be null";
        }
        if ($this->container['plan_id'] === null) {
            $invalidProperties[] = "'plan_id' can't be null";
        }
        if ($this->container['price'] === null) {
            $invalidProperties[] = "'price' can't be null";
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

        if ($this->container['autoinstall_ready'] === null) {
            $invalidProperties[] = "'autoinstall_ready' can't be null";
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
     * @param float $id Уникальный идентификатор для каждого экземпляра выделенного сервера. Автоматически генерируется при создании.
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
     * Gets cpu_description
     *
     * @return string
     */
    public function getCpuDescription()
    {
        return $this->container['cpu_description'];
    }

    /**
     * Sets cpu_description
     *
     * @param string $cpu_description Описание параметров процессора выделенного сервера.
     *
     * @return self
     */
    public function setCpuDescription($cpu_description)
    {
        if (is_null($cpu_description)) {
            throw new \InvalidArgumentException('non-nullable cpu_description cannot be null');
        }
        $this->container['cpu_description'] = $cpu_description;

        return $this;
    }

    /**
     * Gets hdd_description
     *
     * @return string
     */
    public function getHddDescription()
    {
        return $this->container['hdd_description'];
    }

    /**
     * Sets hdd_description
     *
     * @param string $hdd_description Описание параметров жёсткого диска выделенного сервера.
     *
     * @return self
     */
    public function setHddDescription($hdd_description)
    {
        if (is_null($hdd_description)) {
            throw new \InvalidArgumentException('non-nullable hdd_description cannot be null');
        }
        $this->container['hdd_description'] = $hdd_description;

        return $this;
    }

    /**
     * Gets ram_description
     *
     * @return string
     */
    public function getRamDescription()
    {
        return $this->container['ram_description'];
    }

    /**
     * Sets ram_description
     *
     * @param string $ram_description Описание ОЗУ выделенного сервера.
     *
     * @return self
     */
    public function setRamDescription($ram_description)
    {
        if (is_null($ram_description)) {
            throw new \InvalidArgumentException('non-nullable ram_description cannot be null');
        }
        $this->container['ram_description'] = $ram_description;

        return $this;
    }

    /**
     * Gets created_at
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->container['created_at'];
    }

    /**
     * Sets created_at
     *
     * @param \DateTime $created_at Значение времени, указанное в комбинированном формате даты и времени ISO8601, которое представляет, когда был создан выделенный сервер.
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
     * Gets ip
     *
     * @return string
     */
    public function getIp()
    {
        return $this->container['ip'];
    }

    /**
     * Sets ip
     *
     * @param string $ip IP-адрес сетевого интерфейса IPv4.
     *
     * @return self
     */
    public function setIp($ip)
    {
        if (is_null($ip)) {
            array_push($this->openAPINullablesSetToNull, 'ip');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('ip', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['ip'] = $ip;

        return $this;
    }

    /**
     * Gets ipmi_ip
     *
     * @return string
     */
    public function getIpmiIp()
    {
        return $this->container['ipmi_ip'];
    }

    /**
     * Sets ipmi_ip
     *
     * @param string $ipmi_ip IP-адрес сетевого интерфейса IPMI.
     *
     * @return self
     */
    public function setIpmiIp($ipmi_ip)
    {
        if (is_null($ipmi_ip)) {
            array_push($this->openAPINullablesSetToNull, 'ipmi_ip');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('ipmi_ip', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['ipmi_ip'] = $ipmi_ip;

        return $this;
    }

    /**
     * Gets ipmi_login
     *
     * @return string
     */
    public function getIpmiLogin()
    {
        return $this->container['ipmi_login'];
    }

    /**
     * Sets ipmi_login
     *
     * @param string $ipmi_login Логин, используемый для входа в IPMI-консоль.
     *
     * @return self
     */
    public function setIpmiLogin($ipmi_login)
    {
        if (is_null($ipmi_login)) {
            array_push($this->openAPINullablesSetToNull, 'ipmi_login');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('ipmi_login', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['ipmi_login'] = $ipmi_login;

        return $this;
    }

    /**
     * Gets ipmi_password
     *
     * @return string
     */
    public function getIpmiPassword()
    {
        return $this->container['ipmi_password'];
    }

    /**
     * Sets ipmi_password
     *
     * @param string $ipmi_password Пароль, используемый для входа в IPMI-консоль.
     *
     * @return self
     */
    public function setIpmiPassword($ipmi_password)
    {
        if (is_null($ipmi_password)) {
            array_push($this->openAPINullablesSetToNull, 'ipmi_password');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('ipmi_password', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['ipmi_password'] = $ipmi_password;

        return $this;
    }

    /**
     * Gets ipv6
     *
     * @return string
     */
    public function getIpv6()
    {
        return $this->container['ipv6'];
    }

    /**
     * Sets ipv6
     *
     * @param string $ipv6 IP-адрес сетевого интерфейса IPv6.
     *
     * @return self
     */
    public function setIpv6($ipv6)
    {
        if (is_null($ipv6)) {
            array_push($this->openAPINullablesSetToNull, 'ipv6');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('ipv6', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['ipv6'] = $ipv6;

        return $this;
    }

    /**
     * Gets node_id
     *
     * @return float
     */
    public function getNodeId()
    {
        return $this->container['node_id'];
    }

    /**
     * Sets node_id
     *
     * @param float $node_id Внутренний дополнительный идентификатор сервера.
     *
     * @return self
     */
    public function setNodeId($node_id)
    {
        if (is_null($node_id)) {
            array_push($this->openAPINullablesSetToNull, 'node_id');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('node_id', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['node_id'] = $node_id;

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
     * @param string $vnc_pass Пароль для подключения к VNC-консоли выделенного сервера.
     *
     * @return self
     */
    public function setVncPass($vnc_pass)
    {
        if (is_null($vnc_pass)) {
            array_push($this->openAPINullablesSetToNull, 'vnc_pass');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('vnc_pass', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['vnc_pass'] = $vnc_pass;

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
     * @param string $status Строка состояния, указывающая состояние выделенного сервера. Может быть «installing», «installed», «on» или «off».
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
     * Gets os_id
     *
     * @return float
     */
    public function getOsId()
    {
        return $this->container['os_id'];
    }

    /**
     * Sets os_id
     *
     * @param float $os_id Уникальный идентификатор операционной системы, установленной на выделенный сервер.
     *
     * @return self
     */
    public function setOsId($os_id)
    {
        if (is_null($os_id)) {
            array_push($this->openAPINullablesSetToNull, 'os_id');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('os_id', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['os_id'] = $os_id;

        return $this;
    }

    /**
     * Gets cp_id
     *
     * @return float
     */
    public function getCpId()
    {
        return $this->container['cp_id'];
    }

    /**
     * Sets cp_id
     *
     * @param float $cp_id Уникальный идентификатор панели управления, установленной на выделенный сервер.
     *
     * @return self
     */
    public function setCpId($cp_id)
    {
        if (is_null($cp_id)) {
            array_push($this->openAPINullablesSetToNull, 'cp_id');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('cp_id', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['cp_id'] = $cp_id;

        return $this;
    }

    /**
     * Gets bandwidth_id
     *
     * @return float
     */
    public function getBandwidthId()
    {
        return $this->container['bandwidth_id'];
    }

    /**
     * Sets bandwidth_id
     *
     * @param float $bandwidth_id Уникальный идентификатор интернет-канала, установленного на выделенный сервер.
     *
     * @return self
     */
    public function setBandwidthId($bandwidth_id)
    {
        if (is_null($bandwidth_id)) {
            array_push($this->openAPINullablesSetToNull, 'bandwidth_id');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('bandwidth_id', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['bandwidth_id'] = $bandwidth_id;

        return $this;
    }

    /**
     * Gets network_drive_id
     *
     * @return float[]
     */
    public function getNetworkDriveId()
    {
        return $this->container['network_drive_id'];
    }

    /**
     * Sets network_drive_id
     *
     * @param float[] $network_drive_id Массив уникальных идентификаторов сетевых дисков, подключенных к выделенному серверу.
     *
     * @return self
     */
    public function setNetworkDriveId($network_drive_id)
    {
        if (is_null($network_drive_id)) {
            array_push($this->openAPINullablesSetToNull, 'network_drive_id');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('network_drive_id', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['network_drive_id'] = $network_drive_id;

        return $this;
    }

    /**
     * Gets additional_ip_addr_id
     *
     * @return float[]
     */
    public function getAdditionalIpAddrId()
    {
        return $this->container['additional_ip_addr_id'];
    }

    /**
     * Sets additional_ip_addr_id
     *
     * @param float[] $additional_ip_addr_id Массив уникальных идентификаторов дополнительных IP-адресов, подключенных к выделенному серверу.
     *
     * @return self
     */
    public function setAdditionalIpAddrId($additional_ip_addr_id)
    {
        if (is_null($additional_ip_addr_id)) {
            array_push($this->openAPINullablesSetToNull, 'additional_ip_addr_id');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('additional_ip_addr_id', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['additional_ip_addr_id'] = $additional_ip_addr_id;

        return $this;
    }

    /**
     * Gets plan_id
     *
     * @return float
     */
    public function getPlanId()
    {
        return $this->container['plan_id'];
    }

    /**
     * Sets plan_id
     *
     * @param float $plan_id Уникальный идентификатор списка дополнительных услуг выделенного сервера.
     *
     * @return self
     */
    public function setPlanId($plan_id)
    {
        if (is_null($plan_id)) {
            array_push($this->openAPINullablesSetToNull, 'plan_id');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('plan_id', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['plan_id'] = $plan_id;

        return $this;
    }

    /**
     * Gets price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->container['price'];
    }

    /**
     * Sets price
     *
     * @param float $price Стоимость выделенного сервера.
     *
     * @return self
     */
    public function setPrice($price)
    {
        if (is_null($price)) {
            throw new \InvalidArgumentException('non-nullable price cannot be null');
        }
        $this->container['price'] = $price;

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
     * Gets autoinstall_ready
     *
     * @return float
     */
    public function getAutoinstallReady()
    {
        return $this->container['autoinstall_ready'];
    }

    /**
     * Sets autoinstall_ready
     *
     * @param float $autoinstall_ready Количество готовых к автоматической выдаче серверов. Если значение равно 0, сервер будет установлен через инженеров.
     *
     * @return self
     */
    public function setAutoinstallReady($autoinstall_ready)
    {
        if (is_null($autoinstall_ready)) {
            throw new \InvalidArgumentException('non-nullable autoinstall_ready cannot be null');
        }
        $this->container['autoinstall_ready'] = $autoinstall_ready;

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


