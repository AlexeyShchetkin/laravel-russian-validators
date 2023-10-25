<?php

declare(strict_types=1);

namespace AlexeyShchetkin\LaravelRussianValidators\Rules\Personal;

use Illuminate\Contracts\Validation\Rule;

class PassportCode implements Rule
{
    public function passes($attribute, $value): bool
    {
        return 6 === mb_strlen($value)
            && is_numeric($value);
    }

    public function message(): string
    {
        return trans('The :attribute has incorrect value');
    }
}
