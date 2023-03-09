<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>PJBS Web App | Kendaraan</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />

    <!-- CSS -->
    <link rel="stylesheet" href="<?= base_url()?>assets/css/style.min.css" />
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
                <div class="card border-0 w-100" >
                    <div class="row">
                        <div class="col-8">
                            <div class="track-sopir1">
                                <div class="img-full">
                                    <!-- Tempat Peta -->

                                    <a href="">
                                        <img src="<?= base_url()?>assets/img/icons/full-screen.png" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 px-3 py-5">
                            <div class="sopir-track">
                                <div class="profil">
                                    <div class="img-profil1">
                                        <img src="<?= base_url()?>assets/img/icons/testimonial-02.png" alt="">
                                    </div>
                                    <div class="text-profil">
                                        <h4>Delvin Smith</h4>
                                        <h4>sp000</h4>
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
                                <div class="line-coklat"></div>
                                <form action="">
                                    <div class="penilaian-komentar">
                                        <div class="penilaian">
                                            <p>Penilaian</p>
                                            <div class="papanrating">
                                                <button onclick="beriRating(1)" class="btn btn-primary" style="width: 50px;height: auto;font-size: 10px;"><b> + 1 </b></button>
                                                <button onclick="beriRating(2)" class="btn btn-primary" style="width: 50px;height: auto;font-size: 10px;"><b> + 2 </b></button>
                                                <button onclick="beriRating(3)" class="btn btn-primary" style="width: 50px;height: auto;font-size: 10px;"><b> + 3 </b></button>
                                                <button onclick="beriRating(4)" class="btn btn-primary" style="width: 50px;height: auto;font-size: 10px;"><b> + 4 </b></button>
                                                <button onclick="beriRating(5)" class="btn btn-primary" style="width: 50px;height: auto;font-size: 10px;"><b> + 5 </b></button>
                                                <input type="hidden" id="hasilRating" value=''>
                                            </div>
                                            <div class="jos">
                                                
                                                <!-- <div class="img-bintang mx-1">
                                                    <img src="<?= base_url()?>assets/img/icons/bintang.png" alt="">
                                                </div>
                                                <div class="img-bintang mx-1">
                                                    <img src="<?= base_url()?>assets/img/icons/bintang.png" alt="">
                                                </div>
                                                <div class="img-bintang mx-1">
                                                    <img src="<?= base_url()?>assets/img/icons/bintang.png" alt="">
                                                </div>
                                                <div class="img-bintang mx-1">
                                                    <img src="<?= base_url()?>assets/img/icons/bintang.png" alt="">
                                                </div> -->
                                                <!-- <div class="hasil-rating"> -->
                                                <!-- <div class="img-bintang mx-1">
                                                    <img src="<?= base_url()?>assets/img/icons/bintang_kosong.png" alt="">
                                                </div>
                                                <div class="img-bintang mx-1">
                                                    <img src="<?= base_url()?>assets/img/icons/bintang_kosong.png" alt="">
                                                </div>
                                                <div class="img-bintang mx-1">
                                                    <img src="<?= base_url()?>assets/img/icons/bintang_kosong.png" alt="">
                                                </div>
                                                <div class="img-bintang mx-1">
                                                    <img src="<?= base_url()?>assets/img/icons/bintang_kosong.png" alt="">
                                                </div>
                                                <div class="img-bintang mx-1">
                                                    <img src="<?= base_url()?>assets/img/icons/bintang_kosong.png" alt="">
                                                </div>
                                                </div> -->
                                            </div>
                                        </div>
                                        <div class="penilaian my-2">
                                            <p>Komentar</p>
                                            <textarea name="" id="" cols="41" rows="2"></textarea>
                                        </div>
                                    </div>
                                    <div class="center-pengguna m-track">
                                        <button class="btn-jos btn btn-primary" type="submit">Kirim Penilaian</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN -->

        <!-- MODAL -->
        <!-- Modal Unduh Persetujuan-->
        <div class="modal fade" id="modalUnduhPersetujuan" tabindex="-1" aria-labelledby="modalAddLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content py-4 px-5 border-0">
                    <div class="modal-body">
                        <form action="">
                            <div class="form-row center">
                                <div class="row">
                                    <div class="form-group mx-1">
                                        <button type="button" class="btn btn-danger px-4 px-1" data-dismiss="modal">PDF</Button>
                                    </div>
                                    <div class="form-group mx-1">
                                        <button type="button" class="btn btn-success px-4 px-1" data-dismiss="modal">Excel</Button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Unduh Riwayat Pemesanan -->
        <div class="modal fade" id="modalUnduhRiwayatPemesanan" tabindex="-1" aria-labelledby="modalAddLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content py-4 px-5 border-0">
                    <div class="modal-body">
                        <form action="">
                            <div class="form-row center">
                                <div class="form-group mx-1">
                                    <Button type="button" class="btn btn-danger px-4 px-1" data-dismiss="modal">PDF</Button>
                                </div>
                                <div class="form-group mx-1">
                                    <Button type="button" class="btn btn-success px-4 px-1" data-dismiss="modal">Excel</Button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Lihat Persetujuan -->
        <div class="modal fade" id="modalLihatPersetujuan" tabindex="-1" aria-labelledby="modalAddLihatLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content py-4 px-5 border-0">
                    <h3 class="modal-title px-3" id="modalAddLabel">
                        Detail Pengajuan
                    </h3>
                    <div class="modal-body">
                        <form action="">
                            <div class="form-row my-2">
                                <div class="form-group col-md-12">
                                    <label for="namaPolisi" class="font-weight-bold">Kendaraan</label>
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed corporis nobis iusto atque sapiente fugiat molestiae aspernatur deserunt consequuntur explicabo, commodi rerum minus odio necessitatibus, repudiandae nihil
                                        aperiam. Vero, laudantium!</p>
                                </div>
                            </div>
                            <div class="form-row my-2">
                                <div class="form-group col-md-12">
                                    <label for="namaKendaraan" class="font-weight-bold">Nomer Polisi</label>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus quaerat tempora, laudantium ipsum nam dicta id architecto. Cumque iusto sit velit, eveniet, quo eaque, blanditiis veritatis dicta facilis possimus officia!</p>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="px-3">
                        <a href="disetujui_pilih_sopir.html" class="btn btn-submit">
                            Setujui
                        </a>
                        <button type="button" class="btn btn-cancel" data-dismiss="modal" data-toggle="modal" data-target="#modalSuntingPersetujuan">Tolak</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Sunting Persetujuan -->
        <div class="modal fade" id="modalSuntingPersetujuan" tabindex="-1" aria-labelledby="modalAddLihatLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content py-4 px-5 border-0">
                    <h3 class="modal-title px-3" id="modalAddLabel">
                        Tolak Pengajuan
                    </h3>
                    <div class="modal-body">
                        <form action="">
                            <div class="form-row my-2">
                                <div class="form-group col-md-12">
                                    <label for="namaPolisi">Catatan</label>
                                </div>
                                <div class="form-group col-md-12">
                                    <textarea name="" id="" cols="80" rows="5"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="px-3">
                        <a href="" class="btn btn-submit">
                            Tolak Pengajuan
                        </a>
                        <button type="button" class="btn btn-cancel" data-dismiss="modal">Batal</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- END MODAL -->
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="<?= base_url()?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url()?>assets/js/script.js"></script>
    <script type="text/javascript">
        function beriRating(th) {
            $('.papanrating').remove();
            var rating = $('.jos');
            if (th == '1') {
            rating.append('<div class="img-bintang mx-1"><img src="<?= base_url()?>assets/img/icons/bintang.png" alt=""></div><div class="img-bintang mx-1"><img src="<?= base_url()?>assets/img/icons/bintang_kosong.png" alt=""></div><div class="img-bintang mx-1"><img src="<?= base_url()?>assets/img/icons/bintang_kosong.png" alt=""></div><div class="img-bintang mx-1"><img src="<?= base_url()?>assets/img/icons/bintang_kosong.png" alt=""></div><div class="img-bintang mx-1"><img src="<?= base_url()?>assets/img/icons/bintang_kosong.png" alt=""></div>')
            $('#hasilRating').val(1);
            }else if(th == '2'){
            rating.append('<div class="img-bintang mx-1"><img src="<?= base_url()?>assets/img/icons/bintang.png" alt=""></div><div class="img-bintang mx-1"><img src="<?= base_url()?>assets/img/icons/bintang.png" alt=""></div></div><div class="img-bintang mx-1"><img src="<?= base_url()?>assets/img/icons/bintang_kosong.png" alt=""></div><div class="img-bintang mx-1"><img src="<?= base_url()?>assets/img/icons/bintang_kosong.png" alt=""></div><div class="img-bintang mx-1"><img src="<?= base_url()?>assets/img/icons/bintang_kosong.png" alt=""></div>')
            $('#hasilRating').val(2);
            }else if (th == '3'){
            rating.append('<div class="img-bintang mx-1"><img src="<?= base_url()?>assets/img/icons/bintang.png" alt=""></div><div class="img-bintang mx-1"><img src="<?= base_url()?>assets/img/icons/bintang.png" alt=""></div><div class="img-bintang mx-1"><img src="<?= base_url()?>assets/img/icons/bintang.png" alt=""></div><div class="img-bintang mx-1"><img src="<?= base_url()?>assets/img/icons/bintang_kosong.png" alt=""></div><div class="img-bintang mx-1"><img src="<?= base_url()?>assets/img/icons/bintang_kosong.png" alt=""></div>')
            $('#hasilRating').val(3);
            }else if (th == '4'){
            rating.append('<div class="img-bintang mx-1"><img src="<?= base_url()?>assets/img/icons/bintang.png" alt=""></div><div class="img-bintang mx-1"><img src="<?= base_url()?>assets/img/icons/bintang.png" alt=""></div><div class="img-bintang mx-1"><img src="<?= base_url()?>assets/img/icons/bintang.png" alt=""></div><div class="img-bintang mx-1"><img src="<?= base_url()?>assets/img/icons/bintang.png" alt=""></div><div class="img-bintang mx-1"><img src="<?= base_url()?>assets/img/icons/bintang_kosong.png" alt=""></div>')
            $('#hasilRating').val(4);
            }else if (th == '5'){
                rating.append('<div class="img-bintang mx-1"><img src="<?= base_url()?>assets/img/icons/bintang.png" alt=""></div><div class="img-bintang mx-1"><img src="<?= base_url()?>assets/img/icons/bintang.png" alt=""></div><div class="img-bintang mx-1"><img src="<?= base_url()?>assets/img/icons/bintang.png" alt=""></div><div class="img-bintang mx-1"><img src="<?= base_url()?>assets/img/icons/bintang.png" alt=""></div><div class="img-bintang mx-1"><img src="<?= base_url()?>assets/img/icons/bintang.png" alt=""></div>')
                $('#hasilRating').val(5);
            }
        }

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