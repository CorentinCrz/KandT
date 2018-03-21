<?php
function addActive($url, $title)
{
    $class='';
    if ('p='.$url === $_SERVER["QUERY_STRING"]) {
        $class=' class="active"';
    }
    ?>
    <li <?=$class?>><a href="<?='?p='.$url?>"><?=$title?></a></li>
    <?php
}