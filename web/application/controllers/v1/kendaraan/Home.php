<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/RestController.php';
require APPPATH . '/libraries/Format.php';

use libraries\RestServer\RestController;

class Home extends RestController {
    function __construct(){
        // Construct the parent class a
        parent::__construct();
        $this->load->database();
        $this->load->helper('custom');
    } 

    // ORACLE DB TEST ✅
    function index_get(){
        $id = 1;
        $now = date('Y-m-d');
        $tomorrow = date('Y-m-d', strtotime('+2 days'));

        $data = $this->db->select("P.ID, P.NID_PEMESAN, P.NAMA_PEMESAN,
        MS.NAMA AS NAMA_SOPIR, P.STATUS_PEMESANAN, 
        TO_CHAR(P.BERANGKAT, 'YYYY-MM-DD HH24:MI:SS') AS BERANGKAT, 
        TO_CHAR(P.CREATED_AT, 'YYYY-MM-DD HH24:MI:SS') AS CREATED_AT")
        ->from('KENDARAAN_PEMESANAN P')
        ->join('KENDARAAN_MASTER_SOPIR MS','P.SOPIR_ID = MS.ID','left')
        ->where('P.NID_PEMESAN', $id)
        ->where("TO_CHAR(P.BERANGKAT, 'YYYY-MM-DD') >= ",$now)
        ->where("TO_CHAR(P.BERANGKAT, 'YYYY-MM-DD') < ",$tomorrow)
        ->get()->result(); 

        for($i = 0; $i < count($data); $i++){
            $tujuan = $this->db->select('LOKASI')
                                ->from('KENDARAAN_LOKASI_PENGANTARAN')
                                ->where('PEMESANAN_KENDARAAN_ID',$data[$i]->ID)        
                                ->group_start()
                                    ->where('URUTAN >',0)
                                    ->or_where('URUTAN',NULL)
                                ->group_end()
                                ->get()->result();
            $array = [];
            for($j = 0; $j < count($tujuan); $j++){
                array_push($array, $tujuan[$j]->LOKASI);
            }
            $data[$i]->tujuan = $array;
        }
        foreach($data as $key=>$value){
            $temp = (array) $value;
            $data[$key] = (object) array_change_key_case_recursive($temp);
        }
        if(empty($data)){
            $this->response([
                'status'  => true,
                'message' => 'Tidak ada pemesanan kendaraan hari ini dan besok...',
                'data' => []
            ], RestController::HTTP_OK);
        }
        $this->response([
            'status' => true,
            'message' => 'Pemesanan kendaraan hari ini dan besok',
            'data' => $data
        ], RestController::HTTP_OK);
    }

    // ORACLE DB TEST ✅
    function sopir_get(){
        $sopirid = $this->get('id');
        $now = date('Y-m-d');
        $tomorrow = date('Y-m-d', strtotime('+2 days'));
        
        $data = $this->db->select("P.ID AS PEMESANAN_ID, P.NID_PEMESAN, P.NAMA_PEMESAN, P.STATUS_PEMESANAN, P.JUMLAH_PENUMPANG,
        TO_CHAR(P.BERANGKAT, 'YYYY-MM-DD HH24:MI:SS') AS BERANGKAT, 
        TO_CHAR(P.KEMBALI, 'YYYY-MM-DD HH24:MI:SS') AS KEMBALI, 
        TO_CHAR(P.CREATED_AT, 'YYYY-MM-DD HH24:MI:SS') AS CREATED_AT")
        ->from('KENDARAAN_PEMESANAN P')
        ->where('P.SOPIR_ID', $sopirid) //id sopir
        ->where("TO_CHAR(P.BERANGKAT, 'YYYY-MM-DD') >= ",$now)
        ->where("TO_CHAR(P.BERANGKAT, 'YYYY-MM-DD') < ",$tomorrow)
        ->get()->result(); 

        for($i = 0; $i < count($data); $i++){
            $tujuan = $this->db->select('LOKASI')
                                ->from('KENDARAAN_LOKASI_PENGANTARAN')
                                ->where('PEMESANAN_KENDARAAN_ID',$data[$i]->PEMESANAN_ID)        
                                ->group_start()
                                    ->where('URUTAN >',0)
                                    ->or_where('URUTAN',NULL)
                                ->group_end()
                                ->get()->result();
            $array = [];
            for($j = 0; $j < count($tujuan); $j++){
                array_push($array, $tujuan[$j]->LOKASI);
            }
            $data[$i]->tujuan = $array;
        }
        foreach($data as $key=>$value){
            $temp = (array) $value;
            $data[$key] = (object) array_change_key_case_recursive($temp);
        }
        if(empty($data)){
            $this->response([
                'status'  => true,
                'message' => 'Tidak ada pengantaran hari ini dan besok...',
                'data' => []
            ], RestController::HTTP_OK);
        }
        $this->response([
            'status' => true,
            'message' => 'Pengantaran hari ini dan besok',
            'data' => $data
        ], RestController::HTTP_OK);
    }

    
}
