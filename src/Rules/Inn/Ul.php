<?php

declare(strict_types=1);

namespace AlexeyShchetkin\LaravelRussianValidators\Rules\Inn;

use Illuminate\Contracts\Validation\Rule;

class Ul implements Rule
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
            && $this->isValidN1ControlSum($value);
    }

    public function message(): string
    {
        return trans('The :attribute has incorrect checksum');
    }

    private function isValidN1ControlSum($value): bool
    {
        $controlSum = 0;
        for ($i = 0; $i < sizeof(self::N1_WEIGHTS); $i++) {
            $controlSum += (int)$value[$i] * self::N1_WEIGHTS[$i];
        }
        $controlSum = $controlSum % 11;
        if (9 < $controlSum) {
            $controlSum = $controlSum % 10;
        }
        return $controlSum === (int)$value[-1];
    }
}
