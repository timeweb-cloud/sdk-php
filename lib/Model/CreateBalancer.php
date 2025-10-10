<?php
/**
 * CreateBalancer
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
 * CreateBalancer Class Doc Comment
 *
 * @category Class
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class CreateBalancer implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'create-balancer';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'name' => 'string',
        'algo' => 'string',
        'is_sticky' => 'bool',
        'is_use_proxy' => 'bool',
        'is_ssl' => 'bool',
        'is_keepalive' => 'bool',
        'proto' => 'string',
        'port' => 'float',
        'path' => 'string',
        'inter' => 'float',
        'timeout' => 'float',
        'fall' => 'float',
        'rise' => 'float',
        'maxconn' => 'float',
        'connect_timeout' => 'float',
        'client_timeout' => 'float',
        'server_timeout' => 'float',
        'httprequest_timeout' => 'float',
        'preset_id' => 'float',
        'network' => '\OpenAPI\Client\Model\Network',
        'availability_zone' => '\OpenAPI\Client\Model\AvailabilityZone',
        'project_id' => 'int',
        'certificates' => '\OpenAPI\Client\Model\CreateBalancerCertificates'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'name' => null,
        'algo' => null,
        'is_sticky' => null,
        'is_use_proxy' => null,
        'is_ssl' => null,
        'is_keepalive' => null,
        'proto' => null,
        'port' => null,
        'path' => null,
        'inter' => null,
        'timeout' => null,
        'fall' => null,
        'rise' => null,
        'maxconn' => null,
        'connect_timeout' => null,
        'client_timeout' => null,
        'server_timeout' => null,
        'httprequest_timeout' => null,
        'preset_id' => null,
        'network' => null,
        'availability_zone' => null,
        'project_id' => null,
        'certificates' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'name' => false,
		'algo' => false,
		'is_sticky' => false,
		'is_use_proxy' => false,
		'is_ssl' => false,
		'is_keepalive' => false,
		'proto' => false,
		'port' => false,
		'path' => false,
		'inter' => false,
		'timeout' => false,
		'fall' => false,
		'rise' => false,
		'maxconn' => false,
		'connect_timeout' => false,
		'client_timeout' => false,
		'server_timeout' => false,
		'httprequest_timeout' => false,
		'preset_id' => false,
		'network' => false,
		'availability_zone' => false,
		'project_id' => false,
		'certificates' => false
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
        'name' => 'name',
        'algo' => 'algo',
        'is_sticky' => 'is_sticky',
        'is_use_proxy' => 'is_use_proxy',
        'is_ssl' => 'is_ssl',
        'is_keepalive' => 'is_keepalive',
        'proto' => 'proto',
        'port' => 'port',
        'path' => 'path',
        'inter' => 'inter',
        'timeout' => 'timeout',
        'fall' => 'fall',
        'rise' => 'rise',
        'maxconn' => 'maxconn',
        'connect_timeout' => 'connect_timeout',
        'client_timeout' => 'client_timeout',
        'server_timeout' => 'server_timeout',
        'httprequest_timeout' => 'httprequest_timeout',
        'preset_id' => 'preset_id',
        'network' => 'network',
        'availability_zone' => 'availability_zone',
        'project_id' => 'project_id',
        'certificates' => 'certificates'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'name' => 'setName',
        'algo' => 'setAlgo',
        'is_sticky' => 'setIsSticky',
        'is_use_proxy' => 'setIsUseProxy',
        'is_ssl' => 'setIsSsl',
        'is_keepalive' => 'setIsKeepalive',
        'proto' => 'setProto',
        'port' => 'setPort',
        'path' => 'setPath',
        'inter' => 'setInter',
        'timeout' => 'setTimeout',
        'fall' => 'setFall',
        'rise' => 'setRise',
        'maxconn' => 'setMaxconn',
        'connect_timeout' => 'setConnectTimeout',
        'client_timeout' => 'setClientTimeout',
        'server_timeout' => 'setServerTimeout',
        'httprequest_timeout' => 'setHttprequestTimeout',
        'preset_id' => 'setPresetId',
        'network' => 'setNetwork',
        'availability_zone' => 'setAvailabilityZone',
        'project_id' => 'setProjectId',
        'certificates' => 'setCertificates'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'name' => 'getName',
        'algo' => 'getAlgo',
        'is_sticky' => 'getIsSticky',
        'is_use_proxy' => 'getIsUseProxy',
        'is_ssl' => 'getIsSsl',
        'is_keepalive' => 'getIsKeepalive',
        'proto' => 'getProto',
        'port' => 'getPort',
        'path' => 'getPath',
        'inter' => 'getInter',
        'timeout' => 'getTimeout',
        'fall' => 'getFall',
        'rise' => 'getRise',
        'maxconn' => 'getMaxconn',
        'connect_timeout' => 'getConnectTimeout',
        'client_timeout' => 'getClientTimeout',
        'server_timeout' => 'getServerTimeout',
        'httprequest_timeout' => 'getHttprequestTimeout',
        'preset_id' => 'getPresetId',
        'network' => 'getNetwork',
        'availability_zone' => 'getAvailabilityZone',
        'project_id' => 'getProjectId',
        'certificates' => 'getCertificates'
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

    public const ALGO_ROUNDROBIN = 'roundrobin';
    public const ALGO_LEASTCONN = 'leastconn';
    public const PROTO_HTTP = 'http';
    public const PROTO_HTTP2 = 'http2';
    public const PROTO_HTTPS = 'https';
    public const PROTO_TCP = 'tcp';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getAlgoAllowableValues()
    {
        return [
            self::ALGO_ROUNDROBIN,
            self::ALGO_LEASTCONN,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getProtoAllowableValues()
    {
        return [
            self::PROTO_HTTP,
            self::PROTO_HTTP2,
            self::PROTO_HTTPS,
            self::PROTO_TCP,
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
        $this->setIfExists('name', $data ?? [], null);
        $this->setIfExists('algo', $data ?? [], null);
        $this->setIfExists('is_sticky', $data ?? [], null);
        $this->setIfExists('is_use_proxy', $data ?? [], null);
        $this->setIfExists('is_ssl', $data ?? [], null);
        $this->setIfExists('is_keepalive', $data ?? [], null);
        $this->setIfExists('proto', $data ?? [], null);
        $this->setIfExists('port', $data ?? [], null);
        $this->setIfExists('path', $data ?? [], null);
        $this->setIfExists('inter', $data ?? [], null);
        $this->setIfExists('timeout', $data ?? [], null);
        $this->setIfExists('fall', $data ?? [], null);
        $this->setIfExists('rise', $data ?? [], null);
        $this->setIfExists('maxconn', $data ?? [], null);
        $this->setIfExists('connect_timeout', $data ?? [], null);
        $this->setIfExists('client_timeout', $data ?? [], null);
        $this->setIfExists('server_timeout', $data ?? [], null);
        $this->setIfExists('httprequest_timeout', $data ?? [], null);
        $this->setIfExists('preset_id', $data ?? [], null);
        $this->setIfExists('network', $data ?? [], null);
        $this->setIfExists('availability_zone', $data ?? [], null);
        $this->setIfExists('project_id', $data ?? [], null);
        $this->setIfExists('certificates', $data ?? [], null);
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

        if ($this->container['name'] === null) {
            $invalidProperties[] = "'name' can't be null";
        }
        if ($this->container['algo'] === null) {
            $invalidProperties[] = "'algo' can't be null";
        }
        $allowedValues = $this->getAlgoAllowableValues();
        if (!is_null($this->container['algo']) && !in_array($this->container['algo'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'algo', must be one of '%s'",
                $this->container['algo'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['is_sticky'] === null) {
            $invalidProperties[] = "'is_sticky' can't be null";
        }
        if ($this->container['is_use_proxy'] === null) {
            $invalidProperties[] = "'is_use_proxy' can't be null";
        }
        if ($this->container['is_ssl'] === null) {
            $invalidProperties[] = "'is_ssl' can't be null";
        }
        if ($this->container['is_keepalive'] === null) {
            $invalidProperties[] = "'is_keepalive' can't be null";
        }
        if ($this->container['proto'] === null) {
            $invalidProperties[] = "'proto' can't be null";
        }
        $allowedValues = $this->getProtoAllowableValues();
        if (!is_null($this->container['proto']) && !in_array($this->container['proto'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'proto', must be one of '%s'",
                $this->container['proto'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['port'] === null) {
            $invalidProperties[] = "'port' can't be null";
        }
        if ($this->container['path'] === null) {
            $invalidProperties[] = "'path' can't be null";
        }
        if ($this->container['inter'] === null) {
            $invalidProperties[] = "'inter' can't be null";
        }
        if ($this->container['timeout'] === null) {
            $invalidProperties[] = "'timeout' can't be null";
        }
        if ($this->container['fall'] === null) {
            $invalidProperties[] = "'fall' can't be null";
        }
        if ($this->container['rise'] === null) {
            $invalidProperties[] = "'rise' can't be null";
        }
        if ($this->container['preset_id'] === null) {
            $invalidProperties[] = "'preset_id' can't be null";
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
     * @param string $name Удобочитаемое имя, установленное для балансировщика. Должно быть уникальным в рамках аккаунта
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
     * Gets algo
     *
     * @return string
     */
    public function getAlgo()
    {
        return $this->container['algo'];
    }

    /**
     * Sets algo
     *
     * @param string $algo Алгоритм переключений балансировщика.
     *
     * @return self
     */
    public function setAlgo($algo)
    {
        if (is_null($algo)) {
            throw new \InvalidArgumentException('non-nullable algo cannot be null');
        }
        $allowedValues = $this->getAlgoAllowableValues();
        if (!in_array($algo, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'algo', must be one of '%s'",
                    $algo,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['algo'] = $algo;

        return $this;
    }

    /**
     * Gets is_sticky
     *
     * @return bool
     */
    public function getIsSticky()
    {
        return $this->container['is_sticky'];
    }

    /**
     * Sets is_sticky
     *
     * @param bool $is_sticky Это логическое значение, которое показывает, сохраняется ли сессия.
     *
     * @return self
     */
    public function setIsSticky($is_sticky)
    {
        if (is_null($is_sticky)) {
            throw new \InvalidArgumentException('non-nullable is_sticky cannot be null');
        }
        $this->container['is_sticky'] = $is_sticky;

        return $this;
    }

    /**
     * Gets is_use_proxy
     *
     * @return bool
     */
    public function getIsUseProxy()
    {
        return $this->container['is_use_proxy'];
    }

    /**
     * Sets is_use_proxy
     *
     * @param bool $is_use_proxy Это логическое значение, которое показывает, выступает ли балансировщик в качестве прокси.
     *
     * @return self
     */
    public function setIsUseProxy($is_use_proxy)
    {
        if (is_null($is_use_proxy)) {
            throw new \InvalidArgumentException('non-nullable is_use_proxy cannot be null');
        }
        $this->container['is_use_proxy'] = $is_use_proxy;

        return $this;
    }

    /**
     * Gets is_ssl
     *
     * @return bool
     */
    public function getIsSsl()
    {
        return $this->container['is_ssl'];
    }

    /**
     * Sets is_ssl
     *
     * @param bool $is_ssl Это логическое значение, которое показывает, требуется ли перенаправление на SSL.
     *
     * @return self
     */
    public function setIsSsl($is_ssl)
    {
        if (is_null($is_ssl)) {
            throw new \InvalidArgumentException('non-nullable is_ssl cannot be null');
        }
        $this->container['is_ssl'] = $is_ssl;

        return $this;
    }

    /**
     * Gets is_keepalive
     *
     * @return bool
     */
    public function getIsKeepalive()
    {
        return $this->container['is_keepalive'];
    }

    /**
     * Sets is_keepalive
     *
     * @param bool $is_keepalive Это логическое значение, которое показывает, выдает ли балансировщик сигнал о проверке жизнеспособности.
     *
     * @return self
     */
    public function setIsKeepalive($is_keepalive)
    {
        if (is_null($is_keepalive)) {
            throw new \InvalidArgumentException('non-nullable is_keepalive cannot be null');
        }
        $this->container['is_keepalive'] = $is_keepalive;

        return $this;
    }

    /**
     * Gets proto
     *
     * @return string
     */
    public function getProto()
    {
        return $this->container['proto'];
    }

    /**
     * Sets proto
     *
     * @param string $proto Протокол.
     *
     * @return self
     */
    public function setProto($proto)
    {
        if (is_null($proto)) {
            throw new \InvalidArgumentException('non-nullable proto cannot be null');
        }
        $allowedValues = $this->getProtoAllowableValues();
        if (!in_array($proto, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'proto', must be one of '%s'",
                    $proto,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['proto'] = $proto;

        return $this;
    }

    /**
     * Gets port
     *
     * @return float
     */
    public function getPort()
    {
        return $this->container['port'];
    }

    /**
     * Sets port
     *
     * @param float $port Порт балансировщика.
     *
     * @return self
     */
    public function setPort($port)
    {
        if (is_null($port)) {
            throw new \InvalidArgumentException('non-nullable port cannot be null');
        }
        $this->container['port'] = $port;

        return $this;
    }

    /**
     * Gets path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->container['path'];
    }

    /**
     * Sets path
     *
     * @param string $path Адрес балансировщика.
     *
     * @return self
     */
    public function setPath($path)
    {
        if (is_null($path)) {
            throw new \InvalidArgumentException('non-nullable path cannot be null');
        }
        $this->container['path'] = $path;

        return $this;
    }

    /**
     * Gets inter
     *
     * @return float
     */
    public function getInter()
    {
        return $this->container['inter'];
    }

    /**
     * Sets inter
     *
     * @param float $inter Интервал проверки.
     *
     * @return self
     */
    public function setInter($inter)
    {
        if (is_null($inter)) {
            throw new \InvalidArgumentException('non-nullable inter cannot be null');
        }
        $this->container['inter'] = $inter;

        return $this;
    }

    /**
     * Gets timeout
     *
     * @return float
     */
    public function getTimeout()
    {
        return $this->container['timeout'];
    }

    /**
     * Sets timeout
     *
     * @param float $timeout Таймаут ответа балансировщика.
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
     * Gets fall
     *
     * @return float
     */
    public function getFall()
    {
        return $this->container['fall'];
    }

    /**
     * Sets fall
     *
     * @param float $fall Порог количества ошибок.
     *
     * @return self
     */
    public function setFall($fall)
    {
        if (is_null($fall)) {
            throw new \InvalidArgumentException('non-nullable fall cannot be null');
        }
        $this->container['fall'] = $fall;

        return $this;
    }

    /**
     * Gets rise
     *
     * @return float
     */
    public function getRise()
    {
        return $this->container['rise'];
    }

    /**
     * Sets rise
     *
     * @param float $rise Порог количества успешных ответов.
     *
     * @return self
     */
    public function setRise($rise)
    {
        if (is_null($rise)) {
            throw new \InvalidArgumentException('non-nullable rise cannot be null');
        }
        $this->container['rise'] = $rise;

        return $this;
    }

    /**
     * Gets maxconn
     *
     * @return float|null
     */
    public function getMaxconn()
    {
        return $this->container['maxconn'];
    }

    /**
     * Sets maxconn
     *
     * @param float|null $maxconn Максимальное количество соединений.
     *
     * @return self
     */
    public function setMaxconn($maxconn)
    {
        if (is_null($maxconn)) {
            throw new \InvalidArgumentException('non-nullable maxconn cannot be null');
        }
        $this->container['maxconn'] = $maxconn;

        return $this;
    }

    /**
     * Gets connect_timeout
     *
     * @return float|null
     */
    public function getConnectTimeout()
    {
        return $this->container['connect_timeout'];
    }

    /**
     * Sets connect_timeout
     *
     * @param float|null $connect_timeout Таймаут подключения.
     *
     * @return self
     */
    public function setConnectTimeout($connect_timeout)
    {
        if (is_null($connect_timeout)) {
            throw new \InvalidArgumentException('non-nullable connect_timeout cannot be null');
        }
        $this->container['connect_timeout'] = $connect_timeout;

        return $this;
    }

    /**
     * Gets client_timeout
     *
     * @return float|null
     */
    public function getClientTimeout()
    {
        return $this->container['client_timeout'];
    }

    /**
     * Sets client_timeout
     *
     * @param float|null $client_timeout Таймаут клиента.
     *
     * @return self
     */
    public function setClientTimeout($client_timeout)
    {
        if (is_null($client_timeout)) {
            throw new \InvalidArgumentException('non-nullable client_timeout cannot be null');
        }
        $this->container['client_timeout'] = $client_timeout;

        return $this;
    }

    /**
     * Gets server_timeout
     *
     * @return float|null
     */
    public function getServerTimeout()
    {
        return $this->container['server_timeout'];
    }

    /**
     * Sets server_timeout
     *
     * @param float|null $server_timeout Таймаут сервера.
     *
     * @return self
     */
    public function setServerTimeout($server_timeout)
    {
        if (is_null($server_timeout)) {
            throw new \InvalidArgumentException('non-nullable server_timeout cannot be null');
        }
        $this->container['server_timeout'] = $server_timeout;

        return $this;
    }

    /**
     * Gets httprequest_timeout
     *
     * @return float|null
     */
    public function getHttprequestTimeout()
    {
        return $this->container['httprequest_timeout'];
    }

    /**
     * Sets httprequest_timeout
     *
     * @param float|null $httprequest_timeout Таймаут HTTP запроса.
     *
     * @return self
     */
    public function setHttprequestTimeout($httprequest_timeout)
    {
        if (is_null($httprequest_timeout)) {
            throw new \InvalidArgumentException('non-nullable httprequest_timeout cannot be null');
        }
        $this->container['httprequest_timeout'] = $httprequest_timeout;

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
     * @param float $preset_id ID тарифа.
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
     * Gets network
     *
     * @return \OpenAPI\Client\Model\Network|null
     */
    public function getNetwork()
    {
        return $this->container['network'];
    }

    /**
     * Sets network
     *
     * @param \OpenAPI\Client\Model\Network|null $network network
     *
     * @return self
     */
    public function setNetwork($network)
    {
        if (is_null($network)) {
            throw new \InvalidArgumentException('non-nullable network cannot be null');
        }
        $this->container['network'] = $network;

        return $this;
    }

    /**
     * Gets availability_zone
     *
     * @return \OpenAPI\Client\Model\AvailabilityZone|null
     */
    public function getAvailabilityZone()
    {
        return $this->container['availability_zone'];
    }

    /**
     * Sets availability_zone
     *
     * @param \OpenAPI\Client\Model\AvailabilityZone|null $availability_zone availability_zone
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
     * Gets certificates
     *
     * @return \OpenAPI\Client\Model\CreateBalancerCertificates|null
     */
    public function getCertificates()
    {
        return $this->container['certificates'];
    }

    /**
     * Sets certificates
     *
     * @param \OpenAPI\Client\Model\CreateBalancerCertificates|null $certificates certificates
     *
     * @return self
     */
    public function setCertificates($certificates)
    {
        if (is_null($certificates)) {
            throw new \InvalidArgumentException('non-nullable certificates cannot be null');
        }
        $this->container['certificates'] = $certificates;

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


