<!-- MAIN -->
        <div class="content">
            <div class="col-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link text-center active" href="<?php echo base_url("ModulKendaraan")?>">Kendaraan</a>
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
                <div class="card border-0 w-100 px-2 py-3" id="link-detail-persetujuan">
                    <div class="container-fluid">
                        <div class="row d-flex justify-content-between">
                            <h4>Pilih Sopir</h4>
                            <div class="filter d-flex flex-row">
                                <form class="ml-4">
                                    <div class="input-group input-group--custom"> <input type="text" class="form-control" placeholder="Cari..." />
                                        <div class="input-group-append--custom"> <button class="btn btn-primary" type="button">              <img                src="<?= base_url('')?>assets/img/icons/search_putih.png"                class="topbar__search-icn"              />            </button> </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <section class="table-responnsive mt-3">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col"><button class="btn btn-minus">&minus;</button></th>
                                    <th scope="col">NID</th>
                                    <th scope="col">Nama Sopir</th>
                                    <th scope="col">Rekam Jejak Sopir</th>
                                    <th scope="col">Nomer Polisi</th>
                                    <th scope="col">Rata-rata Penilaian</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="check" data-toggle="collapse" data-target="#multiCollapseExample">
                                        <div class="checkbox"><input type="checkbox" id="checkbox" aria-label="Checkbox for following text input" /><label for="checkbox"></label></div>
                                    </td>
                                    <td>SP000</td>
                                    <td>Delvin Smith</td>
                                    <td>1 Pesanan / 16 Jam</td>
                                    <td>L1184WN</td>
                                    <td class="d-flex mx-1">
                                        <div class="img-bintang-table"><img src="../assets/img/icons/bintang.png" alt=""></div>
                                        <div class="img-bintang-table"><img src="../assets/img/icons/bintang.png" alt=""></div>
                                        <div class="img-bintang-table"><img src="../assets/img/icons/bintang.png" alt=""></div>
                                        <div class="img-bintang-table"><img src="../assets/img/icons/bintang.png" alt=""></div>
                                        <div class="img-bintang-table"><img src="../assets/img/icons/bintang_kosong.png" alt=""></div>
                                    </td>
                                    <td>
                                        <div class="table-centang bg-v-blue"><span></span><span></span></div>
                                    </td>
                                </tr>
                               
                            </tbody>
                        </table>
                        <div class="tombol-unduh" data-toggle="modal" data-target="#modalUnduhPersetujuan"> <span class="img-unduh">                   <img src=<?php echo base_url("assets/img/icons/unduh.png")?> alt="">               </span>
                            <p>Unduh</p>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <!-- END MAIN -->

        <!-- MODAL -->
        <!-- Modal Unduh Persetujuan-->
        <div class="modal fade" id="modalUnduhPersetujuan" tabindex="-1" aria-labelledby="modalAddLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content py-4 px-5 border-0">
                    <div class="modal-body">
                        <form action="">
                            <div class="form-row center">
                                <div class="row">
                                    <div class="form-group mx-1">
                                        <Button type="button" class="btn btn-danger px-4 px-1" data-dismiss="modal">PDF</Button>
                                    </div>
                                    <div class="form-group mx-1">
                                        <Button type="button" class="btn btn-success px-4 px-1" data-dismiss="modal">Excel</Button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
    var baseurl = "<?= base_url() ?>"
        
        var settings = {
            'cache': false,
            'dataType': "jsonp",
            "async": true,
            "crossDomain": true,
            "url": "https://pjbs.ridiansyah.dev/v1/kendaraan/notifikasi/Pemesanan",
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

                if (item.status_pemesanan == 'Disetujui'){
                    status = '<b> Pemesanan Anda disetujui oleh Admin </b>';
                    img_status = '<div class="img-notifikasi bg-white"><img src="'+baseurl+'assets/img/icons/notif_user_biru.png" alt="Disetujui Admin">';
                }else if (item.status_pemesanan == 'Ditolak'){
                    status = '<b> Pemesanan Anda ditolak oleh Admin </b>';
                    img_status = '<div class="img-notifikasi bg-ditolak"><img src="'+baseurl+'assets/img/icons/ditolak.png" alt="Ditolak Admin">';
                }else if (item.status_pemesanan == 'Menunggu'){
                    status = '<b> Pemesanan Anda menunggu persetujuan Admin </b>';
                    img_status = '<div class="img-notifikasi bg-white"><img src="'+baseurl+'assets/img/icons/notif_approval.png" alt="Menunggu Approval Admin">';
                }
                
                $('#isi-notifikasi').append('<a href="#"><div class="list-drop bg-blue-rgba">'+img_status+'</div><div class="content-notifikasi" style="margin-bottom:20px;margin-top:20px;"><p>'+status+'</p><p>'+item.diajukan+' WIB</p></div></div></a>');

                $('#modal-click').append('<div class="from-modal collapse" id="multiCollapseExample' + i + '"><div class="row"><div class="tanda-close"> <span></span> <span></span> </div>  <div class="text-from"><h4>2 data terpilih</h4></div>  <div class="from lihat" data-toggle="modal" data-target="#modalLihatKendaraan"><span class="img-from"><img src="'+baseurl+'assets/img/icons/lihat.png" alt=""></span><h4>Lihat</h4></div>  <div class="from sunting" data-toggle="modal" data-target="#modalSuntingKendaraan"><span class="img-from"><img src="'+baseurl+'assets/img/icons/edit.png" alt=""></span><h4>Sunting</h4></div> <div class="from hapus" data-toggle="modal" data-target="#multiHapus"><span class="img-from"><img src="'+baseurl+'assets/img/icons/hapus.png" alt=""></span><h4>Hapus</h4></div></div></div>');

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