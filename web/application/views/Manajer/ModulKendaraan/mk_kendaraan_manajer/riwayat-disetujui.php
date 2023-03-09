<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>PJBS Web App | Kendaraan</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />

    <!-- CSS -->
    <link rel="stylesheet" href=<?php echo base_url("assets/css/style.min.css") ?> />
</head>

<body>
    <main>
        <!-- SIDEBAR -->

        <aside class="sidebar">
            <a href="<?= base_url('DashboardManajer')?>">
            <img src="<?= base_url()?>assets/img/logo_pjbs.png" alt="logo PJBS" class="brand__img" />
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
                                        src=<?php echo base_url("assets/img/icons/search_putih.png")?>
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
                                        <img src=<?php echo base_url("assets/img/icons/notifikasi.png")?> class="img-fluid" />
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
                                        <a class="dropdown-item" href="<?= base_url('')?>">Logout</a>
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
                        <a class="nav-link text-center" href="<?= base_url('ModulKendaraanManajer')?>">Persetujuan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="<?= base_url('ModulKendaraanManajer/Pesan')?>">Pesan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center active" href="<?= base_url('ModulKendaraanManajer/Riwayat')?>">Riwayat</a>
                    </li>
                </ul>
                <div class="card border-0 w-100 px-3 py-3" id="link-detail">
                    <div class="pemesanan-disetujui">
                        <div class="row">
                            <div class="col-3">
                                <div class="pemesanan-profil profile">
                                    <!-- otomatis di jQuery -->
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="disetujui-pemesanan detail">
                                    <!-- otomatis di jQuery -->
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="pemesanan-profil">
                                    <div class="img-jam">
                                        <a href="<?= base_url('ModulKendaraanManajer/Riwayat')?>">
                                            <img style="width: 35px;float: right;" src="<?= base_url('')?>assets/img/icons/back-arrow.png" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" id="id" value="<?= $id?>">
        <!-- END MAIN -->

    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="<?= base_url('')?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('')?>assets/js/script.js"></script>
    <script type="text/javascript">
        var baseurl = "<?= base_url() ?>"

        // -------------------------------------------------ISI NOTIFIKASI ------------------------------------//
var settings = {
            'cache': false,
            'dataType': "jsonp",
            "async": true,
            "crossDomain": true,
            "url": "https://pjbs.ridiansyah.dev/v1/kendaraan/notifikasi/Persetujuan?role=manajer",
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

                $('#isi-notifikasi').append('<a href="#"> <div class="list-drop bg-blue-rgba"> <div class="img-notifikasi bg-white"> <img src="'+baseurl+'assets/img/icons/jadawal-list.png" alt=""> </div> <div class="content-notifikasi" style="font-size:12px;"> <p>Pemesanan kendaraan ID '+item.pemesanan_id+' menunggu persetujuan anda</p> <p>diajukan pada '+item.diajukan+' WIB. Detail jumlah penumpang '+item.jumlah_penumpang+' rencana keberangkatan pada '+item.berangkat+' kembali pada '+item.kembali+'</p> </div> </div> </a>');

            });
        });
        
        var id = $('#id').val();

        var settings = {
            'cache': false,
            'dataType': "jsonp",
            "async": true,
            "crossDomain": true,
            "url": "https://pjbs.ridiansyah.dev/v1/kendaraan/pemesanan?id="+id,
            "method": "GET",
            "headers": {
                "accept": "application/json",
                "Access-Control-Allow-Origin": "*"
            }
        }


        $.ajax(settings).done(function(result) {
            console.log(result)
            var data = result.pemesanan;
            console.log(data.id)
            $('.profile').append('<div class="img-pemesanan-profil"><img src="'+baseurl+'assets/img/icons/testimonial-02.png" alt=""></div><div class="text-pemesanan-profil font-weight-bold"><h4><b>Delvin Smith</b></h4><br/><h4>SP'+data.sopir_id+'</h4></div><div class="line-coklat"></div><div class="text-pemesanan font-weight-bold"><h4><b>Toyota New Innova</b></h4><br/><h4>H1M2</h4></div>');
            $('.detail').append('<div class="text-head"> <div> <h3>karina kusumadewi</h3> </div> <div><span style="margin-left:250px;" class="bg-success">'+data.status_pemesanan+'</span> </div> </div> <div class="detail-pengajuan"> <div class="detail-lokasi-pemesanan" style="margin-left: 35px;"> <div class="detail-waktu-pemesanan"> <div class="img-jam"> <img src="'+baseurl+'assets/img/icons/jam_coklat.png" alt=""> </div> <div class="text-detail-pengajuan"> <p>diajukan pada '+data.created_at+'</p> </div> </div> <div class="detail-waktu-pemesanan"> <div class="img-jam"> <img src="'+baseurl+'assets/img/icons/telp.png" alt=""> </div> <div class="text-detail-pengajuan"> <p>'+data.nohp+'</p> </div> </div> </div> <div class="detail-lokasi-pemesanan" style="margin-left: 35px;"> <div class="detail-waktu-pemesanan"> <div class="img-jam"> <img src="'+baseurl+'assets/img/icons/lokasi_coklat.png" alt=""> </div> <div class="text-detail-pengajuan"> <p>'+data.tujuan[0].lokasi+' ke '+data.tujuan[0].lokasi+'</p> </div> </div> <div class="detail-waktu-pemesanan"> <div class="img-jam"> <img src="'+baseurl+'assets/img/icons/penumpang.png" alt=""> </div> <div class="text-detail-pengajuan"> <p>4</p> </div> </div> </div> </div> <div class="detail-waktu"> <div class="span"> <span></span> <span></span> <span></span> </div> <div class="flex-column"> <div class="waktu-BerangkatKembali"> <span> <h4>08:00</h4> <p>WIB</p> </span> <span> <h5>'+data.berangkat+'</h5> </span> </div> <div class="waktu-BerangkatKembali"> <span> <h4>08:00</h4> <p>WIB</p> </span> <span> <h5>'+data.kembali+'</h5> </span> </div> </div> </div><div class="content-pemesanan"><div><h2>Status Dinas</h2><p>'+data.status_dinas+'</p></div><div><h2>Keperluan</h2><p>'+data.keperluan+'</p></div><div><h2>Catatan Manajer</h2><p>'+data.catatan_manajer+'</p></div><div><h2>Catatan Admin</h2><p>'+data.catatan_admin+'</p></div></div>')
           
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