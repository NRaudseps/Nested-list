<?php


namespace App\Controllers;


class HomeController
{
    public function index()
    {
        session_start();
        return require_once './resources/views/welcome.view.php';
    }
}