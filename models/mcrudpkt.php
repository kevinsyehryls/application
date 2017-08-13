<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mcrudpkt extends CI_Model {

	/* i. function construct */
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	function selectpkt(){
		$query = $this->db->query("select * from tb_paket");
		return $query;
	}
}
?>