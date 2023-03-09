<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_ModulKendaraan extends CI_Controller{


    public function index()
    {
        $this->load->view('User/ModulKendaraan/Topbar');
        $this->load->view('User/ModulKendaraan/mk_kendaraan_pengguna');
    }
    public function Riwayat()
    {
        $this->load->view('User/ModulKendaraan/Topbar');
        $this->load->view('User/ModulKendaraan/mk_kendaraan_user/riwayat');
    }
    public function PemesananDisetujui($id)
    {
        $data['id'] = $id;
        $this->load->view('User/ModulKendaraan/Topbar');
        $this->load->view('User/ModulKendaraan/mk_kendaraan_user/disetujui-riwayat', $data);
    }
    public function PemesananDitolak($id)
    {
        $data['id'] = $id;
        $this->load->view('User/ModulKendaraan/Topbar');
        $this->load->view('User/ModulKendaraan/mk_kendaraan_user/ditolak-riwayat', $data);
    }
    public function MenungguPemesanan($id)
    {
        $data['id'] = $id;
        $this->load->view('User/ModulKendaraan/Topbar');
        $this->load->view('User/ModulKendaraan/mk_kendaraan_user/menunggu-riwayat', $data);
    }
    public function PemesananBerlangsung($id)
    {
        $data['id'] = $id;
        $this->load->view('User/ModulKendaraan/Topbar');
        $this->load->view('User/ModulKendaraan/mk_kendaraan_user/track-pesan', $data);
    }
    public function RatingPemesanan($id)
    {
        $data['id'] = $id;
        $this->load->view('User/ModulKendaraan/Topbar');
        $this->load->view('User/ModulKendaraan/mk_kendaraan_user/track-pesan-rating', $data);
    }
}
