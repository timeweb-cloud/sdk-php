# # Vds

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **float** | ID для каждого экземпляра сервера. Автоматически генерируется при создании. |
**name** | **string** | Удобочитаемое имя, установленное для сервера. |
**comment** | **string** | Комментарий к серверу. |
**created_at** | **string** | Дата создания сервера в формате ISO8061. |
**os** | [**\OpenAPI\Client\Model\VdsOs**](VdsOs.md) |  |
**software** | [**\OpenAPI\Client\Model\VdsSoftware**](VdsSoftware.md) |  |
**preset_id** | **float** | ID тарифа сервера. |
**location** | **string** | Локация сервера. |
**configurator_id** | **float** | ID конфигуратора сервера. |
**boot_mode** | **string** | Режим загрузки ОС сервера. |
**status** | **string** | Статус сервера. |
**start_at** | **\DateTime** | Значение времени, указанное в комбинированном формате даты и времени ISO8601, которое представляет, когда был запущен сервер. |
**is_ddos_guard** | **bool** | Это логическое значение, которое показывает, включена ли защита от DDoS у данного сервера. |
**is_master_ssh** | **bool** | Это логическое значение, которое показывает, доступно ли подключение по SSH для поддержки. |
**is_dedicated_cpu** | **bool** | Это логическое значение, которое показывает, является ли CPU выделенным. |
**gpu** | **float** | Количество видеокарт сервера. |
**cpu** | **float** | Количество ядер процессора сервера. |
**cpu_frequency** | **string** | Частота ядер процессора сервера. |
**ram** | **float** | Размер (в Мб) ОЗУ сервера. |
**disks** | [**\OpenAPI\Client\Model\VdsDisksInner[]**](VdsDisksInner.md) | Список дисков сервера. |
**avatar_id** | **string** | ID аватара сервера. Описание методов работы с аватарами появится позднее. |
**vnc_pass** | **string** | Пароль от VNC. |
**root_pass** | **string** | Пароль root сервера или пароль Администратора для серверов Windows. |
**image** | [**\OpenAPI\Client\Model\VdsImage**](VdsImage.md) |  |
**networks** | [**\OpenAPI\Client\Model\VdsNetworksInner[]**](VdsNetworksInner.md) | Список сетей сервера. |
**cloud_init** | **string** | Cloud-init скрипт. |
**is_qemu_agent** | **bool** | Это логическое значение, которое показывает, включен ли QEMU-agent на сервере. |
**availability_zone** | [**\OpenAPI\Client\Model\AvailabilityZone**](AvailabilityZone.md) |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
