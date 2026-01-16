<?php
/**
 * MailApi
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
 * MailApi Class Doc Comment
 *
 * @category Class
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class MailApi
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
        'createDomainMailbox' => [
            'application/json',
        ],
        'createDomainMailboxV2' => [
            'application/json',
        ],
        'createMultipleDomainMailboxes' => [
            'application/json',
        ],
        'createMultipleDomainMailboxesV2' => [
            'application/json',
        ],
        'deleteMailbox' => [
            'application/json',
        ],
        'getAllMailboxesV2' => [
            'application/json',
        ],
        'getDomainMailInfo' => [
            'application/json',
        ],
        'getDomainMailboxes' => [
            'application/json',
        ],
        'getMailbox' => [
            'application/json',
        ],
        'getMailboxV2' => [
            'application/json',
        ],
        'getMailboxes' => [
            'application/json',
        ],
        'updateDomainMailInfo' => [
            'application/json',
        ],
        'updateMailbox' => [
            'application/json',
        ],
        'updateMailboxV2' => [
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
     * Operation createDomainMailbox
     *
     * Создание почтового ящика
     *
     * @param  string $domain Полное имя домена (required)
     * @param  \OpenAPI\Client\Model\CreateDomainMailboxRequest $create_domain_mailbox_request create_domain_mailbox_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createDomainMailbox'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \OpenAPI\Client\Model\CreateDomainMailbox201Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\GetAccountStatus403Response|\OpenAPI\Client\Model\GetImage404Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response
     * @deprecated
     */
    public function createDomainMailbox($domain, $create_domain_mailbox_request, string $contentType = self::contentTypes['createDomainMailbox'][0])
    {
        list($response) = $this->createDomainMailboxWithHttpInfo($domain, $create_domain_mailbox_request, $contentType);
        return $response;
    }

    /**
     * Operation createDomainMailboxWithHttpInfo
     *
     * Создание почтового ящика
     *
     * @param  string $domain Полное имя домена (required)
     * @param  \OpenAPI\Client\Model\CreateDomainMailboxRequest $create_domain_mailbox_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createDomainMailbox'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPI\Client\Model\CreateDomainMailbox201Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\GetAccountStatus403Response|\OpenAPI\Client\Model\GetImage404Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response, HTTP status code, HTTP response headers (array of strings)
     * @deprecated
     */
    public function createDomainMailboxWithHttpInfo($domain, $create_domain_mailbox_request, string $contentType = self::contentTypes['createDomainMailbox'][0])
    {
        $request = $this->createDomainMailboxRequest($domain, $create_domain_mailbox_request, $contentType);

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
                    if ('\OpenAPI\Client\Model\CreateDomainMailbox201Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\CreateDomainMailbox201Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\CreateDomainMailbox201Response', []),
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

            $returnType = '\OpenAPI\Client\Model\CreateDomainMailbox201Response';
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
                        '\OpenAPI\Client\Model\CreateDomainMailbox201Response',
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
     * Operation createDomainMailboxAsync
     *
     * Создание почтового ящика
     *
     * @param  string $domain Полное имя домена (required)
     * @param  \OpenAPI\Client\Model\CreateDomainMailboxRequest $create_domain_mailbox_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createDomainMailbox'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @deprecated
     */
    public function createDomainMailboxAsync($domain, $create_domain_mailbox_request, string $contentType = self::contentTypes['createDomainMailbox'][0])
    {
        return $this->createDomainMailboxAsyncWithHttpInfo($domain, $create_domain_mailbox_request, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createDomainMailboxAsyncWithHttpInfo
     *
     * Создание почтового ящика
     *
     * @param  string $domain Полное имя домена (required)
     * @param  \OpenAPI\Client\Model\CreateDomainMailboxRequest $create_domain_mailbox_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createDomainMailbox'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @deprecated
     */
    public function createDomainMailboxAsyncWithHttpInfo($domain, $create_domain_mailbox_request, string $contentType = self::contentTypes['createDomainMailbox'][0])
    {
        $returnType = '\OpenAPI\Client\Model\CreateDomainMailbox201Response';
        $request = $this->createDomainMailboxRequest($domain, $create_domain_mailbox_request, $contentType);

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
     * Create request for operation 'createDomainMailbox'
     *
     * @param  string $domain Полное имя домена (required)
     * @param  \OpenAPI\Client\Model\CreateDomainMailboxRequest $create_domain_mailbox_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createDomainMailbox'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     * @deprecated
     */
    public function createDomainMailboxRequest($domain, $create_domain_mailbox_request, string $contentType = self::contentTypes['createDomainMailbox'][0])
    {

        // verify the required parameter 'domain' is set
        if ($domain === null || (is_array($domain) && count($domain) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $domain when calling createDomainMailbox'
            );
        }

        // verify the required parameter 'create_domain_mailbox_request' is set
        if ($create_domain_mailbox_request === null || (is_array($create_domain_mailbox_request) && count($create_domain_mailbox_request) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $create_domain_mailbox_request when calling createDomainMailbox'
            );
        }


        $resourcePath = '/api/v1/mail/domains/{domain}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($domain !== null) {
            $resourcePath = str_replace(
                '{' . 'domain' . '}',
                ObjectSerializer::toPathValue($domain),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($create_domain_mailbox_request)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($create_domain_mailbox_request));
            } else {
                $httpBody = $create_domain_mailbox_request;
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
     * Operation createDomainMailboxV2
     *
     * Создание почтового ящика
     *
     * @param  string $domain Полное имя домена (required)
     * @param  \OpenAPI\Client\Model\CreateDomainMailboxV2Request $create_domain_mailbox_v2_request create_domain_mailbox_v2_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createDomainMailboxV2'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \OpenAPI\Client\Model\CreateDomainMailboxV2201Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\GetAccountStatus403Response|\OpenAPI\Client\Model\GetImage404Response|\OpenAPI\Client\Model\CreateDatabaseBackup409Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response
     */
    public function createDomainMailboxV2($domain, $create_domain_mailbox_v2_request, string $contentType = self::contentTypes['createDomainMailboxV2'][0])
    {
        list($response) = $this->createDomainMailboxV2WithHttpInfo($domain, $create_domain_mailbox_v2_request, $contentType);
        return $response;
    }

    /**
     * Operation createDomainMailboxV2WithHttpInfo
     *
     * Создание почтового ящика
     *
     * @param  string $domain Полное имя домена (required)
     * @param  \OpenAPI\Client\Model\CreateDomainMailboxV2Request $create_domain_mailbox_v2_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createDomainMailboxV2'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPI\Client\Model\CreateDomainMailboxV2201Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\GetAccountStatus403Response|\OpenAPI\Client\Model\GetImage404Response|\OpenAPI\Client\Model\CreateDatabaseBackup409Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response, HTTP status code, HTTP response headers (array of strings)
     */
    public function createDomainMailboxV2WithHttpInfo($domain, $create_domain_mailbox_v2_request, string $contentType = self::contentTypes['createDomainMailboxV2'][0])
    {
        $request = $this->createDomainMailboxV2Request($domain, $create_domain_mailbox_v2_request, $contentType);

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
                    if ('\OpenAPI\Client\Model\CreateDomainMailboxV2201Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\CreateDomainMailboxV2201Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\CreateDomainMailboxV2201Response', []),
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
                    if ('\OpenAPI\Client\Model\CreateDatabaseBackup409Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\CreateDatabaseBackup409Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\CreateDatabaseBackup409Response', []),
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

            $returnType = '\OpenAPI\Client\Model\CreateDomainMailboxV2201Response';
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
                        '\OpenAPI\Client\Model\CreateDomainMailboxV2201Response',
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
                        '\OpenAPI\Client\Model\CreateDatabaseBackup409Response',
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
     * Operation createDomainMailboxV2Async
     *
     * Создание почтового ящика
     *
     * @param  string $domain Полное имя домена (required)
     * @param  \OpenAPI\Client\Model\CreateDomainMailboxV2Request $create_domain_mailbox_v2_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createDomainMailboxV2'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createDomainMailboxV2Async($domain, $create_domain_mailbox_v2_request, string $contentType = self::contentTypes['createDomainMailboxV2'][0])
    {
        return $this->createDomainMailboxV2AsyncWithHttpInfo($domain, $create_domain_mailbox_v2_request, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createDomainMailboxV2AsyncWithHttpInfo
     *
     * Создание почтового ящика
     *
     * @param  string $domain Полное имя домена (required)
     * @param  \OpenAPI\Client\Model\CreateDomainMailboxV2Request $create_domain_mailbox_v2_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createDomainMailboxV2'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createDomainMailboxV2AsyncWithHttpInfo($domain, $create_domain_mailbox_v2_request, string $contentType = self::contentTypes['createDomainMailboxV2'][0])
    {
        $returnType = '\OpenAPI\Client\Model\CreateDomainMailboxV2201Response';
        $request = $this->createDomainMailboxV2Request($domain, $create_domain_mailbox_v2_request, $contentType);

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
     * Create request for operation 'createDomainMailboxV2'
     *
     * @param  string $domain Полное имя домена (required)
     * @param  \OpenAPI\Client\Model\CreateDomainMailboxV2Request $create_domain_mailbox_v2_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createDomainMailboxV2'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function createDomainMailboxV2Request($domain, $create_domain_mailbox_v2_request, string $contentType = self::contentTypes['createDomainMailboxV2'][0])
    {

        // verify the required parameter 'domain' is set
        if ($domain === null || (is_array($domain) && count($domain) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $domain when calling createDomainMailboxV2'
            );
        }

        // verify the required parameter 'create_domain_mailbox_v2_request' is set
        if ($create_domain_mailbox_v2_request === null || (is_array($create_domain_mailbox_v2_request) && count($create_domain_mailbox_v2_request) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $create_domain_mailbox_v2_request when calling createDomainMailboxV2'
            );
        }


        $resourcePath = '/api/v2/mail/domains/{domain}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($domain !== null) {
            $resourcePath = str_replace(
                '{' . 'domain' . '}',
                ObjectSerializer::toPathValue($domain),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($create_domain_mailbox_v2_request)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($create_domain_mailbox_v2_request));
            } else {
                $httpBody = $create_domain_mailbox_v2_request;
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
     * Operation createMultipleDomainMailboxes
     *
     * Множественное создание почтовых ящиков
     *
     * @param  string $domain Полное имя домена (required)
     * @param  \OpenAPI\Client\Model\CreateMultipleDomainMailboxesRequest $create_multiple_domain_mailboxes_request create_multiple_domain_mailboxes_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createMultipleDomainMailboxes'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \OpenAPI\Client\Model\CreateMultipleDomainMailboxes201Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\GetAccountStatus403Response|\OpenAPI\Client\Model\GetImage404Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response
     * @deprecated
     */
    public function createMultipleDomainMailboxes($domain, $create_multiple_domain_mailboxes_request, string $contentType = self::contentTypes['createMultipleDomainMailboxes'][0])
    {
        list($response) = $this->createMultipleDomainMailboxesWithHttpInfo($domain, $create_multiple_domain_mailboxes_request, $contentType);
        return $response;
    }

    /**
     * Operation createMultipleDomainMailboxesWithHttpInfo
     *
     * Множественное создание почтовых ящиков
     *
     * @param  string $domain Полное имя домена (required)
     * @param  \OpenAPI\Client\Model\CreateMultipleDomainMailboxesRequest $create_multiple_domain_mailboxes_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createMultipleDomainMailboxes'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPI\Client\Model\CreateMultipleDomainMailboxes201Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\GetAccountStatus403Response|\OpenAPI\Client\Model\GetImage404Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response, HTTP status code, HTTP response headers (array of strings)
     * @deprecated
     */
    public function createMultipleDomainMailboxesWithHttpInfo($domain, $create_multiple_domain_mailboxes_request, string $contentType = self::contentTypes['createMultipleDomainMailboxes'][0])
    {
        $request = $this->createMultipleDomainMailboxesRequest($domain, $create_multiple_domain_mailboxes_request, $contentType);

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
                    if ('\OpenAPI\Client\Model\CreateMultipleDomainMailboxes201Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\CreateMultipleDomainMailboxes201Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\CreateMultipleDomainMailboxes201Response', []),
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

            $returnType = '\OpenAPI\Client\Model\CreateMultipleDomainMailboxes201Response';
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
                        '\OpenAPI\Client\Model\CreateMultipleDomainMailboxes201Response',
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
     * Operation createMultipleDomainMailboxesAsync
     *
     * Множественное создание почтовых ящиков
     *
     * @param  string $domain Полное имя домена (required)
     * @param  \OpenAPI\Client\Model\CreateMultipleDomainMailboxesRequest $create_multiple_domain_mailboxes_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createMultipleDomainMailboxes'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @deprecated
     */
    public function createMultipleDomainMailboxesAsync($domain, $create_multiple_domain_mailboxes_request, string $contentType = self::contentTypes['createMultipleDomainMailboxes'][0])
    {
        return $this->createMultipleDomainMailboxesAsyncWithHttpInfo($domain, $create_multiple_domain_mailboxes_request, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createMultipleDomainMailboxesAsyncWithHttpInfo
     *
     * Множественное создание почтовых ящиков
     *
     * @param  string $domain Полное имя домена (required)
     * @param  \OpenAPI\Client\Model\CreateMultipleDomainMailboxesRequest $create_multiple_domain_mailboxes_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createMultipleDomainMailboxes'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @deprecated
     */
    public function createMultipleDomainMailboxesAsyncWithHttpInfo($domain, $create_multiple_domain_mailboxes_request, string $contentType = self::contentTypes['createMultipleDomainMailboxes'][0])
    {
        $returnType = '\OpenAPI\Client\Model\CreateMultipleDomainMailboxes201Response';
        $request = $this->createMultipleDomainMailboxesRequest($domain, $create_multiple_domain_mailboxes_request, $contentType);

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
     * Create request for operation 'createMultipleDomainMailboxes'
     *
     * @param  string $domain Полное имя домена (required)
     * @param  \OpenAPI\Client\Model\CreateMultipleDomainMailboxesRequest $create_multiple_domain_mailboxes_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createMultipleDomainMailboxes'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     * @deprecated
     */
    public function createMultipleDomainMailboxesRequest($domain, $create_multiple_domain_mailboxes_request, string $contentType = self::contentTypes['createMultipleDomainMailboxes'][0])
    {

        // verify the required parameter 'domain' is set
        if ($domain === null || (is_array($domain) && count($domain) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $domain when calling createMultipleDomainMailboxes'
            );
        }

        // verify the required parameter 'create_multiple_domain_mailboxes_request' is set
        if ($create_multiple_domain_mailboxes_request === null || (is_array($create_multiple_domain_mailboxes_request) && count($create_multiple_domain_mailboxes_request) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $create_multiple_domain_mailboxes_request when calling createMultipleDomainMailboxes'
            );
        }


        $resourcePath = '/api/v1/mail/domains/{domain}/batch';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($domain !== null) {
            $resourcePath = str_replace(
                '{' . 'domain' . '}',
                ObjectSerializer::toPathValue($domain),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($create_multiple_domain_mailboxes_request)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($create_multiple_domain_mailboxes_request));
            } else {
                $httpBody = $create_multiple_domain_mailboxes_request;
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
     * Operation createMultipleDomainMailboxesV2
     *
     * Множественное создание почтовых ящиков
     *
     * @param  string $domain Полное имя домена (required)
     * @param  \OpenAPI\Client\Model\CreateMultipleDomainMailboxesV2RequestInner[] $create_multiple_domain_mailboxes_v2_request_inner create_multiple_domain_mailboxes_v2_request_inner (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createMultipleDomainMailboxesV2'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \OpenAPI\Client\Model\CreateMultipleDomainMailboxesV2201Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\GetAccountStatus403Response|\OpenAPI\Client\Model\GetImage404Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response
     */
    public function createMultipleDomainMailboxesV2($domain, $create_multiple_domain_mailboxes_v2_request_inner, string $contentType = self::contentTypes['createMultipleDomainMailboxesV2'][0])
    {
        list($response) = $this->createMultipleDomainMailboxesV2WithHttpInfo($domain, $create_multiple_domain_mailboxes_v2_request_inner, $contentType);
        return $response;
    }

    /**
     * Operation createMultipleDomainMailboxesV2WithHttpInfo
     *
     * Множественное создание почтовых ящиков
     *
     * @param  string $domain Полное имя домена (required)
     * @param  \OpenAPI\Client\Model\CreateMultipleDomainMailboxesV2RequestInner[] $create_multiple_domain_mailboxes_v2_request_inner (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createMultipleDomainMailboxesV2'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPI\Client\Model\CreateMultipleDomainMailboxesV2201Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\GetAccountStatus403Response|\OpenAPI\Client\Model\GetImage404Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response, HTTP status code, HTTP response headers (array of strings)
     */
    public function createMultipleDomainMailboxesV2WithHttpInfo($domain, $create_multiple_domain_mailboxes_v2_request_inner, string $contentType = self::contentTypes['createMultipleDomainMailboxesV2'][0])
    {
        $request = $this->createMultipleDomainMailboxesV2Request($domain, $create_multiple_domain_mailboxes_v2_request_inner, $contentType);

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
                    if ('\OpenAPI\Client\Model\CreateMultipleDomainMailboxesV2201Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\CreateMultipleDomainMailboxesV2201Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\CreateMultipleDomainMailboxesV2201Response', []),
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

            $returnType = '\OpenAPI\Client\Model\CreateMultipleDomainMailboxesV2201Response';
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
                        '\OpenAPI\Client\Model\CreateMultipleDomainMailboxesV2201Response',
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
     * Operation createMultipleDomainMailboxesV2Async
     *
     * Множественное создание почтовых ящиков
     *
     * @param  string $domain Полное имя домена (required)
     * @param  \OpenAPI\Client\Model\CreateMultipleDomainMailboxesV2RequestInner[] $create_multiple_domain_mailboxes_v2_request_inner (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createMultipleDomainMailboxesV2'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createMultipleDomainMailboxesV2Async($domain, $create_multiple_domain_mailboxes_v2_request_inner, string $contentType = self::contentTypes['createMultipleDomainMailboxesV2'][0])
    {
        return $this->createMultipleDomainMailboxesV2AsyncWithHttpInfo($domain, $create_multiple_domain_mailboxes_v2_request_inner, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createMultipleDomainMailboxesV2AsyncWithHttpInfo
     *
     * Множественное создание почтовых ящиков
     *
     * @param  string $domain Полное имя домена (required)
     * @param  \OpenAPI\Client\Model\CreateMultipleDomainMailboxesV2RequestInner[] $create_multiple_domain_mailboxes_v2_request_inner (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createMultipleDomainMailboxesV2'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createMultipleDomainMailboxesV2AsyncWithHttpInfo($domain, $create_multiple_domain_mailboxes_v2_request_inner, string $contentType = self::contentTypes['createMultipleDomainMailboxesV2'][0])
    {
        $returnType = '\OpenAPI\Client\Model\CreateMultipleDomainMailboxesV2201Response';
        $request = $this->createMultipleDomainMailboxesV2Request($domain, $create_multiple_domain_mailboxes_v2_request_inner, $contentType);

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
     * Create request for operation 'createMultipleDomainMailboxesV2'
     *
     * @param  string $domain Полное имя домена (required)
     * @param  \OpenAPI\Client\Model\CreateMultipleDomainMailboxesV2RequestInner[] $create_multiple_domain_mailboxes_v2_request_inner (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createMultipleDomainMailboxesV2'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function createMultipleDomainMailboxesV2Request($domain, $create_multiple_domain_mailboxes_v2_request_inner, string $contentType = self::contentTypes['createMultipleDomainMailboxesV2'][0])
    {

        // verify the required parameter 'domain' is set
        if ($domain === null || (is_array($domain) && count($domain) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $domain when calling createMultipleDomainMailboxesV2'
            );
        }

        // verify the required parameter 'create_multiple_domain_mailboxes_v2_request_inner' is set
        if ($create_multiple_domain_mailboxes_v2_request_inner === null || (is_array($create_multiple_domain_mailboxes_v2_request_inner) && count($create_multiple_domain_mailboxes_v2_request_inner) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $create_multiple_domain_mailboxes_v2_request_inner when calling createMultipleDomainMailboxesV2'
            );
        }


        $resourcePath = '/api/v2/mail/domains/{domain}/batch';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($domain !== null) {
            $resourcePath = str_replace(
                '{' . 'domain' . '}',
                ObjectSerializer::toPathValue($domain),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($create_multiple_domain_mailboxes_v2_request_inner)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($create_multiple_domain_mailboxes_v2_request_inner));
            } else {
                $httpBody = $create_multiple_domain_mailboxes_v2_request_inner;
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
     * Operation deleteMailbox
     *
     * Удаление почтового ящика
     *
     * @param  string $domain Полное имя домена (required)
     * @param  string $mailbox Название почтового ящика (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteMailbox'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function deleteMailbox($domain, $mailbox, string $contentType = self::contentTypes['deleteMailbox'][0])
    {
        $this->deleteMailboxWithHttpInfo($domain, $mailbox, $contentType);
    }

    /**
     * Operation deleteMailboxWithHttpInfo
     *
     * Удаление почтового ящика
     *
     * @param  string $domain Полное имя домена (required)
     * @param  string $mailbox Название почтового ящика (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteMailbox'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteMailboxWithHttpInfo($domain, $mailbox, string $contentType = self::contentTypes['deleteMailbox'][0])
    {
        $request = $this->deleteMailboxRequest($domain, $mailbox, $contentType);

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
     * Operation deleteMailboxAsync
     *
     * Удаление почтового ящика
     *
     * @param  string $domain Полное имя домена (required)
     * @param  string $mailbox Название почтового ящика (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteMailbox'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteMailboxAsync($domain, $mailbox, string $contentType = self::contentTypes['deleteMailbox'][0])
    {
        return $this->deleteMailboxAsyncWithHttpInfo($domain, $mailbox, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation deleteMailboxAsyncWithHttpInfo
     *
     * Удаление почтового ящика
     *
     * @param  string $domain Полное имя домена (required)
     * @param  string $mailbox Название почтового ящика (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteMailbox'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteMailboxAsyncWithHttpInfo($domain, $mailbox, string $contentType = self::contentTypes['deleteMailbox'][0])
    {
        $returnType = '';
        $request = $this->deleteMailboxRequest($domain, $mailbox, $contentType);

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
     * Create request for operation 'deleteMailbox'
     *
     * @param  string $domain Полное имя домена (required)
     * @param  string $mailbox Название почтового ящика (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteMailbox'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function deleteMailboxRequest($domain, $mailbox, string $contentType = self::contentTypes['deleteMailbox'][0])
    {

        // verify the required parameter 'domain' is set
        if ($domain === null || (is_array($domain) && count($domain) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $domain when calling deleteMailbox'
            );
        }

        // verify the required parameter 'mailbox' is set
        if ($mailbox === null || (is_array($mailbox) && count($mailbox) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $mailbox when calling deleteMailbox'
            );
        }


        $resourcePath = '/api/v1/mail/domains/{domain}/mailboxes/{mailbox}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($domain !== null) {
            $resourcePath = str_replace(
                '{' . 'domain' . '}',
                ObjectSerializer::toPathValue($domain),
                $resourcePath
            );
        }
        // path params
        if ($mailbox !== null) {
            $resourcePath = str_replace(
                '{' . 'mailbox' . '}',
                ObjectSerializer::toPathValue($mailbox),
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
     * Operation getAllMailboxesV2
     *
     * Получение списка всех почтовых ящиков аккаунта
     *
     * @param  int $limit Обозначает количество записей, которое необходимо вернуть. (optional, default to 100)
     * @param  int $offset Указывает на смещение относительно начала списка. (optional, default to 0)
     * @param  string $search Поиск почтового ящика по названию (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAllMailboxesV2'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \OpenAPI\Client\Model\GetAllMailboxesV2200Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\GetAccountStatus403Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response
     */
    public function getAllMailboxesV2($limit = 100, $offset = 0, $search = null, string $contentType = self::contentTypes['getAllMailboxesV2'][0])
    {
        list($response) = $this->getAllMailboxesV2WithHttpInfo($limit, $offset, $search, $contentType);
        return $response;
    }

    /**
     * Operation getAllMailboxesV2WithHttpInfo
     *
     * Получение списка всех почтовых ящиков аккаунта
     *
     * @param  int $limit Обозначает количество записей, которое необходимо вернуть. (optional, default to 100)
     * @param  int $offset Указывает на смещение относительно начала списка. (optional, default to 0)
     * @param  string $search Поиск почтового ящика по названию (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAllMailboxesV2'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPI\Client\Model\GetAllMailboxesV2200Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\GetAccountStatus403Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response, HTTP status code, HTTP response headers (array of strings)
     */
    public function getAllMailboxesV2WithHttpInfo($limit = 100, $offset = 0, $search = null, string $contentType = self::contentTypes['getAllMailboxesV2'][0])
    {
        $request = $this->getAllMailboxesV2Request($limit, $offset, $search, $contentType);

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
                    if ('\OpenAPI\Client\Model\GetAllMailboxesV2200Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetAllMailboxesV2200Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetAllMailboxesV2200Response', []),
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

            $returnType = '\OpenAPI\Client\Model\GetAllMailboxesV2200Response';
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
                        '\OpenAPI\Client\Model\GetAllMailboxesV2200Response',
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
     * Operation getAllMailboxesV2Async
     *
     * Получение списка всех почтовых ящиков аккаунта
     *
     * @param  int $limit Обозначает количество записей, которое необходимо вернуть. (optional, default to 100)
     * @param  int $offset Указывает на смещение относительно начала списка. (optional, default to 0)
     * @param  string $search Поиск почтового ящика по названию (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAllMailboxesV2'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getAllMailboxesV2Async($limit = 100, $offset = 0, $search = null, string $contentType = self::contentTypes['getAllMailboxesV2'][0])
    {
        return $this->getAllMailboxesV2AsyncWithHttpInfo($limit, $offset, $search, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getAllMailboxesV2AsyncWithHttpInfo
     *
     * Получение списка всех почтовых ящиков аккаунта
     *
     * @param  int $limit Обозначает количество записей, которое необходимо вернуть. (optional, default to 100)
     * @param  int $offset Указывает на смещение относительно начала списка. (optional, default to 0)
     * @param  string $search Поиск почтового ящика по названию (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAllMailboxesV2'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getAllMailboxesV2AsyncWithHttpInfo($limit = 100, $offset = 0, $search = null, string $contentType = self::contentTypes['getAllMailboxesV2'][0])
    {
        $returnType = '\OpenAPI\Client\Model\GetAllMailboxesV2200Response';
        $request = $this->getAllMailboxesV2Request($limit, $offset, $search, $contentType);

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
     * Create request for operation 'getAllMailboxesV2'
     *
     * @param  int $limit Обозначает количество записей, которое необходимо вернуть. (optional, default to 100)
     * @param  int $offset Указывает на смещение относительно начала списка. (optional, default to 0)
     * @param  string $search Поиск почтового ящика по названию (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAllMailboxesV2'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getAllMailboxesV2Request($limit = 100, $offset = 0, $search = null, string $contentType = self::contentTypes['getAllMailboxesV2'][0])
    {





        $resourcePath = '/api/v2/mail';
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
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $search,
            'search', // param base name
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
     * Operation getDomainMailInfo
     *
     * Получение почтовой информации о домене
     *
     * @param  string $domain Полное имя домена (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getDomainMailInfo'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \OpenAPI\Client\Model\GetDomainMailInfo200Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\GetAccountStatus403Response|\OpenAPI\Client\Model\GetImage404Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response
     * @deprecated
     */
    public function getDomainMailInfo($domain, string $contentType = self::contentTypes['getDomainMailInfo'][0])
    {
        list($response) = $this->getDomainMailInfoWithHttpInfo($domain, $contentType);
        return $response;
    }

    /**
     * Operation getDomainMailInfoWithHttpInfo
     *
     * Получение почтовой информации о домене
     *
     * @param  string $domain Полное имя домена (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getDomainMailInfo'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPI\Client\Model\GetDomainMailInfo200Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\GetAccountStatus403Response|\OpenAPI\Client\Model\GetImage404Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response, HTTP status code, HTTP response headers (array of strings)
     * @deprecated
     */
    public function getDomainMailInfoWithHttpInfo($domain, string $contentType = self::contentTypes['getDomainMailInfo'][0])
    {
        $request = $this->getDomainMailInfoRequest($domain, $contentType);

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
                    if ('\OpenAPI\Client\Model\GetDomainMailInfo200Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetDomainMailInfo200Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetDomainMailInfo200Response', []),
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

            $returnType = '\OpenAPI\Client\Model\GetDomainMailInfo200Response';
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
                        '\OpenAPI\Client\Model\GetDomainMailInfo200Response',
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
     * Operation getDomainMailInfoAsync
     *
     * Получение почтовой информации о домене
     *
     * @param  string $domain Полное имя домена (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getDomainMailInfo'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @deprecated
     */
    public function getDomainMailInfoAsync($domain, string $contentType = self::contentTypes['getDomainMailInfo'][0])
    {
        return $this->getDomainMailInfoAsyncWithHttpInfo($domain, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getDomainMailInfoAsyncWithHttpInfo
     *
     * Получение почтовой информации о домене
     *
     * @param  string $domain Полное имя домена (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getDomainMailInfo'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @deprecated
     */
    public function getDomainMailInfoAsyncWithHttpInfo($domain, string $contentType = self::contentTypes['getDomainMailInfo'][0])
    {
        $returnType = '\OpenAPI\Client\Model\GetDomainMailInfo200Response';
        $request = $this->getDomainMailInfoRequest($domain, $contentType);

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
     * Create request for operation 'getDomainMailInfo'
     *
     * @param  string $domain Полное имя домена (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getDomainMailInfo'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     * @deprecated
     */
    public function getDomainMailInfoRequest($domain, string $contentType = self::contentTypes['getDomainMailInfo'][0])
    {

        // verify the required parameter 'domain' is set
        if ($domain === null || (is_array($domain) && count($domain) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $domain when calling getDomainMailInfo'
            );
        }


        $resourcePath = '/api/v1/mail/domains/{domain}/info';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($domain !== null) {
            $resourcePath = str_replace(
                '{' . 'domain' . '}',
                ObjectSerializer::toPathValue($domain),
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
     * Operation getDomainMailboxes
     *
     * Получение списка почтовых ящиков домена
     *
     * @param  string $domain Полное имя домена (required)
     * @param  int $limit Обозначает количество записей, которое необходимо вернуть. (optional, default to 100)
     * @param  int $offset Указывает на смещение относительно начала списка. (optional, default to 0)
     * @param  string $search Поиск почтового ящика по названию (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getDomainMailboxes'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \OpenAPI\Client\Model\GetMailboxes200Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\GetAccountStatus403Response|\OpenAPI\Client\Model\GetImage404Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response
     */
    public function getDomainMailboxes($domain, $limit = 100, $offset = 0, $search = null, string $contentType = self::contentTypes['getDomainMailboxes'][0])
    {
        list($response) = $this->getDomainMailboxesWithHttpInfo($domain, $limit, $offset, $search, $contentType);
        return $response;
    }

    /**
     * Operation getDomainMailboxesWithHttpInfo
     *
     * Получение списка почтовых ящиков домена
     *
     * @param  string $domain Полное имя домена (required)
     * @param  int $limit Обозначает количество записей, которое необходимо вернуть. (optional, default to 100)
     * @param  int $offset Указывает на смещение относительно начала списка. (optional, default to 0)
     * @param  string $search Поиск почтового ящика по названию (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getDomainMailboxes'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPI\Client\Model\GetMailboxes200Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\GetAccountStatus403Response|\OpenAPI\Client\Model\GetImage404Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response, HTTP status code, HTTP response headers (array of strings)
     */
    public function getDomainMailboxesWithHttpInfo($domain, $limit = 100, $offset = 0, $search = null, string $contentType = self::contentTypes['getDomainMailboxes'][0])
    {
        $request = $this->getDomainMailboxesRequest($domain, $limit, $offset, $search, $contentType);

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
                    if ('\OpenAPI\Client\Model\GetMailboxes200Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetMailboxes200Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetMailboxes200Response', []),
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

            $returnType = '\OpenAPI\Client\Model\GetMailboxes200Response';
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
                        '\OpenAPI\Client\Model\GetMailboxes200Response',
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
     * Operation getDomainMailboxesAsync
     *
     * Получение списка почтовых ящиков домена
     *
     * @param  string $domain Полное имя домена (required)
     * @param  int $limit Обозначает количество записей, которое необходимо вернуть. (optional, default to 100)
     * @param  int $offset Указывает на смещение относительно начала списка. (optional, default to 0)
     * @param  string $search Поиск почтового ящика по названию (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getDomainMailboxes'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getDomainMailboxesAsync($domain, $limit = 100, $offset = 0, $search = null, string $contentType = self::contentTypes['getDomainMailboxes'][0])
    {
        return $this->getDomainMailboxesAsyncWithHttpInfo($domain, $limit, $offset, $search, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getDomainMailboxesAsyncWithHttpInfo
     *
     * Получение списка почтовых ящиков домена
     *
     * @param  string $domain Полное имя домена (required)
     * @param  int $limit Обозначает количество записей, которое необходимо вернуть. (optional, default to 100)
     * @param  int $offset Указывает на смещение относительно начала списка. (optional, default to 0)
     * @param  string $search Поиск почтового ящика по названию (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getDomainMailboxes'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getDomainMailboxesAsyncWithHttpInfo($domain, $limit = 100, $offset = 0, $search = null, string $contentType = self::contentTypes['getDomainMailboxes'][0])
    {
        $returnType = '\OpenAPI\Client\Model\GetMailboxes200Response';
        $request = $this->getDomainMailboxesRequest($domain, $limit, $offset, $search, $contentType);

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
     * Create request for operation 'getDomainMailboxes'
     *
     * @param  string $domain Полное имя домена (required)
     * @param  int $limit Обозначает количество записей, которое необходимо вернуть. (optional, default to 100)
     * @param  int $offset Указывает на смещение относительно начала списка. (optional, default to 0)
     * @param  string $search Поиск почтового ящика по названию (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getDomainMailboxes'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getDomainMailboxesRequest($domain, $limit = 100, $offset = 0, $search = null, string $contentType = self::contentTypes['getDomainMailboxes'][0])
    {

        // verify the required parameter 'domain' is set
        if ($domain === null || (is_array($domain) && count($domain) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $domain when calling getDomainMailboxes'
            );
        }





        $resourcePath = '/api/v1/mail/domains/{domain}';
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
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $search,
            'search', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);


        // path params
        if ($domain !== null) {
            $resourcePath = str_replace(
                '{' . 'domain' . '}',
                ObjectSerializer::toPathValue($domain),
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
     * Operation getMailbox
     *
     * Получение почтового ящика
     *
     * @param  string $domain Полное имя домена (required)
     * @param  string $mailbox Название почтового ящика (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getMailbox'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \OpenAPI\Client\Model\CreateDomainMailbox201Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\GetAccountStatus403Response|\OpenAPI\Client\Model\GetImage404Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response
     * @deprecated
     */
    public function getMailbox($domain, $mailbox, string $contentType = self::contentTypes['getMailbox'][0])
    {
        list($response) = $this->getMailboxWithHttpInfo($domain, $mailbox, $contentType);
        return $response;
    }

    /**
     * Operation getMailboxWithHttpInfo
     *
     * Получение почтового ящика
     *
     * @param  string $domain Полное имя домена (required)
     * @param  string $mailbox Название почтового ящика (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getMailbox'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPI\Client\Model\CreateDomainMailbox201Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\GetAccountStatus403Response|\OpenAPI\Client\Model\GetImage404Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response, HTTP status code, HTTP response headers (array of strings)
     * @deprecated
     */
    public function getMailboxWithHttpInfo($domain, $mailbox, string $contentType = self::contentTypes['getMailbox'][0])
    {
        $request = $this->getMailboxRequest($domain, $mailbox, $contentType);

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
                    if ('\OpenAPI\Client\Model\CreateDomainMailbox201Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\CreateDomainMailbox201Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\CreateDomainMailbox201Response', []),
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

            $returnType = '\OpenAPI\Client\Model\CreateDomainMailbox201Response';
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
                        '\OpenAPI\Client\Model\CreateDomainMailbox201Response',
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
     * Operation getMailboxAsync
     *
     * Получение почтового ящика
     *
     * @param  string $domain Полное имя домена (required)
     * @param  string $mailbox Название почтового ящика (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getMailbox'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @deprecated
     */
    public function getMailboxAsync($domain, $mailbox, string $contentType = self::contentTypes['getMailbox'][0])
    {
        return $this->getMailboxAsyncWithHttpInfo($domain, $mailbox, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getMailboxAsyncWithHttpInfo
     *
     * Получение почтового ящика
     *
     * @param  string $domain Полное имя домена (required)
     * @param  string $mailbox Название почтового ящика (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getMailbox'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @deprecated
     */
    public function getMailboxAsyncWithHttpInfo($domain, $mailbox, string $contentType = self::contentTypes['getMailbox'][0])
    {
        $returnType = '\OpenAPI\Client\Model\CreateDomainMailbox201Response';
        $request = $this->getMailboxRequest($domain, $mailbox, $contentType);

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
     * Create request for operation 'getMailbox'
     *
     * @param  string $domain Полное имя домена (required)
     * @param  string $mailbox Название почтового ящика (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getMailbox'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     * @deprecated
     */
    public function getMailboxRequest($domain, $mailbox, string $contentType = self::contentTypes['getMailbox'][0])
    {

        // verify the required parameter 'domain' is set
        if ($domain === null || (is_array($domain) && count($domain) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $domain when calling getMailbox'
            );
        }

        // verify the required parameter 'mailbox' is set
        if ($mailbox === null || (is_array($mailbox) && count($mailbox) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $mailbox when calling getMailbox'
            );
        }


        $resourcePath = '/api/v1/mail/domains/{domain}/mailboxes/{mailbox}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($domain !== null) {
            $resourcePath = str_replace(
                '{' . 'domain' . '}',
                ObjectSerializer::toPathValue($domain),
                $resourcePath
            );
        }
        // path params
        if ($mailbox !== null) {
            $resourcePath = str_replace(
                '{' . 'mailbox' . '}',
                ObjectSerializer::toPathValue($mailbox),
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
     * Operation getMailboxV2
     *
     * Получение почтового ящика
     *
     * @param  string $domain Полное имя домена (required)
     * @param  string $mailbox Название почтового ящика (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getMailboxV2'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \OpenAPI\Client\Model\CreateDomainMailboxV2201Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\GetAccountStatus403Response|\OpenAPI\Client\Model\GetImage404Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response
     */
    public function getMailboxV2($domain, $mailbox, string $contentType = self::contentTypes['getMailboxV2'][0])
    {
        list($response) = $this->getMailboxV2WithHttpInfo($domain, $mailbox, $contentType);
        return $response;
    }

    /**
     * Operation getMailboxV2WithHttpInfo
     *
     * Получение почтового ящика
     *
     * @param  string $domain Полное имя домена (required)
     * @param  string $mailbox Название почтового ящика (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getMailboxV2'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPI\Client\Model\CreateDomainMailboxV2201Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\GetAccountStatus403Response|\OpenAPI\Client\Model\GetImage404Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response, HTTP status code, HTTP response headers (array of strings)
     */
    public function getMailboxV2WithHttpInfo($domain, $mailbox, string $contentType = self::contentTypes['getMailboxV2'][0])
    {
        $request = $this->getMailboxV2Request($domain, $mailbox, $contentType);

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
                    if ('\OpenAPI\Client\Model\CreateDomainMailboxV2201Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\CreateDomainMailboxV2201Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\CreateDomainMailboxV2201Response', []),
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

            $returnType = '\OpenAPI\Client\Model\CreateDomainMailboxV2201Response';
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
                        '\OpenAPI\Client\Model\CreateDomainMailboxV2201Response',
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
     * Operation getMailboxV2Async
     *
     * Получение почтового ящика
     *
     * @param  string $domain Полное имя домена (required)
     * @param  string $mailbox Название почтового ящика (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getMailboxV2'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getMailboxV2Async($domain, $mailbox, string $contentType = self::contentTypes['getMailboxV2'][0])
    {
        return $this->getMailboxV2AsyncWithHttpInfo($domain, $mailbox, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getMailboxV2AsyncWithHttpInfo
     *
     * Получение почтового ящика
     *
     * @param  string $domain Полное имя домена (required)
     * @param  string $mailbox Название почтового ящика (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getMailboxV2'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getMailboxV2AsyncWithHttpInfo($domain, $mailbox, string $contentType = self::contentTypes['getMailboxV2'][0])
    {
        $returnType = '\OpenAPI\Client\Model\CreateDomainMailboxV2201Response';
        $request = $this->getMailboxV2Request($domain, $mailbox, $contentType);

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
     * Create request for operation 'getMailboxV2'
     *
     * @param  string $domain Полное имя домена (required)
     * @param  string $mailbox Название почтового ящика (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getMailboxV2'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getMailboxV2Request($domain, $mailbox, string $contentType = self::contentTypes['getMailboxV2'][0])
    {

        // verify the required parameter 'domain' is set
        if ($domain === null || (is_array($domain) && count($domain) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $domain when calling getMailboxV2'
            );
        }

        // verify the required parameter 'mailbox' is set
        if ($mailbox === null || (is_array($mailbox) && count($mailbox) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $mailbox when calling getMailboxV2'
            );
        }


        $resourcePath = '/api/v2/mail/domains/{domain}/mailboxes/{mailbox}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($domain !== null) {
            $resourcePath = str_replace(
                '{' . 'domain' . '}',
                ObjectSerializer::toPathValue($domain),
                $resourcePath
            );
        }
        // path params
        if ($mailbox !== null) {
            $resourcePath = str_replace(
                '{' . 'mailbox' . '}',
                ObjectSerializer::toPathValue($mailbox),
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
     * Operation getMailboxes
     *
     * Получение списка почтовых ящиков аккаунта
     *
     * @param  int $limit Обозначает количество записей, которое необходимо вернуть. (optional, default to 100)
     * @param  int $offset Указывает на смещение относительно начала списка. (optional, default to 0)
     * @param  string $search Поиск почтового ящика по названию (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getMailboxes'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \OpenAPI\Client\Model\GetMailboxes200Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\GetAccountStatus403Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response
     * @deprecated
     */
    public function getMailboxes($limit = 100, $offset = 0, $search = null, string $contentType = self::contentTypes['getMailboxes'][0])
    {
        list($response) = $this->getMailboxesWithHttpInfo($limit, $offset, $search, $contentType);
        return $response;
    }

    /**
     * Operation getMailboxesWithHttpInfo
     *
     * Получение списка почтовых ящиков аккаунта
     *
     * @param  int $limit Обозначает количество записей, которое необходимо вернуть. (optional, default to 100)
     * @param  int $offset Указывает на смещение относительно начала списка. (optional, default to 0)
     * @param  string $search Поиск почтового ящика по названию (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getMailboxes'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPI\Client\Model\GetMailboxes200Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\GetAccountStatus403Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response, HTTP status code, HTTP response headers (array of strings)
     * @deprecated
     */
    public function getMailboxesWithHttpInfo($limit = 100, $offset = 0, $search = null, string $contentType = self::contentTypes['getMailboxes'][0])
    {
        $request = $this->getMailboxesRequest($limit, $offset, $search, $contentType);

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
                    if ('\OpenAPI\Client\Model\GetMailboxes200Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetMailboxes200Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetMailboxes200Response', []),
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

            $returnType = '\OpenAPI\Client\Model\GetMailboxes200Response';
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
                        '\OpenAPI\Client\Model\GetMailboxes200Response',
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
     * Operation getMailboxesAsync
     *
     * Получение списка почтовых ящиков аккаунта
     *
     * @param  int $limit Обозначает количество записей, которое необходимо вернуть. (optional, default to 100)
     * @param  int $offset Указывает на смещение относительно начала списка. (optional, default to 0)
     * @param  string $search Поиск почтового ящика по названию (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getMailboxes'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @deprecated
     */
    public function getMailboxesAsync($limit = 100, $offset = 0, $search = null, string $contentType = self::contentTypes['getMailboxes'][0])
    {
        return $this->getMailboxesAsyncWithHttpInfo($limit, $offset, $search, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getMailboxesAsyncWithHttpInfo
     *
     * Получение списка почтовых ящиков аккаунта
     *
     * @param  int $limit Обозначает количество записей, которое необходимо вернуть. (optional, default to 100)
     * @param  int $offset Указывает на смещение относительно начала списка. (optional, default to 0)
     * @param  string $search Поиск почтового ящика по названию (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getMailboxes'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @deprecated
     */
    public function getMailboxesAsyncWithHttpInfo($limit = 100, $offset = 0, $search = null, string $contentType = self::contentTypes['getMailboxes'][0])
    {
        $returnType = '\OpenAPI\Client\Model\GetMailboxes200Response';
        $request = $this->getMailboxesRequest($limit, $offset, $search, $contentType);

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
     * Create request for operation 'getMailboxes'
     *
     * @param  int $limit Обозначает количество записей, которое необходимо вернуть. (optional, default to 100)
     * @param  int $offset Указывает на смещение относительно начала списка. (optional, default to 0)
     * @param  string $search Поиск почтового ящика по названию (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getMailboxes'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     * @deprecated
     */
    public function getMailboxesRequest($limit = 100, $offset = 0, $search = null, string $contentType = self::contentTypes['getMailboxes'][0])
    {





        $resourcePath = '/api/v1/mail';
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
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $search,
            'search', // param base name
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
     * Operation updateDomainMailInfo
     *
     * Изменение почтовой информации о домене
     *
     * @param  string $domain Полное имя домена (required)
     * @param  \OpenAPI\Client\Model\UpdateDomainMailInfoRequest $update_domain_mail_info_request update_domain_mail_info_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['updateDomainMailInfo'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \OpenAPI\Client\Model\GetDomainMailInfo200Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\GetAccountStatus403Response|\OpenAPI\Client\Model\GetImage404Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response
     * @deprecated
     */
    public function updateDomainMailInfo($domain, $update_domain_mail_info_request, string $contentType = self::contentTypes['updateDomainMailInfo'][0])
    {
        list($response) = $this->updateDomainMailInfoWithHttpInfo($domain, $update_domain_mail_info_request, $contentType);
        return $response;
    }

    /**
     * Operation updateDomainMailInfoWithHttpInfo
     *
     * Изменение почтовой информации о домене
     *
     * @param  string $domain Полное имя домена (required)
     * @param  \OpenAPI\Client\Model\UpdateDomainMailInfoRequest $update_domain_mail_info_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['updateDomainMailInfo'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPI\Client\Model\GetDomainMailInfo200Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\GetAccountStatus403Response|\OpenAPI\Client\Model\GetImage404Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response, HTTP status code, HTTP response headers (array of strings)
     * @deprecated
     */
    public function updateDomainMailInfoWithHttpInfo($domain, $update_domain_mail_info_request, string $contentType = self::contentTypes['updateDomainMailInfo'][0])
    {
        $request = $this->updateDomainMailInfoRequest($domain, $update_domain_mail_info_request, $contentType);

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
                    if ('\OpenAPI\Client\Model\GetDomainMailInfo200Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetDomainMailInfo200Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetDomainMailInfo200Response', []),
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

            $returnType = '\OpenAPI\Client\Model\GetDomainMailInfo200Response';
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
                        '\OpenAPI\Client\Model\GetDomainMailInfo200Response',
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
     * Operation updateDomainMailInfoAsync
     *
     * Изменение почтовой информации о домене
     *
     * @param  string $domain Полное имя домена (required)
     * @param  \OpenAPI\Client\Model\UpdateDomainMailInfoRequest $update_domain_mail_info_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['updateDomainMailInfo'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @deprecated
     */
    public function updateDomainMailInfoAsync($domain, $update_domain_mail_info_request, string $contentType = self::contentTypes['updateDomainMailInfo'][0])
    {
        return $this->updateDomainMailInfoAsyncWithHttpInfo($domain, $update_domain_mail_info_request, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation updateDomainMailInfoAsyncWithHttpInfo
     *
     * Изменение почтовой информации о домене
     *
     * @param  string $domain Полное имя домена (required)
     * @param  \OpenAPI\Client\Model\UpdateDomainMailInfoRequest $update_domain_mail_info_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['updateDomainMailInfo'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @deprecated
     */
    public function updateDomainMailInfoAsyncWithHttpInfo($domain, $update_domain_mail_info_request, string $contentType = self::contentTypes['updateDomainMailInfo'][0])
    {
        $returnType = '\OpenAPI\Client\Model\GetDomainMailInfo200Response';
        $request = $this->updateDomainMailInfoRequest($domain, $update_domain_mail_info_request, $contentType);

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
     * Create request for operation 'updateDomainMailInfo'
     *
     * @param  string $domain Полное имя домена (required)
     * @param  \OpenAPI\Client\Model\UpdateDomainMailInfoRequest $update_domain_mail_info_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['updateDomainMailInfo'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     * @deprecated
     */
    public function updateDomainMailInfoRequest($domain, $update_domain_mail_info_request, string $contentType = self::contentTypes['updateDomainMailInfo'][0])
    {

        // verify the required parameter 'domain' is set
        if ($domain === null || (is_array($domain) && count($domain) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $domain when calling updateDomainMailInfo'
            );
        }

        // verify the required parameter 'update_domain_mail_info_request' is set
        if ($update_domain_mail_info_request === null || (is_array($update_domain_mail_info_request) && count($update_domain_mail_info_request) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $update_domain_mail_info_request when calling updateDomainMailInfo'
            );
        }


        $resourcePath = '/api/v1/mail/domains/{domain}/info';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($domain !== null) {
            $resourcePath = str_replace(
                '{' . 'domain' . '}',
                ObjectSerializer::toPathValue($domain),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($update_domain_mail_info_request)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($update_domain_mail_info_request));
            } else {
                $httpBody = $update_domain_mail_info_request;
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
     * Operation updateMailbox
     *
     * Изменение почтового ящика
     *
     * @param  string $domain Полное имя домена (required)
     * @param  string $mailbox Название почтового ящика (required)
     * @param  \OpenAPI\Client\Model\UpdateMailbox $update_mailbox update_mailbox (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['updateMailbox'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \OpenAPI\Client\Model\CreateDomainMailbox201Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\GetAccountStatus403Response|\OpenAPI\Client\Model\GetImage404Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response
     * @deprecated
     */
    public function updateMailbox($domain, $mailbox, $update_mailbox, string $contentType = self::contentTypes['updateMailbox'][0])
    {
        list($response) = $this->updateMailboxWithHttpInfo($domain, $mailbox, $update_mailbox, $contentType);
        return $response;
    }

    /**
     * Operation updateMailboxWithHttpInfo
     *
     * Изменение почтового ящика
     *
     * @param  string $domain Полное имя домена (required)
     * @param  string $mailbox Название почтового ящика (required)
     * @param  \OpenAPI\Client\Model\UpdateMailbox $update_mailbox (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['updateMailbox'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPI\Client\Model\CreateDomainMailbox201Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\GetAccountStatus403Response|\OpenAPI\Client\Model\GetImage404Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response, HTTP status code, HTTP response headers (array of strings)
     * @deprecated
     */
    public function updateMailboxWithHttpInfo($domain, $mailbox, $update_mailbox, string $contentType = self::contentTypes['updateMailbox'][0])
    {
        $request = $this->updateMailboxRequest($domain, $mailbox, $update_mailbox, $contentType);

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
                    if ('\OpenAPI\Client\Model\CreateDomainMailbox201Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\CreateDomainMailbox201Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\CreateDomainMailbox201Response', []),
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

            $returnType = '\OpenAPI\Client\Model\CreateDomainMailbox201Response';
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
                        '\OpenAPI\Client\Model\CreateDomainMailbox201Response',
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
     * Operation updateMailboxAsync
     *
     * Изменение почтового ящика
     *
     * @param  string $domain Полное имя домена (required)
     * @param  string $mailbox Название почтового ящика (required)
     * @param  \OpenAPI\Client\Model\UpdateMailbox $update_mailbox (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['updateMailbox'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @deprecated
     */
    public function updateMailboxAsync($domain, $mailbox, $update_mailbox, string $contentType = self::contentTypes['updateMailbox'][0])
    {
        return $this->updateMailboxAsyncWithHttpInfo($domain, $mailbox, $update_mailbox, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation updateMailboxAsyncWithHttpInfo
     *
     * Изменение почтового ящика
     *
     * @param  string $domain Полное имя домена (required)
     * @param  string $mailbox Название почтового ящика (required)
     * @param  \OpenAPI\Client\Model\UpdateMailbox $update_mailbox (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['updateMailbox'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @deprecated
     */
    public function updateMailboxAsyncWithHttpInfo($domain, $mailbox, $update_mailbox, string $contentType = self::contentTypes['updateMailbox'][0])
    {
        $returnType = '\OpenAPI\Client\Model\CreateDomainMailbox201Response';
        $request = $this->updateMailboxRequest($domain, $mailbox, $update_mailbox, $contentType);

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
     * Create request for operation 'updateMailbox'
     *
     * @param  string $domain Полное имя домена (required)
     * @param  string $mailbox Название почтового ящика (required)
     * @param  \OpenAPI\Client\Model\UpdateMailbox $update_mailbox (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['updateMailbox'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     * @deprecated
     */
    public function updateMailboxRequest($domain, $mailbox, $update_mailbox, string $contentType = self::contentTypes['updateMailbox'][0])
    {

        // verify the required parameter 'domain' is set
        if ($domain === null || (is_array($domain) && count($domain) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $domain when calling updateMailbox'
            );
        }

        // verify the required parameter 'mailbox' is set
        if ($mailbox === null || (is_array($mailbox) && count($mailbox) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $mailbox when calling updateMailbox'
            );
        }

        // verify the required parameter 'update_mailbox' is set
        if ($update_mailbox === null || (is_array($update_mailbox) && count($update_mailbox) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $update_mailbox when calling updateMailbox'
            );
        }


        $resourcePath = '/api/v1/mail/domains/{domain}/mailboxes/{mailbox}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($domain !== null) {
            $resourcePath = str_replace(
                '{' . 'domain' . '}',
                ObjectSerializer::toPathValue($domain),
                $resourcePath
            );
        }
        // path params
        if ($mailbox !== null) {
            $resourcePath = str_replace(
                '{' . 'mailbox' . '}',
                ObjectSerializer::toPathValue($mailbox),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($update_mailbox)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($update_mailbox));
            } else {
                $httpBody = $update_mailbox;
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
     * Operation updateMailboxV2
     *
     * Изменение почтового ящика
     *
     * @param  string $domain Полное имя домена (required)
     * @param  string $mailbox Название почтового ящика (required)
     * @param  \OpenAPI\Client\Model\UpdateMailboxV2 $update_mailbox_v2 update_mailbox_v2 (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['updateMailboxV2'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \OpenAPI\Client\Model\UpdateMailboxV2200Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\GetImage404Response|\OpenAPI\Client\Model\CreateDatabaseBackup409Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response
     */
    public function updateMailboxV2($domain, $mailbox, $update_mailbox_v2, string $contentType = self::contentTypes['updateMailboxV2'][0])
    {
        list($response) = $this->updateMailboxV2WithHttpInfo($domain, $mailbox, $update_mailbox_v2, $contentType);
        return $response;
    }

    /**
     * Operation updateMailboxV2WithHttpInfo
     *
     * Изменение почтового ящика
     *
     * @param  string $domain Полное имя домена (required)
     * @param  string $mailbox Название почтового ящика (required)
     * @param  \OpenAPI\Client\Model\UpdateMailboxV2 $update_mailbox_v2 (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['updateMailboxV2'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPI\Client\Model\UpdateMailboxV2200Response|\OpenAPI\Client\Model\GetFinances400Response|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\GetImage404Response|\OpenAPI\Client\Model\CreateDatabaseBackup409Response|\OpenAPI\Client\Model\GetFinances429Response|\OpenAPI\Client\Model\GetFinances500Response, HTTP status code, HTTP response headers (array of strings)
     */
    public function updateMailboxV2WithHttpInfo($domain, $mailbox, $update_mailbox_v2, string $contentType = self::contentTypes['updateMailboxV2'][0])
    {
        $request = $this->updateMailboxV2Request($domain, $mailbox, $update_mailbox_v2, $contentType);

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
                    if ('\OpenAPI\Client\Model\UpdateMailboxV2200Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\UpdateMailboxV2200Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\UpdateMailboxV2200Response', []),
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
                    if ('\OpenAPI\Client\Model\CreateDatabaseBackup409Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\CreateDatabaseBackup409Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\CreateDatabaseBackup409Response', []),
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

            $returnType = '\OpenAPI\Client\Model\UpdateMailboxV2200Response';
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
                        '\OpenAPI\Client\Model\UpdateMailboxV2200Response',
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
                        '\OpenAPI\Client\Model\CreateDatabaseBackup409Response',
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
     * Operation updateMailboxV2Async
     *
     * Изменение почтового ящика
     *
     * @param  string $domain Полное имя домена (required)
     * @param  string $mailbox Название почтового ящика (required)
     * @param  \OpenAPI\Client\Model\UpdateMailboxV2 $update_mailbox_v2 (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['updateMailboxV2'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateMailboxV2Async($domain, $mailbox, $update_mailbox_v2, string $contentType = self::contentTypes['updateMailboxV2'][0])
    {
        return $this->updateMailboxV2AsyncWithHttpInfo($domain, $mailbox, $update_mailbox_v2, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation updateMailboxV2AsyncWithHttpInfo
     *
     * Изменение почтового ящика
     *
     * @param  string $domain Полное имя домена (required)
     * @param  string $mailbox Название почтового ящика (required)
     * @param  \OpenAPI\Client\Model\UpdateMailboxV2 $update_mailbox_v2 (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['updateMailboxV2'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateMailboxV2AsyncWithHttpInfo($domain, $mailbox, $update_mailbox_v2, string $contentType = self::contentTypes['updateMailboxV2'][0])
    {
        $returnType = '\OpenAPI\Client\Model\UpdateMailboxV2200Response';
        $request = $this->updateMailboxV2Request($domain, $mailbox, $update_mailbox_v2, $contentType);

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
     * Create request for operation 'updateMailboxV2'
     *
     * @param  string $domain Полное имя домена (required)
     * @param  string $mailbox Название почтового ящика (required)
     * @param  \OpenAPI\Client\Model\UpdateMailboxV2 $update_mailbox_v2 (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['updateMailboxV2'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function updateMailboxV2Request($domain, $mailbox, $update_mailbox_v2, string $contentType = self::contentTypes['updateMailboxV2'][0])
    {

        // verify the required parameter 'domain' is set
        if ($domain === null || (is_array($domain) && count($domain) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $domain when calling updateMailboxV2'
            );
        }

        // verify the required parameter 'mailbox' is set
        if ($mailbox === null || (is_array($mailbox) && count($mailbox) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $mailbox when calling updateMailboxV2'
            );
        }

        // verify the required parameter 'update_mailbox_v2' is set
        if ($update_mailbox_v2 === null || (is_array($update_mailbox_v2) && count($update_mailbox_v2) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $update_mailbox_v2 when calling updateMailboxV2'
            );
        }


        $resourcePath = '/api/v2/mail/domains/{domain}/mailboxes/{mailbox}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($domain !== null) {
            $resourcePath = str_replace(
                '{' . 'domain' . '}',
                ObjectSerializer::toPathValue($domain),
                $resourcePath
            );
        }
        // path params
        if ($mailbox !== null) {
            $resourcePath = str_replace(
                '{' . 'mailbox' . '}',
                ObjectSerializer::toPathValue($mailbox),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($update_mailbox_v2)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($update_mailbox_v2));
            } else {
                $httpBody = $update_mailbox_v2;
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
