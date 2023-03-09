<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_ModulArsip extends CI_Controller
{
    public function index()
    {
        $this->load->view('Admin/ModulArsip/Topbar');
        $this->load->view('Admin/ModulArsip/mars_admin');
    }
    public function CariArsip()
    {
        $this->load->view('Admin/ModulArsip/Topbar');
        $this->load->view('Admin/ModulArsip/mars_arsip/cari_arsip');
    }
    public function Rak()
    {
        $this->load->view('Admin/ModulArsip/Topbar');
        $this->load->view('Admin/ModulArsip/mars_arsip/rak');
    }
    public function Permintaan()
    {
        $this->load->view('Admin/ModulArsip/Topbar');
        $this->load->view('Admin/ModulArsip/mars_arsip/permintaan');
    }
    public function PilihRak()
    {
        $this->load->view('Admin/ModulArsip/Topbar');
        $this->load->view('Admin/ModulArsip/mars_arsip/PilihRak');
    }
    
}
