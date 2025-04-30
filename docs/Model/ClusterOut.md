# # ClusterOut

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | ID кластера |
**name** | **string** | Название |
**created_at** | **\DateTime** | Дата и время создания кластера в формате ISO8601 |
**status** | **string** | Статус |
**description** | **string** | Описание |
**k8s_version** | **string** | Версия Kubernetes |
**network_driver** | **string** | Используемый сетевой драйвер |
**avatar_link** | **string** | Ссылка на аватар кластера. |
**ingress** | **bool** | Логическое значение, показывающее, включен ли Ingress |
**preset_id** | **int** | ID тарифа мастер-ноды |
**cpu** | **int** | Общее количество ядер | [optional] [default to 0]
**ram** | **int** | Общее количество памяти | [optional] [default to 0]
**disk** | **int** | Общее дисковое пространство | [optional] [default to 0]
**availability_zone** | **string** | Зона доступности | [optional]
**project_id** | **int** | ID проекта | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
