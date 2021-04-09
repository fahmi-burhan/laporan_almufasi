<?php
// Mulai Session
session_start();

// Panggil Funtions
require 'functions.php';

// Cek login
require 'function-login.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Judul halaman -->
    <title>Laporan Almufasi</title>
    
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/list.css">
    <link rel="stylesheet" href="css/edit-sect.css">
    <!-- Font Montserrat -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Google Icon / Material-icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Icon dari halaman -->
    <link rel="shortcut icon" href="almufasi-icon.ico" type="image/x-icon">

    <!-- Library JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Javascript  -->
    <script src="js/script.js"></script>
</head>

<body>

<!-- Bagian tampilan inti -->
<div id="wrapper">
<?php

/////////////////////////////
// DEKLARASI VARIABEL UMUM //
/////////////////////////////

// Ambil urutan bulan sekarang
$_bulan = date('m');

// Deklarasi variabel $tgl ke Sabtu terdekat
if ( date("D") == "Sat" ) {
    // Jika hari ini adalah Sabtu, maka ambil tanggal hari ini
    $tgl = "lp_" . date("md");
} else {
    // Jika hari ini bukan Sabtu, maka ambil tanggal sabtu terdekat sebelumnya
    $tgl = "lp_" . date("md",strtotime("last saturday"));
}

// Ambil semua data santri dari data_santri
$santri = query("SELECT * FROM data_santri WHERE nama_pmbn != 0");

// Ambil semua data pembina dari data_pembina
$pembina = query("SELECT * FROM data_pembina");

// Ambil semua data laporan dari data_list yang sesuai pekan ini diurutkan berdasarkan waktu terkirim
$list = query("SELECT * FROM data_list WHERE nama_lprn = '$tgl' ORDER BY wktu_lprn DESC");

// Ambil semua data bulan dari data_bulan
$bulan = query("SELECT * FROM data_bulan");

// Ambil semua data syaqqah dari data_syaqqah
$syaqqah = query("SELECT * FROM data_syaqqah");
$id_sy = $pembina[$id_p - 1]["nama_syqh"]; // Dapatkan id syaqqah dari data pembina

// Ambil semua data template laporan pekanan dari lp_0000
$laporan = query("SELECT * FROM lp_0000 WHERE id_sntr = 1")[0];




///////////////////////////
// PANGGIL SEMUA SECTION //
///////////////////////////
require 'index/home.php';
require 'index/list.php';
require 'index/edit.php';

?>
</div>

<!-- Bagian navigasi menu dari tampilan inti  -->
<nav id="navigation">

    <!-- Navigasi Home -->
    <button class="navi-btn active" value="home">
        <i class="material-icons">home</i> <!-- Icon -->
        <p>Home</p> <!-- Caption -->
    </button>
    
    <!-- Navigasi List -->
    <button class="navi-btn" value="list">
        <i class="material-icons">vertical_split</i> <!-- Icon -->
        <p>List</p> <!-- Caption -->
    </button>

    <!-- Navigasi Edit -->
    <button class="navi-btn" value="edit">
        <i class="material-icons">drive_file_rename_outline</i> <!-- Icon -->
        <p>Edit</p> <!-- Caption -->
    </button>

<!-- Akhir bagian -->
</nav>

</body>
</html>