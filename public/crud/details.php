<?php
if (!isset($_GET['id'])) {
    header('Location: index.php?error=noidprovideddetails');
    exit;
}
require_once "../connexion.php";
$requete = "SELECT 
    `slug`,
    `title`,
    `h1`,
    `p`,
    `span-class`,
    `span-text`,
    `img-alt`,
    `img-src`,
    `nav-title`
FROM 
    `PAGE`
WHERE
    `id` = :id
;";
$stmt = $conn->prepare($requete);
$stmt->bindValue(':id', $_GET['id']);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Details de <?=$row['title']?></title>
</head>
<body>
<h1><?=$row['title']?></h1>
<h2><?=$row['h1']?></h2>
<p>
    <?=$row['slug']?> </br>
    <?=$row['span-class']?> </br>
    <?=$row['span-text']?> </br>
    <?=$row['img-alt']?> </br>
    <?=$row['img-src']?> </br>
    <?=$row['nav-title']?> </br>
</p>
<ul>
    <li><a href="delete.php?id=<?=$_GET['id']?>">Supprimer</a></li>
    <li><a href="edit.php?id=<?=$_GET['id']?>">Modifier</a></li>
</ul>
</body>
</html>
