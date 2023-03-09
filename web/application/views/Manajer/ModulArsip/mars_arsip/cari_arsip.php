<!-- MAIN -->
        <div class="content">
            <div class="col-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link text-center" href="<?= base_url('ModulArsipManajer')?>">Pesan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center active" href="<?= base_url('ModulArsipManajer/Riwayat')?>">Riwayat</a>
                    </li>
                </ul>
                <div class="card border-0 w-100 px-2 py-3">
                    <div class="card border-0 w-100 px-2 py-3" id="link-detail-persetujuan">
                    <div class="container-fluid">
                        <div class="row d-flex justify-content-between">
                            <span class="btn btn-plus py-1 px-2 mb-3 mb-sm-0 bg-white"></span>
                            <div class="filter d-flex flex-row">
                                <button class="btn btn-filter py-1 px-3 d-flex flex-row" data-toggle="collapse" data-target="#collapseExample1">    
                                    <img src="<?php echo base_url("assets/img/icons/filter_biru.png")?>" alt="Filter" class="img-fluid mr-2"/>    
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
                        <div class="collapse" id="collapseExample1">
                                <div class="list-filter p-800">
                                        <p style="margin-left: 20%;margin-top: 5px;margin-right: 10px;">Sort by</p>
                                        <p style="margin-left: 35%;margin-top: 5px;margin-right: 10px;">Rak</p>
                                </div>
                                <div class="list-filter p-800" style="margin-top: 0;">
                                        <select style="margin-left:20%;width: 180px;border-radius:50px;border: 1px solid #014188" class="form-control">
                                            <option value=""> Semua </option>
                                            <option value=""> Nama Berkas (A-Z) </option>
                                            <option value=""> Nama Berkas (Z-A) </option>
                                            <option value=""> Tanggal Pengajuan (terbaru ke terlama) </option>
                                            <option value=""> Tanggal Pengajuan (terlama ke terbaru) </option>
                                            <option value=""> Kode Boks (A-Z) </option>
                                            <option value=""> Kode Boks (Z-A) </option>
                                        </select>
                                        <select style="margin-left:5%;width: 100px;border-radius:50px;border: 1px solid #014188" class="form-control">
                                            <option value=""> Semua </option>
                                            <option value=""> Rak 1 </option>
                                            <option value=""> Rak 2 </option>
                                            <option value=""> Rak 3 </option>
                                            <option value=""> Semua  </option>
                                        </select>
                                </div>
                        </div>

                    </div>
                    <section class="table-responnsive mt-4">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">Berkas</th>
                                    <th scope="col">Tgl Pengajuan</th>
                                    <th scope="col">Rak</th>
                                    <th scope="col">Boks</th>
                                    <th scope="col">Divisi</th>
                                </tr>
                            </thead>
                            <tbody id="isi-tabel">
                                <tr>
                                    <td> Dokumen Pengesahan M-Facilities (2015)</td>
                                    <td> 17-09-25</td>
                                    <td> Rak 2 (tingkat 2)</td>
                                    <td> B001</td>
                                    <td> Keuangan </td>
                                </tr>
                                <tr>
                                    <td> Dokumen Pengesahan M-Facilities (2015)</td>
                                    <td> 17-09-25</td>
                                    <td> Rak 2 (tingkat 2)</td>
                                    <td> B001</td>
                                    <td> Keuangan</td>
                                </tr>
                                
                            </tbody>
                        </table>
                        <div id="loading"></div>
                    </section>
                </div>
                </div>
            </div>
        </div>
        <!-- END MAIN -->

        <!-- Modal Start -->
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
        
        <div class="modal fade" id="mdlDetail" tabindex="-1" aria-labelledby="mdlDetailLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content py-4 px-5 border-0 persetujuan">
                    <h3 class="modal-title px-3" id="modalAddLabel"> Detail Arsip </h3> <br/>
                    <div class="modal-body-persetujuan"> 
                        <div class="disetujui-pemesanan" style="margin-left:20px;"> 
                            <table style="width: 100%;margin-bottom: 20px;color: black"> 
                                <tr> 
                                    <td><h4>Ukuran Boks</h4></td>
                                    <td></td> 
                                    <td><h4>Rak</h4></td> 
                                    <td></td> 
                                </tr> 
                                <tr> 
                                    <td>Besar</td>
                                    <td></td> 
                                    <td>Rak 2 (tingkat 3)</td> 
                                    <td></td> 
                                </tr> 
                                <tr> 
                                    <td><h4>Tahun Retensi</h4></td>
                                    <td></td> 
                                    <td></td> 
                                    <td></td> 
                                </tr> 
                                <tr> 
                                    <td>5</td>
                                    <td></td> 
                                    <td></td> 
                                    <td></td> 
                                </tr>
                            </table> 
                            <div class="content-pemesanan"> 
                                <div> 
                                    <h4>Berkas</h4> 
                                    <ul style="color: #014188;">
                                        <li> <span style="color: #453823">Dokumen Pengesahan M-Facilities (2015)</span></li>
                                        <li> <span style="color: #453823">Dokumen Pengesahan M-Facilities (2015)</span></li>
                                        <li> <span style="color: #453823">Dokumen Pengesahan M-Facilities (2015)</span></li>
                                    <ul>  
                                </div> 
                            <div> 
                            <hr/>
                            <table style="width: 100%;margin-bottom: 20px;"> 
                                <tr> 
                                    <td><h4>Ukuran Boks</h4></td>
                                    <td></td> 
                                    <td><h4>Rak</h4></td> 
                                    <td></td> 
                                </tr> 
                                <tr> 
                                    <td>A0</td>
                                    <td></td> 
                                    <td>Rak 2 (tingkat 3)</td> 
                                    <td></td> 
                                </tr> 
                                <tr> 
                                    <td><h4>Tahun Retensi</h4></td>
                                    <td></td> 
                                    <td></td> 
                                    <td></td> 
                                </tr> 
                                <tr> 
                                    <td>5</td>
                                    <td></td> 
                                    <td></td> 
                                    <td></td> 
                                </tr>
                            </table> 
                            <div class="content-pemesanan"> 
                                <div> 
                                    <h4>Berkas</h4> 
                                    <ul style="color: #014188;">
                                        <li> <span style="color: #453823">Dokumen Pengesahan M-Facilities (2015)</span></li>
                                        <li> <span style="color: #453823">Dokumen Pengesahan M-Facilities (2015)</span></li>
                                        <li> <span style="color: #453823">Dokumen Pengesahan M-Facilities (2015)</span></li>
                                    <uL>  
                                </div> 
                            <div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- End Modal -->

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