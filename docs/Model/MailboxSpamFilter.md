# # MailboxSpamFilter

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**is_enabled** | **bool** | Включен ли спам-фильтр |
**action** | **string** | Что делать с письмами, которые попадают в спам. \\  Параметры: \\  &#x60;move_to_directory&#x60; - переместить в паку спам; \\  &#x60;forward&#x60; - переслать письмо на другой адрес; \\  &#x60;delete&#x60; - удалить письмо; \\  &#x60;tag&#x60; - пометить письмо; |
**forward_to** | **string** | Адрес для пересылки при выбранном действии &#x60;forward&#x60; из параметра &#x60;action&#x60; |
**white_list** | **string[]** | Белый список адресов от которых письма не будут попадать в спам |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
