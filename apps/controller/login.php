<?php
class Login extends SENE_Controller{
    var $status = 'ok';

	public function __construct(){
    parent::__construct();
		$this->lib("SENE_JSON_Engine","lib");
	}
	public function index(){
		$sess = $this->getKey();
		$data = array();
		$data['sess'] = $sess;
		if(!is_array($sess)){
			$sess = array();
		}
		if(isset($sess['user']->id)){
      $this->view("frontend/home/__header",$data);
			$this->view("frontend/home/__nav",$data);
			$this->view("frontend/home/home",$data);
			$this->view("frontend/home/__bottom",$data);
			$this->view("frontend/home/__footer",$data);
		}else{
      //buathalaman login & signup popup
      //jadi ini untuk sementara dulu
      // redir(base_url("login"));
      $this->view("frontend/home/__header",$data);
			$this->view("frontend/home/__nav",$data);
			$this->view("frontend/home/home",$data);
			$this->view("frontend/home/__bottom",$data);
			$this->view("frontend/home/__footer",$data);
		}
	}

	private function __out($data){
	   $res = array('status'=>$this->status,'post' => $data);
	   $this->SENE_JSON_Engine->out($res);
	}

}
?>
