<!-- MAIN -->
        <div class="content">
            <div class="col-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link text-center" href="<?= base_url('ModulATKManajer')?>">Persetujuan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="<?= base_url('ModulATKManajer/Pemesanan')?>">Pesan</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link text-center active" href="<?= base_url('ModulATKManajer/Riwayat')?>">Riwayat</a>
                    </li>
                </ul>
                <div class="card border-0 w-100 px-2 py-3" id="link-detail">
                    <div class="container-fluid">
                        <div class="row d-flex justify-content-between" style="float:right">
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
                                    <th scope="col">Subdit</th>
                                    <th scope="col">Tgl Pengajuan</th>
                                    <th scope="col">ATK</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Kantor BPK</td>
                                    <td>21-06-2020</td>
                                    <td>Kertas HVS (4 rim)</td>
                                    <td><a style="padding:2px 27px;" data-target="#mdlDiterima" data-toggle="modal" class="aktif-setuju font-weight-bold">Disetujui</a></td>
                                </tr>
                                <tr>
                                    <td>Kantor BPK</td>
                                    <td>21-06-2020</td>
                                    <td>Kertas HVS (4 rim)</td>
                                    <td><a style="padding:2px 35px;" data-target="#mdlDitolak" data-toggle="modal" class="aktif font-weight-bold">Ditolak</a></td>
                                </tr>
                                <tr>
                                    <td>Kantor BPK</td>
                                    <td>21-06-2020</td>
                                    <td>Kertas HVS (4 rim)</td>
                                    <td><a style="padding:2px 22px;" data-target="#mdlMenunggu" data-toggle="modal" class="menunggu font-weight-bold">Menunggu</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </section>
                </div>
            </div>
        </div>

        <!-- END MAIN -->

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

        <!-- MODAL -->

        <!--  -->

    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="<?= base_url('')?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('')?>assets/js/script.js"></script>
    <script type="text/javascript">
        function beriRating(th) {
            $('.papanrating').remove();
            var rating = $('.jos');
            if (th == '1') {
            rating.append('<img style="width: 25px;" src="<?= base_url()?>assets/img/icons/bintang.png" alt=""><img style="width: 25px;" src="<?= base_url()?>assets/img/icons/bintang_kosong.png" alt=""><imgstyle="width: 25px;"  src="<?= base_url()?>assets/img/icons/bintang_kosong.png" alt=""><img style="width: 25px;" src="<?= base_url()?>assets/img/icons/bintang_kosong.png" alt=""><img style="width: 25px;" src="<?= base_url()?>assets/img/icons/bintang_kosong.png" alt="">')
            $('#hasilRating').val(1);
            }else if(th == '2'){
            rating.append('<img style="width:20px" src="<?= base_url()?>assets/img/icons/bintang.png" alt=""></div><img style="width:20px" src="<?= base_url()?>assets/img/icons/bintang.png" alt=""></div></div><img style="width:20px" src="<?= base_url()?>assets/img/icons/bintang_kosong.png" alt=""></div><img style="width:20px" src="<?= base_url()?>assets/img/icons/bintang_kosong.png" alt=""></div><img style="width:20px" src="<?= base_url()?>assets/img/icons/bintang_kosong.png" alt=""></div>')
            $('#hasilRating').val(2);
            }else if (th == '3'){
            rating.append('<img style="width:20px;" src="<?= base_url()?>assets/img/icons/bintang.png" alt=""></div><img style="width:20px;" src="<?= base_url()?>assets/img/icons/bintang.png" alt=""></div><img style="width:20px;" src="<?= base_url()?>assets/img/icons/bintang.png" alt=""></div><img style="width:20px;" src="<?= base_url()?>assets/img/icons/bintang_kosong.png" alt=""></div><img style="width:20px;" src="<?= base_url()?>assets/img/icons/bintang_kosong.png" alt=""></div>')
            $('#hasilRating').val(3);
            }else if (th == '4'){
            rating.append('<img style="width:20px" src="<?= base_url()?>assets/img/icons/bintang.png" alt=""></div><img style="width:20px" src="<?= base_url()?>assets/img/icons/bintang.png" alt=""></div><img style="width:20px" src="<?= base_url()?>assets/img/icons/bintang.png" alt=""></div><img style="width:20px" src="<?= base_url()?>assets/img/icons/bintang.png" alt=""></div><img style="width:20px" src="<?= base_url()?>assets/img/icons/bintang_kosong.png" alt=""></div>')
            $('#hasilRating').val(4);
            }else if (th == '5'){
                rating.append('<img style="width:20px;" src="<?= base_url()?>assets/img/icons/bintang.png" alt=""></div><img style="width:20px;" src="<?= base_url()?>assets/img/icons/bintang.png" alt=""></div><img style="width:20px;" src="<?= base_url()?>assets/img/icons/bintang.png" alt=""></div><img style="width:20px;" src="<?= base_url()?>assets/img/icons/bintang.png" alt=""></div><img style="width:20px;" src="<?= base_url()?>assets/img/icons/bintang.png" alt=""></div>')
                $('#hasilRating').val(5);
            }
        }
        
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