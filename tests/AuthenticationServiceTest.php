<?php
/**
 * Created by PhpStorm.
 * User: JoeyChen
 * Date: 2018/7/16
 * Time: 下午 10:55
 */

namespace JoeyDojo;


use PHPUnit\Framework\TestCase;

class AuthenticationServiceTest extends TestCase
{

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
