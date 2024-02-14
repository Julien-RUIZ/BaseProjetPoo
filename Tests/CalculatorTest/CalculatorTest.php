<?php
namespace CalculatorTest;

use App\Controllers\Calculator\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    public function testAdd()
    {
        $calculator = new Calculator();

        $result = $calculator->add(2, 3);

        // Assertion pour vérifier que 2 + 3 égale 5
        $this->assertEquals(5, $result);
    }

}