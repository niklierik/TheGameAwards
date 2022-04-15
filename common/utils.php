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

function clearCache(): void
{
    header("Cache-Control: no-cache, must-revalidate");
    header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    header("Content-Type: application/xml; charset=utf-8");
}

function generateProfileData(User|bool $u): void
{
    /*
       <div class="profile">
           <img src="<?php echo getImgName($user->getName()); ?>" alt="Profile Pic">
           <h2>
               <?php
               echo $user->getName();
               ?>
           </h2>
       </div>
      */
    if ($u === false) {
        echo "<div class='profile'>";
        echo "<img src='" . getImgName("_default") . "' alt='Avatar kép'>";
        echo "<h2>";
        echo "A zuinverzum";
        echo "</h2>";
        echo "</div>";
    } else {
        echo "<div class='profile'>";
        echo "<img src='" . getImgName($u->getName()) . "' alt='Avatar kép'>";
        echo "<h2>";
        echo $u->getName();
        echo "</h2>";
        echo "</div>";
        echo "<p class='profile'>";
        echo $u->getDesc();
        echo "</p>";
    }
}


function checkPwd(string $pwd): array
{
    $errors = [];
    if (strlen($pwd) < 8) {
        $errors[] = "A jelszónak legalább 8 karakterből kell állnia.";
    }
    if (strlen($pwd) > 30) {
        $errors[] = "A jelszó legfeljebb 30 karakterből állhat.";
    }
    for ($i = 0; $i < strlen($pwd); $i++) {
        if (ctype_lower($pwd[$i])) {
            $lower = true;
        }
        if (ctype_upper($pwd[$i])) {
            $upper = true;
        }

        if (ctype_digit($pwd[$i])) {
            $digit = true;
        }
    }
    if (!isset($digit)) {
        $errors[] = "A jelszónak kell tartalmaznia legalább egy számjegyet.";
    }
    if (!isset($lower)) {
        $errors[] = "A jelszónak kell tartalmaznia legalább egy kisbetűt.";
    }
    if (!isset($upper)) {
        $errors[] = "A jelszónak kell tartalmaznia legalább egy nagybetűt.";
    }
    return $errors;
}

function msgFile(User|string|bool $a, User|string|bool $b): string
{
    if ($a === false || $b === false) {
        return false;
    }
    if (!is_string($a)) {
        $a = $a->getName();
    }
    if (!is_string($b)) {
        $b = $b->getName();
    }
    if ($a === $b) {
        if (file_exists("$a-$b.txt")) {
            return "$a-$b.txt";
        } else {
            return "$a.txt";
        }
    } else {
        if (file_exists("$b-$a.txt")) {
            return "$b-$a.txt";
        }
        return "$a-$b.txt";
    }
}

function getMessagesOf(User|string|bool $a, User|string|bool $b): array|bool
{
    if ($a === false || $b === false) {
        return false;
    }
    if (!is_string($a)) {
        $a = $a->getName();
    }
    if (!is_string($b)) {
        $b = $b->getName();
    }
    $msgs = readMsg(msgFile($a, $b));
    if ($msgs === false) {
        return [];
    }
    return $msgs;
}

function saveMessage(User|string|bool $a, User|string|bool $b, array $msg)
{
    if ($a === false || $b === false) {
        return false;
    }
    if (!is_string($a)) {
        $a = $a->getName();
    }
    if (!is_string($b)) {
        $b = $b->getName();
    }
    file_put_contents(msgFile($a, $b), implode("\n", $msg));
}

function readMsg(string $file): array|bool
{
    if (!file_exists($file)) {
        return false;
    }
    $content = file_get_contents("$a.txt");
    $msgs = explode("\n", $content);
    $msgsCpy = [];
    foreach ($msgs as $msg) {
        if (trim($msg) != "") {
            $msgsCpy[] = $msg;
        }
    }
    return $msgsCpy;
}
