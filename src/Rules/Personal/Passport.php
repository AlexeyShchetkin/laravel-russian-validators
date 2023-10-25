<?php

declare(strict_types=1);

namespace AlexeyShchetkin\LaravelRussianValidators\Rules\Personal;

use Illuminate\Contracts\Validation\Rule;

class Passport implements Rule
{
    private string $type;

    public function __construct(string $type = 'full')
    {
        $this->type = $type;
    }

    /**
     * @param string $attribute
     * @param string $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        $value = (string)$value;
        switch ($this->type) {
            case 'series':
                return 4 === mb_strlen($value)
                    && is_numeric($value);
            case 'number':
                return 6 === mb_strlen($value)
                    && is_numeric($value);
            case 'full':
            default:
                return 10 === mb_strlen($value)
                    && is_numeric($value);
        }
    }

    public function message(): string
    {
        return trans('The :attribute has incorrect value');
    }
}
