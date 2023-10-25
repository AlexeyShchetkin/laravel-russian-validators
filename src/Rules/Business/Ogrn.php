<?php

declare(strict_types=1);

namespace AlexeyShchetkin\LaravelRussianValidators\Rules\Business;

use Illuminate\Contracts\Validation\Rule;

class Ogrn implements Rule
{
    /**
     * @param string $attribute
     * @param string $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        $value = (string)$value;
        return 13 === mb_strlen($value)
            && is_numeric($value)
            && $this->isValidControlSum($value, intval(mb_substr($value, -1)));
    }

    public function message(): string
    {
        return trans('The :attribute has incorrect value');
    }

    private function isValidControlSum(string $value, int $controlValue): bool
    {
        $controlSum = mb_substr($value, 0, -1) % 11;
        if (10 === $controlSum) {
            $controlSum = 0;
        }
        return $controlSum === $controlValue;
    }
}
