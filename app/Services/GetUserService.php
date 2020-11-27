<?php


namespace App\Services;


use App\Models\User;
use App\Repositories\UserRepository;

class GetUserService
{
    protected UserRepository $user;


    public function __construct()
    {
        $this->user = new UserRepository();
    }

    public function getByEmail($email)
    {
        return $this->user->getByEmail($email);
    }

    public function getByUsername()
    {

    }
}