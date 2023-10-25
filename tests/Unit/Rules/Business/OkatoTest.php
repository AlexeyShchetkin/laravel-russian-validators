<?php

declare(strict_types=1);

namespace AlexeyShchetkin\LaravelRussianValidators\Tests\Unit\Rules\Business;

use AlexeyShchetkin\LaravelRussianValidators\Tests\TestCase;
use Illuminate\Support\Facades\Validator;

class OkatoTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     * @return void
     */
    public function test_okato(string $value, $expectedResult)
    {
        $validator = Validator::make(['okato' => $value], ['okato' => 'russian_okato']);

        $this->assertSame($expectedResult, $validator->passes());
    }

    public static function dataProvider(): array
    {
        return [
            ['01201802000', true],
            ['01201802001', true],
            ['18000000000', true],
            ['18400000000', true],
            ['18401000000', true],
            ['18401360000', true],
            ['18401365000', true],
            ['45000000000', true],
            ['45260000000', true],
            ['45280000000', true],
            ['45280550000', true],
            ['45280558000', true],
            ['4528055800', false],
            ['452805580001', false],
            ['452805F8000', false],
            ['452805 8000', false],
        ];
    }
}
