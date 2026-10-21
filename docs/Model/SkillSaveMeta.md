# # SkillSaveMeta

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**version_created** | **bool** | Создана ли новая версия. &#x60;false&#x60; — изменился только заголовок или изменений не было |
**affected_agents_count** | **int** | У скольких агентов навык включён. Их поведение не меняется, пока их не переведут на новую версию |
**warnings** | **string[]** | Предупреждения, которые не мешают сохранению. &#x60;when_to_use_too_short&#x60; — текст «когда применять» короче 40 символов: модель не сможет отличить подходящий запрос от постороннего |
**pruned_versions** | **int[]** | Номера версий, удалённых из истории из-за лимита в 50 версий |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
