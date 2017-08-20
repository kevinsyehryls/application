<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ccrudusr extends CI_Controller {

	/* i. function construct */
	function __construct(){
		parent::__construct();
	}
	
	public function showusr(){
		?>
		<table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th width="3%">No</th>
              <th width="12%">NIK</th>
              <th width="25%">Email</th>
              <th width="35%">Nama</th>
              <th width="10%">Level</th>
              <th width="15%">Opsi</th>
            </tr>
            </thead>
           <tbody>            
            <?php
			  $this->load->model('mcrudusr');
       		  $query = $this->mcrudusr->selectusr();
			  $i = 1;
			  foreach($query->result() as $row){
			  	?>
				<tr>
                  <td><?php echo $i ?></td>
                  <td><?php echo $row->id_user ?></td>
                  <td><?php echo $row->email ?></td>
                  <td><?php echo $row->nama ?></td>
                  <td><?php echo $row->level ?></td>
                  <td>
                    <button onclick="EditUsr(<?=$row->id_user?>)" type="button" class="btn btn-primary btn-xs">Edit</button>
                    <button onclick="DelUsr(<?=$row->id_user?>)" type="button" class="btn btn-primary btn-xs">Delete</button>
                  </td> 			                  
                </tr>
				<?php
				$i++;
			  } 
			  ?>               
        </table>
		<?php
	}
	
	public function addusr(){
		?>
		<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span></button>
            <h4 class="modal-title">TAMBAH USER</h4>
		</div>
        <?php
        $frmattributes = array(
            "id" => "id_FrmAddUsr",
            "name" => "FrmAddUsr"
        );
        echo form_open('cpage/haluser',$frmattributes);
        ?>
		<div class="modal-body">
            <div class="box-body">
                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" class="form-control" id="id_usrnik" name="id_usrnik" placeholder="Ketik NIK" required>
                    <label for="id_usrnik" class="error"></label>
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="id_usremail" name="id_usremail" placeholder="Enter email" required>
                    <label for="id_usremail" class="error"></label>
                </div>
                <div class="form-group">
                    <label for="Password">Password</label>
                    <input type="password" class="form-control" id="id_usrpass" name="id_usrpass" placeholder="Password" required>
                    <label for="id_usrpass" class="error"></label>
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="id_usrnama" name="id_usrnama" placeholder="Ketik Nama" required>
                    <label for="id_usrnama" class="error"></label>
                </div>
                <div class="form-group">
                    <label for="level">Level</label>
                    <select id="id_usrlevel" name="id_usrlevel" class="form-control" required>
                        <option value="">---- PILIH LEVEL ----</option>
                        <option value="Administrasi">Administrasi</option>
                        <option value="SPV">SPV</option>
                    </select>
                    <label for="id_usrlevel" class="error"></label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button id="id_usrbtn" type="button" class="btn btn-primary">Save</button>
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
	
	public function showeditusr(){
		$this->load->model('mcrudusr');
		$query=$this->mcrudusr->select1user();
		foreach($query->result() as $row){
			?>
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span></button>
            <h4 class="modal-title">EDIT USER</h4>
            </div>
            <div class="modal-body">
            
              <div class="box-body">
                <div class="form-group">
                  <label for="nik">NIK</label>
                  <input type="text" class="form-control" id="id_usrnik" placeholder="Ketik NIK" value="<?=$row->id_user?>" readonly="readonly">
                </div>
       
                <div class="form-group">
                  <label for="email">Email address</label>
                  <input type="email" class="form-control" id="id_usremail" placeholder="Enter email" value="<?=$row->email?>">
                </div>
                <div class="form-group">
                  <label for="Password">Password</label>
                  <input type="password" class="form-control" id="id_usrpass" placeholder="Password" value="<?=$row->pass?>">
                </div>
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control" id="id_usrnama" placeholder="Ketik Nama" value="<?=$row->nama?>">
                </div>
                <div class="form-group">
                    <label for="level">Level</label>
                    <select id="id_usrlevel" class="form-control">
                        <option selected="selected"><?=$row->level?></option>
                        <option>Administrasi</option>
                        <option>SPV</option>
                    </select>
                </div>          
              </div>          
            </div>
            <div class="modal-footer">
                <button id="id_usrbtn" type="button" class="btn btn-primary" onclick="UpdUser()">Save changes</button>
            </div>
			<?php
		}
	}
	
	public function editusr(){
		$this->load->model('mcrudusr');
		$query = $this->mcrudusr->updateusr();	
	}
	
	public function saveusr(){
		$this->load->model('mcrudusr');
		$query = $this->mcrudusr->insertusr();
	}
	
	public function delusr(){
		$this->load->model('mcrudusr');
		$query = $this->mcrudusr->deleteusr();
	}

}
?>