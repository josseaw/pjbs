<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>PJBS Web App | ATK</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />

    <!-- CSS -->
    <link rel="stylesheet" href="<?= base_url('')?>assets/css/style.min.css" />
    <style type="text/css">
        .dot {
      height: 10px;
      width: 10px;
      background-color: #012144;
      border-radius: 50%;
      display: inline-block;
    </style>
</head>

<body>
    <main>
        <!-- SIDEBAR -->
        <aside class="sidebar">
            <a href="<?= base_url('DashboardUser')?>">
                <img src="<?= base_url('')?>assets/img/logo_pjbs.png" alt="logo PJBS" class="brand__img" />
            </a>
            <nav class="navs">
                <ul class="navs__list list-unstyled">
                    <li class="navs__list-item">
                        <a href="<?php echo base_url("ModulKendaraanUser") ?>" data-toggle="tooltip" data-placement="bottom" title="Modul Kendaraan"><img src="<?php echo base_url("assets/img/icons/kendaraan_biru.png") ?>" class="icn_menu" /></a>
                    </li>
                    <li class="navs__list-item">
                        <a href="<?php echo base_url("ModulRapatUser") ?>" data-toggle="tooltip" data-placement="bottom" title="Modul Kendaraan"><img src="<?php echo base_url("assets/img/icons/pemesanan_ruangan_rapat.png") ?>" class="icn_menu" /></a>
                    </li>
                    <li class="navs__list-item">
                        <a href="<?php echo base_url("ModulATKUser") ?>" class="active" data-toggle="tooltip" data-placement="bottom" title="Modul Kendaraan"><img src="<?php echo base_url("assets/img/icons/atk.png") ?>" class="icn_menu" /></a>
                    </li>
                    <li class="navs__list-item">
                        <a href="<?php echo base_url("ModulFasilitasUser") ?>"><img src="<?php echo base_url("assets/img/icons/perbaikan_fasilitas.png") ?>" class="icn_menu" /></a>
                    </li>
                    <li class="navs__list-item">
                        <a href="<?php echo base_url("ModulArsipUser") ?>"><img src="<?php echo base_url("assets/img/icons/arsip.png") ?>" class="icn_menu" /></a>
                    </li>
                    <li class="navs__list-item">
                        <a href="<?php echo base_url("ModulIventarisUser") ?>"><img src="<?php echo base_url("assets/img/icons/inventaris.png") ?>" class="icn_menu" /></a>
                    </li>
                    <li class="navs__list-item">
                        <a href="<?php echo base_url("ModulSuveyUser") ?>"><img src="<?php echo base_url("assets/img/icons/survey.png") ?>" class="icn_menu" /></a>
                    </li>
                </ul>
            </nav>
        </aside>
        <!-- END SIDEBAR -->

        <!-- TOPBAR -->
        <div class="topbar">
            <div class="container-fluid">
                <div class="row">
                        <div class="date mb-3" style="margin-left:35vw">
                            <p class="mb-0 small">
                                <span style="font-size: 12px;margin:0px;" id="hours"></span> :
                                <span style="font-size: 12px" id="minutes"></span>  
                                <span style="font-size: 12px" id="wib"> WIB </span> 
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span style="font-size: 12px;margin: 0px;" id="date"></span>
                            </p>
                        </div>

                    <div class="d-flex" style="margin-left:auto;margin-right:1em;">
                            <div class="d-flex ml-auto">
                                <div class="btn-group ml-auto">
                                    <a type="button" class="topbar__icn" id="dropdownMenuReference" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="7,7">
                                        <img src="<?= base_url('')?>assets/img/icons/bantuan.png" style="width: 40px;" class="img-fluid" />
                                    </a>
                                </div>
                                <div class="btn-group ml-auto">
                                    <a type="button" class="topbar__icn" id="dropdownMenuReference" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="7,7">
                                        <img src="<?php echo base_url("assets/img/icons/notifikasi.png") ?>" class="img-fluid"/>
                                    </a>
                                    <div class="dropdown-menu jos" aria-labelledby="dropdownMenuReference">
                                        <span class="dropdown-item-text text-center">Notifikasi <span class="count-notifikasi"></span></span>
                                        <div class="dropdown-line"></div>
                                        <div class="dropdown-list">
                                            <div class="scroll" id="isi-notifikasi">
                                                <a class="notifikasi_diterima" data-toggle="modal" data-target="#mdlDiterima">
                                                    <div class="list-drop bg-blue-rgba">
                                                        <div class="img-notifikasi bg-white">
                                                            <img src="<?= base_url('')?>assets/img/icons/notif_user_biru.png" alt="Disetujui Admin">
                                                        </div>
                                                        <div class="content-notifikasi" style="margin-top:10px;width:100%">
                                                            <p>Pemesanan Anda sudah disetujui Admin</p><p>10:00 WIB</p>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="notifikasi_ditolak" data-toggle="modal" data-target="#mdlDitolak">
                                                    <div class="list-drop bg-blue-rgba">
                                                        <div class="img-notifikasi bg-ditolak">
                                                            <img src="<?= base_url('')?>assets/img/icons/ditolak.png" alt="Ditolak Admin">
                                                        </div>
                                                        <div class="content-notifikasi" style="margin-top:10px;width:100%">
                                                            <p>Pemesanan Anda ditolak oleh Admin</p><p>10:00 WIB</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-group">
                                    <span type="button" class="dropdown-toggle account--toggle" id="dropdownMenuProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="7,7">
                                        <img src="<?php echo base_url("assets/img/icons/profile.png") ?>" class="rounded-circle-profile" />
                                    </span>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuProfile">
                                        <a class="dropdown-item" href="<?= base_url('LoginUser')?>">Logout</a>                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END TOPBAR -->