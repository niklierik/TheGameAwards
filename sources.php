<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="utf-8">
    <title>
        Források
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
        <h2 style="text-align: center;">
            Források:
        </h2>
        <div id="srcdiv">
            <ul id="srclist">
                <li>
                    <a href="https://en.wikipedia.org/wiki/List_of_Game_of_the_Year_awards">
                        Wikipédia - List of Game of the Year awards
                    </a>
                </li>
                <li>
                    <a href="https://en.wikipedia.org/wiki/The_Game_Award_for_Game_of_the_Year">
                        Wikipédia - The Game Awards for Game of the Year
                    </a>
                </li>
                <li>
                    <a href="https://en.wikipedia.org/wiki/The_Game_Awards">
                        Wikipédia - The Game Awards
                    </a>
                </li>
                <li>
                    <a href="https://en.wikipedia.org/wiki/Dragon_Age:_Inquisition">
                        Wikipédia - Dragon Age: Inquisition
                    </a>
                </li>
                <li>
                    <a href="https://en.wikipedia.org/wiki/The_Witcher_3:_Wild_Hunt">
                        Wikipédia - The Withcer 3: Wild Hunt
                    </a>
                </li>
                <li>
                    <a href="https://en.wikipedia.org/wiki/Overwatch_(video_game)">
                        Wikipédia - Overwatch
                    </a>
                </li>
                <li>
                    <a href="https://en.wikipedia.org/wiki/The_Legend_of_Zelda:_Breath_of_the_Wild">
                        Wikipédia - The Legend of Zelda: Breath of the Wild
                    </a>
                </li>
                <li>
                    <a href="https://en.wikipedia.org/wiki/God_of_War_(2018_video_game)">
                        Wikipédia - God of War
                    </a>
                </li>
                <li>
                    <a href="https://en.wikipedia.org/wiki/Sekiro:_Shadows_Die_Twice">
                        Wikipédia - Sekiro: Shadows Die Twice
                    </a>
                </li>
                <li>
                    <a href="https://en.wikipedia.org/wiki/The_Last_of_Us_Part_II">
                        Wikipédia - The Last of Us Part II
                    </a>
                </li>
                <li>
                    <a href="https://en.wikipedia.org/wiki/It_Takes_Two_(video_game)">
                        Wikipédia - It Takes Two
                    </a>
                </li>

                <li>
                    <a href="https://www.google.com">
                        Google
                    </a>
                </li>
            </ul>
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