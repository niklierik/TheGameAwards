<?php

include_once "classes/PageMetadata.php";

PageMetadata::loadPages();
$pages = PageMetadata::getPages();

echo "<div id=\"nav_div\"><nav>";
navBtn("index.php", "Főoldal");
navBtn("sources.php", "Források");
echo "<hr>";
echo "<button id='showgames'>Játékok</button>";
foreach ($pages as $p) {
    //echo "<a class=\"navelement game\" href=\"game_20$y.php\" id=\"a$y\"><button><span class=\"year\" id=\"y14\">20$y</span><br><span class=\"gamename\" id=\"n$y\">$g</span></button></a>";
    if ($p instanceof PageMetadata) {
        navBtnGame($p);
    }
}

echo "<hr>
    <button id=\"showeditor\">Szerkesztői<br>Opciók</button>";

if (isset($_SESSION["user"])) {
    navBtn("profile.php", "Profil", " editor");
    navBtn("logout.php", "Kijelentkezés", " editor");
} else {
    navBtn("login.php", "Belépés mint<br>Szerkesztő", " editor");
    navBtn("register.php", "Regisztrálás mint<br>Szerkesztő", " editor");
}
echo "<hr>";
echo " <a class=\"navelement\" href=\"#title_div\"><button>Vissza az oldal elejére</button></a>
    <div style = \"padding-bottom: 90px\"></div>
</nav></div>";

function navBtnGame(PageMetadata $p) : void
{
    $y = $p->getYear();
    //$g = $p->getGame();
    $gn = $p->getNavname();
    $c = "";
    if (isset($_GET["year"]) && $_GET["year"] == $y) {
        $c = " active";
    }
    echo "<a class=\"navelement game$c\" href=\"game.php?year=$y\" id=\"a$y\"><button><span class=\"year\" id=\"y$y\">20$y</span><br><span class=\"gamename\" id=\"n$y\">$gn</span></button></a>";
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