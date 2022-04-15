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

    $theFile = $_FILES["avatar"];
    $type = strtolower(pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION));
    $targetdir = "data/profile_pics/";
    $targetfile = $targetdir . $user->getName() . ".png";
    if ($type !== "png") {
        $errors[] = "A feltöltött fájlnak PNG kiterjesztéssel kell rendelkeznie.";
    }
    if (count($errors) == 0) {
        if (!move_uploaded_file($_FILES["avatar"]["tmp_name"], $targetfile)) {
            $errors[] = "Nem sikerült a fájlodat feltölteni.";
        } else {
            clearCache();
            header("Location: profile.php");
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
<div class="main_main_div">
    <main class="textcontent main first last">
        <div id="errors">
            <?php
            printErrors($errors);
            ?>
        </div>
        <div id="m_form">
            <p>
                Itt tudsz avatart feltölteni magadnak.
            </p>
            <form action="avatar.php" method="POST" autocomplete="off" enctype="multipart/form-data">
                <input name="avatar" id="avatar" type="file" required>
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