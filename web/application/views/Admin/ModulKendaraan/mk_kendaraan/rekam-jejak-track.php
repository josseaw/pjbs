<!-- MAIN -->
        <div class="content">
            <div class="col-12">
                <ul class="nav nav-tabs">
                <li class="nav-item">
                        <a class="nav-link text-center " href="<?php echo base_url("ModulKendaraan")?>">Kendaraan</a>
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
                <div class="card border-0 w-100">
                    <div class="row">
                        <div class="col-8">
                            <div class="track-sopir">
                                <div class="img-full">
                                    <!-- Tempat Peta -->

                                    <a href="track-zoom.html">
                                        <img src="<?= base_url('')?>assets/img/icons/full-screen.png" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 px-3 py-4">
                            <div class="sopir-track1">
                                <div class="scroll">
                                    <div class="track-BerangkatKembali">
                                        <div class="berangkat">
                                            <p>Berangkat</p>
                                            <span>
                                            <div class="img-kalender">
                                                <img src="<?= base_url('')?>assets/img/icons/kalender_coklat.png" alt="">
                                            </div>
                                            <p>16 September 2020</p>
                                        </span>
                                        </div>
                                        <div class="perjalanan">
                                            <div class="waktu-tempuh">
                                                <p>15 menit</p>
                                                <p>30 menit</p>
                                                <p>18 menit</p>
                                            </div>
                                            <div class="titik-tempuh">
                                                <div class="tempat-tempuh my-1">
                                                    <div class="titik">
                                                        <span class="bg-blue"></span>
                                                        <span></span>
                                                    </div>
                                                    <div class="tempat">
                                                        <p>Kantor BPJS</p>
                                                        <p>09:50 WIB</p>
                                                    </div>
                                                </div>
                                                <div class="tempat-tempuh my-1">
                                                    <div class="titik">
                                                        <span class="bg-red"></span>
                                                        <span></span>
                                                    </div>
                                                    <div class="tempat">
                                                        <p>Bakso Citra</p>
                                                        <p>10:10 WIB</p>
                                                    </div>
                                                </div>
                                                <div class="tempat-tempuh my-1">
                                                    <div class="titik">
                                                        <span class="bg-red"></span>
                                                        <span></span>
                                                    </div>
                                                    <div class="tempat">
                                                        <p>Awangga Souvenir</p>
                                                        <p>10:40 WIB</p>
                                                    </div>
                                                </div>
                                                <div class="tempat-tempuh my-1">
                                                    <div class="img-lokasi">
                                                        <img src="<?= base_url('')?>assets/img/icons/lokasi_coklat.png" alt="">
                                                    </div>
                                                    <div class="tempat">
                                                        <p>Kantor BPKB</p>
                                                        <p>10:58 WIB</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="lama-keberangkatan">
                                            <p>lama keberangkatan</p>
                                            <p>1 jam 3 menit</p>
                                        </div>
                                    </div>
                                    <div class="track-BerangkatKembali m-track">
                                        <div class="berangkat">
                                            <p>Kembali</p>
                                            <span>
                                            <div class="img-kalender">
                                                <img src="<?= base_url('')?>assets/img/icons/kalender_coklat.png" alt="">
                                            </div>
                                            <p>16 September 2020</p>
                                        </span>
                                        </div>
                                        <div class="perjalanan">
                                            <div class="waktu-tempuh">
                                                <p>46 menit</p>
                                                <p>16 menit</p>
                                            </div>
                                            <div class="titik-tempuh">
                                                <div class="tempat-tempuh my-1">
                                                    <div class="titik">
                                                        <span class="bg-blue"></span>
                                                        <span></span>
                                                    </div>
                                                    <div class="tempat">
                                                        <p>Kantor BPKB</p>
                                                        <p>16:00 WIB</p>
                                                    </div>
                                                </div>
                                                <div class="tempat-tempuh my-1">
                                                    <div class="titik">
                                                        <span class="bg-red"></span>
                                                        <span></span>
                                                    </div>
                                                    <div class="tempat">
                                                        <p>Warung Kang Soepar Joyo</p>
                                                        <p>16:46 WIB</p>
                                                    </div>
                                                </div>
                                                <div class="tempat-tempuh my-1">
                                                    <div class="img-lokasi">
                                                        <img src="<?= base_url('')?>assets/img/icons/lokasi_coklat.png" alt="">
                                                    </div>
                                                    <div class="tempat">
                                                        <p>Kantor BPJS</p>
                                                        <p>17:02 WIB</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="lama-keberangkatan">
                                            <p>lama keberangkatan</p>
                                            <p>1 jam 2 menit</p>
                                        </div>
                                        <div class="lama-keberangkatan m-track">
                                            <p>Total Jam</p>
                                            <p>2 jam 5 menit</p>
                                        </div>
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