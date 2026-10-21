<?php
/**
 * AiKeyLimit
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
 * AiKeyLimit Class Doc Comment
 *
 * @category Class
 * @description Лимит расхода ключа AI Gateway
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class AiKeyLimit implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'ai-key-limit';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'id' => 'string',
        'ai_key_id' => 'string',
        'entity_type' => 'string',
        'entity_id' => 'string',
        'limit' => 'int',
        'money_limit' => 'float',
        'limit_type' => 'string',
        'model_id' => 'int',
        'usage' => 'int',
        'money_usage' => 'float',
        'created_at' => '\DateTime',
        'expire_at' => '\DateTime'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'id' => 'uuid',
        'ai_key_id' => 'uuid',
        'entity_type' => null,
        'entity_id' => null,
        'limit' => null,
        'money_limit' => null,
        'limit_type' => null,
        'model_id' => null,
        'usage' => null,
        'money_usage' => null,
        'created_at' => 'date-time',
        'expire_at' => 'date-time'
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'id' => false,
		'ai_key_id' => false,
		'entity_type' => false,
		'entity_id' => false,
		'limit' => false,
		'money_limit' => true,
		'limit_type' => false,
		'model_id' => true,
		'usage' => false,
		'money_usage' => false,
		'created_at' => false,
		'expire_at' => false
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
        'ai_key_id' => 'ai_key_id',
        'entity_type' => 'entity_type',
        'entity_id' => 'entity_id',
        'limit' => 'limit',
        'money_limit' => 'money_limit',
        'limit_type' => 'limit_type',
        'model_id' => 'model_id',
        'usage' => 'usage',
        'money_usage' => 'money_usage',
        'created_at' => 'created_at',
        'expire_at' => 'expire_at'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'ai_key_id' => 'setAiKeyId',
        'entity_type' => 'setEntityType',
        'entity_id' => 'setEntityId',
        'limit' => 'setLimit',
        'money_limit' => 'setMoneyLimit',
        'limit_type' => 'setLimitType',
        'model_id' => 'setModelId',
        'usage' => 'setUsage',
        'money_usage' => 'setMoneyUsage',
        'created_at' => 'setCreatedAt',
        'expire_at' => 'setExpireAt'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'ai_key_id' => 'getAiKeyId',
        'entity_type' => 'getEntityType',
        'entity_id' => 'getEntityId',
        'limit' => 'getLimit',
        'money_limit' => 'getMoneyLimit',
        'limit_type' => 'getLimitType',
        'model_id' => 'getModelId',
        'usage' => 'getUsage',
        'money_usage' => 'getMoneyUsage',
        'created_at' => 'getCreatedAt',
        'expire_at' => 'getExpireAt'
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

    public const LIMIT_TYPE_HOUR = 'hour';
    public const LIMIT_TYPE_DAY = 'day';
    public const LIMIT_TYPE_WEEK = 'week';
    public const LIMIT_TYPE_MONTH = 'month';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getLimitTypeAllowableValues()
    {
        return [
            self::LIMIT_TYPE_HOUR,
            self::LIMIT_TYPE_DAY,
            self::LIMIT_TYPE_WEEK,
            self::LIMIT_TYPE_MONTH,
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
        $this->setIfExists('ai_key_id', $data ?? [], null);
        $this->setIfExists('entity_type', $data ?? [], null);
        $this->setIfExists('entity_id', $data ?? [], null);
        $this->setIfExists('limit', $data ?? [], null);
        $this->setIfExists('money_limit', $data ?? [], null);
        $this->setIfExists('limit_type', $data ?? [], null);
        $this->setIfExists('model_id', $data ?? [], null);
        $this->setIfExists('usage', $data ?? [], null);
        $this->setIfExists('money_usage', $data ?? [], null);
        $this->setIfExists('created_at', $data ?? [], null);
        $this->setIfExists('expire_at', $data ?? [], null);
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
        if ($this->container['ai_key_id'] === null) {
            $invalidProperties[] = "'ai_key_id' can't be null";
        }
        if ($this->container['entity_type'] === null) {
            $invalidProperties[] = "'entity_type' can't be null";
        }
        if ($this->container['entity_id'] === null) {
            $invalidProperties[] = "'entity_id' can't be null";
        }
        if ($this->container['limit'] === null) {
            $invalidProperties[] = "'limit' can't be null";
        }
        if (($this->container['limit'] > 4294967295)) {
            $invalidProperties[] = "invalid value for 'limit', must be smaller than or equal to 4294967295.";
        }

        if (($this->container['limit'] < 0)) {
            $invalidProperties[] = "invalid value for 'limit', must be bigger than or equal to 0.";
        }

        if ($this->container['money_limit'] === null) {
            $invalidProperties[] = "'money_limit' can't be null";
        }
        if (($this->container['money_limit'] > 9999999999)) {
            $invalidProperties[] = "invalid value for 'money_limit', must be smaller than or equal to 9999999999.";
        }

        if (($this->container['money_limit'] < 0)) {
            $invalidProperties[] = "invalid value for 'money_limit', must be bigger than or equal to 0.";
        }

        if ($this->container['limit_type'] === null) {
            $invalidProperties[] = "'limit_type' can't be null";
        }
        $allowedValues = $this->getLimitTypeAllowableValues();
        if (!is_null($this->container['limit_type']) && !in_array($this->container['limit_type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'limit_type', must be one of '%s'",
                $this->container['limit_type'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['model_id'] === null) {
            $invalidProperties[] = "'model_id' can't be null";
        }
        if ($this->container['usage'] === null) {
            $invalidProperties[] = "'usage' can't be null";
        }
        if ($this->container['money_usage'] === null) {
            $invalidProperties[] = "'money_usage' can't be null";
        }
        if ($this->container['created_at'] === null) {
            $invalidProperties[] = "'created_at' can't be null";
        }
        if ($this->container['expire_at'] === null) {
            $invalidProperties[] = "'expire_at' can't be null";
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
     * @return string
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param string $id ID лимита (UUID)
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
     * Gets ai_key_id
     *
     * @return string
     */
    public function getAiKeyId()
    {
        return $this->container['ai_key_id'];
    }

    /**
     * Sets ai_key_id
     *
     * @param string $ai_key_id ID ключа, к которому относится лимит
     *
     * @return self
     */
    public function setAiKeyId($ai_key_id)
    {
        if (is_null($ai_key_id)) {
            throw new \InvalidArgumentException('non-nullable ai_key_id cannot be null');
        }
        $this->container['ai_key_id'] = $ai_key_id;

        return $this;
    }

    /**
     * Gets entity_type
     *
     * @return string
     */
    public function getEntityType()
    {
        return $this->container['entity_type'];
    }

    /**
     * Sets entity_type
     *
     * @param string $entity_type Тип сущности, на которую действует лимит. Для лимита на сам ключ — тип ключа (`aikey` или `k8s`)
     *
     * @return self
     */
    public function setEntityType($entity_type)
    {
        if (is_null($entity_type)) {
            throw new \InvalidArgumentException('non-nullable entity_type cannot be null');
        }
        $this->container['entity_type'] = $entity_type;

        return $this;
    }

    /**
     * Gets entity_id
     *
     * @return string
     */
    public function getEntityId()
    {
        return $this->container['entity_id'];
    }

    /**
     * Sets entity_id
     *
     * @param string $entity_id ID сущности, на которую действует лимит. Для лимита на сам ключ — ID ключа
     *
     * @return self
     */
    public function setEntityId($entity_id)
    {
        if (is_null($entity_id)) {
            throw new \InvalidArgumentException('non-nullable entity_id cannot be null');
        }
        $this->container['entity_id'] = $entity_id;

        return $this;
    }

    /**
     * Gets limit
     *
     * @return int
     */
    public function getLimit()
    {
        return $this->container['limit'];
    }

    /**
     * Sets limit
     *
     * @param int $limit Лимит в токенах за период. Не действует, если задан `money_limit`. `0` — запросы запрещены
     *
     * @return self
     */
    public function setLimit($limit)
    {
        if (is_null($limit)) {
            throw new \InvalidArgumentException('non-nullable limit cannot be null');
        }

        if (($limit > 4294967295)) {
            throw new \InvalidArgumentException('invalid value for $limit when calling AiKeyLimit., must be smaller than or equal to 4294967295.');
        }
        if (($limit < 0)) {
            throw new \InvalidArgumentException('invalid value for $limit when calling AiKeyLimit., must be bigger than or equal to 0.');
        }

        $this->container['limit'] = $limit;

        return $this;
    }

    /**
     * Gets money_limit
     *
     * @return float
     */
    public function getMoneyLimit()
    {
        return $this->container['money_limit'];
    }

    /**
     * Sets money_limit
     *
     * @param float $money_limit Лимит в деньгах за период, в валюте аккаунта. Приоритетнее `limit`. `null` — не задан, действует `limit`; `0` — запросы запрещены
     *
     * @return self
     */
    public function setMoneyLimit($money_limit)
    {
        if (is_null($money_limit)) {
            array_push($this->openAPINullablesSetToNull, 'money_limit');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('money_limit', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        if (!is_null($money_limit) && ($money_limit > 9999999999)) {
            throw new \InvalidArgumentException('invalid value for $money_limit when calling AiKeyLimit., must be smaller than or equal to 9999999999.');
        }
        if (!is_null($money_limit) && ($money_limit < 0)) {
            throw new \InvalidArgumentException('invalid value for $money_limit when calling AiKeyLimit., must be bigger than or equal to 0.');
        }

        $this->container['money_limit'] = $money_limit;

        return $this;
    }

    /**
     * Gets limit_type
     *
     * @return string
     */
    public function getLimitType()
    {
        return $this->container['limit_type'];
    }

    /**
     * Sets limit_type
     *
     * @param string $limit_type Период лимита: `hour` — час, `day` — сутки, `week` — 7 дней, `month` — 30 дней
     *
     * @return self
     */
    public function setLimitType($limit_type)
    {
        if (is_null($limit_type)) {
            throw new \InvalidArgumentException('non-nullable limit_type cannot be null');
        }
        $allowedValues = $this->getLimitTypeAllowableValues();
        if (!in_array($limit_type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'limit_type', must be one of '%s'",
                    $limit_type,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['limit_type'] = $limit_type;

        return $this;
    }

    /**
     * Gets model_id
     *
     * @return int
     */
    public function getModelId()
    {
        return $this->container['model_id'];
    }

    /**
     * Sets model_id
     *
     * @param int $model_id ID модели, на которую действует лимит. `null` — лимит на все модели
     *
     * @return self
     */
    public function setModelId($model_id)
    {
        if (is_null($model_id)) {
            array_push($this->openAPINullablesSetToNull, 'model_id');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('model_id', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['model_id'] = $model_id;

        return $this;
    }

    /**
     * Gets usage
     *
     * @return int
     */
    public function getUsage()
    {
        return $this->container['usage'];
    }

    /**
     * Sets usage
     *
     * @param int $usage Израсходовано токенов за текущий период
     *
     * @return self
     */
    public function setUsage($usage)
    {
        if (is_null($usage)) {
            throw new \InvalidArgumentException('non-nullable usage cannot be null');
        }
        $this->container['usage'] = $usage;

        return $this;
    }

    /**
     * Gets money_usage
     *
     * @return float
     */
    public function getMoneyUsage()
    {
        return $this->container['money_usage'];
    }

    /**
     * Sets money_usage
     *
     * @param float $money_usage Израсходовано денег за текущий период — полная стоимость запросов до списания бонусов, в валюте аккаунта
     *
     * @return self
     */
    public function setMoneyUsage($money_usage)
    {
        if (is_null($money_usage)) {
            throw new \InvalidArgumentException('non-nullable money_usage cannot be null');
        }
        $this->container['money_usage'] = $money_usage;

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
     * @param \DateTime $created_at Дата и время создания лимита
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
     * Gets expire_at
     *
     * @return \DateTime
     */
    public function getExpireAt()
    {
        return $this->container['expire_at'];
    }

    /**
     * Sets expire_at
     *
     * @param \DateTime $expire_at Дата и время окончания текущего периода: после него расход обнуляется и начинается новый период
     *
     * @return self
     */
    public function setExpireAt($expire_at)
    {
        if (is_null($expire_at)) {
            throw new \InvalidArgumentException('non-nullable expire_at cannot be null');
        }
        $this->container['expire_at'] = $expire_at;

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


