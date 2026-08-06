# # ConfigDelivery

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**http3** | **bool** | Раздавать контент по HTTP/3 (QUIC). | [optional]
**gzip** | **bool** | Сжимать ответы алгоритмом gzip. | [optional]
**large_files** | **bool** | Режим раздачи больших файлов. | [optional]
**slice_size** | **int** | Размер слайса в мегабайтах — файл забирается с источника и кэшируется частями такого размера. &#x60;null&#x60; — не использовать слайсинг. | [optional]
**image_optimization** | **bool** | Оптимизировать изображения на лету. | [optional]
**packaging** | [**\OpenAPI\Client\Model\ConfigDeliveryPackaging**](ConfigDeliveryPackaging.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
