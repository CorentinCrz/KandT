<?php
if (!isset($_POST['id'])){
    header('Location: index.php?error=nopostdataedit');
    exit;
}
require_once "../../includes/connection.php";
require_once "../../includes/functionsAdmin.php";
sqlDoedit($pdo);
header('Location: show.php?id='.(int)$_POST['id']);
