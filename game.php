<!DOCTYPE html>
<?php
session_start();

include_once "classes/PageMetadata.php";

if (isset($_GET["year"])) {
    $year = $_GET["year"];
    if (str_starts_with($year, "20")) {
        $year = substr($year, 2);
    }
    PageMetadata::loadPages();
    $page = PageMetadata::pageByYear($year);
    if ($page === false) {
        $year = false;
    }
} else {
    $year = false;
}
?>
<html>
<head>
    <title>
        <?php

        ?>
    </title>
    <?php
    include "common/imports.php";
    ?>
</head>
<body>
<?php
include "common/header.php";
?>
<div class="main_main_div">
    <main class="textcontent main first last">

        <?php
        if ($year === false) { // nem merem kipróbálni mi történik ha !year-t írok miközben lehet h szám van itt xd
            include "games/missing.php";
        } else {
            include "games/game_20$year.php";
        } ?>
    </main>
    <?php
    include "common/navigation.php";
    ?>
</div>

<?php
include "common/footer.php";
?>
</body>
</html>