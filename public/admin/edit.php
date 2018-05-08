<?php
if (!isset($_GET['id'])) {
    header('Location: index.php?error=noidprovidededit');
    exit;
}
require_once "../../includes/connection.php";
require_once "../../includes/functionsAdmin.php";
crudHead('Modifier une page');
$row = sqlEdit($pdo);
displayEdit($row);
crudFoot();