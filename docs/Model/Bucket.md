# # Bucket

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **float** | Уникальный идентификатор для каждого экземпляра хранилища. Автоматически генерируется при создании. |
**name** | **string** | Удобочитаемое имя, установленное для хранилища. |
**disk_stats** | [**\OpenAPI\Client\Model\BucketDiskStats**](BucketDiskStats.md) |  |
**type** | **string** | Тип хранилища. |
**preset_id** | **float** | Идентификатор тарифа хранилища. |
**status** | **string** | Статус хранилища. |
**object_amount** | **float** | Количество файлов в хранилище. |
**location** | **string** | Регион хранилища. |
**hostname** | **string** | Адрес хранилища для подключения. |
**access_key** | **string** | Ключ доступа от хранилища. |
**secret_key** | **string** | Секретный ключ доступа от хранилища. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
