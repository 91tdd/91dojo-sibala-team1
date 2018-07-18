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
    private $profile;
    private $token;
    private $logger;

    /**
     * AuthenticationService constructor.
     * @param $profile
     * @param $token
     */
    public function __construct(Profile $profile = null, Token $token = null, Logger $logger = null)
    {
        $this->profile = $profile ?: new ProfileDao();
        $this->token = $token ?: new RsaTokenDao();
        $this->logger = $logger ?: new SystemLog();
    }

    public function isValid($account, $password)
    {
        // 根據 account 取得自訂密碼
        $passwordFromDao = $this->profile->getPassword($account);

        // 根據 account 取得 RSA token 目前的亂數
        $randomCode = $this->token->getRandom($account);

        // 驗證傳入的 password 是否等於自訂密碼 + RSA token亂數
        $validPassword = $passwordFromDao . $randomCode;
        $isValid = $password === $validPassword;
        if ($isValid) {
            return true;
        } else {
            $message = sprintf('account:%s try to login failed', $account);
            $this->logger->save($message);
            return false;
        }
    }
}

