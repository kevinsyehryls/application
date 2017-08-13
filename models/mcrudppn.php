<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mcrudppn extends CI_Model {

	/* i. function construct */
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	function selectppn(){
		$query = $this->db->query("select * from tb_pimpinan_telkomsel");
		return $query;
	}
	
	function insertppn(){
		$nik=$this->input->post("id_ppnnik");
		$nama=$this->input->post("id_ppnnama");
		$jabatan=$this->input->post("id_ppnjbt");
		$datappn=array(
			'id_pimpinan_telkomsel' => $nik,
			'nama_pimpinan_telkomsel' => $nama,
			'jabatan_pimpinan_telkomsel' => $jabatan
		);	
		$this->db->insert('tb_pimpinan_telkomsel', $datappn);
	}
	
	function deleteppn(){
		$id_ppnnik=$this->input->post("id_ppnnik");
		$this->db->where('id_pimpinan_telkomsel', $id_ppnnik);
		$this->db->delete('tb_pimpinan_telkomsel');	
	}
	
	function select1ppn(){
		$ppn_id=$this->input->post('id_ppnnik');
		$query= $this->db->query("select * from tb_pimpinan_telkomsel where id_pimpinan_telkomsel='$ppn_id'");
		return $query;	
	}
	
	function updateppn(){
		$nik=$this->input->post("id_ppnnik");
		$nama=$this->input->post("id_ppnnama");
		$jabatan=$this->input->post("id_ppnjbt");
		$datappn=array(
			'nama_pimpinan_telkomsel' => $nama,
			'jabatan_pimpinan_telkomsel' => $jabatan	
		);	
		$this->db->where('id_pimpinan_telkomsel', $nik);
		$this->db->update('tb_pimpinan_telkomsel', $datappn);
	}
}
?>