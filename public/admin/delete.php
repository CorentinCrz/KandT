<?php
if (!isset($_GET['id'])) {
    header('Location: index.php?error=noidprovideddelete');
    exit;
}
require_once "../../includes/connection.php";
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
$stmt = $pdo->prepare($requete);
$stmt->bindValue(':id', $_GET['id']);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
require_once "../../includes/functions.php";
crudHead("T'es sur?");
?>
<form action="dodelete.php" method="post">
    <input type="hidden" name="id" value="<?=$row['id']?>">
    <label for="">T'es sur de vouloir supprimer <?=$row['title']?></label><br>
    <input type="submit" value="Je suis certain! OUIIII!">
</form>
</body>
</html>