<?php
// Call edit page header
require "header.php";

$laporan = pilih_row($lp, $santri);

?>

<section id="edit-page" class="page">

    <div class="edit-page-title">

        <h2>Edit Laporan</h2>
        <h3>Bulan <?= $bulan["nama_bulan"] ?></h3>
        <h3>Syaqqah <?= $syaqqah["nama_syqh"] ?></h3>

    </div>

<form id="edit-form" action="" method="post">

    <div class="edit-form container">

        <div>
            <?php $no = 0; foreach ( $santri as $row ) : ?>
            <input type="hidden" name="id_sntr_<?= $row["id_sntr"] ?>" value="<?= $laporan[$no]["id_sntr"] ?>">
            <?php $no++; endforeach; ?>
        </div>

        <div>

            <?php $no = 0; foreach ( $santri as $row ) : ?>
            <input type="hidden" name="tahajjud_<?= $row["id_sntr"] ?>" value="<?= $laporan[$no]["tahajjud"] ?>">
            <input type="hidden" name="jamaah_<?= $row["id_sntr"] ?>" value="<?= $laporan[$no]["jamaah"] ?>">
            <input type="hidden" name="duha_<?= $row["id_sntr"] ?>" value="<?= $laporan[$no]["duha"] ?>">
            <input type="hidden" name="rawatib_<?= $row["id_sntr"] ?>" value="<?= $laporan[$no]["rawatib"] ?>">
            <input type="hidden" name="puasa_<?= $row["id_sntr"] ?>" value="<?= $laporan[$no]["puasa"] ?>">
            <?php $no++; endforeach; ?>

        </div>

        <div class="edit-form-fill">

            <div class="edit-form-title">
                <h3>Baca Buku</h3>
            </div>

            <?php $no = 0; foreach ( $santri as $row ) : ?>
            <div class="edit-form-text">
                <input type="text" name="baca_buku_<?= $row["id_sntr"] ?>" id="baca-buku-<?= $row["id_sntr"] ?>" class="edit-form-text-input" value="<?= $laporan[$no]['baca_buku'] ?>" placeholder="0">
                <label for="baca-buku-<?= $row["id_sntr"] ?>" class="edit-form-text-name"><?= $row["nama_sntr"] ?></label>
            </div>
            <div class="edit-form-number">
                <input type="number" name="jum_buku_<?= $row["id_sntr"] ?>" id="jum-buku-<?= $row["id_sntr"] ?>" class="edit-form-number-input" value="<?= ( $laporan[$no]["jum_buku"] == 0 ) ? "" : $laporan[$no]["jum_buku"] ?>" placeholder="0">
                <label for="jum-buku-<?= $row["id_sntr"] ?>" class="edit-form-number-name">Hal</label>
            </div>
            <?php $no++; endforeach; ?>

        </div>

        <div class="edit-form-fill">

            <div class="edit-form-title">
                <h3>Hafalan Quran</h3>
            </div>

            <?php $no = 0; foreach ( $santri as $row ) : ?>
            <div class="edit-form-text">
                <input type="text" name="haf_quran_<?= $row["id_sntr"] ?>" id="hquran-<?= $row["id_sntr"] ?>" class="edit-form-text-input" value="<?= $laporan[$no]['haf_quran'] ?>" placeholder="0">
                <label for="haf-quran-<?= $row["id_sntr"] ?>" class="edit-form-text-name"><?= $row["nama_sntr"] ?></label>
            </div>
            <div class="edit-form-number">
                <input type="number" name="jum_quran_<?= $row["id_sntr"] ?>" id="jum-quran-<?= $row["id_sntr"] ?>" class="edit-form-number-input" value="<?= ( $laporan[$no]["jum_quran"] == 0 ) ? "" : $laporan[$no]["jum_quran"] ?>" placeholder="0">
                <label for="jum-quran-<?= $row["id_sntr"] ?>" class="edit-form-number-name">Hal</label>
            </div>
            <?php $no++; endforeach; ?>

        </div>

        <div class="edit-form-fill">

            <div class="edit-form-title">
                <h3>Hafalan Hadis</h3>
            </div>

            <?php $no = 0; foreach ( $santri as $row ) : ?>
            <div class="edit-form-text">
                <input type="text" name="haf_hadis_<?= $row["id_sntr"] ?>" id="haf-hadis-<?= $row["id_sntr"] ?>" class="edit-form-text-input" value="<?= $laporan[$no]['haf_hadis'] ?>" placeholder="0">
                <label for="haf-hadis-<?= $row["id_sntr"] ?>" class="edit-form-text-name"><?= $row["nama_sntr"] ?></label>
            </div>
            <div class="edit-form-number">
                <input type="number" name="jum_hadis_<?= $row["id_sntr"] ?>" id="jum-hadis-<?= $row["id_sntr"] ?>" class="edit-form-number-input" value="<?= ( $laporan[$no]["jum_hadis"] == 0 ) ? "" : $laporan[$no]["jum_hadis"] ?>" placeholder="0">
                <label for="jum-hadis-<?= $row["id_sntr"] ?>" class="edit-form-number-name">Hal</label>
            </div>
            <?php $no++; endforeach; ?>

        </div>

        <div class="edit-form-fill">

            <div class="edit-form-title">
                <h3>Hafalan Matan</h3>
            </div>

            <?php $no = 0; foreach ( $santri as $row ) : ?>
            <div class="edit-form-text">
                <input type="text" name="haf_matan_<?= $row["id_sntr"] ?>" id="haf-matan-<?= $row["id_sntr"] ?>" class="edit-form-text-input" value="<?= $laporan[$no]['haf_matan'] ?>" placeholder="0">
                <label for="haf-matan-<?= $row["id_sntr"] ?>" class="edit-form-text-name"><?= $row["nama_sntr"] ?></label>
            </div>
            <div class="edit-form-number">
                <input type="number" name="jum_matan_<?= $row["id_sntr"] ?>" id="jum-matan-<?= $row["id_sntr"] ?>" class="edit-form-number-input" value="<?= ( $laporan[$no]["jum_matan"] == 0 ) ? "" : $laporan[$no]["jum_matan"] ?>" placeholder="0">
                <label for="jum-matan-<?= $row["id_sntr"] ?>" class="edit-form-number-name">Hal</label>
            </div>
            <?php $no++; endforeach; ?>

        </div>

        <div class="edit-form-fill">

            <div class="edit-form-title">
                <h3>Talaqqi</h3>
            </div>

            <?php $no = 0; foreach ( $santri as $row ) : ?>
            <div class="edit-form-text" style="width: 95%;">
                <input type="text" name="talaqqi_<?= $row["id_sntr"] ?>" id="talaqqi-<?= $row["id_sntr"] ?>" class="edit-form-text-input" value="<?= $laporan[$no]['talaqqi'] ?>" placeholder="0">
                <label for="talaqqi-<?= $row["id_sntr"] ?>" class="edit-form-text-name"><?= $row["nama_sntr"] ?></label>
            </div>
            <?php $no++; endforeach; ?>

        </div>

        <div class="edit-form-check">

            <div class="edit-form-title">
                <h3>Apakah laporan ini sudah selesai?</h3>
            </div>

            <?php $no = 0; foreach ( $santri as $row ) : ?>
            <label class="edit-form-check-name">
                <div class="edit-form-check-label"><?= $row["nama_sntr"] ?></div>
                <input type="checkbox" name="ttd_pmbn_<?= $row["id_sntr"] ?>" class="edit-form-check-input" <?= ( $laporan[$no]["ttd_pmbn"] == "0000-00-00 00:00:00" ? "" : "checked" ) ?>>
                <div class="edit-form-check-value"><?= ( $laporan[$no]["ttd_pmbn"] == "0000-00-00 00:00:00" ? "Belum" : "Sudah" ) ?></div>
            </label>
            <?php $no++; endforeach; ?>
        
        </div>

        <div class="edit-form-btn">
            <button type="submit" class="edit-form-btn-back">BACK</button>
            <button type="reset" class="edit-form-btn-reset" onclick="return confirm('Yakin reset?')">RESET</button>
            <button type="submit" name="one_weekly" class="edit-form-btn-submit" class="kirim">KIRIM</button>
        </div>

    </div>

</form>

</section>

</body>
</html>