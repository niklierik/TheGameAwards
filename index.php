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
<?php
include "common/header.php";
?>
<!--
    Szöveges tartalom
-->
<div class="main_main_div">
    <main class="textcontent main first last">
        <section>
            <h2>
                Mi is ez?
            </h2>
            <p>
                Ezen a weboldalon be szeretnénk mutatni nektek az év játékai díjban részesült címeket. Fontos, hogy több
                ilyen díjátadó is létezik, de mi a The Game Awards által díjazott játékokkal foglalkozunk csak, mert úgy
                gondoljuk, hogy ez a legnevesebb díj és ez
                jár talán a legtöbb presztízzsel.
            </p>
        </section>
        <section>
            <h2>
                Kik vagyunk mi?
            </h2>
            <p>
                Két kocka, akik szabadidejükben szeretnek játszani, és szeretnék bemutatni, hogy milyen mesteralkotások
                születtek a díj létezése óta.
            </p>
        </section>
        <section>
            <h2>
                Mi is az a The Game Awards?
            </h2>
            <p>
                Mint fentebb említettem, a The Game Awards az egyik legnagyobb presztízsű díjátadó esemény, amit minden
                évben megrendeznek, általában december elején. Mindenek előtt összeül egy kisebb tanács mely nevesebb
                cégekből áll (pl. Microsoft, AMD, Nintendo, Sony,
                mellettük egyéb videojáték kiadók). Ez a tanács választ kb. 30 nevesebb videojátékokkal foglalkozó
                portált / újságot (továbbiakban újság). Az újságok ezután nevezhetnek a különböző kategóriákba egy-egy
                játékot, majd ezekre szavazhatnak.
                A nézőket is bevonják a szavazásba social median keresztül. Ezután a két szavazótábor szavazatait
                összegzik, az újságok 90%, míg a nézők 10% szavazati erővel bírnak. Amely játék a legtöbb szavazatot
                kapta, az lett az év játéka.
            </p>
            <p>
                Az alábbi táblázatban összegeztük az elmúlt évben megtartott díjátadókat, kik nyertek, hol volt tartva
                és hogy mekkora érdeklődés vette körül.
            </p>
            <div class="fortable">
                <table>
                    <tr>
                        <th id="year">
                            Év
                        </th>
                        <th id="date">
                            Dátum
                        </th>
                        <th id="goty">
                            A díj nyertese
                        </th>
                        <th id="where">
                            Helyszín
                        </th>
                        <th id="viewers">
                            Nézők száma (millió)
                        </th>
                    </tr>
                    <tr>
                        <td headers="year">
                            2014
                        </td>
                        <td headers="date">
                            2014. december 5.
                        </td>
                        <td headers="goty">
                            <a href="game_2014.html">
                                Dragon Age: Inquisition
                            </a>
                        </td>
                        <td headers="where">
                            <a href="https://en.wikipedia.org/wiki/Zappos_Theater">The AXIS</a> (Las Vegas)
                        </td>
                        <td headers="viewers">
                            1,9
                        </td>
                    </tr>
                    <tr>
                        <td headers="year">
                            2015
                        </td>
                        <td headers="date">
                            2015. december 3.
                        </td>
                        <td headers="goty">
                            <a href="game_2015.html">
                                The Witcher 3: Wild Hunt
                            </a>
                        </td>
                        <td headers="where" rowspan="5">
                            <a href="https://en.wikipedia.org/wiki/Microsoft_Theater">Microsoft Theater</a> (Los
                            Angeles)
                        </td>
                        <td headers="viewers">
                            2,3
                        </td>
                    </tr>
                    <tr>
                        <td headers="year">
                            2016
                        </td>
                        <td headers="date">
                            2016. december 1.
                        </td>
                        <td headers="goty">
                            <a href="game_2016.html">
                                Overwatch
                            </a>
                        </td>
                        <td headers="viewers">
                            3,8
                        </td>
                    </tr>
                    <tr>
                        <td headers="year">
                            2017
                        </td>
                        <td headers="date">
                            2017. december 7.
                        </td>
                        <td headers="goty">
                            <a href="game_2017.html">
                                The Legend of Zelda: Breath of the Wild
                            </a>
                        </td>
                        <td headers="viewers">
                            11.5
                        </td>
                    </tr>
                    <tr>
                        <td headers="year">
                            2018
                        </td>
                        <td headers="date">
                            2018. december 6.
                        </td>
                        <td headers="goty">
                            <a href="game_2018.html">
                                God of War
                            </a>
                        </td>
                        <td headers="viewers">
                            26.2
                        </td>
                    </tr>
                    <tr>
                        <td headers="year">
                            2019
                        </td>
                        <td headers="date">
                            2019. december 12.
                        </td>
                        <td headers="goty">
                            <a href="game_2014.html">
                                Sekiro: Shadows Die Twice
                            </a>
                        </td>
                        <td headers="viewers">
                            45.2
                        </td>
                    </tr>
                    <tr>
                        <td headers="year">
                            2020
                        </td>
                        <td headers="date">
                            2020. december 10.
                        </td>
                        <td headers="goty">
                            <a href="game_2020.html">
                                The Last of Us Part II
                            </a>
                        </td>
                        <td headers="where">
                            Online
                        </td>
                        <td headers="viewers">
                            83
                        </td>
                    </tr>
                    <tr>
                        <td headers="year">
                            2021
                        </td>
                        <td headers="date">
                            2021. december 9.
                        </td>
                        <td headers="goty">
                            <a href="game_2014.html">
                                It Takes Two
                            </a>
                        </td>
                        <td headers="where">
                            <a href="https://en.wikipedia.org/wiki/Microsoft_Theater">Microsoft Theater</a> (Los
                            Angeles)
                        </td>
                        <td headers="viewers">
                            85
                        </td>
                    </tr>
                </table>
            </div>
        </section>
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