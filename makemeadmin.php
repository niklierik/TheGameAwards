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


if (isset($_POST["admin"])) {
    $pwd = "";
    if (isset($_POST["pwd"])) {
        $pwd = $_POST["pwd"];
    }
    if ($pwd !== "admin") {
        $errors[] = "Nem nyert :p";
    } else {
        $user->setIsAdmin(true);
        User::saveUsers();
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
        Admin
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
        <?php
        if (count($errors) === 0 && isset($_POST["admin"])) {
            ?>
            <p style="background-color: darkgreen;color: white;">Grat, mostmár admin vagy!</p>
            <?php
        }
        ?>
        <div id="login_form">
            <form action="makemeadmin.php" method="POST" autocomplete="off">
                <label for="pwd">Admin jelszó</label><br>
                <p class="secret">pls dont write admin here</p>
                <input name="pwd" id="pwd" type="password" placeholder="admin" required><br>
                <input name="admin" id="admin" type="submit" value="Pls adsz modit?"><br>
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