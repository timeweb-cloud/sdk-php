# # App

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **float** | Уникальный идентификатор для каждого экземпляра приложения. Автоматически генерируется при создании. |
**type** | **string** | Тип приложения. |
**name** | **string** | Удобочитаемое имя, установленное для приложения. |
**status** | **string** | Статус приложения. |
**provider** | [**\OpenAPI\Client\Model\AppProvider**](AppProvider.md) |  |
**ip** | **string** | IPv4-адрес приложения. |
**domains** | [**\OpenAPI\Client\Model\AppDomainsInner[]**](AppDomainsInner.md) |  |
**framework** | [**\OpenAPI\Client\Model\Frameworks**](Frameworks.md) |  |
**location** | **string** | Локация сервера. |
**repository** | [**\OpenAPI\Client\Model\Repository**](Repository.md) |  |
**env_version** | **string** | Версия окружения. |
**envs** | **object** | Переменные окружения приложения. Объект с ключами и значениями типа string. |
**branch_name** | **string** | Название ветки репозитория из которой собрано приложение. |
**is_auto_deploy** | **bool** | Включен ли автоматический деплой. |
**commit_sha** | **string** | Хэш коммита из которого собрано приложеие. |
**comment** | **string** | Комментарий к приложению. |
**preset_id** | **float** | Идентификатор тарифа. |
**index_dir** | **string** | Путь к директории с индексным файлом. Определен для приложений &#x60;type: frontend&#x60;. Для приложений &#x60;type: backend&#x60; всегда null. |
**build_cmd** | **string** | Команда сборки приложения. |
**run_cmd** | **string** | Команда для запуска приложения. Определена для приложений &#x60;type: backend&#x60;. Для приложений &#x60;type: frontend&#x60; всегда null. |
**configuration** | [**\OpenAPI\Client\Model\AppConfiguration**](AppConfiguration.md) |  |
**disk_status** | [**\OpenAPI\Client\Model\AppDiskStatus**](AppDiskStatus.md) |  |
**is_qemu_agent** | **bool** | Включен ли агент QEMU. |
**language** | **string** | Язык программирования приложения. |
**start_time** | **\DateTime** | Время запуска приложения. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
