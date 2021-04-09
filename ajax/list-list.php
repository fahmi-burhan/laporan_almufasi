<?php
// Start the session
session_start();

// Call Funtions
require '../functions.php';

// Check Login
require '../function-login.php';

// Dekalarasi semua variable yang dibutuhkan
$santri = query("SELECT * FROM data_santri"); // Ambil data santri
$bulan = query("SELECT * FROM data_bulan"); // Ambil data bulan
$pembina = query("SELECT * FROM data_pembina"); // Ambil data pembina
$syaqqah = query("SELECT * FROM data_syaqqah"); // Ambil data syaqqah

// Ambil semua data yang terkirim
$sntr = $_GET["sntr"]; // nama_sntr
$_bulan = $_GET["bulan"]; // id_bulan
$pekan = $_GET["pekan"];
if ( $pekan != 0 ) {
    $tgl = "lp_".$bulan[$_bulan - 1]["pekan_$pekan"]; // Urutan pekan
    $lap = $bulan[(int)substr($tgl,3,2) - 1]["nama_bulan"]." pekan ke-".cek_pekan_u(substr($tgl,3));
} else {
    if ( strlen($_bulan) == 1 ) {
        $tgl = "lb_0".$_bulan;
    } else {
        $tgl = "lb_".$_bulan;
    }
    $lap = $bulan[(int)substr($tgl,3,2) - 1]["nama_bulan"];
}
$pmbn = $_GET["pmbn"]; // id_pmbn
$syqh = $_GET["syqh"]; // id_syqh

$list = query("SELECT * FROM data_list WHERE nama_lprn = '$tgl' ORDER BY wktu_lprn DESC"); // Ambil data terkirim

// Ambil id santri dari nama santri yang dimasukkan, ambil dari table data_santri
$id_search = simple_query("SELECT id_sntr FROM data_santri WHERE nama_sntr LIKE '%$sntr%'");

    if ( $list == null or $id_search == null ) :
?>

    <div id="list-list-empty">
        <i class="material-icons">sentiment_very_dissatisfied</i>
        <h2>Mohon Maaf,</h2>
        <h3>Laporan yang anda cari tidak ditemukan</h3>
    </div>

<?php
    endif;

    // Foreach untuk menampilkan semua data dari $list
    foreach ( $list as $row ):

    // Jika nama yang diinput id-nya tidak ada di daftar id_s_arrray maka buang
    if ( !in_array( $row["id_sntr"] , $id_search ) ) continue;

    // Jika id_pmbn yang diinput bukan 00 (default) DAN tidak sesuai dengan id_pmbnn yang ada di data_list, maka buang
    if ( $pmbn != "00"      and $pmbn != $santri[$row["id_sntr"] - 1]["nama_pmbn"]      ) continue;

    // Jika id_syqh yang diinput bukan 00 (default) DAN tidak sesuai dengan id_syqh yang ada di data_list, maka buang
    if ( $syqh != "00"      and $syqh != $santri[$row["id_sntr"] - 1]["nama_syqh"]      ) continue;

?>
<div class="list-content">
    <div class="list-content-wktu">
        <p>Bulan <?= $lap ?></p>
        <p>Dikirim <?= last_edited($row["wktu_lprn"]) ?></p>
    </div>
    <div class="list-content-nama">
        <h2><?= $santri[$row["id_sntr"] - 1]["nama_sntr"] ?></h2>
        <a href="list/view.php?id_sntr=<?= $row["id_sntr"] ?>&lp=<?= $row["nama_lprn"] ?>" class="test"><i class="material-icons">visibility</i></a>
        <a href="index.php"><i class="material-icons">delete</i></a>
        <a href=""><i class="material-icons">print</i></a>
    </div>
    <div class="list-content-syqh">
        <p>Syaqqah: <?= $syaqqah[$santri[$row["id_sntr"] - 1]["nama_syqh"] - 1]["nama_syqh"] ?></p>
        <p>Pembina: <?= $pembina[$santri[$row["id_sntr"] - 1]["nama_pmbn"] - 1]["sebut"] .". ".  $pembina[$santri[$row["id_sntr"] - 1]["nama_pmbn"] - 1]["nama_pmbn"] ?></p>
    </div>
</div>
<?php endforeach; ?>