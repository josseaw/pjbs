<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_ModulATK extends CI_Controller{


    public function index()
    {
        $this->load->view('Admin/ModulATK/Topbar');
        $this->load->view('Admin/ModulATK/matk_atk');
    }
    public function Persetujuan()
    {
        $this->load->view('Admin/ModulATK/Topbar');
        $this->load->view('Admin/ModulATK/matk_atk/persetujuan');
    }
    public function Pemesanan()
    {
        $this->load->view('Admin/ModulATK/Topbar');
        $this->load->view('Admin/ModulATK/matk_atk/pesan');
    }
    public function SetujuiPemesanan()
    {
        $this->load->view('Admin/ModulATK/Topbar');
        $this->load->view('Admin/ModulATK/matk_atk/disetujui-pemesanan');
    }
    public function TolakPemesanan()
    {
        $this->load->view('Admin/ModulATK/Topbar');
        $this->load->view('Admin/ModulATK/matk_atk/ditolak-pemesanan');
    }
    public function Riwayat()
    {
        $this->load->view('Admin/ModulATK/Topbar');
        $this->load->view('Admin/ModulATK/matk_atk/riwayat');
    }
}
