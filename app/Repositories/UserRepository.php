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

    public function getByUsername($username)
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

    public function getByEmail($email)
    {
        $query =  (new Database())
            ->query()
            ->select('*')
            ->from('users')
            ->where('email = :email')
            ->setParameter('email', $email)
            ->execute()
            ->fetchAllAssociative()[0];

        return new User($query['username'], $query['email'], $query['password']);
    }
}