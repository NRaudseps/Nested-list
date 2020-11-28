<?php


namespace App\Controllers;

use App\Services\Section\GetDashboardService;

class DashboardController
{
    public function index()
    {
        session_start();

        $sections = (new GetDashboardService())->execute($_SESSION['id']);

        return require_once './resources/views/dashboard.view.php';
    }
}