<?php

class Atk_model extends CI_Model{

    function __construct() {
        parent::__construct();        
        $this->load->database();
        $this->load->helper('custom');
    }

    // ORACLE DB TEST ✅
    function all($pencarian, $filter, $page, $limit){
        $return = [];
        $this->db->where('DELETED_AT',null);
        if($pencarian) $this->db->like('NAMA',$pencarian)
                                ->or_like('JENIS', $pencarian);
        // if($filter['status']) $this->db->where('status', $filter['status']);
        $return['total'] = $this->db->count_all_results('ATK_MASTER_ATK'); 

        $this->db->select("ID, NAMA, JENIS, SATUAN, 
        TO_CHAR(CREATED_AT, 'YYYY-MM-DD HH24:MI:SS') AS CREATED_AT,
        TO_CHAR(LAST_UPDATE_AT, 'YYYY-MM-DD HH24:MI:SS') AS LAST_UPDATE_AT,
        TO_CHAR(DELETED_AT, 'YYYY-MM-DD HH24:MI:SS') AS DELETED_AT")
        ->where('DELETED_AT',null);
        if($pencarian) $this->db->like('NAMA',$pencarian)
                                ->or_like('JENIS', $pencarian);
        // if($filter['status']) $this->db->where('status', $filter['status']);
        $return['data'] = $this->db->get('ATK_MASTER_ATK', $limit, ($page-1)*$limit)->result(); 
        foreach($return['data'] as $key=>$value){
            $temp = (array) $value;
            $return['data'][$key] = (object) array_change_key_case_recursive($temp);
        }
        return $return;
    }
    
    // ORACLE DB TEST ✅
    function byId($id){
        $data = $this->db->select("ID, NAMA, JENIS, SATUAN, 
        TO_CHAR(CREATED_AT, 'YYYY-MM-DD HH24:MI:SS') AS CREATED_AT,
        TO_CHAR(LAST_UPDATE_AT, 'YYYY-MM-DD HH24:MI:SS') AS LAST_UPDATE_AT,
        TO_CHAR(DELETED_AT, 'YYYY-MM-DD HH24:MI:SS') AS DELETED_AT")
        ->where('ID', $id)
        ->get('ATK_MASTER_ATK')
        ->result();
        foreach($data as $key=>$value){
            $temp = (array) $value;
            $data[$key] = (object) array_change_key_case_recursive($temp);
        }
        return $data;
    }
    
    // ORACLE DB TEST ✅
    public function create($data){
        $timestamp = date("Y-m-d H:i:s");

        $this->db->set('NAMA', $data['nama']);
        $this->db->set('JENIS', $data['jenis']);
        $this->db->set('SATUAN', $data['satuan']);
        $this->db->set('CREATED_AT',"TO_DATE('$timestamp','YYYY-MM-DD HH24:MI:SS')", false);

        $status = $this->db->insert('ATK_MASTER_ATK');
        return $status;
    }

    // ORACLE DB TEST ✅
    public function update($id, $data){
        $timestamp = date("Y-m-d H:i:s");
        $res = $this->db->get_where('ATK_MASTER_ATK', array('ID' => $id));
        if(!empty($res->result())){
            $this->db->set('NAMA', $data['nama']);
            $this->db->set('JENIS', $data['jenis']);
            $this->db->set('SATUAN', $data['satuan']);
            $this->db->set('LAST_UPDATE_AT',"TO_DATE('$timestamp','YYYY-MM-DD HH24:MI:SS')", false);
            $this->db->where('ID', $id);

            $status = $this->db->update('ATK_MASTER_ATK');
            return $status;
        }
        return false;
    }

    // ORACLE DB TEST ✅
    public function delete($id){
        $timestamp = date("Y-m-d H:i:s");
        $res = $this->db->get_where('ATK_MASTER_ATK', array('ID' => $id));
        if(!empty($res->result())){
            $this->db->set('DELETED_AT',"TO_DATE('$timestamp','YYYY-MM-DD HH24:MI:SS')", false);
            $this->db->where('ID', $id);
            if(!$this->db->update('ATK_MASTER_ATK')){
                $error = $this->db->error();
                return $error;
            };
            
            return true;
        }
        return false;
    }
}
