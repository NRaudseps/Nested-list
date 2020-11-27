<?php


namespace App\Services;


use App\Repositories\UserRepository;

class ValidateUserLoginService
{
    protected UserRepository $user;

    public function __construct()
    {
        $this->user = new UserRepository();
    }

    public function execute($post)
    {
        $query = $this->user->getByEmail($post['email']);

        if(!empty($query)){
            return true;
        }
        return false;
    }
}