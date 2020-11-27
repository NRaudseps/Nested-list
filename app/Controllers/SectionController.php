<?php


namespace App\Controllers;


use App\Bootstrap\Database;

class SectionController
{
    public function index()
    {
        session_start();

        $index = explode('/', $_SERVER['REQUEST_URI'])[2];


        $sections = (new Database())
            ->query()
            ->select('*')
            ->from('sections')
            ->where('parent_id = :id')
            ->setParameter('id', $index)
            ->execute()
            ->fetchAllAssociative();

        return require_once './resources/views/section.view.php';
    }

    public function create()
    {
        session_start();

        return require_once './resources/views/createSection.view.php';
    }

    public function store()
    {
        session_start();

        $url = '/section/' . $_POST['id'];
        if($_POST['id'] === ''){
            $_POST['id'] = null;
            $url = '/dashboard';
        }

        (new Database())
            ->query()
            ->insert('sections')
            ->values([
                'user_id' => '?',
                'parent_id' => '?',
                'name' => '?',
                'description' => '?'
            ])
            ->setParameter(0, $_SESSION['id'])
            ->setParameter(1, $_POST['id'])
            ->setParameter(2, $_POST['name'])
            ->setParameter(3, $_POST['description'])
            ->execute();


        header("Location: {$url}");
    }
}