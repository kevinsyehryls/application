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
                  <th width="10%">Corporate</th>
                  <th width="10%">Pimpinan</th>
                  <th width="10%">PIC</th>
                  <th width="10%">PIC Tsel</th>
                  <th width="10%">Start Date</th>
                  <th width="10%">End Date</th>
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
                    <button onclick="EditPks('<?=$row->id_pks?>')" type="button" class="btn btn-primary btn-xs">Edit
                    </button>
                    <button onclick="DelPks('<?=$row->id_pks?>')" type="button" class="btn btn-primary btn-xs">Delete
                    </button>
                    <button onclick="PrintDivElement('<?=$row->id_pks?>')"id="id_pksprint" type="button" class="btn btn-primary btn-xs"><li class="fa fa-print"></li>&nbsp;&nbsp; Print</button>
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
    <?php
      $frmattributes = array(
       "id" => "id_FrmAddPks",
       "name" => "FrmAddPks"
       );
      echo form_open('cpage/halpks',$frmattributes);
    ?>
        <div class="modal-body">
      	 <div class="box-body">
            <div class="form-group">
            <div class="form-group">
              <label for="nomor">Nomor PKS</label>
              <input type="text" class="form-control" id="id_pksno" name="id_pksno" placeholder="Ketik Nomor PKS" required>
              <label for="id_pksno" class="error"></label>
            </div>
            <div class="form-group">
            <label for="pimpinan">Pimpinan Telkomsel</label>
            	<select id="id_pksppn" class="form-control" name="id_pksppn" required>
              <label for="id_pksppn" class="error"></label>
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
              <select id="id_pkspic" class="form-control" name="id_pkspic" required>
              <label for="id_pkspic" class="error"></label>
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
              <select id="id_pkscorp" class="form-control" name="id_pkscorp" required>
              <label for="id_pkscorp" class="error"></label>
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
              <label for="pkt">Paket</label>	
              <select id="id_pkspkt" class="form-control" name="id_pkspkt" required>
              <label for="id_pkspkt" class="error"></label>
                    <option>---- PILIH PAKET ----</option>
                     <?php
                    $this->load->model('mcrudpks');
       		  		$query = $this->mcrudpks->relpkt();
			  		foreach($query->result() as $row){
						?>
						<option value="<?=$row->id_paket?>"><?=$row->nama_paket?></option>
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
                    <input type="text" class="form-control pull-right" id="id_pksst" placeholder="YYYY/MM/DD" data-date-format="yyyy/mm/dd" name="id_pksst" required>
                    <label for="id_pksst" class="error"></label>
                </div>
            </div>
            <div class="form-group">
                <label for="end">End Date</label>
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="id_pksen" placeholder="YYYY/MM/DD" data-date-format="yyyy/mm/dd" name="id_pksen" required>
                    <label for="id_pksen" class="error"></label>
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
        <button id="id_pkspbtn" type="button" class="btn btn-primary">Save</button>
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
        <?php
          $frmattributes = array(
           "id" => "id_FrmUpdPks",
           "name" => "FrmUpdPks"
           );
          echo form_open('cpage/halpks',$frmattributes);
        ?>

          <div class="modal-body">
      	  <div class="box-body">
            <div class="form-group">
              <label for="pksid">ID PKS</label>
              <input type="text" class="form-control" id="id_pks" name="id_pks" placeholder="Ketik Id Corporate"  value="<?=$row->id_pks?>" readonly="readonly">
            </div>
            <div class="form-group">
              <label for="nomor">Nomor PKS</label>
              <input type="text" class="form-control" id="id_pksno" name="id_pksno" placeholder="Ketik Nama Corporate" value="<?=$row->nomor_pks?>" required>
            </div>
            <div class="form-group">
                <label for="pimpinan">Pimpinan Telkomsel</label>
                &nbsp;&nbsp;&nbsp;<a href='#' onclick='ShowCbxPimpTlk()' id="id_aPimpTsel">
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
                &nbsp;&nbsp;&nbsp;<a href='#' onclick='ShowCbxPicTlk()' id="id_aPicTsel">
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
                &nbsp;&nbsp;&nbsp;<a href='#' onclick='ShowCbxCorpTlk()' id="id_aCorTsel">
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
                <label for="corp">Paket</label>
                &nbsp;&nbsp;&nbsp;<a href='#' onclick='ShowCbxPktTlk()' id="id_aPktTsel">
                	<?php
					$id_pks = $this->input->post('id_pks');
                    $query7 = $this->db->query("
						select
						*
						from tb_paket a
						join `tb_pks` b on a.`id_paket` = b.`id_paket`
						where b.id_pks = '$id_pks'
					");
					foreach($query7->result() as $row7){
						echo $row7->nama_paket;
					}
					?>
                </a><br>	
                <div style="display:inline-flex">
                    <select id='id_SelPktTlk' style="display: none">
                        <?php
                        $this->load->model('mcrudpks');
						$query8 = $this->mcrudpks->selectpkt();
						foreach($query8->result() as $row8){
						?>
                        <option value="<?=$row8->id_paket?>"><?=$row8->nama_paket?></option>
                        <?php
						}
						?>
                    </select>&nbsp;&nbsp;&nbsp;
                    <button id="id_BtnSvSelPktTlk" type="button" class="btn btn-primary btn-xs" onclick="id_BtnSvSelPktTlk()" style="display: none">Save</button>&nbsp;&nbsp;&nbsp;
                    <button id="id_BtnCxSelPktTlk" type="button" class="btn btn-primary btn-xs" onclick="id_BtnCxSelPktTlk()" style="display: none">Cancel</button>
                </div>
             </div>
             <div class="form-group">
                <label for="start">Start Date</label>
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="id_pksst" name="id_pksst" value="<?=$row->start_date?>" placeholder="YYYY/MM/DD" data-date-format="yyyy/mm/dd" required>
                </div>
            </div> 
            <div class="form-group">
              <label for="end">End Date</label>
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="id_pksen" name="id_pksen" value="<?=$row->end_date?>" placeholder="YYYY/MM/DD" data-date-format="yyyy/mm/dd" required>
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
      <button id="id_pksupbtn1" type="button" class="btn btn-primary" onclick="UpdPks()"><li class="fa fa-save"></li>&nbsp;&nbsp; Save changes</button>
        
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

	// include file kontrak PKS
    public function printpks(){
        $this->load->model('mcrudpks');
        $query = $this->mcrudpks->selectprintpks()->row_array();
        $datapks = array(
            "__id_pks" => $query['id_pks'],
            "__no_pks" => $query['nomor_pks'],
            "__pim_tsel" => $query['nama_pimpinan_telkomsel'],
            "__jabpim_tsel" => $query['jabatan_pimpinan_telkomsel'],
            "__nama_corp" => $query['nama_corporate'],
            "__almt_corp" => $query['alamat_corporate'],
            "__namapim_corp" => $query['nama_pimpinan_corporate'],
            "__jabpim_corp" => $query['jabatan_pimpinan_corporate'],
            "__namapic_corp" => $query['nama_pic_corporate'],
            "__jabpic_corp" => $query['jabatan_pic_corporate'],
            "__hppic_corp" => $query['nomor_hp_pic_corporate'],
            "__emailpic_corp" => $query['email_pic_corporate'],
            "__tlp_corp" => $query['nomor_tlp_kantor'],
            "__nama_pictsel" => $query['nama_pic_telkomsel'],
            "__jbtn_pictsel" => $query['jabatan_pic_telkomsel'],
            "__nohp_pictsel" => $query['nomor_hp_pic_telkomsel'],
            "__email_pictsel" => $query['email_pic_telkomsel'],
            "__nama_pkt" => $query['nama_paket'],
            "__start_date" => $query['start_date']
        );
        $this->load->view("pages/vpks_endorsement", $datapks);
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

	/* update inline editing pimpinan telkomsel */
	public function updinline_pimptsel(){
        $id_SelPimpTlk = $this->input->post('id_SelPimpTlk');
        $id_pks = $this->input->post('id_pks');
        $id_SelPimpTlkTxt = $this->input->post('id_SelPimpTlkTxt');
        $data = array(
            'id_pimpinan_telkomsel' => $id_SelPimpTlk
        );
        $query = $this->db->where('id_pks', $id_pks)
                      ->update('tb_pks', $data);
        $affrows = $this->db->affected_rows();
        if ($affrows > 0){
            echo $id_SelPimpTlkTxt;
        }
    }

    /* update inline PIC telkomsel */
    public function updinline_pictsel(){
        $id_pks = $this->input->post('id_pks');
        $id_SelPicTlk = $this->input->post('id_SelPicTlk');
        $id_SelPicTlkTxt = $this->input->post('id_SelPicTlkTxt');
        /* alert("update tb_pks set id_pimpinan_telkomsel = " + id_SelPicTlk + " where id_pks = "  +  id_pks); */
        $data = array(
            'id_pic_telkomsel' => $id_SelPicTlk
        );
        $query = $this->db->where('id_pks', $id_pks)
                      ->update('tb_pks', $data);
        $affrows = $this->db->affected_rows();
        if ($affrows > 0){
            echo $id_SelPicTlkTxt;
        }
    }

    /* update inline CORP telkomsel */
    public function updinline_cortsel(){
        $id_pks = $this->input->post('id_pks');
        $id_SelCorpTlk = $this->input->post('id_SelCorpTlk');
        $id_SelCorpTlkTxt = $this->input->post('id_SelCorpTlkTxt');
        /*alert("update tb_pks set id_corporate = " + id_SelCorpTlk + " where id_pks = "  +  id_pks);*/
        $data = array(
            'id_corporate' => $id_SelCorpTlk
        );
        $query = $this->db->where('id_pks', $id_pks)
                      ->update('tb_pks', $data);
        $affrows = $this->db->affected_rows();
        if ($affrows > 0){
            echo $id_SelCorpTlkTxt;
        }
    }

    /* update inline PAKET telkomsel */
    public function updinline_pkttsel(){
        $id_pks = $this->input->post('id_pks');
        $id_SelPktTlk = $this->input->post('id_SelPktTlk');
        $id_SelPktTlkTxt = $this->input->post('id_SelPktTlkTxt');
        /* alert("update tb_pks set id_paket = " + id_SelPktTlk + " where id_pks = "  +  id_pks); */
        $data = array(
            'id_paket' => $id_SelPktTlk
        );
        $query = $this->db->where('id_pks', $id_pks)
                      ->update('tb_pks', $data);
        $affrows = $this->db->affected_rows();
        if ($affrows > 0){
            echo $id_SelPktTlkTxt;
        }
    }
}
?>