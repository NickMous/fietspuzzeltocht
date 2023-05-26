<?php

ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params(['lifetime' => 3600, 'samesite' => 'Secure']);

session_start();

$host = 'localhost';
$db   = 'fietspuzzeltocht';
$user = 'bit_academy';
$pass = 'bit_academy';

$dsn = "mysql:host=$host;dbname=$db;";

try {
    $pdo = new PDO($dsn, $user, $pass);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}