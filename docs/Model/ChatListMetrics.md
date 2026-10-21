# # ChatListMetrics

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**total_reactions** | **int** | Количество чатов с учётом фильтра &#x60;response_time_ranges&#x60; (без учёта &#x60;reaction_type&#x60;) |
**total_time** | **int** | Количество чатов с учётом фильтра &#x60;reaction_type&#x60; (без учёта &#x60;response_time_ranges&#x60;) |
**with_likes** | **int** | Чатов хотя бы с одной положительной оценкой |
**with_dislikes** | **int** | Чатов хотя бы с одной отрицательной оценкой |
**with_any** | **int** | Чатов хотя бы с одной оценкой |
**response_time_groups_reactions** | **array<string,int>** | Количество чатов по среднему времени ответа (в секундах) с учётом фильтра &#x60;response_time_ranges&#x60; |
**response_time_groups_time** | **array<string,int>** | Количество чатов по среднему времени ответа (в секундах) с учётом фильтра &#x60;reaction_type&#x60; |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
