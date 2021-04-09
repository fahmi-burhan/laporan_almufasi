<?php
// Start the session
session_start();

// Call Funtions
require '../functions.php';

// Check Login
require '../function-login.php';

// Ambil semua data yang terkirim
$_bulan = $_GET["bulan"]; // id_bulan

// Dekalarasi semua variable yang dibutuhkan
$bulan = query("SELECT * FROM data_bulan"); // Ambil data bulan


foreach ( $bulan[$_bulan -1] as $col => $row ) : 
if ( $col == "id_bulan" or $col == "nama_bulan" or $row == "" ) continue;?>

    <li class="option-filter-pekan" value="<?= substr($col, 6) ?>">Pekan <?= substr($col, 6) ?></li>

<?php endforeach; ?>

    <li class="option-filter-pekan" value="00">Bulanan</li>