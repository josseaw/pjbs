<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/RestController.php';
require APPPATH . '/libraries/Format.php';

use libraries\RestServer\RestController;

class Arsip extends RestController {

    function __construct(){
        parent::__construct();
        $this->load->model('arsip/arsip_model');
    }

    public function index_get(){
        $id = $this->get('id');
        $userid = 1;
        $subdit = 'DIV IT';
        // Search Query
        $cari = $this->get('q');
        // Filter
        $filter = array(
            'rak' => $this->get('rak'),
            'sort' => $this->get('sort'),
            'sortBy' => $this->get('sortBy'),
        );


        $page = $this->get('page');
        if($page === null) $page = 1;
        $limit = 10;
        
        if($id === null){   
            if($userid <= 0){
                $this->response(NULL, RestController::HTTP_BAD_REQUEST);
            }
            // Mendapatkan data Arsip
            else{
                $data = $this->arsip_model->allByDivisi($userid, $subdit, $cari, $filter, $page, $limit);
                if(empty($data['data'])){
                    $this->response([
                        'status'  => true,
                        'message' => 'Tidak ada arsip...',
                        'totalData' => 0,
                        'totalPage' => 0,
                        'arsip' => []
                    ], RestController::HTTP_OK);
                }
                $this->response([
                    'status' => true,
                    'message' => 'Data arsip anda',
                    'totalData' => $data['total'],
                    'totalPage' => ceil($data['total']/$limit),
                    'page'      => $page,
                    'arsip' => $data['data']
                ], RestController::HTTP_OK);
            }
        }
        // // Mendapatkan detail data pemesanan berdasarkan ID
        // else{
        //     if($id <= 0){
        //         $this->response(NULL, RestController::HTTP_BAD_REQUEST);
        //     }
        //     else{
        //         $data = $this->arsip_model->detailById($id);
        //         // Data tidak ditemukan
        //         if(empty($data)){
        //             $this->response([
        //                 'status'  => true,
        //                 'message' => 'Tidak ada data pemesanan yang ditemukan...',
        //                 'pemesanan' => []
        //             ], RestController::HTTP_OK);
        //         }
        //         $this->response([
        //             'status' => true,
        //             'message' => 'Data pemesanan tersedia',
        //             'pemesanan'    => $data[0]
        //         ], RestController::HTTP_OK);
        //     }
        // }
    }

    public function all_get(){
        $id = $this->get('id');
        // Search Query
        $cari = $this->get('q');
        // Filter
        $filter = array(
            'rak' => $this->get('rak'),
            'sort' => $this->get('sort'),
            'sortBy' => $this->get('sortBy'),
        );

        $page = $this->get('page');
        if($page === null) $page = 1;
        $limit = 10;
        
        if($id === null){   
            
            $data = $this->arsip_model->all($cari, $filter, $page, $limit);
            if(empty($data['data'])){
                $this->response([
                    'status'  => true,
                    'message' => 'Tidak ada arsip...',
                    'totalData' => 0,
                    'totalPage' => 0,
                    'arsip' => []
                ], RestController::HTTP_OK);
            }
            $this->response([
                'status' => true,
                'message' => 'Data arsip',
                'totalData' => $data['total'],
                'totalPage' => ceil($data['total']/$limit),
                'page'      => $page,
                'arsip' => $data['data']
            ], RestController::HTTP_OK);
            
        }
        
    }

    public function monitoring(){
        $id = $this->get('id');
        // Search Query
        $cari = $this->get('q');
        // Filter
        $filter = array(
            'subdit' => $this->get('subdit'),
            'rak' => $this->get('rak'),
            'sort' => $this->get('sort'),
            'sortBy' => $this->get('sortBy'),
        );

        $page = $this->get('page');
        if($page === null) $page = 1;
        $limit = 10;
        
        if($id === null){   
            
            $data = $this->arsip_model->all($cari, $filter, $page, $limit);
            if(empty($data['data'])){
                $this->response([
                    'status'  => true,
                    'message' => 'Tidak ada arsip...',
                    'totalData' => 0,
                    'totalPage' => 0,
                    'monitoring' => []
                ], RestController::HTTP_OK);
            }
            $this->response([
                'status' => true,
                'message' => 'Data arsip',
                'totalData' => $data['total'],
                'totalPage' => ceil($data['total']/$limit),
                'page'      => $page,
                'monitoring' => $data['data']
            ], RestController::HTTP_OK);
            
        }
    }

    public function berkas_get()
	{
        $this->load->helper('download');
        $id = $this->get('id');
        $data = $this->db->get_where('ARSIP_BERKAS_BOKS',['ID'=>$id])->row();
        if($data->NAMA_BERKAS != null){
            force_download('./uploads/arsip/'.$data->NAMA_BERKAS, null);
        }
        else{
            $this->response([
                'status' => false,
                'data' => 'Berkas tidak memiliki file'
            ], RestController::HTTP_BAD_REQUEST);
        }
		
	}
    
}

