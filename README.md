# Валидатор документов РФ

Для валидации требуется на вход подавать данные без разделителей (пробелы, символы дефиса и тире, иные специальные символы).

### Доступные проверки

| Наименование            | Описание                                |
|-------------------------|-----------------------------------------|
| russian_passport[:full] | Серия и номер паспорта РФ               |
| russian_passport:series | Серия паспорта РФ                       |
| russian_passport:number | Номер паспорта РФ                       |
| russian_passport:code   | Код подразделения, выдавшего паспорт РФ |
| russian_inn[:any]       | ИНН (любой)                             |
| russian_inn:fl          | ИНН физического лица                    |
| russian_inn:ul          | ИНН юридического лица                   |
| russian_kpp             | КПП                                     |
| russian_ogrn            | ОГРН                                    |
| russian_ogrnip          | ОГРНИП                                  |
| russian_bik             | БИК                                     |
| russian_ks              | Корреспондентский счёт                  |
| russian_rs              | Расчётный счёт                          |
| russian_snils           | СНИЛС                                   |
| russian_oktmo           | Код ОКТМО                               |
| russian_okato           | Код ОКАТО                               |
| russian_okpo            | Код ОКПО                                |

## Установка
```shell
composer require alexeyschetkin/laravel-russian-validators
```

## Использование
```php
<?php

```
## Тесты
```shell
vendor/bin/phpunit 
```
