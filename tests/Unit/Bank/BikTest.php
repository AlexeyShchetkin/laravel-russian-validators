<?php

declare(strict_types=1);

namespace AlexeyShchetkin\LaravelRussianValidators\Tests\Unit\Bank;

use AlexeyShchetkin\LaravelRussianValidators\Tests\TestCase;
use Illuminate\Support\Facades\Validator;

class BikTest extends TestCase
{
    /**
     * @dataProvider innFlProvider
     * @return void
     */
    public function test_bik(string $value, $expectedResult)
    {
        $validator = Validator::make(['bik' => $value], ['bik' => 'russian_bik']);
        $this->assertSame($expectedResult, $validator->passes());
    }

    public static function innFlProvider(): array
    {
        return [
            ['040702752', true],
            ['044030786', true],
            ['040349602', true],
            ['048405602', true],
            ['04840560', false],
            ['0484056021', false],
            ['048405A02', false],
        ];
    }
}
