<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/RestController.php';
require APPPATH . '/libraries/Format.php';

use libraries\RestServer\RestController;

class Notifikasi extends RestController {
    function __construct(){
        parent::__construct();
        $this->load->model('atk/permintaan_model');
        $this->nid = 1;
        $this->nama = 'Khabib Nurmagomedov';
        $this->level = 3;
    }

    public function permintaan_get(){
        $id = 1 ;//$this->get('id'); // ID User/Manajer/Admin
        $page = $this->get('page');
        if($page === null) $page = 1;
        $limit = 10;

        $data = $this->permintaan_model->allMobile($id, $page, $limit);
        if(empty($data['data'])){
            $this->response([
                'status'  => true,
                'message' => 'Tidak ada notifikasi permintaan ATK anda ...',
                'totalData' => 0,
                'totalPage' => 0,
                'notifikasi' => []
            ], RestController::HTTP_OK);
        }
        $this->response([
            'status' => true,
            'message' => 'Permintaan ATK anda',
            'totalData' => $data['total'],
            'totalPage' => ceil($data['total']/$limit),
            'page'      => $page,
            'notifikasi' => $data['data']
        ], RestController::HTTP_OK);
    }

    public function persetujuan_get(){
        $page = $this->get('page');
        if($page === null) $page = 1;
        $limit = 10;
        //Untuk halaman notifikasi manajer dan admin
        $role = $this->get('role');
        if($role == 'manajer' || $role == 'admin'){
            $data = $this->permintaan_model->forApprovalMobile($role, $page, $limit);
            if(empty($data['data'])){
                $this->response([
                    'status'  => true,
                    'message' => 'Tidak ada permintaan ATK yang perlu disetujui atau ditolak',
                    'totalData' => 0,
                    'totalPage' => 0,
                    'pemesanan' => []
                ], RestController::HTTP_OK);
            }
            $this->response([
                'status' => true,
                'message' => 'Data permintaan ATK yang perlu disetujui atau ditolak',
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
        
        if(in_array($this->level, [1,7])){
            $this->db->group_start()
                        ->where('NID_PENERIMA', $this->nid)
                    ->group_end()
                    ->or_group_start()
                        ->where('LEVEL_PENERIMA', 7)
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
            $data = $this->db->order_by('CREATED_AT','DESC')->get('ARSIP_NOTIFIKASI')->result();    
        }
        else{
            $data = $this->db->order_by('CREATED_AT','DESC')->limit($limit, ($page-1)*$limit)->get('ARSIP_NOTIFIKASI')->result();
        }
        

        foreach($data as $key=>$value){
            $temp = (array) $value;
            $data[$key] = (object) array_change_key_case_recursive($temp);
        }

        if(empty($data)){
            $this->response([
                'status'  => true,
                'message' => 'Tidak ada notifikasi Arsip anda ...',
                'totalData' => 0,
                'totalPage' => 0,
                'notifikasi' => []
            ], RestController::HTTP_OK);
        }
        $this->response([
            'status' => true,
            'message' => 'Notifikasi Arsip anda',
            'notifikasi' => $data
        ], RestController::HTTP_OK);
    }
}
