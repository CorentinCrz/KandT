<?php
if (!isset($_POST['title']) || !isset($_POST['slug']) ) {
    header('Location: index.php?error=nopostdata');
    exit;
}
require_once "../../includes/connection.php";
require_once "../../includes/functionsAdmin.php";
$stmt = sqlIndex($pdo);
while(false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)):
    if ($row['slug'] === $_POST['slug']){
        header('Location: index.php?error=wrongslug');
        exit;
    }
endwhile;
sqlDoadd($pdo);
header('Location: show.php?id='.$pdo->lastInsertId());