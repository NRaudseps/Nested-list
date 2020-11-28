<?php


namespace App\Services\User;


use App\Repositories\UserRepository;

class SaveUserService
{
    protected UserRepository $user;

    public function __construct()
    {
        $this->user = new UserRepository();
    }

    public function execute($post)
    {
        $this->user->save($post);
    }
}