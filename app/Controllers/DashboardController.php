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
            ->where('parent_id is NULL AND user_id = :user_id')
            ->setParameter('user_id', $_SESSION['id'])
            ->execute()
            ->fetchAllAssociative();

//        die(var_dump($sections));

        return require_once './resources/views/dashboard.view.php';
    }
}