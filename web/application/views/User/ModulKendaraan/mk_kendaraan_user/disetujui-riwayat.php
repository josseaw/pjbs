<!-- END TOPBAR -->
        <div class="content">
            <div class="col-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link text-center" href="<?= base_url('ModulKendaraanUser')?>">Pesan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center active" href="<?= base_url('ModulKendaraanUser/Riwayat')?>">Riwayat</a>
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
                                        <a href="<?= base_url('ModulKendaraanUser/Riwayat')?>">
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
    <script>
        var baseurl = "<?= base_url() ?>"
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
            // console.log(result)
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

            var btn = '';
            if (data.status_pemesanan == 'Menunggu'){
                btn = '<center> <a href="'+baseurl+'ModulKendaraanUser/Riwayat"> <button style="width: 100px;" class="btn btn-primary btn-sm" type="submit">Batalkan</button> </a> </center>';
            }else if (data.status_pemesanan == 'Ditolak'){
                btn = '<center> <a href="'+baseurl+'ModulKendaraanUser/Riwayat"> <button style="width: 100px;" class="btn btn-primary btn-sm" type="submit">Pesan Ulang</button> </a> </center>';
            }else if (data.status_pemesanan == 'Disetujui'){
                btn = ''
            }
            // console.log(data.id)
            $('.profile').append('<div class="img-pemesanan-profil"><img src="'+baseurl+'assets/img/icons/testimonial-02.png" alt=""></div><div class="text-pemesanan-profil font-weight-bold"><h4><b>'+data.sopir[0].nama+'</b></h4><br/><h4>'+data.sopir[0].nid+'</h4></div><div class="line-coklat"></div><div class="text-pemesanan font-weight-bold"><h4><b>'+data.sopir[0].nama_kendaraan+'</b></h4><br/><h4>'+data.sopir[0].nopol+'</h4></div>');
            $('.detail').append('<div class="text-head"> <div> <h3>User ID.'+data.user_id+'</h3> </div> <div><a href="'+baseurl+'ModulKendaraanUser/PemesananBerlangsung/'+id+'"><span style="position:absolute;right:0;margin-right:5%;" class="bg-success">'+data.status_pemesanan+'</span> </div> </div> <div class="detail-pengajuan"> <div class="detail-lokasi-pemesanan" style="margin-left: 35px;"> <div class="detail-waktu-pemesanan"> <div class="img-jam"> <img src="'+baseurl+'assets/img/icons/jam_coklat.png" alt=""> </div> <div class="text-detail-pengajuan"> <p>diajukan pada '+waktu_ca+'</p> </div> </div> <div class="detail-waktu-pemesanan"> <div class="img-jam"> <img src="'+baseurl+'assets/img/icons/telp.png" alt=""> </div> <div class="text-detail-pengajuan"> <p>'+data.nohp+'</p> </div> </div> </div> <div class="detail-lokasi-pemesanan" style="margin-left: 35px;"> <div class="detail-waktu-pemesanan"> <div class="img-jam"> <img src="'+baseurl+'assets/img/icons/lokasi_coklat.png" alt=""> </div> <div class="text-detail-pengajuan"> <p>'+data.tujuan[0].lokasi+' ke '+data.tujuan[1].lokasi+'</p> </div> </div> <div class="detail-waktu-pemesanan"> <div class="img-jam"> <img src="'+baseurl+'assets/img/icons/penumpang.png" alt=""> </div> <div class="text-detail-pengajuan"> <p>4</p> </div> </div> </div> </div> <div class="detail-waktu"> <div class="span"> <span></span> <span></span> <span></span> </div> <div class="flex-column"> <div class="waktu-BerangkatKembali"> <span> <h4>'+waktu_ber+'</h4> <p>WIB</p> </span> <span> <h5>'+tgl_ber+'</h5> </span> </div> <div class="waktu-BerangkatKembali"> <span> <h4>'+waktu_kem+'</h4> <p>WIB</p> </span> <span> <h5>'+tgl_kem+'</h5> </span> </div> </div> </div><div class="content-pemesanan"><div><h2>Status Dinas</h2><p>'+data.status_dinas+'</p></div><div><h2>Keperluan</h2><p>'+data.keperluan+'</p></div><div><h2>Catatan Manajer</h2><p>'+data.catatan_manajer+'</p></div><div><h2>Catatan Admin</h2><p>'+data.catatan_admin+'</p></div>'+btn+'</div>')
           
        });

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

                if (item.status_pemesanan == 'Disetujui'){
                    href = baseurl+'ModulKendaraanUser/PemesananDisetujui/'+item.pemesanan_id
                    status = '<b> Pemesanan Anda disetujui oleh Admin </b>';
                    img_status = '<div class="img-notifikasi bg-white"><img src="'+baseurl+'assets/img/icons/notif_user_biru.png" alt="Disetujui Admin">';
                }else if (item.status_pemesanan == 'Ditolak'){
                    href = baseurl+'ModulKendaraanUser/PemesananDitolak/'+item.pemesanan_id
                    status = '<b> Pemesanan Anda ditolak oleh Admin </b>';
                    img_status = '<div class="img-notifikasi bg-ditolak"><img src="'+baseurl+'assets/img/icons/ditolak.png" alt="Ditolak Admin">';
                }else if (item.status_pemesanan == 'Menunggu'){
                    href = baseurl+'ModulKendaraanUser/MenungguPemesanan/'+item.pemesanan_id
                    status = '<b> Pemesanan Anda menunggu persetujuan Admin </b>';
                    img_status = '<div class="img-notifikasi bg-white"><img src="'+baseurl+'assets/img/icons/notif_approval.png" alt="Menunggu Approval Admin">';
                }
                
                $('#isi-notifikasi').append('<a href="'+href+'"><div class="list-drop bg-blue-rgba">'+img_status+'</div><div class="content-notifikasi" style="margin-bottom:20px;margin-top:20px;"><p>'+status+'</p><p>'+item.diajukan+' WIB</p></div></div></a>');

                $('#modal-click').append('<div class="from-modal collapse" id="multiCollapseExample' + i + '"><div class="row">   <div class="tanda-close"> <span></span> <span></span> </div>  <div class="text-from">      <h4>2 data terpilih</h4>  </div>  <div class="from lihat" data-toggle="modal" data-target="#modalLihatKendaraan"><span class="img-from"><img src="../assets/img/icons/lihat.png" alt=""></span>     <h4>Lihat</h4></div>  <div class="from sunting" data-toggle="modal" data-target="#modalSuntingKendaraan"><span class="img-from"><img src=<?php echo base_url("assets/img/icons/edit.png")?> alt=""></span>       <h4>Sunting</h4> </div> <div class="from hapus" data-toggle="modal" data-target="#multiHapus"><span class="img-from"><img src=<?php echo base_url("assets/img/icons/hapus.png")?> alt=""></span>     <h4>Hapus</h4>  </div>  </div> </div>');

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