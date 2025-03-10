# # DedicatedServer

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **float** | ID для каждого экземпляра выделенного сервера. Автоматически генерируется при создании. |
**cpu_description** | **string** | Описание параметров процессора выделенного сервера. |
**hdd_description** | **string** | Описание параметров жёсткого диска выделенного сервера. |
**ram_description** | **string** | Описание ОЗУ выделенного сервера. |
**created_at** | **\DateTime** | Значение времени, указанное в комбинированном формате даты и времени ISO8601, которое представляет, когда был создан выделенный сервер. |
**ip** | **string** | IP-адрес сетевого интерфейса IPv4. |
**ipmi_ip** | **string** | IP-адрес сетевого интерфейса IPMI. |
**ipmi_login** | **string** | Логин, используемый для входа в IPMI-консоль. |
**ipmi_password** | **string** | Пароль, используемый для входа в IPMI-консоль. |
**ipv6** | **string** | IP-адрес сетевого интерфейса IPv6. |
**node_id** | **float** | Внутренний дополнительный ID сервера. |
**name** | **string** | Удобочитаемое имя, установленное для выделенного сервера. |
**comment** | **string** | Комментарий к выделенному серверу. |
**vnc_pass** | **string** | Пароль для подключения к VNC-консоли выделенного сервера. |
**status** | **string** | Строка состояния, указывающая состояние выделенного сервера. Может быть «installing», «installed», «on» или «off». |
**os_id** | **float** | ID операционной системы, установленной на выделенный сервер. |
**cp_id** | **float** | ID панели управления, установленной на выделенный сервер. |
**bandwidth_id** | **float** | ID интернет-канала, установленного на выделенный сервер. |
**network_drive_id** | **float[]** | Массив уникальных ID сетевых дисков, подключенных к выделенному серверу. |
**additional_ip_addr_id** | **float[]** | Массив уникальных ID дополнительных IP-адресов, подключенных к выделенному серверу. |
**plan_id** | **float** | ID списка дополнительных услуг выделенного сервера. |
**price** | **float** | Стоимость выделенного сервера. |
**location** | **string** | Локация сервера. |
**autoinstall_ready** | **float** | Количество готовых к автоматической выдаче серверов. Если значение равно 0, сервер будет установлен через инженеров. |
**password** | **string** | Пароль root сервера или пароль Администратора для серверов Windows. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
