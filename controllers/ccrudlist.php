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
                <th width="20%">Msisdn</th>
                <th width="20%">User </th>
                <th width="20%">Deskripsi</th>
             	 	<th width="20%">Corporate</th>
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
                  <td><?php echo $row->msisdn ?></td>
                  <td><?php echo $row->user ?></td>
                  <td><?php echo $row->deskripsi ?></td>
                  <td><?php echo $row->nama_corporate ?></td>
                  <td>
                    <button onclick="EditList('<?=$row->id_list_msisdn?>')" type="button" class="btn btn-primary btn-xs">Edit</button>
                    <button onclick="DelList('<?=$row->id_list_msisdn?>')" type="button" class="btn btn-primary btn-xs">Hapus</button>
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

  public function upldlist(){
  ?>
    <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span></button>
            <h4 class="modal-title">UPLOAD LIST NOMOR</h4>
    </div>
    <?php
       $frmattributes = array(
       "id" => "id_FrmUpldList",
       "name" => "FrmUpldList"
       );
      echo form_open('cpage/hallist',$frmattributes);
    ?>
      <div class="modal-body">
          <div class="box-body">
            <div class="form-group">
              <label for="div">Mohon Upload File Dengan Format Yang Sudah Disediakan</label>
            </div>
            
            <div class="form-group">
                  <label for="exampleInputFile">Upload File excel dibawah ini</label>
                  <input type="file" id="upldexcel" name="upldexcel" required>
                  <p class="help-block">Upload File harus menggunakan Template <a href="<?php echo base_url(); ?>application/file/draftupldlist.xls"> Berikut.</a></p>
            </div>                 
          </div>          
    </div>
      <div class="modal-footer">
      <button id="id_btn_upld" type="button" class="btn btn-primary">Upload</button>
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

   /* import csv */
    public function proc_imp() {
        ini_set('max_execution_time', 600); //600 seconds = 60 minutes
        ini_set('memory_limit', '-1'); // overide memory limit of php.ini
        $row = 1; // utk skip header table
        $rcount = 0; // utk count jumlah baris data
        if(!empty($_FILES['csv']['size']) && $_FILES['csv']['size'] > 0){
            ?><span id="id_PrgFnm"></span><br>
            <progress id="id_progress" value="0" max="100"></progress><?php
            ob_implicit_flush(true);
            
            /* begin iteration */
            $file = $_FILES['csv']['tmp_name'];
            $handle = fopen($file,"r");
            while ($data = fgetcsv($handle,100000,",","'")){
                if($row == 1){ $row++; continue; } // skip the header table on excel.
                if ($data[0]) {
                    $this->load->model('mcrudlist');                   
                    $this->mcrudlist->insert_import_list($data);
                }
                // handle progress bar while inserting...
                $filenm = $_FILES['csv']['name'];
                $prgttl = count(file($_FILES['csv']['tmp_name'])) - 1; // hitung ttl row tanpa header
                $prgite = $rcount + 1;
                $prgval = ($prgite/$prgttl) * 100;
                ?><script>
                    /* update progress bar */
                    $("#id_PrgFnm").html('Uploading <em><?=$filenm?></em> ... <b><?=round($prgval)?>%</b>');
                    $("#id_progress").val(<?=$prgval?>); // update progressbar
                    /* disabled element while progress */
                    $('#id_btnImps').prop('disabled','disabled');
                    $('#csv').prop('disabled','disabled');
                    $('#id_BtnModClose').hide();
                </script><?php
                flush();
                ob_flush();
                usleep(500); // 1000000 = 1 second
                $rcount++;
            }
            /* after progress is complete */
            ?><script>
                $('#id_btnImps').prop('disabled',false);
                $('#csv').prop('disabled',false);
                $("#id_PrgFnm").html('Selesai, <?=$rcount?> data di-<em>import</em>.');
                $('#id_BtnModClose').show();
                $('#id_PrgFnm, #id_progress').fadeOut(30000);
            </script><?php
            exit();
        } else {
            echo "Gagal! (File berukuran 0 kb/belum dipilih)";
        }
    }
}
?>