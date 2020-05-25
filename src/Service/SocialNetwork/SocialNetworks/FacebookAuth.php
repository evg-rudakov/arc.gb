<?php


namespace Service\SocialNetwork;


class FacebookAuth
{
    public function connect(){
        //здесь логика соединения с FB
    }

    public function logIn(){
        //здесь логика аутентификации
        $user = [
            'login'=>'newFbUser',
            'password'=>'fbUser@gmail.com'
        ];

        return $user;
    }
}
