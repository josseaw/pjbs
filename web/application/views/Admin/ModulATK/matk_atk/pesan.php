<!-- MAIN -->
        <div class="content">
            <div class="col-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link text-center" href="<?= base_url('ModulATK')?>">ATK</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="<?= base_url('ModulATK/Persetujuan')?>">Persetujuan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center active" href="<?= base_url('ModulATK/Pemesanan')?>">Pesan</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link text-center" href="<?= base_url('ModulATK/Riwayat')?>">Riwayat</a>
                    </li>
                </ul>
                 <div class="card border-0 w-100 px-1 py-3" id="link-detail">
                    <div class="py-2 px-2 border-0" style="margin-left: 50px;">
                            <div class="form-row my-4">
                                <div class="d-flex col-md-6">
                                    <label for="namaPolisi" class="col-md-4">Subdit</label>
                                    <input type="text" placeholder="Subdit" id="subdit" class="input-pengguna" />
                                </div>
                            </div>
                            <br/>
                            <span style="margin-left: 15px;">ATK Tersedia</span> 
                            <hr style="margin-left: 15px;" />
                            <div class="form-row my-4">
                                <div class="d-flex col-md-6">
                                    <label for="namaPolisi" class="col-md-4">Odner</label>
                                    <input type="checkbox" data-toggle="collapse" data-target="#collapseExample" id="odner" class="input-pengguna" />
                                </div>
                                
                                <div class="d-flex col-md-6">
                                    <label for="namaPolisi" class="col-md-4">Spidol Boardmaker</label>
                                    <input type="checkbox" id="spidol_board" class="input-pengguna" />
                                </div>
                            </div>
                            <div class="collapse" id="collapseExample" style="margin-left: 30px;">
                            <div class="form-row my-4">
                                <div class="d-flex col-md-5">
                                    <label for="namaPolisi" class="col-md-4">Merah</label>
                                    <input type="number" style="width: 100px;" id="merah" class="input-pengguna" />
                                </div>
                            </div>
                            <div class="form-row my-4">
                                <div class="d-flex col-md-5">
                                    <label for="namaPolisi" class="col-md-4">Hijau</label>
                                    <input type="number" style="width: 100px;" id="hijau" class="input-pengguna" />
                                </div>
                            </div>
                            <div class="form-row my-4">
                                <div class="d-flex col-md-5">
                                    <label for="namaPolisi" class="col-md-4">Biru</label>
                                    <input type="number" style="width: 100px;" id="biru" class="input-pengguna" />
                                </div>
                            </div>
                            <span style="color:#014188;font-size: 12px;">*jumlah dihitung dalam satuan (pcs)</span>
                            </div>
                            <div class="form-row my-4">
                                <div class="d-flex col-md-6">
                                    <label for="namaPolisi" class="col-md-4">Magazine File</label>
                                    <input type="checkbox" id="magazine" class="input-pengguna" />
                                </div>
                                <div class="d-flex col-md-6">
                                    <label for="namaPolisi" class="col-md-4">Spidol Permanent</label>
                                    <input type="checkbox" id="spidol_permanen" class="input-pengguna" />
                                </div>
                            </div>
                            <div class="form-row my-4">
                                <div class="d-flex col-md-6">
                                    <label for="namaPolisi" class="col-md-4">Kertas</label>
                                    <input type="checkbox" id="kertas" class="input-pengguna" />
                                </div>
                                <div class="d-flex col-md-6">
                                    <label for="namaPolisi" class="col-md-4">Stabilo</label>
                                    <input type="checkbox" id="stabilo" class="input-pengguna" />
                                </div>
                            </div>
                            <div class="form-row my-4">
                                <div class="d-flex col-md-6">
                                    <label for="namaPolisi" class="col-md-4">Buku</label>
                                    <input type="checkbox" id="buku" class="input-pengguna" />
                                </div>
                                <div class="d-flex col-md-6">
                                    <label for="namaPolisi" class="col-md-4">Pensil</label>
                                    <input type="checkbox" id="pensil" class="input-pengguna" />
                                </div>
                            </div>
                            <div class="form-row my-4">
                                <div class="d-flex col-md-6">
                                    <label for="namaPolisi" class="col-md-4">Bolpoin</label>
                                    <input type="checkbox" id="bolpoin" class="input-pengguna" />
                                </div>
                                
                            </div>
                            <div class="center-pengguna m-pengguna">
                                <button data-target="#modalAdd" data-toggle="modal" class="btn-jos btn btn-danger" type="button">Pesan ATK</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN -->

        <!-- MODAL -->

        <!-- Modal Tambah Kendaraan -->
        <div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="modalAddLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content py-4 px-5 border-0">
                    <h4 class="modal-title px-3" id="modalAddLabel">
                        Konfirmasi Permintaan ATK
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
                        <center>
                        <button data-target="#modalSuntingPersetujuan" data-toggle="modal" class="btn-jos btn btn-danger" type="button">Pesan ATK</button>
                    </center>
                        <!-- <button type="button" class="btn btn-cancel" data-dismiss="modal">Batal</button> -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Notifikasi Submit Persetujuan --> 
        <div class="modal fade" id="modalSuntingPersetujuan" tabindex="-1" aria-labelledby="modalAddLihatLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content py-4 px-5 border-0">
                    <div class="modal-body" style="margin-top: 20px;margin-bottom: 20px;">
                        <div><center><img src="<?= base_url('')?>assets/img/icons/ctg_notif.PNG"></center></div>
                        <center><span><p style="color:#014188;font-weight: bold;">Pengajuan terkirim!</p></span></center>
                        <center><span><p style="">Pengajuan pemesanan ATK Anda <br/>sudah terkirim. Mohon tunggu persetujuan<br/> manajer dan admin sebelum melakukan perjalanan!</p></span></center>
                        <br/>
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