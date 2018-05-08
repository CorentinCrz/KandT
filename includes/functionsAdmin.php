<?php
/**
 * header html
 * @param string $title
 * @return void
 */
function crudHead(string $title): void
{
    ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title><?= $title ?></title>
        <style>
            td, th {
                border: 1px solid #128f27;
            }
        </style>
    </head>
    <body>
    <header>
        <h1><a href="/">retour sur KandT</a></h1>
        <h1><a href="/admin"> retour sur la home de l'admin</a></h1>
    </header>
    <?php
}

/**
 * footer html
 *
 * @return void
 */
function crudFoot(): void
{
    ?>
    </body>
    </html>
    <?php
}

/**
 * @param $pdo
 *
 * @return PDOStatement $stmt
 */
function sqlIndex($pdo)
{
    $requete = "SELECT 
    `id`,
    `slug`,
    `title`
FROM 
    `PAGE`
;";
    $stmt = $pdo->prepare($requete);
    $stmt->execute();

    return $stmt;
}

/**
 * @param PDOStatement $stmt
 *
 * @return void
 */
function displayIndex(PDOStatement $stmt): void
{
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
    <?php
}

/**
 * @param $pdo
 *
 * @return $row
 */
function sqlShow($pdo)
{
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
    $stmt = $pdo->prepare($requete);
    $stmt->bindValue(':id', $_GET['id']);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}

/**
 * @param $row
 *
 * @return void
 */
function displayShow($row): void
{
    ?>
    <h1><?=$row['title']?></h1>
    <h2><?=$row['h1']?></h2>
    <p>
        <?=$row['slug']?> </br>
        <?=$row['p']?> </br>
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
    <?php
}

/**
 *
 *
 * @return void
 */
function displayAdd(): void
{
    ?>
    <form action="/admin/doadd.php" method="post">
        <label for="slug">slug</label> <input type="text" name="slug"><br>
        <label for="title">title</label> <input type="text" name="title"><br>
        <label for="h1">h1</label> <input type="text" name="h1"><br>
        <label for="p">p</label> <input type="text" name="p"><br>
        <label for="span-class">span-class</label> <input type="text" name="span-class"><br>
        <label for="span-text">span-text</label> <input type="text" name="span-text"><br>
        <label for="img-alt">img-alt</label> <input type="text" name="img-alt"><br>
        <label for="img-src">img-src</label> <input type="text" name="img-src"><br>
        <label for="nav-title">nav-title</label> <input type="text" name="nav-title"><br>
        <input type="submit" value="Ajouter">
    </form>
    <?php
}

/**
 * @param $pdo
 *
 * @return : void
 */
function sqlDoadd($pdo): void
{
    $sql = "INSERT INTO
      `PAGE`
      (
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
        :spanClass,
        :spanText,
        :imgAlt,
        :imgSrc,
        :navTitle
      )
    ;";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':slug', htmlentities($_POST['slug']));
    $stmt->bindValue(':title', htmlentities($_POST['title']));
    $stmt->bindValue(':h1', htmlentities($_POST['h1']));
    $stmt->bindValue(':p', htmlentities($_POST['p']));
    $stmt->bindValue(':spanClass', htmlentities($_POST['span-class']));
    $stmt->bindValue(':spanText', htmlentities($_POST['span-text']));
    $stmt->bindValue(':imgAlt', htmlentities($_POST['img-alt']));
    $stmt->bindValue(':imgSrc', htmlentities($_POST['img-src']));
    $stmt->bindValue(':navTitle', htmlentities($_POST['nav-title']));
    $stmt->execute();
}

/**
 * @param $pdo
 *
 * @return $row
 */
function sqlEdit($pdo)
{
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

    return $row;
}

/**
 *
 *
 * @return void
 */
function displayEdit($row): void
{
    ?>
    <form action="doedit.php" method="post">
        <input type="hidden" name="id" value="<?=$row['id']?>">
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
    <?php
}

/**
 * @param $pdo
 *
 * @return : void
 */
function sqlDoedit($pdo): void
{
    $requete = "UPDATE 
        `PAGE` 
    SET 
        `id` = :id,
        `slug` = :slug,
        `title` = :title,
        `h1` = :h1,
        `p` = :p,
        `span-class` = :spanClass,
        `span-text` = :spanText,
        `img-alt` = :imgAlt,
        `img-src` = :imgSrc,
        `nav-title` = :navTitle
    WHERE 
        id = :id
    ;";
    $stmt = $pdo->prepare($requete);
    $stmt->bindValue(':id', (int)htmlentities($_POST['id']));
    $stmt->bindValue(':slug', htmlentities($_POST['slug']));
    $stmt->bindValue(':title', htmlentities($_POST['title']));
    $stmt->bindValue(':h1', htmlentities($_POST['h1']));
    $stmt->bindValue(':p', htmlentities($_POST['p']));
    $stmt->bindValue(':spanClass', htmlentities($_POST['span-class']));
    $stmt->bindValue(':spanText', htmlentities($_POST['span-text']));
    $stmt->bindValue(':imgAlt', htmlentities($_POST['img-alt']));
    $stmt->bindValue(':imgSrc', htmlentities($_POST['img-src']));
    $stmt->bindValue(':navTitle', htmlentities($_POST['nav-title']));
    $stmt->execute();
}

/**
 * @param $pdo
 *
 * @return $row
 */
function sqlDelete($pdo)
{
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

    return $row;
}

/**
 *
 *
 * @return void
 */
function displayDelete($row): void
{
    ?>
    <form action="dodelete.php" method="post">
        <input type="hidden" name="id" value="<?=$row['id']?>">
        <label for="">T'es sur de vouloir supprimer <?=$row['title']?></label><br>
        <input type="submit" value="Je suis certain! OUIIII!">
    </form>
    <?php
}

/**
 * @param $pdo
 *
 * @return : void
 */
function sqlDodelete($pdo): void
{
    $requete = "DELETE FROM 
    `PAGE` 
    WHERE 
    id = :id
    ;";
    $stmt = $pdo->prepare($requete);
    $stmt->bindValue(':id', $_POST['id']);
    $stmt->execute();
}

