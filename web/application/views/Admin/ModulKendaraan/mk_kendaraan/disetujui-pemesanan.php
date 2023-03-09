<!-- MAIN -->
        <div class="content">
            <div class="col-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link text-center" href="<?php echo base_url("ModulKendaraan")?>">Kendaraan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="<?php echo base_url("ModulKendaraan/Sopir") ?>">Sopir</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center active" href="<?php echo base_url("ModulKendaraan/Persetujuan") ?>">Persetujuan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="<?php echo base_url("ModulKendaraan/PesanKendaraan") ?>">Pesan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="<?php echo base_url("ModulKendaraan/Riwayat") ?>">Riwayat</a>
                    </li>
                </ul>
                <div class="card border-0 w-100 px-2 py-3" id="link-detail">
                    <div class="pemesanan-disetujui">
                        <div class="row">
                            <div class="col-3">
                                <div class="pemesanan-profil">
                                    <div class="img-pemesanan-profil">
                                        <img src=<?php echo base_url("assets/img/icons/testimonial-02.png")?> alt="">
                                    </div>
                                    <div class="text-pemesanan-profil font-weight-bold">
                                        <h4>delvin smith</h4>
                                        <h4>sp000</h4>
                                    </div>
                                    <div class="line-coklat"></div>
                                    <div class="text-pemesanan font-weight-bold">
                                        <h4>Toyota New Innova</h4>
                                        <h4>l1184wn</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="disetujui-pemesanan">
                                    <div class="text-head">
                                        <h4>admin</h4>
                                        <span class="bg-success">disetujui</span>
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
                                        <div class="detail-lokasi-pemesanan ml-auto">
                                            <div class="detail-waktu-pemesanan">
                                                <div class="img-jam">
                                                    <img src=<?php echo base_url("assets/img/icons/lokasi_coklat.png")?> alt="">
                                                </div>
                                                <div class="text-detail-pengajuan">
                                                    <p>Kantor BPKB</p>
                                                </div>
                                            </div>
                                            <div class="detail-waktu-pemesanan">
                                                <div class="img-jam">
                                                    <img src=<?php echo base_url("assets/img/icons/penumpang.png")?> alt="">
                                                </div>
                                                <div class="text-detail-pengajuan">
                                                    <p>4</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="detail-waktu">
                                        <div class="span">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </div>
                                        <div class="flex-column">
                                            <div class="waktu-BerangkatKembali">
                                                <span>
                                                    <h4>08:00</h4>
                                                    <p>WIB</p>
                                                </span>
                                                <span>
                                                    <h5>20 September 2019</h5>
                                                </span>
                                            </div>
                                            <div class="waktu-BerangkatKembali">
                                                <span>
                                                    <h4>08:00</h4>
                                                    <p>WIB</p>
                                                </span>
                                                <span>
                                                    <h5>20 September 2019</h5>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content-pemesanan">
                                        <div>
                                            <h2>Status Dinas</h2>
                                            <p>Dalam kota operasional</p>
                                        </div>
                                        <div>
                                            <h2>Keperluan</h2>
                                            <p>Menjemput narasumber untuk diantar ke kantor PJBS dan pulang diantar kembali ke kantor BPKP</p>
                                        </div>
                                        <div>
                                            <h2>Catatan Manajer</h2>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, dolore id. Tempore laborum voluptatum esse corporis libero. Quaerat, tempora at? Ab repellat quo quae dicta eveniet ullam dolore modi praesentium.</p>
                                        </div>
                                        <div>
                                            <h2>Catatan Admin</h2>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, dolore id. Tempore laborum voluptatum esse corporis libero. Quaerat, tempora at? Ab repellat quo quae dicta eveniet ullam dolore modi praesentium.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="pemesanan-profil">
                                    <div class="img-jam">
                                        <a href="<?= base_url('/ModulKendaraan/Pemesanan')?>">
                                            <img style="width: 35px;float: right;" src="<?= base_url()?>assets/img/icons/back-arrow.png" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN -->

    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="<?= base_url('')?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('')?>assets/js/script.js"></script>
    <script type="text/javascript">
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