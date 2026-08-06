# # PresetsDbs

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **float** | ID для каждого экземпляра тарифа базы данных. | [optional]
**description** | **string** | Описание тарифа. | [optional]
**description_short** | **string** | Краткое описание тарифа. | [optional]
**cpu** | **float** | Количество ядер процессора тарифа. | [optional]
**cpu_frequency** | **string** | Частота процессора (в ГГц). | [optional]
**ram** | **float** | Объём оперативной памяти тарифа (в Мб). | [optional]
**disk** | **float** | Размер диска тарифа (в Мб). | [optional]
**type** | **string** | Семейство СУБД тарифа. Значение не совпадает с типом кластера, который передаётся в поле &#x60;type&#x60; при создании кластера (&#x60;POST /api/v1/databases&#x60;): там используется версионированный тип, например &#x60;postgres17&#x60;. Тарифы для Valkey возвращаются со значением &#x60;redis&#x60; — отдельного значения &#x60;valkey&#x60; в этом поле не бывает. | [optional]
**price** | **float** | Стоимость тарифа базы данных | [optional]
**location** | **string** | Географическое расположение тарифа. | [optional]
**tags** | **string[]** | Теги тарифа, в том числе тег группы тарифов, в пределах которой доступна смена тарифа. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
