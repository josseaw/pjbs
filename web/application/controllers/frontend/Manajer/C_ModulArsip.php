<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_ModulArsip extends CI_Controller
{
    public function index()
    {
        $this->load->view('Manajer/ModulArsip/Topbar');
        $this->load->view('Manajer/ModulArsip/mars_manajer');
    }
    public function CariArsip()
    {
        $this->load->view('Manajer/ModulArsip/Topbar');
        $this->load->view('Manajer/ModulArsip/mars_arsip/cari_arsip');
    }
    
}
