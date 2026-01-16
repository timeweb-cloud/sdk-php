<?php
/**
 * MailboxV2
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
 * MailboxV2 Class Doc Comment
 *
 * @category Class
 * @description Почтовый ящик (API v2)
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class MailboxV2 implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'mailbox-v2';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'idn_name' => 'string',
        'autoreply_message' => 'string',
        'autoreply_status' => 'bool',
        'autoreply_subject' => 'string',
        'comment' => 'string',
        'filter_action' => 'string',
        'filter_status' => 'bool',
        'forward_list' => 'string[]',
        'forward_status' => 'bool',
        'outgoing_control' => 'bool',
        'outgoing_email' => 'string',
        'password' => 'string',
        'spambox' => 'string',
        'white_list' => 'string[]',
        'webmail' => 'bool',
        'dovecot' => 'bool',
        'fqdn' => 'string',
        'leave_messages' => 'bool',
        'mailbox' => 'string',
        'owner_full_name' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'idn_name' => null,
        'autoreply_message' => null,
        'autoreply_status' => null,
        'autoreply_subject' => null,
        'comment' => null,
        'filter_action' => null,
        'filter_status' => null,
        'forward_list' => null,
        'forward_status' => null,
        'outgoing_control' => null,
        'outgoing_email' => null,
        'password' => null,
        'spambox' => null,
        'white_list' => null,
        'webmail' => null,
        'dovecot' => null,
        'fqdn' => null,
        'leave_messages' => null,
        'mailbox' => null,
        'owner_full_name' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'idn_name' => false,
		'autoreply_message' => false,
		'autoreply_status' => false,
		'autoreply_subject' => false,
		'comment' => false,
		'filter_action' => false,
		'filter_status' => false,
		'forward_list' => false,
		'forward_status' => false,
		'outgoing_control' => false,
		'outgoing_email' => false,
		'password' => false,
		'spambox' => false,
		'white_list' => false,
		'webmail' => false,
		'dovecot' => false,
		'fqdn' => false,
		'leave_messages' => false,
		'mailbox' => false,
		'owner_full_name' => false
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
        'idn_name' => 'idn_name',
        'autoreply_message' => 'autoreply_message',
        'autoreply_status' => 'autoreply_status',
        'autoreply_subject' => 'autoreply_subject',
        'comment' => 'comment',
        'filter_action' => 'filter_action',
        'filter_status' => 'filter_status',
        'forward_list' => 'forward_list',
        'forward_status' => 'forward_status',
        'outgoing_control' => 'outgoing_control',
        'outgoing_email' => 'outgoing_email',
        'password' => 'password',
        'spambox' => 'spambox',
        'white_list' => 'white_list',
        'webmail' => 'webmail',
        'dovecot' => 'dovecot',
        'fqdn' => 'fqdn',
        'leave_messages' => 'leave_messages',
        'mailbox' => 'mailbox',
        'owner_full_name' => 'owner_full_name'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'idn_name' => 'setIdnName',
        'autoreply_message' => 'setAutoreplyMessage',
        'autoreply_status' => 'setAutoreplyStatus',
        'autoreply_subject' => 'setAutoreplySubject',
        'comment' => 'setComment',
        'filter_action' => 'setFilterAction',
        'filter_status' => 'setFilterStatus',
        'forward_list' => 'setForwardList',
        'forward_status' => 'setForwardStatus',
        'outgoing_control' => 'setOutgoingControl',
        'outgoing_email' => 'setOutgoingEmail',
        'password' => 'setPassword',
        'spambox' => 'setSpambox',
        'white_list' => 'setWhiteList',
        'webmail' => 'setWebmail',
        'dovecot' => 'setDovecot',
        'fqdn' => 'setFqdn',
        'leave_messages' => 'setLeaveMessages',
        'mailbox' => 'setMailbox',
        'owner_full_name' => 'setOwnerFullName'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'idn_name' => 'getIdnName',
        'autoreply_message' => 'getAutoreplyMessage',
        'autoreply_status' => 'getAutoreplyStatus',
        'autoreply_subject' => 'getAutoreplySubject',
        'comment' => 'getComment',
        'filter_action' => 'getFilterAction',
        'filter_status' => 'getFilterStatus',
        'forward_list' => 'getForwardList',
        'forward_status' => 'getForwardStatus',
        'outgoing_control' => 'getOutgoingControl',
        'outgoing_email' => 'getOutgoingEmail',
        'password' => 'getPassword',
        'spambox' => 'getSpambox',
        'white_list' => 'getWhiteList',
        'webmail' => 'getWebmail',
        'dovecot' => 'getDovecot',
        'fqdn' => 'getFqdn',
        'leave_messages' => 'getLeaveMessages',
        'mailbox' => 'getMailbox',
        'owner_full_name' => 'getOwnerFullName'
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

    public const FILTER_ACTION_DIRECTORY = 'directory';
    public const FILTER_ACTION_FORWARD = 'forward';
    public const FILTER_ACTION_DELETE = 'delete';
    public const FILTER_ACTION_TAG = 'tag';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getFilterActionAllowableValues()
    {
        return [
            self::FILTER_ACTION_DIRECTORY,
            self::FILTER_ACTION_FORWARD,
            self::FILTER_ACTION_DELETE,
            self::FILTER_ACTION_TAG,
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
        $this->setIfExists('idn_name', $data ?? [], null);
        $this->setIfExists('autoreply_message', $data ?? [], null);
        $this->setIfExists('autoreply_status', $data ?? [], null);
        $this->setIfExists('autoreply_subject', $data ?? [], null);
        $this->setIfExists('comment', $data ?? [], null);
        $this->setIfExists('filter_action', $data ?? [], null);
        $this->setIfExists('filter_status', $data ?? [], null);
        $this->setIfExists('forward_list', $data ?? [], null);
        $this->setIfExists('forward_status', $data ?? [], null);
        $this->setIfExists('outgoing_control', $data ?? [], null);
        $this->setIfExists('outgoing_email', $data ?? [], null);
        $this->setIfExists('password', $data ?? [], null);
        $this->setIfExists('spambox', $data ?? [], null);
        $this->setIfExists('white_list', $data ?? [], null);
        $this->setIfExists('webmail', $data ?? [], null);
        $this->setIfExists('dovecot', $data ?? [], null);
        $this->setIfExists('fqdn', $data ?? [], null);
        $this->setIfExists('leave_messages', $data ?? [], null);
        $this->setIfExists('mailbox', $data ?? [], null);
        $this->setIfExists('owner_full_name', $data ?? [], null);
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

        if ($this->container['idn_name'] === null) {
            $invalidProperties[] = "'idn_name' can't be null";
        }
        if ($this->container['autoreply_message'] === null) {
            $invalidProperties[] = "'autoreply_message' can't be null";
        }
        if ($this->container['autoreply_status'] === null) {
            $invalidProperties[] = "'autoreply_status' can't be null";
        }
        if ($this->container['autoreply_subject'] === null) {
            $invalidProperties[] = "'autoreply_subject' can't be null";
        }
        if ($this->container['comment'] === null) {
            $invalidProperties[] = "'comment' can't be null";
        }
        if ($this->container['filter_action'] === null) {
            $invalidProperties[] = "'filter_action' can't be null";
        }
        $allowedValues = $this->getFilterActionAllowableValues();
        if (!is_null($this->container['filter_action']) && !in_array($this->container['filter_action'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'filter_action', must be one of '%s'",
                $this->container['filter_action'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['filter_status'] === null) {
            $invalidProperties[] = "'filter_status' can't be null";
        }
        if ($this->container['forward_list'] === null) {
            $invalidProperties[] = "'forward_list' can't be null";
        }
        if ($this->container['forward_status'] === null) {
            $invalidProperties[] = "'forward_status' can't be null";
        }
        if ($this->container['outgoing_control'] === null) {
            $invalidProperties[] = "'outgoing_control' can't be null";
        }
        if ($this->container['outgoing_email'] === null) {
            $invalidProperties[] = "'outgoing_email' can't be null";
        }
        if ($this->container['password'] === null) {
            $invalidProperties[] = "'password' can't be null";
        }
        if ($this->container['spambox'] === null) {
            $invalidProperties[] = "'spambox' can't be null";
        }
        if ($this->container['white_list'] === null) {
            $invalidProperties[] = "'white_list' can't be null";
        }
        if ($this->container['webmail'] === null) {
            $invalidProperties[] = "'webmail' can't be null";
        }
        if ($this->container['dovecot'] === null) {
            $invalidProperties[] = "'dovecot' can't be null";
        }
        if ($this->container['fqdn'] === null) {
            $invalidProperties[] = "'fqdn' can't be null";
        }
        if ($this->container['leave_messages'] === null) {
            $invalidProperties[] = "'leave_messages' can't be null";
        }
        if ($this->container['mailbox'] === null) {
            $invalidProperties[] = "'mailbox' can't be null";
        }
        if ($this->container['owner_full_name'] === null) {
            $invalidProperties[] = "'owner_full_name' can't be null";
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
     * Gets idn_name
     *
     * @return string
     */
    public function getIdnName()
    {
        return $this->container['idn_name'];
    }

    /**
     * Sets idn_name
     *
     * @param string $idn_name IDN домен почтового ящика
     *
     * @return self
     */
    public function setIdnName($idn_name)
    {
        if (is_null($idn_name)) {
            throw new \InvalidArgumentException('non-nullable idn_name cannot be null');
        }
        $this->container['idn_name'] = $idn_name;

        return $this;
    }

    /**
     * Gets autoreply_message
     *
     * @return string
     */
    public function getAutoreplyMessage()
    {
        return $this->container['autoreply_message'];
    }

    /**
     * Sets autoreply_message
     *
     * @param string $autoreply_message Сообщение автоответчика на входящие письма
     *
     * @return self
     */
    public function setAutoreplyMessage($autoreply_message)
    {
        if (is_null($autoreply_message)) {
            throw new \InvalidArgumentException('non-nullable autoreply_message cannot be null');
        }
        $this->container['autoreply_message'] = $autoreply_message;

        return $this;
    }

    /**
     * Gets autoreply_status
     *
     * @return bool
     */
    public function getAutoreplyStatus()
    {
        return $this->container['autoreply_status'];
    }

    /**
     * Sets autoreply_status
     *
     * @param bool $autoreply_status Включен ли автоответчик на входящие письма
     *
     * @return self
     */
    public function setAutoreplyStatus($autoreply_status)
    {
        if (is_null($autoreply_status)) {
            throw new \InvalidArgumentException('non-nullable autoreply_status cannot be null');
        }
        $this->container['autoreply_status'] = $autoreply_status;

        return $this;
    }

    /**
     * Gets autoreply_subject
     *
     * @return string
     */
    public function getAutoreplySubject()
    {
        return $this->container['autoreply_subject'];
    }

    /**
     * Sets autoreply_subject
     *
     * @param string $autoreply_subject Тема сообщения автоответчика на входящие письма
     *
     * @return self
     */
    public function setAutoreplySubject($autoreply_subject)
    {
        if (is_null($autoreply_subject)) {
            throw new \InvalidArgumentException('non-nullable autoreply_subject cannot be null');
        }
        $this->container['autoreply_subject'] = $autoreply_subject;

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
     * @param string $comment Комментарий к почтовому ящику
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
     * Gets filter_action
     *
     * @return string
     */
    public function getFilterAction()
    {
        return $this->container['filter_action'];
    }

    /**
     * Sets filter_action
     *
     * @param string $filter_action Что делать с письмами, которые попадают в спам
     *
     * @return self
     */
    public function setFilterAction($filter_action)
    {
        if (is_null($filter_action)) {
            throw new \InvalidArgumentException('non-nullable filter_action cannot be null');
        }
        $allowedValues = $this->getFilterActionAllowableValues();
        if (!in_array($filter_action, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'filter_action', must be one of '%s'",
                    $filter_action,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['filter_action'] = $filter_action;

        return $this;
    }

    /**
     * Gets filter_status
     *
     * @return bool
     */
    public function getFilterStatus()
    {
        return $this->container['filter_status'];
    }

    /**
     * Sets filter_status
     *
     * @param bool $filter_status Включен ли спам-фильтр
     *
     * @return self
     */
    public function setFilterStatus($filter_status)
    {
        if (is_null($filter_status)) {
            throw new \InvalidArgumentException('non-nullable filter_status cannot be null');
        }
        $this->container['filter_status'] = $filter_status;

        return $this;
    }

    /**
     * Gets forward_list
     *
     * @return string[]
     */
    public function getForwardList()
    {
        return $this->container['forward_list'];
    }

    /**
     * Sets forward_list
     *
     * @param string[] $forward_list Список адресов для пересылки входящих писем
     *
     * @return self
     */
    public function setForwardList($forward_list)
    {
        if (is_null($forward_list)) {
            throw new \InvalidArgumentException('non-nullable forward_list cannot be null');
        }
        $this->container['forward_list'] = $forward_list;

        return $this;
    }

    /**
     * Gets forward_status
     *
     * @return bool
     */
    public function getForwardStatus()
    {
        return $this->container['forward_status'];
    }

    /**
     * Sets forward_status
     *
     * @param bool $forward_status Включена ли пересылка входящих писем
     *
     * @return self
     */
    public function setForwardStatus($forward_status)
    {
        if (is_null($forward_status)) {
            throw new \InvalidArgumentException('non-nullable forward_status cannot be null');
        }
        $this->container['forward_status'] = $forward_status;

        return $this;
    }

    /**
     * Gets outgoing_control
     *
     * @return bool
     */
    public function getOutgoingControl()
    {
        return $this->container['outgoing_control'];
    }

    /**
     * Sets outgoing_control
     *
     * @param bool $outgoing_control Включена ли пересылка исходящих писем
     *
     * @return self
     */
    public function setOutgoingControl($outgoing_control)
    {
        if (is_null($outgoing_control)) {
            throw new \InvalidArgumentException('non-nullable outgoing_control cannot be null');
        }
        $this->container['outgoing_control'] = $outgoing_control;

        return $this;
    }

    /**
     * Gets outgoing_email
     *
     * @return string
     */
    public function getOutgoingEmail()
    {
        return $this->container['outgoing_email'];
    }

    /**
     * Sets outgoing_email
     *
     * @param string $outgoing_email Адрес для пересылки исходящих писем
     *
     * @return self
     */
    public function setOutgoingEmail($outgoing_email)
    {
        if (is_null($outgoing_email)) {
            throw new \InvalidArgumentException('non-nullable outgoing_email cannot be null');
        }
        $this->container['outgoing_email'] = $outgoing_email;

        return $this;
    }

    /**
     * Gets password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->container['password'];
    }

    /**
     * Sets password
     *
     * @param string $password Пароль почтового ящика (всегда возвращается пустой строкой)
     *
     * @return self
     */
    public function setPassword($password)
    {
        if (is_null($password)) {
            throw new \InvalidArgumentException('non-nullable password cannot be null');
        }
        $this->container['password'] = $password;

        return $this;
    }

    /**
     * Gets spambox
     *
     * @return string
     */
    public function getSpambox()
    {
        return $this->container['spambox'];
    }

    /**
     * Sets spambox
     *
     * @param string $spambox Адрес для пересылки спама при выбранном действии forward
     *
     * @return self
     */
    public function setSpambox($spambox)
    {
        if (is_null($spambox)) {
            throw new \InvalidArgumentException('non-nullable spambox cannot be null');
        }
        $this->container['spambox'] = $spambox;

        return $this;
    }

    /**
     * Gets white_list
     *
     * @return string[]
     */
    public function getWhiteList()
    {
        return $this->container['white_list'];
    }

    /**
     * Sets white_list
     *
     * @param string[] $white_list Белый список адресов от которых письма не будут попадать в спам
     *
     * @return self
     */
    public function setWhiteList($white_list)
    {
        if (is_null($white_list)) {
            throw new \InvalidArgumentException('non-nullable white_list cannot be null');
        }
        $this->container['white_list'] = $white_list;

        return $this;
    }

    /**
     * Gets webmail
     *
     * @return bool
     */
    public function getWebmail()
    {
        return $this->container['webmail'];
    }

    /**
     * Sets webmail
     *
     * @param bool $webmail Доступен ли Webmail
     *
     * @return self
     */
    public function setWebmail($webmail)
    {
        if (is_null($webmail)) {
            throw new \InvalidArgumentException('non-nullable webmail cannot be null');
        }
        $this->container['webmail'] = $webmail;

        return $this;
    }

    /**
     * Gets dovecot
     *
     * @return bool
     */
    public function getDovecot()
    {
        return $this->container['dovecot'];
    }

    /**
     * Sets dovecot
     *
     * @param bool $dovecot Есть ли доступ через dovecot
     *
     * @return self
     */
    public function setDovecot($dovecot)
    {
        if (is_null($dovecot)) {
            throw new \InvalidArgumentException('non-nullable dovecot cannot be null');
        }
        $this->container['dovecot'] = $dovecot;

        return $this;
    }

    /**
     * Gets fqdn
     *
     * @return string
     */
    public function getFqdn()
    {
        return $this->container['fqdn'];
    }

    /**
     * Sets fqdn
     *
     * @param string $fqdn Домен почты
     *
     * @return self
     */
    public function setFqdn($fqdn)
    {
        if (is_null($fqdn)) {
            throw new \InvalidArgumentException('non-nullable fqdn cannot be null');
        }
        $this->container['fqdn'] = $fqdn;

        return $this;
    }

    /**
     * Gets leave_messages
     *
     * @return bool
     */
    public function getLeaveMessages()
    {
        return $this->container['leave_messages'];
    }

    /**
     * Sets leave_messages
     *
     * @param bool $leave_messages Оставлять ли сообщения на сервере при пересылке
     *
     * @return self
     */
    public function setLeaveMessages($leave_messages)
    {
        if (is_null($leave_messages)) {
            throw new \InvalidArgumentException('non-nullable leave_messages cannot be null');
        }
        $this->container['leave_messages'] = $leave_messages;

        return $this;
    }

    /**
     * Gets mailbox
     *
     * @return string
     */
    public function getMailbox()
    {
        return $this->container['mailbox'];
    }

    /**
     * Sets mailbox
     *
     * @param string $mailbox Название почтового ящика
     *
     * @return self
     */
    public function setMailbox($mailbox)
    {
        if (is_null($mailbox)) {
            throw new \InvalidArgumentException('non-nullable mailbox cannot be null');
        }
        $this->container['mailbox'] = $mailbox;

        return $this;
    }

    /**
     * Gets owner_full_name
     *
     * @return string
     */
    public function getOwnerFullName()
    {
        return $this->container['owner_full_name'];
    }

    /**
     * Sets owner_full_name
     *
     * @param string $owner_full_name ФИО владельца почтового ящика
     *
     * @return self
     */
    public function setOwnerFullName($owner_full_name)
    {
        if (is_null($owner_full_name)) {
            throw new \InvalidArgumentException('non-nullable owner_full_name cannot be null');
        }
        $this->container['owner_full_name'] = $owner_full_name;

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


