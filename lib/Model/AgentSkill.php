<?php
/**
 * AgentSkill
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
 * AgentSkill Class Doc Comment
 *
 * @category Class
 * @description Навык аккаунта и его состояние у агента
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class AgentSkill implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'agent-skill';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'skill_id' => 'int',
        'name' => 'string',
        'when_to_use' => 'string',
        'current_version' => 'int',
        'is_connected' => 'bool',
        'is_enabled' => 'bool',
        'pinned_version' => 'int',
        'has_newer_version' => 'bool',
        'is_from_catalog' => 'bool',
        'is_modified' => 'bool'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'skill_id' => null,
        'name' => null,
        'when_to_use' => null,
        'current_version' => null,
        'is_connected' => null,
        'is_enabled' => null,
        'pinned_version' => null,
        'has_newer_version' => null,
        'is_from_catalog' => null,
        'is_modified' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'skill_id' => false,
		'name' => false,
		'when_to_use' => false,
		'current_version' => false,
		'is_connected' => false,
		'is_enabled' => false,
		'pinned_version' => true,
		'has_newer_version' => false,
		'is_from_catalog' => false,
		'is_modified' => false
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
        'skill_id' => 'skill_id',
        'name' => 'name',
        'when_to_use' => 'when_to_use',
        'current_version' => 'current_version',
        'is_connected' => 'is_connected',
        'is_enabled' => 'is_enabled',
        'pinned_version' => 'pinned_version',
        'has_newer_version' => 'has_newer_version',
        'is_from_catalog' => 'is_from_catalog',
        'is_modified' => 'is_modified'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'skill_id' => 'setSkillId',
        'name' => 'setName',
        'when_to_use' => 'setWhenToUse',
        'current_version' => 'setCurrentVersion',
        'is_connected' => 'setIsConnected',
        'is_enabled' => 'setIsEnabled',
        'pinned_version' => 'setPinnedVersion',
        'has_newer_version' => 'setHasNewerVersion',
        'is_from_catalog' => 'setIsFromCatalog',
        'is_modified' => 'setIsModified'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'skill_id' => 'getSkillId',
        'name' => 'getName',
        'when_to_use' => 'getWhenToUse',
        'current_version' => 'getCurrentVersion',
        'is_connected' => 'getIsConnected',
        'is_enabled' => 'getIsEnabled',
        'pinned_version' => 'getPinnedVersion',
        'has_newer_version' => 'getHasNewerVersion',
        'is_from_catalog' => 'getIsFromCatalog',
        'is_modified' => 'getIsModified'
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
        $this->setIfExists('skill_id', $data ?? [], null);
        $this->setIfExists('name', $data ?? [], null);
        $this->setIfExists('when_to_use', $data ?? [], null);
        $this->setIfExists('current_version', $data ?? [], null);
        $this->setIfExists('is_connected', $data ?? [], null);
        $this->setIfExists('is_enabled', $data ?? [], null);
        $this->setIfExists('pinned_version', $data ?? [], null);
        $this->setIfExists('has_newer_version', $data ?? [], null);
        $this->setIfExists('is_from_catalog', $data ?? [], null);
        $this->setIfExists('is_modified', $data ?? [], null);
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

        if ($this->container['skill_id'] === null) {
            $invalidProperties[] = "'skill_id' can't be null";
        }
        if ($this->container['name'] === null) {
            $invalidProperties[] = "'name' can't be null";
        }
        if ($this->container['when_to_use'] === null) {
            $invalidProperties[] = "'when_to_use' can't be null";
        }
        if ($this->container['current_version'] === null) {
            $invalidProperties[] = "'current_version' can't be null";
        }
        if ($this->container['is_connected'] === null) {
            $invalidProperties[] = "'is_connected' can't be null";
        }
        if ($this->container['is_enabled'] === null) {
            $invalidProperties[] = "'is_enabled' can't be null";
        }
        if ($this->container['pinned_version'] === null) {
            $invalidProperties[] = "'pinned_version' can't be null";
        }
        if ($this->container['has_newer_version'] === null) {
            $invalidProperties[] = "'has_newer_version' can't be null";
        }
        if ($this->container['is_from_catalog'] === null) {
            $invalidProperties[] = "'is_from_catalog' can't be null";
        }
        if ($this->container['is_modified'] === null) {
            $invalidProperties[] = "'is_modified' can't be null";
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
     * Gets skill_id
     *
     * @return int
     */
    public function getSkillId()
    {
        return $this->container['skill_id'];
    }

    /**
     * Sets skill_id
     *
     * @param int $skill_id ID навыка
     *
     * @return self
     */
    public function setSkillId($skill_id)
    {
        if (is_null($skill_id)) {
            throw new \InvalidArgumentException('non-nullable skill_id cannot be null');
        }
        $this->container['skill_id'] = $skill_id;

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
     * @param string $name Название навыка
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
     * Gets when_to_use
     *
     * @return string
     */
    public function getWhenToUse()
    {
        return $this->container['when_to_use'];
    }

    /**
     * Sets when_to_use
     *
     * @param string $when_to_use Когда применять навык
     *
     * @return self
     */
    public function setWhenToUse($when_to_use)
    {
        if (is_null($when_to_use)) {
            throw new \InvalidArgumentException('non-nullable when_to_use cannot be null');
        }
        $this->container['when_to_use'] = $when_to_use;

        return $this;
    }

    /**
     * Gets current_version
     *
     * @return int
     */
    public function getCurrentVersion()
    {
        return $this->container['current_version'];
    }

    /**
     * Sets current_version
     *
     * @param int $current_version Номер текущей версии навыка
     *
     * @return self
     */
    public function setCurrentVersion($current_version)
    {
        if (is_null($current_version)) {
            throw new \InvalidArgumentException('non-nullable current_version cannot be null');
        }
        $this->container['current_version'] = $current_version;

        return $this;
    }

    /**
     * Gets is_connected
     *
     * @return bool
     */
    public function getIsConnected()
    {
        return $this->container['is_connected'];
    }

    /**
     * Sets is_connected
     *
     * @param bool $is_connected Навык подключён к агенту
     *
     * @return self
     */
    public function setIsConnected($is_connected)
    {
        if (is_null($is_connected)) {
            throw new \InvalidArgumentException('non-nullable is_connected cannot be null');
        }
        $this->container['is_connected'] = $is_connected;

        return $this;
    }

    /**
     * Gets is_enabled
     *
     * @return bool
     */
    public function getIsEnabled()
    {
        return $this->container['is_enabled'];
    }

    /**
     * Sets is_enabled
     *
     * @param bool $is_enabled Навык включён у агента
     *
     * @return self
     */
    public function setIsEnabled($is_enabled)
    {
        if (is_null($is_enabled)) {
            throw new \InvalidArgumentException('non-nullable is_enabled cannot be null');
        }
        $this->container['is_enabled'] = $is_enabled;

        return $this;
    }

    /**
     * Gets pinned_version
     *
     * @return int
     */
    public function getPinnedVersion()
    {
        return $this->container['pinned_version'];
    }

    /**
     * Sets pinned_version
     *
     * @param int $pinned_version Версия, на которой закреплён агент. `null` — навык не подключён
     *
     * @return self
     */
    public function setPinnedVersion($pinned_version)
    {
        if (is_null($pinned_version)) {
            array_push($this->openAPINullablesSetToNull, 'pinned_version');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('pinned_version', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['pinned_version'] = $pinned_version;

        return $this;
    }

    /**
     * Gets has_newer_version
     *
     * @return bool
     */
    public function getHasNewerVersion()
    {
        return $this->container['has_newer_version'];
    }

    /**
     * Sets has_newer_version
     *
     * @param bool $has_newer_version Текущая версия навыка отличается от закреплённой
     *
     * @return self
     */
    public function setHasNewerVersion($has_newer_version)
    {
        if (is_null($has_newer_version)) {
            throw new \InvalidArgumentException('non-nullable has_newer_version cannot be null');
        }
        $this->container['has_newer_version'] = $has_newer_version;

        return $this;
    }

    /**
     * Gets is_from_catalog
     *
     * @return bool
     */
    public function getIsFromCatalog()
    {
        return $this->container['is_from_catalog'];
    }

    /**
     * Sets is_from_catalog
     *
     * @param bool $is_from_catalog Навык установлен из каталога
     *
     * @return self
     */
    public function setIsFromCatalog($is_from_catalog)
    {
        if (is_null($is_from_catalog)) {
            throw new \InvalidArgumentException('non-nullable is_from_catalog cannot be null');
        }
        $this->container['is_from_catalog'] = $is_from_catalog;

        return $this;
    }

    /**
     * Gets is_modified
     *
     * @return bool
     */
    public function getIsModified()
    {
        return $this->container['is_modified'];
    }

    /**
     * Sets is_modified
     *
     * @param bool $is_modified Установленный из каталога навык изменялся владельцем
     *
     * @return self
     */
    public function setIsModified($is_modified)
    {
        if (is_null($is_modified)) {
            throw new \InvalidArgumentException('non-nullable is_modified cannot be null');
        }
        $this->container['is_modified'] = $is_modified;

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


