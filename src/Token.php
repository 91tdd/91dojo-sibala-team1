<?php
/**
 * Created by PhpStorm.
 * User: JoeyChen
 * Date: 2018/7/18
 * Time: 下午 01:14
 */

namespace JoeyDojo;

interface Token
{
    public function getRandom($account);
}