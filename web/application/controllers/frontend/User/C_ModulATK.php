<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_ModulATK extends CI_Controller{


    public function index()
    {
        $this->load->view('User/ModulATK/Topbar');
        $this->load->view('User/ModulATK/matk_atk');
    }
    public function Pesan()
    {
        $this->load->view('User/ModulATK/Topbar');
        $this->load->view('User/ModulATK/matk_atk/pesan');
    }
    public function Riwayat()
    {
        $this->load->view('User/ModulATK/Topbar');
        $this->load->view('User/ModulATK/matk_atk/riwayat');
    }
    public function ModalDitolak()
    {
        $this->load->view('User/ModulATK/Topbar');
        $this->load->view('User/ModulATK/matk_atk/modal-ditolak');
    }
}
