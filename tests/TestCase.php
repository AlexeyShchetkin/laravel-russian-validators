<?php

declare(strict_types=1);

namespace AlexeyShchetkin\LaravelRussianValidators\Tests;

use AlexeyShchetkin\LaravelRussianValidators\Providers\LaravelRussianValidatorsServiceProvider;
use Orchestra\Testbench\TestCase as TestBenchTestCase;

class TestCase extends TestBenchTestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            LaravelRussianValidatorsServiceProvider::class
        ];
    }

}
