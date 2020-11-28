<?php


namespace App\Controllers;


use App\Services\User\GetUserService;
use App\Services\User\SaveUserService;
use App\Services\User\ValidateUserRegistrationService;

class RegisterController
{
    public function show()
    {
        return require_once './resources/views/auth/register.view.php';
    }

    public function store()
    {
        if ((new ValidateUserRegistrationService())->execute($_POST)) {
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