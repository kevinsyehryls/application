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
                  <th width="13%">Corporate</th>
                  <th width="15%">TTD Pimpinan Corporate</th>
                  <th width="10%">TTD PIC Corporate</th>
                  <th width="15%">TTD Pimpinan Telkomsel</th>
                  <th width="10%">TTD PIC Corporate</th>
                  <th width="10%">FILE PDF</th>
                  <th width="10%">EDIT</th>
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
          <td><input type="checkbox" <?php echo ($row->sign_pimpinan_corporate=='T'?'checked="checked"':'') ?> ></td>
          <td><input type="checkbox" <?php echo ($row->sign_pic_corporate=='T'?'checked="checked"':'') ?> ></td>
          <td><input type="checkbox" <?php echo ($row->sign_pic_telkomsel=='T'?'checked="checked"':'') ?> ></td>
          <td><input type="checkbox" <?php echo ($row->sign_pimpinan_telkomsel=='T'?'checked="checked"':'') ?> ></td>
          <td>
              <a href="<?php echo base_url(); ?>application/upload/<?=$row->file_pdf.'.pdf'?>" download="<?=$row->file_pdf.'.pdf'?>"><?=$row->file_pdf?></a>
          </td>
          <td>
            <button onclick="EditPks('<?=$row->id_pks?>')" type="button" class="btn btn-primary btn-xs">TTD</button>
              &nbsp;
            <button onclick="UploadPks('<?=$row->id_pks?>')" type="button" class="btn btn-primary btn-xs">PDF</button>
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
                <h4 class="modal-title">Upload PDF</h4>
            </div>
            <div class="modal-body" style="display: inline-flex">
                <input type="file" id="file" name="file" accept="application/pdf"/> <button id="upload">Upload</button>
                <span id="msg"></span>
            </div>
            <?php
        }
    }

    
    public function editpks(){
        $this->load->model('mcrudpks');
        $query = $this->mcrudpks->updatepks_ttd();
    }
    function upload_file($id_pks) {
        //upload file
        $config['upload_path'] = './application/upload';
        $config['allowed_types'] = '*';
        $config['max_filename'] = '255';
        $config['file_name'] = "PKS_" . $id_pks;
        $config['max_size'] = '10000'; //10 MB
        // jika file exists
        if (isset($_FILES['file']['name'])) {
            // jika file corupt
            if (0 < $_FILES['file']['error']) {
                echo 'Error during file upload' . $_FILES['file']['error'];
            } else {
                // jika file sudah ter-upload
                if (file_exists('uploads/' . $_FILES['file']['name'])) {
                    echo 'File already exists : uploads/' . $_FILES['file']['name'];
                } else {
                    $this->load->library('upload', $config);
                    // jika file gagal ter-upload
                    if (!$this->upload->do_upload('file')) {
                        echo $this->upload->display_errors();
                    } else {
                        echo 'File successfully uploaded ' . $_FILES['file']['name'];
                        // update table tb_pks
                        $datapdf = array("file_pdf" => $config['file_name']);
                        $this->db->where("id_pks", $id_pks);
                        $this->db->update("tb_pks", $datapdf);
                    }
                }
            }
        } else {
            echo 'Please choose a file';
        }
    }
}
?>