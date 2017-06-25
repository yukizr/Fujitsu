
<?php
	class Pelajaran extends SENE_Controller{
		var $status = 0;

		public function __construct(){
			parent::__construct();
			$this->lib("SENE_JSON_Engine","lib");
			$this->load("m_pelajaran");
      // $this->lib("Seme_Image","lib");
		}

		public function index($orderby="id",$asc=0,$page=1){
			$sess = $this->getKey();
			if(!is_array($sess)){
				$sess = array();
			}
			if(isset($sess['admin'])){
				$data['sess'] = $sess;
				if(empty($page)){
					$page=1;
				}
				if(empty($orderby)) $orderby="id";
				if(!empty($asc)){
					$asc = "1";
					}else{
					$asc = "0";
				}
				if(!empty($_REQUEST['keyword'])){
					$keyword=$_REQUEST['keyword'];
				}
				else{
					$keyword="";
				}
				$data['keyword']=$keyword;
				$data['asc'] = $asc;
				//$data['is_rollback'] = $is_rollback;
				$data['orderby'] = $orderby;
				$data['pelajaran'] = $this->m_pelajaran->getOffset($orderby,$asc,$page,$keyword);
				$data['row'] = $this->m_pelajaran->getCount();
				$data['page'] = $page;
				$this->view("backend/__header",$data);
				$this->view("backend/__nav",$data);
        $this->view("backend/pelajaran/pelajaran",$data);
				$this->view("backend/pelajaran/__bottom",$data);
				$this->view("backend/__footer",$data);
			}
			else{
        $data['sess'] = $sess;
        $this->view("frontend/pelajaran/__header",$data);
        $this->view("frontend/pelajaran/__nav",$data);
        $this->view("frontend/pelajaran/pelajaran",$data);
        $this->view("frontend/pelajaran/__bottom",$data);
        $this->view("frontend/pelajaran/__footer",$data);
			}
		}

    public function create(){
			$sess = $this->getKey();
			if(!is_array($sess)){
				$sess = array();
			}
			if(isset($sess['user']->id)){
        $data['sess'] = $sess;
				$this->view("backend/__header",$data);
				$this->view("backend/__nav",$data);
				$this->view("backend/pelajaran/create");
				$this->view("backend/pelajaran/create/bottom");
				$this->view("backend/__footer");
			}else{
				redir(base_url("login"));
			}
		}

    // upload by sene_uploader
    public function input(){
			$url = base_url("assets/img/pelajaran/");
		  if($this->input->post('submit')){
        $this->lib("SENE_Uploader","lib");
  			$mapel = $this->input->post('mapel');
  			$judul = $this->input->post('judul');
				$gambar = $this->SENE_Uploader->upload($this->img_katalog,"gambar",$res);
  			$dialog_1 = $this->input->post('dialog_1');
  			$dialog_2 = $this->input->post('dialog_2');
				$res = $this->m_pelajaran->set($mapel,$judul,$gambar,$dialog_1,$dialog_2);
  			header("location:".base_url("pelajaran/"));
			}
			   else{}
		}



		public function editaction($id){
			//var_dump($id);
			//die('editaction');
			if($submit = $this->input->post('submit')){
				$data['notif'] = "";
				if (!empty($submit)) {
					$id = $id;
          $mapel = $this->input->post('mapel');
    			$judul = $this->input->post('judul');
    			$gambar = $this->input->post('gambar');
    			$dialog_1 = $this->input->post('dialog_1');
    			$dialog_2 = $this->input->post('dialog_2');

					$res = $this->mt_kumpulkupon->update($id,$mapel,$judul,$gambar,$dialog_1,$dialog_2);

					if ($res) {
						$data['notif'] = "berhasil";
					} else {
						$data['notif'] = "berhasil";
					}
				}
				header("location:".base_url("pelajaran/"));
			}
			else{
				redir(base_url("login"));
				}
			}

		public function edit($id){
			$sess = $this->getKey();
			if(!is_array($sess)){
				$sess = array();
			}
			if(isset($sess['user']->id)){
				$data['datalist'] = $this->m_pelajaran->getById($id);
				$data['datalist'] = $data['datalist'][0];


				$data['id']=$id;
				if(isset($data['datalist'])){
					$data['sess'] = $sess;
					$this->view("__header",$data);
					$this->view("__nav",$data);
					$this->view("backend/pelajaran/edit",$data);
					$this->view("backend/pelajaran/__bottom");
					$this->view("__footer");
				}
			}
			else{
			redir(base_url("login"));
			}
		}

		public function delete($id){
      $del_img = unlink("gambar/$_GET[namafile]");
			$res = $this->m_pelajaran->del($id);
	    header("location:".base_url("pelajaran/"));
      //redir(base_url("kumpulkupon/"));
		}


	}
?>
