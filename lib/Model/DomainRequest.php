<?php
/**
 * DomainRequest
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
 * The version of the OpenAPI document: 
 * Contact: info@timeweb.cloud
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 7.0.0-SNAPSHOT
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
 * DomainRequest Class Doc Comment
 *
 * @category Class
 * @description Заявка на продление/регистрацию/трансфер домена.
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class DomainRequest implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'domain-request';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'account_id' => 'string',
        'auth_code' => 'string',
        'date' => '\DateTime',
        'domain_bundle_id' => 'string',
        'error_code_transfer' => 'string',
        'fqdn' => 'string',
        'group_id' => 'float',
        'id' => 'float',
        'is_antispam_enabled' => 'bool',
        'is_autoprolong_enabled' => 'bool',
        'is_whois_privacy_enabled' => 'bool',
        'message' => 'string',
        'money_source' => 'string',
        'period' => '\OpenAPI\Client\Model\DomainPaymentPeriod',
        'person_id' => 'float',
        'prime' => '\OpenAPI\Client\Model\DomainPrimeType',
        'soon_expire' => 'float',
        'sort_order' => 'float',
        'type' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'account_id' => null,
        'auth_code' => null,
        'date' => 'date-time',
        'domain_bundle_id' => null,
        'error_code_transfer' => null,
        'fqdn' => null,
        'group_id' => null,
        'id' => null,
        'is_antispam_enabled' => null,
        'is_autoprolong_enabled' => null,
        'is_whois_privacy_enabled' => null,
        'message' => null,
        'money_source' => null,
        'period' => null,
        'person_id' => null,
        'prime' => null,
        'soon_expire' => null,
        'sort_order' => null,
        'type' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'account_id' => false,
		'auth_code' => true,
		'date' => false,
		'domain_bundle_id' => true,
		'error_code_transfer' => true,
		'fqdn' => false,
		'group_id' => false,
		'id' => false,
		'is_antispam_enabled' => false,
		'is_autoprolong_enabled' => false,
		'is_whois_privacy_enabled' => false,
		'message' => true,
		'money_source' => true,
		'period' => false,
		'person_id' => false,
		'prime' => true,
		'soon_expire' => false,
		'sort_order' => false,
		'type' => false
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
        'account_id' => 'account_id',
        'auth_code' => 'auth_code',
        'date' => 'date',
        'domain_bundle_id' => 'domain_bundle_id',
        'error_code_transfer' => 'error_code_transfer',
        'fqdn' => 'fqdn',
        'group_id' => 'group_id',
        'id' => 'id',
        'is_antispam_enabled' => 'is_antispam_enabled',
        'is_autoprolong_enabled' => 'is_autoprolong_enabled',
        'is_whois_privacy_enabled' => 'is_whois_privacy_enabled',
        'message' => 'message',
        'money_source' => 'money_source',
        'period' => 'period',
        'person_id' => 'person_id',
        'prime' => 'prime',
        'soon_expire' => 'soon_expire',
        'sort_order' => 'sort_order',
        'type' => 'type'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'account_id' => 'setAccountId',
        'auth_code' => 'setAuthCode',
        'date' => 'setDate',
        'domain_bundle_id' => 'setDomainBundleId',
        'error_code_transfer' => 'setErrorCodeTransfer',
        'fqdn' => 'setFqdn',
        'group_id' => 'setGroupId',
        'id' => 'setId',
        'is_antispam_enabled' => 'setIsAntispamEnabled',
        'is_autoprolong_enabled' => 'setIsAutoprolongEnabled',
        'is_whois_privacy_enabled' => 'setIsWhoisPrivacyEnabled',
        'message' => 'setMessage',
        'money_source' => 'setMoneySource',
        'period' => 'setPeriod',
        'person_id' => 'setPersonId',
        'prime' => 'setPrime',
        'soon_expire' => 'setSoonExpire',
        'sort_order' => 'setSortOrder',
        'type' => 'setType'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'account_id' => 'getAccountId',
        'auth_code' => 'getAuthCode',
        'date' => 'getDate',
        'domain_bundle_id' => 'getDomainBundleId',
        'error_code_transfer' => 'getErrorCodeTransfer',
        'fqdn' => 'getFqdn',
        'group_id' => 'getGroupId',
        'id' => 'getId',
        'is_antispam_enabled' => 'getIsAntispamEnabled',
        'is_autoprolong_enabled' => 'getIsAutoprolongEnabled',
        'is_whois_privacy_enabled' => 'getIsWhoisPrivacyEnabled',
        'message' => 'getMessage',
        'money_source' => 'getMoneySource',
        'period' => 'getPeriod',
        'person_id' => 'getPersonId',
        'prime' => 'getPrime',
        'soon_expire' => 'getSoonExpire',
        'sort_order' => 'getSortOrder',
        'type' => 'getType'
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

    public const MONEY_SOURCE__USE = 'use';
    public const MONEY_SOURCE_BONUS = 'bonus';
    public const MONEY_SOURCE_INVOICE = 'invoice';
    public const TYPE_REQUEST = 'request';
    public const TYPE_PROLONG = 'prolong';
    public const TYPE_TRANSFER = 'transfer';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getMoneySourceAllowableValues()
    {
        return [
            self::MONEY_SOURCE__USE,
            self::MONEY_SOURCE_BONUS,
            self::MONEY_SOURCE_INVOICE,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getTypeAllowableValues()
    {
        return [
            self::TYPE_REQUEST,
            self::TYPE_PROLONG,
            self::TYPE_TRANSFER,
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
        $this->setIfExists('account_id', $data ?? [], null);
        $this->setIfExists('auth_code', $data ?? [], null);
        $this->setIfExists('date', $data ?? [], null);
        $this->setIfExists('domain_bundle_id', $data ?? [], null);
        $this->setIfExists('error_code_transfer', $data ?? [], null);
        $this->setIfExists('fqdn', $data ?? [], null);
        $this->setIfExists('group_id', $data ?? [], null);
        $this->setIfExists('id', $data ?? [], null);
        $this->setIfExists('is_antispam_enabled', $data ?? [], null);
        $this->setIfExists('is_autoprolong_enabled', $data ?? [], null);
        $this->setIfExists('is_whois_privacy_enabled', $data ?? [], null);
        $this->setIfExists('message', $data ?? [], null);
        $this->setIfExists('money_source', $data ?? [], null);
        $this->setIfExists('period', $data ?? [], null);
        $this->setIfExists('person_id', $data ?? [], null);
        $this->setIfExists('prime', $data ?? [], null);
        $this->setIfExists('soon_expire', $data ?? [], null);
        $this->setIfExists('sort_order', $data ?? [], null);
        $this->setIfExists('type', $data ?? [], null);
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

        if ($this->container['account_id'] === null) {
            $invalidProperties[] = "'account_id' can't be null";
        }
        if ($this->container['auth_code'] === null) {
            $invalidProperties[] = "'auth_code' can't be null";
        }
        if ($this->container['date'] === null) {
            $invalidProperties[] = "'date' can't be null";
        }
        if ($this->container['domain_bundle_id'] === null) {
            $invalidProperties[] = "'domain_bundle_id' can't be null";
        }
        if ($this->container['error_code_transfer'] === null) {
            $invalidProperties[] = "'error_code_transfer' can't be null";
        }
        if ($this->container['fqdn'] === null) {
            $invalidProperties[] = "'fqdn' can't be null";
        }
        if ($this->container['group_id'] === null) {
            $invalidProperties[] = "'group_id' can't be null";
        }
        if ($this->container['id'] === null) {
            $invalidProperties[] = "'id' can't be null";
        }
        if ($this->container['is_antispam_enabled'] === null) {
            $invalidProperties[] = "'is_antispam_enabled' can't be null";
        }
        if ($this->container['is_autoprolong_enabled'] === null) {
            $invalidProperties[] = "'is_autoprolong_enabled' can't be null";
        }
        if ($this->container['is_whois_privacy_enabled'] === null) {
            $invalidProperties[] = "'is_whois_privacy_enabled' can't be null";
        }
        if ($this->container['message'] === null) {
            $invalidProperties[] = "'message' can't be null";
        }
        if ($this->container['money_source'] === null) {
            $invalidProperties[] = "'money_source' can't be null";
        }
        $allowedValues = $this->getMoneySourceAllowableValues();
        if (!is_null($this->container['money_source']) && !in_array($this->container['money_source'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'money_source', must be one of '%s'",
                $this->container['money_source'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['period'] === null) {
            $invalidProperties[] = "'period' can't be null";
        }
        if ($this->container['person_id'] === null) {
            $invalidProperties[] = "'person_id' can't be null";
        }
        if ($this->container['prime'] === null) {
            $invalidProperties[] = "'prime' can't be null";
        }
        if ($this->container['soon_expire'] === null) {
            $invalidProperties[] = "'soon_expire' can't be null";
        }
        if ($this->container['sort_order'] === null) {
            $invalidProperties[] = "'sort_order' can't be null";
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
     * Gets account_id
     *
     * @return string
     */
    public function getAccountId()
    {
        return $this->container['account_id'];
    }

    /**
     * Sets account_id
     *
     * @param string $account_id Идентификатор пользователя
     *
     * @return self
     */
    public function setAccountId($account_id)
    {
        if (is_null($account_id)) {
            throw new \InvalidArgumentException('non-nullable account_id cannot be null');
        }
        $this->container['account_id'] = $account_id;

        return $this;
    }

    /**
     * Gets auth_code
     *
     * @return string
     */
    public function getAuthCode()
    {
        return $this->container['auth_code'];
    }

    /**
     * Sets auth_code
     *
     * @param string $auth_code Код авторизации для переноса домена.
     *
     * @return self
     */
    public function setAuthCode($auth_code)
    {
        if (is_null($auth_code)) {
            array_push($this->openAPINullablesSetToNull, 'auth_code');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('auth_code', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['auth_code'] = $auth_code;

        return $this;
    }

    /**
     * Gets date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->container['date'];
    }

    /**
     * Sets date
     *
     * @param \DateTime $date Дата создания заявки.
     *
     * @return self
     */
    public function setDate($date)
    {
        if (is_null($date)) {
            throw new \InvalidArgumentException('non-nullable date cannot be null');
        }
        $this->container['date'] = $date;

        return $this;
    }

    /**
     * Gets domain_bundle_id
     *
     * @return string
     */
    public function getDomainBundleId()
    {
        return $this->container['domain_bundle_id'];
    }

    /**
     * Sets domain_bundle_id
     *
     * @param string $domain_bundle_id Идентификационный номер бандла, в который входит данная заявка (null - если заявка не входит ни в один бандл).
     *
     * @return self
     */
    public function setDomainBundleId($domain_bundle_id)
    {
        if (is_null($domain_bundle_id)) {
            array_push($this->openAPINullablesSetToNull, 'domain_bundle_id');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('domain_bundle_id', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['domain_bundle_id'] = $domain_bundle_id;

        return $this;
    }

    /**
     * Gets error_code_transfer
     *
     * @return string
     */
    public function getErrorCodeTransfer()
    {
        return $this->container['error_code_transfer'];
    }

    /**
     * Sets error_code_transfer
     *
     * @param string $error_code_transfer Код ошибки трансфера домена.
     *
     * @return self
     */
    public function setErrorCodeTransfer($error_code_transfer)
    {
        if (is_null($error_code_transfer)) {
            array_push($this->openAPINullablesSetToNull, 'error_code_transfer');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('error_code_transfer', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['error_code_transfer'] = $error_code_transfer;

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
     * Gets group_id
     *
     * @return float
     */
    public function getGroupId()
    {
        return $this->container['group_id'];
    }

    /**
     * Sets group_id
     *
     * @param float $group_id Идентификатор группы доменных зон.
     *
     * @return self
     */
    public function setGroupId($group_id)
    {
        if (is_null($group_id)) {
            throw new \InvalidArgumentException('non-nullable group_id cannot be null');
        }
        $this->container['group_id'] = $group_id;

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
     * @param float $id Идентификатор заявки.
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
     * Gets is_antispam_enabled
     *
     * @return bool
     */
    public function getIsAntispamEnabled()
    {
        return $this->container['is_antispam_enabled'];
    }

    /**
     * Sets is_antispam_enabled
     *
     * @param bool $is_antispam_enabled Это логическое значение, которое показывает включена ли услуга \"Антиспам\" для домена
     *
     * @return self
     */
    public function setIsAntispamEnabled($is_antispam_enabled)
    {
        if (is_null($is_antispam_enabled)) {
            throw new \InvalidArgumentException('non-nullable is_antispam_enabled cannot be null');
        }
        $this->container['is_antispam_enabled'] = $is_antispam_enabled;

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
            throw new \InvalidArgumentException('non-nullable is_autoprolong_enabled cannot be null');
        }
        $this->container['is_autoprolong_enabled'] = $is_autoprolong_enabled;

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
     * @param bool $is_whois_privacy_enabled Это логическое значение, которое показывает, включено ли скрытие данных администратора домена для whois. Опция недоступна для доменов в зонах .ru и .рф.
     *
     * @return self
     */
    public function setIsWhoisPrivacyEnabled($is_whois_privacy_enabled)
    {
        if (is_null($is_whois_privacy_enabled)) {
            throw new \InvalidArgumentException('non-nullable is_whois_privacy_enabled cannot be null');
        }
        $this->container['is_whois_privacy_enabled'] = $is_whois_privacy_enabled;

        return $this;
    }

    /**
     * Gets message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->container['message'];
    }

    /**
     * Sets message
     *
     * @param string $message Информационное сообщение о заявке.
     *
     * @return self
     */
    public function setMessage($message)
    {
        if (is_null($message)) {
            array_push($this->openAPINullablesSetToNull, 'message');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('message', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['message'] = $message;

        return $this;
    }

    /**
     * Gets money_source
     *
     * @return string
     */
    public function getMoneySource()
    {
        return $this->container['money_source'];
    }

    /**
     * Sets money_source
     *
     * @param string $money_source Источник (способ) оплаты заявки.
     *
     * @return self
     */
    public function setMoneySource($money_source)
    {
        if (is_null($money_source)) {
            array_push($this->openAPINullablesSetToNull, 'money_source');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('money_source', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $allowedValues = $this->getMoneySourceAllowableValues();
        if (!is_null($money_source) && !in_array($money_source, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'money_source', must be one of '%s'",
                    $money_source,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['money_source'] = $money_source;

        return $this;
    }

    /**
     * Gets period
     *
     * @return \OpenAPI\Client\Model\DomainPaymentPeriod
     */
    public function getPeriod()
    {
        return $this->container['period'];
    }

    /**
     * Sets period
     *
     * @param \OpenAPI\Client\Model\DomainPaymentPeriod $period period
     *
     * @return self
     */
    public function setPeriod($period)
    {
        if (is_null($period)) {
            throw new \InvalidArgumentException('non-nullable period cannot be null');
        }
        $this->container['period'] = $period;

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
     * @param float $person_id Идентификационный номер персоны для заявки на регистрацию.
     *
     * @return self
     */
    public function setPersonId($person_id)
    {
        if (is_null($person_id)) {
            throw new \InvalidArgumentException('non-nullable person_id cannot be null');
        }
        $this->container['person_id'] = $person_id;

        return $this;
    }

    /**
     * Gets prime
     *
     * @return \OpenAPI\Client\Model\DomainPrimeType
     */
    public function getPrime()
    {
        return $this->container['prime'];
    }

    /**
     * Sets prime
     *
     * @param \OpenAPI\Client\Model\DomainPrimeType $prime prime
     *
     * @return self
     */
    public function setPrime($prime)
    {
        if (is_null($prime)) {
            array_push($this->openAPINullablesSetToNull, 'prime');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('prime', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['prime'] = $prime;

        return $this;
    }

    /**
     * Gets soon_expire
     *
     * @return float
     */
    public function getSoonExpire()
    {
        return $this->container['soon_expire'];
    }

    /**
     * Sets soon_expire
     *
     * @param float $soon_expire Количество дней до конца регистрации домена, за которые мы уведомим о необходимости продления.
     *
     * @return self
     */
    public function setSoonExpire($soon_expire)
    {
        if (is_null($soon_expire)) {
            throw new \InvalidArgumentException('non-nullable soon_expire cannot be null');
        }
        $this->container['soon_expire'] = $soon_expire;

        return $this;
    }

    /**
     * Gets sort_order
     *
     * @return float
     */
    public function getSortOrder()
    {
        return $this->container['sort_order'];
    }

    /**
     * Sets sort_order
     *
     * @param float $sort_order Это значение используется для сортировки доменных зон в панели управления.
     *
     * @return self
     */
    public function setSortOrder($sort_order)
    {
        if (is_null($sort_order)) {
            throw new \InvalidArgumentException('non-nullable sort_order cannot be null');
        }
        $this->container['sort_order'] = $sort_order;

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
     * @param string $type Тип заявки.
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


