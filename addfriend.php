<?php

// Add friend ami removeolni is tud kekw

session_start();
include_once "common/utils.php";
include_once "classes/User.php";
include_once "classes/PageMetadata.php";
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
}

User::loadUsers();
$user = User::userByName($_SESSION["user"]);

if (isset($_GET["friend"])) {
    $remove = 0;
    if (isset($_GET["remove"])) {
        $remove = $_GET["remove"] == 1;
    }
    $target = $_GET["friend"];
    $target = User::userByName($target);
    if ($target !== false) {
        if ($remove) {
            $user->removeFriend($target);
            $target->removeFriend($user);
        } else {
            $user->addFriend($target);
        }
        User::saveUsers();
    }
}

header("Location: friends.php");