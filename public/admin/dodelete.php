<?php
if (!isset($_POST['id'])) {
    header('Location: index.php?error=nopostdatadelete');
    exit;
}
require_once "../../includes/connection.php";
require_once "../../includes/functionsAdmin.php";
sqlDodelete($pdo);
header('Location: index.php');
