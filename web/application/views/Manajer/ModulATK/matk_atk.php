<!-- MAIN -->
        <div class="content">
            <div class="col-12">
                 <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link text-center active" href="<?= base_url('ModulATKManajer')?>">Persetujuan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="<?= base_url('ModulATKManajer/Pemesanan')?>">Pesan</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link text-center" href="<?= base_url('ModulATKManajer/Riwayat')?>">Riwayat</a>
                    </li>
                </ul>
                <div class="card border-0 w-100 px-2 py-3" id="link-detail-persetujuan">
                    <div class="container-fluid">
                        <div class="row d-flex justify-content-between">
                            <a href="<?= base_url('ModulATKManajer/Pemesanan')?>"><button style="width: 150px;" class="btn btn-plus py-1 px-2 mb-3 mb-sm-0">+ Pesan ATK</button></a>
                            <div class="filter d-flex flex-row">
                                <button class="btn btn-filter py-1 px-3 d-flex flex-row">    
                                    <img src=<?php echo base_url("assets/img/icons/filter_biru.png")?> alt="Filter" class="img-fluid mr-2"/>    
                                    <span>Filter</span>
                                </button>
                                <form class="ml-4">
                                    <div class="input-group input-group--custom"> <input type="text" class="form-control" placeholder="Cari..." />
                                        <div class="input-group-append--custom"> <button class="btn btn-primary" type="button">
                                            <img src=<?php echo base_url("assets/img/icons/search_putih.png")?> class="topbar__search-icn"/>
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
                                    <th scope="col">Tgl Pengajuan</th>
                                    <th scope="col">Subdit</th>
                                    <th scope="col">ATK</th>
                                    <th scope="col">Persetujuan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <a href=<?php echo base_url("ModulKendaraan/detail_persetujuan")?>>
                                        Karina Kusumadewi
                                        </a>
                                    </td>
                                    <td>
                                        <a href=<?php echo base_url("ModulKendaraan/detail_persetujuan")?>>16/09/2020</a>
                                    </td>
                                    <td>
                                       Kantor BPKP
                                    </td>
                                    <td>
                                        Pensil, Bolpoin, Penghapus, Marker Board
                                    </td>
                                    <td class="d-flex " data-toggle="modal" data-target="#modalLihatPersetujuan">
                                        <div class="table-centang mx-1 bg-v-blue"><span></span><span></span></div>
                                        <div class="table-close mx-1" data-toggle="modal"><span></span><span></span></div>
                                    </td>
                                </tr>
                                <tr>
                                    
                            </tbody>
                        </table>
                    </section>
                </div>
                <div id="riwayat-pemesanan-table">
                    <div class="card border-0 w-100 px-2 py-3 my-4">
                        <div class="container-fluid">
                            <div class="row d-flex justify-content-between">
                                <h4>Riwayat Pemesanan</h4>
                                <div class="filter d-flex flex-row"> <button class="btn btn-filter py-1 px-3 d-flex flex-row" data-toggle="collapse" data-target="#collapseExample"><img src="<?php echo base_url("assets/img/icons/filter_biru.png")?> "         alt="Filter"          class="img-fluid mr-2"        />        <span>Filter</span>      </button>
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
                                        <th scope="col">Nama Pemesanan</th>
                                        <th scope="col">Tgl Pengajuan</th>
                                        <th scope="col">Subdit</th>
                                        <th scope="col">ATK</th>
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
                                        <td>Subdit</td>
                                        <td>Odner (1465), Kertas Buku, Magazine File, Stabilo</td>
                                        <td><a data-toggle="modal" data-target="#mdlMenunggu" class="btn btn-warning btn-sm" style="color:white;width:120px;"><b>Berlangsung</b></a></td>
                                    </tr>
                                    <tr>
                                        <td class="check">
                                            <div class="checkbox"> <input type="checkbox" id="checkbox" aria-label="Checkbox for following text input" /> <label for="checkbox"></label> </div>
                                        </td>
                                        <td>Karina Kusumadewi</td>
                                        <td>16/09/2020</td>
                                        <td>Subdit</td>
                                        <td>Odner (1465), Kertas Buku, Magazine File, Stabilo</td>
                                        <td><a data-toggle="modal" data-target="#mdlDitolak" class="aktif font-weight-bold">Ditolak</a></td>
                                    </tr>
                                    <tr>
                                        <td class="check">
                                            <div class="checkbox"> <input type="checkbox" id="checkbox" aria-label="Checkbox for following text input" /> <label for="checkbox"></label> </div>
                                        </td>
                                        <td>Karina Kusumadewi</td>
                                        <td>16/09/2020</td>
                                        <td>Subdit</td>
                                        <td>Odner (1465), Kertas Buku, Magazine File, Stabilo</td>
                                        <td><a class="aktif font-weight-bold">Ditolak</a></td>
                                    </tr>
                                    <tr>
                                        <td class="check">
                                            <div class="checkbox"> <input type="checkbox" id="checkbox" aria-label="Checkbox for following text input" /> <label for="checkbox"></label> </div>
                                        </td>
                                        <td>Karina Kusumadewi</td>
                                        <td>16/09/2020</td>
                                        <td>Subdit</td>
                                        <td>Odner (1465), Kertas Buku, Magazine File, Stabilo</td>
                                        <td><a class="aktif font-weight-bold">Ditolak</a></td>
                                    </tr>
                                    <tr>
                                        <td class="check">
                                            <div class="checkbox"> <input type="checkbox" id="checkbox" aria-label="Checkbox for following text input" /> <label for="checkbox"></label> </div>
                                        </td>
                                        <td>Karina Kusumadewi</td>
                                        <td>16/09/2020</td>
                                        <td>Subdit</td>
                                        <td>Odner (1465), Kertas Buku, Magazine File, Stabilo</td>
                                        <td><a data-toggle="modal" data-target="#mdlDiterima" class="aktif-setuju font-weight-bold">Diterima</a></td>
                                    </tr>
                                    <tr>
                                        <td class="check">
                                            <div class="checkbox"> <input type="checkbox" id="checkbox" aria-label="Checkbox for following text input" /> <label for="checkbox"></label> </div>
                                        </td>
                                        <td>Karina Kusumadewi</td>
                                        <td>16/09/2020</td>
                                        <td>Subdit</td>
                                        <td>Odner (1465), Kertas Buku, Magazine File, Stabilo</td>
                                        <td><a class="aktif-setuju font-weight-bold">Diterima</a></td>
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

        <!-- MODAL -->

        <!-- Modal Sunting Persetujuan -->
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
                                <a href="<?php echo base_url("ModulATKManajer/SetujuiPemesanan")?>" class="btn btn-submit">
                                    Setujui
                                </a>
                                <a href="<?php echo base_url("ModulATKManajer/TolakPemesanan")?>"><button type="button" class="btn btn-cancel" >Tolak</button></a>
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

        <div class="modal fade" id="mdlDiterima" tabindex="-1" aria-labelledby="mdlTestLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
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
                                <h4>Catatan Manajer</h4>
                                <p>Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet</p>

                                <h4>Catatan Admin</h4>
                                <p>Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet</p>
                                    <div class="penilaian-komentar">
                                        <div class="penilaian">
                                            <p>Penilaian</p>
                                            <div class="papanrating">
                                                <button onclick="beriRating(1)" class="btn btn-primary" style="width: 50px;height: auto;font-size: 10px;"><b> + 1 </b></button>
                                                <button onclick="beriRating(2)" class="btn btn-primary" style="width: 50px;height: auto;font-size: 10px;"><b> + 2 </b></button>
                                                <button onclick="beriRating(3)" class="btn btn-primary" style="width: 50px;height: auto;font-size: 10px;"><b> + 3 </b></button>
                                                <button onclick="beriRating(4)" class="btn btn-primary" style="width: 50px;height: auto;font-size: 10px;"><b> + 4 </b></button>
                                                <button onclick="beriRating(5)" class="btn btn-primary" style="width: 50px;height: auto;font-size: 10px;"><b> + 5 </b></button>
                                                <input type="hidden" id="hasilRating" value=''>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="penilaian my-2">
                                        <p>Komentar</p>
                                        <textarea name="komentar" id="komentar" cols="60" rows="5"></textarea>
                                    </div>
                                    <div class="px-3">
                                        <center>
                                            <a href=<?php echo base_url("ModulKendaraan/detail_sopir")?> class="btn btn-submit">
                                            Kirim</a>
                                        <button type="button" class="btn btn-cancel" data-dismiss="modal" data-toggle="modal" data-target="#modalSuntingPersetujuan">Kembali</button>
                                        </center>
                                    </div>

                        </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="mdlDitolak" tabindex="-1" aria-labelledby="mdlTest2Label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
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
                        <h4>Catatan Manajer</h4>
                        <p>Lorem Ipsum Dolor Sit AmetLorem Ipsum Dolor Sit AmetLorem Ipsum Dolor Sit AmetLorem Ipsum Dolor Sit AmetLorem Ipsum Dolor Sit AmetLorem Ipsum Dolor Sit AmetLorem Ipsum Dolor Sit AmetLorem Ipsum Dolor Sit AmetLorem Ipsum Dolor Sit AmetLorem Ipsum Dolor Sit AmetLorem Ipsum Dolor Sit Amet</p>

                        <p>Lorem Ipsum Dolor Sit AmetLorem Ipsum Dolor Sit AmetLorem Ipsum Dolor Sit AmetLorem Ipsum Dolor Sit AmetLorem Ipsum Dolor Sit AmetLorem Ipsum Dolor Sit AmetLorem Ipsum Dolor Sit AmetLorem Ipsum Dolor Sit AmetLorem Ipsum Dolor Sit AmetLorem Ipsum Dolor Sit AmetLorem Ipsum Dolor Sit Amet</p>

                        <h4>Catatan Admin</h4>
                        <p>Lorem Ipsum Dolor Sit AmetLorem Ipsum Dolor Sit AmetLorem Ipsum Dolor Sit AmetLorem Ipsum Dolor Sit AmetLorem Ipsum Dolor Sit AmetLorem Ipsum Dolor Sit AmetLorem Ipsum Dolor Sit AmetLorem Ipsum Dolor Sit AmetLorem Ipsum Dolor Sit AmetLorem Ipsum Dolor Sit AmetLorem Ipsum Dolor Sit Amet</p>

                        <p>Lorem Ipsum Dolor Sit AmetLorem Ipsum Dolor Sit AmetLorem Ipsum Dolor Sit AmetLorem Ipsum Dolor Sit AmetLorem Ipsum Dolor Sit AmetLorem Ipsum Dolor Sit AmetLorem Ipsum Dolor Sit AmetLorem Ipsum Dolor Sit AmetLorem Ipsum Dolor Sit AmetLorem Ipsum Dolor Sit AmetLorem Ipsum Dolor Sit Amet</p>
                            <div class="px-3">
                                <center><a href=<?php echo base_url("ModulKendaraan/detail_sopir")?> class="btn btn-submit">
                                        Pesan Ulang</a>
                                        <button type="button" class="btn btn-cancel" data-dismiss="modal" data-toggle="modal" data-target="#modalSuntingPersetujuan">Tutup</button>
                                </center>
                            </div>
                        </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="mdlMenunggu" tabindex="-1" aria-labelledby="modalAddLabel" aria-hidden="true">
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
                        <div class="px-3">
                                        <button style="float:right;" type="button" class="btn btn-cancel" data-dismiss="modal" data-toggle="modal" data-target="#modalSuntingPersetujuan">Tutup</button>
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