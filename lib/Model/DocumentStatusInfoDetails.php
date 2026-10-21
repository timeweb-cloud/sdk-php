<?php
/**
 * DocumentStatusInfoDetails
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
 * DocumentStatusInfoDetails Class Doc Comment
 *
 * @category Class
 * @description Подробности, набор полей зависит от состояния. Могут присутствовать и другие поля
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class DocumentStatusInfoDetails implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'document_status_info_details';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'started_at' => '\DateTime',
        'current_stage' => 'string',
        'progress' => 'float',
        'indexing_duration_ms' => 'float',
        'tokens_used' => 'float',
        'tokens_estimated' => 'float',
        'chunks_count' => 'float',
        'needed' => 'float',
        'available' => 'float',
        'estimated' => 'float',
        'balance' => 'float',
        'min_required' => 'float'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'started_at' => 'date-time',
        'current_stage' => null,
        'progress' => null,
        'indexing_duration_ms' => null,
        'tokens_used' => null,
        'tokens_estimated' => null,
        'chunks_count' => null,
        'needed' => null,
        'available' => null,
        'estimated' => null,
        'balance' => null,
        'min_required' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'started_at' => false,
		'current_stage' => false,
		'progress' => false,
		'indexing_duration_ms' => false,
		'tokens_used' => false,
		'tokens_estimated' => false,
		'chunks_count' => false,
		'needed' => false,
		'available' => false,
		'estimated' => false,
		'balance' => false,
		'min_required' => false
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
        'started_at' => 'started_at',
        'current_stage' => 'current_stage',
        'progress' => 'progress',
        'indexing_duration_ms' => 'indexing_duration_ms',
        'tokens_used' => 'tokens_used',
        'tokens_estimated' => 'tokens_estimated',
        'chunks_count' => 'chunks_count',
        'needed' => 'needed',
        'available' => 'available',
        'estimated' => 'estimated',
        'balance' => 'balance',
        'min_required' => 'min_required'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'started_at' => 'setStartedAt',
        'current_stage' => 'setCurrentStage',
        'progress' => 'setProgress',
        'indexing_duration_ms' => 'setIndexingDurationMs',
        'tokens_used' => 'setTokensUsed',
        'tokens_estimated' => 'setTokensEstimated',
        'chunks_count' => 'setChunksCount',
        'needed' => 'setNeeded',
        'available' => 'setAvailable',
        'estimated' => 'setEstimated',
        'balance' => 'setBalance',
        'min_required' => 'setMinRequired'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'started_at' => 'getStartedAt',
        'current_stage' => 'getCurrentStage',
        'progress' => 'getProgress',
        'indexing_duration_ms' => 'getIndexingDurationMs',
        'tokens_used' => 'getTokensUsed',
        'tokens_estimated' => 'getTokensEstimated',
        'chunks_count' => 'getChunksCount',
        'needed' => 'getNeeded',
        'available' => 'getAvailable',
        'estimated' => 'getEstimated',
        'balance' => 'getBalance',
        'min_required' => 'getMinRequired'
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
        $this->setIfExists('started_at', $data ?? [], null);
        $this->setIfExists('current_stage', $data ?? [], null);
        $this->setIfExists('progress', $data ?? [], null);
        $this->setIfExists('indexing_duration_ms', $data ?? [], null);
        $this->setIfExists('tokens_used', $data ?? [], null);
        $this->setIfExists('tokens_estimated', $data ?? [], null);
        $this->setIfExists('chunks_count', $data ?? [], null);
        $this->setIfExists('needed', $data ?? [], null);
        $this->setIfExists('available', $data ?? [], null);
        $this->setIfExists('estimated', $data ?? [], null);
        $this->setIfExists('balance', $data ?? [], null);
        $this->setIfExists('min_required', $data ?? [], null);
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

        if (!is_null($this->container['progress']) && ($this->container['progress'] > 100)) {
            $invalidProperties[] = "invalid value for 'progress', must be smaller than or equal to 100.";
        }

        if (!is_null($this->container['progress']) && ($this->container['progress'] < 0)) {
            $invalidProperties[] = "invalid value for 'progress', must be bigger than or equal to 0.";
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
     * Gets started_at
     *
     * @return \DateTime|null
     */
    public function getStartedAt()
    {
        return $this->container['started_at'];
    }

    /**
     * Sets started_at
     *
     * @param \DateTime|null $started_at `indexing`: время начала индексации
     *
     * @return self
     */
    public function setStartedAt($started_at)
    {
        if (is_null($started_at)) {
            throw new \InvalidArgumentException('non-nullable started_at cannot be null');
        }
        $this->container['started_at'] = $started_at;

        return $this;
    }

    /**
     * Gets current_stage
     *
     * @return string|null
     */
    public function getCurrentStage()
    {
        return $this->container['current_stage'];
    }

    /**
     * Sets current_stage
     *
     * @param string|null $current_stage `indexing`: текущий этап
     *
     * @return self
     */
    public function setCurrentStage($current_stage)
    {
        if (is_null($current_stage)) {
            throw new \InvalidArgumentException('non-nullable current_stage cannot be null');
        }
        $this->container['current_stage'] = $current_stage;

        return $this;
    }

    /**
     * Gets progress
     *
     * @return float|null
     */
    public function getProgress()
    {
        return $this->container['progress'];
    }

    /**
     * Sets progress
     *
     * @param float|null $progress `indexing`: прогресс в процентах
     *
     * @return self
     */
    public function setProgress($progress)
    {
        if (is_null($progress)) {
            throw new \InvalidArgumentException('non-nullable progress cannot be null');
        }

        if (($progress > 100)) {
            throw new \InvalidArgumentException('invalid value for $progress when calling DocumentStatusInfoDetails., must be smaller than or equal to 100.');
        }
        if (($progress < 0)) {
            throw new \InvalidArgumentException('invalid value for $progress when calling DocumentStatusInfoDetails., must be bigger than or equal to 0.');
        }

        $this->container['progress'] = $progress;

        return $this;
    }

    /**
     * Gets indexing_duration_ms
     *
     * @return float|null
     */
    public function getIndexingDurationMs()
    {
        return $this->container['indexing_duration_ms'];
    }

    /**
     * Sets indexing_duration_ms
     *
     * @param float|null $indexing_duration_ms `indexed`: длительность индексации в миллисекундах
     *
     * @return self
     */
    public function setIndexingDurationMs($indexing_duration_ms)
    {
        if (is_null($indexing_duration_ms)) {
            throw new \InvalidArgumentException('non-nullable indexing_duration_ms cannot be null');
        }
        $this->container['indexing_duration_ms'] = $indexing_duration_ms;

        return $this;
    }

    /**
     * Gets tokens_used
     *
     * @return float|null
     */
    public function getTokensUsed()
    {
        return $this->container['tokens_used'];
    }

    /**
     * Sets tokens_used
     *
     * @param float|null $tokens_used `indexed`: израсходовано токенов
     *
     * @return self
     */
    public function setTokensUsed($tokens_used)
    {
        if (is_null($tokens_used)) {
            throw new \InvalidArgumentException('non-nullable tokens_used cannot be null');
        }
        $this->container['tokens_used'] = $tokens_used;

        return $this;
    }

    /**
     * Gets tokens_estimated
     *
     * @return float|null
     */
    public function getTokensEstimated()
    {
        return $this->container['tokens_estimated'];
    }

    /**
     * Sets tokens_estimated
     *
     * @param float|null $tokens_estimated `indexed`: оценка количества токенов перед индексацией
     *
     * @return self
     */
    public function setTokensEstimated($tokens_estimated)
    {
        if (is_null($tokens_estimated)) {
            throw new \InvalidArgumentException('non-nullable tokens_estimated cannot be null');
        }
        $this->container['tokens_estimated'] = $tokens_estimated;

        return $this;
    }

    /**
     * Gets chunks_count
     *
     * @return float|null
     */
    public function getChunksCount()
    {
        return $this->container['chunks_count'];
    }

    /**
     * Sets chunks_count
     *
     * @param float|null $chunks_count `indexed`: количество фрагментов, на которые разбит документ
     *
     * @return self
     */
    public function setChunksCount($chunks_count)
    {
        if (is_null($chunks_count)) {
            throw new \InvalidArgumentException('non-nullable chunks_count cannot be null');
        }
        $this->container['chunks_count'] = $chunks_count;

        return $this;
    }

    /**
     * Gets needed
     *
     * @return float|null
     */
    public function getNeeded()
    {
        return $this->container['needed'];
    }

    /**
     * Sets needed
     *
     * @param float|null $needed `INSUFFICIENT_TOKENS`: сколько токенов нужно
     *
     * @return self
     */
    public function setNeeded($needed)
    {
        if (is_null($needed)) {
            throw new \InvalidArgumentException('non-nullable needed cannot be null');
        }
        $this->container['needed'] = $needed;

        return $this;
    }

    /**
     * Gets available
     *
     * @return float|null
     */
    public function getAvailable()
    {
        return $this->container['available'];
    }

    /**
     * Sets available
     *
     * @param float|null $available `INSUFFICIENT_TOKENS`: сколько токенов доступно
     *
     * @return self
     */
    public function setAvailable($available)
    {
        if (is_null($available)) {
            throw new \InvalidArgumentException('non-nullable available cannot be null');
        }
        $this->container['available'] = $available;

        return $this;
    }

    /**
     * Gets estimated
     *
     * @return float|null
     */
    public function getEstimated()
    {
        return $this->container['estimated'];
    }

    /**
     * Sets estimated
     *
     * @param float|null $estimated `INSUFFICIENT_TOKENS`: оценка без запаса
     *
     * @return self
     */
    public function setEstimated($estimated)
    {
        if (is_null($estimated)) {
            throw new \InvalidArgumentException('non-nullable estimated cannot be null');
        }
        $this->container['estimated'] = $estimated;

        return $this;
    }

    /**
     * Gets balance
     *
     * @return float|null
     */
    public function getBalance()
    {
        return $this->container['balance'];
    }

    /**
     * Sets balance
     *
     * @param float|null $balance `CRITICAL_BALANCE`, `NEGATIVE_BALANCE`: текущий остаток токенов
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
     * Gets min_required
     *
     * @return float|null
     */
    public function getMinRequired()
    {
        return $this->container['min_required'];
    }

    /**
     * Sets min_required
     *
     * @param float|null $min_required `CRITICAL_BALANCE`: минимально необходимый остаток
     *
     * @return self
     */
    public function setMinRequired($min_required)
    {
        if (is_null($min_required)) {
            throw new \InvalidArgumentException('non-nullable min_required cannot be null');
        }
        $this->container['min_required'] = $min_required;

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


