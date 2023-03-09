<!-- MAIN -->
        <div class="content">
            <div class="col-12">
                 <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link text-center" href="<?php echo base_url("ModulKendaraan")?>">Kendaraan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center active" href="<?php echo base_url("ModulKendaraan/Sopir") ?>">Sopir</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="<?php echo base_url("ModulKendaraan/Persetujuan") ?>">Persetujuan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="<?php echo base_url("ModulKendaraan/PesanKendaraan") ?>">Pesan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="<?php echo base_url("ModulKendaraan/Riwayat") ?>">Riwayat</a>
                    </li>
                </ul>
                <div class="card border-0 w-100">
                    <div class="row">
                        <div class="col-8">
                            <div class="track-sopir">
                                <div class="img-full">
                                    <!-- Tempat Peta -->

                                    <a href="track-zoom.html">
                                        <img src="../assets/img/icons/full-screen.png" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 px-3 py-5">
                            <div class="sopir-track">
                                <div class="profil">
                                    <div class="img-profil">
                                        <img src="../assets/img/icons/testimonial-02.png" alt="">
                                    </div>
                                    <div class="text-profil">
                                        <h4>Delvin Smith</h4>
                                        <h4>sp000</h4>
                                    </div>
                                </div>
                                <div class="tujuan">
                                    <div class="pengguna-tujuan">
                                        <h4>Pengguna</h4>
                                        <h4>Karina Kusumadewi</h4>
                                    </div>
                                    <div class="pengguna-tujuan">
                                        <h4>Tujuan</h4>
                                        <h4>Kantor BPKB</h4>
                                    </div>
                                </div>
                                <div class="waktu">
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
                                <div class="center-pengguna m-track">
                                    <a href="<?= base_url('ModulKendaraan/rekam_jejak_track')?>" class="btn-jos btn btn-primary" type="submit">Lihat Rekam Jejak</a>
                                    <a href="<?= base_url('ModulKendaraan/Persetujuan')?>">
                                    <span class="btn-yes btn bg-white outline-blue text-primary my-2">Selesai</span>
                                    </a>
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