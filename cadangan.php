
        <ul id="edit-container">
            <li>
                <h2>Pekan 1 (<?= $bulan["pekan_1"] ?>)</h2>
                <a href="edit/all-weekly-range.php?lap=<?= $bulan["pekan_1"] ?>"><i class="material-icons">create</i></a>
                <a href="edit/all-weekly-text.php?lap=<?= $bulan["pekan_1"] ?>"><i class="material-icons">create</i></a>
                <?php foreach ( $santri as $row ): ?>
                <ul>
                    <li>
                        <input type="radio" name="" class="edit-container-radio" <?= ( cek_terkirim($row["id_santri"], $bulan["pekan_1"]) > 0 ) ? "checked" : ""  ?> disabled>
                        <p><?= $row["nama_santri"] ?></p>
                        <a href="edit/one-weekly.php?id_santri=<?= $row["id_santri"] ?>&lap=<?= $bulan["pekan_1"] ?>"><i class="material-icons">create</i></a>
                    </li>
                </ul>
                <?php endforeach; ?>
            </li>
            <li>
                <h2>Pekan 2 (<?= $bulan["pekan_2"] ?>)</h2>
                <a href="edit/all-weekly-range.php?lap=<?= $bulan["pekan_2"] ?>"><i class="material-icons">create</i></a>
                <a href="edit/all-weekly-text.php?lap=<?= $bulan["pekan_2"] ?>"><i class="material-icons">create</i></a>
                <?php foreach ( $santri as $row ): ?>
                <ul>
                    <li>
                        <input type="radio" name="" class="edit-container-radio" <?= ( cek_terkirim($row["id_santri"], $bulan["pekan_2"]) > 0 ) ? "checked" : ""  ?> disabled>
                        <p><?= $row["nama_santri"] ?></p>
                        <a href="edit/one-weekly.php?id_santri=<?= $row["id_santri"] ?>&lap=<?= $bulan["pekan_2"] ?>"><i class="material-icons">create</i></a>
                    </li>
                </ul>
                <?php endforeach; ?>
            </li>
            <li>
                <h2>Pekan 3 (<?= $bulan["pekan_3"] ?>)</h2>
                <a href="edit/all-weekly-range.php?lap=<?= $bulan["pekan_3"] ?>"><i class="material-icons">create</i></a>
                <a href="edit/all-weekly-text.php?lap=<?= $bulan["pekan_3"] ?>"><i class="material-icons">create</i></a>
                <?php foreach ( $santri as $row ): ?>
                <ul>
                    <li>
                        <input type="radio" name="" class="edit-container-radio" <?= ( cek_terkirim($row["id_santri"], $bulan["pekan_3"]) > 0 ) ? "checked" : ""  ?> disabled>
                        <p><?= $row["nama_santri"] ?></p>
                        <a href="edit/one-weekly.php?id_santri=<?= $row["id_santri"] ?>&lap=<?= $bulan["pekan_3"] ?>"><i class="material-icons">create</i></a>
                    </li>
                </ul>
                <?php endforeach; ?>
            </li>
            <li>
                <h2>Pekan 4 (<?= $bulan["pekan_4"] ?>)</h2>
                <a href="edit/all-weekly-range.php?lap=<?= $bulan["pekan_4"] ?>"><i class="material-icons">create</i></a>
                <a href="edit/all-weekly-text.php?lap=<?= $bulan["pekan_4"] ?>"><i class="material-icons">create</i></a>
                <?php foreach ( $santri as $row ): ?>
                <ul>
                    <li>
                        <input type="radio" name="" class="edit-container-radio" <?= ( cek_terkirim($row["id_santri"], $bulan["pekan_4"]) > 0 ) ? "checked" : ""  ?> disabled>
                        <p><?= $row["nama_santri"] ?></p>
                        <a href="edit/one-weekly.php?id_santri=<?= $row["id_santri"] ?>&lap=<?= $bulan["pekan_4"] ?>"><i class="material-icons">create</i></a>
                    </li>
                </ul>
                <?php endforeach; ?>
            </li>
            <!-- Show pekan_5 if it exist in that month -->
            <?php if ( 1 < $bulan["pekan_5"] ) : ?>
            <li>
                <h2>Pekan 5 (<?= $bulan["pekan_5"] ?>)</h2>
                <a href="edit/all-weekly-range.php?lap=<?= $bulan["pekan_5"] ?>"><i class="material-icons">create</i></a>
                <a href="edit/all-weekly-text.php?lap=<?= $bulan["pekan_5"] ?>"><i class="material-icons">create</i></a>
                <?php foreach ( $santri as $row ): ?>
                <ul>
                    <li>
                        <input type="radio" name="" class="edit-container-radio" <?= ( cek_terkirim($row["id_santri"], $bulan["pekan_5"]) > 0 ) ? "checked" : ""  ?> disabled>
                        <p><?= $row["nama_santri"] ?></p>
                        <a href="edit/one-weekly.php?id_santri=<?= $row["id_santri"] ?>&lap=<?= $bulan["pekan_5"] ?>"><i class="material-icons">create</i></a>
                    </li>
                </ul>
                <?php endforeach; ?>
            </li>
            <?php endif; ?>
            <!-- Show Laporan Bulanan in the end of laporans -->
            <li>
                <h2>Bulan <?= $bulan["nama_bulan"] ?></h2>
                <?php foreach ( $santri as $row ): ?>
                <ul>
                    <li>
                        <input type="radio" name="" class="edit-container-radio" disabled>
                        <p><?= $row["nama_santri"] ?></p>
                        <a href="edit/one-weekly.php?id_santri=<?= $row["id_santri"] ?>&lap=lb_<?= $_bulan ?>"><i class="material-icons">create</i></a>
                    </li>
                </ul>
                <?php endforeach; ?>
            </li>
        </ul>