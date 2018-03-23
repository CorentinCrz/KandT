<?php
if (!isset($_POST['id'])){
    header('Location: index.php?error=nopostdataedit');
    exit;
}
require_once "..\connexion.php";
$requete = "UPDATE 
    `PAGE` 
SET 
    `id` = :id,
    `slug` = :slug,
    `title` = :title,
    `h1` = :h1,
    `p` = :p,
    `span-class` = :span-class,
    `span-text` = :span-text,
    `img-alt` = :img-alt,
    `img-src` = :img-src,
    `nav-title` = :nav-title
WHERE 
    id = :id
;";
$stmt = $conn->prepare($requete);
$stmt->bindValue(':id', (int)$_POST['id']);
$stmt->bindValue(':slug', $_POST['slug']);
$stmt->bindValue(':title', $_POST['title']);
$stmt->bindValue(':h1', $_POST['h1']);
$stmt->bindValue(':p', $_POST['p']);
$stmt->bindValue(':span-class', $_POST['span-class']);
$stmt->bindValue(':span-text', $_POST['span-text']);
$stmt->bindValue(':img-alt', $_POST['img-alt']);
$stmt->bindValue(':img-src', $_POST['img-src']);
$stmt->execute();
header('Location: ..\index.php?id='.(int)$_POST['id']);
