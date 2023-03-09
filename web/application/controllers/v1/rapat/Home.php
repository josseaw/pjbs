<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/RestController.php';
require APPPATH . '/libraries/Format.php';

use libraries\RestServer\RestController;

class Home extends RestController {
    function __construct(){
        parent::__construct();
        $this->load->model('atk/pemesanan_model');

    }
    function index_get(){
        
    }
}