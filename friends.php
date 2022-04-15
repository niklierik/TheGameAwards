<!DOCTYPE html>

<?php
session_start();
include_once "common/utils.php";
include_once "classes/User.php";
include_once "classes/PageMetadata.php";
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
}

User::loadUsers();
$user = User::userByName($_SESSION["user"]);

$errors = [];

$showSearchResults = false;
$results = [];

if (isset($_POST["search"])) {
    $toSearchFor = "";
    if ($_POST["uname"]) {
        $toSearchFor = $_POST["uname"];
    }
    $errors[] = "Nem találtunk ilyen felhasználót.";
    foreach (User::users() as $u) {
        if ($u instanceof User) {
            if ($u != $user) {
                if (str_contains(strtolower($u->getName()), strtolower($toSearchFor))) {
                    $results[] = $u;
                    $errors = [];
                    $showSearchResults = true;
                }
            }
        }
    }
}

function friendPanel(User $u, User $f): void
{
    echo "<div class='friend'>";
    echo "<img alt='profilkép' src='" . getImgName($f) . "'>";
    echo "<div>";
    echo "<h2>" . $f->getName() . "</h2>";

    if (User::areFriends($f, $u)) {
        echo "<a href='addfriend.php?remove=1&friend=" . $f->getName() . "'><button class='delete'>Barát törlése</button></a>";
    } else if (User::isFriendshipRequested($u, $f)) {
        echo "<a href='addfriend.php?remove=1&friend=" . $f->getName() . "'><button class='delete'>Kérés visszavonása</button></a>";
    } else if (User::isFriendshipRequested($f, $u)) {
        echo "<a href='addfriend.php?friend=" . $f->getName() . "'><button>Kérés elfogadása</button></a>";
    } else {
        echo "<a href='addfriend.php?friend=" . $f->getName() . "'><button>Barátkérés</button></a>";
    }
    //echo "<a href='addfriend.php?friend=" . $f->getName() . "'><button></button></a>";
    echo "</div>";
    echo "</div>";
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
            <form action="friends.php" method="POST" autocomplete="off">
                <label for="uname">Barát keresése</label><br>
                <input type="text" id="uname" name="uname"><br>
                <input name="search" id="search" type="submit" value="Keresés">
            </form>
        </div>

        <hr>

        <?php if ($showSearchResults) { ?>
            <!-- HA KERESETT -->
            <?php
            foreach ($results as $r) {
                friendPanel($user, $r);
            }
            ?>
            <a href="friends.php">
                <button>
                    Vissza a barátokhoz
                </button>
            </a>
        <?php } else { ?>
            <!-- HA NEM -->
        <?php } ?>
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