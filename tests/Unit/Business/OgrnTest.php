<?php

declare(strict_types=1);

namespace AlexeyShchetkin\LaravelRussianValidators\Tests\Unit\Business;

use AlexeyShchetkin\LaravelRussianValidators\Tests\TestCase;
use Illuminate\Support\Facades\Validator;

class OgrnTest extends TestCase
{
    /**
     * @dataProvider innFlProvider
     * @return void
     */
    public function test_ogrn(string $value, $expectedResult)
    {
        $validator = Validator::make(['ogrn' => $value], ['ogrn' => 'russian_ogrn']);
        $this->assertSame($expectedResult, $validator->passes());
    }

    public static function innFlProvider(): array
    {
        return [
            ['1027739642281', true],
            ['1053600591197', true],
            ['1177746126040', true],
            ['1172468024068', true],
            ['1117746358608', true],
            ['1026402000657', true],
            ['102640200065', false],
            ['10264020006571', false],
        ];
    }
}
