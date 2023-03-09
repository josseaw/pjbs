        <!-- MAIN -->
        <div class="content">
            <div class="col-12">
                 <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link text-center" href="<?= base_url('ModulRapat')?>">Monitoring Ruang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="<?= base_url('ModulRapat/reservasi')?>">Reservasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center active" href="<?= base_url('ModulRapat/persetujuan')?>">Persetujuan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="<?= base_url('ModulRapat/agenda')?>">Agenda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="<?= base_url('ModulRapat/riwayat')?>">Riwayat</a>
                    </li>
                </ul>
                <div class="card border-0 w-100 px-2 py-3" id="link-detail-persetujuan">
                    <div class="container-fluid">
                        <div class="row d-flex justify-content-between">
                            <button class="btn btn-plus py-1 px-2 mb-3 mb-sm-0" data-toggle="modal" data-target="#modalAdd">+ Reservasi Ruangan</button>
                            <div class="filter d-flex flex-row">
                                <button class="btn btn-filter py-1 px-3 d-flex flex-row">    
                                    <img src="<?= base_url()?>assets/img/icons/filter_biru.png" alt="Filter" class="img-fluid mr-2"/>    
                                    <span>Filter</span>
                                </button>
                                <form class="ml-4">
                                    <div class="input-group input-group--custom"> <input type="text" class="form-control" placeholder="Cari..." />
                                        <div class="input-group-append--custom"> <button class="btn btn-primary" type="button">
                                            <img src="<?= base_url()?>assets/img/icons/search_putih.png" class="topbar__search-icn"/>
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
                                    <th scope="col"> <button class="btn btn-minus">&minus;</button> </th>
                                    <th scope="col">Nama Pemesan</th>
                                    <th scope="col">Jadwal</th>
                                    <th scope="col">Waktu</th>
                                    <th scope="col">Jumlah Peserta</th>
                                    <th scope="col">Kebutuhan Rapat</th>
                                    <th scope="col">Ketersediaan<br>Ruangan</th>
                                    <th scope="col">Status Rapat</th>
                                    <th scope="col">Persetujuan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="check">
                                            <div class="checkbox"> <input type="checkbox" id="checkbox" aria-label="Checkbox for following text input" /> <label for="checkbox"></label> </div>
                                        </td>
                                    <td>Karina Kusumadewi</td>
                                    <td>16/09/2020</td>
                                    <td>09:00-10:00</td>
                                    <td>16</td>
                                    <td>Konsumsi</td>
                                    <td>Ruang Turbin</td>
                                    <td>Internal</td>
                                    <td class="d-flex " data-toggle="modal" data-target="#modalLihatPersetujuan">
                                        <div class="table-centang mx-1 bg-v-blue"><span></span><span></span></div>
                                        <div class="table-close mx-1"><span></span><span></span></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="check">
                                            <div class="checkbox"> <input type="checkbox" id="checkbox" aria-label="Checkbox for following text input" /> <label for="checkbox"></label> </div>
                                        </td>
                                    <td>Karina Kusumadewi</td>
                                    <td>16/09/2020</td>
                                    <td>09:00-10:00</td>
                                    <td>16</td>
                                    <td>Konsumsi</td>
                                    <td>Ruang Turbin</td>
                                    <td>Internal</td>
                                    <td class="d-flex " data-toggle="modal" data-target="#modalLihatPersetujuan">
                                        <div class="table-centang mx-1 bg-v-blue"><span></span><span></span></div>
                                        <div class="table-close mx-1"><span></span><span></span></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="check">
                                            <div class="checkbox"> <input type="checkbox" id="checkbox" aria-label="Checkbox for following text input" /> <label for="checkbox"></label> </div>
                                        </td>
                                    <td>Karina Kusumadewi</td>
                                    <td>16/09/2020</td>
                                    <td>09:00-10:00</td>
                                    <td>16</td>
                                    <td>Konsumsi</td>
                                    <td>Ruang Turbin</td>
                                    <td>Internal</td>
                                    <td class="d-flex " data-toggle="modal" data-target="#modalLihatPersetujuan">
                                        <div class="table-centang mx-1 bg-v-blue"><span></span><span></span></div>
                                        <div class="table-close mx-1"><span></span><span></span></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="check">
                                            <div class="checkbox"> <input type="checkbox" id="checkbox" aria-label="Checkbox for following text input" /> <label for="checkbox"></label> </div>
                                        </td>
                                    <td>Karina Kusumadewi</td>
                                    <td>16/09/2020</td>
                                    <td>09:00-10:00</td>
                                    <td>16</td>
                                    <td>Konsumsi</td>
                                    <td>Ruang Turbin</td>
                                    <td>Internal</td>
                                    <td class="d-flex " data-toggle="modal" data-target="#modalLihatPersetujuan">
                                        <div class="table-centang mx-1 bg-v-blue"><span></span><span></span></div>
                                        <div class="table-close mx-1" data-toggle="modal"><span></span><span></span></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="check">
                                            <div class="checkbox"> <input type="checkbox" id="checkbox" aria-label="Checkbox for following text input" /> <label for="checkbox"></label> </div>
                                        </td>
                                    <td>Karina Kusumadewi</td>
                                    <td>16/09/2020</td>
                                    <td>09:00-10:00</td>
                                    <td>16</td>
                                    <td>Konsumsi</td>
                                    <td>Ruang Turbin</td>
                                    <td>Internal</td>
                                    <td class="d-flex " data-toggle="modal" data-target="#modalLihatPersetujuan">
                                        <div class="table-centang mx-1 bg-v-blue"><span></span><span></span></div>
                                        <div class="table-close mx-1" data-toggle="modal"><span></span><span></span></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="check">
                                            <div class="checkbox"> <input type="checkbox" id="checkbox" aria-label="Checkbox for following text input" /> <label for="checkbox"></label> </div>
                                        </td>
                                    <td>Karina Kusumadewi</td>
                                    <td>16/09/2020</td>
                                    <td>09:00-10:00</td>
                                    <td>16</td>
                                    <td>Konsumsi</td>
                                    <td>Ruang Turbin</td>
                                    <td>Internal</td>
                                    <td class="d-flex " data-toggle="modal" data-target="#modalLihatPersetujuan">
                                        <div class="table-centang mx-1 bg-v-blue"><span></span><span></span></div>
                                        <div class="table-close mx-1" data-toggle="modal"><span></span><span></span></div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </section>
                </div>
                <div id="riwayat-pemesanan-table">
                    <div class="card border-0 w-100 px-2 py-3 my-4">
                        <div class="container-fluid">
                            <div class="row d-flex justify-content-between">
                                <h4>Riwayat Pemesanan</h4>
                                <div class="filter d-flex flex-row"> <button class="btn btn-filter py-1 px-3 d-flex flex-row" data-toggle="collapse" data-target="#collapseExample">        <img          src="../assets/img/icons/filter_biru.png"          alt="Filter"          class="img-fluid mr-2"        />        <span>Filter</span>      </button>
                                    <form class="ml-4">
                                        <div class="input-group input-group--custom"> <input type="text" class="form-control" placeholder="Cari..." />
                                            <div class="input-group-append--custom"> <button class="btn btn-primary" type="button">              <img                src="../assets/img/icons/search_putih.png"                class="topbar__search-icn"              />           </button> </div>
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
                                <tbody>
                                    <tr>
                                        <td class="check">
                                            <div class="checkbox"> <input type="checkbox" id="checkbox" aria-label="Checkbox for following text input" /> <label for="checkbox"></label> </div>
                                        </td>
                                        <td>Karina Kusumadewi</td>
                                        <td>16/09/2020</td>
                                        <td>16:00</td>
                                        <td>16/09/2020</td>
                                        <td>17:00</td>
                                        <td>4</td>
                                        <td>Dalam kota<br>tugas oprasional</td>
                                        <td>Kantor<br>BPKB</td>
                                        <td><a class="aktif font-weight-bold">Ditolak</a></td>
                                    </tr>
                                    <tr>
                                        <td class="check">
                                            <div class="checkbox"> <input type="checkbox" id="checkbox1" aria-label="Checkbox for following text input" /> <label for="checkbox1"></label> </div>
                                        </td>
                                        <td>Karina Kusumadewi</td>
                                        <td>16/09/2020</td>
                                        <td>16:00</td>
                                        <td>16/09/2020</td>
                                        <td>17:00</td>
                                        <td>4</td>
                                        <td>Dalam kota<br>tugas oprasional</td>
                                        <td>Kantor<br>BPKB</td>
                                        <td><a class="aktif font-weight-bold">Ditolak</a></td>
                                    </tr>
                                    <tr>
                                        <td class="check">
                                            <div class="checkbox"> <input type="checkbox" id="checkbox2" aria-label="Checkbox for following text input" /> <label for="checkbox2"></label> </div>
                                        </td>
                                        <td>Karina Kusumadewi</td>
                                        <td>16/09/2020</td>
                                        <td>16:00</td>
                                        <td>16/09/2020</td>
                                        <td>17:00</td>
                                        <td>4</td>
                                        <td>Dalam kota<br>tugas oprasional</td>
                                        <td>Kantor<br>BPKB</td>
                                        <td><a class="aktif font-weight-bold">Ditolak</a></td>
                                    </tr>
                                    <tr>
                                        <td class="check">
                                            <div class="checkbox"> <input type="checkbox" id="checkbox3" aria-label="Checkbox for following text input" /> <label for="checkbox3"></label> </div>
                                        </td>
                                        <td>Karina Kusumadewi</td>
                                        <td>16/09/2020</td>
                                        <td>16:00</td>
                                        <td>16/09/2020</td>
                                        <td>17:00</td>
                                        <td>4</td>
                                        <td>Dalam kota<br>tugas oprasional</td>
                                        <td>Kantor<br>BPKB</td>
                                        <td><a class="aktif-setuju font-weight-bold">Diterima</a></td>
                                    </tr>
                                    <tr>
                                        <td class="check">
                                            <div class="checkbox"> <input type="checkbox" id="checkbox4" aria-label="Checkbox for following text input" /> <label for="checkbox4"></label> </div>
                                        </td>
                                        <td>Karina Kusumadewi</td>
                                        <td>16/09/2020</td>
                                        <td>16:00</td>
                                        <td>16/09/2020</td>
                                        <td>17:00</td>
                                        <td>4</td>
                                        <td>Dalam kota<br>tugas oprasional</td>
                                        <td>Kantor<br>BPKB</td>
                                        <td><a class="aktif-setuju font-weight-bold">Diterima</a></td>
                                    </tr>
                                    <tr>
                                        <td class="check">
                                            <div class="checkbox"> <input type="checkbox" id="checkbox5" aria-label="Checkbox for following text input" /> <label for="checkbox5"></label> </div>
                                        </td>
                                        <td>Karina Kusumadewi</td>
                                        <td>16/09/2020</td>
                                        <td>16:00</td>
                                        <td>16/09/2020</td>
                                        <td>17:00</td>
                                        <td>4</td>
                                        <td>Dalam kota<br>tugas oprasional</td>
                                        <td>Kantor<br>BPKB</td>
                                        <td><a class="aktif-setuju font-weight-bold">Diterima</a></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="tombol-unduh" data-toggle="modal" data-target="#modalUnduhRiwayatPemesanan"> <span class="img-unduh">                   <img src="../assets/img/icons/unduh.png" alt="">               </span>
                                <p>Unduh</p>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN -->

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

        <!-- Modal Lihat Persetujuan -->
        <div class="modal fade" id="modalLihatPersetujuan" tabindex="-1" aria-labelledby="modalAddLihatLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content py-4 px-5 border-0">
                    <h3 class="modal-title px-3" id="modalAddLabel">
                        Detail Pengajuan
                    </h3>
                    <div class="modal-body">
                        <form action="">
                            <div class="form-row my-2">
                                <div class="form-group col-md-12">
                                    <label for="namaPolisi" class="font-weight-bold">Info Agenda Rapat</label>
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed corporis nobis iusto atque sapiente fugiat molestiae aspernatur deserunt consequuntur explicabo, commodi rerum minus odio necessitatibus, repudiandae nihil
                                        aperiam. Vero, laudantium!</p>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="px-3">
                        <a href="<?= base_url('ModulRapat/disetujui_persetujuan_rapat') ?>" class="btn btn-submit">
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

        <!-- END MODAL -->
    </main>

    

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="<?= base_url()?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url()?>assets/js/script.js"></script>
    <script>
        var baseurl = "<?= base_url() ?>";
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