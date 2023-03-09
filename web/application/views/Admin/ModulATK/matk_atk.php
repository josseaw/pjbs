<!-- MAIN -->
        <div class="content">
            <div class="col-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link text-center active" href="<?= base_url('ModulATK')?>">ATK</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="<?= base_url('ModulATK/Persetujuan')?>">Persetujuan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="<?= base_url('ModulATK/Pemesanan')?>">Pesan</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link text-center" href="<?= base_url('ModulATK/Riwayat')?>">Riwayat</a>
                    </li>
                </ul>
                <div class="card border-0 w-100 px-2 py-3" id="link-detail">
                    <div class="container-fluid">
                        <div class="row d-flex justify-content-between">
                            <button style="width: 150px;" class="btn btn-plus py-1 px-2 mb-3 mb-sm-0" data-toggle="modal" data-target="#modalAdd">+ Tambah ATK</button>
                            <div class="filter d-flex flex-row">
                                <form class="ml-4">
                                    <div class="input-group input-group--custom"> <input type="text" class="form-control" placeholder="Cari..." />
                                        <div class="input-group-append--custom"> <button class="btn btn-primary" type="button"><img src="<?= base_url('')?>assets/img/icons/search_putih.png" class="topbar__search-icn"/></button></div>
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
                                    <th scope="col">Nama ATK</th>
                                    <th scope="col">Pilihan</th>
                                    <th scope="col">Satuan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="check" data-toggle="collapse" data-target="#multiCollapseExample">
                                        <div class="checkbox"><input type="checkbox" id="checkbox" aria-label="Checkbox for following text input" /><label for="checkbox"></label></div>
                                    </td>
                                    <td>Kertas A4 (1234)</td>
                                    <td>Merah</td>
                                    <td>pcs</td>
                                </tr>
                                <tr>
                                    <td class="check" data-toggle="collapse" data-target="#multiCollapseExample1">
                                        <div class="checkbox"><input type="checkbox" id="checkbox1" aria-label="Checkbox for following text input" /><label for="checkbox1"></label></div>
                                    </td>
                                    <td>Kertas A4 (1234)</td>
                                    <td>Merah</td>
                                    <td>pcs</td>
                                </tr>
                                <tr>
                                    <td class="check" data-toggle="collapse" data-target="#multiCollapseExample2">
                                        <div class="checkbox"><input type="checkbox" id="checkbox2" aria-label="Checkbox for following text input" /><label for="checkbox2"></label></div>
                                    </td>
                                    <td>Kertas A4 (1234)</td>
                                    <td>Merah</td>
                                    <td>pcs</td>
                                </tr>
                                <tr>
                                    <td class="check" data-toggle="collapse" data-target="#multiCollapseExample3">
                                        <div class="checkbox"><input type="checkbox" id="checkbox3" aria-label="Checkbox for following text input" /><label for="checkbox3"></label></div>
                                    </td>
                                    <td>Kertas A4 (1234)</td>
                                    <td>Merah</td>
                                    <td>pcs</td>
                                </tr>
                                <tr>
                                    <td class="check" data-toggle="collapse" data-target="#multiCollapseExample4">
                                        <div class="checkbox"><input type="checkbox" id="checkbox4" aria-label="Checkbox for following text input" /><label for="checkbox4"></label></div>
                                    </td>
                                    <td>Kertas A4 (1234)</td>
                                    <td>Merah</td>
                                    <td>pcs</td>
                                </tr>
                                <tr>
                                    <td class="check" data-toggle="collapse" data-target="#multiCollapseExample5">
                                        <div class="checkbox"><input type="checkbox" id="checkbox5" aria-label="Checkbox for following text input" /><label for="checkbox5"></label></div>
                                    </td>
                                    <td>Kertas A4 (1234)</td>
                                    <td>Merah</td>
                                    <td>pcs</td>
                                </tr>
                            </tbody>
                        </table>
                    </section>
                </div>
                <div id="riwayat-pemesanan-table">
                    <div class="card border-0 w-100 px-2 py-3 my-4">
                        <div class="container-fluid">
                            <div class="row d-flex justify-content-between">
                                <h4>Monitoring Permintaan ATK</h4>
                                <div class="filter d-flex flex-row"> <button class="btn btn-filter py-1 px-3 d-flex flex-row" data-toggle="collapse" data-target="#collapseExample"><img src=<?php echo base_url("assets/img/icons/filter_biru.png")?>          alt="Filter"          class="img-fluid mr-2"        />        <span>Filter</span>      </button>
                                    <form class="ml-4">
                                        <div class="input-group input-group--custom"> <input type="text" class="form-control" placeholder="Cari..." />
                                            <div class="input-group-append--custom"> <button class="btn btn-primary" type="button"><img src=<?php echo base_url("assets/img/icons/search_putih.png")?> class="topbar__search-icn"/></button> </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="collapse" id="collapseExample">
                                <div class="list-filter p-700" style="margin-left: 700px;">
                                    <div class="list mx-3">
                                        <p>Divisi</p>
                                        <select style="width: 150px;margin-right: 5px;border-radius:50px;border: 1px solid #014188" id="Pilih Status" class="form-control">
                                            <option value="">Semua</option>
                                        </select>
                                    </div>
                                    <div class="list mx-3">
                                        <p>Tahun</p>
                                        <select style="width: 150px;margin-right: 5px;border-radius:50px;border: 1px solid #014188" id="Pilih Status" class="form-control">
                                            <option value="">Semua</option>
                                        </select>
                                    </div>
                                    <div class="list mx-3">
                                        <p>Bulan</p>
                                        <select style="width: 150px;margin-right: 5px;border-radius:50px;border: 1px solid #014188" id="Pilih Status" class="form-control">
                                            <option value="">Semua</option>
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
                                        <th scope="col">Nama ATK</th>
                                        <th scope="col">Pilihan</th>
                                        <th scope="col">Jumlah Pemesanan</th>
                                        <th scope="col">Satuan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="check">
                                            <div class="checkbox"> <input type="checkbox" id="checkbox" aria-label="Checkbox for following text input" /> <label for="checkbox"></label> </div>
                                        </td>
                                        <td>Bolpoin</td>
                                        <td>Merah <br/> Kuning <br/> Hijau</td>
                                        <td>5 <br/> 10 <br/> 20</td>
                                        <td>pcs</td>
                                    </tr>
                                    <tr>
                                        <td class="check">
                                            <div class="checkbox"> <input type="checkbox" id="checkbox" aria-label="Checkbox for following text input" /> <label for="checkbox"></label> </div>
                                        </td>
                                        <td>Bolpoin</td>
                                        <td>Merah <br/> Kuning <br/> Hijau</td>
                                        <td>5 <br/> 10 <br/> 20</td>
                                        <td>pcs</td>
                                    </tr>
                                    <tr>
                                        <td class="check">
                                            <div class="checkbox"> <input type="checkbox" id="checkbox" aria-label="Checkbox for following text input" /> <label for="checkbox"></label> </div>
                                        </td>
                                        <td>Bolpoin</td>
                                        <td>Merah <br/> Kuning <br/> Hijau</td>
                                        <td>5 <br/> 10 <br/> 20</td>
                                        <td>pcs</td>
                                    </tr>
                                    <tr>
                                        <td class="check">
                                            <div class="checkbox"> <input type="checkbox" id="checkbox" aria-label="Checkbox for following text input" /> <label for="checkbox"></label> </div>
                                        </td>
                                        <td>Bolpoin</td>
                                        <td>Merah <br/> Kuning <br/> Hijau</td>
                                        <td>5 <br/> 10 <br/> 20</td>
                                        <td>pcs</td>
                                    </tr>
                                    <tr>
                                        <td class="check">
                                            <div class="checkbox"> <input type="checkbox" id="checkbox" aria-label="Checkbox for following text input" /> <label for="checkbox"></label> </div>
                                        </td>
                                        <td>Bolpoin</td>
                                        <td>Merah <br/> Kuning <br/> Hijau</td>
                                        <td>5 <br/> 10 <br/> 20</td>
                                        <td>pcs</td>
                                    </tr>
                                    <tr>
                                        <td class="check">
                                            <div class="checkbox"> <input type="checkbox" id="checkbox" aria-label="Checkbox for following text input" /> <label for="checkbox"></label> </div>
                                        </td>
                                        <td>Bolpoin</td>
                                        <td>Merah <br/> Kuning <br/> Hijau</td>
                                        <td>5 <br/> 10 <br/> 20</td>
                                        <td>pcs</td>
                                    </tr>
                                </tbody>
                            </table>
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
                    <h4>2 data terpilih</h4>
                </div>
                <div class="from sunting" data-toggle="modal" data-target="#modalSuntingATK"><span class="img-from"><img src="assets/img/icons/edit.png" alt=""></span>
                    <h4>Sunting</h4>
                </div>
                <div class="from hapus" data-toggle="modal" data-target="#multiHapus"><span class="img-from"><img src="assets/img/icons/hapus.png" alt=""></span>
                    <h4>Hapus</h4>
                </div>
            </div>
        </div>

        <!-- Modal Tambah ATK -->
        <div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="modalAddLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content py-4 px-5 border-0">
                    <h3 class="modal-title px-3" id="modalAddLabel">
                        Tambah ATK
                    </h3>
                    <div class="modal-body">
                        <form action="">
                            <div class="form-row my-2">
                                <div class="form-group col-md-6">
                                    <label for="namaPolisi">Nama ATK</label>
                                    <input type="text" class="form-control" id="namaPolisi" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Pilihan</label>
                                    <input type="text" class="form-control" id="namaPolisi" />
                                </div>
                            </div>
                            <div class="form-row my-2">
                                <div class="form-group col-md-6">
                                    <label for="namaKendaraan">Satuan</label>
                                    <input type="text" class="form-control" id="namaKendaraan" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4"></label>
                                    <button style="margin-left: 60%;" type="button" class="btn btn-primary btn-sm"> + Tambah Pilihan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="px-3">
                        <button type="button" class="btn btn-submit" data-dismiss="modal">
                             Tambah ATK
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


         <div class="modal fade" id="modalSuntingATK" tabindex="-1" aria-labelledby="modalAddLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content py-4 px-5 border-0">
                    <h3 class="modal-title px-3" id="modalAddLabel">
                        Sunting ATK
                    </h3>
                    <div class="modal-body">
                        <form action="">
                            <div class="form-row my-2">
                                <div class="form-group col-md-6">
                                    <label for="namaPolisi">Nama ATK</label>
                                    <input type="text" class="form-control" id="namaPolisi" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Pilihan 1</label>
                                    <input type="text" class="form-control" placeholder="Merah" id="namaKendaraan" />
                                </div>
                            </div>
                            <div class="form-row my-2">
                                <div class="form-group col-md-6">
                                    <label for="namaKendaraan">Satuan</label>
                                    <input type="text" class="form-control" id="namaPolisi" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Pilihan 2</label>
                                    <input type="text" class="form-control" placeholder="Biru" id="namaKendaraan" />
                                </div>
                            </div>
                            <div class="form-row my-2">
                                <div class="form-group col-md-6">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Pilihan 3</label>
                                    <input type="text" class="form-control" placeholder="Kuning" id="namaKendaraan" />
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="px-3">
                        <button type="button" class="btn btn-submit" data-dismiss="modal">
                             Sunting ATK
                        </button>
                        <button type="button" class="btn btn-cancel" data-dismiss="modal">Batal</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalLihatPersetujuan" tabindex="-1" aria-labelledby="modalLihatPersetujuanLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content py-4 px-5 border-0">
                    <h4 class="modal-title px-3" id="modalAddLabel">
                        Detail Pengajuan
                    </h4>
                    <div class="modal-body">
                        <table style="width: 100%" border="0">
                            <tr>
                                <td colspan="3">ATK</td>
                            </tr>
                            <tr>
                                <td style="width: 5%"><div class="dot"></div></td>
                                <td colspan="2">Odner (1465)</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Merah</td>
                                <td>2pcs</td>
                            </tr>
                            <tr>
                                <td style="width: 5%"><div class="dot"></div></td>
                                <td colspan="2">Odner (1465)</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Merah</td>
                                <td>2pcs</td>
                            </tr>
                            <tr>
                                <td style="width: 5%"><div class="dot"></div></td>
                                <td colspan="2">Odner (1465)</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Merah</td>
                                <td>2pcs</td>
                            </tr>
                        </table>
                                <h4>Catatan Manajer</h4>
                                <p>Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet</p>

                                <h4>Catatan Admin</h4>
                                <p>Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet</p>
                    
                        <div class="px-3">
                            <center>
                                <a href="<?php echo base_url("ModulATK/SetujuiPemesanan")?>" class="btn btn-submit">
                                    Setujui
                                </a>
                                <a href="<?php echo base_url("ModulATK/TolakPemesanan")?>"><button type="button" class="btn btn-cancel" >Tolak</button></a>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="mdlDetailNotifikasi" tabindex="-1" aria-labelledby="modalAddLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content py-4 px-5 border-0">
                    <h4 class="modal-title px-3" id="modalAddLabel">
                        Detail
                    </h4>
                    <div class="modal-body">
                        <table style="width: 100%" border="0">
                            <tr>
                                <td colspan="3">ATK</td>
                            </tr>
                            <tr>
                                <td style="width: 5%"><div class="dot"></div></td>
                                <td colspan="2">Odner (1465)</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Merah</td>
                                <td>2pcs</td>
                            </tr>
                            <tr>
                                <td style="width: 5%"><div class="dot"></div></td>
                                <td colspan="2">Odner (1465)</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Merah</td>
                                <td>2pcs</td>
                            </tr>
                            <tr>
                                <td style="width: 5%"><div class="dot"></div></td>
                                <td colspan="2">Odner (1465)</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Merah</td>
                                <td>2pcs</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
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