<?php


namespace App\Bootstrap;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Query\QueryBuilder;

class Database
{
    public function database(): Connection
    {
        $connectionParams = array(
            'dbname' => 'nested_list',
            'user' => 'root',
            'password' => 'Myroo1!!',
            'host' => 'localhost',
            'driver' => 'pdo_mysql',
        );

        $connection = DriverManager::getConnection($connectionParams);
        $connection->connect();

        return $connection;
    }

    public function query(): QueryBuilder
    {
        return $this->database()->createQueryBuilder();
    }
}