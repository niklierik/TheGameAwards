<?php

include_once "classes/PageMetadata.php";
include_once "classes/User.php";
include_once "common/utils.php";


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
    <button id=\"showeditor\">Felhasználói<br>Opciók</button>";

if (isset($_SESSION["user"])) {
    profile();
    //navBtn("upload.php", "Feltöltés", " editor");
    navBtn("profile.php", "Profil", " editor");
    navBtn("logout.php", "Kijelentkezés", " editor");
} else {
    navBtn("login.php", "Belépés", " editor");
    navBtn("register.php", "Regisztrálás", " editor");
}
echo "<hr>";
echo " <a class=\"navelement\" href=\"#title_div\"><button>Vissza az oldal elejére</button></a>
    <div style = \"padding-bottom: 90px\"></div>
</nav></div>";

function navBtnGame(PageMetadata $p): void
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
    $profile_pages = ["profile.php", "avatar.php", "delete.php", "password_change.php", "upload.php"];
    $current_doc = basename($_SERVER["PHP_SELF"]);
    $c = "";
    if ($current_doc === $page || ($page === "profile.php" && in_array($current_doc, $profile_pages, true))) {
        $c = " active";
    }
    echo "<a class=\"navelement$c$cssClass\" href=\"$page\"><button>$text</button></a>";
}

function profile(): void
{
    if (isset($_SESSION["user"])) {
        User::loadUsers();
        $user = User::userByName($_SESSION["user"]);
        echo "<div class='profileinnav profile navelement editor'>";
        echo "<img src=" . getImgName($user->getName()) . ">";
        echo "<h2>";
        echo $user->getName();
        echo " </h2>";
        echo "</div>";
    }
}