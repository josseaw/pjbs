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
                                        src=<?php echo base_url("assets/img/icons/search_putih.png")?>
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
                                        <img src=<?php echo base_url("assets/img/icons/notifikasi.png")?> class="img-fluid" />
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
                                        <a class="dropdown-item" href="<?= base_url('')?>">Logout</a>
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
                        <a class="nav-link text-center " href="<?php echo base_url("ModulKendaraan")?>">Kendaraan</a>
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
                <div class="card border-0 w-100 px-5 py-3" id="link-detail">
                    <div class="pemesanan-disetujui">
                        <div class="row">
                            <div class="col-12" class="pemesanan-ditolak">
                                
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
    <script type="text/javascript" src="<?= base_url('assets/plugins/datejs/build/date.js')?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/plugins/datejs/build/date-id-ID.js')?>"></script>
    <script type="text/javascript">
        var baseurl = "<?= base_url() ?>";
        var id = $('#id').val();

        var settings2 = {
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

            $('div.pemesanan-ditolak').append('<h4><b>Konfirmasi Penolakan</b></h4> <br/> <div class="disetujui-pemesanan"> <div class="text-head"><h4>User ID. '+data.user_id+'</h4> </div> <div class="detail-pengajuan"> <div class="detail-waktu-pemesanan"> <div class="img-jam"> <img src="'+baseurl+'assets/img/icons/jam_coklat.png" alt=""> </div> <div class="text-detail-pengajuan"> <p>diajukan pada '+tgl_ca+'</p> </div> </div> <div class="detail-lokasi-pemesanan ml-auto"> <div class="detail-waktu-pemesanan"> <div class="img-jam"> <img src="'+baseurl+'assets/img/icons/lokasi_coklat.png" alt=""> </div> <div class="text-detail-pengajuan"> <p>'+data.tujuan[0].lokasi+'</p> </div> </div> <div class="detail-waktu-pemesanan"> <div class="img-jam"> <img src="'+baseurl+'assets/img/icons/penumpang.png" alt=""> </div> <div class="text-detail-pengajuan"> <p>4</p> </div> </div> </div> </div> <div class="detail-waktu"> <div class="span"> <span></span> <span></span> <span></span> </div> <div class="flex-column"> <div class="waktu-BerangkatKembali"> <span> <h4>'+waktu_ber+'</h4> <p>WIB</p> </span> <span> <h5>'+tgl_ber+'</h5> </span> </div> <div class="waktu-BerangkatKembali"> <span> <h4>'+waktu_kem+'</h4> <p>WIB</p> </span> <span> <h5>'+tgl_kem+'</h5> </span> </div> </div> </div> <div class="content-pemesanan"> <div> <h2>Status Dinas</h2> <p>'+data.status_dinas+'</p> </div> <div> <h2>Keperluan</h2> <p>'+data.keperluan+'</p> </div> <div> <h2>Catatan Manajer</h2> <p>'+data.catatan_manajer+'</p> </div> </div> </div> <div class="catatan"> <div class="form-row"> <div class="form-group col-md-12"> <label for="namaPolisi"><h4><b>Catatan</b></h4></label> </div> <div class="form-group col-md-12"> <textarea name="" id="" cols="79" rows="5"></textarea> </div> </div> </div> <div class="m-l-554" style="float: left;margin: 0px;"> <a href="'+baseurl+'ModulKendaraan/Persetujuan"> <button style="width: 200px;width: 400px;" class=" btn btn-primary ml-auto" type="submit">Tolak Pengajuan</button> </a> <a href="'+baseurl+'ModulKendaraan/Persetujuan"> <button class="btn btn-primary ml-auto" style="background-color:white;color:black;width:230px;margin-left:10px;">Batal</button> </a> </div>');
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