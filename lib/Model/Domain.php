<?php
/**
 * Domain
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
 * Domain Class Doc Comment
 *
 * @category Class
 * @description Домен
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class Domain implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'domain';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'allowed_buy_periods' => '\OpenAPI\Client\Model\DomainAllowedBuyPeriodsInner[]',
        'days_left' => 'float',
        'domain_status' => 'string',
        'expiration' => 'string',
        'fqdn' => 'string',
        'id' => 'float',
        'is_autoprolong_enabled' => 'bool',
        'is_premium' => 'bool',
        'is_prolong_allowed' => 'bool',
        'is_technical' => 'bool',
        'is_whois_privacy_enabled' => 'bool',
        'linked_ip' => 'string',
        'paid_till' => 'string',
        'person_id' => 'float',
        'premium_prolong_cost' => 'float',
        'provider' => 'string',
        'request_status' => 'string',
        'subdomains' => '\OpenAPI\Client\Model\Subdomain[]',
        'tld_id' => 'float'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'allowed_buy_periods' => null,
        'days_left' => null,
        'domain_status' => null,
        'expiration' => null,
        'fqdn' => null,
        'id' => null,
        'is_autoprolong_enabled' => null,
        'is_premium' => null,
        'is_prolong_allowed' => null,
        'is_technical' => null,
        'is_whois_privacy_enabled' => null,
        'linked_ip' => null,
        'paid_till' => null,
        'person_id' => null,
        'premium_prolong_cost' => null,
        'provider' => null,
        'request_status' => null,
        'subdomains' => null,
        'tld_id' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'allowed_buy_periods' => false,
		'days_left' => false,
		'domain_status' => false,
		'expiration' => false,
		'fqdn' => false,
		'id' => false,
		'is_autoprolong_enabled' => true,
		'is_premium' => false,
		'is_prolong_allowed' => false,
		'is_technical' => false,
		'is_whois_privacy_enabled' => true,
		'linked_ip' => true,
		'paid_till' => true,
		'person_id' => true,
		'premium_prolong_cost' => true,
		'provider' => true,
		'request_status' => true,
		'subdomains' => false,
		'tld_id' => true
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
        'allowed_buy_periods' => 'allowed_buy_periods',
        'days_left' => 'days_left',
        'domain_status' => 'domain_status',
        'expiration' => 'expiration',
        'fqdn' => 'fqdn',
        'id' => 'id',
        'is_autoprolong_enabled' => 'is_autoprolong_enabled',
        'is_premium' => 'is_premium',
        'is_prolong_allowed' => 'is_prolong_allowed',
        'is_technical' => 'is_technical',
        'is_whois_privacy_enabled' => 'is_whois_privacy_enabled',
        'linked_ip' => 'linked_ip',
        'paid_till' => 'paid_till',
        'person_id' => 'person_id',
        'premium_prolong_cost' => 'premium_prolong_cost',
        'provider' => 'provider',
        'request_status' => 'request_status',
        'subdomains' => 'subdomains',
        'tld_id' => 'tld_id'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'allowed_buy_periods' => 'setAllowedBuyPeriods',
        'days_left' => 'setDaysLeft',
        'domain_status' => 'setDomainStatus',
        'expiration' => 'setExpiration',
        'fqdn' => 'setFqdn',
        'id' => 'setId',
        'is_autoprolong_enabled' => 'setIsAutoprolongEnabled',
        'is_premium' => 'setIsPremium',
        'is_prolong_allowed' => 'setIsProlongAllowed',
        'is_technical' => 'setIsTechnical',
        'is_whois_privacy_enabled' => 'setIsWhoisPrivacyEnabled',
        'linked_ip' => 'setLinkedIp',
        'paid_till' => 'setPaidTill',
        'person_id' => 'setPersonId',
        'premium_prolong_cost' => 'setPremiumProlongCost',
        'provider' => 'setProvider',
        'request_status' => 'setRequestStatus',
        'subdomains' => 'setSubdomains',
        'tld_id' => 'setTldId'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'allowed_buy_periods' => 'getAllowedBuyPeriods',
        'days_left' => 'getDaysLeft',
        'domain_status' => 'getDomainStatus',
        'expiration' => 'getExpiration',
        'fqdn' => 'getFqdn',
        'id' => 'getId',
        'is_autoprolong_enabled' => 'getIsAutoprolongEnabled',
        'is_premium' => 'getIsPremium',
        'is_prolong_allowed' => 'getIsProlongAllowed',
        'is_technical' => 'getIsTechnical',
        'is_whois_privacy_enabled' => 'getIsWhoisPrivacyEnabled',
        'linked_ip' => 'getLinkedIp',
        'paid_till' => 'getPaidTill',
        'person_id' => 'getPersonId',
        'premium_prolong_cost' => 'getPremiumProlongCost',
        'provider' => 'getProvider',
        'request_status' => 'getRequestStatus',
        'subdomains' => 'getSubdomains',
        'tld_id' => 'getTldId'
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

    public const DOMAIN_STATUS_AWAITING_PAYMENT = 'awaiting_payment';
    public const DOMAIN_STATUS_EXPIRED = 'expired';
    public const DOMAIN_STATUS_FINAL_EXPIRED = 'final_expired';
    public const DOMAIN_STATUS_FREE = 'free';
    public const DOMAIN_STATUS_NO_PAID = 'no_paid';
    public const DOMAIN_STATUS_NS_BASED = 'ns_based';
    public const DOMAIN_STATUS_PAID = 'paid';
    public const DOMAIN_STATUS_SOON_EXPIRE = 'soon_expire';
    public const DOMAIN_STATUS_TODAY_EXPIRED = 'today_expired';
    public const REQUEST_STATUS_PROLONGATION_FAIL = 'prolongation_fail';
    public const REQUEST_STATUS_PROLONGATION_REQUEST = 'prolongation_request';
    public const REQUEST_STATUS_REGISTRATION_FAIL = 'registration_fail';
    public const REQUEST_STATUS_REGISTRATION_REQUEST = 'registration_request';
    public const REQUEST_STATUS_TRANSFER_FAIL = 'transfer_fail';
    public const REQUEST_STATUS_TRANSFER_REQUEST = 'transfer_request';
    public const REQUEST_STATUS_AWAITING_PERSON = 'awaiting_person';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getDomainStatusAllowableValues()
    {
        return [
            self::DOMAIN_STATUS_AWAITING_PAYMENT,
            self::DOMAIN_STATUS_EXPIRED,
            self::DOMAIN_STATUS_FINAL_EXPIRED,
            self::DOMAIN_STATUS_FREE,
            self::DOMAIN_STATUS_NO_PAID,
            self::DOMAIN_STATUS_NS_BASED,
            self::DOMAIN_STATUS_PAID,
            self::DOMAIN_STATUS_SOON_EXPIRE,
            self::DOMAIN_STATUS_TODAY_EXPIRED,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getRequestStatusAllowableValues()
    {
        return [
            self::REQUEST_STATUS_PROLONGATION_FAIL,
            self::REQUEST_STATUS_PROLONGATION_REQUEST,
            self::REQUEST_STATUS_REGISTRATION_FAIL,
            self::REQUEST_STATUS_REGISTRATION_REQUEST,
            self::REQUEST_STATUS_TRANSFER_FAIL,
            self::REQUEST_STATUS_TRANSFER_REQUEST,
            self::REQUEST_STATUS_AWAITING_PERSON,
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
        $this->setIfExists('allowed_buy_periods', $data ?? [], null);
        $this->setIfExists('days_left', $data ?? [], null);
        $this->setIfExists('domain_status', $data ?? [], null);
        $this->setIfExists('expiration', $data ?? [], null);
        $this->setIfExists('fqdn', $data ?? [], null);
        $this->setIfExists('id', $data ?? [], null);
        $this->setIfExists('is_autoprolong_enabled', $data ?? [], null);
        $this->setIfExists('is_premium', $data ?? [], null);
        $this->setIfExists('is_prolong_allowed', $data ?? [], null);
        $this->setIfExists('is_technical', $data ?? [], null);
        $this->setIfExists('is_whois_privacy_enabled', $data ?? [], null);
        $this->setIfExists('linked_ip', $data ?? [], null);
        $this->setIfExists('paid_till', $data ?? [], null);
        $this->setIfExists('person_id', $data ?? [], null);
        $this->setIfExists('premium_prolong_cost', $data ?? [], null);
        $this->setIfExists('provider', $data ?? [], null);
        $this->setIfExists('request_status', $data ?? [], null);
        $this->setIfExists('subdomains', $data ?? [], null);
        $this->setIfExists('tld_id', $data ?? [], null);
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

        if ($this->container['allowed_buy_periods'] === null) {
            $invalidProperties[] = "'allowed_buy_periods' can't be null";
        }
        if ($this->container['days_left'] === null) {
            $invalidProperties[] = "'days_left' can't be null";
        }
        if ($this->container['domain_status'] === null) {
            $invalidProperties[] = "'domain_status' can't be null";
        }
        $allowedValues = $this->getDomainStatusAllowableValues();
        if (!is_null($this->container['domain_status']) && !in_array($this->container['domain_status'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'domain_status', must be one of '%s'",
                $this->container['domain_status'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['expiration'] === null) {
            $invalidProperties[] = "'expiration' can't be null";
        }
        if ($this->container['fqdn'] === null) {
            $invalidProperties[] = "'fqdn' can't be null";
        }
        if ($this->container['id'] === null) {
            $invalidProperties[] = "'id' can't be null";
        }
        if ($this->container['is_autoprolong_enabled'] === null) {
            $invalidProperties[] = "'is_autoprolong_enabled' can't be null";
        }
        if ($this->container['is_premium'] === null) {
            $invalidProperties[] = "'is_premium' can't be null";
        }
        if ($this->container['is_prolong_allowed'] === null) {
            $invalidProperties[] = "'is_prolong_allowed' can't be null";
        }
        if ($this->container['is_technical'] === null) {
            $invalidProperties[] = "'is_technical' can't be null";
        }
        if ($this->container['is_whois_privacy_enabled'] === null) {
            $invalidProperties[] = "'is_whois_privacy_enabled' can't be null";
        }
        if ($this->container['linked_ip'] === null) {
            $invalidProperties[] = "'linked_ip' can't be null";
        }
        if ($this->container['paid_till'] === null) {
            $invalidProperties[] = "'paid_till' can't be null";
        }
        if ($this->container['person_id'] === null) {
            $invalidProperties[] = "'person_id' can't be null";
        }
        if ($this->container['premium_prolong_cost'] === null) {
            $invalidProperties[] = "'premium_prolong_cost' can't be null";
        }
        if ($this->container['provider'] === null) {
            $invalidProperties[] = "'provider' can't be null";
        }
        if ($this->container['request_status'] === null) {
            $invalidProperties[] = "'request_status' can't be null";
        }
        $allowedValues = $this->getRequestStatusAllowableValues();
        if (!is_null($this->container['request_status']) && !in_array($this->container['request_status'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'request_status', must be one of '%s'",
                $this->container['request_status'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['subdomains'] === null) {
            $invalidProperties[] = "'subdomains' can't be null";
        }
        if ($this->container['tld_id'] === null) {
            $invalidProperties[] = "'tld_id' can't be null";
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
     * Gets allowed_buy_periods
     *
     * @return \OpenAPI\Client\Model\DomainAllowedBuyPeriodsInner[]
     */
    public function getAllowedBuyPeriods()
    {
        return $this->container['allowed_buy_periods'];
    }

    /**
     * Sets allowed_buy_periods
     *
     * @param \OpenAPI\Client\Model\DomainAllowedBuyPeriodsInner[] $allowed_buy_periods Допустимые периоды продления домена.
     *
     * @return self
     */
    public function setAllowedBuyPeriods($allowed_buy_periods)
    {
        if (is_null($allowed_buy_periods)) {
            throw new \InvalidArgumentException('non-nullable allowed_buy_periods cannot be null');
        }
        $this->container['allowed_buy_periods'] = $allowed_buy_periods;

        return $this;
    }

    /**
     * Gets days_left
     *
     * @return float
     */
    public function getDaysLeft()
    {
        return $this->container['days_left'];
    }

    /**
     * Sets days_left
     *
     * @param float $days_left Количество дней, оставшихся до конца срока регистрации домена.
     *
     * @return self
     */
    public function setDaysLeft($days_left)
    {
        if (is_null($days_left)) {
            throw new \InvalidArgumentException('non-nullable days_left cannot be null');
        }
        $this->container['days_left'] = $days_left;

        return $this;
    }

    /**
     * Gets domain_status
     *
     * @return string
     */
    public function getDomainStatus()
    {
        return $this->container['domain_status'];
    }

    /**
     * Sets domain_status
     *
     * @param string $domain_status Статус домена.
     *
     * @return self
     */
    public function setDomainStatus($domain_status)
    {
        if (is_null($domain_status)) {
            throw new \InvalidArgumentException('non-nullable domain_status cannot be null');
        }
        $allowedValues = $this->getDomainStatusAllowableValues();
        if (!in_array($domain_status, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'domain_status', must be one of '%s'",
                    $domain_status,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['domain_status'] = $domain_status;

        return $this;
    }

    /**
     * Gets expiration
     *
     * @return string
     */
    public function getExpiration()
    {
        return $this->container['expiration'];
    }

    /**
     * Sets expiration
     *
     * @param string $expiration Дата окончания срока регистрации домена, для доменов без срока окончания регистрации будет приходить 0000-00-00.
     *
     * @return self
     */
    public function setExpiration($expiration)
    {
        if (is_null($expiration)) {
            throw new \InvalidArgumentException('non-nullable expiration cannot be null');
        }
        $this->container['expiration'] = $expiration;

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
     * @param string $fqdn Полное имя домена.
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
     * @param float $id ID домена.
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
     * Gets is_autoprolong_enabled
     *
     * @return bool
     */
    public function getIsAutoprolongEnabled()
    {
        return $this->container['is_autoprolong_enabled'];
    }

    /**
     * Sets is_autoprolong_enabled
     *
     * @param bool $is_autoprolong_enabled Это логическое значение, которое показывает, включено ли автопродление домена.
     *
     * @return self
     */
    public function setIsAutoprolongEnabled($is_autoprolong_enabled)
    {
        if (is_null($is_autoprolong_enabled)) {
            array_push($this->openAPINullablesSetToNull, 'is_autoprolong_enabled');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('is_autoprolong_enabled', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['is_autoprolong_enabled'] = $is_autoprolong_enabled;

        return $this;
    }

    /**
     * Gets is_premium
     *
     * @return bool
     */
    public function getIsPremium()
    {
        return $this->container['is_premium'];
    }

    /**
     * Sets is_premium
     *
     * @param bool $is_premium Это логическое значение, которое показывает, является ли домен премиальным.
     *
     * @return self
     */
    public function setIsPremium($is_premium)
    {
        if (is_null($is_premium)) {
            throw new \InvalidArgumentException('non-nullable is_premium cannot be null');
        }
        $this->container['is_premium'] = $is_premium;

        return $this;
    }

    /**
     * Gets is_prolong_allowed
     *
     * @return bool
     */
    public function getIsProlongAllowed()
    {
        return $this->container['is_prolong_allowed'];
    }

    /**
     * Sets is_prolong_allowed
     *
     * @param bool $is_prolong_allowed Это логическое значение, которое показывает, можно ли сейчас продлить домен.
     *
     * @return self
     */
    public function setIsProlongAllowed($is_prolong_allowed)
    {
        if (is_null($is_prolong_allowed)) {
            throw new \InvalidArgumentException('non-nullable is_prolong_allowed cannot be null');
        }
        $this->container['is_prolong_allowed'] = $is_prolong_allowed;

        return $this;
    }

    /**
     * Gets is_technical
     *
     * @return bool
     */
    public function getIsTechnical()
    {
        return $this->container['is_technical'];
    }

    /**
     * Sets is_technical
     *
     * @param bool $is_technical Это логическое значение, которое показывает, является ли домен техническим.
     *
     * @return self
     */
    public function setIsTechnical($is_technical)
    {
        if (is_null($is_technical)) {
            throw new \InvalidArgumentException('non-nullable is_technical cannot be null');
        }
        $this->container['is_technical'] = $is_technical;

        return $this;
    }

    /**
     * Gets is_whois_privacy_enabled
     *
     * @return bool
     */
    public function getIsWhoisPrivacyEnabled()
    {
        return $this->container['is_whois_privacy_enabled'];
    }

    /**
     * Sets is_whois_privacy_enabled
     *
     * @param bool $is_whois_privacy_enabled Это логическое значение, которое показывает, включено ли скрытие данных администратора домена для whois. Если приходит null, значит для данной зоны эта услуга не доступна.
     *
     * @return self
     */
    public function setIsWhoisPrivacyEnabled($is_whois_privacy_enabled)
    {
        if (is_null($is_whois_privacy_enabled)) {
            array_push($this->openAPINullablesSetToNull, 'is_whois_privacy_enabled');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('is_whois_privacy_enabled', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['is_whois_privacy_enabled'] = $is_whois_privacy_enabled;

        return $this;
    }

    /**
     * Gets linked_ip
     *
     * @return string
     */
    public function getLinkedIp()
    {
        return $this->container['linked_ip'];
    }

    /**
     * Sets linked_ip
     *
     * @param string $linked_ip Привязанный к домену IP-адрес.
     *
     * @return self
     */
    public function setLinkedIp($linked_ip)
    {
        if (is_null($linked_ip)) {
            array_push($this->openAPINullablesSetToNull, 'linked_ip');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('linked_ip', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['linked_ip'] = $linked_ip;

        return $this;
    }

    /**
     * Gets paid_till
     *
     * @return string
     */
    public function getPaidTill()
    {
        return $this->container['paid_till'];
    }

    /**
     * Sets paid_till
     *
     * @param string $paid_till До какого числа оплачен домен.
     *
     * @return self
     */
    public function setPaidTill($paid_till)
    {
        if (is_null($paid_till)) {
            array_push($this->openAPINullablesSetToNull, 'paid_till');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('paid_till', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['paid_till'] = $paid_till;

        return $this;
    }

    /**
     * Gets person_id
     *
     * @return float
     */
    public function getPersonId()
    {
        return $this->container['person_id'];
    }

    /**
     * Sets person_id
     *
     * @param float $person_id ID администратора, на которого зарегистрирован домен.
     *
     * @return self
     */
    public function setPersonId($person_id)
    {
        if (is_null($person_id)) {
            array_push($this->openAPINullablesSetToNull, 'person_id');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('person_id', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['person_id'] = $person_id;

        return $this;
    }

    /**
     * Gets premium_prolong_cost
     *
     * @return float
     */
    public function getPremiumProlongCost()
    {
        return $this->container['premium_prolong_cost'];
    }

    /**
     * Sets premium_prolong_cost
     *
     * @param float $premium_prolong_cost Стоимость премиального домена.
     *
     * @return self
     */
    public function setPremiumProlongCost($premium_prolong_cost)
    {
        if (is_null($premium_prolong_cost)) {
            array_push($this->openAPINullablesSetToNull, 'premium_prolong_cost');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('premium_prolong_cost', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['premium_prolong_cost'] = $premium_prolong_cost;

        return $this;
    }

    /**
     * Gets provider
     *
     * @return string
     */
    public function getProvider()
    {
        return $this->container['provider'];
    }

    /**
     * Sets provider
     *
     * @param string $provider ID регистратора домена.
     *
     * @return self
     */
    public function setProvider($provider)
    {
        if (is_null($provider)) {
            array_push($this->openAPINullablesSetToNull, 'provider');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('provider', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['provider'] = $provider;

        return $this;
    }

    /**
     * Gets request_status
     *
     * @return string
     */
    public function getRequestStatus()
    {
        return $this->container['request_status'];
    }

    /**
     * Sets request_status
     *
     * @param string $request_status Статус заявки на продление/регистрацию/трансфер домена.
     *
     * @return self
     */
    public function setRequestStatus($request_status)
    {
        if (is_null($request_status)) {
            array_push($this->openAPINullablesSetToNull, 'request_status');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('request_status', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $allowedValues = $this->getRequestStatusAllowableValues();
        if (!is_null($request_status) && !in_array($request_status, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'request_status', must be one of '%s'",
                    $request_status,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['request_status'] = $request_status;

        return $this;
    }

    /**
     * Gets subdomains
     *
     * @return \OpenAPI\Client\Model\Subdomain[]
     */
    public function getSubdomains()
    {
        return $this->container['subdomains'];
    }

    /**
     * Sets subdomains
     *
     * @param \OpenAPI\Client\Model\Subdomain[] $subdomains Список поддоменов.
     *
     * @return self
     */
    public function setSubdomains($subdomains)
    {
        if (is_null($subdomains)) {
            throw new \InvalidArgumentException('non-nullable subdomains cannot be null');
        }
        $this->container['subdomains'] = $subdomains;

        return $this;
    }

    /**
     * Gets tld_id
     *
     * @return float
     */
    public function getTldId()
    {
        return $this->container['tld_id'];
    }

    /**
     * Sets tld_id
     *
     * @param float $tld_id ID доменной зоны.
     *
     * @return self
     */
    public function setTldId($tld_id)
    {
        if (is_null($tld_id)) {
            array_push($this->openAPINullablesSetToNull, 'tld_id');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('tld_id', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['tld_id'] = $tld_id;

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


