<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ccrudstaf extends CI_Controller {

	/* i. function construct */
	function __construct(){
		parent::__construct();
	}
	
	function showstaf(){
		?>
		 <table id="example1" class="table table-bordered table-striped">
            <thead>
            	<tr>
                  <th width="5%">No</th>
                  <th width="5%">NIK</th>
                  <th width="15%">Nama</th>
                  <th width="15%">Jabatan</th>
                  <th width="15%">Email</th>
                  <th width="15%">No HP</th>
                  <th width="15%">No Telpon Kantor</th>
                  <th width="15%">Opsi</th>
                </tr>
            </thead>
          <tbody>      
            <?php
			  $this->load->model('mcrudstaf');
       		  $query = $this->mcrudstaf->selectstaf();
			  $i = 1;
			  foreach($query->result() as $row){
			  	?>
				<tr>
                  <td><?php echo $i ?></td>
                  <td><?php echo $row->id_pic_telkomsel ?></td>
                  <td><?php echo $row->nama_pic_telkomsel ?></td>
                  <td><?php echo $row->jabatan_pic_telkomsel ?></td>
                  <td><?php echo $row->email_pic_telkomsel ?></td>
                  <td><?php echo $row->nomor_hp_pic_telkomsel ?></td>
                  <td><?php echo $row->nomor_tlp_kantor ?></td>
                  <td>
                    <button onclick="EditStaf(<?=$row->id_pic_telkomsel?>)" type="button" class="btn btn-primary btn-xs">Edit</button>
                    <button onclick="DelStaf('<?=$row->id_pic_telkomsel?>')" type="button" class="btn btn-primary btn-xs">Delete</button>
                  </td> 			                  
                </tr>
				<?php
				$i++;
			  } 
			  ?>               
        </table>
		<?php
	}
	
	function addstaf(){
		?>
		<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span></button>
            <h4 class="modal-title">TAMBAH STAFF</h4>
          </div>
         <div class="modal-body">
        
      	  <div class="box-body">
            <div class="form-group">
              <label for="nik">NIK</label>
              <input type="text" class="form-control" id="id_stafnik" placeholder="Ketik NIK">
            </div>
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" id="id_stafnama" placeholder="Ketik Nama">
            </div>
            <div class="form-group">
              <label for="jabatan">Jabatan</label>
              <input type="text" class="form-control" id="id_stafjbt" placeholder="Ketik Jabatan">
            </div>
            <div class="form-group">
              <label for="nohp">Nomor Handphone</label>
              <input type="text" class="form-control" id="id_stafhp" placeholder="Ketik Nomor HP">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" id="id_stafemail" placeholder="Ketik Email">
            </div>
            <div class="form-group">
              <label for="notlp">Nomor Kantor</label>
              <input type="text" class="form-control" id="id_stafnotlp" placeholder="Ketik Nomor Tlp Kantor">
            </div>
             <div class="form-group">
              <label for="alamat">Alamat</label>
              <textarea class="form-control" rows="3" id="id_stafalmt" placeholder="Ketik Alamat"></textarea>
            </div>       
          </div>          
		</div>
          <div class="modal-footer">
           <button id="id_stafbtn" type="button" class="btn btn-primary">Save</button>
          </div>
		<?php
	}
	
	public function showeditstaf(){
		$this->load->model('mcrudstaf');
		$query=$this->mcrudstaf->select1staf();
		foreach($query->result() as $row){
		?>
		
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span></button>
            <h4 class="modal-title">EDIT STAFF</h4>
          </div>
         <div class="modal-body">
        
      	  <div class="box-body">
            <div class="form-group">
              <label for="nik">NIK</label>
              <input type="text" class="form-control" id="id_stafnik" placeholder="Ketik NIK" value="<?=$row->id_pic_telkomsel?>" readonly="readonly">
            </div>
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" id="id_stafnama" placeholder="Ketik Nama" value="<?=$row->nama_pic_telkomsel?>">
            </div>
            <div class="form-group">
              <label for="jabatan">Jabatan</label>
              <input type="text" class="form-control" id="id_stafjbt" placeholder="Ketik Jabatan" value="<?=$row->jabatan_pic_telkomsel?>">
            </div>
            <div class="form-group">
              <label for="nohp">Nomor Handphone</label>
              <input type="text" class="form-control" id="id_stafhp" placeholder="Ketik Nomor HP" value="<?=$row->nomor_hp_pic_telkomsel?>">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" id="id_stafemail" placeholder="Ketik Email" value="<?=$row->email_pic_telkomsel?>">
            </div>
            <div class="form-group">
              <label for="notlp">Nomor Kantor</label>
              <input type="text" class="form-control" id="id_stafnotlp" placeholder="Ketik Nomor Tlp Kantor" value="<?=$row->nomor_tlp_kantor?>">
            </div>
             <div class="form-group">
              <label for="alamat">Alamat</label>
              <textarea class="form-control" rows="3" id="id_stafalmt" placeholder="Ketik Alamat" value="<?=$row->alamat_kantor?>"></textarea>
            </div>       
          </div>          
		</div>
          <div class="modal-footer">
           <button id="id_stafbtn" type="button" class="btn btn-primary" onclick="UpdStaf()">Save changes</button>
          </div>
          
		<?php
		}	
	}
		public function editstaf(){
		$this->load->model('mcrudstaf');
		$query = $this->mcrudstaf->updatestaf();	
	}
		public function savestaf(){
		$this->load->model('mcrudstaf');
		$query = $this->mcrudstaf->insertstaf();
	}
	
		public function delstaf(){
		$this->load->model('mcrudstaf');
		$query = $this->mcrudstaf->deletestaf();
	}
}
?>