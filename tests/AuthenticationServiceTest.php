<?php
/**
 * Created by PhpStorm.
 * User: JoeyChen
 * Date: 2018/7/16
 * Time: 下午 10:55
 */

namespace JoeyDojo;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery as m;
use PHPUnit\Framework\TestCase;

class AuthenticationServiceTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /**
     * @test
     */
    public function is_valid()
    {
        $target = new AuthenticationService();
        $actual = $target->isValid('joey', '91000000');
        //always failed
        $this->assertTrue($actual);
    }
}