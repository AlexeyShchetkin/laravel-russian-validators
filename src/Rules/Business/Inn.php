<?php

declare(strict_types=1);

namespace AlexeyShchetkin\LaravelRussianValidators\Rules\Business;

use Illuminate\Contracts\Validation\Rule;

class Inn implements Rule
{
    private const N1_WEIGHTS = [
        2,
        4,
        10,
        3,
        5,
        9,
        4,
        6,
        8
    ];

    public function passes($attribute, $value): bool
    {
        return 10 === mb_strlen($value)
            && is_numeric($value)
            && $this->isValidN1ControlSum($value, (int)$value[-1]);
    }

    public function message(): string
    {
        return trans('The :attribute has incorrect checksum');
    }

    private function isValidN1ControlSum(string $value, int $controlValue): bool
    {
        $controlSum = 0;
        for ($i = 0; $i < sizeof(self::N1_WEIGHTS); $i++) {
            $controlSum += (int)$value[$i] * self::N1_WEIGHTS[$i];
        }
        $controlSum = $controlSum % 11;
        if (9 < $controlSum) {
            $controlSum = $controlSum % 10;
        }
        return $controlSum === $controlValue;
    }
}
