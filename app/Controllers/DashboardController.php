<?php


namespace App\Controllers;


class DashboardController
{
    public function index()
    {
        session_start();

        return require_once './resources/views/dashboard.view.php';
    }
}