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
                <div class="card border-0 w-100" >
                    <div class="row">
                        <div class="col-8">
                            <div class="track-sopir1" style="height: 100%">
                                <div class="img-full">
                                    <!-- Tempat Peta -->

                                    <a href="">
                                        <img src="<?= base_url('')?>assets/img/icons/full-screen.png" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 px-3 py-5 beri-rating">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN -->

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
    <input type="hidden" value="<?= $id ?>" id="id">
        <!-- END MODAL -->
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="<?= base_url()?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url()?>assets/js/script.js"></script>
    <script type="text/javascript">
                var baseurl = "<?= base_url() ?>"
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

            $('.beri-rating').append('<div class="sopir-track"> <div class="profil"> <div class="img-profil1"> <img src="'+baseurl+'assets/img/icons/testimonial-02.png" alt=""> </div> <div class="text-profil"> <h4>'+data.sopir[0].nama+'</h4> <h4>'+data.sopir[0].nid+'</h4> </div> </div> <div class="tujuan"> <div class="pengguna-tujuan"> <h4>Pengguna</h4> <h4>User ID.'+data.user_id+'</h4> </div> <div class="pengguna-tujuan"> <h4>Tujuan</h4> <h4>'+data.tujuan[0].lokasi+' ke '+data.tujuan[0].lokasi+'</h4> </div> </div> <div class="waktu"> <div class="span"> <span></span> <span></span> <span></span> </div> <div class="flex-column"> <div class="waktu-BerangkatKembali"> <span> <h4>'+waktu_ber+'</h4> <p>WIB</p> </span> <span> <h5>'+tgl_ber+'</h5> </span> </div> <div class="waktu-BerangkatKembali"> <span> <h4>'+waktu_kem+'</h4> <p>WIB</p> </span> <span> <h5>'+tgl_kem+'</h5> </span> </div> </div> </div> <div class="line-coklat"></div> <form action=""> <div class="penilaian-komentar"> <div class="penilaian"> <p>Penilaian</p> <div class="papanrating"> <button onclick="beriRating(1)" class="btn btn-primary" style="width: 50px;height: auto;font-size: 10px;"><b> + 1 </b></button> <button onclick="beriRating(2)" class="btn btn-primary" style="width: 50px;height: auto;font-size: 10px;"><b> + 2 </b></button> <button onclick="beriRating(3)" class="btn btn-primary" style="width: 50px;height: auto;font-size: 10px;"><b> + 3 </b></button> <button onclick="beriRating(4)" class="btn btn-primary" style="width: 50px;height: auto;font-size: 10px;"><b> + 4 </b></button> <button onclick="beriRating(5)" class="btn btn-primary" style="width: 50px;height: auto;font-size: 10px;"><b> + 5 </b></button> <input type="hidden" id="hasilRating" value=""> </div> <div class="jos"> </div> </div> <div class="penilaian my-2"> <p>Komentar</p> <textarea name="komentar" id="komentar" cols="41" rows="5"></textarea> </div> </div> <div class="center-pengguna m-track"> <button class="btn-jos btn btn-primary" onclick="kirimRating('+id+')" type="button">Kirim Penilaian</button> </div> </form> </div>')
           
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