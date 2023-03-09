<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>PJBS Web App | Dashboard User </title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />

    <!-- CSS -->
    <link rel="stylesheet" href="<?= base_url('')?>assets/css/style.min.css" />
</head>

<body>
    <main>
        <!-- SIDEBAR -->
        <aside class="sidebar">
            <a href="<?= base_url('DashboardUser')?>">
            <img src="<?= base_url('')?>assets/img/logo_pjbs.png" alt="logo PJBS" class="brand__img" />
            </a>
            <nav class="navs">
                <ul class="navs__list list-unstyled">
                    <li class="navs__list-item">
                        <a href="<?php echo base_url("ModulKendaraanUser") ?>" data-toggle="tooltip" data-placement="bottom" title="Modul Kendaraan"><img src="<?php echo base_url("assets/img/icons/kendaraan_biru.png") ?>" class="icn_menu" /></a>
                    </li>
                    <li class="navs__list-item">
                        <a href="<?php echo base_url("ModulRapatUser") ?>"><img src="<?php echo base_url("assets/img/icons/pemesanan_ruangan_rapat.png") ?>" class="icn_menu" /></a>
                    </li>
                    <li class="navs__list-item">
                        <a href="<?php echo base_url("ModulATKUser") ?>"><img src="<?php echo base_url("assets/img/icons/atk.png") ?>" class="icn_menu" /></a>
                    </li>
                    <li class="navs__list-item">
                        <a href="<?php echo base_url("ModulFasilitasUser") ?>"><img src="<?php echo base_url("assets/img/icons/perbaikan_fasilitas.png") ?>" class="icn_menu" /></a>
                    </li>
                    <li class="navs__list-item">
                        <a href="<?php echo base_url("ModulArsipUser") ?>"><img src="<?php echo base_url("assets/img/icons/arsip.png") ?>" class="icn_menu" /></a>
                    </li>
                    <li class="navs__list-item">
                        <a href="<?php echo base_url("ModulIventarisUser") ?>"><img src="<?php echo base_url("assets/img/icons/inventaris.png") ?>" class="icn_menu" /></a>
                    </li>
                    <li class="navs__list-item">
                        <a href="<?php echo base_url("ModulSuveyUser") ?>"><img src="<?php echo base_url("assets/img/icons/survey.png") ?>" class="icn_menu" /></a>
                    </li>
                </ul>
            </nav>
        </aside>
    <!-- END SIDEBAR -->

    <!-- TOPBAR -->
        <div class="topbar">
            <div class="container-fluid">
                <div class="row">
                    <form class="d-inline-block ml-0 ml-xl-4 mr-3">
                        <div class="input-group input-group--custom">
                                <input type="text" class="form-control" placeholder="Cari..." />
                            <div class="input-group-append--custom mb-3">
                                <button class="btn btn-primary" type="button">
                                    <img src=<?php echo base_url("assets/img/icons/search_putih.png") ?> class="topbar__search-icn" />
                                </button>
                            </div>
                        </div>
                    </form>

                    <div class="d-inline-block date mb-3">
                        <p class="mb-0 small">
                            <span style="font-size: 12px;margin:0px;" id="hours"></span> :
                            <span style="font-size: 12px" id="minutes"></span>
                            <span style="font-size: 12px" id="wib"> WIB </span> 
                        </p>
                    </div>
                    <div class="d-inline-block date mb-3" style="margin-left: 0.5em">
                        <p class="mb-0 small">
                            <span style="font-size: 12px;margin: 0px;" id="date"></span>
                        </p>
                    </div>

                        <div class="d-flex" style="margin-left:auto;margin-right:1em;">
                            <div class="d-flex ml-auto">
                                <div class="btn-group ml-auto">
                                    <a type="button" class="topbar__icn" id="dropdownMenuReference" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="7,7">
                                        <img src="<?= base_url('')?>assets/img/icons/bantuan.png" style="width: 40px;" class="img-fluid" />
                                    </a>
                                </div>
                                <div class="btn-group ml-auto">
                                    <a type="button" class="topbar__icn" id="dropdownMenuReference" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="7,7">
                                        <img src="<?php echo base_url("assets/img/icons/notifikasi.png") ?>" class="img-fluid"/>
                                    </a>
                                    <div class="dropdown-menu jos" aria-labelledby="dropdownMenuReference">
                                        <span class="dropdown-item-text text-center">Notifikasi <span>2</span></span>
                                        <div class="dropdown-line"></div>
                                        <div class="dropdown-list">
                                            <div class="scroll" id="isi-notifikasi">
                                                <!-- otomatis di jQuery -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-group">
                                    <span type="button" class="dropdown-toggle account--toggle" id="dropdownMenuProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="7,7">
                                        <img src="<?php echo base_url("assets/img/icons/profile.png") ?>" class="rounded-circle-profile" />
                                    </span>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuProfile">
                                        <a class="dropdown-item" href="<?= base_url('LoginUser')?>">Logout</a>                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
 <!-- END TOPBAR -->

  <!-- MAIN -->
        <div class="content">
            <div class="col-12">
                <div class="board">
                    <div class="d-flex flex-row">
                        <div class="pemesanan-kendaraan m-w-782 bg-white">
                            <p class="text-dark-grey2">Pemesanan Kendaraan</p>
                            <div class="graphic" id="pemesanan">

                            </div>
                            <a href="<?= base_url('ModulKendaraanUser/Riwayat')?>">Lihat data pemesanan ></a>
                        </div>
                        <div class="pemesanan-kendaraan m-w-315 m-20 bg-gradient-blue">
                            <p class="text-white">Pelayanan Sopir</p>
                            <div id="pelayanan">
                            </div>
                            <a href="<?= base_url('ModulKendaraanUser/Riwayat')?>" class="text-white">Lihat data sopir ></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN -->
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/apexcharts.js"></script>
    <script src="assets/js/script.js"></script>
    <script type="text/javascript">
        // -----------------------------NOTIFIKASI ---------------------------------------//
        var baseurl = "<?= base_url() ?>";
        
        var settings = {
            'cache': false,
            'dataType': "jsonp",
            "async": true,
            "crossDomain": true,
            "url": "https://pjbs.ridiansyah.dev/v1/kendaraan/notifikasi/pemesanan",
            "method": "GET",
            "headers": {
                "accept": "application/json",
                "Access-Control-Allow-Origin": "*"
            }
        }


        $.ajax(settings).done(function(result) {
            var data = result.notifikasi;
            $.each(data, function(i, item) {

                var status = '';
                var img_status = '';

                $('#isi-notifikasi').append('<a href="#"> <div class="list-drop bg-blue-rgba"> <div class="img-notifikasi bg-white"> <img src="'+baseurl+'assets/img/icons/jadawal-list.png" alt=""> </div> <div class="content-notifikasi" style="font-size:12px;"> <p>Pemesanan kendaraan ID '+item.pemesanan_id+' '+item.status_pemesanan+'</p> <p>diajukan pada '+item.diajukan+' WIB. Detail jumlah penumpang '+item.jumlah_penumpang+' rencana keberangkatan pada '+item.berangkat+' kembali pada '+item.kembali+'</p> </div> </div> </a>');

            });
        });

        // ------------------------function clock realtime------------------------------//
        var $dOut = $('#date'),
            $hOut = $('#hours'),
            $mOut = $('#minutes'),
            $sOut = $('#seconds'),
            $ampmOut = $('#ampm');
        var months = [
          'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        var days = [
          'Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'
        ];

        function update(){
          var date = new Date();
          
          var hours = date.getHours() 
          
          var minutes = date.getMinutes() < 10 
                        ? '0' + date.getMinutes() 
                        : date.getMinutes();
          
          var seconds = date.getSeconds() < 10 
                        ? '0' + date.getSeconds() 
                        : date.getSeconds();
          
          var dayOfWeek = days[date.getDay()];
          var month = months[date.getMonth()];
          var day = date.getDate();
          var year = date.getFullYear();
          
          var dateString = dayOfWeek + ', ' + day + ' ' + month + ' ' + year;
          
          $dOut.text(dateString);
          $hOut.text(hours);
          $mOut.text(minutes);
          $sOut.text(seconds);
        } 

        update();
        window.setInterval(update, 1000);

</script>
</body>

</html>