# # AiSolutionChatStatus

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**ready** | **bool** | Готов ли чат принимать сообщения |
**reason** | **string** | Почему чат ещё не готов. Отсутствует, если чат готов. &#x60;unreachable&#x60; — до сервера не достучаться (разворачивается, выключен или нет публичного IP); &#x60;software_installing&#x60; — устанавливается ПО агента; &#x60;configuring&#x60; — агент настраивается; &#x60;install_failed&#x60; — установка ПО не удалась, пересоздайте решение; &#x60;machine_error&#x60; — сервер в состоянии ошибки, пересоздайте решение; &#x60;deleted&#x60; — решение удалено; &#x60;outdated&#x60; — сервер создан старой версией решения, пересоздайте решение | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
