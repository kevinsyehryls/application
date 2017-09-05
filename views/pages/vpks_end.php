<div class="content-wrapper" style="min-height: 1126px;">
    
    <div class="modal fade" id="modal-default" style="display: none;">
    <div class="modal-dialog">
      <div id="id_MdlDefault" class="modal-content">
      <!-- isi modal dinamis disini -->
      </div>
    <!-- /.modal-content -->
    </div>
  <!-- /.modal-dialog -->
  </div>
    
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
        <div class="box-body">
          <div class="box-body">
          <div id="id_DivPks">
              <!-- data user akan tampil disini -->
         </div>
        </div>
        <!-- /.box-body -->
          </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>


<script>
// ketika DOM ready
$(document).ready(function(){
    GenDataPks();
});

// function untuk populate data user dari table database
function GenDataPks(){
    jQuery.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>" + "index.php/ccrudpks_end/showpks",
        success: function(res) {
            $('#id_DivPks').html(res);
            $(function() {
                $('#example1').DataTable({
                    'retrieve'    : true,
                    'paging'      : true,
                    'lengthChange': false,
                    'searching'   : true,
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

//Saat Tombol Edit di Klik
function EditPks(id_pks){
    $('#modal-default').modal('show');
    jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/ccrudpks_ttd/showeditpks",
            data: {
                id_pks: id_pks
            },
            success: function(res) {
                $('#id_MdlDefault').html(res);
            },
            error: function(xhr){
               $('#id_DivPks').html("error");
            }
    });
}

//Saat tombol save change di klik
function UpdPks(){
    /* get checkboxes value */
    var CbxSignCor1 = $('#id_CbxSignCor1:checked').val();
    var CbxSignCor2 = $('#id_CbxSignCor2:checked').val();
    var CbxSignTel1 = $('#id_CbxSignTel1:checked').val();
    var CbxSignTel2 = $('#id_CbxSignTel2:checked').val();
    console.clear();
    console.log(CbxSignCor1 + ", " + CbxSignCor2 + ", " + CbxSignTel1 + ", " + CbxSignTel2);
    jQuery.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>" + "index.php/ccrudpks_ttd/editpks",
        data: {
            id_pks: $('#id_pks').val(),
            CbxSignCor1 : CbxSignCor1,
            CbxSignCor2 : CbxSignCor2,
            CbxSignTel1 : CbxSignTel1,
            CbxSignTel2 : CbxSignTel2
        },
        success: function(res) {
            $('#modal-default').modal('hide');
            alert("Data Updated!");
            GenDataPks();
        },
        error: function(xhr){
           $('#id_DivPks').html("error");
        }
    });
}


</script>