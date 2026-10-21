# # UpdateSkill

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | Название навыка. Изменение названия не создаёт новую версию | [optional]
**when_to_use** | **string** | Когда применять навык | [optional]
**instruction** | **string** | Инструкция навыка | [optional]
**scripts** | [**\OpenAPI\Client\Model\SkillScriptInput[]**](SkillScriptInput.md) | Новый набор скриптов, заменяет прежний целиком. Пустой массив удаляет все скрипты. Если поле не передано, скрипты не меняются | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
