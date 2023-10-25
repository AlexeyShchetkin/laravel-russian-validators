<?php

declare(strict_types=1);

namespace AlexeyShchetkin\LaravelRussianValidators\Tests\Unit\Personal;

use AlexeyShchetkin\LaravelRussianValidators\Tests\TestCase;
use Illuminate\Support\Facades\Validator;

class PassportTest extends TestCase
{
    /**
     * @dataProvider passportDataProvider
     * @return void
     */
    public function test_passport_full(string $value, $expectedResult)
    {
        $validator = Validator::make(['passport' => $value], ['passport' => 'russian_passport']);

        $this->assertSame($expectedResult, $validator->passes());
    }

    /**
     * @dataProvider passportSeriesDataProvider
     * @return void
     */
    public function test_passport_series(string $value, $expectedResult)
    {
        $validator = Validator::make(['passport' => $value], ['passport' => 'russian_passport:series']
        );

        $this->assertSame($expectedResult, $validator->passes());
    }

    /**
     * @dataProvider passportNumberDataProvider
     * @return void
     */
    public function test_passport_number(string $value, $expectedResult)
    {
        $validator = Validator::make(['passport' => $value], ['passport' => 'russian_passport:number']);

        $this->assertSame($expectedResult, $validator->passes());
    }

    public static function passportDataProvider(): array
    {
        return [
            ['4760844559', true],
            ['4396885467', true],
            ['4026733706', true],
            ['4866766027', true],
            ['4092470984', true],
            ['4092470984', true],
            ['4042207776', true],
            ['4793310568', true],
            ['4584616199', true],
            ['458461619', false],
            ['45846161999', false],
            ['45846D6199', false],
            ['45846 6199', false],
        ];
    }

    public static function passportSeriesDataProvider(): array
    {
        return [
            ['4760', true],
            ['4396', true],
            ['4026', true],
            ['4866', true],
            ['4092', true],
            ['40921', false],
            ['409', false],
            ['40A2', false],
            ['40 2', false],
        ];
    }


    public static function passportNumberDataProvider(): array
    {
        return [
            ['844559', true],
            ['885467', true],
            ['733706', true],
            ['766027', true],
            ['470984', true],
            ['470984', true],
            ['61619', false],
            ['6161999', false],
            ['6D6199', false],
            ['6 6199', false],
        ];
    }
}
