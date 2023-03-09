        <!-- MAIN -->
        <div class="content">
            <div class="col-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link text-center active" href="<?= base_url('ModulKendaraanManajer')?>">Persetujuan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="<?= base_url('ModulKendaraanManajer/Pesan')?>">Pesan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="<?= base_url('ModulKendaraanManajer/Riwayat')?>">Riwayat</a>
                    </li>
                </ul>
                <div class="card border-0 w-100 px-2 py-3" id="link-detail-persetujuan">
                    <div class="container-fluid">
                        <div class="row d-flex justify-content-between">
                            <span class="btn btn-plus py-1 px-2 mb-3 mb-sm-0 bg-white"></span>
                            <div class="filter d-flex flex-row"><button class="btn btn-filter py-1 px-3 d-flex flex-row">    <img src="<?= base_url('')?>assets/img/icons/filter_biru.png" alt="Filter" class="img-fluid mr-2"/>    <span>Filter</span></button>
                                <form class="ml-4">
                                    <div class="input-group input-group--custom"> <input type="text" class="form-control" placeholder="Cari..." />
                                        <div class="input-group-append--custom"> <button class="btn btn-primary" type="button"><img src="<?= base_url('')?>assets/img/icons/search_putih.png" class="topbar__search-icn"/></button></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <section class="table-responnsive mt-4">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">Nama Pemesan</th>
                                    <th scope="col">Tgl Berangkat</th>
                                    <th scope="col">Jam<br>Berangkat</th>
                                    <th scope="col">Tgl Kembali</th>
                                    <th scope="col">Jam<br>Kembali</th>
                                    <th scope="col">Jml<br>Penumpang</th>
                                    <th scope="col">Status<br>Dinas</th>
                                    <th scope="col">Tujuan</th>
                                    <th scope="col">Persetujuan</th>
                                </tr>
                            </thead>
                            <tbody id="isi-tabel">
                               
                            </tbody>
                        </table>
                        <div id="loading"></div>
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

        <!-- Modal Lihat Persetujuan -->
        <div class="modal fade" id="modalLihatPersetujuan" tabindex="-1" aria-labelledby="modalAddLihatLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content py-4 px-5 border-0 persetujuan">
                    <!-- <h3 class="modal-title px-3" id="modalAddLabel">
                        Detail 
                    </h3>
                    <div class="modal-body">
                        <div class="disetujui-pemesanan">
                                    <div class="text-head">
                                        <h4><b>Karina Kusumadewi</b></h4>
                                    </div>
                                    <table style="width: 100%;margin-bottom: 20px;">
                                        <tr>
                                            <td><img style="width: 20px;" src="<?= base_url()?>assets/img/icons/jam_coklat.png" alt=""></td>
                                            <td> diajukan pada 18 September 2019</td>
                                            <td><img style="width: 25px;" src="<?= base_url()?>assets/img/icons/lokasi_coklat.png" alt=""></td>
                                            <td><p> Kantor A</p></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><img style="width: 25px;" src="<?= base_url()?>assets/img/icons/lokasi_coklat.png" alt=""></td>
                                            <td> Kantor B</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><img style="width: 25px;" src="<?= base_url()?>assets/img/icons/penumpang.png" alt=""></td>
                                            <td>4</td>
                                        </tr>
                                        <tr>
                                            <td><span class="dot"></td>
                                            <td colspan="3"><span style="font-size: 20px;margin-right: 50px;"><b>08:00 WIB</b></span> 20 September 2020</td>
                                            
                                        </tr>
                                        <tr>
                                            <td><div class="vl"></div></td>
                                            <td colspan="3"><hr/></td>
                                        </tr>
                                        <tr>
                                            <td><span class="dot"></td>
                                            <td colspan="3"><span style="font-size: 20px;margin-right: 50px;"><b>08:00 WIB </b></span>20 September 2020</td>
                                            
                                        </tr>
                                    </table>
                                    <div class="content-pemesanan">
                                        <div>
                                            <h4>Status Dinas</h4>
                                            <p>Dalam kota operasional</p>
                                        </div>
                                        <div>
                                            <h4>Keperluan</h4>
                                            <p>Menjemput narasumber untuk diantar ke kantor PJBS dan pulang diantar kembali ke kantor BPKP</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="px-3">
                                <a href=<?php echo base_url("ModulKendaraanManajer/KonfirmasiPersetujuan")?> class="btn btn-submit">
                                    Setujui
                                </a>
                                <a href="<?php echo base_url("ModulKendaraanManajer/KonfirmasiPenolakan")?>">
                                <button type="button" class="btn btn-cancel">Tolak</button>
                                    </a>
                            </div>-->
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
                                    <label for="namaPolisi">Alasan</label>
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
    <script src="<?= base_url('')?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('')?>assets/js/script.js"></script>
    <script type="text/javascript">
var baseurl = "<?= base_url() ?>";

$('#loading').html("<center><img id='loading4' style='width:500px ;margin-top: 2%;' src='"+baseurl+"/assets/img/gif/loading4.gif'/><br /></center><br />")

        var settings = {
            'cache': false,
            'dataType': "jsonp",
            "async": true,
            "crossDomain": true,
            "url": "https://pjbs.ridiansyah.dev/v1/kendaraan/pemesanan/persetujuan?role=manajer",
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
                var str = item.berangkat;
                var ret = str.split(" ");
                var tgl_ber = ret[0];
                var waktu_ber = ret[1];
                var stt = item.kembali;
                var rte = stt.split(" ");
                var tgl_kem = rte[0];
                var waktu_kem = ret[1];

                $('#isi-tabel').append('<tr data-toggle="modal" data-target="#multiCollapseExample"> <td>Karina Kusumadewi</td> <td>'+tgl_ber+'</td> <td>'+waktu_ber+'</td> <td>'+tgl_kem+'</td> <td>'+waktu_kem+'</td> <td>4</td> <td>Dalam kota<br>tugas operasional</td> <td>Kantor<br>BPKB</td> <td class="d-flex "> <a onclick="persetujuan('+item.pemesanan_id+')"> <div class="table-centang mx-1 bg-v-blue"><span></span><span></span></div> </a> <a onclick="persetujuan('+item.pemesanan_id+')"> <div class="table-close mx-1"><span></span><span></span></div> </a> </td> </tr>');
                });
            });


function persetujuan(id) {
            $('#modalLihatPersetujuan').modal('show')
            $('div.persetujuan').html("<center><img id='loading4' style='width:500px ;margin-top: 2%;' src='"+baseurl+"/assets/img/gif/loading4.gif'/><br /></center><br />")

            var settings = {
            'cache': false,
            'dataType': "jsonp",
            "async": true,
            "crossDomain": true,
            "url": "https://pjbs.ridiansyah.dev/v1/kendaraan/Pemesanan?id="+id,
            "method": "GET",
            "headers": {
                "accept": "application/json",
                "Access-Control-Allow-Origin": "*"
            }
        }

        $.ajax(settings).done(function(result) {
            $('#loading4').remove();
            var data = result.pemesanan;
            var str = data.berangkat;
            var ret = str.split(" ");
            var tgl_ber = ret[0];
            var waktu_ber = ret[1];

            var stt = data.kembali;
            var rte = stt.split(" ");
            var tgl_kem = rte[0];
            var waktu_kem = ret[1];

            var srr = data.created_at;
            var ree = srr.split(" ");
            var tgl_ca = ree[0];
            var waktu_ca = ret[1];

            $('div.persetujuan').append('<h3 class="modal-title px-3" id="modalAddLabel"> Detail </h3> <br/><div class="modal-body-persetujuan"> <div class="disetujui-pemesanan"> <div class="text-head"> <h4><b>Karina Kusumadewi ID. '+data.user_id+'</b></h4> </div> <table style="width: 100%;margin-bottom: 20px;"> <tr> <td><img style="width: 20px;" src="'+baseurl+'assets/img/icons/jam_coklat.png" alt=""></td> <td> diajukan pada '+tgl_ca+'</td> <td><img style="width: 25px;" src="'+baseurl+'assets/img/icons/lokasi_coklat.png" alt=""></td> <td><p>'+data.tujuan[0].lokasi+'</p></td> </tr> <tr> <td></td> <td></td> <td><img style="width: 25px;" src="'+baseurl+'assets/img/icons/lokasi_coklat.png" alt=""></td> <td> '+data.tujuan[1].lokasi+'</td> </tr> <tr> <td></td> <td></td> <td><img style="width: 25px;" src="'+baseurl+'assets/img/icons/penumpang.png" alt=""></td> <td>4</td> </tr> <tr> <td><span class="dot"></td> <td colspan="3"><span style="font-size: 20px;margin-right: 50px;"><b>'+waktu_ber+' WIB</b></span> '+tgl_ber+'</td> </tr> <tr> <td><div class="vl"></div></td> <td colspan="3"><hr/></td> </tr> <tr> <td><span class="dot"></td> <td colspan="3"><span style="font-size: 20px;margin-right: 50px;"><b>'+waktu_kem+' WIB </b></span>'+tgl_kem+'</td> </tr> </table> <div class="content-pemesanan"> <div> <h4>Status Dinas</h4> <p>'+data.status_dinas+'</p> </div> <div> <h4>Keperluan</h4> <p>'+data.keperluan+'</p> </div> <div> <h4>Catatan Manajer</h4> <p>'+data.catatan_manajer+'</p> </div> <div> <h4>Catatan Admin</h4> <p>'+data.catatan_admin+'</p> </div> </div> </div> </div> <div class="px-3"> <a href="'+baseurl+'ModulKendaraanManajer/pilihSupir/'+data.id+'" class="btn btn-submit"> Setujui </a> <a href="'+baseurl+'ModulKendaraanManajer/ditolak_pemesanan/'+data.id+'"> <button type="button" class="btn btn-cancel">Tolak</button> </a> </div>')
        })
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

// ---------------------------------------------------JAM OTOMATIS -----------------------------------//

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