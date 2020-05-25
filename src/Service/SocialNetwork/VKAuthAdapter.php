<?php


namespace Service\SocialNetwork;


use Service\User\SecurityInterface;

class VKAuthAdapter implements SocialNetworkAuth
{
    private $vkAuth;
    public function __construct( VKAuth $vk)
    {
        $this->vkAuth = $vk;
    }

    public function authentication(SecurityInterface $security): bool
    {
        //здесь логика создания нового пользователя на основе данных полученных от FB
        //и сохранения его в сессии
        $fbUser = $this->vkAuth->login();
        return $security->authentication($fbUser['login'], $fbUser['password']);
    }
}
