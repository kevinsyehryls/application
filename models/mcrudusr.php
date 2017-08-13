<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mcrudusr extends CI_Model {

	/* i. function construct */
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	function selectusr(){
		$query = $this->db->query("select * from tb_user");
		return $query;
	}
	
	function insertusr(){
		$nik=$this->input->post("id_usrnik");
		$email=$this->input->post("id_usremail");
		$pass=$this->input->post("id_usrpass");
		$nama=$this->input->post("id_usrnama");
		$level=$this->input->post("id_usrlevel");
		$datausr=array(
			'id_user' => $nik,
			'email' => $email,
			'pass' => $pass,
			'nama' => $nama,
			'level' => $level
		);	
		$this->db->insert('tb_user', $datausr);
	}
	
	function deleteusr(){
		$id_usrnik=$this->input->post("id_usrnik");
		$this->db->where('id_user', $id_usrnik);
		$this->db->delete('tb_user');	
	}
	
	function select1user(){
		$user_id=$this->input->post('id_usrnik');
		$query= $this->db->query("select * from tb_user where id_user='$user_id'");
		return $query;	
	}
	
	function updateusr(){
		$nik=$this->input->post("id_usrnik");
		$email=$this->input->post("id_usremail");
		$pass=$this->input->post("id_usrpass");
		$nama=$this->input->post("id_usrnama");
		$level=$this->input->post("id_usrlevel");
		$datausr=array(
			'email' => $email,
			'pass' => $pass,
			'nama' => $nama,
			'level' => $level	
		);	
		$this->db->where('id_user', $nik);
		$this->db->update('tb_user', $datausr);
	}
}
?>