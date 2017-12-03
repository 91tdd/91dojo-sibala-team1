<?php

namespace Tests;

use JoeyDojo\SibalaOutput;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JoeyDojo\Example
 */
class SibalaOutputTest extends TestCase
{
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

    public function test_same_color()
    {
        // arrange
        $target = new SibalaOutput();
        $expected = 'same color';

        // act
        $actual = $target->calculator(1, 1, 1, 1);

        // assert
        $this->assertEquals($expected, $actual);
    }

}
