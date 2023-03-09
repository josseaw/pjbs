<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>PJBS Web App | Kendaraan</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />

    <!-- CSS -->
    <link rel="stylesheet" href="<?= base_url()?>/assets/css/style.min.css" />
    <style type="text/css">
        .bg-warning {
                background-color: #ffc107 !important
            }

            a.bg-warning:hover,
            a.bg-warning:focus,
            button.bg-warning:hover,
            button.bg-warning:focus {
                background-color: #d39e00 !important
            }
    </style>
</head>

<body>
    <main>
        <!-- SIDEBAR -->
         <aside class="sidebar">
            <a href="<?= base_url('DashboardManajer')?>">
            <img src="<?php echo base_url("assets/img/logo_pjbs.png")?>" alt="logo PJBS" class="brand__img" />
            </a>
            <nav class="navs">
                <ul class="navs__list list-unstyled">
                    <li class="navs__list-item">
                        <a href="<?php echo base_url("ModulKendaraanManajer") ?>" class="active" data-toggle="tooltip" data-placement="bottom" title="Modul Kendaraan"><img src="<?php echo base_url("assets/img/icons/kendaraan_biru.png") ?>" class="icn_menu" /></a>
                    </li>
                    <li class="navs__list-item">
                        <a href="<?php echo base_url("ModulRapatManajer") ?>"><img src="<?php echo base_url("assets/img/icons/pemesanan_ruangan_rapat.png") ?>" class="icn_menu" /></a>
                    </li>
                    <li class="navs__list-item">
                        <a href="<?php echo base_url("ModulATKManajer") ?>"><img src="<?php echo base_url("assets/img/icons/atk.png") ?>" class="icn_menu" /></a>
                    </li>
                    <li class="navs__list-item">
                        <a href="<?php echo base_url("ModulFasilitasManajer") ?>"><img src="<?php echo base_url("assets/img/icons/perbaikan_fasilitas.png") ?>" class="icn_menu" /></a>
                    </li>
                    <li class="navs__list-item">
                        <a href="<?php echo base_url("ModulArsipManajer") ?>"><img src="<?php echo base_url("assets/img/icons/arsip.png") ?>" class="icn_menu" /></a>
                    </li>
                    <li class="navs__list-item">
                        <a href="<?php echo base_url("ModulIventarisManajer") ?>"><img src="<?php echo base_url("assets/img/icons/inventaris.png") ?>" class="icn_menu" /></a>
                    </li>
                    <li class="navs__list-item">
                        <a href="<?php echo base_url("ModulSuveyManajer") ?>"><img src="<?php echo base_url("assets/img/icons/survey.png") ?>" class="icn_menu" /></a>
                    </li>
                    <li class="navs__list-item">
                        <a href="<?php echo base_url("ModulMeetingManajer") ?>"><img src="<?php echo base_url("assets/img/icons/e-meeting.png") ?>" class="icn_menu" /></a>
                    </li>
                </ul>
            </nav>
        </aside>
        <!-- END SIDEBAR -->

        <!-- TOPBAR -->
        <div class="topbar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 ">
                        <form class="d-inline-block ml-0 ml-xl-4 mr-3">
                            <div class="input-group input-group--custom">
                                <input type="text" class="form-control" placeholder="Cari..." />
                                <div class="input-group-append--custom mb-3">
                                    <button class="btn btn-primary" type="button">
                                      <img
                                        src="<?= base_url()?>assets/img/icons/search_putih.png"
                                        class="topbar__search-icn"
                                      />
                                    </button>
                                </div>
                            </div>
                        </form>

                        <div class="date mb-3">
                            <p class="mb-0 small">
                                <span style="font-size: 12px;margin:0px;" id="hours"></span> :
                                <span style="font-size: 12px" id="minutes"></span> : 
                                <span style="font-size: 12px" id="seconds"></span>  
                                <span style="font-size: 12px" id="ampm"></span> 
                            </p>
                        </div>
                        <div class="date mb-3">
                            <p class="mb-0 small">
                               <span style="font-size: 12px;margin: 0px;" id="date"></span>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 text-md-right ml-4 ml-md-0">
                        <div class="d-flex">
                            <div class="d-flex ml-auto">
                                <div class="btn-group ml-auto">
                                    <a type="button" class="topbar__icn" id="dropdownMenuReference" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="7,7">
                                        <img src="<?= base_url()?>assets/img/icons/notifikasi.png" class="img-fluid" />
                                    </a>
                                    <div class="dropdown-menu jos" aria-labelledby="dropdownMenuReference">
                                        <span class="dropdown-item-text text-center">Notifikasi <span>2</span></span>
                                        <div class="dropdown-line"></div>
                                        <div class="dropdown-list">
                                            <div class="scroll" id="isi-notifikasi">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-group ml-auto">
                                    <span type="button" class="dropdown-toggle account--toggle" id="dropdownMenuProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="7,7">
                                        <img src="https://placeimg.com/35/35/people" class="rounded-circle" />
                                    </span>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuProfile">
                                        <a class="dropdown-item" href="<?= base_url('LoginManajer')?>">Logout</a>
                                    </div>
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
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link text-center" href="<?= base_url('ModulKendaraanManajer/Persetujuan')?>">Persetujuan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="<?= base_url('ModulKendaraanManajer/Pesan')?>">Pesan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center active" href="<?= base_url('ModulKendaraanManajer/Riwayat')?>">Riwayat</a>
                    </li>
                </ul>
                <div class="card border-0 w-100" style="margin-bottom:100px;">
                    <div class="row">
                        <div class="col-8">
                            <div class="track-sopir">
                                <div class="img-full">
                                    <!-- Tempat Peta -->

                                    <a href="track-zoom.html">
                                        <img src="<?= base_url()?>assets/img/icons/full-screen.png" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 px-3 py-5">
                            <div class="sopir-track">
                                <div class="profil">
                                    <div class="img-profil">
                                        <img src="<?= base_url()?>assets/img/icons/testimonial-02.png" alt="">
                                    </div>
                                    <div class="text-profil">
                                        <h4>Delvin Smith</h4>
                                        <h4 style="color: rgba(1, 65, 136, 0.7)">SP0000</h4>
                                        <img style="position: absolute;width: 100%;position: relative;width: 15px;color: blue;" src="<?= base_url()?>assets/img/icons/telp-blue.png" alt="">&nbsp;&nbsp;<span style="color: #014188"><b>0831020201321</b></span>
                                        <br/>
                                        <span class="bg-warning" style="color: white;font-size: 14px;padding:2px 22px;border-radius: 5px;"><b>Berlangsung</b></span>
                                    </div>
                                </div>
                                <div class="tujuan">
                                    <div class="pengguna-tujuan">
                                        <h4>Pengguna</h4>
                                        <h4>Karina Kusumadewi</h4>
                                    </div>
                                    <div class="pengguna-tujuan">
                                        <h4>Tujuan</h4>
                                        <h4>Kantor BPKB</h4>
                                    </div>
                                </div>
                                <div class="waktu">
                                    <div class="span">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                    <div class="flex-column">
                                        <div class="waktu-BerangkatKembali">
                                            <span>
                                                <h4>08:00</h4>
                                                <p>WIB</p>
                                            </span>
                                            <span>
                                                <h5>20 September 2019</h5>
                                            </span>
                                        </div>
                                        <div class="waktu-BerangkatKembali">
                                            <span>
                                                <h4>08:00</h4>
                                                <p>WIB</p>
                                            </span>
                                            <span>
                                                <h5>20 September 2019</h5>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-column">
                                        <button type="button" class="bg-primary" style="color: white;font-size: 14px;padding:2px 22px;border-radius: 5px;border-color: white"><b> + Tambah Tujuan</b></button>
                                        <a href="<?= base_url('/ModulKendaraanManajer/RiwayatBeriRating')?>">
                                        <button type="button" class="bg-danger" style="color: white;font-size: 14px;padding:2px 22px;border-radius: 5px;border-color: white"><b> Beri Rating </b></button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN -->
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="<?= base_url()?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url()?>assets/js/script.js"></script>
    <script type="text/javascript">
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

                if (item.status_pemesanan == 'Disetujui'){
                    status = 'Pemesanan kendaraan disetujui oleh Admin';
                    img_status = '<div class="img-notifikasi bg-blue-rgba"><img src="'+baseurl+'assets/img/icons/notif_user_biru.png" alt="Disetujui Admin">';
                }else if (item.status_pemesanan == 'Ditolak'){
                    status = 'Pemesanan kendaraan ditolak oleh Admin';
                    img_status = '<div class="img-notifikasi bg-white"><img src="'+baseurl+'assets/img/icons/notif_user_biru.png" alt="Ditolak Admin">';
                }else if (item.status_pemesanan == 'Menunggu'){
                    status = 'Pemesanan kendaraan ditolak oleh Admin';
                    img_status = '<div class="img-notifikasi bg-white"><img src="'+baseurl+'assets/img/icons/notif_approval.png" alt="Menunggu Approval Admin">';
                }
                
                $('#isi-notifikasi').append('<a href="#"><div class="list-drop bg-blue-rgba">'+img_status+'</div><div class="content-notifikasi"><p>'+status+'</p><p>'+item.diajukan+' WIB</p></div></div></a>');

                $('#modal-click').append('<div class="from-modal collapse" id="multiCollapseExample' + i + '"><div class="row"><div class="tanda-close"> <span></span> <span></span> </div>  <div class="text-from"><h4>2 data terpilih</h4></div>  <div class="from lihat" data-toggle="modal" data-target="#modalLihatKendaraan"><span class="img-from"><img src="'+baseurl+'assets/img/icons/lihat.png" alt=""></span><h4>Lihat</h4></div>  <div class="from sunting" data-toggle="modal" data-target="#modalSuntingKendaraan"><span class="img-from"><img src="'+baseurl+'assets/img/icons/edit.png" alt=""></span><h4>Sunting</h4></div> <div class="from hapus" data-toggle="modal" data-target="#multiHapus"><span class="img-from"><img src="'+baseurl+'assets/img/icons/hapus.png" alt=""></span><h4>Hapus</h4></div></div></div>');

            });
        });

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