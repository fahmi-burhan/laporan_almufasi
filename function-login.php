<?php
// Check is there cookie exist
if ( isset($_COOKIE["id_pmbn"]) ) {
    $_SESSION["login"] = true;
    // Spesific logged in pembina
    $id_p = $_COOKIE["id_pmbn"];
}

// Kick to login page everyone enter without password
if ( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

?>