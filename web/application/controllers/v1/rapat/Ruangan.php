<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/RestController.php';
require APPPATH . '/libraries/Format.php';

use libraries\RestServer\RestController;

class Ruangan extends RestController {
    
    function __construct(){
        parent::__construct();
        $this->load->model('rapat/ruangan_model');
    }

    public function index_get(){
        $id = $this->get('id');
        // Search Query
        $cari = $this->get('q');
        // Filter
        $filter = array(
            'status' => $this->get('status')
        );
        $all = $this->get('all');

        $data = null;
        $page = $this->get('page');
        if($page === null) $page = 1;
        $limit = 10;
        $data = null;

        if($id === null){
            
            $data = $this->ruangan_model->all($cari, $filter, $all, $page, $limit);
            
            if(empty($data['data'])){
                $this->response([
                    'status'  => true,
                    'message' => 'Tidak ada data ruangan yang ditemukan...',
                    'totalData' => 0,
                    'totalPage' => 0,
                    'ruangan' => []
                ], RestController::HTTP_NOT_FOUND);
            }

            $this->response([
                'status'  => true,
                'message' => 'Data kendaraan tersedia',
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
                $data = $this->ruangan_model->byId($id);
            }
            
            if(empty($data)){
                $this->response([
                    'status' => false,
                    'message' => 'Tidak ada data ruangan yang ditemukan...'
                ], RestController::HTTP_NOT_FOUND);
            }

            $this->response([
                'status'    => true,
                'message'   => 'Data ruangan tersedia',
                'data'      => $data
            ], RestController::HTTP_OK);
        }
    }

    public function create_post(){
        $data = array(
            'rid'       => $this->generateRid(),
            'nama'      => $this->post('nama'),
            'fasilitas' => $this->post('fasilitas'),
            'kapasitas' => $this->post('kapasitas'),
            'status'    => $this->post('status'),
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
            $create = $this->ruangan_model->create($data);
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
                    'message' => 'Data ruangan berhasil ditambahkan...',
                ], RestController::HTTP_CREATED);    
            }
        }
    }

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
            'fasilitas' => $this->put('fasilitas'),
            'kapasitas' => $this->put('kapasitas'),
            'status'    => $this->put('status'),
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
            $update = $this->ruangan_model->update($id, $data);
            // IF id tidak ditemukan
            if($update === false){
                $this->response([
                    'status'  => false,
                    'message' => 'Data ruangan tidak ditemukan, gagal memperbarui',
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

    

    public function delete_delete(){
        $id = $this->get('id');

        if($id <= 0){
            $this->response(NULL, RestController::HTTP_BAD_REQUEST);
        }
        $delete = $this->ruangan_model->delete($id);
        if($delete == true){
            $this->response([
                'status' => true,
                'message' => 'Ruangan berhasil dihapus'
            ], RestController::HTTP_OK);
        }
        else{
            $this->response([
                'status' => false,
                'message' => 'ID tidak ditemukan, gagal menghapus ruangan'
            ], RestController::HTTP_NOT_FOUND);
        }
    }

    public function rekomendasi_get(){
        $page = $this->get('page');
        if($page === null) $page = 1;
        $limit = 10;
        $jadwal = [
            'tanggal' => $this->get('tanggal'),
            'mulai' => $this->get('mulai'),
            'selesai' => $this->get('selesai')
        ];
        $peserta = (int) $this->get('peserta');
        
        $data = $this->ruangan_model->recommendation($jadwal, $peserta, $page, $limit);
        if($data === false){
            $this->response([
                'status'  => false,
                'message' => 'ID pemesanan tidak ditemukan...'
            ], RestController::HTTP_BAD_REQUEST);    
        }
        // Data tidak ditemukan
        else if(empty($data)){
            $this->response([
                'status'  => true,
                'message' => 'Tidak ada data ruangan yang ditemukan...',
                'totalData' => 0,
                'totalPage' => 0,
                'ruangan' => []
            ], RestController::HTTP_OK);
        }
        $this->response([
            'status' => true,
            'message' => 'Ruangan yang direkomendasikan',
            'totalData' => $data['total'],
            'totalPage' => ceil($data['total']/$limit),
            'page'      => $page,
            'ruangan' => $data['data']
        ], RestController::HTTP_OK);
        
    }

    private function generateRid(){
        $last = $this->db->select('RID')->order_by('ID',"DESC")->limit(1)->get('RAPAT_MASTER_RUANGAN')->result();
        $cc = 0;
        if(!empty($last)){
            $rid = explode('RG', $last[0]->RID);
            $cc = (int) $rid[1];
        }
        
        // $cc = $this->db->count_all('mfacilities_master_sopir')+1;
        $coun = str_pad($cc+1, 4, 0, STR_PAD_LEFT); // Updated line to include '0'
        $id = "RG";
        $rid = $id.$coun;
        return $rid;
    }
    
    // Private function untuk validasi input form di serverside
    private function validation_rules($data){
        $this->form_validation->set_rules('nama', 'Nama Ruangan', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_data($data);
    }

}