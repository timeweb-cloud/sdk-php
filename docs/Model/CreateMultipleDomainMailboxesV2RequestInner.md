# # CreateMultipleDomainMailboxesV2RequestInner

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**login** | **string** | Название почтового ящика |
**password** | **string** | Пароль почтового ящика |
**owner_full_name** | **string** | ФИО владельца почтового ящика | [optional]
**comment** | **string** | Комментарий почтового ящика | [optional]
**filter_status** | **bool** | Статус фильтрации почты | [optional]
**filter_action** | **string** | Что делать с письмами, которые попадают в спам. \\  Параметры: \\  &#x60;directory&#x60; - переместить в папку спам; \\  &#x60;label&#x60; - пометить письмо; \\  Если передан параметр &#x60;filter_status&#x60;: &#x60;false&#x60;, то значение передавать нельзя | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
