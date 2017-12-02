<?php

namespace Tests;

use JoeyDojo\Example;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
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
