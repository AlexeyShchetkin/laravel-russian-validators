<?php

declare(strict_types=1);

namespace AlexeyShchetkin\LaravelRussianValidators\Rules\Business;

use Illuminate\Contracts\Validation\Rule;

class Oktmo implements Rule
{
    public function passes($attribute, $value): bool
    {
        return (8 === mb_strlen($value) || 11 === mb_strlen($value))
            && is_numeric($value);
    }

    public function message(): string
    {
        return trans('The :attribute has incorrect value');
    }
}
