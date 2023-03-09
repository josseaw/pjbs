<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/RestController.php';
require APPPATH . '/libraries/Format.php';

use libraries\RestServer\RestController;

class Room extends RestController {
    
    function __construct(){
        parent::__construct();
        $this->load->model('rapat/room_model');
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
            
            $data = $this->room_model->all($cari, $filter, $all, $page, $limit);
            
            if(empty($data['data'])){
                $this->response([
                    'status'  => true,
                    'message' => 'Tidak ada data room yang ditemukan...',
                    'totalData' => 0,
                    'totalPage' => 0,
                    'room' => []
                ], RestController::HTTP_NOT_FOUND);
            }

            $this->response([
                'status'  => true,
                'message' => 'Data room tersedia',
                'totalData' => $data['total'],
                'totalPage' => ceil($data['total']/$limit),
                'page'      => $page,
                'room' => $data['data']
            ], RestController::HTTP_OK);
        }
        else{
            if($id <= 0){
                $this->response(null, RestController::HTTP_BAD_REQUEST);
            }
            else{
                $data = $this->room_model->byId($id);
            }
            
            if(empty($data)){
                $this->response([
                    'status' => false,
                    'message' => 'Tidak ada data room yang ditemukan...'
                ], RestController::HTTP_NOT_FOUND);
            }

            $this->response([
                'status'    => true,
                'message'   => 'Data room tersedia',
                'data'      => $data
            ], RestController::HTTP_OK);
        }
    }

    public function create_post(){
        $data = array(
            'rid'       => $this->generateRid(),
            'nama'      => $this->post('nama'),
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
            $create = $this->room_model->create($data);

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
                    'message' => 'Data room berhasil ditambahkan...',
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
                'status' => 'error',
                'message' => $error
            ], RestController::HTTP_BAD_REQUEST);
        }
        else{
            $update = $this->room_model->update($id, $data);
            // IF id tidak ditemukan
            if($update === false){
                $this->response([
                    'status'  => false,
                    'message' => 'Data room tidak ditemukan, gagal memperbarui',
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
        $delete = $this->room_model->delete($id);
        if($delete == true){
            $this->response([
                'status' => true,
                'message' => 'room berhasil dihapus'
            ], RestController::HTTP_OK);
        }
        else if(array_key_exists('code', $delete)){
            $msg = null;
            if($status['code'] == 1451) $msg = 'room sedang ada agenda yang menanti';
            $this->response([
                'status'  => false,
                'message' => 'Gagal menghapus room',
                'detail'  => $msg
            ], RestController::HTTP_BAD_REQUEST);    
        }
        else{
            $this->response([
                'status' => false,
                'message' => 'ID tidak ditemukan, gagal menghapus room'
            ], RestController::HTTP_NOT_FOUND);
        }
    }

    public function rekomendasi_get(){
        $page = $this->get('page');
        $zoom = true;
        if($page === null) $page = 1;
        $limit = 10;
        $jadwal = [
            'tanggal' => $this->get('tanggal'),
            'mulai' => $this->get('mulai'),
            'selesai' => $this->get('selesai')
        ];
        
        $data = $this->room_model->recommendation($jadwal, $page, $limit);
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
                'sopir' => []
            ], RestController::HTTP_OK);
        }
        $this->response([
            'status' => true,
            'message' => 'Ruangan yang direkomendasikan',
            'totalData' => $data['total'],
            'totalPage' => ceil($data['total']/$limit),
            'page'      => $page,
            'sopir' => $data['data']
        ], RestController::HTTP_OK);
        
    }

    private function generateRid(){
        $last = $this->db->select('RID')->order_by('ID',"DESC")->limit(1)->get('RAPAT_MASTER_ROOM')->result();
        $cc = 0;
        if(!empty($last)){
            $rid = explode('RE', $last[0]->RID);
            $cc = (int) $rid[1];
        }
        
        // $cc = $this->db->count_all('mfacilities_master_sopir')+1;
        $coun = str_pad($cc+1, 4, 0, STR_PAD_LEFT); // Updated line to include '0'
        $id = "RE";
        $rid = $id.$coun;
        return $rid;
    }
    
    // Private function untuk validasi input form di serverside
    private function validation_rules($data){
        $this->form_validation->set_rules('nama', 'Nama room', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_data($data);
    }
}
