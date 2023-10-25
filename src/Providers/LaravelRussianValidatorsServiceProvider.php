<?php

declare(strict_types=1);

namespace AlexeyShchetkin\LaravelRussianValidators\Providers;

use AlexeyShchetkin\LaravelRussianValidators\Rules\Inn\Any;
use AlexeyShchetkin\LaravelRussianValidators\Rules\Inn\Fl;
use AlexeyShchetkin\LaravelRussianValidators\Rules\Inn\Ul;
use AlexeyShchetkin\LaravelRussianValidators\Rules\Kpp;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class LaravelRussianValidatorsServiceProvider extends ServiceProvider
{
    /** Register any application services. */
    public function register(): void
    {
    }

    /** Bootstrap any application services. */
    public function boot(): void
    {
        Validator::extend('russian_inn', function ($attribute, $value, $parameters) {
            $innType = $parameters[0] ?? 'any';
            switch ($innType) {
                case 'ul':
                    $validator = Validator::make([$attribute => $value], [$attribute => ['digits:10', new Ul()]]);
                    break;
                case 'fl':
                    $validator = Validator::make([$attribute => $value], [$attribute => ['digits:12', new Fl()]]);
                    break;
                case 'any':
                default:
                    $validator = Validator::make([$attribute => $value], [$attribute => [new Any()]]);
                    break;
            }
            return $validator->passes();
        });

        Validator::extend('russian_kpp', function ($attribute, $value) {
            $validator = Validator::make([$attribute => $value], [$attribute => ['size:9', new Kpp()]]);
            return $validator->passes();
        });
    }
}
