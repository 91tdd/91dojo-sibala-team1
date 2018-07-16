<?php
/**
 * Created by PhpStorm.
 * User: JoeyChen
 * Date: 2018/7/16
 * Time: 下午 11:09
 */

namespace JoeyDojo;

interface IRepository
{
    public function isExist(Order $order);

    public function insert(Order $order);

    public function update(Order $order);
}