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
                <div class="card border-0 w-100" style="margin-bottom:100px;">
                    <div class="row">
                        <div class="col-8">
                            <div class="track-sopir" style="height: 100%">
                                <div class="img-full">
                                    <!-- Tempat Peta -->

                                    <a href="track-zoom.html">
                                        <img src="<?= base_url('')?>assets/img/icons/full-screen.png" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 px-3 py-5 track-pesan">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <input type="hidden" id="id" value="<?= $id?>">
        <!-- END MAIN -->
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="<?= base_url()?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url()?>assets/js/script.js"></script>
    <script type="text/javascript">
        var baseurl = "<?= base_url() ?>"

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

        var id = $('#id').val();
        
        var settings2 = {
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

        $.ajax(settings2).done(function(result) {
            // console.log(result)
            var data = result.pemesanan;
            // console.log(data.id)
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

            $('.track-pesan').append('<div class="sopir-track"> <div class="profil"> <div class="img-profil"> <img src="'+baseurl+'assets/img/icons/testimonial-02.png" alt=""> </div> <div class="text-profil"> <h4>'+data.sopir[0].nama+'</h4> <h4 style="color: rgba(1, 65, 136, 0.7)">'+data.sopir[0].nid+'</h4> <img style="position: absolute;width: 100%;position: relative;width: 15px;color: blue;" src="'+baseurl+'assets/img/icons/telp-blue.png" alt="">&nbsp;&nbsp;<span style="color: #014188"><b>'+data.sopir[0].nohp+'</b></span> <br/> <span class="bg-warning" style="color: white;font-size: 14px;padding:2px 22px;border-radius: 5px;"><b>'+data.status_pemesanan+'</b></span> </div> </div> <div class="tujuan"> <div class="pengguna-tujuan"> <h4>Pengguna</h4> <h4>User ID.'+data.user_id+'<h4> </div> <div class="pengguna-tujuan"> <h4>Tujuan</h4> <h4>'+data.tujuan[0].lokasi+' ke '+data.tujuan[1].lokasi+'</h4> </div> </div> <div class="waktu"> <div class="span"> <span></span> <span></span> <span></span> </div> <div class="flex-column"> <div class="waktu-BerangkatKembali"> <span> <h4>'+waktu_ber+'</h4> <p>WIB</p> </span> <span> <h5>'+tgl_ber+'</h5> </span> </div> <div class="waktu-BerangkatKembali"> <span> <h4>'+waktu_kem+'</h4> <p>WIB</p> </span> <span> <h5>'+tgl_kem+'</h5> </span> </div> </div> </div> <div class="flex-column"> <button type="button" class="bg-primary" style="color: white;font-size: 14px;padding:2px 22px;border-radius: 5px;border-color: white"><b> + Tambah Tujuan</b></button> <a href="'+baseurl+'ModulKendaraanUser/RatingPemesanan/'+data.id+'"> <button type="button" class="bg-danger" style="color: white;font-size: 14px;padding:2px 22px;border-radius: 5px;border-color: white"><b> Beri Rating </b></button> </a> </div> </div>')
           
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
        window.setInterval(update, 1000);
    </script>
</body>

</html>