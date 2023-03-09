        <!-- MAIN -->
        <div class="content">
            <div class="col-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link text-center active" href="<?= base_url('ModulRapat')?>">Monitoring Ruang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="<?= base_url('ModulRapat/reservasi')?>">Reservasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="<?= base_url('ModulRapat/persetujuan')?>">Persetujuan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="<?= base_url('ModulRapat/agenda')?>">Agenda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="<?= base_url('ModulRapat/riwayat')?>">Riwayat</a>
                    </li>
                </ul>
                <div class="card border-0 w-100 px-2 py-3" id="link-detail">
                    <div class="container-fluid">
                        <div class="row d-flex justify-content-between">
                            <button class="btn btn-plus py-1 px-2 mb-3 mb-sm-0" data-toggle="modal" data-target="#modalAdd">+ Tambah Ruangan</button>
                            <div class="filter d-flex flex-row"><button class="btn btn-filter py-1 px-3 d-flex flex-row">    <img src="assets/img/icons/filter_biru.png" alt="Filter" class="img-fluid mr-2"/>    <span>Filter</span></button>
                                <form class="ml-4">
                                    <div class="input-group input-group--custom"> <input type="text" class="form-control" placeholder="Cari..." />
                                        <div class="input-group-append--custom"> <button class="btn btn-primary" type="button"><img src="assets/img/icons/search_putih.png" class="topbar__search-icn"/></button></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <section class="table-responnsive mt-4">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col"><button class="btn btn-minus">&minus;</button></th>
                                    <th scope="col">ID Ruangan</th>
                                    <th scope="col">Nama Ruangan</th>
                                    <th scope="col">Fasilitas</th>
                                    <th scope="col">Kapasitas Ruangan</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="check" data-toggle="collapse" data-target="#multiCollapseExample">
                                        <div class="checkbox"><input type="checkbox" id="checkbox" aria-label="Checkbox for following text input" /><label for="checkbox"></label></div>
                                    </td>
                                    <td>R0001</td>
                                    <td>Ruang Turbin</td>
                                    <td>Sound system, Proyektor</td>
                                    <td>17</td>
                                    <td><span class="tersedia">Tersedia</span></td>
                                </tr>
                                <tr>
                                    <td class="check" data-toggle="collapse" data-target="#multiCollapseExample1">
                                        <div class="checkbox"><input type="checkbox" id="checkbox1" aria-label="Checkbox for following text input" /><label for="checkbox1"></label></div>
                                    </td>
                                    <td>R0002</td>
                                    <td>Ruang Generator</td>
                                    <td>Sound system, Proyektor</td>
                                    <td>17</td>
                                    <td><span class="tersedia">Tersedia</span></td>
                                </tr>
                                <tr>
                                    <td class="check" data-toggle="collapse" data-target="#multiCollapseExample2">
                                        <div class="checkbox"><input type="checkbox" id="checkbox2" aria-label="Checkbox for following text input" /><label for="checkbox2"></label></div>
                                    </td>
                                    <td>R0001</td>
                                    <td>Ruang Turbin</td>
                                    <td>Sound system, Proyektor</td>
                                    <td>17</td>
                                    <td><span class="tidaktersedia">Tidak Tersedia</span></td>
                                </tr>
                                <tr>
                                    <td class="check" data-toggle="collapse" data-target="#multiCollapseExample3">
                                        <div class="checkbox"><input type="checkbox" id="checkbox3" aria-label="Checkbox for following text input" /><label for="checkbox3"></label></div>
                                    </td>
                                    <td>R0002</td>
                                    <td>Ruang Generator</td>
                                    <td>Sound system, Proyektor</td>
                                    <td>17</td>
                                    <td><span class="tidaktersedia">Tidak Tersedia</span></td>
                                </tr>
                                <tr>
                                    <td class="check" data-toggle="collapse" data-target="#multiCollapseExample4">
                                        <div class="checkbox"><input type="checkbox" id="checkbox4" aria-label="Checkbox for following text input" /><label for="checkbox4"></label></div>
                                    </td>
                                    <td>R0001</td>
                                    <td>Ruang Turbin</td>
                                    <td>Sound system, Proyektor</td>
                                    <td>17</td>
                                    <td><span class="tersedia">Tersedia</span></td>
                                </tr>
                                <tr>
                                    <td class="check" data-toggle="collapse" data-target="#multiCollapseExample5">
                                        <div class="checkbox"><input type="checkbox" id="checkbox5" aria-label="Checkbox for following text input" /><label for="checkbox5"></label></div>
                                    </td>
                                    <td>R0002</td>
                                    <td>Ruang Generator</td>
                                    <td>Sound system, Proyektor</td>
                                    <td>17</td>
                                    <td><span class="tidaktersedia">Tidak Tersedia</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </section>
                </div>
            </div>
        </div>
        <!-- END MAIN -->

        <!-- Form Modal Hapus, Sunting, Lihat -->
        <div class="from-modal collapse" id="multiCollapseExample">
            <div class="row" data-target="#multiCollapseExample" onchange="$('#checkbox').prop('checked', false);" data-dismiss="alert">
                <!-- <div class="tanda-close">
                    <span></span>
                    <span></span>
                </div> -->
                <div class="text-from">
                    <h4>2 data terpilih</h4>
                </div>
                <div class="from hapus" data-toggle="modal" data-target="#multiHapus"><span class="img-from"><img src="assets/img/icons/hapus.png" alt=""></span>
                    <h4>Hapus</h4>
                </div>
            </div>
        </div>
        <div class="from-modal collapse" id="multiCollapseExample1">
            <div class="row">
                <!-- <div class="tanda-close">
                    <span></span>
                    <span></span>
                </div> -->
                <div class="text-from">
                    <h4>2 data terpilih</h4>
                </div>
                <div class="from hapus" data-toggle="modal" data-target="#multiHapus"><span class="img-from"><img src="assets/img/icons/hapus.png" alt=""></span>
                    <h4>Hapus</h4>
                </div>
            </div>
        </div>
        <div class="from-modal collapse" id="multiCollapseExample2">
            <div class="row">
                <<!-- div class="tanda-close">
                    <span></span>
                    <span></span>
                </div> -->
                <div class="text-from">
                    <h4>2 data terpilih</h4>
                </div>
                <div class="from hapus" data-toggle="modal" data-target="#multiHapus"><span class="img-from"><img src="assets/img/icons/hapus.png" alt=""></span>
                    <h4>Hapus</h4>
                </div>
            </div>
        </div>
        <div class="from-modal collapse" id="multiCollapseExample3">
            <div class="row">
                <div class="tanda-close">
                    <span></span>
                    <span></span>
                </div>
                <div class="text-from">
                    <h4>2 data terpilih</h4>
                </div>
                <div class="from hapus" data-toggle="modal" data-target="#multiHapus"><span class="img-from"><img src="assets/img/icons/hapus.png" alt=""></span>
                    <h4>Hapus</h4>
                </div>
            </div>
        </div>
        <div class="from-modal collapse" id="multiCollapseExample4">
            <div class="row">
                <div class="tanda-close">
                    <span></span>
                    <span></span>
                </div>
                <div class="text-from">
                    <h4>2 data terpilih</h4>
                </div>
                <div class="from hapus" data-toggle="modal" data-target="#multiHapus"><span class="img-from"><img src="assets/img/icons/hapus.png" alt=""></span>
                    <h4>Hapus</h4>
                </div>
            </div>
        </div>
        <div class="from-modal collapse" id="multiCollapseExample5">
            <div class="row">
                <div class="tanda-close">
                    <span></span>
                    <span></span>
                </div>
                <div class="text-from">
                    <h4>2 data terpilih</h4>
                </div>
                <div class="from hapus" data-toggle="modal" data-target="#multiHapus"><span class="img-from"><img src="assets/img/icons/hapus.png" alt=""></span>
                    <h4>Hapus</h4>
                </div>
            </div>
        </div>
        <!-- END -->

        <!-- MODAL -->

        <!-- Modal Tambah Kendaraan -->
        <div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="modalAddLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content py-4 px-5 border-0">
                    <h3 class="modal-title px-3" id="modalAddLabel">
                        Tambah Ruangan
                    </h3>
                    <div class="modal-body">
                        <form action="">
                            <div class="form-row my-2">
                                <div class="form-group col-md-6">
                                    <label for="namaPolisi">ID Ruangan</label>
                                    <input type="text" class="form-control" id="namaPolisi" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Kapasitas Ruangan</label>
                                    <input type="text" class="form-control" id="namaPolisi" />
                                </div>
                            </div>
                            <div class="form-row my-2">
                                <div class="form-group col-md-6">
                                    <label for="namaKendaraan">Nama Ruangan</label>
                                    <input type="text" class="form-control" id="namaKendaraan" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Status</label>
                                    <select id="Pilih Status" class="form-control">
                                        <option value="">Pilih Status</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row my-2">
                                <div class="form-group col-md-6">
                                    <label for="namaKendaraan">Fasilitas</label>
                                    <input type="text" class="form-control" id="namaKendaraan" />
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="px-3">
                        <button type="button" class="btn btn-submit" data-dismiss="modal">
                             Tambah Ruangan
                        </button>
                        <button type="button" class="btn btn-cancel" data-dismiss="modal">Batal</button>
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
        <!-- END MODAL -->
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/plugins/datejs/build/date.js')?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/plugins/datejs/build/date-id-ID.js')?>"></script>
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