<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_ModulRapat extends CI_Controller
{
    public function index()
    {
        $this->load->view('Admin/ModulRapat/Topbar');
        $this->load->view('Admin/ModulRapat/mr_rapat');
    }
    public function Reservasi()
    {
        $this->load->view('Admin/ModulRapat/Topbar');
        $this->load->view('Admin/ModulRapat/mr_rapat/reservasi');
    }
    public function Persetujuan()
    {
        $this->load->view('Admin/ModulRapat/Topbar');
        $this->load->view('Admin/ModulRapat/mr_rapat/persetujuan');
    }
    public function Agenda()
    {
        $this->load->view('Admin/ModulRapat/Topbar');
        $this->load->view('Admin/ModulRapat/mr_rapat/agenda');
    }
    public function Riwayat()
    {
        $this->load->view('Admin/ModulRapat/Topbar');
        $this->load->view('Admin/ModulRapat/mr_rapat/riwayat');
    }
    public function DisetujuiRapat()
    {
        $this->load->view('Admin/ModulRapat/Topbar');
        $this->load->view('Admin/ModulRapat/mr_rapat/disetujui_persetujuan_rapat');
    }
    public function ReservasiRapat()
    {
        $this->load->view('Admin/ModulRapat/Topbar');
        $this->load->view('Admin/ModulRapat/mr_rapat/reservasi_rapat');
    }
    public function RiwayatEMeeting()
    {
        $this->load->view('Admin/ModulRapat/Topbar');
        $this->load->view('Admin/ModulRapat/mr_rapat/riwayat_e_meeting');
    }
}
