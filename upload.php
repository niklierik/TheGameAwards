<!DOCTYPE html>

<?php
session_start();
include_once "common/utils.php";
include_once "classes/User.php";
include_once "classes/PageMetadata.php";
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
}

User::loadUsers();
$user = User::userByName($_SESSION["user"]);

$errors = [];
if (isset($_POST["upload"])) {
    if (!isset($_POST["gname"])) {
        $errors[] = "Nem adtad meg a weboldal / játék nevét.";
    }
    if (!isset($_POST["year"])) {
        $errors[] = "Nem adtad meg az évet (utolsó két szám kell csak).";
    }

    if (count($errors) == 0) {
        $theFile = $_FILES["doc"];
        $type = strtolower(pathinfo($_FILES["doc"]["name"], PATHINFO_EXTENSION));
        $game = $_POST["gname"];
        $year = $_POST["year"];
        $targetdir = "games/";
        $targetfile = $targetdir . "game_20$year.php";
        if (file_exists($targetfile)) {
            $errors[] = "A fájl már létezik.";
        }
        if ($type !== "php") {
            $errors[] = "A feltöltött fájlnak PHP kiterjesztéssel kell rendelkeznie.";
        }
        if (count($errors) == 0) {
            if (!move_uploaded_file($_FILES["doc"]["tmp_name"], $targetfile)) {
                $errors[] = "Nem sikerült a fájlodat feltölteni.";
            } else {
                PageMetadata::loadPages();
                $meta = new PageMetadata($game, $year);
                $meta->author($user->getName());
                PageMetadata::registerPage($meta);
                PageMetadata::savePages();
                header("Location: game.php?year=$year");
            }
        }
    }
}

?>
<html lang="hu">

<head>

    <!--
        UTF-8 kódolás
    -->
    <meta charset="utf-8">
    <title>
        Az Év Játékai
    </title>

    <?php
    include "common/imports.php";
    ?>
</head>


<body>
<!--
    Fejléc
-->
<?php
include "common/header.php";
?>
<!--
    Szöveges tartalom
-->
<div class="main_main_div">
    <main class="textcontent main first last">
        <div id="errors">
            <?php
            printErrors($errors);
            ?>
        </div>
        <!--action még nincs, majd PHP-ban lesz-->
        <div id="login_form">
            <p>
                Itt tudsz új weboldalt feltölteni. (Pls don't upload haxx ty.)
            </p>
            <form action="upload.php" method="POST" autocomplete="off" enctype="multipart/form-data">
                <label for="gname">Játék neve</label><br>
                <input name="gname" id="gname" type="text" placeholder="Játéknév" required><br>
                <label for="year">Évszám</label><br>
                <input name="year" id="year" type="text" placeholder="22" required><br>
                <label for="page">Dokumentum</label><br>
                <input name="doc" id="doc" type="file" required><br>
                <input name="upload" id="upload" type="submit" value="Feltöltés"><br>
            </form>
        </div>
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