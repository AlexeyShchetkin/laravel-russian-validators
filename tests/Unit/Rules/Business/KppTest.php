<?php

declare(strict_types=1);

namespace AlexeyShchetkin\LaravelRussianValidators\Tests\Unit\Rules\Business;

use AlexeyShchetkin\LaravelRussianValidators\Tests\TestCase;
use Illuminate\Support\Facades\Validator;

class KppTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     * @return void
     */
    public function test_kpp(string $value, $expectedResult)
    {
        $validator = Validator::make(['kpp' => $value], ['kpp' => 'russian_kpp']);

        $this->assertSame($expectedResult, $validator->passes());
    }

    public static function dataProvider(): array
    {
        return [
            ['5610010011', false],
            ['77360500', false],
            ['561Q01001', false],
            ['56100100Z', false],
            ['5610 1001', false],
            ['561001001', true],
            ['5610AB001', true],
        ];
    }
}
