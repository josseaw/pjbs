<?php

use GuzzleHttp\Client;

class Ruangan_model extends CI_Model{

    function __construct() {
        parent::__construct();        
        $this->load->database();
        
    }

    function all($pencarian, $filter, $all, $page, $limit){
        $return = [];

        $this->db->select('*')
        ->where('DELETED_AT',null);
        if($pencarian) $this->db->like('LOWER(NAMA)',strtolower($pencarian));
        if($filter['status']) $this->db->where('STATUS', $filter['status']);
        $return['total'] = $this->db->count_all_results('RAPAT_MASTER_RUANGAN'); 

        $this->db->select("ID, RID, NAMA, FASILITAS, KAPASITAS, STATUS,
        TO_CHAR(CREATED_AT, 'YYYY-MM-DD HH24:MI:SS') AS CREATED_AT,
        TO_CHAR(LAST_UPDATE_AT, 'YYYY-MM-DD HH24:MI:SS') AS LAST_UPDATE_AT")
        ->where('DELETED_AT',null);
        if($pencarian) $this->db->like('LOWER(NAMA)',strtolower($pencarian));
        if($filter['status']) $this->db->where('STATUS', $filter['status']);

        if($all == true){
            $return['data'] = $this->db->get('RAPAT_MASTER_RUANGAN')->result(); 
        }
        else{
            $return['data'] = $this->db->get('RAPAT_MASTER_RUANGAN', $limit, ($page-1)*$limit)->result(); 
        }
        
        return $return;        
    }

    function byId($id){
        $data = $this->db->select("ID, RID, NAMA, FASILITAS, KAPASITAS, STATUS,
        TO_CHAR(CREATED_AT, 'YYYY-MM-DD HH24:MI:SS') AS CREATED_AT,
        TO_CHAR(LAST_UPDATE_AT, 'YYYY-MM-DD HH24:MI:SS') AS LAST_UPDATE_AT,
        TO_CHAR(DELETED_AT, 'YYYY-MM-DD HH24:MI:SS') AS DELETED_AT")
        ->where('ID', $id)
        ->where('DELETED_AT IS NULL')
        ->get('RAPAT_MASTER_RUANGAN')
        ->result();
        return $data;
    }

    function recommendation($jadwal, $peserta, $page, $limit){
        $return = [];

        $compiled_select = $this->db->select('PR.MASTER_RUANGAN_ID AS ID')
                            ->distinct('PR.MASTER_RUANGAN_ID')
                            ->from('RAPAT_AGENDA RA')    
                            ->join('RAPAT_PEMESANAN_RUANGAN PR', 'RA.ID = PR.AGENDA_RAPAT_ID')    
                            ->where('PR.MASTER_RUANGAN_ID IS NOT ',null)
                            ->where("TO_CHAR(RA.TANGGAL, 'YYYY-MM-DD')", $jadwal['tanggal'])
                            ->where('PERSETUJUAN_ADMIN', 1)
                            ->group_start()
                                ->group_start()
                                    ->where("TO_CHAR(RA.WAKTU_MULAI, 'HH24:MI') >= ",$jadwal['mulai'])
                                    ->where("TO_CHAR(RA.WAKTU_MULAI, 'HH24:MI') <= ",$jadwal['selesai'])
                                ->group_end()
                                ->or_group_start()
                                    ->where("TO_CHAR(RA.WAKTU_SELESAI, 'HH24:MI') >= ",$jadwal['mulai'])
                                    ->where("TO_CHAR(RA.WAKTU_SELESAI, 'HH24:MI') <= ",$jadwal['selesai'])
                                ->group_end()
                            ->group_end()
                            ->get_compiled_select();
        $return['total'] = $this->db->select('*')
                            ->from('RAPAT_MASTER_RUANGAN')
                            ->where('ID NOT IN ('.$compiled_select.')')
                            ->where('DELETED_AT',null)
                            ->where('KAPASITAS >=', $peserta)
                            ->order_by('ID')
                            ->count_all_results();
        $query = $this->db->select('*')
                    ->from('RAPAT_MASTER_RUANGAN')
                    ->where('ID NOT IN ('.$compiled_select.')')
                    ->where('DELETED_AT',null)
                    ->where('KAPASITAS >=', $peserta)
                    ->order_by('ID')
                    ->limit($limit, ($page-1)*$limit)
                    ->get_compiled_select();
        $return['data'] = $this->db->query($query)->result();

        return $return;
    }

    function create($data){
        $timestamp = date("Y-m-d H:i:s");

        $this->db->set('RID', $data['rid']);
        $this->db->set('NAMA', $data['nama']);
        $this->db->set('FASILITAS', $data['fasilitas']);
        $this->db->set('KAPASITAS', $data['kapasitas']);
        $this->db->set('STATUS', $data['status']);
        $this->db->set('CREATED_AT',"TO_DATE('$timestamp','YYYY-MM-DD HH24:MI:SS')", false);

        $status = $this->db->insert('RAPAT_MASTER_RUANGAN');
        return true;
    }

    function update($id, $data){
        $timestamp = date("Y-m-d H:i:s");

        $res = $this->db->get_where('RAPAT_MASTER_RUANGAN', array('id' => $id));
        if(!empty($res->result())){
            $this->db->set('NAMA', $data['nama']);
            $this->db->set('FASILITAS', $data['fasilitas']);
            $this->db->set('KAPASITAS', $data['kapasitas']);
            $this->db->set('STATUS', $data['status']);
            $this->db->set('LAST_UPDATE_AT',"TO_DATE('$timestamp','YYYY-MM-DD HH24:MI:SS')", false);
            $this->db->where('ID', $id);
            $status = $this->db->update('RAPAT_MASTER_RUANGAN');
            return $status;
        }
        return false;
        
    }

    function delete($id){
        $timestamp = date("Y-m-d H:i:s");
        $res = $this->db->get_where('RAPAT_MASTER_RUANGAN', array('ID' => $id));
        
        if(!empty($res->result())){
            $this->db->set('DELETED_AT',"TO_DATE('$timestamp','YYYY-MM-DD HH24:MI:SS')", false);
            $this->db->where('ID', $id);
            if(!$this->db->update('RAPAT_MASTER_RUANGAN')){
                $error = $this->db->error();
                return $error;
            };
            return true;
        }
        return false;
    }
    
    

}
