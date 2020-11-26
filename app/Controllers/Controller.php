<?php


namespace App\Controllers;


class Controller
{
    public function index()
    {
        return require_once './resources/views/home.view.php';
    }
}