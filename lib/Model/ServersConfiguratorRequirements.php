<?php
/**
 * ServersConfiguratorRequirements
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
 * ServersConfiguratorRequirements Class Doc Comment
 *
 * @category Class
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class ServersConfiguratorRequirements implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'servers_configurator_requirements';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'cpu_min' => 'float',
        'cpu_step' => 'float',
        'cpu_max' => 'float',
        'ram_min' => 'float',
        'ram_step' => 'float',
        'ram_max' => 'float',
        'disk_min' => 'float',
        'disk_step' => 'float',
        'disk_max' => 'float',
        'network_bandwidth_min' => 'float',
        'network_bandwidth_step' => 'float',
        'network_bandwidth_max' => 'float',
        'gpu_min' => 'float',
        'gpu_max' => 'float',
        'gpu_step' => 'float'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'cpu_min' => null,
        'cpu_step' => null,
        'cpu_max' => null,
        'ram_min' => null,
        'ram_step' => null,
        'ram_max' => null,
        'disk_min' => null,
        'disk_step' => null,
        'disk_max' => null,
        'network_bandwidth_min' => null,
        'network_bandwidth_step' => null,
        'network_bandwidth_max' => null,
        'gpu_min' => null,
        'gpu_max' => null,
        'gpu_step' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'cpu_min' => false,
		'cpu_step' => false,
		'cpu_max' => false,
		'ram_min' => false,
		'ram_step' => false,
		'ram_max' => false,
		'disk_min' => false,
		'disk_step' => false,
		'disk_max' => false,
		'network_bandwidth_min' => false,
		'network_bandwidth_step' => false,
		'network_bandwidth_max' => false,
		'gpu_min' => true,
		'gpu_max' => true,
		'gpu_step' => true
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
        'cpu_min' => 'cpu_min',
        'cpu_step' => 'cpu_step',
        'cpu_max' => 'cpu_max',
        'ram_min' => 'ram_min',
        'ram_step' => 'ram_step',
        'ram_max' => 'ram_max',
        'disk_min' => 'disk_min',
        'disk_step' => 'disk_step',
        'disk_max' => 'disk_max',
        'network_bandwidth_min' => 'network_bandwidth_min',
        'network_bandwidth_step' => 'network_bandwidth_step',
        'network_bandwidth_max' => 'network_bandwidth_max',
        'gpu_min' => 'gpu_min',
        'gpu_max' => 'gpu_max',
        'gpu_step' => 'gpu_step'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'cpu_min' => 'setCpuMin',
        'cpu_step' => 'setCpuStep',
        'cpu_max' => 'setCpuMax',
        'ram_min' => 'setRamMin',
        'ram_step' => 'setRamStep',
        'ram_max' => 'setRamMax',
        'disk_min' => 'setDiskMin',
        'disk_step' => 'setDiskStep',
        'disk_max' => 'setDiskMax',
        'network_bandwidth_min' => 'setNetworkBandwidthMin',
        'network_bandwidth_step' => 'setNetworkBandwidthStep',
        'network_bandwidth_max' => 'setNetworkBandwidthMax',
        'gpu_min' => 'setGpuMin',
        'gpu_max' => 'setGpuMax',
        'gpu_step' => 'setGpuStep'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'cpu_min' => 'getCpuMin',
        'cpu_step' => 'getCpuStep',
        'cpu_max' => 'getCpuMax',
        'ram_min' => 'getRamMin',
        'ram_step' => 'getRamStep',
        'ram_max' => 'getRamMax',
        'disk_min' => 'getDiskMin',
        'disk_step' => 'getDiskStep',
        'disk_max' => 'getDiskMax',
        'network_bandwidth_min' => 'getNetworkBandwidthMin',
        'network_bandwidth_step' => 'getNetworkBandwidthStep',
        'network_bandwidth_max' => 'getNetworkBandwidthMax',
        'gpu_min' => 'getGpuMin',
        'gpu_max' => 'getGpuMax',
        'gpu_step' => 'getGpuStep'
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
        $this->setIfExists('cpu_min', $data ?? [], null);
        $this->setIfExists('cpu_step', $data ?? [], null);
        $this->setIfExists('cpu_max', $data ?? [], null);
        $this->setIfExists('ram_min', $data ?? [], null);
        $this->setIfExists('ram_step', $data ?? [], null);
        $this->setIfExists('ram_max', $data ?? [], null);
        $this->setIfExists('disk_min', $data ?? [], null);
        $this->setIfExists('disk_step', $data ?? [], null);
        $this->setIfExists('disk_max', $data ?? [], null);
        $this->setIfExists('network_bandwidth_min', $data ?? [], null);
        $this->setIfExists('network_bandwidth_step', $data ?? [], null);
        $this->setIfExists('network_bandwidth_max', $data ?? [], null);
        $this->setIfExists('gpu_min', $data ?? [], null);
        $this->setIfExists('gpu_max', $data ?? [], null);
        $this->setIfExists('gpu_step', $data ?? [], null);
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

        if ($this->container['cpu_min'] === null) {
            $invalidProperties[] = "'cpu_min' can't be null";
        }
        if ($this->container['cpu_step'] === null) {
            $invalidProperties[] = "'cpu_step' can't be null";
        }
        if ($this->container['cpu_max'] === null) {
            $invalidProperties[] = "'cpu_max' can't be null";
        }
        if ($this->container['ram_min'] === null) {
            $invalidProperties[] = "'ram_min' can't be null";
        }
        if ($this->container['ram_step'] === null) {
            $invalidProperties[] = "'ram_step' can't be null";
        }
        if ($this->container['ram_max'] === null) {
            $invalidProperties[] = "'ram_max' can't be null";
        }
        if ($this->container['disk_min'] === null) {
            $invalidProperties[] = "'disk_min' can't be null";
        }
        if ($this->container['disk_step'] === null) {
            $invalidProperties[] = "'disk_step' can't be null";
        }
        if ($this->container['disk_max'] === null) {
            $invalidProperties[] = "'disk_max' can't be null";
        }
        if ($this->container['network_bandwidth_min'] === null) {
            $invalidProperties[] = "'network_bandwidth_min' can't be null";
        }
        if ($this->container['network_bandwidth_step'] === null) {
            $invalidProperties[] = "'network_bandwidth_step' can't be null";
        }
        if ($this->container['network_bandwidth_max'] === null) {
            $invalidProperties[] = "'network_bandwidth_max' can't be null";
        }
        if ($this->container['gpu_min'] === null) {
            $invalidProperties[] = "'gpu_min' can't be null";
        }
        if ($this->container['gpu_max'] === null) {
            $invalidProperties[] = "'gpu_max' can't be null";
        }
        if ($this->container['gpu_step'] === null) {
            $invalidProperties[] = "'gpu_step' can't be null";
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
     * Gets cpu_min
     *
     * @return float
     */
    public function getCpuMin()
    {
        return $this->container['cpu_min'];
    }

    /**
     * Sets cpu_min
     *
     * @param float $cpu_min Минимальное количество ядер процессора.
     *
     * @return self
     */
    public function setCpuMin($cpu_min)
    {
        if (is_null($cpu_min)) {
            throw new \InvalidArgumentException('non-nullable cpu_min cannot be null');
        }
        $this->container['cpu_min'] = $cpu_min;

        return $this;
    }

    /**
     * Gets cpu_step
     *
     * @return float
     */
    public function getCpuStep()
    {
        return $this->container['cpu_step'];
    }

    /**
     * Sets cpu_step
     *
     * @param float $cpu_step Размер шага ядер процессора.
     *
     * @return self
     */
    public function setCpuStep($cpu_step)
    {
        if (is_null($cpu_step)) {
            throw new \InvalidArgumentException('non-nullable cpu_step cannot be null');
        }
        $this->container['cpu_step'] = $cpu_step;

        return $this;
    }

    /**
     * Gets cpu_max
     *
     * @return float
     */
    public function getCpuMax()
    {
        return $this->container['cpu_max'];
    }

    /**
     * Sets cpu_max
     *
     * @param float $cpu_max Максимальное количество ядер процессора.
     *
     * @return self
     */
    public function setCpuMax($cpu_max)
    {
        if (is_null($cpu_max)) {
            throw new \InvalidArgumentException('non-nullable cpu_max cannot be null');
        }
        $this->container['cpu_max'] = $cpu_max;

        return $this;
    }

    /**
     * Gets ram_min
     *
     * @return float
     */
    public function getRamMin()
    {
        return $this->container['ram_min'];
    }

    /**
     * Sets ram_min
     *
     * @param float $ram_min Минимальное количество оперативной памяти (в Мб).
     *
     * @return self
     */
    public function setRamMin($ram_min)
    {
        if (is_null($ram_min)) {
            throw new \InvalidArgumentException('non-nullable ram_min cannot be null');
        }
        $this->container['ram_min'] = $ram_min;

        return $this;
    }

    /**
     * Gets ram_step
     *
     * @return float
     */
    public function getRamStep()
    {
        return $this->container['ram_step'];
    }

    /**
     * Sets ram_step
     *
     * @param float $ram_step Размер шага оперативной памяти.
     *
     * @return self
     */
    public function setRamStep($ram_step)
    {
        if (is_null($ram_step)) {
            throw new \InvalidArgumentException('non-nullable ram_step cannot be null');
        }
        $this->container['ram_step'] = $ram_step;

        return $this;
    }

    /**
     * Gets ram_max
     *
     * @return float
     */
    public function getRamMax()
    {
        return $this->container['ram_max'];
    }

    /**
     * Sets ram_max
     *
     * @param float $ram_max Максимальное количество оперативной памяти (в Мб).
     *
     * @return self
     */
    public function setRamMax($ram_max)
    {
        if (is_null($ram_max)) {
            throw new \InvalidArgumentException('non-nullable ram_max cannot be null');
        }
        $this->container['ram_max'] = $ram_max;

        return $this;
    }

    /**
     * Gets disk_min
     *
     * @return float
     */
    public function getDiskMin()
    {
        return $this->container['disk_min'];
    }

    /**
     * Sets disk_min
     *
     * @param float $disk_min Минимальный размер диска (в Мб).
     *
     * @return self
     */
    public function setDiskMin($disk_min)
    {
        if (is_null($disk_min)) {
            throw new \InvalidArgumentException('non-nullable disk_min cannot be null');
        }
        $this->container['disk_min'] = $disk_min;

        return $this;
    }

    /**
     * Gets disk_step
     *
     * @return float
     */
    public function getDiskStep()
    {
        return $this->container['disk_step'];
    }

    /**
     * Sets disk_step
     *
     * @param float $disk_step Размер шага диска
     *
     * @return self
     */
    public function setDiskStep($disk_step)
    {
        if (is_null($disk_step)) {
            throw new \InvalidArgumentException('non-nullable disk_step cannot be null');
        }
        $this->container['disk_step'] = $disk_step;

        return $this;
    }

    /**
     * Gets disk_max
     *
     * @return float
     */
    public function getDiskMax()
    {
        return $this->container['disk_max'];
    }

    /**
     * Sets disk_max
     *
     * @param float $disk_max Максимальный размер диска (в Мб).
     *
     * @return self
     */
    public function setDiskMax($disk_max)
    {
        if (is_null($disk_max)) {
            throw new \InvalidArgumentException('non-nullable disk_max cannot be null');
        }
        $this->container['disk_max'] = $disk_max;

        return $this;
    }

    /**
     * Gets network_bandwidth_min
     *
     * @return float
     */
    public function getNetworkBandwidthMin()
    {
        return $this->container['network_bandwidth_min'];
    }

    /**
     * Sets network_bandwidth_min
     *
     * @param float $network_bandwidth_min Минимальныая пропускная способноть интернет-канала (в Мб)
     *
     * @return self
     */
    public function setNetworkBandwidthMin($network_bandwidth_min)
    {
        if (is_null($network_bandwidth_min)) {
            throw new \InvalidArgumentException('non-nullable network_bandwidth_min cannot be null');
        }
        $this->container['network_bandwidth_min'] = $network_bandwidth_min;

        return $this;
    }

    /**
     * Gets network_bandwidth_step
     *
     * @return float
     */
    public function getNetworkBandwidthStep()
    {
        return $this->container['network_bandwidth_step'];
    }

    /**
     * Sets network_bandwidth_step
     *
     * @param float $network_bandwidth_step Размер шага пропускной способноти интернет-канала (в Мб)
     *
     * @return self
     */
    public function setNetworkBandwidthStep($network_bandwidth_step)
    {
        if (is_null($network_bandwidth_step)) {
            throw new \InvalidArgumentException('non-nullable network_bandwidth_step cannot be null');
        }
        $this->container['network_bandwidth_step'] = $network_bandwidth_step;

        return $this;
    }

    /**
     * Gets network_bandwidth_max
     *
     * @return float
     */
    public function getNetworkBandwidthMax()
    {
        return $this->container['network_bandwidth_max'];
    }

    /**
     * Sets network_bandwidth_max
     *
     * @param float $network_bandwidth_max Максимальная пропускная способноть интернет-канала (в Мб)
     *
     * @return self
     */
    public function setNetworkBandwidthMax($network_bandwidth_max)
    {
        if (is_null($network_bandwidth_max)) {
            throw new \InvalidArgumentException('non-nullable network_bandwidth_max cannot be null');
        }
        $this->container['network_bandwidth_max'] = $network_bandwidth_max;

        return $this;
    }

    /**
     * Gets gpu_min
     *
     * @return float
     */
    public function getGpuMin()
    {
        return $this->container['gpu_min'];
    }

    /**
     * Sets gpu_min
     *
     * @param float $gpu_min Минимальное количество видеокарт
     *
     * @return self
     */
    public function setGpuMin($gpu_min)
    {
        if (is_null($gpu_min)) {
            array_push($this->openAPINullablesSetToNull, 'gpu_min');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('gpu_min', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['gpu_min'] = $gpu_min;

        return $this;
    }

    /**
     * Gets gpu_max
     *
     * @return float
     */
    public function getGpuMax()
    {
        return $this->container['gpu_max'];
    }

    /**
     * Sets gpu_max
     *
     * @param float $gpu_max Максимальное количество видеокарт
     *
     * @return self
     */
    public function setGpuMax($gpu_max)
    {
        if (is_null($gpu_max)) {
            array_push($this->openAPINullablesSetToNull, 'gpu_max');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('gpu_max', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['gpu_max'] = $gpu_max;

        return $this;
    }

    /**
     * Gets gpu_step
     *
     * @return float
     */
    public function getGpuStep()
    {
        return $this->container['gpu_step'];
    }

    /**
     * Sets gpu_step
     *
     * @param float $gpu_step Размер шага видеокарт
     *
     * @return self
     */
    public function setGpuStep($gpu_step)
    {
        if (is_null($gpu_step)) {
            array_push($this->openAPINullablesSetToNull, 'gpu_step');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('gpu_step', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['gpu_step'] = $gpu_step;

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


