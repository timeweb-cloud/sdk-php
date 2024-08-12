# # CreateApp

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**provider_id** | **string** | Уникальный идентификатор провайдера. |
**type** | **string** | Тип приложения. |
**repository_id** | **string** | Уникальный идентификатор репозитория. |
**build_cmd** | **string** | Команда сборки приложения. |
**envs** | **object** | Переменные окружения приложения. Объект с ключами и значениями типа string. | [optional]
**branch_name** | **string** | Название ветки репозитория из которой необходимо собрать приложение. |
**is_auto_deploy** | **bool** | Автоматический деплой. |
**commit_sha** | **string** | Хэш коммита из которого необходимо собрать приложение. |
**name** | **string** | Имя приложения. |
**comment** | **string** | Комментарий к приложения. |
**preset_id** | **float** | Идентификатор тарифа. |
**env_version** | **string** | Версия окружения. | [optional]
**framework** | [**\OpenAPI\Client\Model\Frameworks**](Frameworks.md) |  |
**index_dir** | **string** | Директория с индексным файлом. Обязателен для приложений &#x60;type: frontend&#x60;. Не используется для приложений &#x60;type: backend&#x60;. Должно начинаться с &#x60;/&#x60;. | [optional]
**run_cmd** | **string** | Команда для запуска приложения. Обязателен для приложений &#x60;type: backend&#x60;. Не используется для приложений &#x60;type: frontend&#x60;. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
