<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_ModulKendaraan extends CI_Controller{


    public function index()
    {
        $this->load->view('Manajer/ModulKendaraan/Topbar');
        $this->load->view('Manajer/ModulKendaraan/mk_kendaraan_manajer');
    }
    public function KonfirmasiPersetujuan()
    {
        $this->load->view('Manajer/ModulKendaraan/Topbar');
        $this->load->view('Manajer/ModulKendaraan/mk_kendaraan_manajer/disetujui-pemesanan');
    }
    public function KonfirmasiPenolakan()
    {
        $this->load->view('Manajer/ModulKendaraan/Topbar');
        $this->load->view('Manajer/ModulKendaraan/mk_kendaraan_manajer/ditolak-pemesanan');
    }
    public function Pesan()
    {
        $this->load->view('Manajer/ModulKendaraan/Topbar');
        $this->load->view('Manajer/ModulKendaraan/mk_kendaraan_manajer/pesanKendaraan');
    }
    public function Riwayat()
    {
        $this->load->view('Manajer/ModulKendaraan/Topbar');
        $this->load->view('Manajer/ModulKendaraan/mk_kendaraan_manajer/riwayat');
    }
    public function PemesananDisetujui($id)
    {
        $this->load->view('Manajer/ModulKendaraan/Topbar');
        $data['id'] = $id;
        $this->load->view('Manajer/ModulKendaraan/mk_kendaraan_manajer/riwayat-disetujui', $data);
    }
    public function PemesananDitolak($id)
    {
        $this->load->view('Manajer/ModulKendaraan/Topbar');
        $data['id'] = $id;
        $this->load->view('Manajer/ModulKendaraan/mk_kendaraan_manajer/riwayat-ditolak', $data);
    }
    public function MenungguPemesanan($id)
    {
        $this->load->view('Manajer/ModulKendaraan/Topbar');
        $data['id'] = $id;
        $this->load->view('Manajer/ModulKendaraan/mk_kendaraan_manajer/riwayat-menunggu', $data);
    }
    public function PemesananBerlangsung($id)
    {
        $this->load->view('Manajer/ModulKendaraan/Topbar');
        $data['id'] = $id;
        $this->load->view('Manajer/ModulKendaraan/mk_kendaraan_manajer/riwayat-berlangsung', $data);
    }
    public function RiwayatBeriRating()
    {
        $this->load->view('Manajer/ModulKendaraan/Topbar');
        $this->load->view('Manajer/ModulKendaraan/mk_kendaraan_manajer/riwayat-beri-rating');
    }
}
