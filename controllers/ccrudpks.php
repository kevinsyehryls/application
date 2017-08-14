	<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ccrudpks extends CI_Controller {

	/* i. function construct */
	function __construct(){
		parent::__construct();
	}
	
	function showpks(){
		?>
		 <table id="example1" class="table table-bordered table-striped">
            <thead>
            	<tr>
              	  <th width="5%">No</th>
                  <th width="15%">Nomor PKS</th>
                  <th width="20%">Nama Corporate</th>
                  <th width="15%">Nama Pimpinan</th>
                  <th width="15%">Nama PIC</th>
                  <th width="10%">PIC Telkomsel</th>
                  <th width="5%">Start Date</th>
                  <th width="5%">End Date</th>
                  <th width="10%">Opsi</th>
           	 	</tr>
            </thead>
          <tbody>      
            <?php
			  $this->load->model('mcrudpks');
       		  $query = $this->mcrudpks->selectpks();
			  $i = 1;
			  foreach($query->result() as $row){
			  	?>
				<tr>
                  <td><?php echo $i ?></td>
                  <td><?php echo $row->nomor_pks ?></td>
                  <td><?php echo $row->nama_corporate ?></td>
                  <td><?php echo $row->nama_pimpinan_corporate ?></td>
                  <td><?php echo $row->nama_pic_corporate ?></td>
                  <td><?php echo $row->nama_pic_telkomsel?></td>
                  <td><?php echo $row->start_date ?></td>
                  <td><?php echo $row->end_date ?></td>
                  <td>
                    <button onclick="EditPks('<?=$row->id_pks?>')" type="button" class="btn btn-primary btn-xs">Edit</button>
                    <button onclick="DelPks('<?=$row->id_pks?>')" type="button" class="btn btn-primary btn-xs">Delete</button>
                  </td> 			                  
                </tr>
				<?php
				$i++;
			  } 
			  ?>               
        </table>
		<?php
	}
	
	function addpks(){
		?>
		<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span></button>
            <h4 class="modal-title">TAMBAH PKS</h4>
          </div>
          <div class="modal-body">
        
      	 <div class="box-body">
            <div class="form-group">
              <label for="pksid">ID PKS</label>
              <input type="text" class="form-control" id="id_pks" placeholder="Ketik Id Corporate">
            </div>
            <div class="form-group">
              <label for="nomor">Nomor PKS</label>
              <input type="text" class="form-control" id="id_pksno" placeholder="Ketik Nama Corporate">
            </div>
            <div class="form-group">
            <label for="pimpinan">Pimpinan Telkomsel</label>
            	<select id="id_pksppn" class="form-control">
                    <option>---- PILIH PIMPINAN ----</option>
                    <?php
                    $this->load->model('mcrudpks');
       		  		$query = $this->mcrudpks->relpimpinan();
			  		foreach($query->result() as $row){
						?>
						<option value="<?=$row->id_pimpinan_telkomsel?>"><?=$row->nama_pimpinan_telkomsel?></option>
						<?php	
					}
					?>
             	</select>
            </div>   
             <div class="form-group">
              <label for="pic">PIC Telkomsel</label>
              <select id="id_pkspic" class="form-control">
                    <option>---- PILIH PIC ----</option>
                    <?php
                    $this->load->model('mcrudpks');
       		  		$query = $this->mcrudpks->relpic();
			  		foreach($query->result() as $row){
						?>
						<option value="<?=$row->id_pic_telkomsel?>"><?=	$row->nama_pic_telkomsel?></option>
						<?php	
					}
					?>
              </select>
            </div> 
            <div class="form-group">
              <label for="corp">Corporate</label>
              <select id="id_pkscorp" class="form-control">
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
                <label for="start">Start Date</label>
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="id_pksst">
                </div>
            </div>
            <div class="form-group">
                <label for="end">End Date</label>
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="id_pksen">
                </div>
            </div>
            <div class="form-group" style="display: inline-flex">
                <label for="Sign sequencial priority">Signing sequencial priority:</label><br>
                <input type="checkbox" id="id_CbxSignCor1" name="Cbxpks" value="T">&nbsp;&nbsp;pimpinan corporate
                <input type="checkbox" id="id_CbxSignCor2" name="Cbxpks" value="T">&nbsp;&nbsp;pic corporate
                <input type="checkbox" id="id_CbxSignTel1" name="Cbxpks" value="T">&nbsp;&nbsp;pimpinan telkomsel
                <input type="checkbox" id="id_CbxSignTel2" name="Cbxpks" value="T">&nbsp;&nbsp;pic telkomsel
            </div>
          </div>          
		</div>
        <div class="modal-footer">
             <button id="id_pkspbtn" type="button" class="btn btn-primary">Save changes</button>
          </div>
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
            <h4 class="modal-title">EDIT PKS</h4>
          </div>
          <div class="modal-body">
      	  <div class="box-body">
            <div class="form-group">
              <label for="pksid">ID PKS</label>
              <input type="text" class="form-control" id="id_pks" placeholder="Ketik Id Corporate"  value="<?=$row->id_pks?>" readonly="readonly">
            </div>
            <div class="form-group">
              <label for="nomor">Nomor PKS</label>
              <input type="text" class="form-control" id="id_pksno" placeholder="Ketik Nama Corporate" value="<?=$row->nomor_pks?>">
            </div>
            <div class="form-group">
                <label for="pimpinan">Pimpinan Telkomsel</label>
                &nbsp;&nbsp;&nbsp;<a href='#' onclick='ShowCbxPimpTlk()'>
                	<?php
					$id_pks = $this->input->post('id_pks');
                    $query1 = $this->db->query("
						select
						*
						from tb_pimpinan_telkomsel a
						join `tb_pks` b on a.`id_pimpinan_telkomsel` = b.`id_pimpinan_telkomsel`
						where b.id_pks = '$id_pks'
					");
					foreach($query1->result() as $row1){
						echo $row1->nama_pimpinan_telkomsel;
					}
					?>
                </a><br>	
                <div style="display:inline-flex">
                    <select id='id_SelPimpTlk' style="display: none">
                        <?php
                        $this->load->model('mcrudpks');
						$query2 = $this->mcrudpks->selectppn();
						foreach($query2->result() as $row2){
						?>
                        <option value="<?=$row2->id_pimpinan_telkomsel?>"><?=$row2->nama_pimpinan_telkomsel?></option>
                        <?php
						}
						?>
                    </select>&nbsp;&nbsp;&nbsp;
                    <button id="id_BtnSvSelPimpTlk" type="button" class="btn btn-primary btn-xs" onclick="id_BtnSvSelPimpTlk()" style="display: none">Save</button>&nbsp;&nbsp;&nbsp;
                    <button id="id_BtnCxSelPimpTlk" type="button" class="btn btn-primary btn-xs" onclick="id_BtnCxSelPimpTlk()" style="display: none">Cancel</button>
                </div>
            </div>   
            <div class="form-group">
                <label for="pic">PIC Telkomsel</label>
                &nbsp;&nbsp;&nbsp;<a href='#' onclick='ShowCbxPicTlk()'>
                	<?php
					$id_pks = $this->input->post('id_pks');
                    $query3 = $this->db->query("
						select
						*
						from tb_pic_telkomsel a
						join `tb_pks` b on a.`id_pic_telkomsel` = b.`id_pic_telkomsel`
						where b.id_pks = '$id_pks'
					");
					foreach($query3->result() as $row3){
						echo $row3->nama_pic_telkomsel;
					}
					?>
                </a><br>	
                <div style="display:inline-flex">
                    <select id='id_SelPicTlk' style="display: none">
                        <?php
                        $this->load->model('mcrudpks');
						$query4 = $this->mcrudpks->selectpic();
						foreach($query4->result() as $row4){
						?>
                        <option value="<?=$row4->id_pic_telkomsel?>"><?=$row4->nama_pic_telkomsel?></option>
                        <?php
						}
						?>
                    </select>&nbsp;&nbsp;&nbsp;
                    <button id="id_BtnSvSelPicTlk" type="button" class="btn btn-primary btn-xs" onclick="id_BtnSvSelPicTlk()" style="display: none">Save</button>&nbsp;&nbsp;&nbsp;
                    <button id="id_BtnCxSelPicTlk" type="button" class="btn btn-primary btn-xs" onclick="id_BtnCxSelPicTlk()" style="display: none">Cancel</button>
                </div>
            </div>   
            <div class="form-group">
                <label for="corp">Corporate</label>
                &nbsp;&nbsp;&nbsp;<a href='#' onclick='ShowCbxCorpTlk()'>
                	<?php
					$id_pks = $this->input->post('id_pks');
                    $query5 = $this->db->query("
						select
						*
						from tb_corporate a
						join `tb_pks` b on a.`id_corporate` = b.`id_corporate`
						where b.id_pks = '$id_pks'
					");
					foreach($query5->result() as $row5){
						echo $row5->nama_corporate;
					}
					?>
                </a><br>	
                <div style="display:inline-flex">
                    <select id='id_SelCorpTlk' style="display: none">
                        <?php
                        $this->load->model('mcrudpks');
						$query6 = $this->mcrudpks->selectcorp();
						foreach($query6->result() as $row6){
						?>
                        <option value="<?=$row6->id_corporate?>"><?=$row6->nama_corporate?></option>
                        <?php
						}
						?>
                    </select>&nbsp;&nbsp;&nbsp;
                    <button id="id_BtnSvSelCorpTlk" type="button" class="btn btn-primary btn-xs" onclick="id_BtnSvSelCorpTlk()" style="display: none">Save</button>&nbsp;&nbsp;&nbsp;
                    <button id="id_BtnCxSelCorpTlk" type="button" class="btn btn-primary btn-xs" onclick="id_BtnCxSelCorpTlk()" style="display: none">Cancel</button>
                </div>
             </div>
             <div class="form-group">
                <label for="start">Start Date</label>
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="id_pksst">
                </div>
            </div> 
            <div class="form-group">
              <label for="end">End Date</label>
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="id_pksen">
                </div>
            </div>
            <div class="form-group" style="display: inline-flex">
                <label for="Sign sequencial priority">Signing sequencial priority:</label><br>
                <input type="checkbox" id="id_CbxSignCor1" name="Cbxpks" value="T" <?=$row->sign_pimpinan_corporate == 'T' ? 'checked' : '' ?>>&nbsp;&nbsp;pimpinan corporate
                <input type="checkbox" id="id_CbxSignCor2" name="Cbxpks" value="T" <?=$row->sign_pic_corporate == 'T' ? 'checked' : '' ?>>&nbsp;&nbsp;pic corporate
                <input type="checkbox" id="id_CbxSignTel1" name="Cbxpks" value="T" <?=$row->sign_pimpinan_telkomsel  == 'T' ? 'checked' : '' ?>>&nbsp;&nbsp;pimpinan telkomsel
                <input type="checkbox" id="id_CbxSignTel2" name="Cbxpks" value="T" <?=$row->sign_pic_telkomsel == 'T' ? 'checked' : '' ?>>  pic telkomsel
            </div>
          </div>          
		</div>
        <div class="modal-footer">
             <button id="id_corpbtn" type="button" class="btn btn-primary" onclick="UpdCorp()">Save changes</button>
          </div>
		<?php
		}
	}
	public function editpks(){
		$this->load->model('mcrudpks');
		$query = $this->mcrudpks->updatepks();
	}
	public function savepks(){
		$this->load->model('mcrudpks');
		$query = $this->mcrudpks->insertpks();
	}
	
	public function delpks(){
		$this->load->model('mcrudpks');
		$query = $this->mcrudpks->deletepks();
	}
	
	
}
?>