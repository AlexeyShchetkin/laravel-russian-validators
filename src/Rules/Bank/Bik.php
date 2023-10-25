<?php

declare(strict_types=1);

namespace AlexeyShchetkin\LaravelRussianValidators\Rules\Bank;

use Illuminate\Contracts\Validation\Rule;

class Bik implements Rule
{
    /**
     * @param string $attribute
     * @param string $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        $value = (string)$value;
        return 9 === mb_strlen($value)
            && is_numeric($value)
            && $this->isValidNumber((string)$value);
    }

    public function message(): string
    {
        return trans('The :attribute has incorrect value');
    }

    private function isValidNumber(string $value): bool
    {
        $creditOrganizationNumber = (int)mb_substr($value, -3, 3);
        return 50 <= $creditOrganizationNumber && $creditOrganizationNumber <= 999;
    }
}
