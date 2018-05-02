<?php
/**
 * Created by PhpStorm.
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * Date: 28/03/2018
 * Time: 14:45
 */
try {
    $conn = new PDO('mysql:host=localhost;dbname=kandtG1', 'root', 'root');
    $conn->exec("SET NAMES UTF8");
} catch (PDOException $exception) {
    require "databaseDied.php";
    die($exception->getMessage());
}
