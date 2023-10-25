<?php

declare(strict_types=1);

namespace AlexeyShchetkin\LaravelRussianValidators\Tests\Unit\Inn;

use AlexeyShchetkin\LaravelRussianValidators\Tests\TestCase;
use Illuminate\Support\Facades\Validator;

class UlTest extends TestCase
{
    /**
     * @dataProvider innFlProvider
     * @return void
     */
    public function test_ul_inn(string $inn, $expectedResult)
    {
        $validator = Validator::make(['inn' => $inn], ['inn' => 'russian_inn:ul']);

        $this->assertSame($expectedResult, $validator->passes());
    }

    public static function innFlProvider(): array
    {
        return [
            ['6663003127', true],
            ['7708503727', true],
            ['7736050003', true],
            ['7452027843', true],
            ['6658021579', true],
            ['7725604637', true],
            ['4401006984', true],
            ['3016003718', true],
            ['5053051872', true],
            ['7701105460', true],
            ['77011054601', false],
            ['A701105460', false],
            ['770110546A', false],
            ['77011A5460', false],
            ['7701105461', false],
        ];
    }
}
