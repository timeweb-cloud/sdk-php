# # AgentWidgetSettings

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**whitelist_domains** | **string[]** | Домены, на которых разрешено показывать виджет. Пустой массив — без ограничений. |
**name** | **string** | Отображаемое имя агента в виджете |
**signature** | **string** | Подпись под именем агента в виджете | [optional]
**welcome_message** | **string** | Приветственное сообщение при открытии виджета |
**primary_color** | **string** | Основной цвет виджета в формате &#x60;#RRGGBB&#x60; |
**text_color** | **string** | Цвет текста в формате &#x60;#RRGGBB&#x60; | [optional]
**background_color** | **string** | Цвет фона в формате &#x60;#RRGGBB&#x60; | [optional]
**header_footer_color** | **string** | Цвет шапки и подвала виджета в формате &#x60;#RRGGBB&#x60; | [optional]
**font** | **string** | Шрифт виджета. Пустая строка — шрифт сайта. |
**icon_url** | **string** | URL иконки агента в виджете | [optional]
**use_avatar** | **bool** | Использовать загруженный в панели аватар как иконку агента | [optional] [default to false]
**show_button** | **bool** | Показывать кнопку открытия виджета | [optional] [default to true]
**show_tool_processing** | **bool** | Показывать в виджете статус выполнения инструментов агента | [optional] [default to false]
**show_confirmation_buttons** | **bool** | Показывать кнопки подтверждения и отмены операций, которые агент выполняет через инструменты | [optional] [default to true]
**chat_position** | **string** | Положение виджета на странице |
**chat_position_adjustment_x** | **float** | Смещение виджета по горизонтали в пикселях | [optional]
**chat_position_adjustment_y** | **float** | Смещение виджета по вертикали в пикселях | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
