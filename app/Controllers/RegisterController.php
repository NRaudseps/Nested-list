<?php


namespace App\Controllers;


use App\Bootstrap\Database;

class RegisterController
{
    public function store()
    {
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        if(isset($_POST)) {
            (new Database())
                ->query()
                ->insert('users')
                ->values([
                    'username' => '?',
                    'email' => '?',
                    'password' => '?',
                ])
                ->setParameter(0, $_POST['username'])
                ->setParameter(1, $_POST['email'])
                ->setParameter(2, $password)
                ->execute();
        }

        header("Location: /");
    }
}