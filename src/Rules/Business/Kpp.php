<?php

declare(strict_types=1);

namespace AlexeyShchetkin\LaravelRussianValidators\Rules\Business;

use Illuminate\Contracts\Validation\Rule;

class Kpp implements Rule
{
    /**
     * @param string $attribute
     * @param string $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        $value = (string)$value;
        return (bool)preg_match('/^[0-9]{4}[0-9A-Z]{2}[0-9]{3}$/', $value);
    }

    public function message(): string
    {
        return trans('The :attribute has incorrect value');
    }
}
