<?php
/**
 * Created by PhpStorm.
 * User: JoeyChen
 * Date: 2018/7/16
 * Time: 下午 10:54
 */

namespace JoeyDojo;

class ProfileDao implements Profile
{
    public function getPassword($account)
    {
        return Context::getPassword($account);
    }
}