<?php

class Rak_model extends CI_Model{

    function __construct() {
        parent::__construct();        
        $this->load->database();
        $this->load->helper('custom');
    }

    // ORACLE DB TEST ✅
    function all($pencarian, $filter, $page, $limit){
        $return = [];

        $this->db->where('DELETED_AT',null);
        // if($pencarian) $this->db->like('nama',$pencarian);
        // if($filter['status']) $this->db->where('status', $filter['status']);
        $return['total'] = $this->db->count_all_results('ARSIP_MASTER_RAK'); 

        $this->db->select("ID, NAMA, JUMLAH_BOKS, TERPAKAI,
        TO_CHAR(CREATED_AT, 'YYYY-MM-DD HH24:MI:SS') AS CREATED_AT,
        TO_CHAR(LAST_UPDATE_AT, 'YYYY-MM-DD HH24:MI:SS') AS LAST_UPDATE_AT");
        
        $this->db->where('DELETED_AT',null);
        // if($pencarian) $this->db->like('nama',$pencarian);
        // if($filter['status']) $this->db->where('status', $filter['status']);

        $return['data'] = $this->db->get('ARSIP_MASTER_RAK', $limit, ($page-1)*$limit)->result(); 
        foreach($return['data'] as $key=>$value){
            $temp = (array) $value;
            $return['data'][$key] = (object) array_change_key_case_recursive($temp);
        }
        
        return $return;   
    }

    // ORACLE DB TEST ✅
    function recommendation($pencarian, $page, $limit){
        $return = [];

        $this->db->select("*")
        ->where('TERPAKAI < JUMLAH_BOKS')
        ->where('DELETED_AT',null);
        // if($pencarian) $this->db->like('nama',$pencarian);
        $return['total'] = $this->db->count_all_results('ARSIP_MASTER_RAK'); 

        $this->db->select("ID, NAMA, JUMLAH_BOKS, TERPAKAI,
        TO_CHAR(CREATED_AT, 'YYYY-MM-DD HH24:MI:SS') AS CREATED_AT,
        TO_CHAR(LAST_UPDATE_AT, 'YYYY-MM-DD HH24:MI:SS') AS LAST_UPDATE_AT")
        ->where('TERPAKAI < JUMLAH_BOKS')
        ->where('DELETED_AT',null);
        // if($pencarian) $this->db->like('nama',$pencarian);

        $return['data'] = $this->db->get('ARSIP_MASTER_RAK', $limit, ($page-1)*$limit)->result(); 
        foreach($return['data'] as $key=>$value){
            $temp = (array) $value;
            $return['data'][$key] = (object) array_change_key_case_recursive($temp);
        }
        
        return $return;   
    }

    // ORACLE DB TEST ✅
    function detail($id){
        $return = [];
        $this->db->select('BK.ID, PA.NAMA_PEMESAN, PA.SUBDIT, PA.CREATED_AT, BK.BOKS_ID')
        ->from('ARSIP_BOKS BK')
        ->join('ARSIP_PERMINTAAN PA', 'BK.PERMINTAAN_ARSIP_ID = PA.ID',' left')
        ->join('ARSIP_MASTER_RAK MR', 'BK.MASTER_RAK_ID = MR.ID',' left')
        ->where('BK.MASTER_RAK_ID', $id);
        // search and filter condition
        // if($filter['status']) $this->db->like('pk.status_pemesanan',$filter['status']);
        // if($pencarian) $this->db->like('ms.nama',$pencarian);
        // get the data
        $return['data'] = $this->db->get()->result();
        if(empty($return['data'])){
            return [];    
        }
        for($i = 0; $i < count($return['data']); $i++){
            $berkas = $this->db->select('*')
                                ->from('ARSIP_BERKAS_BOKS')
                                ->where('BOKS_ARSIP_ID',$return['data'][$i]->ID)        
                                ->get()->result();
            foreach($berkas as $key=>$value){
                $temp = (array) $value;
                $berkas[$key] = (object) array_change_key_case_recursive($temp);
            }
            $array = [];
            for($j = 0; $j < count($berkas); $j++){
                array_push($array, $berkas[$j]);
            }
            $return['data'][$i]->berkas = $array;
        }
        foreach($return['data'] as $key=>$value){
            $temp = (array) $value;
            $return['data'][$key] = (object) array_change_key_case_recursive($temp);
        }
        return $return;
    }

    // ORACLE DB TEST ✅
    function create($data){
        $timestamp = date("Y-m-d H:i:s");

        $this->db->set('NAMA', $data['nama']);
        $this->db->set('JUMLAH_BOKS', $data['jumlah_boks']);
        $this->db->set('TERPAKAI', $data['terpakai']);
        $this->db->set('CREATED_AT',"TO_DATE('$timestamp','YYYY-MM-DD HH24:MI:SS')", false);

        $create = $this->db->insert('ARSIP_MASTER_RAK');
        return true;
    }

    // ORACLE DB TEST ✅
    function update($id, $data){
        $timestamp = date("Y-m-d H:i:s");

        $res = $this->db->get_where('ARSIP_MASTER_RAK', array('ID' => $id));
        if(!empty($res->result())){
            $this->db->set('NAMA', $data['nama']);
            $this->db->set('JUMLAH_BOKS', $data['jumlah_boks']);
            $this->db->set('LAST_UPDATE_AT',"TO_DATE('$timestamp','YYYY-MM-DD HH24:MI:SS')", false);
            $this->db->where('ID', $id);
            $status = $this->db->update('ARSIP_MASTER_RAK');
            return $status;
        }
        return false;
    }

    // ORACLE DB TEST ✅
    function delete($id){
        $timestamp = date("Y-m-d H:i:s");
        $res = $this->db->get_where('ARSIP_MASTER_RAK', array('ID' => $id));
        if(!empty($res->result())){
            $this->db->set('DELETED_AT',"TO_DATE('$timestamp','YYYY-MM-DD HH24:MI:SS')", false);
            $this->db->where('ID', $id);
            if(!$this->db->update('ARSIP_MASTER_RAK')){
                $error = $this->db->error();
                return $error;
            };
            return true;
        }
        return false;
    }
}