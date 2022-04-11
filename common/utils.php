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