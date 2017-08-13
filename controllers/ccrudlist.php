<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ccrudlist extends CI_Controller {

	/* i. function construct */
	function __construct(){
		parent::__construct();
	}
	
	function showlist(){
		?>
		 <table id="example1" class="table table-bordered table-striped">
            <thead>
            	<tr>
              		<th width="5%">No</th>
             		<th width="10%">Id Msisdn</th>
             	 	<th width="20%">Corporate</th>
             	 	<th width="20%">MSISDN</th>
             	 	<th width="20%">User </th>
                <th width="20%">Kelola </th>
           	 	</tr>
            </thead>
          <tbody>      
            <?php
			  $this->load->model('mcrudlist');
       		  $query = $this->mcrudlist->selectlist();
			  $i = 1;
			  foreach($query->result() as $row){
			  	?>
				<tr>
                  <td><?php echo $i ?></td>
                  <td><?php echo $row->id_list_msisdn ?></td>
                  <td><?php echo $row->nama_corporate ?></td>
                  <td><?php echo $row->msisdn ?></td>
                  <td><?php echo $row->user ?></td>
                  <td>
                    <button onclick="EditList('<?=$row->id_list_msisdn?>')" type="button" class="btn btn-primary btn-xs">Edit</button>
                    <button onclick="DelList('<?=$row->id_list_msisdn?>')" type="button" class="btn btn-primary btn-xs">Delete</button>
                  </td> 			                  
                </tr>
				<?php
				$i++;
			  } 
			  ?>               
        </table>
		<?php
	}
	
	public function addlist(){
		?>
		<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span></button>
            <h4 class="modal-title">TAMBAH LIST NOMOR</h4>
          </div>
         <div class="modal-body">
        
      	  <div class="box-body">
            <div class="form-group">
              <label for="list">ID List</label>
              <input type="text" class="form-control" id="id_list" placeholder="Ketik Id">
            </div>
             <div class="form-group">
              <label for="corp">Corporate</label>
              <select id="id_listcorp" class="form-control">
                    <option>---- PILIH CORPORATE ----</option>
                     <?php
                    $this->load->model('mcrudpks');
       		  		$query = $this->mcrudpks->relcorp();
			  		foreach($query->result() as $row){
						?>
						<option value="<?=$row->id_corporate?>"><?=$row->nama_corporate?></option>
						<?php	
					}
					?>
              </select>
            </div> 
            <div class="form-group">
              <label for="msisdn">Msisdn</label>
              <input type="text" class="form-control" id="id_listmsisdn" placeholder="Ketik Msisdn">
            </div>
            <div class="form-group">
              <label for="user">User</label>
              <input type="text" class="form-control" id="id_listuser" placeholder="Ketik User">
            </div>
            <div class="form-group">
              <label for="div">Division</label>
              <input type="text" class="form-control" id="id_listdiv" placeholder="Ketik Division">
            </div>
            <div class="form-group">
              <label for="short">Short Code</label>
              <input type="text" class="form-control" id="id_listshort" placeholder="Ketik Short Code">
            </div>
            <div class="form-group">
              <label for="des">Deskripsi</label>
              <input type="text" class="form-control" id="id_listdes" placeholder="Ketik Deskripi">
            </div>                 
          </div>          
		</div>
          <div class="modal-footer">
           <button id="id_listbtn" type="button" class="btn btn-primary">Save</button>
          </div>
		<?php
	}
	
	public function showeditlist(){
		$this->load->model('mcrudlist');
		$query=$this->mcrudlist->select1list();
		foreach($query->result() as $row){
			?>
		<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span></button>
            <h4 class="modal-title">EDIT LIST NOMOR</h4>
          </div>
         <div class="modal-body">
        <div class="form-group">
              <label for="nik">ID List</label>
              <input type="text" class="form-control" id="id_list" placeholder="Ketik Id" value="<?=$row->id_list_msisdn?>" readonly="readonly">
            </div>
            <div class="form-group">
                <label for="corp">Corporate</label>
                &nbsp;&nbsp;&nbsp;<a href='#' onclick='ShowCbxList()'>
                	<?php
					$id_list = $this->input->post('id_list');
                    $query1 = $this->db->query("
						select
						*
						from tb_corporate a
						join `tb_list_nomor` b on a.`id_corporate` = b.`id_corporate`
						where b.id_list_msisdn= '$id_list'
					");
					foreach($query1->result() as $row1){
						echo $row1->nama_corporate;
					}
					?>
                </a><br>	
                <div style="display:inline-flex">
                    <select id='id_SelList' style="display: none">
                        <?php
                        $this->load->model('mcrudlist');
						$query = $this->mcrudlist->selectlist();
						foreach($query->result() as $row){
						?>
                        <option value="<?=$row->id_corporate?>"><?=$row->nama_corporate?></option>
                        <?php
						}
						?>
                    </select>&nbsp;&nbsp;&nbsp;
                    <button id="id_BtnSvSelList" type="button" class="btn btn-primary btn-xs" onclick="id_BtnSvSelList()" style="display: none">Save</button>&nbsp;&nbsp;&nbsp;
                    <button id="id_BtnCxSelList" type="button" class="btn btn-primary btn-xs" onclick="id_BtnCxSelList()" style="display: none">Cancel</button>
                </div>
            </div>   
            <div class="form-group">
              <label for="msisdn">Msisdn</label>
              <input type="text" class="form-control" id="id_listmsisdn" placeholder="Ketik Msisdn" value="<?=$row->msisdn?>">
            </div>
            <div class="form-group">
              <label for="user">User</label>
              <input type="text" class="form-control" id="id_listuser" placeholder="Ketik User" value="<?=$row->user?>">
            </div>
            <div class="form-group">
              <label for="div">Division</label>
              <input type="text" class="form-control" id="id_listdiv" placeholder="Ketik Division" value="<?=$row->division?>">
            </div>
            <div class="form-group">
              <label for="short">Short Code</label>
              <input type="text" class="form-control" id="id_listshort" placeholder="Ketik Short Code" value="<?=$row->short_code?>">
            </div>
            <div class="form-group">
              <label for="des">Deskripsi</label>
              <input type="text" class="form-control" id="id_listdes" placeholder="Ketik Deskripi" value="<?=$row->deskripsi?>">
            </div>                 
          </div>
          <div class="modal-footer">
           <button id="id_listbtn" type="button" class="btn btn-primary" onclick="UpdList()">Save changes</button>
          </div>
		<?php
		}	
	}
		public function editlist(){
		$this->load->model('mcrudlist');
		$query = $this->mcrudlist->updatelist();	
	}
		public function savelist(){
		$this->load->model('mcrudlist');
		$query = $this->mcrudlist->insertlist();
	}
		public function dellist(){
		$this->load->model('mcrudlist');
		$query = $this->mcrudlist->deletelist();
		
		
	}
}
?>