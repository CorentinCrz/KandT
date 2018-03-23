<?php
function addActive($url, $title, $currentPage)
{
    $class='';
    if ($url === $currentPage) {
        $class=' class="active"';
    }
    ?>
    <li <?=$class?>><a href="<?='?'.APP_PAGE_PARAM.'='.$url?>"><?=$title?></a></li>
    <?php
}