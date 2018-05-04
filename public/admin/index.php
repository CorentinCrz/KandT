<?php
require_once "../../includes/connection.php";
$requete = "SELECT 
    `id`,
    `slug`,
    `title`
FROM 
    `PAGE`
;";
$stmt = $pdo->prepare($requete);
$stmt->execute();
require_once "../../includes/functions.php";
crudHead("Listes des pages");
if (isset($_GET['error'])) {
?>
    <div style="color: red"><?=$_GET['error']?></div>
<?php
}
?>
    <a href="/admin/add.php">Ajouter</a>
    <table cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <th>id</th>
            <th>Title</th>
            <th>Action</th>
        </tr>
        <?php while(false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)):?>
        <tr>
            <td><?=$row['id']?></td>
            <td><?=$row['title']?></td>
            <td>
                <a href="/admin/delete.php?id=<?=$row['id']?>">Supprimer</a>
                <a href="/admin/edit.php?id=<?=$row['id']?>">Modifier</a>
                <a href="/admin/show.php?id=<?=$row['id']?>">details</a>
            </td>
        </tr>
        <?php endwhile;?>
    </table>
</body>
</html>
