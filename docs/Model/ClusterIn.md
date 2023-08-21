# # ClusterIn

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | Название кластера |
**description** | **string** | Описание кластера | [optional] [default to '']
**ha** | **bool** | Описание появится позднее |
**k8s_version** | **string** | Версия Kubernetes |
**network_driver** | **string** | Тип используемого сетевого драйвера в кластере |
**ingress** | **bool** | Логическое значение, которое показывает, использовать ли Ingress в кластере |
**preset_id** | **int** | Идентификатор тарифа мастер-ноды |
**worker_groups** | [**\OpenAPI\Client\Model\NodeGroupIn[]**](NodeGroupIn.md) | Группы воркеров в кластере | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
