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

    if (!isset($_POST["oldpwd"])) {
        $errors[] = "A régi jelszót nem adtad meg!";
    }
    if (!isset($_POST["pwd"])) {
        $errors[] = "Az új jelszót nem adtad meg!";
    }
    if (!isset($_POST["cpwd"])) {
        $errors[] = "Kétszer kell megadni az új jelszót!";
    }
    if (count($errors) === 0) {
        if ($_POST["pwd"] !== $_POST["cpwd"]) {
            $errors[] = "A két jelszó nem egyezik";
        } else {
            $old = $_POST["oldpwd"];
            $pwd = $_POST["pwd"];
            if (password_verify($old, $user->getPwd())) {
                if ($old === $pwd) {
                    $errors[] = "A régi és az új jelszó ugyanaz.";
                } else {
                    $errors = array_merge($errors, checkPwd($pwd));
                    if (count($errors) === 0) {
                        $user->setPwd(password_hash($pwd, PASSWORD_DEFAULT));
                        User::saveUsers();
                    }
                }
            } else {
                $errors[] = "Nem jó a régi jelszó!";
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
<div class="main_main_div">
    <main class="textcontent main first last">
        <div id="errors">
            <?php
            printErrors($errors);
            ?>
        </div>
        <?php
        if (count($errors) === 0 && isset($_POST["change"])) {
            ?>
            <div id="okay">
                <p>Sikeres jelszócsere!</p>
            </div>
            <?php
        }
        ?>
        <div id="m_form">
            <p>
                Itt tudod a jelszavadat változtatni.
            </p>
            <form action="password_change.php" method="POST" autocomplete="off">
                <label for="oldpwd">Régi jelszó</label><br>
                <input name="oldpwd" id="oldpwd" type="password" required><br>
                <label for="pwd">Új jelszó</label><br>
                <input name="pwd" id="pwd" type="password" required><br>
                <label for="cpwd">Új jelszó mégegyszer</label><br>
                <input name="cpwd" id="cpwd" type="password" required><br>
                <input name="change" id="change" type="submit" value="Jelszó csere"><br>
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