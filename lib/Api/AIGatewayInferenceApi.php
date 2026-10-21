<?php
/**
 * AIGatewayInferenceApi
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

namespace OpenAPI\Client\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use OpenAPI\Client\ApiException;
use OpenAPI\Client\Configuration;
use OpenAPI\Client\HeaderSelector;
use OpenAPI\Client\ObjectSerializer;

/**
 * AIGatewayInferenceApi Class Doc Comment
 *
 * @category Class
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class AIGatewayInferenceApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @var int Host index
     */
    protected $hostIndex;

    /** @var string[] $contentTypes **/
    public const contentTypes = [
        'cancelAiGatewayBatch' => [
            'application/json',
        ],
        'cancelAiGatewayResponse' => [
            'application/json',
        ],
        'createAiGatewayBatch' => [
            'application/json',
        ],
        'createAiGatewayChatCompletion' => [
            'application/json',
        ],
        'createAiGatewayCompletion' => [
            'application/json',
        ],
        'createAiGatewayEmbedding' => [
            'application/json',
        ],
        'createAiGatewayImage' => [
            'application/json',
        ],
        'createAiGatewayImageEdit' => [
            'multipart/form-data',
        ],
        'createAiGatewayResponse' => [
            'application/json',
        ],
        'createAiGatewaySpeech' => [
            'application/json',
        ],
        'createAiGatewayTranscription' => [
            'multipart/form-data',
        ],
        'deleteAiGatewayFile' => [
            'application/json',
        ],
        'deleteAiGatewayResponse' => [
            'application/json',
        ],
        'downloadAiGatewayFileContent' => [
            'application/json',
        ],
        'getAiGatewayBatch' => [
            'application/json',
        ],
        'getAiGatewayBatches' => [
            'application/json',
        ],
        'getAiGatewayFile' => [
            'application/json',
        ],
        'getAiGatewayModels' => [
            'application/json',
        ],
        'getAiGatewayResponse' => [
            'application/json',
        ],
        'uploadAiGatewayFile' => [
            'multipart/form-data',
        ],
    ];

/**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     * @param int             $hostIndex (Optional) host index to select the list of hosts if defined in the OpenAPI spec
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null,
        $hostIndex = 0
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
        $this->hostIndex = $hostIndex;
    }

    /**
     * Set the host index
     *
     * @param int $hostIndex Host index (required)
     */
    public function setHostIndex($hostIndex): void
    {
        $this->hostIndex = $hostIndex;
    }

    /**
     * Get the host index
     *
     * @return int Host index
     */
    public function getHostIndex()
    {
        return $this->hostIndex;
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation cancelAiGatewayBatch
     *
     * Отмена батча
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  string $batch_id ID батча (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['cancelAiGatewayBatch'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \OpenAPI\Client\Model\AiGatewayBatch|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError
     */
    public function cancelAiGatewayBatch($batch_id, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['cancelAiGatewayBatch'][0])
    {
        list($response) = $this->cancelAiGatewayBatchWithHttpInfo($batch_id, $hostIndex, $variables, $contentType);
        return $response;
    }

    /**
     * Operation cancelAiGatewayBatchWithHttpInfo
     *
     * Отмена батча
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  string $batch_id ID батча (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['cancelAiGatewayBatch'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPI\Client\Model\AiGatewayBatch|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError, HTTP status code, HTTP response headers (array of strings)
     */
    public function cancelAiGatewayBatchWithHttpInfo($batch_id, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['cancelAiGatewayBatch'][0])
    {
        $request = $this->cancelAiGatewayBatchRequest($batch_id, $hostIndex, $variables, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\OpenAPI\Client\Model\AiGatewayBatch' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayBatch' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayBatch', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 503:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\OpenAPI\Client\Model\AiGatewayBatch';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayBatch',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 503:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation cancelAiGatewayBatchAsync
     *
     * Отмена батча
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  string $batch_id ID батча (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['cancelAiGatewayBatch'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function cancelAiGatewayBatchAsync($batch_id, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['cancelAiGatewayBatch'][0])
    {
        return $this->cancelAiGatewayBatchAsyncWithHttpInfo($batch_id, $hostIndex, $variables, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation cancelAiGatewayBatchAsyncWithHttpInfo
     *
     * Отмена батча
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  string $batch_id ID батча (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['cancelAiGatewayBatch'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function cancelAiGatewayBatchAsyncWithHttpInfo($batch_id, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['cancelAiGatewayBatch'][0])
    {
        $returnType = '\OpenAPI\Client\Model\AiGatewayBatch';
        $request = $this->cancelAiGatewayBatchRequest($batch_id, $hostIndex, $variables, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'cancelAiGatewayBatch'
     *
    * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
    * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  string $batch_id ID батча (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['cancelAiGatewayBatch'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function cancelAiGatewayBatchRequest($batch_id, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['cancelAiGatewayBatch'][0])
    {

        // verify the required parameter 'batch_id' is set
        if ($batch_id === null || (is_array($batch_id) && count($batch_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $batch_id when calling cancelAiGatewayBatch'
            );
        }


        $resourcePath = '/v1/batches/{batch_id}/cancel';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($batch_id !== null) {
            $resourcePath = str_replace(
                '{' . 'batch_id' . '}',
                ObjectSerializer::toPathValue($batch_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires Bearer authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        # Preserve the original behavior of server indexing.
        if ($hostIndex === null) {
            $hostIndex = $this->hostIndex;
        }

        $hostSettings = $this->getHostSettingsForcancelAiGatewayBatch();

        if ($hostIndex < 0 || $hostIndex >= count($hostSettings)) {
            throw new \InvalidArgumentException("Invalid index {$hostIndex} when selecting the host. Must be less than ".count($hostSettings));
        }
        $operationHost = Configuration::getHostString($hostSettings, $hostIndex, $variables);
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Returns an array of host settings for Operation cancelAiGatewayBatch
     *
     * @return array an array of host settings
     */
    protected function getHostSettingsForcancelAiGatewayBatch(): array
    {
        return [
            [
                "url" => "https://api.timeweb.ai",
                "description" => "No description provided",
            ]
        ];
    }

    /**
     * Operation cancelAiGatewayResponse
     *
     * Отмена фонового ответа (Responses API)
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  string $response_id ID ответа Responses API (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['cancelAiGatewayResponse'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \OpenAPI\Client\Model\AiGatewayResponse|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError
     */
    public function cancelAiGatewayResponse($response_id, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['cancelAiGatewayResponse'][0])
    {
        list($response) = $this->cancelAiGatewayResponseWithHttpInfo($response_id, $hostIndex, $variables, $contentType);
        return $response;
    }

    /**
     * Operation cancelAiGatewayResponseWithHttpInfo
     *
     * Отмена фонового ответа (Responses API)
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  string $response_id ID ответа Responses API (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['cancelAiGatewayResponse'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPI\Client\Model\AiGatewayResponse|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError, HTTP status code, HTTP response headers (array of strings)
     */
    public function cancelAiGatewayResponseWithHttpInfo($response_id, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['cancelAiGatewayResponse'][0])
    {
        $request = $this->cancelAiGatewayResponseRequest($response_id, $hostIndex, $variables, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\OpenAPI\Client\Model\AiGatewayResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\OpenAPI\Client\Model\AiGatewayResponse';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation cancelAiGatewayResponseAsync
     *
     * Отмена фонового ответа (Responses API)
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  string $response_id ID ответа Responses API (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['cancelAiGatewayResponse'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function cancelAiGatewayResponseAsync($response_id, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['cancelAiGatewayResponse'][0])
    {
        return $this->cancelAiGatewayResponseAsyncWithHttpInfo($response_id, $hostIndex, $variables, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation cancelAiGatewayResponseAsyncWithHttpInfo
     *
     * Отмена фонового ответа (Responses API)
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  string $response_id ID ответа Responses API (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['cancelAiGatewayResponse'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function cancelAiGatewayResponseAsyncWithHttpInfo($response_id, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['cancelAiGatewayResponse'][0])
    {
        $returnType = '\OpenAPI\Client\Model\AiGatewayResponse';
        $request = $this->cancelAiGatewayResponseRequest($response_id, $hostIndex, $variables, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'cancelAiGatewayResponse'
     *
    * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
    * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  string $response_id ID ответа Responses API (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['cancelAiGatewayResponse'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function cancelAiGatewayResponseRequest($response_id, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['cancelAiGatewayResponse'][0])
    {

        // verify the required parameter 'response_id' is set
        if ($response_id === null || (is_array($response_id) && count($response_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $response_id when calling cancelAiGatewayResponse'
            );
        }


        $resourcePath = '/v1/responses/{response_id}/cancel';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($response_id !== null) {
            $resourcePath = str_replace(
                '{' . 'response_id' . '}',
                ObjectSerializer::toPathValue($response_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires Bearer authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        # Preserve the original behavior of server indexing.
        if ($hostIndex === null) {
            $hostIndex = $this->hostIndex;
        }

        $hostSettings = $this->getHostSettingsForcancelAiGatewayResponse();

        if ($hostIndex < 0 || $hostIndex >= count($hostSettings)) {
            throw new \InvalidArgumentException("Invalid index {$hostIndex} when selecting the host. Must be less than ".count($hostSettings));
        }
        $operationHost = Configuration::getHostString($hostSettings, $hostIndex, $variables);
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Returns an array of host settings for Operation cancelAiGatewayResponse
     *
     * @return array an array of host settings
     */
    protected function getHostSettingsForcancelAiGatewayResponse(): array
    {
        return [
            [
                "url" => "https://api.timeweb.ai",
                "description" => "No description provided",
            ]
        ];
    }

    /**
     * Operation createAiGatewayBatch
     *
     * Создание батча
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  \OpenAPI\Client\Model\AiGatewayBatchCreateRequest $ai_gateway_batch_create_request ai_gateway_batch_create_request (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createAiGatewayBatch'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \OpenAPI\Client\Model\AiGatewayBatch|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError
     */
    public function createAiGatewayBatch($ai_gateway_batch_create_request, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['createAiGatewayBatch'][0])
    {
        list($response) = $this->createAiGatewayBatchWithHttpInfo($ai_gateway_batch_create_request, $hostIndex, $variables, $contentType);
        return $response;
    }

    /**
     * Operation createAiGatewayBatchWithHttpInfo
     *
     * Создание батча
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  \OpenAPI\Client\Model\AiGatewayBatchCreateRequest $ai_gateway_batch_create_request (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createAiGatewayBatch'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPI\Client\Model\AiGatewayBatch|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError, HTTP status code, HTTP response headers (array of strings)
     */
    public function createAiGatewayBatchWithHttpInfo($ai_gateway_batch_create_request, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['createAiGatewayBatch'][0])
    {
        $request = $this->createAiGatewayBatchRequest($ai_gateway_batch_create_request, $hostIndex, $variables, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\OpenAPI\Client\Model\AiGatewayBatch' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayBatch' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayBatch', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 402:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 405:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 410:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 422:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 429:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 503:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\OpenAPI\Client\Model\AiGatewayBatch';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayBatch',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 402:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 405:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 410:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 422:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 503:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation createAiGatewayBatchAsync
     *
     * Создание батча
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  \OpenAPI\Client\Model\AiGatewayBatchCreateRequest $ai_gateway_batch_create_request (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createAiGatewayBatch'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createAiGatewayBatchAsync($ai_gateway_batch_create_request, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['createAiGatewayBatch'][0])
    {
        return $this->createAiGatewayBatchAsyncWithHttpInfo($ai_gateway_batch_create_request, $hostIndex, $variables, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createAiGatewayBatchAsyncWithHttpInfo
     *
     * Создание батча
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  \OpenAPI\Client\Model\AiGatewayBatchCreateRequest $ai_gateway_batch_create_request (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createAiGatewayBatch'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createAiGatewayBatchAsyncWithHttpInfo($ai_gateway_batch_create_request, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['createAiGatewayBatch'][0])
    {
        $returnType = '\OpenAPI\Client\Model\AiGatewayBatch';
        $request = $this->createAiGatewayBatchRequest($ai_gateway_batch_create_request, $hostIndex, $variables, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'createAiGatewayBatch'
     *
    * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
    * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  \OpenAPI\Client\Model\AiGatewayBatchCreateRequest $ai_gateway_batch_create_request (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createAiGatewayBatch'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function createAiGatewayBatchRequest($ai_gateway_batch_create_request, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['createAiGatewayBatch'][0])
    {

        // verify the required parameter 'ai_gateway_batch_create_request' is set
        if ($ai_gateway_batch_create_request === null || (is_array($ai_gateway_batch_create_request) && count($ai_gateway_batch_create_request) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $ai_gateway_batch_create_request when calling createAiGatewayBatch'
            );
        }


        $resourcePath = '/v1/batches';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($ai_gateway_batch_create_request)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($ai_gateway_batch_create_request));
            } else {
                $httpBody = $ai_gateway_batch_create_request;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires Bearer authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        # Preserve the original behavior of server indexing.
        if ($hostIndex === null) {
            $hostIndex = $this->hostIndex;
        }

        $hostSettings = $this->getHostSettingsForcreateAiGatewayBatch();

        if ($hostIndex < 0 || $hostIndex >= count($hostSettings)) {
            throw new \InvalidArgumentException("Invalid index {$hostIndex} when selecting the host. Must be less than ".count($hostSettings));
        }
        $operationHost = Configuration::getHostString($hostSettings, $hostIndex, $variables);
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Returns an array of host settings for Operation createAiGatewayBatch
     *
     * @return array an array of host settings
     */
    protected function getHostSettingsForcreateAiGatewayBatch(): array
    {
        return [
            [
                "url" => "https://api.timeweb.ai",
                "description" => "No description provided",
            ]
        ];
    }

    /**
     * Operation createAiGatewayChatCompletion
     *
     * Генерация ответа в диалоге (Chat Completions)
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  array<string,mixed> $request_body request_body (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createAiGatewayChatCompletion'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \OpenAPI\Client\Model\AiGatewayChatCompletion|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError
     */
    public function createAiGatewayChatCompletion($request_body, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['createAiGatewayChatCompletion'][0])
    {
        list($response) = $this->createAiGatewayChatCompletionWithHttpInfo($request_body, $hostIndex, $variables, $contentType);
        return $response;
    }

    /**
     * Operation createAiGatewayChatCompletionWithHttpInfo
     *
     * Генерация ответа в диалоге (Chat Completions)
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  array<string,mixed> $request_body (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createAiGatewayChatCompletion'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPI\Client\Model\AiGatewayChatCompletion|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError, HTTP status code, HTTP response headers (array of strings)
     */
    public function createAiGatewayChatCompletionWithHttpInfo($request_body, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['createAiGatewayChatCompletion'][0])
    {
        $request = $this->createAiGatewayChatCompletionRequest($request_body, $hostIndex, $variables, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\OpenAPI\Client\Model\AiGatewayChatCompletion' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayChatCompletion' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayChatCompletion', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 402:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 410:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 422:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 429:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 503:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\OpenAPI\Client\Model\AiGatewayChatCompletion';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayChatCompletion',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 402:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 410:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 422:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 503:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation createAiGatewayChatCompletionAsync
     *
     * Генерация ответа в диалоге (Chat Completions)
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  array<string,mixed> $request_body (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createAiGatewayChatCompletion'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createAiGatewayChatCompletionAsync($request_body, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['createAiGatewayChatCompletion'][0])
    {
        return $this->createAiGatewayChatCompletionAsyncWithHttpInfo($request_body, $hostIndex, $variables, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createAiGatewayChatCompletionAsyncWithHttpInfo
     *
     * Генерация ответа в диалоге (Chat Completions)
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  array<string,mixed> $request_body (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createAiGatewayChatCompletion'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createAiGatewayChatCompletionAsyncWithHttpInfo($request_body, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['createAiGatewayChatCompletion'][0])
    {
        $returnType = '\OpenAPI\Client\Model\AiGatewayChatCompletion';
        $request = $this->createAiGatewayChatCompletionRequest($request_body, $hostIndex, $variables, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'createAiGatewayChatCompletion'
     *
    * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
    * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  array<string,mixed> $request_body (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createAiGatewayChatCompletion'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function createAiGatewayChatCompletionRequest($request_body, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['createAiGatewayChatCompletion'][0])
    {

        // verify the required parameter 'request_body' is set
        if ($request_body === null || (is_array($request_body) && count($request_body) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $request_body when calling createAiGatewayChatCompletion'
            );
        }


        $resourcePath = '/v1/chat/completions';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            ['application/json', 'text/event-stream', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($request_body)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($request_body));
            } else {
                $httpBody = $request_body;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires Bearer authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        # Preserve the original behavior of server indexing.
        if ($hostIndex === null) {
            $hostIndex = $this->hostIndex;
        }

        $hostSettings = $this->getHostSettingsForcreateAiGatewayChatCompletion();

        if ($hostIndex < 0 || $hostIndex >= count($hostSettings)) {
            throw new \InvalidArgumentException("Invalid index {$hostIndex} when selecting the host. Must be less than ".count($hostSettings));
        }
        $operationHost = Configuration::getHostString($hostSettings, $hostIndex, $variables);
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Returns an array of host settings for Operation createAiGatewayChatCompletion
     *
     * @return array an array of host settings
     */
    protected function getHostSettingsForcreateAiGatewayChatCompletion(): array
    {
        return [
            [
                "url" => "https://api.timeweb.ai",
                "description" => "No description provided",
            ]
        ];
    }

    /**
     * Operation createAiGatewayCompletion
     *
     * Продолжение текста (Completions)
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  array<string,mixed> $request_body request_body (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createAiGatewayCompletion'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \OpenAPI\Client\Model\AiGatewayCompletion|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError
     */
    public function createAiGatewayCompletion($request_body, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['createAiGatewayCompletion'][0])
    {
        list($response) = $this->createAiGatewayCompletionWithHttpInfo($request_body, $hostIndex, $variables, $contentType);
        return $response;
    }

    /**
     * Operation createAiGatewayCompletionWithHttpInfo
     *
     * Продолжение текста (Completions)
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  array<string,mixed> $request_body (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createAiGatewayCompletion'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPI\Client\Model\AiGatewayCompletion|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError, HTTP status code, HTTP response headers (array of strings)
     */
    public function createAiGatewayCompletionWithHttpInfo($request_body, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['createAiGatewayCompletion'][0])
    {
        $request = $this->createAiGatewayCompletionRequest($request_body, $hostIndex, $variables, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\OpenAPI\Client\Model\AiGatewayCompletion' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayCompletion' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayCompletion', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 402:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 422:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 429:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 503:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\OpenAPI\Client\Model\AiGatewayCompletion';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayCompletion',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 402:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 422:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 503:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation createAiGatewayCompletionAsync
     *
     * Продолжение текста (Completions)
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  array<string,mixed> $request_body (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createAiGatewayCompletion'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createAiGatewayCompletionAsync($request_body, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['createAiGatewayCompletion'][0])
    {
        return $this->createAiGatewayCompletionAsyncWithHttpInfo($request_body, $hostIndex, $variables, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createAiGatewayCompletionAsyncWithHttpInfo
     *
     * Продолжение текста (Completions)
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  array<string,mixed> $request_body (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createAiGatewayCompletion'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createAiGatewayCompletionAsyncWithHttpInfo($request_body, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['createAiGatewayCompletion'][0])
    {
        $returnType = '\OpenAPI\Client\Model\AiGatewayCompletion';
        $request = $this->createAiGatewayCompletionRequest($request_body, $hostIndex, $variables, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'createAiGatewayCompletion'
     *
    * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
    * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  array<string,mixed> $request_body (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createAiGatewayCompletion'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function createAiGatewayCompletionRequest($request_body, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['createAiGatewayCompletion'][0])
    {

        // verify the required parameter 'request_body' is set
        if ($request_body === null || (is_array($request_body) && count($request_body) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $request_body when calling createAiGatewayCompletion'
            );
        }


        $resourcePath = '/v1/completions';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            ['application/json', 'text/event-stream', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($request_body)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($request_body));
            } else {
                $httpBody = $request_body;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires Bearer authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        # Preserve the original behavior of server indexing.
        if ($hostIndex === null) {
            $hostIndex = $this->hostIndex;
        }

        $hostSettings = $this->getHostSettingsForcreateAiGatewayCompletion();

        if ($hostIndex < 0 || $hostIndex >= count($hostSettings)) {
            throw new \InvalidArgumentException("Invalid index {$hostIndex} when selecting the host. Must be less than ".count($hostSettings));
        }
        $operationHost = Configuration::getHostString($hostSettings, $hostIndex, $variables);
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Returns an array of host settings for Operation createAiGatewayCompletion
     *
     * @return array an array of host settings
     */
    protected function getHostSettingsForcreateAiGatewayCompletion(): array
    {
        return [
            [
                "url" => "https://api.timeweb.ai",
                "description" => "No description provided",
            ]
        ];
    }

    /**
     * Operation createAiGatewayEmbedding
     *
     * Получение эмбеддингов
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  array<string,mixed> $request_body request_body (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createAiGatewayEmbedding'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \OpenAPI\Client\Model\AiGatewayEmbeddingList|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError
     */
    public function createAiGatewayEmbedding($request_body, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['createAiGatewayEmbedding'][0])
    {
        list($response) = $this->createAiGatewayEmbeddingWithHttpInfo($request_body, $hostIndex, $variables, $contentType);
        return $response;
    }

    /**
     * Operation createAiGatewayEmbeddingWithHttpInfo
     *
     * Получение эмбеддингов
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  array<string,mixed> $request_body (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createAiGatewayEmbedding'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPI\Client\Model\AiGatewayEmbeddingList|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError, HTTP status code, HTTP response headers (array of strings)
     */
    public function createAiGatewayEmbeddingWithHttpInfo($request_body, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['createAiGatewayEmbedding'][0])
    {
        $request = $this->createAiGatewayEmbeddingRequest($request_body, $hostIndex, $variables, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\OpenAPI\Client\Model\AiGatewayEmbeddingList' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayEmbeddingList' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayEmbeddingList', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 402:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 410:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 422:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 429:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 503:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\OpenAPI\Client\Model\AiGatewayEmbeddingList';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayEmbeddingList',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 402:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 410:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 422:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 503:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation createAiGatewayEmbeddingAsync
     *
     * Получение эмбеддингов
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  array<string,mixed> $request_body (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createAiGatewayEmbedding'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createAiGatewayEmbeddingAsync($request_body, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['createAiGatewayEmbedding'][0])
    {
        return $this->createAiGatewayEmbeddingAsyncWithHttpInfo($request_body, $hostIndex, $variables, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createAiGatewayEmbeddingAsyncWithHttpInfo
     *
     * Получение эмбеддингов
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  array<string,mixed> $request_body (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createAiGatewayEmbedding'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createAiGatewayEmbeddingAsyncWithHttpInfo($request_body, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['createAiGatewayEmbedding'][0])
    {
        $returnType = '\OpenAPI\Client\Model\AiGatewayEmbeddingList';
        $request = $this->createAiGatewayEmbeddingRequest($request_body, $hostIndex, $variables, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'createAiGatewayEmbedding'
     *
    * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
    * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  array<string,mixed> $request_body (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createAiGatewayEmbedding'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function createAiGatewayEmbeddingRequest($request_body, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['createAiGatewayEmbedding'][0])
    {

        // verify the required parameter 'request_body' is set
        if ($request_body === null || (is_array($request_body) && count($request_body) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $request_body when calling createAiGatewayEmbedding'
            );
        }


        $resourcePath = '/v1/embeddings';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($request_body)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($request_body));
            } else {
                $httpBody = $request_body;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires Bearer authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        # Preserve the original behavior of server indexing.
        if ($hostIndex === null) {
            $hostIndex = $this->hostIndex;
        }

        $hostSettings = $this->getHostSettingsForcreateAiGatewayEmbedding();

        if ($hostIndex < 0 || $hostIndex >= count($hostSettings)) {
            throw new \InvalidArgumentException("Invalid index {$hostIndex} when selecting the host. Must be less than ".count($hostSettings));
        }
        $operationHost = Configuration::getHostString($hostSettings, $hostIndex, $variables);
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Returns an array of host settings for Operation createAiGatewayEmbedding
     *
     * @return array an array of host settings
     */
    protected function getHostSettingsForcreateAiGatewayEmbedding(): array
    {
        return [
            [
                "url" => "https://api.timeweb.ai",
                "description" => "No description provided",
            ]
        ];
    }

    /**
     * Operation createAiGatewayImage
     *
     * Генерация изображений
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  array<string,mixed> $request_body request_body (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createAiGatewayImage'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \OpenAPI\Client\Model\AiGatewayImagesResponse|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError
     */
    public function createAiGatewayImage($request_body, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['createAiGatewayImage'][0])
    {
        list($response) = $this->createAiGatewayImageWithHttpInfo($request_body, $hostIndex, $variables, $contentType);
        return $response;
    }

    /**
     * Operation createAiGatewayImageWithHttpInfo
     *
     * Генерация изображений
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  array<string,mixed> $request_body (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createAiGatewayImage'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPI\Client\Model\AiGatewayImagesResponse|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError, HTTP status code, HTTP response headers (array of strings)
     */
    public function createAiGatewayImageWithHttpInfo($request_body, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['createAiGatewayImage'][0])
    {
        $request = $this->createAiGatewayImageRequest($request_body, $hostIndex, $variables, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\OpenAPI\Client\Model\AiGatewayImagesResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayImagesResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayImagesResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 402:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 410:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 422:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 429:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 503:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\OpenAPI\Client\Model\AiGatewayImagesResponse';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayImagesResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 402:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 410:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 422:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 503:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation createAiGatewayImageAsync
     *
     * Генерация изображений
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  array<string,mixed> $request_body (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createAiGatewayImage'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createAiGatewayImageAsync($request_body, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['createAiGatewayImage'][0])
    {
        return $this->createAiGatewayImageAsyncWithHttpInfo($request_body, $hostIndex, $variables, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createAiGatewayImageAsyncWithHttpInfo
     *
     * Генерация изображений
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  array<string,mixed> $request_body (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createAiGatewayImage'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createAiGatewayImageAsyncWithHttpInfo($request_body, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['createAiGatewayImage'][0])
    {
        $returnType = '\OpenAPI\Client\Model\AiGatewayImagesResponse';
        $request = $this->createAiGatewayImageRequest($request_body, $hostIndex, $variables, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'createAiGatewayImage'
     *
    * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
    * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  array<string,mixed> $request_body (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createAiGatewayImage'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function createAiGatewayImageRequest($request_body, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['createAiGatewayImage'][0])
    {

        // verify the required parameter 'request_body' is set
        if ($request_body === null || (is_array($request_body) && count($request_body) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $request_body when calling createAiGatewayImage'
            );
        }


        $resourcePath = '/v1/images/generations';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($request_body)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($request_body));
            } else {
                $httpBody = $request_body;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires Bearer authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        # Preserve the original behavior of server indexing.
        if ($hostIndex === null) {
            $hostIndex = $this->hostIndex;
        }

        $hostSettings = $this->getHostSettingsForcreateAiGatewayImage();

        if ($hostIndex < 0 || $hostIndex >= count($hostSettings)) {
            throw new \InvalidArgumentException("Invalid index {$hostIndex} when selecting the host. Must be less than ".count($hostSettings));
        }
        $operationHost = Configuration::getHostString($hostSettings, $hostIndex, $variables);
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Returns an array of host settings for Operation createAiGatewayImage
     *
     * @return array an array of host settings
     */
    protected function getHostSettingsForcreateAiGatewayImage(): array
    {
        return [
            [
                "url" => "https://api.timeweb.ai",
                "description" => "No description provided",
            ]
        ];
    }

    /**
     * Operation createAiGatewayImageEdit
     *
     * Редактирование изображений
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  string $model ID модели: GPT Image (&#x60;openai/gpt-image-*&#x60;) или FLUX.2 (&#x60;black_forest_labs/flux-2-*&#x60;) (required)
     * @param  \SplFileObject $image Исходное изображение или несколько файлов в поле &#x60;image[]&#x60; (required)
     * @param  string $prompt Что изменить (required)
     * @param  \SplFileObject $mask Маска: прозрачные области будут изменены (optional)
     * @param  int $n Количество изображений (optional, default to 1)
     * @param  string $size Размер изображения (optional)
     * @param  string $quality Качество изображения (optional)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createAiGatewayImageEdit'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \OpenAPI\Client\Model\AiGatewayImagesResponse|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError
     */
    public function createAiGatewayImageEdit($model, $image, $prompt, $mask = null, $n = 1, $size = null, $quality = null, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['createAiGatewayImageEdit'][0])
    {
        list($response) = $this->createAiGatewayImageEditWithHttpInfo($model, $image, $prompt, $mask, $n, $size, $quality, $hostIndex, $variables, $contentType);
        return $response;
    }

    /**
     * Operation createAiGatewayImageEditWithHttpInfo
     *
     * Редактирование изображений
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  string $model ID модели: GPT Image (&#x60;openai/gpt-image-*&#x60;) или FLUX.2 (&#x60;black_forest_labs/flux-2-*&#x60;) (required)
     * @param  \SplFileObject $image Исходное изображение или несколько файлов в поле &#x60;image[]&#x60; (required)
     * @param  string $prompt Что изменить (required)
     * @param  \SplFileObject $mask Маска: прозрачные области будут изменены (optional)
     * @param  int $n Количество изображений (optional, default to 1)
     * @param  string $size Размер изображения (optional)
     * @param  string $quality Качество изображения (optional)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createAiGatewayImageEdit'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPI\Client\Model\AiGatewayImagesResponse|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError, HTTP status code, HTTP response headers (array of strings)
     */
    public function createAiGatewayImageEditWithHttpInfo($model, $image, $prompt, $mask = null, $n = 1, $size = null, $quality = null, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['createAiGatewayImageEdit'][0])
    {
        $request = $this->createAiGatewayImageEditRequest($model, $image, $prompt, $mask, $n, $size, $quality, $hostIndex, $variables, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\OpenAPI\Client\Model\AiGatewayImagesResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayImagesResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayImagesResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 402:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 405:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 410:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 422:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 429:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 503:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\OpenAPI\Client\Model\AiGatewayImagesResponse';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayImagesResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 402:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 405:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 410:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 422:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 503:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation createAiGatewayImageEditAsync
     *
     * Редактирование изображений
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  string $model ID модели: GPT Image (&#x60;openai/gpt-image-*&#x60;) или FLUX.2 (&#x60;black_forest_labs/flux-2-*&#x60;) (required)
     * @param  \SplFileObject $image Исходное изображение или несколько файлов в поле &#x60;image[]&#x60; (required)
     * @param  string $prompt Что изменить (required)
     * @param  \SplFileObject $mask Маска: прозрачные области будут изменены (optional)
     * @param  int $n Количество изображений (optional, default to 1)
     * @param  string $size Размер изображения (optional)
     * @param  string $quality Качество изображения (optional)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createAiGatewayImageEdit'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createAiGatewayImageEditAsync($model, $image, $prompt, $mask = null, $n = 1, $size = null, $quality = null, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['createAiGatewayImageEdit'][0])
    {
        return $this->createAiGatewayImageEditAsyncWithHttpInfo($model, $image, $prompt, $mask, $n, $size, $quality, $hostIndex, $variables, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createAiGatewayImageEditAsyncWithHttpInfo
     *
     * Редактирование изображений
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  string $model ID модели: GPT Image (&#x60;openai/gpt-image-*&#x60;) или FLUX.2 (&#x60;black_forest_labs/flux-2-*&#x60;) (required)
     * @param  \SplFileObject $image Исходное изображение или несколько файлов в поле &#x60;image[]&#x60; (required)
     * @param  string $prompt Что изменить (required)
     * @param  \SplFileObject $mask Маска: прозрачные области будут изменены (optional)
     * @param  int $n Количество изображений (optional, default to 1)
     * @param  string $size Размер изображения (optional)
     * @param  string $quality Качество изображения (optional)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createAiGatewayImageEdit'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createAiGatewayImageEditAsyncWithHttpInfo($model, $image, $prompt, $mask = null, $n = 1, $size = null, $quality = null, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['createAiGatewayImageEdit'][0])
    {
        $returnType = '\OpenAPI\Client\Model\AiGatewayImagesResponse';
        $request = $this->createAiGatewayImageEditRequest($model, $image, $prompt, $mask, $n, $size, $quality, $hostIndex, $variables, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'createAiGatewayImageEdit'
     *
    * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
    * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  string $model ID модели: GPT Image (&#x60;openai/gpt-image-*&#x60;) или FLUX.2 (&#x60;black_forest_labs/flux-2-*&#x60;) (required)
     * @param  \SplFileObject $image Исходное изображение или несколько файлов в поле &#x60;image[]&#x60; (required)
     * @param  string $prompt Что изменить (required)
     * @param  \SplFileObject $mask Маска: прозрачные области будут изменены (optional)
     * @param  int $n Количество изображений (optional, default to 1)
     * @param  string $size Размер изображения (optional)
     * @param  string $quality Качество изображения (optional)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createAiGatewayImageEdit'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function createAiGatewayImageEditRequest($model, $image, $prompt, $mask = null, $n = 1, $size = null, $quality = null, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['createAiGatewayImageEdit'][0])
    {

        // verify the required parameter 'model' is set
        if ($model === null || (is_array($model) && count($model) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $model when calling createAiGatewayImageEdit'
            );
        }

        // verify the required parameter 'image' is set
        if ($image === null || (is_array($image) && count($image) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $image when calling createAiGatewayImageEdit'
            );
        }

        // verify the required parameter 'prompt' is set
        if ($prompt === null || (is_array($prompt) && count($prompt) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $prompt when calling createAiGatewayImageEdit'
            );
        }


        if ($n !== null && $n < 1) {
            throw new \InvalidArgumentException('invalid value for "$n" when calling AIGatewayInferenceApi.createAiGatewayImageEdit, must be bigger than or equal to 1.');
        }
        



        $resourcePath = '/v1/images/edits';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;




        // form params
        if ($model !== null) {
            $formParams['model'] = ObjectSerializer::toFormValue($model);
        }
        // form params
        if ($image !== null) {
            $multipart = true;
            $formParams['image'] = [];
            $paramFiles = is_array($image) ? $image : [$image];
            foreach ($paramFiles as $paramFile) {
                $formParams['image'][] = \GuzzleHttp\Psr7\Utils::tryFopen(
                    ObjectSerializer::toFormValue($paramFile),
                    'rb'
                );
            }
        }
        // form params
        if ($mask !== null) {
            $multipart = true;
            $formParams['mask'] = [];
            $paramFiles = is_array($mask) ? $mask : [$mask];
            foreach ($paramFiles as $paramFile) {
                $formParams['mask'][] = \GuzzleHttp\Psr7\Utils::tryFopen(
                    ObjectSerializer::toFormValue($paramFile),
                    'rb'
                );
            }
        }
        // form params
        if ($prompt !== null) {
            $formParams['prompt'] = ObjectSerializer::toFormValue($prompt);
        }
        // form params
        if ($n !== null) {
            $formParams['n'] = ObjectSerializer::toFormValue($n);
        }
        // form params
        if ($size !== null) {
            $formParams['size'] = ObjectSerializer::toFormValue($size);
        }
        // form params
        if ($quality !== null) {
            $formParams['quality'] = ObjectSerializer::toFormValue($quality);
        }

        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires Bearer authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        # Preserve the original behavior of server indexing.
        if ($hostIndex === null) {
            $hostIndex = $this->hostIndex;
        }

        $hostSettings = $this->getHostSettingsForcreateAiGatewayImageEdit();

        if ($hostIndex < 0 || $hostIndex >= count($hostSettings)) {
            throw new \InvalidArgumentException("Invalid index {$hostIndex} when selecting the host. Must be less than ".count($hostSettings));
        }
        $operationHost = Configuration::getHostString($hostSettings, $hostIndex, $variables);
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Returns an array of host settings for Operation createAiGatewayImageEdit
     *
     * @return array an array of host settings
     */
    protected function getHostSettingsForcreateAiGatewayImageEdit(): array
    {
        return [
            [
                "url" => "https://api.timeweb.ai",
                "description" => "No description provided",
            ]
        ];
    }

    /**
     * Operation createAiGatewayResponse
     *
     * Создание ответа (Responses API)
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  array<string,mixed> $request_body request_body (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createAiGatewayResponse'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \OpenAPI\Client\Model\AiGatewayResponse|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError
     */
    public function createAiGatewayResponse($request_body, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['createAiGatewayResponse'][0])
    {
        list($response) = $this->createAiGatewayResponseWithHttpInfo($request_body, $hostIndex, $variables, $contentType);
        return $response;
    }

    /**
     * Operation createAiGatewayResponseWithHttpInfo
     *
     * Создание ответа (Responses API)
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  array<string,mixed> $request_body (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createAiGatewayResponse'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPI\Client\Model\AiGatewayResponse|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError, HTTP status code, HTTP response headers (array of strings)
     */
    public function createAiGatewayResponseWithHttpInfo($request_body, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['createAiGatewayResponse'][0])
    {
        $request = $this->createAiGatewayResponseRequest($request_body, $hostIndex, $variables, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\OpenAPI\Client\Model\AiGatewayResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 402:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 410:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 422:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 429:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 503:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\OpenAPI\Client\Model\AiGatewayResponse';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 402:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 410:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 422:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 503:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation createAiGatewayResponseAsync
     *
     * Создание ответа (Responses API)
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  array<string,mixed> $request_body (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createAiGatewayResponse'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createAiGatewayResponseAsync($request_body, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['createAiGatewayResponse'][0])
    {
        return $this->createAiGatewayResponseAsyncWithHttpInfo($request_body, $hostIndex, $variables, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createAiGatewayResponseAsyncWithHttpInfo
     *
     * Создание ответа (Responses API)
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  array<string,mixed> $request_body (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createAiGatewayResponse'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createAiGatewayResponseAsyncWithHttpInfo($request_body, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['createAiGatewayResponse'][0])
    {
        $returnType = '\OpenAPI\Client\Model\AiGatewayResponse';
        $request = $this->createAiGatewayResponseRequest($request_body, $hostIndex, $variables, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'createAiGatewayResponse'
     *
    * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
    * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  array<string,mixed> $request_body (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createAiGatewayResponse'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function createAiGatewayResponseRequest($request_body, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['createAiGatewayResponse'][0])
    {

        // verify the required parameter 'request_body' is set
        if ($request_body === null || (is_array($request_body) && count($request_body) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $request_body when calling createAiGatewayResponse'
            );
        }


        $resourcePath = '/v1/responses';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            ['application/json', 'text/event-stream', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($request_body)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($request_body));
            } else {
                $httpBody = $request_body;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires Bearer authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        # Preserve the original behavior of server indexing.
        if ($hostIndex === null) {
            $hostIndex = $this->hostIndex;
        }

        $hostSettings = $this->getHostSettingsForcreateAiGatewayResponse();

        if ($hostIndex < 0 || $hostIndex >= count($hostSettings)) {
            throw new \InvalidArgumentException("Invalid index {$hostIndex} when selecting the host. Must be less than ".count($hostSettings));
        }
        $operationHost = Configuration::getHostString($hostSettings, $hostIndex, $variables);
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Returns an array of host settings for Operation createAiGatewayResponse
     *
     * @return array an array of host settings
     */
    protected function getHostSettingsForcreateAiGatewayResponse(): array
    {
        return [
            [
                "url" => "https://api.timeweb.ai",
                "description" => "No description provided",
            ]
        ];
    }

    /**
     * Operation createAiGatewaySpeech
     *
     * Синтез речи
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  array<string,mixed> $request_body request_body (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createAiGatewaySpeech'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError
     */
    public function createAiGatewaySpeech($request_body, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['createAiGatewaySpeech'][0])
    {
        list($response) = $this->createAiGatewaySpeechWithHttpInfo($request_body, $hostIndex, $variables, $contentType);
        return $response;
    }

    /**
     * Operation createAiGatewaySpeechWithHttpInfo
     *
     * Синтез речи
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  array<string,mixed> $request_body (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createAiGatewaySpeech'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SplFileObject|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError, HTTP status code, HTTP response headers (array of strings)
     */
    public function createAiGatewaySpeechWithHttpInfo($request_body, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['createAiGatewaySpeech'][0])
    {
        $request = $this->createAiGatewaySpeechRequest($request_body, $hostIndex, $variables, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\SplFileObject' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\SplFileObject' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\SplFileObject', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 402:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 410:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 422:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 429:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 503:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\SplFileObject';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\SplFileObject',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 402:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 410:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 422:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 503:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation createAiGatewaySpeechAsync
     *
     * Синтез речи
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  array<string,mixed> $request_body (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createAiGatewaySpeech'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createAiGatewaySpeechAsync($request_body, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['createAiGatewaySpeech'][0])
    {
        return $this->createAiGatewaySpeechAsyncWithHttpInfo($request_body, $hostIndex, $variables, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createAiGatewaySpeechAsyncWithHttpInfo
     *
     * Синтез речи
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  array<string,mixed> $request_body (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createAiGatewaySpeech'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createAiGatewaySpeechAsyncWithHttpInfo($request_body, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['createAiGatewaySpeech'][0])
    {
        $returnType = '\SplFileObject';
        $request = $this->createAiGatewaySpeechRequest($request_body, $hostIndex, $variables, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'createAiGatewaySpeech'
     *
    * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
    * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  array<string,mixed> $request_body (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createAiGatewaySpeech'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function createAiGatewaySpeechRequest($request_body, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['createAiGatewaySpeech'][0])
    {

        // verify the required parameter 'request_body' is set
        if ($request_body === null || (is_array($request_body) && count($request_body) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $request_body when calling createAiGatewaySpeech'
            );
        }


        $resourcePath = '/v1/audio/speech';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            ['audio/mpeg', 'audio/wav', 'application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($request_body)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($request_body));
            } else {
                $httpBody = $request_body;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires Bearer authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        # Preserve the original behavior of server indexing.
        if ($hostIndex === null) {
            $hostIndex = $this->hostIndex;
        }

        $hostSettings = $this->getHostSettingsForcreateAiGatewaySpeech();

        if ($hostIndex < 0 || $hostIndex >= count($hostSettings)) {
            throw new \InvalidArgumentException("Invalid index {$hostIndex} when selecting the host. Must be less than ".count($hostSettings));
        }
        $operationHost = Configuration::getHostString($hostSettings, $hostIndex, $variables);
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Returns an array of host settings for Operation createAiGatewaySpeech
     *
     * @return array an array of host settings
     */
    protected function getHostSettingsForcreateAiGatewaySpeech(): array
    {
        return [
            [
                "url" => "https://api.timeweb.ai",
                "description" => "No description provided",
            ]
        ];
    }

    /**
     * Operation createAiGatewayTranscription
     *
     * Распознавание речи
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  \SplFileObject $file Аудиофайл (required)
     * @param  string $model ID модели распознавания речи (&#x60;*-transcribe&#x60;) (required)
     * @param  string $language Язык аудио в формате ISO-639-1 (optional)
     * @param  string $prompt Подсказка для распознавания: термины, имена, стиль (optional)
     * @param  string $response_format Формат ответа (optional)
     * @param  float $temperature Температура выборки (optional)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createAiGatewayTranscription'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \OpenAPI\Client\Model\AiGatewayTranscription|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError
     */
    public function createAiGatewayTranscription($file, $model, $language = null, $prompt = null, $response_format = null, $temperature = null, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['createAiGatewayTranscription'][0])
    {
        list($response) = $this->createAiGatewayTranscriptionWithHttpInfo($file, $model, $language, $prompt, $response_format, $temperature, $hostIndex, $variables, $contentType);
        return $response;
    }

    /**
     * Operation createAiGatewayTranscriptionWithHttpInfo
     *
     * Распознавание речи
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  \SplFileObject $file Аудиофайл (required)
     * @param  string $model ID модели распознавания речи (&#x60;*-transcribe&#x60;) (required)
     * @param  string $language Язык аудио в формате ISO-639-1 (optional)
     * @param  string $prompt Подсказка для распознавания: термины, имена, стиль (optional)
     * @param  string $response_format Формат ответа (optional)
     * @param  float $temperature Температура выборки (optional)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createAiGatewayTranscription'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPI\Client\Model\AiGatewayTranscription|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError, HTTP status code, HTTP response headers (array of strings)
     */
    public function createAiGatewayTranscriptionWithHttpInfo($file, $model, $language = null, $prompt = null, $response_format = null, $temperature = null, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['createAiGatewayTranscription'][0])
    {
        $request = $this->createAiGatewayTranscriptionRequest($file, $model, $language, $prompt, $response_format, $temperature, $hostIndex, $variables, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\OpenAPI\Client\Model\AiGatewayTranscription' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayTranscription' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayTranscription', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 402:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 405:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 410:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 422:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 429:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 503:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\OpenAPI\Client\Model\AiGatewayTranscription';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayTranscription',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 402:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 405:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 410:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 422:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 503:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation createAiGatewayTranscriptionAsync
     *
     * Распознавание речи
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  \SplFileObject $file Аудиофайл (required)
     * @param  string $model ID модели распознавания речи (&#x60;*-transcribe&#x60;) (required)
     * @param  string $language Язык аудио в формате ISO-639-1 (optional)
     * @param  string $prompt Подсказка для распознавания: термины, имена, стиль (optional)
     * @param  string $response_format Формат ответа (optional)
     * @param  float $temperature Температура выборки (optional)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createAiGatewayTranscription'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createAiGatewayTranscriptionAsync($file, $model, $language = null, $prompt = null, $response_format = null, $temperature = null, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['createAiGatewayTranscription'][0])
    {
        return $this->createAiGatewayTranscriptionAsyncWithHttpInfo($file, $model, $language, $prompt, $response_format, $temperature, $hostIndex, $variables, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createAiGatewayTranscriptionAsyncWithHttpInfo
     *
     * Распознавание речи
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  \SplFileObject $file Аудиофайл (required)
     * @param  string $model ID модели распознавания речи (&#x60;*-transcribe&#x60;) (required)
     * @param  string $language Язык аудио в формате ISO-639-1 (optional)
     * @param  string $prompt Подсказка для распознавания: термины, имена, стиль (optional)
     * @param  string $response_format Формат ответа (optional)
     * @param  float $temperature Температура выборки (optional)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createAiGatewayTranscription'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createAiGatewayTranscriptionAsyncWithHttpInfo($file, $model, $language = null, $prompt = null, $response_format = null, $temperature = null, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['createAiGatewayTranscription'][0])
    {
        $returnType = '\OpenAPI\Client\Model\AiGatewayTranscription';
        $request = $this->createAiGatewayTranscriptionRequest($file, $model, $language, $prompt, $response_format, $temperature, $hostIndex, $variables, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'createAiGatewayTranscription'
     *
    * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
    * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  \SplFileObject $file Аудиофайл (required)
     * @param  string $model ID модели распознавания речи (&#x60;*-transcribe&#x60;) (required)
     * @param  string $language Язык аудио в формате ISO-639-1 (optional)
     * @param  string $prompt Подсказка для распознавания: термины, имена, стиль (optional)
     * @param  string $response_format Формат ответа (optional)
     * @param  float $temperature Температура выборки (optional)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createAiGatewayTranscription'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function createAiGatewayTranscriptionRequest($file, $model, $language = null, $prompt = null, $response_format = null, $temperature = null, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['createAiGatewayTranscription'][0])
    {

        // verify the required parameter 'file' is set
        if ($file === null || (is_array($file) && count($file) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $file when calling createAiGatewayTranscription'
            );
        }

        // verify the required parameter 'model' is set
        if ($model === null || (is_array($model) && count($model) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $model when calling createAiGatewayTranscription'
            );
        }






        $resourcePath = '/v1/audio/transcriptions';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;




        // form params
        if ($file !== null) {
            $multipart = true;
            $formParams['file'] = [];
            $paramFiles = is_array($file) ? $file : [$file];
            foreach ($paramFiles as $paramFile) {
                $formParams['file'][] = \GuzzleHttp\Psr7\Utils::tryFopen(
                    ObjectSerializer::toFormValue($paramFile),
                    'rb'
                );
            }
        }
        // form params
        if ($model !== null) {
            $formParams['model'] = ObjectSerializer::toFormValue($model);
        }
        // form params
        if ($language !== null) {
            $formParams['language'] = ObjectSerializer::toFormValue($language);
        }
        // form params
        if ($prompt !== null) {
            $formParams['prompt'] = ObjectSerializer::toFormValue($prompt);
        }
        // form params
        if ($response_format !== null) {
            $formParams['response_format'] = ObjectSerializer::toFormValue($response_format);
        }
        // form params
        if ($temperature !== null) {
            $formParams['temperature'] = ObjectSerializer::toFormValue($temperature);
        }

        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires Bearer authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        # Preserve the original behavior of server indexing.
        if ($hostIndex === null) {
            $hostIndex = $this->hostIndex;
        }

        $hostSettings = $this->getHostSettingsForcreateAiGatewayTranscription();

        if ($hostIndex < 0 || $hostIndex >= count($hostSettings)) {
            throw new \InvalidArgumentException("Invalid index {$hostIndex} when selecting the host. Must be less than ".count($hostSettings));
        }
        $operationHost = Configuration::getHostString($hostSettings, $hostIndex, $variables);
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Returns an array of host settings for Operation createAiGatewayTranscription
     *
     * @return array an array of host settings
     */
    protected function getHostSettingsForcreateAiGatewayTranscription(): array
    {
        return [
            [
                "url" => "https://api.timeweb.ai",
                "description" => "No description provided",
            ]
        ];
    }

    /**
     * Operation deleteAiGatewayFile
     *
     * Удаление файла
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  string $file_id ID файла (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteAiGatewayFile'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \OpenAPI\Client\Model\AiGatewayFileDeleted|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError
     */
    public function deleteAiGatewayFile($file_id, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['deleteAiGatewayFile'][0])
    {
        list($response) = $this->deleteAiGatewayFileWithHttpInfo($file_id, $hostIndex, $variables, $contentType);
        return $response;
    }

    /**
     * Operation deleteAiGatewayFileWithHttpInfo
     *
     * Удаление файла
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  string $file_id ID файла (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteAiGatewayFile'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPI\Client\Model\AiGatewayFileDeleted|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteAiGatewayFileWithHttpInfo($file_id, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['deleteAiGatewayFile'][0])
    {
        $request = $this->deleteAiGatewayFileRequest($file_id, $hostIndex, $variables, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\OpenAPI\Client\Model\AiGatewayFileDeleted' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayFileDeleted' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayFileDeleted', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 409:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\OpenAPI\Client\Model\AiGatewayFileDeleted';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayFileDeleted',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 409:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation deleteAiGatewayFileAsync
     *
     * Удаление файла
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  string $file_id ID файла (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteAiGatewayFile'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteAiGatewayFileAsync($file_id, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['deleteAiGatewayFile'][0])
    {
        return $this->deleteAiGatewayFileAsyncWithHttpInfo($file_id, $hostIndex, $variables, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation deleteAiGatewayFileAsyncWithHttpInfo
     *
     * Удаление файла
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  string $file_id ID файла (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteAiGatewayFile'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteAiGatewayFileAsyncWithHttpInfo($file_id, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['deleteAiGatewayFile'][0])
    {
        $returnType = '\OpenAPI\Client\Model\AiGatewayFileDeleted';
        $request = $this->deleteAiGatewayFileRequest($file_id, $hostIndex, $variables, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'deleteAiGatewayFile'
     *
    * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
    * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  string $file_id ID файла (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteAiGatewayFile'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function deleteAiGatewayFileRequest($file_id, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['deleteAiGatewayFile'][0])
    {

        // verify the required parameter 'file_id' is set
        if ($file_id === null || (is_array($file_id) && count($file_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $file_id when calling deleteAiGatewayFile'
            );
        }


        $resourcePath = '/v1/files/{file_id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($file_id !== null) {
            $resourcePath = str_replace(
                '{' . 'file_id' . '}',
                ObjectSerializer::toPathValue($file_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires Bearer authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        # Preserve the original behavior of server indexing.
        if ($hostIndex === null) {
            $hostIndex = $this->hostIndex;
        }

        $hostSettings = $this->getHostSettingsFordeleteAiGatewayFile();

        if ($hostIndex < 0 || $hostIndex >= count($hostSettings)) {
            throw new \InvalidArgumentException("Invalid index {$hostIndex} when selecting the host. Must be less than ".count($hostSettings));
        }
        $operationHost = Configuration::getHostString($hostSettings, $hostIndex, $variables);
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'DELETE',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Returns an array of host settings for Operation deleteAiGatewayFile
     *
     * @return array an array of host settings
     */
    protected function getHostSettingsFordeleteAiGatewayFile(): array
    {
        return [
            [
                "url" => "https://api.timeweb.ai",
                "description" => "No description provided",
            ]
        ];
    }

    /**
     * Operation deleteAiGatewayResponse
     *
     * Удаление ответа (Responses API)
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  string $response_id ID ответа Responses API (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteAiGatewayResponse'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \OpenAPI\Client\Model\AiGatewayResponseDeleted|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError
     */
    public function deleteAiGatewayResponse($response_id, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['deleteAiGatewayResponse'][0])
    {
        list($response) = $this->deleteAiGatewayResponseWithHttpInfo($response_id, $hostIndex, $variables, $contentType);
        return $response;
    }

    /**
     * Operation deleteAiGatewayResponseWithHttpInfo
     *
     * Удаление ответа (Responses API)
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  string $response_id ID ответа Responses API (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteAiGatewayResponse'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPI\Client\Model\AiGatewayResponseDeleted|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteAiGatewayResponseWithHttpInfo($response_id, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['deleteAiGatewayResponse'][0])
    {
        $request = $this->deleteAiGatewayResponseRequest($response_id, $hostIndex, $variables, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\OpenAPI\Client\Model\AiGatewayResponseDeleted' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayResponseDeleted' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayResponseDeleted', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\OpenAPI\Client\Model\AiGatewayResponseDeleted';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayResponseDeleted',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation deleteAiGatewayResponseAsync
     *
     * Удаление ответа (Responses API)
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  string $response_id ID ответа Responses API (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteAiGatewayResponse'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteAiGatewayResponseAsync($response_id, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['deleteAiGatewayResponse'][0])
    {
        return $this->deleteAiGatewayResponseAsyncWithHttpInfo($response_id, $hostIndex, $variables, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation deleteAiGatewayResponseAsyncWithHttpInfo
     *
     * Удаление ответа (Responses API)
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  string $response_id ID ответа Responses API (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteAiGatewayResponse'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteAiGatewayResponseAsyncWithHttpInfo($response_id, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['deleteAiGatewayResponse'][0])
    {
        $returnType = '\OpenAPI\Client\Model\AiGatewayResponseDeleted';
        $request = $this->deleteAiGatewayResponseRequest($response_id, $hostIndex, $variables, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'deleteAiGatewayResponse'
     *
    * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
    * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  string $response_id ID ответа Responses API (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteAiGatewayResponse'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function deleteAiGatewayResponseRequest($response_id, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['deleteAiGatewayResponse'][0])
    {

        // verify the required parameter 'response_id' is set
        if ($response_id === null || (is_array($response_id) && count($response_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $response_id when calling deleteAiGatewayResponse'
            );
        }


        $resourcePath = '/v1/responses/{response_id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($response_id !== null) {
            $resourcePath = str_replace(
                '{' . 'response_id' . '}',
                ObjectSerializer::toPathValue($response_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires Bearer authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        # Preserve the original behavior of server indexing.
        if ($hostIndex === null) {
            $hostIndex = $this->hostIndex;
        }

        $hostSettings = $this->getHostSettingsFordeleteAiGatewayResponse();

        if ($hostIndex < 0 || $hostIndex >= count($hostSettings)) {
            throw new \InvalidArgumentException("Invalid index {$hostIndex} when selecting the host. Must be less than ".count($hostSettings));
        }
        $operationHost = Configuration::getHostString($hostSettings, $hostIndex, $variables);
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'DELETE',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Returns an array of host settings for Operation deleteAiGatewayResponse
     *
     * @return array an array of host settings
     */
    protected function getHostSettingsFordeleteAiGatewayResponse(): array
    {
        return [
            [
                "url" => "https://api.timeweb.ai",
                "description" => "No description provided",
            ]
        ];
    }

    /**
     * Operation downloadAiGatewayFileContent
     *
     * Скачивание файла
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  string $file_id ID файла (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['downloadAiGatewayFileContent'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError
     */
    public function downloadAiGatewayFileContent($file_id, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['downloadAiGatewayFileContent'][0])
    {
        list($response) = $this->downloadAiGatewayFileContentWithHttpInfo($file_id, $hostIndex, $variables, $contentType);
        return $response;
    }

    /**
     * Operation downloadAiGatewayFileContentWithHttpInfo
     *
     * Скачивание файла
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  string $file_id ID файла (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['downloadAiGatewayFileContent'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SplFileObject|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError, HTTP status code, HTTP response headers (array of strings)
     */
    public function downloadAiGatewayFileContentWithHttpInfo($file_id, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['downloadAiGatewayFileContent'][0])
    {
        $request = $this->downloadAiGatewayFileContentRequest($file_id, $hostIndex, $variables, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\SplFileObject' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\SplFileObject' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\SplFileObject', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\SplFileObject';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\SplFileObject',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation downloadAiGatewayFileContentAsync
     *
     * Скачивание файла
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  string $file_id ID файла (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['downloadAiGatewayFileContent'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function downloadAiGatewayFileContentAsync($file_id, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['downloadAiGatewayFileContent'][0])
    {
        return $this->downloadAiGatewayFileContentAsyncWithHttpInfo($file_id, $hostIndex, $variables, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation downloadAiGatewayFileContentAsyncWithHttpInfo
     *
     * Скачивание файла
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  string $file_id ID файла (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['downloadAiGatewayFileContent'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function downloadAiGatewayFileContentAsyncWithHttpInfo($file_id, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['downloadAiGatewayFileContent'][0])
    {
        $returnType = '\SplFileObject';
        $request = $this->downloadAiGatewayFileContentRequest($file_id, $hostIndex, $variables, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'downloadAiGatewayFileContent'
     *
    * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
    * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  string $file_id ID файла (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['downloadAiGatewayFileContent'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function downloadAiGatewayFileContentRequest($file_id, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['downloadAiGatewayFileContent'][0])
    {

        // verify the required parameter 'file_id' is set
        if ($file_id === null || (is_array($file_id) && count($file_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $file_id when calling downloadAiGatewayFileContent'
            );
        }


        $resourcePath = '/v1/files/{file_id}/content';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($file_id !== null) {
            $resourcePath = str_replace(
                '{' . 'file_id' . '}',
                ObjectSerializer::toPathValue($file_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/octet-stream', 'application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires Bearer authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        # Preserve the original behavior of server indexing.
        if ($hostIndex === null) {
            $hostIndex = $this->hostIndex;
        }

        $hostSettings = $this->getHostSettingsFordownloadAiGatewayFileContent();

        if ($hostIndex < 0 || $hostIndex >= count($hostSettings)) {
            throw new \InvalidArgumentException("Invalid index {$hostIndex} when selecting the host. Must be less than ".count($hostSettings));
        }
        $operationHost = Configuration::getHostString($hostSettings, $hostIndex, $variables);
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Returns an array of host settings for Operation downloadAiGatewayFileContent
     *
     * @return array an array of host settings
     */
    protected function getHostSettingsFordownloadAiGatewayFileContent(): array
    {
        return [
            [
                "url" => "https://api.timeweb.ai",
                "description" => "No description provided",
            ]
        ];
    }

    /**
     * Operation getAiGatewayBatch
     *
     * Получение батча
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  string $batch_id ID батча (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAiGatewayBatch'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \OpenAPI\Client\Model\AiGatewayBatch|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError
     */
    public function getAiGatewayBatch($batch_id, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['getAiGatewayBatch'][0])
    {
        list($response) = $this->getAiGatewayBatchWithHttpInfo($batch_id, $hostIndex, $variables, $contentType);
        return $response;
    }

    /**
     * Operation getAiGatewayBatchWithHttpInfo
     *
     * Получение батча
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  string $batch_id ID батча (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAiGatewayBatch'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPI\Client\Model\AiGatewayBatch|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError, HTTP status code, HTTP response headers (array of strings)
     */
    public function getAiGatewayBatchWithHttpInfo($batch_id, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['getAiGatewayBatch'][0])
    {
        $request = $this->getAiGatewayBatchRequest($batch_id, $hostIndex, $variables, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\OpenAPI\Client\Model\AiGatewayBatch' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayBatch' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayBatch', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 503:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\OpenAPI\Client\Model\AiGatewayBatch';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayBatch',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 503:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getAiGatewayBatchAsync
     *
     * Получение батча
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  string $batch_id ID батча (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAiGatewayBatch'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getAiGatewayBatchAsync($batch_id, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['getAiGatewayBatch'][0])
    {
        return $this->getAiGatewayBatchAsyncWithHttpInfo($batch_id, $hostIndex, $variables, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getAiGatewayBatchAsyncWithHttpInfo
     *
     * Получение батча
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  string $batch_id ID батча (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAiGatewayBatch'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getAiGatewayBatchAsyncWithHttpInfo($batch_id, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['getAiGatewayBatch'][0])
    {
        $returnType = '\OpenAPI\Client\Model\AiGatewayBatch';
        $request = $this->getAiGatewayBatchRequest($batch_id, $hostIndex, $variables, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getAiGatewayBatch'
     *
    * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
    * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  string $batch_id ID батча (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAiGatewayBatch'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getAiGatewayBatchRequest($batch_id, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['getAiGatewayBatch'][0])
    {

        // verify the required parameter 'batch_id' is set
        if ($batch_id === null || (is_array($batch_id) && count($batch_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $batch_id when calling getAiGatewayBatch'
            );
        }


        $resourcePath = '/v1/batches/{batch_id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($batch_id !== null) {
            $resourcePath = str_replace(
                '{' . 'batch_id' . '}',
                ObjectSerializer::toPathValue($batch_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires Bearer authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        # Preserve the original behavior of server indexing.
        if ($hostIndex === null) {
            $hostIndex = $this->hostIndex;
        }

        $hostSettings = $this->getHostSettingsForgetAiGatewayBatch();

        if ($hostIndex < 0 || $hostIndex >= count($hostSettings)) {
            throw new \InvalidArgumentException("Invalid index {$hostIndex} when selecting the host. Must be less than ".count($hostSettings));
        }
        $operationHost = Configuration::getHostString($hostSettings, $hostIndex, $variables);
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Returns an array of host settings for Operation getAiGatewayBatch
     *
     * @return array an array of host settings
     */
    protected function getHostSettingsForgetAiGatewayBatch(): array
    {
        return [
            [
                "url" => "https://api.timeweb.ai",
                "description" => "No description provided",
            ]
        ];
    }

    /**
     * Operation getAiGatewayBatches
     *
     * Получение списка батчей
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  int $limit Количество батчей на странице (optional)
     * @param  string $after Вернуть батчи после батча с этим ID (значение &#x60;last_id&#x60; предыдущей страницы) (optional)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAiGatewayBatches'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \OpenAPI\Client\Model\AiGatewayBatchList|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayValidationError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError
     */
    public function getAiGatewayBatches($limit = null, $after = null, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['getAiGatewayBatches'][0])
    {
        list($response) = $this->getAiGatewayBatchesWithHttpInfo($limit, $after, $hostIndex, $variables, $contentType);
        return $response;
    }

    /**
     * Operation getAiGatewayBatchesWithHttpInfo
     *
     * Получение списка батчей
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  int $limit Количество батчей на странице (optional)
     * @param  string $after Вернуть батчи после батча с этим ID (значение &#x60;last_id&#x60; предыдущей страницы) (optional)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAiGatewayBatches'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPI\Client\Model\AiGatewayBatchList|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayValidationError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError, HTTP status code, HTTP response headers (array of strings)
     */
    public function getAiGatewayBatchesWithHttpInfo($limit = null, $after = null, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['getAiGatewayBatches'][0])
    {
        $request = $this->getAiGatewayBatchesRequest($limit, $after, $hostIndex, $variables, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\OpenAPI\Client\Model\AiGatewayBatchList' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayBatchList' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayBatchList', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 422:
                    if ('\OpenAPI\Client\Model\AiGatewayValidationError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayValidationError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayValidationError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 503:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\OpenAPI\Client\Model\AiGatewayBatchList';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayBatchList',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 422:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayValidationError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 503:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getAiGatewayBatchesAsync
     *
     * Получение списка батчей
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  int $limit Количество батчей на странице (optional)
     * @param  string $after Вернуть батчи после батча с этим ID (значение &#x60;last_id&#x60; предыдущей страницы) (optional)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAiGatewayBatches'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getAiGatewayBatchesAsync($limit = null, $after = null, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['getAiGatewayBatches'][0])
    {
        return $this->getAiGatewayBatchesAsyncWithHttpInfo($limit, $after, $hostIndex, $variables, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getAiGatewayBatchesAsyncWithHttpInfo
     *
     * Получение списка батчей
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  int $limit Количество батчей на странице (optional)
     * @param  string $after Вернуть батчи после батча с этим ID (значение &#x60;last_id&#x60; предыдущей страницы) (optional)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAiGatewayBatches'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getAiGatewayBatchesAsyncWithHttpInfo($limit = null, $after = null, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['getAiGatewayBatches'][0])
    {
        $returnType = '\OpenAPI\Client\Model\AiGatewayBatchList';
        $request = $this->getAiGatewayBatchesRequest($limit, $after, $hostIndex, $variables, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getAiGatewayBatches'
     *
    * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
    * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  int $limit Количество батчей на странице (optional)
     * @param  string $after Вернуть батчи после батча с этим ID (значение &#x60;last_id&#x60; предыдущей страницы) (optional)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAiGatewayBatches'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getAiGatewayBatchesRequest($limit = null, $after = null, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['getAiGatewayBatches'][0])
    {

        if ($limit !== null && $limit > 100) {
            throw new \InvalidArgumentException('invalid value for "$limit" when calling AIGatewayInferenceApi.getAiGatewayBatches, must be smaller than or equal to 100.');
        }
        if ($limit !== null && $limit < 1) {
            throw new \InvalidArgumentException('invalid value for "$limit" when calling AIGatewayInferenceApi.getAiGatewayBatches, must be bigger than or equal to 1.');
        }
        


        $resourcePath = '/v1/batches';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $limit,
            'limit', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $after,
            'after', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);




        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires Bearer authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        # Preserve the original behavior of server indexing.
        if ($hostIndex === null) {
            $hostIndex = $this->hostIndex;
        }

        $hostSettings = $this->getHostSettingsForgetAiGatewayBatches();

        if ($hostIndex < 0 || $hostIndex >= count($hostSettings)) {
            throw new \InvalidArgumentException("Invalid index {$hostIndex} when selecting the host. Must be less than ".count($hostSettings));
        }
        $operationHost = Configuration::getHostString($hostSettings, $hostIndex, $variables);
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Returns an array of host settings for Operation getAiGatewayBatches
     *
     * @return array an array of host settings
     */
    protected function getHostSettingsForgetAiGatewayBatches(): array
    {
        return [
            [
                "url" => "https://api.timeweb.ai",
                "description" => "No description provided",
            ]
        ];
    }

    /**
     * Operation getAiGatewayFile
     *
     * Получение информации о файле
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  string $file_id ID файла (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAiGatewayFile'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \OpenAPI\Client\Model\AiGatewayFile|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError
     */
    public function getAiGatewayFile($file_id, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['getAiGatewayFile'][0])
    {
        list($response) = $this->getAiGatewayFileWithHttpInfo($file_id, $hostIndex, $variables, $contentType);
        return $response;
    }

    /**
     * Operation getAiGatewayFileWithHttpInfo
     *
     * Получение информации о файле
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  string $file_id ID файла (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAiGatewayFile'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPI\Client\Model\AiGatewayFile|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError, HTTP status code, HTTP response headers (array of strings)
     */
    public function getAiGatewayFileWithHttpInfo($file_id, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['getAiGatewayFile'][0])
    {
        $request = $this->getAiGatewayFileRequest($file_id, $hostIndex, $variables, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\OpenAPI\Client\Model\AiGatewayFile' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayFile' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayFile', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\OpenAPI\Client\Model\AiGatewayFile';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayFile',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getAiGatewayFileAsync
     *
     * Получение информации о файле
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  string $file_id ID файла (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAiGatewayFile'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getAiGatewayFileAsync($file_id, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['getAiGatewayFile'][0])
    {
        return $this->getAiGatewayFileAsyncWithHttpInfo($file_id, $hostIndex, $variables, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getAiGatewayFileAsyncWithHttpInfo
     *
     * Получение информации о файле
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  string $file_id ID файла (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAiGatewayFile'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getAiGatewayFileAsyncWithHttpInfo($file_id, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['getAiGatewayFile'][0])
    {
        $returnType = '\OpenAPI\Client\Model\AiGatewayFile';
        $request = $this->getAiGatewayFileRequest($file_id, $hostIndex, $variables, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getAiGatewayFile'
     *
    * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
    * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  string $file_id ID файла (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAiGatewayFile'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getAiGatewayFileRequest($file_id, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['getAiGatewayFile'][0])
    {

        // verify the required parameter 'file_id' is set
        if ($file_id === null || (is_array($file_id) && count($file_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $file_id when calling getAiGatewayFile'
            );
        }


        $resourcePath = '/v1/files/{file_id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($file_id !== null) {
            $resourcePath = str_replace(
                '{' . 'file_id' . '}',
                ObjectSerializer::toPathValue($file_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires Bearer authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        # Preserve the original behavior of server indexing.
        if ($hostIndex === null) {
            $hostIndex = $this->hostIndex;
        }

        $hostSettings = $this->getHostSettingsForgetAiGatewayFile();

        if ($hostIndex < 0 || $hostIndex >= count($hostSettings)) {
            throw new \InvalidArgumentException("Invalid index {$hostIndex} when selecting the host. Must be less than ".count($hostSettings));
        }
        $operationHost = Configuration::getHostString($hostSettings, $hostIndex, $variables);
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Returns an array of host settings for Operation getAiGatewayFile
     *
     * @return array an array of host settings
     */
    protected function getHostSettingsForgetAiGatewayFile(): array
    {
        return [
            [
                "url" => "https://api.timeweb.ai",
                "description" => "No description provided",
            ]
        ];
    }

    /**
     * Operation getAiGatewayModels
     *
     * Получение списка моделей AI Gateway
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAiGatewayModels'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \OpenAPI\Client\Model\AiGatewayModelList|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError
     */
    public function getAiGatewayModels(?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['getAiGatewayModels'][0])
    {
        list($response) = $this->getAiGatewayModelsWithHttpInfo($hostIndex, $variables, $contentType);
        return $response;
    }

    /**
     * Operation getAiGatewayModelsWithHttpInfo
     *
     * Получение списка моделей AI Gateway
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAiGatewayModels'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPI\Client\Model\AiGatewayModelList|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError, HTTP status code, HTTP response headers (array of strings)
     */
    public function getAiGatewayModelsWithHttpInfo(?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['getAiGatewayModels'][0])
    {
        $request = $this->getAiGatewayModelsRequest($hostIndex, $variables, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\OpenAPI\Client\Model\AiGatewayModelList' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayModelList' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayModelList', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\OpenAPI\Client\Model\AiGatewayModelList';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayModelList',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getAiGatewayModelsAsync
     *
     * Получение списка моделей AI Gateway
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAiGatewayModels'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getAiGatewayModelsAsync(?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['getAiGatewayModels'][0])
    {
        return $this->getAiGatewayModelsAsyncWithHttpInfo($hostIndex, $variables, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getAiGatewayModelsAsyncWithHttpInfo
     *
     * Получение списка моделей AI Gateway
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAiGatewayModels'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getAiGatewayModelsAsyncWithHttpInfo(?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['getAiGatewayModels'][0])
    {
        $returnType = '\OpenAPI\Client\Model\AiGatewayModelList';
        $request = $this->getAiGatewayModelsRequest($hostIndex, $variables, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getAiGatewayModels'
     *
    * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
    * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAiGatewayModels'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getAiGatewayModelsRequest(?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['getAiGatewayModels'][0])
    {


        $resourcePath = '/v1/models';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires Bearer authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        # Preserve the original behavior of server indexing.
        if ($hostIndex === null) {
            $hostIndex = $this->hostIndex;
        }

        $hostSettings = $this->getHostSettingsForgetAiGatewayModels();

        if ($hostIndex < 0 || $hostIndex >= count($hostSettings)) {
            throw new \InvalidArgumentException("Invalid index {$hostIndex} when selecting the host. Must be less than ".count($hostSettings));
        }
        $operationHost = Configuration::getHostString($hostSettings, $hostIndex, $variables);
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Returns an array of host settings for Operation getAiGatewayModels
     *
     * @return array an array of host settings
     */
    protected function getHostSettingsForgetAiGatewayModels(): array
    {
        return [
            [
                "url" => "https://api.timeweb.ai",
                "description" => "No description provided",
            ]
        ];
    }

    /**
     * Operation getAiGatewayResponse
     *
     * Получение ответа (Responses API)
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  string $response_id ID ответа Responses API (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAiGatewayResponse'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \OpenAPI\Client\Model\AiGatewayResponse|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError
     */
    public function getAiGatewayResponse($response_id, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['getAiGatewayResponse'][0])
    {
        list($response) = $this->getAiGatewayResponseWithHttpInfo($response_id, $hostIndex, $variables, $contentType);
        return $response;
    }

    /**
     * Operation getAiGatewayResponseWithHttpInfo
     *
     * Получение ответа (Responses API)
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  string $response_id ID ответа Responses API (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAiGatewayResponse'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPI\Client\Model\AiGatewayResponse|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError, HTTP status code, HTTP response headers (array of strings)
     */
    public function getAiGatewayResponseWithHttpInfo($response_id, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['getAiGatewayResponse'][0])
    {
        $request = $this->getAiGatewayResponseRequest($response_id, $hostIndex, $variables, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\OpenAPI\Client\Model\AiGatewayResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\OpenAPI\Client\Model\AiGatewayResponse';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getAiGatewayResponseAsync
     *
     * Получение ответа (Responses API)
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  string $response_id ID ответа Responses API (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAiGatewayResponse'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getAiGatewayResponseAsync($response_id, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['getAiGatewayResponse'][0])
    {
        return $this->getAiGatewayResponseAsyncWithHttpInfo($response_id, $hostIndex, $variables, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getAiGatewayResponseAsyncWithHttpInfo
     *
     * Получение ответа (Responses API)
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  string $response_id ID ответа Responses API (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAiGatewayResponse'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getAiGatewayResponseAsyncWithHttpInfo($response_id, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['getAiGatewayResponse'][0])
    {
        $returnType = '\OpenAPI\Client\Model\AiGatewayResponse';
        $request = $this->getAiGatewayResponseRequest($response_id, $hostIndex, $variables, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getAiGatewayResponse'
     *
    * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
    * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  string $response_id ID ответа Responses API (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAiGatewayResponse'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getAiGatewayResponseRequest($response_id, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['getAiGatewayResponse'][0])
    {

        // verify the required parameter 'response_id' is set
        if ($response_id === null || (is_array($response_id) && count($response_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $response_id when calling getAiGatewayResponse'
            );
        }


        $resourcePath = '/v1/responses/{response_id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($response_id !== null) {
            $resourcePath = str_replace(
                '{' . 'response_id' . '}',
                ObjectSerializer::toPathValue($response_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires Bearer authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        # Preserve the original behavior of server indexing.
        if ($hostIndex === null) {
            $hostIndex = $this->hostIndex;
        }

        $hostSettings = $this->getHostSettingsForgetAiGatewayResponse();

        if ($hostIndex < 0 || $hostIndex >= count($hostSettings)) {
            throw new \InvalidArgumentException("Invalid index {$hostIndex} when selecting the host. Must be less than ".count($hostSettings));
        }
        $operationHost = Configuration::getHostString($hostSettings, $hostIndex, $variables);
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Returns an array of host settings for Operation getAiGatewayResponse
     *
     * @return array an array of host settings
     */
    protected function getHostSettingsForgetAiGatewayResponse(): array
    {
        return [
            [
                "url" => "https://api.timeweb.ai",
                "description" => "No description provided",
            ]
        ];
    }

    /**
     * Operation uploadAiGatewayFile
     *
     * Загрузка файла
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  \SplFileObject $file Файл. Для Batch API — JSONL, по одному запросу в строке (required)
     * @param  string $purpose Назначение: &#x60;batch&#x60; — входной файл Batch API, &#x60;user_data&#x60; и другие назначения OpenAI — файлы для передачи модели (required)
     * @param  string $model Модель, для которой загружается файл. Обязателен, если не передан &#x60;target_model_names&#x60; (optional)
     * @param  string $target_model_names Список моделей через запятую — вместо &#x60;model&#x60; (optional)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['uploadAiGatewayFile'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \OpenAPI\Client\Model\AiGatewayFile|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayValidationError|\OpenAPI\Client\Model\AiGatewayError
     */
    public function uploadAiGatewayFile($file, $purpose, $model = null, $target_model_names = null, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['uploadAiGatewayFile'][0])
    {
        list($response) = $this->uploadAiGatewayFileWithHttpInfo($file, $purpose, $model, $target_model_names, $hostIndex, $variables, $contentType);
        return $response;
    }

    /**
     * Operation uploadAiGatewayFileWithHttpInfo
     *
     * Загрузка файла
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  \SplFileObject $file Файл. Для Batch API — JSONL, по одному запросу в строке (required)
     * @param  string $purpose Назначение: &#x60;batch&#x60; — входной файл Batch API, &#x60;user_data&#x60; и другие назначения OpenAI — файлы для передачи модели (required)
     * @param  string $model Модель, для которой загружается файл. Обязателен, если не передан &#x60;target_model_names&#x60; (optional)
     * @param  string $target_model_names Список моделей через запятую — вместо &#x60;model&#x60; (optional)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['uploadAiGatewayFile'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPI\Client\Model\AiGatewayFile|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayError|\OpenAPI\Client\Model\AiGatewayValidationError|\OpenAPI\Client\Model\AiGatewayError, HTTP status code, HTTP response headers (array of strings)
     */
    public function uploadAiGatewayFileWithHttpInfo($file, $purpose, $model = null, $target_model_names = null, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['uploadAiGatewayFile'][0])
    {
        $request = $this->uploadAiGatewayFileRequest($file, $purpose, $model, $target_model_names, $hostIndex, $variables, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\OpenAPI\Client\Model\AiGatewayFile' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayFile' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayFile', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 422:
                    if ('\OpenAPI\Client\Model\AiGatewayValidationError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayValidationError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayValidationError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\OpenAPI\Client\Model\AiGatewayError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AiGatewayError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AiGatewayError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\OpenAPI\Client\Model\AiGatewayFile';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayFile',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 422:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayValidationError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AiGatewayError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation uploadAiGatewayFileAsync
     *
     * Загрузка файла
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  \SplFileObject $file Файл. Для Batch API — JSONL, по одному запросу в строке (required)
     * @param  string $purpose Назначение: &#x60;batch&#x60; — входной файл Batch API, &#x60;user_data&#x60; и другие назначения OpenAI — файлы для передачи модели (required)
     * @param  string $model Модель, для которой загружается файл. Обязателен, если не передан &#x60;target_model_names&#x60; (optional)
     * @param  string $target_model_names Список моделей через запятую — вместо &#x60;model&#x60; (optional)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['uploadAiGatewayFile'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function uploadAiGatewayFileAsync($file, $purpose, $model = null, $target_model_names = null, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['uploadAiGatewayFile'][0])
    {
        return $this->uploadAiGatewayFileAsyncWithHttpInfo($file, $purpose, $model, $target_model_names, $hostIndex, $variables, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation uploadAiGatewayFileAsyncWithHttpInfo
     *
     * Загрузка файла
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  \SplFileObject $file Файл. Для Batch API — JSONL, по одному запросу в строке (required)
     * @param  string $purpose Назначение: &#x60;batch&#x60; — входной файл Batch API, &#x60;user_data&#x60; и другие назначения OpenAI — файлы для передачи модели (required)
     * @param  string $model Модель, для которой загружается файл. Обязателен, если не передан &#x60;target_model_names&#x60; (optional)
     * @param  string $target_model_names Список моделей через запятую — вместо &#x60;model&#x60; (optional)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['uploadAiGatewayFile'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function uploadAiGatewayFileAsyncWithHttpInfo($file, $purpose, $model = null, $target_model_names = null, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['uploadAiGatewayFile'][0])
    {
        $returnType = '\OpenAPI\Client\Model\AiGatewayFile';
        $request = $this->uploadAiGatewayFileRequest($file, $purpose, $model, $target_model_names, $hostIndex, $variables, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'uploadAiGatewayFile'
     *
    * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
    * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.ai
     *
     * @param  \SplFileObject $file Файл. Для Batch API — JSONL, по одному запросу в строке (required)
     * @param  string $purpose Назначение: &#x60;batch&#x60; — входной файл Batch API, &#x60;user_data&#x60; и другие назначения OpenAI — файлы для передачи модели (required)
     * @param  string $model Модель, для которой загружается файл. Обязателен, если не передан &#x60;target_model_names&#x60; (optional)
     * @param  string $target_model_names Список моделей через запятую — вместо &#x60;model&#x60; (optional)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['uploadAiGatewayFile'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function uploadAiGatewayFileRequest($file, $purpose, $model = null, $target_model_names = null, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['uploadAiGatewayFile'][0])
    {

        // verify the required parameter 'file' is set
        if ($file === null || (is_array($file) && count($file) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $file when calling uploadAiGatewayFile'
            );
        }

        // verify the required parameter 'purpose' is set
        if ($purpose === null || (is_array($purpose) && count($purpose) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $purpose when calling uploadAiGatewayFile'
            );
        }




        $resourcePath = '/v1/files';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;




        // form params
        if ($file !== null) {
            $multipart = true;
            $formParams['file'] = [];
            $paramFiles = is_array($file) ? $file : [$file];
            foreach ($paramFiles as $paramFile) {
                $formParams['file'][] = \GuzzleHttp\Psr7\Utils::tryFopen(
                    ObjectSerializer::toFormValue($paramFile),
                    'rb'
                );
            }
        }
        // form params
        if ($purpose !== null) {
            $formParams['purpose'] = ObjectSerializer::toFormValue($purpose);
        }
        // form params
        if ($model !== null) {
            $formParams['model'] = ObjectSerializer::toFormValue($model);
        }
        // form params
        if ($target_model_names !== null) {
            $formParams['target_model_names'] = ObjectSerializer::toFormValue($target_model_names);
        }

        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires Bearer authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        # Preserve the original behavior of server indexing.
        if ($hostIndex === null) {
            $hostIndex = $this->hostIndex;
        }

        $hostSettings = $this->getHostSettingsForuploadAiGatewayFile();

        if ($hostIndex < 0 || $hostIndex >= count($hostSettings)) {
            throw new \InvalidArgumentException("Invalid index {$hostIndex} when selecting the host. Must be less than ".count($hostSettings));
        }
        $operationHost = Configuration::getHostString($hostSettings, $hostIndex, $variables);
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Returns an array of host settings for Operation uploadAiGatewayFile
     *
     * @return array an array of host settings
     */
    protected function getHostSettingsForuploadAiGatewayFile(): array
    {
        return [
            [
                "url" => "https://api.timeweb.ai",
                "description" => "No description provided",
            ]
        ];
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
