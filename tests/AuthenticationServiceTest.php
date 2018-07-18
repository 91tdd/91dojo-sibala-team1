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
    public function test_is_valid()
    {
        $target = new AuthenticationService(new FakeProfile(), new FakeToken());
        $actual = $target->isValid('joey', '91000000');
        $this->assertTrue($actual);
    }
}

class FakeProfile implements Profile
{

    public function getPassword($account)
    {
        if ($account == 'joey') {
            return '91';
        }
        return '';
    }
}

class FakeToken implements Token
{

    public function getRandom($account)
    {
        return '000000';
    }
}
