<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/RestController.php';
require APPPATH . '/libraries/Format.php';

use libraries\RestServer\RestController;

class Kendaraan extends RestController {

    function __construct(){
        // Construct the parent class
        parent::__construct();
        $this->load->model('kendaraan/kendaraan_model');
    }    

    /** Fungsi untuk mendapatkan data kendaraan
     *  ORACLE DB TEST ✅
     */
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

        if($id === NULL){

            $data = $this->kendaraan_model->all($cari, $filter, $page, $limit, $all);

            if(empty($data['data'])){
                $this->response([
                    'status'  => true,
                    'message' => 'Tidak ada data kendaraan yang ditemukan...',
                    'totalData' => 0,
                    'totalPage' => 0,
                    'kendaraan' => []
                ], RestController::HTTP_OK);
            }
    
            $this->response([
                'status'  => true,
                'message' => 'Data kendaraan tersedia',
                'totalData' => $data['total'],
                'totalPage' => ceil($data['total']/$limit),
                'page'      => $page,
                'kendaraan' => $data['data']
            ], RestController::HTTP_OK);
            
        }
        // Berdasarkan ID kendaraan
        else{
            if($id <= 0) $this->response(NULL, RestController::HTTP_BAD_REQUEST);
            // Data kendaraan berdasarkan ID
            else $data = $this->kendaraan_model->byId($id);
            if(empty($data)){
                $this->response([
                    'status'  => true,
                    'message' => 'Tidak ada data kendaraan yang ditemukan...',
                    'kendaraan' => []
                ], RestController::HTTP_OK);
            }
    
            $this->response([
                'status'  => true,
                'message' => 'Data kendaraan tersedia',
                'kendaraan' => $data[0]
            ], RestController::HTTP_OK);
            
        }
        
        
        
        
    }

    /** Fungsi untuk menambahkan data kendaraan
     *  ORACLE DB TEST ✅
     */
    public function create_post(){
        $data = array(
            'nopol'          => $this->post('nopol'),
            'nama'           => $this->post('nama_kendaraan'),
            'tipe'           => $this->post('tipe_kendaraan'),
            'lokasi'         => $this->post('lokasi'),
            'status'         => 'Nonaktif',
            'tgl_serahterima'=> date('Y-m-d', strtotime($this->post('tgl_serahterima')))
        );
        $this->validation_rules($data, null);
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
            $status = $this->kendaraan_model->create($data);
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
                    'message' => 'Data kendaraan berhasil ditambahkan...',
                ], RestController::HTTP_CREATED);    
            }
        }
        
    }

    /** Fungsi untuk memperbarui data kendaraan
     *  ORACLE DB TEST ✅
     */
    public function update_put(){
        $id = $this->put('id');
        if(!$id){
            $this->response([
                'status'  => false,
                'message' => 'ID tidak boleh kosong...'
            ], RestController::HTTP_BAD_REQUEST);
        }
        $data = array(
            'nopol'          => $this->put('nopol'),
            'nama'           => $this->put('nama_kendaraan'),
            'tipe'           => $this->put('tipe_kendaraan'),
            'lokasi'         => $this->put('lokasi'),
            'tgl_serahterima'=> date('Y-m-d', strtotime($this->put('tgl_serahterima')))

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
            $update = $this->kendaraan_model->update($id, $data);
            // IF id tidak ditemukan
            if($update === false){
                $this->response([
                    'status'  => false,
                    'message' => 'Data kendaraan tidak ditemukan, gagal memperbarui',
                ], RestController::HTTP_BAD_REQUEST);    
            }
            // update success
            else{
                $this->response([
                    'status'  => true,
                    'message' => 'Data kendaraan berhasil diperbarui',
                ], RestController::HTTP_OK);    
            }
        }
    }


    /** Fungsi untuk menghapus data kendaraan
     *  ORACLE DB TEST ✅
     */
    public function delete_delete(){
        $id = $this->get('id');

        if($id <= 0){
            $this->response(NULL, RestController::HTTP_BAD_REQUEST);
        }
        $delete = $this->kendaraan_model->delete($id);
        if($delete == true){
            $this->response([
                'status' => true,
                'message' => 'Kendaraan berhasil dihapus'
            ], RestController::HTTP_OK);
        }
        else if(array_key_exists('code', $delete)){
            $msg = null;
            if($status['code'] == 1451) $msg = 'Kendaraan sedang digunakan oleh sopir, mohon ganti kendaraan dari sopir terkait';
            $this->response([
                'status'  => false,
                'message' => 'Gagal menghapus kendaraan, '.$msg,
            ], RestController::HTTP_BAD_REQUEST);    
        }
        else{
            $this->response([
                'status' => false,
                'message' => 'ID tidak ditemukan, gagal menghapus kendaraan'
            ], RestController::HTTP_NOT_FOUND);
        }
    }
    

    // Private function untuk validasi input form di serverside
    private function validation_rules($data, $id){
        if($id != null){
            $this->form_validation->set_rules(
                'nopol', 'Nomor Polisi',
                'required|is_unique[KENDARAAN_MASTER_KENDARAAN.ID!='.$id.' AND '.'NOPOL=]',
                array(
                    'required' => 'Nomor polisi wajib diisi.',
                    'is_unique' => 'Nomor polisi tidak boleh sama.'
                )
            );        
        }
        else{
            $this->form_validation->set_rules(
                'nopol', 'Nomor Polisi',
                'required|is_unique[KENDARAAN_MASTER_KENDARAAN.NOPOL]',
                array(
                    'required' => 'Nomor polisi wajib diisi.',
                    'is_unique' => 'Nomor polisi tidak boleh sama.'
                )
            );        
        }
        
        $this->form_validation->set_rules('nama', 'Nama kendaraan', 'required');
        $this->form_validation->set_rules('tipe', 'Tipe kendaraan', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_rules('tgl_serahterima', 'Tanggal Serah Terima','required');
        $this->form_validation->set_data($data);
    }
}
