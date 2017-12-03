<?php

namespace Tests;

use JoeyDojo\SibalaOutput;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JoeyDojo\Example
 */
class SibalaOutputTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @covers \JoeyDojo\Example::run()

     */
    public function test_no_points()
    {
        // arrange
        $target = new SibalaOutput();
        $expected = 'no points';

        // act
        $actual = $target->calculator(1, 2, 3, 4);

        // assert
        $this->assertEquals($expected, $actual);
    }
}
