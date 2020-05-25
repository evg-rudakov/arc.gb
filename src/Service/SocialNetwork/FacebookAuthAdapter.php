<?php


namespace Service\SocialNetwork;


use Model\Repository\UserRepository;
use Service\User\Security;
use Service\User\SecurityInterface;

class FacebookAuthAdapter implements SocialNetworkAuth
{
    private $facebookAuth;

    public function __construct(FacebookAuth $facebook)
    {
        $this->facebookAuth = $facebook;
    }


    public function authentication(SecurityInterface $security):bool
    {
        //здесь логика создания нового пользователя на основе данных полученных от FB
        //и его логин в сессии
        $fbUser = $this->facebookAuth->login();
        return $security->authentication($fbUser['login'], $fbUser['password']);

    }
}
