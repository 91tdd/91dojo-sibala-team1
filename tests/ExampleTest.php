<?php

namespace Tests;

use JoeyDojo\Example;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JoeyDojo\Example
 */
class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @covers \JoeyDojo\Example::run()

     */
    public function testBasicTest()
    {
        // arrange
        $target = new Example();
        $expected = 'Hello, world';

        // act
        $actual = $target->run();

        // assert
        $this->assertEquals($expected, $actual);
    }
}
