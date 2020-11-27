<?php


namespace App\Services;


use App\Bootstrap\Database;
use App\Models\User;
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