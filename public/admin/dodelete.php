<?php
if (!isset($_POST['id'])) {
    header('Location: index.php?error=nopostdatadelete');
    exit;
}
require_once "../../includes/connection.php";
$requete = "DELETE FROM 
`PAGE` 
WHERE 
id = :id
;";
$stmt = $pdo->prepare($requete);
$stmt->bindValue(':id', $_POST['id']);
$stmt->execute();
header('Location: index.php');
