<?php
if (!isset($_POST['title']) || !isset($_POST['img']) ) {
    header('Location: index.php?nopostdata');
    exit;
}
require_once "..\connexion.php";
$sql = "INSERT INTO 
    `PAGE` 
    (
    `url`,
    `slug`,
    `title`,
    `h1`,
    `p`,
    `span-class`,
    `span-text`,
    `img-alt`,
    `img-src`,
    `nav-title`
    )
VALUES 
    (
    :slug,
    :title,
    :h1,
    :p,
    :span-class,
    :span-text,
    :img-alt,
    :img-src,
    :nav-title
    )
;";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':slug', $_POST['slug']);
$stmt->bindValue(':title', $_POST['title']);
$stmt->bindValue(':h1', $_POST['h1']);
$stmt->bindValue(':p', $_POST['p']);
$stmt->bindValue(':span-class', $_POST['span-class']);
$stmt->bindValue(':span-text', $_POST['span-text']);
$stmt->bindValue(':img-alt', $_POST['img-alt']);
$stmt->bindValue(':img-src', $_POST['img-src']);
$stmt->bindValue(':nav-title', $_POST['nav-title']);
$stmt->execute();
header('Location: \index.php?id='.$conn->lastInsertId());