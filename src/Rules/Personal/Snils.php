<?php

declare(strict_types=1);

namespace AlexeyShchetkin\LaravelRussianValidators\Rules\Personal;

use Illuminate\Contracts\Validation\Rule;

class Snils implements Rule
{
    private const WEIGHTS = [
        9,
        8,
        7,
        6,
        5,
        4,
        3,
        2,
        1
    ];

    /**
     * @param string $attribute
     * @param string $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        $value = (string)$value;
        return 11 === mb_strlen($value)
            && is_numeric($value)
            && $this->isValidControlSum($value, intval($value[-2] . $value[-1]));
    }

    public function message(): string
    {
        return trans('The :attribute has incorrect value');
    }

    private function isValidControlSum(string $value, int $controlValue): bool
    {
        $controlSum = 0;
        for ($i = 0; $i < sizeof(self::WEIGHTS); $i++) {
            $controlSum += (int)$value[$i] * self::WEIGHTS[$i];
        }
        if ($controlSum === 100) {
            $controlSum = 0;
        } elseif (100 < $controlSum) {
            $controlSum = $controlSum % 101;
            if ($controlSum === 100) {
                $controlSum = 0;
            }
        }
        return $controlSum === $controlValue;
    }

}
