<?php
if (!isset($_GET['id'])) {
    header('Location: index.php?error=noidprovidededit');
    exit;
}
require_once "..\connexion.php";
$requete = "SELECT 
    `id`,
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
    <title>Modifier une page</title>
</head>
<body>
<form action="doedit.php" method="post">
    <input type="hidden" name="id" value="<?=$_GET['id']?>>
    <label for="slug">slug</label> <input type="text" name="slug" value="<?=$row['slug']?>"><br>
    <label for="title">title</label> <input type="text" name="title" value="<?=$row['title']?>"><br>
    <label for="h1">h1</label> <input type="text" name="h1" value="<?=$row['h1']?>"><br>
    <label for="p">p</label> <input type="text" name="p" value="<?=$row['p']?>"><br>
    <label for="span-class">span-class</label> <input type="text" name="span-class" value="<?=$row['span-class']?>"><br>
    <label for="span-text">span-text</label> <input type="text" name="span-text" value="<?=$row['span-text']?>"><br>
    <label for="img-alt">img-alt</label> <input type="text" name="img-alt" value="<?=$row['img-alt']?>"><br>
    <label for="img-src">img-src</label> <input type="text" name="img-src" value="<?=$row['img-src']?>"><br>
    <label for="nav-title">nav-title</label> <input type="text" name="nav-title" value="<?=$row['nav-title']?>"><br>
    <input type="submit" value="modifier">
</form>
</body>
</html>