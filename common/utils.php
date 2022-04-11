<?php
function printErrors(array $errors): void
{
    if (count($errors) > 0) {
        echo '<div id="errors">';
    }
    foreach ($errors as $err) {
        echo "<p>$err</p>";
    }
    if (count($errors) > 0) {
        echo '</div>';
    }
}

function getImgName(User|string $user): string
{
    if (!is_string($user)) {
        $user = $user->getName();
    }
    $file = "data/profile_pics/" . $user . ".png";
    if (file_exists($file)) {
        return $file;
    }
    return "data/profile_pics/_default.png";
}

function clearCache() : void
{
    header("Cache-Control: no-cache, must-revalidate");
    header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    header("Content-Type: application/xml; charset=utf-8");
}