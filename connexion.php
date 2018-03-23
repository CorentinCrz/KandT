<?php
try {
    $conn = new PDO('mysql:host=localhost;dbname=KandT', 'root', 'root');
} catch(PDOException $exception) {
    die("PDO error");
}
