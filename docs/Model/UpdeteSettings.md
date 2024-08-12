# # UpdeteSettings

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**is_auto_deploy** | **bool** | Автоматический деплой. | [optional]
**build_cmd** | **string** | Команда сборки приложения. | [optional]
**envs** | **object** | Переменные окружения приложения. Объект с ключами и значениями типа string. | [optional]
**branch_name** | **string** | Название ветки репозитория из которой необходимо собрать приложение. | [optional]
**commit_sha** | **string** | Хэш коммита. | [optional]
**env_version** | **string** | Версия окружения. | [optional]
**index_dir** | **string** | Директория с индексным файлом. Обязателен для приложений &#x60;type: frontend&#x60;. Не используется для приложений &#x60;type: backend&#x60;. | [optional]
**run_cmd** | **string** | Команда для запуска приложения. Обязателен для приложений &#x60;type: backend&#x60;. Не используется для приложений &#x60;type: frontend&#x60;. | [optional]
**framework** | [**\OpenAPI\Client\Model\Frameworks**](Frameworks.md) |  | [optional]
**name** | **string** | Имя приложения. | [optional]
**comment** | **string** | Комментарий к приложения. | [optional]
**preset_id** | **float** | Идентификатор тарифа. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
