<?php
/**
 * Created by PhpStorm.
 * User: JoeyChen
 * Date: 2018/7/16
 * Time: 下午 10:54
 */

namespace JoeyDojo;

class Context
{
    public static $profiles = [
        'joey' => '91',
        'mei' => '99',
    ];

    public static function getPassword($key)
    {
        return static::$profiles[$key];
    }
}