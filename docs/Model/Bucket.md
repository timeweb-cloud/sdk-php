# # Bucket

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **float** | ID для каждого экземпляра хранилища. Автоматически генерируется при создании. |
**name** | **string** | Удобочитаемое имя, установленное для хранилища. |
**description** | **string** | Комментарий к хранилищу. | [optional]
**disk_stats** | [**\OpenAPI\Client\Model\BucketDiskStats**](BucketDiskStats.md) |  |
**type** | **string** | Тип хранилища. |
**preset_id** | **float** | ID тарифа хранилища. |
**configurator_id** | **float** | ID конфигуратора хранилища. |
**avatar_link** | **string** | Ссылка на аватар хранилища. |
**status** | **string** | Статус хранилища. |
**object_amount** | **float** | Количество файлов в хранилище. |
**location** | **string** | Регион хранилища. |
**hostname** | **string** | Адрес хранилища для подключения. |
**access_key** | **string** | Ключ доступа от хранилища. |
**secret_key** | **string** | Секретный ключ доступа от хранилища. |
**moved_in_quarantine_at** | **\DateTime** | Дата перемещения в карантин. |
**storage_class** | **string** | Класс хранилища. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
