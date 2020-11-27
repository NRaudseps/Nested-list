<?php


namespace App\Services;


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

        if($post['password'] === $post['password_confirmation'] && count($query) === 0){
            return true;
        }
        return false;
    }
}