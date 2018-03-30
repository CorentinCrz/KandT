<?php
require_once "connexion.php";
// definition de la page par defaut
define('APP_DEFAUT_PAGE', 'teletubbies');
define('APP_PAGE_PARAM', 'p');
// est-ce que j'ai le parametre p dans l'url? (isset)
if (isset($_GET[APP_PAGE_PARAM])) {
    // si oui, affectation de p dans $currentPage
    $currentPage = $_GET[APP_PAGE_PARAM];
} else {
    // si non, affectation de la page par defaut dans $currentPage
    $currentPage = APP_DEFAUT_PAGE;
}
$sql = "SELECT 
    `h1`,
    `p`,
    `span-class`,
    `span-text`,
    `img-alt`,
    `img-src`
FROM 
    `PAGE`
WHERE
    `slug` = :slug
;";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':slug', $currentPage);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
// est-ce que ce $currentPage pointe vers une page qui existe?
if (!isset($row['slug'])) {
    // si non, response code 404 et affichage de la page par defaut
    http_response_code(404);
}
include "include/header.php";
?>
    <div class="container theme-showcase" role="main">
        <div class="jumbotron">
            <h1><?=$row['h1']?></h1>
            <p><?=$row['p']?></p>
            <span class="label <?=$row['span-class']?>"><?=$row['span-text']?></span>
        </div>
        <img class="img-thumbnail" alt="<?=$row['img-alt']?>" src="img/<?=$row['img-src']?>" data-holder-rendered="true">
    </div>
<?php
include "include/footer.php";