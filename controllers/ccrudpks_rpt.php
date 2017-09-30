	<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ccrudpks_rpt extends CI_Controller {

	/* i. function construct */
	function __construct(){
		parent::__construct();
	}
	
	 function showpks(){
    ?>
     <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                  <th>No</th>
                  <th>Nomor PKS</th>
                  <th>Id Corporate</th>
                  <th>Corporate</th>
                  <th>Paket</th>
                  <th>PIC Telkomsel</th>
                  <th>Pimpinan Corporate</th>
                  <th>Jabatan Pimpinan Corporate</th>
                  <th>PIC Corporate</th>
                  <th>Jabatan PIC Corporate</th>
                  <th>Nomor HP PIC Corporate</th>
                  <th>Email PIC Corporate</th>
                  <th>No Tlp Kantor</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Alamat</th>
              </tr>
            </thead>
          <tbody>      
            <?php
        $this->load->model('mcrudpks');
            $query = $this->mcrudpks->selectpks();
        $i = 1;
        foreach($query->result() as $row){
          ?>
        <tr>
                  <td><?php echo $i ?></td>
                  <td><?php echo $row->nomor_pks ?></td>
                  <td><?php echo $row->id_corporate ?></td>
                  <td><?php echo $row->nama_corporate ?></td>
                  <td><?php echo $row->nama_paket ?></td>
                  <td><?php echo $row->nama_pic_telkomsel?></td>
                  <td><?php echo $row->nama_pimpinan_corporate ?></td>
                  <td><?php echo $row->jabatan_pimpinan_corporate ?></td>
                  <td><?php echo $row->nama_pic_corporate ?></td>
                  <td><?php echo $row->jabatan_pic_corporate ?></td>
                  <td><?php echo $row->nomor_hp_pic_corporate ?></td>
                  <td><?php echo $row->email_pic_corporate ?></td>
                  <td><?php echo $row->nomor_tlp_kantor ?></td>
                  <td><?php echo date('d-M-Y', strtotime($row->start_date))?></td>
                  <td><?php echo date('d-M-Y', strtotime($row->end_date))?></td> 
                  <td><?php echo $row->alamat_corporate ?></td>                
                </tr>
        <?php
        $i++;
        } 
        ?>               
        </table>
    <?php
  }
}
?>