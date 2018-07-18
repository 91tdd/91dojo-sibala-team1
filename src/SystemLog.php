<?php
/**
 * Created by PhpStorm.
 * User: JoeyChen
 * Date: 2018/7/18
 * Time: 下午 02:53
 */

namespace JoeyDojo;


class SystemLog implements  Logger
{

    /**
     * SystemLog constructor.
     */
    public function __construct()
    {
    }

    public function save($message)
    {
        echo $message;
    }
}