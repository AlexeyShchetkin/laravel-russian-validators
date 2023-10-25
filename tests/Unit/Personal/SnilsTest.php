<?php

declare(strict_types=1);

namespace AlexeyShchetkin\LaravelRussianValidators\Tests\Unit\Personal;

use AlexeyShchetkin\LaravelRussianValidators\Tests\TestCase;
use Illuminate\Support\Facades\Validator;

class SnilsTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     * @return void
     */
    public function test_bik(string $value, $expectedResult)
    {
        $validator = Validator::make(['snils' => $value], ['snils' => 'russian_snils']);

        $this->assertSame($expectedResult, $validator->passes());
    }

    public static function dataProvider(): array
    {
        return [
            ['77854180960', true],
            ['71989685487', true],
            ['66498589185', true],
            ['24009894465', true],
            ['18704217975', true],
            ['1870421797', false],
            ['187042179751', false],
            ['187042A7975', false],
            ['187042 7975', false],
        ];
    }
}
