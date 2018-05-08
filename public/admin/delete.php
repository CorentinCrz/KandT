<?php
if (!isset($_GET['id'])) {
    header('Location: index.php?error=noidprovideddelete');
    exit;
}
require_once "../../includes/connection.php";
require_once "../../includes/functionsAdmin.php";
crudHead("T'es sur?");
$row = sqlDelete($pdo);
displayDelete($row);
crudFoot();