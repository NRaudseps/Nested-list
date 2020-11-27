<?php


namespace App\Repositories;


use App\Bootstrap\Database;
use App\Models\User;

class UserRepository
{
    public function save($post)
    {
        (new Database())
            ->query()
            ->insert('users')
            ->values([
                'username' => '?',
                'email' => '?',
                'password' => '?',
            ])
            ->setParameter(0, $post['username'])
            ->setParameter(1, $post['email'])
            ->setParameter(2, password_hash($post['password'], PASSWORD_BCRYPT))
            ->execute();
    }

    public function getByUsername($username)
    {
        $query = (new Database())
            ->query()
            ->select('*')
            ->from('users')
            ->where('username = :username')
            ->setParameter('username', $username)
            ->execute()
            ->fetch();

        return empty($query) ? [] :
            new User($query['id'], $query['username'], $query['email'], $query['password']);
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

        return new User($query['id'], $query['username'], $query['email'], $query['password']);
    }
}