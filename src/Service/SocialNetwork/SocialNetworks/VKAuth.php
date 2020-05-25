<?php


namespace Service\SocialNetwork;


class VKAuth
{
    public function connect(){
        //здесь логика соединения с VK
    }

    public function logIn(){
        //здесь логика аутентификации
        $user = [
            'name'=>'newVKUser',
            'email'=>'vkUser@gmail.com'
        ];

        return $user;
    }

}
