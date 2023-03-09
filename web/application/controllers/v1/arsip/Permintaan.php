<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/RestController.php';
require APPPATH . '/libraries/Format.php';

use libraries\RestServer\RestController;

class Permintaan extends RestController {

    function __construct(){
        parent::__construct();
        $this->load->model('arsip/permintaan_model');
    }

    public function index_get(){
        $id = $this->get('id');
        // Search Query
        $cari = $this->get('q');
        // Filter
        $filter = array(
            'rak' => $this->get('rak'),
            'sort' => $this->get('sort'),
            'sortBy' => $this->get('sortBy'),
        );


        $page = $this->get('page');
        if($page === null) $page = 1;
        $limit = 10;
        if($id === null){
            $data = $this->permintaan_model->all($cari, $filter, $page, $limit);
            if(empty($data['data'])){
                $this->response([
                    'status'  => true,
                    'message' => 'Tidak ada permintaan...',
                    'totalData' => 0,
                    'totalPage' => 0,
                    'permintaan' => []
                ], RestController::HTTP_OK);
            }
            $this->response([
                'status' => true,
                'message' => 'Data permintaan',
                'totalData' => $data['total'],
                'totalPage' => ceil($data['total']/$limit),
                'page'      => $page,
                'permintaan' => $data['data']
            ], RestController::HTTP_OK);
        }
        
        // Mendapatkan detail data pemesanan berdasarkan ID
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
                        'message' => 'Tidak ada data pemesanan yang ditemukan...',
                        'permintaan' => []
                    ], RestController::HTTP_OK);
                }
                $this->response([
                    'status' => true,
                    'message' => 'Data pemesanan tersedia',
                    'permintaan' => $data
                ], RestController::HTTP_OK);
            }
        }
    }

    

    public function create_post(){
        $berkasPointer = 0;
        $datas = json_decode($this->post('data'));        
        $countBox = count($datas);
        $permintaan = [
            'user_nid' => 1,
            'jumlah_boks' => $countBox,
            'nama_pemesan' => 'Bambang Kentolet',
            'subdit' => 'DIV IT'
        ];
        $permintaan_id = $this->permintaan_model->createPermintaan($permintaan);
        
        foreach($datas as $data){
            $tenggat = date('Y-m-d', strtotime('+'.$data->tahun_retensi.' year'));
            $boks = [
                'boks_id' => $this->generateBoksId(),
                'ukuran_boks' => $data->ukuran_boks,
                'tahun_retensi' => $data->tahun_retensi,
                'permintaan_arsip_id' => $permintaan_id,
                'masa_tenggat' => $tenggat
            ];
            $boks_id = $this->permintaan_model->createBoksArsip($boks);
            foreach($data->berkas as $berkas){
                $config['upload_path']          = './uploads/arsip/';
                $config['allowed_types']        = 'xlsx|csv|xls';
                $config['encrypt_name'] 		= true;
                $this->load->library('upload',$config);
                if(!empty($_FILES['files']['name'][$berkasPointer])){
                    $_FILES['file']['name'] = $_FILES['files']['name'][$berkasPointer];
                    $_FILES['file']['type'] = $_FILES['files']['type'][$berkasPointer];
                    $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$berkasPointer];
                    $_FILES['file']['error'] = $_FILES['files']['error'][$berkasPointer];
                    $_FILES['file']['size'] = $_FILES['files']['size'][$berkasPointer];

                    if(! $this->upload->do_upload('file')){
                        $error = array('error' => $this->upload->display_errors());
                        var_dump($error);
                    }
                    else{
                        $uploadData = $this->upload->data();
                        $data = [
                            'nama' => $berkas,
                            'boks_arsip_id' => $boks_id,
                            'nama_berkas' => $uploadData['file_name'],
                            'tipe_berkas' => $uploadData['file_ext'],
                            'ukuran_berkas' => $uploadData['file_size'],
                        ];
                        $wow = $this->permintaan_model->createBerkasArsip($data);
                        $berkasPointer++;
                    }
                }
                else{
                    $data = [
                        'nama' => $berkas,
                        'boks_arsip_id' => $boks_id,
                        'nama_berkas' => null,
                        'tipe_berkas' => null,
                        'ukuran_berkas' => null,
                    ];
                    $wow = $this->permintaan_model->createBerkasArsip($data);
                    $berkasPointer++;
                }
            }
        }
        $this->response([
            'status'  => true,
            'message' => 'Permintaan Arsip berhasil dibuat',
        ], RestController::HTTP_CREATED);  
    }

    public function rak_put(){
        $boksid = $this->put('boks_id');
        $rakid = $this->put('rak_id');        
        $rak = $this->permintaan_model->assignRak($boksid, $rakid);
        if($rak === true){
            $this->response([
                'status'  => true,
                'message' => 'Boks berhasil dipindah ke rak',
            ], RestController::HTTP_OK);    
        }
        else if($rak['status'] === false){
            $this->response([
                'status'  => false,
                'message' => $rak['msg'],
            ], RestController::HTTP_BAD_REQUEST);    
        }
    }

    public function pindahrak_put(){
        $boksid = $this->put('boks_id');
        $rakid = $this->put('rak_id');        
        $rak = $this->permintaan_model->moveRak($boksid, $rakid);
        if($rak === true){
            $this->response([
                'status'  => true,
                'message' => 'Boks berhasil dipindah ke rak',
            ], RestController::HTTP_OK);    
        }
        else if($rak['status'] === false){
            $this->response([
                'status'  => false,
                'message' => $rak['msg'],
            ], RestController::HTTP_BAD_REQUEST);    
        }
    }

    private function generateBoksId(){
        $last = $this->db->select('BOKS_ID')->order_by('ID',"DESC")->limit(1)->get('ARSIP_BOKS')->result();
        $cc = 0;
        if(!empty($last) && $last[0]->BOKS_ID != null){
            $bksid = explode('BKS', $last[0]->BOKS_ID);            
            $cc = (int) $bksid[1];
        }
        
        // $cc = $this->db->count_all('mfacilities_master_sopir')+1;
        $coun = str_pad($cc+1, 5, 0, STR_PAD_LEFT); // Updated line to include '0'
        $id = "BKS";
        $bksid = $id.$coun;
        return $bksid;
    }

    

    


}