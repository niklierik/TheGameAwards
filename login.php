<!DOCTYPE html>

<?php
session_start();
if (isset($_SESSION["user"])) {
    header("Location: profile.php");
}

include_once "common/utils.php";
include_once "classes/User.php";

$errors = [];
if (isset($_POST["login"])) {
    if (!isset($_POST["uname"])) {
        $errors[] = "Nem adtad meg a felhasználóneved.";
    }
    if (!isset($_POST["pwd"])) {
        $errors[] = "Nem adtad meg a jelszavad.";
    }

    if (count($errors) == 0) {
        $uname = $_POST["uname"];
        $pwd = $_POST["pwd"];
        User::loadUsers();
        $user = User::userByName($uname);
        if ($user === false) {
            $errors[] = "A felhasználó nem létezik.";
        } else {
            if (password_verify($pwd, $user->getPwd())) {
                $_SESSION["user"] = $user->getName();
                header("Location: profile.php");
            } else {
                $errors[] = "A jelszó hibás.";
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
        <div id="m_form">
            <form action="login.php" method="POST" autocomplete="off">
                <label for="uname">Felhasználónév</label><br>
                <input name="uname" id="uname" type="text" placeholder="Felhasználónév" required><br>
                <label for="pwd">Jelszó</label><br>
                <input name="pwd" id="pwd" type="password" placeholder="Jelszó" required><br>
                <input name="login" id="login" type="submit" value="Belépés"><br>
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