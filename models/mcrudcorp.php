<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mcrudcorp extends CI_Model {

	/* i. function construct */
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	function selectcorp(){
		$query = $this->db->query("select * from tb_corporate");
		return $query;
	}
	
	function insertcorp(){
		$id=$this->input->post("id_corp");
		$nama=$this->input->post("id_corpnama");
		$alamat=$this->input->post("id_corpalmt");
		$namapn=$this->input->post("id_corpnamapn");
		$jabatanpn=$this->input->post("id_corpjbtpn");
		$namapi=$this->input->post("id_corpnamapi");
		$jabatanpi=$this->input->post("id_corpjbtpi");
		$nohp=$this->input->post("id_corpnohp");
		$email=$this->input->post("id_corpemail");
		$tlpn=$this->input->post("id_corpnotlpn");		
		$datacorp=array(
			'id_corporate' => $id,
			'nama_corporate' => $nama,
			'alamat_corporate' => $alamat,
			'nama_pimpinan_corporate' => $namapn,
			'jabatan_pimpinan_corporate' => $jabatanpn,
			'nama_pic_corporate' => $namapi,
			'jabatan_pic_corporate' => $jabatanpi,
			'nomor_hp_pic_corporate' => $nohp,
			'email_pic_corporate' => $email,
			'nomor_tlp_kantor' => $tlpn	
		);	
		$this->db->insert('tb_corporate', $datacorp);
		
	}
	
	function deletecorp(){
		$id_corp=$this->input->post("id_corp");
		$this->db->where('id_corporate', $id_corp);
		$this->db->delete('tb_corporate');	
	}
	
	function select1corp(){
		$corp_id=$this->input->post('id_corp');
		$query= $this->db->query("select * from tb_corporate where id_corporate='$corp_id'");
		return $query;	
	}
	
	function updatecorp(){
		$id=$this->input->post("id_corp");
		$nama=$this->input->post("id_corpnama");
		$alamat=$this->input->post("id_corpalmt");
		$namapn=$this->input->post("id_corpnamapn");
		$jabatanpn=$this->input->post("id_corpjbtpn");
		$namapi=$this->input->post("id_corpnamapi");
		$jabatanpi=$this->input->post("id_corpjbtpi");
		$nohp=$this->input->post("id_corpnohp");
		$email=$this->input->post("id_corpemail");
		$tlpn=$this->input->post("id_corpnotlpn");		
		$datacorp=array(
			'nama_corporate' => $nama,
			'alamat_corporate' => $alamat,
			'nama_pimpinan_corporate' => $namapn,
			'jabatan_pimpinan_corporate' => $jabatanpn,
			'nama_pic_corporate' => $namapi,
			'jabatan_pic_corporate' => $jabatanpi,
			'nomor_hp_pic_corporate' => $nohp,
			'email_pic_corporate' => $email,
			'nomor_tlp_kantor' => $tlpn	
		);	
		$this->db->where('id_corporate', $id);
		$this->db->update('tb_corporate', $datacorp);
	}
}
?>