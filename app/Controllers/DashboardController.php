<?php


namespace App\Controllers;


use App\Bootstrap\Database;

class DashboardController
{
    public function index()
    {
        session_start();

        $sections = (new Database())
            ->query()
            ->select('*')
            ->from('sections')
            ->where('parent_id is NULL')
            ->execute()
            ->fetchAllAssociative();

        return require_once './resources/views/dashboard.view.php';
    }
}