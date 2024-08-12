<?php
/**
 * App
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
 * App Class Doc Comment
 *
 * @category Class
 * @description Экземпляр приложения.
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class App implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'app';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'id' => 'float',
        'type' => 'string',
        'name' => 'string',
        'status' => 'string',
        'provider' => '\OpenAPI\Client\Model\AppProvider',
        'ip' => 'string',
        'domains' => '\OpenAPI\Client\Model\AppDomainsInner[]',
        'framework' => '\OpenAPI\Client\Model\Frameworks',
        'location' => 'string',
        'repository' => '\OpenAPI\Client\Model\Repository',
        'env_version' => 'string',
        'envs' => 'object',
        'branch_name' => 'string',
        'is_auto_deploy' => 'bool',
        'commit_sha' => 'string',
        'comment' => 'string',
        'preset_id' => 'float',
        'index_dir' => 'string',
        'build_cmd' => 'string',
        'run_cmd' => 'string',
        'configuration' => '\OpenAPI\Client\Model\AppConfiguration',
        'disk_status' => '\OpenAPI\Client\Model\AppDiskStatus',
        'is_qemu_agent' => 'bool',
        'language' => 'string',
        'start_time' => '\DateTime'
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
        'type' => null,
        'name' => null,
        'status' => null,
        'provider' => null,
        'ip' => 'ipv4',
        'domains' => null,
        'framework' => null,
        'location' => null,
        'repository' => null,
        'env_version' => null,
        'envs' => null,
        'branch_name' => null,
        'is_auto_deploy' => null,
        'commit_sha' => null,
        'comment' => null,
        'preset_id' => null,
        'index_dir' => null,
        'build_cmd' => null,
        'run_cmd' => null,
        'configuration' => null,
        'disk_status' => null,
        'is_qemu_agent' => null,
        'language' => null,
        'start_time' => 'date-time'
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'id' => false,
		'type' => false,
		'name' => false,
		'status' => false,
		'provider' => false,
		'ip' => false,
		'domains' => false,
		'framework' => false,
		'location' => false,
		'repository' => false,
		'env_version' => true,
		'envs' => false,
		'branch_name' => false,
		'is_auto_deploy' => false,
		'commit_sha' => false,
		'comment' => false,
		'preset_id' => false,
		'index_dir' => true,
		'build_cmd' => false,
		'run_cmd' => true,
		'configuration' => true,
		'disk_status' => true,
		'is_qemu_agent' => false,
		'language' => false,
		'start_time' => false
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
        'type' => 'type',
        'name' => 'name',
        'status' => 'status',
        'provider' => 'provider',
        'ip' => 'ip',
        'domains' => 'domains',
        'framework' => 'framework',
        'location' => 'location',
        'repository' => 'repository',
        'env_version' => 'env_version',
        'envs' => 'envs',
        'branch_name' => 'branch_name',
        'is_auto_deploy' => 'is_auto_deploy',
        'commit_sha' => 'commit_sha',
        'comment' => 'comment',
        'preset_id' => 'preset_id',
        'index_dir' => 'index_dir',
        'build_cmd' => 'build_cmd',
        'run_cmd' => 'run_cmd',
        'configuration' => 'configuration',
        'disk_status' => 'disk_status',
        'is_qemu_agent' => 'is_qemu_agent',
        'language' => 'language',
        'start_time' => 'start_time'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'type' => 'setType',
        'name' => 'setName',
        'status' => 'setStatus',
        'provider' => 'setProvider',
        'ip' => 'setIp',
        'domains' => 'setDomains',
        'framework' => 'setFramework',
        'location' => 'setLocation',
        'repository' => 'setRepository',
        'env_version' => 'setEnvVersion',
        'envs' => 'setEnvs',
        'branch_name' => 'setBranchName',
        'is_auto_deploy' => 'setIsAutoDeploy',
        'commit_sha' => 'setCommitSha',
        'comment' => 'setComment',
        'preset_id' => 'setPresetId',
        'index_dir' => 'setIndexDir',
        'build_cmd' => 'setBuildCmd',
        'run_cmd' => 'setRunCmd',
        'configuration' => 'setConfiguration',
        'disk_status' => 'setDiskStatus',
        'is_qemu_agent' => 'setIsQemuAgent',
        'language' => 'setLanguage',
        'start_time' => 'setStartTime'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'type' => 'getType',
        'name' => 'getName',
        'status' => 'getStatus',
        'provider' => 'getProvider',
        'ip' => 'getIp',
        'domains' => 'getDomains',
        'framework' => 'getFramework',
        'location' => 'getLocation',
        'repository' => 'getRepository',
        'env_version' => 'getEnvVersion',
        'envs' => 'getEnvs',
        'branch_name' => 'getBranchName',
        'is_auto_deploy' => 'getIsAutoDeploy',
        'commit_sha' => 'getCommitSha',
        'comment' => 'getComment',
        'preset_id' => 'getPresetId',
        'index_dir' => 'getIndexDir',
        'build_cmd' => 'getBuildCmd',
        'run_cmd' => 'getRunCmd',
        'configuration' => 'getConfiguration',
        'disk_status' => 'getDiskStatus',
        'is_qemu_agent' => 'getIsQemuAgent',
        'language' => 'getLanguage',
        'start_time' => 'getStartTime'
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

    public const TYPE_BACKEND = 'backend';
    public const TYPE_FRONTEND = 'frontend';
    public const STATUS_ACTIVE = 'active';
    public const STATUS_PAUSED = 'paused';
    public const STATUS_NO_PAID = 'no_paid';
    public const STATUS_DEPLOY = 'deploy';
    public const STATUS_FAILURE = 'failure';
    public const STATUS_STARTUP_ERROR = 'startup_error';
    public const STATUS__NEW = 'new';
    public const STATUS_REBOOT = 'reboot';
    public const LOCATION_RU_1 = 'ru-1';
    public const LOCATION_PL_1 = 'pl-1';
    public const LOCATION_NL_1 = 'nl-1';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getTypeAllowableValues()
    {
        return [
            self::TYPE_BACKEND,
            self::TYPE_FRONTEND,
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
            self::STATUS_ACTIVE,
            self::STATUS_PAUSED,
            self::STATUS_NO_PAID,
            self::STATUS_DEPLOY,
            self::STATUS_FAILURE,
            self::STATUS_STARTUP_ERROR,
            self::STATUS__NEW,
            self::STATUS_REBOOT,
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
            self::LOCATION_NL_1,
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
        $this->setIfExists('type', $data ?? [], null);
        $this->setIfExists('name', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
        $this->setIfExists('provider', $data ?? [], null);
        $this->setIfExists('ip', $data ?? [], null);
        $this->setIfExists('domains', $data ?? [], null);
        $this->setIfExists('framework', $data ?? [], null);
        $this->setIfExists('location', $data ?? [], null);
        $this->setIfExists('repository', $data ?? [], null);
        $this->setIfExists('env_version', $data ?? [], null);
        $this->setIfExists('envs', $data ?? [], null);
        $this->setIfExists('branch_name', $data ?? [], null);
        $this->setIfExists('is_auto_deploy', $data ?? [], null);
        $this->setIfExists('commit_sha', $data ?? [], null);
        $this->setIfExists('comment', $data ?? [], null);
        $this->setIfExists('preset_id', $data ?? [], null);
        $this->setIfExists('index_dir', $data ?? [], null);
        $this->setIfExists('build_cmd', $data ?? [], null);
        $this->setIfExists('run_cmd', $data ?? [], null);
        $this->setIfExists('configuration', $data ?? [], null);
        $this->setIfExists('disk_status', $data ?? [], null);
        $this->setIfExists('is_qemu_agent', $data ?? [], null);
        $this->setIfExists('language', $data ?? [], null);
        $this->setIfExists('start_time', $data ?? [], null);
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

        if ($this->container['name'] === null) {
            $invalidProperties[] = "'name' can't be null";
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

        if ($this->container['provider'] === null) {
            $invalidProperties[] = "'provider' can't be null";
        }
        if ($this->container['ip'] === null) {
            $invalidProperties[] = "'ip' can't be null";
        }
        if ($this->container['domains'] === null) {
            $invalidProperties[] = "'domains' can't be null";
        }
        if ($this->container['framework'] === null) {
            $invalidProperties[] = "'framework' can't be null";
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

        if ($this->container['repository'] === null) {
            $invalidProperties[] = "'repository' can't be null";
        }
        if ($this->container['env_version'] === null) {
            $invalidProperties[] = "'env_version' can't be null";
        }
        if ($this->container['envs'] === null) {
            $invalidProperties[] = "'envs' can't be null";
        }
        if ($this->container['branch_name'] === null) {
            $invalidProperties[] = "'branch_name' can't be null";
        }
        if ($this->container['is_auto_deploy'] === null) {
            $invalidProperties[] = "'is_auto_deploy' can't be null";
        }
        if ($this->container['commit_sha'] === null) {
            $invalidProperties[] = "'commit_sha' can't be null";
        }
        if ($this->container['comment'] === null) {
            $invalidProperties[] = "'comment' can't be null";
        }
        if ($this->container['preset_id'] === null) {
            $invalidProperties[] = "'preset_id' can't be null";
        }
        if ($this->container['index_dir'] === null) {
            $invalidProperties[] = "'index_dir' can't be null";
        }
        if ($this->container['build_cmd'] === null) {
            $invalidProperties[] = "'build_cmd' can't be null";
        }
        if ($this->container['run_cmd'] === null) {
            $invalidProperties[] = "'run_cmd' can't be null";
        }
        if ($this->container['configuration'] === null) {
            $invalidProperties[] = "'configuration' can't be null";
        }
        if ($this->container['disk_status'] === null) {
            $invalidProperties[] = "'disk_status' can't be null";
        }
        if ($this->container['is_qemu_agent'] === null) {
            $invalidProperties[] = "'is_qemu_agent' can't be null";
        }
        if ($this->container['language'] === null) {
            $invalidProperties[] = "'language' can't be null";
        }
        if ($this->container['start_time'] === null) {
            $invalidProperties[] = "'start_time' can't be null";
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
     * @param float $id Уникальный идентификатор для каждого экземпляра приложения. Автоматически генерируется при создании.
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
     * @param string $type Тип приложения.
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
     * @param string $name Удобочитаемое имя, установленное для приложения.
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
     * @param string $status Статус приложения.
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
     * Gets provider
     *
     * @return \OpenAPI\Client\Model\AppProvider
     */
    public function getProvider()
    {
        return $this->container['provider'];
    }

    /**
     * Sets provider
     *
     * @param \OpenAPI\Client\Model\AppProvider $provider provider
     *
     * @return self
     */
    public function setProvider($provider)
    {
        if (is_null($provider)) {
            throw new \InvalidArgumentException('non-nullable provider cannot be null');
        }
        $this->container['provider'] = $provider;

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
     * @param string $ip IPv4-адрес приложения.
     *
     * @return self
     */
    public function setIp($ip)
    {
        if (is_null($ip)) {
            throw new \InvalidArgumentException('non-nullable ip cannot be null');
        }
        $this->container['ip'] = $ip;

        return $this;
    }

    /**
     * Gets domains
     *
     * @return \OpenAPI\Client\Model\AppDomainsInner[]
     */
    public function getDomains()
    {
        return $this->container['domains'];
    }

    /**
     * Sets domains
     *
     * @param \OpenAPI\Client\Model\AppDomainsInner[] $domains domains
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
     * Gets framework
     *
     * @return \OpenAPI\Client\Model\Frameworks
     */
    public function getFramework()
    {
        return $this->container['framework'];
    }

    /**
     * Sets framework
     *
     * @param \OpenAPI\Client\Model\Frameworks $framework framework
     *
     * @return self
     */
    public function setFramework($framework)
    {
        if (is_null($framework)) {
            throw new \InvalidArgumentException('non-nullable framework cannot be null');
        }
        $this->container['framework'] = $framework;

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
     * Gets repository
     *
     * @return \OpenAPI\Client\Model\Repository
     */
    public function getRepository()
    {
        return $this->container['repository'];
    }

    /**
     * Sets repository
     *
     * @param \OpenAPI\Client\Model\Repository $repository repository
     *
     * @return self
     */
    public function setRepository($repository)
    {
        if (is_null($repository)) {
            throw new \InvalidArgumentException('non-nullable repository cannot be null');
        }
        $this->container['repository'] = $repository;

        return $this;
    }

    /**
     * Gets env_version
     *
     * @return string
     */
    public function getEnvVersion()
    {
        return $this->container['env_version'];
    }

    /**
     * Sets env_version
     *
     * @param string $env_version Версия окружения.
     *
     * @return self
     */
    public function setEnvVersion($env_version)
    {
        if (is_null($env_version)) {
            array_push($this->openAPINullablesSetToNull, 'env_version');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('env_version', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['env_version'] = $env_version;

        return $this;
    }

    /**
     * Gets envs
     *
     * @return object
     */
    public function getEnvs()
    {
        return $this->container['envs'];
    }

    /**
     * Sets envs
     *
     * @param object $envs Переменные окружения приложения. Объект с ключами и значениями типа string.
     *
     * @return self
     */
    public function setEnvs($envs)
    {
        if (is_null($envs)) {
            throw new \InvalidArgumentException('non-nullable envs cannot be null');
        }
        $this->container['envs'] = $envs;

        return $this;
    }

    /**
     * Gets branch_name
     *
     * @return string
     */
    public function getBranchName()
    {
        return $this->container['branch_name'];
    }

    /**
     * Sets branch_name
     *
     * @param string $branch_name Название ветки репозитория из которой собрано приложение.
     *
     * @return self
     */
    public function setBranchName($branch_name)
    {
        if (is_null($branch_name)) {
            throw new \InvalidArgumentException('non-nullable branch_name cannot be null');
        }
        $this->container['branch_name'] = $branch_name;

        return $this;
    }

    /**
     * Gets is_auto_deploy
     *
     * @return bool
     */
    public function getIsAutoDeploy()
    {
        return $this->container['is_auto_deploy'];
    }

    /**
     * Sets is_auto_deploy
     *
     * @param bool $is_auto_deploy Включен ли автоматический деплой.
     *
     * @return self
     */
    public function setIsAutoDeploy($is_auto_deploy)
    {
        if (is_null($is_auto_deploy)) {
            throw new \InvalidArgumentException('non-nullable is_auto_deploy cannot be null');
        }
        $this->container['is_auto_deploy'] = $is_auto_deploy;

        return $this;
    }

    /**
     * Gets commit_sha
     *
     * @return string
     */
    public function getCommitSha()
    {
        return $this->container['commit_sha'];
    }

    /**
     * Sets commit_sha
     *
     * @param string $commit_sha Хэш коммита из которого собрано приложеие.
     *
     * @return self
     */
    public function setCommitSha($commit_sha)
    {
        if (is_null($commit_sha)) {
            throw new \InvalidArgumentException('non-nullable commit_sha cannot be null');
        }
        $this->container['commit_sha'] = $commit_sha;

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
     * @param string $comment Комментарий к приложению.
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
     * @param float $preset_id Идентификатор тарифа.
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
     * Gets index_dir
     *
     * @return string
     */
    public function getIndexDir()
    {
        return $this->container['index_dir'];
    }

    /**
     * Sets index_dir
     *
     * @param string $index_dir Директория с индексным файлом. Определено для приложений `type: frontend`. Для приложений `type: backend` всегда null.
     *
     * @return self
     */
    public function setIndexDir($index_dir)
    {
        if (is_null($index_dir)) {
            array_push($this->openAPINullablesSetToNull, 'index_dir');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('index_dir', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['index_dir'] = $index_dir;

        return $this;
    }

    /**
     * Gets build_cmd
     *
     * @return string
     */
    public function getBuildCmd()
    {
        return $this->container['build_cmd'];
    }

    /**
     * Sets build_cmd
     *
     * @param string $build_cmd Команда сборки приложения.
     *
     * @return self
     */
    public function setBuildCmd($build_cmd)
    {
        if (is_null($build_cmd)) {
            throw new \InvalidArgumentException('non-nullable build_cmd cannot be null');
        }
        $this->container['build_cmd'] = $build_cmd;

        return $this;
    }

    /**
     * Gets run_cmd
     *
     * @return string
     */
    public function getRunCmd()
    {
        return $this->container['run_cmd'];
    }

    /**
     * Sets run_cmd
     *
     * @param string $run_cmd Команда для запуска приложения. Определено для приложений `type: backend`. Для приложений `type: frontend` всегда null.
     *
     * @return self
     */
    public function setRunCmd($run_cmd)
    {
        if (is_null($run_cmd)) {
            array_push($this->openAPINullablesSetToNull, 'run_cmd');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('run_cmd', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['run_cmd'] = $run_cmd;

        return $this;
    }

    /**
     * Gets configuration
     *
     * @return \OpenAPI\Client\Model\AppConfiguration
     */
    public function getConfiguration()
    {
        return $this->container['configuration'];
    }

    /**
     * Sets configuration
     *
     * @param \OpenAPI\Client\Model\AppConfiguration $configuration configuration
     *
     * @return self
     */
    public function setConfiguration($configuration)
    {
        if (is_null($configuration)) {
            array_push($this->openAPINullablesSetToNull, 'configuration');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('configuration', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['configuration'] = $configuration;

        return $this;
    }

    /**
     * Gets disk_status
     *
     * @return \OpenAPI\Client\Model\AppDiskStatus
     */
    public function getDiskStatus()
    {
        return $this->container['disk_status'];
    }

    /**
     * Sets disk_status
     *
     * @param \OpenAPI\Client\Model\AppDiskStatus $disk_status disk_status
     *
     * @return self
     */
    public function setDiskStatus($disk_status)
    {
        if (is_null($disk_status)) {
            array_push($this->openAPINullablesSetToNull, 'disk_status');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('disk_status', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['disk_status'] = $disk_status;

        return $this;
    }

    /**
     * Gets is_qemu_agent
     *
     * @return bool
     */
    public function getIsQemuAgent()
    {
        return $this->container['is_qemu_agent'];
    }

    /**
     * Sets is_qemu_agent
     *
     * @param bool $is_qemu_agent Включен ли агент QEMU.
     *
     * @return self
     */
    public function setIsQemuAgent($is_qemu_agent)
    {
        if (is_null($is_qemu_agent)) {
            throw new \InvalidArgumentException('non-nullable is_qemu_agent cannot be null');
        }
        $this->container['is_qemu_agent'] = $is_qemu_agent;

        return $this;
    }

    /**
     * Gets language
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->container['language'];
    }

    /**
     * Sets language
     *
     * @param string $language Язык программирования приложения.
     *
     * @return self
     */
    public function setLanguage($language)
    {
        if (is_null($language)) {
            throw new \InvalidArgumentException('non-nullable language cannot be null');
        }
        $this->container['language'] = $language;

        return $this;
    }

    /**
     * Gets start_time
     *
     * @return \DateTime
     */
    public function getStartTime()
    {
        return $this->container['start_time'];
    }

    /**
     * Sets start_time
     *
     * @param \DateTime $start_time Время запуска приложения.
     *
     * @return self
     */
    public function setStartTime($start_time)
    {
        if (is_null($start_time)) {
            throw new \InvalidArgumentException('non-nullable start_time cannot be null');
        }
        $this->container['start_time'] = $start_time;

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


