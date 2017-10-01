<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * Page Authorization
 */
class Pageauth {
    // para CodeIgniter Super Global Referencias o variables globales
	protected $CI;
    function __construct() {
		// Assign the CodeIgniter super-object
		$this->CI =& get_instance();
    }

    function sess_auth_admin() {
		// ensure user is signed in
		if ( $this->CI->session->userdata('login_state') == FALSE ) {
			redirect( "clogin/" );
		} else {
			// avoid access by a non admin level
			if ($this->CI->session->userdata('level') != 'Administrasi') {
				?>
				<script>
					window.alert("Sorry, you don not have any privilleges to access this function!.");
					window.location="<?php echo base_url().'index.php/cpage/'; ?>";
				</script>
				<?php
			}
		}
    }

    function sess_auth_spv() {
		// ensure user is signed in
		if ( $this->CI->session->userdata('login_state') == FALSE ) {
			redirect( "clogin/" );
		} else {
			// avoid access by a non admin level
			if ($this->CI->session->userdata('level') != 'SPV') {
				?>
				<script>
					window.alert("Sorry, you don not have any privilleges to access this function!.");
					window.location="<?php echo base_url().'index.php/cpage/'; ?>";
				</script>
				<?php
			}
		}
    }
	
	// cek only session
    function sess_auth() {
		// ensure user is signed in
		if ( $this->CI->session->userdata('login_state') == FALSE ) {
			redirect( "clogin/" );
		}
    }
}
?>