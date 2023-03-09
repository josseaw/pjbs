<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_ModulRapat extends CI_Controller
{
    public function index()
    {
        $this->load->view('User/ModulRapat/Topbar');
        $this->load->view('User/ModulRapat/mr_rapat_pengguna');
    }
    public function RoomEMeeting()
    {
        $this->load->view('User/ModulRapat/Topbar');
        $this->load->view('User/ModulRapat/mr_rapat_pengguna/room-e-meeting');
    }
    public function Agenda()
    {
        $this->load->view('User/ModulRapat/Topbar');
        $this->load->view('User/ModulRapat/mr_rapat_pengguna/agenda');
    }
    public function Riwayat()
    {
        $this->load->view('User/ModulRapat/Topbar');
        $this->load->view('User/ModulRapat/mr_rapat_pengguna/riwayat');
    }
    public function DisetujuiRapat()
    {
        $this->load->view('User/ModulRapat/Topbar');
        $this->load->view('User/ModulRapat/mr_rapat_pengguna/disetujui_persetujuan_rapat');
    }
    public function ReservasiRapat()
    {
        $this->load->view('User/ModulRapat/Topbar');
        $this->load->view('User/ModulRapat/mr_rapat_pengguna/reservasi_rapat');
    }    
    public function RiwayatEMeeting()
    {
        $this->load->view('User/ModulRapat/Topbar');
        $this->load->view('User/ModulRapat/mr_rapat_pengguna/riwayat_e_meeting');
    }
}
