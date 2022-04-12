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


if (isset($_POST["change"])) {

    $desc = "";
    if (isset($_POST["desc"])) {
        $desc = $_POST["desc"];
    }
    $user->setDesc($desc);
    User::saveUsers();
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
            <div id="login_form">
            <p>
                Itt tudod változtatni a profil leírást.
            </p>
            <form action="delete.php" method="POST" autocomplete="off">
                <label for="desc">Új jelszó</label><br>
                <input name="desc" id="desc" type="password"><br>
                <input name="change" id="change" type="submit" value="Kész"><br>
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