# Validators for Russian documentation

For validation, input data must be submitted without delimiters (spaces, hyphens and dashes, and other special characters).
For example: 

### Available validators

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

## Installation
You can install the package via composer:
```shell
composer require alexeyschetkin/laravel-russian-validators
```

## Usage
```php
<?php

```
## Testing
```shell
composer test 
```
## Credits

- [Alexey Shchetkin](https://github.com/AlexeyShchetkin)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
