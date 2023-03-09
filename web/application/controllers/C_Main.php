<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Main extends CI_Controller
{

    public function index()
    {
        $this->load->view('Main/V_Login');
    }

    public function user()
    {
        $this->load->view('Main/V_LoginUser');
    }

    public function manager()
    {
        $this->load->view('Main/V_LoginManager');
    }


    public function Dashboard()
    {
        $this->load->view('Main/V_Dashboard');
    }

    public function DashboardUser()
    {
        $this->load->view('Main/V_DashboardUser');
    }

    public function DashboardManager()
    {
        $this->load->view('Main/V_DashboardManager');
    }
}
