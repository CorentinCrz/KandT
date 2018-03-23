<?php
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
;";
$stmt = $conn->prepare($requete);
$stmt->execute();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liste des pages</title>
    <style>
        td, th {
            border: 1px solid #128f27;
        }
    </style>
</head>
<body>
<?php
if (isset($_GET['error'])) {
?>
    <div style="color: red"><?=$_GET['error']?></div>
<?php
}
?>
    <h1>back office</h1>
    <a href="\crud\add.php">Ajouter</a>
    <table cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <th>id</th>
            <th>Title</th>
            <th>h1</th>
            <th>Action</th>
        </tr>
        <?php while(false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)):?>
        <tr>
            <td><?=$row['id']?></td>
            <td><?=$row['title']?></a></td>
            <td><?=$row['h1']?></td>
            <td>
                <a href="\crud\delete.php?id=<?=$row['id']?>">Supprimer</a>
                <a href="\crud\edit.php?id=<?=$row['id']?>">Modifier</a>
                <a href="\crud\details.php?id=<?=$row['id']?>">details</a>
            </td>
        </tr>
        <?php endwhile;?>
    </table>
</body>
</html>
