# # Org

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**type** | **string** | Тип администратора. |
**name** | **string** | Название организации. |
**is_resident** | **bool** | Это логическое значение, которое показывает, является ли администратор резидентом РФ. |
**contact_name** | **string** | Контактное лицо организации. |
**inn** | **string** | ИНН организации. |
**kpp** | **string** | КПП организации. | [optional]
**legal_address** | **string** | Юридический адрес организации. |
**postcode** | **string** | Почтовый индекс. |
**mailing_address** | **string** | Почтовый адрес. |
**phone** | **string** | Контактный телефон. |
**email** | **string** | Адрес электронной почты. |
**country_code** | **string** | Код страны. Только для нерезидентов РФ (&#x60;is_resident: false&#x60;); для резидентов поле передавать не нужно. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
