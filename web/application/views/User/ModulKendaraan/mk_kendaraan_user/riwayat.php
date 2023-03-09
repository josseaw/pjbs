<!-- END TOPBAR -->
        <div class="content">
            <div class="col-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link text-center" href="<?= base_url('ModulKendaraanUser')?>">Pesan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center active" href="<?= base_url('ModulKendaraanUser/Riwayat')?>">Riwayat</a>
                    </li>
                </ul>        
                <div class="card border-0 w-100 px-2 py-3" id="link-detail-persetujuan">
                    <div class="container-fluid">
                        <div class="row d-flex justify-content-between">
                            <span class="btn btn-plus py-1 px-2 mb-3 mb-sm-0 bg-white"></span>
                            <div class="filter d-flex flex-row"><button class="btn btn-filter py-1 px-3 d-flex flex-row">    <img src="<?= base_url()?>assets/img/icons/filter_biru.png" alt="Filter" class="img-fluid mr-2"/>    <span>Filter</span></button>
                                <form class="ml-4">
                                    <div class="input-group input-group--custom"> <input type="text" class="form-control" placeholder="Cari..." />
                                        <div class="input-group-append--custom"> <button class="btn btn-primary" type="button"><img src="<?= base_url()?>assets/img/icons/search_putih.png" class="topbar__search-icn"/></button></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <section class="table-responnsive mt-4">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">Nama Sopir</th>
                                    <th scope="col">Tujuan</th>
                                    <th scope="col">Tgl Pengajuan</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody id="isi-table">
                                
                            </tbody>
                        </table>
                    <div class="loading"></div>
                    <button  onclick="paginationPrevious()" value="1" id="btnPrevious" class="btn btn-light btn-sm" style="width: 50px;margin-left:80%; border-radius: 25px;border-color: grey;"> <b> < </b> 
                    </button>
                    <button id="btnNext" onclick="paginationNext()" value="2" class="btn btn-light btn-sm" style="width: 50px;border-radius: 25px;border-color: grey;"> <b> > </b> 
                    </button>
                    </section>
                </div>
            </div>
        </div>
        <!-- END MAIN -->
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="<?= base_url()?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url()?>assets/js/script.js"></script>
    <script>

// -------------------------------------------COBA PAGINATION -----------------------------------//
        var baseurl = "<?= base_url() ?>"

        var num = 1;
        function paginationNext () {
        $('.loading').html("<center><img id='loading4' style='width:500px ;margin-top: 2%;' src='"+baseurl+"/assets/img/gif/loading4.gif'/><br/></center><br />")

          var page = $('#btnNext').val();
         
          $('#isi-table').html('');

           var settings = {
            'cache': false,
            'dataType': "jsonp",
            "async": true,
            "crossDomain": true,
            "url": "https://pjbs.ridiansyah.dev/v1/kendaraan/pemesanan?page="+page,
            "method": "GET",
            "headers": {
                "accept": "application/json",
                "Access-Control-Allow-Origin": "*"
            }
        }


        $.ajax(settings).done(function(result) {
            $('#loading4').remove();
            var data = result.pemesanan;
             if(!data.length){
               alert('Tidak ada data')
               // var baru = (Number(page)-Number(1));
               // $('#btnNext').val(baru);
            }else{
            $.each(data, function(i, item) {
                var status = '';
                if (item.status_pemesanan == 'Disetujui'){
                    status = '<a style="padding:2px 35px;" href="'+baseurl+'ModulKendaraanUser/PemesananDisetujui/'+item.id+'" class="aktif-setuju font-weight-bold">'+item.status_pemesanan+'</a>';
                }else if (item.status_pemesanan == 'Ditolak'){
                    status = '<a style="padding:2px 40px;" href="'+baseurl+'ModulKendaraanUser/PemesananDitolak/'+item.id+'" class="aktif font-weight-bold">'+item.status_pemesanan+'</a>'
                }else if (item.status_pemesanan == 'Menunggu'){
                    status = '<a style="padding:2px 27px;" href="'+baseurl+'ModulKendaraanUser/MenungguPemesanan/'+item.id+'" class="menunggu font-weight-bold">'+item.status_pemesanan+'</a>'
                }else{
                    status = '<a style="padding:2px 27px;" href="'+baseurl+'ModulKendaraanUser/PemesananBerlangsung/'+item.id+'" class="menunggu font-weight-bold">'+item.status_pemesanan+'</a>'
                }
                
                $('#isi-table').append('<tr><td>'+item.nama_sopir+'</td><td>' + item.tujuan + '</td><td>' + item.created_at + '</td><td>'+status+'</td></tr>');

                $('#modal-click').append('<div class="from-modal collapse" id="multiCollapseExample' + i + '"><div class="row">   <div class="tanda-close"> <span></span> <span></span> </div>  <div class="text-from">      <h4>2 data terpilih</h4>  </div>  <div class="from lihat" data-toggle="modal" data-target="#modalLihatKendaraan"><span class="img-from"><img src="<?= base_url()?>assets/img/icons/lihat.png" alt=""></span>     <h4>Lihat</h4></div>  <div class="from sunting" data-toggle="modal" data-target="#modalSuntingKendaraan"><span class="img-from"><img src=<?php echo base_url("assets/img/icons/edit.png")?> alt=""></span>       <h4>Sunting</h4> </div> <div class="from hapus" data-toggle="modal" data-target="#multiHapus"><span class="img-from"><img src=<?php echo base_url("assets/img/icons/hapus.png")?> alt=""></span>     <h4>Hapus</h4>  </div>  </div> </div>');

            });
             $('#btnPrevious').val(page);
            var baru = (Number(page)+Number(1));
            $('#btnNext').val(baru);
            }
        });
        }

// --------------------------------------------------PAGINATION PREVIOUSLY----------------------//

        // var num = 1;
        function paginationPrevious () {

        $('.loading').html("<center><img id='loading4' style='width:500px ;margin-top: 2%;' src='"+baseurl+"/assets/img/gif/loading4.gif'/><br/></center><br />")

          var page = $('#btnPrevious').val();
          $('#btnNext').val(page);
          $('#isi-table').html('');

           var settings = {
            'cache': false,
            'dataType': "jsonp",
            "async": true,
            "crossDomain": true,
            "url": "https://pjbs.ridiansyah.dev/v1/kendaraan/pemesanan?page="+page,
            "method": "GET",
            "headers": {
                "accept": "application/json",
                "Access-Control-Allow-Origin": "*"
            }
        }


        $.ajax(settings).done(function(result) {
            $('#loading4').remove();
            var data = result.pemesanan;
            if(!data.length){
               alert('Tidak ada data')
               // var baru = (Number(page)-Number(1));
               //  $('#btnPrevious').val(baru);
            }else{
            $.each(data, function(i, item) {
                var status = '';
                if (item.status_pemesanan == 'Disetujui'){
                    status = '<a style="padding:2px 35px;" href="'+baseurl+'ModulKendaraanUser/PemesananDisetujui/'+item.id+'" class="aktif-setuju font-weight-bold">'+item.status_pemesanan+'</a>';
                }else if (item.status_pemesanan == 'Ditolak'){
                    status = '<a style="padding:2px 40px;" href="'+baseurl+'ModulKendaraanUser/PemesananDitolak/'+item.id+'" class="aktif font-weight-bold">'+item.status_pemesanan+'</a>'
                }else if (item.status_pemesanan == 'Menunggu'){
                    status = '<a style="padding:2px 27px;" href="'+baseurl+'ModulKendaraanUser/MenungguPemesanan/'+item.id+'" class="menunggu font-weight-bold">'+item.status_pemesanan+'</a>'
                }else{
                    status = '<a style="padding:2px 27px;" href="'+baseurl+'ModulKendaraanUser/PemesananBerlangsung/'+item.id+'" class="menunggu font-weight-bold">'+item.status_pemesanan+'</a>'
                }
                
                $('#isi-table').append('<tr><td>'+item.nama_sopir+'</td><td>' + item.tujuan + '</td><td>' + item.created_at + '</td><td>'+status+'</td></tr>');

                $('#modal-click').append('<div class="from-modal collapse" id="multiCollapseExample' + i + '"><div class="row">   <div class="tanda-close"> <span></span> <span></span> </div>  <div class="text-from">      <h4>2 data terpilih</h4>  </div>  <div class="from lihat" data-toggle="modal" data-target="#modalLihatKendaraan"><span class="img-from"><img src="<?= base_url()?>assets/img/icons/lihat.png" alt=""></span>     <h4>Lihat</h4></div>  <div class="from sunting" data-toggle="modal" data-target="#modalSuntingKendaraan"><span class="img-from"><img src=<?php echo base_url("assets/img/icons/edit.png")?> alt=""></span>       <h4>Sunting</h4> </div> <div class="from hapus" data-toggle="modal" data-target="#multiHapus"><span class="img-from"><img src=<?php echo base_url("assets/img/icons/hapus.png")?> alt=""></span>     <h4>Hapus</h4>  </div>  </div> </div>');

            });
            var baru = (Number(page)-Number(1));
            $('#btnPrevious').val(baru);
        }
        });
        }


        var settings = {
            'cache': false,
            'dataType': "jsonp",
            "async": true,
            "crossDomain": true,
            "url": "https://pjbs.ridiansyah.dev/v1/kendaraan/pemesanan/",
            "method": "GET",
            "headers": {
                "accept": "application/json",
                "Access-Control-Allow-Origin": "*"
            }
        }


        $.ajax(settings).done(function(result) {
            $('#loading4').remove();
            var data = result.pemesanan;
            $.each(data, function(i, item) {
                var status = '';
                if (item.status_pemesanan == 'Disetujui'){
                    status = '<a style="padding:2px 35px;" href="'+baseurl+'ModulKendaraanUser/PemesananDisetujui/'+item.id+'" class="aktif-setuju font-weight-bold">'+item.status_pemesanan+'</a>';
                }else if (item.status_pemesanan == 'Ditolak'){
                    status = '<a style="padding:2px 40px;" href="'+baseurl+'ModulKendaraanUser/PemesananDitolak/'+item.id+'" class="aktif font-weight-bold">'+item.status_pemesanan+'</a>'
                }else if (item.status_pemesanan == 'Menunggu'){
                    status = '<a style="padding:2px 27px;" href="'+baseurl+'ModulKendaraanUser/MenungguPemesanan/'+item.id+'" class="menunggu font-weight-bold">'+item.status_pemesanan+'</a>'
                }else{
                    status = '<a style="padding:2px 27px;" href="'+baseurl+'ModulKendaraanUser/PemesananBerlangsung/'+item.id+'" class="menunggu font-weight-bold">'+item.status_pemesanan+'</a>'
                }
                
                $('#isi-table').append('<tr><td>'+item.nama_sopir+'</td><td>' + item.tujuan + '</td><td>' + item.created_at + '</td><td>'+status+'</td></tr>');

                $('#modal-click').append('<div class="from-modal collapse" id="multiCollapseExample' + i + '"><div class="row">   <div class="tanda-close"> <span></span> <span></span> </div>  <div class="text-from">      <h4>2 data terpilih</h4>  </div>  <div class="from lihat" data-toggle="modal" data-target="#modalLihatKendaraan"><span class="img-from"><img src="<?= base_url()?>assets/img/icons/lihat.png" alt=""></span>     <h4>Lihat</h4></div>  <div class="from sunting" data-toggle="modal" data-target="#modalSuntingKendaraan"><span class="img-from"><img src=<?php echo base_url("assets/img/icons/edit.png")?> alt=""></span>       <h4>Sunting</h4> </div> <div class="from hapus" data-toggle="modal" data-target="#multiHapus"><span class="img-from"><img src=<?php echo base_url("assets/img/icons/hapus.png")?> alt=""></span>     <h4>Hapus</h4>  </div>  </div> </div>');

            });
        });

        //----------------------------------------------------------NOTIFIKASI------------------------------------------//
    
    var settings = {
            'cache': false,
            'dataType': "jsonp",
            "async": true,
            "crossDomain": true,
            "url": "https://pjbs.ridiansyah.dev/v1/kendaraan/notifikasi/pemesanan",
            "method": "GET",
            "headers": {
                "accept": "application/json",
                "Access-Control-Allow-Origin": "*"
            }
        }


        $.ajax(settings).done(function(result) {
            var data = result.notifikasi;
            $.each(data, function(i, item) {

                var status = '';
                var img_status = '';
                var count = data.length;
                $('.count-notifikasi').html(count);
                var href = ''

                if (item.status_pemesanan == 'Disetujui'){
                    href = baseurl+'ModulKendaraanUser/PemesananDisetujui/'+item.pemesanan_id
                    status = '<b> Pemesanan Anda disetujui oleh Admin </b>';
                    img_status = '<div class="img-notifikasi bg-white"><img src="'+baseurl+'assets/img/icons/notif_user_biru.png" alt="Disetujui Admin">';
                }else if (item.status_pemesanan == 'Ditolak'){
                    href = baseurl+'ModulKendaraanUser/PemesananDitolak/'+item.pemesanan_id
                    status = '<b> Pemesanan Anda ditolak oleh Admin </b>';
                    img_status = '<div class="img-notifikasi bg-ditolak"><img src="'+baseurl+'assets/img/icons/ditolak.png" alt="Ditolak Admin">';
                }else if (item.status_pemesanan == 'Menunggu'){
                    href = baseurl+'ModulKendaraanUser/MenungguPemesanan/'+item.pemesanan_id
                    status = '<b> Pemesanan Anda menunggu persetujuan Admin </b>';
                    img_status = '<div class="img-notifikasi bg-white"><img src="'+baseurl+'assets/img/icons/notif_approval.png" alt="Menunggu Approval Admin">';
                }
                
                $('#isi-notifikasi').append('<a href="'+href+'"><div class="list-drop bg-blue-rgba">'+img_status+'</div><div class="content-notifikasi" style="margin-bottom:20px;margin-top:20px;"><p>'+status+'</p><p>'+item.diajukan+' WIB</p></div></div></a>');

                $('#modal-click').append('<div class="from-modal collapse" id="multiCollapseExample' + i + '"><div class="row">   <div class="tanda-close"> <span></span> <span></span> </div>  <div class="text-from">      <h4>2 data terpilih</h4>  </div>  <div class="from lihat" data-toggle="modal" data-target="#modalLihatKendaraan"><span class="img-from"><img src="../assets/img/icons/lihat.png" alt=""></span>     <h4>Lihat</h4></div>  <div class="from sunting" data-toggle="modal" data-target="#modalSuntingKendaraan"><span class="img-from"><img src=<?php echo base_url("assets/img/icons/edit.png")?> alt=""></span>       <h4>Sunting</h4> </div> <div class="from hapus" data-toggle="modal" data-target="#multiHapus"><span class="img-from"><img src=<?php echo base_url("assets/img/icons/hapus.png")?> alt=""></span>     <h4>Hapus</h4>  </div>  </div> </div>');

            });
        });
        
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