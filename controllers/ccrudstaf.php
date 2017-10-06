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
                    <button onclick="DelStaf('<?=$row->id_pic_telkomsel?>')" type="button" class="btn btn-primary btn-xs">Hapus</button>
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
    <?php
    $frmattributes = array(
       "id" => "id_FrmAddStaf",
       "name" => "FrmAddStaf"
       );
      echo form_open('cpage/halstaf',$frmattributes);
    ?>
         <div class="modal-body">
        
      	  <div class="box-body">
            <div class="form-group">
              <label for="nik">NIK</label>
              <input type="text" class="form-control" id="id_stafnik" name="id_stafnik" placeholder="Ketik NIK" required>
              <label for="id_stafnik" class="error"></label>
            </div>
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" id="id_stafnama" name="id_stafnama" placeholder="Ketik Nama" equired>
              <label for="id_stafnama" class="error"></label>
            </div>
            <div class="form-group">
              <label for="jabatan">Jabatan</label>
              <input type="text" class="form-control" id="id_stafjbt" name="id_stafjbt" placeholder="Ketik Jabatan" equired>
              <label for="id_stafjbt" class="error"></label>
            </div>
            <div class="form-group">
              <label for="nohp">Nomor Handphone</label>
              <input type="number" class="form-control" id="id_stafhp" name="id_stafhp" placeholder="Ketik Nomor HP" equired>
              <label for="id_stafhp" class="error"></label>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" id="id_stafemail" name="id_stafemail" placeholder="Ketik Email" equired>
              <label for="id_stafemail" class="error"></label>
            </div>
          </div>          
		</div>
    <div class="modal-footer">
     <button id="id_stafbtn" type="button" class="btn btn-primary">Save</button>
    </div>
      <style>
          .error{
          color: red;
          font-style: italic;
          }
      </style>
      <?php
      echo form_close();
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

    <?php
    $frmattributes = array(
       "id" => "id_FrmUpdStaf",
       "name" => "FrmUpdStaf"
       );
      echo form_open('cpage/halstaf',$frmattributes);
    ?>
          
         <div class="modal-body">
        
      	  <div class="box-body">
            <div class="form-group">
              <label for="nik">NIK</label>
              <input type="text" class="form-control" id="id_stafnik" placeholder="Ketik NIK" value="<?=$row->id_pic_telkomsel?>" readonly="readonly">
            </div>
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" id="id_stafnama" name="id_stafnama" placeholder="Ketik Nama" value="<?=$row->nama_pic_telkomsel?>" equired>
            </div>
            <div class="form-group">
              <label for="jabatan">Jabatan</label>
              <input type="text" class="form-control" id="id_stafjbt" name="id_stafjbt" placeholder="Ketik Jabatan" value="<?=$row->jabatan_pic_telkomsel?>" equired>
            </div>
            <div class="form-group">
              <label for="nohp">Nomor Handphone</label>
              <input type="text" class="form-control" id="id_stafhp" name="id_stafhp" placeholder="Ketik Nomor HP" value="<?=$row->nomor_hp_pic_telkomsel?>" equired>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" id="id_stafemail" name="id_stafemail" placeholder="Ketik Email" value="<?=$row->email_pic_telkomsel?>" equired>
            </div>    
		      </div>
          <div class="modal-footer">
           <button id="id_stafbtn1" type="button" class="btn btn-primary" onclick="UpdStaf()">Save changes</button>
          </div>
    <style>
      .error{
      color: red;
      font-style: italic;
      }
    </style>
    <?php
      echo form_close();
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