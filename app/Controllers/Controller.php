<?php


namespace App\Controllers;


use App\Bootstrap\Database;

class Controller
{
    public function index()
    {
        return require_once './resources/views/welcome.view.php';
    }

    public function login()
    {
        return require_once './resources/views/auth/login.view.php';
    }

    public function register()
    {
        return require_once './resources/views/auth/register.view.php';
    }
}