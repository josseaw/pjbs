<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/RestController.php';
require APPPATH . '/libraries/Format.php';

use libraries\RestServer\RestController;

class Pemesanan extends RestController {

    function __construct(){
        // Construct the parent class
        parent::__construct();
        $this->load->model('kendaraan/pemesanan_model');

        $this->nid = 1;
        $this->nama = 'Khabib Nurmagomedov';
        $this->level = 6;
    }

    /** Fungsi untuk mendapatkan data pemesanan
     * 
     * ORACLE DB TEST ✅
     */
    public function index_get(){
        $id = $this->get('id'); // ID pemesanan
        $userid = 1; // ID dari user/manajer/admin nanti diget lewat creds
        $cari = $this->get('q'); // Search query
        $filter = array(
            'status' => $this->get('status') // Filter status
        );

        
        $page = $this->get('page');
        if($page === null) $page = 1;
        $limit = 10;

        if($id === null){   
            if($userid <= 0){
                $this->response(NULL, RestController::HTTP_BAD_REQUEST);
            }
            // Mendapatkan data pemesanan User/Manajer/Admin
            else{
                $data = $this->pemesanan_model->all($userid, $cari, $filter, $page, $limit);
                if(empty($data['data'])){
                    $this->response([
                        'status'  => true,
                        'message' => 'Tidak ada pemesanan kendaraan...',
                        'totalData' => 0,
                        'totalPage' => 0,
                        'pemesanan' => []
                    ], RestController::HTTP_OK);
                }
                $this->response([
                    'status' => true,
                    'message' => 'Data pemesanan kendaraan anda',
                    'totalData' => $data['total'],
                    'totalPage' => ceil($data['total']/$limit),
                    'page'      => $page,
                    'pemesanan' => $data['data']
                ], RestController::HTTP_OK);
            }
        }
        // Mendapatkan detail data pemesanan berdasarkan ID
        else{
            if($id <= 0){
                $this->response(NULL, RestController::HTTP_BAD_REQUEST);
            }
            else{
                $data = $this->pemesanan_model->detailById($id);
                // Data tidak ditemukan
                if(empty($data)){
                    $this->response([
                        'status'  => true,
                        'message' => 'Tidak ada data pemesanan yang ditemukan...',
                        'pemesanan' => []
                    ], RestController::HTTP_OK);
                }
                $this->response([
                    'status' => true,
                    'message' => 'Data pemesanan tersedia',
                    'pemesanan'    => $data[0]
                ], RestController::HTTP_OK);
            }
        }
    }

    // ORACLE DB TEST ✅
    public function persetujuan_get(){
        $cari = $this->get('q');
        $page = $this->get('page');
        if($page === null) $page = 1;
        $limit = 10;
        $role = $this->get('role');
        if($role == 'manajer' || $role == 'admin'){
            $data = $this->pemesanan_model->forApproval($role, $cari, $page, $limit);
            if(empty($data['data'])){
                $this->response([
                    'status'  => true,
                    'message' => 'Tidak ada pemesanan kendaraan yang perlu disetujui atau ditolak',
                    'totalData' => 0,
                    'totalPage' => 0,
                    'pemesanan' => []
                ], RestController::HTTP_OK);
            }
            $this->response([
                'status' => true,
                'message' => 'Data pemesanan kendaraan yang perlu disetujui atau ditolak',
                'totalData' => $data['total'],
                'totalPage' => ceil($data['total']/$limit),
                'page'      => $page,
                'pemesanan' => $data['data']
            ], RestController::HTTP_OK);
        }
        else{
            $this->response(['status' => false, 'message' => 'Role harus manajer/admin'], RestController::HTTP_BAD_REQUEST);
        }
    }

    // ORACLE DB TEST ✅
    public function riwayat_get(){
        $page = $this->get('page');
        $cari = $this->get('q'); // Search query
        $filter = array(
            'bulan' => $this->get('bulan'),
            'tahun' => $this->get('tahun'),
            'status' => $this->get('status') // Filter status
        );

        if($page === null) $page = 1;
        $limit = 10;

        $data = $this->pemesanan_model->history($cari, $filter, $page, $limit);
        if(empty($data['data'])){
            $this->response([
                'status'  => true,
                'message' => 'Tidak ada pemesanan kendaraan...',
                'totalData' => 0,
                'totalPage' => 0,
                'pemesanan' => []
            ], RestController::HTTP_OK);
        }
        $this->response([
            'status' => true,
            'message' => 'Data pemesanan kendaraan anda',
            'totalData' => $data['total'],
            'totalPage' => ceil($data['total']/$limit),
            'page'      => $page,
            'pemesanan' => $data['data']
        ], RestController::HTTP_OK);
    }

    // ORACLE DB TEST ✅
    public function tujuan_get(){
        $pemesananId = $this->get('id');
        if($pemesananId == null || $pemesananId <= 0) $this->response(NULL, RestController::HTTP_BAD_REQUEST);
        else{
            $data = $this->pemesanan_model->destination($pemesananId);
            if(empty($data)){
                $this->response([
                    'status'  => true,
                    'message' => 'Tidak ada data tujuan...',
                    'tujuan'  => []
                ], RestController::HTTP_OK);
            }
            $this->response([
                'status' => true,
                'message' => 'Data tujuan tersedia',
                'tujuan'    => $data
            ], RestController::HTTP_OK);
        }
    }

    // ORACLE DB TEST ❌
    public function tujuan_post(){
        $data = array(
            'pemesanan_kendaraan_id'=> $this->post('pemesanan_id'),
            'lokasi'                => $this->post('lokasi'),
            'lat'                   => $this->post('lat'),
            'lng'                   => $this->post('lng')
        );
        $status = $this->pemesanan_model->addDestination($data);
        // IF success
        if($status === true){
            $this->response([
                'status'  => true,
                'message' => 'Berhasil ditambahkan',
                'data'    => $status
            ], RestController::HTTP_CREATED);    
        }
        else if($status === false){
            $this->response([
                'status'  => false,
                'message' => 'Data pemesanan tidak ada didalam basis data',
            ], RestController::HTTP_BAD_REQUEST);    
        }
    }

    

    /** Fungsi untuk menambahkan data pemesanan oleh user/manajer
     * 
     * ORACLE DB TEST ✅
     */
    public function create_post(){
        
        $berangkat = date('Y-m-d', strtotime($this->post('tanggal_berangkat'))).' '.$this->post('jam_berangkat');
        $kembali = date('Y-m-d', strtotime($this->post('tanggal_kembali'))).' '.$this->post('jam_kembali') ;
        $data = array(
            'jumlah_penumpang'    => $this->post('jumlah'),
            'status_dinas'        => $this->post('status_dinas'),
            'nohp'                => $this->post('nohp'),
            'keperluan'           => $this->post('keperluan'),   
            'status_pemesanan'    => 'Menunggu',
            'nid'                 => $this->nid,
            'nama'                => $this->nama,
        );
        $status = $this->pemesanan_model->create($data, $berangkat, $kembali, $this->post('tujuan'));
            // IF success
            if($status === true){
                $this->response([
                    'status'  => true,
                    'message' => 'Pemesanan kendaraan berhasil dibuat',
                ], RestController::HTTP_CREATED);    
            }
            else if(array_key_exists('code', $status)){
                $msg = null;
                if($status['code'] == 2291) $msg = 'Kendaraan yang dipilih tidak ada di database';
                else if($status['code'] == 1) $msg = 'Kendaraan telah digunakan oleh sopir lain';
                $this->response([
                    'status'  => false,
                    'message' => 'Data tidak berhasil ditambahkan, '.$msg,
                ], RestController::HTTP_BAD_REQUEST);    
            }
    }

    /** Fungsi untuk manajer dan admin melakukan persetujuan pemesanan kendaraan
     * 
     * ORACLE DB TEST ✅
     * 
     */
    public function persetujuan_put(){
        $id = $this->put('id');
        $role = $this->put('role');
        $data = array(
            'catatan' => $this->put('catatan'),
            'sopir_id' => $this->put('sopir_id')
        );

        $status = $this->pemesanan_model->approve($id, $role, $data);
        if($status === true){
            $this->response([
                'status'  => true,
                'message' => 'Berhasil disetujui',
            ], RestController::HTTP_OK);    
        }
        else if(array_key_exists('status', $status)){
            $this->response([
                'status'  => false,
                'message' => $status['msg'],
            ], RestController::HTTP_BAD_REQUEST);    
        }
        else if(array_key_exists('code', $status)){
            $msg = null;
            if($status['code'] == 1452) $msg = 'Sopir yang dipilih tidak ada di database';
            $this->response([
                'status'  => false,
                'message' => 'Data tidak berhasil ditambahkan, '.$msg,                
            ], RestController::HTTP_BAD_REQUEST);    
        }
        
    }

    /** Fungsi untuk manajer dan admin melakukan penolakan pemesanan kendaraan
     * 
     * ORACLE DB TEST ✅
     * 
     */
    public function penolakan_put(){
        $id = $this->put('id');
        $role = $this->put('role');
        $alasan = $this->put('alasan');
        $status = $this->pemesanan_model->refuse($id, $role, $alasan);
        if($status === true){
            $this->response([
                'status'  => true,
                'message' => 'Pemesanan berhasil ditolak',
            ], RestController::HTTP_OK);    
        }
        else if($status === false){
            $this->response([
                'status'  => false,
                'message' => 'Data pemesanan tidak ditemukan',
            ], RestController::HTTP_BAD_REQUEST);    
        }
        
    }

    // ORACLE DB TEST ✅
    public function start_put(){
        $id = $this->put('id');
        $start = $this->pemesanan_model->start($id);
        if($start === true){
            $this->response([
                'status'  => true,
                'message' => 'Berangkat',
            ], RestController::HTTP_OK);    
        }
        else if($start === false){
            $this->response([
                'status'  => false,
                'message' => 'Pemesanan tidak ditemukan / Pemesanan belum disetujui',
            ], RestController::HTTP_BAD_REQUEST);    
        }
    }

    /** Fungsi untuk menyelesaikan pemesanan ketika telah sampai tujuan
     * 
     * ORACLE DB TEST ✅
     */
    public function arrive_put(){
        $id = $this->put('id'); // ID Pemesanan
        $idLoc = $this->put('id_tujuan');
        $end = $this->put('end');
        if($end == true){
            $status = $this->pemesanan_model->arrivalEnd($id, $idLoc);    
        }
        else{
            $status = $this->pemesanan_model->arrival($id, $idLoc);
        }
        if($status === true){
            $this->response([
                'status'  => true,
                'message' => 'Telah sampai tujuan',
            ], RestController::HTTP_OK);    
        }
        else if($status === false){
            $this->response([
                'status'  => false,
                'message' => 'Data pemesanan tidak ditemukan / Bukan pemesanan yg sedang berlangsung',
            ], RestController::HTTP_BAD_REQUEST);    
        }
    }

    /** Fungsi untuk user memberikan rating terhadap pemesanan
     * 
     * ORACLE DB TEST ✅
     */
    public function rating_post(){
        $id = $this->post('id'); // ID Pemesanan
        $rate = $this->post('rate');
        $comment = $this->post('komentar');
        $status = $this->pemesanan_model->rating($id, $rate, $comment);
        if($status === true){
            $this->response([
                'status'  => true,
                'message' => 'Penilaian anda berhasil',
            ], RestController::HTTP_OK);    
        }
        else if($status === false){
            $this->response([
                'status'  => false,
                'message' => 'Data pemesanan tidak ditemukan',
            ], RestController::HTTP_BAD_REQUEST);    
        }
    }

}
