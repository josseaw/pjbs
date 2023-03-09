<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_ModulKendaraan extends CI_Controller{


    public function index()
    {
        $this->load->view('Admin/ModulKendaraan/Topbar');
        $this->load->view('Admin/ModulKendaraan/mk_kendaraan');
    }
    public function Pengguna()
    {
        $this->load->view('Admin/ModulKendaraan/Topbar');
        $this->load->view('Admin/ModulKendaraan/mk_kendaraan_pengguna');
    }
    public function Manajer()
    {
        $this->load->view('Admin/ModulKendaraan/Topbar');
        $this->load->view('Admin/ModulKendaraan/mk_kendaraan_manajer');
    }
    public function Sopir()
    {
        $this->load->view('Admin/ModulKendaraan/Topbar');
        $this->load->view('Admin/ModulKendaraan/mk_kendaraan/sopir');
    }
    public function Persetujuan()
    {
        $this->load->view('Admin/ModulKendaraan/Topbar');
        $this->load->view('Admin/ModulKendaraan/mk_kendaraan/persetujuan');
    }
    public function Riwayat()
    {
        $this->load->view('Admin/ModulKendaraan/Topbar');
        $this->load->view('Admin/ModulKendaraan/mk_kendaraan/pemesanan');
    }
    public function PesanKendaraan()
    {
        $this->load->view('Admin/ModulKendaraan/Topbar');
        $this->load->view('Admin/ModulKendaraan/mk_kendaraan/pesanKendaraan');
    }

    public function PilihSupir($id)
    {
        $this->load->view('Admin/ModulKendaraan/Topbar');
        $data['id'] = $id;
        $this->load->view('Admin/ModulKendaraan/mk_kendaraan/pilih_supir', $data);
    }

    public function DetailPersetujuan()
    {
        $this->load->view('Admin/ModulKendaraan/Topbar');
        $this->load->view('Admin/ModulKendaraan/mk_kendaraan/detail_persetujuan');
    }
    public function PemesananDisetujui($id_pemesanan,$id_supir)
    {
        $this->load->view('Admin/ModulKendaraan/Topbar');
        $data['id_pemesanan'] = $id_pemesanan;
        $data['id_supir'] = $id_supir;

        $this->load->view('Admin/ModulKendaraan/mk_kendaraan/disetujui_pilih_sopir', $data);
    }
    
    public function PemesananDitolak($id_pemesanan)
    {
        $data['id'] = $id_pemesanan;

        $this->load->view('Admin/ModulKendaraan/Topbar');
        $this->load->view('Admin/ModulKendaraan/mk_kendaraan/ditolak-pemesanan', $data);
    }
    public function TrackRecordSopir()
    {
        $this->load->view('Admin/ModulKendaraan/Topbar');
        $this->load->view('Admin/ModulKendaraan/mk_kendaraan/track-record-sopir');
    }
    public function RekamJejakTrack()
    {
        $this->load->view('Admin/ModulKendaraan/Topbar');
        $this->load->view('Admin/ModulKendaraan/mk_kendaraan/rekam-jejak-track');
    }
    public function RiwayatPengantaran()
    {
        $this->load->view('Admin/ModulKendaraan/Topbar');
        $this->load->view('Admin/ModulKendaraan/mk_kendaraan/riwayat_pengantaran');
    }
    public function PesananBerlangsung()
    {
        $this->load->view('Admin/ModulKendaraan/Topbar');
        $this->load->view('Admin/ModulKendaraan/mk_kendaraan/riwayat_pemesanan');
    }
    
    public function BeriRating()
    {
        $this->load->view('Admin/ModulKendaraan/Topbar');
        $this->load->view('Admin/ModulKendaraan/mk_kendaraan/beri_rating');
    }
     public function RiwayatDitolak()
    {
        $this->load->view('Admin/ModulKendaraan/Topbar');
        $this->load->view('Admin/ModulKendaraan/mk_kendaraan/riwayat_ditolak');
    }
     public function RiwayatMenunggu()
    {
        $this->load->view('Admin/ModulKendaraan/Topbar');
        $this->load->view('Admin/ModulKendaraan/mk_kendaraan/riwayat_menunggu');
    }
    public function RiwayatDisetujui()
    {
        $this->load->view('Admin/ModulKendaraan/Topbar');
        $this->load->view('Admin/ModulKendaraan/mk_kendaraan/disetujui-pemesanan');
    }
}
