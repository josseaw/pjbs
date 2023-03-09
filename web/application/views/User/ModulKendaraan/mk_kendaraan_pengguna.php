                <!-- END TOPBAR -->
        <div class="content">
            <div class="col-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link text-center active" href="<?= base_url('ModulKendaraanUser')?>">Pesan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="<?= base_url('ModulKendaraanUser/Riwayat')?>">Riwayat</a>
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
                        <div><center><img src="assets/img/icons/ctg_notif.PNG"></center></div>
                        <center><span><p style="color:#014188;font-weight: bold;">Pengajuan terkirim!</p></span></center>
                        <center><span><p style="">Pengajuan pemesanan kendaraan Anda <br/>sudah terkirim. Mohon tunggu persetujuan<br/> manajer dan admin sebelum melakukan perjalanan!</p></span></center>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Notifikasi Submit Persetujuan --> 
        <div class="modal fade" id="mdlError" tabindex="-1" aria-labelledby="modalAddLihatLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content py-4 px-5 border-0">
                    <div class="modal-body" style="margin-top: 20px;margin-bottom: 20px;">
                        <!-- <div><center><img src="assets/img/icons/ctg_notif.PNG"></center></div> -->
                        <center><span><p style="color:#014188;font-weight: bold;">Error!</p></span></center>
                        <center><span><p style="">Harap isi data terlebih dahulu!</p></span></center>
                    </div>
                </div>
            </div>
        </div>

        <!-- END MAIN -->
    </main>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script type="text/javascript">
    var baseurl = "<?= base_url() ?>"

//------------------------------------------SUBMIT KENDARAAN -----------------------------------------//

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

        if (jam_berangkat1 == '' && tanggal_berangkat1 =='') {
            $('#mdlError').modal('show')
        }else{

        axios({
              method: 'POST',
              url: 'https://pjbs.ridiansyah.dev/v1/kendaraan/pemesanan/create',
              data: dataSend
            }).then( result => {
                $('#modalSuntingPersetujuan').modal('show');
            }).catch(error => console.log(error));
        }
    })

//----------------------------------------------------------NOTIFIKASI------------------------------------------//
    
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
                var count = data.length;
                $('.count-notifikasi').html(count);
                var href = ''

                var stt = item.diajukan;
                var rte = stt.split(" ");
                var tgl_not = new Date(rte[0]).toString('d-M-yyyy')
                var waktu_not = rte[1];


                if (item.status_pemesanan == 'Disetujui'){
                    href = baseurl+'ModulKendaraanUser/PemesananDisetujui/'+item.pemesanan_id
                    status =  'Pemesanan Anda disetujui oleh Admin';
                    img_status = '<div class="img-notifikasi bg-white"><img src="'+baseurl+'assets/img/icons/notif_user_biru.png" alt="Disetujui Admin">';
                }else if (item.status_pemesanan == 'Ditolak'){
                    href = baseurl+'ModulKendaraanUser/PemesananDitolak/'+item.pemesanan_id
                    status =  'Pemesanan Anda ditolak oleh Admin';
                    img_status = '<div class="img-notifikasi bg-ditolak"><img src="'+baseurl+'assets/img/icons/ditolak.png" alt="Ditolak Admin">';
                }else if (item.status_pemesanan == 'Menunggu'){
                    href = baseurl+'ModulKendaraanUser/MenungguPemesanan/'+item.pemesanan_id
                    status =  'Pemesanan Anda menunggu persetujuan Admin';
                    img_status = '<div class="img-notifikasi bg-white"><img src="'+baseurl+'assets/img/icons/notif_approval.png" alt="Menunggu Approval Admin">';
                }
                
                $('#isi-notifikasi').append('<a href="'+href+'"><div class="list-drop bg-blue-rgba">'+img_status+'</div><div class="content-notifikasi" style="margin-bottom:20px;margin-top:20px;"><p>'+status+'</p><p>'+waktu_not+' WIB</p></div></div></a>');

                $('#modal-click').append('<div class="from-modal collapse" id="multiCollapseExample' + i + '"><div class="row">   <div class="tanda-close"> <span></span> <span></span> </div>  <div class="text-from">      <h4>2 data terpilih</h4>  </div>  <div class="from lihat" data-toggle="modal" data-target="#modalLihatKendaraan"><span class="img-from"><img src="../assets/img/icons/lihat.png" alt=""></span>     <h4>Lihat</h4></div>  <div class="from sunting" data-toggle="modal" data-target="#modalSuntingKendaraan"><span class="img-from"><img src=<?php echo base_url("assets/img/icons/edit.png")?> alt=""></span>       <h4>Sunting</h4> </div> <div class="from hapus" data-toggle="modal" data-target="#multiHapus"><span class="img-from"><img src=<?php echo base_url("assets/img/icons/hapus.png")?> alt=""></span>     <h4>Hapus</h4>  </div>  </div> </div>');

            });
        });

//-------------------------------------------------------EVENT DI ADD KENDARAAN ------------------------------------//

        function tambahPenumpang(th) {
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

        const onClickHapus = (th) => { 
          $('div.number'+th).remove()
            num -=1
        }
//------------------------------------------------------------JAM TANGGAL OTOMATIS ---------------------------------//
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