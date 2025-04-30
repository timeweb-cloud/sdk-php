<?php
/**
 * ClusterOut
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
 * ClusterOut Class Doc Comment
 *
 * @category Class
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class ClusterOut implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'ClusterOut';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'id' => 'int',
        'name' => 'string',
        'created_at' => '\DateTime',
        'status' => 'string',
        'description' => 'string',
        'k8s_version' => 'string',
        'network_driver' => 'string',
        'avatar_link' => 'string',
        'ingress' => 'bool',
        'preset_id' => 'int',
        'cpu' => 'int',
        'ram' => 'int',
        'disk' => 'int',
        'availability_zone' => 'string',
        'project_id' => 'int'
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
        'created_at' => 'date-time',
        'status' => null,
        'description' => null,
        'k8s_version' => null,
        'network_driver' => null,
        'avatar_link' => null,
        'ingress' => null,
        'preset_id' => null,
        'cpu' => null,
        'ram' => null,
        'disk' => null,
        'availability_zone' => null,
        'project_id' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'id' => false,
		'name' => false,
		'created_at' => false,
		'status' => false,
		'description' => false,
		'k8s_version' => false,
		'network_driver' => false,
		'avatar_link' => true,
		'ingress' => false,
		'preset_id' => false,
		'cpu' => false,
		'ram' => false,
		'disk' => false,
		'availability_zone' => false,
		'project_id' => false
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
        'created_at' => 'created_at',
        'status' => 'status',
        'description' => 'description',
        'k8s_version' => 'k8s_version',
        'network_driver' => 'network_driver',
        'avatar_link' => 'avatar_link',
        'ingress' => 'ingress',
        'preset_id' => 'preset_id',
        'cpu' => 'cpu',
        'ram' => 'ram',
        'disk' => 'disk',
        'availability_zone' => 'availability_zone',
        'project_id' => 'project_id'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'name' => 'setName',
        'created_at' => 'setCreatedAt',
        'status' => 'setStatus',
        'description' => 'setDescription',
        'k8s_version' => 'setK8sVersion',
        'network_driver' => 'setNetworkDriver',
        'avatar_link' => 'setAvatarLink',
        'ingress' => 'setIngress',
        'preset_id' => 'setPresetId',
        'cpu' => 'setCpu',
        'ram' => 'setRam',
        'disk' => 'setDisk',
        'availability_zone' => 'setAvailabilityZone',
        'project_id' => 'setProjectId'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'name' => 'getName',
        'created_at' => 'getCreatedAt',
        'status' => 'getStatus',
        'description' => 'getDescription',
        'k8s_version' => 'getK8sVersion',
        'network_driver' => 'getNetworkDriver',
        'avatar_link' => 'getAvatarLink',
        'ingress' => 'getIngress',
        'preset_id' => 'getPresetId',
        'cpu' => 'getCpu',
        'ram' => 'getRam',
        'disk' => 'getDisk',
        'availability_zone' => 'getAvailabilityZone',
        'project_id' => 'getProjectId'
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

    public const NETWORK_DRIVER_KUBEROUTER = 'kuberouter';
    public const NETWORK_DRIVER_CALICO = 'calico';
    public const NETWORK_DRIVER_FLANNEL = 'flannel';
    public const NETWORK_DRIVER_CILIUM = 'cilium';
    public const AVAILABILITY_ZONE_SPB_3 = 'spb-3';
    public const AVAILABILITY_ZONE_MSK_1 = 'msk-1';
    public const AVAILABILITY_ZONE_AMS_1 = 'ams-1';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getNetworkDriverAllowableValues()
    {
        return [
            self::NETWORK_DRIVER_KUBEROUTER,
            self::NETWORK_DRIVER_CALICO,
            self::NETWORK_DRIVER_FLANNEL,
            self::NETWORK_DRIVER_CILIUM,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getAvailabilityZoneAllowableValues()
    {
        return [
            self::AVAILABILITY_ZONE_SPB_3,
            self::AVAILABILITY_ZONE_MSK_1,
            self::AVAILABILITY_ZONE_AMS_1,
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
        $this->setIfExists('created_at', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
        $this->setIfExists('description', $data ?? [], null);
        $this->setIfExists('k8s_version', $data ?? [], null);
        $this->setIfExists('network_driver', $data ?? [], null);
        $this->setIfExists('avatar_link', $data ?? [], null);
        $this->setIfExists('ingress', $data ?? [], null);
        $this->setIfExists('preset_id', $data ?? [], null);
        $this->setIfExists('cpu', $data ?? [], 0);
        $this->setIfExists('ram', $data ?? [], 0);
        $this->setIfExists('disk', $data ?? [], 0);
        $this->setIfExists('availability_zone', $data ?? [], null);
        $this->setIfExists('project_id', $data ?? [], null);
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
        if ($this->container['created_at'] === null) {
            $invalidProperties[] = "'created_at' can't be null";
        }
        if ($this->container['status'] === null) {
            $invalidProperties[] = "'status' can't be null";
        }
        if ($this->container['description'] === null) {
            $invalidProperties[] = "'description' can't be null";
        }
        if ($this->container['k8s_version'] === null) {
            $invalidProperties[] = "'k8s_version' can't be null";
        }
        if ($this->container['network_driver'] === null) {
            $invalidProperties[] = "'network_driver' can't be null";
        }
        $allowedValues = $this->getNetworkDriverAllowableValues();
        if (!is_null($this->container['network_driver']) && !in_array($this->container['network_driver'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'network_driver', must be one of '%s'",
                $this->container['network_driver'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['avatar_link'] === null) {
            $invalidProperties[] = "'avatar_link' can't be null";
        }
        if ($this->container['ingress'] === null) {
            $invalidProperties[] = "'ingress' can't be null";
        }
        if ($this->container['preset_id'] === null) {
            $invalidProperties[] = "'preset_id' can't be null";
        }
        $allowedValues = $this->getAvailabilityZoneAllowableValues();
        if (!is_null($this->container['availability_zone']) && !in_array($this->container['availability_zone'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'availability_zone', must be one of '%s'",
                $this->container['availability_zone'],
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
     * Gets id
     *
     * @return int
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param int $id ID кластера
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
     * @param string $name Название
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
     * @param \DateTime $created_at Дата и время создания кластера в формате ISO8601
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
     * @param string $status Статус
     *
     * @return self
     */
    public function setStatus($status)
    {
        if (is_null($status)) {
            throw new \InvalidArgumentException('non-nullable status cannot be null');
        }
        $this->container['status'] = $status;

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
     * @param string $description Описание
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
     * Gets k8s_version
     *
     * @return string
     */
    public function getK8sVersion()
    {
        return $this->container['k8s_version'];
    }

    /**
     * Sets k8s_version
     *
     * @param string $k8s_version Версия Kubernetes
     *
     * @return self
     */
    public function setK8sVersion($k8s_version)
    {
        if (is_null($k8s_version)) {
            throw new \InvalidArgumentException('non-nullable k8s_version cannot be null');
        }
        $this->container['k8s_version'] = $k8s_version;

        return $this;
    }

    /**
     * Gets network_driver
     *
     * @return string
     */
    public function getNetworkDriver()
    {
        return $this->container['network_driver'];
    }

    /**
     * Sets network_driver
     *
     * @param string $network_driver Используемый сетевой драйвер
     *
     * @return self
     */
    public function setNetworkDriver($network_driver)
    {
        if (is_null($network_driver)) {
            throw new \InvalidArgumentException('non-nullable network_driver cannot be null');
        }
        $allowedValues = $this->getNetworkDriverAllowableValues();
        if (!in_array($network_driver, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'network_driver', must be one of '%s'",
                    $network_driver,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['network_driver'] = $network_driver;

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
     * @param string $avatar_link Ссылка на аватар кластера.
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
     * Gets ingress
     *
     * @return bool
     */
    public function getIngress()
    {
        return $this->container['ingress'];
    }

    /**
     * Sets ingress
     *
     * @param bool $ingress Логическое значение, показывающее, включен ли Ingress
     *
     * @return self
     */
    public function setIngress($ingress)
    {
        if (is_null($ingress)) {
            throw new \InvalidArgumentException('non-nullable ingress cannot be null');
        }
        $this->container['ingress'] = $ingress;

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
     * @param int $preset_id ID тарифа мастер-ноды
     *
     * @return self
     */
    public function setPresetId($preset_id)
    {
        if (is_null($preset_id)) {
            throw new \InvalidArgumentException('non-nullable preset_id cannot be null');
        }
        $this->container['preset_id'] = $preset_id;

        return $this;
    }

    /**
     * Gets cpu
     *
     * @return int|null
     */
    public function getCpu()
    {
        return $this->container['cpu'];
    }

    /**
     * Sets cpu
     *
     * @param int|null $cpu Общее количество ядер
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
     * Gets ram
     *
     * @return int|null
     */
    public function getRam()
    {
        return $this->container['ram'];
    }

    /**
     * Sets ram
     *
     * @param int|null $ram Общее количество памяти
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
     * Gets disk
     *
     * @return int|null
     */
    public function getDisk()
    {
        return $this->container['disk'];
    }

    /**
     * Sets disk
     *
     * @param int|null $disk Общее дисковое пространство
     *
     * @return self
     */
    public function setDisk($disk)
    {
        if (is_null($disk)) {
            throw new \InvalidArgumentException('non-nullable disk cannot be null');
        }
        $this->container['disk'] = $disk;

        return $this;
    }

    /**
     * Gets availability_zone
     *
     * @return string|null
     */
    public function getAvailabilityZone()
    {
        return $this->container['availability_zone'];
    }

    /**
     * Sets availability_zone
     *
     * @param string|null $availability_zone Зона доступности
     *
     * @return self
     */
    public function setAvailabilityZone($availability_zone)
    {
        if (is_null($availability_zone)) {
            throw new \InvalidArgumentException('non-nullable availability_zone cannot be null');
        }
        $allowedValues = $this->getAvailabilityZoneAllowableValues();
        if (!in_array($availability_zone, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'availability_zone', must be one of '%s'",
                    $availability_zone,
                    implode("', '", $allowedValues)
                )
            );
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
     * @param int|null $project_id ID проекта
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


