# # AppV2

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | ID для каждого экземпляра приложения. Автоматически генерируется при создании. |
**type** | **string** | Тип приложения. |
**name** | **string** | Удобочитаемое имя, установленное для приложения. |
**status** | **string** | Текущее состояние приложения. После принятия запроса на создание — new. Ответ 201 не означает завершение развёртывания. |
**provider** | [**\OpenAPI\Client\Model\AppV2Provider**](AppV2Provider.md) |  |
**ip** | **string** | Публичный IPv4-адрес. Отсутствует, пока сервер и IP-адрес не созданы. | [optional]
**domains** | [**\OpenAPI\Client\Model\AppV2DomainsInner[]**](AppV2DomainsInner.md) | Домены приложения. В начальном ответе на создание массив пуст. |
**framework** | **string** | Фреймворк приложения. Поле может отсутствовать до создания инфраструктуры. | [optional]
**location** | **string** | Локация сервера. Может отсутствовать до создания сервера. | [optional]
**repository** | [**\OpenAPI\Client\Model\Repository**](Repository.md) |  | [optional]
**env_version** | **string** | Версия окружения. Поле может отсутствовать до создания инфраструктуры. | [optional]
**envs** | **array<string,string>** | Переменные окружения приложения. Объект с ключами и значениями типа string. Поле может отсутствовать до создания инфраструктуры. | [optional]
**is_auto_deploy** | **bool** | Включен ли автоматический деплой. |
**commit_sha** | **string** | Хэш коммита, из которого собрано приложение. | [optional]
**comment** | **string** | Комментарий к приложению. | [optional]
**preset_id** | **float** | ID тарифа приложения; 0 при использовании конфигуратора. |
**index_dir** | **string** | Каталог со статическими файлами frontend-приложения. До создания инфраструктуры поле отсутствует. Для backend — null. | [optional]
**build_cmd** | **string** | Команда сборки приложения. Поле может отсутствовать до создания инфраструктуры. | [optional]
**avatar_link** | **string** | Ссылка на аватар приложения. |
**run_cmd** | **string** | Команда запуска backend-приложения. До создания инфраструктуры поле отсутствует. Для frontend — null. | [optional]
**configuration** | [**\OpenAPI\Client\Model\AppV2Configuration**](AppV2Configuration.md) |  | [optional]
**disk_status** | [**\OpenAPI\Client\Model\AppV2DiskStatus**](AppV2DiskStatus.md) |  | [optional]
**is_qemu_agent** | **bool** | Включён ли агент QEMU. Для frontend — null. Для backend поле отсутствует до создания сервера. | [optional]
**language** | **string** | Язык или способ развёртывания. Может отсутствовать до создания инфраструктуры. Поле может отсутствовать до создания инфраструктуры. | [optional]
**start_time** | **\DateTime** | Время последнего изменения записи приложения. |
**branch** | **string** | Ветка Git-репозитория. В ответе v2 поле называется branch. | [optional]
**configurator_id** | **int** | ID конфигуратора приложения; null при использовании готового тарифа. |
**project_id** | **int** | ID проекта приложения. Может отсутствовать, если проект не задан. | [optional]
**system_dependencies** | **string[]** | Системные пакеты приложения. Поле отсутствует, если зависимости не заданы. | [optional]
**created_at** | **\DateTime** | Время создания записи приложения. |
**availability_zone** | **string** | Зона доступности сервера. Может быть null или отсутствовать до создания сервера. | [optional]
**requests_limit** | **int** | Ограничение количества запросов; null, если индивидуальный лимит не задан. |
**build_entry_path** | **string** | Каталог приложения в Git-репозитории, относительно которого выполняется сборка. Может отсутствовать до создания инфраструктуры. | [optional]
**health_check** | **string** | HTTP-путь для проверки работоспособности backend-приложения. Может отсутствовать до создания инфраструктуры. | [optional]
**docker_image** | **string** | Имя готового Docker-образа без тега. Присутствует для backend из готового Docker-образа. | [optional]
**docker_image_tag** | **string** | Тег готового Docker-образа. Присутствует для backend из готового Docker-образа. | [optional]
**is_russian_trusted_ca** | **bool** | Добавлены ли доверенные корневые сертификаты Минцифры в окружение backend-приложения. Поле возвращается в российском регионе после создания инфраструктуры. | [optional]
**is_tci_trusted_ca** | **bool** | Добавлены ли доверенные корневые сертификаты ТЦИ в окружение backend-приложения. Поле возвращается в российском регионе после создания инфраструктуры. | [optional]
**blocked_ports** | **int[]** | Заблокированные порты backend-приложения. Поле может отсутствовать до создания сервера. | [optional]
**reverse_proxy** | **object** | Настройки обратного прокси. В начальном ответе на создание — null. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
