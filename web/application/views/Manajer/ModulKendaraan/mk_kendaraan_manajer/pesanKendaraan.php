<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>PJBS Web App | Kendaraan</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url("assets/css/style.min.css") ?>" />
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
                        <a class="nav-link text-center" href="<?= base_url('ModulKendaraanManajer')?>">Persetujuan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center active" href="<?= base_url('ModulKendaraanManajer/Pesan')?>">Pesan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="<?= base_url('ModulKendaraanManajer/Riwayat')?>">Riwayat</a>
                    </li>
                </ul>
                <div class="card border-0 w-100 px-1 py-3" id="link-detail">
                    <div class="py-2 px-2 border-0">
                            <div class="form-row my-4">
                                <div class="d-flex col-md-6">
                                    <label for="namaPolisi" class="col-md-4">Tgl Berangkat</label>
                                    <input type="date" placeholder="dd-mm-yyyy" min="1997-01-01" max="2030-12-31" id="tglBerangkat" class="input-pengguna" />
                                </div>
                                <div class="d-flex col-md-6">
                                    <label for="namaPolisi" class="col-md-4">Jam Berangkat</label>
                                    <input type="time" id="jamBerangkat" class="input-pengguna" />
                                </div>
                            </div>
                            <div class="form-row my-4">
                                <div class="d-flex col-md-6">
                                    <label for="namaPolisi" class="col-md-4">Tgl Kembali</label>
                                    <input type="date" placeholder="dd-mm-yyyy" min="1997-01-01" max="2030-12-31" id="tglKembali" class="input-pengguna" />
                                </div>
                                <div class="d-flex col-md-6">
                                    <label for="namaPolisi" class="col-md-4">Jam Kembali</label>
                                    <input type="time" id="jamKembali" class="input-pengguna" />
                                </div>
                            </div>
                            <div class="form-row my-4">
                                <div class="d-flex col-md-6">
                                    <label for="namaKendaraan" class="col-md-4 my-2">Jumlah Penumpang</label>
                                    <div class="tambah-minus">
                                        <button onclick="kurangiPenumpang(this)" class="btn btn-primary px-3 f3">-</button>
                                            <span id="show">0</span>
                                            <input type="hidden" value="0" id="value">
                                        <button onclick="tambahPenumpang(this)" class="btn btn-primary px-3 f4">+</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row my-4">
                                <div class="d-flex col-md-6">
                                    <label for="tglSerah" class="col-md-4 my-2">Status Dinas</label>
                                    <select id="statusDinas" class="form-control">
                                        <option value="">Pilih Status Dinas</option>
                                        <option value="dinas1">Dinas Luar Kota</option>
                                        <option value="dinas2">Dinas Luar Provinsi</option>
                                    </select>
                                </div>
                            </div>
                                <div class="form-row my-4">
                                    <div class="d-flex col-md-6">
                                        <label for="inputPassword4" class="col-md-4 my-2">Tujuan 1</label>
                                            <input type="text" class="form-control" id="tujuan" name="tujuan[]" />
                                            <button style="margin-left:5px;" disabled class="btn btn-primary px-3 f3"> X </button>
                                    </div>
                                </div>
                            <div id="append">
                            </div>
                            <div class="form-row my-4">
                                <div class="d-flex col-md-6">
                                    <button disabled title="Maaf, sementara belum bisa" onclick="tambahTujuan(this)" id="tambah-tujuan">+ Tambah Tujuan</button>
                                </div>
                            </div>
                            <div class="form-row my-5">
                                <div class="d-flex col-md-6">
                                    <label for="namaKendaraan" class="col-md-4 my-2">Nomor HP <br/><span style="font-size:12px;">(yang dapat dihubungi)</span></label>
                                    <input type="text" class="form-control" id="nomorHp" />
                                </div>
                            </div>
                            <div class="form-row my-5">
                                <div class="d-flex col-md-6">
                                    <label for="keperluan" class="col-md-4 my-2">Keperluan</label>
                                    <textarea type="text" rows="8" class="form-control" id="keperluan"></textarea> 
                                </div>
                            </div>
                            <div class="center-pengguna m-pengguna">
                                <button id="btnSubmitUSr" class="btn-jos btn btn-danger" type="button">Pesan Kendaraan</button>
                            </div>
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

        <!-- END MAIN -->
    </main>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="<?= base_url('')?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('')?>assets/js/script.js"></script>
    <script type="text/javascript">
    var baseurl = "<?= base_url() ?>"


    $('#btnSubmitUSr').click(function(th){

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
              url: 'https://pjbs.ridiansyah.dev/v1/kendaraan/pemesanan/create',
              data: dataSend
            }).then( result => {
                // console.log(result)
                $('#modalSuntingPersetujuan').modal('show');
                // window.location.reload();
            }).catch(error => console.log(error));
        
    })

    
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

        var num = 1;
        function tambahTujuan(){ 
            var html = '<div class="form-row my-4 number'+num+'"><div class="d-flex col-md-6"><label for="inputPassword4" class="col-md-4 my-2">Tujuan '+(Number(num) + 1)+'</label><input id="tujuan" type="text" class="form-control" name="tujuan[]" /><button style="margin-left:5px;" onclick="onClickHapus('+num+')" class="btn btn-primary px-3 f3"> X </button></div></div>';
          num++;
              $('#append').append(html);
        }

        const onClickHapus = (th) => { //FUNCTION DELETE SHIPMENT LINE DAN DELETE TOTAL PERSENTASE VOLUME
          $('div.number'+th).remove()
            num -=1
        }


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