<?php
/**
 * Created by PhpStorm.
 * User: JoeyChen
 * Date: 2018/7/16
 * Time: 下午 11:10
 */

namespace JoeyDojo;

use Closure;
use Exception;

class MyOrderModel implements IOrderModel
{
    private $repository;

    public function __construct(IRepository $repository)
    {
        $this->repository = $repository;
    }

    public function save(Order $order, Closure $insertCallback, Closure $updateCallback)
    {
        if (!$this->repository->isExist($order)) {
            $this->repository->insert($order);
            $insertCallback($order);
        } else {
            $this->repository->update($order);
            $updateCallback($order);
        }
    }

    public function delete(Closure $predicate)
    {
        throw new Exception('Not implemented');
    }
}