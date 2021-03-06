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
        <li><a href="#"><i class="fa fa-files-o"></i> MENU</a></li>
        <li class="active"><?php echo $title ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
            <div class="box-header with-border">
            </div>
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
// ketika tombol upload pks di klik
$(document).on('click', '#id_BtnupldPks', function(){
    // tampilkan modal
    $('#modal-default').modal('show');
    // isi modal dengan form add user
    jQuery.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>" + "index.php/ccrudpks_donettd/uploadpks",
        success: function(res) {
            $('#id_MdlDefault').html(res);
              },
        error: function(xhr){
             $('#id_MdlDefault').html("error");
              }
    });       
});
// function untuk populate data user dari table database
function GenDataPks(){
    jQuery.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>" + "index.php/ccrudpks_donettd/showpks",
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
            url: "<?php echo base_url(); ?>" + "index.php/ccrudpks_donettd/showeditpks",
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
function UpdPks(id_pks){
    /* get checkboxes value */
    var CbxSignCor1 = $('#id_CbxSignCor1:checked').val();
    var CbxSignCor2 = $('#id_CbxSignCor2:checked').val();
    var CbxSignTel1 = $('#id_CbxSignTel1:checked').val();
    var CbxSignTel2 = $('#id_CbxSignTel2:checked').val();
    console.clear();
    console.log(CbxSignCor1 + ", " + CbxSignCor2 + ", " + CbxSignTel1 + ", " + CbxSignTel2);
    jQuery.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>" + "index.php/ccrudpks_donettd/editpks",
        data: {
            id_pks: id_pks,
            CbxSignCor1 : CbxSignCor1,
            CbxSignCor2 : CbxSignCor2,
            CbxSignTel1 : CbxSignTel1,
            CbxSignTel2 : CbxSignTel2
        },
        success: function(res) {
            $('#modal-default').modal('hide');
            alert("Data Perubahan Tersimpan");
            GenDataPks();
        },
        error: function(xhr){
           $('#id_DivPks').html("error");
        }
    });
}
//Saat Tombol Edit di Klik
function UploadPks(id_pks){
    $('#modal-default').modal('show');
    jQuery.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>" + "index.php/ccrudpks_donettd/showupload",
        data: {
            id_pks: id_pks
        },
        success: function(res) {
            $('#id_MdlDefault').html(res);
            UploadPDF(id_pks);
        },
        error: function(xhr){
            $('#id_DivPks').html("error");
        }
    });
}
function UploadPDF(id_pks){
    event.preventDefault();
    $('#upload').on('click', function () {
        var file_data = $('#file').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);
        $.ajax({
            url: "<?php echo base_url(); ?>" + "index.php/ccrudpks_donettd/upload_file/"+id_pks,
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            beforeSend: function(){
                $('.modal-body').html("Tunggu, lagi upload nih...!");
            },
            success: function (response) {
                $('.modal-body').html(response);
                GenDataPks();
            },
            error: function (response) {
                $('.modal-body').html(response);
            }
        });
    });
}
</script>