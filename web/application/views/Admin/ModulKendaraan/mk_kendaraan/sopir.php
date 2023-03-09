<!-- MAIN -->
        <div class="content">
            <div class="col-12" style="margin-bottom: 100px;">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link text-center" href="<?php echo base_url("ModulKendaraan")?>">Kendaraan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center active" href="<?php echo base_url("ModulKendaraan/Sopir") ?>">Sopir</a>
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
                            <button class="btn btn-plus py-1 px-2 mb-3 mb-sm-0" id="btnTambahSopir">+ Tambah Sopir</button>
                            <div class="filter d-flex flex-row"> 
                                <select style="width: 100px;margin-right: 10px;border-radius:50px;border: 1px solid #014188" class="form-control">
                                    <option value=""> Sort </option>
                                    <option value=""> Jumlah Pesanan (Tertinggi -  Terendah) </option>
                                    <option value=""> Jumlah Pesanan (Terendah -  Tertinggi) </option>
                                    <option value=""> Durasi Pesanan (Tertinggi -  Terendah) </option>
                                    <option value=""> Durasi Pesanan (Terendah -  Tertinggi) </option>
                                </select>

                                <button class="btn btn-filter py-1 px-3 d-flex flex-row" data-toggle="collapse" data-target="#collapseExample"><img src="<?php echo base_url("assets/img/icons/filter_biru.png")?> "         alt="Filter"          class="img-fluid mr-2"        />        <span>        Filter</span>      </button>
                                    <form class="ml-4">
                                        <div class="input-group input-group--custom"> <input type="text" id="formPencarian" class="form-control" placeholder="Cari..." />
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
                                        <button id="btnNonAktifFilter" class="btn btn-filter py-1 px-3 d-flex flex-row"><span><i>Non Aktif</i></span></button>
                                    </div>
                                   
                                </div>
                        </div>
                    </div>
                    <section class="table-responnsive mt-4">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col"><button class="btn btn-minus">&minus;</button></th>
                                    <th scope="col">NID</th>
                                    <th scope="col">Nama Sopir</th>
                                    <th scope="col">Rekam Jejak Kerja Sopir</th>
                                    <th scope="col">Nomer Polisi</th>
                                    <th scope="col">Rata-rata Penilaian</th>
                                    <th scope="col">Status</th>
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
        <!-- END MAIN -->

        <!-- MODAL -->

        <!-- Form Modal Hapus, Sunting, Lihat -->
        <div id="modal-click">

        </div>

        <!-- Modal Tambah Sopir -->
        <div class="modal fade" id="modalAddSopir" tabindex="-1" aria-labelledby="modalAddLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content py-4 px-5 border-0">
                    <h3 class="modal-title px-3" id="modalAddLabel">
                        Tambah Sopir
                    </h3>
                        <div class="modal-body-add-supir">
                            
                        </div>
                        <div class="px-3">
                            <button type="button" class="btn btn-submit" id="btnSubmitSupir">
                                Tambah Sopir
                            </button>
                        <button type="button" class="btn btn-cancel" data-dismiss="modal">Batal</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Sunting Sopir -->
        <div class="modal fade" id="modalSuntingSopir" tabindex="-1" aria-labelledby="modalAddLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content py-4 px-5 border-0">
                    <h3 class="modal-title px-3" id="modalAddLabel">
                        Sunting Sopir
                    </h3>
                    <div class="modal-body-sunting">

                    </div>
                    <div class="px-3">
                        <button type="button" class="btn btn-submit" data-dismiss="modal">
                Sunting Sopir
              </button>
                        <button type="button" class="btn btn-cancel" data-dismiss="modal">Batal</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Lihat Sopir -->
        <div class="modal fade" id="modalLihatSopir" tabindex="-1" aria-labelledby="modalAddLihatLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content py-4 px-5 border-0">
                    <h3 class="modal-title px-3" id="modalAddLabel">
                        Detail
                    </h3>
                    <div class="modal-body-detail-supir">
                           
                    </div>
                    <div class="px-3">
                        <a href="<?= base_url('ModulKendaraan/riwayatPengantaran')?>" type="button" class="btn btn-submit">
                Lihat Riwayat Pengantaran
                        </a>
                        <button type="button" class="btn btn-cancel" data-dismiss="modal">Tutup</button>
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
                                    <Button type="button" class="btn btn-primary px-4 px-1" id="btnHapusSopir">Hapus</Button>
                                </div>
                                <div class="form-group mx-1">
                                    <Button type="button" class="btn btn-outline-primary px-4 px-1" data-dismiss="modal">Batal</Button>
                                </div>
                            </div>
                        </form>
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

        <!-- END MODAL -->

    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/script.js"></script>
    <script>
// ------------------------------------------------------PAGE ON LOAD-----------------------------------------------------//
        var baseurl = "<?= base_url() ?>"

        $('.loading').html("<center><img id='loading4' style='width:500px ;margin-top: 2%;' src='"+baseurl+"/assets/img/gif/loading4.gif'/><br /></center><br />")

        var settings = {
            'cache': false,
            'dataType': "jsonp",
            "async": true,
            "crossDomain": true,
            "url": "https://pjbs.ridiansyah.dev/v1/kendaraan/sopir",
            "method": "GET",
            "headers": {
                "accept": "application/json",
                "Access-Control-Allow-Origin": "*"
            }
        }

        $.ajax(settings).done(function(resault) {
            $('#loading4').remove();
            var data = resault.sopir;
            $.each(data, function(i, item) {
                var status = '';
                if (item.status == "Nonaktif"){
                    status = '<td><span class="nonaktif">' + item.status + '</span></td>';
                }else{
                    status = '<td><span class="aktif">' + item.status + '</span></td>';
                }
                var th = item.rating
                var rating = ''
                if (th == '1') {
                    rating = '<div class="img-bintang-table"><img src="<?= base_url()?>assets/img/icons/bintang.png" alt=""></div><div class="img-bintang-table"><img src="<?= base_url()?>assets/img/icons/bintang_kosong.png" alt=""></div><div class="img-bintang-table"><img src="<?= base_url()?>assets/img/icons/bintang_kosong.png" alt=""></div><div class="img-bintang-table"><img src="<?= base_url()?>assets/img/icons/bintang_kosong.png" alt=""></div><div class="img-bintang-table"><img src="<?= base_url()?>assets/img/icons/bintang_kosong.png" alt=""></div>'
                }else if(th == '2'){
                        rating = '<div class="img-bintang-table"><img src="<?= base_url()?>assets/img/icons/bintang.png" alt=""></div><div class="img-bintang-table"><img src="<?= base_url()?>assets/img/icons/bintang.png" alt=""></div></div><div class="img-bintang-table"><img src="<?= base_url()?>assets/img/icons/bintang_kosong.png" alt=""></div><div class="img-bintang-table"><img src="<?= base_url()?>assets/img/icons/bintang_kosong.png" alt=""></div><div class="img-bintang-table"><img src="<?= base_url()?>assets/img/icons/bintang_kosong.png" alt=""></div>'
                }else if (th == '3'){
                        rating = '<div class="img-bintang-table"><img src="<?= base_url()?>assets/img/icons/bintang.png" alt=""></div><div class="img-bintang-table"><img src="<?= base_url()?>assets/img/icons/bintang.png" alt=""></div><div class="img-bintang-table"><img src="<?= base_url()?>assets/img/icons/bintang.png" alt=""></div><div class="img-bintang-table"><img src="<?= base_url()?>assets/img/icons/bintang_kosong.png" alt=""></div><div class="img-bintang-table"><img src="<?= base_url()?>assets/img/icons/bintang_kosong.png" alt=""></div>'
                }else if (th == '4'){
                        rating = '<div class="img-bintang-table"><img src="<?= base_url()?>assets/img/icons/bintang.png" alt=""></div><div class="img-bintang-table"><img src="<?= base_url()?>assets/img/icons/bintang.png" alt=""></div><div class="img-bintang-table"><img src="<?= base_url()?>assets/img/icons/bintang.png" alt=""></div><div class="img-bintang-table"><img src="<?= base_url()?>assets/img/icons/bintang.png" alt=""></div><div class="img-bintang-table"><img src="<?= base_url()?>assets/img/icons/bintang_kosong.png" alt=""></div>'
                }else if (th == '5'){
                        rating = '<div class="img-bintang-table"><img src="<?= base_url()?>assets/img/icons/bintang.png" alt=""></div><div class="img-bintang-table"><img src="<?= base_url()?>assets/img/icons/bintang.png" alt=""></div><div class="img-bintang-table"><img src="<?= base_url()?>assets/img/icons/bintang.png" alt=""></div><div class="img-bintang-table"><img src="<?= base_url()?>assets/img/icons/bintang.png" alt=""></div><div class="img-bintang-table"><img src="<?= base_url()?>assets/img/icons/bintang.png" alt=""></div>'
                }

                $('#isi-table').append('<tr><td class="check" data-toggle="collapse" data-target="#multiCollapseExample' + i + '"><div class="checkbox"><input type="checkbox" id="checkbox'+i+'" aria-label="Checkbox for following text input" /><label for="checkbox' + i + '"></label></div></td><td>' + item.nid + '</td><td>' + item.nama + '</td><td>empty</td><td>' + item.nopol + '</td><td class="d-flex mx-1">'+ rating +'</td>' +status+ '</tr>');

                // if ( (Number(i)+Number(1)) == '1' ){
                $('#modal-click').append('<div class="from-modal collapse" id="multiCollapseExample'+i+'"><div class="row"><a onclick="tutupColap('+i+')" ><div class="tanda-close"> <span></span> <span></span> </div></a>  <div class="text-from"><h4> 1 data terpilih</h4>  </div>  <a onclick="lihatSupir('+item.id+')"><div class="from lihat"><span class="img-from"><img src="'+baseurl+'assets/img/icons/lihat.png" alt=""></span>     <h4>Lihat</h4></div></a>  <a onclick="suntingSupir('+item.id+')"><div class="from sunting"><span class="img-from"><img src=<?php echo base_url("assets/img/icons/edit.png")?> alt=""></span>       <h4>Sunting</h4> </div></a> <a onclick="hapusSupir('+item.id+')"><div class="from hapus"><span class="img-from"><img src=<?php echo base_url("assets/img/icons/hapus.png")?> alt=""></span>     <h4>Hapus</h4>  </div></a>  </div> </div>');

            });
        });

        function tutupColap(th) {
            $('#checkbox'+th).prop('checked', false)
            $('#multiCollapseExample'+th).collapse('hide')
        }

//-----------------------------------------------------TAMBAH SUPIR VIEW ----------------------------------------------//
$('#btnTambahSopir').click(function() {
    $('#modalAddSopir').modal('show');
    $('.modal-body-add-supir').html('');
       var settings3 = {
                'cache': false,
                'dataType': "jsonp",
                "async": true,
                "crossDomain": true,
                "url": "https://pjbs.ridiansyah.dev/v1/kendaraan/kendaraan?status=Nonaktif&all=true",
                "method": "GET",
                "headers": {
                    "accept": "application/json",
                    "Access-Control-Allow-Origin": "*"
                }
            }

        var dataItem1 = '';
        // var slc = $('#slcKendaraanBro');
        $.ajax(settings3).done(function(result) {
            console.log(result)
            var data = result.kendaraan;
            $.each(data, function(i, item) {

                dataItem1 += '<option value="'+item.id+'">'+item.nama+'</option>'

            });

        $('.modal-body-add-supir').append('<div class="form-row my-2"> <div class="form-group col-md-6"> <label for="NID">Nama Supir<span style="color:red">*</span></label> <input type="text" class="form-control" id="namaSupir" /> </div> <div class="form-group col-md-6"> <label for="inputPassword4">Kendaraan Aktif<span style="color:red">*</span></label> <select class="form-control" id="kendaraanSupir"> <option value=""> Pilih Kendaraan </option>'+dataItem1+' </select> </div> </div> <div class="form-row my-2"> <div class="form-group col-md-6"> <label for="namaKendaraan">Lokasi<span style="color:red">*</span></label> <input type="text" class="form-control" id="lokasiSupir" /> </div> <div class="form-group col-md-6"> <label for="tglSerah">Nomer HP<span style="color:red">*</span></label> <input type="text" class="form-control" id="nohpSupir" /> </div> </div>')
        });
})

//----------------------------------------------------------NOTIFIKASI ADMIN--------------------------------------------------//
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
//-------------------------------------------------------------ADD SOPIR------------------------------------------------------//
        $('#btnSubmitSupir').click(function() {
            $('#modalAddSopir').modal('hide');
            $('#mdlHarapTunggu').modal('show');

                var namaa = $('#namaSupir').val()
                var id_kendaraan = $('#kendaraanSupir').val();
                var lokasii = $('#lokasiSupir').val();
                var nohpp = $('#nohpSupir').val();

                const dataSend1 = {
                        nama : namaa,
                        kendaraan_id : id_kendaraan,
                        lokasi :lokasii,
                        nohp:nohpp,
                };

                axios({
                      method: 'POST',
                      url: 'https://pjbs.ridiansyah.dev/v1/kendaraan/sopir/create',
                      data: dataSend1
                    }).then( result => {
                        $('#mdlHarapTunggu').modal('hide');
                        $('#mdlSuksesKendaraan').modal('show');
                        window.location.reload();
                    }).catch(error => console.log(error));
        })
// -------------------------------------------------- VIEW KENDARAAN BY ID --------------------------------------------------//

        function lihatSupir(id) {
            $('.modal-body-detail-supir').html('')
             var settings2 = {
            'cache': false,
            'dataType': "jsonp",
            "async": true,
            "crossDomain": true,
            "url": " https://pjbs.ridiansyah.dev/v1/kendaraan/sopir?id="+id,
            "method": "GET",
            "headers": {
                "accept": "application/json",
                "Access-Control-Allow-Origin": "*"
                }
            }

            $.ajax(settings2).done(function(result) {
                console.log(result)
            var data = result.sopir;
            console.log(data)
            $('#modalLihatSopir').modal('show')
            $('.modal-body-detail-supir').append('<input type="hidden" id="idSupir" value="'+data.id+'"><div class="form-row my-2"> <div class="form-group col-md-6"> <label for="namaPolisi">Nama</label> <h5>'+data.nama+'</h5> </div> <div class="form-group col-md-6"> <label for="inputPassword4">Nama Kendaraan</label> <h5>'+data.nama_kendaraan+'</h5> </div> </div> <div class="form-row my-2"> <div class="form-group col-md-6"> <label for="namaKendaraan">Nomer Polisi</label> <h5>'+data.nopol+'</h5> </div> <div class="form-group col-md-6"> <label for="tglSerah">Nomor HP</label> <h5>'+data.nohp+'</h5> </div> </div>')
            })
        }
// -------------------------------------------------------SUNTING KENDARAAN --------------------------------------------------//
        function suntingSupir(id) {

        var settings3 = {
                'cache': false,
                'dataType': "jsonp",
                "async": true,
                "crossDomain": true,
                "url": "https://pjbs.ridiansyah.dev/v1/kendaraan/kendaraan?status=Nonaktif&all=true",
                "method": "GET",
                "headers": {
                    "accept": "application/json",
                    "Access-Control-Allow-Origin": "*"
                }
            }

        var dataItem1 = '';
        // var slc = $('#slcKendaraanBro');
        $.ajax(settings3).done(function(result) {
            console.log(result)
            var data = result.kendaraan;
            $.each(data, function(i, item) {

                dataItem1 += '<option value="'+item.id+'">'+item.nama+'</option>'

            });
        })

            $('.modal-body-sunting').html('')
           var settings = {
            'cache': false,
            'dataType': "jsonp",
            "async": true,
            "crossDomain": true,
            "url": " https://pjbs.ridiansyah.dev/v1/kendaraan/sopir?id="+id,
            "method": "GET",
            "headers": {
                "accept": "application/json",
                "Access-Control-Allow-Origin": "*"
                }
            }

            $.ajax(settings).done(function(result) {
            var data = result.sopir;
            $('#modalSuntingSopir').modal('show')
            $('.modal-body-sunting').append('<div class="form-row my-2"> <input type="hidden" id="idsupir" value="'+data.id+'"> <div class="form-group col-md-6"> <label for="namaPolisi">Nama Supir</label> <input value="'+data.nama+'" type="text" class="form-control" id="namaSupir" /> </div> <div class="form-group col-md-6"> <label for="inputPassword4">Kendaraan</label> <select id="kendaraan_id" class="form-control"> <option value="">'+data.nama_kendaraan+'</option>'+dataItem1+'</select> </div> </div> <div class="form-row my-2"> <div class="form-group col-md-6"> <label for="namaKendaraan">Lokasi</label> <input value="" type="text" class="form-control" id="lokasii" /> </div> <div class="form-group col-md-6"> <label for="tglSerah">Nomer HP</label> <input value="" type="text" class="form-control" id="nohpp" /></div></div>')
            })
        }
// ---------------------------------------------------------HAPUS SUPIR -------------------------------------------------------//
function hapusSupir(id) {
            $('#multiHapus').modal('show');
            $('.modal-body-hapus').append('<input type="hidden" id="idhapus" value="'+id+'">')
         }

         $('#btnHapusSopir').click(function() {
            $('#multiHapus').modal('hide');
            $('#mdlHarapTunggu').modal('show');
            var id = $('#idhapus').val();
            axios({
              method: 'DELETE',
              url: 'https://pjbs.ridiansyah.dev/v1/kendaraan/sopir/delete/id/'+id,
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
                    "url": "https://pjbs.ridiansyah.dev/v1/kendaraan/sopir?status=Aktif",
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
                var status = '';
                if (item.status == "Nonaktif"){
                    status = '<td><span class="nonaktif">' + item.status + '</span></td>';
                }else{
                    status = '<td><span class="aktif">' + item.status + '</span></td>';
                }

                
                $('#isi-table').append('<tr><td class="check" data-toggle="collapse" data-target="#multiCollapseExample' + i + '"><div class="checkbox"><input type="checkbox" id="checkbox'+i+'" aria-label="Checkbox for following text input" /><label for="checkbox' + i + '"></label></div></td><td>' + item.nid + '</td><td>' + item.nama + '</td><td>empty</td><td>' + item.nopol + '</td><td class="d-flex mx-1"><div class="img-bintang-table"><img src="../assets/img/icons/bintang.png" alt=""></div><div class="img-bintang-table"><img src="../assets/img/icons/bintang.png" alt=""></div><div class="img-bintang-table"><img src="../assets/img/icons/bintang.png" alt=""></div><div class="img-bintang-table"><img src="../assets/img/icons/bintang.png" alt=""></div><div class="img-bintang-table"><img src="../assets/img/icons/bintang_kosong.png" alt=""></div></td>' +status+ '</tr>');

                // if ( (Number(i)+Number(1)) == '1' ){
                $('#modal-click').append('<div class="from-modal collapse" id="multiCollapseExample'+i+'"><div class="row"><a onclick="tutupColap('+i+')" ><div class="tanda-close"> <span></span> <span></span> </div></a>  <div class="text-from"><h4> 1 data terpilih</h4>  </div>  <a onclick="lihatSupir('+item.id+')"><div class="from lihat"><span class="img-from"><img src="'+baseurl+'assets/img/icons/lihat.png" alt=""></span>     <h4>Lihat</h4></div></a>  <a onclick="suntingSupir('+item.id+')"><div class="from sunting"><span class="img-from"><img src=<?php echo base_url("assets/img/icons/edit.png")?> alt=""></span>       <h4>Sunting</h4> </div></a> <a onclick="hapusSupir('+item.id+')"><div class="from hapus"><span class="img-from"><img src=<?php echo base_url("assets/img/icons/hapus.png")?> alt=""></span>     <h4>Hapus</h4>  </div></a>  </div> </div>');
                });
            });
        })

        $('#btnNonAktifFilter').click(function(th) {
                $('#isi-table').html('')

                var baseurl = "<?= base_url() ?>";

                $('.loading').html("<center><img id='loading4' style='width:500px ;margin-top: 2%;' src='"+baseurl+"/assets/img/gif/loading4.gif'/><br /></center><br />")

                var settings = {
                    'cache': false,
                    'dataType': "jsonp",
                    "async": true,
                    "crossDomain": true,
                    "url": "https://pjbs.ridiansyah.dev/v1/kendaraan/sopir?status=Nonaktif",
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
                var status = '';
                if (item.status == "Nonaktif"){
                    status = '<td><span class="nonaktif">' + item.status + '</span></td>';
                }else{
                    status = '<td><span class="aktif">' + item.status + '</span></td>';
                }

                
                $('#isi-table').append('<tr><td class="check" data-toggle="collapse" data-target="#multiCollapseExample' + i + '"><div class="checkbox"><input type="checkbox" id="checkbox'+i+'" aria-label="Checkbox for following text input" /><label for="checkbox' + i + '"></label></div></td><td>' + item.nid + '</td><td>' + item.nama + '</td><td>empty</td><td>' + item.nopol + '</td><td class="d-flex mx-1"><div class="img-bintang-table"><img src="../assets/img/icons/bintang.png" alt=""></div><div class="img-bintang-table"><img src="../assets/img/icons/bintang.png" alt=""></div><div class="img-bintang-table"><img src="../assets/img/icons/bintang.png" alt=""></div><div class="img-bintang-table"><img src="../assets/img/icons/bintang.png" alt=""></div><div class="img-bintang-table"><img src="../assets/img/icons/bintang_kosong.png" alt=""></div></td>' +status+ '</tr>');

                // if ( (Number(i)+Number(1)) == '1' ){
                $('#modal-click').append('<div class="from-modal collapse" id="multiCollapseExample'+i+'"><div class="row"><a onclick="tutupColap('+i+')" ><div class="tanda-close"> <span></span> <span></span> </div></a>  <div class="text-from"><h4> 1 data terpilih</h4>  </div>  <a onclick="lihatSupir('+item.id+')"><div class="from lihat"><span class="img-from"><img src="'+baseurl+'assets/img/icons/lihat.png" alt=""></span>     <h4>Lihat</h4></div></a>  <a onclick="suntingSupir('+item.id+')"><div class="from sunting"><span class="img-from"><img src=<?php echo base_url("assets/img/icons/edit.png")?> alt=""></span>       <h4>Sunting</h4> </div></a> <a onclick="hapusSupir('+item.id+')"><div class="from hapus"><span class="img-from"><img src=<?php echo base_url("assets/img/icons/hapus.png")?> alt=""></span>     <h4>Hapus</h4>  </div></a>  </div> </div>');
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
                "url": " https://pjbs.ridiansyah.dev/v1/kendaraan/sopir?q="+param,
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
                var status = '';
                if (item.status == "Nonaktif"){
                    status = '<td><span class="nonaktif">' + item.status + '</span></td>';
                }else{
                    status = '<td><span class="aktif">' + item.status + '</span></td>';
                }

                
                $('#isi-table').append('<tr><td class="check" data-toggle="collapse" data-target="#multiCollapseExample' + i + '"><div class="checkbox"><input type="checkbox" id="checkbox'+i+'" aria-label="Checkbox for following text input" /><label for="checkbox' + i + '"></label></div></td><td>' + item.nid + '</td><td>' + item.nama + '</td><td>empty</td><td>' + item.nopol + '</td><td class="d-flex mx-1"><div class="img-bintang-table"><img src="../assets/img/icons/bintang.png" alt=""></div><div class="img-bintang-table"><img src="../assets/img/icons/bintang.png" alt=""></div><div class="img-bintang-table"><img src="../assets/img/icons/bintang.png" alt=""></div><div class="img-bintang-table"><img src="../assets/img/icons/bintang.png" alt=""></div><div class="img-bintang-table"><img src="../assets/img/icons/bintang_kosong.png" alt=""></div></td>' +status+ '</tr>');

                // if ( (Number(i)+Number(1)) == '1' ){
                $('#modal-click').append('<div class="from-modal collapse" id="multiCollapseExample'+i+'"><div class="row"><a onclick="tutupColap('+i+')" ><div class="tanda-close"> <span></span> <span></span> </div></a>  <div class="text-from"><h4> 1 data terpilih</h4>  </div>  <a onclick="lihatSupir('+item.id+')"><div class="from lihat"><span class="img-from"><img src="'+baseurl+'assets/img/icons/lihat.png" alt=""></span>     <h4>Lihat</h4></div></a>  <a onclick="suntingSupir('+item.id+')"><div class="from sunting"><span class="img-from"><img src=<?php echo base_url("assets/img/icons/edit.png")?> alt=""></span>       <h4>Sunting</h4> </div></a> <a onclick="hapusSupir('+item.id+')"><div class="from hapus"><span class="img-from"><img src=<?php echo base_url("assets/img/icons/hapus.png")?> alt=""></span>     <h4>Hapus</h4>  </div></a>  </div> </div>');
                });
            });
        })


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