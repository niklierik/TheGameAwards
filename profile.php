<!DOCTYPE html>
<?php
session_start();
include_once "classes/User.php";
include_once "common/utils.php";


if (!isset($_SESSION["user"])) {
    header("Location: login.php");
}
$user = $_SESSION["user"];

User::loadUsers();
$user = User::userByName($user);
?>
<html lang="hu">

<head>

    <!--
        UTF-8 kódolás
    -->
    <meta charset="utf-8">
    <title>
        Profilom
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
        <div class="profile_nav">
            <div class="profile">
                <img src="<?php echo getImgName($user->getName()); ?>">
                <h2>
                    <?php
                    echo $user->getName();
                    ?>
                </h2>
            </div>
            <a href="avatar.php">
                <button>
                    Avatar átállítása
                </button>
            </a>
            <a href="password_change.php">
                <button>
                    Jelszó csere
                </button>
            </a>
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
