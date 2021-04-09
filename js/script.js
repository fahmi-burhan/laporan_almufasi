$(document).ready(function() {


    // KEEP SCROLL FUNCTION //
    if ( sessionStorage.scrollLeft != "undefined" ) {
        $("#wrapper").scrollLeft(sessionStorage.scrollLeft);
    }

    if ( sessionStorage.naviBtn != "undefined") {
        $(".navi-btn").removeClass("active");
        $(".navi-btn").each(function() {
            if ( $(this).val() == sessionStorage.naviBtn ) $(this).addClass("active");
        })
    }

    $("#wrapper").scroll(function() {
        sessionStorage.scrollLeft = $(this).scrollLeft();
        sessionStorage.naviBtn = $(".navi-btn").filter(".active").val();
    })

    

    ////////////////////////////////////////////////
    //            NAVI        FUNCTION            //
    ////////////////////////////////////////////////
    $(".navi-btn").click(function() {
        $(this).siblings().removeClass("active");
        $(this).addClass("active");
        var w = $(window).width();
        if ( $(this).val() == "home" ) {
            $("#wrapper").scrollLeft("0");
        } else if ( $(this).val() == "list" ) {
            $("#wrapper").scrollLeft(w);
        } else if ( $(this).val() == "edit" ) {
            $("#wrapper").scrollLeft(w * 2);
        }
    })



    ////////////////////////////////////////////////
    //            HOME        FUNCTION            //
    ////////////////////////////////////////////////

    $(".lap-stat-detail").hide();
    $(".home-lap-content").hide();


    $(".home-detail").on("click", function() {
        $(this).siblings(".lap-stat-detail").slideToggle(600);
        $(this).siblings(".home-lap-content").slideToggle(600);
        if ( $(this).children().html() === "Lihat Detail" ) {
            $(this).children().html( "Tutup Detail" );
        } else {
            $(this).children().html( "Lihat Detail" );
        }
    })



    ////////////////////////////////////////////////
    //            LIST        FUNCTION            //
    ////////////////////////////////////////////////

    // Default option-filter: hide
    $(".option-filter").hide();

    // Muncul dan tampilakn option-filter sesuai list-filter-btn yang diklik user
    $("#list-filter-btn-bulan").click(function() {
        // Untuk bulan
       $("#list-option-bulan").siblings().hide();
       $("#list-option-bulan").toggle();
    })
    $("#list-filter-btn-pekan").click(function() {
        // Untuk Pekan
        $("#list-option-pekan").siblings().hide();
        $("#list-option-pekan").toggle();
     })
     $("#list-filter-btn-pmbn").click(function() {
        //  Untuk Pembina
        $("#list-option-pmbn").siblings().hide();
        $("#list-option-pmbn").toggle();
     })
     $("#list-filter-btn-syqh").click(function() {
        //  Untuk Syaqqah
        $("#list-option-syqh").siblings().hide();
        $("#list-option-syqh").toggle();
     })

    //  Untuk mengubah li dalam #list-filter-btn-pekan sesuai bulan
    $(".option-filter-bulan").click(function() {
        $("#list-filter-btn-bulan").val( $(this).val() )
        $("#list-filter-btn-bulan").html( $(this).html() )
        $("#list-option-pekan").load( "ajax/list-filter.php?bulan=" + $(this).val() );
        $("#list-filter-btn-pekan").html("Pekan 1")
        $("#list-filter-btn-pekan").val( $(".option-filter-pekan").eq(0).val() )
    })

    $("#list-option-pekan").delegate("*", "click", function() {
        $("#list-filter-btn-pekan").val( $(this).val() )
        $("#list-filter-btn-pekan").html( $(this).html() )
    })

    $(".option-filter-pmbn").click(function() {
        $("#list-filter-btn-pmbn").val( $(this).val() )
        $("#list-filter-btn-pmbn").html( $(this).html() )
    })

    $(".option-filter-syqh").click(function() {
        $("#list-filter-btn-syqh").val( $(this).val() )
        $("#list-filter-btn-syqh").html( $(this).html() )
    })

    // Otomatis tutup option-filter ketika salah satu li diklik
    $(".option-filter").delegate("*", "click", function() {
        $(".option-filter").hide();
    })

    $("#list-filter-search-input").on("input", function() {
        var namaSntr = $("#list-filter-search-input").val();
        var listBulan = $("#list-filter-btn-bulan").val();
        var listPekan = $("#list-filter-btn-pekan").val();
        var listPmbn  = $("#list-filter-btn-pmbn").val();
        var listSyqh  = $("#list-filter-btn-syqh").val();
        $("#list-list").load( "ajax/list-list.php?sntr=" + namaSntr + "&bulan=" + listBulan + "&pekan=" + listPekan + "&pmbn=" + listPmbn + "&syqh=" + listSyqh );
    })

    $(".option-filter").delegate("*", "click", function() {
        var namaSntr = $("#list-filter-search-input").val();
        var listBulan = $("#list-filter-btn-bulan").val();
        var listPekan = $("#list-filter-btn-pekan").val();
        var listPmbn  = $("#list-filter-btn-pmbn").val();
        var listSyqh  = $("#list-filter-btn-syqh").val();
        $("#list-list").load( "ajax/list-list.php?sntr=" + namaSntr + "&bulan=" + listBulan + "&pekan=" + listPekan + "&pmbn=" + listPmbn + "&syqh=" + listSyqh );
    })



    ////////////////////////////////////////////////
    //            EDIT        FUNCTION            //
    ////////////////////////////////////////////////

    // Tampil dan sembunyikan div ketika tombol dipencet
    $("#edit-hero-btn").click(function() {
        $("#edit-hero-filter").toggle();
    })

    // Load edit section without refresh
    $(".edit-hero-filter-btn").click(function() {
        // Load isi halaman edit setelah diklik setelah diklik
        $("#edit-edit").load( "ajax/edit.php?bulan=" + $(this).val() );
        // Ganti tulisan tombol sesuai bulan yang ditampilkan
        $("#edit-hero-btn").load( "ajax/edit.php?bulan=" + $(this).val() + " #nama-bulan" )
        // Sembunyikan setelah diklik
        $("#edit-hero-filter").hide();
    })

    $(".edit-card-content").hide();

    $(this).ajaxComplete(function() {
        $(".edit-card-content").hide();
    })

    $(".edit-card-content.active").show()

    $("#edit-edit").delegate(".edit-card-title", "click", function(event) {
        $(event.target).parent().siblings().slideToggle(400);
    })



    ///////////////////////////////////////////////
    //         EDIT   SECTION   FUNCTION         //
    ///////////////////////////////////////////////

    $(".edit-form-range-input").on("input", function() {
        $(this).siblings(".edit-form-range-value").html( $(this).val() )
    })

    $(".edit-form-check-name").click(function() {
        if ( $(this).children(".edit-form-check-input").is(":checked") ) {
            $(this).children(".edit-form-check-value").html("Sudah");
        } else {
            $(this).children(".edit-form-check-value").html("Belum");
        }
    })


})