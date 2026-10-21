<?php
/**
 * MCPApi
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
 * MCPApi Class Doc Comment
 *
 * @category Class
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class MCPApi
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
        'deleteMcpSearchSession' => [
            'application/json',
        ],
        'deleteMcpSession' => [
            'application/json',
        ],
        'openMcpSearchStream' => [
            'application/json',
        ],
        'openMcpStream' => [
            'application/json',
        ],
        'sendMcpMessage' => [
            'application/json',
        ],
        'sendMcpSearchMessage' => [
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
     * Operation deleteMcpSearchSession
     *
     * Завершение сессии сервера MCP с поиском инструментов
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.cloud
     *
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteMcpSearchSession'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function deleteMcpSearchSession(?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['deleteMcpSearchSession'][0])
    {
        $this->deleteMcpSearchSessionWithHttpInfo($hostIndex, $variables, $contentType);
    }

    /**
     * Operation deleteMcpSearchSessionWithHttpInfo
     *
     * Завершение сессии сервера MCP с поиском инструментов
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.cloud
     *
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteMcpSearchSession'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteMcpSearchSessionWithHttpInfo(?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['deleteMcpSearchSession'][0])
    {
        $request = $this->deleteMcpSearchSessionRequest($hostIndex, $variables, $contentType);

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
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances401Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation deleteMcpSearchSessionAsync
     *
     * Завершение сессии сервера MCP с поиском инструментов
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.cloud
     *
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteMcpSearchSession'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteMcpSearchSessionAsync(?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['deleteMcpSearchSession'][0])
    {
        return $this->deleteMcpSearchSessionAsyncWithHttpInfo($hostIndex, $variables, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation deleteMcpSearchSessionAsyncWithHttpInfo
     *
     * Завершение сессии сервера MCP с поиском инструментов
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.cloud
     *
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteMcpSearchSession'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteMcpSearchSessionAsyncWithHttpInfo(?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['deleteMcpSearchSession'][0])
    {
        $returnType = '';
        $request = $this->deleteMcpSearchSessionRequest($hostIndex, $variables, $contentType);

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
     * Create request for operation 'deleteMcpSearchSession'
     *
    * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
    * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.cloud
     *
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteMcpSearchSession'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function deleteMcpSearchSessionRequest(?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['deleteMcpSearchSession'][0])
    {


        $resourcePath = '/api/v1/mcp/search';
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

        # Preserve the original behavior of server indexing.
        if ($hostIndex === null) {
            $hostIndex = $this->hostIndex;
        }

        $hostSettings = $this->getHostSettingsFordeleteMcpSearchSession();

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
     * Returns an array of host settings for Operation deleteMcpSearchSession
     *
     * @return array an array of host settings
     */
    protected function getHostSettingsFordeleteMcpSearchSession(): array
    {
        return [
            [
                "url" => "https://api.timeweb.cloud",
                "description" => "No description provided",
            ]
        ];
    }

    /**
     * Operation deleteMcpSession
     *
     * Завершение сессии сервера MCP
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.cloud
     *
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteMcpSession'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function deleteMcpSession(?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['deleteMcpSession'][0])
    {
        $this->deleteMcpSessionWithHttpInfo($hostIndex, $variables, $contentType);
    }

    /**
     * Operation deleteMcpSessionWithHttpInfo
     *
     * Завершение сессии сервера MCP
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.cloud
     *
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteMcpSession'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteMcpSessionWithHttpInfo(?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['deleteMcpSession'][0])
    {
        $request = $this->deleteMcpSessionRequest($hostIndex, $variables, $contentType);

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
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances401Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation deleteMcpSessionAsync
     *
     * Завершение сессии сервера MCP
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.cloud
     *
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteMcpSession'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteMcpSessionAsync(?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['deleteMcpSession'][0])
    {
        return $this->deleteMcpSessionAsyncWithHttpInfo($hostIndex, $variables, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation deleteMcpSessionAsyncWithHttpInfo
     *
     * Завершение сессии сервера MCP
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.cloud
     *
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteMcpSession'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteMcpSessionAsyncWithHttpInfo(?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['deleteMcpSession'][0])
    {
        $returnType = '';
        $request = $this->deleteMcpSessionRequest($hostIndex, $variables, $contentType);

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
     * Create request for operation 'deleteMcpSession'
     *
    * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
    * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.cloud
     *
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteMcpSession'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function deleteMcpSessionRequest(?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['deleteMcpSession'][0])
    {


        $resourcePath = '/api/v1/mcp';
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

        # Preserve the original behavior of server indexing.
        if ($hostIndex === null) {
            $hostIndex = $this->hostIndex;
        }

        $hostSettings = $this->getHostSettingsFordeleteMcpSession();

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
     * Returns an array of host settings for Operation deleteMcpSession
     *
     * @return array an array of host settings
     */
    protected function getHostSettingsFordeleteMcpSession(): array
    {
        return [
            [
                "url" => "https://api.timeweb.cloud",
                "description" => "No description provided",
            ]
        ];
    }

    /**
     * Operation openMcpSearchStream
     *
     * Открытие потока событий сервера MCP с поиском инструментов
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.cloud
     *
     * @param  string $accept Должен содержать &#x60;text/event-stream&#x60;, иначе сервер ответит 406 (required)
     * @param  string $mcp_protocol_version Версия протокола, согласованная в &#x60;initialize&#x60;. Неподдерживаемое значение — ответ 400 (optional)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['openMcpSearchStream'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return string|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\JsonRpcErrorResponse
     */
    public function openMcpSearchStream($accept, $mcp_protocol_version = null, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['openMcpSearchStream'][0])
    {
        list($response) = $this->openMcpSearchStreamWithHttpInfo($accept, $mcp_protocol_version, $hostIndex, $variables, $contentType);
        return $response;
    }

    /**
     * Operation openMcpSearchStreamWithHttpInfo
     *
     * Открытие потока событий сервера MCP с поиском инструментов
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.cloud
     *
     * @param  string $accept Должен содержать &#x60;text/event-stream&#x60;, иначе сервер ответит 406 (required)
     * @param  string $mcp_protocol_version Версия протокола, согласованная в &#x60;initialize&#x60;. Неподдерживаемое значение — ответ 400 (optional)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['openMcpSearchStream'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of string|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\JsonRpcErrorResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function openMcpSearchStreamWithHttpInfo($accept, $mcp_protocol_version = null, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['openMcpSearchStream'][0])
    {
        $request = $this->openMcpSearchStreamRequest($accept, $mcp_protocol_version, $hostIndex, $variables, $contentType);

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
                case 406:
                    if ('\OpenAPI\Client\Model\JsonRpcErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\JsonRpcErrorResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\JsonRpcErrorResponse', []),
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
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances401Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 406:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\JsonRpcErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation openMcpSearchStreamAsync
     *
     * Открытие потока событий сервера MCP с поиском инструментов
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.cloud
     *
     * @param  string $accept Должен содержать &#x60;text/event-stream&#x60;, иначе сервер ответит 406 (required)
     * @param  string $mcp_protocol_version Версия протокола, согласованная в &#x60;initialize&#x60;. Неподдерживаемое значение — ответ 400 (optional)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['openMcpSearchStream'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function openMcpSearchStreamAsync($accept, $mcp_protocol_version = null, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['openMcpSearchStream'][0])
    {
        return $this->openMcpSearchStreamAsyncWithHttpInfo($accept, $mcp_protocol_version, $hostIndex, $variables, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation openMcpSearchStreamAsyncWithHttpInfo
     *
     * Открытие потока событий сервера MCP с поиском инструментов
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.cloud
     *
     * @param  string $accept Должен содержать &#x60;text/event-stream&#x60;, иначе сервер ответит 406 (required)
     * @param  string $mcp_protocol_version Версия протокола, согласованная в &#x60;initialize&#x60;. Неподдерживаемое значение — ответ 400 (optional)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['openMcpSearchStream'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function openMcpSearchStreamAsyncWithHttpInfo($accept, $mcp_protocol_version = null, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['openMcpSearchStream'][0])
    {
        $returnType = 'string';
        $request = $this->openMcpSearchStreamRequest($accept, $mcp_protocol_version, $hostIndex, $variables, $contentType);

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
     * Create request for operation 'openMcpSearchStream'
     *
    * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
    * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.cloud
     *
     * @param  string $accept Должен содержать &#x60;text/event-stream&#x60;, иначе сервер ответит 406 (required)
     * @param  string $mcp_protocol_version Версия протокола, согласованная в &#x60;initialize&#x60;. Неподдерживаемое значение — ответ 400 (optional)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['openMcpSearchStream'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function openMcpSearchStreamRequest($accept, $mcp_protocol_version = null, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['openMcpSearchStream'][0])
    {

        // verify the required parameter 'accept' is set
        if ($accept === null || (is_array($accept) && count($accept) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $accept when calling openMcpSearchStream'
            );
        }



        $resourcePath = '/api/v1/mcp/search';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($accept !== null) {
            $headerParams['Accept'] = ObjectSerializer::toHeaderValue($accept);
        }
        // header params
        if ($mcp_protocol_version !== null) {
            $headerParams['MCP-Protocol-Version'] = ObjectSerializer::toHeaderValue($mcp_protocol_version);
        }



        $headers = $this->headerSelector->selectHeaders(
            ['text/event-stream', 'application/json', ],
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

        # Preserve the original behavior of server indexing.
        if ($hostIndex === null) {
            $hostIndex = $this->hostIndex;
        }

        $hostSettings = $this->getHostSettingsForopenMcpSearchStream();

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
     * Returns an array of host settings for Operation openMcpSearchStream
     *
     * @return array an array of host settings
     */
    protected function getHostSettingsForopenMcpSearchStream(): array
    {
        return [
            [
                "url" => "https://api.timeweb.cloud",
                "description" => "No description provided",
            ]
        ];
    }

    /**
     * Operation openMcpStream
     *
     * Открытие потока событий сервера MCP
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.cloud
     *
     * @param  string $accept Должен содержать &#x60;text/event-stream&#x60;, иначе сервер ответит 406 (required)
     * @param  string $mcp_protocol_version Версия протокола, согласованная в &#x60;initialize&#x60;. Неподдерживаемое значение — ответ 400 (optional)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['openMcpStream'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return string|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\JsonRpcErrorResponse
     */
    public function openMcpStream($accept, $mcp_protocol_version = null, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['openMcpStream'][0])
    {
        list($response) = $this->openMcpStreamWithHttpInfo($accept, $mcp_protocol_version, $hostIndex, $variables, $contentType);
        return $response;
    }

    /**
     * Operation openMcpStreamWithHttpInfo
     *
     * Открытие потока событий сервера MCP
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.cloud
     *
     * @param  string $accept Должен содержать &#x60;text/event-stream&#x60;, иначе сервер ответит 406 (required)
     * @param  string $mcp_protocol_version Версия протокола, согласованная в &#x60;initialize&#x60;. Неподдерживаемое значение — ответ 400 (optional)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['openMcpStream'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of string|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\JsonRpcErrorResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function openMcpStreamWithHttpInfo($accept, $mcp_protocol_version = null, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['openMcpStream'][0])
    {
        $request = $this->openMcpStreamRequest($accept, $mcp_protocol_version, $hostIndex, $variables, $contentType);

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
                case 406:
                    if ('\OpenAPI\Client\Model\JsonRpcErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\JsonRpcErrorResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\JsonRpcErrorResponse', []),
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
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetFinances401Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 406:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\JsonRpcErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation openMcpStreamAsync
     *
     * Открытие потока событий сервера MCP
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.cloud
     *
     * @param  string $accept Должен содержать &#x60;text/event-stream&#x60;, иначе сервер ответит 406 (required)
     * @param  string $mcp_protocol_version Версия протокола, согласованная в &#x60;initialize&#x60;. Неподдерживаемое значение — ответ 400 (optional)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['openMcpStream'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function openMcpStreamAsync($accept, $mcp_protocol_version = null, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['openMcpStream'][0])
    {
        return $this->openMcpStreamAsyncWithHttpInfo($accept, $mcp_protocol_version, $hostIndex, $variables, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation openMcpStreamAsyncWithHttpInfo
     *
     * Открытие потока событий сервера MCP
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.cloud
     *
     * @param  string $accept Должен содержать &#x60;text/event-stream&#x60;, иначе сервер ответит 406 (required)
     * @param  string $mcp_protocol_version Версия протокола, согласованная в &#x60;initialize&#x60;. Неподдерживаемое значение — ответ 400 (optional)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['openMcpStream'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function openMcpStreamAsyncWithHttpInfo($accept, $mcp_protocol_version = null, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['openMcpStream'][0])
    {
        $returnType = 'string';
        $request = $this->openMcpStreamRequest($accept, $mcp_protocol_version, $hostIndex, $variables, $contentType);

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
     * Create request for operation 'openMcpStream'
     *
    * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
    * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.cloud
     *
     * @param  string $accept Должен содержать &#x60;text/event-stream&#x60;, иначе сервер ответит 406 (required)
     * @param  string $mcp_protocol_version Версия протокола, согласованная в &#x60;initialize&#x60;. Неподдерживаемое значение — ответ 400 (optional)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['openMcpStream'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function openMcpStreamRequest($accept, $mcp_protocol_version = null, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['openMcpStream'][0])
    {

        // verify the required parameter 'accept' is set
        if ($accept === null || (is_array($accept) && count($accept) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $accept when calling openMcpStream'
            );
        }



        $resourcePath = '/api/v1/mcp';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($accept !== null) {
            $headerParams['Accept'] = ObjectSerializer::toHeaderValue($accept);
        }
        // header params
        if ($mcp_protocol_version !== null) {
            $headerParams['MCP-Protocol-Version'] = ObjectSerializer::toHeaderValue($mcp_protocol_version);
        }



        $headers = $this->headerSelector->selectHeaders(
            ['text/event-stream', 'application/json', ],
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

        # Preserve the original behavior of server indexing.
        if ($hostIndex === null) {
            $hostIndex = $this->hostIndex;
        }

        $hostSettings = $this->getHostSettingsForopenMcpStream();

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
     * Returns an array of host settings for Operation openMcpStream
     *
     * @return array an array of host settings
     */
    protected function getHostSettingsForopenMcpStream(): array
    {
        return [
            [
                "url" => "https://api.timeweb.cloud",
                "description" => "No description provided",
            ]
        ];
    }

    /**
     * Operation sendMcpMessage
     *
     * Отправка JSON-RPC-сообщения серверу MCP
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.cloud
     *
     * @param  string $accept Должен содержать и &#x60;application/json&#x60;, и &#x60;text/event-stream&#x60;, иначе сервер ответит 406 (required)
     * @param  \OpenAPI\Client\Model\JsonRpcRequest $json_rpc_request json_rpc_request (required)
     * @param  string $mcp_protocol_version Версия протокола, согласованная в &#x60;initialize&#x60;. Неподдерживаемое значение — ответ 400 (optional)
     * @param  string $x_mcp_confirmation_ui Как &#x60;request_user_confirmation&#x60; спрашивает пользователя. &#x60;text&#x60; (по умолчанию) — пользователь отвечает в чате, на &#x60;/api/v1/mcp&#x60; инструмент в этом режиме не выводится. &#x60;buttons&#x60; — инструмент возвращает &#x60;ui_action&#x60; с кнопками для клиентов, которые умеют их показывать. Регистр не важен, другие значения игнорируются (optional)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['sendMcpMessage'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \OpenAPI\Client\Model\JsonRpcResultResponse|\OpenAPI\Client\Model\JsonRpcErrorResponse|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\JsonRpcErrorResponse|\OpenAPI\Client\Model\JsonRpcErrorResponse
     */
    public function sendMcpMessage($accept, $json_rpc_request, $mcp_protocol_version = null, $x_mcp_confirmation_ui = null, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['sendMcpMessage'][0])
    {
        list($response) = $this->sendMcpMessageWithHttpInfo($accept, $json_rpc_request, $mcp_protocol_version, $x_mcp_confirmation_ui, $hostIndex, $variables, $contentType);
        return $response;
    }

    /**
     * Operation sendMcpMessageWithHttpInfo
     *
     * Отправка JSON-RPC-сообщения серверу MCP
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.cloud
     *
     * @param  string $accept Должен содержать и &#x60;application/json&#x60;, и &#x60;text/event-stream&#x60;, иначе сервер ответит 406 (required)
     * @param  \OpenAPI\Client\Model\JsonRpcRequest $json_rpc_request (required)
     * @param  string $mcp_protocol_version Версия протокола, согласованная в &#x60;initialize&#x60;. Неподдерживаемое значение — ответ 400 (optional)
     * @param  string $x_mcp_confirmation_ui Как &#x60;request_user_confirmation&#x60; спрашивает пользователя. &#x60;text&#x60; (по умолчанию) — пользователь отвечает в чате, на &#x60;/api/v1/mcp&#x60; инструмент в этом режиме не выводится. &#x60;buttons&#x60; — инструмент возвращает &#x60;ui_action&#x60; с кнопками для клиентов, которые умеют их показывать. Регистр не важен, другие значения игнорируются (optional)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['sendMcpMessage'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPI\Client\Model\JsonRpcResultResponse|\OpenAPI\Client\Model\JsonRpcErrorResponse|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\JsonRpcErrorResponse|\OpenAPI\Client\Model\JsonRpcErrorResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function sendMcpMessageWithHttpInfo($accept, $json_rpc_request, $mcp_protocol_version = null, $x_mcp_confirmation_ui = null, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['sendMcpMessage'][0])
    {
        $request = $this->sendMcpMessageRequest($accept, $json_rpc_request, $mcp_protocol_version, $x_mcp_confirmation_ui, $hostIndex, $variables, $contentType);

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
                    if ('\OpenAPI\Client\Model\JsonRpcResultResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\JsonRpcResultResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\JsonRpcResultResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\OpenAPI\Client\Model\JsonRpcErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\JsonRpcErrorResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\JsonRpcErrorResponse', []),
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
                case 406:
                    if ('\OpenAPI\Client\Model\JsonRpcErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\JsonRpcErrorResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\JsonRpcErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 415:
                    if ('\OpenAPI\Client\Model\JsonRpcErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\JsonRpcErrorResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\JsonRpcErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\OpenAPI\Client\Model\JsonRpcResultResponse';
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
                        '\OpenAPI\Client\Model\JsonRpcResultResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\JsonRpcErrorResponse',
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
                case 406:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\JsonRpcErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 415:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\JsonRpcErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation sendMcpMessageAsync
     *
     * Отправка JSON-RPC-сообщения серверу MCP
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.cloud
     *
     * @param  string $accept Должен содержать и &#x60;application/json&#x60;, и &#x60;text/event-stream&#x60;, иначе сервер ответит 406 (required)
     * @param  \OpenAPI\Client\Model\JsonRpcRequest $json_rpc_request (required)
     * @param  string $mcp_protocol_version Версия протокола, согласованная в &#x60;initialize&#x60;. Неподдерживаемое значение — ответ 400 (optional)
     * @param  string $x_mcp_confirmation_ui Как &#x60;request_user_confirmation&#x60; спрашивает пользователя. &#x60;text&#x60; (по умолчанию) — пользователь отвечает в чате, на &#x60;/api/v1/mcp&#x60; инструмент в этом режиме не выводится. &#x60;buttons&#x60; — инструмент возвращает &#x60;ui_action&#x60; с кнопками для клиентов, которые умеют их показывать. Регистр не важен, другие значения игнорируются (optional)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['sendMcpMessage'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function sendMcpMessageAsync($accept, $json_rpc_request, $mcp_protocol_version = null, $x_mcp_confirmation_ui = null, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['sendMcpMessage'][0])
    {
        return $this->sendMcpMessageAsyncWithHttpInfo($accept, $json_rpc_request, $mcp_protocol_version, $x_mcp_confirmation_ui, $hostIndex, $variables, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation sendMcpMessageAsyncWithHttpInfo
     *
     * Отправка JSON-RPC-сообщения серверу MCP
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.cloud
     *
     * @param  string $accept Должен содержать и &#x60;application/json&#x60;, и &#x60;text/event-stream&#x60;, иначе сервер ответит 406 (required)
     * @param  \OpenAPI\Client\Model\JsonRpcRequest $json_rpc_request (required)
     * @param  string $mcp_protocol_version Версия протокола, согласованная в &#x60;initialize&#x60;. Неподдерживаемое значение — ответ 400 (optional)
     * @param  string $x_mcp_confirmation_ui Как &#x60;request_user_confirmation&#x60; спрашивает пользователя. &#x60;text&#x60; (по умолчанию) — пользователь отвечает в чате, на &#x60;/api/v1/mcp&#x60; инструмент в этом режиме не выводится. &#x60;buttons&#x60; — инструмент возвращает &#x60;ui_action&#x60; с кнопками для клиентов, которые умеют их показывать. Регистр не важен, другие значения игнорируются (optional)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['sendMcpMessage'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function sendMcpMessageAsyncWithHttpInfo($accept, $json_rpc_request, $mcp_protocol_version = null, $x_mcp_confirmation_ui = null, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['sendMcpMessage'][0])
    {
        $returnType = '\OpenAPI\Client\Model\JsonRpcResultResponse';
        $request = $this->sendMcpMessageRequest($accept, $json_rpc_request, $mcp_protocol_version, $x_mcp_confirmation_ui, $hostIndex, $variables, $contentType);

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
     * Create request for operation 'sendMcpMessage'
     *
    * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
    * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.cloud
     *
     * @param  string $accept Должен содержать и &#x60;application/json&#x60;, и &#x60;text/event-stream&#x60;, иначе сервер ответит 406 (required)
     * @param  \OpenAPI\Client\Model\JsonRpcRequest $json_rpc_request (required)
     * @param  string $mcp_protocol_version Версия протокола, согласованная в &#x60;initialize&#x60;. Неподдерживаемое значение — ответ 400 (optional)
     * @param  string $x_mcp_confirmation_ui Как &#x60;request_user_confirmation&#x60; спрашивает пользователя. &#x60;text&#x60; (по умолчанию) — пользователь отвечает в чате, на &#x60;/api/v1/mcp&#x60; инструмент в этом режиме не выводится. &#x60;buttons&#x60; — инструмент возвращает &#x60;ui_action&#x60; с кнопками для клиентов, которые умеют их показывать. Регистр не важен, другие значения игнорируются (optional)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['sendMcpMessage'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function sendMcpMessageRequest($accept, $json_rpc_request, $mcp_protocol_version = null, $x_mcp_confirmation_ui = null, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['sendMcpMessage'][0])
    {

        // verify the required parameter 'accept' is set
        if ($accept === null || (is_array($accept) && count($accept) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $accept when calling sendMcpMessage'
            );
        }

        // verify the required parameter 'json_rpc_request' is set
        if ($json_rpc_request === null || (is_array($json_rpc_request) && count($json_rpc_request) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $json_rpc_request when calling sendMcpMessage'
            );
        }




        $resourcePath = '/api/v1/mcp';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($accept !== null) {
            $headerParams['Accept'] = ObjectSerializer::toHeaderValue($accept);
        }
        // header params
        if ($mcp_protocol_version !== null) {
            $headerParams['MCP-Protocol-Version'] = ObjectSerializer::toHeaderValue($mcp_protocol_version);
        }
        // header params
        if ($x_mcp_confirmation_ui !== null) {
            $headerParams['x-mcp-confirmation-ui'] = ObjectSerializer::toHeaderValue($x_mcp_confirmation_ui);
        }



        $headers = $this->headerSelector->selectHeaders(
            ['text/event-stream', 'application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($json_rpc_request)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($json_rpc_request));
            } else {
                $httpBody = $json_rpc_request;
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

        $hostSettings = $this->getHostSettingsForsendMcpMessage();

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
     * Returns an array of host settings for Operation sendMcpMessage
     *
     * @return array an array of host settings
     */
    protected function getHostSettingsForsendMcpMessage(): array
    {
        return [
            [
                "url" => "https://api.timeweb.cloud",
                "description" => "No description provided",
            ]
        ];
    }

    /**
     * Operation sendMcpSearchMessage
     *
     * Отправка JSON-RPC-сообщения серверу MCP с поиском инструментов
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.cloud
     *
     * @param  string $accept Должен содержать и &#x60;application/json&#x60;, и &#x60;text/event-stream&#x60;, иначе сервер ответит 406 (required)
     * @param  \OpenAPI\Client\Model\JsonRpcRequest $json_rpc_request json_rpc_request (required)
     * @param  string $mcp_protocol_version Версия протокола, согласованная в &#x60;initialize&#x60;. Неподдерживаемое значение — ответ 400 (optional)
     * @param  string $x_tool_access Только операции чтения: поиск и определения пропускают изменяющие инструменты, а &#x60;execute_tool&#x60; отказывает с &#x60;tool_not_allowed&#x60;. Единственное допустимое значение — &#x60;read-only&#x60; (регистр не важен); любое другое, в том числе пустое, — ответ 400 с ошибкой &#x60;-32600&#x60; (optional)
     * @param  string $x_allowed_tools Имена разрешённых операций через запятую — все остальные недоступны. Неизвестные имена игнорируются, пустое значение не разрешает ничего. Вместе с &#x60;x-tool-access&#x60; операция должна пройти оба ограничения (optional)
     * @param  string $x_mcp_confirmation_ui Как &#x60;request_user_confirmation&#x60; спрашивает пользователя. &#x60;text&#x60; (по умолчанию) — пользователь отвечает в чате, на &#x60;/api/v1/mcp&#x60; инструмент в этом режиме не выводится. &#x60;buttons&#x60; — инструмент возвращает &#x60;ui_action&#x60; с кнопками для клиентов, которые умеют их показывать. Регистр не важен, другие значения игнорируются (optional)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['sendMcpSearchMessage'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \OpenAPI\Client\Model\JsonRpcResultResponse|\OpenAPI\Client\Model\JsonRpcErrorResponse|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\JsonRpcErrorResponse|\OpenAPI\Client\Model\JsonRpcErrorResponse
     */
    public function sendMcpSearchMessage($accept, $json_rpc_request, $mcp_protocol_version = null, $x_tool_access = null, $x_allowed_tools = null, $x_mcp_confirmation_ui = null, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['sendMcpSearchMessage'][0])
    {
        list($response) = $this->sendMcpSearchMessageWithHttpInfo($accept, $json_rpc_request, $mcp_protocol_version, $x_tool_access, $x_allowed_tools, $x_mcp_confirmation_ui, $hostIndex, $variables, $contentType);
        return $response;
    }

    /**
     * Operation sendMcpSearchMessageWithHttpInfo
     *
     * Отправка JSON-RPC-сообщения серверу MCP с поиском инструментов
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.cloud
     *
     * @param  string $accept Должен содержать и &#x60;application/json&#x60;, и &#x60;text/event-stream&#x60;, иначе сервер ответит 406 (required)
     * @param  \OpenAPI\Client\Model\JsonRpcRequest $json_rpc_request (required)
     * @param  string $mcp_protocol_version Версия протокола, согласованная в &#x60;initialize&#x60;. Неподдерживаемое значение — ответ 400 (optional)
     * @param  string $x_tool_access Только операции чтения: поиск и определения пропускают изменяющие инструменты, а &#x60;execute_tool&#x60; отказывает с &#x60;tool_not_allowed&#x60;. Единственное допустимое значение — &#x60;read-only&#x60; (регистр не важен); любое другое, в том числе пустое, — ответ 400 с ошибкой &#x60;-32600&#x60; (optional)
     * @param  string $x_allowed_tools Имена разрешённых операций через запятую — все остальные недоступны. Неизвестные имена игнорируются, пустое значение не разрешает ничего. Вместе с &#x60;x-tool-access&#x60; операция должна пройти оба ограничения (optional)
     * @param  string $x_mcp_confirmation_ui Как &#x60;request_user_confirmation&#x60; спрашивает пользователя. &#x60;text&#x60; (по умолчанию) — пользователь отвечает в чате, на &#x60;/api/v1/mcp&#x60; инструмент в этом режиме не выводится. &#x60;buttons&#x60; — инструмент возвращает &#x60;ui_action&#x60; с кнопками для клиентов, которые умеют их показывать. Регистр не важен, другие значения игнорируются (optional)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['sendMcpSearchMessage'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPI\Client\Model\JsonRpcResultResponse|\OpenAPI\Client\Model\JsonRpcErrorResponse|\OpenAPI\Client\Model\GetFinances401Response|\OpenAPI\Client\Model\JsonRpcErrorResponse|\OpenAPI\Client\Model\JsonRpcErrorResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function sendMcpSearchMessageWithHttpInfo($accept, $json_rpc_request, $mcp_protocol_version = null, $x_tool_access = null, $x_allowed_tools = null, $x_mcp_confirmation_ui = null, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['sendMcpSearchMessage'][0])
    {
        $request = $this->sendMcpSearchMessageRequest($accept, $json_rpc_request, $mcp_protocol_version, $x_tool_access, $x_allowed_tools, $x_mcp_confirmation_ui, $hostIndex, $variables, $contentType);

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
                    if ('\OpenAPI\Client\Model\JsonRpcResultResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\JsonRpcResultResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\JsonRpcResultResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\OpenAPI\Client\Model\JsonRpcErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\JsonRpcErrorResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\JsonRpcErrorResponse', []),
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
                case 406:
                    if ('\OpenAPI\Client\Model\JsonRpcErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\JsonRpcErrorResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\JsonRpcErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 415:
                    if ('\OpenAPI\Client\Model\JsonRpcErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\JsonRpcErrorResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\JsonRpcErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\OpenAPI\Client\Model\JsonRpcResultResponse';
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
                        '\OpenAPI\Client\Model\JsonRpcResultResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\JsonRpcErrorResponse',
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
                case 406:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\JsonRpcErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 415:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\JsonRpcErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation sendMcpSearchMessageAsync
     *
     * Отправка JSON-RPC-сообщения серверу MCP с поиском инструментов
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.cloud
     *
     * @param  string $accept Должен содержать и &#x60;application/json&#x60;, и &#x60;text/event-stream&#x60;, иначе сервер ответит 406 (required)
     * @param  \OpenAPI\Client\Model\JsonRpcRequest $json_rpc_request (required)
     * @param  string $mcp_protocol_version Версия протокола, согласованная в &#x60;initialize&#x60;. Неподдерживаемое значение — ответ 400 (optional)
     * @param  string $x_tool_access Только операции чтения: поиск и определения пропускают изменяющие инструменты, а &#x60;execute_tool&#x60; отказывает с &#x60;tool_not_allowed&#x60;. Единственное допустимое значение — &#x60;read-only&#x60; (регистр не важен); любое другое, в том числе пустое, — ответ 400 с ошибкой &#x60;-32600&#x60; (optional)
     * @param  string $x_allowed_tools Имена разрешённых операций через запятую — все остальные недоступны. Неизвестные имена игнорируются, пустое значение не разрешает ничего. Вместе с &#x60;x-tool-access&#x60; операция должна пройти оба ограничения (optional)
     * @param  string $x_mcp_confirmation_ui Как &#x60;request_user_confirmation&#x60; спрашивает пользователя. &#x60;text&#x60; (по умолчанию) — пользователь отвечает в чате, на &#x60;/api/v1/mcp&#x60; инструмент в этом режиме не выводится. &#x60;buttons&#x60; — инструмент возвращает &#x60;ui_action&#x60; с кнопками для клиентов, которые умеют их показывать. Регистр не важен, другие значения игнорируются (optional)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['sendMcpSearchMessage'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function sendMcpSearchMessageAsync($accept, $json_rpc_request, $mcp_protocol_version = null, $x_tool_access = null, $x_allowed_tools = null, $x_mcp_confirmation_ui = null, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['sendMcpSearchMessage'][0])
    {
        return $this->sendMcpSearchMessageAsyncWithHttpInfo($accept, $json_rpc_request, $mcp_protocol_version, $x_tool_access, $x_allowed_tools, $x_mcp_confirmation_ui, $hostIndex, $variables, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation sendMcpSearchMessageAsyncWithHttpInfo
     *
     * Отправка JSON-RPC-сообщения серверу MCP с поиском инструментов
     *
     * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
     * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.cloud
     *
     * @param  string $accept Должен содержать и &#x60;application/json&#x60;, и &#x60;text/event-stream&#x60;, иначе сервер ответит 406 (required)
     * @param  \OpenAPI\Client\Model\JsonRpcRequest $json_rpc_request (required)
     * @param  string $mcp_protocol_version Версия протокола, согласованная в &#x60;initialize&#x60;. Неподдерживаемое значение — ответ 400 (optional)
     * @param  string $x_tool_access Только операции чтения: поиск и определения пропускают изменяющие инструменты, а &#x60;execute_tool&#x60; отказывает с &#x60;tool_not_allowed&#x60;. Единственное допустимое значение — &#x60;read-only&#x60; (регистр не важен); любое другое, в том числе пустое, — ответ 400 с ошибкой &#x60;-32600&#x60; (optional)
     * @param  string $x_allowed_tools Имена разрешённых операций через запятую — все остальные недоступны. Неизвестные имена игнорируются, пустое значение не разрешает ничего. Вместе с &#x60;x-tool-access&#x60; операция должна пройти оба ограничения (optional)
     * @param  string $x_mcp_confirmation_ui Как &#x60;request_user_confirmation&#x60; спрашивает пользователя. &#x60;text&#x60; (по умолчанию) — пользователь отвечает в чате, на &#x60;/api/v1/mcp&#x60; инструмент в этом режиме не выводится. &#x60;buttons&#x60; — инструмент возвращает &#x60;ui_action&#x60; с кнопками для клиентов, которые умеют их показывать. Регистр не важен, другие значения игнорируются (optional)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['sendMcpSearchMessage'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function sendMcpSearchMessageAsyncWithHttpInfo($accept, $json_rpc_request, $mcp_protocol_version = null, $x_tool_access = null, $x_allowed_tools = null, $x_mcp_confirmation_ui = null, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['sendMcpSearchMessage'][0])
    {
        $returnType = '\OpenAPI\Client\Model\JsonRpcResultResponse';
        $request = $this->sendMcpSearchMessageRequest($accept, $json_rpc_request, $mcp_protocol_version, $x_tool_access, $x_allowed_tools, $x_mcp_confirmation_ui, $hostIndex, $variables, $contentType);

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
     * Create request for operation 'sendMcpSearchMessage'
     *
    * This operation contains host(s) defined in the OpenAPI spec. Use 'hostIndex' to select the host.
    * if needed, use the 'variables' parameter to pass variables to the host.
     * URL: https://api.timeweb.cloud
     *
     * @param  string $accept Должен содержать и &#x60;application/json&#x60;, и &#x60;text/event-stream&#x60;, иначе сервер ответит 406 (required)
     * @param  \OpenAPI\Client\Model\JsonRpcRequest $json_rpc_request (required)
     * @param  string $mcp_protocol_version Версия протокола, согласованная в &#x60;initialize&#x60;. Неподдерживаемое значение — ответ 400 (optional)
     * @param  string $x_tool_access Только операции чтения: поиск и определения пропускают изменяющие инструменты, а &#x60;execute_tool&#x60; отказывает с &#x60;tool_not_allowed&#x60;. Единственное допустимое значение — &#x60;read-only&#x60; (регистр не важен); любое другое, в том числе пустое, — ответ 400 с ошибкой &#x60;-32600&#x60; (optional)
     * @param  string $x_allowed_tools Имена разрешённых операций через запятую — все остальные недоступны. Неизвестные имена игнорируются, пустое значение не разрешает ничего. Вместе с &#x60;x-tool-access&#x60; операция должна пройти оба ограничения (optional)
     * @param  string $x_mcp_confirmation_ui Как &#x60;request_user_confirmation&#x60; спрашивает пользователя. &#x60;text&#x60; (по умолчанию) — пользователь отвечает в чате, на &#x60;/api/v1/mcp&#x60; инструмент в этом режиме не выводится. &#x60;buttons&#x60; — инструмент возвращает &#x60;ui_action&#x60; с кнопками для клиентов, которые умеют их показывать. Регистр не важен, другие значения игнорируются (optional)
     * @param  null|int $hostIndex Host index. Defaults to null. If null, then the library will use $this->hostIndex instead
     * @param  array $variables Associative array of variables to pass to the host. Defaults to empty array.
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['sendMcpSearchMessage'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function sendMcpSearchMessageRequest($accept, $json_rpc_request, $mcp_protocol_version = null, $x_tool_access = null, $x_allowed_tools = null, $x_mcp_confirmation_ui = null, ?int $hostIndex = null, array $variables = [], string $contentType = self::contentTypes['sendMcpSearchMessage'][0])
    {

        // verify the required parameter 'accept' is set
        if ($accept === null || (is_array($accept) && count($accept) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $accept when calling sendMcpSearchMessage'
            );
        }

        // verify the required parameter 'json_rpc_request' is set
        if ($json_rpc_request === null || (is_array($json_rpc_request) && count($json_rpc_request) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $json_rpc_request when calling sendMcpSearchMessage'
            );
        }






        $resourcePath = '/api/v1/mcp/search';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($accept !== null) {
            $headerParams['Accept'] = ObjectSerializer::toHeaderValue($accept);
        }
        // header params
        if ($mcp_protocol_version !== null) {
            $headerParams['MCP-Protocol-Version'] = ObjectSerializer::toHeaderValue($mcp_protocol_version);
        }
        // header params
        if ($x_tool_access !== null) {
            $headerParams['x-tool-access'] = ObjectSerializer::toHeaderValue($x_tool_access);
        }
        // header params
        if ($x_allowed_tools !== null) {
            $headerParams['x-allowed-tools'] = ObjectSerializer::toHeaderValue($x_allowed_tools);
        }
        // header params
        if ($x_mcp_confirmation_ui !== null) {
            $headerParams['x-mcp-confirmation-ui'] = ObjectSerializer::toHeaderValue($x_mcp_confirmation_ui);
        }



        $headers = $this->headerSelector->selectHeaders(
            ['text/event-stream', 'application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($json_rpc_request)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($json_rpc_request));
            } else {
                $httpBody = $json_rpc_request;
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

        $hostSettings = $this->getHostSettingsForsendMcpSearchMessage();

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
     * Returns an array of host settings for Operation sendMcpSearchMessage
     *
     * @return array an array of host settings
     */
    protected function getHostSettingsForsendMcpSearchMessage(): array
    {
        return [
            [
                "url" => "https://api.timeweb.cloud",
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
