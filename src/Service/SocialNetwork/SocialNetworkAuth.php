<?php


namespace Service\SocialNetwork;


use Model\Repository\UserRepository;
use Service\User\SecurityInterface;

interface SocialNetworkAuth
{
    public function authentication(SecurityInterface $security):bool ;
}
