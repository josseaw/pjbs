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
                    <div class="title-persetujuan">
                        <h4 class="font-weight-bold">Konfirmasi Persetujuan</h4>
                    </div>
                    <div class="pemesanan-disetujui">
                        <div class="d-flex flex-row">
                            <div class="col-9">
                                <div class="disetujui-pemesanan m-40">
                                    <div class="text-head">
                                        <h3>karina kusumadewi</h3>
                                    </div>
                                    <div class="detail-pengajuan">
                                        <div class="detail-lokasi-pemesanan">
                                            <div class="detail-waktu-pemesanan">
                                                <div class="img-jam">
                                                    <img src="../assets/img/icons/jam_coklat.png" alt="">
                                                </div>
                                                <div class="text-detail-pengajuan">
                                                    <p>16 September 2019</p>
                                                </div>
                                            </div>
                                            <div class="detail-waktu-pemesanan">
                                                <div class="img-jam">
                                                    <img src="../assets/img/icons/lokasi_coklat.png" alt="">
                                                </div>
                                                <div class="text-detail-pengajuan">
                                                    <p>Ruang Turbin</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="detail-lokasi-pemesanan ml-auto">
                                            <div class="detail-waktu-pemesanan">
                                                <div class="img-jam">
                                                    <img src="../assets/img/icons/penumpang.png" alt="">
                                                </div>
                                                <div class="text-detail-pengajuan">
                                                    <p>16</p>
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
                                                    <h4>09:00</h4>
                                                    <p>WIB</p>
                                                </span>
                                            </div>
                                            <div class="waktu-BerangkatKembali">
                                                <span>
                                                    <h4>10:00</h4>
                                                    <p>WIB</p>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content-pemesanan">
                                        <div>
                                            <h2>Info Agenda Rapat</h2>
                                            <p>Dalam kota tugas operasional</p>
                                        </div>
                                        <div>
                                            <h2>Kebutuhan Rapat</h2>
                                            <p>Menjemput narasumber untuk diantar ke kantor PJBS dan pulang diantar kembali ke kantor BPKP</p>
                                        </div>
                                        <div>
                                            <h2>Catatan Admin</h2>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, dolore id. Tempore laborum voluptatum esse corporis libero. Quaerat, tempora at? Ab repellat quo quae dicta eveniet ullam dolore modi praesentium.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="colom-komen">
                                <div class="catatan">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="namaPolisi">Catatan</label>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <textarea name="" id="" cols="45" rows="20"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-l-280">
                                    <a href="<?= base_url('ModulRapat/persetujuan')?>">
                                        <button class=" btn btn-primary ml-auto" type="submit">Konfirmasi</button>
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
    <script src="<?= base_url()?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url()?>assets/js/script.js"></script>
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