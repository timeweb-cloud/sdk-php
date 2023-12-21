# # Db

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **float** | Уникальный идентификатор для каждого экземпляра базы данных. Автоматически генерируется при создании. |
**created_at** | **string** | Значение времени, указанное в комбинированном формате даты и времени ISO8601, которое представляет, когда была создана база данных. |
**account_id** | **string** | Идентификатор пользователя. |
**login** | **string** | Логин для подключения к базе данных. |
**location** | **string** | Локация сервера. | [optional]
**password** | **string** | Пароль для подключения к базе данных. |
**name** | **string** | Название базы данных. |
**host** | **string** | Хост. |
**type** | [**\OpenAPI\Client\Model\DbType**](DbType.md) |  |
**hash_type** | **string** | Тип хеширования базы данных (mysql5 | mysql | postgres). |
**port** | **int** | Порт |
**ip** | **string** | IP-адрес сетевого интерфейса IPv4. |
**local_ip** | **string** | IP-адрес локального сетевого интерфейса IPv4. |
**status** | **string** | Текущий статус базы данных. |
**preset_id** | **int** | Идентификатор тарифа. |
**disk_stats** | [**\OpenAPI\Client\Model\DbDiskStats**](DbDiskStats.md) |  |
**config_parameters** | [**\OpenAPI\Client\Model\ConfigParameters**](ConfigParameters.md) |  |
**is_only_local_ip_access** | **bool** | Это логическое значение, которое показывает, доступна ли база данных только по локальному IP адресу. |
**availability_zone** | [**\OpenAPI\Client\Model\AvailabilityZone**](AvailabilityZone.md) |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
