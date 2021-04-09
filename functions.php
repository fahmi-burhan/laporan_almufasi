<?php
////////////////////////////////
//     CONNET TO DATABASE     //
////////////////////////////////
$host = "localhost";
$user = "root";
$pass = "";
$_db_ = "lap_2021";
$conn = mysqli_connect($host, $user, $pass, $_db_)
or header('Location: error.php');

/////////////////////////////////
//    SET DEFAULT TIME ZONE    //
//       AFRICA / CAIRO        //
/////////////////////////////////
date_default_timezone_set("Africa/Cairo");

///////////////////////////////
//       QUERY FUNCTION      //
///////////////////////////////
function query($sql) {
    global $conn; // Change variable scope to global
    // Query sended $sql from user
    $result = mysqli_query($conn, $sql);
    $rows = []; // Make array as 
    while( $row = mysqli_fetch_assoc($result) ) {
        // Put in to array while there data exist
        $rows[] = $row;
    }
    return $rows; // Send back data in arrow
}


///////////////////////////////
//   SIMPLE_QUERY FUNCTION   //
///////////////////////////////
function simple_query($array) {
    if ( !is_array($array) ) {
        $array = query($array);
    }
    $result = array();
    foreach ($array as $key => $value) {
        $result = array_merge($result, array_values($value));
    }
    return $result;
}


///////////////////////////////////
//   CEK PEKAN URUTAN FUNCTION   //
///////////////////////////////////
function cek_pekan_u($pekan) {
    // Cek apakah $pekan ada 'lp_' di awal atau tidak
    if ( strlen($pekan) == 7 ) {
        // Jika ada maka hapus 'lp_' dari awalnya
        $pekan = substr($pekan, 3);
    }

    // Select month from listed month in data_bulan table
    $bulan = query("SELECT * FROM data_bulan WHERE pekan_1 = $pekan OR pekan_2 = $pekan OR pekan_3 = $pekan OR pekan_4 = $pekan OR pekan_5 = $pekan")[0];

    // Check order of $pekan in that month
    if ( $bulan["pekan_1"] == $pekan ) {
        $result = 1;
    } elseif ( $bulan["pekan_2"] == $pekan ) {
        $result = 2;
    } elseif ( $bulan["pekan_3"] == $pekan ) {
        $result = 3;
    } elseif ( $bulan["pekan_4"] == $pekan ) {
        $result = 4;
    }  elseif ( $bulan["pekan_5"] == $pekan ) {
        $result = 5;
    }

    // Kirim kembali result
    return $result;
}


//////////////////////////////
//   LAST EDITED FUNCTION   //
//////////////////////////////
function last_edited($waktu) {
    // Get current time
    $now = date_create();

    // Get edited time from database data_list
    $waktu = date_create($waktu);

    // Get different from two times
    $result = date_diff($now,$waktu);

    // Change different date format from object to string to array
    $a = explode(" ",$result->format("%Y %m %a %H %I"));

    // Returning the result
    // If it edited more than one year
    if ( $a[2] > 1 ) {
        return date_format($waktu, "d-m-Y");
    }
    // If it edited last day
    elseif ( $a[2] > 0 ) {
        return ("Kemarin");
    }
    // If it edited more than one hour
    elseif ( $a[3] > 1 ) {
        return $result->format("%h jam yang lalu");
    }
    // If it edited more than three minutes
    elseif ( $a[4] > 3) {
        return $result->format("%i menit yang lalu");
    }
    // If it edited in last three minutes
    else {
        return ("Baru saja");
    }
}


///////////////////////////////
//   CEK TERKIRIM FUNCTION   //
///////////////////////////////
function cek_terkirim($id_sntr, $lp) {
    global $conn; // Change variable scope to global

    if ( strlen($lp) == 4 ) {
        $lp = "lp_" . $lp;
        $sql    = "SELECT * FROM data_list WHERE id_sntr = '$id_sntr' AND nama_lprn = '$lp'";
    } else {
        $lp = "lb_" . $lp;
        $sql    = "SELECT * FROM data_list WHERE id_sntr = '$id_sntr' AND nama_lprn = '$lp'";
    }

    $result = mysqli_query($conn, $sql);
    return mysqli_num_rows($result);
}


/////////////////////////////
//     HAPUS   LAPORAN     //
/////////////////////////////
// function hapus($lp, $id_s) {
//     global $conn;

//     mysqli_query($conn, "DELETE FROM $lp WHERE id_sntr = '$id_s'");

// }