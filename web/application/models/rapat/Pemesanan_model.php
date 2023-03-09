<?php

class Pemesanan_model extends CI_Model{

    function __construct() {
        parent::__construct();        
        $this->load->database();
    }

    function getTable($zoom){
        $arr = [];
        if($zoom == false){
            $arr['table'] = 'RAPAT_PEMESANAN_RUANGAN P';
            $arr['room'] = 'RAPAT_MASTER_RUANGAN R';
            $arr['r'] = 'P.MASTER_RUANGAN_ID';
        } 
        else{
            $arr['table'] = 'RAPAT_PEMESANAN_ROOM p';
            $arr['room'] = 'RAPAT_MASTER_ROOM r';
            $arr['r'] = 'P.MASTER_ROOM_ID';
        } 
        return $arr;
    }

    /**
     * GET
     */

    function all($zoom, $userid, $pencarian, $filter, $page, $limit){
        $info = $this->getTable($zoom);
        $return = [];

        $this->db->select('*')
        ->from($info['table'])
        ->join($info['room'],$info['r'].' = R.ID','left')
        ->join('RAPAT_AGENDA A', 'P.AGENDA_RAPAT_ID = A.ID')
        ->where('A.NID_PEMESAN', $userid);
        // search and filter condition
        if($filter['status']) $this->db->like('p.status_pemesanan',$filter['status']);
        if($pencarian) $this->db->like('r.nama',$pencarian);
        // count the data
        $return['total'] = $this->db->count_all_results();

        $this->db->select("P.ID AS PEMESANAN_ID, A.NAMA_PEMESAN
        TO_CHAR(A.JADWAL, 'YYYY-MM-DD HH24:MI:SS') AS JADWAL,
        A.WAKTU_MULAI, A.WAKTU_SELESAI, A.STATUS_RAPAT,
        R.NAMA AS R_NAMA, P.JUMLAH_PESERTA, P.KEBUTUHAN_RAPAT, P.STATUS_PEMESANAN")
        ->from($info['table'])
        ->join($info['room'],$info['r'].' = R.ID','left')
        ->join('RAPAT_AGENDA A', 'P.AGENDA_RAPAT_ID = A.ID')
        ->where('A.NID_PEMESAN', $userid);
        // search and filter condition
        if($filter['status']) $this->db->like('p.status_pemesanan',$filter['status']);
        if($pencarian) $this->db->like('r.nama',$pencarian);
        // get the data
        $return['data'] = $this->db->limit($limit, ($page-1)*$limit)->get()->result();
    

        return $return;
    }
    function allMobile($zoom, $userid, $page, $limit){
        $info = $this->getTable($zoom);
        $return = [];

        $this->db->select('*')
        ->from($info['table'])
        ->join($info['room'],$info['r'].' = R.ID','left')
        ->join('RAPAT_AGENDA A', 'P.AGENDA_RAPAT_ID = A.ID')
        ->where('A.NID_PEMESAN', $userid);
        // count the data
        $return['total'] = $this->db->count_all_results();

        $this->db->select("P.ID AS PEMESANAN_ID, A.NAMA_PEMESAN
        TO_CHAR(A.JADWAL, 'YYYY-MM-DD HH24:MI:SS') AS JADWAL,
        A.WAKTU_MULAI, A.WAKTU_SELESAI, A.STATUS_RAPAT,
        R.NAMA AS R_NAMA, P.JUMLAH_PESERTA, P.KEBUTUHAN_RAPAT, P.STATUS_PEMESANAN")
        ->from($info['table'])
        ->join($info['room'],$info['r'].' = R.ID','left')
        ->join('RAPAT_AGENDA A', 'P.AGENDA_RAPAT_ID = A.ID')
        ->where('A.NID_PEMESAN', $userid);
        // get the data
        $return['data'] = $this->db->limit($limit, ($page-1)*$limit)->get()->result();
    

        return $return;
    }


    function history($zoom, $pencarian, $filter, $page, $limit){
        $info = $this->getTable($zoom);
        $return  = [];

        $this->db->select('*')
        ->from($info['table'])
        ->join($info['room'],$info['r'].' = R.ID','left')
        ->join('RAPAT_AGENDA A', 'P.AGENDA_RAPAT_ID = A.ID');
        if($filter['status']) $this->db->like('status_pemesanan',$filter['status']);
        // if($pencarian) $this->db->like('ms.nama',$pencarian);
        $return['total'] = $this->db->count_all_results();

        $this->db->select("P.ID AS PEMESANAN_ID, A.NAMA_PEMESAN
        TO_CHAR(A.JADWAL, 'YYYY-MM-DD HH24:MI:SS') AS JADWAL,
        A.WAKTU_MULAI, A.WAKTU_SELESAI, A.STATUS_RAPAT,
        R.NAMA AS R_NAMA, P.JUMLAH_PESERTA, P.KEBUTUHAN_RAPAT, P.STATUS_PEMESANAN")
        ->from($info['table'])
        ->join($info['room'],$info['r'].' = R.ID','left')
        ->join('RAPAT_AGENDA A', 'P.AGENDA_RAPAT_ID = A.ID');
        if($filter['status']) $this->db->like('status_pemesanan',$filter['status']);
        // if($pencarian) $this->db->like('ms.nama',$pencarian);
        $return['data'] = $this->db->limit($limit, ($page-1)*$limit)->get()->result();

        return $return;   
    }

    function detailById($zoom, $id){
        $info = $this->getTable($zoom);

        $final = 
        $this->db->select("P.ID AS PEMESANAN_ID, A.NAMA_PEMESAN
        TO_CHAR(A.JADWAL, 'YYYY-MM-DD HH24:MI:SS') AS JADWAL,
        A.WAKTU_MULAI, A.WAKTU_SELESAI, A.STATUS_RAPAT, A.AGENDA_RAPAT, P.KEBUTUHAN_RAPAT, P.CATATAN_ADMIN
        R.NAMA AS R_NAMA, P.JUMLAH_PESERTA, P.KEBUTUHAN_RAPAT, P.STATUS_PEMESANAN,")
        ->from($info['table'])
        ->join($info['room'],$info['r'].' = R.ID','left')
        ->join('RAPAT_AGENDA A', 'P.AGENDA_RAPAT_ID = A.ID')
        ->where('P.ID', $id)
        ->get()->result();     
        return $final;
    }

    function schedule($zoom, $rid, $jadwal){
        $info = $this->getTable($zoom);
        $return  = [];

        $this->db->select("P.ID AS PEMESANAN_ID, A.JUDUL_RAPAT, A.SUBDIT,
        TO_CHAR(A.JADWAL, 'YYYY-MM-DD HH24:MI:SS') AS JADWAL,
        A.WAKTU_MULAI, A.WAKTU_SELESAI, A.STATUS_RAPAT, R.RID, ".$info['r'])
        ->from($info['table'])
        ->join($info['room'],$info['r'].' = R.ID','left')
        ->join('RAPAT_AGENDA A', 'P.AGENDA_RAPAT_ID = A.ID')
        ->where("TO_CHAR(A.TANGGAL, 'YYYY-MM-DD')", $jadwal);
        if($rid){
            $this->db->where($info['r'], $rid);
        }
        
        $return['data'] = $this->db->get()->result();

        return $return;
    }

    function agenda($subdit, $jadwal){
        $return  = [];

        $this->db->select("A.ID, A.JUDUL_RAPAT, A.SUBDIT,
        TO_CHAR(A.JADWAL, 'YYYY-MM-DD HH24:MI:SS') AS JADWAL,
        A.WAKTU_MULAI, A.WAKTU_SELESAI, A.STATUS_RAPAT, 
        RU.NAMA AS NAMA_RUANGAN, RO.NAMA AS NAMA_ROOM")
        ->from('RAPAT_AGENDA A')
        ->join('RAPAT_PEMESANAN_RUANGAN PU', 'PU.AGENDA_RAPAT_ID = A.ID')
        ->join('RAPAT_MASTER_RUANGAN RU', 'PU.MASTER_RUANGAN_ID = RU.ID')
        ->join('RAPAT_PEMESANAN_RUANGAN PO', 'PO.AGENDA_RAPAT_ID = A.ID')
        ->join('RAPAT_MASTER_ROOM RO', 'PO.MASTER_ROOM_ID = RO.ID')
        ->where("TO_CHAR(A.TANGGAL, 'YYYY-MM-DD')", $jadwal)
        ->where("LOWER(A.SUBDIT)", strtolower($subdit));
        
        $return['data'] = $this->db->get()->result();

        // $info = $this->getTable($zoom);
        // $return  = [];

        // $this->db->select('*')
        // ->from('RAPAT_PEMESANAN_RUANGAN pr')
        // ->join('RAPAT_MASTER_RUANGAN mr','pr.master_ruangan_id = pr.id','left')
        // ->where('pr.divisi', $subdit)
        // ->where('pr.tanggal', $jadwal);
        // $return['ruangan'] = $this->db->get()->result();

        // $this->db->select('*')
        // ->from('RAPAT_PEMESANAN_ROOM pr')
        // ->join('RAPAT_MASTER_ROOM mr','pr.master_room_id = pr.id')
        // ->where('pr.divisi', $subdit)
        // ->where('pr.tanggal', $jadwal);
        // $return['room'] = $this->db->get()->result();

        return $return;
    }

    function forApproval($zoom, $page, $limit){
        $info = $this->getTable($zoom);
        $return = [];

        $this->db->select('*')
        ->from($info['table'])
        ->join($info['room'],$info['r'].' = R.ID','left')
        ->join('RAPAT_AGENDA A', 'P.AGENDA_RAPAT_ID = A.ID')
        ->where('P.PERSETUJUAN_ADMIN', null);
        $return['total'] = $this->db->count_all_results();    

        $this->db->select("P.ID AS PEMESANAN_ID, A.NAMA_PEMESAN
        TO_CHAR(A.JADWAL, 'YYYY-MM-DD HH24:MI:SS') AS JADWAL,
        A.WAKTU_MULAI, A.WAKTU_SELESAI, A.STATUS_RAPAT,
        R.NAMA AS R_NAMA, P.JUMLAH_PESERTA, P.KEBUTUHAN_RAPAT")
        ->from($info['table'])
        ->join($info['room'],$info['r'].' = R.ID','left')
        ->join('RAPAT_AGENDA A', 'P.AGENDA_RAPAT_ID = A.ID')
        ->where('P.PERSETUJUAN_ADMIN', null);
        $return['data'] = $this->db->limit($limit, ($page-1)*$limit)->get()->result();    
        
        return $return;
    }

    /**
     * POST
     */

    function createAgenda($agenda){
        $tanggal = $agenda['tanggal'];

        $this->db->set('JUDUL_RAPAT', $agenda['judul_rapat']);
        $this->db->set('TANGGAL', "TO_DATE('$tanggal','YYYY-MM-DD')");
        $this->db->set('WAKTU_MULAI', $agenda['waktu_mulai']);
        $this->db->set('WAKTU_SELESAI', $agenda['waktu_selesai']);
        $this->db->set('STATUS_RAPAT', $agenda['status_rapat']);
        $this->db->set('AGENDA_RAPAT', $agenda['agenda_rapat']);
        $this->db->set('DURASI', $agenda['durasi']);
        $this->db->set('NID_PEMESAN', $agenda['nid_pemesan']);
        $this->db->set('NAMA_PEMESAN', $agenda['nama_pemesan']);
        $this->db->set('SUBDIT', $agenda['subdit']);

        if(!$this->db->insert('RAPAT_AGENDA')){
            $error = $this->db->error();
            return $error;
        };
        $last = $this->db->select('ID')->order_by('ID',"DESC")->limit(1)->get('RAPAT_AGENDA')->result();
        $id = $last[0]->ID;

        return $id;
    }

    function create($data, $agendaid, $zoom){
        $timestamp = date("Y-m-d H:i:s");

        $this->db->set('AGENDA_RAPAT_ID', $agendaid);
        if($zoom == false) {
            $table = 'RAPAT_PEMESANAN_RUANGAN';   
            $this->db->set('MASTER_RUANGAN_ID', $data['master_ruangan_id']);
            $this->db->set('JUMLAH_PESERTA', $data['jumlah_peserta']);
            $this->db->set('KONSUMSI', $data['konsumsi']);
            $this->db->set('KEBUTUHAN_RAPAT', $data['kebutuhan_rapat']);
            $this->db->set('STATUS_PEMESANAN', $data['status_pemesanan']);
        }
        else{
            $table = 'RAPAT_PEMESANAN_ROOM';
            $this->db->set('MASTER_ROOM_ID', $data['master_room_id']);
            $this->db->set('JUMLAH_PESERTA', $data['jumlah_peserta']);
            $this->db->set('KEBUTUHAN_RAPAT', $data['kebutuhan_rapat']);
            $this->db->set('STATUS_PEMESANAN', $data['status_pemesanan']);
        } 
        
        $this->db->set('CREATED_AT',"TO_DATE('$timestamp','YYYY-MM-DD HH24:MI:SS')", false);
        if(!$this->db->insert($table)){
            $error = $this->db->error();
            return $error;
        };
        return true;
    }


    /**
     * PUT
     */
    function reschedule($pemesananid, $zoom, $jadwal){
        if($zoom == false) $table = 'RAPAT_PEMESANAN_RUANGAN';
        else $table = 'RAPAT_PEMESANAN_ROOM';

        $timestamp = date("Y-m-d H:i:s");
        $tanggal = $jadwal['tanggal'];
        
        $pemesanan = $this->db->get_where($table, array('ID' => $id))->result();
        $agendaid = $pemesanan[0]->AGENDA_RAPAT_ID;

        if(!empty($pemesanan)){
            $this->db->set('TANGGAL', "TO_DATE('$tanggal','YYYY-MM-DD')");
            $this->db->set('WAKTU_MULAI', $jadwal['waktu_mulai']);
            $this->db->set('WAKTU_SELESAI', $jadwal['waktu_selesai']);
            $this->db->set('DURASI', $jadwal['durasi']);
            $this->db->where('ID', $agendaid);
            if(!$this->db->update('RAPAT_AGENDA')){
                $error = $this->db->error();
                return $error;
            };

            $this->db->set('PERSETUJUAN_ADMIN', NULL);
            $this->db->set('CATATAN_ADMIN', NULL);
            $this->db->set('STATUS_PEMESANAN', 'Menunggu');
            $this->db->set('NOTIF_READ', NULL);
            $this->db->set('CREATED_AT',"TO_DATE('$timestamp','YYYY-MM-DD HH24:MI:SS')", false);
            $this->db->set('LAST_UPDATE_AT', NULL);
            $this->db->where('ID', $pemesananid);
            if(!$this->db->update($table)){
                $error = $this->db->error();
                return $error;
            };
            
            return true;
        }

        return false;
    }

    function approve($id, $zoom, $catatan){
        $timestamp = date("Y-m-d H:i:s");
        if($zoom == false) $table = 'RAPAT_PEMESANAN_RUANGAN';
        else $table = 'RAPAT_PEMESANAN_ROOM';

        $res = $this->db->get_where($table, array('ID' => $id))->result();
        if(!empty($res)){
        
            $this->db->set('PERSETUJUAN_ADMIN', TRUE);
            $this->db->set('CATATAN_ADMIN', $catatan);
            $this->db->set('STATUS_PEMESANAN', 'Disetujui');
            $this->db->set('NOTIF_READ', 0);
            $this->db->set('LAST_UPDATE_AT',"TO_DATE('$timestamp','YYYY-MM-DD HH24:MI:SS')", false);
            $this->db->where('ID', $id);

            if(!$this->db->update($table)){
                $error = $this->db->error();
                return $error;
            };
            return true;
            
            
        }
        
        return array('status' => false, 'msg' => 'Data pemesanan tidak ditemukan');
    }

    function refuse($id, $zoom, $alasan){
        $timestamp = date("Y-m-d H:i:s");
        if($zoom == false) $table = 'RAPAT_PEMESANAN_RUANGAN';
        else $table = 'RAPAT_PEMESANAN_ROOM';

        $res = $this->db->get_where($table, array('ID' => $id))->result();
        if(!empty($res)){
            
            $this->db->set('PERSETUJUAN_ADMIN', FALSE);
            $this->db->set('CATATAN_ADMIN', $alasan);
            $this->db->set('STATUS_PEMESANAN', 'Ditolak');
            $this->db->set('NOTIF_READ', 0);
            $this->db->set('LAST_UPDATE_AT',"TO_DATE('$timestamp','YYYY-MM-DD HH24:MI:SS')", false);
            $this->db->where('ID', $id);

            if(!$this->db->update('mfacilities_pemesanan_kendaraan', $pemesanan)){
                $error = $this->db->error();
                return $error;
            };
            return true;
            
        }
        
        return false;
    }

    function rating($zoom, $id, $rate, $comment){
        $timestamp = date("Y-m-d H:i:s");
        if($zoom == false) $table = 'RAPAT_PEMESANAN_RUANGAN';
        else $table = 'RAPAT_PEMESANAN_ROOM';

        $res = $this->db->get_where($table, array('ID' => $id))->result();
        if(!empty($res)){

            $this->db->set('RATING', $rate);
            $this->db->set('KOMENTAR', $comment);
            $this->db->set('LAST_UPDATE_AT',"TO_DATE('$timestamp','YYYY-MM-DD HH24:MI:SS')", false);
            $this->db->where('ID', $id);

            if(!$this->db->update($table)){
                $error = $this->db->error();
                return $error;
            };
            
            return true;
        }
        return false;
    }

}
