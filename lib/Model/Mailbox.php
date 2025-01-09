<?php
/**
 * Mailbox
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
 * Mailbox Class Doc Comment
 *
 * @category Class
 * @description Почтовый ящик
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class Mailbox implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'mailbox';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'auto_reply' => '\OpenAPI\Client\Model\MailboxAutoReply',
        'spam_filter' => '\OpenAPI\Client\Model\MailboxSpamFilter',
        'forwarding_incoming' => '\OpenAPI\Client\Model\MailboxForwardingIncoming',
        'forwarding_outgoing' => '\OpenAPI\Client\Model\MailboxForwardingOutgoing',
        'comment' => 'string',
        'fqdn' => 'string',
        'mailbox' => 'string',
        'password' => 'string',
        'usage_space' => 'float',
        'is_webmail' => 'bool',
        'idn_name' => 'string',
        'is_dovecot' => 'bool'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'auto_reply' => null,
        'spam_filter' => null,
        'forwarding_incoming' => null,
        'forwarding_outgoing' => null,
        'comment' => null,
        'fqdn' => null,
        'mailbox' => null,
        'password' => null,
        'usage_space' => null,
        'is_webmail' => null,
        'idn_name' => null,
        'is_dovecot' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'auto_reply' => false,
		'spam_filter' => false,
		'forwarding_incoming' => false,
		'forwarding_outgoing' => false,
		'comment' => false,
		'fqdn' => false,
		'mailbox' => false,
		'password' => false,
		'usage_space' => false,
		'is_webmail' => false,
		'idn_name' => false,
		'is_dovecot' => false
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
        'auto_reply' => 'auto_reply',
        'spam_filter' => 'spam_filter',
        'forwarding_incoming' => 'forwarding_incoming',
        'forwarding_outgoing' => 'forwarding_outgoing',
        'comment' => 'comment',
        'fqdn' => 'fqdn',
        'mailbox' => 'mailbox',
        'password' => 'password',
        'usage_space' => 'usage_space',
        'is_webmail' => 'is_webmail',
        'idn_name' => 'idn_name',
        'is_dovecot' => 'is_dovecot'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'auto_reply' => 'setAutoReply',
        'spam_filter' => 'setSpamFilter',
        'forwarding_incoming' => 'setForwardingIncoming',
        'forwarding_outgoing' => 'setForwardingOutgoing',
        'comment' => 'setComment',
        'fqdn' => 'setFqdn',
        'mailbox' => 'setMailbox',
        'password' => 'setPassword',
        'usage_space' => 'setUsageSpace',
        'is_webmail' => 'setIsWebmail',
        'idn_name' => 'setIdnName',
        'is_dovecot' => 'setIsDovecot'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'auto_reply' => 'getAutoReply',
        'spam_filter' => 'getSpamFilter',
        'forwarding_incoming' => 'getForwardingIncoming',
        'forwarding_outgoing' => 'getForwardingOutgoing',
        'comment' => 'getComment',
        'fqdn' => 'getFqdn',
        'mailbox' => 'getMailbox',
        'password' => 'getPassword',
        'usage_space' => 'getUsageSpace',
        'is_webmail' => 'getIsWebmail',
        'idn_name' => 'getIdnName',
        'is_dovecot' => 'getIsDovecot'
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
        $this->setIfExists('auto_reply', $data ?? [], null);
        $this->setIfExists('spam_filter', $data ?? [], null);
        $this->setIfExists('forwarding_incoming', $data ?? [], null);
        $this->setIfExists('forwarding_outgoing', $data ?? [], null);
        $this->setIfExists('comment', $data ?? [], null);
        $this->setIfExists('fqdn', $data ?? [], null);
        $this->setIfExists('mailbox', $data ?? [], null);
        $this->setIfExists('password', $data ?? [], null);
        $this->setIfExists('usage_space', $data ?? [], null);
        $this->setIfExists('is_webmail', $data ?? [], null);
        $this->setIfExists('idn_name', $data ?? [], null);
        $this->setIfExists('is_dovecot', $data ?? [], null);
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

        if ($this->container['auto_reply'] === null) {
            $invalidProperties[] = "'auto_reply' can't be null";
        }
        if ($this->container['spam_filter'] === null) {
            $invalidProperties[] = "'spam_filter' can't be null";
        }
        if ($this->container['forwarding_incoming'] === null) {
            $invalidProperties[] = "'forwarding_incoming' can't be null";
        }
        if ($this->container['forwarding_outgoing'] === null) {
            $invalidProperties[] = "'forwarding_outgoing' can't be null";
        }
        if ($this->container['comment'] === null) {
            $invalidProperties[] = "'comment' can't be null";
        }
        if ($this->container['fqdn'] === null) {
            $invalidProperties[] = "'fqdn' can't be null";
        }
        if ($this->container['mailbox'] === null) {
            $invalidProperties[] = "'mailbox' can't be null";
        }
        if ($this->container['password'] === null) {
            $invalidProperties[] = "'password' can't be null";
        }
        if ($this->container['usage_space'] === null) {
            $invalidProperties[] = "'usage_space' can't be null";
        }
        if ($this->container['is_webmail'] === null) {
            $invalidProperties[] = "'is_webmail' can't be null";
        }
        if ($this->container['idn_name'] === null) {
            $invalidProperties[] = "'idn_name' can't be null";
        }
        if ($this->container['is_dovecot'] === null) {
            $invalidProperties[] = "'is_dovecot' can't be null";
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
     * Gets auto_reply
     *
     * @return \OpenAPI\Client\Model\MailboxAutoReply
     */
    public function getAutoReply()
    {
        return $this->container['auto_reply'];
    }

    /**
     * Sets auto_reply
     *
     * @param \OpenAPI\Client\Model\MailboxAutoReply $auto_reply auto_reply
     *
     * @return self
     */
    public function setAutoReply($auto_reply)
    {
        if (is_null($auto_reply)) {
            throw new \InvalidArgumentException('non-nullable auto_reply cannot be null');
        }
        $this->container['auto_reply'] = $auto_reply;

        return $this;
    }

    /**
     * Gets spam_filter
     *
     * @return \OpenAPI\Client\Model\MailboxSpamFilter
     */
    public function getSpamFilter()
    {
        return $this->container['spam_filter'];
    }

    /**
     * Sets spam_filter
     *
     * @param \OpenAPI\Client\Model\MailboxSpamFilter $spam_filter spam_filter
     *
     * @return self
     */
    public function setSpamFilter($spam_filter)
    {
        if (is_null($spam_filter)) {
            throw new \InvalidArgumentException('non-nullable spam_filter cannot be null');
        }
        $this->container['spam_filter'] = $spam_filter;

        return $this;
    }

    /**
     * Gets forwarding_incoming
     *
     * @return \OpenAPI\Client\Model\MailboxForwardingIncoming
     */
    public function getForwardingIncoming()
    {
        return $this->container['forwarding_incoming'];
    }

    /**
     * Sets forwarding_incoming
     *
     * @param \OpenAPI\Client\Model\MailboxForwardingIncoming $forwarding_incoming forwarding_incoming
     *
     * @return self
     */
    public function setForwardingIncoming($forwarding_incoming)
    {
        if (is_null($forwarding_incoming)) {
            throw new \InvalidArgumentException('non-nullable forwarding_incoming cannot be null');
        }
        $this->container['forwarding_incoming'] = $forwarding_incoming;

        return $this;
    }

    /**
     * Gets forwarding_outgoing
     *
     * @return \OpenAPI\Client\Model\MailboxForwardingOutgoing
     */
    public function getForwardingOutgoing()
    {
        return $this->container['forwarding_outgoing'];
    }

    /**
     * Sets forwarding_outgoing
     *
     * @param \OpenAPI\Client\Model\MailboxForwardingOutgoing $forwarding_outgoing forwarding_outgoing
     *
     * @return self
     */
    public function setForwardingOutgoing($forwarding_outgoing)
    {
        if (is_null($forwarding_outgoing)) {
            throw new \InvalidArgumentException('non-nullable forwarding_outgoing cannot be null');
        }
        $this->container['forwarding_outgoing'] = $forwarding_outgoing;

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
     * @param string $password Пароль почтового ящика
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
     * Gets usage_space
     *
     * @return float
     */
    public function getUsageSpace()
    {
        return $this->container['usage_space'];
    }

    /**
     * Sets usage_space
     *
     * @param float $usage_space Использованное место на почтовом ящике (в Мб)
     *
     * @return self
     */
    public function setUsageSpace($usage_space)
    {
        if (is_null($usage_space)) {
            throw new \InvalidArgumentException('non-nullable usage_space cannot be null');
        }
        $this->container['usage_space'] = $usage_space;

        return $this;
    }

    /**
     * Gets is_webmail
     *
     * @return bool
     */
    public function getIsWebmail()
    {
        return $this->container['is_webmail'];
    }

    /**
     * Sets is_webmail
     *
     * @param bool $is_webmail Доступен ли Webmail
     *
     * @return self
     */
    public function setIsWebmail($is_webmail)
    {
        if (is_null($is_webmail)) {
            throw new \InvalidArgumentException('non-nullable is_webmail cannot be null');
        }
        $this->container['is_webmail'] = $is_webmail;

        return $this;
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
     * Gets is_dovecot
     *
     * @return bool
     */
    public function getIsDovecot()
    {
        return $this->container['is_dovecot'];
    }

    /**
     * Sets is_dovecot
     *
     * @param bool $is_dovecot Есть ли доступ через dovecot
     *
     * @return self
     */
    public function setIsDovecot($is_dovecot)
    {
        if (is_null($is_dovecot)) {
            throw new \InvalidArgumentException('non-nullable is_dovecot cannot be null');
        }
        $this->container['is_dovecot'] = $is_dovecot;

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


