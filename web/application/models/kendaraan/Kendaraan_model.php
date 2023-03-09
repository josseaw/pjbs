<?php

class Kendaraan_model extends CI_Model{
    function __construct() {
        parent::__construct();        
        $this->load->database();
        $this->load->helper('custom');
    }

    // ORACLE DB TEST ✅
    function all($pencarian, $filter, $page, $limit, $all){
        $return = [];
        $this->db->where('DELETED_AT',null);
        if($pencarian) $this->db->like('LOWER(NAMA)', strtolower($pencarian))
                                ->or_like('LOWER(NOPOL)', strtolower($pencarian));
        if($filter['status']) $this->db->where('STATUS', $filter['status']);
        $return['total'] = $this->db->count_all_results('KENDARAAN_MASTER_KENDARAAN'); 

        $this->db->select("ID, NOPOL, NAMA, TIPE, LOKASI, STATUS, 
        TO_CHAR(TGL_SERAHTERIMA, 'YYYY-MM-DD') AS TGL_SERAHTERIMA,
        TO_CHAR(CREATED_AT, 'YYYY-MM-DD HH24:MI:SS') AS CREATED_AT,
        TO_CHAR(LAST_UPDATE_AT, 'YYYY-MM-DD HH24:MI:SS') AS LAST_UPDATE_AT,
        TO_CHAR(DELETED_AT, 'YYYY-MM-DD HH24:MI:SS') AS DELETED_AT")
        ->where('DELETED_AT',null);
        if($pencarian) $this->db->like('LOWER(NAMA)', strtolower($pencarian))
                                ->or_like('LOWER(NOPOL)', strtolower($pencarian));
        if($filter['status']) $this->db->where('STATUS', $filter['status']);

        if($all == true){
            $return['data'] = $this->db->get('KENDARAAN_MASTER_KENDARAAN')->result(); 
        }
        else{
            $return['data'] = $this->db->get('KENDARAAN_MASTER_KENDARAAN', $limit, ($page-1)*$limit)->result(); 
        }
        foreach($return['data'] as $key=>$value){
            $temp = (array) $value;
            $return['data'][$key] = (object) array_change_key_case_recursive($temp);
        }
        
        
        
        return $return;
    } 
    
    // ORACLE DB TEST ✅
    function byId($id){
        $data = $this->db->select("ID, NOPOL, NAMA, TIPE, LOKASI, STATUS, 
                TO_CHAR(TGL_SERAHTERIMA, 'YYYY-MM-DD') AS TGL_SERAHTERIMA,
                TO_CHAR(CREATED_AT, 'YYYY-MM-DD HH24:MI:SS') AS CREATED_AT,
                TO_CHAR(LAST_UPDATE_AT, 'YYYY-MM-DD HH24:MI:SS') AS LAST_UPDATE_AT,
                TO_CHAR(DELETED_AT, 'YYYY-MM-DD HH24:MI:SS') AS DELETED_AT")
                ->where('ID', $id)
                ->where('DELETED_AT IS NULL')
                ->get('KENDARAAN_MASTER_KENDARAAN')
                ->result();
        foreach($data as $key=>$value){
            $temp = (array) $value;
            $data[$key] = (object) array_change_key_case_recursive($temp);
        }
        //with Sopir
        if(!empty($data) && $data[0]->status === 'Aktif'){
            $data2 = $this->db->select('ID, NID, NAMA, NOHP')
                            ->where('KENDARAAN_ID', $id)
                            ->get('KENDARAAN_MASTER_SOPIR')
                            ->result();
            foreach($data2 as $key=>$value){
                $temp = (array) $value;
                $data2[$key] = (object) array_change_key_case_recursive($temp);
            }
            $data[0]->sopir = $data2;
            return $data;
        }
        
        

        return $data;
    }

    // ORACLE DB TEST ✅
    function create($data){
        $serahterima = $data['tgl_serahterima'];
        $timestamp = date("Y-m-d H:i:s");

        $this->db->set('NOPOL', $data['nopol']);
        $this->db->set('NAMA', $data['nama']);
        $this->db->set('TIPE', $data['tipe']);
        $this->db->set('LOKASI', $data['lokasi']);
        $this->db->set('STATUS', $data['status']);
        $this->db->set('TGL_SERAHTERIMA', "TO_DATE('$serahterima','YYYY-MM-DD')", false);
        $this->db->set('CREATED_AT',"TO_DATE('$timestamp','YYYY-MM-DD HH24:MI:SS')", false);
        $status = $this->db->insert('KENDARAAN_MASTER_KENDARAAN');
        return $status;
    }
    
    // ORACLE DB TEST ✅
    function update($id, $data){
        $serahterima = $data['tgl_serahterima'];
        $timestamp = date("Y-m-d H:i:s");
        
        $res = $this->db->get_where('KENDARAAN_MASTER_KENDARAAN', array('ID' => $id));
        if(!empty($res->result())){
            $this->db->set('NOPOL', $data['nopol']);
            $this->db->set('NAMA', $data['nama']);
            $this->db->set('TIPE', $data['tipe']);
            $this->db->set('LOKASI', $data['lokasi']);
            $this->db->set('TGL_SERAHTERIMA', "TO_DATE('$serahterima','YYYY-MM-DD')", false);
            $this->db->set('CREATED_AT',"TO_DATE('$timestamp','YYYY-MM-DD HH24:MI:SS')", false);
            $this->db->where('ID', $id);
            $status = $this->db->update('KENDARAAN_MASTER_KENDARAAN');
            return $status;
        }
        return false;
        
    }

    // ORACLE DB TEST ✅
    function delete($id){
        $timestamp = date("Y-m-d H:i:s");
        $res = $this->db->get_where('KENDARAAN_MASTER_KENDARAAN', array('ID' => $id));
        if(!empty($res->result())){
            $this->db->set('DELETED_AT',"TO_DATE('$timestamp','YYYY-MM-DD HH24:MI:SS')", false);
            $this->db->where('ID', $id);
            if(!$this->db->update('KENDARAAN_MASTER_KENDARAAN')){
                $error = $this->db->error();
                return $error;
            };
            
            $sopir = $this->db->get_where('KENDARAAN_MASTER_SOPIR', array('KENDARAAN_ID' => $id));
            if(!empty($sopir)){
                $this->db->where('KENDARAAN_ID', $id)
                ->update('KENDARAAN_MASTER_SOPIR', array('KENDARAAN_ID' => null));
            }
            
            
            return true;
        }
        return false;
    }

    

}
