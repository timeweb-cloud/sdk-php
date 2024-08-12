# OpenAPIClient-php

# Введение
API Timeweb Cloud позволяет вам управлять ресурсами в облаке программным способом с использованием обычных HTTP-запросов.

Множество функций, которые доступны в панели управления Timeweb Cloud, также доступны через API, что позволяет вам автоматизировать ваши собственные сценарии.

В этой документации сперва будет описан общий дизайн и принципы работы API, а после этого конкретные конечные точки. Также будут приведены примеры запросов к ним.


## Запросы
Запросы должны выполняться по протоколу `HTTPS`, чтобы гарантировать шифрование транзакций. Поддерживаются следующие методы запроса:
|Метод|Применение|
|--- |--- |
|GET|Извлекает данные о коллекциях и отдельных ресурсах.|
|POST|Для коллекций создает новый ресурс этого типа. Также используется для выполнения действий с конкретным ресурсом.|
|PUT|Обновляет существующий ресурс.|
|PATCH|Некоторые ресурсы поддерживают частичное обновление, то есть обновление только части атрибутов ресурса, в этом случае вместо метода PUT будет использован PATCH.|
|DELETE|Удаляет ресурс.|

Методы `POST`, `PUT` и `PATCH` могут включать объект в тело запроса с типом содержимого `application/json`.

### Параметры в запросах
Некоторые коллекции поддерживают пагинацию, поиск или сортировку в запросах. В параметрах запроса требуется передать:
- `limit` — обозначает количество записей, которое необходимо вернуть
 - `offset` — указывает на смещение, относительно начала списка
 - `search` — позволяет указать набор символов для поиска
 - `sort` — можно задать правило сортировки коллекции

## Ответы
Запросы вернут один из следующих кодов состояния ответа HTTP:

|Статус|Описание|
|--- |--- |
|200 OK|Действие с ресурсом было выполнено успешно.|
|201 Created|Ресурс был успешно создан. При этом ресурс может быть как уже готовым к использованию, так и находиться в процессе запуска.|
|204 No Content|Действие с ресурсом было выполнено успешно, и ответ не содержит дополнительной информации в теле.|
|400 Bad Request|Был отправлен неверный запрос, например, в нем отсутствуют обязательные параметры и т. д. Тело ответа будет содержать дополнительную информацию об ошибке.|
|401 Unauthorized|Ошибка аутентификации.|
|403 Forbidden|Аутентификация прошла успешно, но недостаточно прав для выполнения действия.|
|404 Not Found|Запрашиваемый ресурс не найден.|
|409 Conflict|Запрос конфликтует с текущим состоянием.|
|423 Locked|Ресурс из запроса заблокирован от применения к нему указанного метода.|
|429 Too Many Requests|Был достигнут лимит по количеству запросов в единицу времени.|
|500 Internal Server Error|При выполнении запроса произошла какая-то внутренняя ошибка. Чтобы решить эту проблему, лучше всего создать тикет в панели управления.|

### Структура успешного ответа
Все конечные точки будут возвращать данные в формате `JSON`. Ответы на `GET`-запросы будут иметь на верхнем уровне следующую структуру атрибутов: 
|Название поля|Тип|Описание|
|--- |--- |--- |
|[entity_name]|object, object[], string[], number[], boolean|Динамическое поле, которое будет меняться в зависимости от запрашиваемого ресурса и будет содержать все атрибуты, необходимые для описания этого ресурса. Например, при запросе списка баз данных будет возвращаться поле `dbs`, а при запросе конкретного облачного сервера `server`. Для некоторых конечных точек в ответе может возвращаться сразу несколько ресурсов.|
|meta|object|Опционально. Объект, который содержит вспомогательную информацию о ресурсе. Чаще всего будет встречаться при запросе коллекций и содержать поле `total`, которое будет указывать на количество элементов в коллекции.|
|response_id|string|Опционально. В большинстве случаев в ответе будет содержаться уникальный идентификатор ответа в формате UUIDv4, который однозначно указывает на ваш запрос внутри нашей системы. Если вам потребуется задать вопрос нашей поддержке, приложите к вопросу этот идентификатор — так мы сможем найти ответ на него намного быстрее. Также вы можете использовать этот идентификатор, чтобы убедиться, что это новый ответ на запрос и результат не был получен из кэша.|

Пример запроса на получение списка SSH-ключей:
```
    HTTP/2.0 200 OK
    {
      \"ssh_keys\":[
          {
            \"body\":\"ssh-rsa AAAAB3NzaC1sdfghjkOAsBwWhs= example@device.local\",
            \"created_at\":\"2021-09-15T19:52:27Z\",
            \"expired_at\":null,
            \"id\":5297,
            \"is_default\":false,
            \"name\":\"example@device.local\",
            \"used_at\":null,
            \"used_by\":[]
          }
      ],
      \"meta\":{
          \"total\":1
      },
      \"response_id\":\"94608d15-8672-4eed-8ab6-28bd6fa3cdf7\"
    }
```

### Структура ответа с ошибкой
|Название поля|Тип|Описание|
|--- |--- |--- |
|status_code|number|Короткий числовой идентификатор ошибки.|
|error_code|string|Короткий текстовый идентификатор ошибки, который уточняет числовой идентификатор и удобен для программной обработки. Самый простой пример — это код `not_found` для ошибки 404.|
|message|string, string[]|Опционально. В большинстве случаев в ответе будет содержаться человекочитаемое подробное описание ошибки или ошибок, которые помогут понять, что нужно исправить.|
|response_id|string|Опционально. В большинстве случае в ответе будет содержаться уникальный идентификатор ответа в формате UUIDv4, который однозначно указывает на ваш запрос внутри нашей системы. Если вам потребуется задать вопрос нашей поддержке, приложите к вопросу этот идентификатор — так мы сможем найти ответ на него намного быстрее.|

Пример:
```
    HTTP/2.0 403 Forbidden
    {
      \"status_code\": 403,
      \"error_code\":  \"forbidden\",
      \"message\":     \"You do not have access for the attempted action\",
      \"response_id\": \"94608d15-8672-4eed-8ab6-28bd6fa3cdf7\"
    }
```

## Статусы ресурсов
Важно учесть, что при создании большинства ресурсов внутри платформы вам будет сразу возвращен ответ от сервера со статусом `200 OK` или `201 Created` и идентификатором созданного ресурса в теле ответа, но при этом этот ресурс может быть ещё в *состоянии запуска*.

Для того чтобы понять, в каком состоянии сейчас находится ваш ресурс, мы добавили поле `status` в ответ на получение информации о ресурсе.

Список статусов будет отличаться в зависимости от типа ресурса. Увидеть поддерживаемый список статусов вы сможете в описании каждого конкретного ресурса.

 

## Ограничение скорости запросов (Rate Limiting)
Чтобы обеспечить стабильность для всех пользователей, Timeweb Cloud защищает API от всплесков входящего трафика, анализируя количество запросов c каждого аккаунта к каждой конечной точке.

Если ваше приложение отправляет более 20 запросов в секунду на одну конечную точку, то для этого запроса API может вернуть код состояния HTTP `429 Too Many Requests`.


## Аутентификация
Доступ к API осуществляется с помощью JWT-токена. Токенами можно управлять внутри панели управления Timeweb Cloud в разделе *API и Terraform*.

Токен необходимо передавать в заголовке каждого запроса в формате:
```
  Authorization: Bearer $TIMEWEB_CLOUD_TOKEN
```

## Формат примеров API
Примеры в этой документации описаны с помощью `curl`, HTTP-клиента командной строки. На компьютерах `Linux` и `macOS` обычно по умолчанию установлен `curl`, и он доступен для загрузки на всех популярных платформах, включая `Windows`.

Каждый пример разделен на несколько строк символом `\\`, который совместим с `bash`. Типичный пример выглядит так:
```
  curl -X PATCH 
    -H \"Content-Type: application/json\" 
    -H \"Authorization: Bearer $TIMEWEB_CLOUD_TOKEN\" 
    -d '{\"name\":\"Cute Corvus\",\"comment\":\"Development Server\"}' 
    \"https://api.timeweb.cloud/api/v1/dedicated/1051\"
```
- Параметр `-X` задает метод запроса. Для согласованности метод будет указан во всех примерах, даже если он явно не требуется для методов `GET`.
- Строки `-H` задают требуемые HTTP-заголовки.
- Примеры, для которых требуется объект JSON в теле запроса, передают требуемые данные через параметр `-d`.

Чтобы использовать приведенные примеры, не подставляя каждый раз в них свой токен, вы можете добавить токен один раз в переменные окружения в вашей консоли. Например, на `Linux` это можно сделать с помощью команды:

```
TIMEWEB_CLOUD_TOKEN=\"token\"
```

После этого токен будет автоматически подставляться в ваши запросы.

Обратите внимание, что все значения в этой документации являются примерами. Не полагайтесь на идентификаторы операционных систем, тарифов и т.д., используемые в примерах. Используйте соответствующую конечную точку для получения значений перед созданием ресурсов.


## Версионирование
API построено согласно принципам [семантического версионирования](https://semver.org/lang/ru). Это значит, что мы гарантируем обратную совместимость всех изменений в пределах одной мажорной версии.

Мажорная версия каждой конечной точки обозначается в пути запроса, например, запрос `/api/v1/servers` указывает, что этот метод имеет версию 1.


## Installation & Usage

### Requirements

PHP 7.4 and later.
Should also work with PHP 8.0.

### Composer

To install the bindings via [Composer](https://getcomposer.org/), add the following to `composer.json`:

```json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/GIT_USER_ID/GIT_REPO_ID.git"
    }
  ],
  "require": {
    "GIT_USER_ID/GIT_REPO_ID": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
<?php
require_once('/path/to/OpenAPIClient-php/vendor/autoload.php');
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



// Configure Bearer (JWT) authorization: Bearer
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\APIKeysApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_api_key = new \OpenAPI\Client\Model\CreateApiKey(); // \OpenAPI\Client\Model\CreateApiKey

try {
    $result = $apiInstance->createToken($create_api_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling APIKeysApi->createToken: ', $e->getMessage(), PHP_EOL;
}

```

## API Endpoints

All URIs are relative to *https://api.timeweb.cloud*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*APIKeysApi* | [**createToken**](docs/Api/APIKeysApi.md#createtoken) | **POST** /api/v1/auth/api-keys | Создание токена
*APIKeysApi* | [**deleteToken**](docs/Api/APIKeysApi.md#deletetoken) | **DELETE** /api/v1/auth/api-keys/{token_id} | Удалить токен
*APIKeysApi* | [**getTokens**](docs/Api/APIKeysApi.md#gettokens) | **GET** /api/v1/auth/api-keys | Получение списка выпущенных токенов
*APIKeysApi* | [**reissueToken**](docs/Api/APIKeysApi.md#reissuetoken) | **PUT** /api/v1/auth/api-keys/{token_id} | Перевыпустить токен
*APIKeysApi* | [**updateToken**](docs/Api/APIKeysApi.md#updatetoken) | **PATCH** /api/v1/auth/api-keys/{token_id} | Изменить токен
*AccountApi* | [**addCountriesToAllowedList**](docs/Api/AccountApi.md#addcountriestoallowedlist) | **POST** /api/v1/auth/access/countries | Добавление стран в список разрешенных
*AccountApi* | [**addIPsToAllowedList**](docs/Api/AccountApi.md#addipstoallowedlist) | **POST** /api/v1/auth/access/ips | Добавление IP-адресов в список разрешенных
*AccountApi* | [**deleteCountriesFromAllowedList**](docs/Api/AccountApi.md#deletecountriesfromallowedlist) | **DELETE** /api/v1/auth/access/countries | Удаление стран из списка разрешенных
*AccountApi* | [**deleteIPsFromAllowedList**](docs/Api/AccountApi.md#deleteipsfromallowedlist) | **DELETE** /api/v1/auth/access/ips | Удаление IP-адресов из списка разрешенных
*AccountApi* | [**getAccountStatus**](docs/Api/AccountApi.md#getaccountstatus) | **GET** /api/v1/account/status | Получение статуса аккаунта
*AccountApi* | [**getAuthAccessSettings**](docs/Api/AccountApi.md#getauthaccesssettings) | **GET** /api/v1/auth/access | Получить информацию о ограничениях авторизации пользователя
*AccountApi* | [**getCountries**](docs/Api/AccountApi.md#getcountries) | **GET** /api/v1/auth/access/countries | Получение списка стран
*AccountApi* | [**getFinances**](docs/Api/AccountApi.md#getfinances) | **GET** /api/v1/account/finances | Получение платежной информации
*AccountApi* | [**getNotificationSettings**](docs/Api/AccountApi.md#getnotificationsettings) | **GET** /api/v1/account/notification-settings | Получение настроек уведомлений аккаунта
*AccountApi* | [**updateAuthRestrictionsByCountries**](docs/Api/AccountApi.md#updateauthrestrictionsbycountries) | **POST** /api/v1/auth/access/countries/enabled | Включение/отключение ограничений по стране
*AccountApi* | [**updateAuthRestrictionsByIP**](docs/Api/AccountApi.md#updateauthrestrictionsbyip) | **POST** /api/v1/auth/access/ips/enabled | Включение/отключение ограничений по IP-адресу
*AccountApi* | [**updateNotificationSettings**](docs/Api/AccountApi.md#updatenotificationsettings) | **PATCH** /api/v1/account/notification-settings | Изменение настроек уведомлений аккаунта
*AppsApi* | [**addProvider**](docs/Api/AppsApi.md#addprovider) | **POST** /api/v1/vcs-provider | Привязка vcs провайдера
*AppsApi* | [**createApp**](docs/Api/AppsApi.md#createapp) | **POST** /api/v1/apps | Создание приложения
*AppsApi* | [**createDeploy**](docs/Api/AppsApi.md#createdeploy) | **POST** /api/v1/apps/{app_id}/deploy | Запуск деплоя приложения
*AppsApi* | [**deleteApp**](docs/Api/AppsApi.md#deleteapp) | **DELETE** /api/v1/apps/{app_id} | Удаление приложения
*AppsApi* | [**deleteProvider**](docs/Api/AppsApi.md#deleteprovider) | **DELETE** /api/v1/vcs-provider/{provider_id} | Отвязка vcs провайдера от аккаунта
*AppsApi* | [**deployAction**](docs/Api/AppsApi.md#deployaction) | **POST** /api/v1/apps/{app_id}/deploy/{deploy_id}/stop | Остановка деплоя приложения
*AppsApi* | [**getApp**](docs/Api/AppsApi.md#getapp) | **GET** /api/v1/apps/{app_id} | Получение приложения по id
*AppsApi* | [**getAppDeploys**](docs/Api/AppsApi.md#getappdeploys) | **GET** /api/v1/apps/{app_id}/deploys | Получение списка деплоев приложения
*AppsApi* | [**getAppLogs**](docs/Api/AppsApi.md#getapplogs) | **GET** /api/v1/apps/{app_id}/logs | Получение логов приложения
*AppsApi* | [**getAppStatistics**](docs/Api/AppsApi.md#getappstatistics) | **GET** /api/v1/apps/{app_id}/statistics | Получение статистики приложения
*AppsApi* | [**getApps**](docs/Api/AppsApi.md#getapps) | **GET** /api/v1/apps | Получение списка приложений
*AppsApi* | [**getAppsPresets**](docs/Api/AppsApi.md#getappspresets) | **GET** /api/v1/presets/apps | Получение списка доступных тарифов для приложения
*AppsApi* | [**getBranches**](docs/Api/AppsApi.md#getbranches) | **GET** /api/v1/vcs-provider/{provider_id}/repository/{repository_id} | Получение списка веток репозитория
*AppsApi* | [**getCommits**](docs/Api/AppsApi.md#getcommits) | **GET** /api/v1/vcs-provider/{provider_id}/repository/{repository_id}/branch | Получение списка коммитов ветки репозитория
*AppsApi* | [**getDeployLogs**](docs/Api/AppsApi.md#getdeploylogs) | **GET** /api/v1/apps/{app_id}/deploy/{deploy_id}/logs | Получение логов деплоя приложения
*AppsApi* | [**getDeploySettings**](docs/Api/AppsApi.md#getdeploysettings) | **GET** /api/v1/deploy-settings/apps | Получение списка дефолтных настроек деплоя для приложения
*AppsApi* | [**getFrameworks**](docs/Api/AppsApi.md#getframeworks) | **GET** /api/v1/frameworks/apps | Получение списка доступных фреймворков для приложения
*AppsApi* | [**getProviders**](docs/Api/AppsApi.md#getproviders) | **GET** /api/v1/vcs-provider | Получение списка vcs провайдеров
*AppsApi* | [**getRepositories**](docs/Api/AppsApi.md#getrepositories) | **GET** /api/v1/vcs-provider/{provider_id} | Получение списка репозиториев vcs провайдера
*AppsApi* | [**updateAppSettings**](docs/Api/AppsApi.md#updateappsettings) | **PATCH** /api/v1/apps/{app_id} | Изменение настроек приложения
*AppsApi* | [**updateAppState**](docs/Api/AppsApi.md#updateappstate) | **PATCH** /api/v1/apps/{app_id}/action/{action} | Изменение состояния приложения
*BalancersApi* | [**addIPsToBalancer**](docs/Api/BalancersApi.md#addipstobalancer) | **POST** /api/v1/balancers/{balancer_id}/ips | Добавление IP-адресов к балансировщику
*BalancersApi* | [**createBalancer**](docs/Api/BalancersApi.md#createbalancer) | **POST** /api/v1/balancers | Создание бaлансировщика
*BalancersApi* | [**createBalancerRule**](docs/Api/BalancersApi.md#createbalancerrule) | **POST** /api/v1/balancers/{balancer_id}/rules | Создание правила для балансировщика
*BalancersApi* | [**deleteBalancer**](docs/Api/BalancersApi.md#deletebalancer) | **DELETE** /api/v1/balancers/{balancer_id} | Удаление балансировщика
*BalancersApi* | [**deleteBalancerRule**](docs/Api/BalancersApi.md#deletebalancerrule) | **DELETE** /api/v1/balancers/{balancer_id}/rules/{rule_id} | Удаление правила для балансировщика
*BalancersApi* | [**deleteIPsFromBalancer**](docs/Api/BalancersApi.md#deleteipsfrombalancer) | **DELETE** /api/v1/balancers/{balancer_id}/ips | Удаление IP-адресов из балансировщика
*BalancersApi* | [**getBalancer**](docs/Api/BalancersApi.md#getbalancer) | **GET** /api/v1/balancers/{balancer_id} | Получение бaлансировщика
*BalancersApi* | [**getBalancerIPs**](docs/Api/BalancersApi.md#getbalancerips) | **GET** /api/v1/balancers/{balancer_id}/ips | Получение списка IP-адресов балансировщика
*BalancersApi* | [**getBalancerRules**](docs/Api/BalancersApi.md#getbalancerrules) | **GET** /api/v1/balancers/{balancer_id}/rules | Получение правил балансировщика
*BalancersApi* | [**getBalancers**](docs/Api/BalancersApi.md#getbalancers) | **GET** /api/v1/balancers | Получение списка всех бaлансировщиков
*BalancersApi* | [**getBalancersPresets**](docs/Api/BalancersApi.md#getbalancerspresets) | **GET** /api/v1/presets/balancers | Получение списка тарифов для балансировщика
*BalancersApi* | [**updateBalancer**](docs/Api/BalancersApi.md#updatebalancer) | **PATCH** /api/v1/balancers/{balancer_id} | Обновление балансировщика
*BalancersApi* | [**updateBalancerRule**](docs/Api/BalancersApi.md#updatebalancerrule) | **PATCH** /api/v1/balancers/{balancer_id}/rules/{rule_id} | Обновление правила для балансировщика
*DatabasesApi* | [**createDatabase**](docs/Api/DatabasesApi.md#createdatabase) | **POST** /api/v1/dbs | Создание базы данных
*DatabasesApi* | [**createDatabaseBackup**](docs/Api/DatabasesApi.md#createdatabasebackup) | **POST** /api/v1/dbs/{db_id}/backups | Создание бэкапа базы данных
*DatabasesApi* | [**createDatabaseCluster**](docs/Api/DatabasesApi.md#createdatabasecluster) | **POST** /api/v1/databases | Создание кластера базы данных
*DatabasesApi* | [**createDatabaseInstance**](docs/Api/DatabasesApi.md#createdatabaseinstance) | **POST** /api/v1/databases/{db_cluster_id}/instances | Создание инстанса базы данных
*DatabasesApi* | [**createDatabaseUser**](docs/Api/DatabasesApi.md#createdatabaseuser) | **POST** /api/v1/databases/{db_cluster_id}/admins | Создание пользователя базы данных
*DatabasesApi* | [**deleteDatabase**](docs/Api/DatabasesApi.md#deletedatabase) | **DELETE** /api/v1/dbs/{db_id} | Удаление базы данных
*DatabasesApi* | [**deleteDatabaseBackup**](docs/Api/DatabasesApi.md#deletedatabasebackup) | **DELETE** /api/v1/dbs/{db_id}/backups/{backup_id} | Удаление бэкапа базы данных
*DatabasesApi* | [**deleteDatabaseCluster**](docs/Api/DatabasesApi.md#deletedatabasecluster) | **DELETE** /api/v1/databases/{db_cluster_id} | Удаление кластера базы данных
*DatabasesApi* | [**deleteDatabaseInstance**](docs/Api/DatabasesApi.md#deletedatabaseinstance) | **DELETE** /api/v1/databases/{db_cluster_id}/instances/{instance_id} | Удаление инстанса базы данных
*DatabasesApi* | [**deleteDatabaseUser**](docs/Api/DatabasesApi.md#deletedatabaseuser) | **DELETE** /api/v1/databases/{db_cluster_id}/admins/{admin_id} | Удаление пользователя базы данных
*DatabasesApi* | [**getDatabase**](docs/Api/DatabasesApi.md#getdatabase) | **GET** /api/v1/dbs/{db_id} | Получение базы данных
*DatabasesApi* | [**getDatabaseAutoBackupsSettings**](docs/Api/DatabasesApi.md#getdatabaseautobackupssettings) | **GET** /api/v1/dbs/{db_id}/auto-backups | Получение настроек автобэкапов базы данных
*DatabasesApi* | [**getDatabaseBackup**](docs/Api/DatabasesApi.md#getdatabasebackup) | **GET** /api/v1/dbs/{db_id}/backups/{backup_id} | Получение бэкапа базы данных
*DatabasesApi* | [**getDatabaseBackups**](docs/Api/DatabasesApi.md#getdatabasebackups) | **GET** /api/v1/dbs/{db_id}/backups | Список бэкапов базы данных
*DatabasesApi* | [**getDatabaseCluster**](docs/Api/DatabasesApi.md#getdatabasecluster) | **GET** /api/v1/databases/{db_cluster_id} | Получение кластера базы данных
*DatabasesApi* | [**getDatabaseClusterTypes**](docs/Api/DatabasesApi.md#getdatabaseclustertypes) | **GET** /api/v1/database-types | Получение списка типов кластеров баз данных
*DatabasesApi* | [**getDatabaseClusters**](docs/Api/DatabasesApi.md#getdatabaseclusters) | **GET** /api/v1/databases | Получение списка кластеров баз данных
*DatabasesApi* | [**getDatabaseInstance**](docs/Api/DatabasesApi.md#getdatabaseinstance) | **GET** /api/v1/databases/{db_cluster_id}/instances/{instance_id} | Получение инстанса базы данных
*DatabasesApi* | [**getDatabaseInstances**](docs/Api/DatabasesApi.md#getdatabaseinstances) | **GET** /api/v1/databases/{db_cluster_id}/instances | Получение списка инстансов баз данных
*DatabasesApi* | [**getDatabaseUser**](docs/Api/DatabasesApi.md#getdatabaseuser) | **GET** /api/v1/databases/{db_cluster_id}/admins/{admin_id} | Получение пользователя базы данных
*DatabasesApi* | [**getDatabaseUsers**](docs/Api/DatabasesApi.md#getdatabaseusers) | **GET** /api/v1/databases/{db_cluster_id}/admins | Получение списка пользователей базы данных
*DatabasesApi* | [**getDatabases**](docs/Api/DatabasesApi.md#getdatabases) | **GET** /api/v1/dbs | Получение списка всех баз данных
*DatabasesApi* | [**getDatabasesPresets**](docs/Api/DatabasesApi.md#getdatabasespresets) | **GET** /api/v1/presets/dbs | Получение списка тарифов для баз данных
*DatabasesApi* | [**restoreDatabaseFromBackup**](docs/Api/DatabasesApi.md#restoredatabasefrombackup) | **PUT** /api/v1/dbs/{db_id}/backups/{backup_id} | Восстановление базы данных из бэкапа
*DatabasesApi* | [**updateDatabase**](docs/Api/DatabasesApi.md#updatedatabase) | **PATCH** /api/v1/dbs/{db_id} | Обновление базы данных
*DatabasesApi* | [**updateDatabaseAutoBackupsSettings**](docs/Api/DatabasesApi.md#updatedatabaseautobackupssettings) | **PATCH** /api/v1/dbs/{db_id}/auto-backups | Изменение настроек автобэкапов базы данных
*DatabasesApi* | [**updateDatabaseCluster**](docs/Api/DatabasesApi.md#updatedatabasecluster) | **PATCH** /api/v1/databases/{db_cluster_id} | Изменение кластера базы данных
*DatabasesApi* | [**updateDatabaseInstance**](docs/Api/DatabasesApi.md#updatedatabaseinstance) | **PATCH** /api/v1/databases/{db_cluster_id}/instances/{instance_id} | Изменение инстанса базы данных
*DatabasesApi* | [**updateDatabaseUser**](docs/Api/DatabasesApi.md#updatedatabaseuser) | **PATCH** /api/v1/databases/{db_cluster_id}/admins/{admin_id} | Изменение пользователя базы данных
*DedicatedServersApi* | [**createDedicatedServer**](docs/Api/DedicatedServersApi.md#creatededicatedserver) | **POST** /api/v1/dedicated-servers | Создание выделенного сервера
*DedicatedServersApi* | [**deleteDedicatedServer**](docs/Api/DedicatedServersApi.md#deletededicatedserver) | **DELETE** /api/v1/dedicated-servers/{dedicated_id} | Удаление выделенного сервера
*DedicatedServersApi* | [**getDedicatedServer**](docs/Api/DedicatedServersApi.md#getdedicatedserver) | **GET** /api/v1/dedicated-servers/{dedicated_id} | Получение выделенного сервера
*DedicatedServersApi* | [**getDedicatedServerPresetAdditionalServices**](docs/Api/DedicatedServersApi.md#getdedicatedserverpresetadditionalservices) | **GET** /api/v1/presets/dedicated-servers/{preset_id}/additional-services | Получение дополнительных услуг для выделенного сервера
*DedicatedServersApi* | [**getDedicatedServers**](docs/Api/DedicatedServersApi.md#getdedicatedservers) | **GET** /api/v1/dedicated-servers | Получение списка выделенных серверов
*DedicatedServersApi* | [**getDedicatedServersPresets**](docs/Api/DedicatedServersApi.md#getdedicatedserverspresets) | **GET** /api/v1/presets/dedicated-servers | Получение списка тарифов для выделенного сервера
*DedicatedServersApi* | [**updateDedicatedServer**](docs/Api/DedicatedServersApi.md#updatededicatedserver) | **PATCH** /api/v1/dedicated-servers/{dedicated_id} | Обновление выделенного сервера
*DomainsApi* | [**addDomain**](docs/Api/DomainsApi.md#adddomain) | **POST** /api/v1/add-domain/{fqdn} | Добавление домена на аккаунт
*DomainsApi* | [**addSubdomain**](docs/Api/DomainsApi.md#addsubdomain) | **POST** /api/v1/domains/{fqdn}/subdomains/{subdomain_fqdn} | Добавление поддомена
*DomainsApi* | [**checkDomain**](docs/Api/DomainsApi.md#checkdomain) | **GET** /api/v1/check-domain/{fqdn} | Проверить, доступен ли домен для регистрации
*DomainsApi* | [**createDomainDNSRecord**](docs/Api/DomainsApi.md#createdomaindnsrecord) | **POST** /api/v1/domains/{fqdn}/dns-records | Добавить информацию о DNS-записи для домена или поддомена
*DomainsApi* | [**createDomainRequest**](docs/Api/DomainsApi.md#createdomainrequest) | **POST** /api/v1/domains-requests | Создание заявки на регистрацию/продление/трансфер домена
*DomainsApi* | [**deleteDomain**](docs/Api/DomainsApi.md#deletedomain) | **DELETE** /api/v1/domains/{fqdn} | Удаление домена
*DomainsApi* | [**deleteDomainDNSRecord**](docs/Api/DomainsApi.md#deletedomaindnsrecord) | **DELETE** /api/v1/domains/{fqdn}/dns-records/{record_id} | Удалить информацию о DNS-записи для домена или поддомена
*DomainsApi* | [**deleteSubdomain**](docs/Api/DomainsApi.md#deletesubdomain) | **DELETE** /api/v1/domains/{fqdn}/subdomains/{subdomain_fqdn} | Удаление поддомена
*DomainsApi* | [**getDomain**](docs/Api/DomainsApi.md#getdomain) | **GET** /api/v1/domains/{fqdn} | Получение информации о домене
*DomainsApi* | [**getDomainDNSRecords**](docs/Api/DomainsApi.md#getdomaindnsrecords) | **GET** /api/v1/domains/{fqdn}/dns-records | Получить информацию обо всех пользовательских DNS-записях домена или поддомена
*DomainsApi* | [**getDomainDefaultDNSRecords**](docs/Api/DomainsApi.md#getdomaindefaultdnsrecords) | **GET** /api/v1/domains/{fqdn}/default-dns-records | Получить информацию обо всех DNS-записях по умолчанию домена или поддомена
*DomainsApi* | [**getDomainNameServers**](docs/Api/DomainsApi.md#getdomainnameservers) | **GET** /api/v1/domains/{fqdn}/name-servers | Получение списка name-серверов домена
*DomainsApi* | [**getDomainRequest**](docs/Api/DomainsApi.md#getdomainrequest) | **GET** /api/v1/domains-requests/{request_id} | Получение заявки на регистрацию/продление/трансфер домена
*DomainsApi* | [**getDomainRequests**](docs/Api/DomainsApi.md#getdomainrequests) | **GET** /api/v1/domains-requests | Получение списка заявок на регистрацию/продление/трансфер домена
*DomainsApi* | [**getDomains**](docs/Api/DomainsApi.md#getdomains) | **GET** /api/v1/domains | Получение списка всех доменов
*DomainsApi* | [**getTLD**](docs/Api/DomainsApi.md#gettld) | **GET** /api/v1/tlds/{tld_id} | Получить информацию о доменной зоне по идентификатору
*DomainsApi* | [**getTLDs**](docs/Api/DomainsApi.md#gettlds) | **GET** /api/v1/tlds | Получить информацию о доменных зонах
*DomainsApi* | [**updateDomainAutoProlongation**](docs/Api/DomainsApi.md#updatedomainautoprolongation) | **PATCH** /api/v1/domains/{fqdn} | Включение/выключение автопродления домена
*DomainsApi* | [**updateDomainDNSRecord**](docs/Api/DomainsApi.md#updatedomaindnsrecord) | **PATCH** /api/v1/domains/{fqdn}/dns-records/{record_id} | Обновить информацию о DNS-записи домена или поддомена
*DomainsApi* | [**updateDomainNameServers**](docs/Api/DomainsApi.md#updatedomainnameservers) | **PUT** /api/v1/domains/{fqdn}/name-servers | Изменение name-серверов домена
*DomainsApi* | [**updateDomainRequest**](docs/Api/DomainsApi.md#updatedomainrequest) | **PATCH** /api/v1/domains-requests/{request_id} | Оплата/обновление заявки на регистрацию/продление/трансфер домена
*FirewallApi* | [**addResourceToGroup**](docs/Api/FirewallApi.md#addresourcetogroup) | **POST** /api/v1/firewall/groups/{group_id}/resources/{resource_id} | Линковка ресурса в firewall group
*FirewallApi* | [**createGroup**](docs/Api/FirewallApi.md#creategroup) | **POST** /api/v1/firewall/groups | Создание группы правил
*FirewallApi* | [**createGroupRule**](docs/Api/FirewallApi.md#creategrouprule) | **POST** /api/v1/firewall/groups/{group_id}/rules | Создание firewall правила
*FirewallApi* | [**deleteGroup**](docs/Api/FirewallApi.md#deletegroup) | **DELETE** /api/v1/firewall/groups/{group_id} | Удаление группы правил
*FirewallApi* | [**deleteGroupRule**](docs/Api/FirewallApi.md#deletegrouprule) | **DELETE** /api/v1/firewall/groups/{group_id}/rules/{rule_id} | Удаление firewall правила
*FirewallApi* | [**deleteResourceFromGroup**](docs/Api/FirewallApi.md#deleteresourcefromgroup) | **DELETE** /api/v1/firewall/groups/{group_id}/resources/{resource_id} | Отлинковка ресурса из firewall group
*FirewallApi* | [**getGroup**](docs/Api/FirewallApi.md#getgroup) | **GET** /api/v1/firewall/groups/{group_id} | Получение информации о группе правил
*FirewallApi* | [**getGroupResources**](docs/Api/FirewallApi.md#getgroupresources) | **GET** /api/v1/firewall/groups/{group_id}/resources | Получение слинкованных ресурсов
*FirewallApi* | [**getGroupRule**](docs/Api/FirewallApi.md#getgrouprule) | **GET** /api/v1/firewall/groups/{group_id}/rules/{rule_id} | Получение информации о правиле
*FirewallApi* | [**getGroupRules**](docs/Api/FirewallApi.md#getgrouprules) | **GET** /api/v1/firewall/groups/{group_id}/rules | Получение списка правил
*FirewallApi* | [**getGroups**](docs/Api/FirewallApi.md#getgroups) | **GET** /api/v1/firewall/groups | Получение групп правил
*FirewallApi* | [**getRulesForResource**](docs/Api/FirewallApi.md#getrulesforresource) | **GET** /api/v1/firewall/service/{resource_type}/{resource_id} | Получение групп правил для ресурса
*FirewallApi* | [**updateGroup**](docs/Api/FirewallApi.md#updategroup) | **PATCH** /api/v1/firewall/groups/{group_id} | Обновление группы правил
*FirewallApi* | [**updateGroupRule**](docs/Api/FirewallApi.md#updategrouprule) | **PATCH** /api/v1/firewall/groups/{group_id}/rules/{rule_id} | Обновление firewall правила
*FloatingIPApi* | [**bindFloatingIp**](docs/Api/FloatingIPApi.md#bindfloatingip) | **POST** /api/v1/floating-ips/{floating_ip_id}/bind | Привязать IP к сервису
*FloatingIPApi* | [**createFloatingIp**](docs/Api/FloatingIPApi.md#createfloatingip) | **POST** /api/v1/floating-ips | Создание плавающего IP
*FloatingIPApi* | [**deleteFloatingIP**](docs/Api/FloatingIPApi.md#deletefloatingip) | **DELETE** /api/v1/floating-ips/{floating_ip_id} | Удаление плавающего IP по идентификатору
*FloatingIPApi* | [**getFloatingIp**](docs/Api/FloatingIPApi.md#getfloatingip) | **GET** /api/v1/floating-ips/{floating_ip_id} | Получение плавающего IP
*FloatingIPApi* | [**getFloatingIps**](docs/Api/FloatingIPApi.md#getfloatingips) | **GET** /api/v1/floating-ips | Получение списка плавающих IP
*FloatingIPApi* | [**unbindFloatingIp**](docs/Api/FloatingIPApi.md#unbindfloatingip) | **POST** /api/v1/floating-ips/{floating_ip_id}/unbind | Отвязать IP от сервиса
*FloatingIPApi* | [**updateFloatingIP**](docs/Api/FloatingIPApi.md#updatefloatingip) | **PATCH** /api/v1/floating-ips/{floating_ip_id} | Изменение плавающего IP по идентификатору
*ImagesApi* | [**createImage**](docs/Api/ImagesApi.md#createimage) | **POST** /api/v1/images | Создание образа
*ImagesApi* | [**createImageDownloadUrl**](docs/Api/ImagesApi.md#createimagedownloadurl) | **POST** /api/v1/images/{image_id}/download-url | Создание ссылки на скачивание образа
*ImagesApi* | [**deleteImage**](docs/Api/ImagesApi.md#deleteimage) | **DELETE** /api/v1/images/{image_id} | Удаление образа
*ImagesApi* | [**deleteImageDownloadURL**](docs/Api/ImagesApi.md#deleteimagedownloadurl) | **DELETE** /api/v1/images/{image_id}/download-url/{image_url_id} | Удаление ссылки на образ
*ImagesApi* | [**getImage**](docs/Api/ImagesApi.md#getimage) | **GET** /api/v1/images/{image_id} | Получение информации о образе
*ImagesApi* | [**getImageDownloadURL**](docs/Api/ImagesApi.md#getimagedownloadurl) | **GET** /api/v1/images/{image_id}/download-url/{image_url_id} | Получение информации о ссылке на скачивание образа
*ImagesApi* | [**getImageDownloadURLs**](docs/Api/ImagesApi.md#getimagedownloadurls) | **GET** /api/v1/images/{image_id}/download-url | Получение информации о ссылках на скачивание образов
*ImagesApi* | [**getImages**](docs/Api/ImagesApi.md#getimages) | **GET** /api/v1/images | Получение списка образов
*ImagesApi* | [**updateImage**](docs/Api/ImagesApi.md#updateimage) | **PATCH** /api/v1/images/{image_id} | Обновление информации о образе
*ImagesApi* | [**uploadImage**](docs/Api/ImagesApi.md#uploadimage) | **POST** /api/v1/images/{image_id} | Загрузка образа
*KubernetesApi* | [**createCluster**](docs/Api/KubernetesApi.md#createcluster) | **POST** /api/v1/k8s/clusters | Создание кластера
*KubernetesApi* | [**createClusterNodeGroup**](docs/Api/KubernetesApi.md#createclusternodegroup) | **POST** /api/v1/k8s/clusters/{cluster_id}/groups | Создание группы нод
*KubernetesApi* | [**deleteCluster**](docs/Api/KubernetesApi.md#deletecluster) | **DELETE** /api/v1/k8s/clusters/{cluster_id} | Удаление кластера
*KubernetesApi* | [**deleteClusterNode**](docs/Api/KubernetesApi.md#deleteclusternode) | **DELETE** /api/v1/k8s/clusters/{cluster_id}/nodes/{node_id} | Удаление ноды
*KubernetesApi* | [**deleteClusterNodeGroup**](docs/Api/KubernetesApi.md#deleteclusternodegroup) | **DELETE** /api/v1/k8s/clusters/{cluster_id}/groups/{group_id} | Удаление группы нод
*KubernetesApi* | [**getCluster**](docs/Api/KubernetesApi.md#getcluster) | **GET** /api/v1/k8s/clusters/{cluster_id} | Получение информации о кластере
*KubernetesApi* | [**getClusterKubeconfig**](docs/Api/KubernetesApi.md#getclusterkubeconfig) | **GET** /api/v1/k8s/clusters/{cluster_id}/kubeconfig | Получение файла kubeconfig
*KubernetesApi* | [**getClusterNodeGroup**](docs/Api/KubernetesApi.md#getclusternodegroup) | **GET** /api/v1/k8s/clusters/{cluster_id}/groups/{group_id} | Получение информации о группе нод
*KubernetesApi* | [**getClusterNodeGroups**](docs/Api/KubernetesApi.md#getclusternodegroups) | **GET** /api/v1/k8s/clusters/{cluster_id}/groups | Получение групп нод кластера
*KubernetesApi* | [**getClusterNodes**](docs/Api/KubernetesApi.md#getclusternodes) | **GET** /api/v1/k8s/clusters/{cluster_id}/nodes | Получение списка нод
*KubernetesApi* | [**getClusterNodesFromGroup**](docs/Api/KubernetesApi.md#getclusternodesfromgroup) | **GET** /api/v1/k8s/clusters/{cluster_id}/groups/{group_id}/nodes | Получение списка нод, принадлежащих группе
*KubernetesApi* | [**getClusterResources**](docs/Api/KubernetesApi.md#getclusterresources) | **GET** /api/v1/k8s/clusters/{cluster_id}/resources | Получение ресурсов кластера
*KubernetesApi* | [**getClusters**](docs/Api/KubernetesApi.md#getclusters) | **GET** /api/v1/k8s/clusters | Получение списка кластеров
*KubernetesApi* | [**getK8SNetworkDrivers**](docs/Api/KubernetesApi.md#getk8snetworkdrivers) | **GET** /api/v1/k8s/network_drivers | Получение списка сетевых драйверов k8s
*KubernetesApi* | [**getK8SVersions**](docs/Api/KubernetesApi.md#getk8sversions) | **GET** /api/v1/k8s/k8s_versions | Получение списка версий k8s
*KubernetesApi* | [**getKubernetesPresets**](docs/Api/KubernetesApi.md#getkubernetespresets) | **GET** /api/v1/presets/k8s | Получение списка тарифов
*KubernetesApi* | [**increaseCountOfNodesInGroup**](docs/Api/KubernetesApi.md#increasecountofnodesingroup) | **POST** /api/v1/k8s/clusters/{cluster_id}/groups/{group_id}/nodes | Увеличение количества нод в группе на указанное количество
*KubernetesApi* | [**reduceCountOfNodesInGroup**](docs/Api/KubernetesApi.md#reducecountofnodesingroup) | **DELETE** /api/v1/k8s/clusters/{cluster_id}/groups/{group_id}/nodes | Уменьшение количества нод в группе на указанное количество
*KubernetesApi* | [**updateCluster**](docs/Api/KubernetesApi.md#updatecluster) | **PATCH** /api/v1/k8s/clusters/{cluster_id} | Обновление информации о кластере
*LocationsApi* | [**getLocations**](docs/Api/LocationsApi.md#getlocations) | **GET** /api/v2/locations | Получение списка локаций
*MailApi* | [**createDomainMailbox**](docs/Api/MailApi.md#createdomainmailbox) | **POST** /api/v1/mail/domains/{domain} | Создание почтового ящика
*MailApi* | [**deleteMailbox**](docs/Api/MailApi.md#deletemailbox) | **DELETE** /api/v1/mail/domains/{domain}/mailboxes/{mailbox} | Удаление почтового ящика
*MailApi* | [**getDomainMailInfo**](docs/Api/MailApi.md#getdomainmailinfo) | **GET** /api/v1/mail/domains/{domain}/info | Получение почтовой информации о домене
*MailApi* | [**getDomainMailboxes**](docs/Api/MailApi.md#getdomainmailboxes) | **GET** /api/v1/mail/domains/{domain} | Получение списка почтовых ящиков домена
*MailApi* | [**getMailQuota**](docs/Api/MailApi.md#getmailquota) | **GET** /api/v1/mail/quota | Получение квоты почты аккаунта
*MailApi* | [**getMailbox**](docs/Api/MailApi.md#getmailbox) | **GET** /api/v1/mail/domains/{domain}/mailboxes/{mailbox} | Получение почтового ящика
*MailApi* | [**getMailboxes**](docs/Api/MailApi.md#getmailboxes) | **GET** /api/v1/mail | Получение списка почтовых ящиков аккаунта
*MailApi* | [**updateDomainMailInfo**](docs/Api/MailApi.md#updatedomainmailinfo) | **PATCH** /api/v1/mail/domains/{domain}/info | Изменение почтовой информации о домене
*MailApi* | [**updateMailQuota**](docs/Api/MailApi.md#updatemailquota) | **PATCH** /api/v1/mail/quota | Изменение квоты почты аккаунта
*MailApi* | [**updateMailbox**](docs/Api/MailApi.md#updatemailbox) | **PATCH** /api/v1/mail/domains/{domain}/mailboxes/{mailbox} | Изменение почтового ящика
*ProjectsApi* | [**addBalancerToProject**](docs/Api/ProjectsApi.md#addbalancertoproject) | **POST** /api/v1/projects/{project_id}/resources/balancers | Добавление балансировщика в проект
*ProjectsApi* | [**addClusterToProject**](docs/Api/ProjectsApi.md#addclustertoproject) | **POST** /api/v1/projects/{project_id}/resources/clusters | Добавление кластера в проект
*ProjectsApi* | [**addDatabaseToProject**](docs/Api/ProjectsApi.md#adddatabasetoproject) | **POST** /api/v1/projects/{project_id}/resources/databases | Добавление базы данных в проект
*ProjectsApi* | [**addDedicatedServerToProject**](docs/Api/ProjectsApi.md#adddedicatedservertoproject) | **POST** /api/v1/projects/{project_id}/resources/dedicated | Добавление выделенного сервера в проект
*ProjectsApi* | [**addServerToProject**](docs/Api/ProjectsApi.md#addservertoproject) | **POST** /api/v1/projects/{project_id}/resources/servers | Добавление сервера в проект
*ProjectsApi* | [**addStorageToProject**](docs/Api/ProjectsApi.md#addstoragetoproject) | **POST** /api/v1/projects/{project_id}/resources/buckets | Добавление хранилища в проект
*ProjectsApi* | [**createProject**](docs/Api/ProjectsApi.md#createproject) | **POST** /api/v1/projects | Создание проекта
*ProjectsApi* | [**deleteProject**](docs/Api/ProjectsApi.md#deleteproject) | **DELETE** /api/v1/projects/{project_id} | Удаление проекта
*ProjectsApi* | [**getAccountBalancers**](docs/Api/ProjectsApi.md#getaccountbalancers) | **GET** /api/v1/projects/resources/balancers | Получение списка всех балансировщиков на аккаунте
*ProjectsApi* | [**getAccountClusters**](docs/Api/ProjectsApi.md#getaccountclusters) | **GET** /api/v1/projects/resources/clusters | Получение списка всех кластеров на аккаунте
*ProjectsApi* | [**getAccountDatabases**](docs/Api/ProjectsApi.md#getaccountdatabases) | **GET** /api/v1/projects/resources/databases | Получение списка всех баз данных на аккаунте
*ProjectsApi* | [**getAccountDedicatedServers**](docs/Api/ProjectsApi.md#getaccountdedicatedservers) | **GET** /api/v1/projects/resources/dedicated | Получение списка всех выделенных серверов на аккаунте
*ProjectsApi* | [**getAccountServers**](docs/Api/ProjectsApi.md#getaccountservers) | **GET** /api/v1/projects/resources/servers | Получение списка всех серверов на аккаунте
*ProjectsApi* | [**getAccountStorages**](docs/Api/ProjectsApi.md#getaccountstorages) | **GET** /api/v1/projects/resources/buckets | Получение списка всех хранилищ на аккаунте
*ProjectsApi* | [**getAllProjectResources**](docs/Api/ProjectsApi.md#getallprojectresources) | **GET** /api/v1/projects/{project_id}/resources | Получение всех ресурсов проекта
*ProjectsApi* | [**getProject**](docs/Api/ProjectsApi.md#getproject) | **GET** /api/v1/projects/{project_id} | Получение проекта по идентификатору
*ProjectsApi* | [**getProjectBalancers**](docs/Api/ProjectsApi.md#getprojectbalancers) | **GET** /api/v1/projects/{project_id}/resources/balancers | Получение списка балансировщиков проекта
*ProjectsApi* | [**getProjectClusters**](docs/Api/ProjectsApi.md#getprojectclusters) | **GET** /api/v1/projects/{project_id}/resources/clusters | Получение списка кластеров проекта
*ProjectsApi* | [**getProjectDatabases**](docs/Api/ProjectsApi.md#getprojectdatabases) | **GET** /api/v1/projects/{project_id}/resources/databases | Получение списка баз данных проекта
*ProjectsApi* | [**getProjectDedicatedServers**](docs/Api/ProjectsApi.md#getprojectdedicatedservers) | **GET** /api/v1/projects/{project_id}/resources/dedicated | Получение списка выделенных серверов проекта
*ProjectsApi* | [**getProjectServers**](docs/Api/ProjectsApi.md#getprojectservers) | **GET** /api/v1/projects/{project_id}/resources/servers | Получение списка серверов проекта
*ProjectsApi* | [**getProjectStorages**](docs/Api/ProjectsApi.md#getprojectstorages) | **GET** /api/v1/projects/{project_id}/resources/buckets | Получение списка хранилищ проекта
*ProjectsApi* | [**getProjects**](docs/Api/ProjectsApi.md#getprojects) | **GET** /api/v1/projects | Получение списка проектов
*ProjectsApi* | [**transferResourceToAnotherProject**](docs/Api/ProjectsApi.md#transferresourcetoanotherproject) | **PUT** /api/v1/projects/{project_id}/resources/transfer | Перенести ресурс в другой проект
*ProjectsApi* | [**updateProject**](docs/Api/ProjectsApi.md#updateproject) | **PUT** /api/v1/projects/{project_id} | Изменение проекта
*S3Api* | [**addStorageSubdomainCertificate**](docs/Api/S3Api.md#addstoragesubdomaincertificate) | **POST** /api/v1/storages/certificates/generate | Добавление сертификата для поддомена хранилища
*S3Api* | [**addStorageSubdomains**](docs/Api/S3Api.md#addstoragesubdomains) | **POST** /api/v1/storages/buckets/{bucket_id}/subdomains | Добавление поддоменов для хранилища
*S3Api* | [**copyStorageFile**](docs/Api/S3Api.md#copystoragefile) | **POST** /api/v1/storages/buckets/{bucket_id}/object-manager/copy | Копирование файла/директории в хранилище
*S3Api* | [**createFolderInStorage**](docs/Api/S3Api.md#createfolderinstorage) | **POST** /api/v1/storages/buckets/{bucket_id}/object-manager/mkdir | Создание директории в хранилище
*S3Api* | [**createStorage**](docs/Api/S3Api.md#createstorage) | **POST** /api/v1/storages/buckets | Создание хранилища
*S3Api* | [**deleteStorage**](docs/Api/S3Api.md#deletestorage) | **DELETE** /api/v1/storages/buckets/{bucket_id} | Удаление хранилища на аккаунте
*S3Api* | [**deleteStorageFile**](docs/Api/S3Api.md#deletestoragefile) | **DELETE** /api/v1/storages/buckets/{bucket_id}/object-manager/remove | Удаление файла/директории в хранилище
*S3Api* | [**deleteStorageSubdomains**](docs/Api/S3Api.md#deletestoragesubdomains) | **DELETE** /api/v1/storages/buckets/{bucket_id}/subdomains | Удаление поддоменов хранилища
*S3Api* | [**getStorageFilesList**](docs/Api/S3Api.md#getstoragefileslist) | **GET** /api/v1/storages/buckets/{bucket_id}/object-manager/list | Получение списка файлов в хранилище по префиксу
*S3Api* | [**getStorageSubdomains**](docs/Api/S3Api.md#getstoragesubdomains) | **GET** /api/v1/storages/buckets/{bucket_id}/subdomains | Получение списка поддоменов хранилища
*S3Api* | [**getStorageTransferStatus**](docs/Api/S3Api.md#getstoragetransferstatus) | **GET** /api/v1/storages/buckets/{bucket_id}/transfer-status | Получение статуса переноса хранилища от стороннего S3 в Timeweb Cloud
*S3Api* | [**getStorageUsers**](docs/Api/S3Api.md#getstorageusers) | **GET** /api/v1/storages/users | Получение списка пользователей хранилищ аккаунта
*S3Api* | [**getStorages**](docs/Api/S3Api.md#getstorages) | **GET** /api/v1/storages/buckets | Получение списка хранилищ аккаунта
*S3Api* | [**getStoragesPresets**](docs/Api/S3Api.md#getstoragespresets) | **GET** /api/v1/presets/storages | Получение списка тарифов для хранилищ
*S3Api* | [**renameStorageFile**](docs/Api/S3Api.md#renamestoragefile) | **POST** /api/v1/storages/buckets/{bucket_id}/object-manager/rename | Переименование файла/директории в хранилище
*S3Api* | [**transferStorage**](docs/Api/S3Api.md#transferstorage) | **POST** /api/v1/storages/transfer | Перенос хранилища от стороннего провайдера S3 в Timeweb Cloud
*S3Api* | [**updateStorage**](docs/Api/S3Api.md#updatestorage) | **PATCH** /api/v1/storages/buckets/{bucket_id} | Изменение хранилища на аккаунте
*S3Api* | [**updateStorageUser**](docs/Api/S3Api.md#updatestorageuser) | **PATCH** /api/v1/storages/users/{user_id} | Изменение пароля пользователя-администратора хранилища
*S3Api* | [**uploadFileToStorage**](docs/Api/S3Api.md#uploadfiletostorage) | **POST** /api/v1/storages/buckets/{bucket_id}/object-manager/upload | Загрузка файлов в хранилище
*SSHApi* | [**addKeyToServer**](docs/Api/SSHApi.md#addkeytoserver) | **POST** /api/v1/servers/{server_id}/ssh-keys | Добавление SSH-ключей на сервер
*SSHApi* | [**createKey**](docs/Api/SSHApi.md#createkey) | **POST** /api/v1/ssh-keys | Создание SSH-ключа
*SSHApi* | [**deleteKey**](docs/Api/SSHApi.md#deletekey) | **DELETE** /api/v1/ssh-keys/{ssh_key_id} | Удаление SSH-ключа по уникальному идентификатору
*SSHApi* | [**deleteKeyFromServer**](docs/Api/SSHApi.md#deletekeyfromserver) | **DELETE** /api/v1/servers/{server_id}/ssh-keys/{ssh_key_id} | Удаление SSH-ключей с сервера
*SSHApi* | [**getKey**](docs/Api/SSHApi.md#getkey) | **GET** /api/v1/ssh-keys/{ssh_key_id} | Получение SSH-ключа по уникальному идентификатору
*SSHApi* | [**getKeys**](docs/Api/SSHApi.md#getkeys) | **GET** /api/v1/ssh-keys | Получение списка SSH-ключей
*SSHApi* | [**updateKey**](docs/Api/SSHApi.md#updatekey) | **PATCH** /api/v1/ssh-keys/{ssh_key_id} | Изменение SSH-ключа по уникальному идентификатору
*ServersApi* | [**addServerIP**](docs/Api/ServersApi.md#addserverip) | **POST** /api/v1/servers/{server_id}/ips | Добавление IP-адреса сервера
*ServersApi* | [**cloneServer**](docs/Api/ServersApi.md#cloneserver) | **POST** /api/v1/servers/{server_id}/clone | Клонирование сервера
*ServersApi* | [**createServer**](docs/Api/ServersApi.md#createserver) | **POST** /api/v1/servers | Создание сервера
*ServersApi* | [**createServerDisk**](docs/Api/ServersApi.md#createserverdisk) | **POST** /api/v1/servers/{server_id}/disks | Создание диска сервера
*ServersApi* | [**createServerDiskBackup**](docs/Api/ServersApi.md#createserverdiskbackup) | **POST** /api/v1/servers/{server_id}/disks/{disk_id}/backups | Создание бэкапа диска сервера
*ServersApi* | [**deleteServer**](docs/Api/ServersApi.md#deleteserver) | **DELETE** /api/v1/servers/{server_id} | Удаление сервера
*ServersApi* | [**deleteServerDisk**](docs/Api/ServersApi.md#deleteserverdisk) | **DELETE** /api/v1/servers/{server_id}/disks/{disk_id} | Удаление диска сервера
*ServersApi* | [**deleteServerDiskBackup**](docs/Api/ServersApi.md#deleteserverdiskbackup) | **DELETE** /api/v1/servers/{server_id}/disks/{disk_id}/backups/{backup_id} | Удаление бэкапа диска сервера
*ServersApi* | [**deleteServerIP**](docs/Api/ServersApi.md#deleteserverip) | **DELETE** /api/v1/servers/{server_id}/ips | Удаление IP-адреса сервера
*ServersApi* | [**getConfigurators**](docs/Api/ServersApi.md#getconfigurators) | **GET** /api/v1/configurator/servers | Получение списка конфигураторов серверов
*ServersApi* | [**getOsList**](docs/Api/ServersApi.md#getoslist) | **GET** /api/v1/os/servers | Получение списка операционных систем
*ServersApi* | [**getServer**](docs/Api/ServersApi.md#getserver) | **GET** /api/v1/servers/{server_id} | Получение сервера
*ServersApi* | [**getServerDisk**](docs/Api/ServersApi.md#getserverdisk) | **GET** /api/v1/servers/{server_id}/disks/{disk_id} | Получение диска сервера
*ServersApi* | [**getServerDiskAutoBackupSettings**](docs/Api/ServersApi.md#getserverdiskautobackupsettings) | **GET** /api/v1/servers/{server_id}/disks/{disk_id}/auto-backups | Получить настройки автобэкапов диска сервера
*ServersApi* | [**getServerDiskBackup**](docs/Api/ServersApi.md#getserverdiskbackup) | **GET** /api/v1/servers/{server_id}/disks/{disk_id}/backups/{backup_id} | Получение бэкапа диска сервера
*ServersApi* | [**getServerDiskBackups**](docs/Api/ServersApi.md#getserverdiskbackups) | **GET** /api/v1/servers/{server_id}/disks/{disk_id}/backups | Получение списка бэкапов диска сервера
*ServersApi* | [**getServerDisks**](docs/Api/ServersApi.md#getserverdisks) | **GET** /api/v1/servers/{server_id}/disks | Получение списка дисков сервера
*ServersApi* | [**getServerIPs**](docs/Api/ServersApi.md#getserverips) | **GET** /api/v1/servers/{server_id}/ips | Получение списка IP-адресов сервера
*ServersApi* | [**getServerLogs**](docs/Api/ServersApi.md#getserverlogs) | **GET** /api/v1/servers/{server_id}/logs | Получение списка логов сервера
*ServersApi* | [**getServerStatistics**](docs/Api/ServersApi.md#getserverstatistics) | **GET** /api/v1/servers/{server_id}/statistics | Получение статистики сервера
*ServersApi* | [**getServers**](docs/Api/ServersApi.md#getservers) | **GET** /api/v1/servers | Получение списка серверов
*ServersApi* | [**getServersPresets**](docs/Api/ServersApi.md#getserverspresets) | **GET** /api/v1/presets/servers | Получение списка тарифов серверов
*ServersApi* | [**getSoftware**](docs/Api/ServersApi.md#getsoftware) | **GET** /api/v1/software/servers | Получение списка ПО из маркетплейса
*ServersApi* | [**hardShutdownServer**](docs/Api/ServersApi.md#hardshutdownserver) | **POST** /api/v1/servers/{server_id}/hard-shutdown | Принудительное выключение сервера
*ServersApi* | [**imageUnmountAndServerReload**](docs/Api/ServersApi.md#imageunmountandserverreload) | **POST** /api/v1/servers/{server_id}/image-unmount | Отмонтирование ISO образа и перезагрузка сервера
*ServersApi* | [**performActionOnBackup**](docs/Api/ServersApi.md#performactiononbackup) | **POST** /api/v1/servers/{server_id}/disks/{disk_id}/backups/{backup_id}/action | Выполнение действия над бэкапом диска сервера
*ServersApi* | [**performActionOnServer**](docs/Api/ServersApi.md#performactiononserver) | **POST** /api/v1/servers/{server_id}/action | Выполнение действия над сервером
*ServersApi* | [**rebootServer**](docs/Api/ServersApi.md#rebootserver) | **POST** /api/v1/servers/{server_id}/reboot | Перезагрузка сервера
*ServersApi* | [**resetServerPassword**](docs/Api/ServersApi.md#resetserverpassword) | **POST** /api/v1/servers/{server_id}/reset-password | Сброс пароля сервера
*ServersApi* | [**shutdownServer**](docs/Api/ServersApi.md#shutdownserver) | **POST** /api/v1/servers/{server_id}/shutdown | Выключение сервера
*ServersApi* | [**startServer**](docs/Api/ServersApi.md#startserver) | **POST** /api/v1/servers/{server_id}/start | Запуск сервера
*ServersApi* | [**updateServer**](docs/Api/ServersApi.md#updateserver) | **PATCH** /api/v1/servers/{server_id} | Изменение сервера
*ServersApi* | [**updateServerDisk**](docs/Api/ServersApi.md#updateserverdisk) | **PATCH** /api/v1/servers/{server_id}/disks/{disk_id} | Изменение параметров диска сервера
*ServersApi* | [**updateServerDiskAutoBackupSettings**](docs/Api/ServersApi.md#updateserverdiskautobackupsettings) | **PATCH** /api/v1/servers/{server_id}/disks/{disk_id}/auto-backups | Изменение настроек автобэкапов диска сервера
*ServersApi* | [**updateServerDiskBackup**](docs/Api/ServersApi.md#updateserverdiskbackup) | **PATCH** /api/v1/servers/{server_id}/disks/{disk_id}/backups/{backup_id} | Изменение бэкапа диска сервера
*ServersApi* | [**updateServerIP**](docs/Api/ServersApi.md#updateserverip) | **PATCH** /api/v1/servers/{server_id}/ips | Изменение IP-адреса сервера
*ServersApi* | [**updateServerNAT**](docs/Api/ServersApi.md#updateservernat) | **PATCH** /api/v1/servers/{server_id}/local-networks/nat-mode | Изменение правил маршрутизации трафика сервера (NAT)
*ServersApi* | [**updateServerOSBootMode**](docs/Api/ServersApi.md#updateserverosbootmode) | **POST** /api/v1/servers/{server_id}/boot-mode | Выбор типа загрузки операционной системы сервера
*VPCApi* | [**createVPC**](docs/Api/VPCApi.md#createvpc) | **POST** /api/v2/vpcs | Создание VPC
*VPCApi* | [**deleteVPC**](docs/Api/VPCApi.md#deletevpc) | **DELETE** /api/v1/vpcs/{vpc_id} | Удаление VPC по идентификатору сети
*VPCApi* | [**getVPC**](docs/Api/VPCApi.md#getvpc) | **GET** /api/v2/vpcs/{vpc_id} | Получение VPC
*VPCApi* | [**getVPCPorts**](docs/Api/VPCApi.md#getvpcports) | **GET** /api/v1/vpcs/{vpc_id}/ports | Получение списка портов для VPC
*VPCApi* | [**getVPCServices**](docs/Api/VPCApi.md#getvpcservices) | **GET** /api/v2/vpcs/{vpc_id}/services | Получение списка сервисов в VPC
*VPCApi* | [**getVPCs**](docs/Api/VPCApi.md#getvpcs) | **GET** /api/v2/vpcs | Получение списка VPCs
*VPCApi* | [**updateVPCs**](docs/Api/VPCApi.md#updatevpcs) | **PATCH** /api/v2/vpcs/{vpc_id} | Изменение VPC по идентификатору сети

## Models

- [AddBalancerToProject200Response](docs/Model/AddBalancerToProject200Response.md)
- [AddBalancerToProjectRequest](docs/Model/AddBalancerToProjectRequest.md)
- [AddBitbucket](docs/Model/AddBitbucket.md)
- [AddClusterToProjectRequest](docs/Model/AddClusterToProjectRequest.md)
- [AddCountries](docs/Model/AddCountries.md)
- [AddCountriesToAllowedList201Response](docs/Model/AddCountriesToAllowedList201Response.md)
- [AddCountriesToAllowedListRequest](docs/Model/AddCountriesToAllowedListRequest.md)
- [AddDatabaseToProjectRequest](docs/Model/AddDatabaseToProjectRequest.md)
- [AddDedicatedServerToProjectRequest](docs/Model/AddDedicatedServerToProjectRequest.md)
- [AddGit](docs/Model/AddGit.md)
- [AddGithub](docs/Model/AddGithub.md)
- [AddGitlab](docs/Model/AddGitlab.md)
- [AddIPsToAllowedList201Response](docs/Model/AddIPsToAllowedList201Response.md)
- [AddIPsToAllowedListRequest](docs/Model/AddIPsToAllowedListRequest.md)
- [AddIPsToBalancerRequest](docs/Model/AddIPsToBalancerRequest.md)
- [AddIps](docs/Model/AddIps.md)
- [AddKeyToServerRequest](docs/Model/AddKeyToServerRequest.md)
- [AddProvider201Response](docs/Model/AddProvider201Response.md)
- [AddServerIP201Response](docs/Model/AddServerIP201Response.md)
- [AddServerIPRequest](docs/Model/AddServerIPRequest.md)
- [AddServerToProjectRequest](docs/Model/AddServerToProjectRequest.md)
- [AddStorageSubdomainCertificateRequest](docs/Model/AddStorageSubdomainCertificateRequest.md)
- [AddStorageSubdomains200Response](docs/Model/AddStorageSubdomains200Response.md)
- [AddStorageSubdomainsRequest](docs/Model/AddStorageSubdomainsRequest.md)
- [AddStorageToProjectRequest](docs/Model/AddStorageToProjectRequest.md)
- [AddSubdomain201Response](docs/Model/AddSubdomain201Response.md)
- [AddedSubdomain](docs/Model/AddedSubdomain.md)
- [ApiKey](docs/Model/ApiKey.md)
- [App](docs/Model/App.md)
- [AppConfiguration](docs/Model/AppConfiguration.md)
- [AppDiskStatus](docs/Model/AppDiskStatus.md)
- [AppDomainsInner](docs/Model/AppDomainsInner.md)
- [AppProvider](docs/Model/AppProvider.md)
- [AppsPresets](docs/Model/AppsPresets.md)
- [AppsPresetsBackendPresetsInner](docs/Model/AppsPresetsBackendPresetsInner.md)
- [AppsPresetsFrontendPresetsInner](docs/Model/AppsPresetsFrontendPresetsInner.md)
- [AutoBackup](docs/Model/AutoBackup.md)
- [AutoReplyIsDisabled](docs/Model/AutoReplyIsDisabled.md)
- [AutoReplyIsEnabled](docs/Model/AutoReplyIsEnabled.md)
- [AvailabilityZone](docs/Model/AvailabilityZone.md)
- [AvailableFrameworks](docs/Model/AvailableFrameworks.md)
- [AvailableFrameworksBackendFrameworksInner](docs/Model/AvailableFrameworksBackendFrameworksInner.md)
- [AvailableFrameworksFrontendFrameworksInner](docs/Model/AvailableFrameworksFrontendFrameworksInner.md)
- [Backup](docs/Model/Backup.md)
- [Balancer](docs/Model/Balancer.md)
- [BaseError](docs/Model/BaseError.md)
- [BindFloatingIp](docs/Model/BindFloatingIp.md)
- [Bonus](docs/Model/Bonus.md)
- [Branch](docs/Model/Branch.md)
- [Bucket](docs/Model/Bucket.md)
- [BucketDiskStats](docs/Model/BucketDiskStats.md)
- [BucketUser](docs/Model/BucketUser.md)
- [CheckDomain200Response](docs/Model/CheckDomain200Response.md)
- [ClusterEdit](docs/Model/ClusterEdit.md)
- [ClusterIn](docs/Model/ClusterIn.md)
- [ClusterOut](docs/Model/ClusterOut.md)
- [ClusterResponse](docs/Model/ClusterResponse.md)
- [Clusterk8s](docs/Model/Clusterk8s.md)
- [ClustersResponse](docs/Model/ClustersResponse.md)
- [Commit](docs/Model/Commit.md)
- [ConfigParameters](docs/Model/ConfigParameters.md)
- [CopyStorageFileRequest](docs/Model/CopyStorageFileRequest.md)
- [CreateAdmin](docs/Model/CreateAdmin.md)
- [CreateApiKey](docs/Model/CreateApiKey.md)
- [CreateApp](docs/Model/CreateApp.md)
- [CreateApp201Response](docs/Model/CreateApp201Response.md)
- [CreateBalancer](docs/Model/CreateBalancer.md)
- [CreateBalancer200Response](docs/Model/CreateBalancer200Response.md)
- [CreateBalancerRule200Response](docs/Model/CreateBalancerRule200Response.md)
- [CreateCluster](docs/Model/CreateCluster.md)
- [CreateClusterAdmin](docs/Model/CreateClusterAdmin.md)
- [CreateClusterInstance](docs/Model/CreateClusterInstance.md)
- [CreateDatabase201Response](docs/Model/CreateDatabase201Response.md)
- [CreateDatabaseBackup201Response](docs/Model/CreateDatabaseBackup201Response.md)
- [CreateDatabaseBackup409Response](docs/Model/CreateDatabaseBackup409Response.md)
- [CreateDatabaseCluster201Response](docs/Model/CreateDatabaseCluster201Response.md)
- [CreateDatabaseInstance201Response](docs/Model/CreateDatabaseInstance201Response.md)
- [CreateDatabaseUser201Response](docs/Model/CreateDatabaseUser201Response.md)
- [CreateDb](docs/Model/CreateDb.md)
- [CreateDbAutoBackups](docs/Model/CreateDbAutoBackups.md)
- [CreateDedicatedServer](docs/Model/CreateDedicatedServer.md)
- [CreateDedicatedServer201Response](docs/Model/CreateDedicatedServer201Response.md)
- [CreateDeploy201Response](docs/Model/CreateDeploy201Response.md)
- [CreateDeployRequest](docs/Model/CreateDeployRequest.md)
- [CreateDns](docs/Model/CreateDns.md)
- [CreateDomainDNSRecord201Response](docs/Model/CreateDomainDNSRecord201Response.md)
- [CreateDomainMailbox201Response](docs/Model/CreateDomainMailbox201Response.md)
- [CreateDomainMailboxRequest](docs/Model/CreateDomainMailboxRequest.md)
- [CreateDomainRequest201Response](docs/Model/CreateDomainRequest201Response.md)
- [CreateFloatingIp](docs/Model/CreateFloatingIp.md)
- [CreateFloatingIp201Response](docs/Model/CreateFloatingIp201Response.md)
- [CreateFolderInStorageRequest](docs/Model/CreateFolderInStorageRequest.md)
- [CreateInstance](docs/Model/CreateInstance.md)
- [CreateKey201Response](docs/Model/CreateKey201Response.md)
- [CreateKeyRequest](docs/Model/CreateKeyRequest.md)
- [CreateProject](docs/Model/CreateProject.md)
- [CreateProject201Response](docs/Model/CreateProject201Response.md)
- [CreateRule](docs/Model/CreateRule.md)
- [CreateServer](docs/Model/CreateServer.md)
- [CreateServer201Response](docs/Model/CreateServer201Response.md)
- [CreateServerConfiguration](docs/Model/CreateServerConfiguration.md)
- [CreateServerDisk201Response](docs/Model/CreateServerDisk201Response.md)
- [CreateServerDiskBackup201Response](docs/Model/CreateServerDiskBackup201Response.md)
- [CreateServerDiskBackupRequest](docs/Model/CreateServerDiskBackupRequest.md)
- [CreateServerDiskRequest](docs/Model/CreateServerDiskRequest.md)
- [CreateStorage201Response](docs/Model/CreateStorage201Response.md)
- [CreateStorageRequest](docs/Model/CreateStorageRequest.md)
- [CreateToken201Response](docs/Model/CreateToken201Response.md)
- [CreateVPC201Response](docs/Model/CreateVPC201Response.md)
- [CreateVpc](docs/Model/CreateVpc.md)
- [CreatedApiKey](docs/Model/CreatedApiKey.md)
- [DatabaseAdmin](docs/Model/DatabaseAdmin.md)
- [DatabaseAdminInstancesInner](docs/Model/DatabaseAdminInstancesInner.md)
- [DatabaseCluster](docs/Model/DatabaseCluster.md)
- [DatabaseClusterDiskStats](docs/Model/DatabaseClusterDiskStats.md)
- [DatabaseClusterNetworksInner](docs/Model/DatabaseClusterNetworksInner.md)
- [DatabaseClusterNetworksInnerIpsInner](docs/Model/DatabaseClusterNetworksInnerIpsInner.md)
- [DatabaseInstance](docs/Model/DatabaseInstance.md)
- [DatabaseType](docs/Model/DatabaseType.md)
- [Db](docs/Model/Db.md)
- [DbDiskStats](docs/Model/DbDiskStats.md)
- [DbType](docs/Model/DbType.md)
- [DedicatedServer](docs/Model/DedicatedServer.md)
- [DedicatedServerAdditionalService](docs/Model/DedicatedServerAdditionalService.md)
- [DedicatedServerPreset](docs/Model/DedicatedServerPreset.md)
- [DedicatedServerPresetCpu](docs/Model/DedicatedServerPresetCpu.md)
- [DedicatedServerPresetDisk](docs/Model/DedicatedServerPresetDisk.md)
- [DedicatedServerPresetMemory](docs/Model/DedicatedServerPresetMemory.md)
- [DeleteBalancer200Response](docs/Model/DeleteBalancer200Response.md)
- [DeleteCluster200Response](docs/Model/DeleteCluster200Response.md)
- [DeleteCountriesFromAllowedList200Response](docs/Model/DeleteCountriesFromAllowedList200Response.md)
- [DeleteCountriesFromAllowedListRequest](docs/Model/DeleteCountriesFromAllowedListRequest.md)
- [DeleteDatabase200Response](docs/Model/DeleteDatabase200Response.md)
- [DeleteDatabaseCluster200Response](docs/Model/DeleteDatabaseCluster200Response.md)
- [DeleteIPsFromAllowedList200Response](docs/Model/DeleteIPsFromAllowedList200Response.md)
- [DeleteIPsFromAllowedListRequest](docs/Model/DeleteIPsFromAllowedListRequest.md)
- [DeleteServer200Response](docs/Model/DeleteServer200Response.md)
- [DeleteServerIPRequest](docs/Model/DeleteServerIPRequest.md)
- [DeleteServiceResponse](docs/Model/DeleteServiceResponse.md)
- [DeleteStorage200Response](docs/Model/DeleteStorage200Response.md)
- [DeleteStorageFileRequest](docs/Model/DeleteStorageFileRequest.md)
- [Deploy](docs/Model/Deploy.md)
- [DeploySettingsInner](docs/Model/DeploySettingsInner.md)
- [DeployStatus](docs/Model/DeployStatus.md)
- [DnsRecord](docs/Model/DnsRecord.md)
- [DnsRecordData](docs/Model/DnsRecordData.md)
- [Domain](docs/Model/Domain.md)
- [DomainAllowedBuyPeriodsInner](docs/Model/DomainAllowedBuyPeriodsInner.md)
- [DomainInfo](docs/Model/DomainInfo.md)
- [DomainNameServer](docs/Model/DomainNameServer.md)
- [DomainNameServerItemsInner](docs/Model/DomainNameServerItemsInner.md)
- [DomainPaymentPeriod](docs/Model/DomainPaymentPeriod.md)
- [DomainPrimeType](docs/Model/DomainPrimeType.md)
- [DomainProlong](docs/Model/DomainProlong.md)
- [DomainRegister](docs/Model/DomainRegister.md)
- [DomainRequest](docs/Model/DomainRequest.md)
- [DomainTransfer](docs/Model/DomainTransfer.md)
- [EditApiKey](docs/Model/EditApiKey.md)
- [Finances](docs/Model/Finances.md)
- [FirewallGroupInAPI](docs/Model/FirewallGroupInAPI.md)
- [FirewallGroupOutAPI](docs/Model/FirewallGroupOutAPI.md)
- [FirewallGroupOutResponse](docs/Model/FirewallGroupOutResponse.md)
- [FirewallGroupResourceOutAPI](docs/Model/FirewallGroupResourceOutAPI.md)
- [FirewallGroupResourceOutResponse](docs/Model/FirewallGroupResourceOutResponse.md)
- [FirewallGroupResourcesOutResponse](docs/Model/FirewallGroupResourcesOutResponse.md)
- [FirewallGroupsOutResponse](docs/Model/FirewallGroupsOutResponse.md)
- [FirewallRuleDirection](docs/Model/FirewallRuleDirection.md)
- [FirewallRuleInAPI](docs/Model/FirewallRuleInAPI.md)
- [FirewallRuleOutAPI](docs/Model/FirewallRuleOutAPI.md)
- [FirewallRuleOutResponse](docs/Model/FirewallRuleOutResponse.md)
- [FirewallRuleProtocol](docs/Model/FirewallRuleProtocol.md)
- [FirewallRulesOutResponse](docs/Model/FirewallRulesOutResponse.md)
- [FloatingIp](docs/Model/FloatingIp.md)
- [ForwardingIncomingIsDisabled](docs/Model/ForwardingIncomingIsDisabled.md)
- [ForwardingIncomingIsEnabled](docs/Model/ForwardingIncomingIsEnabled.md)
- [ForwardingOutgoingIsDisabled](docs/Model/ForwardingOutgoingIsDisabled.md)
- [ForwardingOutgoingIsEnabled](docs/Model/ForwardingOutgoingIsEnabled.md)
- [Frameworks](docs/Model/Frameworks.md)
- [Free](docs/Model/Free.md)
- [GetAccountStatus200Response](docs/Model/GetAccountStatus200Response.md)
- [GetAllProjectResources200Response](docs/Model/GetAllProjectResources200Response.md)
- [GetAppDeploys200Response](docs/Model/GetAppDeploys200Response.md)
- [GetAppLogs200Response](docs/Model/GetAppLogs200Response.md)
- [GetApps200Response](docs/Model/GetApps200Response.md)
- [GetAuthAccessSettings200Response](docs/Model/GetAuthAccessSettings200Response.md)
- [GetAuthAccessSettings200ResponseWhiteList](docs/Model/GetAuthAccessSettings200ResponseWhiteList.md)
- [GetBalancerIPs200Response](docs/Model/GetBalancerIPs200Response.md)
- [GetBalancerRules200Response](docs/Model/GetBalancerRules200Response.md)
- [GetBalancers200Response](docs/Model/GetBalancers200Response.md)
- [GetBalancersPresets200Response](docs/Model/GetBalancersPresets200Response.md)
- [GetBranches200Response](docs/Model/GetBranches200Response.md)
- [GetCommits200Response](docs/Model/GetCommits200Response.md)
- [GetConfigurators200Response](docs/Model/GetConfigurators200Response.md)
- [GetCountries200Response](docs/Model/GetCountries200Response.md)
- [GetDatabaseAutoBackupsSettings200Response](docs/Model/GetDatabaseAutoBackupsSettings200Response.md)
- [GetDatabaseBackups200Response](docs/Model/GetDatabaseBackups200Response.md)
- [GetDatabaseClusterTypes200Response](docs/Model/GetDatabaseClusterTypes200Response.md)
- [GetDatabaseClusters200Response](docs/Model/GetDatabaseClusters200Response.md)
- [GetDatabaseInstances200Response](docs/Model/GetDatabaseInstances200Response.md)
- [GetDatabaseUsers200Response](docs/Model/GetDatabaseUsers200Response.md)
- [GetDatabases200Response](docs/Model/GetDatabases200Response.md)
- [GetDatabasesPresets200Response](docs/Model/GetDatabasesPresets200Response.md)
- [GetDedicatedServerPresetAdditionalServices200Response](docs/Model/GetDedicatedServerPresetAdditionalServices200Response.md)
- [GetDedicatedServers200Response](docs/Model/GetDedicatedServers200Response.md)
- [GetDedicatedServersPresets200Response](docs/Model/GetDedicatedServersPresets200Response.md)
- [GetDeployLogs200Response](docs/Model/GetDeployLogs200Response.md)
- [GetDeploySettings200Response](docs/Model/GetDeploySettings200Response.md)
- [GetDomain200Response](docs/Model/GetDomain200Response.md)
- [GetDomainDNSRecords200Response](docs/Model/GetDomainDNSRecords200Response.md)
- [GetDomainMailInfo200Response](docs/Model/GetDomainMailInfo200Response.md)
- [GetDomainNameServers200Response](docs/Model/GetDomainNameServers200Response.md)
- [GetDomainRequests200Response](docs/Model/GetDomainRequests200Response.md)
- [GetDomains200Response](docs/Model/GetDomains200Response.md)
- [GetFinances200Response](docs/Model/GetFinances200Response.md)
- [GetFinances400Response](docs/Model/GetFinances400Response.md)
- [GetFinances401Response](docs/Model/GetFinances401Response.md)
- [GetFinances403Response](docs/Model/GetFinances403Response.md)
- [GetFinances404Response](docs/Model/GetFinances404Response.md)
- [GetFinances429Response](docs/Model/GetFinances429Response.md)
- [GetFinances500Response](docs/Model/GetFinances500Response.md)
- [GetFloatingIps200Response](docs/Model/GetFloatingIps200Response.md)
- [GetKey200Response](docs/Model/GetKey200Response.md)
- [GetKeys200Response](docs/Model/GetKeys200Response.md)
- [GetLocations200Response](docs/Model/GetLocations200Response.md)
- [GetMailQuota200Response](docs/Model/GetMailQuota200Response.md)
- [GetMailboxes200Response](docs/Model/GetMailboxes200Response.md)
- [GetNotificationSettings200Response](docs/Model/GetNotificationSettings200Response.md)
- [GetOsList200Response](docs/Model/GetOsList200Response.md)
- [GetProjectBalancers200Response](docs/Model/GetProjectBalancers200Response.md)
- [GetProjectClusters200Response](docs/Model/GetProjectClusters200Response.md)
- [GetProjectDatabases200Response](docs/Model/GetProjectDatabases200Response.md)
- [GetProjectDedicatedServers200Response](docs/Model/GetProjectDedicatedServers200Response.md)
- [GetProjectServers200Response](docs/Model/GetProjectServers200Response.md)
- [GetProjectStorages200Response](docs/Model/GetProjectStorages200Response.md)
- [GetProjects200Response](docs/Model/GetProjects200Response.md)
- [GetProviders200Response](docs/Model/GetProviders200Response.md)
- [GetRepositories200Response](docs/Model/GetRepositories200Response.md)
- [GetServerDiskAutoBackupSettings200Response](docs/Model/GetServerDiskAutoBackupSettings200Response.md)
- [GetServerDiskBackup200Response](docs/Model/GetServerDiskBackup200Response.md)
- [GetServerDiskBackups200Response](docs/Model/GetServerDiskBackups200Response.md)
- [GetServerDisks200Response](docs/Model/GetServerDisks200Response.md)
- [GetServerIPs200Response](docs/Model/GetServerIPs200Response.md)
- [GetServerLogs200Response](docs/Model/GetServerLogs200Response.md)
- [GetServerStatistics200Response](docs/Model/GetServerStatistics200Response.md)
- [GetServerStatistics200ResponseCpuInner](docs/Model/GetServerStatistics200ResponseCpuInner.md)
- [GetServerStatistics200ResponseDiskInner](docs/Model/GetServerStatistics200ResponseDiskInner.md)
- [GetServerStatistics200ResponseNetworkTrafficInner](docs/Model/GetServerStatistics200ResponseNetworkTrafficInner.md)
- [GetServerStatistics200ResponseRamInner](docs/Model/GetServerStatistics200ResponseRamInner.md)
- [GetServers200Response](docs/Model/GetServers200Response.md)
- [GetServersPresets200Response](docs/Model/GetServersPresets200Response.md)
- [GetSoftware200Response](docs/Model/GetSoftware200Response.md)
- [GetStorageFilesList200Response](docs/Model/GetStorageFilesList200Response.md)
- [GetStorageSubdomains200Response](docs/Model/GetStorageSubdomains200Response.md)
- [GetStorageTransferStatus200Response](docs/Model/GetStorageTransferStatus200Response.md)
- [GetStorageUsers200Response](docs/Model/GetStorageUsers200Response.md)
- [GetStoragesPresets200Response](docs/Model/GetStoragesPresets200Response.md)
- [GetTLD200Response](docs/Model/GetTLD200Response.md)
- [GetTLDs200Response](docs/Model/GetTLDs200Response.md)
- [GetTokens200Response](docs/Model/GetTokens200Response.md)
- [GetVPCPorts200Response](docs/Model/GetVPCPorts200Response.md)
- [GetVPCServices200Response](docs/Model/GetVPCServices200Response.md)
- [GetVPCs200Response](docs/Model/GetVPCs200Response.md)
- [ImageDownloadAPI](docs/Model/ImageDownloadAPI.md)
- [ImageDownloadResponse](docs/Model/ImageDownloadResponse.md)
- [ImageDownloadsResponse](docs/Model/ImageDownloadsResponse.md)
- [ImageInAPI](docs/Model/ImageInAPI.md)
- [ImageOutAPI](docs/Model/ImageOutAPI.md)
- [ImageOutResponse](docs/Model/ImageOutResponse.md)
- [ImageStatus](docs/Model/ImageStatus.md)
- [ImageUpdateAPI](docs/Model/ImageUpdateAPI.md)
- [ImageUrlAuth](docs/Model/ImageUrlAuth.md)
- [ImageUrlIn](docs/Model/ImageUrlIn.md)
- [ImagesOutResponse](docs/Model/ImagesOutResponse.md)
- [Invoice](docs/Model/Invoice.md)
- [K8SVersionsResponse](docs/Model/K8SVersionsResponse.md)
- [Location](docs/Model/Location.md)
- [LocationDto](docs/Model/LocationDto.md)
- [Mailbox](docs/Model/Mailbox.md)
- [MailboxAutoReply](docs/Model/MailboxAutoReply.md)
- [MailboxForwardingIncoming](docs/Model/MailboxForwardingIncoming.md)
- [MailboxForwardingOutgoing](docs/Model/MailboxForwardingOutgoing.md)
- [MailboxSpamFilter](docs/Model/MailboxSpamFilter.md)
- [MasterPresetOutApi](docs/Model/MasterPresetOutApi.md)
- [Meta](docs/Model/Meta.md)
- [ModelUse](docs/Model/ModelUse.md)
- [Network](docs/Model/Network.md)
- [NetworkDriversResponse](docs/Model/NetworkDriversResponse.md)
- [NodeCount](docs/Model/NodeCount.md)
- [NodeGroupIn](docs/Model/NodeGroupIn.md)
- [NodeGroupOut](docs/Model/NodeGroupOut.md)
- [NodeGroupResponse](docs/Model/NodeGroupResponse.md)
- [NodeGroupsResponse](docs/Model/NodeGroupsResponse.md)
- [NodeOut](docs/Model/NodeOut.md)
- [NodesResponse](docs/Model/NodesResponse.md)
- [NotificationSetting](docs/Model/NotificationSetting.md)
- [NotificationSettingChannel](docs/Model/NotificationSettingChannel.md)
- [NotificationSettingChannels](docs/Model/NotificationSettingChannels.md)
- [NotificationSettingType](docs/Model/NotificationSettingType.md)
- [OS](docs/Model/OS.md)
- [PerformActionOnBackupRequest](docs/Model/PerformActionOnBackupRequest.md)
- [PerformActionOnServerRequest](docs/Model/PerformActionOnServerRequest.md)
- [Policy](docs/Model/Policy.md)
- [PresetsBalancer](docs/Model/PresetsBalancer.md)
- [PresetsDbs](docs/Model/PresetsDbs.md)
- [PresetsResponse](docs/Model/PresetsResponse.md)
- [PresetsStorage](docs/Model/PresetsStorage.md)
- [Project](docs/Model/Project.md)
- [ProjectResource](docs/Model/ProjectResource.md)
- [Provider](docs/Model/Provider.md)
- [Providers](docs/Model/Providers.md)
- [Quota](docs/Model/Quota.md)
- [RefreshApiKey](docs/Model/RefreshApiKey.md)
- [RemoveCountries](docs/Model/RemoveCountries.md)
- [RemoveIps](docs/Model/RemoveIps.md)
- [RenameStorageFileRequest](docs/Model/RenameStorageFileRequest.md)
- [Repository](docs/Model/Repository.md)
- [Resource](docs/Model/Resource.md)
- [ResourceTransfer](docs/Model/ResourceTransfer.md)
- [ResourceType](docs/Model/ResourceType.md)
- [Resources](docs/Model/Resources.md)
- [ResourcesResponse](docs/Model/ResourcesResponse.md)
- [Rule](docs/Model/Rule.md)
- [S3Object](docs/Model/S3Object.md)
- [S3ObjectOwner](docs/Model/S3ObjectOwner.md)
- [S3Subdomain](docs/Model/S3Subdomain.md)
- [SchemasBaseError](docs/Model/SchemasBaseError.md)
- [ServerBackup](docs/Model/ServerBackup.md)
- [ServerDisk](docs/Model/ServerDisk.md)
- [ServerIp](docs/Model/ServerIp.md)
- [ServerLog](docs/Model/ServerLog.md)
- [ServersConfigurator](docs/Model/ServersConfigurator.md)
- [ServersConfiguratorRequirements](docs/Model/ServersConfiguratorRequirements.md)
- [ServersOs](docs/Model/ServersOs.md)
- [ServersOsRequirements](docs/Model/ServersOsRequirements.md)
- [ServersPreset](docs/Model/ServersPreset.md)
- [ServersSoftware](docs/Model/ServersSoftware.md)
- [ServersSoftwareRequirements](docs/Model/ServersSoftwareRequirements.md)
- [SettingCondition](docs/Model/SettingCondition.md)
- [SpamFilterIsDisabled](docs/Model/SpamFilterIsDisabled.md)
- [SpamFilterIsEnabled](docs/Model/SpamFilterIsEnabled.md)
- [SshKey](docs/Model/SshKey.md)
- [SshKeyUsedByInner](docs/Model/SshKeyUsedByInner.md)
- [Status](docs/Model/Status.md)
- [StatusCompanyInfo](docs/Model/StatusCompanyInfo.md)
- [Subdomain](docs/Model/Subdomain.md)
- [TopLevelDomain](docs/Model/TopLevelDomain.md)
- [TopLevelDomainAllowedBuyPeriodsInner](docs/Model/TopLevelDomainAllowedBuyPeriodsInner.md)
- [TransferStatus](docs/Model/TransferStatus.md)
- [TransferStatusErrorsInner](docs/Model/TransferStatusErrorsInner.md)
- [TransferStorageRequest](docs/Model/TransferStorageRequest.md)
- [URLType](docs/Model/URLType.md)
- [UpdateAdmin](docs/Model/UpdateAdmin.md)
- [UpdateAppSettings200Response](docs/Model/UpdateAppSettings200Response.md)
- [UpdateAuthRestrictionsByCountriesRequest](docs/Model/UpdateAuthRestrictionsByCountriesRequest.md)
- [UpdateBalancer](docs/Model/UpdateBalancer.md)
- [UpdateCluster](docs/Model/UpdateCluster.md)
- [UpdateDb](docs/Model/UpdateDb.md)
- [UpdateDedicatedServerRequest](docs/Model/UpdateDedicatedServerRequest.md)
- [UpdateDomain](docs/Model/UpdateDomain.md)
- [UpdateDomainAutoProlongation200Response](docs/Model/UpdateDomainAutoProlongation200Response.md)
- [UpdateDomainMailInfoRequest](docs/Model/UpdateDomainMailInfoRequest.md)
- [UpdateDomainNameServers](docs/Model/UpdateDomainNameServers.md)
- [UpdateDomainNameServersNameServersInner](docs/Model/UpdateDomainNameServersNameServersInner.md)
- [UpdateFloatingIp](docs/Model/UpdateFloatingIp.md)
- [UpdateInstance](docs/Model/UpdateInstance.md)
- [UpdateKeyRequest](docs/Model/UpdateKeyRequest.md)
- [UpdateMailQuotaRequest](docs/Model/UpdateMailQuotaRequest.md)
- [UpdateMailbox](docs/Model/UpdateMailbox.md)
- [UpdateNotificationSettingsRequest](docs/Model/UpdateNotificationSettingsRequest.md)
- [UpdateNotificationSettingsRequestSettingsInner](docs/Model/UpdateNotificationSettingsRequestSettingsInner.md)
- [UpdateNotificationSettingsRequestSettingsInnerChannels](docs/Model/UpdateNotificationSettingsRequestSettingsInnerChannels.md)
- [UpdateProject](docs/Model/UpdateProject.md)
- [UpdateRule](docs/Model/UpdateRule.md)
- [UpdateServer](docs/Model/UpdateServer.md)
- [UpdateServerConfigurator](docs/Model/UpdateServerConfigurator.md)
- [UpdateServerDiskBackupRequest](docs/Model/UpdateServerDiskBackupRequest.md)
- [UpdateServerDiskRequest](docs/Model/UpdateServerDiskRequest.md)
- [UpdateServerIPRequest](docs/Model/UpdateServerIPRequest.md)
- [UpdateServerNATRequest](docs/Model/UpdateServerNATRequest.md)
- [UpdateServerOSBootModeRequest](docs/Model/UpdateServerOSBootModeRequest.md)
- [UpdateStorageRequest](docs/Model/UpdateStorageRequest.md)
- [UpdateStorageUser200Response](docs/Model/UpdateStorageUser200Response.md)
- [UpdateStorageUserRequest](docs/Model/UpdateStorageUserRequest.md)
- [UpdateToken200Response](docs/Model/UpdateToken200Response.md)
- [UpdateVpc](docs/Model/UpdateVpc.md)
- [UpdeteSettings](docs/Model/UpdeteSettings.md)
- [UploadSuccessful](docs/Model/UploadSuccessful.md)
- [UploadSuccessfulResponse](docs/Model/UploadSuccessfulResponse.md)
- [UrlStatus](docs/Model/UrlStatus.md)
- [Vds](docs/Model/Vds.md)
- [VdsDisksInner](docs/Model/VdsDisksInner.md)
- [VdsImage](docs/Model/VdsImage.md)
- [VdsNetworksInner](docs/Model/VdsNetworksInner.md)
- [VdsNetworksInnerIpsInner](docs/Model/VdsNetworksInnerIpsInner.md)
- [VdsOs](docs/Model/VdsOs.md)
- [VdsSoftware](docs/Model/VdsSoftware.md)
- [Vpc](docs/Model/Vpc.md)
- [VpcPort](docs/Model/VpcPort.md)
- [VpcPortService](docs/Model/VpcPortService.md)
- [VpcService](docs/Model/VpcService.md)
- [WorkerPresetOutApi](docs/Model/WorkerPresetOutApi.md)

## Authorization

Authentication schemes defined for the API:
### Bearer

- **Type**: Bearer authentication (JWT)

## Tests

To run the tests, use:

```bash
composer install
vendor/bin/phpunit
```

## Author

info@timeweb.cloud

## About this package

This PHP package is automatically generated by the [OpenAPI Generator](https://openapi-generator.tech) project:

- API version: `1.0.0`
- Build package: `org.openapitools.codegen.languages.PhpClientCodegen`
