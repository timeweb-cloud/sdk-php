<?php
/**
 * AppV2
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
 * AppV2 Class Doc Comment
 *
 * @category Class
 * @description Приложение v2. Создание и первый деплой выполняются асинхронно. Поля сервера и инфраструктуры могут отсутствовать, пока соответствующие ресурсы не созданы.
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class AppV2 implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'app-v2';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'id' => 'int',
        'type' => 'string',
        'name' => 'string',
        'status' => 'string',
        'provider' => '\OpenAPI\Client\Model\AppV2Provider',
        'ip' => 'string',
        'domains' => '\OpenAPI\Client\Model\AppV2DomainsInner[]',
        'framework' => 'string',
        'location' => 'string',
        'repository' => '\OpenAPI\Client\Model\Repository',
        'env_version' => 'string',
        'envs' => 'array<string,string>',
        'is_auto_deploy' => 'bool',
        'commit_sha' => 'string',
        'comment' => 'string',
        'preset_id' => 'float',
        'index_dir' => 'string',
        'build_cmd' => 'string',
        'avatar_link' => 'string',
        'run_cmd' => 'string',
        'configuration' => '\OpenAPI\Client\Model\AppV2Configuration',
        'disk_status' => '\OpenAPI\Client\Model\AppV2DiskStatus',
        'is_qemu_agent' => 'bool',
        'language' => 'string',
        'start_time' => '\DateTime',
        'branch' => 'string',
        'configurator_id' => 'int',
        'project_id' => 'int',
        'system_dependencies' => 'string[]',
        'created_at' => '\DateTime',
        'availability_zone' => 'string',
        'requests_limit' => 'int',
        'build_entry_path' => 'string',
        'health_check' => 'string',
        'docker_image' => 'string',
        'docker_image_tag' => 'string',
        'is_russian_trusted_ca' => 'bool',
        'is_tci_trusted_ca' => 'bool',
        'blocked_ports' => 'int[]',
        'reverse_proxy' => 'object'
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
        'is_auto_deploy' => null,
        'commit_sha' => null,
        'comment' => null,
        'preset_id' => null,
        'index_dir' => null,
        'build_cmd' => null,
        'avatar_link' => null,
        'run_cmd' => null,
        'configuration' => null,
        'disk_status' => null,
        'is_qemu_agent' => null,
        'language' => null,
        'start_time' => 'date-time',
        'branch' => null,
        'configurator_id' => null,
        'project_id' => null,
        'system_dependencies' => null,
        'created_at' => 'date-time',
        'availability_zone' => null,
        'requests_limit' => null,
        'build_entry_path' => null,
        'health_check' => null,
        'docker_image' => null,
        'docker_image_tag' => null,
        'is_russian_trusted_ca' => null,
        'is_tci_trusted_ca' => null,
        'blocked_ports' => null,
        'reverse_proxy' => null
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
		'is_auto_deploy' => false,
		'commit_sha' => false,
		'comment' => false,
		'preset_id' => false,
		'index_dir' => true,
		'build_cmd' => false,
		'avatar_link' => true,
		'run_cmd' => true,
		'configuration' => true,
		'disk_status' => true,
		'is_qemu_agent' => true,
		'language' => false,
		'start_time' => false,
		'branch' => false,
		'configurator_id' => true,
		'project_id' => false,
		'system_dependencies' => false,
		'created_at' => false,
		'availability_zone' => true,
		'requests_limit' => true,
		'build_entry_path' => false,
		'health_check' => true,
		'docker_image' => false,
		'docker_image_tag' => false,
		'is_russian_trusted_ca' => false,
		'is_tci_trusted_ca' => false,
		'blocked_ports' => true,
		'reverse_proxy' => true
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
        'is_auto_deploy' => 'is_auto_deploy',
        'commit_sha' => 'commit_sha',
        'comment' => 'comment',
        'preset_id' => 'preset_id',
        'index_dir' => 'index_dir',
        'build_cmd' => 'build_cmd',
        'avatar_link' => 'avatar_link',
        'run_cmd' => 'run_cmd',
        'configuration' => 'configuration',
        'disk_status' => 'disk_status',
        'is_qemu_agent' => 'is_qemu_agent',
        'language' => 'language',
        'start_time' => 'start_time',
        'branch' => 'branch',
        'configurator_id' => 'configurator_id',
        'project_id' => 'project_id',
        'system_dependencies' => 'system_dependencies',
        'created_at' => 'created_at',
        'availability_zone' => 'availability_zone',
        'requests_limit' => 'requests_limit',
        'build_entry_path' => 'build_entry_path',
        'health_check' => 'health_check',
        'docker_image' => 'docker_image',
        'docker_image_tag' => 'docker_image_tag',
        'is_russian_trusted_ca' => 'is_russian_trusted_ca',
        'is_tci_trusted_ca' => 'is_tci_trusted_ca',
        'blocked_ports' => 'blocked_ports',
        'reverse_proxy' => 'reverse_proxy'
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
        'is_auto_deploy' => 'setIsAutoDeploy',
        'commit_sha' => 'setCommitSha',
        'comment' => 'setComment',
        'preset_id' => 'setPresetId',
        'index_dir' => 'setIndexDir',
        'build_cmd' => 'setBuildCmd',
        'avatar_link' => 'setAvatarLink',
        'run_cmd' => 'setRunCmd',
        'configuration' => 'setConfiguration',
        'disk_status' => 'setDiskStatus',
        'is_qemu_agent' => 'setIsQemuAgent',
        'language' => 'setLanguage',
        'start_time' => 'setStartTime',
        'branch' => 'setBranch',
        'configurator_id' => 'setConfiguratorId',
        'project_id' => 'setProjectId',
        'system_dependencies' => 'setSystemDependencies',
        'created_at' => 'setCreatedAt',
        'availability_zone' => 'setAvailabilityZone',
        'requests_limit' => 'setRequestsLimit',
        'build_entry_path' => 'setBuildEntryPath',
        'health_check' => 'setHealthCheck',
        'docker_image' => 'setDockerImage',
        'docker_image_tag' => 'setDockerImageTag',
        'is_russian_trusted_ca' => 'setIsRussianTrustedCa',
        'is_tci_trusted_ca' => 'setIsTciTrustedCa',
        'blocked_ports' => 'setBlockedPorts',
        'reverse_proxy' => 'setReverseProxy'
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
        'is_auto_deploy' => 'getIsAutoDeploy',
        'commit_sha' => 'getCommitSha',
        'comment' => 'getComment',
        'preset_id' => 'getPresetId',
        'index_dir' => 'getIndexDir',
        'build_cmd' => 'getBuildCmd',
        'avatar_link' => 'getAvatarLink',
        'run_cmd' => 'getRunCmd',
        'configuration' => 'getConfiguration',
        'disk_status' => 'getDiskStatus',
        'is_qemu_agent' => 'getIsQemuAgent',
        'language' => 'getLanguage',
        'start_time' => 'getStartTime',
        'branch' => 'getBranch',
        'configurator_id' => 'getConfiguratorId',
        'project_id' => 'getProjectId',
        'system_dependencies' => 'getSystemDependencies',
        'created_at' => 'getCreatedAt',
        'availability_zone' => 'getAvailabilityZone',
        'requests_limit' => 'getRequestsLimit',
        'build_entry_path' => 'getBuildEntryPath',
        'health_check' => 'getHealthCheck',
        'docker_image' => 'getDockerImage',
        'docker_image_tag' => 'getDockerImageTag',
        'is_russian_trusted_ca' => 'getIsRussianTrustedCa',
        'is_tci_trusted_ca' => 'getIsTciTrustedCa',
        'blocked_ports' => 'getBlockedPorts',
        'reverse_proxy' => 'getReverseProxy'
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
    public const STATUS_BLOCKED = 'blocked';
    public const STATUS_REQUEST_LIMIT_EXCEEDED = 'request_limit_exceeded';
    public const FRAMEWORK_DJANGO = 'django';
    public const FRAMEWORK_EXPRESS = 'express';
    public const FRAMEWORK_PHOENIX = 'phoenix';
    public const FRAMEWORK_SPRING = 'Spring';
    public const FRAMEWORK_LARAVEL = 'laravel';
    public const FRAMEWORK_BEEGO = 'beego';
    public const FRAMEWORK_FASTAPI = 'fastapi';
    public const FRAMEWORK_ASP_NET_CORE = 'ASP.NET Core';
    public const FRAMEWORK_HAPI = 'hapi';
    public const FRAMEWORK_CELERY = 'celery';
    public const FRAMEWORK_FLASK = 'flask';
    public const FRAMEWORK_GIN = 'gin';
    public const FRAMEWORK_DOCKER = 'docker';
    public const FRAMEWORK_DOCKER_COMPOSE = 'docker-compose';
    public const FRAMEWORK_FASTIFY = 'fastify';
    public const FRAMEWORK_NEST = 'nest';
    public const FRAMEWORK_SYMFONY = 'symfony';
    public const FRAMEWORK_YII = 'yii';
    public const FRAMEWORK_NEXT_JS = 'next.js';
    public const FRAMEWORK_NUXT = 'nuxt';
    public const FRAMEWORK_ASTRO = 'astro';
    public const FRAMEWORK_TANSTACK_START = 'tanstack-start';
    public const FRAMEWORK_SOLID_START = 'solid-start';
    public const FRAMEWORK_KTOR = 'ktor';
    public const FRAMEWORK_AXUM = 'axum';
    public const FRAMEWORK_ACTIX = 'actix';
    public const FRAMEWORK_TORNADO = 'tornado';
    public const FRAMEWORK_AIOHTTP = 'aiohttp';
    public const FRAMEWORK_FIBER = 'fiber';
    public const FRAMEWORK__ECHO = 'echo';
    public const FRAMEWORK_MICRONAUT = 'Micronaut';
    public const FRAMEWORK_QUARKUS = 'Quarkus';
    public const FRAMEWORK_REMIX = 'remix';
    public const FRAMEWORK_SVELTEKIT = 'sveltekit';
    public const FRAMEWORK_ANGULAR = 'angular';
    public const FRAMEWORK_EMBER = 'ember';
    public const FRAMEWORK_PREACT = 'preact';
    public const FRAMEWORK_REACT = 'react';
    public const FRAMEWORK_SOLID = 'solid';
    public const FRAMEWORK_SVELTE = 'svelte';
    public const FRAMEWORK_VUE = 'vue';
    public const FRAMEWORK_STATIC_NOBUILD = 'static-nobuild';
    public const FRAMEWORK_ANOTHER = 'another';
    public const LOCATION_RU_1 = 'ru-1';
    public const LOCATION_RU_2 = 'ru-2';
    public const LOCATION_RU_3 = 'ru-3';
    public const LOCATION_PL_1 = 'pl-1';
    public const LOCATION_KZ_1 = 'kz-1';
    public const LOCATION_NL_1 = 'nl-1';
    public const LOCATION_US_1 = 'us-1';
    public const LOCATION_US_2 = 'us-2';
    public const LOCATION_DE_1 = 'de-1';
    public const LANGUAGE_JAVASCRIPT = 'javascript';
    public const LANGUAGE_NODE = 'node';
    public const LANGUAGE_ELIXIR = 'elixir';
    public const LANGUAGE_GO = 'go';
    public const LANGUAGE_PHP = 'php';
    public const LANGUAGE_PYTHON = 'python';
    public const LANGUAGE_RUBY = 'ruby';
    public const LANGUAGE_DOCKER = 'docker';
    public const LANGUAGE_DOCKER_COMPOSE = 'docker-compose';
    public const LANGUAGE_DOTNET = 'dotnet';
    public const LANGUAGE_JAVA = 'java';
    public const LANGUAGE_KOTLIN = 'kotlin';
    public const LANGUAGE_RUST = 'rust';
    public const LANGUAGE_BUN = 'bun';
    public const LANGUAGE_DENO = 'deno';
    public const LANGUAGE_CUSTOM_IMAGE = 'custom-image';
    public const AVAILABILITY_ZONE_SPB_1 = 'spb-1';
    public const AVAILABILITY_ZONE_SPB_2 = 'spb-2';
    public const AVAILABILITY_ZONE_SPB_3 = 'spb-3';
    public const AVAILABILITY_ZONE_SPB_4 = 'spb-4';
    public const AVAILABILITY_ZONE_NSK_1 = 'nsk-1';
    public const AVAILABILITY_ZONE_AMS_1 = 'ams-1';
    public const AVAILABILITY_ZONE_GDN_1 = 'gdn-1';
    public const AVAILABILITY_ZONE_ALA_1 = 'ala-1';
    public const AVAILABILITY_ZONE_NYC_1 = 'nyc-1';
    public const AVAILABILITY_ZONE_MSK_1 = 'msk-1';

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
            self::STATUS_BLOCKED,
            self::STATUS_REQUEST_LIMIT_EXCEEDED,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getFrameworkAllowableValues()
    {
        return [
            self::FRAMEWORK_DJANGO,
            self::FRAMEWORK_EXPRESS,
            self::FRAMEWORK_PHOENIX,
            self::FRAMEWORK_SPRING,
            self::FRAMEWORK_LARAVEL,
            self::FRAMEWORK_BEEGO,
            self::FRAMEWORK_FASTAPI,
            self::FRAMEWORK_ASP_NET_CORE,
            self::FRAMEWORK_HAPI,
            self::FRAMEWORK_CELERY,
            self::FRAMEWORK_FLASK,
            self::FRAMEWORK_GIN,
            self::FRAMEWORK_DOCKER,
            self::FRAMEWORK_DOCKER_COMPOSE,
            self::FRAMEWORK_FASTIFY,
            self::FRAMEWORK_NEST,
            self::FRAMEWORK_SYMFONY,
            self::FRAMEWORK_YII,
            self::FRAMEWORK_NEXT_JS,
            self::FRAMEWORK_NUXT,
            self::FRAMEWORK_ASTRO,
            self::FRAMEWORK_TANSTACK_START,
            self::FRAMEWORK_SOLID_START,
            self::FRAMEWORK_KTOR,
            self::FRAMEWORK_AXUM,
            self::FRAMEWORK_ACTIX,
            self::FRAMEWORK_TORNADO,
            self::FRAMEWORK_AIOHTTP,
            self::FRAMEWORK_FIBER,
            self::FRAMEWORK__ECHO,
            self::FRAMEWORK_MICRONAUT,
            self::FRAMEWORK_QUARKUS,
            self::FRAMEWORK_REMIX,
            self::FRAMEWORK_SVELTEKIT,
            self::FRAMEWORK_ANGULAR,
            self::FRAMEWORK_EMBER,
            self::FRAMEWORK_PREACT,
            self::FRAMEWORK_REACT,
            self::FRAMEWORK_SOLID,
            self::FRAMEWORK_SVELTE,
            self::FRAMEWORK_VUE,
            self::FRAMEWORK_STATIC_NOBUILD,
            self::FRAMEWORK_ANOTHER,
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
            self::LOCATION_RU_2,
            self::LOCATION_RU_3,
            self::LOCATION_PL_1,
            self::LOCATION_KZ_1,
            self::LOCATION_NL_1,
            self::LOCATION_US_1,
            self::LOCATION_US_2,
            self::LOCATION_DE_1,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getLanguageAllowableValues()
    {
        return [
            self::LANGUAGE_JAVASCRIPT,
            self::LANGUAGE_NODE,
            self::LANGUAGE_ELIXIR,
            self::LANGUAGE_GO,
            self::LANGUAGE_PHP,
            self::LANGUAGE_PYTHON,
            self::LANGUAGE_RUBY,
            self::LANGUAGE_DOCKER,
            self::LANGUAGE_DOCKER_COMPOSE,
            self::LANGUAGE_DOTNET,
            self::LANGUAGE_JAVA,
            self::LANGUAGE_KOTLIN,
            self::LANGUAGE_RUST,
            self::LANGUAGE_BUN,
            self::LANGUAGE_DENO,
            self::LANGUAGE_CUSTOM_IMAGE,
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
            self::AVAILABILITY_ZONE_SPB_1,
            self::AVAILABILITY_ZONE_SPB_2,
            self::AVAILABILITY_ZONE_SPB_3,
            self::AVAILABILITY_ZONE_SPB_4,
            self::AVAILABILITY_ZONE_NSK_1,
            self::AVAILABILITY_ZONE_AMS_1,
            self::AVAILABILITY_ZONE_GDN_1,
            self::AVAILABILITY_ZONE_ALA_1,
            self::AVAILABILITY_ZONE_NYC_1,
            self::AVAILABILITY_ZONE_MSK_1,
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
        $this->setIfExists('is_auto_deploy', $data ?? [], null);
        $this->setIfExists('commit_sha', $data ?? [], null);
        $this->setIfExists('comment', $data ?? [], null);
        $this->setIfExists('preset_id', $data ?? [], null);
        $this->setIfExists('index_dir', $data ?? [], null);
        $this->setIfExists('build_cmd', $data ?? [], null);
        $this->setIfExists('avatar_link', $data ?? [], null);
        $this->setIfExists('run_cmd', $data ?? [], null);
        $this->setIfExists('configuration', $data ?? [], null);
        $this->setIfExists('disk_status', $data ?? [], null);
        $this->setIfExists('is_qemu_agent', $data ?? [], null);
        $this->setIfExists('language', $data ?? [], null);
        $this->setIfExists('start_time', $data ?? [], null);
        $this->setIfExists('branch', $data ?? [], null);
        $this->setIfExists('configurator_id', $data ?? [], null);
        $this->setIfExists('project_id', $data ?? [], null);
        $this->setIfExists('system_dependencies', $data ?? [], null);
        $this->setIfExists('created_at', $data ?? [], null);
        $this->setIfExists('availability_zone', $data ?? [], null);
        $this->setIfExists('requests_limit', $data ?? [], null);
        $this->setIfExists('build_entry_path', $data ?? [], null);
        $this->setIfExists('health_check', $data ?? [], null);
        $this->setIfExists('docker_image', $data ?? [], null);
        $this->setIfExists('docker_image_tag', $data ?? [], null);
        $this->setIfExists('is_russian_trusted_ca', $data ?? [], null);
        $this->setIfExists('is_tci_trusted_ca', $data ?? [], null);
        $this->setIfExists('blocked_ports', $data ?? [], null);
        $this->setIfExists('reverse_proxy', $data ?? [], null);
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
        if ($this->container['domains'] === null) {
            $invalidProperties[] = "'domains' can't be null";
        }
        $allowedValues = $this->getFrameworkAllowableValues();
        if (!is_null($this->container['framework']) && !in_array($this->container['framework'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'framework', must be one of '%s'",
                $this->container['framework'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getLocationAllowableValues();
        if (!is_null($this->container['location']) && !in_array($this->container['location'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'location', must be one of '%s'",
                $this->container['location'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['is_auto_deploy'] === null) {
            $invalidProperties[] = "'is_auto_deploy' can't be null";
        }
        if ($this->container['preset_id'] === null) {
            $invalidProperties[] = "'preset_id' can't be null";
        }
        if ($this->container['avatar_link'] === null) {
            $invalidProperties[] = "'avatar_link' can't be null";
        }
        $allowedValues = $this->getLanguageAllowableValues();
        if (!is_null($this->container['language']) && !in_array($this->container['language'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'language', must be one of '%s'",
                $this->container['language'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['start_time'] === null) {
            $invalidProperties[] = "'start_time' can't be null";
        }
        if ($this->container['configurator_id'] === null) {
            $invalidProperties[] = "'configurator_id' can't be null";
        }
        if ($this->container['created_at'] === null) {
            $invalidProperties[] = "'created_at' can't be null";
        }
        $allowedValues = $this->getAvailabilityZoneAllowableValues();
        if (!is_null($this->container['availability_zone']) && !in_array($this->container['availability_zone'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'availability_zone', must be one of '%s'",
                $this->container['availability_zone'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['requests_limit'] === null) {
            $invalidProperties[] = "'requests_limit' can't be null";
        }
        if (!is_null($this->container['docker_image']) && (mb_strlen($this->container['docker_image']) < 1)) {
            $invalidProperties[] = "invalid value for 'docker_image', the character length must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['docker_image_tag']) && (mb_strlen($this->container['docker_image_tag']) < 1)) {
            $invalidProperties[] = "invalid value for 'docker_image_tag', the character length must be bigger than or equal to 1.";
        }

        if ($this->container['reverse_proxy'] === null) {
            $invalidProperties[] = "'reverse_proxy' can't be null";
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
     * @param int $id ID для каждого экземпляра приложения. Автоматически генерируется при создании.
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
     * @param string $status Текущее состояние приложения. После принятия запроса на создание — new. Ответ 201 не означает завершение развёртывания.
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
     * @return \OpenAPI\Client\Model\AppV2Provider
     */
    public function getProvider()
    {
        return $this->container['provider'];
    }

    /**
     * Sets provider
     *
     * @param \OpenAPI\Client\Model\AppV2Provider $provider provider
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
     * @return string|null
     */
    public function getIp()
    {
        return $this->container['ip'];
    }

    /**
     * Sets ip
     *
     * @param string|null $ip Публичный IPv4-адрес. Отсутствует, пока сервер и IP-адрес не созданы.
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
     * @return \OpenAPI\Client\Model\AppV2DomainsInner[]
     */
    public function getDomains()
    {
        return $this->container['domains'];
    }

    /**
     * Sets domains
     *
     * @param \OpenAPI\Client\Model\AppV2DomainsInner[] $domains Домены приложения. В начальном ответе на создание массив пуст.
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
     * @return string|null
     */
    public function getFramework()
    {
        return $this->container['framework'];
    }

    /**
     * Sets framework
     *
     * @param string|null $framework Фреймворк приложения. Поле может отсутствовать до создания инфраструктуры.
     *
     * @return self
     */
    public function setFramework($framework)
    {
        if (is_null($framework)) {
            throw new \InvalidArgumentException('non-nullable framework cannot be null');
        }
        $allowedValues = $this->getFrameworkAllowableValues();
        if (!in_array($framework, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'framework', must be one of '%s'",
                    $framework,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['framework'] = $framework;

        return $this;
    }

    /**
     * Gets location
     *
     * @return string|null
     */
    public function getLocation()
    {
        return $this->container['location'];
    }

    /**
     * Sets location
     *
     * @param string|null $location Локация сервера. Может отсутствовать до создания сервера.
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
     * @return \OpenAPI\Client\Model\Repository|null
     */
    public function getRepository()
    {
        return $this->container['repository'];
    }

    /**
     * Sets repository
     *
     * @param \OpenAPI\Client\Model\Repository|null $repository repository
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
     * @return string|null
     */
    public function getEnvVersion()
    {
        return $this->container['env_version'];
    }

    /**
     * Sets env_version
     *
     * @param string|null $env_version Версия окружения. Поле может отсутствовать до создания инфраструктуры.
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
     * @return array<string,string>|null
     */
    public function getEnvs()
    {
        return $this->container['envs'];
    }

    /**
     * Sets envs
     *
     * @param array<string,string>|null $envs Переменные окружения приложения. Объект с ключами и значениями типа string. Поле может отсутствовать до создания инфраструктуры.
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
     * @return string|null
     */
    public function getCommitSha()
    {
        return $this->container['commit_sha'];
    }

    /**
     * Sets commit_sha
     *
     * @param string|null $commit_sha Хэш коммита, из которого собрано приложение.
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
     * @return string|null
     */
    public function getComment()
    {
        return $this->container['comment'];
    }

    /**
     * Sets comment
     *
     * @param string|null $comment Комментарий к приложению.
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
     * @param float $preset_id ID тарифа приложения; 0 при использовании конфигуратора.
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
     * @return string|null
     */
    public function getIndexDir()
    {
        return $this->container['index_dir'];
    }

    /**
     * Sets index_dir
     *
     * @param string|null $index_dir Каталог со статическими файлами frontend-приложения. До создания инфраструктуры поле отсутствует. Для backend — null.
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
     * @return string|null
     */
    public function getBuildCmd()
    {
        return $this->container['build_cmd'];
    }

    /**
     * Sets build_cmd
     *
     * @param string|null $build_cmd Команда сборки приложения. Поле может отсутствовать до создания инфраструктуры.
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
     * @param string $avatar_link Ссылка на аватар приложения.
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
     * Gets run_cmd
     *
     * @return string|null
     */
    public function getRunCmd()
    {
        return $this->container['run_cmd'];
    }

    /**
     * Sets run_cmd
     *
     * @param string|null $run_cmd Команда запуска backend-приложения. До создания инфраструктуры поле отсутствует. Для frontend — null.
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
     * @return \OpenAPI\Client\Model\AppV2Configuration|null
     */
    public function getConfiguration()
    {
        return $this->container['configuration'];
    }

    /**
     * Sets configuration
     *
     * @param \OpenAPI\Client\Model\AppV2Configuration|null $configuration configuration
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
     * @return \OpenAPI\Client\Model\AppV2DiskStatus|null
     */
    public function getDiskStatus()
    {
        return $this->container['disk_status'];
    }

    /**
     * Sets disk_status
     *
     * @param \OpenAPI\Client\Model\AppV2DiskStatus|null $disk_status disk_status
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
     * @return bool|null
     */
    public function getIsQemuAgent()
    {
        return $this->container['is_qemu_agent'];
    }

    /**
     * Sets is_qemu_agent
     *
     * @param bool|null $is_qemu_agent Включён ли агент QEMU. Для frontend — null. Для backend поле отсутствует до создания сервера.
     *
     * @return self
     */
    public function setIsQemuAgent($is_qemu_agent)
    {
        if (is_null($is_qemu_agent)) {
            array_push($this->openAPINullablesSetToNull, 'is_qemu_agent');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('is_qemu_agent', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['is_qemu_agent'] = $is_qemu_agent;

        return $this;
    }

    /**
     * Gets language
     *
     * @return string|null
     */
    public function getLanguage()
    {
        return $this->container['language'];
    }

    /**
     * Sets language
     *
     * @param string|null $language Язык или способ развёртывания. Может отсутствовать до создания инфраструктуры. Поле может отсутствовать до создания инфраструктуры.
     *
     * @return self
     */
    public function setLanguage($language)
    {
        if (is_null($language)) {
            throw new \InvalidArgumentException('non-nullable language cannot be null');
        }
        $allowedValues = $this->getLanguageAllowableValues();
        if (!in_array($language, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'language', must be one of '%s'",
                    $language,
                    implode("', '", $allowedValues)
                )
            );
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
     * @param \DateTime $start_time Время последнего изменения записи приложения.
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
     * Gets branch
     *
     * @return string|null
     */
    public function getBranch()
    {
        return $this->container['branch'];
    }

    /**
     * Sets branch
     *
     * @param string|null $branch Ветка Git-репозитория. В ответе v2 поле называется branch.
     *
     * @return self
     */
    public function setBranch($branch)
    {
        if (is_null($branch)) {
            throw new \InvalidArgumentException('non-nullable branch cannot be null');
        }
        $this->container['branch'] = $branch;

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
     * @param int $configurator_id ID конфигуратора приложения; null при использовании готового тарифа.
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
     * @param int|null $project_id ID проекта приложения. Может отсутствовать, если проект не задан.
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
     * Gets system_dependencies
     *
     * @return string[]|null
     */
    public function getSystemDependencies()
    {
        return $this->container['system_dependencies'];
    }

    /**
     * Sets system_dependencies
     *
     * @param string[]|null $system_dependencies Системные пакеты приложения. Поле отсутствует, если зависимости не заданы.
     *
     * @return self
     */
    public function setSystemDependencies($system_dependencies)
    {
        if (is_null($system_dependencies)) {
            throw new \InvalidArgumentException('non-nullable system_dependencies cannot be null');
        }
        $this->container['system_dependencies'] = $system_dependencies;

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
     * @param \DateTime $created_at Время создания записи приложения.
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
     * @param string|null $availability_zone Зона доступности сервера. Может быть null или отсутствовать до создания сервера.
     *
     * @return self
     */
    public function setAvailabilityZone($availability_zone)
    {
        if (is_null($availability_zone)) {
            array_push($this->openAPINullablesSetToNull, 'availability_zone');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('availability_zone', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $allowedValues = $this->getAvailabilityZoneAllowableValues();
        if (!is_null($availability_zone) && !in_array($availability_zone, $allowedValues, true)) {
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
     * Gets requests_limit
     *
     * @return int
     */
    public function getRequestsLimit()
    {
        return $this->container['requests_limit'];
    }

    /**
     * Sets requests_limit
     *
     * @param int $requests_limit Ограничение количества запросов; null, если индивидуальный лимит не задан.
     *
     * @return self
     */
    public function setRequestsLimit($requests_limit)
    {
        if (is_null($requests_limit)) {
            array_push($this->openAPINullablesSetToNull, 'requests_limit');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('requests_limit', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['requests_limit'] = $requests_limit;

        return $this;
    }

    /**
     * Gets build_entry_path
     *
     * @return string|null
     */
    public function getBuildEntryPath()
    {
        return $this->container['build_entry_path'];
    }

    /**
     * Sets build_entry_path
     *
     * @param string|null $build_entry_path Каталог приложения в Git-репозитории, относительно которого выполняется сборка. Может отсутствовать до создания инфраструктуры.
     *
     * @return self
     */
    public function setBuildEntryPath($build_entry_path)
    {
        if (is_null($build_entry_path)) {
            throw new \InvalidArgumentException('non-nullable build_entry_path cannot be null');
        }
        $this->container['build_entry_path'] = $build_entry_path;

        return $this;
    }

    /**
     * Gets health_check
     *
     * @return string|null
     */
    public function getHealthCheck()
    {
        return $this->container['health_check'];
    }

    /**
     * Sets health_check
     *
     * @param string|null $health_check HTTP-путь для проверки работоспособности backend-приложения. Может отсутствовать до создания инфраструктуры.
     *
     * @return self
     */
    public function setHealthCheck($health_check)
    {
        if (is_null($health_check)) {
            array_push($this->openAPINullablesSetToNull, 'health_check');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('health_check', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['health_check'] = $health_check;

        return $this;
    }

    /**
     * Gets docker_image
     *
     * @return string|null
     */
    public function getDockerImage()
    {
        return $this->container['docker_image'];
    }

    /**
     * Sets docker_image
     *
     * @param string|null $docker_image Имя готового Docker-образа без тега. Присутствует для backend из готового Docker-образа.
     *
     * @return self
     */
    public function setDockerImage($docker_image)
    {
        if (is_null($docker_image)) {
            throw new \InvalidArgumentException('non-nullable docker_image cannot be null');
        }

        if ((mb_strlen($docker_image) < 1)) {
            throw new \InvalidArgumentException('invalid length for $docker_image when calling AppV2., must be bigger than or equal to 1.');
        }

        $this->container['docker_image'] = $docker_image;

        return $this;
    }

    /**
     * Gets docker_image_tag
     *
     * @return string|null
     */
    public function getDockerImageTag()
    {
        return $this->container['docker_image_tag'];
    }

    /**
     * Sets docker_image_tag
     *
     * @param string|null $docker_image_tag Тег готового Docker-образа. Присутствует для backend из готового Docker-образа.
     *
     * @return self
     */
    public function setDockerImageTag($docker_image_tag)
    {
        if (is_null($docker_image_tag)) {
            throw new \InvalidArgumentException('non-nullable docker_image_tag cannot be null');
        }

        if ((mb_strlen($docker_image_tag) < 1)) {
            throw new \InvalidArgumentException('invalid length for $docker_image_tag when calling AppV2., must be bigger than or equal to 1.');
        }

        $this->container['docker_image_tag'] = $docker_image_tag;

        return $this;
    }

    /**
     * Gets is_russian_trusted_ca
     *
     * @return bool|null
     */
    public function getIsRussianTrustedCa()
    {
        return $this->container['is_russian_trusted_ca'];
    }

    /**
     * Sets is_russian_trusted_ca
     *
     * @param bool|null $is_russian_trusted_ca Добавлены ли доверенные корневые сертификаты Минцифры в окружение backend-приложения. Поле возвращается в российском регионе после создания инфраструктуры.
     *
     * @return self
     */
    public function setIsRussianTrustedCa($is_russian_trusted_ca)
    {
        if (is_null($is_russian_trusted_ca)) {
            throw new \InvalidArgumentException('non-nullable is_russian_trusted_ca cannot be null');
        }
        $this->container['is_russian_trusted_ca'] = $is_russian_trusted_ca;

        return $this;
    }

    /**
     * Gets is_tci_trusted_ca
     *
     * @return bool|null
     */
    public function getIsTciTrustedCa()
    {
        return $this->container['is_tci_trusted_ca'];
    }

    /**
     * Sets is_tci_trusted_ca
     *
     * @param bool|null $is_tci_trusted_ca Добавлены ли доверенные корневые сертификаты ТЦИ в окружение backend-приложения. Поле возвращается в российском регионе после создания инфраструктуры.
     *
     * @return self
     */
    public function setIsTciTrustedCa($is_tci_trusted_ca)
    {
        if (is_null($is_tci_trusted_ca)) {
            throw new \InvalidArgumentException('non-nullable is_tci_trusted_ca cannot be null');
        }
        $this->container['is_tci_trusted_ca'] = $is_tci_trusted_ca;

        return $this;
    }

    /**
     * Gets blocked_ports
     *
     * @return int[]|null
     */
    public function getBlockedPorts()
    {
        return $this->container['blocked_ports'];
    }

    /**
     * Sets blocked_ports
     *
     * @param int[]|null $blocked_ports Заблокированные порты backend-приложения. Поле может отсутствовать до создания сервера.
     *
     * @return self
     */
    public function setBlockedPorts($blocked_ports)
    {
        if (is_null($blocked_ports)) {
            array_push($this->openAPINullablesSetToNull, 'blocked_ports');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('blocked_ports', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['blocked_ports'] = $blocked_ports;

        return $this;
    }

    /**
     * Gets reverse_proxy
     *
     * @return object
     */
    public function getReverseProxy()
    {
        return $this->container['reverse_proxy'];
    }

    /**
     * Sets reverse_proxy
     *
     * @param object $reverse_proxy Настройки обратного прокси. В начальном ответе на создание — null.
     *
     * @return self
     */
    public function setReverseProxy($reverse_proxy)
    {
        if (is_null($reverse_proxy)) {
            array_push($this->openAPINullablesSetToNull, 'reverse_proxy');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('reverse_proxy', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['reverse_proxy'] = $reverse_proxy;

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


