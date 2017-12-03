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
     * @dataProvider sibalaProvider
     */
    public function testCompare($sibalaA, $sibalaB, $expected)
    {
        $this->assertSame(
            $expected,
            $this->instance->setSibala($sibalaA)->setSibala($sibalaB)->compare()
        );
    }

    public function sibalaProvider()
    {
        return [
            [
                [
                    'name' => 'A',
                    'number' => 2,
                    'state' => 2
                ],
                [
                    'name' => 'B',
                    'number' => 2,
                    'state' => 0
                ],
                ['B', 'A'],
            ]
        ];
    }
}
