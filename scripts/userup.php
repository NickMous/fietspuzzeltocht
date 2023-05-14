<?php

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

$sql = 'SELECT * FROM userdata WHERE id=?;';
$usersearch = $pdo->prepare($sql);
$usersearch->execute([$_REQUEST["id"]]);
$user = $usersearch->fetch();

$sql = 'UPDATE userdata SET checkpoint=?, QUESTION=? WHERE id=?';
$update = $pdo->prepare($sql);
$update->execute([$user["checkpoint"] + 1, $_REQUEST["q"], $_REQUEST["id"]]);