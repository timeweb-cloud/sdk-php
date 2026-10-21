<?php
/**
 * AiGatewayChatCompletionRequest
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
 * AiGatewayChatCompletionRequest Class Doc Comment
 *
 * @category Class
 * @description Запрос Chat Completions в формате OpenAI. Перечислены основные поля, остальные параметры OpenAI передаются модели как есть. Параметры, которые модель не поддерживает, могут быть отклонены с ошибкой 400
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class AiGatewayChatCompletionRequest implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'ai-gateway-chat-completion-request';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'model' => 'string',
        'messages' => '\OpenAPI\Client\Model\AiGatewayChatMessage[]',
        'stream' => 'bool',
        'stream_options' => '\OpenAPI\Client\Model\AiGatewayChatCompletionRequestStreamOptions',
        'max_completion_tokens' => 'int',
        'max_tokens' => 'int',
        'temperature' => 'float',
        'top_p' => 'float',
        'n' => 'int',
        'stop' => 'string',
        'tools' => 'array<string,mixed>[]',
        'tool_choice' => 'string',
        'response_format' => 'array<string,mixed>',
        'reasoning_effort' => 'string',
        'user' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'model' => null,
        'messages' => null,
        'stream' => null,
        'stream_options' => null,
        'max_completion_tokens' => null,
        'max_tokens' => null,
        'temperature' => null,
        'top_p' => null,
        'n' => null,
        'stop' => null,
        'tools' => null,
        'tool_choice' => null,
        'response_format' => null,
        'reasoning_effort' => null,
        'user' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'model' => false,
		'messages' => false,
		'stream' => false,
		'stream_options' => false,
		'max_completion_tokens' => false,
		'max_tokens' => false,
		'temperature' => false,
		'top_p' => false,
		'n' => false,
		'stop' => false,
		'tools' => false,
		'tool_choice' => false,
		'response_format' => false,
		'reasoning_effort' => false,
		'user' => false
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
        'model' => 'model',
        'messages' => 'messages',
        'stream' => 'stream',
        'stream_options' => 'stream_options',
        'max_completion_tokens' => 'max_completion_tokens',
        'max_tokens' => 'max_tokens',
        'temperature' => 'temperature',
        'top_p' => 'top_p',
        'n' => 'n',
        'stop' => 'stop',
        'tools' => 'tools',
        'tool_choice' => 'tool_choice',
        'response_format' => 'response_format',
        'reasoning_effort' => 'reasoning_effort',
        'user' => 'user'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'model' => 'setModel',
        'messages' => 'setMessages',
        'stream' => 'setStream',
        'stream_options' => 'setStreamOptions',
        'max_completion_tokens' => 'setMaxCompletionTokens',
        'max_tokens' => 'setMaxTokens',
        'temperature' => 'setTemperature',
        'top_p' => 'setTopP',
        'n' => 'setN',
        'stop' => 'setStop',
        'tools' => 'setTools',
        'tool_choice' => 'setToolChoice',
        'response_format' => 'setResponseFormat',
        'reasoning_effort' => 'setReasoningEffort',
        'user' => 'setUser'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'model' => 'getModel',
        'messages' => 'getMessages',
        'stream' => 'getStream',
        'stream_options' => 'getStreamOptions',
        'max_completion_tokens' => 'getMaxCompletionTokens',
        'max_tokens' => 'getMaxTokens',
        'temperature' => 'getTemperature',
        'top_p' => 'getTopP',
        'n' => 'getN',
        'stop' => 'getStop',
        'tools' => 'getTools',
        'tool_choice' => 'getToolChoice',
        'response_format' => 'getResponseFormat',
        'reasoning_effort' => 'getReasoningEffort',
        'user' => 'getUser'
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

    public const TOOL_CHOICE_NONE = 'none';
    public const TOOL_CHOICE_AUTO = 'auto';
    public const TOOL_CHOICE_REQUIRED = 'required';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getToolChoiceAllowableValues()
    {
        return [
            self::TOOL_CHOICE_NONE,
            self::TOOL_CHOICE_AUTO,
            self::TOOL_CHOICE_REQUIRED,
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
        $this->setIfExists('model', $data ?? [], null);
        $this->setIfExists('messages', $data ?? [], null);
        $this->setIfExists('stream', $data ?? [], false);
        $this->setIfExists('stream_options', $data ?? [], null);
        $this->setIfExists('max_completion_tokens', $data ?? [], null);
        $this->setIfExists('max_tokens', $data ?? [], null);
        $this->setIfExists('temperature', $data ?? [], null);
        $this->setIfExists('top_p', $data ?? [], null);
        $this->setIfExists('n', $data ?? [], 1);
        $this->setIfExists('stop', $data ?? [], null);
        $this->setIfExists('tools', $data ?? [], null);
        $this->setIfExists('tool_choice', $data ?? [], null);
        $this->setIfExists('response_format', $data ?? [], null);
        $this->setIfExists('reasoning_effort', $data ?? [], null);
        $this->setIfExists('user', $data ?? [], null);
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

        if ($this->container['model'] === null) {
            $invalidProperties[] = "'model' can't be null";
        }
        if ($this->container['messages'] === null) {
            $invalidProperties[] = "'messages' can't be null";
        }
        if ((count($this->container['messages']) < 1)) {
            $invalidProperties[] = "invalid value for 'messages', number of items must be greater than or equal to 1.";
        }

        if (!is_null($this->container['temperature']) && ($this->container['temperature'] > 2)) {
            $invalidProperties[] = "invalid value for 'temperature', must be smaller than or equal to 2.";
        }

        if (!is_null($this->container['temperature']) && ($this->container['temperature'] < 0)) {
            $invalidProperties[] = "invalid value for 'temperature', must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['top_p']) && ($this->container['top_p'] > 1)) {
            $invalidProperties[] = "invalid value for 'top_p', must be smaller than or equal to 1.";
        }

        if (!is_null($this->container['top_p']) && ($this->container['top_p'] < 0)) {
            $invalidProperties[] = "invalid value for 'top_p', must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['n']) && ($this->container['n'] < 1)) {
            $invalidProperties[] = "invalid value for 'n', must be bigger than or equal to 1.";
        }

        $allowedValues = $this->getToolChoiceAllowableValues();
        if (!is_null($this->container['tool_choice']) && !in_array($this->container['tool_choice'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'tool_choice', must be one of '%s'",
                $this->container['tool_choice'],
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
     * Gets model
     *
     * @return string
     */
    public function getModel()
    {
        return $this->container['model'];
    }

    /**
     * Sets model
     *
     * @param string $model ID модели из `GET /v1/models`
     *
     * @return self
     */
    public function setModel($model)
    {
        if (is_null($model)) {
            throw new \InvalidArgumentException('non-nullable model cannot be null');
        }
        $this->container['model'] = $model;

        return $this;
    }

    /**
     * Gets messages
     *
     * @return \OpenAPI\Client\Model\AiGatewayChatMessage[]
     */
    public function getMessages()
    {
        return $this->container['messages'];
    }

    /**
     * Sets messages
     *
     * @param \OpenAPI\Client\Model\AiGatewayChatMessage[] $messages История диалога целиком
     *
     * @return self
     */
    public function setMessages($messages)
    {
        if (is_null($messages)) {
            throw new \InvalidArgumentException('non-nullable messages cannot be null');
        }


        if ((count($messages) < 1)) {
            throw new \InvalidArgumentException('invalid length for $messages when calling AiGatewayChatCompletionRequest., number of items must be greater than or equal to 1.');
        }
        $this->container['messages'] = $messages;

        return $this;
    }

    /**
     * Gets stream
     *
     * @return bool|null
     */
    public function getStream()
    {
        return $this->container['stream'];
    }

    /**
     * Sets stream
     *
     * @param bool|null $stream Отправлять ответ потоком Server-Sent Events (`text/event-stream`)
     *
     * @return self
     */
    public function setStream($stream)
    {
        if (is_null($stream)) {
            throw new \InvalidArgumentException('non-nullable stream cannot be null');
        }
        $this->container['stream'] = $stream;

        return $this;
    }

    /**
     * Gets stream_options
     *
     * @return \OpenAPI\Client\Model\AiGatewayChatCompletionRequestStreamOptions|null
     */
    public function getStreamOptions()
    {
        return $this->container['stream_options'];
    }

    /**
     * Sets stream_options
     *
     * @param \OpenAPI\Client\Model\AiGatewayChatCompletionRequestStreamOptions|null $stream_options stream_options
     *
     * @return self
     */
    public function setStreamOptions($stream_options)
    {
        if (is_null($stream_options)) {
            throw new \InvalidArgumentException('non-nullable stream_options cannot be null');
        }
        $this->container['stream_options'] = $stream_options;

        return $this;
    }

    /**
     * Gets max_completion_tokens
     *
     * @return int|null
     */
    public function getMaxCompletionTokens()
    {
        return $this->container['max_completion_tokens'];
    }

    /**
     * Sets max_completion_tokens
     *
     * @param int|null $max_completion_tokens Максимум выходных токенов, включая рассуждения
     *
     * @return self
     */
    public function setMaxCompletionTokens($max_completion_tokens)
    {
        if (is_null($max_completion_tokens)) {
            throw new \InvalidArgumentException('non-nullable max_completion_tokens cannot be null');
        }
        $this->container['max_completion_tokens'] = $max_completion_tokens;

        return $this;
    }

    /**
     * Gets max_tokens
     *
     * @return int|null
     */
    public function getMaxTokens()
    {
        return $this->container['max_tokens'];
    }

    /**
     * Sets max_tokens
     *
     * @param int|null $max_tokens Устаревший синоним `max_completion_tokens`
     *
     * @return self
     */
    public function setMaxTokens($max_tokens)
    {
        if (is_null($max_tokens)) {
            throw new \InvalidArgumentException('non-nullable max_tokens cannot be null');
        }
        $this->container['max_tokens'] = $max_tokens;

        return $this;
    }

    /**
     * Gets temperature
     *
     * @return float|null
     */
    public function getTemperature()
    {
        return $this->container['temperature'];
    }

    /**
     * Sets temperature
     *
     * @param float|null $temperature Температура выборки
     *
     * @return self
     */
    public function setTemperature($temperature)
    {
        if (is_null($temperature)) {
            throw new \InvalidArgumentException('non-nullable temperature cannot be null');
        }

        if (($temperature > 2)) {
            throw new \InvalidArgumentException('invalid value for $temperature when calling AiGatewayChatCompletionRequest., must be smaller than or equal to 2.');
        }
        if (($temperature < 0)) {
            throw new \InvalidArgumentException('invalid value for $temperature when calling AiGatewayChatCompletionRequest., must be bigger than or equal to 0.');
        }

        $this->container['temperature'] = $temperature;

        return $this;
    }

    /**
     * Gets top_p
     *
     * @return float|null
     */
    public function getTopP()
    {
        return $this->container['top_p'];
    }

    /**
     * Sets top_p
     *
     * @param float|null $top_p Порог nucleus sampling
     *
     * @return self
     */
    public function setTopP($top_p)
    {
        if (is_null($top_p)) {
            throw new \InvalidArgumentException('non-nullable top_p cannot be null');
        }

        if (($top_p > 1)) {
            throw new \InvalidArgumentException('invalid value for $top_p when calling AiGatewayChatCompletionRequest., must be smaller than or equal to 1.');
        }
        if (($top_p < 0)) {
            throw new \InvalidArgumentException('invalid value for $top_p when calling AiGatewayChatCompletionRequest., must be bigger than or equal to 0.');
        }

        $this->container['top_p'] = $top_p;

        return $this;
    }

    /**
     * Gets n
     *
     * @return int|null
     */
    public function getN()
    {
        return $this->container['n'];
    }

    /**
     * Sets n
     *
     * @param int|null $n Количество вариантов ответа
     *
     * @return self
     */
    public function setN($n)
    {
        if (is_null($n)) {
            throw new \InvalidArgumentException('non-nullable n cannot be null');
        }

        if (($n < 1)) {
            throw new \InvalidArgumentException('invalid value for $n when calling AiGatewayChatCompletionRequest., must be bigger than or equal to 1.');
        }

        $this->container['n'] = $n;

        return $this;
    }

    /**
     * Gets stop
     *
     * @return string|null
     */
    public function getStop()
    {
        return $this->container['stop'];
    }

    /**
     * Sets stop
     *
     * @param string|null $stop Строка или список строк, на которых генерация останавливается
     *
     * @return self
     */
    public function setStop($stop)
    {
        if (is_null($stop)) {
            throw new \InvalidArgumentException('non-nullable stop cannot be null');
        }
        $this->container['stop'] = $stop;

        return $this;
    }

    /**
     * Gets tools
     *
     * @return array<string,mixed>[]|null
     */
    public function getTools()
    {
        return $this->container['tools'];
    }

    /**
     * Sets tools
     *
     * @param array<string,mixed>[]|null $tools Функции, которые может вызвать модель
     *
     * @return self
     */
    public function setTools($tools)
    {
        if (is_null($tools)) {
            throw new \InvalidArgumentException('non-nullable tools cannot be null');
        }
        $this->container['tools'] = $tools;

        return $this;
    }

    /**
     * Gets tool_choice
     *
     * @return string|null
     */
    public function getToolChoice()
    {
        return $this->container['tool_choice'];
    }

    /**
     * Sets tool_choice
     *
     * @param string|null $tool_choice Режим вызова функций: `none`, `auto`, `required` или объект с конкретной функцией
     *
     * @return self
     */
    public function setToolChoice($tool_choice)
    {
        if (is_null($tool_choice)) {
            throw new \InvalidArgumentException('non-nullable tool_choice cannot be null');
        }
        $allowedValues = $this->getToolChoiceAllowableValues();
        if (!in_array($tool_choice, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'tool_choice', must be one of '%s'",
                    $tool_choice,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['tool_choice'] = $tool_choice;

        return $this;
    }

    /**
     * Gets response_format
     *
     * @return array<string,mixed>|null
     */
    public function getResponseFormat()
    {
        return $this->container['response_format'];
    }

    /**
     * Sets response_format
     *
     * @param array<string,mixed>|null $response_format Формат ответа: `{\"type\": \"json_object\"}` или `{\"type\": \"json_schema\", \"json_schema\": {...}}`
     *
     * @return self
     */
    public function setResponseFormat($response_format)
    {
        if (is_null($response_format)) {
            throw new \InvalidArgumentException('non-nullable response_format cannot be null');
        }
        $this->container['response_format'] = $response_format;

        return $this;
    }

    /**
     * Gets reasoning_effort
     *
     * @return string|null
     */
    public function getReasoningEffort()
    {
        return $this->container['reasoning_effort'];
    }

    /**
     * Sets reasoning_effort
     *
     * @param string|null $reasoning_effort Уровень рассуждений для моделей с рассуждениями, например `low`, `high`
     *
     * @return self
     */
    public function setReasoningEffort($reasoning_effort)
    {
        if (is_null($reasoning_effort)) {
            throw new \InvalidArgumentException('non-nullable reasoning_effort cannot be null');
        }
        $this->container['reasoning_effort'] = $reasoning_effort;

        return $this;
    }

    /**
     * Gets user
     *
     * @return string|null
     */
    public function getUser()
    {
        return $this->container['user'];
    }

    /**
     * Sets user
     *
     * @param string|null $user Идентификатор вашего конечного пользователя
     *
     * @return self
     */
    public function setUser($user)
    {
        if (is_null($user)) {
            throw new \InvalidArgumentException('non-nullable user cannot be null');
        }
        $this->container['user'] = $user;

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


