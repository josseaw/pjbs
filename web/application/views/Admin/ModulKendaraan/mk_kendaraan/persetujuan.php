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
                            <span class="btn btn-plus py-1 px-2 mb-3 mb-sm-0 bg-white"></span>
                            <div class="filter d-flex flex-row">
                                <button class="btn btn-filter py-1 px-3 d-flex flex-row">    
                                    <img src=<?php echo base_url("assets/img/icons/filter_biru.png")?> alt="Filter" class="img-fluid mr-2"/>    
                                    <span>Filter</span>
                                </button>
                                <form class="ml-4">
                                    <div class="input-group input-group--custom"> <input type="text" class="form-control" placeholder="Cari..." />
                                        <div class="input-group-append--custom"> <button class="btn btn-primary" type="button">
                                            <img src="<?php echo base_url("assets/img/icons/search_putih.png")?>" class="topbar__search-icn"/>
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
                <div id="riwayat-pemesanan-table">
                    <div class="card border-0 w-100 px-2 py-3 my-4">
                        <div class="container-fluid">
                            <div class="row d-flex justify-content-between">
                                <h4>Riwayat Pemesanan</h4>
                                <div class="filter d-flex flex-row"> <button class="btn btn-filter py-1 px-3 d-flex flex-row" data-toggle="collapse" data-target="#collapseExample"><img src=<?php echo base_url("assets/img/icons/filter_biru.png")?>          alt="Filter"          class="img-fluid mr-2"        />        <span>Filter</span>      </button>
                                    <form class="ml-4">
                                        <div class="input-group input-group--custom"> <input id="formPencarian" type="text" class="form-control" placeholder="Cari..." />
                                            <div class="input-group-append--custom"> <button id="btnPencarian" class="btn btn-primary" type="button"><img src=<?php echo base_url("assets/img/icons/search_putih.png")?> class="topbar__search-icn"/></button> </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="collapse" id="collapseExample">
                                <div class="list-filter p-800">
                                    <div class="list mx-2">
                                        <p>Tahun</p>
                                        <select id="Pilih Status" class="form-control">
                                            <option value="">Status</option>
                                        </select>
                                    </div>
                                    <div class="list mx-2">
                                        <p>Bulan</p>
                                        <select id="Pilih Status" class="form-control">
                                            <option value="">Status</option>
                                        </select>
                                    </div>
                                    <div class="list mx-2">
                                        <p>Status</p>
                                        <select id="Pilih Status" class="form-control">
                                            <option value="">Status</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <section class="table-responnsive mt-3">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col"> <button class="btn btn-minus">&minus;</button> </th>
                                        <th scope="col">Nama Pemesanan</th>
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
                                <tbody id="isi-tabel2">
                                    
                                </tbody>
                            </table>
                            <div id="loading2"></div>
                            <div class="container-fluid">
                            <div class="row d-flex justify-content-between">
                                 <div data-toggle="collapse" style="margin-left: 87%" data-target="#collapseUnduh" class="tombol-unduh">
                                     <a class="img-unduh">
                                         <img src=<?php echo base_url("assets/img/icons/unduh.png")?> alt="">
                                     </a>
                                     <p>Unduh</p>
                                 </div>
                                        
                                 <div class="collapse" style="margin-left: 87%" id="collapseUnduh" >
                                         <div class="tombol-unduh-putih" style="background-color: white;color: #014188;border-color: #014188"> <button type="button" class="btn btn-sm"> <b>Unduh PDF</b></button></div>
                                         <div class="tombol-unduh" style="background-color: #7693af;color: #014188;border-color: #014188"> <button type="button" class="btn btn-sm"> <b>Unduh Excel</b></button></div>
                                 </div>
                            </div>
                        </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN -->

        <!-- MODAL -->

        <!-- Modal Lihat Persetujuan -->
        <div class="modal fade" id="modalLihatPersetujuan" tabindex="-1" aria-labelledby="modalAddLihatLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content py-4 px-5 border-0 persetujuan">
                    
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

        <!-- END MODAL -->
    </main>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="<?= base_url('')?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('')?>assets/js/script.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/plugins/datejs/build/date.js')?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/plugins/datejs/build/date-id-ID.js')?>"></script>
    <script type="text/javascript">

// ----------------------------------- FIRST STEP VIEW PERSETUJUAN UNTUK DIKONFIRMASI ------------------------//
        var baseurl = "<?= base_url() ?>";

        $('#loading').html("<center><img id='loading4' style='width:500px ;margin-top: 2%;' src='"+baseurl+"/assets/img/gif/loading4.gif'/><br /></center><br />")

        var settings = {
            'cache': false,
            'dataType': "jsonp",
            "async": true,
            "crossDomain": true,
            "url": "https://pjbs.ridiansyah.dev/v1/kendaraan/pemesanan/persetujuan?role=admin",
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
            var tgl_ber = new Date(ret[0]).toString('d-M-yyyy') 
            var waktu_ber = ret[1];

            var stt = data.kembali;
            var rte = stt.split(" ");
            var tgl_kem = new Date(rte[0]).toString('d-M-yyyy')  
            var waktu_kem = ret[1];

            var srr = data.created_at;
            var ree = srr.split(" ");
            var tgl_ca = new Date(ree[0]).toString('d-M-yyyy') 
            var waktu_ca = ret[1];

            $('div.persetujuan').append('<h3 class="modal-title px-3" id="modalAddLabel"> Detail </h3> <br/><div class="modal-body-persetujuan"> <div class="disetujui-pemesanan" style="margin-left:20px;"> <div class="text-head"> <h4><b>User ID. '+data.user_id+'</b></h4> </div> <table style="width: 100%;margin-bottom: 20px;"> <tr> <td><img style="width: 20px;" src="'+baseurl+'assets/img/icons/jam_coklat.png" alt=""></td> <td> diajukan pada '+tgl_ca+'</td> <td><img style="width: 25px;" src="'+baseurl+'assets/img/icons/lokasi_coklat.png" alt=""></td> <td><p>'+data.tujuan[0].lokasi+'</p></td> </tr> <tr><td style="padding-top:5px;"><img style="width: 25px;" src="'+baseurl+'assets/img/icons/penumpang.png" alt=""></td> <td style="padding-top:5px;">'+data.jumlah_penumpang+' orang</td><td><img style="width: 25px;" src="'+baseurl+'assets/img/icons/lokasi_coklat.png" alt=""></td> <td> '+data.tujuan[1].lokasi+'</td> </tr><tr> <td><span class="dot"></td> <td colspan="3" style="padding-top:30px;"><span style="font-size: 20px;margin-right: 50px;"><b>'+waktu_ber+' WIB</b></span> '+tgl_ber+'</td> </tr> <tr> <td><div class="vl"></div></td> <td colspan="3"><hr/></td> </tr> <tr> <td><span class="dot"></td> <td style="padding-bottom:30px;" colspan="3"><span style="font-size: 20px;margin-right: 50px;"><b>'+waktu_kem+' WIB </b></span>'+tgl_kem+'</td> </tr> </table> <div class="content-pemesanan"> <div> <h4>Status Dinas</h4> <p>'+data.status_dinas+'</p> </div> <div> <h4>Keperluan</h4> <p>'+data.keperluan+'</p> </div> <div> <h4>Catatan Manajer</h4> <p>'+data.catatan_manajer+'</p> </div> <div> <a href="'+baseurl+'ModulKendaraan/PilihSupir/'+data.id+'" class="btn btn-submit"> Setujui </a> <a href="'+baseurl+'ModulKendaraan/PemesananDitolak/'+data.id+'"> <button type="button" class="btn btn-cancel">Tolak</button> </a> </div>')
        })
    }
//---------------------------------------------------------RIWAYAT---------------------------------------------------//

        $('#loading2').html("<center><img id='loading4' style='width:500px ;margin-top: 2%;' src='"+baseurl+"/assets/img/gif/loading4.gif'/><br /></center><br />")

        var settings = {
            'cache': false,
            'dataType': "jsonp",
            "async": true,
            "crossDomain": true,
            "url": "https://pjbs.ridiansyah.dev/v1/kendaraan/Pemesanan",
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
                var stt = item.created_at;
                var rte = stt.split(" ");
                var tgl_kem = rte[0];
                var waktu_kem = ret[1];

                var status = '';
                if (item.status_pemesanan == 'Disetujui') {
                var status = '<a href="'+baseurl+'ModulKendaraan/track_record_sopir/'+item.id+'" class="aktif-setuju font-weight-bold">'+item.status_pemesanan+'</a>';
                }else if (item.status_pemesanan == 'Ditolak'){
                var status = '<a href="'+baseurl+'ModulKendaraan/track_record_sopir/'+item.id+'" class="aktif font-weight-bold">'+item.status_pemesanan+'</a>';
                }else if (item.status_pemesanan == 'Menunggu'){
                var status = '<a href="'+baseurl+'ModulKendaraan/track_record_sopir/'+item.id+'" class="menunggu font-weight-bold">'+item.status_pemesanan+'</a>';
                }
                $('#isi-tabel2').append('<tr> <td class="check"> <div class="checkbox"> <input type="checkbox" id="checkbox'+i+'" aria-label="Checkbox for following text input" /> <label for="checkbox'+i+'"></label> </div> </td> <td> Supir '+item.nama_sopir+' dipesan oleh ID. '+item.user_id+'</td> <td>'+tgl_ber+'</td> <td>'+waktu_ber+'</td> <td>'+tgl_kem+'</td> <td>'+waktu_kem+'</td> <td>4</td> <td>Dalam kota<br>tugas oprasional</td> <td>'+item.tujuan[0]+' ke '+item.tujuan[1]+'</td><td>'+status+'</td></tr>');
                });
            });         
        
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
//-----------------------------------------------------------PENCARIAN BY FORM --------------------------------------------//
$('#btnPencarian').click(function() {
            $('#isi-tabel2').html('')
            var baseurl = "<?= base_url() ?>";
            var param = $('#formPencarian').val();

            $('#loading2').html("<center><img id='loading4' style='width:500px ;margin-top: 2%;' src='"+baseurl+"/assets/img/gif/loading4.gif'/><br /></center><br />")

            var settings2 = {
                'cache': false,
                'dataType': "jsonp",
                "async": true,
                "crossDomain": true,
                "url": "https://pjbs.ridiansyah.dev/v1/kendaraan/Pemesanan?q="+param,
                "method": "GET",
                "headers": {
                    "accept": "application/json",
                    "Access-Control-Allow-Origin": "*"
                }
            }

            $.ajax(settings2).done(function(result) {
            $('#loading4').remove();
            var data = result.pemesanan;
            $.each(data, function(i, item) {
                var str = item.berangkat;
                var ret = str.split(" ");
                var tgl_ber = ret[0];
                var waktu_ber = ret[1];
                var stt = item.created_at;
                var rte = stt.split(" ");
                var tgl_kem = rte[0];
                var waktu_kem = ret[1];

                var status = '';
                if (item.status_pemesanan == 'Disetujui') {
                var status = '<a href="'+baseurl+'ModulKendaraan/track_record_sopir/'+item.id+'" class="aktif-setuju font-weight-bold">'+item.status_pemesanan+'</a>';
                }else if (item.status_pemesanan == 'Ditolak'){
                var status = '<a href="'+baseurl+'ModulKendaraan/track_record_sopir/'+item.id+'" class="aktif font-weight-bold">'+item.status_pemesanan+'</a>';
                }else if (item.status_pemesanan == 'Menunggu'){
                var status = '<a href="'+baseurl+'ModulKendaraan/track_record_sopir/'+item.id+'" class="menunggu font-weight-bold">'+item.status_pemesanan+'</a>';
                }
                $('#isi-tabel2').append('<tr> <td class="check"> <div class="checkbox"> <input type="checkbox" id="checkbox'+i+'" aria-label="Checkbox for following text input" /> <label for="checkbox'+i+'"></label> </div> </td> <td> Supir '+item.nama_sopir+' dipesan oleh ID. '+item.user_id+'</td> <td>'+tgl_ber+'</td> <td>'+waktu_ber+'</td> <td>'+tgl_kem+'</td> <td>'+waktu_kem+'</td> <td>4</td> <td>Dalam kota<br>tugas oprasional</td> <td>'+item.tujuan[0]+' ke '+item.tujuan[1]+'</td><td>'+status+'</td></tr>');
                });
            });  

        })
// ----------------------------------------------------------JAM OTOMATIS--------------------------------------------------//

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