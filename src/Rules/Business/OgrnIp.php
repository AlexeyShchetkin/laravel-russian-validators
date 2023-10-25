<?php

declare(strict_types=1);

namespace AlexeyShchetkin\LaravelRussianValidators\Rules\Business;

use Illuminate\Contracts\Validation\Rule;

class OgrnIp implements Rule
{
    public function passes($attribute, $value): bool
    {
        return 15 === mb_strlen($value)
            && is_numeric($value)
            && $this->isValidControlSum($value, (int)$value[-1]);
    }

    public function message(): string
    {
        return trans('The :attribute has incorrect value');
    }

    private function isValidControlSum(string $value, int $controlValue): bool
    {
        $controlSum = mb_substr($value, 0, -1) % 13;
        if (10 === $controlSum) {
            $controlSum = 0;
        }
        return $controlSum === $controlValue;
    }
}
