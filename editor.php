<!DOCTYPE html>
<!-- FŐOLDAL -->
<html lang="hu">

<head>

    <!--
        UTF-8 kódolás
    -->
    <meta charset="utf-8">
    <title>
        Az Év Játékai
    </title>

    <!--
        CSS importok
    -->
    <link href="css/main.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="img/icon.png" type="image/x-icon">
    <!--
        JavaScript importok (jQuery és CustomTag-ek)
    -->
    <script src="scripts/CustomTags.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="scripts/Animations.js"></script>
</head>



<body>
    <!--
        Fejléc
    -->
    <my-header></my-header>
    <!--
        Szöveges tartalom
    -->
    <div class="main_main_div">
        <main class="textcontent main first last">

            <!--action még nincs, majd PHP-ban lesz-->
            <div id="login_form">
                <p>
                    Itt tudsz belépni, mint Szerkesztő. Ezután elérhetővé válnak a Szerkesztői beállítások, mint pl. új oldal létrehozása, meglévő szerkesztése vagy kitörlése. (Ezeket az opciókat PHP-ban megpróbáljuk majd megvalósítani.)
                </p>
                <p class="secret">
                    admin, admin nem megy, ne próbáld meg plez, mert nem megy, feleslegesen próbálod meg c:
                </p>
                <form method="POST" autocomplete="off">
                    <label for="uname">Felhasználónév</label><br>
                    <input name="uname" id="uname" type="text" placeholder="admin"><br>
                    <label for="pwd">Jelszó</label><br>
                    <input name="pwd" id="pwd" type="password" placeholder="admin"><br>
                    <input name="login" id="login" type="submit" value="Belépés">
                </form>
            </div>
        </main>
        <div id="nav_div">
            <my-nav></my-nav>
        </div>
    </div>
    <my-footer></my-footer>

</body>

</html>