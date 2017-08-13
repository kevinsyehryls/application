<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ccrudppn extends CI_Controller {

	/* i. function construct */
	function __construct(){
		parent::__construct();
	}
	
	function showppn(){
		?>
		 <table id="example1" class="table table-bordered table-striped">
            <thead>
            	<tr>
              		<th width="5%">No</th>
             		<th width="15%">NIK</th>
             	 	<th width="30%">Nama</th>
             	 	<th width="30%">Jabatan</th>
             	 	<th width="20%">Kelola </th>
           	 	</tr>
            </thead>
          <tbody>      
            <?php
			  $this->load->model('mcrudppn');
       		  $query = $this->mcrudppn->selectppn();
			  $i = 1;
			  foreach($query->result() as $row){
			  	?>
				<tr>
                  <td><?php echo $i ?></td>
                  <td><?php echo $row->id_pimpinan_telkomsel ?></td>
                  <td><?php echo $row->nama_pimpinan_telkomsel ?></td>
                  <td><?php echo $row->jabatan_pimpinan_telkomsel ?></td>
                  <td>
                    <button onclick="EditPpn(<?=$row->id_pimpinan_telkomsel?>)" type="button" class="btn btn-primary btn-xs">Edit</button>
                    <button onclick="DelPpn(<?=$row->id_pimpinan_telkomsel?>)" type="button" class="btn btn-primary btn-xs">Delete</button>
                  </td> 			                  
                </tr>
				<?php
				$i++;
			  } 
			  ?>               
        </table>
		<?php
	}
	
	public function addppn(){
		?>
		<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span></button>
            <h4 class="modal-title">TAMBAH PIMPINAN TELKOMSEL</h4>
          </div>
         <div class="modal-body">
        
      	  <div class="box-body">
            <div class="form-group">
              <label for="nik">NIK</label>
              <input type="text" class="form-control" id="id_ppnnik" placeholder="Ketik NIK">
            </div>
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" id="id_ppnnama" placeholder="Ketik Nama">
            </div>
            <div class="form-group">
              <label for="jabatan">Jabatan</label>
              <input type="text" class="form-control" id="id_ppnjbt" placeholder="Ketik Jabatan">
            </div>      
          </div>          
		</div>
          <div class="modal-footer">
           <button id="id_ppnbtn" type="button" class="btn btn-primary">Save</button>
          </div>
		<?php
	}
	
	public function showeditppn(){
		$this->load->model('mcrudppn');
		$query=$this->mcrudppn->select1ppn();
		foreach($query->result() as $row){
			?>
		<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span></button>
            <h4 class="modal-title">EDIT PIMPINAN TELKOMSEL</h4>
          </div>
         <div class="modal-body">
        
      	  <div class="box-body">
            <div class="form-group">
              <label for="nik">NIK</label>
              <input type="text" class="form-control" id="id_ppnnik" placeholder="Ketik NIK" value="<?=$row->id_pimpinan_telkomsel?>" readonly="readonly">
            </div>
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" id="id_ppnnama" placeholder="Ketik Nama" value="<?=$row->nama_pimpinan_telkomsel?>">
            </div>
            <div class="form-group">
              <label for="jabatan">Jabatan</label>
              <input type="text" class="form-control" id="id_ppnjbt" placeholder="Ketik Jabatan" value="<?=$row->jabatan_pimpinan_telkomsel?>">
            </div>      
          </div>          
		</div>
          <div class="modal-footer">
           <button id="id_ppnbtn" type="button" class="btn btn-primary" onclick="UpdPpn()">Save changes</button>
          </div>
		<?php
		}	
	}
		public function editppn(){
		$this->load->model('mcrudppn');
		$query = $this->mcrudppn->updateppn();	
	}
		public function saveppn(){
		$this->load->model('mcrudppn');
		$query = $this->mcrudppn->insertppn();
	}
	
		public function delppn(){
		$this->load->model('mcrudppn');
		$query = $this->mcrudppn->deleteppn();
		
		
	}
}
?>