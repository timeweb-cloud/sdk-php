# # DatabaseCluster

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **float** | ID для каждого экземпляра базы данных. Автоматически генерируется при создании. |
**created_at** | **string** | Значение времени, указанное в комбинированном формате даты и времени ISO8601, которое представляет, когда была создана база данных. |
**location** | **string** | Локация сервера. |
**name** | **string** | Название кластера базы данных. |
**description** | **string** | Описание кластера базы данных. |
**networks** | [**\OpenAPI\Client\Model\DatabaseClusterNetworksInner[]**](DatabaseClusterNetworksInner.md) | Список сетей кластера базы данных. |
**is_enabled_public_ipv6** | **bool** | Использование публичного IPv6-адреса. |
**type** | **string** | Тип базы данных. Список возможных значений шире, чем список типов, доступных при создании нового кластера. |
**hash_type** | **string** | Тип хеширования кластера базы данных (mysql5 | mysql | postgres). |
**avatar_link** | **string** | Ссылка на аватар для базы данных. |
**port** | **int** | Порт |
**status** | **string** | Текущий статус кластера базы данных. Значение &#x60;read_only&#x60; означает, что запись в кластер заблокирована из-за переполнения диска — чтобы снять блокировку, освободите место или увеличьте размер диска. |
**preset_id** | **int** | ID тарифа. Равен &#x60;null&#x60; у кластеров, созданных через конфигуратор — в этом случае заполнен &#x60;configurator_id&#x60;. |
**configurator_id** | **int** | ID конфигуратора. Равен &#x60;null&#x60; у кластеров, созданных по тарифу. |
**cpu** | **int** | Количество ядер процессора. |
**cpu_frequency** | **string** | Частота процессора. |
**is_dedicated_cpu** | **bool** | Используются ли выделенные ядра процессора. |
**ram** | **int** | Объем оперативной памяти (в Мб). |
**disk** | [**\OpenAPI\Client\Model\DatabaseClusterDisk**](DatabaseClusterDisk.md) |  |
**has_additional_disk** | **bool** | Подключен ли к кластеру дополнительный диск. |
**disk_autoscaling** | [**\OpenAPI\Client\Model\DatabaseClusterDiskAutoscaling**](DatabaseClusterDiskAutoscaling.md) |  |
**config_parameters** | [**\OpenAPI\Client\Model\Mysql**](Mysql.md) |  |
**is_enabled_public_network** | **bool** | Доступность публичного IP-адреса |
**is_secure_connection_enabled** | **bool** | Включено ли защищенное подключение к кластеру базы данных. |
**is_autobackups_enabled** | **bool** | Включены ли автоматические резервные копии кластера базы данных. |
**is_backup_schedule_enabled** | **bool** | Включено ли расписание резервного копирования кластера базы данных. |
**availability_zone** | [**\OpenAPI\Client\Model\AvailabilityZone**](AvailabilityZone.md) |  |
**project_id** | **int** | ID проекта, в котором находится кластер базы данных. | [optional]
**replica_list** | [**\OpenAPI\Client\Model\DatabaseClusterReplicaListInner[]**](DatabaseClusterReplicaListInner.md) | Список реплик кластера базы данных. |
**domains** | [**\OpenAPI\Client\Model\DatabaseClusterDomainsInner[]**](DatabaseClusterDomainsInner.md) | Список доменов кластера базы данных. Если публичная сеть отключена (&#x60;is_enabled_public_network: false&#x60;), список всегда пустой. |
**child_services** | [**\OpenAPI\Client\Model\DatabaseClusterChildServicesInner[]**](DatabaseClusterChildServicesInner.md) | Список дочерних сервисов кластера базы данных. |
**parent_services** | [**\OpenAPI\Client\Model\DatabaseClusterParentServicesInner[]**](DatabaseClusterParentServicesInner.md) | Список родительских сервисов кластера базы данных. |
**maintenance_slot** | [**\OpenAPI\Client\Model\DatabaseClusterMaintenanceSlot**](DatabaseClusterMaintenanceSlot.md) |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
