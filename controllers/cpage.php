<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
    HANDLE SESSION: 
        - $this->pageauth->sess_auth(); untuk cek session saja pada halaman, semua level bisa akses
        - $this->pageauth->sess_auth_admin(); untuk halaman yg bisa diakses oleh "Administrasi" saja
        - $this->pageauth->sess_auth_spv(); untuk halaman yg bisa diakses oleh "SPV" saja
*/

class Cpage extends CI_Controller {

	/* i. function construct */
	function __construct(){
		parent::__construct();
	}

	/* halaman awal setelah login */
    public function index(){
        $this->pageauth->sess_auth();
        $data = array(
            'apptitle' => 'E-PKS',
            'appver'   => 'SISTEM INFORMASI PERJANJIAN KERJASAMA <Br> PT TELKOMSEL BALI <i>DENGAN PELANGGAN CORPORATE</i> <br> BERBASIS BOOTSRAP',
            'title'    => 'BERANDA',
            'page'     => 'pages/vindx'
        );
        $this->load->view('wrapper', $data);
    }
	
	/* halaman Kelola User Login */
    public function haluser(){
        $this->pageauth->sess_auth_spv();
        $data = array(
            'apptitle' => 'E-PKS',
            'appver'   => 'SISTEM INFORMASI PERJANJIAN KERJASAMA <Br> PT TELKOMSEL BALI <i>DENGAN PELANGGAN CORPORATE</i> <br> BERBASIS BOOTSRAP',
            'title'    => 'Kelola User',
            'page'     => 'pages/vuser'
        );
        $this->load->view('wrapper', $data);
    }
	
	/* halaman Kelola Pimpinan Telkomsel */
    public function halppn(){
        $this->pageauth->sess_auth_spv();
        $data = array(
            'apptitle' => 'E-PKS',
            'appver'   => 'SISTEM INFORMASI PERJANJIAN KERJASAMA <Br> PT TELKOMSEL BALI <i>DENGAN PELANGGAN CORPORATE</i> <br> BERBASIS BOOTSRAP',
            'title'    => 'Kelola Pimpinan Telkomsel',
            'page'     => 'pages/vppn'
        );
        $this->load->view('wrapper', $data);
    }
	
	/* halaman Kelola Staff Telkomsel */
    public function halstaf(){
        $this->pageauth->sess_auth_spv();
        $data = array(
            'apptitle' => 'E-PKS',
            'appver'   => 'SISTEM INFORMASI PERJANJIAN KERJASAMA <Br> PT TELKOMSEL BALI <i>DENGAN PELANGGAN CORPORATE</i> <br> BERBASIS BOOTSRAP',
            'title'    => 'Kelola Staff Telkomsel',
            'page'     => 'pages/vstaf'
        );
        $this->load->view('wrapper', $data);
    }
	
	/* halaman Kelola Paket */
    public function halpkt(){
        $this->pageauth->sess_auth();
        $data = array(
            'apptitle' => 'E-PKS',
            'appver'   => 'SISTEM INFORMASI PERJANJIAN KERJASAMA <Br> PT TELKOMSEL BALI <i>DENGAN PELANGGAN CORPORATE</i> <br> BERBASIS BOOTSRAP',
            'title'    => 'Kelola Paket Layanan',
            'page'     => 'pages/vpkt'
        );
        $this->load->view('wrapper', $data);
    }
	
	/* halaman Kelola Corp */
    public function halcorp(){
        $this->pageauth->sess_auth();
        $data = array(
            'apptitle' => 'E-PKS',
            'appver'   => 'SISTEM INFORMASI PERJANJIAN KERJASAMA <Br> PT TELKOMSEL BALI <i>DENGAN PELANGGAN CORPORATE</i> <br> BERBASIS BOOTSRAP',
            'title'    => 'Data Corporate',
            'page'     => 'pages/vcorp'
        );
        $this->load->view('wrapper', $data);
    }

    /* halaman Kelola List Nomor */
    public function hallist(){
        $this->pageauth->sess_auth();
        $data = array(
            'apptitle' => 'E-PKS',
            'appver'   => 'SISTEM INFORMASI PERJANJIAN KERJASAMA <Br> PT TELKOMSEL BALI <i>DENGAN PELANGGAN CORPORATE</i> <br> BERBASIS BOOTSRAP',
            'title'    => 'Kelola List Nomor',
            'page'     => 'pages/vlist'
        );
        $this->load->view('wrapper', $data);
    }
	
	/* halaman Kelola Paket */
    public function halpks(){
        $this->pageauth->sess_auth();
        $data = array(
            'apptitle' => 'E-PKS',
            'appver'   => 'SISTEM INFORMASI PERJANJIAN KERJASAMA <Br> PT TELKOMSEL BALI <i>DENGAN PELANGGAN CORPORATE</i> <br> BERBASIS BOOTSRAP',
            'title'    => 'Create PKS',
            'page'     => 'pages/vpks'
        );
        $this->load->view('wrapper', $data);
    }	

    /* halaman Kelola vpks_ttd */
    public function halpks_ttd(){
        $this->pageauth->sess_auth();
        $data = array(
            'apptitle' => 'E-PKS',
            'appver'   => 'SISTEM INFORMASI PERJANJIAN KERJASAMA <Br> PT TELKOMSEL BALI <i>DENGAN PELANGGAN CORPORATE</i> <br> BERBASIS BOOTSRAP',
            'title'    => 'Pending Tanda Tangan',
            'page'     => 'pages/vpks_ttd'
        );
        $this->load->view('wrapper', $data);
    }

    /* halaman Kelola vpks_end */
    public function halpks_end(){
        $this->pageauth->sess_auth();
        $data = array(
            'apptitle' => 'E-PKS',
            'appver'   => 'SISTEM INFORMASI PERJANJIAN KERJASAMA <Br> PT TELKOMSEL BALI <i>DENGAN PELANGGAN CORPORATE</i> <br> BERBASIS BOOTSRAP',
            'title'    => 'PKS Akan Berakhir',
            'page'     => 'pages/vpks_end'
        );
        $this->load->view('wrapper', $data);
    }
	
	/* halaman Report */
    public function halrpt(){
        $this->pageauth->sess_auth_spv();
        $data = array(
            'apptitle' => 'E-PKS',
            'appver'   => 'SISTEM INFORMASI PERJANJIAN KERJASAMA <Br> PT TELKOMSEL BALI <i>DENGAN PELANGGAN CORPORATE</i> <br> BERBASIS BOOTSRAP',
            'title'    => 'Data Report',
            'page'     => 'pages/vrpt'
        );
        $this->load->view('wrapper', $data);
    }

    /* halaman Grafik */
    public function halgraf(){
        $this->pageauth->sess_auth_spv();
        $data = array(
            'apptitle' => 'E-PKS',
            'appver'   => 'SISTEM INFORMASI PERJANJIAN KERJASAMA <Br> PT TELKOMSEL BALI <i>DENGAN PELANGGAN CORPORATE</i> <br> BERBASIS BOOTSRAP',
            'title'    => 'Grafik Pembuatan PKS',
            'page'     => 'pages/vgraf'
        );
        $this->load->view('wrapper', $data);
    }

     /* halaman Grafik */
    public function halprof(){
        $this->pageauth->sess_auth();
        $data = array(
            'apptitle' => 'E-PKS',
            'appver'   => 'SISTEM INFORMASI PERJANJIAN KERJASAMA <Br> PT TELKOMSEL BALI <i>DENGAN PELANGGAN CORPORATE</i> <br> BERBASIS BOOTSRAP',
            'title'    => 'Edit Profile',
            'page'     => 'pages/vprof'
        );
        $this->load->view('wrapper', $data);
    }
	
	/* halaman index */
    public function halindx(){
        $this->pageauth->sess_auth();
        $data = array(
            'apptitle' => 'E-PKS',
            'appver'   => 'SISTEM INFORMASI PERJANJIAN KERJASAMA <Br> PT TELKOMSEL BALI <i>DENGAN PELANGGAN CORPORATE</i> <br> BERBASIS BOOTSRAP',
            'title'    => 'BERANDA',
            'page'     => 'pages/vindx'
        );
        $this->load->view('wrapper', $data);
    }
}
?>