<?php
// Call edit page header
require "header.php";

$tes = pilih_tabel($lp);
$laporan = pilih_row($lp, $id_s);
?>

<section id="edit-page" class="page">

    <div class="edit-page-title">

        <h2>Edit Laporan</h2>
        <h3>Bulan <?= $bulan["nama_bulan"] ?></h3>
        <h3><?= $santri["nama_sntr"] ?></h3>

    </div>

<form id="edit-page-form" action="" method="post">

    <div class="edit-form container">

        <input type="hidden" name="id_sntr_<?= $santri["id_sntr"] ?>" value="<?= $laporan["id_sntr"] ?>">
    
        <div class="edit-form-fill">
        <div class="edit-form-range">
                <label class="edit-form-range-name">Tingkah Laku</label>
                <label class="edit-form-range-value"><?= $laporan["perilaku"] ?></label>
                <input type="range" name="perilaku_<?= $santri["id_sntr"] ?>" max="5" class="edit-form-range-input" value="<?= $laporan["perilaku"] ?>">
            </div>
        </div>

        <div class="edit-form-fill">
            <div class="edit-form-range">
                <label class="edit-form-range-name">Ucapan</label>
                <label class="edit-form-range-value"><?= $laporan["ucapan"] ?></label>
                <input type="range" name="ucapan_<?= $santri["id_sntr"] ?>" max="5" class="edit-form-range-input" value="<?= $laporan["ucapan"] ?>">
            </div>
        </div>

        <div class="edit-form-fill">
            <div class="edit-form-range">
                <label class="edit-form-range-name">Kedisiplinan</label>
                <label class="edit-form-range-value"><?= $laporan["disiplin"] ?></label>
                <input type="range" name="disiplin_<?= $santri["id_sntr"] ?>" max="5" class="edit-form-range-input" value="<?= $laporan["disiplin"] ?>">
            </div>
        </div>

        <div class="edit-form-fill">
            <div class="edit-form-range">
                <label class="edit-form-range-name">Kehadiran Kegiatan</label>
                <label class="edit-form-range-value"><?= $laporan["kegiatan"] ?></label>
                <input type="range" name="kegiatan_<?= $santri["id_sntr"] ?>" max="5" class="edit-form-range-input" value="<?= $laporan["kegiatan"] ?>">
            </div>
        </div>

        <div class="edit-form-fill">
            <div class="edit-form-range">
                <label class="edit-form-range-name">Kehadiran Sekolah</label>
                <label class="edit-form-range-value"><?= $laporan["sekolah"] ?></label>
                <input type="range" name="sekolah_<?= $santri["id_sntr"] ?>" max="5" class="edit-form-range-input" value="<?= $laporan["sekolah"] ?>">
            </div>
        </div>

        <div class="edit-form-fill">
            <div class="edit-form-range">
                <label class="edit-form-range-name">Cuci Baju</label>
                <label class="edit-form-range-value"><?= $laporan["cuci"] ?></label>
                <input type="range" name="cuci_<?= $santri["id_sntr"] ?>" max="3" class="edit-form-range-input" value="<?= $laporan["cuci"] ?>">
            </div>
        </div>

        <div class="edit-form-fill">
            <div class="edit-form-range">
                <label class="edit-form-range-name">Baju dan Penampilan</label>
                <label class="edit-form-range-value"><?= $laporan["penampilan"] ?></label>
                <input type="range" name="penampilan_<?= $santri["id_sntr"] ?>" max="3" class="edit-form-range-input" value="<?= $laporan["penampilan"] ?>">
            </div>
        </div>

        <div class="edit-form-fill">
            <div class="edit-form-range">
                <label class="edit-form-range-name">Kasur dan Lemari</label>
                <label class="edit-form-range-value"><?= $laporan["kasur"] ?></label>
                <input type="range" name="kasur_<?= $santri["id_sntr"] ?>" max="3" class="edit-form-range-input" value="<?= $laporan["kasur"] ?>">
            </div>
        </div>

        <div class="edit-form-fill">
            <div class="edit-form-text-area">
                <textarea type="text" name="catatan_<?= $santri["id_sntr"] ?>" id="catatan" class="edit-form-text-input" value="<?= $laporan["catatan"] ?>" placeholder="0"><?= $laporan["catatan"] ?></textarea>
                <label for="catatan" class="edit-form-text-name edit-form-textarea-name">Catatan Pembina</label>
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