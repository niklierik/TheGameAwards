<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
}
$user = $_SESSION["user"];
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
