<!-- MAIN -->
        <div class="content">
            <div class="col-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link text-center" href="<?= base_url('ModulRapatUser')?>">Ruang Rapat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="<?= base_url('ModulRapatUser/RoomEMeeting')?>">Room E-Meeting</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center active" href="<?= base_url('ModulRapatUser/Agenda')?>">Agenda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="<?= base_url('ModulRapatUser/Riwayat')?>">Riwayat</a>
                    </li>
                </ul>
                <div class="card border-0 w-100 px-2 py-3">
                    <div class="pilihan my-3">
                        <div class="d-flex flex-row">
                            <a href="">
                                <div class="left bg-rgba-grey">
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <p><?= date('d F Y')?></p>
                            <a href="">
                                <div class="right bg-rgba-grey">
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="d-flex flex-row">
                        <div class="col-1">
                            <div class="jam center-text">
                                <p>08:00</p>
                                <p>09:00</p>
                                <p>10:00</p>
                                <p>11:00</p>
                                <p>12:00</p>
                                <p>13:00</p>
                                <p>14:00</p>
                                <p>15:00</p>
                                <p>16:00</p>
                            </div>
                        </div>
                        <div class="col-11">
                            <div class="col-11">
                            <table style="width: 100%">
                                <tr>
                                    <td style="width:16%;height:50px;text-align: center;cursor: pointer;"><b data-toggle="modal" data-target="#modalDetail">Room 1</b><button class="btn btn-primary ml-2 py-1 px-2" data-toggle="modal" data-target="#modalAdd">+</button></td>
                                    <td style="width:16%;height:50px;text-align: center;cursor: pointer;"><b data-toggle="modal" data-target="#modalDetail">Room 2</b><button class="btn btn-primary ml-2 py-1 px-2" data-toggle="modal" data-target="#modalAdd">+</button></td>
                                    <td style="width:16%;height:50px;text-align: center;cursor: pointer;"><b data-toggle="modal" data-target="#modalDetail">Room 3</b><button class="btn btn-primary ml-2 py-1 px-2" data-toggle="modal" data-target="#modalAdd">+</button></td>
                                    <td style="width:16%;height:50px;text-align: center;cursor: pointer;"><b data-toggle="modal" data-target="#modalDetail">Room 4</b><button class="btn btn-primary ml-2 py-1 px-2" data-toggle="modal" data-target="#modalAdd">+</button></td>
                                    <td style="width:16%;height:50px;text-align: center;cursor: pointer;"><b data-toggle="modal" data-target="#modalDetail">Room 5</b><button class="btn btn-primary ml-2 py-1 px-2" data-toggle="modal" data-target="#modalAdd">+</button></td>
                                    <td style="width:16%;height:50px;text-align: center;cursor: pointer;"><b data-toggle="modal" data-target="#modalDetail">Room 6</b><button class="btn btn-primary ml-2 py-1 px-2" data-toggle="modal" data-target="#modalAdd">+</button></td>
                                </tr>
                            </table>
                            <table style="width: 100%" border="1">
                                <tr>
                                    <td rowspan="2">
                                        <div class="card-kolom center-pengguna">
                                        <div class="card-rapat bg-orange-o">
                                            <span class="bg-v-orange"></span>
                                            <div class="center-card-rapat m-t-8 justify-c">
                                                <p>Karya Inovasi</p>
                                            </div>
                                        </div>
                                    </div>
                                    </td>
                                    <td>
                                        <div class="card-kolom center-pengguna">
                                        <div class="card-rapat bg-blue-o">
                                            <span class="bg-v-blue"></span>
                                            <div class="center-card-rapat m-t-8 justify-c">
                                                <p>Rapat Direksi</p>
                                            </div>
                                        </div>
                                    </div>
                                    </td>
                                    <td>
                                        <div class="card-kolom center-pengguna">
                                        <div class="card-rapat bg-blue-o">
                                            <span class="bg-v-blue"></span>
                                            <div class="center-card-rapat m-t-8 justify-c">
                                                <p>Rapat Direksi</p>
                                            </div>
                                        </div>
                                    </div>
                                    </td>
                                    <td>
                                        <div class="card-kolom center-pengguna">
                                        <div class="card-rapat ">
                                            <span class=""></span>
                                            <div class="center-card-rapat m-t-8 justify-c">
                                                <!-- kosongan -->
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="card-kolom center-pengguna">
                                        <div class="card-rapat ">
                                            <span class=""></span>
                                            <div class="center-card-rapat m-t-8 justify-c">
                                                <!-- kosongan -->
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="card-kolom center-pengguna">
                                        <div class="card-rapat ">
                                            <span class=""></span>
                                            <div class="center-card-rapat m-t-8 justify-c">
                                                <!-- kosongan -->
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    
                                    <td>
                                        <div class="card-kolom center-pengguna">
                                        <div class="card-rapat bg-blue-o">
                                            <span class="bg-v-blue"></span>
                                            <div class="center-card-rapat m-t-8 justify-c">
                                                <p>Rapat Direksi</p>
                                            </div>
                                        </div>
                                    </div>
                                    </td>
                                    <td>
                                        <div class="card-kolom center-pengguna">
                                        <div class="card-rapat ">
                                            <span class=""></span>
                                            <div class="center-card-rapat m-t-8 justify-c">
                                                <!-- kosongan -->
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="card-kolom center-pengguna">
                                        <div class="card-rapat ">
                                            <span class=""></span>
                                            <div class="center-card-rapat m-t-8 justify-c">
                                                <!-- kosongan -->
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="card-kolom center-pengguna">
                                        <div class="card-rapat bg-orange-o">
                                            <span class="bg-v-orange"></span>
                                            <div class="center-card-rapat m-t-8 justify-c">
                                                <p>Karya Inovasi</p>
                                            </div>
                                        </div>
                                    </div>
                                    </td>
                                    <td>
                                        <div class="card-kolom center-pengguna">
                                        <div class="card-rapat ">
                                            <span class=""></span>
                                            <div class="center-card-rapat m-t-8 justify-c">
                                                <!-- kosongan -->
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="card-kolom center-pengguna">
                                        <div class="card-rapat bg-orange-o">
                                            <span class="bg-v-orange"></span>
                                            <div class="center-card-rapat m-t-8 justify-c">
                                                <p>Karya Inovasi</p>
                                            </div>
                                        </div>
                                    </div>
                                    </td>
                                    <td>
                                        <div class="card-kolom center-pengguna">
                                        <div class="card-rapat ">
                                            <span class=""></span>
                                            <div class="center-card-rapat m-t-8 justify-c">
                                                <!-- kosongan -->
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="card-kolom center-pengguna">
                                        <div class="card-rapat ">
                                            <span class=""></span>
                                            <div class="center-card-rapat m-t-8 justify-c">
                                                <!-- kosongan -->
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="card-kolom center-pengguna">
                                        <div class="card-rapat ">
                                            <span class=""></span>
                                            <div class="center-card-rapat m-t-8 justify-c">
                                                <!-- kosongan -->
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="card-kolom center-pengguna">
                                        <div class="card-rapat bg-orange-o">
                                            <span class="bg-v-orange"></span>
                                            <div class="center-card-rapat m-t-8 justify-c">
                                                <p>Karya Inovasi</p>
                                            </div>
                                        </div>
                                    </div>
                                    </td>
                                    <td>
                                        <div class="card-kolom center-pengguna">
                                        <div class="card-rapat bg-orange-o">
                                            <span class="bg-v-orange"></span>
                                            <div class="center-card-rapat m-t-8 justify-c">
                                                <p>Karya Inovasi</p>
                                            </div>
                                        </div>
                                    </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="card-kolom center-pengguna">
                                        <div class="card-rapat ">
                                            <span class=""></span>
                                            <div class="center-card-rapat m-t-8 justify-c">
                                                <!-- kosongan -->
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="card-kolom center-pengguna">
                                        <div class="card-rapat ">
                                            <span class=""></span>
                                            <div class="center-card-rapat m-t-8 justify-c">
                                                <!-- kosongan -->
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="card-kolom center-pengguna">
                                        <div class="card-rapat ">
                                            <span class=""></span>
                                            <div class="center-card-rapat m-t-8 justify-c">
                                                <!-- kosongan -->
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="card-kolom center-pengguna">
                                        <div class="card-rapat ">
                                            <span class=""></span>
                                            <div class="center-card-rapat m-t-8 justify-c">
                                                <!-- kosongan -->
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="card-kolom center-pengguna">
                                        <div class="card-rapat ">
                                            <span class=""></span>
                                            <div class="center-card-rapat m-t-8 justify-c">
                                                <!-- kosongan -->
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="card-kolom center-pengguna">
                                        <div class="card-rapat ">
                                            <span class=""></span>
                                            <div class="center-card-rapat m-t-8 justify-c">
                                                <!-- kosongan -->
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="card-kolom center-pengguna">
                                        <div class="card-rapat ">
                                            <span class=""></span>
                                            <div class="center-card-rapat m-t-8 justify-c">
                                                <!-- kosongan -->
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="card-kolom center-pengguna">
                                        <div class="card-rapat ">
                                            <span class=""></span>
                                            <div class="center-card-rapat m-t-8 justify-c">
                                                <!-- kosongan -->
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="card-kolom center-pengguna">
                                        <div class="card-rapat ">
                                            <span class=""></span>
                                            <div class="center-card-rapat m-t-8 justify-c">
                                                <!-- kosongan -->
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="card-kolom center-pengguna">
                                        <div class="card-rapat ">
                                            <span class=""></span>
                                            <div class="center-card-rapat m-t-8 justify-c">
                                                <!-- kosongan -->
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="card-kolom center-pengguna">
                                        <div class="card-rapat bg-orange-o">
                                            <span class="bg-v-orange"></span>
                                            <div class="center-card-rapat m-t-8 justify-c">
                                                <p>Karya Inovasi</p>
                                            </div>
                                        </div>
                                    </div>
                                    </td>
                                    <td>
                                        <div class="card-kolom center-pengguna">
                                        <div class="card-rapat bg-orange-o">
                                            <span class="bg-v-orange"></span>
                                            <div class="center-card-rapat m-t-8 justify-c">
                                                <p>Karya Inovasi</p>
                                            </div>
                                        </div>
                                    </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="card-kolom center-pengguna">
                                        <div class="card-rapat bg-orange-o">
                                            <span class="bg-v-orange"></span>
                                            <div class="center-card-rapat m-t-8 justify-c">
                                                <p>Karya Inovasi</p>
                                            </div>
                                        </div>
                                    </div>
                                    </td>
                                    <td>
                                        <div class="card-kolom center-pengguna">
                                        <div class="card-rapat bg-orange-o">
                                            <span class="bg-v-orange"></span>
                                            <div class="center-card-rapat m-t-8 justify-c">
                                                <p>Karya Inovasi</p>
                                            </div>
                                        </div>
                                    </div>
                                    </td>
                                    <td>
                                        <div class="card-kolom center-pengguna">
                                        <div class="card-rapat bg-orange-o">
                                            <span class="bg-v-orange"></span>
                                            <div class="center-card-rapat m-t-8 justify-c">
                                                <p>Karya Inovasi</p>
                                            </div>
                                        </div>
                                    </div>
                                    </td>
                                    <td>
                                        <div class="card-kolom center-pengguna">
                                        <div class="card-rapat bg-orange-o">
                                            <span class="bg-v-orange"></span>
                                            <div class="center-card-rapat m-t-8 justify-c">
                                                <p>Karya Inovasi</p>
                                            </div>
                                        </div>
                                    </div>
                                    </td>
                                    <td>
                                        <div class="card-kolom center-pengguna">
                                        <div class="card-rapat bg-orange-o">
                                            <span class="bg-v-orange"></span>
                                            <div class="center-card-rapat m-t-8 justify-c">
                                                <p>Karya Inovasi</p>
                                            </div>
                                        </div>
                                    </div>
                                    </td>
                                    <td>
                                        <div class="card-kolom center-pengguna">
                                        <div class="card-rapat bg-orange-o">
                                            <span class="bg-v-orange"></span>
                                            <div class="center-card-rapat m-t-8 justify-c">
                                                <p>Karya Inovasi</p>
                                            </div>
                                        </div>
                                    </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="card-kolom center-pengguna">
                                        <div class="card-rapat bg-blue-o">
                                            <span class="bg-v-blue"></span>
                                            <div class="center-card-rapat m-t-8 justify-c">
                                                <p>Rapat Direksi</p>
                                            </div>
                                        </div>
                                    </div>
                                    </td>
                                    <td>
                                        <div class="card-kolom center-pengguna">
                                        <div class="card-rapat bg-orange-o">
                                            <span class="bg-v-orange"></span>
                                            <div class="center-card-rapat m-t-8 justify-c">
                                                <p>Karya Inovasi</p>
                                            </div>
                                        </div>
                                    </div>
                                    </td>
                                    <td>
                                        <div class="card-kolom center-pengguna">
                                        <div class="card-rapat bg-blue-o">
                                            <span class="bg-v-blue"></span>
                                            <div class="center-card-rapat m-t-8 justify-c">
                                                <p>Rapat Direksi</p>
                                            </div>
                                        </div>
                                    </div>
                                    </td>
                                    <td>
                                        <div class="card-kolom center-pengguna">
                                        <div class="card-rapat bg-orange-o">
                                            <span class="bg-v-orange"></span>
                                            <div class="center-card-rapat m-t-8 justify-c">
                                                <p>Karya Inovasi</p>
                                            </div>
                                        </div>
                                    </div>
                                    </td>
                                    <td>
                                        <div class="card-kolom center-pengguna">
                                        <div class="card-rapat bg-blue-o">
                                            <span class="bg-v-blue"></span>
                                            <div class="center-card-rapat m-t-8 justify-c">
                                                <p>Rapat Direksi</p>
                                            </div>
                                        </div>
                                    </div>
                                    </td>
                                    <td>
                                        <div class="card-kolom center-pengguna">
                                        <div class="card-rapat bg-orange-o">
                                            <span class="bg-v-orange"></span>
                                            <div class="center-card-rapat m-t-8 justify-c">
                                                <p>Karya Inovasi</p>
                                            </div>
                                        </div>
                                    </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="card-kolom center-pengguna">
                                        <div class="card-rapat bg-blue-o">
                                            <span class="bg-v-blue"></span>
                                            <div class="center-card-rapat m-t-8 justify-c">
                                                <p>Rapat Direksi</p>
                                            </div>
                                        </div>
                                    </div>
                                    </td>
                                    <td>
                                        <div class="card-kolom center-pengguna">
                                        <div class="card-rapat bg-orange-o">
                                            <span class="bg-v-orange"></span>
                                            <div class="center-card-rapat m-t-8 justify-c">
                                                <p>Karya Inovasi</p>
                                            </div>
                                        </div>
                                    </div>
                                    </td>
                                    <td>
                                        <div class="card-kolom center-pengguna">
                                        <div class="card-rapat bg-orange-o">
                                            <span class="bg-v-orange"></span>
                                            <div class="center-card-rapat m-t-8 justify-c">
                                                <p>Karya Inovasi</p>
                                            </div>
                                        </div>
                                    </div>
                                    </td>
                                    <td>
                                        <div class="card-kolom center-pengguna">
                                        <div class="card-rapat bg-blue-o">
                                            <span class="bg-v-blue"></span>
                                            <div class="center-card-rapat m-t-8 justify-c">
                                                <p>Rapat Direksi</p>
                                            </div>
                                        </div>
                                    </div>
                                    </td>
                                    <td>
                                        <div class="card-kolom center-pengguna">
                                        <div class="card-rapat bg-blue-o">
                                            <span class="bg-v-blue"></span>
                                            <div class="center-card-rapat m-t-8 justify-c">
                                                <p>Rapat Direksi</p>
                                            </div>
                                        </div>
                                    </div>
                                    </td>
                                    <td>
                                        <div class="card-kolom center-pengguna">
                                        <div class="card-rapat bg-blue-o">
                                            <span class="bg-v-blue"></span>
                                            <div class="center-card-rapat m-t-8 justify-c">
                                                <p>Rapat Direksi</p>
                                            </div>
                                        </div>
                                    </div>
                                    </td>
                                </tr>
                            </table>
                            <div class="btn-card-rapat">
                                <a href="">
                                    <div class="card-rapat bg-orange-o">
                                        <span class="bg-v-orange"></span>
                                        <div class="center-card-rapat m-t-8 justify-c">
                                            <p>Rapat Eksternal</p>
                                        </div>
                                    </div>
                                </a>
                                <a href="">
                                    <div class="card-rapat bg-blue-o">
                                        <span class="bg-v-blue"></span>
                                        <div class="center-card-rapat m-t-8 justify-c">
                                            <p>Rapat Internal</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN -->

        <!-- MODAL -->
        <!-- Modal -->
        <!-- Modal Detail -->
        <div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="modalAddLihatLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content py-4 px-5 border-0">
                    <h3 class="modal-title px-3" id="modalAddLabel">
                        Detail Room
                    </h3>
                    <div class="modal-body">
                        <form action="">
                            <div class="form-row my-2">
                                <div class="form-group col-md-6">
                                    <label for="namaPolisi">Nama Room</label>
                                    <input type="text" class="form-control" id="tglSerah" placeholder="Room 1" disabled/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Kode Room</label>
                                    <input type="text" class="form-control" id="tglSerah" placeholder="R0001" disabled/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Tambah -->
        <div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="modalAddLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content py-4 px-5 border-0">
                    <h3 class="modal-title px-3" id="modalAddLabel">
                        Permintaan ID E-Meeting
                    </h3>
                    <div class="modal-body">
                        <form action="">
                            <div class="form-row my-2">
                                <div class="form-group col-md-6">
                                    <label for="namaPolisi">Nama Ruangan</label>
                                    <input type="text" class="form-control" id="namaPolisi" placeholder="Room 1" disabled/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="namaPolisi">Judul E-Meeting</label>
                                    <input type="text" class="form-control" id="namaPolisi"/>
                                </div>
                            </div>
                            <div class="form-row my-2">
                                <div class="form-group col-md-6">
                                    <label for="namaKendaraan">Jadwal</label>
                                    <input type="date" class="form-control" id="namaPolisi"/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="tglSerah">Divisi</label>
                                    <select id="Pilih Status" class="form-control">
                                        <option value="">Pilih Divisi Anda</option>
                                      </select>
                                </div>
                            </div>
                            <div class="form-row my-2">
                                <div class="form-group col-md-6">
                                    <label for="namaKendaraan">Waktu Mulai</label>
                                    <input type="time" class="form-control" id="tglSerah" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="namaKendaraan">Waktu Selesai</label>
                                    <input type="time" class="form-control" id="namaKendaraan" />
                                </div>
                            </div>
                            <div class="form-row my-2">
                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label for="namaKendaraan">Status Rapat</label>
                                        <div class="form-row my-1">
                                            <div class="form-row ml-2 col-md-6">
                                                <input type="radio" id="namaKendaraan" />
                                                <label for="namaKendaraan" class="mt-n1 ml-2">Internal</label>
                                            </div>
                                            <div class="form-row col-md-6">
                                                <input type="radio" id="namaKendaraan" />
                                                <label for="namaKendaraan" class="mt-n1 ml-2">External</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="namaKendaraan">Jumlah Peserta (maks. 25)</label>
                                        <input type="text" class="form-control" id="namaKendaraan" />
                                        <div class="form-group my-2 ml-n3 col-12">
                                            <label for="namaKendaraan">Kebutuhan Rapat</label>
                                            <input type="text" class="form-control" id="namaKendaraan" />
                                            <span id="tambah-tujuan" class="mt-n5">+ Tambah Kebutuhan</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="namaPolisi">Keperluan</label>   
                                    <textarea name="" id="" cols="35" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="form-row col-md-6">
                                <label for="namaKendaraan">Tambah Ruangan Rapat</label>
                                <a href="<?= base_url('ModulRapatUser/Ketersediaan_Ruangan_rapat')?>" class="btn btn-primary px-5">Lihat Ketersediaan Ruang</a>
                            </div>
                        </form>
                    </div>
                    <div class="px-3">
                        <button type="button" class="btn btn-submit" data-dismiss="modal">
                Kirim
              </button>
                        <button type="button" class="btn btn-cancel" data-dismiss="modal">Batal</button>
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