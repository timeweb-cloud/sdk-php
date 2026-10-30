<?php
/**
 * CreateAppV2
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
 * CreateAppV2 Class Doc Comment
 *
 * @category Class
 * @description Параметры создания приложения. Для Git-репозитория обязательны provider_id, repository_id, branch_name, commit_sha, build_cmd, is_auto_deploy и framework. Для frontend также обязательны index_dir и preset_id. Для backend из Git обязателен run_cmd. Для backend из готового Docker-образа передайте docker_image и docker_image_tag; Git-параметры не требуются. Для любого backend передайте либо preset_id, либо configuration. Эти поля нельзя передавать одновременно.
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class CreateAppV2 implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'create-app-v2';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'provider_id' => 'string',
        'type' => 'string',
        'repository_id' => 'string',
        'build_cmd' => 'string',
        'envs' => 'array<string,string>',
        'branch_name' => 'string',
        'is_auto_deploy' => 'bool',
        'commit_sha' => 'string',
        'name' => 'string',
        'comment' => 'string',
        'preset_id' => 'int',
        'env_version' => 'string',
        'framework' => 'string',
        'index_dir' => 'string',
        'run_cmd' => 'string',
        'system_dependencies' => 'string[]',
        'project_id' => 'int',
        'configuration' => '\OpenAPI\Client\Model\CreateAppV2Configuration',
        'language' => 'string',
        'build_entry_path' => 'string',
        'network' => '\OpenAPI\Client\Model\CreateAppV2Network',
        'health_check' => 'string',
        'global_env_ids' => 'float[]',
        'docker_image' => 'string',
        'docker_image_tag' => 'string',
        'is_russian_trusted_ca' => 'bool',
        'is_tci_trusted_ca' => 'bool'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'provider_id' => null,
        'type' => null,
        'repository_id' => null,
        'build_cmd' => null,
        'envs' => null,
        'branch_name' => null,
        'is_auto_deploy' => null,
        'commit_sha' => null,
        'name' => null,
        'comment' => null,
        'preset_id' => null,
        'env_version' => null,
        'framework' => null,
        'index_dir' => null,
        'run_cmd' => null,
        'system_dependencies' => null,
        'project_id' => null,
        'configuration' => null,
        'language' => null,
        'build_entry_path' => null,
        'network' => null,
        'health_check' => null,
        'global_env_ids' => null,
        'docker_image' => null,
        'docker_image_tag' => null,
        'is_russian_trusted_ca' => null,
        'is_tci_trusted_ca' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'provider_id' => false,
		'type' => false,
		'repository_id' => false,
		'build_cmd' => false,
		'envs' => false,
		'branch_name' => false,
		'is_auto_deploy' => false,
		'commit_sha' => false,
		'name' => false,
		'comment' => false,
		'preset_id' => false,
		'env_version' => true,
		'framework' => false,
		'index_dir' => false,
		'run_cmd' => false,
		'system_dependencies' => false,
		'project_id' => false,
		'configuration' => false,
		'language' => false,
		'build_entry_path' => false,
		'network' => false,
		'health_check' => false,
		'global_env_ids' => false,
		'docker_image' => false,
		'docker_image_tag' => false,
		'is_russian_trusted_ca' => false,
		'is_tci_trusted_ca' => false
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
        'provider_id' => 'provider_id',
        'type' => 'type',
        'repository_id' => 'repository_id',
        'build_cmd' => 'build_cmd',
        'envs' => 'envs',
        'branch_name' => 'branch_name',
        'is_auto_deploy' => 'is_auto_deploy',
        'commit_sha' => 'commit_sha',
        'name' => 'name',
        'comment' => 'comment',
        'preset_id' => 'preset_id',
        'env_version' => 'env_version',
        'framework' => 'framework',
        'index_dir' => 'index_dir',
        'run_cmd' => 'run_cmd',
        'system_dependencies' => 'system_dependencies',
        'project_id' => 'project_id',
        'configuration' => 'configuration',
        'language' => 'language',
        'build_entry_path' => 'build_entry_path',
        'network' => 'network',
        'health_check' => 'health_check',
        'global_env_ids' => 'global_env_ids',
        'docker_image' => 'docker_image',
        'docker_image_tag' => 'docker_image_tag',
        'is_russian_trusted_ca' => 'is_russian_trusted_ca',
        'is_tci_trusted_ca' => 'is_tci_trusted_ca'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'provider_id' => 'setProviderId',
        'type' => 'setType',
        'repository_id' => 'setRepositoryId',
        'build_cmd' => 'setBuildCmd',
        'envs' => 'setEnvs',
        'branch_name' => 'setBranchName',
        'is_auto_deploy' => 'setIsAutoDeploy',
        'commit_sha' => 'setCommitSha',
        'name' => 'setName',
        'comment' => 'setComment',
        'preset_id' => 'setPresetId',
        'env_version' => 'setEnvVersion',
        'framework' => 'setFramework',
        'index_dir' => 'setIndexDir',
        'run_cmd' => 'setRunCmd',
        'system_dependencies' => 'setSystemDependencies',
        'project_id' => 'setProjectId',
        'configuration' => 'setConfiguration',
        'language' => 'setLanguage',
        'build_entry_path' => 'setBuildEntryPath',
        'network' => 'setNetwork',
        'health_check' => 'setHealthCheck',
        'global_env_ids' => 'setGlobalEnvIds',
        'docker_image' => 'setDockerImage',
        'docker_image_tag' => 'setDockerImageTag',
        'is_russian_trusted_ca' => 'setIsRussianTrustedCa',
        'is_tci_trusted_ca' => 'setIsTciTrustedCa'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'provider_id' => 'getProviderId',
        'type' => 'getType',
        'repository_id' => 'getRepositoryId',
        'build_cmd' => 'getBuildCmd',
        'envs' => 'getEnvs',
        'branch_name' => 'getBranchName',
        'is_auto_deploy' => 'getIsAutoDeploy',
        'commit_sha' => 'getCommitSha',
        'name' => 'getName',
        'comment' => 'getComment',
        'preset_id' => 'getPresetId',
        'env_version' => 'getEnvVersion',
        'framework' => 'getFramework',
        'index_dir' => 'getIndexDir',
        'run_cmd' => 'getRunCmd',
        'system_dependencies' => 'getSystemDependencies',
        'project_id' => 'getProjectId',
        'configuration' => 'getConfiguration',
        'language' => 'getLanguage',
        'build_entry_path' => 'getBuildEntryPath',
        'network' => 'getNetwork',
        'health_check' => 'getHealthCheck',
        'global_env_ids' => 'getGlobalEnvIds',
        'docker_image' => 'getDockerImage',
        'docker_image_tag' => 'getDockerImageTag',
        'is_russian_trusted_ca' => 'getIsRussianTrustedCa',
        'is_tci_trusted_ca' => 'getIsTciTrustedCa'
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

    public const TYPE_FRONTEND = 'frontend';
    public const TYPE_BACKEND = 'backend';
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

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getTypeAllowableValues()
    {
        return [
            self::TYPE_FRONTEND,
            self::TYPE_BACKEND,
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
        $this->setIfExists('provider_id', $data ?? [], null);
        $this->setIfExists('type', $data ?? [], null);
        $this->setIfExists('repository_id', $data ?? [], null);
        $this->setIfExists('build_cmd', $data ?? [], null);
        $this->setIfExists('envs', $data ?? [], null);
        $this->setIfExists('branch_name', $data ?? [], null);
        $this->setIfExists('is_auto_deploy', $data ?? [], null);
        $this->setIfExists('commit_sha', $data ?? [], null);
        $this->setIfExists('name', $data ?? [], null);
        $this->setIfExists('comment', $data ?? [], null);
        $this->setIfExists('preset_id', $data ?? [], null);
        $this->setIfExists('env_version', $data ?? [], null);
        $this->setIfExists('framework', $data ?? [], null);
        $this->setIfExists('index_dir', $data ?? [], null);
        $this->setIfExists('run_cmd', $data ?? [], null);
        $this->setIfExists('system_dependencies', $data ?? [], null);
        $this->setIfExists('project_id', $data ?? [], null);
        $this->setIfExists('configuration', $data ?? [], null);
        $this->setIfExists('language', $data ?? [], null);
        $this->setIfExists('build_entry_path', $data ?? [], null);
        $this->setIfExists('network', $data ?? [], null);
        $this->setIfExists('health_check', $data ?? [], null);
        $this->setIfExists('global_env_ids', $data ?? [], null);
        $this->setIfExists('docker_image', $data ?? [], null);
        $this->setIfExists('docker_image_tag', $data ?? [], null);
        $this->setIfExists('is_russian_trusted_ca', $data ?? [], false);
        $this->setIfExists('is_tci_trusted_ca', $data ?? [], false);
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

        if (!is_null($this->container['provider_id']) && (mb_strlen($this->container['provider_id']) < 1)) {
            $invalidProperties[] = "invalid value for 'provider_id', the character length must be bigger than or equal to 1.";
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

        if (!is_null($this->container['repository_id']) && (mb_strlen($this->container['repository_id']) < 1)) {
            $invalidProperties[] = "invalid value for 'repository_id', the character length must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['branch_name']) && (mb_strlen($this->container['branch_name']) < 1)) {
            $invalidProperties[] = "invalid value for 'branch_name', the character length must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['commit_sha']) && (mb_strlen($this->container['commit_sha']) < 1)) {
            $invalidProperties[] = "invalid value for 'commit_sha', the character length must be bigger than or equal to 1.";
        }

        if ($this->container['name'] === null) {
            $invalidProperties[] = "'name' can't be null";
        }
        if ((mb_strlen($this->container['name']) > 255)) {
            $invalidProperties[] = "invalid value for 'name', the character length must be smaller than or equal to 255.";
        }

        if ((mb_strlen($this->container['name']) < 1)) {
            $invalidProperties[] = "invalid value for 'name', the character length must be bigger than or equal to 1.";
        }

        if ($this->container['comment'] === null) {
            $invalidProperties[] = "'comment' can't be null";
        }
        if (!is_null($this->container['preset_id']) && ($this->container['preset_id'] < 1)) {
            $invalidProperties[] = "invalid value for 'preset_id', must be bigger than or equal to 1.";
        }

        $allowedValues = $this->getFrameworkAllowableValues();
        if (!is_null($this->container['framework']) && !in_array($this->container['framework'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'framework', must be one of '%s'",
                $this->container['framework'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['language'] === null) {
            $invalidProperties[] = "'language' can't be null";
        }
        $allowedValues = $this->getLanguageAllowableValues();
        if (!is_null($this->container['language']) && !in_array($this->container['language'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'language', must be one of '%s'",
                $this->container['language'],
                implode("', '", $allowedValues)
            );
        }

        if (!is_null($this->container['docker_image']) && (mb_strlen($this->container['docker_image']) < 1)) {
            $invalidProperties[] = "invalid value for 'docker_image', the character length must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['docker_image_tag']) && (mb_strlen($this->container['docker_image_tag']) < 1)) {
            $invalidProperties[] = "invalid value for 'docker_image_tag', the character length must be bigger than or equal to 1.";
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
     * Gets provider_id
     *
     * @return string|null
     */
    public function getProviderId()
    {
        return $this->container['provider_id'];
    }

    /**
     * Sets provider_id
     *
     * @param string|null $provider_id ID провайдера. Обязателен при создании из Git-репозитория. Не требуется для готового Docker-образа.
     *
     * @return self
     */
    public function setProviderId($provider_id)
    {
        if (is_null($provider_id)) {
            throw new \InvalidArgumentException('non-nullable provider_id cannot be null');
        }

        if ((mb_strlen($provider_id) < 1)) {
            throw new \InvalidArgumentException('invalid length for $provider_id when calling CreateAppV2., must be bigger than or equal to 1.');
        }

        $this->container['provider_id'] = $provider_id;

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
     * @param string $type Тип приложения: frontend — статический сайт, backend — серверное приложение или Docker-образ.
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
     * Gets repository_id
     *
     * @return string|null
     */
    public function getRepositoryId()
    {
        return $this->container['repository_id'];
    }

    /**
     * Sets repository_id
     *
     * @param string|null $repository_id ID репозитория. Обязателен при создании из Git-репозитория. Не требуется для готового Docker-образа.
     *
     * @return self
     */
    public function setRepositoryId($repository_id)
    {
        if (is_null($repository_id)) {
            throw new \InvalidArgumentException('non-nullable repository_id cannot be null');
        }

        if ((mb_strlen($repository_id) < 1)) {
            throw new \InvalidArgumentException('invalid length for $repository_id when calling CreateAppV2., must be bigger than or equal to 1.');
        }

        $this->container['repository_id'] = $repository_id;

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
     * @param string|null $build_cmd Команда сборки приложения из Git-репозитория. Обязательна для Git; можно передать пустую строку, если сборка не нужна.
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
     * @param array<string,string>|null $envs Переменные окружения приложения. Ключи и значения — строки. Длина ключа — не более 255 символов, значения — не более 10240. По умолчанию пустой объект.
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
     * @return string|null
     */
    public function getBranchName()
    {
        return $this->container['branch_name'];
    }

    /**
     * Sets branch_name
     *
     * @param string|null $branch_name Ветка Git-репозитория, из которой необходимо собрать приложение. Обязательна при создании из Git.
     *
     * @return self
     */
    public function setBranchName($branch_name)
    {
        if (is_null($branch_name)) {
            throw new \InvalidArgumentException('non-nullable branch_name cannot be null');
        }

        if ((mb_strlen($branch_name) < 1)) {
            throw new \InvalidArgumentException('invalid length for $branch_name when calling CreateAppV2., must be bigger than or equal to 1.');
        }

        $this->container['branch_name'] = $branch_name;

        return $this;
    }

    /**
     * Gets is_auto_deploy
     *
     * @return bool|null
     */
    public function getIsAutoDeploy()
    {
        return $this->container['is_auto_deploy'];
    }

    /**
     * Sets is_auto_deploy
     *
     * @param bool|null $is_auto_deploy Автоматически запускать деплой при изменении Git-репозитория. Поле обязательно при создании из Git. Для провайдера git и готового Docker-образа автодеплой выключен.
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
     * @param string|null $commit_sha Хэш коммита для первого деплоя. Обязателен при создании из Git.
     *
     * @return self
     */
    public function setCommitSha($commit_sha)
    {
        if (is_null($commit_sha)) {
            throw new \InvalidArgumentException('non-nullable commit_sha cannot be null');
        }

        if ((mb_strlen($commit_sha) < 1)) {
            throw new \InvalidArgumentException('invalid length for $commit_sha when calling CreateAppV2., must be bigger than or equal to 1.');
        }

        $this->container['commit_sha'] = $commit_sha;

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
     * @param string $name Имя приложения, от 1 до 255 символов. Допустимы латинские и русские буквы, цифры, пробелы и символы - . ( ) , & # [ ] _.
     *
     * @return self
     */
    public function setName($name)
    {
        if (is_null($name)) {
            throw new \InvalidArgumentException('non-nullable name cannot be null');
        }
        if ((mb_strlen($name) > 255)) {
            throw new \InvalidArgumentException('invalid length for $name when calling CreateAppV2., must be smaller than or equal to 255.');
        }
        if ((mb_strlen($name) < 1)) {
            throw new \InvalidArgumentException('invalid length for $name when calling CreateAppV2., must be bigger than or equal to 1.');
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
     * @param string $comment Комментарий к приложению. Обязательное поле; можно передать пустую строку. Допустимы те же символы, что и в имени приложения.
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
     * @return int|null
     */
    public function getPresetId()
    {
        return $this->container['preset_id'];
    }

    /**
     * Sets preset_id
     *
     * @param int|null $preset_id ID тарифа приложения. Обязателен для frontend. Для backend передайте либо preset_id, либо configuration. Нельзя передавать вместе с configuration. Доступные тарифы: GET /api/v1/presets/apps.
     *
     * @return self
     */
    public function setPresetId($preset_id)
    {
        if (is_null($preset_id)) {
            throw new \InvalidArgumentException('non-nullable preset_id cannot be null');
        }

        if (($preset_id < 1)) {
            throw new \InvalidArgumentException('invalid value for $preset_id when calling CreateAppV2., must be bigger than or equal to 1.');
        }

        $this->container['preset_id'] = $preset_id;

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
     * @param string|null $env_version Версия окружения для сборки и запуска, например версия Node.js. Можно передать null.
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
     * @param string|null $framework Фреймворк приложения, строка с учётом регистра. Обязателен при создании из Git. Для frontend: `angular`, `astro`, `ember`, `next.js`, `nuxt`, `preact`, `react`, `remix`, `solid`, `solid-start`, `svelte`, `sveltekit`, `tanstack-start`, `vue`, `static-nobuild`, `another`. Для backend: `django`, `express`, `phoenix`, `Spring`, `laravel`, `beego`, `fastapi`, `ASP.NET Core`, `hapi`, `celery`, `flask`, `gin`, `docker`, `docker-compose`, `fastify`, `nest`, `symfony`, `yii`, `next.js`, `nuxt`, `astro`, `tanstack-start`, `solid-start`, `ktor`, `axum`, `actix`, `tornado`, `aiohttp`, `fiber`, `echo`, `Micronaut`, `Quarkus`, `remix`, `sveltekit`. Для готового Docker-образа не требуется.
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
     * @param string|null $index_dir Путь к каталогу с собранными статическими файлами, например /dist. Обязателен для frontend. Не используется для backend.
     *
     * @return self
     */
    public function setIndexDir($index_dir)
    {
        if (is_null($index_dir)) {
            throw new \InvalidArgumentException('non-nullable index_dir cannot be null');
        }
        $this->container['index_dir'] = $index_dir;

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
     * @param string|null $run_cmd Команда запуска backend-приложения из Git. Обязательна для backend из Git. Не требуется для готового Docker-образа и frontend.
     *
     * @return self
     */
    public function setRunCmd($run_cmd)
    {
        if (is_null($run_cmd)) {
            throw new \InvalidArgumentException('non-nullable run_cmd cannot be null');
        }
        $this->container['run_cmd'] = $run_cmd;

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
     * @param string[]|null $system_dependencies Системные пакеты для установки в окружение приложения. Допустимы строчные латинские буквы, цифры и символы . + - =. По умолчанию пустой массив.
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
     * @param int|null $project_id ID проекта, в который необходимо добавить приложение. Проект должен принадлежать аккаунту.
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
     * Gets configuration
     *
     * @return \OpenAPI\Client\Model\CreateAppV2Configuration|null
     */
    public function getConfiguration()
    {
        return $this->container['configuration'];
    }

    /**
     * Sets configuration
     *
     * @param \OpenAPI\Client\Model\CreateAppV2Configuration|null $configuration configuration
     *
     * @return self
     */
    public function setConfiguration($configuration)
    {
        if (is_null($configuration)) {
            throw new \InvalidArgumentException('non-nullable configuration cannot be null');
        }
        $this->container['configuration'] = $configuration;

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
     * @param string $language Язык или способ развёртывания. Обязателен в v2. Для frontend: `javascript`. Для backend: `node`, `elixir`, `go`, `php`, `python`, `ruby`, `docker`, `docker-compose`, `dotnet`, `java`, `kotlin`, `rust`, `bun`, `deno`, `custom-image`. Для SSR-приложений из Git используйте node, для готового Docker-образа — custom-image.
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
     * @param string|null $build_entry_path Каталог приложения в Git-репозитории, относительно которого выполняется сборка. Непустой путь начинается с /, не содержит .. или двойной начальный /. Допустимы латинские буквы, цифры, . - _ /. Можно передать пустую строку.
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
     * Gets network
     *
     * @return \OpenAPI\Client\Model\CreateAppV2Network|null
     */
    public function getNetwork()
    {
        return $this->container['network'];
    }

    /**
     * Sets network
     *
     * @param \OpenAPI\Client\Model\CreateAppV2Network|null $network network
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
     * @param string|null $health_check HTTP-путь для проверки работоспособности backend-приложения.
     *
     * @return self
     */
    public function setHealthCheck($health_check)
    {
        if (is_null($health_check)) {
            throw new \InvalidArgumentException('non-nullable health_check cannot be null');
        }
        $this->container['health_check'] = $health_check;

        return $this;
    }

    /**
     * Gets global_env_ids
     *
     * @return float[]|null
     */
    public function getGlobalEnvIds()
    {
        return $this->container['global_env_ids'];
    }

    /**
     * Sets global_env_ids
     *
     * @param float[]|null $global_env_ids ID глобальных переменных окружения аккаунта, которые необходимо связать с приложением.
     *
     * @return self
     */
    public function setGlobalEnvIds($global_env_ids)
    {
        if (is_null($global_env_ids)) {
            throw new \InvalidArgumentException('non-nullable global_env_ids cannot be null');
        }
        $this->container['global_env_ids'] = $global_env_ids;

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
     * @param string|null $docker_image Имя готового Docker-образа для backend, без тега. Передавайте вместе с docker_image_tag. При указании обоих полей Git-параметры не требуются.
     *
     * @return self
     */
    public function setDockerImage($docker_image)
    {
        if (is_null($docker_image)) {
            throw new \InvalidArgumentException('non-nullable docker_image cannot be null');
        }

        if ((mb_strlen($docker_image) < 1)) {
            throw new \InvalidArgumentException('invalid length for $docker_image when calling CreateAppV2., must be bigger than or equal to 1.');
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
     * @param string|null $docker_image_tag Тег готового Docker-образа. Передавайте вместе с docker_image.
     *
     * @return self
     */
    public function setDockerImageTag($docker_image_tag)
    {
        if (is_null($docker_image_tag)) {
            throw new \InvalidArgumentException('non-nullable docker_image_tag cannot be null');
        }

        if ((mb_strlen($docker_image_tag) < 1)) {
            throw new \InvalidArgumentException('invalid length for $docker_image_tag when calling CreateAppV2., must be bigger than or equal to 1.');
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
     * @param bool|null $is_russian_trusted_ca Добавить доверенные корневые сертификаты Минцифры в окружение backend-приложения. Применяется в российском регионе.
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
     * @param bool|null $is_tci_trusted_ca Добавить доверенные корневые сертификаты ТЦИ в окружение backend-приложения. Применяется в российском регионе.
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


