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
                        <a class="nav-link text-center" href="<?= base_url('ModulKendaraanManajer')?>">Persetujuan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="<?= base_url('ModulKendaraanManajer/Pesan')?>">Pesan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center active" href="<?= base_url('ModulKendaraanManajer/Riwayat')?>">Riwayat</a>
                    </li>
                </ul>
                <div class="card border-0 w-100 px-2 py-3" id="link-detail">
                    <div class="container-fluid">
                        <div class="row d-flex justify-content-between">
                            <button class="btn btn-plus py-1 px-2 mb-3 mb-sm-0" data-toggle="modal" data-target="#modalAddPemesanan">+ Pesan Kendaraan</button>
                            <div class="filter d-flex flex-row"><button class="btn btn-filter py-1 px-3 d-flex flex-row">    <img src=<?php echo base_url("assets/img/icons/filter_biru.png")?> alt="Filter" class="img-fluid mr-2"/>    <span>Filter</span></button>
                                <form class="ml-4">
                                    <div class="input-group input-group--custom"> <input type="text" class="form-control" placeholder="Cari..." />
                                        <div class="input-group-append--custom"> <button class="btn btn-primary" type="button"><img src=<?php echo base_url("assets/img/icons/search_putih.png")?> class="topbar__search-icn"/></button></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <section class="table-responnsive mt-4">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">Nama Sopir</th>
                                    <th scope="col">Tujuan</th>
                                    <th scope="col">Tgl Pengajuan</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody id="isi-tabel">
                            </tbody>
                        </table>
                        <div id="loading"></div>
                        <button  onclick="paginationPrevious()" value="1" id="btnPrevious" class="btn btn-light btn-sm" style="width: 50px;margin-left:80%; border-radius: 25px;border-color: grey;"> <b> < </b> 
                        </button>
                        <button id="btnNext" onclick="paginationNext()" value="2" class="btn btn-light btn-sm" style="width: 50px;border-radius: 25px;border-color: grey;"> <b> > </b> 
                        </button>
                    </section>
                </div>
            </div>
        </div>
        <!-- END MAIN -->

        <!-- MODAL -->

        <!-- Modal Tambah Pemesanan -->
        <div class="modal fade" id="modalAddPemesanan" tabindex="-1" aria-labelledby="modalAddLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content py-4 px-5 border-0">
                    <h3 class="modal-title px-3" id="modalAddLabel">
                        Pesan Kendaraan
                    </h3>
                    <div class="modal-body">
                            <div class="form-row my-2">
                                <div class="form-group col-md-6">
                                    <label for="namaPolisi">Nama Pemesan</label>
                                    <input type="text" class="form-control" id="namaPolisi" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Tujuan</label>
                                    <input type="text" class="form-control" id="namaKendaraan" />
                                    <span id="tambah-tujuan">+ Tambah Tujuan</span>
                                </div>
                            </div>
                            <div class="form-row my-2">
                                <div class="form-group col-md-6">
                                    <label for="namaKendaraan">Jumlah Penumpang</label>
                                    <div class="tambah-minus">
                                        <button onclick="kurangiPenumpang()" class="btn btn-primary py-1 px-3 f3">-</button>
                                            <span id="show"> 0 </span>
                                            <input type="hidden" id="value" value="0">
                                        <button onclick="tambahPenumpang()" class="btn btn-primary py-1 px-3 f4">+</button>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="tglSerah">Status Dinas</label>
                                    <select id="statusDinas" class="form-control">
                                        <option value="">Pilih Status</option>
                                        <option value="Dalam kota operasional">Dalam kota operasional</option>
                                        <option value="Luar kota operasional">Luar kota operasional</option>
                                      </select>
                                </div>
                            </div>
                            <div class="form-row my-2">
                                <div class="form-group col-md-6">
                                    <label for="namaKendaraan">Tgl Berangkat</label>
                                    <input type="date" id="tglBerangkat" class="form-control" id="tglSerah" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="namaKendaraan">Jam Berangkat</label>
                                    <input type="time" id="jamBerangkat" class="form-control" id="namaKendaraan" />
                                </div>
                            </div>
                            <div class="form-row my-2">
                                <div class="form-group col-md-6">
                                    <label for="namaKendaraan">Tgl Kembali</label>
                                    <input type="date" id="tglKembali" class="form-control" id="tglSerah" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="namaKendaraan">Jam Kembali</label>
                                    <input type="time" id="jamKembali" class="form-control" id="namaKendaraan" />
                                </div>
                            </div>
                            <div class="form-row my-2">
                                <div class="form-group col-md-6">
                                    <label for="namaKendaraan">Nomer HP (yang dapat dihubungi)</label>
                                    <input type="text" id="nomorHp" class="form-control" id="namaKendaraan" />
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="form-row my-2">
                                        <div class="form-group col-md-12">
                                            <label for="namaPolisi">Keperluan</label>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <textarea id="keperluan" cols="80" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="px-3">
                        <button type="button" class="btn btn-submit" id="btnSubmitUSr">
                Pesan Kendaraan
              </button>
                        <button type="button" class="btn btn-cancel" data-dismiss="modal">Batal</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- END MODAL -->
        <div class="modal fade" id="mdlHarapTunggu" tabindex="-1" aria-labelledby="modalAddLihatLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content py-4 px-5 border-0">
                    <div class="modal-body" style="margin-top: 20px;margin-bottom: 20px;">
                        <div><center><img style="width: 50px;" src="<?= base_url('')?>assets/img/icons/jam.png"></center></div>
                        <center><span><p style="color:#014188;font-weight: bold;">Harap Tunggu!</p></span></center>
                        <center><span><p style="">Data yang Anda kirim sedang diproses, harap tunggu beberapa detik. Pastikan perangkat Anda tetap terkoneksi dengan internet.</p></span></center>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Notifikasi Submit Persetujuan --> 
        <div class="modal fade" id="modalSuntingPersetujuan" tabindex="-1" aria-labelledby="modalAddLihatLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content py-4 px-5 border-0">
                    <div class="modal-body" style="margin-top: 20px;margin-bottom: 20px;">
                        <div><center><img src="<?= base_url('')?>assets/img/icons/ctg_notif.PNG"></center></div>
                        <center><span><p style="color:#014188;font-weight: bold;">Pengajuan terkirim!</p></span></center>
                        <center><span><p style="">Pengajuan pemesanan kendaraan Anda <br/>sudah terkirim. Mohon tunggu persetujuan<br/> manajer dan admin sebelum melakukan perjalanan!</p></span></center>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MODAL -->

    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="<?php echo base_url("assets/js/bootstrap.bundle.min.js")?>"></script>
    <script src="<?php echo base_url("assets/js/script.js")?>"></script>
    <script type="text/javascript">
    var baseurl = "<?= base_url() ?>"
// --------------------------------------------------LODA DATA RIWAYAT ALL------------------------------------------------//
var settings = {
            'cache': false,
            'dataType': "jsonp",
            "async": true,
            "crossDomain": true,
            "url": "https://pjbs.ridiansyah.dev/v1/kendaraan/pemesanan/",
            "method": "GET",
            "headers": {
                "accept": "application/json",
                "Access-Control-Allow-Origin": "*"
            }
        }


        $.ajax(settings).done(function(result) {
            $('#loading4').remove();
            var data = result.pemesanan;
            $.each(data, function(i, item) {
                var status = '';
                if (item.status_pemesanan == 'Disetujui'){
                    status = '<a style="padding:2px 35px;" href="'+baseurl+'ModulKendaraanManajer/PemesananDisetujui/'+item.id+'" class="aktif-setuju font-weight-bold">'+item.status_pemesanan+'</a>';
                }else if (item.status_pemesanan == 'Ditolak'){
                    status = '<a style="padding:2px 40px;" href="'+baseurl+'ModulKendaraanManajer/PemesananDitolak/'+item.id+'" class="aktif font-weight-bold">'+item.status_pemesanan+'</a>'
                }else if (item.status_pemesanan == 'Menunggu'){
                    status = '<a style="padding:2px 27px;" href="'+baseurl+'ModulKendaraanManajer/MenungguPemesanan/'+item.id+'" class="menunggu font-weight-bold">'+item.status_pemesanan+'</a>'
                }else{
                    status = '<a style="padding:2px 27px;" href="'+baseurl+'ModulKendaraanManajer/PemesananBerlangsung/'+item.id+'" class="menunggu font-weight-bold">'+item.status_pemesanan+'</a>'
                }
                
                $('#isi-tabel').append('<tr><td>'+item.nama_sopir+'</td><td>' + item.tujuan + '</td><td>' + item.created_at + '</td><td>'+status+'</td></tr>');

                $('#modal-click').append('<div class="from-modal collapse" id="multiCollapseExample' + i + '"><div class="row">   <div class="tanda-close"> <span></span> <span></span> </div>  <div class="text-from">      <h4>2 data terpilih</h4>  </div>  <div class="from lihat" data-toggle="modal" data-target="#modalLihatKendaraan"><span class="img-from"><img src="<?= base_url()?>assets/img/icons/lihat.png" alt=""></span>     <h4>Lihat</h4></div>  <div class="from sunting" data-toggle="modal" data-target="#modalSuntingKendaraan"><span class="img-from"><img src=<?php echo base_url("assets/img/icons/edit.png")?> alt=""></span>       <h4>Sunting</h4> </div> <div class="from hapus" data-toggle="modal" data-target="#multiHapus"><span class="img-from"><img src=<?php echo base_url("assets/img/icons/hapus.png")?> alt=""></span>     <h4>Hapus</h4>  </div>  </div> </div>');

            });
        });

// -------------------------------------------------LOAD DATA RIWAYAT PAGINATION------------------------------------------//
var num = 1;
        function paginationNext () {
        $('#loading').html("<center><img id='loading4' style='width:500px ;margin-top: 2%;' src='"+baseurl+"/assets/img/gif/loading4.gif'/><br/></center><br />")

          var page = $('#btnNext').val();
         
          $('#isi-tabel').html('');

           var settings = {
            'cache': false,
            'dataType': "jsonp",
            "async": true,
            "crossDomain": true,
            "url": "https://pjbs.ridiansyah.dev/v1/kendaraan/pemesanan?page="+page,
            "method": "GET",
            "headers": {
                "accept": "application/json",
                "Access-Control-Allow-Origin": "*"
            }
        }


        $.ajax(settings).done(function(result) {
            $('#loading4').remove();
            var data = result.pemesanan;
             if(!data.length){
               alert('Tidak ada data')
            }else{
            $.each(data, function(i, item) {
                var status = '';
                if (item.status_pemesanan == 'Disetujui'){
                    status = '<a style="padding:2px 35px;" href="'+baseurl+'ModulKendaraanUser/PemesananDisetujui/'+item.id+'" class="aktif-setuju font-weight-bold">'+item.status_pemesanan+'</a>';
                }else if (item.status_pemesanan == 'Ditolak'){
                    status = '<a style="padding:2px 40px;" href="'+baseurl+'ModulKendaraanUser/PemesananDitolak/'+item.id+'" class="aktif font-weight-bold">'+item.status_pemesanan+'</a>'
                }else if (item.status_pemesanan == 'Menunggu'){
                    status = '<a style="padding:2px 27px;" href="'+baseurl+'ModulKendaraanUser/MenungguPemesanan/'+item.id+'" class="menunggu font-weight-bold">'+item.status_pemesanan+'</a>'
                }else{
                    status = '<a style="padding:2px 27px;" href="'+baseurl+'ModulKendaraanUser/PemesananBerlangsung/'+item.id+'" class="menunggu font-weight-bold">'+item.status_pemesanan+'</a>'
                }
                
                $('#isi-tabel').append('<tr><td>'+item.nama_sopir+'</td><td>' + item.tujuan + '</td><td>' + item.created_at + '</td><td>'+status+'</td></tr>');

                $('#modal-click').append('<div class="from-modal collapse" id="multiCollapseExample' + i + '"><div class="row">   <div class="tanda-close"> <span></span> <span></span> </div>  <div class="text-from">      <h4>2 data terpilih</h4>  </div>  <div class="from lihat" data-toggle="modal" data-target="#modalLihatKendaraan"><span class="img-from"><img src="<?= base_url()?>assets/img/icons/lihat.png" alt=""></span>     <h4>Lihat</h4></div>  <div class="from sunting" data-toggle="modal" data-target="#modalSuntingKendaraan"><span class="img-from"><img src=<?php echo base_url("assets/img/icons/edit.png")?> alt=""></span>       <h4>Sunting</h4> </div> <div class="from hapus" data-toggle="modal" data-target="#multiHapus"><span class="img-from"><img src=<?php echo base_url("assets/img/icons/hapus.png")?> alt=""></span>     <h4>Hapus</h4>  </div>  </div> </div>');

            });
             $('#btnPrevious').val(page);
            var baru = (Number(page)+Number(1));
            $('#btnNext').val(baru);
            }
        });
        }


        function paginationPrevious () {

        $('#loading').html("<center><img id='loading4' style='width:500px ;margin-top: 2%;' src='"+baseurl+"/assets/img/gif/loading4.gif'/><br/></center><br />")

          var page = $('#btnPrevious').val();
          $('#btnNext').val(page);
          $('#isi-tabel').html('');

           var settings = {
            'cache': false,
            'dataType': "jsonp",
            "async": true,
            "crossDomain": true,
            "url": "https://pjbs.ridiansyah.dev/v1/kendaraan/pemesanan?page="+page,
            "method": "GET",
            "headers": {
                "accept": "application/json",
                "Access-Control-Allow-Origin": "*"
            }
        }


        $.ajax(settings).done(function(result) {
            $('#loading4').remove();
            var data = result.pemesanan;
            if(!data.length){
               alert('Tidak ada data')
               // var baru = (Number(page)-Number(1));
               //  $('#btnPrevious').val(baru);
            }else{
            $.each(data, function(i, item) {
                var status = '';
                if (item.status_pemesanan == 'Disetujui'){
                    status = '<a style="padding:2px 35px;" href="'+baseurl+'ModulKendaraanUser/PemesananDisetujui/'+item.id+'" class="aktif-setuju font-weight-bold">'+item.status_pemesanan+'</a>';
                }else if (item.status_pemesanan == 'Ditolak'){
                    status = '<a style="padding:2px 40px;" href="'+baseurl+'ModulKendaraanUser/PemesananDitolak/'+item.id+'" class="aktif font-weight-bold">'+item.status_pemesanan+'</a>'
                }else if (item.status_pemesanan == 'Menunggu'){
                    status = '<a style="padding:2px 27px;" href="'+baseurl+'ModulKendaraanUser/MenungguPemesanan/'+item.id+'" class="menunggu font-weight-bold">'+item.status_pemesanan+'</a>'
                }else{
                    status = '<a style="padding:2px 27px;" href="'+baseurl+'ModulKendaraanUser/PemesananBerlangsung/'+item.id+'" class="menunggu font-weight-bold">'+item.status_pemesanan+'</a>'
                }
                
                $('#isi-tabel').append('<tr><td>'+item.nama_sopir+'</td><td>' + item.tujuan + '</td><td>' + item.created_at + '</td><td>'+status+'</td></tr>');

                $('#modal-click').append('<div class="from-modal collapse" id="multiCollapseExample' + i + '"><div class="row">   <div class="tanda-close"> <span></span> <span></span> </div>  <div class="text-from">      <h4>2 data terpilih</h4>  </div>  <div class="from lihat" data-toggle="modal" data-target="#modalLihatKendaraan"><span class="img-from"><img src="<?= base_url()?>assets/img/icons/lihat.png" alt=""></span>     <h4>Lihat</h4></div>  <div class="from sunting" data-toggle="modal" data-target="#modalSuntingKendaraan"><span class="img-from"><img src=<?php echo base_url("assets/img/icons/edit.png")?> alt=""></span>       <h4>Sunting</h4> </div> <div class="from hapus" data-toggle="modal" data-target="#multiHapus"><span class="img-from"><img src=<?php echo base_url("assets/img/icons/hapus.png")?> alt=""></span>     <h4>Hapus</h4>  </div>  </div> </div>');

            });
            var baru = (Number(page)-Number(1));
            $('#btnPrevious').val(baru);
        }
        });
        }
//-------------------------------------------------SUBMIT KENDARAAN ------------------------------------------//
 $('#btnSubmitUSr').click(function(th){
        $('#mdlHarapTunggu').modal('show')
        var jam_berangkat1 = $('#jamBerangkat').val()
        var tanggal_berangkat1 = $('#tglBerangkat').val();
        var jam_kembali1= $('#jamKembali').val();
        var tanggal_kembali1= $('#tglKembali').val();
        var jumlah1= $('#value').val();
        var status_dinas1= $('#statusDinas').val();
        var nohp1= $('#nomorHp').val();
        var test1 = [];
        $('input#tujuan').each(function(){
        var tujuan_string = $(this).val();
        test1.push(tujuan_string);
        });
        var keperluan1 = $('#keperluan').val();

        var tujuan_json = JSON.stringify
        ([{
            "lokasi": "where",
            "lat": 989823.123,
            "lng": 29038.222 },
        {   "lokasi": "now",
            "lat": 989823.123,
            "lng": 29038.222
        }])

        const dataSend = {
                jam_berangkat : jam_berangkat1,
                tanggal_berangkat: tanggal_berangkat1,
                jam_kembali: jam_kembali1,
                tanggal_kembali:tanggal_kembali1,
                jumlah:jumlah1,
                status_dinas:status_dinas1,
                nohp:nohp1,
                tujuan:tujuan_json,
                keperluan:keperluan1
        };

        axios({
              method: 'POST',
              url: 'https://pjbs.ridiansyah.dev/v1/kendaraan/Pemesanan/create',
              data: dataSend
            }).then( result => {
                $('#mdlHarapTunggu').modal('hide')
                $('#modalSuntingPersetujuan').modal('show');
            }).catch(error => console.log(error));
        
    })

        function tambahPenumpang(th) {
            // alert('test')
           var value = $('#value').val();
           var plus = Number(value) + 1;
           $('#show').html(plus).trigger('change');
           $('#value').val(plus).trigger('change');
        }

        function kurangiPenumpang(th) {
           var value = $('#value').val();
           if (value == 0)
           {
                alert('value sudah 0');
            }else{
           var plus = Number(value) - 1;
           $('#show').html(plus).trigger('change');
           $('#value').val(plus).trigger('change');
            }
        } 

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
    // ------------------------------------jam otomatis
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