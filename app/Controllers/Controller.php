<?php


namespace App\Controllers;


use App\Bootstrap\Database;

class Controller
{
    public function index()
    {
        $db = new Database();
        die(var_dump($db->query()->select('*')->from('user')->execute()->fetchAll()));
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