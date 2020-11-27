<?php


namespace App\Repositories;


use App\Bootstrap\Database;
use App\Models\User;

class UserRepository
{
    public function save(User $user)
    {
        (new Database())
            ->query()
            ->insert('users')
            ->values([
                'username' => '?',
                'email' => '?',
                'password' => '?',
            ])
            ->setParameter(0, $user->username())
            ->setParameter(1, $user->email())
            ->setParameter(2, $user->password())
            ->execute();
    }

    public function get($username)
    {
        return (new Database())
            ->query()
            ->select('*')
            ->from('users')
            ->where('username = :username')
            ->setParameter('username', $username)
            ->execute()
            ->fetchAll();
    }
}