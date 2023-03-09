<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/RestController.php';
require APPPATH . '/libraries/Format.php';

use libraries\RestServer\RestController;

class Permintaan extends RestController {
    function __construct(){
        parent::__construct();
        $this->load->model('atk/permintaan_model');

    }

    public function index_get(){
        $id = $this->get('id');
        $userid = 1;
        $cari = $this->get('q');
        $filter = array(
            'status' => $this->get('status')
        );
        
        $page = $this->get('page');
        if($page === null) $page = 1;
        $limit = 10;

        if($id === null){
            if($userid <= 0) $this->response(null, RestController::HTTP_BAD_REQUEST);
            else{
                $data = $this->permintaan_model->all($userid, $cari, $filter, $page, $limit);
                if(empty($data['data'])){
                    $this->response([
                        'status'  => true,
                        'message' => 'Tidak ada permintaan ATK...',
                        'totalData' => 0,
                        'totalPage' => 0,
                        'permintaan' => []
                    ], RestController::HTTP_OK);
                }
                $this->response([
                    'status' => true,
                    'message' => 'Data permintaan ATK anda',
                    'totalData' => $data['total'],
                    'totalPage' => ceil($data['total']/$limit),
                    'page'      => $page,
                    'permintaan' => $data['data']
                ], RestController::HTTP_OK);
            }
        }
        else{
            if($id <= 0){
                $this->response(NULL, RestController::HTTP_BAD_REQUEST);
            }
            else{
                $data = $this->permintaan_model->detailById($id);
                // Data tidak ditemukan
                if(empty($data)){
                    $this->response([
                        'status'  => true,
                        'message' => 'Tidak ada data permintaan ATK yang ditemukan...',
                        'permintaan' => []
                    ], RestController::HTTP_OK);
                }
                $this->response([
                    'status' => true,
                    'message' => 'Data permintaan ATK tersedia',
                    'permintaan'    => $data[0]
                ], RestController::HTTP_OK);
            }
        }
    }

    public function persetujuan_get(){
        $page = $this->get('page');
        if($page === null) $page = 1;
        $limit = 10;
        //Untuk halaman notifikasi manajer dan admin
        $role = $this->get('role');
        if($role == 'manajer' || $role == 'admin'){
            $data = $this->permintaan_model->forApproval($role, $page, $limit);
            if(empty($data['data'])){
                $this->response([
                    'status'  => true,
                    'message' => 'Tidak ada permintaan ATK yang perlu disetujui atau ditolak',
                    'totalData' => 0,
                    'totalPage' => 0,
                    'permintaan' => []
                ], RestController::HTTP_OK);
            }
            $this->response([
                'status' => true,
                'message' => 'Data permintaan ATK yang perlu disetujui atau ditolak',
                'totalData' => $data['total'],
                'totalPage' => ceil($data['total']/$limit),
                'page'      => $page,
                'permintaan' => $data['data']
            ], RestController::HTTP_OK);
        }
        else{
            $this->response(['status' => false, 'message' => 'Role harus manajer/admin'], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function riwayat_get(){
        $cari = $this->get('q');
        $filter = array(
            'divisi' => $this->get('divisi'),
            'bulan' => $this->get('bulan'),
            'tahun' => $this->get('tahun'),
            'status' => $this->get('status')
        );

        $page = $this->get('page');
        if($page === null) $page = 1;
        $limit = 10;

        $data = $this->permintaan_model->history($cari, $filter, $page, $limit);
        if(empty($data['data'])){
            $this->response([
                'status'  => true,
                'message' => 'Tidak ada permintaan ATK',
                'totalData' => 0,
                'totalPage' => 0,
                'permintaan' => []
            ], RestController::HTTP_OK);
        }
        $this->response([
            'status' => true,
            'message' => 'Data permintaan ATK',
            'totalData' => $data['total'],
            'totalPage' => ceil($data['total']/$limit),
            'page'      => $page,
            'permintaan' => $data['data']
        ], RestController::HTTP_OK);
    }

    public function monitoring_get(){
        $cari = $this->get('q');
        $filter = array(
            'divisi' => $this->get('divisi'),
            'bulan' => $this->get('bulan'),
            'tahun' => $this->get('tahun')
        );

        $page = $this->get('page');
        if($page === null) $page = 1;
        $limit = 10;

        $data = $this->permintaan_model->monitoring($cari, $filter, $page, $limit);
        if(empty($data)){
            $this->response([
                'status'  => true,
                'message' => 'Tidak ada permintaan ATK',
                'permintaan' => []
            ], RestController::HTTP_OK);
        }
        $this->response([
            'status' => true,
            'message' => 'Data permintaan ATK',
            'permintaan' => $data
        ], RestController::HTTP_OK);
    }

    public function monitoring_divisi_get(){
        $cari = $this->get('q');
        $filter = array(
            'bulan' => $this->get('bulan'),
            'tahun' => $this->get('tahun')
        );

        $page = $this->get('page');
        if($page === null) $page = 1;
        $limit = 10;

        $data = $this->permintaan_model->monitoringDivisi($cari, $filter, $page, $limit);
        if(empty($data)){
            $this->response([
                'status'  => true,
                'message' => 'Tidak ada permintaan ATK',
                'permintaan' => []
            ], RestController::HTTP_OK);
        }
        $this->response([
            'status' => true,
            'message' => 'Data permintaan ATK',
            'permintaan' => $data
        ], RestController::HTTP_OK);
    }

    // ORACLE DB TEST ✅
    public function create_post(){
        $nid = 1;
        $subdit = 'DIVISI IT';
        $nama = 'Pak Kumis';
        $data = array(
            'subdit' => $subdit,
            'nid' => $nid,
            'nama' => $nama,
            'status_permintaan' => 'Menunggu',
            'created_at'        => date("Y-m-d H:i:s")
        );
        $atk = $this->post('atk');
        $create = $this->permintaan_model->create($data, $atk);
        if($create === true){
            $this->response([
                'status'  => true,
                'message' => 'Permintaan ATK berhasil dibuat',
            ], RestController::HTTP_CREATED);    
        }
        else if(array_key_exists('code', $create)){
            $msg = null;
            
            $this->response([
                'status'  => false,
                'message' => 'Data tidak berhasil ditambahkan, '.$msg,
            ], RestController::HTTP_BAD_REQUEST);    
        }
    }

    public function persetujuan_put(){
        $id = $this->put('id');
        $role = $this->put('role');
        $catatan = $this->put('catatan');
        $setujui = $this->permintaan_model->approve($id, $role, $catatan);
        if($setujui === true){
            $this->response([
                'status'  => true,
                'message' => 'Permintaan ATK berhasil disetujui',
            ], RestController::HTTP_OK);    
        }
        else if(array_key_exists('status', $setujui)){
            $this->response([
                'status'  => false,
                'message' => $setujui['msg'],
            ], RestController::HTTP_BAD_REQUEST);    
        }
        else if($setujui === false){
            $this->response([
                'status'  => false,
                'message' => 'Data permintaan ATK tidak ditemukan',
            ], RestController::HTTP_BAD_REQUEST);    
        }
    }

    public function penolakan_put(){
        $id = $this->put('id');
        $role = $this->put('role');
        $alasan = $this->put('alasan');
        $tolak = $this->permintaan_model->refuse($id, $role, $alasan);
        if($tolak === true){
            $this->response([
                'status'  => true,
                'message' => 'Permintaan ATK berhasil ditolak',
            ], RestController::HTTP_OK);    
        }
        else if(array_key_exists('status', $tolak)){
            $this->response([
                'status'  => false,
                'message' => $tolak['msg'],
            ], RestController::HTTP_BAD_REQUEST);    
        }
        else if($tolak === false){
            $this->response([
                'status'  => false,
                'message' => 'Data permintaan ATK tidak ditemukan',
            ], RestController::HTTP_BAD_REQUEST);    
        }
        
    }

    public function pembatalan_put(){
        $id = $this->put('id');
        $batal = $this->permintaan_model->cancel($id);
        if($batal == true){
            $this->response([
                'status' => true,
                'message' => 'Permintaan ATK berhasil dibatalkan'
            ], RestController::HTTP_OK);
        }
        else{
            $this->response([
                'status' => false,
                'message' => 'ID tidak ditemukan, gagal membatalkan permintaan'
            ], RestController::HTTP_NOT_FOUND);
        }
    }

    public function rating_post(){
        $id = $this->post('id'); // ID Permintaan
        $rate = $this->post('rate');
        $comment = $this->post('komentar');
        $status = $this->permintaan_model->rating($id, $rate, $comment);
        if($status === true){
            $this->response([
                'status'  => true,
                'message' => 'Penilaian anda berhasil',
            ], RestController::HTTP_OK);    
        }
        else if($status === false){
            $this->response([
                'status'  => false,
                'message' => 'Data permintaan tidak ditemukan',
            ], RestController::HTTP_BAD_REQUEST);    
        }
    }
}
