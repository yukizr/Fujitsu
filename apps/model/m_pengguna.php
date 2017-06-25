<?php
class M_Pengguna extends SENE_Model{
	public function __construct(){
		parent::__construct();
	}
  public function getAll(){
    $sql="SELECT `id`,`username`,`email`,`password`,`active`,`level` FROM `t_admin` WHERE 1 ";
    return $this->select($sql);
  }
  public function getOffset($offset=0){
    $b=10;
		$a=($offset-1)*10;
    $sql="SELECT `id`,`username`,`email`,`password`,`active`,`level` FROM `t_admin` WHERE 1 LIMIT ".$a.",".$b."";
    return $this->select($sql);
  }
  public function getById($id){
    $sql="SELECT `id`,`username`,`email`,`password`,`active`,`level` FROM `t_admin` WHERE `id` = ".$this->db->esc($id)." ";
    return $this->select($sql);
  }
  public function set($username,$email,$password,$active,$level){
    $sql="INSERT INTO `t_admin`(`username`,`email`,`password`,`active`,`level`) VALUES(".$this->db->esc($username).",".$this->db->esc($email).",".$this->db->esc($password).",".$this->db->esc($active).",".$this->db->esc($level).") ";
    $this->exec($sql);
    return $this->db->lastId();
  }
  public function update($username,$email,$password,$active,$level){
    $sql="UPDATE `t_admin` SET `username` = ".$this->db->esc($username).",`email` = ".$this->db->esc($email).",`password` = ".$this->db->esc($password).",`active` = ".$this->db->esc($active).",`level` = ".$this->db->esc($level)."  WHERE `id` = ".$this->db->esc($id)."";
    return $this->exec($sql);
  }
  public function del($id){
    $sql="DELETE FROM `t_admin` WHERE `id` = ".$this->db->esc($id)."";
    return $this->exec($sql);
  }
	public function auth($email,$pass){
    $sql="SELECT `id`,`email`,`password`,`active`,`level` FROM `t_pengguna` WHERE `email` = ".$this->db->esc($email)." AND `password` = PASSWORD(".$this->db->esc($pass)."); ";
		//die($sql);
    return $this->select($sql);
  }
}
?>
