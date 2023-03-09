<!-- MAIN -->
        <div class="content">
            <div class="col-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link text-center" href="<?= base_url('ModulRapatUser')?>">Ruang Rapat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center active" href="<?= base_url('ModulRapatUser/RoomEMeeting')?>">Room E-Meeting</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="<?= base_url('ModulRapatUser/Agenda')?>">Agenda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="<?= base_url('ModulRapatUser/Riwayat')?>">Riwayat</a>
                    </li>
                </ul>
                <div class="card border-0 w-100 px-2 py-3">
                    <div class="pilihan">
                        <div class="d-flex flex-row">
                            <a href="riwayat.html">
                                <div class="left bg-rgba-grey">
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <p>Room E-Meeting</p>
                            <a href="riwayat.html">
                                <div class="right bg-rgba-grey">
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="row d-flex justify-content-between">
                            <button class="btn btn-plus py-1 px-2 mb-3 mb-sm-0" data-toggle="modal" data-target="#modalAdd">+ Reservasi Ruangan</button>
                            <div class="filter d-flex flex-row">
                                <button class="btn btn-filter py-1 px-3 d-flex flex-row">    
                                    <img src="../assets/img/icons/filter_biru.png" alt="Filter" class="img-fluid mr-2"/>    
                                    <span>Filter</span>
                                </button>
                                <form class="ml-4">
                                    <div class="input-group input-group--custom"> <input type="text" class="form-control" placeholder="Cari..." />
                                        <div class="input-group-append--custom"> <button class="btn btn-primary" type="button">
                                            <img src="../assets/img/icons/search_putih.png" class="topbar__search-icn"/>
                                        </button>
                                        </div>
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
                                    <th scope="col">Judul E-Meeting</th>
                                    <th scope="col">Jadwal</th>
                                    <th scope="col">Room</th>
                                    <th scope="col">Waktu Mulai</th>
                                    <th scope="col">Waktu Selesai</th>
                                    <th scope="col">Kapasitas Room</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Rapat Direksi</td>
                                    <td>16/09/2020</td>
                                    <td>Ruang Turbin</td>
                                    <td>08:00</td>
                                    <td>16:00</td>
                                    <td>16</td>
                                    <td><span class="aktif-setuju font-weight-bold" data-toggle="modal" data-target="#modalLihatPersetujuan">Diterima</span></td>
                                </tr>
                                <tr>
                                    <td>Rapat Direksi</td>
                                    <td>16/09/2020</td>
                                    <td>Ruang Turbin</td>
                                    <td>08:00</td>
                                    <td>16:00</td>
                                    <td>16</td>
                                    <td><span class="aktif-setuju font-weight-bold" data-toggle="modal" data-target="#modalLihatPersetujuan">Diterima</span></td>
                                </tr>
                                <tr>
                                    <td>Rapat Direksi</td>
                                    <td>16/09/2020</td>
                                    <td>Ruang Turbin</td>
                                    <td>08:00</td>
                                    <td>16:00</td>
                                    <td>16</td>
                                    <td><span class="aktif-setuju font-weight-bold" data-toggle="modal" data-target="#modalLihatPersetujuan">Diterima</span></td>
                                </tr>
                                <tr>
                                    <td>Rapat Direksi</td>
                                    <td>16/09/2020</td>
                                    <td>Ruang Turbin</td>
                                    <td>08:00</td>
                                    <td>16:00</td>
                                    <td>16</td>
                                    <td><span class="aktif font-weight-bold" data-toggle="modal" data-target="#modalLihatPersetujuanTolak">Ditolak</span></td>
                                </tr>
                                <tr>
                                    <td>Rapat Direksi</td>
                                    <td>16/09/2020</td>
                                    <td>Ruang Turbin</td>
                                    <td>08:00</td>
                                    <td>16:00</td>
                                    <td>16</td>
                                    <td><span class="aktif font-weight-bold" data-toggle="modal" data-target="#modalLihatPersetujuanTolak">Ditolak</span></td>
                                </tr>
                                <tr>
                                    <td>Rapat Direksi</td>
                                    <td>16/09/2020</td>
                                    <td>Ruang Turbin</td>
                                    <td>08:00</td>
                                    <td>16:00</td>
                                    <td>16</td>
                                    <td><span class="aktif font-weight-bold" data-toggle="modal" data-target="#modalLihatPersetujuanTolak">Ditolak</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </section>
                </div>
            </div>
        </div>
        <!-- END MAIN -->

        <!-- MODAL -->

        <!-- Modal Lihat Persetujuan -->
        <div class="modal fade" id="modalLihatPersetujuanTolak" tabindex="-1" aria-labelledby="modalAddLihatLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content py-4 px-5 border-0">
                    <h3 class="modal-title px-3" id="modalAddLabel">
                        Detail Pengajuan
                    </h3>
                    <div class="modal-body">
                        <form action="">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="namaPolisi" class="font-weight-bold">Info Agenda Rapat</label>
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed corporis nobis iusto atque sapiente fugiat molestiae aspernatur deserunt consequuntur explicabo, commodi rerum minus odio necessitatibus, repudiandae nihil
                                        aperiam. Vero, laudantium!</p>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="namaPolisi" class="font-weight-bold">Kebutuhan Rapat</label>
                                    <p>Konsumsi</p>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="namaPolisi" class="font-weight-bold">Catatan Admin</label>
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed corporis nobis iusto atque sapiente fugiat molestiae aspernatur deserunt consequuntur explicabo, commodi rerum minus odio necessitatibus, repudiandae nihil
                                        aperiam. Vero, laudantium!</p>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="px-3">
                        <a href="" class="btn btn-submit">
                            Jadwal Ulang
                        </a>
                        <button type="button" class="btn btn-cancel">Tolak</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalLihatPersetujuan" tabindex="-1" aria-labelledby="modalAddLihatLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content py-4 px-5 border-0">
                    <h3 class="modal-title px-3" id="modalAddLabel">
                        Detail Pengajuan
                    </h3>
                    <div class="modal-body">
                        <form action="">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="namaPolisi" class="font-weight-bold">Info Agenda Rapat</label>
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed corporis nobis iusto atque sapiente fugiat molestiae aspernatur deserunt consequuntur explicabo, commodi rerum minus odio necessitatibus, repudiandae nihil
                                        aperiam. Vero, laudantium!</p>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="namaPolisi" class="font-weight-bold">Kebutuhan Rapat</label>
                                    <p>Konsumsi</p>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="namaPolisi" class="font-weight-bold">Catatan Admin</label>
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed corporis nobis iusto atque sapiente fugiat molestiae aspernatur deserunt consequuntur explicabo, commodi rerum minus odio necessitatibus, repudiandae nihil
                                        aperiam. Vero, laudantium!</p>
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