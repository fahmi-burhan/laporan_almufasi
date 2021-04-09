<?php
// Start the session
session_start();

// Destroy the session to log out
$_SESSION = [];
session_unset();
session_destroy();

// Delete the exist cookie
setcookie( "id_pmbn", "", time() - 3600 );

// Kick to login page
header("Location: login.php");
exit;
?>