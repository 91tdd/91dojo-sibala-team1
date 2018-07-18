<?php
/**
 * Created by PhpStorm.
 * User: JoeyChen
 * Date: 2018/7/16
 * Time: 下午 10:54
 */

namespace JoeyDojo;

class RsaTokenDao implements Token
{
    public function getRandom($account)
    {
        return sprintf('%06d', mt_rand(0, 999999));
    }
}