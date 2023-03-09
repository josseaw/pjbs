<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/RestController.php';
require APPPATH . '/libraries/Format.php';

use libraries\RestServer\RestController;

class Notifikasi extends RestController {

    function __construct(){
        // Construct the parent class
        parent::__construct();
        $this->load->model('rapat/pemesanan_model');
    }

    public function persetujuan_get(){
        $zoom = $this->get('zoom');
        $page = $this->get('page');
        if($page === null) $page = 1;
        $limit = 10;
        
        
        $data = $this->pemesanan_model->forApproval($zoom, $page, $limit);
        if(empty($data['data'])){
            $this->response([
                'status'  => true,
                'message' => 'Tidak ada pemesanan yang perlu disetujui atau ditolak',
                'totalData' => 0,
                'totalPage' => 0,
                'notifikasi' => []
            ], RestController::HTTP_OK);
        }
        $this->response([
            'status' => true,
            'message' => 'Data pemesanan yang perlu disetujui atau ditolak',
            'totalData' => $data['total'],
            'totalPage' => ceil($data['total']/$limit),
            'page'      => $page,
            'notifikasi' => $data['data']
        ], RestController::HTTP_OK);
    }

    public function room_get(){
        $userid = 1; // ID dari user/manajer/admin nanti diget lewat creds        
        $zoom = 1;
        $page = $this->get('page');
        if($page === null) $page = 1;
        $limit = 10;

        $data = $this->pemesanan_model->all($zoom, $userid, $page, $limit);
        if(empty($data['data'])){
            $this->response([
                'status'  => true,
                'message' => 'Tidak ada pemesanan...',
                'totalData' => 0,
                'totalPage' => 0,
                'notifikasi' => []
            ], RestController::HTTP_OK);
        }
        $this->response([
            'status' => true,
            'message' => 'Data pemesanan anda',
            'totalData' => $data['total'],
            'totalPage' => ceil($data['total']/$limit),
            'page'      => $page,
            'notifikasi' => $data['data']
        ], RestController::HTTP_OK);
    }

    public function ruangan_get(){
        $userid = 1; // ID dari user/manajer/admin nanti diget lewat creds        
        $zoom = 0;
        $page = $this->get('page');
        if($page === null) $page = 1;
        $limit = 10;
        
        $data = $this->pemesanan_model->all($zoom, $userid, $page, $limit);
        if(empty($data['data'])){
            $this->response([
                'status'  => true,
                'message' => 'Tidak ada pemesanan...',
                'totalData' => 0,
                'totalPage' => 0,
                'notifikasi' => []
            ], RestController::HTTP_OK);
        }
        $this->response([
            'status' => true,
            'message' => 'Data pemesanan anda',
            'totalData' => $data['total'],
            'totalPage' => ceil($data['total']/$limit),
            'page'      => $page,
            'notifikasi' => $data['data']
        ], RestController::HTTP_OK);
    }
}