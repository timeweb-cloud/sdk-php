# # Skill

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | ID навыка |
**name** | **string** | Название навыка, уникальное в аккаунте |
**when_to_use** | **string** | Когда применять навык. Это поле читает модель, когда выбирает навык |
**instruction** | **string** | Инструкция навыка. Попадает в контекст модели только при срабатывании |
**current_version** | **int** | Номер текущей версии |
**agents_count** | **int** | У скольких агентов навык включён |
**first_agent_name** | **string** | Имя агента, если навык включён ровно у одного агента |
**catalog_item_id** | **int** | ID навыка в каталоге, из которого установлен этот навык |
**catalog_version** | **int** | Версия каталожного навыка, из которой установлен или обновлён этот навык |
**is_from_catalog** | **bool** | Навык установлен из каталога |
**is_modified** | **bool** | Установленный из каталога навык изменялся владельцем |
**created_at** | **\DateTime** | Дата и время создания |
**updated_at** | **\DateTime** | Дата и время последнего изменения |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
