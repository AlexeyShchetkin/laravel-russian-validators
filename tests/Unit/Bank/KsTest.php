<?php

declare(strict_types=1);

namespace AlexeyShchetkin\LaravelRussianValidators\Tests\Unit\Bank;

use AlexeyShchetkin\LaravelRussianValidators\Tests\TestCase;
use Illuminate\Support\Facades\Validator;

class KsTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     * @return void
     */
    public function test_ks(string $value, $expectedResult)
    {
        $validator = Validator::make(['ks' => $value], ['ks' => 'russian_ks']);

        $this->assertSame($expectedResult, $validator->passes());
    }

    public static function dataProvider(): array
    {
        return [
            ['30101810100000000706', true],
            ['30101810200000000824', true],
            ['30101810500000000207', true],
            ['30101810400000000640', true],
            ['30101810300000000602', true],
            ['30101810300 00000602', false],
            ['3010181030000000060', false],
            ['301018103000000006021', false],
            ['301018103000A0000602', false],
        ];
    }
}
