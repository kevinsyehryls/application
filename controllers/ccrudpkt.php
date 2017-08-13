<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ccrudpkt extends CI_Controller {

	/* i. function construct */
	function __construct(){
		parent::__construct();
	}
	
	function showpkt(){
		?>
		 <table id="example1" class="table table-bordered table-striped">
            <thead>
            	<tr>
                  <th width="5%">No</th>
                  <th width="50%">Nama Paket</th>
                  <th width="30%">Nama File</th>
                  <th width="15%">Opsi</th>
                </tr>
            </thead>
          <tbody>      
            <?php
			  $this->load->model('mcrudpkt');
       		  $query = $this->mcrudpkt->selectpkt();
			  $i = 1;
			  foreach($query->result() as $row){
			  	?>
				<tr>
                  <td><?php echo $i ?></td>
                  <td><?php echo $row->id_paket ?></td>
                  <td><?php echo $row->nama_paket ?></td>
                  <td>
                    <button onclick="EditPkt(<?=$row->id_paket?>)" type="button" class="btn btn-primary btn-xs">Edit</button>
                    <button onclick="DelPkt(<?=$row->id_paket?>)" type="button" class="btn btn-primary btn-xs">Delete</button>
                  </td> 			                  
                </tr>
				<?php
				$i++;
			  } 
			  ?>               
        </table>
		<?php
	}
	
	function addpkt(){
		?>
		<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span></button>
            <h4 class="modal-title">TAMBAH PAKET</h4>
          </div>
          <div class="modal-body">
         	<div class="form-group">
                <label for="id_paket" class="col-sm-2 control-label">ID Paket</label>
				<div class="col-sm-10">
                <input type="text" class="form-control" id="id_paket" name="id_paket" placeholder="Masukan ID Paket">
                </div>
            </div>
            <div class="form-group">
                <label for="nama" class="col-sm-2 control-label">Nama Paket</label>
				<div class="col-sm-10">
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Paket">
                </div>
            </div>
            <div class="form-group">
                <label for="file" class="col-sm-2 control-label">Nama File</label>
				<div class="col-sm-10">
                <input type="text" class="form-control" id="file" name="file" placeholder="Masukan File">
                </div>
            </div>
           
                             
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
		<?php
	}
	
	function edtpkt(){
		?>
			
            
          <div class="modal-footer">
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
		<?php
	}
}
?>