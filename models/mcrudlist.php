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
	
		// tampil cbx pic telkomsel pada modal tambah List
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
	
	function updatelistcorp(){
		$id=$this->input->post("id_list");
		$idcorp=$this->input->post("id_SelCorpTlk");
		$datalistcorp=array(
			'id_corporate' => $idcorp	
		);	
		$this->db->where('id_list_msisdn', $id);
		$this->db->update('tb_list_nomor', $datalistcorp);
	}

	function updatelist(){
		$id=$this->input->post("id_list");
		$msisdn=$this->input->post("id_listmsisdn");
		$user=$this->input->post("id_listuser");
		$div=$this->input->post("id_listdiv");
		$short=$this->input->post("id_listshort");
		$des=$this->input->post("id_listdes");
		$datalist=array(
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


	// import pks
	function insert_import_list($data){
        $datacsv = array(
			//'id_list_msisdn'			=> addslashes($data[0]), rem due to auto_incremental
			'id_corporate'				=> addslashes($data[1]),
			'msisdn'					=> addslashes($data[2]),
			'user'						=> addslashes($data[3]),
			'division'					=> addslashes($data[4]),
			'short_code'				=> addslashes($data[5]),
			'deskripsi'					=> addslashes($data[6])

        );
        $this->db->insert('tb_list_nomor',$datacsv);
    }
}
?>