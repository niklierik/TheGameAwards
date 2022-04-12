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
