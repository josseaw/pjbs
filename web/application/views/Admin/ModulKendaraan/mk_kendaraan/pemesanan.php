        <!-- MAIN -->
        <div class="content">
            <div class="col-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link text-center" href="<?php echo base_url("ModulKendaraan")?>">Kendaraan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="<?php echo base_url("ModulKendaraan/Sopir") ?>">Sopir</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="<?php echo base_url("ModulKendaraan/Persetujuan") ?>">Persetujuan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="<?php echo base_url("ModulKendaraan/PesanKendaraan") ?>">Pesan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center active" href="<?php echo base_url("ModulKendaraan/Riwayat") ?>">Riwayat</a>
                    </li>
                </ul>
                <div class="card border-0 w-100 px-2 py-3" id="link-detail">
                    <div class="container-fluid">
                        <div class="row d-flex justify-content-between">
                            <button class="btn btn-plus py-1 px-2 mb-3 mb-sm-0" data-toggle="modal" data-target="#modalAddPemesanan">+ Pesan Kendaraan</button>
                            <div class="filter d-flex flex-row"><button class="btn btn-filter py-1 px-3 d-flex flex-row">    <img src="<?php echo base_url("assets/img/icons/filter_biru.png")?>" alt="Filter" class="img-fluid mr-2"/>    <span>Filter</span></button>
                                <form class="ml-4">
                                    <div class="input-group input-group--custom"> <input type="text" class="form-control" placeholder="Cari..." />
                                        <div class="input-group-append--custom"> <button class="btn btn-primary" type="button"><img src="<?php echo base_url("assets/img/icons/search_putih.png")?>" class="topbar__search-icn"/></button></div>
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
                                    <td><a href=<?php echo base_url("ModulKendaraan/RiwayatDisetujui")?> class="aktif-setuju font-weight-bold">Disetujui</a></td>
                                </tr>
                                <tr>
                                    <td>Delvin Smith</td>
                                    <td>Kantor BPKB</td>
                                    <td>17-10-2020</td>
                                    <td><a href=<?php echo base_url("ModulKendaraan/RiwayatDisetujui")?> class="aktif-setuju font-weight-bold">Disetujui</a></td>
                                </tr>
                                <tr>
                                    <td>Delvin Smith</td>
                                    <td>Kantor BPKB</td>
                                    <td>17-10-2020</td>
                                    <td><a href=<?php echo base_url("ModulKendaraan/RiwayatDitolak")?> class="aktif font-weight-bold">Ditolak</a></td>
                                </tr>
                                <tr>
                                    <td>Delvin Smith</td>
                                    <td>Kantor BPKB</td>
                                    <td>17-10-2020</td>
                                    <td><a href=<?php echo base_url("ModulKendaraan/riwayatDitolak")?> class="aktif font-weight-bold">Ditolak</a></td>
                                </tr>
                                <tr>
                                    <td>Delvin Smith</td>
                                    <td>Kantor BPKB</td>
                                    <td>17-10-2020</td>
                                    <td><a style="font-size: 14px;" href="<?= base_url("ModulKendaraan/pesananBerlangsung")?>" class="menunggu font-weight-bold">Berlangsung</a></td>
                                </tr>
                                <tr>
                                    <td>Delvin Smith</td>
                                    <td>Kantor BPKB</td>
                                    <td>17-10-2020</td>
                                    <td><a href="<?= base_url("ModulKendaraan/riwayatMenunggu")?>" class="menunggu font-weight-bold">Menunggu</a></td>
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
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="<?php echo base_url("assets/js/bootstrap.bundle.min.js")?>"></script>
    <script src="<?php echo base_url("assets/js/script.js")?>"></script>
    <script type="text/javascript">
    var baseurl = "<?= base_url() ?>"

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
//---------------------------------------------NOTIFIKASI ADMIN----------------------------------------------------------//

var settings = {
            'cache': false,
            'dataType': "jsonp",
            "async": true,
            "crossDomain": true,
            "url": "https://pjbs.ridiansyah.dev/v1/kendaraan/notifikasi/Persetujuan?role=admin",
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