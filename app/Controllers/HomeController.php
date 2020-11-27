<?php


namespace App\Controllers;


use App\Bootstrap\Database;

class HomeController
{
    public function index()
    {
        return require_once './resources/views/welcome.view.php';
    }
}