# # InstallTool

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**template_id** | **int** | ID шаблона маркетплейса |
**name** | **string** | Своё название инструмента. Если не задано, используется название шаблона | [optional]
**description** | **string** | Своё описание инструмента. Если не задано, используется описание шаблона | [optional]
**config_values** | **array<string,string>** | Значения полей из &#x60;config_schema&#x60; шаблона: ключ — &#x60;fields[].key&#x60;, значение — строка. Поля с &#x60;required: true&#x60; обязательны | [optional]
**auth_data** | [**\OpenAPI\Client\Model\ToolAuthData**](ToolAuthData.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
