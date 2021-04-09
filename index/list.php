<!--//////////////////////////////////-->
<!--           LIST SECTION           -->
<!--//////////////////////////////////-->
<section class="page" id="list">

    <div id="list-filter">

        <div id="list-filter-search">
            <input type="text" name="" id="list-filter-search-input" placeholder="Cari Santri" autocomplete="off">
            <i class="material-icons">search</i>
        </div>

        <div id="list-filter-btn">
            <button id="list-filter-btn-bulan" class="list-filter-btn-btn" value="<?= $bulan[$_bulan -1]["id_bulan"] ?>"><?= $bulan[$_bulan -1]["nama_bulan"] ?></button>
            <button id="list-filter-btn-pekan" class="list-filter-btn-btn" value="<?= cek_pekan_u($tgl) ?>">Pekan <?= cek_pekan_u($tgl) ?></button>
            <button id="list-filter-btn-pmbn" class="list-filter-btn-btn" value="00">Pembina</button>
            <button id="list-filter-btn-syqh" class="list-filter-btn-btn" value="00">Syaqqah</button>
        </div>

    </div>

    <div id="list-option">

        <ul id="list-option-bulan" class="option-filter">
            <?php foreach ( $bulan as $row ) : ?>
                <li class="option-filter-bulan" value="<?= ( strlen($row["id_bulan"]) == 1 ) ? "0".$row["id_bulan"] : $row["id_bulan"] ?>"><?= $row["nama_bulan"] ?></li>
            <?php endforeach; ?>
        </ul>

        <ul id="list-option-pekan" class="option-filter">
            <?php foreach ( $bulan[$_bulan -1] as $col => $row ) : 
                if ( $col == "id_bulan" or $col == "nama_bulan" or $row == "" ) continue;?>
                <li class="option-filter-pekan" value="<?= substr($col, 6) ?>">Pekan <?= substr($col, 6) ?></li>
            <?php endforeach; ?>
                <li class="option-filter-pekan" value="00">Bulanan</li>
        </ul>

        <ul id="list-option-pmbn" class="option-filter">
                <li class="option-filter-pmbn" value="00">Semua</li>
            <?php foreach ( $pembina as $row ) : ?>
                <li class="option-filter-pmbn" value="<?= $row["id_pmbn"] ?>"><?= $row["sebut"].". ". $row["nama_pmbn"] ?></li>
            <?php endforeach; ?>
        </ul>

        <ul id="list-option-syqh" class="option-filter">
                <li class="option-filter-syqh" value="00">Semua</li>
            <?php foreach ( $syaqqah as $row ) : ?>
                <li class="option-filter-syqh" value="<?= $row["id_syqh"] ?>"><?= $row["nama_syqh"] ?></li>
            <?php endforeach; ?>
        </ul>

    </div>

    <div id="list-list" class="container">

        <?php foreach ( $list as $row ): ?>
        <div class="list-content">
            <div class="list-content-wktu">
                <p>Bulan <?= $bulan[(int)substr($row["nama_lprn"],3,2) - 1]["nama_bulan"] ?> pekan ke-<?= cek_pekan_u(substr($row["nama_lprn"],3)) ?></p>
                <p>Dikirim <?= last_edited($row["wktu_lprn"]) ?></p>
            </div>
            <div class="list-content-nama">
                <h2><?= $santri[$row["id_sntr"] - 1]["nama_sntr"] ?></h2>
                <a href="list/view.php?id_sntr=<?= $row["id_sntr"] ?>&lp=<?= $row["nama_lprn"] ?>" class="test"><i class="material-icons">visibility</i></a>
                <a href=""><i class="material-icons">delete</i></a>
                <a href=""><i class="material-icons">print</i></a>
            </div>
            <div class="list-content-syqh">
                <p>Syaqqah: <?= $syaqqah[$santri[$row["id_sntr"] - 1]["nama_syqh"] - 1]["nama_syqh"] ?></p>
                <p>Pembina: <?= $pembina[$santri[$row["id_sntr"] - 1]["nama_pmbn"] - 1]["sebut"] .". ".  $pembina[$santri[$row["id_sntr"] - 1]["nama_pmbn"] - 1]["nama_pmbn"] ?></p>
            </div>
        </div>
        <?php endforeach; ?>
        
        <?php if ( $list == null ) :?>
            <div id="list-list-empty">
                <i class="material-icons">sentiment_very_dissatisfied</i>
                <h2>Mohon Maaf,</h2>
                <h3>Belum ada laporan</h3>
            </div>
        <?php endif; ?>

    </div>

</section>