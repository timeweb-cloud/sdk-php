# # S3Object

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**key** | **string** | Название файла или папки. | [optional]
**last_modified** | **\DateTime** | Значение времени, указанное в комбинированном формате даты и времени ISO8601, которое представляет, когда была сделана последняя модификация файла или папки. | [optional]
**etag** | **string** | Тег. | [optional]
**size** | **int** | Размер (в байтах) файла или папки. | [optional]
**storage_class** | **string** | Класс хранилища. | [optional]
**checksum_algorithm** | **string[]** | Алгоритм | [optional]
**owner** | [**\OpenAPI\Client\Model\S3ObjectOwner**](S3ObjectOwner.md) |  | [optional]
**type** | **string** | Тип (файл или папка). |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
