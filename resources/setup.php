<?php

session_start();

$path = realpath(__DIR__ . '/../');
$dotenv = \Dotenv\Dotenv::createImmutable($path);
$dotenv->load();

$appName = $_ENV['APP_NAME'];
$userId = $_SESSION['id'];
$username = $_SESSION['username'];
$link = $_SERVER['HTTP_HOST'];


function can()
{
    return empty(!$_SESSION);
}

function dd($input)
{
    return die(var_dump($input));
}
