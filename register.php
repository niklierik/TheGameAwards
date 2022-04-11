<!DOCTYPE html>
<?php
/**
 *  Szóval tök valós, hogy van egy regisztrációs menüd ahol mindenféle jött ment fel tud regelni szerkesztőként c:
 */

session_start();
if (isset($_SESSION["user"])) {
    header("Location: profile.php");
}

include_once "common/utils.php";
include_once "classes/User.php";
$errors = [];
$uname = "";
$pwd = "";
$cpwd = "";
$email = "";

if (isset($_POST["btn"])) {
    try {
        User::loadUsers();
        $uname = $_POST["uname"];
        $pwd = $_POST["pwd"];
        $cpwd = $_POST["cpwd"];
        $email = $_POST["email"];
        if (!isset($uname)) {
            $errors[] = "Nem adtál meg felhasználónevet!";
            $uname = "";
        }
        if (!isset($pwd)) {
            $errors[] = "Nem adtál meg jelszót!";
            $pwd = "";
        }
        if (!isset($cpwd)) {
            $errors[] = "Nem adtad meg a megerősítő jelszót!";
            $cpwd = "";
        }
        if (!isset($email)) {
            $errors[] = "Nem adtál meg e-mailt!";
            $email = "";
        }
        if (!preg_match("/[A-Z0-9]*/", $uname)) {
            $errors[] = "A felhasználónévben csak angol ABC betűi és számok lehetnek!";
        }
        if (!preg_match("/.+@.+/", $email)) {
            $errors[] = "Az e-mail nem tűnik valós e-mailnek!";
        }
        if (strlen($uname) < 3) {
            $errors[] = "A felhasználónévnek legalább 3 karakterből kell állnia!";
        }
        if (strlen($uname) > 15) {
            $errors[] = "A felhasználónévnek legfeljebb 15 karakterből kell állnia!";
        }
        if ($pwd !== $cpwd) {
            $errors[] = "A két jelszó nem egyezik.";
        }
        if (strlen($pwd) < 8) {
            $errors[] = "A jelszónak legalább 8 karakterből kell állnia!";
        }
        if (strlen($pwd) > 30) {
            $errors[] = "A jelszónak legfeljebb 30 karakterből kell állnia!";
        }
        if (count($errors) == 0) {
            $u = User::userByName($uname);
            if ($u === false) {
                if (User::existByEmail($email)) {
                    $errors[] = "A megadott e-mail már foglalt.";
                } else {
                    $pwd = password_hash($pwd, PASSWORD_DEFAULT);
                    $u = new User($uname, $pwd);
                    $u->setEmail($email);
                    User::registerUser($u);
                    header("Location: profile.php");
                    $_SESSION["user"] = $u->getName();
                }
            } else {
                $errors[] = "A megadott felhasználónév már foglalt.";
            }
        }
    } catch (Exception $exception) {
        $errors[] = $exception->getMessage();
    }
    // User::saveUsers();
}

?>
<html lang="en">

<head>
    <title>
        Regisztráció
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
<!--
    Szöveges tartalom
-->
<div class="main_main_div">
    <main class="textcontent main first last">
        <?php
        printErrors($errors);
        ?>
        <div id="register_form">
            <form action="register.php" autocomplete="off" method="POST" enctype="multipart/form-data">

                <label for="uname">Felhasználónév <span class="required_star">*</span></label><br>
                <input type="text" placeholder="Felhasználónév" name="uname" id="uname" required
                       value=<?php echo "'$uname'"; ?>><br>

                <label for="pwd">Jelszó <span class="required_star">*</span></label><br>
                <input type="password" placeholder="Jelszó" name="pwd" id="pwd" required><br>

                <label for="cpwd">Jelszó mégegyszer <span class="required_star">*</span></label><br>
                <input type="password" placeholder="Jelszó mégegyszer" name="cpwd" id="cpwd" required><br>


                <label for="email">E-mail <span class="required_star">*</span></label><br>
                <!-- elv a magyar helyesírás szabályai szerint ez már ímél... -->
                <input type="email" placeholder="E-mail" name="email" id="email" required
                       value=<?php echo "'$email'"; ?>><br>

                <input type="submit" value="Regisztrálás" name="btn">

            </form>
        </div>
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
