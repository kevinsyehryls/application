<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clogin extends CI_Controller {

	/* i. function construct */
	function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library('session');
	}

	/* 1. fungsi memanggail halaman login */
	public function index() {
		// get db configuration to show in login page
		$dbconfig = array(
			'host'     => $this->db->hostname,
			'db'       => $this->db->database,
			'user'     => $this->db->username,
			'pass'     => $this->db->password,
			'apptitle' => 'S I R A M A',
			'appver'   => 'SISTEM PERAMALAN PENJUALAN CAT <Br> DENGAN MENGGUNAKAN <i>WEIGHTED MOVING AVERAGE</i> <br> PADA MITRA 10 DENPASAR',
		);
		$this->load->view('login', $dbconfig);
	}
}
?>