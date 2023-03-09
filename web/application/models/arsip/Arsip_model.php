<?php

class Arsip_model extends CI_Model{

    function __construct() {
        parent::__construct();        
        $this->load->database();
        $this->load->helper('custom');
    }

    function allByDivisi($userid, $subdit, $pencarian, $filter, $page, $limit){
        $return = [];

        $this->db->select('*')
        ->from('ARSIP_BERKAS_BOKS BE')  
        ->join('ARSIP_BOKS BK','BE.BOKS_ARSIP_ID = BK.ID','left')
        ->join('ARSIP_PERMINTAAN PA', 'BK.PERMINTAAN_ARSIP_ID = PA.ID',' left')
        ->join('ARSIP_MASTER_RAK MR', 'BK.MASTER_RAK_ID = MR.ID',' left')
        ->where('PA.SUBDIT', $subdit);
        if($pencarian) $this->db->like('LOWER(BE.NAMA)',strtolower($pencarian));
        if($filter['rak']) $this->db->like('LOWER(MR.NAMA)',$filter['rak']);
        if($filter['sort']){
            if($filter['sortby'] == 'nama'){
                $this->db->order_by('BE.NAMA', $filter['sort']);
            }
            else if($sort['sortby'] == 'tanggal'){
                $this->db->order_by('PA.CREATED_AT', $filter['sort']);
            }
            else if($sort['sortby'] == 'boks'){
                $this->db->order_by('BK.BOKS_ID', $filter['sort']);
            }
        }        
        
        // count the data
        $return['total'] = $this->db->count_all_results();

        $this->db->select("BE.NAMA, MR.NAMA AS RAK, BK.BOKS_ID, PA.SUBDIT,
        TO_CHAR(PA.CREATED_AT, 'YYYY-MM-DD HH24:MI:SS') AS CREATED_AT")
        ->from('ARSIP_BERKAS_BOKS BE')
        ->join('ARSIP_BOKS BK','BE.BOKS_ARSIP_ID = BK.ID','left')
        ->join('ARSIP_PERMINTAAN PA', 'BK.PERMINTAAN_ARSIP_ID = PA.ID',' left')
        ->join('ARSIP_MASTER_RAK MR', 'BK.MASTER_RAK_ID = MR.ID',' left')
        ->where('PA.SUBDIT', $subdit);
        if($pencarian) $this->db->like('LOWER(BE.NAMA)',strtolower($pencarian));
        if($filter['rak']) $this->db->like('LOWER(MR.NAMA)',$filter['rak']);
        if($filter['sort']){
            if($filter['sortby'] == 'nama'){
                $this->db->order_by('BE.NAMA', $filter['sort']);
            }
            else if($sort['sortby'] == 'tanggal'){
                $this->db->order_by('PA.CREATED_AT', $filter['sort']);
            }
            else if($sort['sortby'] == 'boks'){
                $this->db->order_by('BK.BOKS_ID', $filter['sort']);
            }
        }

        // get the data
        $return['data'] = $this->db->limit($limit, ($page-1)*$limit)->get()->result();

        return $return;
    }

    function all($pencarian, $filter, $page, $limit){
        $return = [];

        $this->db->select('*')
        ->from('ARSIP_BERKAS_BOKS BE')  
        ->join('ARSIP_BOKS BK','BE.BOKS_ARSIP_ID = BK.ID','left')
        ->join('ARSIP_PERMINTAAN PA', 'BK.PERMINTAAN_ARSIP_ID = PA.ID',' left')
        ->join('ARSIP_MASTER_RAK MR', 'BK.MASTER_RAK_ID = MR.ID',' left');
        if($pencarian) $this->db->like('LOWER(BE.NAMA)',strtolower($pencarian));
        if($filter['rak']) $this->db->like('LOWER(MR.NAMA)',$filter['rak']);
        if($filter['sort']){
            if($filter['sortby'] == 'nama'){
                $this->db->order_by('BE.NAMA', $filter['sort']);
            }
            else if($sort['sortby'] == 'tanggal'){
                $this->db->order_by('PA.CREATED_AT', $filter['sort']);
            }
            else if($sort['sortby'] == 'boks'){
                $this->db->order_by('BK.BOKS_ID', $filter['sort']);
            }
        }        
        
        // count the data
        $return['total'] = $this->db->count_all_results();

        $this->db->select("BE.NAMA, MR.NAMA AS RAK, BK.BOKS_ID, PA.SUBDIT,
        TO_CHAR(PA.CREATED_AT, 'YYYY-MM-DD HH24:MI:SS') AS CREATED_AT")
        ->from('ARSIP_BERKAS_BOKS BE')
        ->join('ARSIP_BOKS BK','BE.BOKS_ARSIP_ID = BK.ID','left')
        ->join('ARSIP_PERMINTAAN PA', 'BK.PERMINTAAN_ARSIP_ID = PA.ID',' left')
        ->join('ARSIP_MASTER_RAK MR', 'BK.MASTER_RAK_ID = MR.ID',' left');
        if($pencarian) $this->db->like('LOWER(BE.NAMA)',strtolower($pencarian));
        if($filter['rak']) $this->db->like('LOWER(MR.NAMA)',$filter['rak']);
        if($filter['sort']){
            if($filter['sortby'] == 'nama'){
                $this->db->order_by('BE.NAMA', $filter['sort']);
            }
            else if($sort['sortby'] == 'tanggal'){
                $this->db->order_by('PA.CREATED_AT', $filter['sort']);
            }
            else if($sort['sortby'] == 'boks'){
                $this->db->order_by('BK.BOKS_ID', $filter['sort']);
            }
        }

        // get the data
        $return['data'] = $this->db->limit($limit, ($page-1)*$limit)->get()->result();

        return $return;
    }


}