<!-- MAIN -->
        <div class="content">
            <div class="col-12" style="margin-bottom: 100px">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link text-center active" href="<?php echo base_url("ModulKendaraan")?>">Kendaraan</a>
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
                        <a class="nav-link text-center" href="<?php echo base_url("ModulKendaraan/Riwayat") ?>">Riwayat</a>
                    </li>
                </ul>
                <div class="card border-0 w-100 px-2 py-3" id="link-detail">
                    <div class="container-fluid">
                        <div class="row d-flex justify-content-between">
                            <button class="btn btn-plus py-1 px-2 mb-3 mb-sm-0" data-toggle="modal" data-target="#modalAdd">+ Tambah Kendaraan</button>
                            <div class="filter d-flex flex-row"> <button class="btn btn-filter py-1 px-3 d-flex flex-row" data-toggle="collapse" data-target="#collapseExample"><img src="<?php echo base_url("assets/img/icons/filter_biru.png")?>"          alt="Filter"          class="img-fluid mr-2"        />        <span>Filter</span>      </button>
                                    <form class="ml-4">
                                        <div class="input-group input-group--custom"> <input type="text" class="form-control" id="formPencarian" placeholder="Cari Nama/Nopol..." />
                                            <div class="input-group-append--custom"> <button class="btn btn-primary" id="btnPencarian" type="button"><img src="<?php echo base_url("assets/img/icons/search_putih.png")?>" class="topbar__search-icn"/></button> </div>
                                        </div>
                                    </form>
                                </div>
                        </div>
                        <div class="collapse" id="collapseExample">
                                <div class="list-filter p-800">
                                        <p style="margin-left: 20%;margin-top: 5px;margin-right: 10px;">Status</p>

                                    <div class="list mx-2">
                                        <button id="btnFilterAktif" class="btn btn-filter py-1 px-3 d-flex flex-row"><span><i>Aktif</i></span></button>

                                    </div>
                                    <div class="list mx-2">
                                        <button id="btnFilterNonAktif" class="btn btn-filter py-1 px-3 d-flex flex-row"><span><i>Non Aktif</i></span></button>
                                    </div>
                                   
                                </div>
                            </div>
                    </div>
                    <section class="table-responnsive mt-4">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col"><button class="btn btn-minus">&minus;</button></th>
                                    <th scope="col">Nomor Polisi</th>
                                    <th scope="col">Nama Kendaraan</th>
                                    <th scope="col">Tipe Kendaraan</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Tgl Serah Terima</th>
                                </tr>
                            </thead>
                            <tbody id="isi-table">
                                
                            </tbody>
                        </table>
                        <div class="loading"></div>
                        <div class="container-fluid">
                            <div class="row d-flex justify-content-between">
                                 <div data-toggle="collapse" style="margin-left: 87%" data-target="#collapseUnduh" class="tombol-unduh">
                                     <a class="img-unduh">
                                         <img src="<?php echo base_url("assets/img/icons/unduh.png")?> "alt="">
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
        <!-- END MAIN -->

        <!-- Form Modal Hapus, Sunting, Lihat -->
        <div id="modal-click">

        </div>
        <!-- END -->

        <!-- MODAL -->
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

        <!-- Modal Add Kendaraan -->
        <div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="modalAddLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content py-4 px-5 border-0">
                    <h3 class="modal-title px-3" id="modalAddLabel">
                        Tambah Kendaraan
                    </h3>
                    <div class="modal-body">
                        <form action="">
                            <div class="form-row my-2">
                                <div class="form-group col-md-6">
                                    <label for="namaPolisi">Nomor Polisi <span style="color:red;font-size: 12px;">*nomor polisi tidak boleh sama</span></label>
                                    <input type="text" class="form-control" id="nomorPolisi" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Lokasi</label>
                                    <input type="text" class="form-control" id="lokasi" />
                                </div>
                            </div>
                            <div class="form-row my-2">
                                <div class="form-group col-md-6">
                                    <label for="namaKendaraan">Nama Kendaraan</label>
                                    <input type="text" class="form-control" id="namaKendaraan" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="tglSerah">Tgl Serah Terima</label>
                                    <input type="date" class="form-control" id="tglSerah" />
                                </div>
                            </div>
                            <div class="form-row my-2">
                                <div class="form-group col-md-6">
                                    <label for="namaKendaraan">Tipe Kendaraan</label>
                                    <input type="text" class="form-control" id="tipekendaraan" />
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="px-3">
                        <button type="button" id="btnSubmitBuatKendaraan" class="btn btn-submit">
                            Tambah Kendaraan
                        </button>
                        <button type="button" class="btn btn-cancel" data-dismiss="modal">Batal</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Notifikasi Submit Persetujuan --> 
        <div class="modal fade" id="mdlSuksesKendaraan" tabindex="-1" aria-labelledby="modalAddLihatLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content py-4 px-5 border-0">
                    <div class="modal-body" style="margin-top: 20px;margin-bottom: 20px;">
                        <div><center><img src="<?= base_url('')?>assets/img/icons/ctg_notif.PNG"></center></div>
                        <center><span><p style="color:#014188;font-weight: bold;">Data Kendaraan Ditambahkan!</p></span></center>
                        <center><span><p style="">Data kendaraan Anda <br/>sudah ditambahkan</p></span></center>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="mdlHapusBerhasil" tabindex="-1" aria-labelledby="mdlHapusBerhasil" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content py-4 px-5 border-0">
                    <div class="modal-body" style="margin-top: 20px;margin-bottom: 20px;">
                        <div><center><img src="<?= base_url('')?>assets/img/icons/ctg_notif.PNG"></center></div>
                        <center><span><p style="color:#014188;font-weight: bold;">Data Kendaraan Dihapus!</p></span></center>
                        <center><span><p style="">Data kendaraan Anda <br/>berhasil dihapus!</p></span></center>
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

        <!-- Modal Sunting Kendaraan -->
        <div class="modal fade" id="modalSuntingKendaraan" tabindex="-1" aria-labelledby="modalAddSuntingLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content py-4 px-5 border-0">
                    <h3 class="modal-title px-3" id="modalAddLabel">
                        Sunting Kendaraan
                    </h3>
                    <div class="modal-body-sunting">
                            
                    </div>
                    <div class="px-3">
                        <button type="button" class="btn btn-submit" id="btnDoSuntingKendaraan">
                            Sunting Kendaraan
                        </button>
                        <button type="button" class="btn btn-cancel" data-dismiss="modal">Batal</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Lihat Kendaraan -->
        <div class="modal fade" id="modalLihatKendaraan" tabindex="-1" aria-labelledby="modalAddLihatLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content py-4 px-5 border-0">
                    <h3 class="modal-title px-3" id="modalAddLabel">
                        Detail Kendaraan
                    </h3>
                    <div class="modal-body-kendaraan">
                            
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Hapus -->
        <div class="modal fade" id="multiHapus" tabindex="-1" aria-labelledby="modalAddLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content py-4 px-5 border-0">
                    <div class="modal-body-hapus">
                        <div class="pilihan">
                            <p>Hapus Data?</p>
                        </div>
                        <form action="">
                            <div class="form-row center">
                                <div class="form-group mx-1">
                                    <button type="button" class="btn btn-primary px-4 px-1" id="btnHapusKendaraan">Hapus</button>
                                </div>
                                <div class="form-group mx-1">
                                    <button type="button" class="btn btn-outline-primary px-4 px-1" data-dismiss="modal">Batal</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- END MODAL -->
    </main>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src=<?php echo base_url("assets/js/bootstrap.bundle.min.js")?>></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/plugins/datejs/build/date.js')?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/plugins/datejs/build/date-id-ID.js')?>"></script>
    <script>


// ----------------------------------- FIRST STEP VIEW KENDARAAN ------------------------//
        var baseurl = "<?= base_url() ?>";

        $('.loading').html("<center><img id='loading4' style='width:500px ;margin-top: 2%;' src='"+baseurl+"/assets/img/gif/loading4.gif'/><br /></center><br />")
        var settings = {
            'cache': false,
            'dataType': "jsonp",
            "async": true,
            "crossDomain": true,
            "url": "https://pjbs.ridiansyah.dev/v1/kendaraan/kendaraan",
            "method": "GET",
            "headers": {
                "accept": "application/json",
                "Access-Control-Allow-Origin": "*"
            }
        }

        $.ajax(settings).done(function(result) {
            $('#loading4').remove();
            var data = result.kendaraan;
            $.each(data, function(i, item) {
                var date = item.tgl_serahterima;
                var tgl = new Date(date).toString('d-M-yyyy')   
                var status = '';
                if (item.status == "Nonaktif"){
                    status = '<td><span class="nonaktif">' + item.status + '</span></td>';
                }else{
                    status = '<td><span class="aktif">' + item.status + '</span></td>';
                }
                $('#isi-table').append('<tr><td class="check" data-toggle="collapse" data-target="#multiCollapseExample' + i + '"><div class="checkbox"><input name="checkboxnama[]" type="checkbox" id="checkbox' + i + '" aria-label="Checkbox for following text input" /><label for="checkbox' + i + '"></label></div></td><td>' + item.nopol + '</td><td>' + item.nama + '</td><td>' + item.tipe + '</td>' +status+ '<td>' +  tgl  + '</td></tr>');
                if ( (Number(i)+Number(1)) == '1' ){
                $('#modal-click').append('<div class="from-modal collapse" id="multiCollapseExample' + i + '"><div class="row"><div class="tanda-close"> <span></span> <span></span> </div>  <div class="text-from"><h4>'+ (Number(i)+ Number(1)) +' data terpilih</h4>  </div>  <a onclick="lihatKendaraan('+item.id+')"><div class="from lihat"><span class="img-from"><img src="'+baseurl+'assets/img/icons/lihat.png" alt=""></span>     <h4>Lihat</h4></div></a>  <a onclick="suntingKendaraan('+item.id+')"><div class="from sunting"><span class="img-from"><img src=<?php echo base_url("assets/img/icons/edit.png")?> alt=""></span>       <h4>Sunting</h4> </div></a> <a onclick="hapusKendaraan('+item.id+')"><div class="from hapus"><span class="img-from"><img src=<?php echo base_url("assets/img/icons/hapus.png")?> alt=""></span> <h4>Hapus</h4>  </div></a>  </div> </div>');
                    }else{
                    $('#modal-click').append('<div class="from-modal collapse" id="multiCollapseExample' + i + '"><div class="row"><div class="tanda-close"> <span></span> <span></span> </div>  <div class="text-from"><h4>'+ (Number(i)+ Number(1)) +' data terpilih</h4>  </div> <a onclick="hapusKendaraan('+item.id+')"><div class="from hapus"><span class="img-from"><img src=<?php echo base_url("assets/img/icons/hapus.png")?> alt=""></span>     <h4>Hapus</h4>  </div></a>  </div> </div>');       
                    }
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
// ------------------------------------------------ TAMBAH KENDARAAN -----------------------------------------------------//

        $('#btnSubmitBuatKendaraan').click(function(th) {

        $('#mdlHarapTunggu').modal('show');

        var nomorpolisi = $('#nomorPolisi').val()
        var namakendaraan = $('#namaKendaraan').val();
        var tipekendaraan= $('#tipekendaraan').val();
        var lokasi= $('#lokasi').val();
        var tglserah= $('#tglSerah').val();
        

        const dataSend = {
                nopol : nomorpolisi,
                nama_kendaraan : namakendaraan,
                tipe_kendaraan : tipekendaraan,
                lokasi :lokasi,
                tgl_serahterima:tglserah,
        };

        axios({
              method: 'POST',
              url: 'https://pjbs.ridiansyah.dev/v1/kendaraan/kendaraan/create',
              data: dataSend
            }).then( result => {
                $('#mdlHarapTunggu').modal('hide');
                $('#mdlSuksesKendaraan').modal('show');
            }).catch(error => console.log(error));
        })

// -------------------------------------------------- VIEW KENDARAAN BY ID --------------------------------------------------//

        function lihatKendaraan(id) {

             var settings = {
            'cache': false,
            'dataType': "jsonp",
            "async": true,
            "crossDomain": true,
            "url": "https://pjbs.ridiansyah.dev/v1/kendaraan/kendaraan?id="+id,
            "method": "GET",
            "headers": {
                "accept": "application/json",
                "Access-Control-Allow-Origin": "*"
                }
            }

            $.ajax(settings).done(function(result) {
            var data = result.kendaraan;
            $('#modalLihatKendaraan').modal('show')
            $('.modal-body-kendaraan').append('<div class="form-row my-2"> <div class="form-group col-md-6"> <label for="namaPolisi">Nama Kendaraan</label> <h5>'+data.nama+'</h5> </div> <div class="form-group col-md-6"> <label for="inputPassword4">Tipe Kendaraan</label> <h5>'+data.tipe+'</h5> </div> </div> <div class="form-row my-2"> <div class="form-group col-md-6"> <label for="namaKendaraan">Nomer Polisi</label> <h5>'+data.nopol+'</h5> </div> <div class="form-group col-md-6"> <label for="tglSerah">Lokasi</label> <h5>'+data.lokasi+'</h5> </div><div class="form-group col-md-6"> <label for="tglSerah">Tanggal Serah Terima</label> <h5>'+data.tgl_serahterima+'</h5> </div> </div>')
            })
        }
// ---------------------------------------------------SUNTING KENDARAAN ------------------------------------------------------//
            
        function suntingKendaraan(id) {

             var settings = {
            'cache': false,
            'dataType': "jsonp",
            "async": true,
            "crossDomain": true,
            "url": "https://pjbs.ridiansyah.dev/v1/kendaraan/kendaraan?id="+id,
            "method": "GET",
            "headers": {
                "accept": "application/json",
                "Access-Control-Allow-Origin": "*"
                }
            }

            $.ajax(settings).done(function(result) {
            var data = result.kendaraan;
            $('#modalSuntingKendaraan').modal('show')
            $('.modal-body-sunting').append('<input type="hidden" id="idkendaraan" value="'+id+'"><div class="form-row my-2"> <div class="form-group col-md-6"> <label for="namaPolisi">Nomor Polisi</label> <input type="text" value="'+data.nopol+'" class="form-control" id="nomorpolisi" /> </div> <div class="form-group col-md-6"> <label for="tglSerah">Tipe Kendaraan</label> <input type="text" value="'+data.tipe+'" class="form-control" id="tipekendaraann" /> </div> </div> <div class="form-row my-2"> <div class="form-group col-md-6"> <label for="namaKendaraan">Nama Kendaraan</label> <input type="text" value="'+data.nama+'" class="form-control" id="namakkendaraan" /> </div> <div class="form-group col-md-6"> <label for="tglSerah">Tgl Serah Terima</label> <input type="date" value="'+data.tgl_serahterima+'" class="form-control" id="tglserahh" /> </div> </div> <div class="form-row my-2"> <div class="form-group col-md-6"> <label for="lokasi">Lokasi</label> <input type="text" value="'+data.lokasi+'" class="form-control" id="lokasii" /> </div> </div>')
            })
        }
// ------------------------------------------------------ DO SUNTING KENDARAAN ---------------------------------------------- //
        
        $('#btnDoSuntingKendaraan').click(function(th) {

        $('#modalSuntingKendaraan').modal('hide')
        $('#mdlHarapTunggu').modal('show');

        var nomorpolisi = $('#nomorpolisi').val()
        var namakendaraann = $('#namakkendaraan').val();
        var tipekendaraann= $('#tipekendaraann').val();
        var lokasii= $('#lokasii').val();
        var tglserahh= $('#tglserahh').val();
        var id_kendaraan = $('#idkendaraan').val();
        

        const dataSend2 = {
                nopol: nomorpolisi,
                nama_kendaraan : namakendaraann,
                tipe_kendaraan : tipekendaraann,
                lokasi :lokasii,
                tgl_serahterima:tglserahh,
                id:id_kendaraan
        };

        axios({
              method: 'PUT',
              url: 'https://pjbs.ridiansyah.dev/v1/kendaraan/kendaraan/update',
              data: dataSend2
            }).then( result => {
                $('#mdlHarapTunggu').modal('hide');
                $('#mdlSuksesKendaraan').modal('show');
                window.location.reload()
            }).catch(error => console.log(error));
        })

// ----------------------------------------------------------HAPUS KENDARAAN ---------------------------------------------------//
         function hapusKendaraan(id) {
            $('#multiHapus').modal('show');
            $('.modal-body-hapus').append('<input type="hidden" id="idhapus" value="'+id+'">')
         }

         $('#btnHapusKendaraan').click(function() {
            $('#multiHapus').modal('hide');
            $('#mdlHarapTunggu').modal('show');
            var id = $('#idhapus').val();
            axios({
              method: 'DELETE',
              url: 'https://pjbs.ridiansyah.dev/v1/kendaraan/kendaraan/delete/id/'+id,
            }).then( result => {
                $('#mdlHarapTunggu').modal('hide');
                $('#mdlHapusBerhasil').modal('show');
                window.location.reload()
            }).catch(error => console.log(error));
        })

// --------------------------------------------------------------- FILTER -----------------------------------------------------//

        $('#btnFilterAktif').click(function(th) {
                $('#isi-table').html('')

                var baseurl = "<?= base_url() ?>";

                $('.loading').html("<center><img id='loading4' style='width:500px ;margin-top: 2%;' src='"+baseurl+"/assets/img/gif/loading4.gif'/><br /></center><br />")

                var settings = {
                    'cache': false,
                    'dataType': "jsonp",
                    "async": true,
                    "crossDomain": true,
                    "url": "https://pjbs.ridiansyah.dev/v1/kendaraan/kendaraan?status=Aktif",
                    "method": "GET",
                    "headers": {
                        "accept": "application/json",
                        "Access-Control-Allow-Origin": "*"
                    }
                }

        $.ajax(settings).done(function(result) {
            $('#loading4').remove();
            var data = result.kendaraan;
            $.each(data, function(i, item) {
                var status = '';
                if (item.status == "Nonaktif"){
                    status = '<td><span class="nonaktif">' + item.status + '</span></td>';
                }else{
                    status = '<td><span class="aktif">' + item.status + '</span></td>';
                }
                $('#isi-table').append('<tr><td class="check" data-toggle="collapse" data-target="#multiCollapseExample' + i + '"><div class="checkbox"><input name="checkboxnama[]" type="checkbox" id="checkbox' + i + '" aria-label="Checkbox for following text input" /><label for="checkbox' + i + '"></label></div></td><td>' + item.nopol + '</td><td>' + item.nama + '</td><td>' + item.tipe + '</td>' +status+ '<td>' + item.tgl_serahterima + '</td></tr>');
                if ( (Number(i)+Number(1)) == '1' ){
                $('#modal-click').append('<div class="from-modal collapse" id="multiCollapseExample' + i + '"><div class="row"><div class="tanda-close"> <span></span> <span></span> </div>  <div class="text-from"><h4>'+ (Number(i)+ Number(1)) +' data terpilih</h4>  </div>  <a onclick="lihatKendaraan('+item.id+')"><div class="from lihat"><span class="img-from"><img src="'+baseurl+'assets/img/icons/lihat.png" alt=""></span>     <h4>Lihat</h4></div></a>  <a onclick="suntingKendaraan('+item.id+')"><div class="from sunting"><span class="img-from"><img src=<?php echo base_url("assets/img/icons/edit.png")?> alt=""></span>       <h4>Sunting</h4> </div></a> <a onclick="hapusKendaraan('+item.id+')"><div class="from hapus"><span class="img-from"><img src=<?php echo base_url("assets/img/icons/hapus.png")?> alt=""></span>     <h4>Hapus</h4>  </div></a>  </div> </div>');
                    }else{
                    $('#modal-click').append('<div class="from-modal collapse" id="multiCollapseExample' + i + '"><div class="row"><div class="tanda-close"> <span></span> <span></span> </div>  <div class="text-from"><h4>'+ (Number(i)+ Number(1)) +' data terpilih</h4>  </div> <a onclick="hapusKendaraan('+item.id+')"><div class="from hapus"><span class="img-from"><img src=<?php echo base_url("assets/img/icons/hapus.png")?> alt=""></span>     <h4>Hapus</h4>  </div></a>  </div> </div>');       
                    }
                });
            });
        })

        $('#btnFilterNonAktif').click(function(th) {
                $('#isi-table').html('')

                var baseurl = "<?= base_url() ?>";

                $('.loading').html("<center><img id='loading4' style='width:500px ;margin-top: 2%;' src='"+baseurl+"/assets/img/gif/loading4.gif'/><br /></center><br />")

                var settings = {
                    'cache': false,
                    'dataType': "jsonp",
                    "async": true,
                    "crossDomain": true,
                    "url": "https://pjbs.ridiansyah.dev/v1/kendaraan/kendaraan?status=Nonaktif",
                    "method": "GET",
                    "headers": {
                        "accept": "application/json",
                        "Access-Control-Allow-Origin": "*"
                    }
                }

        $.ajax(settings).done(function(result) {
            $('#loading4').remove();
            var data = result.kendaraan;
            $.each(data, function(i, item) {
                var status = '';
                if (item.status == "Nonaktif"){
                    status = '<td><span class="nonaktif">' + item.status + '</span></td>';
                }else{
                    status = '<td><span class="aktif">' + item.status + '</span></td>';
                }
                $('#isi-table').append('<tr><td class="check" data-toggle="collapse" data-target="#multiCollapseExample' + i + '"><div class="checkbox"><input name="checkboxnama[]" type="checkbox" id="checkbox' + i + '" aria-label="Checkbox for following text input" /><label for="checkbox' + i + '"></label></div></td><td>' + item.nopol + '</td><td>' + item.nama + '</td><td>' + item.tipe + '</td>' +status+ '<td>' + item.tgl_serahterima + '</td></tr>');
                if ( (Number(i)+Number(1)) == '1' ){
                $('#modal-click').append('<div class="from-modal collapse" id="multiCollapseExample' + i + '"><div class="row"><div class="tanda-close"> <span></span> <span></span> </div>  <div class="text-from"><h4>'+ (Number(i)+ Number(1)) +' data terpilih</h4>  </div>  <a onclick="lihatKendaraan('+item.id+')"><div class="from lihat"><span class="img-from"><img src="'+baseurl+'assets/img/icons/lihat.png" alt=""></span>     <h4>Lihat</h4></div></a>  <a onclick="suntingKendaraan('+item.id+')"><div class="from sunting"><span class="img-from"><img src=<?php echo base_url("assets/img/icons/edit.png")?> alt=""></span>       <h4>Sunting</h4> </div></a> <a onclick="hapusKendaraan('+item.id+')"><div class="from hapus"><span class="img-from"><img src=<?php echo base_url("assets/img/icons/hapus.png")?> alt=""></span>     <h4>Hapus</h4>  </div></a>  </div> </div>');
                    }else{
                    $('#modal-click').append('<div class="from-modal collapse" id="multiCollapseExample' + i + '"><div class="row"><div class="tanda-close"> <span></span> <span></span> </div>  <div class="text-from"><h4>'+ (Number(i)+ Number(1)) +' data terpilih</h4>  </div> <a onclick="hapusKendaraan('+item.id+')"><div class="from hapus"><span class="img-from"><img src=<?php echo base_url("assets/img/icons/hapus.png")?> alt=""></span>     <h4>Hapus</h4>  </div></a>  </div> </div>');       
                    }
                });
            });
        })
// ---------------------------------------------------------------PENCARIAN TAB -------------------------------------------------//

        $('#btnPencarian').click(function() {
            var baseurl = "<?= base_url() ?>";
            var param = $('#formPencarian').val();
            $('#isi-table').html('')

            $('.loading').html("<center><img id='loading4' style='width:500px ;margin-top: 2%;' src='"+baseurl+"/assets/img/gif/loading4.gif'/><br /></center><br />")

            var settings = {
                'cache': false,
                'dataType': "jsonp",
                "async": true,
                "crossDomain": true,
                "url": "https://pjbs.ridiansyah.dev/v1/kendaraan/kendaraan?q="+param,
                "method": "GET",
                "headers": {
                    "accept": "application/json",
                    "Access-Control-Allow-Origin": "*"
                }
            }

        $.ajax(settings).done(function(result) {
            $('#loading4').remove();
            var data = result.kendaraan;
            $.each(data, function(i, item) {
                var status = '';
                if (item.status == "Nonaktif"){
                    status = '<td><span class="nonaktif">' + item.status + '</span></td>';
                }else{
                    status = '<td><span class="aktif">' + item.status + '</span></td>';
                }
                $('#isi-table').append('<tr><td class="check" data-toggle="collapse" data-target="#multiCollapseExample' + i + '"><div class="checkbox"><input name="checkboxnama[]" type="checkbox" id="checkbox' + i + '" aria-label="Checkbox for following text input" /><label for="checkbox' + i + '"></label></div></td><td>' + item.nopol + '</td><td>' + item.nama + '</td><td>' + item.tipe + '</td>' +status+ '<td>' + item.tgl_serahterima + '</td></tr>');
                if ( (Number(i)+Number(1)) == '1' ){
                $('#modal-click').append('<div class="from-modal collapse" id="multiCollapseExample' + i + '"><div class="row"><div class="tanda-close"> <span></span> <span></span> </div>  <div class="text-from"><h4>'+ (Number(i)+ Number(1)) +' data terpilih</h4>  </div>  <a onclick="lihatKendaraan('+item.id+')"><div class="from lihat"><span class="img-from"><img src="'+baseurl+'assets/img/icons/lihat.png" alt=""></span>     <h4>Lihat</h4></div></a>  <a onclick="suntingKendaraan('+item.id+')"><div class="from sunting"><span class="img-from"><img src=<?php echo base_url("assets/img/icons/edit.png")?> alt=""></span>       <h4>Sunting</h4> </div></a> <a onclick="hapusKendaraan('+item.id+')"><div class="from hapus"><span class="img-from"><img src=<?php echo base_url("assets/img/icons/hapus.png")?> alt=""></span>     <h4>Hapus</h4>  </div></a>  </div> </div>');
                    }else{
                    $('#modal-click').append('<div class="from-modal collapse" id="multiCollapseExample' + i + '"><div class="row"><div class="tanda-close"> <span></span> <span></span> </div>  <div class="text-from"><h4>'+ (Number(i)+ Number(1)) +' data terpilih</h4>  </div> <a onclick="hapusKendaraan('+item.id+')"><div class="from hapus"><span class="img-from"><img src=<?php echo base_url("assets/img/icons/hapus.png")?> alt=""></span>     <h4>Hapus</h4>  </div></a>  </div> </div>');       
                    }
                });
            });
        })

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