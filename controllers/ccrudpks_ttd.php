	<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ccrudpks_ttd extends CI_Controller {

	/* i. function construct */
	function __construct(){
		parent::__construct();
    $this->load->helper(array('form', 'url'));
	}
	
	function showpks(){
		?>
		 <table id="example1" class="table table-bordered table-striped">
            <thead>
            	<tr>
              	  <th width="2%">No</th>
                  <th width="15%">Nomor PKS</th>
                  <th width="20%">Corporate</th>
                  <th width="15%">TTD Pimpinan Corporate</th>
                  <th width="10%">TTD PIC Corporate</th>
                  <th width="15%">TTD Pimpinan Telkomsel</th>
                  <th width="10%">TTD PIC Corporate</th>
                  <th width="10%">FILE PDF</th>
                  <th width="3%">EDIT</th>
           	 	</tr>
            </thead>
          <tbody>      
            <?php
			  $this->load->model('mcrudpks');
       		  $query = $this->mcrudpks->selectpks_ttd();
			  $i = 1;
			  foreach($query->result() as $row){
			  	?>
				<tr>
                  <td><?php echo $i ?></td>
                  <td><?php echo $row->nomor_pks ?></td>
                  <td><?php echo $row->nama_corporate ?></td>
                  <td><?php echo $row->sign_pimpinan_corporate ?></td>
                  <td><?php echo $row->sign_pic_corporate ?></td>
                  <td><?php echo $row->sign_pic_telkomsel?></td>
                  <td><?php echo $row->sign_pimpinan_telkomsel ?></td>
                  <td><?php echo $row->file_pdf ?></td>
                  <td>
                    <button onclick="EditPks('<?=$row->id_pks?>')" type="button" class="btn btn-primary btn-xs">TTD
                    </button>
                    <button onclick="UploadPks('<?=$row->id_pks?>')" type="button" class="btn btn-primary btn-xs">PDF
                    </button>
                  </td> 			                  
                </tr>
        <?php
        $i++;
        } 
        ?>               
        </table>
    <?php
  }  

  public function showeditpks(){
    $this->load->model('mcrudpks');
    $query=$this->mcrudpks->select1pks();
    foreach($query->result() as $row){
    ?>  
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">EDIT SIRKULASI TANDA TANGAN</h4>
      </div>
        <div class="modal-body">
          <div class="form-group" style="display: inline-flex">
            <label for="Sign sequencial priority">Signing sequencial priority:</label><br>
            <input type="checkbox" id="id_CbxSignCor1" name="Cbxpks" value="T" <?=$row->sign_pimpinan_corporate == 'T' ? 'checked' : '' ?>>&nbsp;&nbsp;pimpinan corporate
            <input type="checkbox" id="id_CbxSignCor2" name="Cbxpks" value="T" <?=$row->sign_pic_corporate == 'T' ? 'checked' : '' ?>>&nbsp;&nbsp;pic corporate
            <input type="checkbox" id="id_CbxSignTel1" name="Cbxpks" value="T" <?=$row->sign_pimpinan_telkomsel  == 'T' ? 'checked' : '' ?>>&nbsp;&nbsp;pimpinan telkomsel
            <input type="checkbox" id="id_CbxSignTel2" name="Cbxpks" value="T" <?=$row->sign_pic_telkomsel == 'T' ? 'checked' : '' ?>>  pic telkomsel
          </div>  
        </div>
    <div class="modal-footer">
         <button id="id_pksupbtn" type="button" class="btn btn-primary" onclick="UpdPks(<?=$row->id_pks?>)">Save changes</button>
    </div>
    <?php
    }
  }

  public function showupload(){
    $this->load->model('mcrudpks');
    $query=$this->mcrudpks->select1pks();
    foreach($query->result() as $row){
    ?>  
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">EDIT FILE PDF PKS</h4>
      </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="exampleInputFile">File input</label>
            <input type="file" id="inputpdf" name="inputpdf">
              <p class="help-block">Upload File Hanya berformat .pdf</p>
          </div>        
        </div>
    <div class="modal-footer">
         <button id="id_pksupbtn1" type="button" class="btn btn-primary" onclick="UpdPks1(<?=$row->id_pks?>)">Save changes</button>
    </div>
    <?php
    }
  }

  public function editpks(){
    $this->load->model('mcrudpks');
    $query = $this->mcrudpks->updatepks_ttd();
  }

  public function editupload(){
    $config['upload_path'] = './application/file/pdfpks';
    $config['allowed_types'] = 'pdf';
    $config['max_size']  = '';
    $config['max_width']  = '';
    $config['max_height']  = '100000';
 
    $this->load->library('upload', $config);
    $this->upload->do_upload('inputpdf');

    $this->load->model('mcrudpks');
    $query = $this->mcrudpks->updatepks_pdf();
  }

}
?>