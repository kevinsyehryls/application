	<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ccrudindx extends CI_Controller {

	/* i. function construct */
	function __construct(){
		parent::__construct();
	}
	
	function showindex(){
		?>
      <?php
	     $this->load->model('mcrudpks');
   		 $query = $this->mcrudpks->jumlah_pks_end();
       foreach($query->result() as $row){
			?>
				<div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>150</h3>
              <p><strong>TTD TERTUNDA</strong></p>
            </div>
            <div class="icon">
              <i class="ion ion-alert-circled"></i>
            </div>
            <a href="<?php echo base_url(); ?>index.php/cpage/halpks_ttd" class="small-box-footer">Info Lebih Lanjut <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <?php
        }
        ?>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $row->jml; ?></h3>
               <p><strong>PKS AKAN BERAKHIR</strong></p>
            </div>
            <div class="icon">
              <i class="ion ion-alert-circled"></i>
            </div>
             <a href="<?php echo base_url(); ?>index.php/cpage/halpks_end" class="small-box-footer">Info Lebih Lanjut <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
    <?php
    }
}
?>