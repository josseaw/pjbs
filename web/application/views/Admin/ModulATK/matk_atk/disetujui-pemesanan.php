<!-- MAIN -->
        <div class="content">
            <div class="col-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link text-center" href="<?= base_url('ModulATK')?>">ATK</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center active" href="<?= base_url('ModulATK/Persetujuan')?>">Persetujuan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="<?= base_url('ModulATK/Pemesanan')?>">Pesan</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link text-center" href="<?= base_url('ModulATK/Riwayat')?>">Riwayat</a>
                    </li>
                </ul>
                <div class="card border-0 w-100 px-5 py-3" id="link-detail">
                    <div class="pemesanan-disetujui">
                        <div class="row">
                            <div class="col-12">
                                <h4><b>Konfirmasi Persetujuan</b></h4>
                                <br/>
                                <div class="disetujui-pemesanan" style="border-radius:20px;">
                                    <div class="text-head">
                                        <!-- <h4>admin</h4> -->
                                        <h4>Karina Kusumadewi</h4>

                                        <!-- <span class="bg-danger">ditolak</span> -->
                                    </div>
                                    <div class="detail-pengajuan">
                                        <div class="detail-waktu-pemesanan">
                                            <div class="img-jam">
                                                <img src=<?php echo base_url("assets/img/icons/jam_coklat.png")?> alt="">
                                            </div>
                                            <div class="text-detail-pengajuan">
                                                <p>diajukan pada 18 September 2019</p>
                                            </div>
                                        </div>
                                       
                                    </div>
                                    <div class="detail-waktu">
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
                                <td colspan="3"><hr/></td>
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
                                <td colspan="3"><hr/></td>
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
                                <td colspan="3"><hr/></td>
                            </tr>
                        </table>
                                    </div>
                                    <div class="content-pemesanan">
                                        <div>
                                            <h2>Catatan Manajer</h2>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, dolore id. Tempore laborum voluptatum esse corporis libero. Quaerat, tempora at? Ab repellat quo quae dicta eveniet ullam dolore modi praesentium.</p>
                                        </div>
                                    </div>

                                </div>
                                <div class="catatan">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="namaPolisi"><h4><b>Catatan</b></h4></label>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <textarea name="" id="" cols="79" rows="7"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-l-554" style="float: left;margin: 0px;">
                                    <a href="<?= base_url('ModulATK/Persetujuan')?>">
                                        <button style="width: 200px;width: 400px;" class=" btn btn-primary ml-auto" type="submit">Konfirmasi Pengajuan</button>
                                    </a>
                                    <a href="<?= base_url('ModulATK/Persetujuan')?>">
                                        <button class="btn btn-primary ml-auto" style="background-color:white;color:black;width:230px;margin-left:10px;">Batal</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN -->

        <!-- Modal Notifikasi -->
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