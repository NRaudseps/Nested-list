<?php


namespace App\Controllers;


use App\Services\User\GetUserService;
use App\Services\User\ValidateUserLoginService;

class LoginController
{
    public function show()
    {
        return require_once './resources/views/auth/login.view.php';
    }

    public function check()
    {
        if ((new ValidateUserLoginService())->execute($_POST)) {
            session_start();
            $user = (new GetUserService())->getByEmail($_POST['email']);
            $_SESSION['username'] = $user->username();
            $_SESSION['id'] = $user->id();

            header("Location: /dashboard");
        } else {
            header("Location: /login");
        }
    }

    public function logout()
    {
        session_start();

        $_SESSION = [];

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();

        header("Location: /");
    }
}