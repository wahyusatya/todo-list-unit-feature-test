<?php

namespace Tests\Unit;

use App\Helpers\CalculatorHelper;
use PHPUnit\Framework\TestCase;

class CalculatorHelperTest extends TestCase
{
    public function test_perkalian_with_zero()
    {
        $this->assertEquals(0, CalculatorHelper::perkalian(0, 100));
        $this->assertEquals(0, CalculatorHelper::perkalian(100, 0));
    }

    public function test_perkalian_with_negative_numbers()
    {
        $this->assertEquals(-6, CalculatorHelper::perkalian(-2, 3));
        $this->assertEquals(6, CalculatorHelper::perkalian(-2, -3));
    }

    public function test_addition_with_large_numbers()
    {
        $a = 999999999;
        $b = 111111111;
        $expected = $a + $b;

        $this->assertEquals($expected, CalculatorHelper::add($a, $b));
    }

    public function test_subtraction_resulting_negative()
    {
        $this->assertEquals(-5, CalculatorHelper::subtract(5, 10));
    }

    public function test_addition_with_floats()
    {
        $this->assertEquals(5.7, CalculatorHelper::add(2.5, 3.2), '', 0.01);
    }
}
