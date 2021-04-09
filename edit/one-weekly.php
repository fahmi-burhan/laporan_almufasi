<?php
// Call edit page header
require "header.php";

pilih_tabel($lp);
$laporan = pilih_row($lp, $id_s);

?>
<section id="edit-page" class="page">

    <div class="edit-page-title">

        <h2>Edit Laporan</h2>
        <h3>Pekan ke <?= cek_pekan_u($pekan) ?> dari Bulan <?= $bulan["nama_bulan"] ?></h3>
        <h3><?= $santri["nama_sntr"] ?></h3>

    </div>

<form id="edit-page-form" action="" method="post">

    <div class="edit-form container">

        <input type="hidden" name="id_sntr_<?= $santri["id_sntr"] ?>" value="<?= $laporan["id_sntr"] ?>" class="edit-form-hidden">

        <div class="edit-form-fill">
            <div class="edit-form-range">
                <label class="edit-form-range-name">Tahajjud</label>
                <label class="edit-form-range-value"><?= $laporan["tahajjud"] ?></label>
                <input type="range" name="tahajjud_<?= $santri["id_sntr"] ?>" max="7" class="edit-form-range-input" value="<?= $laporan["tahajjud"] ?>">
            </div>
        </div>

        <div  class="edit-form-fill">
            <div class="edit-form-range">
                <label class="edit-form-range-name">Jamaah</label>
                <label class="edit-form-range-value"><?= $laporan["jamaah"] ?></label>
                <input type="range" name="jamaah_<?= $santri["id_sntr"] ?>" max="35" class="edit-form-range-input" value="<?= $laporan["jamaah"] ?>">
            </div>
        </div>

        <div class="edit-form-fill">
            <div class="edit-form-range">
                <label class="edit-form-range-name">Duha</label>
                <label class="edit-form-range-value"><?= $laporan["duha"] ?></label>
                <input type="range" name="duha_<?= $santri["id_sntr"] ?>" max="7" class="edit-form-range-input" value="<?= $laporan["duha"] ?>">
            </div>
        </div>

        <div class="edit-form-fill">
            <div class="edit-form-range">
                <label class="edit-form-range-name">Rawatib (Rakaat)</label>
                <label class="edit-form-range-value"><?= $laporan["rawatib"] ?></label>
                <input type="range" name="rawatib_<?= $santri["id_sntr"] ?>" step="2" max="70" class="edit-form-range-input" value="<?= $laporan["rawatib"] ?>">
            </div>
        </div>

        <div class="edit-form-fill">
            <div class="edit-form-range">
                <label class="edit-form-range-name">Puasa</label>
                <label class="edit-form-range-value"><?= $laporan["puasa"] ?></label>
                <input type="range" name="puasa_<?= $santri["id_sntr"] ?>" max="7" class="edit-form-range-input" value="<?= $laporan["puasa"] ?>">
            </div>
        </div>

        <div class="edit-form-fill">
            <div class="edit-form-text">
                <input type="text" name="baca_buku_<?= $santri["id_sntr"] ?>" id="baca-buku" class="edit-form-text-input" value="<?= $laporan["baca_buku"] ?>" placeholder="0">
                <label for="baca-buku" class="edit-form-text-name">Nama Buku</label>
            </div>
            <div class="edit-form-number">
                <input type="number" name="jum_buku_<?= $santri["id_sntr"] ?>" id="jum-buku" class="edit-form-number-input" value="<?= ( $laporan["jum_buku"] == 0 ) ? "" : $laporan["jum_buku"] ?>" placeholder="0">
                <label for="jum-buku" class="edit-form-number-name">Hal</label>
            </div>
        </div>

        <div class="edit-form-fill">
            <div class="edit-form-text">
                <input type="text" name="haf_quran_<?= $santri["id_sntr"] ?>" id="haf-quran" class="edit-form-text-input" value="<?= $laporan["haf_quran"] ?>" placeholder="0">
                <label for="haf-quran" class="edit-form-text-name">Surat / Juz</label>
            </div>
            <div class="edit-form-number">
                <input type="number" name="jum_quran_<?= $santri["id_sntr"] ?>" id="jum-quran" class="edit-form-number-input" value="<?= ( $laporan["jum_quran"] == 0 ) ? "" : $laporan["jum_quran"] ?>" placeholder="0">
                <label for="jum-quran" class="edit-form-number-name">Hal</label>
            </div>
        </div>

        <div class="edit-form-fill">
            <div class="edit-form-text">
                <input type="text" name="haf_hadis_<?= $santri["id_sntr"] ?>" id="haf-hadis" class="edit-form-text-input" value="<?= $laporan["haf_hadis"] ?>" placeholder="0">
                <label for="haf-hadis" for="edit-form-input-haf-hadis" class="edit-form-text-name">Buku Hadis</label>
            </div>
            <div class="edit-form-number">
                <input type="number" name="jum_hadis_<?= $santri["id_sntr"] ?>" id="jum-hadis" class="edit-form-number-input" value="<?= ( $laporan["jum_hadis"] == 0 ) ? "" : $laporan["jum_hadis"] ?>" placeholder="0">
                <label for="jum-hadis" class="edit-form-number-name">Jml</label>
            </div>
        </div>

        <div class="edit-form-fill">
            <div class="edit-form-text">
                <input type="text" name="haf_matan_<?= $santri["id_sntr"] ?>" id="haf-matan" class="edit-form-text-input" value="<?= $laporan["haf_matan"] ?>" placeholder="0">
                <label for="haf-matan" class="edit-form-text-name">Nama Matan</label>
            </div>
            <div class="edit-form-number">
                <input type="number" name="jum_matan_<?= $santri["id_sntr"] ?>" id="jum-matan" class="edit-form-number-input" value="<?= ( $laporan["jum_matan"] == 0 ) ? "" : $laporan["jum_matan"] ?>" placeholder="0">
                <label for="jum-matan" class="edit-form-number-name">Hal</label>
            </div>
        </div>

        <div class="edit-form-fill">
            <div class="edit-form-text" style="width: 95%;">
                <input type="text" name="talaqqi_<?= $santri["id_sntr"] ?>" id="talaqqi" class="edit-form-text-input" value="<?= $laporan["talaqqi"] ?>" placeholder="0">
                <label for="talaqqi" class="edit-form-text-name">Nama Talaqqi</label>
            </div>
        </div>

        <div class="edit-form-check">

            <div class="edit-form-title">
                <h3>Apakah laporan ini sudah selesai?</h3>
            </div>

            <label class="edit-form-check-name">
                <input type="checkbox" name="ttd_pmbn_<?= $santri["id_sntr"] ?>" class="edit-form-check-input" <?= ( $laporan["ttd_pmbn"] == "0000-00-00 00:00:00" ? "" : "checked" ) ?>>
                <div class="edit-form-check-value"><?= ( $laporan["ttd_pmbn"] == "0000-00-00 00:00:00" ? "Belum" : "Sudah" ) ?></div>
            </label>

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