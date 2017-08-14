<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class McrudList extends CI_Model {

	/* i. function construct */
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	// tampil Tabel List Nomor
	function selectlist(){
		$query = $this->db->query("
			select
				a.*,
				b.*
				from tb_list_nomor a
				join tb_corporate b on a.id_corporate = b.id_corporate
			");
		return $query;
	}
	
		// tampil cbx pic telkomsel pada modal tambah PKS
	function relcorp(){
		$query = $this->db->query("select * from tb_corporate");
		return $query;
	}
	
	function insertlist(){
		$id=$this->input->post("id_list");
		$corp=$this->input->post("id_listcorp");
		$msisdn=$this->input->post("id_listmsisdn");
		$user=$this->input->post("id_listuser");
		$div=$this->input->post("id_listdiv");
		$short=$this->input->post("id_listshort");
		$des=$this->input->post("id_listdes");
		$datalist=array(
			'id_list_msisdn' => $id,
			'id_corporate' => $corp,
			'msisdn' => $msisdn,
			'user' => $user,
			'division' => $div,
			'short_code' => $short,
			'deskripsi' => $des
		);	
		$this->db->insert('tb_list_nomor', $datalist);
		
	}
	
	function deletelist(){
		$id_list=$this->input->post("id_list");
		$this->db->where('id_list_msisdn', $id_list);
		$this->db->delete('tb_list_nomor');	
	}
	
	function select1list(){
		$id_list=$this->input->post('id_list');
		$query= $this->db->query("select * from tb_list_nomor where id_list_msisdn='$id_list'");
		return $query;	
	}
	
	function updatelist(){
		$id=$this->input->post("id_list");
		$corp=$this->input->post("id_listcorp");
		$msisdn=$this->input->post("id_listmsisdn");
		$user=$this->input->post("id_listuser");
		$div=$this->input->post("id_listdiv");
		$short=$this->input->post("id_listshort");
		$des=$this->input->post("id_listdes");
		$datalist=array(
			'id_corporate' => $corp,
			'msisdn' => $msisdn,
			'user' => $user,
			'division' => $div,
			'short_code' => $short,
			'deskripsi' => $des	
		);	
		$this->db->where('id_list_msisdn', $id);
		$this->db->update('tb_list_nomor', $datalist);
	}
	
	// fill cbx edit corporate
	function selectcorp(){
		$query = $this->db->query("select * from tb_corporate");
		return $query;
	}
}
?>