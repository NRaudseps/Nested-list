<?php


namespace App\Controllers;


use App\Repositories\UserRepository;
use App\Services\GetUserService;
use App\Services\ValidateUserLoginService;

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
        // Initialize the session.
        // If you are using session_name("something"), don't forget it now!
        session_start();

        // Unset all of the session variables.
        $_SESSION = array();

        // If it's desired to kill the session, also delete the session cookie.
        // Note: This will destroy the session, and not just the session data!
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        // Finally, destroy the session.
        session_destroy();

        header("Location: /");
    }
}