<?php
//////////////////////////////////
// DEKLARASI KHUSUS BAGIAN HOME //
//////////////////////////////////

// Deklarasi variabel $stat untuk menyimpan nama_lprn dari 4 minggu lalu
if ( date("w") == "6" ) $sabtu = "0"; 
else $sabtu = "1";
$stat = array('pekan-4' => "lp_" . date("md",strtotime("-" . ($sabtu + 4) . " saturday")), 
              'pekan-3' => "lp_" . date("md",strtotime("-" . ($sabtu + 3) . " saturday")),
              'pekan-2' => "lp_" . date("md",strtotime("-" . ($sabtu + 2) . " saturday")),
              'pekan-1' => "lp_" . date("md",strtotime("-" . ($sabtu + 1) . " saturday")),
              'pekan-0' => "lp_" . date("md",strtotime("-" . ($sabtu + 0) . " saturday"))
            // Ubah dengan strtotime() string yang menunjukkan waktu, lalu dapatkan bulan dan tanggal dari waktu yang didapat dari string
            );

// Deklarasi variabel untuk mendapatkan id_sntr dari data_list dengan array sederhana dari pekan terbaru, $tgl = Sabtu terbaru
$finish_p = simple_query("SELECT id_sntr FROM data_list WHERE nama_lprn = '$tgl'");
$bln = "lb_".date("m",strtotime("last month"));
$finish_b = simple_query("SELECT id_sntr FROM data_list WHERE nama_lprn = '$bln'");
?>




<!--//////////////////////////////////-->
<!--           HOME SECTION           -->
<!--//////////////////////////////////-->
<section id="home" class="page">

    <!--  HOME STAT PEKAN -->
    <!-- //////////////// -->
    <div id="home-stat" class="lap-stat">

        <!-- Bagian judul -->
        <div id="home-stat-title" class="lap-stat-title">

            <!-- Judul bagian -->
            <h1>Laporan Pekanan</h1>

        </div>

        <!-- Container progres untuk semua lapoan terkirim dalam pekan ini -->
        <div id="home-stat-content" class="lap-stat-content">

            <!-- Teks dalam progres -->
            <div id="home-stat-content-text" class="lap-stat-content-text">
                <!-- Baris pertama -->
                <p>Pekan <span class="home-span">ke-<?= cek_pekan_u($tgl) ?></span> Bulan <span class="home-span"><?= $bulan[$_bulan - 1]["nama_bulan"] ?></span></p>
                <!-- Baris kedua -->
                <p>Terkirim <?= count($finish_p) ?> dari <?= count($santri) ?></p>
            </div>

            <!-- Progres semua laporan terkirim pekan ini  -->
            <div id="home-stat-content-range" class="lap-stat-content-range" style="width: <?= 100 / count($santri) * count($finish_p) ?>%;"></div>

        </div>

        <!-- Bagian detail laporan terkirim persyaqqah -->
        <div id="home-stat-detail" class="lap-stat-detail">

            <!-- Foreach untuk perlihatkan semua syaqqah -->
            <?php foreach ( $syaqqah as $row ) :
                $syqh_search = $row["id_syqh"];
                $id_search = simple_query("SELECT id_sntr FROM data_santri WHERE nama_syqh = '$syqh_search'");
                $total_syqh = count($id_search) - count(array_diff($id_search, $finish_p));
            ?>
            <!-- Container progres untuk laporan terkirim dari tiap syaqqah -->
            <div class="lap-stat-content">

                <!-- Teks dalam progres -->
                <div class="lap-stat-content-text">
                    <p><span class="home-span"><?= $row["nama_syqh"] ?></span> : Terkirim <?= $total_syqh ?> / <?= count($id_search) ?></p>
                </div>

                <!-- Progres laporan terkirim tiap syaqqah dalam pekan ini -->
                <div class="lap-stat-content-range" style="width: <?= 100 / count($id_search) * $total_syqh  ?>%;"></div>

            </div>
            <!-- Akhiri foreach -->
            <?php endforeach; ?>

        </div>

        <!-- Bagian tombol detail -->
        <div id="home-stat-btn" class="home-detail">
            
            <!-- Tombol untuk memunculkan dan menyembunyikan detail, default:hide -->
            <p id="home-stat-btn-btn" class="home-detail-btn">Lihat Detail</p>

        </div>

    <!-- Akhir bagian pekan total laporan terkirim -->
    </div>


    <!--  HOME DETAIL PEKAN -->
    <!-- ////////////////// -->
    <div id="home-pekan">

        <!-- Foreach semua syaqqah dalam div yang berbeda -->
        <?php foreach ( $syaqqah as $__row ) : ?>
        <!-- Div untuk setiap syaqqah -->
        <div id="home-pekan-<?= $__row["nama_syqh"] ?>" class="home-lap">

            <!-- Bagian judul -->
            <div class="home-lap-title">

                <!-- Judul bagian -->
                <h2>Syaqqah <?= $__row["nama_syqh"] ?></h2>
                <!-- Keterangan judul -->
                <p>Statistik dalam <span class="home-span">5 pekan</span> terakhir</p>

            </div>

            <!-- Foreach bagian range dari laporan: dapatkan key-nya $_col bukan value $_row -->
            <?php foreach ( $laporan as $_col => $_row ) : 
                // Buat variabel untuk membatasi
                $range = ["tahajjud", "jamaah", "duha", "rawatib", "puasa"];
                // Jika $_col yang dimaksud tidak ada di dalam array $range, maka buang
                if ( !in_array( $_col, $range ) ) continue; ?>
            <!-- Bagian container untuk tiap range -->
            <div id="home-pekan-<?= $__row["nama_syqh"] ?>-<?= $_col ?>" class="home-lap-content">

                <!-- Bagian judul dari tiap range -->
                <div class="home-lap-content-title">

                    <!-- Judul yang diisi dengan $_col alias key dari range -->
                    <h3><?= ucfirst($_col) ?></h3>

                </div>

                <!-- Bagian pembungus dari chart yang akan tampil -->
                <div class="home-lap-content-stat">

                <!-- Foreach 5 pekan terakhir sebagai chart -->
                <?php foreach ( $stat as $row ) : 
                
                    // Deklarasi variable $total sesuai jumlah range yang ditentukan
                    if ( $_col == "tahajjud" or $_col == "duha" or $_col == "puasa") {
                        // Jika tahajjud, duha, dan puasa maka total == 7
                        $total = 7;
                    } elseif ( $_col == "jamaah" ) {
                        // Jika jamaah maka total == 35
                        $total = 35;
                    } else {
                        // Jika rawatib maka total == 70
                        $total = 70;
                    }

                    // Dapatkan id_syqh dari $__row foreach paling awal
                    $id_sy = $__row["id_syqh"];
                    // Dapatkan id_sntr yang ada di syaqqah dengan id_syqh
                    $id_s = simple_query("SELECT id_sntr FROM data_santri WHERE nama_syqh = '$id_sy'");

                    // Buat array kosong sebagai wadah $id_s
                    $data = [];

                    // Foreach $id_s untuk memasukkan semua data $_col dari id_sntr yang bersyaqqah id_syyqh ke wadah yang sudah disediakan
                    foreach ($id_s as $value) {
                        // $_col = tahajjud dll, $row = nama_lprn, yang telah terkirim dan santri berada di syaqqah id_syqh
                        $data[] = simple_query("SELECT $_col FROM $row WHERE ttd_pmbn != '0' AND id_sntr = $value ");
                    }

                    // Buat rata-rata dari data $_col
                    if ( array_sum(simple_query($data)) == 0 or count(simple_query($data)) == 0 ) {
                        $avr = 0;
                    } else {
                        $avr = array_sum(simple_query($data))/count(simple_query($data));
                    }
                ?>
                    <!-- Chart dari tiap pekan, lap = kirim nama_lprn dan stat = kirim rata-rata-->
                    <div class="home-lap-content-stat-range" style="height: <?= ( $avr == 0 ) ? "1" : 100 / $total * $avr ?>%" lap="<?=  substr($row,5). "/" .substr($row,3,2)  ?>" stat="<?= intval($avr) ?>"></div>
                <!-- Akhiri foreach untuk chart -->
                <?php endforeach; ?>
                
                <!-- Akhir bagian pembungus dari chart yang akan tampil -->
                </div>

                <div class="home-lap-content-foul">
                    <p>Di bawah standar</p>
                    <p style="color: #ff6666;">
                    <?php foreach ( $santri as $row ) : 
                        if ( $row["nama_syqh"] != $__row["id_syqh"] ) continue;
                        $id_s = $row["id_sntr"];

                        // Deklarasi variable $total sesuai jumlah range yang ditentukan
                        if ( $_col == "tahajjud" or $_col == "duha") {
                            // Jika tahajjud, duha, dan puasa maka total == 7
                            $total = 3;
                        } elseif ( $_col == "jamaah" ) {
                            // Jika jamaah maka total == 35
                            $total = 17;
                        } elseif ( $_col == "puasa" ) {
                            $total = 1;
                        } else {
                            // Jika rawatib maka total == 70
                            $total = 35;
                        }

                        $foul = simple_query("SELECT ttd_pmbn FROM $tgl WHERE id_sntr = $id_s");

                        if ( !isset($foul[0]) or $foul[0] === "0000-00-00 00:00:00" ) continue;

                        $foul = simple_query("SELECT $_col FROM $tgl WHERE id_sntr = $id_s");

                        if ( !isset($foul[0]) or $foul[0] > $total) continue;

                        ?>
                        <?= $row["nama_sntr"]." | " ?>
                        <?php endforeach; ?>
                    </p>
                </div>

            <!-- Akhir bagian container untuk tiap range -->
            </div>
            <!-- Akhiri foreach untuk $_col atau range -->
            <?php endforeach; ?>

            <!-- Bagian tombol detail -->
            <div class="home-detail">

                <!-- Tombol untuk memunculkan dan menyembunyikan detail, default:hide -->
                <p class="home-detail-btn">Lihat Detail</p>

            </div>


        <!-- Akhir bagian stat tiap syaqqah -->
        </div>
        <!-- Akhiri foreach untuk tiap syaqqah -->
        <?php endforeach; ?>


    </div>




    <!--  HOME STAT BULAN -->
    <!-- //////////////// -->
    <div id="home-bulan" class="lap-stat">

        <!-- Bagian judul -->
        <div id="home-bulan-title" class="lap-stat-title">

            <!-- Judul bagian -->
            <h1>Laporan Bulanan</h1>

        </div>

        <!-- Container progres untuk semua lapoan terkirim dalam pekan ini -->
        <div id="home-bulan-content" class="lap-stat-content">

            <!-- Teks dalam progres -->
            <div id="home-bulan-content-text" class="lap-stat-content-text">
                <!-- Baris pertama -->
                <p>Bulan <span class="home-span"><?= $bulan[$_bulan - 2]["nama_bulan"] ?></span></p>
                <!-- Baris kedua -->
                <p>Terkirim <?= count($finish_b) ?> dari <?= count($santri) ?></p>
            </div>

            <!-- Progres semua laporan terkirim pekan ini  -->
            <div id="home-bulan-content-range" class="lap-stat-content-range" style="width: <?= 100 / count($santri) * count($finish_b) ?>%;"></div>

        </div>

        <!-- Bagian detail laporan terkirim persyaqqah -->
        <div id="home-bulan-detail" class="lap-stat-detail">

            <!-- Foreach untuk perlihatkan semua syaqqah -->
            <?php foreach ( $syaqqah as $row ) :
                $syqh_search = $row["id_syqh"];
                $id_search = simple_query("SELECT id_sntr FROM data_santri WHERE nama_syqh = '$syqh_search'");
                $total_syqh = count($id_search) - count(array_diff($id_search, $finish_b));
            ?>
            <!-- Container progres untuk laporan terkirim dari tiap syaqqah -->
            <div class="lap-stat-content">

                <!-- Teks dalam progres -->
                <div class="lap-stat-content-text">
                    <p><span class="home-span"><?= $row["nama_syqh"] ?></span> : Terkirim <?= $total_syqh ?> / <?= count($id_search) ?></p>
                </div>

                <!-- Progres laporan terkirim tiap syaqqah dalam pekan ini -->
                <div class="lap-stat-content-range" style="width: <?= 100 / count($id_search) * $total_syqh  ?>%;"></div>

            </div>
            <!-- Akhiri foreach -->
            <?php endforeach; ?>

        </div>

        <!-- Bagian tombol detail -->
        <div id="home-bulan-btn" class="home-detail">
            
            <!-- Tombol untuk memunculkan dan menyembunyikan detail, default:hide -->
            <p id="home-bulan-btn-btn" class="home-detail-btn">Lihat Detail</p>

        </div>

    <!-- Akhir bagian pekan total laporan terkirim -->
    </div>

</section>