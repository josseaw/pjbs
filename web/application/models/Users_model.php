<?php

class Users_model extends CI_Model{
    // tt

    function __construct() {
        parent::__construct();     
        $this->load->database();   
    }

    function sopirLogin(){
        $query = $this->db->where('nid', $nid)
                ->count_all_results('mfacilities_master_sopir');
        if($query >  0){
            $creds = $this->db->where('nid', $nid)
                    ->limit(1)
                    ->get('mfacilities_master_sopir')->result();
        } 
        else {
            $creds = array(); 
        }
        return $creds;
    }

    function userLogin(){
        $query = $this->db->where('nid', $nid)
                ->count_all_results('mfacilities_temp_users');
        if($query >  0){
            $creds = $this->db->where('nid', $nid)
                    ->limit(1)
                    ->get('mfacilities_temp_users')->result();
        } 
        else {
            $creds = array(); 
        }
        return $creds;
    }
}