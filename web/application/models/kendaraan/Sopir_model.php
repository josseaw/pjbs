<?php

class Sopir_model extends CI_Model{

    function __construct() {
        parent::__construct();     
        $this->load->database();   
        $this->load->helper('custom');
    }

    // ORACLE DB TEST ✅
    function all($page, $pencarian, $filter, $sort, $limit){
        $return = [];

        $this->db->select('*')
        ->from('KENDARAAN_MASTER_SOPIR MS')
        ->join('KENDARAAN_MASTER_KENDARAAN MK', 'MS.KENDARAAN_ID = MK.ID', 'left')
        ->where('MS.DELETED_AT',null);

        if($pencarian) $this->db->like('LOWER(MS.NAMA)',strtolower($pencarian));
        if($filter['status']) $this->db->where('MS.STATUS', $filter['status']);
        if($sort['sort']){
            if($sort['sortby'] == 'nama'){
                $this->db->order_by('NAMA', $sort['sort']);
            }
            else if($sort['sortby'] == 'pesanan'){
                $this->db->order_by('JUMLAH_PESANAN', $sort['sort']);
            }
            else if($sort['sortby'] == 'durasi'){
                $this->db->order_by('DURASI_PESANAN', $sort['sort']);
            }
        }
        $return['total'] = $this->db->count_all_results();

        $this->db->select('MS.ID, MS.NID, MS.NAMA, MS.RATING, MS.JUMLAH_PESANAN, MS.DURASI_PESANAN, MS.STATUS, MK.ID as ID_KENDARAAN, MK.NOPOL, MK.NAMA as NAMA_KENDARAAN')
        ->from('KENDARAAN_MASTER_SOPIR MS')
        ->join('KENDARAAN_MASTER_KENDARAAN MK', 'MS.KENDARAAN_ID = MK.ID', 'left')
        ->where('MS.DELETED_AT',null);

        if($pencarian) $this->db->like('LOWER(MS.NAMA)',strtolower($pencarian));
        if($filter['status']) $this->db->where('MS.STATUS', $filter['status']);
        if($sort['sort']){
            if($sort['sortby'] == 'nama'){
                $this->db->order_by('NAMA', $sort['sort']);
            }
            else if($sort['sortby'] == 'pesanan'){
                $this->db->order_by('JUMLAH_PESANAN', $sort['sort']);
            }
            else if($sort['sortby'] == 'durasi'){
                $this->db->order_by('DURASI_PESANAN', $sort['sort']);
            }
        }
        $return['data'] = $this->db->limit($limit, ($page-1)*$limit)->get()->result();

        foreach($return['data'] as $key=>$value){
            $temp = (array) $value;
            $return['data'][$key] = (object) array_change_key_case_recursive($temp);
        }
        return $return;
    }
    
    // ORACLE DB TEST ✅
    function byId($id){
        $data = $this->db->select('MS.ID, MS.NID, MS.NAMA, MS.NOHP, MS.CURRENT_PASSWORD, MS.PASSWORD, MS.RATING, MS.JUMLAH_PESANAN, MS.DURASI_PESANAN,, MS.STATUS, MK.ID as ID_KENDARAAN, MK.NOPOL, MK.NAMA as NAMA_KENDARAAN')        
                ->from('KENDARAAN_MASTER_SOPIR MS')
                ->join('KENDARAAN_MASTER_KENDARAAN MK', 'MS.KENDARAAN_ID = MK.ID', 'left')
                ->where('MS.ID', $id)
                ->get()->result();
        foreach($data as $key=>$value){
            $temp = (array) $value;
            $data[$key] = (object) array_change_key_case_recursive($temp);
        }
        return $data;
    }    

    // ORACLE DB TEST ✅
    function recommendation($id, $pencarian, $sort, $page, $limit){
        $return = [];
        $res = $this->db->select(" TO_CHAR(BERANGKAT, 'YYYY-MM-DD HH24:MI:SS') AS BERANGKAT, 
                TO_CHAR(KEMBALI, 'YYYY-MM-DD HH24:MI:SS') AS KEMBALI")
                ->where('ID', $id)
                ->get('KENDARAAN_PEMESANAN')->result();
        if(empty($res)) return false;
        $berangkat = $res[0]->BERANGKAT;
        $kembali = $res[0]->KEMBALI;

        $compiled_select = $this->db->select('SOPIR_ID AS ID')
                            ->from('KENDARAAN_PEMESANAN')    
                            ->where('SOPIR_ID IS NOT ',null)
                            ->group_start()
                                ->group_start()
                                    ->where("TO_CHAR(BERANGKAT, 'YYYY-MM-DD HH24:MI:SS') >= ",$berangkat)
                                    ->where("TO_CHAR(BERANGKAT, 'YYYY-MM-DD HH24:MI:SS') <= ",$kembali)
                                ->group_end()
                                ->or_group_start()
                                    ->where("TO_CHAR(KEMBALI, 'YYYY-MM-DD HH24:MI:SS') >= ",$berangkat)
                                    ->where("TO_CHAR(KEMBALI, 'YYYY-MM-DD HH24:MI:SS') <= ",$kembali)
                                ->group_end()
                            ->group_end()
                            ->get_compiled_select();
        
        $return['total'] = $this->db->select('MS.ID, MS.NID, MS.NAMA, MS.RATING, MS.STATUS, MK.NOPOL, MK.NAMA AS NAMA_KENDARAAN')
                            ->from('KENDARAAN_MASTER_SOPIR MS')
                            ->join('KENDARAAN_MASTER_KENDARAAN MK', 'MS.KENDARAAN_ID = MK.ID', 'left')
                            ->where('MS.ID NOT IN ('.$compiled_select.')')
                            ->where('MS.KENDARAAN_ID IS NOT NULL')
                            ->where('MS.DELETED_AT',null)
                            ->order_by('ID')
                            ->count_all_results();
        
        $this->db->select('MS.ID, MS.NID, MS.NAMA, MS.RATING, MS.STATUS, MK.NOPOL, MK.NAMA AS NAMA_KENDARAAN')
        ->from('KENDARAAN_MASTER_SOPIR MS')
        ->join('KENDARAAN_MASTER_KENDARAAN MK', 'MS.KENDARAAN_ID = MK.ID', 'left')
        ->where('MS.ID NOT IN ('.$compiled_select.')')
        ->where('MS.KENDARAAN_ID IS NOT NULL')
        ->where('MS.DELETED_AT',null);
        if($pencarian) $this->db->like('LOWER(MS.NAMA)',strtolower($pencarian));
        if($sort['sort']){
            if($sort['sortby'] == 'nama'){
                $this->db->order_by('NAMA', $sort['sort']);
            }
            else if($sort['sortby'] == 'pesanan'){
                $this->db->order_by('JUMLAH_PESANAN', $sort['sort']);
            }
            else if($sort['sortby'] == 'durasi'){
                $this->db->order_by('DURASI_PESANAN', $sort['sort']);
            }
        }
        $query = $this->db->limit($limit, ($page-1)*$limit)
        ->get_compiled_select();
        $return['data'] = $this->db->query($query)->result();
        foreach($return['data'] as $key=>$value){
            $temp = (array) $value;
            $return['data'][$key] = (object) array_change_key_case_recursive($temp);
        }
        return $return;
        
    }
    
    // ORACLE DB TEST ✅
    function history($id, $pencarian, $filter, $page, $limit){
        $return  = [];

        $this->db->select('*')
        ->from('KENDARAAN_PEMESANAN P')
        ->where('SOPIR_ID', $id);
        if($filter['status']) $this->db->like('STATUS_PEMESANAN',$filter['status']);
        // if($pencarian) $this->db->like('ms.nama',$pencarian);
        $return['total'] = $this->db->count_all_results();

        $this->db->select('*')
        ->from('KENDARAAN_PEMESANAN P')
        ->where('SOPIR_ID', $id);
        if($filter['status']) $this->db->like('STATUS_PEMESANAN',$filter['status']);
        // if($pencarian) $this->db->like('ms.nama',$pencarian);
        $return['data'] = $this->db->limit($limit, ($page-1)*$limit)->get()->result();


        for($i = 0; $i < count($return['data']); $i++){
            $tujuan = $this->db->select('LOKASI')
                                ->from('KENDARAAN_LOKASI_PENGANTARAN')
                                ->where('PEMESANAN_KENDARAAN_ID',$return['data'][$i]->ID)        
                                ->get()->result();
            $array = [];
            for($j = 0; $j < count($tujuan); $j++){
                array_push($array, $tujuan[$j]->LOKASI);
            }
            $return['data'][$i]->tujuan = $array;
            
        }
        return $return;   
    }

    // ORACLE DB TEST ✅
    function attendanceGet($id, $page, $limit){
        $return  = [];

        $this->db->select('*')
        ->from('KENDARAAN_PRESENSI_SOPIR')
        ->where('SOPIR_ID', $id)
        ->order_by('WAKTU_MASUK','DESC');
        $return['total'] = $this->db->count_all_results();

        $this->db->select("ID, 
        TO_CHAR(WAKTU_MASUK, 'YYYY-MM-DD') AS TANGGAL, 
        TO_CHAR(WAKTU_MASUK, 'YYYY-MM-DD HH24:MI:SS') AS WAKTU_MASUK, 
        TO_CHAR(WAKTU_KELUAR, 'YYYY-MM-DD HH24:MI:SS') AS WAKTU_KELUAR")
        ->from('KENDARAAN_PRESENSI_SOPIR')
        ->where('SOPIR_ID', $id)
        ->order_by('WAKTU_MASUK','DESC');
        $return['data'] = $this->db->limit($limit, ($page-1)*$limit)->get()->result();

        foreach($return['data'] as $key=>$value){
            $temp = (array) $value;
            $return['data'][$key] = (object) array_change_key_case_recursive($temp);
        }

        return $return;
    }

    // ORACLE DB TEST ✅
    function create($data){
        $timestamp = date("Y-m-d H:i:s");

        $this->db->set('NID', $data['nid']);
        $this->db->set('NAMA', $data['nama']);
        $this->db->set('PASSWORD', $data['password']);
        $this->db->set('CURRENT_PASSWORD', $data['current_password']);
        $this->db->set('KENDARAAN_ID', $data['kendaraan_id']);
        $this->db->set('LOKASI', $data['lokasi']);
        $this->db->set('NOHP', $data['nohp']);
        $this->db->set('STATUS', $data['status']);
        $this->db->set('CREATED_AT',"TO_DATE('$timestamp','YYYY-MM-DD HH24:MI:SS')", false);
        // Check if db error
        
        if(!$this->db->insert('KENDARAAN_MASTER_SOPIR')){
            $error = $this->db->error();
            return $error;
        };
        $this->db->where('ID', $data['kendaraan_id'])
                ->update('KENDARAAN_MASTER_KENDARAAN', array('STATUS' => 'Aktif'));
        
        // Return true if no db error
        return true;
    }

    // ORACLE DB TEST ✅
    function update($id, $data){
        $timestamp = date("Y-m-d H:i:s");
        $res = $this->db->get_where('KENDARAAN_MASTER_SOPIR', array('ID' => $id))->result();
        
        if(!empty($res)){

            $this->db->set('NAMA', $data['nama']);
            $this->db->set('PASSWORD', $data['password']);
            $this->db->set('CURRENT_PASSWORD', $data['current_password']);
            $this->db->set('KENDARAAN_ID', $data['kendaraan_id']);
            $this->db->set('LOKASI', $data['lokasi']);
            $this->db->set('NOHP', $data['nohp']);
            $this->db->set('LAST_UPDATE_AT',"TO_DATE('$timestamp','YYYY-MM-DD HH24:MI:SS')", false);

            $this->db->where('ID', $id);
            if(!$this->db->update('KENDARAAN_MASTER_SOPIR')){
                $error = $this->db->error();
                return $error;
            };

            if($res[0]->KENDARAAN_ID != $data['kendaraan_id']){
                $this->db->where('id', $res[0]->KENDARAAN_ID)
                        ->update('KENDARAAN_MASTER_KENDARAAN', array('STATUS' => 'Nonaktif'));
                $this->db->where('id', $data['kendaraan_id'])
                        ->update('KENDARAAN_MASTER_KENDARAAN', array('STATUS' => 'Nonaktif'));
            }
            
            // Return true if no db error
            return true;
            
        }
        return false;
    }

    // ORACLE DB TEST ✅
    function delete($id){
        $timestamp = date("Y-m-d H:i:s");
        $res = $this->db->get_where('KENDARAAN_MASTER_SOPIR', array('ID' => $id))->result();

        if(!empty($res)){
            $this->db->set('DELETED_AT',"TO_DATE('$timestamp','YYYY-MM-DD HH24:MI:SS')", false);
            $this->db->where('ID', $id);
            if(!$this->db->update('KENDARAAN_MASTER_SOPIR')){
                $error = $this->db->error();
                return $error;
            };
            if($res[0]->KENDARAAN_ID != null){
                $this->db->where('id', $res[0]->kendaraan_id)
                        ->update('KENDARAAN_MASTER_KENDARAAN', array('STATUS' => 'Nonaktif'));
            }
            
            return true;
        }
        return false;
    }

    // ORACLE DB TEST ✅
    function attendance($id, $check){
        $timestamp = date("Y-m-d H:i:s");
        $res = $this->db->where('SOPIR_ID', $id)
                            ->where("TO_CHAR(WAKTU_MASUK, 'YYYY-MM-DD') = TO_CHAR(CURRENT_DATE,'YYYY-MM-DD')")
                            ->get('KENDARAAN_PRESENSI_SOPIR')->result();

        if($check == true){
            if(!empty($res)){
                return false;
            }
            $this->db->set('SOPIR_ID', $id);
            $this->db->set('WAKTU_MASUK',"TO_DATE('$timestamp','YYYY-MM-DD HH24:MI:SS')", false);
            if(!$this->db->insert('KENDARAAN_PRESENSI_SOPIR')){
                $error = $this->db->error();
                return $error;
            };
            return true;
        }
        else{
            if(empty($res)){
                return 'missing';
            }
            if($res[0]->WAKTU_KELUAR != null){
                return false;
            }

            $this->db->set('SOPIR_ID', $id);
            $this->db->set('WAKTU_KELUAR',"TO_DATE('$timestamp','YYYY-MM-DD HH24:MI:SS')", false);
            if(!$this->db->where('SOPIR_ID', $id)
                        ->where("TO_CHAR(WAKTU_MASUK, 'YYYY-MM-DD') = TO_CHAR(CURRENT_DATE,'YYYY-MM-DD')")
                        ->update('KENDARAAN_PRESENSI_SOPIR')){
                $error = $this->db->error();
                return $error;
            };
            return true;
        }
    }

}
