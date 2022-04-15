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


if (isset($_POST["delete"])) {

    if (!isset($_POST["pwd"])) {
        $errors[] = "Az új jelszót nem adtad meg!";
    }
    if (!isset($_POST["cpwd"])) {
        $errors[] = "Kétszer kell megadni az új jelszót!";
    }
    if (count($errors)==0) {
        $pwd = $_POST["pwd"];
        $cpwd = $_POST["cpwd"];
        if ($pwd === $cpwd) {
            if (!password_verify($pwd, $user->getPwd())) {
                $errors[] = "Nem ez a jelszavad!";
            } else {
                User::unregister($user);
                session_unset();
                session_destroy();
                header("Location: login.php");
            }
        } else {
            $errors[] = "A két jelszó nem egyezik!";
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
                Itt tudod törölni a felhasználódat.
            </p>
            <form action="delete.php" method="POST" autocomplete="off">
                <label for="pwd">Új jelszó</label><br>
                <input name="pwd" id="pwd" type="password" required><br>
                <label for="cpwd">Új jelszó mégegyszer</label><br>
                <input name="cpwd" id="cpwd" type="password" required><br>
                <input name="delete" id="delete" type="submit" value="Törlés"><br>
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