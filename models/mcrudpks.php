<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mcrudpks extends CI_Model {

	/* i. function construct */
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	function selectpks(){
		$query = $this->db->query("
			select
			a.*,
			b.*,
			c.*,
			d.*
			from tb_pks a
			join tb_pimpinan_telkomsel b on a.id_pimpinan_telkomsel = b.id_pimpinan_telkomsel
			join tb_corporate c on a.`id_corporate` = c.`id_corporate`
			join `tb_pic_telkomsel` d on d.`id_pic_telkomsel` = a.`id_pic_telkomsel`
		");
		return $query;
	}
	
	// tampil cbx pimpinan telkomsel pada modal tambah PKS
	function relpimpinan(){
		$query = $this->db->query("select * from tb_pimpinan_telkomsel");
		return $query;
	}
	
	// tampil cbx pic telkomsel pada modal tambah PKS
	function relpic(){
		$query = $this->db->query("select * from tb_pic_telkomsel");
		return $query;
	}
	
	// tampil cbx pic telkomsel pada modal tambah PKS
	function relcorp(){
		$query = $this->db->query("select * from tb_corporate");
		return $query;
	}
	
	function insertpks(){
		$id =$this->input->post("id_pks");
		$no =$this->input->post("id_pksno");
		$pksppn =$this->input->post("id_pksppn");
		$pkspic =$this->input->post("id_pkspic");
		$pkscorp =$this->input->post("id_pkscorp");
		$pksst =$this->input->post("id_pksst");
		$pkssen =$this->input->post("id_pksen");
		$datapks =array(
			'id_pks' => $id,
			'nomor_pks' => $no,
			'id_pimpinan_telkomsel' => $pksppn,
			'id_pic_telkomsel' => $pkspic,
			'id_corporate' => $pkscorp,
			'start_date' => $pksst,
			'end_date' => $pkssen
		);	
		$this->db->insert('tb_pks', $datapks);		
	}
	
	function deletepks(){
		$id_pks=$this->input->post("id_pks");
		$this->db->where('id_pks', $id_pks);
		$this->db->delete('tb_pks');	
	}
	
	
	function select1pks(){
		$pks_id=$this->input->post('id_pks');
		$query= $this->db->query("select * from tb_pks where id_pks='$pks_id'");
		return $query;	
	}
	
	function updatepks(){
		$id =$this->input->post("id_pks");
		$no =$this->input->post("id_pksno");
		$pksppn =$this->input->post("id_pksppn");
		$pkspic =$this->input->post("id_pkspic");
		$pkscorp =$this->input->post("id_pkscorp");
		$pksst =$this->input->post("id_pksst");
		$pkssen =$this->input->post("id_pksen");
		$datapks =array(
			'nomor_pks' => $no,
			'id_pimpinan_telkomsel' => $pksppn,
			'id_pic_telkomsel' => $pkspic,
			'id_corporate' => $pkscorp,
			'start_date' => $pksst,
			'end_date' => $pkssen
		);	
		$this->db->where('id_pks', $id);
		$this->db->update('tb_pks', $datapks);
	}

	// fill cbx edit pimpinan telkomsel
	function select1ppn(){
		$query = $this->db->query("select * from tb_pimpinan_telkomsel");
		return $query;
	}
	// fill cbx edit pimpinan telkomsel
	function selectppn(){
		$query = $this->db->query("select * from tb_pimpinan_telkomsel");
		return $query;
	}
}
?>