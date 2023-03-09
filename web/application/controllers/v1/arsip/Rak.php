<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/RestController.php';
require APPPATH . '/libraries/Format.php';

use libraries\RestServer\RestController;

class Rak extends RestController {

    function __construct(){
        parent::__construct();
        $this->load->model('arsip/rak_model');
    }

    // ORACLE DB TEST ✅
    public function index_get(){
        $id = $this->get('id');
        // Search Query
        $cari = $this->get('q');
        // Filter
        $filter = array(
            'status' => $this->get('status')
        );

        $page = $this->get('page');
        if($page === null) $page = 1;
        $limit = 10;

        if($id === null){
            
            $data = $this->rak_model->all($cari, $filter, $page, $limit);
            
            if(empty($data['data'])){
                $this->response([
                    'status'  => true,
                    'message' => 'Tidak ada data rak yang ditemukan...',
                    'totalData' => 0,
                    'totalPage' => 0,
                    'ruangan' => []
                ], RestController::HTTP_NOT_FOUND);
            }

            $this->response([
                'status'  => true,
                'message' => 'Data rak tersedia',
                'totalData' => $data['total'],
                'totalPage' => ceil($data['total']/$limit),
                'page'      => $page,
                'ruangan' => $data['data']
            ], RestController::HTTP_OK);
        }
        else{
            if($id <= 0){
                $this->response(null, RestController::HTTP_BAD_REQUEST);
            }
            else{
                $data = $this->rak_model->detail($id);
            }
            
            if(empty($data)){
                $this->response([
                    'status' => false,
                    'message' => 'Tidak ada data rak yang ditemukan...'
                ], RestController::HTTP_NOT_FOUND);
            }

            $this->response([
                'status'    => true,
                'message'   => 'Data rak tersedia',
                'data'      => $data
            ], RestController::HTTP_OK);
        }
    }
    
    // ORACLE DB TEST ✅
    public function rekomendasi_get(){
        // Search Query
        $cari = $this->get('q');
        $page = $this->get('page');
        if($page === null) $page = 1;
        $limit = 10;
        $data = $this->rak_model->recommendation($cari, $page, $limit);
            
            if(empty($data['data'])){
                $this->response([
                    'status'  => true,
                    'message' => 'Tidak ada data rak yang ditemukan...',
                    'totalData' => 0,
                    'totalPage' => 0,
                    'ruangan' => []
                ], RestController::HTTP_NOT_FOUND);
            }

            $this->response([
                'status'  => true,
                'message' => 'Data rak tersedia',
                'totalData' => $data['total'],
                'totalPage' => ceil($data['total']/$limit),
                'page'      => $page,
                'ruangan' => $data['data']
            ], RestController::HTTP_OK);
    }

    // ORACLE DB TEST ✅
    public function create_post(){
        $data = array(
            'nama'      => $this->post('nama'),
            'jumlah_boks' => $this->post('jumlah_boks'),
            'terpakai' => 0,
        );
        
        $this->validation_rules($data);
        // IF validasi gagal
        if($this->form_validation->run() == false){
            $error = [];
            foreach($this->form_validation->error_array() as $key => $value){
                array_push($error, $value);
            }
            $this->response([
                'status' => false,
                'message' => $error
            ], RestController::HTTP_BAD_REQUEST);
        }
        else{
            $create = $this->rak_model->create($data);
            // IF db failed
            if($create === false){
                $this->response([
                    'status'  => false,
                    'message' => 'Data tidak berhasil ditambahkan',
                ], RestController::HTTP_BAD_REQUEST);    
            }
            // DB success
            else{
                $this->response([
                    'status'  => true,
                    'message' => 'Data rak berhasil ditambahkan...',
                ], RestController::HTTP_CREATED);    
            }
        }
    }

    // ORACLE DB TEST ✅
    public function update_put(){
        $id = $this->put('id');
        if(!$id){
            $this->response([
                'status'  => false,
                'message' => 'ID tidak boleh kosong...'
            ], RestController::HTTP_BAD_REQUEST);
        }
        
        $data = array(
            'nama'      => $this->put('nama'),
            'jumlah_boks' => $this->put('jumlah_boks'),
        );
        
        $this->validation_rules($data, $id);
        // IF validasi gagal
        if($this->form_validation->run() == false){
            $error = [];
            
            foreach($this->form_validation->error_array() as $key => $value){
                array_push($error, $value);
            }
            $this->response([
                'status' => false,
                'message' => $error
            ], RestController::HTTP_BAD_REQUEST);
        }
        else{
            $update = $this->rak_model->update($id, $data);
            // IF id tidak ditemukan
            if($update === false){
                $this->response([
                    'status'  => false,
                    'message' => 'Data rak tidak ditemukan, gagal memperbarui',
                ], RestController::HTTP_BAD_REQUEST);    
            }
            // update success
            else{
                $this->response([
                    'status'  => true,
                    'message' => 'Berhasil diperbarui',
                    'data'    => $update
                ], RestController::HTTP_OK);    
            }
        }
    }

    // ORACLE DB TEST ✅
    public function delete_delete(){
        $id = $this->get('id');

        if($id <= 0){
            $this->response(NULL, RestController::HTTP_BAD_REQUEST);
        }
        $delete = $this->rak_model->delete($id);
        if($delete == true){
            $this->response([
                'status' => true,
                'message' => 'Rak berhasil dihapus'
            ], RestController::HTTP_OK);
        }
        else{
            $this->response([
                'status' => false,
                'message' => 'ID tidak ditemukan, gagal menghapus rak'
            ], RestController::HTTP_NOT_FOUND);
        }
    }

    // Private function untuk validasi input form di serverside
    private function validation_rules($data){
        $this->form_validation->set_rules('nama', 'Nama Rak', 'required');
        $this->form_validation->set_rules('jumlah_boks', 'Jumlah Boks', 'required');
        $this->form_validation->set_data($data);
    }
}