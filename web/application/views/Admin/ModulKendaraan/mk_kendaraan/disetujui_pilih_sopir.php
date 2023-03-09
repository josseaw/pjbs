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
                        <a class="nav-link text-center active" href="<?php echo base_url("ModulKendaraan/Persetujuan") ?>">Persetujuan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="<?php echo base_url("ModulKendaraan/PesanKendaraan") ?>">Pesan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="<?php echo base_url("ModulKendaraan/Riwayat") ?>">Riwayat</a>
                    </li>
                </ul>
                <div class="card border-0 w-100 px-2 py-3" id="link-detail">
                    <div class="title-persetujuan">
                        <h4 class="font-weight-bold">Konfirmasi Persetujuan</h4>
                    </div>
                    <div class="pemesanan-disetujui">
                        <div class="row">
                            <div class="col-3">
                                <div class="pemesanan-profil supir">
                                    
                                </div>
                            </div>
                            <div class="col-9 pemesanan">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- END TOPBAR -->
        <div class="modal fade" id="mdlBerhasil" tabindex="-1" aria-labelledby="mdlHapusBerhasil" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content py-4 px-5 border-0">
                    <div class="modal-body" style="margin-top: 20px;margin-bottom: 20px;">
                        <div><center><img src="<?= base_url('')?>assets/img/icons/ctg_notif.PNG"></center></div>
                        <center><span><p style="color:#014188;font-weight: bold;">Pengajuan Berhasil Disubmit!</p></span></center>
                        <center><span><p style="">Data pengajuan berhasil diupdate!</p></span></center>
                    </div>
                </div>
            </div>
        </div>

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
        <input type="hidden" id="id_pemesanan" value="<?= $id_pemesanan?>">
        <input type="hidden" id="id_supir" value="<?= $id_supir?>">
        <!-- END MAIN -->
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="<?= base_url('')?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('')?>assets/js/script.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/plugins/datejs/build/date.js')?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/plugins/datejs/build/date-id-ID.js')?>"></script>

    <script type="text/javascript">

    var baseurl = "<?= base_url() ?>";
        var id_supir = $('#id_supir').val();
        var id_pemesanan = $('#id_pemesanan').val();

        var settings = {
            'cache': false,
            'dataType': "jsonp",
            "async": true,
            "crossDomain": true,
            "url": " https://pjbs.ridiansyah.dev/v1/kendaraan/sopir?id="+id_supir,
            "method": "GET",
            "headers": {
                "accept": "application/json",
                "Access-Control-Allow-Origin": "*"
            }
        }

        $.ajax(settings).done(function(result) {
            var data = result.sopir;

            $('div.supir').append('<div class="img-pemesanan-profil"> <img src="'+baseurl+'assets/img/icons/testimonial-02.png" alt=""> </div> <div class="text-pemesanan-profil font-weight-bold"> <h4>'+data.nama+'</h4> <h4>'+data.nid+'</h4> </div> <div class="line-coklat"></div> <div class="text-pemesanan font-weight-bold"> <h4>'+data.nama_kendaraan+'</h4> <h4>'+data.nopol+'</h4> </div>');
            });

        var settings2 = {
            'cache': false,
            'dataType': "jsonp",
            "async": true,
            "crossDomain": true,
            "url": "https://pjbs.ridiansyah.dev/v1/kendaraan/Pemesanan?id="+id_pemesanan,
            "method": "GET",
            "headers": {
                "accept": "application/json",
                "Access-Control-Allow-Origin": "*"
            }
        }

        $.ajax(settings2).done(function(result) {
            var data = result.pemesanan;

            var str = data.berangkat;
            var ret = str.split(" ");
            var tgl_ber = new Date(ret[0]).toString('d-M-yyyy')
            var waktu_ber = ret[1];

            var stt = data.kembali;
            var rte = stt.split(" ");
            var tgl_kem = new Date(rte[0]).toString('d-M-yyyy')
            var waktu_kem = rte[1];

            var srr = data.created_at;
            var ree = srr.split(" ");
            var tgl_ca = new Date(ree[0]).toString('d-M-yyyy')
            var waktu_ca = ree[1];

            $('div.pemesanan').append('<div class="disetujui-pemesanan"> <div class="text-head"> <h3>User ID.'+data.user_id+'</h3> </div> <div class="detail-pengajuan"> <div class="detail-waktu-pemesanan"> <div class="img-jam"> <img src="'+baseurl+'assets/img/icons/jam_coklat.png" alt=""> </div> <div class="text-detail-pengajuan"> <p>diajukan pada '+tgl_ca+'</p> </div> </div> <div class="detail-lokasi-pemesanan ml-auto"> <div class="detail-waktu-pemesanan"> <div class="img-jam"> <img src="'+baseurl+'assets/img/icons/lokasi_coklat.png" alt=""> </div> <div class="text-detail-pengajuan"> <p>'+data.tujuan[0].lokasi+' ke '+data.tujuan[1].lokasi+'</p> </div> </div> <div class="detail-waktu-pemesanan"> <div class="img-jam"> <img src="'+baseurl+'assets/img/icons/penumpang.png" alt=""> </div> <div class="text-detail-pengajuan"> <p>4</p> </div> </div> </div> </div> <div class="detail-waktu"> <div class="span"> <span></span> <span></span> <span></span> </div> <div class="flex-column"> <div class="waktu-BerangkatKembali"> <span> <h4>'+waktu_ber+'</h4> <p>WIB</p> </span> <span> <h5>'+tgl_ber+'</h5> </span> </div> <div class="waktu-BerangkatKembali"> <span> <h4>'+waktu_kem+'</h4> <p>WIB</p> </span> <span> <h5>'+tgl_kem+'</h5> </span> </div> </div> </div> <div class="content-pemesanan"> <div> <h2>Status Dinas</h2> <p>'+data.status_dinas+'</p> </div> <div> <h2>Keperluan</h2> <p>'+data.keperluan+'</p> </div> <div> <h2>Catatan Manajer</h2> <p>'+data.catatan_manajer+'</p> </div> <div> <h2>Catatan Admin</h2> <p>'+data.catatan_admin+'</p> </div> </div> </div> <div class="catatan"> <div class="form-row"> <div class="form-group col-md-12"> <label for="namaPolisi">Catatan</label> </div> <div class="form-group col-md-12"> <textarea id="catatan" cols="79" rows="5"></textarea> </div> </div> </div> <div class="m-l-554" style="float: left;margin: 0px;"> <a onclick="persetujuan('+id_pemesanan+', '+id_supir+')"> <button style="width: 200px;width: 400px;" class=" btn btn-primary ml-auto" type="submit">Konfirmasi Pengajuan</button> </a> <a href="'+baseurl+'ModulKendaraan/pilihSupir/'+id_pemesanan+'"> <button class="btn btn-primary ml-auto" style="background-color:white;color:black;width:230px;margin-left:10px;">Batal</button></a></div>');
            });

        function persetujuan(id,supir) {
            
            $('#mdlHarapTunggu').modal('show')
            var catatan_admin = $('#catatan').val()
            var id_pemesanan = id;
            var supir = supir;
            var peran = 'admin';

            const dataSend2 = {
                    id:id_pemesanan,
                    role:peran,
                    catatan:catatan_admin,
                    sopir_id:supir
            };

            axios({
                  method: 'PUT',
                  url: 'https://pjbs.ridiansyah.dev/v1/kendaraan/pemesanan/persetujuan',
                  data: dataSend2
                }).then( result => {
                    $('#mdlHarapTunggu').modal('hide');
                    $('#mdlBerhasil').modal('show');
                    window.location.reload()
                }).catch(error => console.log(error));
        }



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