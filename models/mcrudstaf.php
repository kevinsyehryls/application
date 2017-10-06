<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mcrudstaf extends CI_Model {

	/* i. function construct */
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	function selectstaf(){
		$query = $this->db->query("select * from tb_pic_telkomsel");
		return $query;
	}
	
	
	function insertstaf(){
		$nik=$this->input->post("id_stafnik");
		$nama=$this->input->post("id_stafnama");
		$jabatan=$this->input->post("id_stafjbt");
		$nohp=$this->input->post("id_stafhp");
		$email=$this->input->post("id_stafemail");
		$datastaf=array(
			'id_pic_telkomsel' => $nik,
			'nama_pic_telkomsel' => $nama,
			'jabatan_pic_telkomsel' => $jabatan,
			'nomor_hp_pic_telkomsel' => $nohp,
			'email_pic_telkomsel' => $email
		);	
		$this->db->insert('tb_pic_telkomsel', $datastaf);
	}
	
	function deletestaf(){
		$id_stafnik=$this->input->post("id_stafnik");
		$this->db->where('id_pic_telkomsel', $id_stafnik);
		$this->db->delete('tb_pic_telkomsel');	
	}
	
	function select1staf(){
		$staf_id=$this->input->post('id_stafnik');
		$query= $this->db->query("select * from tb_pic_telkomsel where id_pic_telkomsel='$staf_id'");
		return $query;	
	}
	
	function updatestaf(){
		$nik=$this->input->post("id_stafnik");
		$nama=$this->input->post("id_stafnama");
		$jabatan=$this->input->post("id_stafjbt");
		$nohp=$this->input->post("id_stafhp");
		$email=$this->input->post("id_stafemail");
		$datastaf=array(
			'nama_pic_telkomsel' => $nama,
			'jabatan_pic_telkomsel' => $jabatan,
			'nomor_hp_pic_telkomsel' => $nohp,
			'email_pic_telkomsel' => $email
		);	
		$this->db->where('id_pic_telkomsel', $nik);
		$this->db->update('tb_pic_telkomsel', $datastaf);
	}
}
?>