<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/RestController.php';
require APPPATH . '/libraries/Format.php';

use libraries\RestServer\RestController;

class Sopir extends RestController {

    function __construct(){
        // Construct the parent class
        parent::__construct();
        $this->load->model('kendaraan/sopir_model');
    }

    /** Mendapatkan data sopir, tambahan query-string ?tersedia=true untuk mendapatkan data sopir yang tersedia
     * 
     * ORACLE DB TEST ✅
     */
    public function index_get(){
        $id = $this->get('id');
        // Search Query
        $cari = $this->get('q');
        // Filter
        $filter = array(
            'status' => $this->get('status')
        );
        $sort = array(
            'sortby' => $this->get('sortBy'),
            'sort'   => $this->get('sort')
        );

        $data = null;
        $page = $this->get('page');
        if($page === null) $page = 1;
        $limit = 10;

        if($id === null){
            $data = $this->sopir_model->all($page, $cari, $filter, $sort, $limit);
            // Data tidak ditemukan
            if(empty($data['data'])){
                $this->response([
                    'status'  => true,
                    'message' => 'Tidak ada data sopir yang ditemukan...',
                    'totalData' => 0,
                    'totalPage' => 0,
                    'sopir' => []
                ], RestController::HTTP_OK);
            }
    
            $this->response([
                'status'  => true,
                'message' => 'Data sopir tersedia',
                'totalData' => $data['total'],
                'totalPage' => ceil($data['total']/$limit),
                'page'      => $page,
                'sopir' => $data['data']
            ], RestController::HTTP_OK);
        }
        else{
            if($id <= 0){
                $this->response(NULL, RestController::HTTP_BAD_REQUEST);
            }
            else{
                $data = $this->sopir_model->byId($id);
                // Data tidak ditemukan
                if(empty($data)){
                    $this->response([
                        'status'  => true,
                        'message' => 'Tidak ada data sopir yang ditemukan...',
                        'sopir' => []
                    ], RestController::HTTP_OK);
                }
                $this->response([
                    'status' => true,
                    'message' => 'Data sopir tersedia',
                    'sopir'    => $data[0]
                ], RestController::HTTP_OK);
            }
        }
        
    }
    

    /** Fungsi untuk mendapatkan riwayat pengantaran
     *  
     * ORACLE DB TEST ✅ 
     */
    public function riwayat_get(){
        $sopir = $this->get('id');
        $page = $this->get('page');
        $cari = $this->get('q'); // Search query
        $filter = array(
            'status' => $this->get('status') // Filter status
        );

        if($page === null) $page = 1;
        $limit = 10;

        $data = $this->sopir_model->history($sopir, $cari, $filter, $page, $limit);
        if(empty($data['data'])){
            $this->response([
                'status'  => true,
                'message' => 'Tidak ada riwayat pengantaran...',
                'totalData' => 0,
                'totalPage' => 0,
                'pengantaran' => []
            ], RestController::HTTP_OK);
        }
        $this->response([
            'status' => true,
            'message' => 'Data riwayat pengantaran sopir',
            'totalData' => $data['total'],
            'totalPage' => ceil($data['total']/$limit),
            'page'      => $page,
            'pengantaran' => $data['data']
        ], RestController::HTTP_OK);
    }

    /** Fungsi untuk mendapatkan riwayat kehadiran
     *  
     * ORACLE DB TEST ✅
     */
    public function kehadiran_get(){
        $sopir = $this->get('id');
        $page = $this->get('page');
        if($page === null) $page = 1;
        $limit = 4;

        $data = $this->sopir_model->attendanceGet($sopir, $page, $limit);
        if(empty($data['data'])){
            $this->response([
                'status'  => true,
                'message' => 'Tidak ada data kehadiran...',
                'totalData' => 0,
                'totalPage' => 0,
                'kehadiran' => []
            ], RestController::HTTP_OK);
        }
        $this->response([
            'status' => true,
            'message' => 'Data kehadiran sopir',
            'totalData' => $data['total'],
            'totalPage' => ceil($data['total']/$limit),
            'page'      => $page,
            'kehadiran' => $data['data']
        ], RestController::HTTP_OK);
    }

    /** Fungsi untuk menambahkan data sopir
     *  
     * ORACLE DB TEST ✅
     */
    public function create_post(){
        $kendaraan = null;
        if($this->post('kendaraan_id') != '') $kendaraan = $this->post('kendaraan_id');
        $nid = $this->generateNid();
        $data = array(
            'nid'            => $nid,
            'nama'           => $this->post('nama'),
            'password'       => password_hash($nid, PASSWORD_BCRYPT),
            'current_password' => $nid,
            'kendaraan_id'   => $kendaraan,
            'lokasi'         => $this->post('lokasi'),
            'nohp'           => $this->post('nohp'),
            'status'         => 'Nonaktif'
        );
        $this->validation_rules($data, false);
        // IF validasi gagal
        if($this->form_validation->run() == false){
            $this->response([
                'status' => false,
                'message' => $this->form_validation->error_array()
            ], RestController::HTTP_BAD_REQUEST);
        }
        else{
            $status = $this->sopir_model->create($data);
            // IF success
            if($status === true){
                $this->response([
                    'status'  => true,
                    'message' => 'Berhasil ditambahkan',
                ], RestController::HTTP_CREATED);    
            }
            else if(array_key_exists('code', $status)){
                $msg = null;
                if($status['code'] == 2291) $msg = 'Kendaraan yang dipilih tidak ada di database';
                else if($status['code'] == 1) $msg = 'Kendaraan telah digunakan oleh sopir lain';
                $this->response([
                    'status'  => false,
                    'message' => 'Data tidak berhasil ditambahkan, '.$msg
                ], RestController::HTTP_BAD_REQUEST);    
            }
            
        }
    }

    /** Fungsi untuk memperbarui data sopir
     * 
     * ORACLE DB TEST ✅
     */
    public function update_put(){
        $id = $this->put('id');
        $kendaraan = null;
        if($this->put('kendaraan_id') != '') $kendaraan = $this->put('kendaraan_id');
        $data = array(
            'nama'           => $this->put('nama'),
            'kendaraan_id'   => $kendaraan,
            'password'       => password_hash($this->put('password'), PASSWORD_BCRYPT),
            'current_password'=> $this->put('password'),
            'lokasi'         => $this->put('lokasi'),
            'nohp'           => $this->put('nohp'),
            'last_update_at' => date("Y-m-d H:i:s")
        );
        $this->validation_rules($data, true);
        // IF validasi gagal
        if($this->form_validation->run() == false){
            $this->response([
                'status' => false,
                'message' => $this->form_validation->error_array()
            ], RestController::HTTP_BAD_REQUEST);
        }
        else{
            $update = $this->sopir_model->update($id, $data);

            if($update === true){
                $this->response([
                    'status'  => true,
                    'message' => 'Berhasil diperbarui',
                ], RestController::HTTP_OK);    
            }
            else if($update === false){
                $this->response([
                    'status'  => false,
                    'message' => 'Data sopir tidak ditemukan',
                ], RestController::HTTP_BAD_REQUEST);    
            }
            else if(array_key_exists('code', $update)){
                $msg = null;
                if($update['code'] == 2291) $msg = 'Kendaraan yang dipilih tidak ada di database';
                else if($update['code'] == 1) $msg = 'Kendaraan telah digunakan oleh sopir lain';
                $this->response([
                    'status'  => false,
                    'message' => 'Data tidak berhasil diperbarui, '.$msg,
                ], RestController::HTTP_BAD_REQUEST);    
            }

        }
    }

    /** Fungsi untuk menghapus data kendaraan
     * 
     * ORACLE DB TEST ✅
     */
    public function delete_delete(){
        $id = $this->get('id');

        if($id <= 0){
            $this->response(NULL, RestController::HTTP_BAD_REQUEST);
        }
        $delete = $this->sopir_model->delete($id);
        if($delete == true){
            $this->response([
                'status' => true,
                'message' => 'Sopir berhasil dihapus'
            ], RestController::HTTP_OK);
        }
        else{
            $this->response([
                'status' => false,
                'message' => 'ID tidak ditemukan, gagal menghapus sopir'
            ], RestController::HTTP_NOT_FOUND);
        }
    }

    /** Fungsi untuk kehadiran sopir
     * 
     * 1 (true) = Check-in
     * 0 (false) = Check-out
     * ORACLE DB TEST ✅
     */
    public function attendance_post(){
        $id = $this->post('id');
        $check = $this->post('check');
        if($id <= 0){
            $this->response(NULL, RestController::HTTP_BAD_REQUEST);
        }
        $status = $this->sopir_model->attendance($id, $check);
        if($status === true){
            $this->response([
                'status'  => true,
                'message' => 'Berhasil '.($check == 1 ? 'Chekin' : 'Checkout'),
            ], RestController::HTTP_OK);    
        }
        else if($status === false){
            $this->response([
                'status'  => false,
                'message' => 'Anda sudah absen hari ini',
            ], RestController::HTTP_BAD_REQUEST);    
        }
        else if($status === 'missing'){
            $this->response([
                'status'  => false,
                'message' => 'Anda harus absen dahulu',
            ], RestController::HTTP_BAD_REQUEST);    
        }
        else if(array_key_exists('code', $status)){
            $msg = null;
            if($status['code'] == 1452) $msg = 'Data sopir tidak ada di database';
            $this->response([
                'status'  => false,
                'message' => 'Gagal absen, '.$msg,
            ], RestController::HTTP_BAD_REQUEST);    
        }
        
    }

    /**
     * ORACLE DB TEST ✅
     */
    public function rekomendasi_get(){
        // Search Query
        $cari = $this->get('q');        
        $sort = array(
            'sortby' => $this->get('sortBy'),
            'sort'   => $this->get('sort')
        );
        $page = $this->get('page');
        if($page === null) $page = 1;
        $limit = 10;
        $pemesananId = $this->get('id');
        if($pemesananId <= 0){
            $this->response(NULL, RestController::HTTP_BAD_REQUEST);
        }
        else{
            $data = $this->sopir_model->recommendation($pemesananId, $cari, $sort, $page, $limit);
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
                    'message' => 'Tidak ada data sopir yang ditemukan...',
                    'totalData' => 0,
                    'totalPage' => 0,
                    'sopir' => []
                ], RestController::HTTP_OK);
            }
            $this->response([
                'status' => true,
                'message' => 'Sopir yang direkomendasikan',
                'totalData' => $data['total'],
                'totalPage' => ceil($data['total']/$limit),
                'page'      => $page,
                'sopir' => $data['data']
            ], RestController::HTTP_OK);
        }
    }


    
    private function generateNid(){
        $last = $this->db->select('NID')->order_by('ID',"DESC")->limit(1)->get('KENDARAAN_MASTER_SOPIR')->result();
        $cc = 0;
        if(!empty($last) && $last[0]->NID != null){
            $nid = explode('SP', $last[0]->NID);
            $cc = (int) $nid[1];
        }
        
        // $cc = $this->db->count_all('mfacilities_master_sopir')+1;
        $coun = str_pad($cc+1, 4, 0, STR_PAD_LEFT); // Updated line to include '0'
        $id = "SP";
        $nid = $id.$coun;
        return $nid;
    }

    // Private function untuk validasi input form di serverside
    private function validation_rules($data, $update){
        $this->form_validation->set_rules('nama', 'Nama Sopir', 'required');
        $this->form_validation->set_rules('nohp', 'Nomor Handphone', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_data($data);
    }
}
