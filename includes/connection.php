<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=kandtG1', 'root', 'root');
    $pdo->exec("SET NAMES UTF8");
} catch (PDOException $exception) {
    require "databaseDied.php";
    die($exception->getMessage());
}
