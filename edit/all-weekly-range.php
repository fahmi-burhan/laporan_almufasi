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


        <div class="edit-form-fill">
            
            <div class="edit-form-title">
                <h3>Tahajjud</h3>
            </div>

            <?php $no = 0; foreach ( $santri as $row ) : ?>
            <div class="edit-form-range">
                <label class="edit-form-range-name"><?= $row["nama_sntr"] ?></label>
                <label class="edit-form-range-value"><?= $laporan[$no]['tahajjud'] ?></label>
                <input type="range" name="tahajjud_<?= $row["id_sntr"] ?>" max="7" class="edit-form-range-input" value="<?= $laporan[$no]['tahajjud'] ?>">
            </div>
            <?php $no++; endforeach; ?>

        </div>

        <div class="edit-form-fill">
            
            <div class="edit-form-title">
                <h3>Jammaah</h3>
            </div>

            <?php $no = 0; foreach ( $santri as $row ) : ?>
            <div class="edit-form-range">
                <label class="edit-form-range-name"><?= $row["nama_sntr"] ?></label>
                <label class="edit-form-range-value"><?= $laporan[$no]['jamaah'] ?></label>
                <input type="range" name="jamaah_<?= $row["id_sntr"] ?>" max="35" class="edit-form-range-input" value="<?= $laporan[$no]['jamaah'] ?>">
            </div>
            <?php $no++; endforeach; ?>

        </div>

        <div class="edit-form-fill">
            
            <div class="edit-form-title">
                <h3>Duha</h3>
            </div>

            <?php $no = 0; foreach ( $santri as $row ) : ?>
            <div class="edit-form-range">
                <label class="edit-form-range-name"><?= $row["nama_sntr"] ?></label>
                <label class="edit-form-range-value"><?= $laporan[$no]['duha'] ?></label>
                <input type="range" name="duha_<?= $row["id_sntr"] ?>" max="7" class="edit-form-range-input" value="<?= $laporan[$no]['duha'] ?>">
            </div>
            <?php $no++; endforeach; ?>

        </div>

        <div class="edit-form-fill">
            
            <div class="edit-form-title">
                <h3>Rawatib (Rakaat)</h3>
            </div>

            <?php $no = 0; foreach ( $santri as $row ) : ?>
            <div class="edit-form-range">
                <label class="edit-form-range-name"><?= $row["nama_sntr"] ?></label>
                <label class="edit-form-range-value"><?= $laporan[$no]['rawatib'] ?></label>
                <input type="range" name="rawatib_<?= $row["id_sntr"] ?>" step="2" max="70" class="edit-form-range-input" value="<?= $laporan[$no]['rawatib'] ?>">
            </div>
            <?php $no++; endforeach; ?>

        </div>

        <div class="edit-form-fill">
            
            <div class="edit-form-title">
                <h3>Puasa</h3>
            </div>

            <?php $no = 0; foreach ( $santri as $row ) : ?>
            <div class="edit-form-range">
                <label class="edit-form-range-name"><?= $row["nama_sntr"] ?></label>
                <label class="edit-form-range-value"><?= $laporan[$no]['puasa'] ?></label>
                <input type="range" name="puasa_<?= $row["id_sntr"] ?>" max="7" class="edit-form-range-input" value="<?= $laporan[$no]['puasa'] ?>">
            </div>
            <?php $no++; endforeach; ?>

        </div>

        <div>
            <?php $no = 0; foreach ( $santri as $row ) : ?>
            <input type="hidden" name="baca_buku_<?= $row["id_sntr"] ?>" value="<?= $laporan[$no]["baca_buku"] ?>">
            <input type="hidden" name="jum_buku_<?= $row["id_sntr"] ?>" value="<?= $laporan[$no]["jum_buku"] ?>">
            <input type="hidden" name="haf_quran_<?= $row["id_sntr"] ?>" value="<?= $laporan[$no]["haf_quran"] ?>">
            <input type="hidden" name="jum_quran_<?= $row["id_sntr"] ?>" value="<?= $laporan[$no]["jum_quran"] ?>">
            <input type="hidden" name="haf_hadis_<?= $row["id_sntr"] ?>" value="<?= $laporan[$no]["haf_hadis"] ?>">
            <input type="hidden" name="jum_hadis_<?= $row["id_sntr"] ?>" value="<?= $laporan[$no]["jum_hadis"] ?>">
            <input type="hidden" name="haf_matan_<?= $row["id_sntr"] ?>" value="<?= $laporan[$no]["haf_matan"] ?>">
            <input type="hidden" name="jum_matan_<?= $row["id_sntr"] ?>" value="<?= $laporan[$no]["jum_matan"] ?>">
            <input type="hidden" name="talaqqi_<?= $row["id_sntr"] ?>" value="<?= $laporan[$no]["talaqqi"] ?>">
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