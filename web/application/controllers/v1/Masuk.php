<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/RestController.php';
require APPPATH . '/libraries/Format.php';

use libraries\RestServer\RestController;
use Firebase\JWT\JWT;

class Masuk extends RestController {

    function __construct(){
		parent::__construct();
		$this->load->model('users_model');
		$this->id_aplikasi = 55;
	}

	function index_post(){
		if ($this->input->post('nid') && $this->input->post('password')) {
			$nid = $this->input->post('nid');
			$password = $this->input->post('password');

			//CHECK SOPIR ADA APA ENGGAK
			
			if($this->input->post('sopir')){
				var_dump('LOGIN SOPIR');
				// $response = $this->customLogin(true, $nid, $password);
				
			}
			else{
				$response = $this->portalAuthenticate($nid, $password);
				if($response->RESPONSE == '1'){
					$respon = $this->set_token($response);
					$return = [
						'status' => true,
						'token' => $respon['token'],
						'data' => $respon['data'],
						'redirect' => base_url('dashboard')
					];
				}elseif($response->RESPONSE == "PAGE"){
					$return = [
						'status' => true,
						'response' => 'page',
						'redirect' => 'http://portal.pjbservices.com/'.$response->RESPONSE_LINK.'/?reqNID='.$response->NID.'&reqAplikasiId='.$response->APLIKASI_ID
					];
				}else{
					$return = [
						'status' => false,
						'response' => $response->RESPONSE_MESSAGE
					];
					$this->response($return ,RestController::HTTP_UNAUTHORIZED);
				}
				$this->response($return ,RestController::HTTP_OK);
			}



			
		}else{
			$this->load->view('pages/masuk');
		}
	}

    // Soap Auth to portal pjbs
	function portalAuthenticate($nid, $password)
	{
		ini_set ('soap.wsdl_cache_enabled', 0);
		$wsdl = 'http://portal.pjbservices.com/index.php/portal_login?wsdl';
		$cl = new SoapClient($wsdl);
		return $cl->loginAplikasi($this->id_aplikasi, $nid, $password);
	
	}

    // Set token for frontend and session for backend
	private function set_token($respon){
		$levels = [
			'1' => 'SUPER ADMIN',
			'3' => 'MANAJER DIVISI',
			'4' => 'ADMIN KENDARAAN',
			'6' => 'USER',
			'7' => 'ADMIN ATK',
			'8' => 'ADMIN PEMELIHARAAN',
			'9' => 'ADMIN RUANG RAPAT',
			'10' => 'ADMIN E_MEETING',
			'11' => 'ADMIN ARSIP',
			'12' => 'ADMIN INVENTARIS',
        ];
        
		$nid_user = $respon->NID;
		$nama_user = $respon->PEGAWAI;
		$id_subdit = $respon->SUBDIT;
		$nama_subdit = $respon->SUBDIT_DESC;        
		$issuedat_claim = time(); // issued at
		// $notbefore_claim = $issuedat_claim + 10; //not before in seconds
		$expire_claim = $issuedat_claim + 3600; // expire time in seconds
        
		$dataUser = [
			'nid_user' => $nid_user,
			'nama_user' => $nama_user,
			'id_subdit' => $id_subdit,
			'nama_subdit' => $nama_subdit,
			'id_level' => $respon->KODE_GROUP,
			'level' => $levels[$respon->KODE_GROUP]
		];
		$token = [
			'nid_user' => $nid_user,
			'nama_user' => $nama_user,
			'id_subdit' => $id_subdit,
			'nama_subdit' => $nama_subdit,
			'id_level' => $respon->KODE_GROUP,
			'level' => $levels[$respon->KODE_GROUP],
			'iat' => $issuedat_claim,
			'exp' => $expire_claim
		];

		$tokenUser = JWT::encode($token, $this->config->item('encryption_key'));
		$this->session->set_userdata('nid', $nid_user);
		$this->session->set_userdata('level', $respon->KODE_GROUP);
		$this->session->set_userdata('info', [
			'nama_user' => $nama_user,
			'id_subdit' => $id_subdit,
			'nama_subdit' => $nama_subdit,
			'level' => $levels[$respon->KODE_GROUP]
		]);

		return [
			'token' => $tokenUser,
			'data' => $dataUser,
		];

	}

	function autologin_get(){
		$reqGroupId = $this->input->get("reqGroupId");
		if($reqGroupId == ""){
			$respon = $this->autoAuthenticate($_GET['reqUser'],$_GET['reqToken']);
		}else{
			$respon = $this->autoGroupAuthenticate($_GET['reqUser'],$_GET['reqToken'], $reqGroupId);
		}		

		if($respon->RESPONSE == "1"){
			header('Content-Type: application/json');
			$res = $this->set_token($respon);
			$return = [
				'status' => true,
				'token' => $res['token'],
				'data' => $res['data'],
				'redirect' => base_url('dashboard')
			];
		}elseif($respon->RESPONSE == "PAGE"){
			?>
			<script>
				top.location.href = 'http://portal.pjbservices.com/<?php echo $respon->RESPONSE_LINK; ?>/?reqNID=<?php echo $respon->NID; ?>&reqAplikasiId=<?php echo $respon->APLIKASI_ID; ?>';
			</script>
			<?php
		}else{
			$return = [
				'status' => false,
				'msg' => 'Login gagal, credentials salah.',
				'redirect' => base_url('login')
			];
			$this->response($return ,RestController::HTTP_UNAUTHORIZED);
		}
		
		$this->response($return ,RestController::HTTP_OK);
	}

	function autoAuthenticate($username, $password)
	{
		ini_set ('soap.wsdl_cache_enabled', 0);
		$wsdl = 'http://portal.pjbservices.com/index.php/portal_login?wsdl';

		$cl = new SoapClient($wsdl);
		return $cl->loginToken($this->id_aplikasi, $username, $password);
	}

	function autoGroupAuthenticate($username, $password, $groupId)
	{
		ini_set ('soap.wsdl_cache_enabled', 0);
		$wsdl = 'http://portal.pjbservices.com/index.php/portal_login?wsdl';

		$cl = new SoapClient($wsdl);
		return $cl->loginGroup($this->id_aplikasi, $username, $password, $groupId);
	}





	function customLogin($sopir, $nid, $password){
		$levels = [
			'1' => 'admin',
			'2' => 'manajer',
			'3' => 'user',
			'4' => 'sopir',
        ];
		if($sopir == true){
			$login = $this->users_model->sopirLogin($nid);
			$level = 'sopir';
		}
		else{
			$login = $this->users_model->userLogin($nid);
			$level = $levels[$login->KODE_GROUP];
		}
		
        if(password_verify($password, $login['password']))
        {
			$secret_key = $this->config->item('encryption_key');
			$date = new DateTime();
            $issuedat_claim = $date->getTimestamp();
			$expire_claim = $date->getTimestamp() + 60*60*1; // expire time in seconds
			$this->session->set_userdata('id', $login['nid'],);
			$this->session->set_userdata('id', $sopir == false ? $login['divisi'] : null);

            $token = array(
                'iat' => $issuedat_claim,
                'exp' => $expire_claim,
                'data' => array(
                    'id' => $login['id'],
                    'nid' => $login['nid'],
					'nama' => $login['nama'],
					'level' => $level,
					'divisi' => $sopir == false ? $login['divisi'] : null
                )
			);

            $token = JWT::encode($token, $this->config->item('encryption_key'));

            $output = [
                'status' => 200,
                'message' => 'Berhasil login',
                "token" => $token,
                "sess" => $token['data'],
                "expireAt" => $expire_claim
            ];
            return $output;
        } else {
            $output = [
                'status' => 401,
                'message' => 'Login failed',
                "password" => $password
            ];
            return $output;
        }
	}

}