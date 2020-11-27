<?php


namespace App\Controllers;


use App\Bootstrap\Database;
use App\Services\GetUserService;
use App\Services\SaveUserService;
use App\Services\ValidateUserRegistrationService;
use App\Models\User;

class RegisterController
{
    public function show()
    {
        return require_once './resources/views/auth/register.view.php';
    }

    public function store()
    {
        if((new ValidateUserRegistrationService())->execute($_POST)) {
            (new SaveUserService())->execute($_POST);
            $id = (new GetUserService())->getByEmail($_POST['email'])->id();
            session_start();

            $_SESSION['username'] = $_POST['username'];
            $_SESSION['id'] = $id;

            header("Location: /dashboard");
        } else {
            header("Location: /register?error=Passwords+do+not+match");
        }
    }
}