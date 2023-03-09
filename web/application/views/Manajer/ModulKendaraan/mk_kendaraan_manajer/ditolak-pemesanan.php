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
                                        src="../assets/img/icons/search_putih.png"
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
                                        <img src="../assets/img/icons/notifikasi.png" class="img-fluid" />
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
                <div class="card border-0 w-100 px-2 py-3" id="link-detail">
                    <div class="title-persetujuan">
                        <h4 class="font-weight-bold">Konfirmasi Penolakan</h4>
                    </div>
                    <div class="pemesanan-disetujui px-5">
                        <div class="col-12">
                            <div class="disetujui-pemesanan">
                                <div class="text-head">
                                    <h3>karina kusumadewi</h3>
                                </div>
                                <div class="detail-pengajuan">
                                    <div class="detail-waktu-pemesanan">
                                        <div class="img-jam">
                                            <img src="../assets/img/icons/jam_coklat.png" alt="">
                                        </div>
                                        <div class="text-detail-pengajuan">
                                            <p>diajukan pada 18 September 2019</p>
                                        </div>
                                    </div>
                                    <div class="detail-lokasi-pemesanan">
                                        <div class="detail-waktu-pemesanan">
                                            <div class="img-jam">
                                                <img src="../assets/img/icons/lokasi_coklat.png" alt="">
                                            </div>
                                            <div class="text-detail-pengajuan">
                                                <p>Kantor BPKB</p>
                                            </div>
                                        </div>
                                        <div class="detail-waktu-pemesanan">
                                            <div class="img-jam">
                                                <img src="../assets/img/icons/penumpang.png" alt="">
                                            </div>
                                            <div class="text-detail-pengajuan">
                                                <p>4</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="detail-waktu">
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
                                <div class="content-pemesanan">
                                    <div>
                                        <h2>Status Dinas</h2>
                                        <p>Dalam kota operasional</p>
                                    </div>
                                    <div>
                                        <h2>Keperluan</h2>
                                        <p>Menjemput narasumber untuk diantar ke kantor PJBS dan pulang diantar kembali ke kantor BPKP</p>
                                    </div>
                                </div>
                            </div>
                            <div class="catatan">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="namaPolisi">Catatan</label>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <textarea name="" id="" cols="79" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="m-l-554" style="float: left;margin: 0px;">
                                    <a href="<?= base_url('ModulKendaraanManajer')?>">
                                        <button style="width: 200px;width: 400px;" class=" btn btn-primary ml-auto" type="submit">Tolak Pengajuan</button>
                                    </a>
                                    <a href="<?= base_url('ModulKendaraanManajer')?>">
                                        <button class="btn btn-primary ml-auto" style="background-color:white;color:black;width:230px;margin-left:10px;">Batal</button>
                                    </a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN -->

    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="<?= base_url('')?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('')?>assets/js/script.js"></script>
    <script type="text/javascript">
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