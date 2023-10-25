<?php

declare(strict_types=1);

namespace AlexeyShchetkin\LaravelRussianValidators\Rules\Personal;

use Illuminate\Contracts\Validation\Rule;

class PassportCode implements Rule
{
    /**
     * @param string $attribute
     * @param string $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        $value = (string)$value;
        return 6 === mb_strlen($value)
            && is_numeric($value);
    }

    public function message(): string
    {
        return trans('The :attribute has incorrect value');
    }
}
