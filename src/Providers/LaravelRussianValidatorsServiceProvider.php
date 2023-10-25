<?php

declare(strict_types=1);

namespace AlexeyShchetkin\LaravelRussianValidators\Providers;

use AlexeyShchetkin\LaravelRussianValidators\Rules\Bank\Bik;
use AlexeyShchetkin\LaravelRussianValidators\Rules\Bank\Ks;
use AlexeyShchetkin\LaravelRussianValidators\Rules\Business\Inn\Any;
use AlexeyShchetkin\LaravelRussianValidators\Rules\Business\Inn\Fl;
use AlexeyShchetkin\LaravelRussianValidators\Rules\Business\Inn\Ul;
use AlexeyShchetkin\LaravelRussianValidators\Rules\Business\Kpp;
use AlexeyShchetkin\LaravelRussianValidators\Rules\Business\Ogrn;
use AlexeyShchetkin\LaravelRussianValidators\Rules\Business\OgrnIp;
use AlexeyShchetkin\LaravelRussianValidators\Rules\Business\Oktmo;
use AlexeyShchetkin\LaravelRussianValidators\Rules\Personal\Snils;
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
                    $validator = Validator::make([$attribute => $value], [$attribute => new Ul()]);
                    break;
                case 'fl':
                    $validator = Validator::make([$attribute => $value], [$attribute => new Fl()]);
                    break;
                case 'any':
                default:
                    $validator = Validator::make([$attribute => $value], [$attribute => new Any()]);
                    break;
            }
            return $validator->passes();
        });

        Validator::extend('russian_kpp', function ($attribute, $value) {
            $validator = Validator::make([$attribute => $value], [$attribute => new Kpp()]);
            return $validator->passes();
        });

        Validator::extend('russian_ogrn', function ($attribute, $value) {
            $validator = Validator::make([$attribute => $value], [$attribute => new Ogrn()]);
            return $validator->passes();
        });

        Validator::extend('russian_ogrnip', function ($attribute, $value) {
            $validator = Validator::make([$attribute => $value], [$attribute => new OgrnIp()]);
            return $validator->passes();
        });

        Validator::extend('russian_bik', function ($attribute, $value) {
            $validator = Validator::make([$attribute => $value], [$attribute => new Bik()]);
            return $validator->passes();
        });

        Validator::extend('russian_ks', function ($attribute, $value) {
            $validator = Validator::make([$attribute => $value], [$attribute => new Ks()]);
            return $validator->passes();
        });

        Validator::extend('russian_rs', function ($attribute, $value) {
            $validator = Validator::make([$attribute => $value], [$attribute => new Ks()]);
            return $validator->passes();
        });

        Validator::extend('russian_snils', function ($attribute, $value) {
            $validator = Validator::make([$attribute => $value], [$attribute => new Snils()]);
            return $validator->passes();
        });

        Validator::extend('russian_oktmo', function ($attribute, $value) {
            $validator = Validator::make([$attribute => $value], [$attribute => new Oktmo()]);
            return $validator->passes();
        });
    }
}
