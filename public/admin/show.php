<?php
if (!isset($_GET['id'])) {
    header('Location: index.php?error=noidprovideddetails');
    exit;
}
require_once "../../includes/connection.php";
require_once "../../includes/functionsAdmin.php";
$row = sqlShow($pdo);
crudHead("Details de " . $row['title']);
displayShow($row);
crudFoot();