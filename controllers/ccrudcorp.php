	<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ccrudcorp extends CI_Controller {

	/* i. function construct */
	function __construct(){
		parent::__construct();
	}
	
	function showcorp(){
		?>
		 <table id="example1" class="table table-bordered table-striped">
            <thead>
            	<tr>
              	  <th width="2%">No</th>
                  <th width="10%">Id Corporate</th>
                  <th width="10%">Nama Corporate</th>
                  <th width="10%">Nama Pimpinan</th>
                  <th width="10%">Jabatan Pimpinan</th>
                  <th width="10%">Nama PIC</th>
                  <th width="10%">Jabatan PIC</th>
                  <th width="8%">Handphone PIC</th>
                  <th width="10%">Email PIC</th>
                  <th width="10%">Alamat</th>
                  <th width="10%">Opsi</th>
           	 	</tr>
            </thead>
          <tbody>      
            <?php
			  $this->load->model('mcrudcorp');
       		  $query = $this->mcrudcorp->selectcorp();
			  $i = 1;
			  foreach($query->result() as $row){
			  	?>
				<tr>
                  <td><?php echo $i ?></td>
                  <td><?php echo $row->id_corporate ?></td>
                  <td><?php echo $row->nama_corporate ?></td>
                  <td><?php echo $row->nama_pimpinan_corporate ?></td>
                  <td><?php echo $row->jabatan_pimpinan_corporate ?></td>
                  <td><?php echo $row->nama_pic_corporate ?></td>
                  <td><?php echo $row->jabatan_pic_corporate ?></td>
                  <td><?php echo $row->nomor_hp_pic_corporate ?></td>
                  <td><?php echo $row->email_pic_corporate ?></td>
                  <td><?php echo $row->alamat_corporate ?></td>


                  <td>
                    <button onclick="EditCorp('<?=$row->id_corporate?>')" type="button" class="btn btn-primary btn-xs">Edit</button>
                    <button onclick="DelCorp('<?=$row->id_corporate?>')" type="button" class="btn btn-primary btn-xs">Delete</button>
                  </td> 			                  
                </tr>
				<?php
				$i++;
			  } 
			  ?>               
        </table>
		<?php
	}
	
	function addcorp(){
		?>
		<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span></button>
            <h4 class="modal-title">TAMBAH PIMPINAN</h4>
          </div>
          <div class="modal-body">
        
      	  <div class="box-body">
            <div class="form-group">
              <label for="nik">ID Corporate</label>
              <input type="text" class="form-control" id="id_corp" placeholder="Ketik Id Corporate">
            </div>
            <div class="form-group">
              <label for="nama">Nama Corporate</label>
              <input type="text" class="form-control" id="id_corpnama" placeholder="Ketik Nama Corporate">
            </div>
            <div class="form-group">
              <label for="alamat">Alamat Corporate</label>
              <textarea class="form-control" rows="3" id="id_corpalmt" placeholder="Ketik Alamat"></textarea>
            </div>   
             <div class="form-group">
              <label for="pimpinan">Nama Pimpinan</label>
              <input type="text" class="form-control" id="id_corpnamapn" placeholder="Ketik Nama Pimpinan">
            </div> 
            <div class="form-group">
              <label for="jabatanpi">Jabatan Pimpinan</label>
              <input type="text" class="form-control" id="id_corpjbtpn" placeholder="Ketik Jabatan Pimpinan">
            </div> 
             <div class="form-group">
              <label for="pic">Nama PIC</label>
              <input type="text" class="form-control" id="id_corpnamapi" placeholder="Ketik Nama PIC">
            </div> 
            <div class="form-group">
              <label for="jabatanpi">Jabatan PIC</label>
              <input type="text" class="form-control" id="id_corpjbtpi" placeholder="Ketik Jabatan PIC">
            </div>  
             <div class="form-group">
              <label for="nohp">Nomor HP PIC</label>
              <input type="text" class="form-control" id="id_corpnohp" placeholder="Ketik Nomor HP">
            </div>    
             <div class="form-group">
              <label for="email">Alamat Email PIC</label>
              <input type="text" class="form-control" id="id_corpemail" placeholder="Ketik Email PIC">
            </div>     
              <div class="form-group">
              <label for="notlpn">Nomor Tlpn Kantor</label>
              <input type="text" class="form-control" id="id_corpnotlpn" placeholder="Ketik No Tlpn Kantor">
            </div>           
          </div>          
		</div>
        <div class="modal-footer">
             <button id="id_corpbtn" type="button" class="btn btn-primary">Save</button>
          </div>
		<?php
	}
	
		public function showeditcorp(){
		$this->load->model('mcrudcorp');
		$query=$this->mcrudcorp->select1corp();
		foreach($query->result() as $row){
		?>  
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span></button>
            <h4 class="modal-title">EDIT CORPORATE</h4>
          </div>
          <div class="modal-body">
        
      	  <div class="box-body">
            <div class="form-group">
              <label for="nik">ID Corporate</label>
              <input type="text" class="form-control" id="id_corp" placeholder="Ketik Id Corporate" value="<?=$row->id_corporate?>" readonly="readonly">
            </div>
            <div class="form-group">
              <label for="nama">Nama Corporate</label>
              <input type="text" class="form-control" id="id_corpnama" placeholder="Ketik Nama Corporate" value="<?=$row->nama_corporate?>">
            </div>
            <div class="form-group">
              <label for="alamat">Alamat Corporate</label>
              <textarea class="form-control" rows="3" id="id_corpalmt" placeholder="Ketik Alamat" ><?=$row->alamat_corporate?></textarea>
            </div>   
             <div class="form-group">
              <label for="pimpinan">Nama Pimpinan</label>
              <input type="text" class="form-control" id="id_corpnamapn" placeholder="Ketik Nama Pimpinan" value="<?=$row->nama_pimpinan_corporate?>">
            </div> 
            <div class="form-group">
              <label for="jabatanpi">Jabatan Pimpinan</label>
              <input type="text" class="form-control" id="id_corpjbtpn" placeholder="Ketik Jabatan Pimpinan" value="<?=$row->jabatan_pimpinan_corporate?>">
            </div> 
             <div class="form-group">
              <label for="pic">Nama PIC</label>
              <input type="text" class="form-control" id="id_corpnamapi" placeholder="Ketik Nama PIC" value="<?=$row->nama_pic_corporate?>">
            </div> 
            <div class="form-group">
              <label for="jabatanpi">Jabatan PIC</label>
              <input type="text" class="form-control" id="id_corpjbtpi" placeholder="Ketik Jabatan PIC" value="<?=$row->jabatan_pic_corporate?>">
            </div>  
             <div class="form-group">
              <label for="nohp">Nomor HP PIC</label>
              <input type="text" class="form-control" id="id_corpnohp" placeholder="Ketik Nomor HP" value="<?=$row->nomor_hp_pic_corporate?>">
            </div>    
             <div class="form-group">
              <label for="email">Alamat Email PIC</label>
              <input type="text" class="form-control" id="id_corpemail" placeholder="Ketik Email PIC" value="<?=$row->email_pic_corporate?>">
            </div>     
              <div class="form-group">
              <label for="notlpn">Nomor Tlpn Kantor</label>
              <input type="text" class="form-control" id="id_corpnotlpn" placeholder="Ketik No Tlpn Kantor" value="<?=$row->nomor_tlp_kantor?>">
            </div>           
          </div>          
		</div>
        <div class="modal-footer">
             <button id="id_corpbtn" type="button" class="btn btn-primary" onclick="UpdCorp()">Save changes</button>
          </div>
		<?php
		}
	}
		public function editcorp(){
		$this->load->model('mcrudcorp');
		$query = $this->mcrudcorp->updatecorp();
	}
		public function savecorp(){
		$this->load->model('mcrudcorp');
		$query = $this->mcrudcorp->insertcorp();
	}
	
		public function delcorp(){
		$this->load->model('mcrudcorp');
		$query = $this->mcrudcorp->deletecorp();
		
		
	}
}
?>