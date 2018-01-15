<?php

namespace App\Tests\Util;

use App\Util\Calculator;
use PHPUnit\Framework\TestCase;

/**
 * Test case for calculator util.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class CalculatorTest extends TestCase
{
    public function testAdd()
    {
        $calc = new Calculator();
        $result = $calc->add(3, 4);

        $this->assertEquals(7, $result);
    }
}
