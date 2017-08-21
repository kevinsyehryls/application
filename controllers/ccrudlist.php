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
    <?php
       $frmattributes = array(
       "id" => "id_FrmAddList",
       "name" => "FrmAddList"
       );
      echo form_open('cpage/hallist',$frmattributes);
    ?>
         <div class="modal-body">
      	  <div class="box-body">
            <div class="form-group">
              <label for="list">ID List</label>
              <input type="text" class="form-control" id="id_list" name="id_list" placeholder="Ketik Id" required>
              <label for="id_list" class="error"></label>
            </div>
             <div class="form-group">
              <label for="corp">Corporate</label>
              <select id="id_listcorp" class="form-control" name="id_listcorp" required>
              <label for="id_listcorp" class="error"></label>
                    <option>---- PILIH CORPORATE ----</option>
                     <?php
                    $this->load->model('mcrudlist');
       		  		$query = $this->mcrudlist->relcorp();
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
              <input type="number" class="form-control" id="id_listmsisdn" name="id_listmsisdn" placeholder="Ketik Msisdn" required>
              <label for="id_listmsisdn" class="error"></label>
            </div>
            <div class="form-group">
              <label for="user">User</label>
              <input type="text" class="form-control" id="id_listuser" name="id_listuser" placeholder="Ketik User" required>
              <label for="id_listuser" class="error"></label>
            </div>
            <div class="form-group">
              <label for="div">Division</label>
              <input type="text" class="form-control" id="id_listdiv" name="id_listdiv" Placeholder="Ketik Division" required>
              <label for="id_listdiv" class="error"></label>
            </div>
            <div class="form-group">
              <label for="short">Short Code</label>
              <input type="text" class="form-control" id="id_listshort" name="id_listshort" placeholder="Ketik Short Code" required>
              <label for="id_listshort" class="error"></label>
            </div>
            <div class="form-group">
              <label for="des">Deskripsi</label>
              <input type="text" class="form-control" id="id_listdes" name="id_listdes" placeholder="Ketik Deskripi" required>
              <label for="id_listdes" class="error"></label>
            </div>                 
          </div>          
		</div>
      <div class="modal-footer">
      <button id="id_listbtn" type="button" class="btn btn-primary">Save</button>
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
                &nbsp;&nbsp;&nbsp;<a href='#' onclick='ShowCbxCorpTlk()' id="id_aCorTsel">
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
                    <select id='id_SelCorpTlk' style="display: none">
                        <?php
                        $this->load->model('mcrudlist');
						$query2 = $this->mcrudlist->selectcorp();
						foreach($query2->result() as $row2){
						?>
                        <option value="<?=$row2->id_corporate?>"><?=$row2->nama_corporate?></option>
                        <?php
						}
						?>
                    </select>&nbsp;&nbsp;&nbsp;
                    <button id="id_BtnSvSelCorpTlk" type="button" class="btn btn-primary btn-xs" onclick="id_BtnSvSelCorpTlk()" style="display: none">Save</button>&nbsp;&nbsp;&nbsp;
                    <button id="id_BtnCxSelCorpTlk" type="button" class="btn btn-primary btn-xs" onclick="id_BtnCxSelCorpTlk()" style="display: none">Cancel</button>
                </div>
             </div>
            <div class="form-group">
              <label for="msisdn">Msisdn</label>
              <input type="text" class="form-control" id="id_listmsisdn" placeholder="Ketik Msisdn" value="<?=$row1->msisdn?>">
            </div>
            <div class="form-group">
              <label for="user">User</label>
              <input type="text" class="form-control" id="id_listuser" placeholder="Ketik User" value="<?=$row1->user?>">
            </div>
            <div class="form-group">
              <label for="div">Division</label>
              <input type="text" class="form-control" id="id_listdiv" placeholder="Ketik Division" value="<?=$row1->division?>">
            </div>
            <div class="form-group">
              <label for="short">Short Code</label>
              <input type="text" class="form-control" id="id_listshort" placeholder="Ketik Short Code" value="<?=$row1->short_code?>">
            </div>
            <div class="form-group">
              <label for="des">Deskripsi</label>
              <input type="text" class="form-control" id="id_listdes" placeholder="Ketik Deskripi" value="<?=$row1->deskripsi?>">
            </div>                 
          </div>
          <div class="modal-footer">
           <button id="id_listbtn" type="button" class="btn btn-primary" onclick="UpdList()">Save changes</button>
          </div>
		<?php
		}	
	}
		public function editlistcorp(){
		$this->load->model('mcrudlist');
		$query = $this->mcrudlist->updatelistcorp();	
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
		/* update inline CORP telkomsel */
    	public function updinline_cortsel(){
        $id_list = $this->input->post('id_list');
        $id_SelCorpTlk = $this->input->post('id_SelCorpTlk');
        $id_SelCorpTlkTxt = $this->input->post('id_SelCorpTlkTxt');
        /*alert("update tb_pks set id_corporate = " + id_SelCorpTlk + " where id_pks = "  +  id_pks);*/
        $data = array(
            'id_corporate' => $id_SelCorpTlk
        );
        $query = $this->db->where('id_list_msisdn', $id_list)
                      ->update('tb_list_nomor', $data);
        $affrows = $this->db->affected_rows();
        if ($affrows > 0){
            echo $id_SelCorpTlkTxt;
        }
    }
}
?>