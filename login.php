<!DOCTYPE html>

<?php
    include_once "common/utils.php";
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

        <!--action még nincs, majd PHP-ban lesz-->
        <div id="login_form">
            <p>
                Itt tudsz belépni, mint Szerkesztő. Ezután elérhetővé válnak a Szerkesztői beállítások, mint pl. új
                oldal létrehozása, meglévő szerkesztése vagy kitörlése. (Ezeket az opciókat PHP-ban megpróbáljuk majd
                megvalósítani.)
            </p>
            <p class="secret">
                admin, admin nem megy, ne próbáld meg plez, mert nem megy, feleslegesen próbálod meg c:
            </p>
            <form action="login.php" method="POST" autocomplete="off">
                <label for="uname">Felhasználónév</label><br>
                <input name="uname" id="uname" type="text" placeholder="admin"><br>
                <label for="pwd">Jelszó</label><br>
                <input name="pwd" id="pwd" type="password" placeholder="admin"><br>
                <input name="login" id="login" type="submit" value="Belépés">
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