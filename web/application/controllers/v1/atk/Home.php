<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/RestController.php';
require APPPATH . '/libraries/Format.php';

use libraries\RestServer\RestController;

class Home extends RestController {
    function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->helper('custom');
    }

    function index_get(){
        $nid = 1;
        $now = date('Y-m-d');
        $tomorrow = date('Y-m-d', strtotime('+2 days'));

        $data = $this->db->select("P.ID, P.SUBDIT, P.STATUS_PERMINTAAN,
                TO_CHAR(P.CREATED_AT, 'YYYY-MM-DD HH24:MI:SS') AS TGL_PENGAJUAN")
                ->from('ATK_PERMINTAAN P')
                ->where('P.NID_PEMESAN', $nid)
                ->where("TO_CHAR(P.CREATED_AT, 'YYYY-MM-DD') >= ",$now)
                ->where("TO_CHAR(P.CREATED_AT, 'YYYY-MM-DD') < ",$tomorrow)
                ->get()->result();
        
        for($i = 0; $i < count($data); $i++){
            //get the atks
            $atk = $this->db->select('MA.NAMA, MA.SATUAN, AD.JENIS, AD.JUMLAH')
                    ->distinct('AD.MASTER_ATK_ID')
                    ->from('ATK_DIPESAN AD')
                    ->join('ATK_MASTER_ATK MA','AD.MASTER_ATK_ID = MA.ID')
                    ->where('AD.PERMINTAAN_ATK_ID',$data[$i]->ID)        
                    ->get()->result();
            foreach($atk as $key=>$value){
                $temp = (array) $value;
                $atk[$key] = (object) array_change_key_case_recursive($temp);
            }
            $data[$i]->atk = $atk;
        }
        foreach($data as $key=>$value){
            $temp = (array) $value;
            $data[$key] = (object) array_change_key_case_recursive($temp);
        }
        if(empty($data)){
            $this->response([
                'status'  => true,
                'message' => 'Tidak ada permintaan ATK hari ini dan besok...',
                'data' => []
            ], RestController::HTTP_OK);
        }
        $this->response([
            'status' => true,
            'message' => 'Pemesanan permintaan ATK hari ini dan besok',
            'data' => $data
        ], RestController::HTTP_OK);
    }
}
