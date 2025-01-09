# # ClusterIn

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | Название кластера |
**description** | **string** | Описание кластера | [optional]
**k8s_version** | **string** | Версия Kubernetes |
**availability_zone** | **string** | Зона доступности | [optional]
**network_driver** | **string** | Тип используемого сетевого драйвера в кластере |
**is_ingress** | **bool** | Логическое значение, которое показывает, использовать ли Ingress в кластере | [optional]
**is_k8s_dashboard** | **bool** | Логическое значение, которое показывает, использовать ли Kubernetes Dashboard в кластере | [optional]
**preset_id** | **int** | ID тарифа мастер-ноды |
**worker_groups** | [**\OpenAPI\Client\Model\NodeGroupIn[]**](NodeGroupIn.md) | Группы воркеров в кластере | [optional]
**network_id** | **string** | ID приватной сети | [optional]
**project_id** | **int** | ID проекта | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
