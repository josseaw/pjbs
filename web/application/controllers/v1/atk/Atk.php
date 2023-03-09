<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/RestController.php';
require APPPATH . '/libraries/Format.php';

use libraries\RestServer\RestController;

class Atk extends RestController {
    function __construct(){
        parent::__construct();
        $this->load->model('atk/atk_model');

    }

    // ORACLE DB TEST ✅
    public function index_get(){
        $id = $this->get('id');
        $userid = 1;
        $cari = $this->get('q');
        $filter = array(
            'status' => $this->get('status'),
        );

        $page = $this->get('page');
        if($page === null) $page = 1;
        $limit = 10;

        if($id === null){
            $data = $this->atk_model->all($cari, $filter, $page, $limit);
            
            if(empty($data['data'])){
                $this->response([
                    'status'  => true,
                    'message' => 'Tidak ada data ATK yang ditemukan...',
                    'totalData' => 0,
                    'totalPage' => 0,
                    'atk' => []
                ], RestController::HTTP_OK);
            }
            
            $this->response([
                'status'  => true,
                'message' => 'Data ATK tersedia',
                'totalData' => $data['total'],
                'totalPage' => ceil($data['total']/$limit),
                'page'      => $page,
                'atk' => $data['data']
            ], RestController::HTTP_OK);
        }
        else{
            if($id <= 0) $this->response(null, RestController::HTTP_BAD_REQUEST);
            else $data = $this->atk_model->byId($id);
            
            if(empty($data)){
                $this->response([
                    'status'  => true,
                    'message' => 'Tidak ada data ATK yang ditemukan...',
                    'atk' => []
                ], RestController::HTTP_OK);
            }
    
            $this->response([
                'status'  => true,
                'message' => 'Data ATK tersedia',
                'atk' => $data[0]
            ], RestController::HTTP_OK);
        }
    }

    // ORACLE DB TEST ✅
    public function create_post(){
        $data = array (
            'nama'       => $this->post('nama_atk'),
            'jenis'      =>$this->post('jenis'),
            'satuan'    => $this->post('satuan'),
        );
        $this->validation_rules($data, null);
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
            $status = $this->atk_model->create($data);
            // IF db failed
            if($status === false){
                $this->response([
                    'status'  => false,
                    'message' => 'Data tidak berhasil ditambahkan, kesalahan sistem',
                ], RestController::HTTP_BAD_REQUEST);    
            }
            // DB success
            else{
                $this->response([
                    'status'  => true,
                    'message' => 'Data ATK berhasil ditambahkan...',
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
            'nama'       => $this->put('nama_atk'),
            'jenis'      =>$this->put('jenis'),
            'satuan'    => $this->put('satuan'),

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
            $update = $this->atk_model->update($id, $data);
            // IF id tidak ditemukan
            if($update === false){
                $this->response([
                    'status'  => false,
                    'message' => 'Data ATK tidak ditemukan, gagal memperbarui',
                ], RestController::HTTP_BAD_REQUEST);    
            }
            // update success
            else{
                $this->response([
                    'status'  => true,
                    'message' => 'Data ATK berhasil diperbarui',
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
        $delete = $this->atk_model->delete($id);
        if($delete == true){
            $this->response([
                'status' => true,
                'message' => 'ATK berhasil dihapus'
            ], RestController::HTTP_OK);
        }
        else{
            $this->response([
                'status' => false,
                'message' => 'ID tidak ditemukan, gagal menghapus ATK'
            ], RestController::HTTP_NOT_FOUND);
        }
    }

    // Private function untuk validasi input form di serverside
    private function validation_rules($data, $id){
        if($id != null){
            $this->form_validation->set_rules(
                'nama', 'Nama ATK',
                'required|is_unique[ATK_MASTER_ATK.ID!='.$id.' AND '.'NAMA=]',
                array(
                    'required' => 'Nama ATK wajib diisi.',
                    'is_unique' => 'Nama ATK tidak boleh sama.'
                )
            );        
        }
        else{
            $this->form_validation->set_rules(
                'nama', 'Nama ATK',
                'required|is_unique[ATK_MASTER_ATK.NAMA]',
                array(
                    'required' => 'Nama ATK wajib diisi.',
                    'is_unique' => 'Nama ATK tidak boleh sama.'
                )
            );        
        }
        $this->form_validation->set_rules('jenis', 'Jenis-jenis Atk', 'required');
        $this->form_validation->set_rules('satuan', 'Satuan Atk', 'required');
        $this->form_validation->set_data($data);
    }
}
