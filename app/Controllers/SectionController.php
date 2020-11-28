<?php


namespace App\Controllers;


use App\Bootstrap\Database;

class SectionController
{
    public function show($id)
    {
        session_start();

        $sections = (new Database())
            ->query()
            ->select('*')
            ->from('sections')
            ->where('parent_id = :id AND user_id = :user_id')
            ->setParameter('id', $id)
            ->setParameter('user_id', $_SESSION['id'])
            ->execute()
            ->fetchAllAssociative();

        return require_once './resources/views/sections/section.view.php';
    }

    public function create()
    {
        return require_once './resources/views/sections/create_section.view.php';
    }

    public function store()
    {
        session_start();

        $url = '/section/' . $_POST['parent_id'];
        if($_POST['parent_id'] === ''){
            $_POST['parent_id'] = null;
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
            ->setParameter(1, $_POST['parent_id'])
            ->setParameter(2, $_POST['name'])
            ->setParameter(3, $_POST['description'])
            ->execute();


        header("Location: {$url}");
    }

    public function edit($id)
    {
        return require_once './resources/views/sections/edit_section.view.php';
    }

    public function update($id)
    {
        session_start();

        $url = '/section/' . $_POST['parent_id'];
        if($_POST['parent_id'] === ''){
            $_POST['parent_id'] = null;
            $url = '/dashboard';
        }

        (new Database())
            ->query()
            ->update('sections')
            ->set('name', '?')
            ->set('description', '?')
            ->where('id', '?')
            ->setParameter(0, $_POST['name'])
            ->setParameter(1, $_POST['description'])
            ->setParameter(2, $id)
            ->execute();

        header("Location: {$url}");
    }

    public function destroy($id)
    {
        session_start();

        $url = '/section/' . $_POST['parent_id'];
        if($_POST['parent_id'] === ''){
            $_POST['parent_id'] = null;
            $url = '/dashboard';
        }

        (new Database())
            ->query()
            ->delete('sections')
            ->where('id = :id')
            ->setParameter('id', $id)
            ->execute();

        header("Location: {$url}");
    }
}