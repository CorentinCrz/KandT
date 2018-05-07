<?php
require_once "../../includes/connection.php";
require_once "../../includes/functionsAdmin.php";
crudHead("Liste des pages");
if (isset($_GET['error'])) {
?>
    <div style="color: red"><?=$_GET['error']?></div>
<?php
}
$stmt = sqlIndex($pdo);
displayIndex($stmt);
crudFoot();

