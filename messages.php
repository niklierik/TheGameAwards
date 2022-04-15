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
} else if (isset($_POST["send"])) {
    if (isset($_POST["msg"])) {

    }
}

if (isset($_GET["with"])) {
    $with = $_GET["with"];
    $with = User::userByName($with);
    if ($with === false) {
        header("Location: messages.php");
    }
}

function friendPanel(User $u, User $f): void
{
    echo "<div class='friend'>";
    echo "<img alt='profilkép' src='" . getImgName($f) . "'>";
    echo "<div>";
    echo "<h2>" . $f->getName() . "</h2>";
    echo "<a href='messages.php?with=" . $f->getName() . "'><button>Üzenetek</button></a>";
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

        <!--hr-->
        <?php if (isset($with) && $with !== false) {
            $msgs = getMessagesOf($user, $with);
            if ($msgs !== false && count($msgs) > 0) {
                foreach ($msgs as $msg) {
                    $msg = unserialize($msg);
                    ?>
                    <p>
                        <?php echo $msg; ?>
                    </p>
                    <?php
                }
            } ?>
            <hr>
            <?php echo "<form action='messages.php?with=' method='POST' autocomplete='off'>"; ?>
            <label for="msg">Üzenet</label><br>
            <textarea id="msg" name="msg" rows="10" cols="50"></textarea><br>
            <input name="send" id="send" type="submit" value="Elküldés"><br>
            </form>
            <a href="messages.php">
                <button>
                    Vissza a keresésőhöz
                </button>
            </a>


        <?php } else { ?>
            <?php if ($showSearchResults) { ?>
                <!-- HA KERESETT -->
                <?php
                foreach ($results as $r) {
                    friendPanel($user, $r);
                }
                ?>
                <a href="messages.php">
                    <button>
                        Vissza a keresésőhöz
                    </button>
                </a>
            <?php } else { ?>
                <!-- HA NEM -->

                <div id="m_form">
                    <form action="messages.php" method="POST" autocomplete="off">
                        <label for="uname">Csevegés keresése</label><br>
                        <input type="text" id="uname" name="uname"><br>
                        <input name="search" id="search" type="submit" value="Keresés">
                    </form>
                </div>
            <?php } ?>
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