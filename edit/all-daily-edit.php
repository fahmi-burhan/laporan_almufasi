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
</section>

<section id="front">

    <div class="front-container" id="check-show">
        <h2>Pilih Santri</h2>
        <ul class="front-container-data">
        <?php foreach ( $santri as $row ) : ?>
            <li>
                <label for="check-show_<?= $row["nama_sntr"] ?>">
                    <input type="checkbox" class="front-container-data-check edit-show" id="check-show_<?= $row["nama_sntr"] ?>" checked>
                    <span class="front-container-data-name" ><?= $row["nama_sntr"] ?></span>
                </label>
            </li>
        <?php endforeach; ?>
        </ul>
    </div>

    <div class="front-container" id="check-tahajjud">
        <h2>Tahajjud</h2>
        <ul class="front-container-data">
        <?php foreach ( $santri as $row ) : ?>
            <li class="all_<?= $row["nama_sntr"] ?>">
                <label for="check-tahajjud_<?= $row["nama_sntr"] ?>">
                    <input type="checkbox" class="front-container-data-check edit-tahajjud" id="check-tahajjud_<?= $row["nama_sntr"] ?>" checked>
                    <span class="front-container-data-name" ><?= $row["nama_sntr"] ?></span>
                </label>
            </li>
        <?php endforeach; ?>
        </ul>
    </div>

    <div class="front-container" id="check-qsubuh">
        <h2>Q. Subuh</h2>
        <ul class="front-container-data">
        <?php foreach ( $santri as $row ) : ?>
            <li class="all_<?= $row["nama_sntr"] ?>">
                <label for="check-qsubuh_<?= $row["nama_sntr"] ?>">
                    <input type="checkbox" class="front-container-data-check edit-rawatib" id="check-qsubuh_<?= $row["nama_sntr"] ?>" checked>
                    <span class="front-container-data-name" ><?= $row["nama_sntr"] ?></span>
                </label>
            </li>
        <?php endforeach; ?>
        </ul>
    </div>

    <div class="front-container" id="check-subuh">
        <h2>Subuh</h2>
        <ul class="front-container-data">
        <?php foreach ( $santri as $row ) : ?>
            <li class="all_<?= $row["nama_sntr"] ?>">
                <label for="check-subuh_<?= $row["nama_sntr"] ?>">
                    <input type="checkbox" class="front-container-data-check edit-jamaah" id="check-subuh_<?= $row["nama_sntr"] ?>" checked>
                    <span class="front-container-data-name" ><?= $row["nama_sntr"] ?></span>
                </label>
            </li>
        <?php endforeach; ?>
        </ul>
    </div>

    <div class="front-container" id="check-duha">
        <h2>Duha</h2>
        <ul class="front-container-data">
        <?php foreach ( $santri as $row ) : ?>
            <li class="all_<?= $row["nama_sntr"] ?>">
                <label for="check-duha_<?= $row["nama_sntr"] ?>">
                    <input type="checkbox" class="front-container-data-check edit-duha" id="check-duha_<?= $row["nama_sntr"] ?>" checked>
                    <span class="front-container-data-name" ><?= $row["nama_sntr"] ?></span>
                </label>
            </li>
        <?php endforeach; ?>
        </ul>
    </div>

    <div class="front-container" id="check-qzuhur">
        <h2>Q. Zuhur</h2>
        <ul class="front-container-data">
        <?php foreach ( $santri as $row ) : ?>
            <li class="all_<?= $row["nama_sntr"] ?>">
                <label for="check-qzuhur_<?= $row["nama_sntr"] ?>">
                    <input type="checkbox" class="front-container-data-check edit-rawatib" id="check-qzuhur_<?= $row["nama_sntr"] ?>" checked>
                    <span class="front-container-data-name" ><?= $row["nama_sntr"] ?></span>
                </label>
            </li>
        <?php endforeach; ?>
        </ul>
    </div>

    <div class="front-container" id="check-zuhur">
        <h2>Zuhur</h2>
        <ul class="front-container-data">
        <?php foreach ( $santri as $row ) : ?>
            <li class="all_<?= $row["nama_sntr"] ?>">
                <label for="check-zuhur_<?= $row["nama_sntr"] ?>">
                    <input type="checkbox" class="front-container-data-check edit-jamaah" id="check-zuhur_<?= $row["nama_sntr"] ?>" checked>
                    <span class="front-container-data-name" ><?= $row["nama_sntr"] ?></span>
                </label>
            </li>
        <?php endforeach; ?>
        </ul>
    </div>

    <div class="front-container" id="check-bzuhur">
        <h2>B. Zuhur</h2>
        <ul class="front-container-data">
        <?php foreach ( $santri as $row ) : ?>
            <li class="all_<?= $row["nama_sntr"] ?>">
                <label for="check-bzuhur_<?= $row["nama_sntr"] ?>">
                    <input type="checkbox" class="front-container-data-check edit-rawatib" id="check-bzuhur_<?= $row["nama_sntr"] ?>" checked>
                    <span class="front-container-data-name" ><?= $row["nama_sntr"] ?></span>
                </label>
            </li>
        <?php endforeach; ?>
        </ul>
    </div>

    <div class="front-container" id="check-asar">
        <h2>Asar</h2>
        <ul class="front-container-data">
        <?php foreach ( $santri as $row ) : ?>
            <li class="all_<?= $row["nama_sntr"] ?>">
                <label for="check-asar_<?= $row["nama_sntr"] ?>">
                    <input type="checkbox" class="front-container-data-check edit-jamaah" id="check-asar_<?= $row["nama_sntr"] ?>" checked>
                    <span class="front-container-data-name" ><?= $row["nama_sntr"] ?></span>
                </label>
            </li>
        <?php endforeach; ?>
        </ul>
    </div>

    <div class="front-container" id="check-magrib">
        <h2>Magrib</h2>
        <ul class="front-container-data">
        <?php foreach ( $santri as $row ) : ?>
            <li class="all_<?= $row["nama_sntr"] ?>">
                <label for="check-magrib_<?= $row["nama_sntr"] ?>">
                    <input type="checkbox" class="front-container-data-check edit-jamaah" id="check-magrib_<?= $row["nama_sntr"] ?>" checked>
                    <span class="front-container-data-name" ><?= $row["nama_sntr"] ?></span>
                </label>
            </li>
        <?php endforeach; ?>
        </ul>
    </div>

    <div class="front-container" id="check-bmagrib">
        <h2>B. Magrib</h2>
        <ul class="front-container-data">
        <?php foreach ( $santri as $row ) : ?>
            <li class="all_<?= $row["nama_sntr"] ?>">
                <label for="check-bmagrib_<?= $row["nama_sntr"] ?>">
                    <input type="checkbox" class="front-container-data-check edit-rawatib" id="check-bmagrib_<?= $row["nama_sntr"] ?>" checked>
                    <span class="front-container-data-name" ><?= $row["nama_sntr"] ?></span>
                </label>
            </li>
        <?php endforeach; ?>
        </ul>
    </div>

    <div class="front-container" id="check-isyak">
        <h2>Isyak</h2>
        <ul class="front-container-data">
        <?php foreach ( $santri as $row ) : ?>
            <li class="all_<?= $row["nama_sntr"] ?>">
                <label for="check-isyak_<?= $row["nama_sntr"] ?>">
                    <input type="checkbox" class="front-container-data-check edit-jamaah" id="check-isyak_<?= $row["nama_sntr"] ?>" checked>
                    <span class="front-container-data-name" ><?= $row["nama_sntr"] ?></span>
                </label>
            </li>
        <?php endforeach; ?>
        </ul>
    </div>

    <div class="front-container" id="check-bisyak">
        <h2>B. Isyak</h2>
        <ul class="front-container-data">
        <?php foreach ( $santri as $row ) : ?>
            <li class="all_<?= $row["nama_sntr"] ?>">
                <label for="check-bisyak_<?= $row["nama_sntr"] ?>">
                    <input type="checkbox" class="front-container-data-check edit-rawatib" id="check-bisyak_<?= $row["nama_sntr"] ?>" checked>
                    <span class="front-container-data-name" ><?= $row["nama_sntr"] ?></span>
                </label>
            </li>
        <?php endforeach; ?>
        </ul>
    </div>

</section>

<section id="back">

    <form action="" method="post">
    <?php foreach ( $santri as $row ) : ?>
        <input type="hidden" name="post-id_santri_<?= $row["nama_sntr"] ?>" class="back-form" value="<?= $row["id_sntr"] ?>">
        <input type="text" name="post-nama_sntr_<?= $row["nama_sntr"] ?>" class="back-form" value="<?= $row["nama_sntr"] ?>">
        <input type="number" name="post-jamaah_<?= $row["nama_sntr"] ?>" class="back-form form_<?= $row["nama_sntr"] ?>" id="form-jamaah_<?= $row["nama_sntr"] ?>" value="5" >
        <input type="number" name="post-tahajjud_<?= $row["nama_sntr"] ?>" class="back-form form_<?= $row["nama_sntr"] ?>" id="form-tahajjud_<?= $row["nama_sntr"] ?>" value="1">
        <input type="number" name="post-duha_<?= $row["nama_sntr"] ?>" class="back-form form_<?= $row["nama_sntr"] ?>" id="form-duha_<?= $row["nama_sntr"] ?>" value="1">
        <input type="number" name="post-rawatib_<?= $row["nama_sntr"] ?>" class="back-form form_<?= $row["nama_sntr"] ?>" id="form-rawatib_<?= $row["nama_sntr"] ?>" value="5">
    <?php endforeach; ?>
        <button type="submit" name="lapor_4" id="back-button">Kirim</button>
    </form>

</section>

<script>
$(document).ready(function() {


    ////////////////////////////
    // Define normal variable //
    ////////////////////////////
    <?php foreach ( $santri as $row ) : ?>
        _jamaah_<?= $row["nama_sntr"] ?> = 5;
        _tahajjud_<?= $row["nama_sntr"] ?> = 1;
        _duha_<?= $row["nama_sntr"] ?> = 1;
        _rawatib_<?= $row["nama_sntr"] ?> = 5;
    <?php endforeach; ?>



    /////////////////////////////////////////////////////////////////
    //  Change value from form when checkbox checked or unchecked  //
    /////////////////////////////////////////////////////////////////

    // Jamaah Form
    <?php foreach ( $santri as $row ) : ?>
        $(".edit-jamaah").click(function() {
            // Check is Subuh was checked
            if ( $("#check-subuh_<?= $row["nama_sntr"] ?>").is(":checked") ) {
                var subuh = 1;
            } else {
                var subuh = 0;
            }
            // Check is Zuhur was checked
            if ( $("#check-zuhur_<?= $row["nama_sntr"] ?>").is(":checked") ) {
                var zuhur = 1;
            } else {
                var zuhur = 0;
            }
            // Check is Asar was checked
            if ( $("#check-asar_<?= $row["nama_sntr"] ?>").is(":checked") ) {
                var asar = 1;
            } else {
                var asar = 0;
            }
            // Check is Magrib was checked
            if ( $("#check-magrib_<?= $row["nama_sntr"] ?>").is(":checked") ) {
                var magrib = 1;
            } else {
                var magrib = 0;
            }
            // Check is Isyak was checked
            if ( $("#check-isyak_<?= $row["nama_sntr"] ?>").is(":checked") ) {
                var isyak = 1;
            } else {
                var isyak = 0;
            }
            // Get total data fromJamaah form
            var jamaah = subuh + zuhur + asar + magrib + isyak;
            _jamaah_<?= $row["nama_sntr"] ?> = jamaah;
            // Place data in form
            $("#form-jamaah_<?= $row["nama_sntr"] ?>").val( jamaah );
        })
    <?php endforeach; ?>

    // Tahajjud Form
    <?php foreach ( $santri as $row ) : ?>
        $("#check-tahajjud_<?= $row["nama_sntr"] ?>").click(function() {
            // Check is Tahajjud was checked
            if ( $(this).is(":checked") ) {
                var tahajjud = 1;
            } else {
                var tahajjud = 0;
            }
            _tahajjud_<?= $row["nama_sntr"] ?> = tahajjud;
            // Place data in form
            $("#form-tahajjud_<?= $row["nama_sntr"] ?>").val( tahajjud );
        })
    <?php endforeach; ?>

    // Duha Form
    <?php foreach ( $santri as $row ) : ?>
        $("#check-duha_<?= $row["nama_sntr"] ?>").click(function() {
            // Check Duha was checked
            if ( $(this).is(":checked") ) {
                var duha = 1;
            } else {
                var duha = 0;
            }
            _duha_<?= $row["nama_sntr"] ?> = duha;
            // Place data in form
            $("#form-duha_<?= $row["nama_sntr"] ?>").val( duha );
        })
    <?php endforeach; ?>

    // Rawatib Form
    <?php foreach ( $santri as $row ) : ?>
        $(".edit-rawatib").click(function() {
            // Check is QSubuh was checked
            if ( $("#check-qsubuh_<?= $row["nama_sntr"] ?>").is(":checked") ) {
                var qsubuh = 1;
            } else {
                var qsubuh = 0;
            }
            // Check is QZuhur was checked
            if ( $("#check-qzuhur_<?= $row["nama_sntr"] ?>").is(":checked") ) {
                var qzuhur = 1;
            } else {
                var qzuhur = 0;
            }
            // Check is BZuhur was checked
            if ( $("#check-bzuhur_<?= $row["nama_sntr"] ?>").is(":checked") ) {
                var bzuhur = 1;
            } else {
                var bzuhur = 0;
            }
            // Check is BMagrib was checked
            if ( $("#check-bmagrib_<?= $row["nama_sntr"] ?>").is(":checked") ) {
                var bmagrib = 1;
            } else {
                var bmagrib = 0;
            }
            // Check is BIsyak was checked
            if ( $("#check-bisyak_<?= $row["nama_sntr"] ?>").is(":checked") ) {
                var bisyak = 1;
            } else {
                var bisyak = 0;
            }
            // Get total data from Rawatib form
            var rawatib = qsubuh + qzuhur + bzuhur + bmagrib + bisyak;
            _rawatib_<?= $row["nama_sntr"] ?> = rawatib;
            // Place data in form
            $("#form-rawatib_<?= $row["nama_sntr"] ?>").val( rawatib );
        })
    <?php endforeach; ?>


    
    /////////////////////////////////
    // Show and Hide chosed santri //
    /////////////////////////////////
    <?php foreach ( $santri as $row ) : ?>
        $(".edit-show").click(function() {
            if ( $("#check-show_<?= $row["nama_sntr"] ?>").is(":checked") ) {
                $(".all_<?= $row["nama_sntr"] ?>").removeClass("gone");
            } else {
                $(".all_<?= $row["nama_sntr"] ?>").addClass("gone");
            }
        })
    <?php endforeach; ?>



    ////////////////////////////////////////////////
    // Make form data from hiddden santri to NULL //
    ////////////////////////////////////////////////
    $("#back-button").click( function() {
        <?php foreach ( $santri as $row ) : ?>
            if ( $("#check-show_<?= $row["nama_sntr"] ?>").is(":checked") ) {
                $("#form-jamaah_<?= $row["nama_sntr"] ?>").val( _jamaah_<?= $row["nama_sntr"] ?> );
                $("#form-tahajjud_<?= $row["nama_sntr"] ?>").val( _tahajjud_<?= $row["nama_sntr"] ?> );
                $("#form-duha_<?= $row["nama_sntr"] ?>").val( _duha_<?= $row["nama_sntr"] ?> );
                $("#form-rawatib_<?= $row["nama_sntr"] ?>").val( _rawatib_<?= $row["nama_sntr"] ?> );
            } else {
                $(".form_<?= $row["nama_sntr"] ?>").val(0);
            }
        <?php endforeach; ?>
    })

})
</script>
</body>
</html>