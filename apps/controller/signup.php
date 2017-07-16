<?php
class Signup extends SENE_Controller{
    var $status = 'ok';

	public function __construct(){
    parent::__construct();
		$this->lib("SENE_JSON_Engine","lib");
    $this->load("m_pengguna");
	}
  public function index(){
		$sess = $this->getKey();
    $data = array();
    $data['res'] = "";
		$data['sess'] = $sess;
    if (isset($sess['user'])) {
      redir(base_url(""));
      die();
    } else {
      if ($this->input->post("submit")) {
        $name_first = $this->input->post("name_first");
        $name_last = $this->input->post("name_last");
        $kelas = $this->input->post("s_kelas");
        $email = $this->input->post("email");
    		$password = $this->input->post("password");
    		$active = "1";
          if ($this->m_pengguna->check($email) == 0) {
            $res = $this->m_pengguna->set($name_first,$name_last,$email,$password,$kelas,$active);
            if (count($res)==1) {
              $data["res"] = "berhasil";
              $this->view("frontend/__header",$data);
        			$this->view("frontend/signup/__nav",$data);
        			$this->view("frontend/signup/signup",$data);
        			$this->view("frontend/__bottom",$data);
        			$this->view("frontend/__footer",$data);
            } else {
              $data["res"] = "gagal";
              $this->view("frontend/__header",$data);
        			$this->view("frontend/signup/__nav",$data);
        			$this->view("frontend/signup/signup",$data);
        			$this->view("frontend/__bottom",$data);
        			$this->view("frontend/__footer",$data);
            }
          } else {
            $data['warn'] = 'Email Telah Terdaftar';
      			$this->view("frontend/__header",$data);
      			$this->view("frontend/signup/__nav",$data);
      			$this->view("frontend/signup/signup",$data);
      			$this->view("frontend/__bottom",$data);
      			$this->view("frontend/__footer",$data);
          }
      } else {
        $this->view("frontend/__header",$data);
        $this->view("frontend/signup/__nav",$data);
        $this->view("frontend/signup/signup",$data);
        $this->view("frontend/__bottom",$data);
        $this->view("frontend/__footer",$data);
      }
    }
	}

  public function create(){
		//$this->debug($_POST);
		$data = array();
		$data['res'] = "";
    // $this->site_config->current_page="customer/account/create";
		// $data['site_config'] = $this->site_config;
		$sess = $this->getKey();
		if(!is_object($sess)) $sess = new stdClass();
		if(isset($sess->user->id)){
			redir(base_url("home"));
			die();
		}
		if(!isset($sess->user)){
			$sess->user = new stdClass();
		}
		$submit = $this->input->post("submit");
		if(!empty($submit)){
      $name_first = $this->input->post("name_first");
      $name_last = $this->input->post("name_last");
      $kelas = $this->input->post("s_kelas");
      $email = $this->input->post("email");
      $password = $this->input->post("password");
      $active = 1;

      $res = $this->m_pengguna->set($name_first,$name_last,$email,$password,$kelas,$active);

			// $confirm_code = unique_id();
			//$this->debug($_POST);
			//die();
			// $user_id = $this->mb_users->set($role_id,$website_view_id,$billing_address_id,$shipping_address_id,$email,$password,$name_first,$name_last,$utype,$bdate,$bcity,$confirm_code,$phone,$bbm_pin,$is_active,$is_confirmed);
			//var_dump($user_id);
			//die();
			if($user_id>0){
				$set  = $this->mb_user_addresses->set($user_id,"null",$utype,$address,$district,$city,$region,$country,$postal_code,$jne_code,$phone,$email);



				$user = $this->mb_users->getByIdCustomer($user_id,"frontend");
				$user = $user[0];
				$user_confirm_code = $user->confirm_code;
				$user_confirm_url = base_url("k/s/").$user_confirm_code;
				$user_email = $user->email;
				$user_phone = $user->phone;

				$notif_sms = $this->mc_notif_templates->getByName("customer-account-cofirmation-sms");
				$notif_sms = $notif_sms[0];
				//$this->debug($notif_sms);
				//die();
				$notif_sms_content = $notif_sms->content;
				$notif_sms_content = str_replace('$confirmation_code$', $user_confirm_code, $notif_sms_content);
				$notif_sms_content = str_replace('$confirmation_url$', $user_confirm_url, $notif_sms_content);
				//$this->debug($notif_sms_content);
				//die();
				$this->SMS_Alaska->sendSms($user_phone,$notif_sms_content);

				$notif_email = $this->mc_notif_templates->getByName("customer-account-cofirmation-email","email");
				$notif_email = $notif_email[0];
				$notif_email_content = $notif_email->content;
				$notif_email_content = str_replace('$name_first$', $user->name_first, $notif_email_content);
				$notif_email_content = str_replace('$confirmation_code$', $user_confirm_code, $notif_email_content);
				$notif_email_content = str_replace('$confirmation_url$', $user_confirm_url, $notif_email_content);

				$this->Sene_Email_Sender->from($notif_email->sender,$notif_email->sender);
				$this->Sene_Email_Sender->subject("Konfirmasi Pendaftaran");
				$this->Sene_Email_Sender->to($user_email);
				$this->Sene_Email_Sender->text($notif_email_content);
				$this->Sene_Email_Sender->send();
				//$user = $this->mb_users->getById($set);
				//$user = $user[0];
				//$sess->user = $user;
				//$this->setKey($sess);
				$data["res"] = "berhasil";
			}else{
				$data["res"] = "gagal";
			}
		}
		$data['sess']=$sess;
		$this->view("frontend/header_login",$data);
		$this->view("frontend/nav_login",$data);
		$this->view("frontend/customer/account/create",$data);
		$this->view("frontend/customer/account/create/bottom",$data);
		$this->view("frontend/footer_login",$data);
	}

	private function __out($data){
	   $res = array('status'=>$this->status,'post' => $data);
	   $this->SENE_JSON_Engine->out($res);
	}

}
?>
