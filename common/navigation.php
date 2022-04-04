<?php

$year = [14 => "Dragon Age: Inquisiton", 15 => "The Witcher 3: Wild Hunt", 16 => "Overwatch", 17 => "The Legend of Zelda:<br>Breath of The Wild", 18 => "God of War", 19 => "Sekiro: Shadows Die Twice", 20 => "The Last of Us Part II", 21 => "It Takes Two"];


echo "<div id=\"nav_div\"><nav>";
navBtn("index.php", "Főoldal");
navBtn("sources.php", "Források");
echo "<hr>";
echo "<button id='showgames'>Játékok</button>";
foreach ($year as $y => $g) {
    //echo "<a class=\"navelement game\" href=\"game_20$y.php\" id=\"a$y\"><button><span class=\"year\" id=\"y14\">20$y</span><br><span class=\"gamename\" id=\"n$y\">$g</span></button></a>";
    navBtnGame($y, $g);
}

echo "<hr>
    <button id=\"showeditor\">Szerkesztői<br>Opciók</button>";
navBtn("editor.php", "Belépés mint<br>Szerkesztő", " editor");
echo "<hr>";
echo " <a class=\"navelement\" href=\"#title_div\"><button>Vissza az oldal elejére</button></a>
    <div style = \"padding-bottom: 90px\"></div>
</nav></div>";

function navBtnGame(string $y, string $g)
{
    $current_doc = basename($_SERVER["PHP_SELF"]);
    $c = "";
    if ($current_doc === "game_20$y.php") {
        $c = " active";
    }
    echo "<a class=\"navelement game$c\" href=\"game_20$y.php\" id=\"a$y\"><button><span class=\"year\" id=\"y14\">20$y</span><br><span class=\"gamename\" id=\"n$y\">$g</span></button></a>";
}

function navBtn(string $page, string $text, string $cssClass = ""): void
{
    $current_doc = basename($_SERVER["PHP_SELF"]);
    $c = "";
    if ($current_doc === $page) {
        $c = " active";
    }
    echo "<a class=\"navelement$c$cssClass\" href=\"$page\"><button>$text</button></a>";
}