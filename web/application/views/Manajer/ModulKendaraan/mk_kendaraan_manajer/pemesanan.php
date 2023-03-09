<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>PJBS Web App | Kendaraan</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />

    <!-- CSS -->
    <link rel="stylesheet" href="<?= base_url('')?>assets/css/style.min.css" />
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
                        <a class="nav-link text-center " href="<?= base_url('ModulKendaraanManajer/Persetujuan')?>">Persetujuan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center active" href="<?= base_url('ModulKendaraanManajer/Pesan')?>">Pesan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="<?= base_url('ModulKendaraanManajer/Riwayat')?>">Riwayat</a>
                    </li>
                </ul>
                <div class="card border-0 w-100 px-2 py-3" id="link-detail">
                    <div class="container-fluid">
                        <div class="row d-flex justify-content-between">
                            <button class="btn btn-plus py-1 px-2 mb-3 mb-sm-0" data-toggle="modal" data-target="#modalAddPemesanan">+ Pesan Kendaraan</button>
                            <div class="filter d-flex flex-row"><button class="btn btn-filter py-1 px-3 d-flex flex-row">    <img src="<?= base_url('')?>assets/img/icons/filter_biru.png" alt="Filter" class="img-fluid mr-2"/>    <span>Filter</span></button>
                                <form class="ml-4">
                                    <div class="input-group input-group--custom"> <input type="text" class="form-control" placeholder="Cari..." />
                                        <div class="input-group-append--custom"> <button class="btn btn-primary" type="button"><img src="../assets/img/icons/search_putih.png" class="topbar__search-icn"/></button></div>
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
                            <tbody>
                                <tr>
                                    <td>Delvin Smith</td>
                                    <td>Kantor BPKB</td>
                                    <td>17-10-2020</td>
                                    <td><a href="disetujui-persetujuan.html" class="aktif-setuju font-weight-bold">Disetujui</a></td>
                                </tr>
                                <tr>
                                    <td>Delvin Smith</td>
                                    <td>Kantor BPKB</td>
                                    <td>17-10-2020</td>
                                    <td><a href="disetujui-persetujuan.html" class="aktif-setuju font-weight-bold">Disetujui</a></td>
                                </tr>
                                <tr>
                                    <td>Delvin Smith</td>
                                    <td>Kantor BPKB</td>
                                    <td>17-10-2020</td>
                                    <td><a href="disetujui-persetujuan.html" class="aktif-setuju font-weight-bold">Disetujui</a></td>
                                </tr>
                                <tr>
                                    <td>Delvin Smith</td>
                                    <td>Kantor BPKB</td>
                                    <td>17-10-2020</td>
                                    <td><a href="ditolak-pemesanan.html" class="aktif font-weight-bold">Ditolak</a></td>
                                </tr>
                                <tr>
                                    <td>Delvin Smith</td>
                                    <td>Kantor BPKB</td>
                                    <td>17-10-2020</td>
                                    <td><a href="ditolak-pemesanan.html" class="aktif font-weight-bold">Ditolak</a></td>
                                </tr>
                                <tr>
                                    <td>Delvin Smith</td>
                                    <td>Kantor BPKB</td>
                                    <td>17-10-2020</td>
                                    <td><a href="ditolak-pemesanan.html" class="aktif font-weight-bold">Ditolak</a></td>
                                </tr>
                                <tr>
                                    <td>Delvin Smith</td>
                                    <td>Kantor BPKB</td>
                                    <td>17-10-2020</td>
                                    <td><a href="" class="menunggu font-weight-bold">Menunggu</a></td>
                                </tr>
                            </tbody>
                        </table>
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
                        <form action="">
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
                                        <button class="btn btn-primary py-1 px-3 f3">-</button>1
                                        <button class="btn btn-primary py-1 px-3 f4">+</button>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="tglSerah">Status Dinas</label>
                                    <select id="Pilih Status" class="form-control">
                                        <option value="">Pilih Status</option>
                                      </select>
                                </div>
                            </div>
                            <div class="form-row my-2">
                                <div class="form-group col-md-6">
                                    <label for="namaKendaraan">Tgl Berangkat</label>
                                    <input type="date" class="form-control" id="tglSerah" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="namaKendaraan">Jam Berangkat</label>
                                    <input type="text" class="form-control" id="namaKendaraan" />
                                </div>
                            </div>
                            <div class="form-row my-2">
                                <div class="form-group col-md-6">
                                    <label for="namaKendaraan">Tgl Kembali</label>
                                    <input type="date" class="form-control" id="tglSerah" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="namaKendaraan">Jam Kembali</label>
                                    <input type="text" class="form-control" id="namaKendaraan" />
                                </div>
                            </div>
                            <div class="form-row my-2">
                                <div class="form-group col-md-6">
                                    <label for="namaKendaraan">Nomer HP (yang dapat dihubungi)</label>
                                    <input type="text" class="form-control" id="namaKendaraan" />
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="form-row my-2">
                                        <div class="form-group col-md-12">
                                            <label for="namaPolisi">Keperluan</label>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <textarea name="" id="" cols="80" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="px-3">
                        <button type="button" class="btn btn-submit" data-dismiss="modal">
                Tambah Sopir
              </button>
                        <button type="button" class="btn btn-cancel" data-dismiss="modal">Batal</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MODAL -->

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