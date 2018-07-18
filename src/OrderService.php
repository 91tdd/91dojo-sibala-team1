<?php
/**
 * Created by PhpStorm.
 * User: JoeyChen
 * Date: 2018/7/16
 * Time: 下午 10:57
 */

namespace JoeyDojo;


class OrderService
{
    private $filePath = __DIR__ . '/testOrders.csv';

    public function syncBookOrders()
    {
        $orders = $this->getOrders();
        // only get orders of book
        $ordersOfBook = array_filter($orders, function ($order) {
            return $order->type === 'Book';
        });
        $bookDao = $this->getBookDao();
        foreach ($ordersOfBook as $order) {
            $bookDao->insert($order);
        }
    }

    protected function getOrders()
    {
        // parse csv file to get orders
        return array_map(function ($line) {
            return $this->mapping($line);
        }, array_map('str_getcsv', file($this->filePath)));
    }

    private function mapping($line)
    {
        $order = new Order;
        $order->productName = $line[0];
        $order->type = $line[1];
        $order->price = (int)$line[2];
        $order->customerName = $line[3];
        return $order;
    }

    /**
     * @return BookDao
     */
    protected function getBookDao()
    {
        $bookDao = new BookDao();
        return $bookDao;
    }
}

