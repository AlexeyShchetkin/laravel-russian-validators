<?php

declare(strict_types=1);

namespace AlexeyShchetkin\LaravelRussianValidators\Rules\Bank;

use Illuminate\Contracts\Validation\Rule;

class Ks implements Rule
{
    /**
     * @param string $attribute
     * @param string $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        $value = (string)$value;
        return 20 === mb_strlen($value)
            && is_numeric($value);
    }

    public function message(): string
    {
        return trans('The :attribute has incorrect value');
    }
}
