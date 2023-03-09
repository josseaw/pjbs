            <!-- MAIN -->
        <div class="content">
            <div class="col-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link text-center" href="<?= base_url('ModulArsip')?>">Arsip</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="<?= base_url('ModulArsip/CariArsip')?>">Cari Arsip</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center active" href="<?= base_url('ModulArsip/Rak')?>">Rak</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="<?= base_url('ModulArsip/Permintaan')?>">Permintaan</a>
                    </li>
                </ul>
                <div class="card border-0 w-100 px-2 py-3">
                    <div class="card border-0 w-100 px-2 py-3" id="link-detail-persetujuan">
                    <div class="container-fluid">
                        <div class="row d-flex justify-content-between">
                            <button type="button" style="width: 170px;" class="btn btn-plus py-1 px-2 mb-3 mb-sm-0" data-toggle="modal" data-target="#modalAddRak">+ Tambah Rak</button>
                            <div class="filter d-flex flex-row">
                                <form class="ml-4">
                                    <div class="input-group input-group--custom"> <input type="text" class="form-control" placeholder="Cari..." />
                                        <div class="input-group-append--custom"> <button class="btn btn-primary" type="button"><img src="<?php echo base_url("assets/img/icons/search_putih.png")?>" class="topbar__search-icn"/></button></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <section class="table-responnsive mt-4">
                        <table style="width: 100%" class="table table-borderless">
                            <thead>
                                <tr>
                                    <th style="width: 5%" scope="col"><button class="btn btn-minus">&minus;</button></th>
                                    <th style="width: 45%" scope="col">Rak</th>
                                    <th style="width: 50%" scope="col">Jumlah Boks</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="check" data-toggle="collapse" data-target="#multiCollapseExample"><div class="checkbox"><input type="checkbox" id="checkbox1" aria-label="Checkbox for following text input" /><label for="checkbox1"></label></div></td>
                                    <td>Rak 1</td>
                                    <td>3 Boks</td>
                                </tr>
                                <tr>
                                    <td class="check" data-toggle="collapse" data-target="#multiCollapseExample1"><div class="checkbox"><input type="checkbox" id="checkbox1" aria-label="Checkbox for following text input" /><label for="checkbox1"></label></div></td>
                                    <td>Rak 1</td>
                                    <td>3 Boks</td>
                                </tr>
                                <tr>
                                    <td class="check" data-toggle="collapse" data-target="#multiCollapseExample1"><div class="checkbox"><input type="checkbox" id="checkbox1" aria-label="Checkbox for following text input" /><label for="checkbox1"></label></div></td>
                                    <td>Rak 1</td>
                                    <td>3 Boks</td>
                                </tr>
                                <tr>
                                    <td class="check" data-toggle="collapse" data-target="#multiCollapseExample1"><div class="checkbox"><input type="checkbox" id="checkbox1" aria-label="Checkbox for following text input" /><label for="checkbox1"></label></div></td>
                                    <td>Rak 1</td>
                                    <td>3 Boks</td>
                                </tr>
                                <tr>
                                    <td class="check" data-toggle="collapse" data-target="#multiCollapseExample1"><div class="checkbox"><input type="checkbox" id="checkbox1" aria-label="Checkbox for following text input" /><label for="checkbox1"></label></div></td>
                                    <td>Rak 1</td>
                                    <td>3 Boks</td>
                                </tr>
                                <tr>
                                    <td class="check" data-toggle="collapse" data-target="#multiCollapseExample1"><div class="checkbox"><input type="checkbox" id="checkbox1" aria-label="Checkbox for following text input" /><label for="checkbox1"></label></div></td>
                                    <td>Rak 1</td>
                                    <td>3 Boks</td>
                                </tr>
                            </tbody>
                        </table>
                    </section>
                </div>
                </div>
            </div>
        </div>
        <!-- END MAIN -->
        <!-- Form Modal Hapus, Sunting, Lihat -->
        <div class="from-modal collapse" id="multiCollapseExample">
            <div class="row">
                <div class="tanda-close">
                    <span></span>
                    <span></span>
                </div>
                <div class="text-from">
                    <h4>1 data terpilih</h4>
                </div>
                <div class="from lihat" data-toggle="modal" data-target="#modalDetail"><span class="img-from"><img src="<?= base_url('') ?>assets/img/icons/lihat.png" alt=""></span>
                    <h4>Lihat</h4>
                </div>
                <div class="from sunting" data-toggle="modal" data-target="#mdlSunting"><span class="img-from"><img src="<?= base_url('') ?>assets/img/icons/edit.png" alt=""></span>
                    <h4>Sunting</h4>
                </div>
                <div class="from hapus" data-toggle="modal" data-target="#multiHapus"><span class="img-from"><img src="<?= base_url('') ?>assets/img/icons/hapus.png" alt=""></span>
                    <h4>Hapus</h4>
                </div>
            </div>
        </div>

        <!-- Modal Add -->
        <div class="modal fade" id="modalAddRak" tabindex="-1" aria-labelledby="modalAddLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content py-4 px-5 border-0">
                    <h3 class="modal-title px-3" id="modalAddLabel">
                        Tambah Rak
                    </h3>
                    <div class="modal-body">
                            <div class="form-row mt-3 mb-5">
                                <div class="form-group col-md-6">
                                    <label for="namaKendaraan">Nama Rak</label>
                                    <input type="text" class="form-control" id="tglSerah" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Jumlah Boks</label>
                                    <input type="text" class="form-control" id="namaKendaraan" />
                                </div>
                            </div>
                    </div>
                    <div class="px-3">
                        <button type="button" class="btn btn-submit" data-dismiss="modal">
                            Tambah Rak
                        </button>
                        <button type="button" class="btn btn-cancel" data-dismiss="modal">Batal</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Sunting Rak -->
        <div class="modal fade" id="mdlSunting" tabindex="-1" aria-labelledby="modalAddLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content py-4 px-5 border-0">
                    <h3 class="modal-title px-3" id="modalAddLabel">
                        Sunting Rak
                    </h3>
                    <div class="modal-body">
                            <div class="form-row mt-3 mb-5">
                                <div class="form-group col-md-6">
                                    <label for="namaKendaraan">Nama Rak</label>
                                    <input type="text" class="form-control" id="tglSerah" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Jumlah Boks</label>
                                    <input type="text" class="form-control" id="namaKendaraan" />
                                </div>
                            </div>
                    </div>
                    <div class="px-3">
                        <button type="button" class="btn btn-submit" data-dismiss="modal">
                            Sunting Rak
                        </button>
                        <button type="button" class="btn btn-cancel" data-dismiss="modal">Batal</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Detail -->
        <div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="modalAddLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content py-4 px-5 border-0">
                    <h3 class="modal-title px-3" id="modalAddLabel">
                        Detail
                    </h3>
                    <div class="modal-body">
                        <form action="">
                            <h5 class="font-weight-bold">Boks</h5>
                            <div class="form-row my-2">
                                <table style="width: 100%;margin-left: 1%;"> 
                                    <tr> 
                                        <td style="width: 10%">Boks 1</td>
                                        <td style="width: 90%"></td> 
                                    </tr> 
                                    <tr> 
                                        <td style="width: 10%">
                                            <div class="img-modal">
                                                <img style="width: 35%" src="<?= base_url('') ?>assets/img/icons/berkas.png" alt="">
                                            </div>
                                        </td>
                                        <td style="width: 90%">Surat Kelengkapan</td> 
                                    </tr> 
                                    <tr> 
                                        <td style="width: 10%"></td>
                                        <td style="width: 90%">Surat Pernyataan</td> 
                                    </tr> 
                                    <tr> 
                                        <td style="width: 10%"></td>
                                        <td style="width: 90%">Surat M-Facilities</td> 
                                    </tr> 
                                </table> 
                                <table style="width: 100%;margin-left: 1%;"> 
                                    <tr> 
                                        <td style="width: 10%">Boks 2</td>
                                        <td style="width: 90%"></td> 
                                    </tr> 
                                    <tr> 
                                        <td style="width: 10%">
                                            <div class="img-modal">
                                                <img style="width: 35%" src="<?= base_url('') ?>assets/img/icons/berkas.png" alt="">
                                            </div>
                                        </td>
                                        <td style="width: 90%">Surat Kelengkapan</td> 
                                    </tr> 
                                    <tr> 
                                        <td style="width: 10%"></td>
                                        <td style="width: 90%">Surat Pernyataan</td> 
                                    </tr> 
                                    <tr> 
                                        <td style="width: 10%"></td>
                                        <td style="width: 90%">Surat M-Facilities</td> 
                                    </tr> 
                                </table> 
                                <table style="width: 100%;margin-left: 1%;"> 
                                    <tr> 
                                        <td style="width: 10%">Boks 3</td>
                                        <td style="width: 90%"></td> 
                                    </tr> 
                                    <tr> 
                                        <td style="width: 10%">
                                            <div class="img-modal">
                                                <img style="width: 35%" src="<?= base_url('') ?>assets/img/icons/berkas.png" alt="">
                                            </div>
                                        </td>
                                        <td style="width: 90%">Surat Kelengkapan</td> 
                                    </tr> 
                                    <tr> 
                                        <td style="width: 10%"></td>
                                        <td style="width: 90%">Surat Pernyataan</td> 
                                    </tr> 
                                    <tr> 
                                        <td style="width: 10%"></td>
                                        <td style="width: 90%">Surat M-Facilities</td> 
                                    </tr> 
                                </table> 
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
                    <div class="modal-body">
                        <div class="pilihan">
                            <p>Hapus Data?</p>
                        </div>
                        <form action="">
                            <div class="form-row center">
                                <div class="form-group mx-1">
                                    <Button type="button" class="btn btn-primary px-4 px-1" data-dismiss="modal">Hapus</Button>
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

        <!-- Modal Pindahkan Arsip-->
        <div class="modal fade" id="mdlPindahkanArsip" tabindex="-1" aria-labelledby="mdlPindahkanArsipLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content py-4 px-5 border-0 persetujuan">
                    <h3 class="modal-title px-3" id="modalAddLabel"> Pindahkan Arsip </h3> <br/>
                    <div class="modal-body"> 
                        <div style="margin-left:20px;"> 
                            <div class="text-head"> 
                                <h4><b>Boks 34</b></h4> 
                            </div> 
                                <table style="width: 100%;margin-bottom: 20px;"> 
                                    <tr> 
                                        <td>
                                            <img style="width: 20px;" src="<?= base_url()?>assets/img/icons/jam_coklat.png" alt="">
                                        </td> 
                                        <td> masuk pada 18 September 2020</td> 
                                        <td><img style="width: 25px;" src="<?= base_url()?>assets/img/icons/gedung_coklat.png" alt=""></td> 
                                        <td> Keuangan</td> 
                                    </tr> 
                                    <tr>
                                        <td><img style="width: 25px;" src="<?= base_url()?>assets/img/icons/rak.png" alt=""></td> 
                                        <td><p style="margin-top:15px;">Rak 2 (tingkat 3)</p></td> 
                                        <td style="padding-top:5px;"></td> 
                                        <td style="padding-top:5px;"></td>
                                    </tr>
                                </table> 
                                <div class="content-pemesanan"> 
                                    <div> 
                                        <h4>Berkas</h4> 
                                        <ul style="color: #014188;">
                                            <li> <span style="color: #453823">Dokumen Pengesahan M-Facilities (2015)</span></li>
                                            <li> <span style="color: #453823">Dokumen Pengesahan M-Facilities (2015)</span></li>
                                            <li> <span style="color: #453823">Dokumen Pengesahan M-Facilities (2015)</span></li>
                                        </ul>  
                                    </div> 
                                    <div> 
                                        <a href="'+baseurl+'ModulKendaraan/PilihSupir/'+data.id+'" class="btn btn-submit"> Pindahkan </a> 
                                        <a href="'+baseurl+'ModulKendaraan/PemesananDitolak/'+data.id+'"> 
                                            <button type="button" class="btn btn-cancel">Tolak</button> 
                                        </a> 
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal fade" id="mdlDetail" tabindex="-1" aria-labelledby="modalAddLihatLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content py-4 px-5 border-0 persetujuan">
                    <h3 class="modal-title px-3" id="modalAddLabel"> Detail </h3> <br/>
                    <div class="modal-body-persetujuan"> 
                        <div class="disetujui-pemesanan" style="margin-left:20px;"> 
                            <table style="width: 100%;margin-bottom: 20px;"> 
                                <tr> 
                                    <td><h4><b>Karina Kusumadewi</b></h4></td>
                                </tr> 
                                <tr> 
                                    <td><img style="width: 5%" src="<?= base_url('')?>assets/img/icons/jam_coklat.png" alt=""> masuk pada 18 September 2015</td> 
                                </tr> 
                            </table> 
                            <!-- content -->
                            <table style="width: 100%;margin-bottom: 20px;text-align: left;"> 
                                <tr> 
                                    <td style="width: 20%"><h5><b>Ukuran Boks</b></h5></td>
                                    <td style="width: 20%"><h5><b>Boks</b></h5></td> 
                                    <td style="width: 20%"><h5><b>Tahun Retensi</b></h5></td> 
                                    <td style="width: 20%"><h5><b>Rak</b></h5></td> 
                                    <td style="width: 20%"><a href="<?= base_url('ModulArsip/PilihRak')?>" target="_blank"><button style="width: 100px;" type="button" class="btn btn-primary btn-sm"> Pilih Rak </button></a></td> 
                                </tr> 
                                <tr> 
                                    <td>Besar</td>
                                    <td>B001</td> 
                                    <td>5</td> 
                                    <td>-</td> 
                                    <td></td> 
                                </tr> 
                            </table> 
                            <div class="content-pemesanan"> 
                                <div> 
                                    <h5><b>Berkas</b></h5> 
                                    <ul style="color: #014188;">
                                        <li> <span style="color: black">Dokumen Pengesahan M-Facilities (2015)</span></li>
                                        <li> <span style="color: black">Dokumen Pengesahan M-Facilities (2015)</span></li>
                                        <li> <span style="color: black">Dokumen Pengesahan M-Facilities (2015)</span></li>
                                    </ul>  
                                </div> 
                            </div> 
                            <hr/>
                            <!-- content -->
                            <table style="width: 100%;margin-bottom: 20px;text-align: left;"> 
                                <tr> 
                                    <td style="width: 20%"><h5><b>Ukuran Boks</b></h5></td>
                                    <td style="width: 20%"><h5><b>Boks</b></h5></td> 
                                    <td style="width: 20%"><h5><b>Tahun Retensi</b></h5></td> 
                                    <td style="width: 20%"><h5><b>Rak</b></h5></td> 
                                    <td style="width: 20%"><a href="<?= base_url('ModulArsip/PilihRak')?>" target="_blank"><button style="width: 100px;" type="button" class="btn btn-primary btn-sm"> Pilih Rak </button></a></td> 
                                </tr> 
                                <tr> 
                                    <td>Besar</td>
                                    <td>B001</td> 
                                    <td>5</td> 
                                    <td>-</td> 
                                    <td></td> 
                                </tr> 
                            </table> 
                            <div class="content-pemesanan"> 
                                <div> 
                                    <h5><b>Berkas</b></h5> 
                                    <ul style="color: #014188;">
                                        <li> <span style="color: black">Dokumen Pengesahan M-Facilities (2015)</span></li>
                                        <li> <span style="color: black">Dokumen Pengesahan M-Facilities (2015)</span></li>
                                        <li> <span style="color: black">Dokumen Pengesahan M-Facilities (2015)</span></li>
                                    </ul>  
                                </div> 
                            </div> 
                            <hr/>
                            <!-- content -->
                            <table style="width: 100%;margin-bottom: 20px;text-align: left;"> 
                                <tr> 
                                    <td style="width: 20%"><h5><b>Ukuran Boks</b></h5></td>
                                    <td style="width: 20%"><h5><b>Boks</b></h5></td> 
                                    <td style="width: 20%"><h5><b>Tahun Retensi</b></h5></td> 
                                    <td style="width: 20%"><h5><b>Rak</b></h5></td> 
                                    <td style="width: 20%"><a href="<?= base_url('ModulArsip/PilihRak')?>" target="_blank"><button style="width: 100px;" type="button" class="btn btn-primary btn-sm"> Pilih Rak </button></a></td> 
                                </tr> 
                                <tr> 
                                    <td>Besar</td>
                                    <td>B001</td> 
                                    <td>5</td> 
                                    <td>-</td> 
                                    <td></td> 
                                </tr> 
                            </table> 
                            <div class="content-pemesanan"> 
                                <div> 
                                    <h5><b>Berkas</b></h5> 
                                    <ul style="color: #014188;">
                                        <li> <span style="color: black">Dokumen Pengesahan M-Facilities (2015)</span></li>
                                        <li> <span style="color: black">Dokumen Pengesahan M-Facilities (2015)</span></li>
                                        <li> <span style="color: black">Dokumen Pengesahan M-Facilities (2015)</span></li>
                                    </ul>  
                                </div> 
                            </div> 
                            <hr/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="<?= base_url('')?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('')?>assets/js/script.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("a.notifikasi_pindah").click(function(event){
                event.preventDefault();
                $('#mdlPindahkanArsip').modal('show');
            });
        });

        $(document).ready(function(){
            $("a.notifikasi_detail").click(function(event1){
                event1.preventDefault();
                $('#mdlDetail').modal('show');
            });
        });
        //------------------------------------------------------------JAM TANGGAL OTOMATIS ---------------------------------//
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