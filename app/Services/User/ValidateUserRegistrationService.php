<?php


namespace App\Services\User;


use App\Repositories\UserRepository;

class ValidateUserRegistrationService
{
    protected UserRepository $user;

    public function __construct()
    {
        $this->user = new UserRepository();
    }

    public function execute($post)
    {
        $query = $this->user->getByUsername($post['username']);

        if ($post['password'] === $post['password_confirmation'] && empty($query)) {
            return true;
        }

        return false;
    }
}