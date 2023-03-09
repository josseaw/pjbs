<?php

class Permintaan_model extends CI_Model{

    function __construct() {
        parent::__construct();        
        $this->load->database();
        $this->load->helper('custom');
    }
    /**
     * START OF GET METHOD
     */

     // ORACLE DB TEST ✅
    function all($userid, $pencarian, $filter, $page, $limit){
        $return = [];

        $this->db->select("*")->from('ATK_PERMINTAAN P')
        ->where('P.NID_PEMESAN', $userid);
        // Search and filter condition
        if($filter['status']) $this->db->like('LOWER(P.STATUS_PERMINTAAN)', strtolower($filter['status']));
        if($pencarian) $this->db->like('LOWER(P.SUBDIT)', strtolower($pencarian));
        // count the data
        $return['total'] = $this->db->count_all_results();

        $this->db->select("P.ID, P.SUBDIT, P.STATUS_PERMINTAAN,
        TO_CHAR(P.CREATED_AT, 'YYYY-MM-DD HH24:MI:SS') AS TGL_PENGAJUAN")
        ->from('ATK_PERMINTAAN P')
        ->where('P.NID_PEMESAN', $userid);
        // Search and filter condition
        if($filter['status']) $this->db->like('LOWER(P.STATUS_PERMINTAAN)', strtolower($filter['status']));
        if($pencarian) $this->db->like('LOWER(P.SUBDIT)', strtolower($pencarian));
        // get the data
        $return['data'] = $this->db->limit($limit, ($page-1)*$limit)->get()->result();
        
        for($i = 0; $i < count($return['data']); $i++){
            //get the atks
            $atk = $this->db->select('MA.NAMA')
                    ->distinct('AD.MASTER_ATK_ID')
                    ->from('ATK_DIPESAN AD')
                    ->join('ATK_MASTER_ATK MA','AD.MASTER_ATK_ID = MA.ID')
                    ->where('AD.PERMINTAAN_ATK_ID',$return['data'][$i]->ID)        
                    ->get()->result();
                    
            $array = [];
            for($j = 0; $j < count($atk); $j++){
                array_push($array, $atk[$j]->NAMA);
            }
            $return['data'][$i]->atk = $array;
        }
        foreach($return['data'] as $key=>$value){
            $temp = (array) $value;
            $return['data'][$key] = (object) array_change_key_case_recursive($temp);
        }

        return $return;
    }

    // ORACLE DB TEST ✅
    function allMobile($userid, $page, $limit){
        $return = [];

        $this->db->select('*')->from('ATK_PERMINTAAN P')
        ->where('P.NID_PEMESAN', $userid);
        
        // count the data
        $return['total'] = $this->db->count_all_results();

        $this->db->select("P.ID, P.SUBDIT, P.STATUS_PERMINTAAN,
        TO_CHAR(P.CREATED_AT, 'YYYY-MM-DD HH24:MI:SS') AS TGL_PENGAJUAN")
        ->from('ATK_PERMINTAAN P')
        ->where('P.NID_PEMESAN', $userid);
        // get the data
        $return['data'] = $this->db->limit($limit, ($page-1)*$limit)->get()->result();

        for($i = 0; $i < count($return['data']); $i++){
            //get the atks
            $atk = $this->db->select('MA.NAMA, MA.SATUAN, AD.JENIS, AD.JUMLAH')
                    ->distinct('AD.MASTER_ATK_ID')
                    ->from('ATK_DIPESAN AD')
                    ->join('ATK_MASTER_ATK MA','AD.MASTER_ATK_ID = MA.ID')
                    ->where('AD.PERMINTAAN_ATK_ID',$return['data'][$i]->ID)        
                    ->get()->result();
            foreach($atk as $key=>$value){
                $temp = (array) $value;
                $atk[$key] = (object) array_change_key_case_recursive($temp);
            }
            $return['data'][$i]->atk = $atk;
        }
        foreach($return['data'] as $key=>$value){
            $temp = (array) $value;
            $return['data'][$key] = (object) array_change_key_case_recursive($temp);
        }
        return $return;
    }

    // ORACLE DB TEST ✅
    function detailById($id){
        $final = $this->db->select("ID, SUBDIT, NID_PEMESAN, NAMA_PEMESAN, STATUS_PERMINTAAN,
        PERSETUJUAN_MANAJER, CATATAN_MANAJER, PERSETUJUAN_ADMIN, CATATAN_ADMIN,
        RATING, KOMENTAR, NOTIF_READ,
        TO_CHAR(CREATED_AT, 'YYYY-MM-DD HH24:MI:SS') AS CREATED_AT,
        TO_CHAR(LAST_UPDATE_AT, 'YYYY-MM-DD HH24:MI:SS') AS LAST_UPDATE_AT,
        TO_CHAR(DELETED_AT, 'YYYY-MM-DD HH24:MI:SS') AS DELETED_AT")
        ->where('ID', $id)
        ->get('ATK_PERMINTAAN')
        ->result();

        if(!empty($final)){
            $atk = $this->db->select('MA.NAMA, MA.SATUAN, AD.JENIS, AD.JUMLAH')
                    ->distinct('AD.MASTER_ATK_ID')
                    ->from('ATK_DIPESAN AD')
                    ->join('ATK_MASTER_ATK MA','AD.MASTER_ATK_ID = MA.ID')
                    ->where('AD.PERMINTAAN_ATK_ID',$final[0]->ID)        
                    ->get()->result();
            foreach($atk as $key=>$value){
                $temp = (array) $value;
                $atk[$key] = (object) array_change_key_case_recursive($temp);
            }
            $final[0]->atk = $atk;
        }        
        foreach($final as $key=>$value){
            $temp = (array) $value;
            $final[$key] = (object) array_change_key_case_recursive($temp);
        }
        return $final;
    }

    // ORACLE DB TEST ✅
    function history($pencarian, $filter, $page, $limit){
        $return = [];

        $this->db->select("*")->from('ATK_PERMINTAAN P');
        // Search and filter condition
        if($filter['divisi']) $this->db->like('LOWER(P.SUBDIT)', strtolower($filter['divisi']));
        if($filter['bulan']) $this->db->where("TO_CHAR(P.CREATED_AT, 'MM') =", $filter['bulan']);
        if($filter['tahun']) {
            if($filter['bulan'] == null) {
                $timestamp = date("m");
                $this->db->where("TO_CHAR(P.CREATED_AT, 'MM') =", $timestamp);
            }
            $this->db->where("TO_CHAR(P.CREATED_AT, 'YYYY') =", $filter['tahun']);
        }
        if($filter['status']) $this->db->like('LOWER(P.STATUS_PERMINTAAN)', strtolower($filter['status']));
        if($pencarian) $this->db->like('LOWER(P.SUBDIT)', strtolower($pencarian));
        // count the data
        $return['total'] = $this->db->count_all_results();

        $this->db->select("P.ID, P.SUBDIT, P.STATUS_PERMINTAAN,
        TO_CHAR(P.CREATED_AT, 'YYYY-MM-DD HH24:MI:SS') AS TGL_PENGAJUAN")
        ->from('ATK_PERMINTAAN P');
        // Search and filter condition
        if($filter['divisi']) $this->db->like('LOWER(P.SUBDIT)', strtolower($filter['divisi']));
        if($filter['bulan']) $this->db->where("TO_CHAR(P.CREATED_AT, 'MM') = ", $filter['bulan']);
        if($filter['tahun']) $this->db->where("TO_CHAR(P.CREATED_AT, 'YYYY') = ", $filter['tahun']);
        if($filter['status']) $this->db->like('LOWER(P.STATUS_PERMINTAAN)', strtolower($filter['status']));
        if($pencarian) $this->db->like('LOWER(P.SUBDIT)', strtolower($pencarian));
        // get the data
        $return['data'] = $this->db->limit($limit, ($page-1)*$limit)->get()->result();

        for($i = 0; $i < count($return['data']); $i++){
            //get the atks
            $atk = $this->db->select('MA.NAMA')
                    ->distinct('AD.MASTER_ATK_ID')
                    ->from('ATK_DIPESAN AD')
                    ->join('ATK_MASTER_ATK MA','AD.MASTER_ATK_ID = MA.ID')
                    ->where('AD.PERMINTAAN_ATK_ID',$return['data'][$i]->ID)        
                    ->get()->result();
                    
            $array = [];
            for($j = 0; $j < count($atk); $j++){
                array_push($array, $atk[$j]->NAMA);
            }
            $return['data'][$i]->atk = $array;
        }
        foreach($return['data'] as $key=>$value){
            $temp = (array) $value;
            $return['data'][$key] = (object) array_change_key_case_recursive($temp);
        }
        return $return;
    }

    // ORACLE DB TEST ✅
    function forApproval($role, $page, $limit){
        $return = [];

        $this->db->select('*')->from('ATK_PERMINTAAN P')->where('DELETED_AT', null);        

        if($role == 'manajer') $this->db->where('P.PERSETUJUAN_MANAJER',null)->where('P.PERSETUJUAN_ADMIN', null);
        else if($role == 'admin') $this->db->where('P.PERSETUJUAN_MANAJER',1)->where('P.PERSETUJUAN_ADMIN',null);
        $return['total'] = $this->db->count_all_results();    

        $this->db->select("P.ID, P.SUBDIT, P.STATUS_PERMINTAAN,
        TO_CHAR(P.CREATED_AT, 'YYYY-MM-DD HH24:MI:SS') AS TGL_PENGAJUAN")
        ->from('ATK_PERMINTAAN P')
        ->where('DELETED_AT', null);

        if($role == 'manajer') $this->db->where('P.PERSETUJUAN_MANAJER',null)->where('P.PERSETUJUAN_ADMIN', null);
        else if($role == 'admin') $this->db->where('P.PERSETUJUAN_MANAJER',1)->where('P.PERSETUJUAN_ADMIN',null);
        $return['data'] = $this->db->limit($limit, ($page-1)*$limit)->get()->result();    
        
        for($i = 0; $i < count($return['data']); $i++){
            //get the atks
            $atk = $this->db->select('MA.NAMA')
                    ->distinct('AD.MASTER_ATK_ID')
                    ->from('ATK_DIPESAN AD')
                    ->join('ATK_MASTER_ATK MA','AD.MASTER_ATK_ID = MA.ID')
                    ->where('AD.PERMINTAAN_ATK_ID',$return['data'][$i]->ID)        
                    ->get()->result();
                    
            $array = [];
            for($j = 0; $j < count($atk); $j++){
                array_push($array, $atk[$j]->NAMA);
            }
            $return['data'][$i]->atk = $array;
        }
        foreach($return['data'] as $key=>$value){
            $temp = (array) $value;
            $return['data'][$key] = (object) array_change_key_case_recursive($temp);
        }

        return $return;
    }

    // ORACLE DB TEST ✅
    function forApprovalMobile($role, $page, $limit){
        $return = [];

        $this->db->select('*')->from('ATK_PERMINTAAN P')->where('DELETED_AT', null);        

        if($role == 'manajer') $this->db->where('P.PERSETUJUAN_MANAJER',null)->where('P.PERSETUJUAN_ADMIN', null);
        else if($role == 'admin') $this->db->where('P.PERSETUJUAN_MANAJER',1)->where('P.PERSETUJUAN_ADMIN',null);
        $return['total'] = $this->db->count_all_results();    

        $this->db->select("P.ID, P.SUBDIT, P.STATUS_PERMINTAAN,
        TO_CHAR(P.CREATED_AT, 'YYYY-MM-DD HH24:MI:SS') AS TGL_PENGAJUAN")
        ->from('ATK_PERMINTAAN P')->where('DELETED_AT', null);

        if($role == 'manajer') $this->db->where('P.PERSETUJUAN_MANAJER',null)->where('P.PERSETUJUAN_ADMIN', null);
        else if($role == 'admin') $this->db->where('P.PERSETUJUAN_MANAJER',1)->where('P.PERSETUJUAN_ADMIN',null);
        $return['data'] = $this->db->limit($limit, ($page-1)*$limit)->get()->result();    
        
        for($i = 0; $i < count($return['data']); $i++){
            //get the atks
            $atk = $this->db->select('MA.NAMA, MA.SATUAN, AD.JENIS, AD.JUMLAH')
                    ->distinct('AD.MASTER_ATK_ID')
                    ->from('ATK_DIPESAN AD')
                    ->join('ATK_MASTER_ATK MA','AD.MASTER_ATK_ID = MA.ID')
                    ->where('AD.PERMINTAAN_ATK_ID',$return['data'][$i]->ID)        
                    ->get()->result();
            foreach($atk as $key=>$value){
                $temp = (array) $value;
                $atk[$key] = (object) array_change_key_case_recursive($temp);
            }
            $return['data'][$i]->atk = $atk;
        }
        foreach($return['data'] as $key=>$value){
            $temp = (array) $value;
            $return['data'][$key] = (object) array_change_key_case_recursive($temp);
        }
        

        return $return;
    }

    // ORACLE DB TEST ✅
    function monitoring($pencarian, $filter, $page, $limit){
        $this->db->select('ID')
                ->from('ATK_PERMINTAAN')
                ->where('DELETED_AT', null)
                ->where('PERSETUJUAN_ADMIN',true);
                if($filter['divisi']) $this->db->like('LOWER(SUBDIT)', strtolower($filter['divisi']));
                if($filter['bulan']) $this->db->where("TO_CHAR(P.CREATED_AT, 'MM') =", $filter['bulan']);
        if($filter['tahun']) $this->db->where("TO_CHAR(P.CREATED_AT, 'YYYY') =", $filter['tahun']);
        $ids = $this->db->get()->result();
        $arr = [];
        foreach($ids as $key=>$val){
            array_push($arr, $val->ID);
        }
        if(empty($arr)){
            return [];    
        }
        $data = $this->db->select('MA.NAMA, AD.JENIS, SUM(AD.JUMLAH) AS TOTAL, MA.SATUAN')
                ->from('ATK_DIPESAN AD')
                ->join('ATK_MASTER_ATK MA','AD.MASTER_ATK_ID = MA.ID')
                ->where_in('AD.PERMINTAAN_ATK_ID', $arr)
                ->group_by(array('MA.NAMA','AD.JENIS','MA.SATUAN'))
                ->get();

        $data = $data->result();
        foreach($data as $key=>$value){
            $temp = (array) $value;
            $data[$key] = (object) array_change_key_case_recursive($temp);
        }
        return $data;
    }

    // ORACLE DB TEST ✅
    function monitoringDivisi($pencarian, $filter, $page, $limit){
        $divisi = $this->db->select('SUBDIT')
                ->distinct('SUBDIT')
                ->from('ATK_PERMINTAAN')
                ->where('DELETED_AT', null)
                ->where('PERSETUJUAN_ADMIN',true)
                ->get()->result();
        foreach($divisi as $key=>$value){
            $temp = (array) $value;
            $divisi[$key] = (object) array_change_key_case_recursive($temp);
        }
        foreach($divisi as $i=>$div){
            if(count($divisi) == 1){
                $i = 0;
            }
            $this->db->select('ID')
                ->from('ATK_PERMINTAAN')
                ->where('DELETED_AT', null)
                ->where('PERSETUJUAN_ADMIN',true)
                ->where('SUBDIT',$div->subdit);
                if($filter['bulan']) $this->db->where("TO_CHAR(P.CREATED_AT, 'MM') =", $filter['bulan']);
                if($filter['tahun']) $this->db->where("TO_CHAR(P.CREATED_AT, 'YYYY') =", $filter['tahun']);
            $ids = $this->db->get()->result();
            $arr = [];
            foreach($ids as $key=>$val){
                array_push($arr, $val->ID);
            }
            if(empty($arr)){
                return [];
            }
            $data = $this->db->select('MA.NAMA, AD.JENIS, SUM(AD.JUMLAH) AS TOTAL, MA.SATUAN')
                    ->from('ATK_DIPESAN AD')
                    ->join('ATK_MASTER_ATK MA','AD.MASTER_ATK_ID = MA.ID')
                    ->where_in('AD.PERMINTAAN_ATK_ID', $arr)
                    ->group_by(array('MA.NAMA','AD.JENIS','MA.SATUAN'))
                    ->get()->result();
            
            foreach($data as $key=>$value){
                $temp = (array) $value;
                $data[$key] = (object) array_change_key_case_recursive($temp);
            }
            $divisi[$i]->data = $data;
        }
        

        
        return $divisi;
    }

    /**
     * END OF GET METHOD
     */

    /**
      * START OF POST METHOD
      */
    
    // ORACLE DB TEST ✅
    function create($data, $atk){
        $timestamp = date("Y-m-d H:i:s");
        
        $this->db->set('SUBDIT', $data['subdit']);
        $this->db->set('NID_PEMESAN', $data['nid']);
        $this->db->set('NAMA_PEMESAN', $data['nama']);
        $this->db->set('STATUS_PERMINTAAN', $data['status_permintaan']);
        $this->db->set('CREATED_AT',"TO_DATE('$timestamp','YYYY-MM-DD HH24:MI:SS')", false);

        if(!$this->db->insert('ATK_PERMINTAAN')){
            $error = $this->db->error();
            return $error;
        };
        $last = $this->db->select('ID')->order_by('ID',"DESC")->limit(1)->get('ATK_PERMINTAAN')->result();
        $id = $last[0]->ID;

        foreach(json_decode($atk) as $key=>$val){

            $this->db->set('PERMINTAAN_ATK_ID', $id);
            $this->db->set('MASTER_ATK_ID', $val->atk_id);
            $this->db->set('JENIS', $val->jenis);
            $this->db->set('JUMLAH', $val->jumlah);

            $this->db->insert('ATK_DIPESAN');
        }

        // CREATE NOTIFICATION FOR MANAJER, WAITING FOR APPROVAL
        $notif = [
            'tipe' => 'persetujuan',
            'data' => 'Permintaan ATK menunggu persetujuan Anda.',
            'aksi' => '/v1/atk/permintaan?id='.$id
        ];
        $this->createNotification(NULL, 3, $notif);
        return true;
    }
    /**
     * END OF POST METHOD
     */

    /**
     * START OF PUT METHOD
     */

     // ORACLE DB TEST ✅
    function approve($id, $role, $catatan){
        $timestamp = date("Y-m-d H:i:s");

        $res = $this->db->get_where('ATK_PERMINTAAN', array('ID' => $id))->result();
        if(!empty($res)){
            //Disetujui manajer
            if($role == 'manajer'){
                $permintaan = array(
                    'persetujuan_manajer' => true,
                    'catatan_manajer'     => $catatan,
                    'last_update_at'      => date("Y-m-d H:i:s")
                );
                $this->db->set('PERSETUJUAN_MANAJER', true);
                $this->db->set('CATATAN_MANAJER', $catatan);
                $this->db->set('LAST_UPDATE_AT',"TO_DATE('$timestamp','YYYY-MM-DD HH24:MI:SS')", false);
                $this->db->where('ID', $id);
                if(!$this->db->update('ATK_PERMINTAAN')){
                    $error = $this->db->error();
                    return $error;
                };
                // CREATE NOTIFICATION FOR ADMIN, WAITING FOR APPROVAL
                $notif = [
                    'tipe' => 'persetujuan',
                    'data' => 'Permintaan ATK menunggu persetujuan Anda.',
                    'aksi' => '/v1/atk/permintaan?id='.$id
                ];
                $this->createNotification(NULL, 7, $notif);
                return true;
            }
            //Disetujui Admin
            else if($role == 'admin'){
                if($res[0]->PERSETUJUAN_MANAJER === null || $res[0]->PERSETUJUAN_MANAJER == false){
                    return array('status' => false, 'msg' => 'Permintaan belum disetujui oleh manajer');
                }
                
                $this->db->set('PERSETUJUAN_ADMIN', true);
                $this->db->set('CATATAN_ADMIN', $catatan);
                $this->db->set('STATUS_PERMINTAAN', 'Disetujui');
                $this->db->set('NOTIF_READ', 0);
                $this->db->set('LAST_UPDATE_AT',"TO_DATE('$timestamp','YYYY-MM-DD HH24:MI:SS')", false);
                $this->db->where('ID', $id);

                if(!$this->db->update('ATK_PERMINTAAN')){
                    $error = $this->db->error();
                    
                    return $error;
                };
                // CREATE NOTIFICATION FOR USER, APPROVED BY ADMIN
                $notif = [
                    'tipe' => 'persetujuan',
                    'data' => 'Pemesanan anda telah disetujui oleh admin',
                    'aksi' => '/v1/atk/permintaan?id='.$id
                ];
                $this->createNotification($res[0]->NID_PEMESAN, null, $notif);
                return true;
            }
            
            return array('status' => false, 'msg' => 'Kesalahan tidak terduga');
            
        }
        
        return array('status' => false, 'msg' => 'Data permintaan tidak ditemukan');
    }

    // ORACLE DB TEST ✅
    function refuse($id, $role, $alasan){
        $timestamp = date("Y-m-d H:i:s");
        
        $res = $this->db->get_where('ATK_PERMINTAAN', array('ID' => $id))->result();
        if(!empty($res)){
            //Tolak manajer
            if($role == 'manajer'){
                
                $this->db->set('PERSETUJUAN_MANAJER', false);
                $this->db->set('CATATAN_MANAJER', $alasan);
                $this->db->set('STATUS_PERMINTAAN', 'Ditolak');
                $this->db->set('NOTIF_READ', 0);
                $this->db->set('LAST_UPDATE_AT',"TO_DATE('$timestamp','YYYY-MM-DD HH24:MI:SS')", false);
                $this->db->where('ID', $id);

                if(!$this->db->update('ATK_PERMINTAAN')){
                    $error = $this->db->error();
                    return $error;
                };
                // CREATE NOTIFICATION FOR USER, APPROVED BY ADMIN
                $notif = [
                    'tipe' => 'penolakan',
                    'data' => 'Pemesanan anda ditolak oleh manajer',
                    'aksi' => '/v1/atk/permintaan?id='.$id
                ];
                $this->createNotification($res[0]->NID_PEMESAN, null, $notif);
                return true;
            }
            //Tolak Admin
            else if($role == 'admin'){
                
                $this->db->set('PERSETUJUAN_ADMIN', false);
                $this->db->set('CATATAN_ADMIN', $alasan);
                $this->db->set('STATUS_PERMINTAAN', 'Ditolak');
                $this->db->set('NOTIF_READ', 0);
                $this->db->set('LAST_UPDATE_AT',"TO_DATE('$timestamp','YYYY-MM-DD HH24:MI:SS')", false);
                $this->db->where('ID', $id);
                
                if(!$this->db->update('ATK_PERMINTAAN')){
                    $error = $this->db->error();
                    
                    return $error;
                };
                // CREATE NOTIFICATION FOR USER, APPROVED BY ADMIN
                $notif = [
                    'tipe' => 'penolakan',
                    'data' => 'Pemesanan anda ditolak oleh admin',
                    'aksi' => '/v1/atk/permintaan?id='.$id
                ];
                $this->createNotification($res[0]->NID_PEMESAN, null, $notif);
                return true;
            }
            
            return array('status' => false, 'msg' => 'Kesalahan tidak terduga');
            
        }
        
        return array('status' => false, 'msg' => 'Data permintaan tidak ditemukan');
    }

    // ORACLE DB TEST ✅
    function cancel($id){
        $timestamp = date("Y-m-d H:i:s");

        $res = $this->db->get_where('ATK_PERMINTAAN', array('ID' => $id))->result();
        if(!empty($res)){
            
            $this->db->set('STATUS_PERMINTAAN', 'Dibatalkan');
            $this->db->set('NOTIF_READ', 1);
            $this->db->set('DELETED_AT',"TO_DATE('$timestamp','YYYY-MM-DD HH24:MI:SS')", false);

            $this->db->where('ID', $id);
            if(!$this->db->update('ATK_PERMINTAAN')){
                $error = $this->db->error();
                return $error;
            };
            return true;
        }
        return false;
    }

    // ORACLE DB TEST ✅
    function rating($id, $rate, $comment){
        $res = $this->db->get_where('ATK_PERMINTAAN', array('ID' => $id))->result();
        if(!empty($res)){
            $update = array('RATING' => $rate, 'KOMENTAR' => $comment);
            $this->db->where('ID', $id);
            if(!$this->db->update('ATK_PERMINTAAN', $update)){
                $error = $this->db->error();
                return $error;
            };
            return true;
        }
        return false;
    }
    /**
     * END OF PUT METHOD
     */

    function createNotification($nid, $level, $data){
        $timestamp = date("Y-m-d H:i:s");

        $this->db->set('NID_PENERIMA', $nid);
        $this->db->set('LEVEL_PENERIMA', $level);
        $this->db->set('TIPE', $data['tipe']);
        $this->db->set('DATA', $data['data']);
        $this->db->set('READ', 0);
        $this->db->set('CREATED_AT',"TO_DATE('$timestamp','YYYY-MM-DD HH24:MI:SS')", false);
        $this->db->set('AKSI', $data['aksi']);
        if(!$this->db->insert('ATK_NOTIFIKASI')){
            $error = $this->db->error();
            return $error;
        };
        return true;
    }
}
