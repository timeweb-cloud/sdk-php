# # CreateAppV2

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**provider_id** | **string** | ID провайдера. Обязателен при создании из Git-репозитория. Не требуется для готового Docker-образа. | [optional]
**type** | **string** | Тип приложения: frontend — статический сайт, backend — серверное приложение или Docker-образ. |
**repository_id** | **string** | ID репозитория. Обязателен при создании из Git-репозитория. Не требуется для готового Docker-образа. | [optional]
**build_cmd** | **string** | Команда сборки приложения из Git-репозитория. Обязательна для Git; можно передать пустую строку, если сборка не нужна. | [optional]
**envs** | **array<string,string>** | Переменные окружения приложения. Ключи и значения — строки. Длина ключа — не более 255 символов, значения — не более 10240. По умолчанию пустой объект. | [optional]
**branch_name** | **string** | Ветка Git-репозитория, из которой необходимо собрать приложение. Обязательна при создании из Git. | [optional]
**is_auto_deploy** | **bool** | Автоматически запускать деплой при изменении Git-репозитория. Поле обязательно при создании из Git. Для провайдера git и готового Docker-образа автодеплой выключен. | [optional]
**commit_sha** | **string** | Хэш коммита для первого деплоя. Обязателен при создании из Git. | [optional]
**name** | **string** | Имя приложения, от 1 до 255 символов. Допустимы латинские и русские буквы, цифры, пробелы и символы - . ( ) , &amp; # [ ] _. |
**comment** | **string** | Комментарий к приложению. Обязательное поле; можно передать пустую строку. Допустимы те же символы, что и в имени приложения. |
**preset_id** | **int** | ID тарифа приложения. Обязателен для frontend. Для backend передайте либо preset_id, либо configuration. Нельзя передавать вместе с configuration. Доступные тарифы: GET /api/v1/presets/apps. | [optional]
**env_version** | **string** | Версия окружения для сборки и запуска, например версия Node.js. Можно передать null. | [optional]
**framework** | **string** | Фреймворк приложения, строка с учётом регистра. Обязателен при создании из Git. Для frontend: &#x60;angular&#x60;, &#x60;astro&#x60;, &#x60;ember&#x60;, &#x60;next.js&#x60;, &#x60;nuxt&#x60;, &#x60;preact&#x60;, &#x60;react&#x60;, &#x60;remix&#x60;, &#x60;solid&#x60;, &#x60;solid-start&#x60;, &#x60;svelte&#x60;, &#x60;sveltekit&#x60;, &#x60;tanstack-start&#x60;, &#x60;vue&#x60;, &#x60;static-nobuild&#x60;, &#x60;another&#x60;. Для backend: &#x60;django&#x60;, &#x60;express&#x60;, &#x60;phoenix&#x60;, &#x60;Spring&#x60;, &#x60;laravel&#x60;, &#x60;beego&#x60;, &#x60;fastapi&#x60;, &#x60;ASP.NET Core&#x60;, &#x60;hapi&#x60;, &#x60;celery&#x60;, &#x60;flask&#x60;, &#x60;gin&#x60;, &#x60;docker&#x60;, &#x60;docker-compose&#x60;, &#x60;fastify&#x60;, &#x60;nest&#x60;, &#x60;symfony&#x60;, &#x60;yii&#x60;, &#x60;next.js&#x60;, &#x60;nuxt&#x60;, &#x60;astro&#x60;, &#x60;tanstack-start&#x60;, &#x60;solid-start&#x60;, &#x60;ktor&#x60;, &#x60;axum&#x60;, &#x60;actix&#x60;, &#x60;tornado&#x60;, &#x60;aiohttp&#x60;, &#x60;fiber&#x60;, &#x60;echo&#x60;, &#x60;Micronaut&#x60;, &#x60;Quarkus&#x60;, &#x60;remix&#x60;, &#x60;sveltekit&#x60;. Для готового Docker-образа не требуется. | [optional]
**index_dir** | **string** | Путь к каталогу с собранными статическими файлами, например /dist. Обязателен для frontend. Не используется для backend. | [optional]
**run_cmd** | **string** | Команда запуска backend-приложения из Git. Обязательна для backend из Git. Не требуется для готового Docker-образа и frontend. | [optional]
**system_dependencies** | **string[]** | Системные пакеты для установки в окружение приложения. Допустимы строчные латинские буквы, цифры и символы . + - &#x3D;. По умолчанию пустой массив. | [optional]
**project_id** | **int** | ID проекта, в который необходимо добавить приложение. Проект должен принадлежать аккаунту. | [optional]
**configuration** | [**\OpenAPI\Client\Model\CreateAppV2Configuration**](CreateAppV2Configuration.md) |  | [optional]
**language** | **string** | Язык или способ развёртывания. Обязателен в v2. Для frontend: &#x60;javascript&#x60;. Для backend: &#x60;node&#x60;, &#x60;elixir&#x60;, &#x60;go&#x60;, &#x60;php&#x60;, &#x60;python&#x60;, &#x60;ruby&#x60;, &#x60;docker&#x60;, &#x60;docker-compose&#x60;, &#x60;dotnet&#x60;, &#x60;java&#x60;, &#x60;kotlin&#x60;, &#x60;rust&#x60;, &#x60;bun&#x60;, &#x60;deno&#x60;, &#x60;custom-image&#x60;. Для SSR-приложений из Git используйте node, для готового Docker-образа — custom-image. |
**build_entry_path** | **string** | Каталог приложения в Git-репозитории, относительно которого выполняется сборка. Непустой путь начинается с /, не содержит .. или двойной начальный /. Допустимы латинские буквы, цифры, . - _ /. Можно передать пустую строку. | [optional]
**network** | [**\OpenAPI\Client\Model\CreateAppV2Network**](CreateAppV2Network.md) |  | [optional]
**health_check** | **string** | HTTP-путь для проверки работоспособности backend-приложения. | [optional]
**global_env_ids** | **float[]** | ID глобальных переменных окружения аккаунта, которые необходимо связать с приложением. | [optional]
**docker_image** | **string** | Имя готового Docker-образа для backend, без тега. Передавайте вместе с docker_image_tag. При указании обоих полей Git-параметры не требуются. | [optional]
**docker_image_tag** | **string** | Тег готового Docker-образа. Передавайте вместе с docker_image. | [optional]
**is_russian_trusted_ca** | **bool** | Добавить доверенные корневые сертификаты Минцифры в окружение backend-приложения. Применяется в российском регионе. | [optional] [default to false]
**is_tci_trusted_ca** | **bool** | Добавить доверенные корневые сертификаты ТЦИ в окружение backend-приложения. Применяется в российском регионе. | [optional] [default to false]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
