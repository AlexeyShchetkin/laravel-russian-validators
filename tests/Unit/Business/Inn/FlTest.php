<?php

declare(strict_types=1);

namespace AlexeyShchetkin\LaravelRussianValidators\Tests\Unit\Business\Inn;

use AlexeyShchetkin\LaravelRussianValidators\Tests\TestCase;
use Illuminate\Support\Facades\Validator;

class FlTest extends TestCase
{
    /**
     * @dataProvider innFlProvider
     * @return void
     */
    public function test_fl_inn(string $inn, $expectedResult)
    {
        $validator = Validator::make(['inn' => $inn], ['inn' => 'russian_inn:fl']);

        $this->assertSame($expectedResult, $validator->passes());
    }

    public static function innFlProvider(): array
    {
        return [
            ['561100409545', true],
            ['666200351548', true],
            ['366512608416', true],
            ['773173084809', true],
            ['771409116994', true],
            ['503115929542', true],
            ['773400211252', true],
            ['771902452360', true],
            ['702100195003', true],
            ['500100732259', true],
            ['5001007322591', false],
            ['A00100732259', false],
            ['50010073225A', false],
            ['50010A732259', false],
            ['50010A732248', false],
            ['50010A732258', false],
        ];
    }


}
