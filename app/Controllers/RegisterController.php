<?php


namespace App\Controllers;


use App\Bootstrap\Database;
use App\Services\SaveUserService;
use App\Services\ValidateUserService;
use App\Models\User;

class RegisterController
{
    public function show()
    {
        return require_once './resources/views/auth/register.view.php';
    }

    public function store()
    {
        if((new ValidateUserService())->execute($_POST)) {
            $user = new User(
                $_POST['username'],
                $_POST['email'],
                password_hash($_POST['password'], PASSWORD_BCRYPT)
            );

            (new SaveUserService)->execute($user);

            header("Location: /");
        } else {
            header("Location: /register?error=Passwords+do+not+match");
        }
    }
}