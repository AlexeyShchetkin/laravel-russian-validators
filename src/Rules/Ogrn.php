<?php

declare(strict_types=1);

namespace AlexeyShchetkin\LaravelRussianValidators\Rules;

use Illuminate\Contracts\Validation\Rule;

class Ogrn implements Rule
{
    public function passes($attribute, $value): bool
    {
        return 13 === mb_strlen($value)
            && is_numeric($value)
            && $this->isValidControlSum($value, (int)$value[-1]);
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
