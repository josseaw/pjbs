<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/RestController.php';
require APPPATH . '/libraries/Format.php';

use libraries\RestServer\RestController;

class Notifikasi extends RestController {

    function __construct(){
        // Construct the parent class
        parent::__construct();
        $this->load->model('kendaraan/pemesanan_model');

        $this->nid = 1;
        $this->nama = 'Khabib Nurmagomedov';
        $this->level = 3;
    }

    // ORACLE DB TEST ✅
    public function pemesanan_get(){
        $id = 1 ;//$this->get('id'); // ID User/Manajer/Admin
        $page = $this->get('page');
        if($page === null) $page = 1;
        $limit = 10;

        $data = $this->pemesanan_model->allMobile($id, $page, $limit);
        if(empty($data['data'])){
            $this->response([
                'status'  => true,
                'message' => 'Tidak ada notifikasi pemesanan anda ...',
                'totalData' => 0,
                'totalPage' => 0,
                'notifikasi' => []
            ], RestController::HTTP_OK);
        }
        $this->response([
            'status' => true,
            'message' => 'Pemesanan anda',
            'totalData' => $data['total'],
            'totalPage' => ceil($data['total']/$limit),
            'page'      => $page,
            'notifikasi' => $data['data']
        ], RestController::HTTP_OK);
    }

    /** Fungsi untuk mendapatkan data pemesanan untuk persetujuan, lokasi di activity Persetujuan Manajer / Admin
     * 
     * Mendapatkan data pemesanan untuk admin/manajer == BASE_URL/v1/kendaraan/persetujuan?role={admin/manajer} TESTED ✅
     * // ORACLE DB TEST ✅
     */
    public function persetujuan_get(){
        $page = $this->get('page');
        if($page === null) $page = 1;
        $limit = 10;
        //Untuk halaman notifikasi manajer dan admin
        $role = $this->get('role');
        if($role == 'manajer' || $role == 'admin'){
            $data = $this->pemesanan_model->forApprovalMobile($role, $page, $limit);
            if(empty($data['data'])){
                $this->response([
                    'status'  => true,
                    'message' => 'Tidak ada pemesanan kendaraan yang perlu disetujui atau ditolak',
                    'totalData' => 0,
                    'totalPage' => 0,
                    'notifikasi' => []
                ], RestController::HTTP_OK);
            }
            $this->response([
                'status' => 'success',
                'message' => 'Data pemesanan kendaraan yang perlu disetujui atau ditolak',
                'totalData' => $data['total'],
                'totalPage' => ceil($data['total']/$limit),
                'page'      => $page,
                'notifikasi' => $data['data']
            ], RestController::HTTP_OK);
        }
        else{
            $this->response(['msg' => 'Role harus manajer/admin'], RestController::HTTP_BAD_REQUEST);
        }
    }

    /** Fungsi untuk mendapatkan data pemesanan untuk pengantaran sopir, lokasi di activity Notifikasi Sopir
     * 
     * Mendapatkan data pemesanan untuk pengantaran berdasarkan ID sopir == BASE_URL/v1/kendaraan/pengantaran?id={idsopir}
     * // ORACLE DB TEST ✅
     */
    public function pengantaran_get(){
        //Untuk halaman notifikasi sopir
        $id = $this->get('id'); //id sopir
        $page = $this->get('page');
        if($page === null) $page = 1;
        $limit = 10;

        $data = $this->pemesanan_model->driverTask($id, $page, $limit);
        if(empty($data['data'])){
            $this->response([
                'status'  => true,
                'message' => 'Tidak ada pengantaran ...',
                'totalData' => 0,
                'totalPage' => 0,
                'notifikasi' => []
            ], RestController::HTTP_OK);
        }
        $this->response([
            'status' => true,
            'message' => 'Pengantaran anda',
            'totalData' => $data['total'],
            'totalPage' => ceil($data['total']/$limit),
            'page'      => $page,
            'notifikasi' => $data['data']
        ], RestController::HTTP_OK);
    }


    public function web_get(){
        $page = $this->get('page');
        if($page === null) $page = 1;
        $limit = 10;

        $this->db->select("ID, TIPE, DATA, READ, AKSI,
        TO_CHAR(CREATED_AT, 'YYYY-MM-DD HH24:MI:SS') AS CREATED_AT")
        ->group_start()
            ->where('READ', 0)
            ->or_where('READ', NULL)
        ->group_end();
        
        if(in_array($this->level, [1,4])){
            $this->db->group_start()
                        ->where('NID_PENERIMA', $this->nid)
                    ->group_end()
                    ->or_group_start()
                        ->where('LEVEL_PENERIMA', 4)
                    ->group_end();
            
        }
        else if($this->level == 3){
            $this->db->group_start()
                        ->where('NID_PENERIMA', $this->nid)
                    ->group_end()
                    ->or_group_start()
                        ->where('LEVEL_PENERIMA', 3)
                    ->group_end();
        }
        else{
            $this->db->where('NID_PENERIMA', $this->nid);
        }

        if($page == 'all'){
            $data = $this->db->order_by('CREATED_AT','DESC')->get('KENDARAAN_NOTIFIKASI')->result();    
        }
        else{
            $data = $this->db->order_by('CREATED_AT','DESC')->limit($limit, ($page-1)*$limit)->get('KENDARAAN_NOTIFIKASI')->result();
        }
        

        foreach($data as $key=>$value){
            $temp = (array) $value;
            $data[$key] = (object) array_change_key_case_recursive($temp);
        }

        if(empty($data)){
            $this->response([
                'status'  => true,
                'message' => 'Tidak ada notifikasi Kendaraan anda ...',
                'totalData' => 0,
                'totalPage' => 0,
                'notifikasi' => []
            ], RestController::HTTP_OK);
        }
        $this->response([
            'status' => true,
            'message' => 'Notifikasi Kendaraan anda',
            'notifikasi' => $data
        ], RestController::HTTP_OK);
    }

}
