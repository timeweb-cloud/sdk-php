<?php
/**
 * DbParametersByType
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
 * DbParametersByType Class Doc Comment
 *
 * @category Class
 * @description Имена параметров конфигурации, доступных для каждого типа кластера базы данных. Ключ объекта — тип кластера (значение поля &#x60;type&#x60; при создании кластера), значение — массив имён параметров, которые можно передать в &#x60;config_parameters&#x60; для кластера этого типа. Наборы параметров различаются между версиями одной СУБД. Значения параметров этот метод не возвращает — рекомендуемые значения можно получить в &#x60;GET /api/v1/dbs/default-parameters&#x60;.
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class DbParametersByType implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'db-parameters-by-type';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'mysql5' => 'string[]',
        'mysql' => 'string[]',
        'mysql8_4' => 'string[]',
        'postgres' => 'string[]',
        'postgres14' => 'string[]',
        'postgres15' => 'string[]',
        'postgres16' => 'string[]',
        'postgres17' => 'string[]',
        'postgres18' => 'string[]',
        'redis' => 'string[]',
        'redis7' => 'string[]',
        'redis8_1' => 'string[]',
        'valkey' => 'string[]',
        'valkey7' => 'string[]',
        'valkey8_1' => 'string[]',
        'valkey9_1' => 'string[]',
        'mongodb4' => 'string[]',
        'mongodb' => 'string[]',
        'mongodb6' => 'string[]',
        'mongodb7' => 'string[]',
        'mongodb8_0' => 'string[]',
        'opensearch' => 'string[]',
        'opensearch2_19' => 'string[]',
        'clickhouse' => 'string[]',
        'clickhouse24' => 'string[]',
        'clickhouse25' => 'string[]',
        'kafka' => 'string[]',
        'rabbitmq' => 'string[]',
        'rabbitmq4_0' => 'string[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'mysql5' => null,
        'mysql' => null,
        'mysql8_4' => null,
        'postgres' => null,
        'postgres14' => null,
        'postgres15' => null,
        'postgres16' => null,
        'postgres17' => null,
        'postgres18' => null,
        'redis' => null,
        'redis7' => null,
        'redis8_1' => null,
        'valkey' => null,
        'valkey7' => null,
        'valkey8_1' => null,
        'valkey9_1' => null,
        'mongodb4' => null,
        'mongodb' => null,
        'mongodb6' => null,
        'mongodb7' => null,
        'mongodb8_0' => null,
        'opensearch' => null,
        'opensearch2_19' => null,
        'clickhouse' => null,
        'clickhouse24' => null,
        'clickhouse25' => null,
        'kafka' => null,
        'rabbitmq' => null,
        'rabbitmq4_0' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'mysql5' => false,
		'mysql' => false,
		'mysql8_4' => false,
		'postgres' => false,
		'postgres14' => false,
		'postgres15' => false,
		'postgres16' => false,
		'postgres17' => false,
		'postgres18' => false,
		'redis' => false,
		'redis7' => false,
		'redis8_1' => false,
		'valkey' => false,
		'valkey7' => false,
		'valkey8_1' => false,
		'valkey9_1' => false,
		'mongodb4' => false,
		'mongodb' => false,
		'mongodb6' => false,
		'mongodb7' => false,
		'mongodb8_0' => false,
		'opensearch' => false,
		'opensearch2_19' => false,
		'clickhouse' => false,
		'clickhouse24' => false,
		'clickhouse25' => false,
		'kafka' => false,
		'rabbitmq' => false,
		'rabbitmq4_0' => false
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
        'mysql5' => 'mysql5',
        'mysql' => 'mysql',
        'mysql8_4' => 'mysql8_4',
        'postgres' => 'postgres',
        'postgres14' => 'postgres14',
        'postgres15' => 'postgres15',
        'postgres16' => 'postgres16',
        'postgres17' => 'postgres17',
        'postgres18' => 'postgres18',
        'redis' => 'redis',
        'redis7' => 'redis7',
        'redis8_1' => 'redis8_1',
        'valkey' => 'valkey',
        'valkey7' => 'valkey7',
        'valkey8_1' => 'valkey8_1',
        'valkey9_1' => 'valkey9_1',
        'mongodb4' => 'mongodb4',
        'mongodb' => 'mongodb',
        'mongodb6' => 'mongodb6',
        'mongodb7' => 'mongodb7',
        'mongodb8_0' => 'mongodb8_0',
        'opensearch' => 'opensearch',
        'opensearch2_19' => 'opensearch2_19',
        'clickhouse' => 'clickhouse',
        'clickhouse24' => 'clickhouse24',
        'clickhouse25' => 'clickhouse25',
        'kafka' => 'kafka',
        'rabbitmq' => 'rabbitmq',
        'rabbitmq4_0' => 'rabbitmq4_0'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'mysql5' => 'setMysql5',
        'mysql' => 'setMysql',
        'mysql8_4' => 'setMysql84',
        'postgres' => 'setPostgres',
        'postgres14' => 'setPostgres14',
        'postgres15' => 'setPostgres15',
        'postgres16' => 'setPostgres16',
        'postgres17' => 'setPostgres17',
        'postgres18' => 'setPostgres18',
        'redis' => 'setRedis',
        'redis7' => 'setRedis7',
        'redis8_1' => 'setRedis81',
        'valkey' => 'setValkey',
        'valkey7' => 'setValkey7',
        'valkey8_1' => 'setValkey81',
        'valkey9_1' => 'setValkey91',
        'mongodb4' => 'setMongodb4',
        'mongodb' => 'setMongodb',
        'mongodb6' => 'setMongodb6',
        'mongodb7' => 'setMongodb7',
        'mongodb8_0' => 'setMongodb80',
        'opensearch' => 'setOpensearch',
        'opensearch2_19' => 'setOpensearch219',
        'clickhouse' => 'setClickhouse',
        'clickhouse24' => 'setClickhouse24',
        'clickhouse25' => 'setClickhouse25',
        'kafka' => 'setKafka',
        'rabbitmq' => 'setRabbitmq',
        'rabbitmq4_0' => 'setRabbitmq40'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'mysql5' => 'getMysql5',
        'mysql' => 'getMysql',
        'mysql8_4' => 'getMysql84',
        'postgres' => 'getPostgres',
        'postgres14' => 'getPostgres14',
        'postgres15' => 'getPostgres15',
        'postgres16' => 'getPostgres16',
        'postgres17' => 'getPostgres17',
        'postgres18' => 'getPostgres18',
        'redis' => 'getRedis',
        'redis7' => 'getRedis7',
        'redis8_1' => 'getRedis81',
        'valkey' => 'getValkey',
        'valkey7' => 'getValkey7',
        'valkey8_1' => 'getValkey81',
        'valkey9_1' => 'getValkey91',
        'mongodb4' => 'getMongodb4',
        'mongodb' => 'getMongodb',
        'mongodb6' => 'getMongodb6',
        'mongodb7' => 'getMongodb7',
        'mongodb8_0' => 'getMongodb80',
        'opensearch' => 'getOpensearch',
        'opensearch2_19' => 'getOpensearch219',
        'clickhouse' => 'getClickhouse',
        'clickhouse24' => 'getClickhouse24',
        'clickhouse25' => 'getClickhouse25',
        'kafka' => 'getKafka',
        'rabbitmq' => 'getRabbitmq',
        'rabbitmq4_0' => 'getRabbitmq40'
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
        $this->setIfExists('mysql5', $data ?? [], null);
        $this->setIfExists('mysql', $data ?? [], null);
        $this->setIfExists('mysql8_4', $data ?? [], null);
        $this->setIfExists('postgres', $data ?? [], null);
        $this->setIfExists('postgres14', $data ?? [], null);
        $this->setIfExists('postgres15', $data ?? [], null);
        $this->setIfExists('postgres16', $data ?? [], null);
        $this->setIfExists('postgres17', $data ?? [], null);
        $this->setIfExists('postgres18', $data ?? [], null);
        $this->setIfExists('redis', $data ?? [], null);
        $this->setIfExists('redis7', $data ?? [], null);
        $this->setIfExists('redis8_1', $data ?? [], null);
        $this->setIfExists('valkey', $data ?? [], null);
        $this->setIfExists('valkey7', $data ?? [], null);
        $this->setIfExists('valkey8_1', $data ?? [], null);
        $this->setIfExists('valkey9_1', $data ?? [], null);
        $this->setIfExists('mongodb4', $data ?? [], null);
        $this->setIfExists('mongodb', $data ?? [], null);
        $this->setIfExists('mongodb6', $data ?? [], null);
        $this->setIfExists('mongodb7', $data ?? [], null);
        $this->setIfExists('mongodb8_0', $data ?? [], null);
        $this->setIfExists('opensearch', $data ?? [], null);
        $this->setIfExists('opensearch2_19', $data ?? [], null);
        $this->setIfExists('clickhouse', $data ?? [], null);
        $this->setIfExists('clickhouse24', $data ?? [], null);
        $this->setIfExists('clickhouse25', $data ?? [], null);
        $this->setIfExists('kafka', $data ?? [], null);
        $this->setIfExists('rabbitmq', $data ?? [], null);
        $this->setIfExists('rabbitmq4_0', $data ?? [], null);
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

        if ($this->container['mysql5'] === null) {
            $invalidProperties[] = "'mysql5' can't be null";
        }
        if ($this->container['mysql'] === null) {
            $invalidProperties[] = "'mysql' can't be null";
        }
        if ($this->container['mysql8_4'] === null) {
            $invalidProperties[] = "'mysql8_4' can't be null";
        }
        if ($this->container['postgres'] === null) {
            $invalidProperties[] = "'postgres' can't be null";
        }
        if ($this->container['postgres14'] === null) {
            $invalidProperties[] = "'postgres14' can't be null";
        }
        if ($this->container['postgres15'] === null) {
            $invalidProperties[] = "'postgres15' can't be null";
        }
        if ($this->container['postgres16'] === null) {
            $invalidProperties[] = "'postgres16' can't be null";
        }
        if ($this->container['postgres17'] === null) {
            $invalidProperties[] = "'postgres17' can't be null";
        }
        if ($this->container['postgres18'] === null) {
            $invalidProperties[] = "'postgres18' can't be null";
        }
        if ($this->container['redis'] === null) {
            $invalidProperties[] = "'redis' can't be null";
        }
        if ($this->container['redis7'] === null) {
            $invalidProperties[] = "'redis7' can't be null";
        }
        if ($this->container['redis8_1'] === null) {
            $invalidProperties[] = "'redis8_1' can't be null";
        }
        if ($this->container['valkey'] === null) {
            $invalidProperties[] = "'valkey' can't be null";
        }
        if ($this->container['valkey7'] === null) {
            $invalidProperties[] = "'valkey7' can't be null";
        }
        if ($this->container['valkey8_1'] === null) {
            $invalidProperties[] = "'valkey8_1' can't be null";
        }
        if ($this->container['valkey9_1'] === null) {
            $invalidProperties[] = "'valkey9_1' can't be null";
        }
        if ($this->container['mongodb4'] === null) {
            $invalidProperties[] = "'mongodb4' can't be null";
        }
        if ($this->container['mongodb'] === null) {
            $invalidProperties[] = "'mongodb' can't be null";
        }
        if ($this->container['mongodb6'] === null) {
            $invalidProperties[] = "'mongodb6' can't be null";
        }
        if ($this->container['mongodb7'] === null) {
            $invalidProperties[] = "'mongodb7' can't be null";
        }
        if ($this->container['mongodb8_0'] === null) {
            $invalidProperties[] = "'mongodb8_0' can't be null";
        }
        if ($this->container['opensearch'] === null) {
            $invalidProperties[] = "'opensearch' can't be null";
        }
        if ($this->container['opensearch2_19'] === null) {
            $invalidProperties[] = "'opensearch2_19' can't be null";
        }
        if ($this->container['clickhouse'] === null) {
            $invalidProperties[] = "'clickhouse' can't be null";
        }
        if ($this->container['clickhouse24'] === null) {
            $invalidProperties[] = "'clickhouse24' can't be null";
        }
        if ($this->container['clickhouse25'] === null) {
            $invalidProperties[] = "'clickhouse25' can't be null";
        }
        if ($this->container['kafka'] === null) {
            $invalidProperties[] = "'kafka' can't be null";
        }
        if ($this->container['rabbitmq'] === null) {
            $invalidProperties[] = "'rabbitmq' can't be null";
        }
        if ($this->container['rabbitmq4_0'] === null) {
            $invalidProperties[] = "'rabbitmq4_0' can't be null";
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
     * Gets mysql5
     *
     * @return string[]
     */
    public function getMysql5()
    {
        return $this->container['mysql5'];
    }

    /**
     * Sets mysql5
     *
     * @param string[] $mysql5 Параметры, доступные для кластеров типа `mysql5`.
     *
     * @return self
     */
    public function setMysql5($mysql5)
    {
        if (is_null($mysql5)) {
            throw new \InvalidArgumentException('non-nullable mysql5 cannot be null');
        }
        $this->container['mysql5'] = $mysql5;

        return $this;
    }

    /**
     * Gets mysql
     *
     * @return string[]
     */
    public function getMysql()
    {
        return $this->container['mysql'];
    }

    /**
     * Sets mysql
     *
     * @param string[] $mysql Параметры, доступные для кластеров типа `mysql`.
     *
     * @return self
     */
    public function setMysql($mysql)
    {
        if (is_null($mysql)) {
            throw new \InvalidArgumentException('non-nullable mysql cannot be null');
        }
        $this->container['mysql'] = $mysql;

        return $this;
    }

    /**
     * Gets mysql8_4
     *
     * @return string[]
     */
    public function getMysql84()
    {
        return $this->container['mysql8_4'];
    }

    /**
     * Sets mysql8_4
     *
     * @param string[] $mysql8_4 Параметры, доступные для кластеров типа `mysql8_4`.
     *
     * @return self
     */
    public function setMysql84($mysql8_4)
    {
        if (is_null($mysql8_4)) {
            throw new \InvalidArgumentException('non-nullable mysql8_4 cannot be null');
        }
        $this->container['mysql8_4'] = $mysql8_4;

        return $this;
    }

    /**
     * Gets postgres
     *
     * @return string[]
     */
    public function getPostgres()
    {
        return $this->container['postgres'];
    }

    /**
     * Sets postgres
     *
     * @param string[] $postgres Параметры, доступные для кластеров типа `postgres` (PostgreSQL 13).
     *
     * @return self
     */
    public function setPostgres($postgres)
    {
        if (is_null($postgres)) {
            throw new \InvalidArgumentException('non-nullable postgres cannot be null');
        }
        $this->container['postgres'] = $postgres;

        return $this;
    }

    /**
     * Gets postgres14
     *
     * @return string[]
     */
    public function getPostgres14()
    {
        return $this->container['postgres14'];
    }

    /**
     * Sets postgres14
     *
     * @param string[] $postgres14 Параметры, доступные для кластеров типа `postgres14`.
     *
     * @return self
     */
    public function setPostgres14($postgres14)
    {
        if (is_null($postgres14)) {
            throw new \InvalidArgumentException('non-nullable postgres14 cannot be null');
        }
        $this->container['postgres14'] = $postgres14;

        return $this;
    }

    /**
     * Gets postgres15
     *
     * @return string[]
     */
    public function getPostgres15()
    {
        return $this->container['postgres15'];
    }

    /**
     * Sets postgres15
     *
     * @param string[] $postgres15 Параметры, доступные для кластеров типа `postgres15`.
     *
     * @return self
     */
    public function setPostgres15($postgres15)
    {
        if (is_null($postgres15)) {
            throw new \InvalidArgumentException('non-nullable postgres15 cannot be null');
        }
        $this->container['postgres15'] = $postgres15;

        return $this;
    }

    /**
     * Gets postgres16
     *
     * @return string[]
     */
    public function getPostgres16()
    {
        return $this->container['postgres16'];
    }

    /**
     * Sets postgres16
     *
     * @param string[] $postgres16 Параметры, доступные для кластеров типа `postgres16`.
     *
     * @return self
     */
    public function setPostgres16($postgres16)
    {
        if (is_null($postgres16)) {
            throw new \InvalidArgumentException('non-nullable postgres16 cannot be null');
        }
        $this->container['postgres16'] = $postgres16;

        return $this;
    }

    /**
     * Gets postgres17
     *
     * @return string[]
     */
    public function getPostgres17()
    {
        return $this->container['postgres17'];
    }

    /**
     * Sets postgres17
     *
     * @param string[] $postgres17 Параметры, доступные для кластеров типа `postgres17`.
     *
     * @return self
     */
    public function setPostgres17($postgres17)
    {
        if (is_null($postgres17)) {
            throw new \InvalidArgumentException('non-nullable postgres17 cannot be null');
        }
        $this->container['postgres17'] = $postgres17;

        return $this;
    }

    /**
     * Gets postgres18
     *
     * @return string[]
     */
    public function getPostgres18()
    {
        return $this->container['postgres18'];
    }

    /**
     * Sets postgres18
     *
     * @param string[] $postgres18 Параметры, доступные для кластеров типа `postgres18`. Набор отличается от предыдущих версий PostgreSQL — например, добавлены `io_method` и `io_workers`.
     *
     * @return self
     */
    public function setPostgres18($postgres18)
    {
        if (is_null($postgres18)) {
            throw new \InvalidArgumentException('non-nullable postgres18 cannot be null');
        }
        $this->container['postgres18'] = $postgres18;

        return $this;
    }

    /**
     * Gets redis
     *
     * @return string[]
     */
    public function getRedis()
    {
        return $this->container['redis'];
    }

    /**
     * Sets redis
     *
     * @param string[] $redis Параметры, доступные для кластеров типа `redis`.
     *
     * @return self
     */
    public function setRedis($redis)
    {
        if (is_null($redis)) {
            throw new \InvalidArgumentException('non-nullable redis cannot be null');
        }
        $this->container['redis'] = $redis;

        return $this;
    }

    /**
     * Gets redis7
     *
     * @return string[]
     */
    public function getRedis7()
    {
        return $this->container['redis7'];
    }

    /**
     * Sets redis7
     *
     * @param string[] $redis7 Параметры, доступные для кластеров типа `redis7`.
     *
     * @return self
     */
    public function setRedis7($redis7)
    {
        if (is_null($redis7)) {
            throw new \InvalidArgumentException('non-nullable redis7 cannot be null');
        }
        $this->container['redis7'] = $redis7;

        return $this;
    }

    /**
     * Gets redis8_1
     *
     * @return string[]
     */
    public function getRedis81()
    {
        return $this->container['redis8_1'];
    }

    /**
     * Sets redis8_1
     *
     * @param string[] $redis8_1 Параметры, доступные для кластеров типа `redis8_1`.
     *
     * @return self
     */
    public function setRedis81($redis8_1)
    {
        if (is_null($redis8_1)) {
            throw new \InvalidArgumentException('non-nullable redis8_1 cannot be null');
        }
        $this->container['redis8_1'] = $redis8_1;

        return $this;
    }

    /**
     * Gets valkey
     *
     * @return string[]
     */
    public function getValkey()
    {
        return $this->container['valkey'];
    }

    /**
     * Sets valkey
     *
     * @param string[] $valkey Параметры, доступные для кластеров типа `valkey`.
     *
     * @return self
     */
    public function setValkey($valkey)
    {
        if (is_null($valkey)) {
            throw new \InvalidArgumentException('non-nullable valkey cannot be null');
        }
        $this->container['valkey'] = $valkey;

        return $this;
    }

    /**
     * Gets valkey7
     *
     * @return string[]
     */
    public function getValkey7()
    {
        return $this->container['valkey7'];
    }

    /**
     * Sets valkey7
     *
     * @param string[] $valkey7 Параметры, доступные для кластеров типа `valkey7`.
     *
     * @return self
     */
    public function setValkey7($valkey7)
    {
        if (is_null($valkey7)) {
            throw new \InvalidArgumentException('non-nullable valkey7 cannot be null');
        }
        $this->container['valkey7'] = $valkey7;

        return $this;
    }

    /**
     * Gets valkey8_1
     *
     * @return string[]
     */
    public function getValkey81()
    {
        return $this->container['valkey8_1'];
    }

    /**
     * Sets valkey8_1
     *
     * @param string[] $valkey8_1 Параметры, доступные для кластеров типа `valkey8_1`.
     *
     * @return self
     */
    public function setValkey81($valkey8_1)
    {
        if (is_null($valkey8_1)) {
            throw new \InvalidArgumentException('non-nullable valkey8_1 cannot be null');
        }
        $this->container['valkey8_1'] = $valkey8_1;

        return $this;
    }

    /**
     * Gets valkey9_1
     *
     * @return string[]
     */
    public function getValkey91()
    {
        return $this->container['valkey9_1'];
    }

    /**
     * Sets valkey9_1
     *
     * @param string[] $valkey9_1 Параметры, доступные для кластеров типа `valkey9_1`.
     *
     * @return self
     */
    public function setValkey91($valkey9_1)
    {
        if (is_null($valkey9_1)) {
            throw new \InvalidArgumentException('non-nullable valkey9_1 cannot be null');
        }
        $this->container['valkey9_1'] = $valkey9_1;

        return $this;
    }

    /**
     * Gets mongodb4
     *
     * @return string[]
     */
    public function getMongodb4()
    {
        return $this->container['mongodb4'];
    }

    /**
     * Sets mongodb4
     *
     * @param string[] $mongodb4 Для кластеров типа `mongodb4` настраиваемых параметров нет — всегда пустой массив.
     *
     * @return self
     */
    public function setMongodb4($mongodb4)
    {
        if (is_null($mongodb4)) {
            throw new \InvalidArgumentException('non-nullable mongodb4 cannot be null');
        }
        $this->container['mongodb4'] = $mongodb4;

        return $this;
    }

    /**
     * Gets mongodb
     *
     * @return string[]
     */
    public function getMongodb()
    {
        return $this->container['mongodb'];
    }

    /**
     * Sets mongodb
     *
     * @param string[] $mongodb Для кластеров типа `mongodb` настраиваемых параметров нет — всегда пустой массив.
     *
     * @return self
     */
    public function setMongodb($mongodb)
    {
        if (is_null($mongodb)) {
            throw new \InvalidArgumentException('non-nullable mongodb cannot be null');
        }
        $this->container['mongodb'] = $mongodb;

        return $this;
    }

    /**
     * Gets mongodb6
     *
     * @return string[]
     */
    public function getMongodb6()
    {
        return $this->container['mongodb6'];
    }

    /**
     * Sets mongodb6
     *
     * @param string[] $mongodb6 Для кластеров типа `mongodb6` настраиваемых параметров нет — всегда пустой массив.
     *
     * @return self
     */
    public function setMongodb6($mongodb6)
    {
        if (is_null($mongodb6)) {
            throw new \InvalidArgumentException('non-nullable mongodb6 cannot be null');
        }
        $this->container['mongodb6'] = $mongodb6;

        return $this;
    }

    /**
     * Gets mongodb7
     *
     * @return string[]
     */
    public function getMongodb7()
    {
        return $this->container['mongodb7'];
    }

    /**
     * Sets mongodb7
     *
     * @param string[] $mongodb7 Для кластеров типа `mongodb7` настраиваемых параметров нет — всегда пустой массив.
     *
     * @return self
     */
    public function setMongodb7($mongodb7)
    {
        if (is_null($mongodb7)) {
            throw new \InvalidArgumentException('non-nullable mongodb7 cannot be null');
        }
        $this->container['mongodb7'] = $mongodb7;

        return $this;
    }

    /**
     * Gets mongodb8_0
     *
     * @return string[]
     */
    public function getMongodb80()
    {
        return $this->container['mongodb8_0'];
    }

    /**
     * Sets mongodb8_0
     *
     * @param string[] $mongodb8_0 Для кластеров типа `mongodb8_0` настраиваемых параметров нет — всегда пустой массив.
     *
     * @return self
     */
    public function setMongodb80($mongodb8_0)
    {
        if (is_null($mongodb8_0)) {
            throw new \InvalidArgumentException('non-nullable mongodb8_0 cannot be null');
        }
        $this->container['mongodb8_0'] = $mongodb8_0;

        return $this;
    }

    /**
     * Gets opensearch
     *
     * @return string[]
     */
    public function getOpensearch()
    {
        return $this->container['opensearch'];
    }

    /**
     * Sets opensearch
     *
     * @param string[] $opensearch Для кластеров типа `opensearch` настраиваемых параметров нет — всегда пустой массив.
     *
     * @return self
     */
    public function setOpensearch($opensearch)
    {
        if (is_null($opensearch)) {
            throw new \InvalidArgumentException('non-nullable opensearch cannot be null');
        }
        $this->container['opensearch'] = $opensearch;

        return $this;
    }

    /**
     * Gets opensearch2_19
     *
     * @return string[]
     */
    public function getOpensearch219()
    {
        return $this->container['opensearch2_19'];
    }

    /**
     * Sets opensearch2_19
     *
     * @param string[] $opensearch2_19 Для кластеров типа `opensearch2_19` настраиваемых параметров нет — всегда пустой массив.
     *
     * @return self
     */
    public function setOpensearch219($opensearch2_19)
    {
        if (is_null($opensearch2_19)) {
            throw new \InvalidArgumentException('non-nullable opensearch2_19 cannot be null');
        }
        $this->container['opensearch2_19'] = $opensearch2_19;

        return $this;
    }

    /**
     * Gets clickhouse
     *
     * @return string[]
     */
    public function getClickhouse()
    {
        return $this->container['clickhouse'];
    }

    /**
     * Sets clickhouse
     *
     * @param string[] $clickhouse Для кластеров типа `clickhouse` настраиваемых параметров нет — всегда пустой массив.
     *
     * @return self
     */
    public function setClickhouse($clickhouse)
    {
        if (is_null($clickhouse)) {
            throw new \InvalidArgumentException('non-nullable clickhouse cannot be null');
        }
        $this->container['clickhouse'] = $clickhouse;

        return $this;
    }

    /**
     * Gets clickhouse24
     *
     * @return string[]
     */
    public function getClickhouse24()
    {
        return $this->container['clickhouse24'];
    }

    /**
     * Sets clickhouse24
     *
     * @param string[] $clickhouse24 Для кластеров типа `clickhouse24` настраиваемых параметров нет — всегда пустой массив.
     *
     * @return self
     */
    public function setClickhouse24($clickhouse24)
    {
        if (is_null($clickhouse24)) {
            throw new \InvalidArgumentException('non-nullable clickhouse24 cannot be null');
        }
        $this->container['clickhouse24'] = $clickhouse24;

        return $this;
    }

    /**
     * Gets clickhouse25
     *
     * @return string[]
     */
    public function getClickhouse25()
    {
        return $this->container['clickhouse25'];
    }

    /**
     * Sets clickhouse25
     *
     * @param string[] $clickhouse25 Для кластеров типа `clickhouse25` настраиваемых параметров нет — всегда пустой массив.
     *
     * @return self
     */
    public function setClickhouse25($clickhouse25)
    {
        if (is_null($clickhouse25)) {
            throw new \InvalidArgumentException('non-nullable clickhouse25 cannot be null');
        }
        $this->container['clickhouse25'] = $clickhouse25;

        return $this;
    }

    /**
     * Gets kafka
     *
     * @return string[]
     */
    public function getKafka()
    {
        return $this->container['kafka'];
    }

    /**
     * Sets kafka
     *
     * @param string[] $kafka Для кластеров типа `kafka` настраиваемых параметров нет — всегда пустой массив.
     *
     * @return self
     */
    public function setKafka($kafka)
    {
        if (is_null($kafka)) {
            throw new \InvalidArgumentException('non-nullable kafka cannot be null');
        }
        $this->container['kafka'] = $kafka;

        return $this;
    }

    /**
     * Gets rabbitmq
     *
     * @return string[]
     */
    public function getRabbitmq()
    {
        return $this->container['rabbitmq'];
    }

    /**
     * Sets rabbitmq
     *
     * @param string[] $rabbitmq Для кластеров типа `rabbitmq` настраиваемых параметров нет — всегда пустой массив.
     *
     * @return self
     */
    public function setRabbitmq($rabbitmq)
    {
        if (is_null($rabbitmq)) {
            throw new \InvalidArgumentException('non-nullable rabbitmq cannot be null');
        }
        $this->container['rabbitmq'] = $rabbitmq;

        return $this;
    }

    /**
     * Gets rabbitmq4_0
     *
     * @return string[]
     */
    public function getRabbitmq40()
    {
        return $this->container['rabbitmq4_0'];
    }

    /**
     * Sets rabbitmq4_0
     *
     * @param string[] $rabbitmq4_0 Для кластеров типа `rabbitmq4_0` настраиваемых параметров нет — всегда пустой массив.
     *
     * @return self
     */
    public function setRabbitmq40($rabbitmq4_0)
    {
        if (is_null($rabbitmq4_0)) {
            throw new \InvalidArgumentException('non-nullable rabbitmq4_0 cannot be null');
        }
        $this->container['rabbitmq4_0'] = $rabbitmq4_0;

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


