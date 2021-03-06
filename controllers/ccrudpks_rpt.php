	<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ccrudpks_rpt extends CI_Controller {

	/* i. function construct */
	function __construct(){
		parent::__construct();
    $this->load->model('mcrudpks');    
	}
	
	function showpks(){
    $startdate = $this->input->post('startdate');
    $enddate   = $this->input->post('enddate');
    ?>
    <button id="id_BtnXls" onclick="Export2Excel('#example1','Daftar-PKS')" class="btn btn-sm btn-warning"><i class="fa fa-file-excel-o"></i> Excel</button>
    <table id="example1" class="table table-bordered table-striped" width="100%">
      <thead>
        <tr>
          <th>No</th>
         <th>Nomor PKS</th>
         <th>Id Corporate</th>
         <th>Corporate</th>
         <th>Paket</th>
         <th>PIC Telkomsel</th>
         <th>Pimpinan Corporate</th>
         <th>Jabatan Pimpinan Corporate</th>
         <th>PIC Corporate</th>
         <th>Jabatan PIC Corporate</th>
         <th>Nomor HP PIC Corporate</th>
         <th>Email PIC Corporate</th>
         <th>No Tlp Kantor</th>
         <th>Start Date</th>
         <th>End Date</th>
         <th>Alamat</th>
        </tr>
      </thead>
      <tbody>      
        <?php
        $this->db->select("a.*, b.*, c.*, d.*, e.*");
        if ($startdate || $enddate != "") {
          $this->db->where("start_date between '$startdate' and '$enddate'");
          $this->db->or_where("end_date between '$startdate' and '$enddate'");
        }
        $this->db->join("tb_pimpinan_telkomsel b", "a.id_pimpinan_telkomsel = b.id_pimpinan_telkomsel");
        $this->db->join("tb_corporate c", "a.id_corporate = c.id_corporate");
        $this->db->join("tb_pic_telkomsel d", "a.id_pic_telkomsel = d.id_pic_telkomsel");
        $this->db->join("tb_paket e", "a.id_paket = e.id_paket");
        $query = $this->db->get("tb_pks a");
        $i = 1;
        foreach($query->result() as $row) { ?>
        <tr>
          <td><?php echo $i++; ?></td>
         <td><?php echo $row->nomor_pks ?></td>
         <td><?php echo $row->id_corporate ?></td>
          <td><?php echo $row->nama_corporate ?></td>
          <td><?php echo $row->nama_paket ?></td>
          <td><?php echo $row->nama_pic_telkomsel?></td>
          <td><?php echo $row->nama_pimpinan_corporate ?></td>
          <td><?php echo $row->jabatan_pimpinan_corporate ?></td>
          <td><?php echo $row->nama_pic_corporate ?></td>
          <td><?php echo $row->jabatan_pic_corporate ?></td>
          <td><?php echo $row->nomor_hp_pic_corporate ?></td>
          <td><?php echo $row->email_pic_corporate ?></td>
          <td><?php echo $row->nomor_tlp_kantor ?></td>
          <td><?php echo date('d-M-Y', strtotime($row->start_date))?></td>
          <td><?php echo date('d-M-Y', strtotime($row->end_date))?></td> 
          <td><?php echo $row->alamat_corporate ?></td>       
        </tr>
        <?php } ?>
      </tbody>      
    </table>
    <?php
  }
}
?>