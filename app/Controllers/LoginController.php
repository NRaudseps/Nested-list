<?php


namespace App\Controllers;


use App\Services\ValidateUserLoginService;

class LoginController
{
    public function show()
    {
        return require_once './resources/views/auth/login.view.php';
    }

    public function check()
    {
        if((new ValidateUserLoginService())->execute($_POST)){
            header("Location: /");
        }
    }
}