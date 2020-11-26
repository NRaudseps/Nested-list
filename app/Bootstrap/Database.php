<?php


namespace App\Bootstrap;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Query\QueryBuilder;
use Dotenv\Dotenv;

class Database
{
    public function database($path = null): Connection
    {
        $path = realpath($path) ?? realpath('');
        $dotenv = Dotenv::createImmutable($path);
        $dotenv->load();

        $connectionParams = array(
            'dbname' => $_ENV['DB_DATABASE'],
            'user' => $_ENV['DB_USER'],
            'password' => $_ENV['DB_PASSWORD'],
            'host' => $_ENV['DB_HOST'],
            'driver' => 'pdo_mysql',
        );

        $connection = DriverManager::getConnection($connectionParams);
        $connection->connect();

        return $connection;
    }

    public function query($path = null): QueryBuilder
    {
        return $this->database($path)->createQueryBuilder();
    }
}