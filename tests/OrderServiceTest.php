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
    private $orderService;
    private $spyBookDao;
    use MockeryPHPUnitIntegration;

    protected function setUp()
    {
        parent::setUp();
        $this->orderService = new OrderServiceForTest();
    }

    /**
     * @test
     */
    public function sync_3_orders_only_2_book_orders()
    {
        $this->givenOrders(array('Book', 'CD', 'Book'));
        $this->givenBookDao();

        $this->orderService->syncBookOrders();

        $this->bookDaoShouldInsertTimes(2);
    }

    protected function makeOrder($type)
    {
        $order = new Order();
        $order->type = $type;
        return $order;
    }

    /**
     * @return array
     */
    private function makeOrders($types)
    {
        $orders = array();
        foreach ($types as $type) {
            $orders[] = $this->makeOrder($type);
        }
        return $orders;
    }

    /**
     * @param $types
     */
    private function givenOrders($types)
    {
        $this->orderService->setOrders($this->makeOrders($types));
    }

    private function givenBookDao()
    {
        $this->spyBookDao = m::spy(BookDao::class);
        $this->orderService->setBookdao($this->spyBookDao);
    }

    private function bookDaoShouldInsertTimes($times)
    {
        $this->spyBookDao->shouldHaveReceived('insert')
            ->times($times)
            ->with(m::on(function (Order $o) {
                return $o->type === 'Book';
            }));
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
