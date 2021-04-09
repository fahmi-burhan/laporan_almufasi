<?php
// Start the session
session_start();

// Call Funtions
require '../functions.php';

// Check Login
require '../function-login.php';

// Ambil data pembina dari tabel data_pembina
$pembina = query("SELECT * FROM data_pembina");

// Query data from data_list table
$list = query("SELECT * FROM data_list ORDER BY wktu_lprn DESC");

// Set default month to present month
$_bulan = $_GET["bulan"];

// Query all weeks data from data_bulan table
$bulan = query("SELECT * FROM data_bulan");

// Query data syaqqah
$syaqqah = query("SELECT * FROM data_syaqqah");
$id_sy = $pembina[$id_p - 1]["nama_syqh"];

$santri = query("SELECT * FROM data_santri WHERE nama_pmbn = $id_p");

?>




<!-- Bagian untuk menampilkan laporan pekanan -->
<div id="edit-edit-pekan" class="edit-card">

<?php foreach ($bulan[$_bulan - 1] as $_col => $_row) :
    if ( $_col == "id_bulan" or $_col == "nama_bulan" or $_row == "" ) continue; ?>
<div class="edit-card-piece">

    <div class="edit-card-title">

        <h2>Pekan <?= cek_pekan_u($_row) ?> ( <?= substr($_row,0,2) ?> / <?= substr($_row,2) ?> )</h2>
    
    </div>
    
    <ul class="edit-card-content <?= ( $_row == substr($tgl, 3)) ? "active" : "" ?>">

        <li>
            <!-- Link untuk mengedit laporan pekanan SEMUA santri dalam IBADAH -->
            <a href="edit/all-weekly-range.php?syqh=<?= $id_sy ?>&lp=lp_<?= $_row ?>">
                <i class="material-icons">edit</i
                ><p>Ibadah</p>
            </a>

            <!-- Link untuk mengedit laporan pekanan SEMUA santri dalam AKADEMIK -->
            <a href="edit/all-weekly-text.php?syqh=<?= $id_sy ?>&lp=lp_<?= $_row ?>">
                <i class="material-icons">edit</i>
                <p>Akademik</p>
            </a>
        </li>
    
        <!-- Foreach santri terpilih ke $row -->
        <?php foreach ( $santri as $row ):  ?>
        <li>

            <!-- Chcekbox untuk menampilkan apakah laporan ini sudah selesai atau belum -->
            <input type="radio" class="edit-card-content-radio" <?= ( cek_terkirim($row["id_sntr"], $_row) > 0 ) ? "checked" : ""  ?> disabled>

            <!-- Link untuk mengedit laporan pekanan SATU santri baik IBADAH atau AKADEMIK -->
            <a href="edit/one-weekly.php?id_sntr=<?= $row["id_sntr"] ?>&lp=lp_<?= $_row ?>">
                <!-- Tampilkan nama santri -->
                <p><?= $row["nama_sntr"] ?></p>
                <i class="material-icons">edit</i>
            </a>

        </li>
        <!-- Akhir foreach dari $santri as $row-->
        <?php endforeach; ?> 

    </ul>

</div>
<?php endforeach; ?>

<!-- Akhir dari laporan pekanan -->
</div>



<div id="edit-edit-bulan" class="edit-card"> <!-- Bagian untuk menampilkan laporan bulanan -->

<div class="edit-card-piece">

    <div class="edit-card-title">

        <h2>Bulan <span id="nama-bulan"><?= $bulan[$_bulan - 1]["nama_bulan"] ?></span></h2>

    </div>


    <ul class="edit-card-content active"> <!-- Tampilkan semua santri terpilih dengan foreach -->

        <!-- Foreach santri terpilih ke $row -->
        <?php foreach ( $santri as $row ): ?>
        <li>
            
            <!-- Chcekbox untuk menampilkan apakah laporan ini sudah selesai atau belum -->
            <input type="radio" class="edit-card-content-radio" <?= ( cek_terkirim($row["id_sntr"], $_bulan ) > 0 ) ? "checked" : ""  ?> disabled>

            <!-- Link untuk mengedit laporan bulanan santri -->
            <a href="edit/one-monthly.php?id_sntr=<?= $row["id_sntr"] ?>&lb=lb_<?= $_bulan ?>">
                <!-- Tampilkan nama santri -->
                <p><?= $row["nama_sntr"] ?></p>
                <i class="material-icons">edit</i>
            </a>

        </li>
        <!-- Akhir foreach dari $santri as $row-->
        <?php endforeach; ?>

    </ul>

</div>

</div> <!-- Akhir dari laporan bulanan -->