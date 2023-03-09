        <!-- MAIN -->
        <div class="content">
            <div class="col-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link text-center active" href="<?= base_url('ModulATKUser/Pesan')?>">Pesan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="<?= base_url('ModulATKUser/Riwayat')?>">Riwayat</a>
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
                                    <input type="checkbox" data-toggle="collapse" data-target="#collapseOdner" id="odner" class="input-pengguna" />
                                </div>
                                
                                <div class="d-flex col-md-6">
                                    <label for="namaPolisi" class="col-md-4">Spidol Boardmaker</label>
                                    <input type="checkbox" data-toggle="collapse" data-target="#collapseSpidol" id="spidol_board" class="input-pengguna" />
                                </div>
                            </div>

                            <div class="collapse" id="collapseOdner" style="margin-left: 30px;">
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

                            <div class="collapse" id="collapseSpidol" style="margin-left: 30px;">
                                <div class="form-row my-4">
                                    <div class="d-flex col-md-5">
                                        <label for="namaPolisi" class="col-md-4">-</label>
                                        <input type="number" style="width: 100px;" id="merah" class="input-pengguna" />
                                    </div>
                                </div>
                                <span style="color:#014188;font-size: 12px;">*jumlah dihitung dalam satuan (pcs)</span>
                            </div>


                            <div class="form-row my-4">
                                <div class="d-flex col-md-6">
                                    <label for="namaPolisi" class="col-md-4">Magazine File</label>
                                    <input type="checkbox" data-toggle="collapse" data-target="#collapseMagazine" id="magazine" class="input-pengguna" />
                                </div>
                                <div class="d-flex col-md-6">
                                    <label for="namaPolisi" class="col-md-4">Spidol Permanent</label>
                                    <input type="checkbox" data-toggle="collapse" data-target="#collapseSpidolPermanent" id="spidol_permanen" class="input-pengguna" />
                                </div>
                            </div>

                            <div class="collapse" id="collapseMagazine" style="margin-left: 30px;">
                                <div class="form-row my-4">
                                    <div class="d-flex col-md-5">
                                        <label for="namaPolisi" class="col-md-4">-</label>
                                        <input type="number" style="width: 100px;" id="merah" class="input-pengguna" />
                                    </div>
                                </div>
                                <span style="color:#014188;font-size: 12px;">*jumlah dihitung dalam satuan (pcs)</span>
                            </div>
                            <div class="collapse" id="collapseSpidolPermanent" style="margin-left: 30px;">
                                <div class="form-row my-4">
                                    <div class="d-flex col-md-5">
                                        <label for="namaPolisi" class="col-md-4">-</label>
                                        <input type="number" style="width: 100px;" id="merah" class="input-pengguna" />
                                    </div>
                                </div>
                                <span style="color:#014188;font-size: 12px;">*jumlah dihitung dalam satuan (pcs)</span>
                            </div>


                            <div class="form-row my-4">
                                <div class="d-flex col-md-6">
                                    <label for="namaPolisi" class="col-md-4">Kertas</label>
                                    <input type="checkbox" data-toggle="collapse" data-target="#collapseKertas" id="kertas" class="input-pengguna" />
                                </div>
                                <div class="d-flex col-md-6">
                                    <label for="namaPolisi" class="col-md-4">Stabilo</label>
                                    <input type="checkbox" data-toggle="collapse" data-target="#collapseStabilo" id="stabilo" class="input-pengguna" />
                                </div>
                            </div>
                            <div class="collapse" id="collapseKertas" style="margin-left: 30px;">
                                <div class="form-row my-4">
                                    <div class="d-flex col-md-5">
                                        <label for="namaPolisi" class="col-md-4">-</label>
                                        <input type="number" style="width: 100px;" id="merah" class="input-pengguna" />
                                    </div>
                                </div>
                                <span style="color:#014188;font-size: 12px;">*jumlah dihitung dalam satuan (pcs)</span>
                            </div>
                            <div class="collapse" id="collapseStabilo" style="margin-left: 30px;">
                                <div class="form-row my-4">
                                    <div class="d-flex col-md-5">
                                        <label for="namaPolisi" class="col-md-4">-</label>
                                        <input type="number" style="width: 100px;" id="merah" class="input-pengguna" />
                                    </div>
                                </div>
                                <span style="color:#014188;font-size: 12px;">*jumlah dihitung dalam satuan (pcs)</span>
                            </div>


                            <div class="form-row my-4">
                                <div class="d-flex col-md-6">
                                    <label for="namaPolisi" class="col-md-4">Buku</label>
                                    <input type="checkbox" data-toggle="collapse" data-target="#collapseBuku" id="buku" class="input-pengguna" />
                                </div>
                                <div class="d-flex col-md-6">
                                    <label for="namaPolisi" class="col-md-4">Pensil</label>
                                    <input type="checkbox" data-toggle="collapse" data-target="#collapsePensil" id="pensil" class="input-pengguna" />
                                </div>
                            </div>
                            <div class="collapse" id="collapseBuku" style="margin-left: 30px;">
                                <div class="form-row my-4">
                                    <div class="d-flex col-md-5">
                                        <label for="namaPolisi" class="col-md-4">-</label>
                                        <input type="number" style="width: 100px;" id="merah" class="input-pengguna" />
                                    </div>
                                </div>
                                <span style="color:#014188;font-size: 12px;">*jumlah dihitung dalam satuan (pcs)</span>
                            </div>
                            <div class="collapse" id="collapsePensil" style="margin-left: 30px;">
                                <div class="form-row my-4">
                                    <div class="d-flex col-md-5">
                                        <label for="namaPolisi" class="col-md-4">-</label>
                                        <input type="number" style="width: 100px;" id="merah" class="input-pengguna" />
                                    </div>
                                </div>
                                <span style="color:#014188;font-size: 12px;">*jumlah dihitung dalam satuan (pcs)</span>
                            </div>


                            <div class="form-row my-4">
                                <div class="d-flex col-md-6">
                                    <label for="namaPolisi" class="col-md-4">Bolpoin</label>
                                    <input type="checkbox" data-toggle="collapse" data-target="#collapseBolpoin" id="bolpoin" class="input-pengguna" />
                                </div>
                            </div>
                            <div class="collapse" id="collapseBolpoin" style="margin-left: 30px;">
                                <div class="form-row my-4">
                                    <div class="d-flex col-md-5">
                                        <label for="namaPolisi" class="col-md-4">-</label>
                                        <input type="number" style="width: 100px;" id="merah" class="input-pengguna" />
                                    </div>
                                </div>
                                <span style="color:#014188;font-size: 12px;">*jumlah dihitung dalam satuan (pcs)</span>
                            </div>

                            <div class="center-pengguna m-pengguna">
                                <button data-target="#modalAdd" data-toggle="modal" class="btn-jos btn btn-danger" type="button">Pesan ATK</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN -->

    <!-- Modal  -->

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
                                <td></td>
                                <td>Kuning</td>
                                <td>2pcs</td>
                            </tr>
                            <tr>
                                <td style="width: 5%"><div class="dot"></div></td>
                                <td colspan="2">Kertas </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>A4 Putih</td>
                                <td>2 rim</td>
                            </tr>
                            <tr>
                                <td style="width: 5%"><div class="dot"></div></td>
                                <td colspan="2">Buku</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Ekspedisi</td>
                                <td>1pcs</td>
                            </tr>
                        </table>

                    </div>
                    <div class="px-3">
                        <center>
                        <button data-target="#modalSuntingPersetujuan" data-toggle="modal" class="btn-jos btn btn-danger" type="button">Pesan ATK</button>
                    </center>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Notifikasi Submit Persetujuan --> 
        <div class="modal fade" id="modalSuntingPersetujuan" tabindex="-1" aria-labelledby="modalAddLihatLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content py-4 px-5 border-0">
                    <div class="modal-body" style="margin-top: 20px;margin-bottom: 20px;">
                        <div><center><img src="assets/img/icons/ctg_notif.PNG"></center></div>
                        <center><span><p style="color:#014188;font-weight: bold;">Pengajuan terkirim!</p></span></center>
                        <center><span><p style="">Pengajuan pemesanan ATK Anda <br/>sudah terkirim. Mohon tunggu persetujuan<br/> manajer dan admin sebelum melakukan perjalanan!</p></span></center>
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
                                        <textarea name="komentar" id="komentar" cols="41" rows="5"></textarea>
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
                        <p>Lorem Ipsum Dolor Sit Amet</p>

                        <h4>Catatan Admin</h4>
                        <p>Lorem Ipsum Dolor Sit Amet</p>
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

    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.js"></script>
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