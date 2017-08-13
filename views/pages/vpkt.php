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
        <li><a href="#"><i class="fa fa-files-o"></i> MENU KELOLA</a></li>
        <li class="active"><?php echo $title ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Kelola Paket Layanan</h3> 
          <button type="button" id="id_BtnAddPkt" class="btn btn-primary btn-sm pull-right">Tambah Paket</button>
        </div>
        <div class="box-body">
          <div id="id_DivPkt">
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
		GenDataPkt();
	})
	
	// ketika tombol tambah user di klik
	$(document).on('click', '#id_BtnAddPkt', function(){
		// tampilkan modal
		$('#modal-default').modal('show');
		// isi modal dengan form add user
		jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/ccrudpkt/addpkt",
            success: function(res) {
                $('#id_MdlDefault').html(res);
            },
            error: function(xhr){
               $('#id_MdlDefault').html("error");
            }
        });		
	})
	
	
	
	
	// function untuk populate data user dari table database
	function GenDataPkt(){
		jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/ccrudpkt/showpkt",
            success: function(res) {
                $('#id_DivPkt').html(res);
				$(function() {
					$('#example1').DataTable({
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
               $('#id_DivPkt').html("error");
            }
        });
	}
	
	function EditPkt(id_paket){
		$('#modal-default').modal('show');
	}
	
	function DelPkt(id_paket){
		alert (id_paket);
	}
	
</script>