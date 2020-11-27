<?php


namespace App\Services;


use App\Repositories\UserRepository;

class ValidateUserService
{
    protected UserRepository $user;

    public function __construct()
    {
        $this->user = new UserRepository();
    }

    public function execute($post)
    {
        $query = $this->user->get($post['username']);

        if((!isset($post['password_confirmation'])
            || $post['password'] === $post['password_confirmation'])
            && count($query) === 0){
            return true;
        }
        return false;
    }
}