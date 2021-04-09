<?php
// Query names of santris from data_santri table
$santri = query("SELECT * FROM data_santri WHERE nama_pmbn = $id_p");

$id_sy = $pembina[$id_p - 1]["nama_syqh"];

?>

<!--//////////////////////////////////-->
<!--           EDIT SECTION           -->
<!--//////////////////////////////////-->
<section class="page" id="edit">
    
    <!-- Top dari header (Akun dan notifikasi) -->
    <div id="edit-menu">

        <!-- Nama pembina yang login -->
        <p id="edit-menu-photo"><i class="material-icons">person</i></p>
        <h2><?= $pembina[$id_p - 1]["sebut"] . ". ". $pembina[$id_p - 1]["nama_pmbn"] ?></h2>

        <!-- Link untuk mengedit laporan pekanan SEMUA santri dalam IBADAH dalam HARIAN -->
        <a href="edit/all-daily-show.php?lp=lp_<?= $bulan[$_bulan - 1]["pekan_1"] ?>" id="edit-menu-daily" class="edit-menu-btn"><i class="material-icons">sticky_note_2</i></a>

        <!-- Link menuju notifikasi atau log out -->
        <a href="" id="edit-menu-notif" class="edit-menu-btn"><i class="material-icons">email</i></a>
        <a href="logout.php" id="edit-menu-logout" class="edit-menu-btn"><i class="material-icons">logout</i></a>

    <!-- Akhir top dari header -->
    </div>
    
    <!-- Bot dari header -->
    <div id="edit-hero">

        <!-- Tampilkan judul bagian edit -->
        <h1 id="edit-hero-title">Edit Laporan</h1>

        <p id="edit-hero-disclaimer">Para <b>pembina</b> yang terhormat, diharapkan untuk tidak menggunakan tanda petik tunggal (') maupun ganda (") saat mengisi laporan.</p>

        <!-- Tombol pilih bulan untuk tampilkan nama-nama bulan -->
        <p id="edit-hero-btn" value="<?= $bulan[$_bulan - 1]["id_bulan"] ?>"><?= $bulan[$_bulan - 1]["nama_bulan"] ?></p>
        
        <!-- Bagian yang muncul ketika tombol pilih bulan dipilih -->
        <ul id="edit-hero-filter" class="option-filter">

        <!-- Foreach nama-nama bulan dari data_bulan -->
        <?php foreach ($bulan as $row) : ?>
            <li class="edit-hero-filter-btn" value="<?= $row["id_bulan"] ?>"><?= $row["nama_bulan"] ?></li>
        <?php endforeach; ?>

        </ul>

    <!-- Akhir bot dari heeader -->
    </div>




    <!-- Content dari Edit -->
    <div id="edit-edit" class="container">

        <!-- Bagian untuk menampilkan laporan pekanan -->
        <div id="edit-edit-pekan" class="edit-card">

            <?php foreach ($bulan[$_bulan - 1] as $_col => $_row) :
                if ( $_col == "id_bulan" or $_col == "nama_bulan" or $_row == "" ) continue; ?>
            <div class="edit-card-piece">

                <div class="edit-card-title">

                    <h2>Pekan <?= cek_pekan_u($_row) ?> ( <?= substr($_row,2) ?> / <?= substr($_row,0,2) ?> )</h2>
                
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

    <!-- Akhir content dari edit -->
    </div>

<!-- Akhir dari EDIT SECTION -->
</section>