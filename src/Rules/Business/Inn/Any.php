<?php

declare(strict_types=1);

namespace AlexeyShchetkin\LaravelRussianValidators\Rules\Business\Inn;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class Any implements Rule
{

    public function passes($attribute, $value): bool
    {
        $flValidator = Validator::make([$attribute => $value], [$attribute => 'russian_inn:fl']);
        if ($flValidator->passes()) {
            return true;
        }
        $ulValidator = Validator::make([$attribute => $value], [$attribute => 'russian_inn:ul']);
        if ($ulValidator->passes()) {
            return true;
        }
        return false;
    }

    public function message(): string
    {
        return trans('The :attribute has incorrect inn.');
    }
}
