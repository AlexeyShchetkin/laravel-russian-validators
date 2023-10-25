<?php

declare(strict_types=1);

namespace AlexeyShchetkin\LaravelRussianValidators\Tests\Unit\Business\Inn;

use AlexeyShchetkin\LaravelRussianValidators\Tests\TestCase;
use Illuminate\Support\Facades\Validator;

class AnyTest extends TestCase
{
    /**
     * @dataProvider innFlProvider
     * @return void
     */
    public function test_any_inn(string $inn, $expectedResult)
    {
        $validator = Validator::make(['inn' => $inn], ['inn' => 'russian_inn']);

        $this->assertSame($expectedResult, $validator->passes());
    }

    public static function innFlProvider(): array
    {
        return [
            ['6663003127', true],
            ['7708503727', true],
            ['7736050003', true],
            ['7452027843', true],
            ['6658021579', true],
            ['7725604637', true],
            ['4401006984', true],
            ['3016003718', true],
            ['5053051872', true],
            ['7701105460', true],
            ['77011054601', false],
            ['A701105460', false],
            ['770110546A', false],
            ['77011A5460', false],
            ['7701105461', false],
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
