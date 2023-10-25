<?php

declare(strict_types=1);

namespace AlexeyShchetkin\LaravelRussianValidators\Tests\Unit\Business;

use AlexeyShchetkin\LaravelRussianValidators\Tests\TestCase;
use Illuminate\Support\Facades\Validator;

class OktmoTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     * @return void
     */
    public function test_oktmo(string $value, $expectedResult)
    {
        $validator = Validator::make(['oktmo' => $value], ['oktmo' => 'russian_oktmo']);

        $this->assertSame($expectedResult, $validator->passes());
    }

    public static function dataProvider(): array
    {
        return [
            ['36634436111', true],
            ['36634436', true],
            ['36634400', true],
            ['36634000', true],
            ['36600000', true],
            ['36000000', true],
            ['12701000001', true],
            ['12701000', true],
            ['12700000', true],
            ['12000000', true],
            ['120000001', false],
            ['1200000', false],
            ['12000A00', false],
            ['12000 00', false],
        ];
    }
}
