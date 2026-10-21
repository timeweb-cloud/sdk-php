# # CreateSkill

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | Название навыка, уникальное в аккаунте |
**when_to_use** | **string** | Когда применять навык. Описывайте ситуации и формулировки клиента. Если текст короче 40 символов, придёт предупреждение &#x60;when_to_use_too_short&#x60; |
**instruction** | **string** | Инструкция навыка |
**scripts** | [**\OpenAPI\Client\Model\SkillScriptInput[]**](SkillScriptInput.md) | Скрипты навыка: до 20 файлов общим размером до 10 МБ | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
