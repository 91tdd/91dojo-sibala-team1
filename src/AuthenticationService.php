<?php
/**
 * Created by PhpStorm.
 * User: JoeyChen
 * Date: 2018/7/16
 * Time: 下午 10:53
 */

namespace JoeyDojo;


class AuthenticationService
{
    public function isValid($account, $password)
    {
        // 根據 account 取得自訂密碼
        $profileDao = new ProfileDao();
        $passwordFromDao = $profileDao->getPassword($account);
        // 根據 account 取得 RSA token 目前的亂數
        $rsaToken = new RsaTokenDao();
        $randomCode = $rsaToken->getRandom($account);
        // 驗證傳入的 password 是否等於自訂密碼 + RSA token亂數
        $validPassword = $passwordFromDao . $randomCode;
        $isValid = $password === $validPassword;
        if ($isValid) {
            return true;
        } else {
            return false;
        }
    }
}

