<?php
class Logout extends SENE_Controller{
    var $status = 'ok';

	public function __construct(){
    parent::__construct();
		$this->lib("SENE_JSON_Engine","lib");
	}
	public function index(){
		$sess = $this->getKey();
		if(isset($sess['admin'])){
			$sess['admin'] = null;
			$this->setKey($sess);
		}
		redir("login");
	}

	private function __out($data){
	   $res = array('status'=>$this->status,'post' => $data);
	   $this->SENE_JSON_Engine->out($res);
	}

}
?>
