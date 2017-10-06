  <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ccrudpks_end extends CI_Controller {

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
                  <th width="20%">Corporate</th>
                  <th width="20%">PIC Telkomsel</th>
                  <th width="20%">PIC Corporate</th>
                  <th width="10%">Start Date</th>
                  <th width="10%">End Date</th>
              </tr>
            </thead>
          <tbody>      
            <?php
        $this->load->model('mcrudpks');
            $query = $this->mcrudpks->selectpks_end();
        $i = 1;
        foreach($query->result() as $row){
          ?>
        <tr>
                  <td><?php echo $i ?></td>
                  <td><?php echo $row->nomor_pks ?></td>
                  <td><?php echo $row->nama_corporate ?></td>
                  <td><?php echo $row->nama_pic_telkomsel?></td>
                  <td><?php echo $row->nama_pic_corporate ?></td>
                  <td><?php echo date('d-M-Y', strtotime($row->start_date))?></td>
                  <td><?php echo date('d-M-Y', strtotime($row->end_date))?></td>                     
                </tr>
        <?php
        $i++;
        } 
        ?>               
        </table>
    <?php
  }  
}
?>