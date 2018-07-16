<?php
/**
 * Created by PhpStorm.
 * User: JoeyChen
 * Date: 2018/7/16
 * Time: 下午 10:58
 */

namespace JoeyDojo;

use Exception;

class BookDao
{
    public function insert(Order $order)
    {
        // directly depend on some web service
        // $client = new HttpClient();
        // $response = $client->post("http://api.joey.io/Order", $order);
        // $response->statusCode();
        throw new Exception('Not implemented');
    }
}