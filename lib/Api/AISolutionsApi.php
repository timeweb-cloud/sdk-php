<?php
/**
 * AISolutionsApi
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
 * AISolutionsApi Class Doc Comment
 *
 * @category Class
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class AISolutionsApi
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
        'addAiSolutionTelegramBot' => [
            'application/json',
        ],
        'approveAiSolutionTelegramPairing' => [
            'application/json',
        ],
        'createAiSolution' => [
            'application/json',
        ],
        'deleteAiSolution' => [
            'application/json',
        ],
        'getAiSolution' => [
            'application/json',
        ],
        'getAiSolutionChatFullHistory' => [
            'application/json',
        ],
        'getAiSolutionChatHistory' => [
            'application/json',
        ],
        'getAiSolutionChatStatus' => [
            'application/json',
        ],
        'getAiSolutionMainChatHistory' => [
            'application/json',
        ],
        'listAiSolutionConversations' => [
            'application/json',
        ],
        'listAiSolutionTelegramBots' => [
            'application/json',
        ],
        'listAiSolutionTypes' => [
            'application/json',
        ],
        'listAiSolutions' => [
            'application/json',
        ],
        'regenerateAiSolutionAiKey' => [
            'application/json',
        ],
        'removeAiSolutionTelegramBot' => [
            'application/json',
        ],
        'resetAiSolutionChat' => [
            'application/json',
        ],
        'sendAiSolutionMessage' => [
            'application/json',
        ],
        'shutdownAiSolution' => [
            'application/json',
        ],
        'startAiSolution' => [
            'application/json',
        ],
        'stopAiSolutionChat' => [
            'application/json',
        ],
        'streamAiSolutionChat' => [
            'application/json',
        ],
        'updateAiSolution' => [
            'application/json',
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
     * Operation addAiSolutionTelegramBot
     *
     * Подключение Telegram-бота к AI-решению
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  \OpenAPI\Client\Model\ConnectTelegram $connect_telegram connect_telegram (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['addAiSolutionTelegramBot'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \OpenAPI\Client\Model\AddAiSolutionTelegramBot201Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\GetAccountStatus403Response|\OpenAPI\Client\Model\GetImage404Response|\OpenAPI\Client\Model\UpdateDatabaseInstance409Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response|\OpenAPI\Client\Model\ErrorResponse|\OpenAPI\Client\Model\ErrorResponse
     */
    public function addAiSolutionTelegramBot($solution_id, $connect_telegram, string $contentType = self::contentTypes['addAiSolutionTelegramBot'][0])
    {
        list($response) = $this->addAiSolutionTelegramBotWithHttpInfo($solution_id, $connect_telegram, $contentType);
        return $response;
    }

    /**
     * Operation addAiSolutionTelegramBotWithHttpInfo
     *
     * Подключение Telegram-бота к AI-решению
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  \OpenAPI\Client\Model\ConnectTelegram $connect_telegram (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['addAiSolutionTelegramBot'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPI\Client\Model\AddAiSolutionTelegramBot201Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\GetAccountStatus403Response|\OpenAPI\Client\Model\GetImage404Response|\OpenAPI\Client\Model\UpdateDatabaseInstance409Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response|\OpenAPI\Client\Model\ErrorResponse|\OpenAPI\Client\Model\ErrorResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function addAiSolutionTelegramBotWithHttpInfo($solution_id, $connect_telegram, string $contentType = self::contentTypes['addAiSolutionTelegramBot'][0])
    {
        $request = $this->addAiSolutionTelegramBotRequest($solution_id, $connect_telegram, $contentType);

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
                case 201:
                    if ('\OpenAPI\Client\Model\AddAiSolutionTelegramBot201Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\AddAiSolutionTelegramBot201Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\AddAiSolutionTelegramBot201Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\OpenAPI\Client\Model\GetFinances400Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances400Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances400Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\OpenAPI\Client\Model\GetFinances401Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances401Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances401Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\OpenAPI\Client\Model\GetAccountStatus403Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetAccountStatus403Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetAccountStatus403Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\OpenAPI\Client\Model\GetImage404Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetImage404Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetImage404Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 409:
                    if ('\OpenAPI\Client\Model\UpdateDatabaseInstance409Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\UpdateDatabaseInstance409Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\UpdateDatabaseInstance409Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 429:
                    if ('\OpenAPI\Client\Model\GetFinances429Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances429Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances429Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\OpenAPI\Client\Model\GetFinances500Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances500Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances500Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 502:
                    if ('\OpenAPI\Client\Model\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\ErrorResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 503:
                    if ('\OpenAPI\Client\Model\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\ErrorResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\OpenAPI\Client\Model\AddAiSolutionTelegramBot201Response';
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
                case 201:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\AddAiSolutionTelegramBot201Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances400Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances401Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetAccountStatus403Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetImage404Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 409:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\UpdateDatabaseInstance409Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances429Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances500Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 502:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 503:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation addAiSolutionTelegramBotAsync
     *
     * Подключение Telegram-бота к AI-решению
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  \OpenAPI\Client\Model\ConnectTelegram $connect_telegram (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['addAiSolutionTelegramBot'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function addAiSolutionTelegramBotAsync($solution_id, $connect_telegram, string $contentType = self::contentTypes['addAiSolutionTelegramBot'][0])
    {
        return $this->addAiSolutionTelegramBotAsyncWithHttpInfo($solution_id, $connect_telegram, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation addAiSolutionTelegramBotAsyncWithHttpInfo
     *
     * Подключение Telegram-бота к AI-решению
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  \OpenAPI\Client\Model\ConnectTelegram $connect_telegram (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['addAiSolutionTelegramBot'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function addAiSolutionTelegramBotAsyncWithHttpInfo($solution_id, $connect_telegram, string $contentType = self::contentTypes['addAiSolutionTelegramBot'][0])
    {
        $returnType = '\OpenAPI\Client\Model\AddAiSolutionTelegramBot201Response';
        $request = $this->addAiSolutionTelegramBotRequest($solution_id, $connect_telegram, $contentType);

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
     * Create request for operation 'addAiSolutionTelegramBot'
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  \OpenAPI\Client\Model\ConnectTelegram $connect_telegram (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['addAiSolutionTelegramBot'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function addAiSolutionTelegramBotRequest($solution_id, $connect_telegram, string $contentType = self::contentTypes['addAiSolutionTelegramBot'][0])
    {

        // verify the required parameter 'solution_id' is set
        if ($solution_id === null || (is_array($solution_id) && count($solution_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $solution_id when calling addAiSolutionTelegramBot'
            );
        }
        if ($solution_id < 1) {
            throw new \InvalidArgumentException('invalid value for "$solution_id" when calling AISolutionsApi.addAiSolutionTelegramBot, must be bigger than or equal to 1.');
        }
        
        // verify the required parameter 'connect_telegram' is set
        if ($connect_telegram === null || (is_array($connect_telegram) && count($connect_telegram) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $connect_telegram when calling addAiSolutionTelegramBot'
            );
        }


        $resourcePath = '/api/v1/cloud-ai/solutions/{solution_id}/telegram/bots';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($solution_id !== null) {
            $resourcePath = str_replace(
                '{' . 'solution_id' . '}',
                ObjectSerializer::toPathValue($solution_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($connect_telegram)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($connect_telegram));
            } else {
                $httpBody = $connect_telegram;
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

        // this endpoint requires Bearer (JWT) authentication (access token)
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

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation approveAiSolutionTelegramPairing
     *
     * Подтверждение владельца Telegram-бота AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $account_key ID Telegram-бота в решении (&#x60;account_key&#x60; из списка ботов) в формате &#x60;b&lt;число&gt;&#x60;, например &#x60;b123456789&#x60; (required)
     * @param  \OpenAPI\Client\Model\ApproveTelegramPairing $approve_telegram_pairing approve_telegram_pairing (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['approveAiSolutionTelegramPairing'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function approveAiSolutionTelegramPairing($solution_id, $account_key, $approve_telegram_pairing, string $contentType = self::contentTypes['approveAiSolutionTelegramPairing'][0])
    {
        $this->approveAiSolutionTelegramPairingWithHttpInfo($solution_id, $account_key, $approve_telegram_pairing, $contentType);
    }

    /**
     * Operation approveAiSolutionTelegramPairingWithHttpInfo
     *
     * Подтверждение владельца Telegram-бота AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $account_key ID Telegram-бота в решении (&#x60;account_key&#x60; из списка ботов) в формате &#x60;b&lt;число&gt;&#x60;, например &#x60;b123456789&#x60; (required)
     * @param  \OpenAPI\Client\Model\ApproveTelegramPairing $approve_telegram_pairing (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['approveAiSolutionTelegramPairing'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function approveAiSolutionTelegramPairingWithHttpInfo($solution_id, $account_key, $approve_telegram_pairing, string $contentType = self::contentTypes['approveAiSolutionTelegramPairing'][0])
    {
        $request = $this->approveAiSolutionTelegramPairingRequest($solution_id, $account_key, $approve_telegram_pairing, $contentType);

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

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances400Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances401Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetAccountStatus403Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetImage404Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances429Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances500Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 502:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 503:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation approveAiSolutionTelegramPairingAsync
     *
     * Подтверждение владельца Telegram-бота AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $account_key ID Telegram-бота в решении (&#x60;account_key&#x60; из списка ботов) в формате &#x60;b&lt;число&gt;&#x60;, например &#x60;b123456789&#x60; (required)
     * @param  \OpenAPI\Client\Model\ApproveTelegramPairing $approve_telegram_pairing (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['approveAiSolutionTelegramPairing'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function approveAiSolutionTelegramPairingAsync($solution_id, $account_key, $approve_telegram_pairing, string $contentType = self::contentTypes['approveAiSolutionTelegramPairing'][0])
    {
        return $this->approveAiSolutionTelegramPairingAsyncWithHttpInfo($solution_id, $account_key, $approve_telegram_pairing, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation approveAiSolutionTelegramPairingAsyncWithHttpInfo
     *
     * Подтверждение владельца Telegram-бота AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $account_key ID Telegram-бота в решении (&#x60;account_key&#x60; из списка ботов) в формате &#x60;b&lt;число&gt;&#x60;, например &#x60;b123456789&#x60; (required)
     * @param  \OpenAPI\Client\Model\ApproveTelegramPairing $approve_telegram_pairing (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['approveAiSolutionTelegramPairing'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function approveAiSolutionTelegramPairingAsyncWithHttpInfo($solution_id, $account_key, $approve_telegram_pairing, string $contentType = self::contentTypes['approveAiSolutionTelegramPairing'][0])
    {
        $returnType = '';
        $request = $this->approveAiSolutionTelegramPairingRequest($solution_id, $account_key, $approve_telegram_pairing, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
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
     * Create request for operation 'approveAiSolutionTelegramPairing'
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $account_key ID Telegram-бота в решении (&#x60;account_key&#x60; из списка ботов) в формате &#x60;b&lt;число&gt;&#x60;, например &#x60;b123456789&#x60; (required)
     * @param  \OpenAPI\Client\Model\ApproveTelegramPairing $approve_telegram_pairing (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['approveAiSolutionTelegramPairing'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function approveAiSolutionTelegramPairingRequest($solution_id, $account_key, $approve_telegram_pairing, string $contentType = self::contentTypes['approveAiSolutionTelegramPairing'][0])
    {

        // verify the required parameter 'solution_id' is set
        if ($solution_id === null || (is_array($solution_id) && count($solution_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $solution_id when calling approveAiSolutionTelegramPairing'
            );
        }
        if ($solution_id < 1) {
            throw new \InvalidArgumentException('invalid value for "$solution_id" when calling AISolutionsApi.approveAiSolutionTelegramPairing, must be bigger than or equal to 1.');
        }
        
        // verify the required parameter 'account_key' is set
        if ($account_key === null || (is_array($account_key) && count($account_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $account_key when calling approveAiSolutionTelegramPairing'
            );
        }

        // verify the required parameter 'approve_telegram_pairing' is set
        if ($approve_telegram_pairing === null || (is_array($approve_telegram_pairing) && count($approve_telegram_pairing) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $approve_telegram_pairing when calling approveAiSolutionTelegramPairing'
            );
        }


        $resourcePath = '/api/v1/cloud-ai/solutions/{solution_id}/telegram/bots/{account_key}/pairing/approve';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($solution_id !== null) {
            $resourcePath = str_replace(
                '{' . 'solution_id' . '}',
                ObjectSerializer::toPathValue($solution_id),
                $resourcePath
            );
        }
        // path params
        if ($account_key !== null) {
            $resourcePath = str_replace(
                '{' . 'account_key' . '}',
                ObjectSerializer::toPathValue($account_key),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($approve_telegram_pairing)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($approve_telegram_pairing));
            } else {
                $httpBody = $approve_telegram_pairing;
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

        // this endpoint requires Bearer (JWT) authentication (access token)
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

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation createAiSolution
     *
     * Создание AI-решения
     *
     * @param  \OpenAPI\Client\Model\CreateAiSolution $create_ai_solution create_ai_solution (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createAiSolution'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \OpenAPI\Client\Model\CreateAiSolution201Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\ErrorResponse|\OpenAPI\Client\Model\GetAccountStatus403Response|\OpenAPI\Client\Model\GetImage404Response|\OpenAPI\Client\Model\UpdateDatabaseInstance409Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response|\OpenAPI\Client\Model\ErrorResponse
     */
    public function createAiSolution($create_ai_solution, string $contentType = self::contentTypes['createAiSolution'][0])
    {
        list($response) = $this->createAiSolutionWithHttpInfo($create_ai_solution, $contentType);
        return $response;
    }

    /**
     * Operation createAiSolutionWithHttpInfo
     *
     * Создание AI-решения
     *
     * @param  \OpenAPI\Client\Model\CreateAiSolution $create_ai_solution (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createAiSolution'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPI\Client\Model\CreateAiSolution201Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\ErrorResponse|\OpenAPI\Client\Model\GetAccountStatus403Response|\OpenAPI\Client\Model\GetImage404Response|\OpenAPI\Client\Model\UpdateDatabaseInstance409Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response|\OpenAPI\Client\Model\ErrorResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function createAiSolutionWithHttpInfo($create_ai_solution, string $contentType = self::contentTypes['createAiSolution'][0])
    {
        $request = $this->createAiSolutionRequest($create_ai_solution, $contentType);

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
                case 201:
                    if ('\OpenAPI\Client\Model\CreateAiSolution201Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\CreateAiSolution201Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\CreateAiSolution201Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\OpenAPI\Client\Model\GetFinances400Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances400Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances400Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\OpenAPI\Client\Model\GetFinances401Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances401Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances401Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 402:
                    if ('\OpenAPI\Client\Model\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\ErrorResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\OpenAPI\Client\Model\GetAccountStatus403Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetAccountStatus403Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetAccountStatus403Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\OpenAPI\Client\Model\GetImage404Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetImage404Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetImage404Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 409:
                    if ('\OpenAPI\Client\Model\UpdateDatabaseInstance409Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\UpdateDatabaseInstance409Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\UpdateDatabaseInstance409Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 429:
                    if ('\OpenAPI\Client\Model\GetFinances429Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances429Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances429Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\OpenAPI\Client\Model\GetFinances500Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances500Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances500Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 503:
                    if ('\OpenAPI\Client\Model\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\ErrorResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\OpenAPI\Client\Model\CreateAiSolution201Response';
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
                case 201:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\CreateAiSolution201Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances400Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances401Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 402:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetAccountStatus403Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetImage404Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 409:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\UpdateDatabaseInstance409Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances429Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances500Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 503:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation createAiSolutionAsync
     *
     * Создание AI-решения
     *
     * @param  \OpenAPI\Client\Model\CreateAiSolution $create_ai_solution (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createAiSolution'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createAiSolutionAsync($create_ai_solution, string $contentType = self::contentTypes['createAiSolution'][0])
    {
        return $this->createAiSolutionAsyncWithHttpInfo($create_ai_solution, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createAiSolutionAsyncWithHttpInfo
     *
     * Создание AI-решения
     *
     * @param  \OpenAPI\Client\Model\CreateAiSolution $create_ai_solution (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createAiSolution'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createAiSolutionAsyncWithHttpInfo($create_ai_solution, string $contentType = self::contentTypes['createAiSolution'][0])
    {
        $returnType = '\OpenAPI\Client\Model\CreateAiSolution201Response';
        $request = $this->createAiSolutionRequest($create_ai_solution, $contentType);

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
     * Create request for operation 'createAiSolution'
     *
     * @param  \OpenAPI\Client\Model\CreateAiSolution $create_ai_solution (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createAiSolution'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function createAiSolutionRequest($create_ai_solution, string $contentType = self::contentTypes['createAiSolution'][0])
    {

        // verify the required parameter 'create_ai_solution' is set
        if ($create_ai_solution === null || (is_array($create_ai_solution) && count($create_ai_solution) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $create_ai_solution when calling createAiSolution'
            );
        }


        $resourcePath = '/api/v1/cloud-ai/solutions';
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
        if (isset($create_ai_solution)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($create_ai_solution));
            } else {
                $httpBody = $create_ai_solution;
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

        // this endpoint requires Bearer (JWT) authentication (access token)
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

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation deleteAiSolution
     *
     * Удаление AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteAiSolution'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function deleteAiSolution($solution_id, string $contentType = self::contentTypes['deleteAiSolution'][0])
    {
        $this->deleteAiSolutionWithHttpInfo($solution_id, $contentType);
    }

    /**
     * Operation deleteAiSolutionWithHttpInfo
     *
     * Удаление AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteAiSolution'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteAiSolutionWithHttpInfo($solution_id, string $contentType = self::contentTypes['deleteAiSolution'][0])
    {
        $request = $this->deleteAiSolutionRequest($solution_id, $contentType);

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

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances400Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances401Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetAccountStatus403Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetImage404Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances429Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances500Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation deleteAiSolutionAsync
     *
     * Удаление AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteAiSolution'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteAiSolutionAsync($solution_id, string $contentType = self::contentTypes['deleteAiSolution'][0])
    {
        return $this->deleteAiSolutionAsyncWithHttpInfo($solution_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation deleteAiSolutionAsyncWithHttpInfo
     *
     * Удаление AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteAiSolution'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteAiSolutionAsyncWithHttpInfo($solution_id, string $contentType = self::contentTypes['deleteAiSolution'][0])
    {
        $returnType = '';
        $request = $this->deleteAiSolutionRequest($solution_id, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
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
     * Create request for operation 'deleteAiSolution'
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteAiSolution'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function deleteAiSolutionRequest($solution_id, string $contentType = self::contentTypes['deleteAiSolution'][0])
    {

        // verify the required parameter 'solution_id' is set
        if ($solution_id === null || (is_array($solution_id) && count($solution_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $solution_id when calling deleteAiSolution'
            );
        }
        if ($solution_id < 1) {
            throw new \InvalidArgumentException('invalid value for "$solution_id" when calling AISolutionsApi.deleteAiSolution, must be bigger than or equal to 1.');
        }
        

        $resourcePath = '/api/v1/cloud-ai/solutions/{solution_id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($solution_id !== null) {
            $resourcePath = str_replace(
                '{' . 'solution_id' . '}',
                ObjectSerializer::toPathValue($solution_id),
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

        // this endpoint requires Bearer (JWT) authentication (access token)
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

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'DELETE',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getAiSolution
     *
     * Получение AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAiSolution'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \OpenAPI\Client\Model\CreateAiSolution201Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\GetAccountStatus403Response|\OpenAPI\Client\Model\GetImage404Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response
     */
    public function getAiSolution($solution_id, string $contentType = self::contentTypes['getAiSolution'][0])
    {
        list($response) = $this->getAiSolutionWithHttpInfo($solution_id, $contentType);
        return $response;
    }

    /**
     * Operation getAiSolutionWithHttpInfo
     *
     * Получение AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAiSolution'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPI\Client\Model\CreateAiSolution201Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\GetAccountStatus403Response|\OpenAPI\Client\Model\GetImage404Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response, HTTP status code, HTTP response headers (array of strings)
     */
    public function getAiSolutionWithHttpInfo($solution_id, string $contentType = self::contentTypes['getAiSolution'][0])
    {
        $request = $this->getAiSolutionRequest($solution_id, $contentType);

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
                    if ('\OpenAPI\Client\Model\CreateAiSolution201Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\CreateAiSolution201Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\CreateAiSolution201Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\OpenAPI\Client\Model\GetFinances400Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances400Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances400Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\OpenAPI\Client\Model\GetFinances401Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances401Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances401Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\OpenAPI\Client\Model\GetAccountStatus403Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetAccountStatus403Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetAccountStatus403Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\OpenAPI\Client\Model\GetImage404Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetImage404Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetImage404Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 429:
                    if ('\OpenAPI\Client\Model\GetFinances429Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances429Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances429Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\OpenAPI\Client\Model\GetFinances500Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances500Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances500Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\OpenAPI\Client\Model\CreateAiSolution201Response';
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
                        '\OpenAPI\Client\Model\CreateAiSolution201Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances400Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances401Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetAccountStatus403Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetImage404Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances429Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances500Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getAiSolutionAsync
     *
     * Получение AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAiSolution'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getAiSolutionAsync($solution_id, string $contentType = self::contentTypes['getAiSolution'][0])
    {
        return $this->getAiSolutionAsyncWithHttpInfo($solution_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getAiSolutionAsyncWithHttpInfo
     *
     * Получение AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAiSolution'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getAiSolutionAsyncWithHttpInfo($solution_id, string $contentType = self::contentTypes['getAiSolution'][0])
    {
        $returnType = '\OpenAPI\Client\Model\CreateAiSolution201Response';
        $request = $this->getAiSolutionRequest($solution_id, $contentType);

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
     * Create request for operation 'getAiSolution'
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAiSolution'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getAiSolutionRequest($solution_id, string $contentType = self::contentTypes['getAiSolution'][0])
    {

        // verify the required parameter 'solution_id' is set
        if ($solution_id === null || (is_array($solution_id) && count($solution_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $solution_id when calling getAiSolution'
            );
        }
        if ($solution_id < 1) {
            throw new \InvalidArgumentException('invalid value for "$solution_id" when calling AISolutionsApi.getAiSolution, must be bigger than or equal to 1.');
        }
        

        $resourcePath = '/api/v1/cloud-ai/solutions/{solution_id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($solution_id !== null) {
            $resourcePath = str_replace(
                '{' . 'solution_id' . '}',
                ObjectSerializer::toPathValue($solution_id),
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

        // this endpoint requires Bearer (JWT) authentication (access token)
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

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getAiSolutionChatFullHistory
     *
     * Получение всей истории чата AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  int $limit Количество сообщений на странице, от 1 до 10 000 (optional, default to 100)
     * @param  int $offset Количество сообщений, которые нужно пропустить (optional, default to 0)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAiSolutionChatFullHistory'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \OpenAPI\Client\Model\GetAiSolutionMainChatHistory200Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\GetAccountStatus403Response|\OpenAPI\Client\Model\GetImage404Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response
     */
    public function getAiSolutionChatFullHistory($solution_id, $limit = 100, $offset = 0, string $contentType = self::contentTypes['getAiSolutionChatFullHistory'][0])
    {
        list($response) = $this->getAiSolutionChatFullHistoryWithHttpInfo($solution_id, $limit, $offset, $contentType);
        return $response;
    }

    /**
     * Operation getAiSolutionChatFullHistoryWithHttpInfo
     *
     * Получение всей истории чата AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  int $limit Количество сообщений на странице, от 1 до 10 000 (optional, default to 100)
     * @param  int $offset Количество сообщений, которые нужно пропустить (optional, default to 0)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAiSolutionChatFullHistory'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPI\Client\Model\GetAiSolutionMainChatHistory200Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\GetAccountStatus403Response|\OpenAPI\Client\Model\GetImage404Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response, HTTP status code, HTTP response headers (array of strings)
     */
    public function getAiSolutionChatFullHistoryWithHttpInfo($solution_id, $limit = 100, $offset = 0, string $contentType = self::contentTypes['getAiSolutionChatFullHistory'][0])
    {
        $request = $this->getAiSolutionChatFullHistoryRequest($solution_id, $limit, $offset, $contentType);

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
                    if ('\OpenAPI\Client\Model\GetAiSolutionMainChatHistory200Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetAiSolutionMainChatHistory200Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetAiSolutionMainChatHistory200Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\OpenAPI\Client\Model\GetFinances400Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances400Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances400Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\OpenAPI\Client\Model\GetFinances401Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances401Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances401Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\OpenAPI\Client\Model\GetAccountStatus403Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetAccountStatus403Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetAccountStatus403Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\OpenAPI\Client\Model\GetImage404Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetImage404Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetImage404Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 429:
                    if ('\OpenAPI\Client\Model\GetFinances429Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances429Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances429Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\OpenAPI\Client\Model\GetFinances500Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances500Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances500Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\OpenAPI\Client\Model\GetAiSolutionMainChatHistory200Response';
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
                        '\OpenAPI\Client\Model\GetAiSolutionMainChatHistory200Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances400Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances401Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetAccountStatus403Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetImage404Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances429Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances500Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getAiSolutionChatFullHistoryAsync
     *
     * Получение всей истории чата AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  int $limit Количество сообщений на странице, от 1 до 10 000 (optional, default to 100)
     * @param  int $offset Количество сообщений, которые нужно пропустить (optional, default to 0)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAiSolutionChatFullHistory'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getAiSolutionChatFullHistoryAsync($solution_id, $limit = 100, $offset = 0, string $contentType = self::contentTypes['getAiSolutionChatFullHistory'][0])
    {
        return $this->getAiSolutionChatFullHistoryAsyncWithHttpInfo($solution_id, $limit, $offset, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getAiSolutionChatFullHistoryAsyncWithHttpInfo
     *
     * Получение всей истории чата AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  int $limit Количество сообщений на странице, от 1 до 10 000 (optional, default to 100)
     * @param  int $offset Количество сообщений, которые нужно пропустить (optional, default to 0)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAiSolutionChatFullHistory'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getAiSolutionChatFullHistoryAsyncWithHttpInfo($solution_id, $limit = 100, $offset = 0, string $contentType = self::contentTypes['getAiSolutionChatFullHistory'][0])
    {
        $returnType = '\OpenAPI\Client\Model\GetAiSolutionMainChatHistory200Response';
        $request = $this->getAiSolutionChatFullHistoryRequest($solution_id, $limit, $offset, $contentType);

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
     * Create request for operation 'getAiSolutionChatFullHistory'
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  int $limit Количество сообщений на странице, от 1 до 10 000 (optional, default to 100)
     * @param  int $offset Количество сообщений, которые нужно пропустить (optional, default to 0)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAiSolutionChatFullHistory'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getAiSolutionChatFullHistoryRequest($solution_id, $limit = 100, $offset = 0, string $contentType = self::contentTypes['getAiSolutionChatFullHistory'][0])
    {

        // verify the required parameter 'solution_id' is set
        if ($solution_id === null || (is_array($solution_id) && count($solution_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $solution_id when calling getAiSolutionChatFullHistory'
            );
        }
        if ($solution_id < 1) {
            throw new \InvalidArgumentException('invalid value for "$solution_id" when calling AISolutionsApi.getAiSolutionChatFullHistory, must be bigger than or equal to 1.');
        }
        
        if ($limit !== null && $limit > 10000) {
            throw new \InvalidArgumentException('invalid value for "$limit" when calling AISolutionsApi.getAiSolutionChatFullHistory, must be smaller than or equal to 10000.');
        }
        if ($limit !== null && $limit < 1) {
            throw new \InvalidArgumentException('invalid value for "$limit" when calling AISolutionsApi.getAiSolutionChatFullHistory, must be bigger than or equal to 1.');
        }
        
        if ($offset !== null && $offset < 0) {
            throw new \InvalidArgumentException('invalid value for "$offset" when calling AISolutionsApi.getAiSolutionChatFullHistory, must be bigger than or equal to 0.');
        }
        

        $resourcePath = '/api/v1/cloud-ai/solutions/{solution_id}/chat/history';
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
            $offset,
            'offset', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);


        // path params
        if ($solution_id !== null) {
            $resourcePath = str_replace(
                '{' . 'solution_id' . '}',
                ObjectSerializer::toPathValue($solution_id),
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

        // this endpoint requires Bearer (JWT) authentication (access token)
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

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getAiSolutionChatHistory
     *
     * Получение истории разговора AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $conversation_id ID разговора. У основного разговора решения — &#x60;solution-&lt;solution_id&gt;&#x60; (required)
     * @param  int $limit Количество сообщений на странице, от 1 до 10 000 (optional, default to 100)
     * @param  int $offset Количество сообщений, которые нужно пропустить (optional, default to 0)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAiSolutionChatHistory'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \OpenAPI\Client\Model\GetAiSolutionMainChatHistory200Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\GetAccountStatus403Response|\OpenAPI\Client\Model\GetImage404Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response
     */
    public function getAiSolutionChatHistory($solution_id, $conversation_id, $limit = 100, $offset = 0, string $contentType = self::contentTypes['getAiSolutionChatHistory'][0])
    {
        list($response) = $this->getAiSolutionChatHistoryWithHttpInfo($solution_id, $conversation_id, $limit, $offset, $contentType);
        return $response;
    }

    /**
     * Operation getAiSolutionChatHistoryWithHttpInfo
     *
     * Получение истории разговора AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $conversation_id ID разговора. У основного разговора решения — &#x60;solution-&lt;solution_id&gt;&#x60; (required)
     * @param  int $limit Количество сообщений на странице, от 1 до 10 000 (optional, default to 100)
     * @param  int $offset Количество сообщений, которые нужно пропустить (optional, default to 0)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAiSolutionChatHistory'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPI\Client\Model\GetAiSolutionMainChatHistory200Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\GetAccountStatus403Response|\OpenAPI\Client\Model\GetImage404Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response, HTTP status code, HTTP response headers (array of strings)
     */
    public function getAiSolutionChatHistoryWithHttpInfo($solution_id, $conversation_id, $limit = 100, $offset = 0, string $contentType = self::contentTypes['getAiSolutionChatHistory'][0])
    {
        $request = $this->getAiSolutionChatHistoryRequest($solution_id, $conversation_id, $limit, $offset, $contentType);

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
                    if ('\OpenAPI\Client\Model\GetAiSolutionMainChatHistory200Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetAiSolutionMainChatHistory200Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetAiSolutionMainChatHistory200Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\OpenAPI\Client\Model\GetFinances400Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances400Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances400Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\OpenAPI\Client\Model\GetFinances401Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances401Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances401Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\OpenAPI\Client\Model\GetAccountStatus403Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetAccountStatus403Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetAccountStatus403Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\OpenAPI\Client\Model\GetImage404Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetImage404Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetImage404Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 429:
                    if ('\OpenAPI\Client\Model\GetFinances429Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances429Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances429Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\OpenAPI\Client\Model\GetFinances500Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances500Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances500Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\OpenAPI\Client\Model\GetAiSolutionMainChatHistory200Response';
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
                        '\OpenAPI\Client\Model\GetAiSolutionMainChatHistory200Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances400Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances401Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetAccountStatus403Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetImage404Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances429Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances500Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getAiSolutionChatHistoryAsync
     *
     * Получение истории разговора AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $conversation_id ID разговора. У основного разговора решения — &#x60;solution-&lt;solution_id&gt;&#x60; (required)
     * @param  int $limit Количество сообщений на странице, от 1 до 10 000 (optional, default to 100)
     * @param  int $offset Количество сообщений, которые нужно пропустить (optional, default to 0)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAiSolutionChatHistory'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getAiSolutionChatHistoryAsync($solution_id, $conversation_id, $limit = 100, $offset = 0, string $contentType = self::contentTypes['getAiSolutionChatHistory'][0])
    {
        return $this->getAiSolutionChatHistoryAsyncWithHttpInfo($solution_id, $conversation_id, $limit, $offset, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getAiSolutionChatHistoryAsyncWithHttpInfo
     *
     * Получение истории разговора AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $conversation_id ID разговора. У основного разговора решения — &#x60;solution-&lt;solution_id&gt;&#x60; (required)
     * @param  int $limit Количество сообщений на странице, от 1 до 10 000 (optional, default to 100)
     * @param  int $offset Количество сообщений, которые нужно пропустить (optional, default to 0)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAiSolutionChatHistory'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getAiSolutionChatHistoryAsyncWithHttpInfo($solution_id, $conversation_id, $limit = 100, $offset = 0, string $contentType = self::contentTypes['getAiSolutionChatHistory'][0])
    {
        $returnType = '\OpenAPI\Client\Model\GetAiSolutionMainChatHistory200Response';
        $request = $this->getAiSolutionChatHistoryRequest($solution_id, $conversation_id, $limit, $offset, $contentType);

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
     * Create request for operation 'getAiSolutionChatHistory'
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $conversation_id ID разговора. У основного разговора решения — &#x60;solution-&lt;solution_id&gt;&#x60; (required)
     * @param  int $limit Количество сообщений на странице, от 1 до 10 000 (optional, default to 100)
     * @param  int $offset Количество сообщений, которые нужно пропустить (optional, default to 0)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAiSolutionChatHistory'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getAiSolutionChatHistoryRequest($solution_id, $conversation_id, $limit = 100, $offset = 0, string $contentType = self::contentTypes['getAiSolutionChatHistory'][0])
    {

        // verify the required parameter 'solution_id' is set
        if ($solution_id === null || (is_array($solution_id) && count($solution_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $solution_id when calling getAiSolutionChatHistory'
            );
        }
        if ($solution_id < 1) {
            throw new \InvalidArgumentException('invalid value for "$solution_id" when calling AISolutionsApi.getAiSolutionChatHistory, must be bigger than or equal to 1.');
        }
        
        // verify the required parameter 'conversation_id' is set
        if ($conversation_id === null || (is_array($conversation_id) && count($conversation_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $conversation_id when calling getAiSolutionChatHistory'
            );
        }

        if ($limit !== null && $limit > 10000) {
            throw new \InvalidArgumentException('invalid value for "$limit" when calling AISolutionsApi.getAiSolutionChatHistory, must be smaller than or equal to 10000.');
        }
        if ($limit !== null && $limit < 1) {
            throw new \InvalidArgumentException('invalid value for "$limit" when calling AISolutionsApi.getAiSolutionChatHistory, must be bigger than or equal to 1.');
        }
        
        if ($offset !== null && $offset < 0) {
            throw new \InvalidArgumentException('invalid value for "$offset" when calling AISolutionsApi.getAiSolutionChatHistory, must be bigger than or equal to 0.');
        }
        

        $resourcePath = '/api/v1/cloud-ai/solutions/{solution_id}/chat/conversations/{conversation_id}/messages';
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
            $offset,
            'offset', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);


        // path params
        if ($solution_id !== null) {
            $resourcePath = str_replace(
                '{' . 'solution_id' . '}',
                ObjectSerializer::toPathValue($solution_id),
                $resourcePath
            );
        }
        // path params
        if ($conversation_id !== null) {
            $resourcePath = str_replace(
                '{' . 'conversation_id' . '}',
                ObjectSerializer::toPathValue($conversation_id),
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

        // this endpoint requires Bearer (JWT) authentication (access token)
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

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getAiSolutionChatStatus
     *
     * Получение статуса чата AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAiSolutionChatStatus'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \OpenAPI\Client\Model\GetAiSolutionChatStatus200Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\GetAccountStatus403Response|\OpenAPI\Client\Model\GetImage404Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response
     */
    public function getAiSolutionChatStatus($solution_id, string $contentType = self::contentTypes['getAiSolutionChatStatus'][0])
    {
        list($response) = $this->getAiSolutionChatStatusWithHttpInfo($solution_id, $contentType);
        return $response;
    }

    /**
     * Operation getAiSolutionChatStatusWithHttpInfo
     *
     * Получение статуса чата AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAiSolutionChatStatus'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPI\Client\Model\GetAiSolutionChatStatus200Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\GetAccountStatus403Response|\OpenAPI\Client\Model\GetImage404Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response, HTTP status code, HTTP response headers (array of strings)
     */
    public function getAiSolutionChatStatusWithHttpInfo($solution_id, string $contentType = self::contentTypes['getAiSolutionChatStatus'][0])
    {
        $request = $this->getAiSolutionChatStatusRequest($solution_id, $contentType);

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
                    if ('\OpenAPI\Client\Model\GetAiSolutionChatStatus200Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetAiSolutionChatStatus200Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetAiSolutionChatStatus200Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\OpenAPI\Client\Model\GetFinances400Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances400Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances400Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\OpenAPI\Client\Model\GetFinances401Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances401Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances401Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\OpenAPI\Client\Model\GetAccountStatus403Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetAccountStatus403Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetAccountStatus403Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\OpenAPI\Client\Model\GetImage404Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetImage404Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetImage404Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 429:
                    if ('\OpenAPI\Client\Model\GetFinances429Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances429Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances429Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\OpenAPI\Client\Model\GetFinances500Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances500Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances500Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\OpenAPI\Client\Model\GetAiSolutionChatStatus200Response';
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
                        '\OpenAPI\Client\Model\GetAiSolutionChatStatus200Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances400Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances401Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetAccountStatus403Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetImage404Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances429Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances500Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getAiSolutionChatStatusAsync
     *
     * Получение статуса чата AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAiSolutionChatStatus'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getAiSolutionChatStatusAsync($solution_id, string $contentType = self::contentTypes['getAiSolutionChatStatus'][0])
    {
        return $this->getAiSolutionChatStatusAsyncWithHttpInfo($solution_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getAiSolutionChatStatusAsyncWithHttpInfo
     *
     * Получение статуса чата AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAiSolutionChatStatus'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getAiSolutionChatStatusAsyncWithHttpInfo($solution_id, string $contentType = self::contentTypes['getAiSolutionChatStatus'][0])
    {
        $returnType = '\OpenAPI\Client\Model\GetAiSolutionChatStatus200Response';
        $request = $this->getAiSolutionChatStatusRequest($solution_id, $contentType);

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
     * Create request for operation 'getAiSolutionChatStatus'
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAiSolutionChatStatus'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getAiSolutionChatStatusRequest($solution_id, string $contentType = self::contentTypes['getAiSolutionChatStatus'][0])
    {

        // verify the required parameter 'solution_id' is set
        if ($solution_id === null || (is_array($solution_id) && count($solution_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $solution_id when calling getAiSolutionChatStatus'
            );
        }
        if ($solution_id < 1) {
            throw new \InvalidArgumentException('invalid value for "$solution_id" when calling AISolutionsApi.getAiSolutionChatStatus, must be bigger than or equal to 1.');
        }
        

        $resourcePath = '/api/v1/cloud-ai/solutions/{solution_id}/chat/status';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($solution_id !== null) {
            $resourcePath = str_replace(
                '{' . 'solution_id' . '}',
                ObjectSerializer::toPathValue($solution_id),
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

        // this endpoint requires Bearer (JWT) authentication (access token)
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

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getAiSolutionMainChatHistory
     *
     * Получение истории основного разговора AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  int $limit Количество сообщений на странице, от 1 до 10 000 (optional, default to 100)
     * @param  int $offset Количество сообщений, которые нужно пропустить (optional, default to 0)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAiSolutionMainChatHistory'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \OpenAPI\Client\Model\GetAiSolutionMainChatHistory200Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\GetAccountStatus403Response|\OpenAPI\Client\Model\GetImage404Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response
     */
    public function getAiSolutionMainChatHistory($solution_id, $limit = 100, $offset = 0, string $contentType = self::contentTypes['getAiSolutionMainChatHistory'][0])
    {
        list($response) = $this->getAiSolutionMainChatHistoryWithHttpInfo($solution_id, $limit, $offset, $contentType);
        return $response;
    }

    /**
     * Operation getAiSolutionMainChatHistoryWithHttpInfo
     *
     * Получение истории основного разговора AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  int $limit Количество сообщений на странице, от 1 до 10 000 (optional, default to 100)
     * @param  int $offset Количество сообщений, которые нужно пропустить (optional, default to 0)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAiSolutionMainChatHistory'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPI\Client\Model\GetAiSolutionMainChatHistory200Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\GetAccountStatus403Response|\OpenAPI\Client\Model\GetImage404Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response, HTTP status code, HTTP response headers (array of strings)
     */
    public function getAiSolutionMainChatHistoryWithHttpInfo($solution_id, $limit = 100, $offset = 0, string $contentType = self::contentTypes['getAiSolutionMainChatHistory'][0])
    {
        $request = $this->getAiSolutionMainChatHistoryRequest($solution_id, $limit, $offset, $contentType);

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
                    if ('\OpenAPI\Client\Model\GetAiSolutionMainChatHistory200Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetAiSolutionMainChatHistory200Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetAiSolutionMainChatHistory200Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\OpenAPI\Client\Model\GetFinances400Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances400Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances400Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\OpenAPI\Client\Model\GetFinances401Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances401Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances401Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\OpenAPI\Client\Model\GetAccountStatus403Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetAccountStatus403Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetAccountStatus403Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\OpenAPI\Client\Model\GetImage404Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetImage404Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetImage404Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 429:
                    if ('\OpenAPI\Client\Model\GetFinances429Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances429Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances429Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\OpenAPI\Client\Model\GetFinances500Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances500Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances500Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\OpenAPI\Client\Model\GetAiSolutionMainChatHistory200Response';
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
                        '\OpenAPI\Client\Model\GetAiSolutionMainChatHistory200Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances400Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances401Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetAccountStatus403Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetImage404Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances429Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances500Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getAiSolutionMainChatHistoryAsync
     *
     * Получение истории основного разговора AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  int $limit Количество сообщений на странице, от 1 до 10 000 (optional, default to 100)
     * @param  int $offset Количество сообщений, которые нужно пропустить (optional, default to 0)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAiSolutionMainChatHistory'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getAiSolutionMainChatHistoryAsync($solution_id, $limit = 100, $offset = 0, string $contentType = self::contentTypes['getAiSolutionMainChatHistory'][0])
    {
        return $this->getAiSolutionMainChatHistoryAsyncWithHttpInfo($solution_id, $limit, $offset, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getAiSolutionMainChatHistoryAsyncWithHttpInfo
     *
     * Получение истории основного разговора AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  int $limit Количество сообщений на странице, от 1 до 10 000 (optional, default to 100)
     * @param  int $offset Количество сообщений, которые нужно пропустить (optional, default to 0)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAiSolutionMainChatHistory'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getAiSolutionMainChatHistoryAsyncWithHttpInfo($solution_id, $limit = 100, $offset = 0, string $contentType = self::contentTypes['getAiSolutionMainChatHistory'][0])
    {
        $returnType = '\OpenAPI\Client\Model\GetAiSolutionMainChatHistory200Response';
        $request = $this->getAiSolutionMainChatHistoryRequest($solution_id, $limit, $offset, $contentType);

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
     * Create request for operation 'getAiSolutionMainChatHistory'
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  int $limit Количество сообщений на странице, от 1 до 10 000 (optional, default to 100)
     * @param  int $offset Количество сообщений, которые нужно пропустить (optional, default to 0)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAiSolutionMainChatHistory'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getAiSolutionMainChatHistoryRequest($solution_id, $limit = 100, $offset = 0, string $contentType = self::contentTypes['getAiSolutionMainChatHistory'][0])
    {

        // verify the required parameter 'solution_id' is set
        if ($solution_id === null || (is_array($solution_id) && count($solution_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $solution_id when calling getAiSolutionMainChatHistory'
            );
        }
        if ($solution_id < 1) {
            throw new \InvalidArgumentException('invalid value for "$solution_id" when calling AISolutionsApi.getAiSolutionMainChatHistory, must be bigger than or equal to 1.');
        }
        
        if ($limit !== null && $limit > 10000) {
            throw new \InvalidArgumentException('invalid value for "$limit" when calling AISolutionsApi.getAiSolutionMainChatHistory, must be smaller than or equal to 10000.');
        }
        if ($limit !== null && $limit < 1) {
            throw new \InvalidArgumentException('invalid value for "$limit" when calling AISolutionsApi.getAiSolutionMainChatHistory, must be bigger than or equal to 1.');
        }
        
        if ($offset !== null && $offset < 0) {
            throw new \InvalidArgumentException('invalid value for "$offset" when calling AISolutionsApi.getAiSolutionMainChatHistory, must be bigger than or equal to 0.');
        }
        

        $resourcePath = '/api/v1/cloud-ai/solutions/{solution_id}/chat/messages';
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
            $offset,
            'offset', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);


        // path params
        if ($solution_id !== null) {
            $resourcePath = str_replace(
                '{' . 'solution_id' . '}',
                ObjectSerializer::toPathValue($solution_id),
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

        // this endpoint requires Bearer (JWT) authentication (access token)
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

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation listAiSolutionConversations
     *
     * Получение списка разговоров AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listAiSolutionConversations'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \OpenAPI\Client\Model\ListAiSolutionConversations200Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\GetAccountStatus403Response|\OpenAPI\Client\Model\GetImage404Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response
     */
    public function listAiSolutionConversations($solution_id, string $contentType = self::contentTypes['listAiSolutionConversations'][0])
    {
        list($response) = $this->listAiSolutionConversationsWithHttpInfo($solution_id, $contentType);
        return $response;
    }

    /**
     * Operation listAiSolutionConversationsWithHttpInfo
     *
     * Получение списка разговоров AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listAiSolutionConversations'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPI\Client\Model\ListAiSolutionConversations200Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\GetAccountStatus403Response|\OpenAPI\Client\Model\GetImage404Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response, HTTP status code, HTTP response headers (array of strings)
     */
    public function listAiSolutionConversationsWithHttpInfo($solution_id, string $contentType = self::contentTypes['listAiSolutionConversations'][0])
    {
        $request = $this->listAiSolutionConversationsRequest($solution_id, $contentType);

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
                    if ('\OpenAPI\Client\Model\ListAiSolutionConversations200Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\ListAiSolutionConversations200Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\ListAiSolutionConversations200Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\OpenAPI\Client\Model\GetFinances400Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances400Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances400Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\OpenAPI\Client\Model\GetFinances401Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances401Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances401Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\OpenAPI\Client\Model\GetAccountStatus403Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetAccountStatus403Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetAccountStatus403Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\OpenAPI\Client\Model\GetImage404Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetImage404Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetImage404Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 429:
                    if ('\OpenAPI\Client\Model\GetFinances429Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances429Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances429Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\OpenAPI\Client\Model\GetFinances500Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances500Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances500Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\OpenAPI\Client\Model\ListAiSolutionConversations200Response';
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
                        '\OpenAPI\Client\Model\ListAiSolutionConversations200Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances400Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances401Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetAccountStatus403Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetImage404Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances429Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances500Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation listAiSolutionConversationsAsync
     *
     * Получение списка разговоров AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listAiSolutionConversations'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listAiSolutionConversationsAsync($solution_id, string $contentType = self::contentTypes['listAiSolutionConversations'][0])
    {
        return $this->listAiSolutionConversationsAsyncWithHttpInfo($solution_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation listAiSolutionConversationsAsyncWithHttpInfo
     *
     * Получение списка разговоров AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listAiSolutionConversations'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listAiSolutionConversationsAsyncWithHttpInfo($solution_id, string $contentType = self::contentTypes['listAiSolutionConversations'][0])
    {
        $returnType = '\OpenAPI\Client\Model\ListAiSolutionConversations200Response';
        $request = $this->listAiSolutionConversationsRequest($solution_id, $contentType);

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
     * Create request for operation 'listAiSolutionConversations'
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listAiSolutionConversations'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function listAiSolutionConversationsRequest($solution_id, string $contentType = self::contentTypes['listAiSolutionConversations'][0])
    {

        // verify the required parameter 'solution_id' is set
        if ($solution_id === null || (is_array($solution_id) && count($solution_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $solution_id when calling listAiSolutionConversations'
            );
        }
        if ($solution_id < 1) {
            throw new \InvalidArgumentException('invalid value for "$solution_id" when calling AISolutionsApi.listAiSolutionConversations, must be bigger than or equal to 1.');
        }
        

        $resourcePath = '/api/v1/cloud-ai/solutions/{solution_id}/chat/conversations';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($solution_id !== null) {
            $resourcePath = str_replace(
                '{' . 'solution_id' . '}',
                ObjectSerializer::toPathValue($solution_id),
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

        // this endpoint requires Bearer (JWT) authentication (access token)
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

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation listAiSolutionTelegramBots
     *
     * Получение списка Telegram-ботов AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listAiSolutionTelegramBots'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \OpenAPI\Client\Model\ListAiSolutionTelegramBots200Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\GetAccountStatus403Response|\OpenAPI\Client\Model\GetImage404Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response|\OpenAPI\Client\Model\ErrorResponse|\OpenAPI\Client\Model\ErrorResponse
     */
    public function listAiSolutionTelegramBots($solution_id, string $contentType = self::contentTypes['listAiSolutionTelegramBots'][0])
    {
        list($response) = $this->listAiSolutionTelegramBotsWithHttpInfo($solution_id, $contentType);
        return $response;
    }

    /**
     * Operation listAiSolutionTelegramBotsWithHttpInfo
     *
     * Получение списка Telegram-ботов AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listAiSolutionTelegramBots'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPI\Client\Model\ListAiSolutionTelegramBots200Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\GetAccountStatus403Response|\OpenAPI\Client\Model\GetImage404Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response|\OpenAPI\Client\Model\ErrorResponse|\OpenAPI\Client\Model\ErrorResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function listAiSolutionTelegramBotsWithHttpInfo($solution_id, string $contentType = self::contentTypes['listAiSolutionTelegramBots'][0])
    {
        $request = $this->listAiSolutionTelegramBotsRequest($solution_id, $contentType);

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
                    if ('\OpenAPI\Client\Model\ListAiSolutionTelegramBots200Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\ListAiSolutionTelegramBots200Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\ListAiSolutionTelegramBots200Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\OpenAPI\Client\Model\GetFinances400Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances400Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances400Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\OpenAPI\Client\Model\GetFinances401Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances401Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances401Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\OpenAPI\Client\Model\GetAccountStatus403Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetAccountStatus403Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetAccountStatus403Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\OpenAPI\Client\Model\GetImage404Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetImage404Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetImage404Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 429:
                    if ('\OpenAPI\Client\Model\GetFinances429Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances429Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances429Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\OpenAPI\Client\Model\GetFinances500Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances500Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances500Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 502:
                    if ('\OpenAPI\Client\Model\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\ErrorResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 503:
                    if ('\OpenAPI\Client\Model\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\ErrorResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\OpenAPI\Client\Model\ListAiSolutionTelegramBots200Response';
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
                        '\OpenAPI\Client\Model\ListAiSolutionTelegramBots200Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances400Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances401Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetAccountStatus403Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetImage404Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances429Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances500Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 502:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 503:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation listAiSolutionTelegramBotsAsync
     *
     * Получение списка Telegram-ботов AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listAiSolutionTelegramBots'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listAiSolutionTelegramBotsAsync($solution_id, string $contentType = self::contentTypes['listAiSolutionTelegramBots'][0])
    {
        return $this->listAiSolutionTelegramBotsAsyncWithHttpInfo($solution_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation listAiSolutionTelegramBotsAsyncWithHttpInfo
     *
     * Получение списка Telegram-ботов AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listAiSolutionTelegramBots'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listAiSolutionTelegramBotsAsyncWithHttpInfo($solution_id, string $contentType = self::contentTypes['listAiSolutionTelegramBots'][0])
    {
        $returnType = '\OpenAPI\Client\Model\ListAiSolutionTelegramBots200Response';
        $request = $this->listAiSolutionTelegramBotsRequest($solution_id, $contentType);

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
     * Create request for operation 'listAiSolutionTelegramBots'
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listAiSolutionTelegramBots'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function listAiSolutionTelegramBotsRequest($solution_id, string $contentType = self::contentTypes['listAiSolutionTelegramBots'][0])
    {

        // verify the required parameter 'solution_id' is set
        if ($solution_id === null || (is_array($solution_id) && count($solution_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $solution_id when calling listAiSolutionTelegramBots'
            );
        }
        if ($solution_id < 1) {
            throw new \InvalidArgumentException('invalid value for "$solution_id" when calling AISolutionsApi.listAiSolutionTelegramBots, must be bigger than or equal to 1.');
        }
        

        $resourcePath = '/api/v1/cloud-ai/solutions/{solution_id}/telegram/bots';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($solution_id !== null) {
            $resourcePath = str_replace(
                '{' . 'solution_id' . '}',
                ObjectSerializer::toPathValue($solution_id),
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

        // this endpoint requires Bearer (JWT) authentication (access token)
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

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation listAiSolutionTypes
     *
     * Получение списка типов AI-решений
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listAiSolutionTypes'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \OpenAPI\Client\Model\ListAiSolutionTypes200Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\GetAccountStatus403Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response
     */
    public function listAiSolutionTypes(string $contentType = self::contentTypes['listAiSolutionTypes'][0])
    {
        list($response) = $this->listAiSolutionTypesWithHttpInfo($contentType);
        return $response;
    }

    /**
     * Operation listAiSolutionTypesWithHttpInfo
     *
     * Получение списка типов AI-решений
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listAiSolutionTypes'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPI\Client\Model\ListAiSolutionTypes200Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\GetAccountStatus403Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response, HTTP status code, HTTP response headers (array of strings)
     */
    public function listAiSolutionTypesWithHttpInfo(string $contentType = self::contentTypes['listAiSolutionTypes'][0])
    {
        $request = $this->listAiSolutionTypesRequest($contentType);

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
                    if ('\OpenAPI\Client\Model\ListAiSolutionTypes200Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\ListAiSolutionTypes200Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\ListAiSolutionTypes200Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\OpenAPI\Client\Model\GetFinances400Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances400Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances400Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\OpenAPI\Client\Model\GetFinances401Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances401Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances401Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\OpenAPI\Client\Model\GetAccountStatus403Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetAccountStatus403Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetAccountStatus403Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 429:
                    if ('\OpenAPI\Client\Model\GetFinances429Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances429Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances429Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\OpenAPI\Client\Model\GetFinances500Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances500Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances500Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\OpenAPI\Client\Model\ListAiSolutionTypes200Response';
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
                        '\OpenAPI\Client\Model\ListAiSolutionTypes200Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances400Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances401Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetAccountStatus403Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances429Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances500Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation listAiSolutionTypesAsync
     *
     * Получение списка типов AI-решений
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listAiSolutionTypes'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listAiSolutionTypesAsync(string $contentType = self::contentTypes['listAiSolutionTypes'][0])
    {
        return $this->listAiSolutionTypesAsyncWithHttpInfo($contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation listAiSolutionTypesAsyncWithHttpInfo
     *
     * Получение списка типов AI-решений
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listAiSolutionTypes'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listAiSolutionTypesAsyncWithHttpInfo(string $contentType = self::contentTypes['listAiSolutionTypes'][0])
    {
        $returnType = '\OpenAPI\Client\Model\ListAiSolutionTypes200Response';
        $request = $this->listAiSolutionTypesRequest($contentType);

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
     * Create request for operation 'listAiSolutionTypes'
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listAiSolutionTypes'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function listAiSolutionTypesRequest(string $contentType = self::contentTypes['listAiSolutionTypes'][0])
    {


        $resourcePath = '/api/v1/cloud-ai/solutions/types';
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

        // this endpoint requires Bearer (JWT) authentication (access token)
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

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation listAiSolutions
     *
     * Получение списка AI-решений
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listAiSolutions'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \OpenAPI\Client\Model\ListAiSolutions200Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\GetAccountStatus403Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response
     */
    public function listAiSolutions(string $contentType = self::contentTypes['listAiSolutions'][0])
    {
        list($response) = $this->listAiSolutionsWithHttpInfo($contentType);
        return $response;
    }

    /**
     * Operation listAiSolutionsWithHttpInfo
     *
     * Получение списка AI-решений
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listAiSolutions'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPI\Client\Model\ListAiSolutions200Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\GetAccountStatus403Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response, HTTP status code, HTTP response headers (array of strings)
     */
    public function listAiSolutionsWithHttpInfo(string $contentType = self::contentTypes['listAiSolutions'][0])
    {
        $request = $this->listAiSolutionsRequest($contentType);

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
                    if ('\OpenAPI\Client\Model\ListAiSolutions200Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\ListAiSolutions200Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\ListAiSolutions200Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\OpenAPI\Client\Model\GetFinances400Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances400Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances400Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\OpenAPI\Client\Model\GetFinances401Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances401Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances401Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\OpenAPI\Client\Model\GetAccountStatus403Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetAccountStatus403Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetAccountStatus403Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 429:
                    if ('\OpenAPI\Client\Model\GetFinances429Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances429Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances429Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\OpenAPI\Client\Model\GetFinances500Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances500Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances500Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\OpenAPI\Client\Model\ListAiSolutions200Response';
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
                        '\OpenAPI\Client\Model\ListAiSolutions200Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances400Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances401Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetAccountStatus403Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances429Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances500Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation listAiSolutionsAsync
     *
     * Получение списка AI-решений
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listAiSolutions'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listAiSolutionsAsync(string $contentType = self::contentTypes['listAiSolutions'][0])
    {
        return $this->listAiSolutionsAsyncWithHttpInfo($contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation listAiSolutionsAsyncWithHttpInfo
     *
     * Получение списка AI-решений
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listAiSolutions'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listAiSolutionsAsyncWithHttpInfo(string $contentType = self::contentTypes['listAiSolutions'][0])
    {
        $returnType = '\OpenAPI\Client\Model\ListAiSolutions200Response';
        $request = $this->listAiSolutionsRequest($contentType);

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
     * Create request for operation 'listAiSolutions'
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listAiSolutions'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function listAiSolutionsRequest(string $contentType = self::contentTypes['listAiSolutions'][0])
    {


        $resourcePath = '/api/v1/cloud-ai/solutions';
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

        // this endpoint requires Bearer (JWT) authentication (access token)
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

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation regenerateAiSolutionAiKey
     *
     * Перевыпуск ключа AI Gateway решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['regenerateAiSolutionAiKey'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \OpenAPI\Client\Model\RegenerateAiSolutionAiKey200Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\GetAccountStatus403Response|\OpenAPI\Client\Model\GetImage404Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response|\OpenAPI\Client\Model\ErrorResponse|\OpenAPI\Client\Model\ErrorResponse
     */
    public function regenerateAiSolutionAiKey($solution_id, string $contentType = self::contentTypes['regenerateAiSolutionAiKey'][0])
    {
        list($response) = $this->regenerateAiSolutionAiKeyWithHttpInfo($solution_id, $contentType);
        return $response;
    }

    /**
     * Operation regenerateAiSolutionAiKeyWithHttpInfo
     *
     * Перевыпуск ключа AI Gateway решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['regenerateAiSolutionAiKey'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPI\Client\Model\RegenerateAiSolutionAiKey200Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\GetAccountStatus403Response|\OpenAPI\Client\Model\GetImage404Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response|\OpenAPI\Client\Model\ErrorResponse|\OpenAPI\Client\Model\ErrorResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function regenerateAiSolutionAiKeyWithHttpInfo($solution_id, string $contentType = self::contentTypes['regenerateAiSolutionAiKey'][0])
    {
        $request = $this->regenerateAiSolutionAiKeyRequest($solution_id, $contentType);

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
                    if ('\OpenAPI\Client\Model\RegenerateAiSolutionAiKey200Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\RegenerateAiSolutionAiKey200Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\RegenerateAiSolutionAiKey200Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\OpenAPI\Client\Model\GetFinances400Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances400Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances400Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\OpenAPI\Client\Model\GetFinances401Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances401Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances401Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\OpenAPI\Client\Model\GetAccountStatus403Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetAccountStatus403Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetAccountStatus403Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\OpenAPI\Client\Model\GetImage404Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetImage404Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetImage404Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 429:
                    if ('\OpenAPI\Client\Model\GetFinances429Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances429Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances429Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\OpenAPI\Client\Model\GetFinances500Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances500Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances500Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 502:
                    if ('\OpenAPI\Client\Model\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\ErrorResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 503:
                    if ('\OpenAPI\Client\Model\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\ErrorResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\OpenAPI\Client\Model\RegenerateAiSolutionAiKey200Response';
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
                        '\OpenAPI\Client\Model\RegenerateAiSolutionAiKey200Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances400Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances401Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetAccountStatus403Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetImage404Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances429Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances500Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 502:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 503:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation regenerateAiSolutionAiKeyAsync
     *
     * Перевыпуск ключа AI Gateway решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['regenerateAiSolutionAiKey'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function regenerateAiSolutionAiKeyAsync($solution_id, string $contentType = self::contentTypes['regenerateAiSolutionAiKey'][0])
    {
        return $this->regenerateAiSolutionAiKeyAsyncWithHttpInfo($solution_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation regenerateAiSolutionAiKeyAsyncWithHttpInfo
     *
     * Перевыпуск ключа AI Gateway решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['regenerateAiSolutionAiKey'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function regenerateAiSolutionAiKeyAsyncWithHttpInfo($solution_id, string $contentType = self::contentTypes['regenerateAiSolutionAiKey'][0])
    {
        $returnType = '\OpenAPI\Client\Model\RegenerateAiSolutionAiKey200Response';
        $request = $this->regenerateAiSolutionAiKeyRequest($solution_id, $contentType);

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
     * Create request for operation 'regenerateAiSolutionAiKey'
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['regenerateAiSolutionAiKey'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function regenerateAiSolutionAiKeyRequest($solution_id, string $contentType = self::contentTypes['regenerateAiSolutionAiKey'][0])
    {

        // verify the required parameter 'solution_id' is set
        if ($solution_id === null || (is_array($solution_id) && count($solution_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $solution_id when calling regenerateAiSolutionAiKey'
            );
        }
        if ($solution_id < 1) {
            throw new \InvalidArgumentException('invalid value for "$solution_id" when calling AISolutionsApi.regenerateAiSolutionAiKey, must be bigger than or equal to 1.');
        }
        

        $resourcePath = '/api/v1/cloud-ai/solutions/{solution_id}/ai-key/regenerate';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($solution_id !== null) {
            $resourcePath = str_replace(
                '{' . 'solution_id' . '}',
                ObjectSerializer::toPathValue($solution_id),
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

        // this endpoint requires Bearer (JWT) authentication (access token)
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

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation removeAiSolutionTelegramBot
     *
     * Отключение Telegram-бота от AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $account_key ID Telegram-бота в решении (&#x60;account_key&#x60; из списка ботов) в формате &#x60;b&lt;число&gt;&#x60;, например &#x60;b123456789&#x60; (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['removeAiSolutionTelegramBot'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function removeAiSolutionTelegramBot($solution_id, $account_key, string $contentType = self::contentTypes['removeAiSolutionTelegramBot'][0])
    {
        $this->removeAiSolutionTelegramBotWithHttpInfo($solution_id, $account_key, $contentType);
    }

    /**
     * Operation removeAiSolutionTelegramBotWithHttpInfo
     *
     * Отключение Telegram-бота от AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $account_key ID Telegram-бота в решении (&#x60;account_key&#x60; из списка ботов) в формате &#x60;b&lt;число&gt;&#x60;, например &#x60;b123456789&#x60; (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['removeAiSolutionTelegramBot'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function removeAiSolutionTelegramBotWithHttpInfo($solution_id, $account_key, string $contentType = self::contentTypes['removeAiSolutionTelegramBot'][0])
    {
        $request = $this->removeAiSolutionTelegramBotRequest($solution_id, $account_key, $contentType);

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

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances400Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances401Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetAccountStatus403Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetImage404Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances429Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances500Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 502:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 503:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation removeAiSolutionTelegramBotAsync
     *
     * Отключение Telegram-бота от AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $account_key ID Telegram-бота в решении (&#x60;account_key&#x60; из списка ботов) в формате &#x60;b&lt;число&gt;&#x60;, например &#x60;b123456789&#x60; (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['removeAiSolutionTelegramBot'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function removeAiSolutionTelegramBotAsync($solution_id, $account_key, string $contentType = self::contentTypes['removeAiSolutionTelegramBot'][0])
    {
        return $this->removeAiSolutionTelegramBotAsyncWithHttpInfo($solution_id, $account_key, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation removeAiSolutionTelegramBotAsyncWithHttpInfo
     *
     * Отключение Telegram-бота от AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $account_key ID Telegram-бота в решении (&#x60;account_key&#x60; из списка ботов) в формате &#x60;b&lt;число&gt;&#x60;, например &#x60;b123456789&#x60; (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['removeAiSolutionTelegramBot'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function removeAiSolutionTelegramBotAsyncWithHttpInfo($solution_id, $account_key, string $contentType = self::contentTypes['removeAiSolutionTelegramBot'][0])
    {
        $returnType = '';
        $request = $this->removeAiSolutionTelegramBotRequest($solution_id, $account_key, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
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
     * Create request for operation 'removeAiSolutionTelegramBot'
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $account_key ID Telegram-бота в решении (&#x60;account_key&#x60; из списка ботов) в формате &#x60;b&lt;число&gt;&#x60;, например &#x60;b123456789&#x60; (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['removeAiSolutionTelegramBot'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function removeAiSolutionTelegramBotRequest($solution_id, $account_key, string $contentType = self::contentTypes['removeAiSolutionTelegramBot'][0])
    {

        // verify the required parameter 'solution_id' is set
        if ($solution_id === null || (is_array($solution_id) && count($solution_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $solution_id when calling removeAiSolutionTelegramBot'
            );
        }
        if ($solution_id < 1) {
            throw new \InvalidArgumentException('invalid value for "$solution_id" when calling AISolutionsApi.removeAiSolutionTelegramBot, must be bigger than or equal to 1.');
        }
        
        // verify the required parameter 'account_key' is set
        if ($account_key === null || (is_array($account_key) && count($account_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $account_key when calling removeAiSolutionTelegramBot'
            );
        }


        $resourcePath = '/api/v1/cloud-ai/solutions/{solution_id}/telegram/bots/{account_key}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($solution_id !== null) {
            $resourcePath = str_replace(
                '{' . 'solution_id' . '}',
                ObjectSerializer::toPathValue($solution_id),
                $resourcePath
            );
        }
        // path params
        if ($account_key !== null) {
            $resourcePath = str_replace(
                '{' . 'account_key' . '}',
                ObjectSerializer::toPathValue($account_key),
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

        // this endpoint requires Bearer (JWT) authentication (access token)
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

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'DELETE',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation resetAiSolutionChat
     *
     * Сброс контекста разговора AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  \OpenAPI\Client\Model\ResetAiSolutionChat $reset_ai_solution_chat reset_ai_solution_chat (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['resetAiSolutionChat'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \OpenAPI\Client\Model\ResetAiSolutionChat200Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\GetAccountStatus403Response|\OpenAPI\Client\Model\GetImage404Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response|\OpenAPI\Client\Model\ErrorResponse|\OpenAPI\Client\Model\ErrorResponse
     */
    public function resetAiSolutionChat($solution_id, $reset_ai_solution_chat = null, string $contentType = self::contentTypes['resetAiSolutionChat'][0])
    {
        list($response) = $this->resetAiSolutionChatWithHttpInfo($solution_id, $reset_ai_solution_chat, $contentType);
        return $response;
    }

    /**
     * Operation resetAiSolutionChatWithHttpInfo
     *
     * Сброс контекста разговора AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  \OpenAPI\Client\Model\ResetAiSolutionChat $reset_ai_solution_chat (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['resetAiSolutionChat'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPI\Client\Model\ResetAiSolutionChat200Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\GetAccountStatus403Response|\OpenAPI\Client\Model\GetImage404Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response|\OpenAPI\Client\Model\ErrorResponse|\OpenAPI\Client\Model\ErrorResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function resetAiSolutionChatWithHttpInfo($solution_id, $reset_ai_solution_chat = null, string $contentType = self::contentTypes['resetAiSolutionChat'][0])
    {
        $request = $this->resetAiSolutionChatRequest($solution_id, $reset_ai_solution_chat, $contentType);

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
                    if ('\OpenAPI\Client\Model\ResetAiSolutionChat200Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\ResetAiSolutionChat200Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\ResetAiSolutionChat200Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\OpenAPI\Client\Model\GetFinances400Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances400Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances400Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\OpenAPI\Client\Model\GetFinances401Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances401Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances401Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\OpenAPI\Client\Model\GetAccountStatus403Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetAccountStatus403Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetAccountStatus403Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\OpenAPI\Client\Model\GetImage404Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetImage404Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetImage404Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 429:
                    if ('\OpenAPI\Client\Model\GetFinances429Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances429Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances429Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\OpenAPI\Client\Model\GetFinances500Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances500Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances500Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 502:
                    if ('\OpenAPI\Client\Model\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\ErrorResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 503:
                    if ('\OpenAPI\Client\Model\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\ErrorResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\OpenAPI\Client\Model\ResetAiSolutionChat200Response';
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
                        '\OpenAPI\Client\Model\ResetAiSolutionChat200Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances400Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances401Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetAccountStatus403Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetImage404Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances429Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances500Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 502:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 503:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation resetAiSolutionChatAsync
     *
     * Сброс контекста разговора AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  \OpenAPI\Client\Model\ResetAiSolutionChat $reset_ai_solution_chat (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['resetAiSolutionChat'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function resetAiSolutionChatAsync($solution_id, $reset_ai_solution_chat = null, string $contentType = self::contentTypes['resetAiSolutionChat'][0])
    {
        return $this->resetAiSolutionChatAsyncWithHttpInfo($solution_id, $reset_ai_solution_chat, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation resetAiSolutionChatAsyncWithHttpInfo
     *
     * Сброс контекста разговора AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  \OpenAPI\Client\Model\ResetAiSolutionChat $reset_ai_solution_chat (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['resetAiSolutionChat'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function resetAiSolutionChatAsyncWithHttpInfo($solution_id, $reset_ai_solution_chat = null, string $contentType = self::contentTypes['resetAiSolutionChat'][0])
    {
        $returnType = '\OpenAPI\Client\Model\ResetAiSolutionChat200Response';
        $request = $this->resetAiSolutionChatRequest($solution_id, $reset_ai_solution_chat, $contentType);

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
     * Create request for operation 'resetAiSolutionChat'
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  \OpenAPI\Client\Model\ResetAiSolutionChat $reset_ai_solution_chat (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['resetAiSolutionChat'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function resetAiSolutionChatRequest($solution_id, $reset_ai_solution_chat = null, string $contentType = self::contentTypes['resetAiSolutionChat'][0])
    {

        // verify the required parameter 'solution_id' is set
        if ($solution_id === null || (is_array($solution_id) && count($solution_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $solution_id when calling resetAiSolutionChat'
            );
        }
        if ($solution_id < 1) {
            throw new \InvalidArgumentException('invalid value for "$solution_id" when calling AISolutionsApi.resetAiSolutionChat, must be bigger than or equal to 1.');
        }
        


        $resourcePath = '/api/v1/cloud-ai/solutions/{solution_id}/chat/reset';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($solution_id !== null) {
            $resourcePath = str_replace(
                '{' . 'solution_id' . '}',
                ObjectSerializer::toPathValue($solution_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($reset_ai_solution_chat)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($reset_ai_solution_chat));
            } else {
                $httpBody = $reset_ai_solution_chat;
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

        // this endpoint requires Bearer (JWT) authentication (access token)
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

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation sendAiSolutionMessage
     *
     * Отправка сообщения агенту AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  \OpenAPI\Client\Model\SendAiSolutionMessage $send_ai_solution_message send_ai_solution_message (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['sendAiSolutionMessage'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \OpenAPI\Client\Model\SendAiSolutionMessage200Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\ErrorResponse|\OpenAPI\Client\Model\GetAccountStatus403Response|\OpenAPI\Client\Model\GetImage404Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response|\OpenAPI\Client\Model\ErrorResponse|\OpenAPI\Client\Model\ErrorResponse
     */
    public function sendAiSolutionMessage($solution_id, $send_ai_solution_message, string $contentType = self::contentTypes['sendAiSolutionMessage'][0])
    {
        list($response) = $this->sendAiSolutionMessageWithHttpInfo($solution_id, $send_ai_solution_message, $contentType);
        return $response;
    }

    /**
     * Operation sendAiSolutionMessageWithHttpInfo
     *
     * Отправка сообщения агенту AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  \OpenAPI\Client\Model\SendAiSolutionMessage $send_ai_solution_message (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['sendAiSolutionMessage'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPI\Client\Model\SendAiSolutionMessage200Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\ErrorResponse|\OpenAPI\Client\Model\GetAccountStatus403Response|\OpenAPI\Client\Model\GetImage404Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response|\OpenAPI\Client\Model\ErrorResponse|\OpenAPI\Client\Model\ErrorResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function sendAiSolutionMessageWithHttpInfo($solution_id, $send_ai_solution_message, string $contentType = self::contentTypes['sendAiSolutionMessage'][0])
    {
        $request = $this->sendAiSolutionMessageRequest($solution_id, $send_ai_solution_message, $contentType);

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
                    if ('\OpenAPI\Client\Model\SendAiSolutionMessage200Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\SendAiSolutionMessage200Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\SendAiSolutionMessage200Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\OpenAPI\Client\Model\GetFinances400Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances400Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances400Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\OpenAPI\Client\Model\GetFinances401Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances401Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances401Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 402:
                    if ('\OpenAPI\Client\Model\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\ErrorResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\OpenAPI\Client\Model\GetAccountStatus403Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetAccountStatus403Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetAccountStatus403Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\OpenAPI\Client\Model\GetImage404Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetImage404Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetImage404Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 429:
                    if ('\OpenAPI\Client\Model\GetFinances429Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances429Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances429Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\OpenAPI\Client\Model\GetFinances500Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances500Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances500Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 502:
                    if ('\OpenAPI\Client\Model\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\ErrorResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 503:
                    if ('\OpenAPI\Client\Model\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\ErrorResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\OpenAPI\Client\Model\SendAiSolutionMessage200Response';
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
                        '\OpenAPI\Client\Model\SendAiSolutionMessage200Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances400Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances401Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 402:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetAccountStatus403Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetImage404Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances429Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances500Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 502:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 503:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation sendAiSolutionMessageAsync
     *
     * Отправка сообщения агенту AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  \OpenAPI\Client\Model\SendAiSolutionMessage $send_ai_solution_message (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['sendAiSolutionMessage'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function sendAiSolutionMessageAsync($solution_id, $send_ai_solution_message, string $contentType = self::contentTypes['sendAiSolutionMessage'][0])
    {
        return $this->sendAiSolutionMessageAsyncWithHttpInfo($solution_id, $send_ai_solution_message, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation sendAiSolutionMessageAsyncWithHttpInfo
     *
     * Отправка сообщения агенту AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  \OpenAPI\Client\Model\SendAiSolutionMessage $send_ai_solution_message (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['sendAiSolutionMessage'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function sendAiSolutionMessageAsyncWithHttpInfo($solution_id, $send_ai_solution_message, string $contentType = self::contentTypes['sendAiSolutionMessage'][0])
    {
        $returnType = '\OpenAPI\Client\Model\SendAiSolutionMessage200Response';
        $request = $this->sendAiSolutionMessageRequest($solution_id, $send_ai_solution_message, $contentType);

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
     * Create request for operation 'sendAiSolutionMessage'
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  \OpenAPI\Client\Model\SendAiSolutionMessage $send_ai_solution_message (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['sendAiSolutionMessage'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function sendAiSolutionMessageRequest($solution_id, $send_ai_solution_message, string $contentType = self::contentTypes['sendAiSolutionMessage'][0])
    {

        // verify the required parameter 'solution_id' is set
        if ($solution_id === null || (is_array($solution_id) && count($solution_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $solution_id when calling sendAiSolutionMessage'
            );
        }
        if ($solution_id < 1) {
            throw new \InvalidArgumentException('invalid value for "$solution_id" when calling AISolutionsApi.sendAiSolutionMessage, must be bigger than or equal to 1.');
        }
        
        // verify the required parameter 'send_ai_solution_message' is set
        if ($send_ai_solution_message === null || (is_array($send_ai_solution_message) && count($send_ai_solution_message) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $send_ai_solution_message when calling sendAiSolutionMessage'
            );
        }


        $resourcePath = '/api/v1/cloud-ai/solutions/{solution_id}/chat/messages';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($solution_id !== null) {
            $resourcePath = str_replace(
                '{' . 'solution_id' . '}',
                ObjectSerializer::toPathValue($solution_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($send_ai_solution_message)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($send_ai_solution_message));
            } else {
                $httpBody = $send_ai_solution_message;
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

        // this endpoint requires Bearer (JWT) authentication (access token)
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

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation shutdownAiSolution
     *
     * Выключение AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['shutdownAiSolution'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function shutdownAiSolution($solution_id, string $contentType = self::contentTypes['shutdownAiSolution'][0])
    {
        $this->shutdownAiSolutionWithHttpInfo($solution_id, $contentType);
    }

    /**
     * Operation shutdownAiSolutionWithHttpInfo
     *
     * Выключение AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['shutdownAiSolution'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function shutdownAiSolutionWithHttpInfo($solution_id, string $contentType = self::contentTypes['shutdownAiSolution'][0])
    {
        $request = $this->shutdownAiSolutionRequest($solution_id, $contentType);

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

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances400Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances401Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetAccountStatus403Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetImage404Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 409:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\UpdateDatabaseInstance409Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances429Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances500Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 502:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation shutdownAiSolutionAsync
     *
     * Выключение AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['shutdownAiSolution'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function shutdownAiSolutionAsync($solution_id, string $contentType = self::contentTypes['shutdownAiSolution'][0])
    {
        return $this->shutdownAiSolutionAsyncWithHttpInfo($solution_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation shutdownAiSolutionAsyncWithHttpInfo
     *
     * Выключение AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['shutdownAiSolution'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function shutdownAiSolutionAsyncWithHttpInfo($solution_id, string $contentType = self::contentTypes['shutdownAiSolution'][0])
    {
        $returnType = '';
        $request = $this->shutdownAiSolutionRequest($solution_id, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
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
     * Create request for operation 'shutdownAiSolution'
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['shutdownAiSolution'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function shutdownAiSolutionRequest($solution_id, string $contentType = self::contentTypes['shutdownAiSolution'][0])
    {

        // verify the required parameter 'solution_id' is set
        if ($solution_id === null || (is_array($solution_id) && count($solution_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $solution_id when calling shutdownAiSolution'
            );
        }
        if ($solution_id < 1) {
            throw new \InvalidArgumentException('invalid value for "$solution_id" when calling AISolutionsApi.shutdownAiSolution, must be bigger than or equal to 1.');
        }
        

        $resourcePath = '/api/v1/cloud-ai/solutions/{solution_id}/shutdown';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($solution_id !== null) {
            $resourcePath = str_replace(
                '{' . 'solution_id' . '}',
                ObjectSerializer::toPathValue($solution_id),
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

        // this endpoint requires Bearer (JWT) authentication (access token)
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

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation startAiSolution
     *
     * Запуск AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['startAiSolution'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function startAiSolution($solution_id, string $contentType = self::contentTypes['startAiSolution'][0])
    {
        $this->startAiSolutionWithHttpInfo($solution_id, $contentType);
    }

    /**
     * Operation startAiSolutionWithHttpInfo
     *
     * Запуск AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['startAiSolution'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function startAiSolutionWithHttpInfo($solution_id, string $contentType = self::contentTypes['startAiSolution'][0])
    {
        $request = $this->startAiSolutionRequest($solution_id, $contentType);

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

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances400Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances401Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetAccountStatus403Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetImage404Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 409:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\UpdateDatabaseInstance409Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances429Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances500Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 502:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation startAiSolutionAsync
     *
     * Запуск AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['startAiSolution'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function startAiSolutionAsync($solution_id, string $contentType = self::contentTypes['startAiSolution'][0])
    {
        return $this->startAiSolutionAsyncWithHttpInfo($solution_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation startAiSolutionAsyncWithHttpInfo
     *
     * Запуск AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['startAiSolution'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function startAiSolutionAsyncWithHttpInfo($solution_id, string $contentType = self::contentTypes['startAiSolution'][0])
    {
        $returnType = '';
        $request = $this->startAiSolutionRequest($solution_id, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
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
     * Create request for operation 'startAiSolution'
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['startAiSolution'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function startAiSolutionRequest($solution_id, string $contentType = self::contentTypes['startAiSolution'][0])
    {

        // verify the required parameter 'solution_id' is set
        if ($solution_id === null || (is_array($solution_id) && count($solution_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $solution_id when calling startAiSolution'
            );
        }
        if ($solution_id < 1) {
            throw new \InvalidArgumentException('invalid value for "$solution_id" when calling AISolutionsApi.startAiSolution, must be bigger than or equal to 1.');
        }
        

        $resourcePath = '/api/v1/cloud-ai/solutions/{solution_id}/start';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($solution_id !== null) {
            $resourcePath = str_replace(
                '{' . 'solution_id' . '}',
                ObjectSerializer::toPathValue($solution_id),
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

        // this endpoint requires Bearer (JWT) authentication (access token)
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

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation stopAiSolutionChat
     *
     * Остановка хода агента AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  \OpenAPI\Client\Model\StopAiSolutionChat $stop_ai_solution_chat stop_ai_solution_chat (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['stopAiSolutionChat'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function stopAiSolutionChat($solution_id, $stop_ai_solution_chat = null, string $contentType = self::contentTypes['stopAiSolutionChat'][0])
    {
        $this->stopAiSolutionChatWithHttpInfo($solution_id, $stop_ai_solution_chat, $contentType);
    }

    /**
     * Operation stopAiSolutionChatWithHttpInfo
     *
     * Остановка хода агента AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  \OpenAPI\Client\Model\StopAiSolutionChat $stop_ai_solution_chat (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['stopAiSolutionChat'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function stopAiSolutionChatWithHttpInfo($solution_id, $stop_ai_solution_chat = null, string $contentType = self::contentTypes['stopAiSolutionChat'][0])
    {
        $request = $this->stopAiSolutionChatRequest($solution_id, $stop_ai_solution_chat, $contentType);

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

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances400Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances401Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetAccountStatus403Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetImage404Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances429Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances500Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 502:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 503:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation stopAiSolutionChatAsync
     *
     * Остановка хода агента AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  \OpenAPI\Client\Model\StopAiSolutionChat $stop_ai_solution_chat (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['stopAiSolutionChat'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function stopAiSolutionChatAsync($solution_id, $stop_ai_solution_chat = null, string $contentType = self::contentTypes['stopAiSolutionChat'][0])
    {
        return $this->stopAiSolutionChatAsyncWithHttpInfo($solution_id, $stop_ai_solution_chat, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation stopAiSolutionChatAsyncWithHttpInfo
     *
     * Остановка хода агента AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  \OpenAPI\Client\Model\StopAiSolutionChat $stop_ai_solution_chat (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['stopAiSolutionChat'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function stopAiSolutionChatAsyncWithHttpInfo($solution_id, $stop_ai_solution_chat = null, string $contentType = self::contentTypes['stopAiSolutionChat'][0])
    {
        $returnType = '';
        $request = $this->stopAiSolutionChatRequest($solution_id, $stop_ai_solution_chat, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
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
     * Create request for operation 'stopAiSolutionChat'
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  \OpenAPI\Client\Model\StopAiSolutionChat $stop_ai_solution_chat (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['stopAiSolutionChat'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function stopAiSolutionChatRequest($solution_id, $stop_ai_solution_chat = null, string $contentType = self::contentTypes['stopAiSolutionChat'][0])
    {

        // verify the required parameter 'solution_id' is set
        if ($solution_id === null || (is_array($solution_id) && count($solution_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $solution_id when calling stopAiSolutionChat'
            );
        }
        if ($solution_id < 1) {
            throw new \InvalidArgumentException('invalid value for "$solution_id" when calling AISolutionsApi.stopAiSolutionChat, must be bigger than or equal to 1.');
        }
        


        $resourcePath = '/api/v1/cloud-ai/solutions/{solution_id}/chat/stop';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($solution_id !== null) {
            $resourcePath = str_replace(
                '{' . 'solution_id' . '}',
                ObjectSerializer::toPathValue($solution_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($stop_ai_solution_chat)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($stop_ai_solution_chat));
            } else {
                $httpBody = $stop_ai_solution_chat;
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

        // this endpoint requires Bearer (JWT) authentication (access token)
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

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation streamAiSolutionChat
     *
     * Отправка сообщения агенту AI-решения с потоковым ответом
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://agent.timeweb.cloud
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  \OpenAPI\Client\Model\SendAiSolutionMessage $send_ai_solution_message send_ai_solution_message (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['streamAiSolutionChat'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return string|\OpenAPI\Client\Model\StreamError|\OpenAPI\Client\Model\StreamError|\OpenAPI\Client\Model\StreamError|\OpenAPI\Client\Model\StreamError|\OpenAPI\Client\Model\StreamError
     */
    public function streamAiSolutionChat($solution_id, $send_ai_solution_message, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['streamAiSolutionChat'][0])
    {
        list($response) = $this->streamAiSolutionChatWithHttpInfo($solution_id, $send_ai_solution_message, $hostIndex, $variables, $contentType);
        return $response;
    }

    /**
     * Operation streamAiSolutionChatWithHttpInfo
     *
     * Отправка сообщения агенту AI-решения с потоковым ответом
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://agent.timeweb.cloud
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  \OpenAPI\Client\Model\SendAiSolutionMessage $send_ai_solution_message (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['streamAiSolutionChat'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of string|\OpenAPI\Client\Model\StreamError|\OpenAPI\Client\Model\StreamError|\OpenAPI\Client\Model\StreamError|\OpenAPI\Client\Model\StreamError|\OpenAPI\Client\Model\StreamError, HTTP status code, HTTP response headers (array of strings)
     */
    public function streamAiSolutionChatWithHttpInfo($solution_id, $send_ai_solution_message, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['streamAiSolutionChat'][0])
    {
        $request = $this->streamAiSolutionChatRequest($solution_id, $send_ai_solution_message, $hostIndex, $variables, $contentType);

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
                    if ('string' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('string' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, 'string', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\OpenAPI\Client\Model\StreamError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\StreamError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\StreamError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\OpenAPI\Client\Model\StreamError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\StreamError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\StreamError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\OpenAPI\Client\Model\StreamError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\StreamError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\StreamError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\OpenAPI\Client\Model\StreamError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\StreamError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\StreamError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 503:
                    if ('\OpenAPI\Client\Model\StreamError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\StreamError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\StreamError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = 'string';
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
                        'string',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\StreamError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\StreamError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\StreamError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\StreamError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 503:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\StreamError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation streamAiSolutionChatAsync
     *
     * Отправка сообщения агенту AI-решения с потоковым ответом
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://agent.timeweb.cloud
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  \OpenAPI\Client\Model\SendAiSolutionMessage $send_ai_solution_message (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['streamAiSolutionChat'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function streamAiSolutionChatAsync($solution_id, $send_ai_solution_message, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['streamAiSolutionChat'][0])
    {
        return $this->streamAiSolutionChatAsyncWithHttpInfo($solution_id, $send_ai_solution_message, $hostIndex, $variables, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation streamAiSolutionChatAsyncWithHttpInfo
     *
     * Отправка сообщения агенту AI-решения с потоковым ответом
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://agent.timeweb.cloud
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  \OpenAPI\Client\Model\SendAiSolutionMessage $send_ai_solution_message (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['streamAiSolutionChat'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function streamAiSolutionChatAsyncWithHttpInfo($solution_id, $send_ai_solution_message, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['streamAiSolutionChat'][0])
    {
        $returnType = 'string';
        $request = $this->streamAiSolutionChatRequest($solution_id, $send_ai_solution_message, $hostIndex, $variables, $contentType);

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
     * Create request for operation 'streamAiSolutionChat'
     *
    * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
    * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://agent.timeweb.cloud
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  \OpenAPI\Client\Model\SendAiSolutionMessage $send_ai_solution_message (required)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['streamAiSolutionChat'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function streamAiSolutionChatRequest($solution_id, $send_ai_solution_message, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['streamAiSolutionChat'][0])
    {

        // verify the required parameter 'solution_id' is set
        if ($solution_id === null || (is_array($solution_id) && count($solution_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $solution_id when calling streamAiSolutionChat'
            );
        }
        if ($solution_id < 1) {
            throw new \InvalidArgumentException('invalid value for "$solution_id" when calling AISolutionsApi.streamAiSolutionChat, must be bigger than or equal to 1.');
        }
        
        // verify the required parameter 'send_ai_solution_message' is set
        if ($send_ai_solution_message === null || (is_array($send_ai_solution_message) && count($send_ai_solution_message) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $send_ai_solution_message when calling streamAiSolutionChat'
            );
        }


        $resourcePath = '/api/v1/cloud-ai/solutions/{solution_id}/chat/stream';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($solution_id !== null) {
            $resourcePath = str_replace(
                '{' . 'solution_id' . '}',
                ObjectSerializer::toPathValue($solution_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['text/event-stream', 'application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($send_ai_solution_message)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($send_ai_solution_message));
            } else {
                $httpBody = $send_ai_solution_message;
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

        // this endpoint requires Bearer (JWT) authentication (access token)
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

        $hostSettings = $this->getHostSettingsForstreamAiSolutionChat();

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
     * Returns an array of host settings for Operation streamAiSolutionChat
     *
     * @return array an array of host settings
     */
    protected function getHostSettingsForstreamAiSolutionChat(): array
    {
        return [
            [
                "url" => "https://agent.timeweb.cloud",
                "description" => "No description provided",
            ]
        ];
    }

    /**
     * Operation updateAiSolution
     *
     * Изменение AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  \OpenAPI\Client\Model\UpdateAiSolution $update_ai_solution update_ai_solution (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['updateAiSolution'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \OpenAPI\Client\Model\CreateAiSolution201Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\GetAccountStatus403Response|\OpenAPI\Client\Model\GetImage404Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response|\OpenAPI\Client\Model\ErrorResponse|\OpenAPI\Client\Model\ErrorResponse
     */
    public function updateAiSolution($solution_id, $update_ai_solution, string $contentType = self::contentTypes['updateAiSolution'][0])
    {
        list($response) = $this->updateAiSolutionWithHttpInfo($solution_id, $update_ai_solution, $contentType);
        return $response;
    }

    /**
     * Operation updateAiSolutionWithHttpInfo
     *
     * Изменение AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  \OpenAPI\Client\Model\UpdateAiSolution $update_ai_solution (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['updateAiSolution'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPI\Client\Model\CreateAiSolution201Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\GetAccountStatus403Response|\OpenAPI\Client\Model\GetImage404Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response|\OpenAPI\Client\Model\ErrorResponse|\OpenAPI\Client\Model\ErrorResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function updateAiSolutionWithHttpInfo($solution_id, $update_ai_solution, string $contentType = self::contentTypes['updateAiSolution'][0])
    {
        $request = $this->updateAiSolutionRequest($solution_id, $update_ai_solution, $contentType);

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
                    if ('\OpenAPI\Client\Model\CreateAiSolution201Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\CreateAiSolution201Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\CreateAiSolution201Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\OpenAPI\Client\Model\GetFinances400Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances400Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances400Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\OpenAPI\Client\Model\GetFinances401Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances401Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances401Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\OpenAPI\Client\Model\GetAccountStatus403Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetAccountStatus403Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetAccountStatus403Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\OpenAPI\Client\Model\GetImage404Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetImage404Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetImage404Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 429:
                    if ('\OpenAPI\Client\Model\GetFinances429Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances429Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances429Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\OpenAPI\Client\Model\GetFinances500Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetFinances500Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetFinances500Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 502:
                    if ('\OpenAPI\Client\Model\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\ErrorResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 503:
                    if ('\OpenAPI\Client\Model\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\ErrorResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\OpenAPI\Client\Model\CreateAiSolution201Response';
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
                        '\OpenAPI\Client\Model\CreateAiSolution201Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances400Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances401Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetAccountStatus403Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetImage404Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances429Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances500Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 502:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 503:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation updateAiSolutionAsync
     *
     * Изменение AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  \OpenAPI\Client\Model\UpdateAiSolution $update_ai_solution (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['updateAiSolution'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateAiSolutionAsync($solution_id, $update_ai_solution, string $contentType = self::contentTypes['updateAiSolution'][0])
    {
        return $this->updateAiSolutionAsyncWithHttpInfo($solution_id, $update_ai_solution, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation updateAiSolutionAsyncWithHttpInfo
     *
     * Изменение AI-решения
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  \OpenAPI\Client\Model\UpdateAiSolution $update_ai_solution (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['updateAiSolution'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateAiSolutionAsyncWithHttpInfo($solution_id, $update_ai_solution, string $contentType = self::contentTypes['updateAiSolution'][0])
    {
        $returnType = '\OpenAPI\Client\Model\CreateAiSolution201Response';
        $request = $this->updateAiSolutionRequest($solution_id, $update_ai_solution, $contentType);

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
     * Create request for operation 'updateAiSolution'
     *
     * @param  int $solution_id ID AI-решения (required)
     * @param  \OpenAPI\Client\Model\UpdateAiSolution $update_ai_solution (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['updateAiSolution'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function updateAiSolutionRequest($solution_id, $update_ai_solution, string $contentType = self::contentTypes['updateAiSolution'][0])
    {

        // verify the required parameter 'solution_id' is set
        if ($solution_id === null || (is_array($solution_id) && count($solution_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $solution_id when calling updateAiSolution'
            );
        }
        if ($solution_id < 1) {
            throw new \InvalidArgumentException('invalid value for "$solution_id" when calling AISolutionsApi.updateAiSolution, must be bigger than or equal to 1.');
        }
        
        // verify the required parameter 'update_ai_solution' is set
        if ($update_ai_solution === null || (is_array($update_ai_solution) && count($update_ai_solution) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $update_ai_solution when calling updateAiSolution'
            );
        }


        $resourcePath = '/api/v1/cloud-ai/solutions/{solution_id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($solution_id !== null) {
            $resourcePath = str_replace(
                '{' . 'solution_id' . '}',
                ObjectSerializer::toPathValue($solution_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($update_ai_solution)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($update_ai_solution));
            } else {
                $httpBody = $update_ai_solution;
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

        // this endpoint requires Bearer (JWT) authentication (access token)
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

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'PATCH',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
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
