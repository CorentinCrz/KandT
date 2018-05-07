<?php
if (!isset($_POST['title']) || !isset($_POST['slug']) ) {
    header('Location: index.php?nopostdata');
    exit;
}
require_once "../../includes/connection.php";
require_once "../../includes/functionsAdmin.php";
sqlDoadd($pdo);
header('Location: show.php?id='.$pdo->lastInsertId());