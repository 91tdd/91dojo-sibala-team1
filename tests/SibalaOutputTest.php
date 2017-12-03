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
    public function testBasicTest()
    {
        // arrange
        $target = new SibalaOutput();
        $expected = 'Hello, world';

        // act
        $actual = $target->run();

        // assert
        $this->assertEquals($expected, $actual);
    }
}
