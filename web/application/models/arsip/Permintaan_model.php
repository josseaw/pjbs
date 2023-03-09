<?php

class Permintaan_model extends CI_Model{

    function __construct() {
        parent::__construct();        
        $this->load->database();
        $this->load->helper('custom');
    }

    // ORACLE DB TEST ✅
    function all($cari, $filter, $page, $limit){
        $return = [];

        $this->db->select('*')
        ->from('ARSIP_BOKS BK')
        ->join('ARSIP_PERMINTAAN PA', 'BK.PERMINTAAN_ARSIP_ID = PA.ID',' left')
        ->join('ARSIP_MASTER_RAK MR', 'BK.MASTER_RAK_ID = MR.ID',' left')
        ->where('BK.MASTER_RAK_ID', null);
        // search and filter condition
        // if($filter['status']) $this->db->like('pk.status_pemesanan',$filter['status']);
        // if($pencarian) $this->db->like('ms.nama',$pencarian);
        // count the data
        $return['total'] = $this->db->count_all_results();

        $this->db->select("BK.ID, BK.BOKS_ID, PA.NAMA_PEMESAN, PA.SUBDIT, 
        TO_CHAR(PA.CREATED_AT, 'YYYY-MM-DD HH24:MI:SS') AS CREATED_AT")
        ->from('ARSIP_BOKS BK')
        ->join('ARSIP_PERMINTAAN PA', 'BK.PERMINTAAN_ARSIP_ID = PA.ID',' left')
        ->join('ARSIP_MASTER_RAK MR', 'BK.MASTER_RAK_ID = MR.ID',' left')
        ->where('BK.MASTER_RAK_ID', null);
        // search and filter condition
        // if($filter['status']) $this->db->like('pk.status_pemesanan',$filter['status']);
        // if($pencarian) $this->db->like('ms.nama',$pencarian);
        // get the data
        $return['data'] = $this->db->limit($limit, ($page-1)*$limit)->get()->result();
        
        for($i = 0; $i < count($return['data']); $i++){
            $berkas = $this->db->select('NAMA')
                                ->from('ARSIP_BERKAS_BOKS')
                                ->where('BOKS_ARSIP_ID',$return['data'][$i]->ID)        
                                ->get()->result();
            $array = [];
            for($j = 0; $j < count($berkas); $j++){
                array_push($array, $berkas[$j]->NAMA);
            }
            $return['data'][$i]->berkas = $array;
        }
        foreach($return['data'] as $key=>$value){
            $temp = (array) $value;
            $return['data'][$key] = (object) array_change_key_case_recursive($temp);
        }
        return $return;
    }

    function monitoring($cari, $filter, $page, $limit){
        $return = [];

        $this->db->select("*")
        ->order_by('CREATED_AT','DESC');
        $return['total'] = $this->db->count_all_results('ARSIP_PERMINTAAN');

        $this->db->select("ID, NAMA_PEMESAN, SUBDIT, JUMLAH_BOKS,
        TO_CHAR(CREATED_AT, 'YYYY-MM-DD HH24:MI:SS') AS CREATED_AT")
        ->order_by('CREATED_AT','DESC');
        if($pencarian) $this->db->like('LOWER(BE.NAMA)',strtolower($pencarian));
        if($filter['rak']) $this->db->like('LOWER(MR.NAMA)',$filter['rak']);
        if($filter['sort']){
            if($filter['sortby'] == 'nama'){
                $this->db->order_by('BE.NAMA', $filter['sort']);
            }
            else if($sort['sortby'] == 'tanggal'){
                $this->db->order_by('PA.CREATED_AT', $filter['sort']);
            }
        }
        
        
        $return['data'] = $this->db->limit($limit, ($page-1)*$limit)->get('ARSIP_PERMINTAAN')->result();

        foreach($return['data'] as $key=>$value){
            $this->db->select("ID, BOKS_ID, UKURAN_BOKS, TAHUN_RETENSI, MASTER_RAK_ID")
            ->from('ARSIP_BOKS')
            ->where('PERMINTAAN_ARSIP_ID', $value->ID);
            
            $boks = $this->db->get()->result();
            if(!empty($boks)){
                for($i = 0; $i < count($boks); $i++){
                    $berkas = $this->db->select('NAMA')
                                        ->from('ARSIP_BERKAS_BOKS')
                                        ->where('BOKS_ARSIP_ID',$boks[$i]->ID)        
                                        ->get()->result();
                    $array = [];
                    for($j = 0; $j < count($berkas); $j++){
                        array_push($array, $berkas[$j]->NAMA);
                    }            
                    $boks[$i]->berkas = $array;
                }
                foreach($boks as $a=>$value){
                    $temp = (array) $value;
                    $boks[$a] = (object) array_change_key_case_recursive($temp);
                }
                $return['data'][$key]->boks = $boks;
            }
            else{
                $return['data'][$key]->boks = [];
            }
            
            
        }

        foreach($return['data'] as $key=>$value){
            $temp = (array) $value;
            $return['data'][$key] = (object) array_change_key_case_recursive($temp);
        }

        return $return;
    }

    // ORACLE DB TEST ✅
    function detailById($permintaanid){
        $this->db->select("BK.ID, BK.BOKS_ID, BK.UKURAN_BOKS, BK.TAHUN_RETENSI,
        MR.NAMA AS RAK, PA.NAMA_PEMESAN, PA.SUBDIT")
        ->from('ARSIP_BOKS BK')
        ->join('ARSIP_PERMINTAAN PA', 'BK.PERMINTAAN_ARSIP_ID = PA.ID',' left')
        ->join('ARSIP_MASTER_RAK MR', 'BK.MASTER_RAK_ID = MR.ID',' left')
        ->where('BK.PERMINTAAN_ARSIP_ID', $permintaanid);
        
        $data = $this->db->get()->result();
        
        for($i = 0; $i < count($data); $i++){
            $berkas = $this->db->select('NAMA')
                                ->from('ARSIP_BERKAS_BOKS')
                                ->where('BOKS_ARSIP_ID',$data[$i]->ID)        
                                ->get()->result();
            $array = [];
            for($j = 0; $j < count($berkas); $j++){
                array_push($array, $berkas[$j]->NAMA);
            }            
            $data[$i]->berkas = $array;
        }
        foreach($data as $key=>$value){
            $temp = (array) $value;
            $data[$key] = (object) array_change_key_case_recursive($temp);
        }
        return $data;
    }

    function approvalNotif($page, $limit){
        $return = [];

        $this->db->select("*")
        ->where('NOTIF_READ', NULL)
        ->or_where('NOTIF_READ', 0)
        ->order_by('CREATED_AT','DESC');
        $return['total'] = $this->db->count_all_results('ARSIP_PERMINTAAN');

        $this->db->select("ID, NAMA_PEMESAN, JUMLAH_BOKS, NOTIF_READ,
        TO_CHAR(CREATED_AT, 'YYYY-MM-DD HH24:MI:SS') AS CREATED_AT")
        ->where('NOTIF_READ', NULL)
        ->or_where('NOTIF_READ', 0)
        ->order_by('CREATED_AT','DESC');
        
        $return['data'] = $this->db->limit($limit, ($page-1)*$limit)->get('ARSIP_PERMINTAAN')->result();

        foreach($return['data'] as $key=>$value){
            $this->db->select("ID, BOKS_ID, UKURAN_BOKS, TAHUN_RETENSI, MASTER_RAK_ID")
            ->from('ARSIP_BOKS')
            ->where('PERMINTAAN_ARSIP_ID', $value->ID);
            
            $boks = $this->db->get()->result();
            if(!empty($boks)){
                for($i = 0; $i < count($boks); $i++){
                    $berkas = $this->db->select('NAMA')
                                        ->from('ARSIP_BERKAS_BOKS')
                                        ->where('BOKS_ARSIP_ID',$boks[$i]->ID)        
                                        ->get()->result();
                    $array = [];
                    for($j = 0; $j < count($berkas); $j++){
                        array_push($array, $berkas[$j]->NAMA);
                    }            
                    $boks[$i]->berkas = $array;
                }
                foreach($boks as $a=>$value){
                    $temp = (array) $value;
                    $boks[$a] = (object) array_change_key_case_recursive($temp);
                }
                $return['data'][$key]->boks = $boks;
            }
            else{
                $return['data'][$key]->boks = [];
            }
            
            
        }

        foreach($return['data'] as $key=>$value){
            $temp = (array) $value;
            $return['data'][$key] = (object) array_change_key_case_recursive($temp);
        }

        return $return;
    }

    function requestNotif($nid, $page, $limit){
        $return = [];

        $this->db->select("*")
        ->where('NID_PENERIMA', $nid)
        ->where('READ', 0)
        ->or_where('READ', NULL)
        ->order_by('CREATED_AT','DESC');
        $return['total'] = $this->db->count_all_results('ARSIP_NOTIFIKASI');

        $this->db->select("ID, NID_PENERIMA, TIPE, DATA, READ, AKSI,
        TO_CHAR(CREATED_AT, 'YYYY-MM-DD HH24:MI:SS') AS CREATED_AT")
        ->where('NID_PENERIMA', $nid)
        ->where('READ', 0)
        ->or_where('READ', NULL)
        ->order_by('CREATED_AT','DESC');

        if($page == 'all'){
            $return['data'] = $this->db->get('ARSIP_NOTIFIKASI')->result();    
        }
        else{
            $return['data'] = $this->db->limit($limit, ($page-1)*$limit)->get('ARSIP_NOTIFIKASI')->result();
        }
        

        foreach($return['data'] as $key=>$value){
            $temp = (array) $value;
            $return['data'][$key] = (object) array_change_key_case_recursive($temp);
        }

        return $return;
        
    }

    // ORACLE DB TEST ✅
    function createPermintaan($permintaan){
        $timestamp = date("Y-m-d H:i:s");

        $this->db->set('NID_PEMESAN', $permintaan['user_nid']);
        $this->db->set('JUMLAH_BOKS', $permintaan['jumlah_boks']);
        $this->db->set('NAMA_PEMESAN', $permintaan['nama_pemesan']);
        $this->db->set('SUBDIT', $permintaan['subdit']);
        $this->db->set('CREATED_AT',"TO_DATE('$timestamp','YYYY-MM-DD HH24:MI:SS')", false);
        
        if(!$this->db->insert('ARSIP_PERMINTAAN')){
            $error = $this->db->error();
            return $error;
        };
        $last = $this->db->select('ID')->order_by('ID',"DESC")->limit(1)->get('ARSIP_PERMINTAAN')->result();
        $id = $last[0]->ID;
        $notif = [
            'tipe' => 'tindak_lanjut',
            'data' => 'Permintaan penyimpanan arsip menunggu tindak lanjut anda.',
            'aksi' => '/v1/arsip/permintaan?id='.$id
        ];
        $this->createNotification(NULL, 11, $notif);
        return $id;
    }

    // ORACLE DB TEST ✅
    function createBoksArsip($boks){
        $tenggat = $boks['masa_tenggat'];

        $this->db->set('BOKS_ID', $boks['boks_id']);
        $this->db->set('UKURAN_BOKS', $boks['ukuran_boks']);
        $this->db->set('TAHUN_RETENSI', $boks['tahun_retensi']);
        $this->db->set('PERMINTAAN_ARSIP_ID', $boks['permintaan_arsip_id']);
        $this->db->set('MASA_TENGGAT', "TO_DATE('$tenggat','YYYY-MM-DD')", false);
        if(!$this->db->insert('ARSIP_BOKS')){
            $error = $this->db->error();
            return $error;
        };
        $last = $this->db->select('ID')->order_by('ID',"DESC")->limit(1)->get('ARSIP_BOKS')->result();
        $id = $last[0]->ID;
        return $id;
    }
    
    // ORACLE DB TEST ✅
    function createBerkasArsip($berkas){
        $this->db->set('NAMA', $berkas['nama']);
        $this->db->set('BOKS_ARSIP_ID', $berkas['boks_arsip_id']);
        $this->db->set('NAMA_BERKAS', $berkas['nama_berkas']);
        $this->db->set('TIPE_BERKAS', $berkas['tipe_berkas']);
        $this->db->set('UKURAN_BERKAS', $berkas['ukuran_berkas']);
        if(!$this->db->insert('ARSIP_BERKAS_BOKS')){
            $error = $this->db->error();
            var_dump($error);
            return $error;
        };
        return true;
    }

    function assignRak($boksid, $rakid){
        $timestamp = date("Y-m-d H:i:s");

        $res = $this->db->get_where('ARSIP_BOKS', array('ID' => $boksid))->result();
        $rak = $this->db->get_where('ARSIP_MASTER_RAK', array('ID' => $rakid))->result();
        
        $rakterpakai = $rak[0]->TERPAKAI;
        $permintaanid = $res[0]->PERMINTAAN_ARSIP_ID;
        $nid = $this->db->select('NID_PEMESAN')->where('ID', $permintaanid)->get('ARSIP_PERMINTAAN')->result();
        $nid = $nid[0]->NID_PEMESAN;

        if(empty($rak) || $rakterpakai == $rak[0]->JUMLAH_BOKS){
            return [
                'status' => false,
                'msg' => 'Rak tidak tersedia/penuh'
            ];
        }
        if($res[0]->MASTER_RAK_ID){
            return [
                'status' => false,
                'msg' => 'Berkas sudah ditaruh dalam rak'
            ];
        }
        if(!empty($res)){
            $this->db->where('ID', $boksid);
            $status = $this->db->update('ARSIP_BOKS', [
                'MASTER_RAK_ID' => $rakid
            ]);
            $rakterpakai++;
            $this->db->where('ID', $rakid);
            $status = $this->db->update('ARSIP_MASTER_RAK', [
                'TERPAKAI' => $rakterpakai
            ]);

            $check = $this->db->where('MASTER_RAK_ID', NULL)
                    ->where('PERMINTAAN_ARSIP_ID', $permintaanid)
                    ->get('ARSIP_BOKS')->result();
            if(empty($check)){
                $notif = [
                    'tipe' => 'masuk_rak',
                    'data' => 'Arsip anda sudah masuk rak.',
                    'aksi' => '/v1/arsip/permintaan?id='.$permintaanid
                ];
                $this->createNotification($nid, null, $notif);
            }

            return true;
        }
        return [
            'status' => false,
            'msg' => 'ID boks tidak valid'
        ];
    }

    function moveRak($boksid, $rakid){
        $res = $this->db->get_where('ARSIP_BOKS', array('ID' => $boksid))->result();
        $res_rakid = $res[0]->MASTER_RAK_ID;

        $rak = $this->db->get_where('ARSIP_MASTER_RAK', array('ID' => $rakid))->result();
        $res_rak = $this->db->get_where('ARSIP_MASTER_RAK', array('ID' => $res_rakid))->result();

        if(empty($rak) || $rak[0]->TERPAKAI == $rak[0]->JUMLAH_BOKS){
            return [
                'status' => false,
                'msg' => 'Rak tidak tersedia/penuh'
            ];
        }
        if(!empty($res)){
            $this->db->where('ID', $boksid);
            $status = $this->db->update('ARSIP_BOKS', [
                'MASTER_RAK_ID' => $rakid
            ]);

            $plus = $rak[0]->TERPAKAI+1;
            $this->db->where('ID', $rakid);
            $status = $this->db->update('ARSIP_MASTER_RAK', [
                'TERPAKAI' => $plus
            ]);

            $minus = $res_rak[0]->TERPAKAI-1;
            $this->db->where('ID', $res_rakid);
            $status = $this->db->update('ARSIP_MASTER_RAK', [
                'terpakai' => $minus
            ]);
            return true;
        }
        return [
            'status' => false,
            'msg' => 'ID boks tidak valid'
        ];
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
        if(!$this->db->insert('ARSIP_NOTIFIKASI')){
            $error = $this->db->error();
            return $error;
        };
        return true;
    }
}
