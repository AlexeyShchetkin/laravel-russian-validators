<?php

declare(strict_types=1);

namespace AlexeyShchetkin\LaravelRussianValidators\Rules\Business;

use Illuminate\Contracts\Validation\Rule;

class Okpo implements Rule
{
    /**
     * @param string $attribute
     * @param string $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        $value = (string)$value;
        return (8 === mb_strlen($value) || 10 === mb_strlen($value))
            && is_numeric($value)
            && $this->isValidControlSum($value, intval(mb_substr($value, -1)));
    }

    public function message(): string
    {
        return trans('The :attribute has incorrect value');
    }

    private function isValidControlSum(string $value, int $controlValue): bool
    {
        $controlSum = 0;
        for ($i = 0; $i < mb_strlen($value) - 1; $i++) {
            $controlSum += (int)$value[$i] * ($i + 1);
        }
        $controlSum = $controlSum % 11;
        if ($controlSum === 10) {
            $controlSum = 0;
            for ($i = 0; $i < mb_strlen($value) - 1; $i++) {
                $controlSum += (int)$value[$i] * ($i + 3);
            }
            $controlSum = $controlSum % 11;
        }
        return $controlSum === $controlValue;
    }

}
