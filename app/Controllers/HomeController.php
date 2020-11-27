<?php


namespace App\Controllers;


use App\Bootstrap\Database;

class HomeController
{
    public function index()
    {
        session_start();
        return require_once './resources/views/welcome.view.php';
    }
}