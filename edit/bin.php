<?php
    
    
    /////////////////////////////////////////
    //           PILIH / BUAT ROW          //
    /////////////////////////////////////////
    function row_baru_one($id_s){ // ONE WEEKLY dan terima id santri
        global $conn, $lp_n; // Jadikan global

        // Buat sql untuk row kosong dan masukkan id yang dikirim
        $sql = "INSERT INTO $lp_n
                (id_sntr, jamaah, tahajjud, duha, rawatib, puasa,
                baca_buku, jum_buku, haf_quran, jum_quran, haf_hadis, jum_hadis,
                haf_matan, jum_matan, talaqqi, ttd_pmbn)
                VALUE ($id_s, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '')";

        if ( mysqli_query($conn, $sql) ) {
            // Coba buat, jika berhasil maka ambil row baru tersebut
            $result = query("SELECT * FROM $lp_n WHERE id_sntr = $id_s")[0];
        } else {
            // Jika tidak berhasil, maka ambil yang sudah ada
            $result = query("SELECT * FROM $lp_n WHERE id_sntr = $id_s")[0];
        }
        
        // Kembalikan data row yang sudah dipilih
        return $result;
    }
    function row_baru_all($santri) { // ALL WEEKLY dan terima data santri
        global $conn, $lp_n; // Jadikan global

        // Lakukan foreach untuk membuat row satu persatu 
        foreach ($santri as $row ) {
            
            // Ambil id dari data $santri yang dikirimkan
            $id_s = $row["id_sntr"];

            // Buat sql untuk row kosong dan masukkan id yang dikirim
            $sql = "INSERT INTO $lp_n
                (id_sntr, jamaah, tahajjud, duha, rawatib, puasa,
                baca_buku, jum_buku, haf_quran, jum_quran, haf_hadis, jum_hadis,
                haf_matan, jum_matan, talaqqi, ttd_pmbn)
                VALUE ($id_s, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '')";

            if ( mysqli_query($conn, $sql) ) {
                // Coba buat, jika berhasil maka ambil row baru tersebut
                $rows = query("SELECT * FROM $lp_n WHERE id_sntr = $id_s")[0];
            } else {
                // Jika tidak berhasil, maka ambil yang sudah ada
                $rows = query("SELECT * FROM $lp_n WHERE id_sntr = $id_s")[0];
            }
            
            // Setelah selesai, masukkan row yang telah dibuat ke dalam array
            $result[] = $rows;
        }

        // Kembalikan data yang suidah dibungkus array
        return $result;
    }








    

////////////////////////////////////
//  Deklarasi Variabel yang Perlu //
////////////////////////////////////

// Dapatkan data pekan dari GET lalu ubah menjadi nama tabel
if ( isset($_GET["lp"]) ) {
    $lp = $_GET["lp"];
    $pekan = substr($lp, 3);
    $bulan = query("SELECT * FROM data_bulan WHERE
                    pekan_1 = $pekan OR
                    pekan_2 = $pekan OR
                    pekan_3 = $pekan OR
                    pekan_4 = $pekan OR
                    pekan_5 = $pekan")[0];

    

}













function _update($lp_n, $a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p) {
    global $conn; // Jadikan global

    // Jadikan integer data string yang dikirim
    $h = intval($h); // jum_buku
    $j = intval($j); // jum_quran
    $l = intval($l); // jum_hadis
    $n = intval($n); // jum_matan

    // Buat sql untuk update
    $sql = "UPDATE $lp_n SET
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
}















////////////////////////////////////
//     UPDATE FROM ONE WEEKLY     //
////////////////////////////////////
if ( isset($_POST["one_weekly"]) ) {

    // Dapatkan semua data yang terkirim melalui POST
    $a = $_POST["id_sntr"];
    $b = $_POST["tahajjud"];
    $c = $_POST["jamaah"];
    $d = $_POST["duha"];
    $e = $_POST["rawatib"];
    $f = $_POST["puasa"];
    $g = $_POST["baca_buku"];
    $h = $_POST["jum_buku"];
    $i = $_POST["haf_quran"];
    $j = $_POST["jum_quran"];
    $k = $_POST["haf_hadis"];
    $l = $_POST["jum_hadis"];
    $m = $_POST["haf_matan"];
    $n = $_POST["jum_matan"];
    $o = $_POST["talaqqi"];
    if ( isset($_POST["ttd_pmbn"]) ) {
        // Jika sudah selesai, maka catat waktunya
        $p = date("Y-m-d H:i:s");
    } else {
        // Jika belum selesai, maka reset waktunya
        $p = "0000-00-00 00:00:00";
    }
    
    // Panggil fungsi update
    _update($lp_n, $a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p);

    // Panggil fungsi list untuk memasukkan data selesai ke dalam tabel
    _list($lp_n, $a, $p);

    // Kembali ke beranda setealah bekerja
    header('Location: ../index.php');
    exit;
}


/////////////////////////////////////
//   UPDATE FROM ALL WEEKLY RANGE  //
/////////////////////////////////////
if ( isset($_POST["all_weekly_range"]) ) {

    // Dapatkan semua data dari santri yang mau diupdate
    $id_sy = $_GET["syqh"];
    $santri = query("SELECT * FROM data_santri WHERE nama_syqh = $id_sy");
    $no = 0; // Deskripsikan variabel $no untuk dijadikan pengirim

    // Foreach untuk masukkaan data satu persatu
    foreach ( $santri as $row ) {

        // Dapatkan id_sntr untuk membedakan tiap loop
        $_slot = $row["id_sntr"];
        // Dapatkan laporan yang sudah dikirim
        $laporan = row_baru_all($santri);

        // Dapatkan semua data yang terkirim melalui POST
        $a = $_POST["id_sntr_$_slot"];
        $b = $_POST["tahajjud_$_slot"];
        $c = $_POST["jamaah_$_slot"];
        $d = $_POST["duha_$_slot"];
        $e = $_POST["rawatib_$_slot"];
        $f = $_POST["puasa_$_slot"];
        $g = $laporan[$no]['baca_buku'];
        $h = $laporan[$no]['jum_buku'];
        $i = $laporan[$no]['haf_quran'];
        $j = $laporan[$no]['jum_quran'];
        $k = $laporan[$no]['haf_hadis'];
        $l = $laporan[$no]['jum_hadis'];
        $m = $laporan[$no]['haf_matan'];
        $n = $laporan[$no]['jum_matan'];
        $o = $laporan[$no]['talaqqi'];
        $p = $laporan[$no]['ttd_pmbn'];

        $no++; // Tambahkan isi $no untuk membedakan tiap loop

        // Panggil fungsi update
        _update($lp_n, $a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p);
    }
    // Kembali ke beranda setealah bekerja
    header('Location: ../index.php');
    exit;
}


////////////////////////////////////
//   UPDATE FROM ALL WEEKLY TEXT  //
////////////////////////////////////
if ( isset($_POST["all_weekly_text"]) ) {

    // Dapatkan semua data dari santri yang mau diupdate
    $id_sy = $_GET["syqh"];
    $santri = query("SELECT * FROM data_santri WHERE nama_syqh = $id_sy");
    $no = 0; // Deskripsikan variabel $no untuk dijadikan pengirim

    // Foreach untuk masukkaan data satu persatu
    foreach ( $santri as $row ) {

        // Dapatkan id_sntr untuk membedakan tiap loop
        $_slot = $row["id_sntr"];
        // Dapatkan laporan yang sudah dikirim
        $laporan = row_baru_all($santri);

        // Dapatkan semua data yang terkirim melalui POST
        $a = $laporan[$no]['id_sntr'];
        $b = $laporan[$no]['tahajjud'];
        $c = $laporan[$no]['jamaah'];
        $d = $laporan[$no]['duha'];
        $e = $laporan[$no]['rawatib'];
        $f = $laporan[$no]['puasa'];
        $g = $_POST["baca_buku_$_slot"];
        $h = $_POST["jum_buku_$_slot"];
        $i = $_POST["haf_quran_$_slot"];
        $j = $_POST["jum_quran_$_slot"];
        $k = $_POST["haf_hadis_$_slot"];
        $l = $_POST["jum_hadis_$_slot"];
        $m = $_POST["haf_matan_$_slot"];
        $n = $_POST["jum_matan_$_slot"];
        $o = $_POST["talaqqi_$_slot"];
        if ( isset($_POST["ttd_pmbn_$_slot"]) ) {
            // Jika sudah selesai, maka catat waktunya
            $p = date("Y-m-d H:i:s");
        } else {
            // Jika belum selesai, maka reset waktunya
            $p = "0000-00-00 00:00:00";
        }

        $no++; // Tambahkan isi $no untuk membedakan tiap loop

        // Panggil fungsi update
        _update($lp_n, $a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p);
        
        // Panggil fungsi list untuk memasukkan data selesai ke dalam tabel
        _list($lp_n, $a, $p);
    }
    // Kembali ke beranda setealah bekerja
    header('Location: ../index.php');
    exit;
}















//////////////////////////////////////////////
//             LIST FUNCTION                //
// Masukkan data selesai ke data_list table //
//////////////////////////////////////////////
function _list($lp_n, $a, $p){
    global $conn; // Jadikan global
    
    // Buat sql untuk cek apakah row sudah ada atau belum
    $sql = "SELECT * FROM data_list WHERE id_sntr = $a AND nama_lprn = '$lp_n'";
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
                    nama_lprn     = '$lp_n',
                    wktu_lprn     = '$p'
                    WHERE id_list = $id_list";
        } else {
            // Jika belum, buat row baru dan masukkan data 
            $sql = "INSERT INTO data_list (id_list, id_sntr, nama_lprn, wktu_lprn)
                    VALUE ('', $a, '$lp_n', '$p')";
        }
    }

    // Ambil data sql dan update
    mysqli_query($conn, $sql);
}

    ?>