<?php
function addActive($url, $title)
{
    $class='';
    if ($url === $_SERVER[""]) {
        $class=' class="active"';
    }
    ?>
    <li <?=$class?>><a href="<?='index?p='.$url?>"><?=$title?></a></li>
    <?php
}