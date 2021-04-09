<?php
// Call edit page header
require "edit-header.php";

// Get santri data (name) from data_santri table
$santri = query("SELECT * FROM data_santri");

// Get current laporan table
$laporan = query("SELECT * FROM $lp_n");
?>

<section id="top">
    <h1 id="top-title">Laporan Harian</h1>
    <h4>Pekan ke <?= cek_pekan_u($pekan) ?> dari Bulan <?= $bulan["nama_bulan"] ?></h4>
    <a id="top-button" href="all-daily-edit.php?lap=<?= $pekan ?>">Lapor</a>
</section>

<section id="bot">
    <?php foreach ( $santri as $row ) : ?>
    <div class="bot-container">
        <h3 class="bot-container-name"><?= $row["nama_sntr"] ?></h3>
        <ul class="bot-container-data">
            <li>Tahajjud</li>
            <li><?= $laporan[$row["id_sntr"] - 1 ]["tahajjud"] ?></li>
            <li>Jamaah</li>
            <li><?= $laporan[$row["id_sntr"] - 1 ]["jamaah"] ?></li>
            <li>Duha</li>
            <li><?= $laporan[$row["id_sntr"] - 1 ]["duha"] ?></li>
            <li>Rawatib</li>
            <li><?= $laporan[$row["id_sntr"] - 1 ]["rawatib"] ?></li>
        </ul>
    </div>
    <?php endforeach; ?>
</section>

<section id="reset">
    <form action="" method="post" id="reset-form">
        <input type="text" name="confirm" id="reset-confirm" placeholder="Ketik RESET untuk mereset" autocomplete="off">
        <button type="submit" name="submit" id="reset-submit">Reset</button>
    </form>
</section>

</body>
</html>