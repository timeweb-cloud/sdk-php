# # DatabaseAdmin

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **float** | ID для каждого экземпляра пользователя базы данных. Автоматически генерируется при создании. |
**created_at** | **string** | Значение времени, указанное в комбинированном формате даты и времени ISO8601, которое представляет, когда была создана база данных. |
**login** | **string** | Имя пользователя базы данных |
**password** | **string** | Пароль пользователя базы данных |
**description** | **string** | Описание пользователя базы данных |
**host** | **string** | Хост пользователя |
**instances** | [**\OpenAPI\Client\Model\DatabaseAdminInstancesInner[]**](DatabaseAdminInstancesInner.md) |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
