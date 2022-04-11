<!DOCTYPE html>
<?php
session_start();

include_once "classes/PageMetadata.php";
include_once "common/utils.php";

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
<html lang="hu">
<head>
    <title>
        <?php
        if (isset($page)) {
            echo $page->getGame();
        } else {
            echo "?";
        }
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
        if ($year === false) {
            include "games/missing.php";
        } else {
            include "games/game_20$year.php";
        } ?>
        <?php // ezért a feketemágiáért legszívesebben elégetném magamat
        if ($year !== false) {
            ?>
            <div class="author">
                <h2>Készítette</h2>
                <div>
                    <?php
                    echo "<img src='" . getImgName($page->getAuthor()) . "'>";
                    echo "<p>" . $page->getAuthor() . "</p>";
                    ?>
                </div>
            </div>
            <?php
        }
        ?>
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