<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_ModulArsip extends CI_Controller
{
    public function index()
    {
        $this->load->view('User/ModulArsip/Topbar');
        $this->load->view('User/ModulArsip/mars_pengguna');
    }
    public function CariArsip()
    {
        $this->load->view('User/ModulArsip/Topbar');
        $this->load->view('User/ModulArsip/mars_arsip/cari_arsip');
    }
    
}
