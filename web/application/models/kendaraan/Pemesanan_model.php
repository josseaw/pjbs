<?php

class Pemesanan_model extends CI_Model{

    function __construct() {
        parent::__construct();        
        $this->load->database();
        $this->load->helper('custom');
    }

    /**
     * GET
     */

    // ORACLE DB TEST ✅
    function all($userid, $pencarian, $filter, $page, $limit){
        $return = [];

        $this->db->select('*')
        ->from('KENDARAAN_PEMESANAN P')
        ->join('KENDARAAN_MASTER_SOPIR MS','P.SOPIR_ID = MS.ID','left')
        ->where('P.NID_PEMESAN', $userid);
        // search and filter condition
        if($filter['status']) $this->db->like('LOWER(P.STATUS_PEMESANAN)', strtolower($filter['status']));
        if($pencarian) $this->db->like('LOWER(MS.NAMA)',strtolower($pencarian));
        // count the data
        $return['total'] = $this->db->count_all_results();

        $this->db->select("P.ID, P.NID_PEMESAN, P.NAMA_PEMESAN,
        MS.NAMA AS NAMA_SOPIR, P.STATUS_PEMESANAN, 
        TO_CHAR(P.BERANGKAT, 'YYYY-MM-DD HH24:MI:SS') AS BERANGKAT, 
        TO_CHAR(P.CREATED_AT, 'YYYY-MM-DD HH24:MI:SS') AS CREATED_AT")
        ->from('KENDARAAN_PEMESANAN P')
        ->join('KENDARAAN_MASTER_SOPIR MS','P.SOPIR_ID = MS.ID','left')
        ->where('P.NID_PEMESAN', $userid);
        // search and filter condition
        if($filter['status']) $this->db->like('LOWER(P.STATUS_PEMESANAN)', strtolower($filter['status']));
        if($pencarian) $this->db->like('LOWER(MS.NAMA)',strtolower($pencarian));
        // get the data
        $return['data'] = $this->db->limit($limit, ($page-1)*$limit)->get()->result();
        
        for($i = 0; $i < count($return['data']); $i++){
            $tujuan = $this->db->select('LOKASI')
                                ->from('KENDARAAN_LOKASI_PENGANTARAN')
                                ->where('PEMESANAN_KENDARAAN_ID',$return['data'][$i]->ID)        
                                ->group_start()
                                    ->where('URUTAN >',0)
                                    ->or_where('URUTAN',NULL)
                                ->group_end()
                                ->get()->result();
            $array = [];
            for($j = 0; $j < count($tujuan); $j++){
                array_push($array, $tujuan[$j]->LOKASI);
            }
            $return['data'][$i]->tujuan = $array;
        }

        foreach($return['data'] as $key=>$value){
            $temp = (array) $value;
            $return['data'][$key] = (object) array_change_key_case_recursive($temp);
        }

        return $return;
    }

    // ORACLE DB TEST ✅
    function allMobile($id, $page, $limit){
        $data = [];
        $data['total'] = 
            $this->db->select('*')
            ->from('KENDARAAN_PEMESANAN P')
            ->where('P.NID_PEMESAN', $id) //id sopir
            ->where_in('P.STATUS_PEMESANAN', ['Disetujui', 'Ditolak', 'Berlangsung'])
            ->where('P.NOTIF_READ', 0)
            ->count_all_results();     
        $data['data'] = 
            $this->db->select("P.ID AS PEMESANAN_ID, P.JUMLAH_PENUMPANG, 
            TO_CHAR(P.CREATED_AT, 'YYYY-MM-DD HH24:MI:SS') AS DIAJUKAN, 
            P.BERANGKAT, P.KEMBALI, P.STATUS_PEMESANAN")
            ->from('KENDARAAN_PEMESANAN P')
            ->where('P.NID_PEMESAN', $id) //id sopir
            ->where_in('P.STATUS_PEMESANAN', ['Disetujui', 'Ditolak', 'Berlangsung'])
            ->where('P.NOTIF_READ', 0)
            ->limit($limit, ($page-1)*$limit)
            ->get()->result();  
        for($i = 0; $i < count($data['data']); $i++){
            $tujuan = $this->db->select('LOKASI')
                                ->from('KENDARAAN_LOKASI_PENGANTARAN')
                                ->where('PEMESANAN_KENDARAAN_ID',$data['data'][$i]->PEMESANAN_ID)        
                                ->group_start()
                                    ->where('URUTAN >',0)
                                    ->or_where('URUTAN',NULL)
                                ->group_end()
                                ->get()->result();
            $array = [];
            for($j = 0; $j < count($tujuan); $j++){
                array_push($array, $tujuan[$j]->LOKASI);
            }
            $data['data'][$i]->tujuan = $array;
        }
        foreach($data['data'] as $key=>$value){
            $temp = (array) $value;
            $data['data'][$key] = (object) array_change_key_case_recursive($temp);
        }
        return $data;
    }

    // ORACLE DB TEST ✅
    function history($pencarian, $filter, $page, $limit){
        $return  = [];

        $this->db->select('*')
        ->from('KENDARAAN_PEMESANAN P');
        if($filter['bulan']) $this->db->where("TO_CHAR(P.CREATED_AT, 'MM') =", $filter['bulan']);
        if($filter['tahun']) {
            if($filter['bulan'] == null) {
                $timestamp = date("m");
                $this->db->where("TO_CHAR(P.CREATED_AT, 'MM') =", $timestamp);
            }
            $this->db->where("TO_CHAR(P.CREATED_AT, 'YYYY') =", $filter['tahun']);
        }
        if($filter['status']) $this->db->like('LOWER(STATUS_PEMESANAN)', strtolower($filter['status']));
        // if($pencarian) $this->db->like('MS.nama',$pencarian);
        $return['total'] = $this->db->count_all_results();

        $this->db->select("P.ID, P.NID_PEMESAN, P.NAMA_PEMESAN, P.STATUS_PEMESANAN,
        P.JUMLAH_PENUMPANG, P.STATUS_DINAS, P.KEPERLUAN,
        TO_CHAR(P.BERANGKAT, 'YYYY-MM-DD HH24:MI:SS') AS BERANGKAT, 
        TO_CHAR(P.KEMBALI, 'YYYY-MM-DD HH24:MI:SS') AS KEMBALI, 
        TO_CHAR(P.CREATED_AT, 'YYYY-MM-DD HH24:MI:SS') AS CREATED_AT")
        ->from('KENDARAAN_PEMESANAN P');
        
        if($filter['bulan']) $this->db->where("TO_CHAR(P.CREATED_AT, 'MM') =", $filter['bulan']);
        if($filter['tahun']) {
            if($filter['bulan'] == null) {
                $timestamp = date("m");
                $this->db->where("TO_CHAR(P.CREATED_AT, 'MM') =", $timestamp);
            }
            $this->db->where("TO_CHAR(P.CREATED_AT, 'YYYY') =", $filter['tahun']);
        }
        if($filter['status']) $this->db->like('LOWER(STATUS_PEMESANAN)', strtolower($filter['status']));
        // if($pencarian) $this->db->like('MS.nama',$pencarian);
        $return['data'] = $this->db->limit($limit, ($page-1)*$limit)->get()->result();


        for($i = 0; $i < count($return['data']); $i++){
            $tujuan = $this->db->select('LOKASI')
                                ->from('KENDARAAN_LOKASI_PENGANTARAN')
                                ->where('PEMESANAN_KENDARAAN_ID',$return['data'][$i]->ID)        
                                ->group_start()
                                    ->where('URUTAN >',0)
                                    ->or_where('URUTAN',NULL)
                                ->group_end()
                                ->get()->result();
            $array = [];
            for($j = 0; $j < count($tujuan); $j++){
                array_push($array, $tujuan[$j]->LOKASI);
            }
            $return['data'][$i]->tujuan = $array;
        }

        foreach($return['data'] as $key=>$value){
            $temp = (array) $value;
            $return['data'][$key] = (object) array_change_key_case_recursive($temp);
        }

        return $return;   
    }

    // ORACLE DB TEST ✅
    function detailById($id){
        $final = $this->db->select("ID, NID_PEMESAN, NAMA_PEMESAN, STATUS_PEMESANAN,
        JUMLAH_PENUMPANG, STATUS_DINAS, KEPERLUAN, NOHP,
        PERSETUJUAN_MANAJER, CATATAN_MANAJER, PERSETUJUAN_ADMIN, CATATAN_ADMIN, SOPIR_ID,
        TO_CHAR(BERANGKAT, 'YYYY-MM-DD HH24:MI:SS') AS BERANGKAT, 
        TO_CHAR(KEMBALI, 'YYYY-MM-DD HH24:MI:SS') AS KEMBALI, 
        TO_CHAR(CREATED_AT, 'YYYY-MM-DD HH24:MI:SS') AS CREATED_AT")
        ->where('ID', $id)
        ->get('KENDARAAN_PEMESANAN')
        ->result();

        if(!empty($final)){
            $tujuan = $this->db->select("ID, URUTAN, LOKASI, LAT, LNG, 
            TO_CHAR(WAKTU_SAMPAI, 'YYYY-MM-DD HH24:MI:SS') AS WAKTU_SAMPAI")
                                ->where('PEMESANAN_KENDARAAN_ID', $id)
                                ->get('KENDARAAN_LOKASI_PENGANTARAN')
                                ->result();
            foreach($tujuan as $key=>$value){
                $temp = (array) $value;
                $tujuan[$key] = (object) array_change_key_case_recursive($temp);
            }
            $sopir = $this->db->select('MS.NID, MS.NAMA, MK.NOPOL, MK.NAMA AS NAMA_KENDARAAN, MS.NOHP')
                                ->from('KENDARAAN_MASTER_SOPIR MS')
                                ->join('KENDARAAN_MASTER_KENDARAAN MK', 'MS.KENDARAAN_ID = MK.ID', 'left')
                                ->where('MS.ID', $final[0]->SOPIR_ID)
                                ->get()->result();
            foreach($sopir as $key=>$value){
                $temp = (array) $value;
                $sopir[$key] = (object) array_change_key_case_recursive($temp);
            }
            $final[0]->tujuan = $tujuan;
            $final[0]->sopir = $sopir;

            foreach($final as $key=>$value){
                $temp = (array) $value;
                $final[$key] = (object) array_change_key_case_recursive($temp);
            }

        }        
        return $final;
    }

    // ORACLE DB TEST ✅
    function forApproval($role, $pencarian, $page, $limit){
        $return = [];

        $this->db->select("*")
        ->from('KENDARAAN_PEMESANAN');

        if($role == 'manajer') $this->db->where('PERSETUJUAN_MANAJER',null)->where('PERSETUJUAN_ADMIN', null);
        else if($role == 'admin') $this->db->where('PERSETUJUAN_MANAJER',1)->where('PERSETUJUAN_ADMIN',null);
        if($pencarian) $this->db->like('LOWER(NAMA_PEMESAN)', strtolower($pencarian));

        $return['total'] = $this->db->count_all_results();    

        $this->db->select("ID AS PEMESANAN_ID, JUMLAH_PENUMPANG, NAMA_PEMESAN, NID_PEMESAN, NOHP, STATUS_DINAS,
        TO_CHAR(BERANGKAT, 'YYYY-MM-DD HH24:MI:SS') AS BERANGKAT, 
        TO_CHAR(KEMBALI, 'YYYY-MM-DD HH24:MI:SS') AS KEMBALI, 
        TO_CHAR(CREATED_AT, 'YYYY-MM-DD HH24:MI:SS') AS DIAJUKAN")
        ->from('KENDARAAN_PEMESANAN');

        if($role == 'manajer') $this->db->where('PERSETUJUAN_MANAJER',null)->where('PERSETUJUAN_ADMIN', null);
        else if($role == 'admin') $this->db->where('PERSETUJUAN_MANAJER',1)->where('PERSETUJUAN_ADMIN',null);
        if($pencarian) $this->db->like('LOWER(NAMA_PEMESAN)', strtolower($pencarian));

        $return['data'] = $this->db->limit($limit, ($page-1)*$limit)->get()->result();

        for($i = 0; $i < count($return['data']); $i++){
            $tujuan = $this->db->select('LOKASI')
                                ->from('KENDARAAN_LOKASI_PENGANTARAN')
                                ->where('PEMESANAN_KENDARAAN_ID',$return['data'][$i]->PEMESANAN_ID)        
                                ->group_start()
                                    ->where('URUTAN >',0)
                                    ->or_where('URUTAN',NULL)
                                ->group_end()
                                ->get()->result();
            $array = [];
            for($j = 0; $j < count($tujuan); $j++){
                array_push($array, $tujuan[$j]->LOKASI);
            }
            $return['data'][$i]->tujuan = $array;
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

        $this->db->select('*')
        ->from('KENDARAAN_PEMESANAN');        

        if($role == 'manajer') $this->db->where('PERSETUJUAN_MANAJER',null)->where('PERSETUJUAN_ADMIN', null);
        else if($role == 'admin') $this->db->where('PERSETUJUAN_MANAJER',1)->where('PERSETUJUAN_ADMIN',null);

        $return['total'] = $this->db->count_all_results();    

        $this->db->select("ID AS PEMESANAN_ID, JUMLAH_PENUMPANG, NAMA_PEMESAN, NID_PEMESAN, NOHP, STATUS_DINAS,
        TO_CHAR(BERANGKAT, 'YYYY-MM-DD HH24:MI:SS') AS BERANGKAT, 
        TO_CHAR(KEMBALI, 'YYYY-MM-DD HH24:MI:SS') AS KEMBALI, 
        TO_CHAR(CREATED_AT, 'YYYY-MM-DD HH24:MI:SS') AS DIAJUKAN")   
        ->from('KENDARAAN_PEMESANAN');         

        if($role == 'manajer') $this->db->where('PERSETUJUAN_MANAJER',null)->where('PERSETUJUAN_ADMIN', null);
        else if($role == 'admin') $this->db->where('PERSETUJUAN_MANAJER',1)->where('PERSETUJUAN_ADMIN',null);

        $return['data'] = $this->db->limit($limit, ($page-1)*$limit)->get()->result();    

        for($i = 0; $i < count($return['data']); $i++){
            $tujuan = $this->db->select('LOKASI')
                                ->from('KENDARAAN_LOKASI_PENGANTARAN')
                                ->where('PEMESANAN_KENDARAAN_ID',$return['data'][$i]->PEMESANAN_ID)
                                ->group_start()
                                    ->where('URUTAN >',0)
                                    ->or_where('URUTAN',NULL)
                                ->group_end()
                                ->get()->result();
            $array = [];
            for($j = 0; $j < count($tujuan); $j++){
                array_push($array, $tujuan[$j]->LOKASI);
            }
            $return['data'][$i]->tujuan = $array;
        }

        foreach($return['data'] as $key=>$value){
            $temp = (array) $value;
            $return['data'][$key] = (object) array_change_key_case_recursive($temp);
        }
        
        return $return;
    }

    // ORACLE DB TEST ✅
    function driverTask($id, $page, $limit){
        $data = [];
        $data['total'] = $this->db->select('*')
                ->from('KENDARAAN_PEMESANAN P')
                ->where('P.SOPIR_ID', $id) //id sopir
                ->where_in('P.STATUS_PEMESANAN', ['Disetujui', 'Berlangsung'])
                ->count_all_results(); 
        $data['data'] = 
            $this->db->select("P.ID AS PEMESANAN_ID, P.NID_PEMESAN, P.NAMA_PEMESAN, P.STATUS_PEMESANAN, P.JUMLAH_PENUMPANG,
            TO_CHAR(P.BERANGKAT, 'YYYY-MM-DD HH24:MI:SS') AS BERANGKAT, 
            TO_CHAR(P.KEMBALI, 'YYYY-MM-DD HH24:MI:SS') AS KEMBALI, 
            TO_CHAR(P.CREATED_AT, 'YYYY-MM-DD HH24:MI:SS') AS CREATED_AT")
            ->from('KENDARAAN_PEMESANAN P')
            ->where('P.SOPIR_ID', $id) //id sopir
            ->where_in('P.STATUS_PEMESANAN', ['Disetujui', 'Berlangsung'])
            ->limit($limit, ($page-1)*$limit)
            ->get()->result(); 
        for($i = 0; $i < count($data['data']); $i++){
            $tujuan = $this->db->select('LOKASI')
                                ->from('KENDARAAN_LOKASI_PENGANTARAN')
                                ->where('PEMESANAN_KENDARAAN_ID',$data['data'][$i]->PEMESANAN_ID)        
                                ->group_start()
                                    ->where('URUTAN >',0)
                                    ->or_where('URUTAN',NULL)
                                ->group_end()
                                ->get()->result();
            $array = [];
            for($j = 0; $j < count($tujuan); $j++){
                array_push($array, $tujuan[$j]->LOKASI);
            }
            $data['data'][$i]->tujuan = $array;
        }
        foreach($data['data'] as $key=>$value){
            $temp = (array) $value;
            $data['data'][$key] = (object) array_change_key_case_recursive($temp);
        }
        return $data;
    }

    // ORACLE DB TEST ✅
    function destination($id){
        $data = $this->db->where('PEMESANAN_KENDARAAN_ID', $id)
                        ->get('KENDARAAN_LOKASI_PENGANTARAN')->result();
        foreach($data as $key=>$value){
            $temp = (array) $value;
            $data[$key] = (object) array_change_key_case_recursive($temp);
        }
        return $data;
    }

    /**
     * POST
     */

    // ORACLE DB TEST ✅
    function create($data, $berangkat, $kembali, $tujuan){
        $timestamp = date("Y-m-d H:i:s");

        $this->db->set('JUMLAH_PENUMPANG', $data['jumlah_penumpang']);
        $this->db->set('STATUS_DINAS', $data['status_dinas']);
        $this->db->set('KEPERLUAN', $data['keperluan']);
        $this->db->set('BERANGKAT', "TO_DATE('$berangkat','YYYY-MM-DD HH24:MI:SS')", false);
        $this->db->set('KEMBALI', "TO_DATE('$kembali','YYYY-MM-DD HH24:MI:SS')", false);
        $this->db->set('NOHP', $data['nohp']);
        $this->db->set('STATUS_PEMESANAN', $data['status_pemesanan']);
        $this->db->set('NID_PEMESAN', $data['nid']);
        $this->db->set('NAMA_PEMESAN', $data['nama']);
        $this->db->set('CREATED_AT',"TO_DATE('$timestamp','YYYY-MM-DD HH24:MI:SS')", false);
        // Check if db error
        if(!$this->db->insert('KENDARAAN_PEMESANAN')){
            $error = $this->db->error();
            return $error;
        };
        $last = $this->db->select('ID')->order_by('ID',"DESC")->limit(1)->get('KENDARAAN_PEMESANAN')->result();
        $id = $last[0]->ID;
        
        $this->db->set('PEMESANAN_KENDARAAN_ID', $id);
        $this->db->set('URUTAN', 0);
        $this->db->set('LOKASI', 'PT. PJB Services');
        $this->db->set('LAT', -7.378672);
        $this->db->set('LNG', 112.737341);
        
        $this->db->insert('KENDARAAN_LOKASI_PENGANTARAN');

        foreach(json_decode($tujuan) as $key=>$val){
            $this->db->set('PEMESANAN_KENDARAAN_ID', $id);
            $this->db->set('LOKASI', $val->lokasi);
            $this->db->set('LAT', $val->lat);
            $this->db->set('LNG', $val->lng);
            
            $this->db->insert('KENDARAAN_LOKASI_PENGANTARAN');
        }
        // CREATE NOTIFICATION FOR MANAJER, WAITING FOR APPROVAL
        $notif = [
            'tipe' => 'persetujuan',
            'data' => 'Pemesanan kendaraan menunggu persetujuan Anda.',
            'aksi' => '/v1/kendaraan/pemesanan?id='.$id
        ];
        $this->createNotification(NULL, 3, $notif);
        
        return true;
    }

    // ORACLE DB TEST ❌
    function addDestination($data){
        $id = $data['pemesanan_kendaraan_id'];
        $res = $this->db->select('id')->get_where('KENDARAAN_PEMESANAN', array('ID' => $id))->result();
        $lastDestination = $this->db->select('URUTAN')->order_by('ID',"desc")->limit(1)->get_where('KENDARAAN_LOKASI_PENGANTARAN', array('PEMESANAN_KENDARAAN_ID' => $id))->result();
        if(!empty($res)){
            $data['URUTAN'] = $lastDestination[0]->urutan + 1;
            $this->db->set('PEMESANAN_KENDARAAN_ID', $id);
            $this->db->set('LOKASI', $data['lokasi']);
            $this->db->set('LAT', $data['lat']);
            $this->db->set('LNG', $data['lng']);
            if(!$this->db->insert('KENDARAAN_LOKASI_PENGANTARAN')){
                $error = $this->db->error();
                return $error;
            };
            return true;
        }
        return false;
    }

    /**
     * PUT
     */

     // ORACLE DB TEST ✅
    function approve($id, $role, $data){
        $timestamp = date("Y-m-d H:i:s");
        $res = $this->db->get_where('KENDARAAN_PEMESANAN', array('ID' => $id))->result();

        if(!empty($res)){
            //Disetujui manajer
            if($role == 'manajer' && $data['sopir_id'] == ''){
                
                $this->db->set('PERSETUJUAN_MANAJER', true);
                $this->db->set('CATATAN_MANAJER', $data['catatan']);
                $this->db->set('LAST_UPDATE_AT',"TO_DATE('$timestamp','YYYY-MM-DD HH24:MI:SS')", false);

                $this->db->where('ID', $id);
                if(!$this->db->update('KENDARAAN_PEMESANAN')){
                    $error = $this->db->error();
                    return $error;
                };

                // CREATE NOTIFICATION FOR ADMIN, WAITING FOR APPROVAL
                $notif = [
                    'tipe' => 'persetujuan',
                    'data' => 'Pemesanan kendaraan menunggu persetujuan Anda.',
                    'aksi' => '/v1/kendaraan/pemesanan?id='.$id
                ];
                $this->createNotification(NULL, 4, $notif);

                return true;
            }
            //Disetujui Admin
            else if($role == 'admin' && $data['sopir_id'] != ''){
                if($res[0]->PERSETUJUAN_MANAJER === null || $res[0]->PERSETUJUAN_MANAJER == false){
                    return array('status' => false, 'msg' => 'Pemesanan belum disetujui oleh manajer');
                }
                                                
                $this->db->set('PERSETUJUAN_ADMIN', true);
                $this->db->set('CATATAN_ADMIN', $data['catatan']);
                $this->db->set('STATUS_PEMESANAN', 'Disetujui');
                $this->db->set('SOPIR_ID', $data['sopir_id']);
                $this->db->set('NOTIF_READ', 0);
                $this->db->set('LAST_UPDATE_AT',"TO_DATE('$timestamp','YYYY-MM-DD HH24:MI:SS')", false);

                $this->db->where('ID', $id);
                if(!$this->db->update('KENDARAAN_PEMESANAN')){
                    $error = $this->db->error();
                    
                    return $error;
                };
                // CREATE NOTIFICATION FOR USER, APPROVED BY ADMIN
                $notif = [
                    'tipe' => 'persetujuan',
                    'data' => 'Pemesanan anda telah disetujui oleh admin',
                    'aksi' => '/v1/kendaraan/pemesanan?id='.$id
                ];
                $this->createNotification($res[0]->NID_PEMESAN, null, $notif);

                return true;
            }
            
            return array('status' => false, 'msg' => 'Kesalahan tidak terduga');
            
        }
        
        return array('status' => false, 'msg' => 'Data pemesanan tidak ditemukan');
    }

    // ORACLE DB TEST ✅
    function refuse($id, $role, $alasan){
        $timestamp = date("Y-m-d H:i:s");
        $res = $this->db->get_where('KENDARAAN_PEMESANAN', array('ID' => $id))->result();
        if(!empty($res)){
            if($role == 'manajer'){
                
                $this->db->set('PERSETUJUAN_MANAJER', false);
                $this->db->set('CATATAN_MANAJER', $alasan);
                $this->db->set('STATUS_PEMESANAN', 'Ditolak');
                $this->db->set('NOTIF_READ', 0);
                $this->db->set('LAST_UPDATE_AT',"TO_DATE('$timestamp','YYYY-MM-DD HH24:MI:SS')", false);

                $this->db->where('ID', $id);
                if(!$this->db->update('KENDARAAN_PEMESANAN')){
                    $error = $this->db->error();
                    return $error;
                };
                // CREATE NOTIFICATION FOR USER, APPROVED BY ADMIN
                $notif = [
                    'tipe' => 'penolakan',
                    'data' => 'Pemesanan anda ditolak oleh manajer',
                    'aksi' => '/v1/kendaraan/pemesanan?id='.$id
                ];
                $this->createNotification($res[0]->NID_PEMESAN, null, $notif);
                return true;
            }
            else if($role == 'admin'){
                
                $this->db->set('PERSETUJUAN_ADMIN', false);
                $this->db->set('CATATAN_ADMIN', $alasan);
                $this->db->set('STATUS_PEMESANAN', 'Ditolak');
                $this->db->set('NOTIF_READ', 0);
                $this->db->set('LAST_UPDATE_AT',"TO_DATE('$timestamp','YYYY-MM-DD HH24:MI:SS')", false);
                $this->db->where('ID', $id);
                if(!$this->db->update('KENDARAAN_PEMESANAN')){
                    $error = $this->db->error();
                    return $error;
                };
                // CREATE NOTIFICATION FOR USER, APPROVED BY ADMIN
                $notif = [
                    'tipe' => 'penolakan',
                    'data' => 'Pemesanan anda ditolak oleh admin',
                    'aksi' => '/v1/kendaraan/pemesanan?id='.$id
                ];
                $this->createNotification($res[0]->NID_PEMESAN, null, $notif);
                return true;
            }
            
            return array('status' => false, 'msg' => 'Kesalahan tidak terduga');
            
        }
        
        return false;
    }

    // ORACLE DB TEST ✅
    function start($id){
        $timestamp = date("Y-m-d H:i:s");
        $res = $this->db->get_where('KENDARAAN_PEMESANAN', array('ID' => $id))->result();
        if($res[0]->STATUS_PEMESANAN == 'Disetujui'){
            if(!empty($res)){
                $this->db->set('STATUS_PEMESANAN', 'Berlangsung');
                $this->db->set('LAST_UPDATE_AT',"TO_DATE('$timestamp','YYYY-MM-DD HH24:MI:SS')", false);
                $this->db->where('ID', $id);
                if(!$this->db->update('KENDARAAN_PEMESANAN')){
                    $error = $this->db->error();
                    return $error;
                };
                return true;
            }
        }
        return false;
    }

    // ORACLE DB TEST ✅
    function arrival($id, $idLoc){
        $timestamp = date("Y-m-d H:i:s");
        $res = $this->db->get_where('KENDARAAN_LOKASI_PENGANTARAN', array('ID' => $idLoc))->result();
        if(!empty($res)){
            $urutan = $this->db->select('URUTAN')
                        ->where('PEMESANAN_KENDARAAN_ID', $id)
                        ->order_by('URUTAN','DESC')
                        ->limit(1)
                        ->get('KENDARAAN_LOKASI_PENGANTARAN')->result();
            $number = (int) $urutan[0]->URUTAN + 1;
            
            $this->db->set('URUTAN', $number);
            $this->db->set('WAKTU_SAMPAI',"TO_DATE('$timestamp','YYYY-MM-DD HH24:MI:SS')", false);
            $this->db->where('ID', $idLoc);
            if(!$this->db->update('KENDARAAN_LOKASI_PENGANTARAN')){
                $error = $this->db->error();
                return $error;
            };
            return true;
        }
        return false;
    }

    // ORACLE DB TEST ✅
    function arrivalEnd($id, $idLoc){
        $timestamp = date("Y-m-d H:i:s");
        $res = $this->db->get_where('KENDARAAN_PEMESANAN', array('ID' => $id))->result();
        if($res[0]->STATUS_PEMESANAN == 'Berlangsung'){
            if(!empty($res)){
                $this->db->set('WAKTU_SAMPAI',"TO_DATE('$timestamp','YYYY-MM-DD HH24:MI:SS')", false);
                $this->db->where('ID', $idLoc);
                if(!$this->db->update('KENDARAAN_LOKASI_PENGANTARAN')){
                    $error = $this->db->error();
                    return $error;
                };
                
                $this->db->set('STATUS_PEMESANAN', 'Selesai');
                $this->db->set('LAST_UPDATE_AT',"TO_DATE('$timestamp','YYYY-MM-DD HH24:MI:SS')", false);
                $this->db->where('ID', $id);
                if(!$this->db->update('KENDARAAN_PEMESANAN')){
                    $error = $this->db->error();
                    return $error;
                };
                return true;
            }
        }
        return false;
    }

    // ORACLE DB TEST ✅
    function rating($id, $rate, $comment){
        $res = $this->db->get_where('KENDARAAN_PEMESANAN', array('ID' => $id))->result();
        $idsopir = $res[0]->SOPIR_ID;
        if(!empty($res)){
            $this->db->set('RATING', $rate);
            $this->db->set('KOMENTAR', $comment);
            $this->db->where('ID', $id);
            if(!$this->db->update('KENDARAAN_PEMESANAN')){
                $error = $this->db->error();
                return $error;
            };
            $avg = $this->db->select_avg('RATING')
                            ->where('SOPIR_ID', $idsopir)
                            ->get('KENDARAAN_PEMESANAN')->result();
            if(empty($avg)){
                return false;
            }
            $this->db->set('RATING', (int) $avg[0]->RATING);
            $this->db->where('ID', $idsopir);
            if(!$this->db->update('KENDARAAN_MASTER_SOPIR')){
                $error = $this->db->error();
                return $error;
            };
            return true;
        }
        return false;
    }

    function notifReadMobile(){

    }

    function createNotification($nid, $level, $data){
        $timestamp = date("Y-m-d H:i:s");

        $this->db->set('NID_PENERIMA', $nid);
        $this->db->set('LEVEL_PENERIMA', $level);
        $this->db->set('TIPE', $data['tipe']);
        $this->db->set('DATA', $data['data']);
        $this->db->set('READ', 0);
        $this->db->set('CREATED_AT',"TO_DATE('$timestamp','YYYY-MM-DD HH24:MI:SS')", false);
        $this->db->set('AKSI', $data['aksi']);
        if(!$this->db->insert('KENDARAAN_NOTIFIKASI')){
            $error = $this->db->error();
            return $error;
        };
        return true;
    }


}
