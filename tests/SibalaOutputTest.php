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
     * @var SibalaOutput
     */
    private $sibala;

    protected function setUp()
    {
        $this->sibala = new SibalaOutput();
    }

    /**
     * 測試 no points
     *
     * @param $one
     * @param $two
     * @param $three
     * @param $four
     * @dataProvider noPointsDataProvider
     * @covers \JoeyDojo\Example::run()
     */
    public function test_no_points($one, $two, $three, $four)
    {
        // arrange
        $expected = 'no points';

        // act
        $actual = $this->sibala->calculator($one, $two, $three, $four);

        // assert
        $this->assertEquals($expected, $actual);
    }

    public function test_same_color()
    {
        // arrange
        $expected = 'same color';

        // act
        $actual = $this->sibala->calculator(1, 1, 1, 1);

        // assert
        $this->assertEquals($expected, $actual);
    }

    public function test_four_points()
    {
        // arrange
        $expected = '4 points';

        // act
        $actual = $this->sibala->calculator(4, 1, 3, 4);

        // assert
        $this->assertEquals($expected, $actual);
    }

    public function test_bg_()
    {
        // arrange
        $expected = 'bg';

        // act
        $actual = $this->sibala->calculator(1 , 2, 1, 1);

        // assert
        $this->assertEquals($expected, $actual);
    }

    public function noPointsDataProvider()
    {
        return [
            [1, 2, 3, 4],
            [2, 5, 1, 6],
            [3, 4, 1, 5],
            [4, 1, 2, 6],
            [5, 3, 4, 1],
            [6, 4, 3, 1],
        ];
    }
}
