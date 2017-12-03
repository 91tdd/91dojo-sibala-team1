<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use JoeyDojo\SibalaCompare;

class SibalaCompareTest extends TestCase
{
    private $instance;

    public function setUp()
    {
        parent::setUp();
        $this->instance = new SibalaCompare;
    }

    /**
     * @dataProvider sibalaWithNumberProvider
     */
    public function testCompareWithNumber($sibalaA, $sibalaB, $expected)
    {
        $this->assertEquals(
            $expected,
            $this->instance->setSibala($sibalaA)->setSibala($sibalaB)->compare()
        );
    }

    public function sibalaWithNumberProvider()
    {
        return [
            [
                [
                    'name' => 'A',
                    'number' => 8,
                    'state' => 2
                ],
                [
                    'name' => 'B',
                    'number' => 7,
                    'state' => 2
                ],
                ['A', 'B'],
            ],
            [
                [
                    'name' => 'A',
                    'number' => 5,
                    'state' => 2
                ],
                [
                    'name' => 'B',
                    'number' => 7,
                    'state' => 2
                ],
                ['B', 'A'],
            ],
            [
                [
                    'name' => 'A',
                    'number' => 7,
                    'state' => 2
                ],
                [
                    'name' => 'B',
                    'number' => 7,
                    'state' => 2
                ],
                ['A', 'B'],
            ]
        ];
    }

    /**
     * @dataProvider sibalaWithSameColorProvider
     */
    public function testCompareWithSameColor($sibalaA, $sibalaB, $expected)
    {
        $this->assertEquals(
            $expected,
            $this->instance->setSibala($sibalaA)->setSibala($sibalaB)->compare()
        );
    }

    public function sibalaWithSameColorProvider()
    {
        return [
            [
                [
                    'name' => 'A',
                    'number' => 1,
                    'state' => 0
                ],
                [
                    'name' => 'B',
                    'number' => 4,
                    'state' => 0
                ],
                ['A', 'B'],
            ]
        ];
    }
}
