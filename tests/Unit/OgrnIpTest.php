<?php

declare(strict_types=1);

namespace AlexeyShchetkin\LaravelRussianValidators\Tests\Unit;

use AlexeyShchetkin\LaravelRussianValidators\Tests\TestCase;
use Illuminate\Support\Facades\Validator;

class OgrnIpTest extends TestCase
{
    /**
     * @dataProvider innFlProvider
     * @return void
     */
    public function test_ogrn(string $value, $expectedResult)
    {
        $validator = Validator::make(['ogrnip' => $value], ['ogrnip' => 'russian_ogrnip']);
        $this->assertSame($expectedResult, $validator->passes());
    }

    public static function innFlProvider(): array
    {
        return [
            ['316861700133226', true],
            ['313132804400022', true],
            ['323774600589960', true],
            ['312580305800014', true],
            ['3125803058000141', false],
            ['31258030580001', false],
        ];
    }
}
