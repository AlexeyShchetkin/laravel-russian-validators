<?php

declare(strict_types=1);

namespace AlexeyShchetkin\LaravelRussianValidators\Tests\Unit\Business;

use AlexeyShchetkin\LaravelRussianValidators\Tests\TestCase;
use Illuminate\Support\Facades\Validator;

class OkpoTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     * @return void
     */
    public function test_okpo(string $value, $expectedResult)
    {
        $validator = Validator::make(['okpo' => $value], ['okpo' => 'russian_okpo']);

        $this->assertSame($expectedResult, $validator->passes());
    }

    public static function dataProvider(): array
    {
        return [
            ['0002870479', true],
            ['00002335', true],
            ['79271669', true],
            ['01705837', true],
            ['44948832', true],
            ['93281776', true],
            ['36492970', true],
            ['15438788', true],
            ['79633599', true],
            ['796335991', false],
            ['7963359', false],
            ['796F3599', false],
            ['796 3599', false],
        ];
    }
}
