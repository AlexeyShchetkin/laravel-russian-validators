<?php

declare(strict_types=1);

namespace AlexeyShchetkin\LaravelRussianValidators\Rules\Inn;

use Illuminate\Contracts\Validation\Rule;

class Fl implements Rule
{
    private const N1_WEIGHTS = [
        7,
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
    private const N2_WEIGHTS = [
        3,
        7,
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
        return 12 === mb_strlen($value)
            && is_numeric($value)
            && $this->isValidN1ControlSum($value, (int)$value[-2])
            && $this->isValidN2ControlSum($value, (int)$value[-1]);
    }

    public function message(): string
    {
        return trans('The :attribute has incorrect checksum');
    }


    private function isValidN1ControlSum($value, $controlValue): bool
    {
        $controlSum = 0;
        for ($i = 0; $i < sizeof(self::N1_WEIGHTS); $i++) {
            $controlSum += (int)$value[$i] * self::N1_WEIGHTS[$i];
        }
        $controlSum = $controlSum % 11;
        if ($controlSum === 10) {
            $controlSum = 0;
        }
        return $controlSum === $controlValue;
    }

    private function isValidN2ControlSum(string $value, int $controlValue): bool
    {
        $controlSum = 0;
        for ($i = 0; $i < sizeof(self::N2_WEIGHTS); $i++) {
            $controlSum += (int)$value[$i] * self::N2_WEIGHTS[$i];
        }
        $controlSum = $controlSum % 11;
        if ($controlSum === 10) {
            $controlSum = 0;
        }
        return $controlSum === $controlValue;
    }
}
