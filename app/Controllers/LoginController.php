<?php


namespace App\Controllers;


class LoginController
{
    public function show()
    {
        return require_once './resources/views/auth/login.view.php';
    }

    public function check()
    {
        
    }
}