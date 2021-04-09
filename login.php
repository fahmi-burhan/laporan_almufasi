<?php
// Start the session
session_start();

// Call Funtions
require 'functions.php';

// Check is there cookie exist
if ( isset($_COOKIE["pembina"]) ) {
    $_SESSION["login"] = true;
}

// Prevent logged in user to open login page
if ( isset($_SESSION["login"]) ) {
    header("Location: index.php");
    exit;
}

if ( isset($_POST["login"]) ) {
    
    $username = ucwords(strtolower($_POST["username"])); // Capitalize username after make every word lower
    $password = $_POST["password"];

    // Matching inputed username with exist usernames in database
    $result = mysqli_query($conn, "SELECT * FROM data_pembina WHERE nama_pmbn = '$username'");

    // Checking is there that username or not
    if ( mysqli_num_rows($result) === 1 ) {
        
        
        // Checking inputed password match with the needed password
        if ( $password == "amanahpembina" ) {

            // If right let the user in do this:
            // First, set the session to trues
            $_SESSION["login"] = true;

            // Second, automatically set the cookie to auto login
            setcookie( 'id_pmbn', mysqli_fetch_assoc($result)["id_pmbn"], time()+31622400 );

            // Last, head to home page
            header("Location: index.php");
            exit;
        } else {

            $error1 = false;
            $error2 = true;

        }

    } else {
        $error1 = true;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk Sebagai Pembina</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="shortcut icon" href="almufasi-icon.ico" type="image/x-icon">
</head>
<body>
    <section id="login" class="page">

        <div id="login-wrapper">

            <h1 id="login-title">Login</h1>

            <?php if ( isset($error1) and $error1 == true ) : ?>
                <p class="login-fail">Maaf, nama pembina salah!</p>
            <?php endif; ?>

            <?php if ( isset($error2) and $error2 == true ) : ?>
                <p class="login-fail">Maaf, kata sandi salah!</p>
            <?php endif; ?>

            <form action="" method="post">
            
            <ul>
                <li class="login-input">
                    <input type="text" name="username" id="login-username" placeholder="Nama Pembina" autocomplete="off" autofocus>
                </li>
                <li class="login-input">
                    <input type="password" name="password" id="login-password" placeholder="Kata Sandi">
                </li>
                <li class="login-input">
                    <button type="submit" name="login" id="login-button">MASUK</button>
                </li>
            </ul>

            </form>

        </div>

    </section>
</body>
</html>