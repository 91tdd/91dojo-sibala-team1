<?php
/**
 * Created by PhpStorm.
 * User: JoeyChen
 * Date: 2018/7/16
 * Time: 下午 10:59
 */

namespace JoeyDojo;


use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery as m;
use PHPUnit\Framework\TestCase;

class OrderServiceTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /**
     * @test
     */
    public function sync_3_orders_only_2_book_orders()
    {

    }
}
