<!-- MAIN -->
        <div class="content">
            <div class="col-12">
            <ul class="nav nav-tabs">
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
                <div class="card border-0 w-100 px-2 py-3" id="link-detail-persetujuan">
                    <div class="container-fluid">                        
                        <div class="row d-flex justify-content-between">
                            <span style="float: left"><h4>Pilih Supir</h4></span>
                            <span class="btn btn-plus py-1 px-2 mb-3 mb-sm-0 bg-white"></span>
                            <div class="filter d-flex flex-row">
                                <select style="width: 100px;margin-right: 10px;border-radius:50px;border: 1px solid #014188" class="form-control">
                                    <option value=""> Sort </option>
                                    <option value=""> Jumlah Pesanan (Tertinggi -  Terendah) </option>
                                    <option value=""> Jumlah Pesanan (Terendah -  Tertinggi) </option>
                                    <option value=""> Durasi Pesanan (Tertinggi -  Terendah) </option>
                                    <option value=""> Durasi Pesanan (Terendah -  Tertinggi) </option>
                                </select>
                                <form class="ml-4">
                                    <div class="input-group input-group--custom"> <input type="text" class="form-control" placeholder="Cari..." />
                                        <div class="input-group-append--custom"> <button class="btn btn-primary" type="button">
                                            <img src=<?php echo base_url("assets/img/icons/search_putih.png")?> class="topbar__search-icn"/>
                                        </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    <section class="table-responnsive mt-4">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">NID</th>
                                    <th scope="col">Nama Sopir</th>
                                    <th scope="col">Rekam Jejak Sopir</th>
                                    <th scope="col">Nomor Polisi</th>
                                    <th scope="col">Rating</th>
                                    <th scope="col">Aksi</th>
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

        <!-- Modal Lihat Persetujuan -->
        <div class="modal fade" id="modalLihatPersetujuan" tabindex="-1" aria-labelledby="modalAddLihatLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content py-4 px-5 border-0">
                    <h3 class="modal-title px-3" id="modalAddLabel">
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
                                        <div>
                                            <h4>Catatan Manajer</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, dolore id. Tempore laborum voluptatum esse corporis libero. Quaerat, tempora at? Ab repellat quo quae dicta eveniet ullam dolore modi praesentium.</p>
                                        </div>
                                        <div>
                                            <h4>Catatan Admin</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, dolore id. Tempore laborum voluptatum esse corporis libero. Quaerat, tempora at? Ab repellat quo quae dicta eveniet ullam dolore modi praesentium.</p>
                                        </div>
                                    </div>
                                </div>
                    </div>
                    <div class="px-3">
                        <a href=<?php echo base_url("ModulKendaraan/DetailSopir")?> class="btn btn-submit">
                            Setujui
                        </a>
                        <button type="button" class="btn btn-cancel" data-dismiss="modal" data-toggle="modal" data-target="#modalSuntingPersetujuan">Tolak</button>
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
    <input type="hidden" id="id" value="<?= $id ?>">
        <!-- END MODAL -->
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="<?=base_url('')?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url('')?>assets/js/script.js"></script>
    <script type="text/javascript">

        var baseurl = "<?= base_url() ?>";
        var id = $('#id').val();
        $('#loading').html("<center><img id='loading4' style='width:500px ;margin-top: 2%;' src='"+baseurl+"/assets/img/gif/loading4.gif'/><br /></center><br />")

        var settings = {
            'cache': false,
            'dataType': "jsonp",
            "async": true,
            "crossDomain": true,
            "url": "https://pjbs.ridiansyah.dev/v1/kendaraan/sopir/rekomendasi?id="+id,
            "method": "GET",
            "headers": {
                "accept": "application/json",
                "Access-Control-Allow-Origin": "*"
            }
        }

        $.ajax(settings).done(function(result) {
            $('#loading4').remove();
            var data = result.sopir;
            $.each(data, function(i, item) {
            var bintang = '<td class="d-flex mx-1"><div class="img-bintang-table"><img src="'+baseurl+'assets/img/icons/bintang.png" alt=""></div><div class="img-bintang-table"><img src="'+baseurl+'assets/img/icons/bintang.png" alt=""></div><div class="img-bintang-table"><img src="'+baseurl+'assets/img/icons/bintang.png" alt=""></div><div class="img-bintang-table"><img src="'+baseurl+'assets/img/icons/bintang.png" alt=""></div><div class="img-bintang-table"><img src="'+baseurl+'assets/img/icons/bintang.png" alt=""></div></td> <td><a href="'+baseurl+'ModulKendaraan/PemesananDisetujui/'+id+'/'+item.id+'"><div class="table-centang mx-1 bg-v-blue"><span></span><span></span></div></a></td>'

                $('#isi-tabel').append('<tr> <td>'+item.nid+'</td> <td>'+item.nama+'</td> <td>'+item.nama_kendaraan+'</td> <td>'+item.nopol+'</td>'+bintang+'</tr>');
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