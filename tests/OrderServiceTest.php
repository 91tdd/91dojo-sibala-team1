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
        $orderService = new OrderServiceForTest();
        $order1 = $this->makeOrder('Book');
        $order2 = $this->makeOrder('CD');
        $order3 = $this->makeOrder('Book');

        $orders = array($order1, $order2, $order3);
        $orderService->setOrders($orders);

        $mockBookDao = m::spy(BookDao::class);
        $orderService->setBookdao($mockBookDao);

        $orderService->syncBookOrders();

        $mockBookDao->shouldHaveReceived('insert')
            ->twice()
            ->with(m::on(function (Order $o) {
                return $o->type === 'Book';
            }));
    }

    protected function makeOrder($type)
    {
        $order = new Order();
        $order->type = $type;
        return $order;
    }
}

class OrderServiceForTest extends OrderService
{
    private $orders;
    private $bookDao;

    public function setBookdao(BookDao $bookDao)
    {
        $this->bookDao = $bookDao;
    }

    protected function getBookDao()
    {
        return $this->bookDao;
    }

    public function setOrders($ordrs)
    {
        $this->orders = $ordrs;
    }

    protected function getOrders()
    {
        return $this->orders;
    }


}
