<div class="content-wrapper" style="min-height: 1126px;">    
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo $title ?>
      <?php echo $apptitle?>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-edit"></i> Create PKS</a></li>
      <li class="active"><?php echo $title ?></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Data PKS</h3>
      </div>
      <div class="box-body">
      
        <div class="row">          
          <div class="col-xs-5 form-group">
              <label>Start date</label>
              <div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" id="id_pksst" placeholder="YYYY/MM/DD" data-date-format="yyyy/mm/dd" name="id_pksst" required>
                <label for="id_pksst" class="error"></label>
            </div>
          </div>
          <div class="col-xs-5 form-group">
              <label>End date</label>
              <div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" id="id_pksen" placeholder="YYYY/MM/DD" data-date-format="yyyy/mm/dd" name="id_pksen" required>
                <label for="id_pksen" class="error"></label>
            </div>
          </div>
          <div class="col-xs-2 form-group">
              <label>&nbsp;</label>
              <button id="id_BtnSearch" class="form-control btn btn-sm btn-info"><i class="fa fa-search"></i> Search</button>
          </div>
        </div>

        <div id="id_DivPks">
          <!-- ajax -->
        </div>        
      </div>
    </div>
    <!-- /.box -->
  </section>
  <!-- /.content -->
</div>


<script>
// ketika DOM ready
$(document).ready(function(){
  $('#id_pksst, #id_pksen').datepicker({
      autoclose: true
  });
})

$(document).on('click','#id_BtnSearch',function(){
  GenDataPks($('#id_pksst').val(), $('#id_pksen').val());
})

// function untuk populate data user dari table database
function GenDataPks(startdate, enddate){
  jQuery.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>" + "index.php/ccrudpks_rpt/showpks",
      data: {
        startdate: startdate,
        enddate: enddate
      },
      success: function(res) {
          $('#id_DivPks').html(res);
          $(function() {
              $('#example1').DataTable({
                  'retrieve'    : true,
                  'paging'      : true,
                  'lengthChange': false,
                  'searching'   : false,
                  'ordering'    : true,
                  'info'        : true,
                  'autoWidth'   : true
              })
          })
      },
      error: function(xhr){
         $('#id_DivPks').html("error");
      }
  });
}

function Export2Excel(TblId, FileName){
  $(TblId).table2excel({
      exclude: ".noExl",
      name: "Excel Document Name",
      filename: FileName,
      fileext: ".xls",
      exclude_img: false,
      exclude_links: false,
      exclude_inputs: false
  });
}

</script>