<?php


namespace App\Controllers;


use Dotenv\Dotenv;

class HomeController
{
    public function index()
    {
        session_start();

        $path = realpath(__DIR__ . '/../../');
        $dotenv = Dotenv::createImmutable($path);
        $dotenv->load();

        return require_once './resources/views/welcome.view.php';
    }
}