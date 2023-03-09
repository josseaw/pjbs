<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/RestController.php';
require APPPATH . '/libraries/Format.php';

use libraries\RestServer\RestController;

class Pemesanan extends RestController {
    
    function __construct(){
        parent::__construct();
        $this->load->model('rapat/pemesanan_model');

        $this->nid = 1;
        $this->nama = 'Khabib Nurmagomedov';
        $this->subdit = 'Divisi IT';
        $this->level = 3;

    }
    
    public function index_get(){
        $id = $this->get('id'); // ID pemesanan
        $userid = 1; // ID dari user/manajer/admin nanti diget lewat creds
        $cari = $this->get('q'); // Search query
        $filter = array(
            'status' => $this->get('status') // Filter status
        );
        $zoom = $this->get('zoom');

        
        $page = $this->get('page');
        if($page === null) $page = 1;
        $limit = 10;

        if($id === null){   
            if($userid <= 0){
                $this->response(NULL, RestController::HTTP_BAD_REQUEST);
            }
            // Mendapatkan data pemesanan User/Manajer/Admin
            else{
                $data = $this->pemesanan_model->all($zoom, $userid, $cari, $filter, $page, $limit);
                if(empty($data['data'])){
                    $this->response([
                        'status'  => true,
                        'message' => 'Tidak ada pemesanan...',
                        'totalData' => 0,
                        'totalPage' => 0,
                        'pemesanan' => []
                    ], RestController::HTTP_OK);
                }
                $this->response([
                    'status' => true,
                    'message' => 'Data pemesanan anda',
                    'totalData' => $data['total'],
                    'totalPage' => ceil($data['total']/$limit),
                    'page'      => $page,
                    'pemesanan' => $data['data']
                ], RestController::HTTP_OK);
            }
        }
        // Mendapatkan detail data pemesanan berdasarkan ID
        else{
            if($id <= 0){
                $this->response(NULL, RestController::HTTP_BAD_REQUEST);
            }
            else{
                $data = $this->pemesanan_model->detailById($zoom, $id);
                // Data tidak ditemukan
                if(empty($data)){
                    $this->response([
                        'status'  => true,
                        'message' => 'Tidak ada data pemesanan yang ditemukan...',
                        'pemesanan' => []
                    ], RestController::HTTP_OK);
                }
                $this->response([
                    'status' => true,
                    'message' => 'Data pemesanan tersedia',
                    'pemesanan'    => $data[0]
                ], RestController::HTTP_OK);
            }
        }
    }

    public function riwayat_get(){
        $page = $this->get('page');
        $cari = $this->get('q'); // Search query
        $filter = array(
            'status' => $this->get('status') // Filter status
        );
        $zoom = $this->get('zoom');

        if($page === null) $page = 1;
        $limit = 10;

        $data = $this->pemesanan_model->history($zoom, $cari, $filter, $page, $limit);
        if(empty($data['data'])){
            $this->response([
                'status'  => true,
                'message' => 'Tidak ada pemesanan...',
                'totalData' => 0,
                'totalPage' => 0,
                'pemesanan' => []
            ], RestController::HTTP_OK);
        }
        $this->response([
            'status' => true,
            'message' => 'Data pemesanan anda',
            'totalData' => $data['total'],
            'totalPage' => ceil($data['total']/$limit),
            'page'      => $page,
            'pemesanan' => $data['data']
        ], RestController::HTTP_OK);
    }

    public function persetujuan_get(){
        $zoom = $this->get('zoom');
        $page = $this->get('page');
        if($page === null) $page = 1;
        $limit = 10;
        
        
        $data = $this->pemesanan_model->forApproval($zoom, $page, $limit);
        if(empty($data['data'])){
            $this->response([
                'status'  => true,
                'message' => 'Tidak ada pemesanan yang perlu disetujui atau ditolak',
                'totalData' => 0,
                'totalPage' => 0,
                'pemesanan' => []
            ], RestController::HTTP_OK);
        }
        $this->response([
            'status' => true,
            'message' => 'Data pemesanan yang perlu disetujui atau ditolak',
            'totalData' => $data['total'],
            'totalPage' => ceil($data['total']/$limit),
            'page'      => $page,
            'pemesanan' => $data['data']
        ], RestController::HTTP_OK);
    }

    public function jadwal_get(){
        $zoom = $this->get('zoom');
        $rid = $this->get('rid');
        $jadwal = date('Y-m-d', strtotime($this->get('tanggal')));
        $data = $this->pemesanan_model->schedule($zoom, $rid, $jadwal);
        $this->response([
            'status' => true,
            'message' => 'Jadwal hari ini',            
            'jadwal' => $data['data'],
        ], RestController::HTTP_OK);
    }

    public function agenda_get(){
        // $zoom = $this->get('zoom');
        $jadwal = date('Y-m-d', strtotime($this->get('tanggal')));
        $subdit = 'Wakul';
        $data = $this->pemesanan_model->agenda($subdit, $jadwal);
        $this->response([
            'status' => true,
            'message' => 'Agenda hari ini',            
            'ruangan' => $data['ruangan'],
            'room' => $data['room']
        ], RestController::HTTP_OK);
    }

    public function create_post(){
        $zoom = $this->post('zoom');

        $create = null; $create2 = null;
        $durasi = abs(strtotime($this->post('waktu_selesai')) - strtotime($this->post('waktu_mulai')))/60;
        
        $agenda = [
            'judul_rapat' => $this->post('judul'),
            'tanggal' => date('Y-m-d', strtotime($this->post('jadwal'))),
            'waktu_mulai' => $this->post('waktu_mulai'),
            'waktu_selesai' => $this->post('waktu_selesai'),
            'status_rapat' => $this->post('status_rapat'),
            'agenda_rapat' => $this->post('agenda_agenda'),
            'durasi' => $durasi/60,
            'nid_pemesan' => $this->nid,
            'nama_pemesan' => $this->nama,
            'subdit' => $this->subdit,
        ];

        $agendaid = $this->pemesanan_model->createAgenda($agenda);

        if($zoom == false){
            $ruangan = [
                'master_ruangan_id' => $this->post('ruangan_id'),
                'jumlah_peserta' => $this->post('peserta_ruangan'),
                'konsumsi' => $this->post('konsumsi'),
                'kebutuhan_rapat' => $this->post('kebutuhan_ruangan'),
                'status_pemesanan' => 'Menunggu',
            ];
            $create = $this->pemesanan_model->create($ruangan, $agendaid, false);

            if($this->post('room_id')){
                $room = [
                    'master_room_id' => $this->post('room_id'),
                    'jumlah_peserta' => $this->post('peserta_room'),
                    'kebutuhan_rapat' => $this->post('kebutuhan_room'),
                    'status_pemesanan' => 'Menunggu',
                ];
                $create2 = $this->pemesanan_model->create($room, $agendaid, true);
            }

        }
        else if($zoom == true){
            $room = [
                'master_room_id' => $this->post('room_id'),
                'jumlah_peserta' => $this->post('peserta_room'),
                'kebutuhan_rapat' => $this->post('kebutuhan_room'),
            ];
            $create = $this->pemesanan_model->create($room, $agendaid, true);

            if($this->post('ruangan_id')){
                $ruangan = [
                    'master_ruangan_id' => $this->post('ruangan_id'),
                    'jumlah_peserta' => $this->post('peserta_ruangan'),
                    'konsumsi' => $this->post('konsumsi'),
                    'kebutuhan_rapat' => $this->post('kebutuhan_ruangan'),
                ];
                $create2 = $this->pemesanan_model->create($ruangan, $agendaid, false);
            }
        }

        if($create === true){
            $this->response([
                'status'  => true,
                'message' => 'Pemesanan berhasil dibuat',
            ], RestController::HTTP_CREATED);    
        }
        else if(array_key_exists('code', $create)){
            if($create['code'] == 1452) $msg = 'Ruangan/Room yang dipilih tidak ada di database';
            $this->response([
                'status'  => false,
                'message' => 'Data tidak berhasil ditambahkan, '.$msg,
            ], RestController::HTTP_BAD_REQUEST);    
        }
    }

    public function jadwal_ulang_put(){
        $pemesananid = $this->put('id');
        $zoom = $this->put('zoom');
        $jadwal = [
            'tanggal' => date('Y-m-d', strtotime($this->put('jadwal'))),
            'waktu_mulai' => $this->put('mulai'),
            'waktu_selesai' => $this->put('selesai'),
            'durasi' => abs(strtotime($this->put('waktu_selesai')) - strtotime($this->put('waktu_mulai')))/60,
        ];
        $status = $this->pemesanan_model->reschedule($pemesananid, $zoom, $jadwal);
        if($status === true){
            $this->response([
                'status'  => true,
                'message' => 'Berhasil dijadwal ulang',
            ], RestController::HTTP_OK);    
        }
        else if($status === false){
            $this->response([
                'status'  => false,
                'message' => 'Gagal melakukan jadwal ulang',
            ], RestController::HTTP_BAD_REQUEST);    
        }
        else if(array_key_exists('code', $status)){
            $msg = null;
            $this->response([
                'status'  => false,
                'message' => 'Data tidak berhasil ditambahkan, '.$msg,                
            ], RestController::HTTP_BAD_REQUEST);    
        }
    }

    public function persetujuan_put(){
        $id = $this->put('id');
        $zoom = $this->put('zoom');
        $catatan = $this->put('catatan');

        $status = $this->pemesanan_model->approve($id, $zoom, $catatan);
        if($status === true){
            $this->response([
                'status'  => true,
                'message' => 'Berhasil disetujui',
            ], RestController::HTTP_OK);    
        }
        else if(array_key_exists('status', $status)){
            $this->response([
                'status'  => false,
                'message' => $status['msg'],
            ], RestController::HTTP_BAD_REQUEST);    
        }
        else if(array_key_exists('code', $status)){
            $msg = null;
            $this->response([
                'status'  => false,
                'message' => 'Data tidak berhasil diperbarui, '.$msg,                
            ], RestController::HTTP_BAD_REQUEST);    
        }
    }

    public function penolakan_put(){
        $id = $this->put('id');
        $zoom = $this->put('zoom');
        $alasan = $this->put('alasan');

        $status = $this->pemesanan_model->refuse($id, $zoom, $alasan);
        if($status === true){
            $this->response([
                'status'  => true,
                'message' => 'Pemesanan berhasil ditolak',
            ], RestController::HTTP_OK);    
        }
        else if($status === false){
            $this->response([
                'status'  => false,
                'message' => 'Data pemesanan tidak ditemukan',
            ], RestController::HTTP_BAD_REQUEST);    
        }
    }

    public function rating_put(){
        $id = $this->put('id'); // ID Pemesanan
        $rate = $this->put('rate');
        $comment = $this->put('komentar');
        $zoom = $this->put('zoom');
        $status = $this->pemesanan_model->rating($zoom, $id, $rate, $comment);
        if($status === true){
            $this->response([
                'status'  => true,
                'message' => 'Penilaian anda berhasil',
            ], RestController::HTTP_OK);    
        }
        else if($status === false){
            $this->response([
                'status'  => false,
                'message' => 'Data pemesanan tidak ditemukan',
            ], RestController::HTTP_BAD_REQUEST);    
        }
    }

    private function validation_rules($data, $id){
        $this->form_validation->set_rules('nama', 'Nama room', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_data($data);
    }

}

