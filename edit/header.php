<?php
// Mulai session
session_start();

// Panggil daftar fungsi
require '../functions.php';

// Cek login
require '../function-login.php';



/////////////////////////////////////////////////////////
//         FUNGSI   -   FUNGSI          TAMPIL         //
/////////////////////////////////////////////////////////

//       AMBIL      DATA      GET      //
/////////////////////////////////////////
// Ambil data id_sntr untuk bagian one
if ( isset($_GET["id_sntr"]) ) {
    $id_s = $_GET["id_sntr"];
    $santri = query("SELECT * FROM data_santri WHERE id_sntr = $id_s")[0];
}
// Ambil data id_syqh untuk bagian all
if ( isset($_GET["syqh"]) ) {
    $id_sy = $_GET["syqh"];
    $syaqqah = query("SELECT * FROM data_syaqqah WHERE id_syqh = $id_sy")[0];
    $santri = query("SELECT * FROM data_santri WHERE nama_syqh = $id_sy");
}



//         PILIH PEKAN / BULAN         //
/////////////////////////////////////////
if ( isset($_GET["lp"]) ) {

    $lp = $_GET["lp"];
    $pekan = substr($lp, 3);
    $bulan = query("SELECT * FROM data_bulan WHERE
                    pekan_1 = $pekan OR
                    pekan_2 = $pekan OR
                    pekan_3 = $pekan OR
                    pekan_4 = $pekan OR
                    pekan_5 = $pekan")[0];

} elseif ( isset($_GET["lb"]) ) {

    $lp = $_GET["lb"];
    $cari = substr($lp, 3);
    $bulan =  query("SELECT * FROM data_bulan WHERE id_bulan = $cari")[0];

}



//         PILIH / BUAT TABEL          //
/////////////////////////////////////////
function pilih_tabel($lp) {
    global $conn;

    if ( mysqli_query($conn, "SELECT * FROM $lp") ) {

        // Jika tabel sudah ada, langsung buka tabel
        $result = query("SELECT * FROM $lp");

    } else {
        
        if ( isset($_GET["lp"]) ) {

            // Jika tidak ada maka baut tabel dari template yang sudah ada
            mysqli_query($conn, "CREATE TABLE $lp LIKE lp_0000");
            $result = query("SELECT * FROM $lp");

        } elseif ( isset($_GET["lb"]) ) {
            
            // Jika tidak ada maka baut tabel dari template yang sudah ada
            mysqli_query($conn, "CREATE TABLE $lp LIKE lb_00");
            $result = query("SELECT * FROM $lp");
            
        }

    }

    return $result;
}



//           PILIH / BUAT ROW          //
/////////////////////////////////////////
function pilih_row($lp, $santri) {
    global $conn;

    if ( is_string($santri) ) {

        $id_s = $santri;

        if ( isset($_GET["lp"]) ) {

            $sql = "INSERT INTO $lp
                    (id_sntr, tahajjud, jamaah, duha, rawatib, puasa,
                    baca_buku, jum_buku, haf_quran, jum_quran, haf_hadis, jum_hadis,
                    haf_matan, jum_matan, talaqqi, ttd_pmbn)
                    VALUE ($id_s, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '')";

        } elseif ( isset($_GET["lb"]) ) {

            $sql = "INSERT INTO $lp
                    (id_sntr, perilaku, ucapan, disiplin, kegiatan, sekolah,
                    cuci, penampilan, kasur, catatan, ttd_pmbn)
                    VALUE ($id_s, '', '', '', '', '', '', '', '', '', '')";

        }

        if ( mysqli_query($conn, $sql) ) {

            // Coba buat, jika berhasil maka ambil row baru tersebut
            $result = query("SELECT * FROM $lp WHERE id_sntr = $id_s")[0];

        } else {

            // Jika tidak berhasil, maka ambil yang sudah ada
            $result = query("SELECT * FROM $lp WHERE id_sntr = $id_s")[0];

        }

        return $result;

    } else {

        foreach ($santri as $row ) {

            $id_s = $row["id_sntr"];

            $sql = "INSERT INTO $lp
                (id_sntr, jamaah, tahajjud, duha, rawatib, puasa,
                baca_buku, jum_buku, haf_quran, jum_quran, haf_hadis, jum_hadis,
                haf_matan, jum_matan, talaqqi, ttd_pmbn)
                VALUE ($id_s, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '')";

            if ( mysqli_query($conn, $sql) ) {

                // Coba buat, jika berhasil maka ambil row baru tersebut
                $rows = query("SELECT * FROM $lp WHERE id_sntr = $id_s")[0];

            } else {

                // Jika tidak berhasil, maka ambil yang sudah ada
                $rows = query("SELECT * FROM $lp WHERE id_sntr = $id_s")[0];
                
            }

            $result[] = $rows;
        }

        return $result;

    }

}


////////////////////////////////////////////////////////
//         FUNGSI   -   FUNGSI          KIRIM         //
////////////////////////////////////////////////////////

/////////////////////////////
//     UPDATE FUNCTION     //
/////////////////////////////
function _update($lp, $santri ) {
    global $conn; // Jadikan global

    if ( isset($_GET["lp"]) ) {

        /////////////////////////////////////////
        //   UPDATE   KE   LAPORAN   PEKANAN   //
        /////////////////////////////////////////
        foreach ( $santri as $row ) {
        
            if ( is_string($row) ) {
                $id_s = $row;
            } else {
                $id_s = $row["id_sntr"];
            }
    
            $a = $_POST["id_sntr_$id_s"];
            $b = $_POST["tahajjud_$id_s"];
            $c = $_POST["jamaah_$id_s"];
            $d = $_POST["duha_$id_s"];
            $e = $_POST["rawatib_$id_s"];
            $f = $_POST["puasa_$id_s"];
            $g = $_POST["baca_buku_$id_s"];
            $h = intval($_POST["jum_buku_$id_s"]);
            $i = $_POST["haf_quran_$id_s"];
            $j = intval($_POST["jum_quran_$id_s"]);
            $k = $_POST["haf_hadis_$id_s"];
            $l = intval($_POST["jum_hadis_$id_s"]);
            $m = $_POST["haf_matan_$id_s"];
            $n = intval($_POST["jum_matan_$id_s"]);
            $o = $_POST["talaqqi_$id_s"];
            if ( isset($_POST["ttd_pmbn_$id_s"]) ) {
                // Jika sudah selesai, maka catat waktunya
                $p = date("Y-m-d H:i:s");
            } else {
                // Jika belum selesai, maka reset waktunya
                $p = "0000-00-00 00:00:00";
            }
    
            // Buat sql untuk update
            $sql = "UPDATE $lp SET
            id_sntr       = $a,
            tahajjud        = $b,
            jamaah          = $c,
            duha            = $d,
            rawatib         = $e,
            puasa           = $f,
            baca_buku       = '$g',
            jum_buku        = $h,
            haf_quran       = '$i',
            jum_quran       = $j,
            haf_hadis       = '$k',
            jum_hadis       = $l,
            haf_matan       = '$m',
            jum_matan       = $n,
            talaqqi         = '$o',
            ttd_pmbn     = '$p'
            WHERE id_sntr = $a";
    
            // Update data
            mysqli_query($conn, $sql);
    
            if ( is_string($row) ) break;
            
        }
        
    } elseif ( isset($_GET["lb"]) ) {

        /////////////////////////////////////////
        //   UPDATE   KE   LAPORAN   BULANAN   //
        /////////////////////////////////////////
        foreach ( $santri as $row ) {
        
            if ( is_string($row) ) {
                $id_s = $row;
            } else {
                $id_s = $row["id_sntr"];
            }
    
            $a = $_POST["id_sntr_$id_s"];
            $b = $_POST["perilaku_$id_s"];
            $c = $_POST["ucapan_$id_s"];
            $d = $_POST["disiplin_$id_s"];
            $e = $_POST["kegiatan_$id_s"];
            $f = $_POST["sekolah_$id_s"];
            $g = $_POST["cuci_$id_s"];
            $h = $_POST["penampilan_$id_s"];
            $i = $_POST["kasur_$id_s"];
            $j = $_POST["catatan_$id_s"];
            if ( isset($_POST["ttd_pmbn_$id_s"]) ) {
                // Jika sudah selesai, maka catat waktunya
                $p = date("Y-m-d H:i:s");
            } else {
                // Jika belum selesai, maka reset waktunya
                $p = "0000-00-00 00:00:00";
            }
    
            // Buat sql untuk update
            $sql = "UPDATE $lp SET
            id_sntr       = $a,
            perilaku      = $b,
            ucapan        = $c,
            disiplin      = $d,
            kegiatan      = $e,
            sekolah       = $f,
            cuci          = $g,
            penampilan    = $h,
            kasur         = $i,
            catatan       = '$j',
            ttd_pmbn      = '$p'
            WHERE id_sntr = $a";
    
            // Update data
            mysqli_query($conn, $sql);
    
            if ( is_string($row) ) break;
            
        }
    }

    //////////////////////////////////////
    //   UPDATE   KE   LIST   LAPORAN   //
    //////////////////////////////////////
    foreach ($santri as $row) {

        if ( is_string($row) ) {
            $id_s = $row;
        } else {
            $id_s = $row["id_sntr"];
        }

        $a = $_POST["id_sntr_$id_s"];
        if ( isset($_POST["ttd_pmbn_$id_s"]) ) {
            // Jika sudah selesai, maka catat waktunya
            $p = date("Y-m-d H:i:s");
        } else {
            // Jika belum selesai, maka reset waktunya
            $p = "0000-00-00 00:00:00";
        }

        // Buat sql untuk cek apakah row sudah ada atau belum
        $sql = "SELECT * FROM data_list WHERE id_sntr = $a AND nama_lprn = '$lp'";
        $cek = mysqli_num_rows( mysqli_query($conn, $sql) );

        // Dapatkan id dari row yang diinginkan
        $id_list = mysqli_fetch_assoc(mysqli_query($conn, $sql))["id_list"];

        // Cek ttd_pembina diceklis atau tidak
        if ( $p === "0000-00-00 00:00:00" ) {
            // Jika tidak diceklism, hapus row lama atau biarkan
            $sql = "DELETE FROM data_list WHERE id_list = $id_list";
        } else {
            // Jiak diceklis, cek apakah row sudah ada atau belum
            if ( $cek > 0 ) {
                // Jika sudah ada maka update row dengan data baru
                $sql = "UPDATE data_list SET
                        id_list       = $id_list,
                        id_sntr       = $a,
                        nama_lprn     = '$lp',
                        wktu_lprn     = '$p'
                        WHERE id_list = $id_list";
            } else {
                // Jika belum, buat row baru dan masukkan data 
                $sql = "INSERT INTO data_list (id_list, id_sntr, nama_lprn, wktu_lprn)
                        VALUE ('', $a, '$lp', '$p')";
            }
        }

        // Ambil data sql dan update
        mysqli_query($conn, $sql);

        if ( is_string($row) ) break;

    }


    header("Location: ../index.php");
    exit;

}


if ( isset($_POST["one_weekly"]) ) {
    _update($lp, $santri);
}

if ( isset($_POST["all_weekly_range"]) ) {
    _update($lp, $santri);
}

if ( isset($_POST["all_weekly_text"]) ) {
    _update($lp, $santri);
}

if ( isset($_POST["one_monthly"]) ) {
    _update($lp, $santri);
}



//////////////////////////////////
//     UPDATE FROM ALL DAILY    //
//////////////////////////////////
if ( isset($_POST["all_daily"]) ) {
    
    // Use foreach tio list all santris
    foreach ( $santri as $row ) {
        
        // Get sended data with post method
        $_slot = $row["id_sntr"];

        // Dapatkan semua data yang terkirim melalui POST
        $a = $_POST["id_sntr_$_slot"];
        $b = $row["tahajjud"]   + $_POST["tahajjud_$_slot"];
        $c = $row["jamaah"]     + $_POST["jamaah_$_slot"];
        $d = $row["duha"]       + $_POST["duha_$_slot"];
        $e = $row["rawatib"]    + $_POST["rawatib_$_slot"];
        $f = $row["puasa"]      + $_POST["puasa_$_slot"];
        $g = $laporan[$row['id_sntr'] - 1]['baca_buku'];
        $h = $laporan[$row['id_sntr'] - 1]['jum_buku'];
        $i = $laporan[$row['id_sntr'] - 1]['haf_quran'];
        $j = $laporan[$row['id_sntr'] - 1]['jum_quran'];
        $k = $laporan[$row['id_sntr'] - 1]['haf_hadis'];
        $l = $laporan[$row['id_sntr'] - 1]['jum_hadis'];
        $m = $laporan[$row['id_sntr'] - 1]['haf_matan'];
        $n = $laporan[$row['id_sntr'] - 1]['jum_matan'];
        $o = $laporan[$row['id_sntr'] - 1]['talaqqi'];
        $p = $laporan[$row['id_sntr'] - 1]['ttd_pmbn'];

        // Panggil fungsi update
        _update($lp_n, $a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p);
        
    }
    // Kembali ke beranda setealah bekerja
    header("Location: ../index.php");
    exit;
}


?>

<!-- ------------------------ -->
<!-- HEADER HTML OF EDIT PAGE -->
<!-- ------------------------ -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Laporan</title>

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/edit-page.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="shortcut icon" href="../almufasi-icon.ico" type="image/x-icon">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/script.js"></script>
</head>
<body>