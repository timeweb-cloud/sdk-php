<?php
/**
 * Finances
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
 * Finances Class Doc Comment
 *
 * @category Class
 * @description Платежная информация
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class Finances implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'finances';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'balance' => 'float',
        'currency' => 'string',
        'discount_end_date_at' => 'string',
        'discount_percent' => 'float',
        'hourly_cost' => 'float',
        'hourly_fee' => 'float',
        'monthly_cost' => 'float',
        'monthly_fee' => 'float',
        'total_paid' => 'float',
        'hours_left' => 'float',
        'autopay_card_info' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'balance' => null,
        'currency' => null,
        'discount_end_date_at' => null,
        'discount_percent' => null,
        'hourly_cost' => null,
        'hourly_fee' => null,
        'monthly_cost' => null,
        'monthly_fee' => null,
        'total_paid' => null,
        'hours_left' => null,
        'autopay_card_info' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'balance' => false,
		'currency' => false,
		'discount_end_date_at' => true,
		'discount_percent' => false,
		'hourly_cost' => false,
		'hourly_fee' => false,
		'monthly_cost' => false,
		'monthly_fee' => false,
		'total_paid' => false,
		'hours_left' => true,
		'autopay_card_info' => true
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
        'balance' => 'balance',
        'currency' => 'currency',
        'discount_end_date_at' => 'discount_end_date_at',
        'discount_percent' => 'discount_percent',
        'hourly_cost' => 'hourly_cost',
        'hourly_fee' => 'hourly_fee',
        'monthly_cost' => 'monthly_cost',
        'monthly_fee' => 'monthly_fee',
        'total_paid' => 'total_paid',
        'hours_left' => 'hours_left',
        'autopay_card_info' => 'autopay_card_info'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'balance' => 'setBalance',
        'currency' => 'setCurrency',
        'discount_end_date_at' => 'setDiscountEndDateAt',
        'discount_percent' => 'setDiscountPercent',
        'hourly_cost' => 'setHourlyCost',
        'hourly_fee' => 'setHourlyFee',
        'monthly_cost' => 'setMonthlyCost',
        'monthly_fee' => 'setMonthlyFee',
        'total_paid' => 'setTotalPaid',
        'hours_left' => 'setHoursLeft',
        'autopay_card_info' => 'setAutopayCardInfo'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'balance' => 'getBalance',
        'currency' => 'getCurrency',
        'discount_end_date_at' => 'getDiscountEndDateAt',
        'discount_percent' => 'getDiscountPercent',
        'hourly_cost' => 'getHourlyCost',
        'hourly_fee' => 'getHourlyFee',
        'monthly_cost' => 'getMonthlyCost',
        'monthly_fee' => 'getMonthlyFee',
        'total_paid' => 'getTotalPaid',
        'hours_left' => 'getHoursLeft',
        'autopay_card_info' => 'getAutopayCardInfo'
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
        $this->setIfExists('balance', $data ?? [], null);
        $this->setIfExists('currency', $data ?? [], null);
        $this->setIfExists('discount_end_date_at', $data ?? [], null);
        $this->setIfExists('discount_percent', $data ?? [], null);
        $this->setIfExists('hourly_cost', $data ?? [], null);
        $this->setIfExists('hourly_fee', $data ?? [], null);
        $this->setIfExists('monthly_cost', $data ?? [], null);
        $this->setIfExists('monthly_fee', $data ?? [], null);
        $this->setIfExists('total_paid', $data ?? [], null);
        $this->setIfExists('hours_left', $data ?? [], null);
        $this->setIfExists('autopay_card_info', $data ?? [], null);
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

        if ($this->container['balance'] === null) {
            $invalidProperties[] = "'balance' can't be null";
        }
        if ($this->container['currency'] === null) {
            $invalidProperties[] = "'currency' can't be null";
        }
        if ($this->container['discount_end_date_at'] === null) {
            $invalidProperties[] = "'discount_end_date_at' can't be null";
        }
        if ($this->container['discount_percent'] === null) {
            $invalidProperties[] = "'discount_percent' can't be null";
        }
        if ($this->container['hourly_cost'] === null) {
            $invalidProperties[] = "'hourly_cost' can't be null";
        }
        if ($this->container['hourly_fee'] === null) {
            $invalidProperties[] = "'hourly_fee' can't be null";
        }
        if ($this->container['monthly_cost'] === null) {
            $invalidProperties[] = "'monthly_cost' can't be null";
        }
        if ($this->container['monthly_fee'] === null) {
            $invalidProperties[] = "'monthly_fee' can't be null";
        }
        if ($this->container['total_paid'] === null) {
            $invalidProperties[] = "'total_paid' can't be null";
        }
        if ($this->container['hours_left'] === null) {
            $invalidProperties[] = "'hours_left' can't be null";
        }
        if ($this->container['autopay_card_info'] === null) {
            $invalidProperties[] = "'autopay_card_info' can't be null";
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
     * Gets balance
     *
     * @return float
     */
    public function getBalance()
    {
        return $this->container['balance'];
    }

    /**
     * Sets balance
     *
     * @param float $balance Баланс аккаунта.
     *
     * @return self
     */
    public function setBalance($balance)
    {
        if (is_null($balance)) {
            throw new \InvalidArgumentException('non-nullable balance cannot be null');
        }
        $this->container['balance'] = $balance;

        return $this;
    }

    /**
     * Gets currency
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->container['currency'];
    }

    /**
     * Sets currency
     *
     * @param string $currency Валюта, которая используется на аккаунте.
     *
     * @return self
     */
    public function setCurrency($currency)
    {
        if (is_null($currency)) {
            throw new \InvalidArgumentException('non-nullable currency cannot be null');
        }
        $this->container['currency'] = $currency;

        return $this;
    }

    /**
     * Gets discount_end_date_at
     *
     * @return string
     */
    public function getDiscountEndDateAt()
    {
        return $this->container['discount_end_date_at'];
    }

    /**
     * Sets discount_end_date_at
     *
     * @param string $discount_end_date_at Значение времени, указанное в комбинированном формате даты и времени ISO8601, которое представляет, когда заканчивается скидка для аккаунта.
     *
     * @return self
     */
    public function setDiscountEndDateAt($discount_end_date_at)
    {
        if (is_null($discount_end_date_at)) {
            array_push($this->openAPINullablesSetToNull, 'discount_end_date_at');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('discount_end_date_at', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['discount_end_date_at'] = $discount_end_date_at;

        return $this;
    }

    /**
     * Gets discount_percent
     *
     * @return float
     */
    public function getDiscountPercent()
    {
        return $this->container['discount_percent'];
    }

    /**
     * Sets discount_percent
     *
     * @param float $discount_percent Процент скидки для аккаунта.
     *
     * @return self
     */
    public function setDiscountPercent($discount_percent)
    {
        if (is_null($discount_percent)) {
            throw new \InvalidArgumentException('non-nullable discount_percent cannot be null');
        }
        $this->container['discount_percent'] = $discount_percent;

        return $this;
    }

    /**
     * Gets hourly_cost
     *
     * @return float
     */
    public function getHourlyCost()
    {
        return $this->container['hourly_cost'];
    }

    /**
     * Sets hourly_cost
     *
     * @param float $hourly_cost Стоимость услуг на аккаунте в час.
     *
     * @return self
     */
    public function setHourlyCost($hourly_cost)
    {
        if (is_null($hourly_cost)) {
            throw new \InvalidArgumentException('non-nullable hourly_cost cannot be null');
        }
        $this->container['hourly_cost'] = $hourly_cost;

        return $this;
    }

    /**
     * Gets hourly_fee
     *
     * @return float
     */
    public function getHourlyFee()
    {
        return $this->container['hourly_fee'];
    }

    /**
     * Sets hourly_fee
     *
     * @param float $hourly_fee Абонентская плата в час (с учетом скидок).
     *
     * @return self
     */
    public function setHourlyFee($hourly_fee)
    {
        if (is_null($hourly_fee)) {
            throw new \InvalidArgumentException('non-nullable hourly_fee cannot be null');
        }
        $this->container['hourly_fee'] = $hourly_fee;

        return $this;
    }

    /**
     * Gets monthly_cost
     *
     * @return float
     */
    public function getMonthlyCost()
    {
        return $this->container['monthly_cost'];
    }

    /**
     * Sets monthly_cost
     *
     * @param float $monthly_cost Стоимость услуг на аккаунте в месяц.
     *
     * @return self
     */
    public function setMonthlyCost($monthly_cost)
    {
        if (is_null($monthly_cost)) {
            throw new \InvalidArgumentException('non-nullable monthly_cost cannot be null');
        }
        $this->container['monthly_cost'] = $monthly_cost;

        return $this;
    }

    /**
     * Gets monthly_fee
     *
     * @return float
     */
    public function getMonthlyFee()
    {
        return $this->container['monthly_fee'];
    }

    /**
     * Sets monthly_fee
     *
     * @param float $monthly_fee Абонентская плата в месяц (с учетом скидок).
     *
     * @return self
     */
    public function setMonthlyFee($monthly_fee)
    {
        if (is_null($monthly_fee)) {
            throw new \InvalidArgumentException('non-nullable monthly_fee cannot be null');
        }
        $this->container['monthly_fee'] = $monthly_fee;

        return $this;
    }

    /**
     * Gets total_paid
     *
     * @return float
     */
    public function getTotalPaid()
    {
        return $this->container['total_paid'];
    }

    /**
     * Sets total_paid
     *
     * @param float $total_paid Общая сумма платежей на аккаунте.
     *
     * @return self
     */
    public function setTotalPaid($total_paid)
    {
        if (is_null($total_paid)) {
            throw new \InvalidArgumentException('non-nullable total_paid cannot be null');
        }
        $this->container['total_paid'] = $total_paid;

        return $this;
    }

    /**
     * Gets hours_left
     *
     * @return float
     */
    public function getHoursLeft()
    {
        return $this->container['hours_left'];
    }

    /**
     * Sets hours_left
     *
     * @param float $hours_left Сколько часов работы услуг оплачено на аккаунте.
     *
     * @return self
     */
    public function setHoursLeft($hours_left)
    {
        if (is_null($hours_left)) {
            array_push($this->openAPINullablesSetToNull, 'hours_left');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('hours_left', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['hours_left'] = $hours_left;

        return $this;
    }

    /**
     * Gets autopay_card_info
     *
     * @return string
     */
    public function getAutopayCardInfo()
    {
        return $this->container['autopay_card_info'];
    }

    /**
     * Sets autopay_card_info
     *
     * @param string $autopay_card_info Информация о карте, используемой для автоплатежей.
     *
     * @return self
     */
    public function setAutopayCardInfo($autopay_card_info)
    {
        if (is_null($autopay_card_info)) {
            array_push($this->openAPINullablesSetToNull, 'autopay_card_info');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('autopay_card_info', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['autopay_card_info'] = $autopay_card_info;

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


