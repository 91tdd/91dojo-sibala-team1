<?php
/**
 * Created by PhpStorm.
 * User: JoeyChen
 * Date: 2018/7/16
 * Time: 下午 11:09
 */

namespace JoeyDojo;

use Closure;

interface IOrderModel
{
    public function save(Order $order, Closure $insertCallback, Closure $updateCallback);

    public function delete(Closure $predicate);
}