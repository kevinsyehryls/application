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
        <div class="box-header with-border">
          <h3 class="box-title">Data PKS</h3>
             <button type="button" id="id_BtnAddPks" class="btn btn-primary btn-sm pull-right">Tambah PKS	</button>
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
  
    <!-- for datetime picker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/templ/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/templ/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
	<script>
	// ketika DOM ready
	$(document).ready(function(){
		GenDataPks();
	})
	
	// ketika tombol tambah pks di klik
	$(document).on('click', '#id_BtnAddPks', function(){
		// tampilkan modal
		$('#modal-default').modal('show');
		// isi modal dengan form add user
		jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/ccrudpks/addpks",
            success: function(res) {
                $('#id_MdlDefault').html(res);
				SavePks();
            },
            error: function(xhr){
               $('#id_MdlDefault').html("error");
            }
        });		
	})

	// function untuk populate data user dari table database
	function GenDataPks(){
		jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/ccrudpks/showpks",
            success: function(res) {
                $('#id_DivPks').html(res);
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
               $('#id_DivPks').html("error");
            }
        });
	}
	
	// save user
	function SavePks(){
		$(document).on('click', '#id_pkspbtn', function(){
			jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/ccrudpks/savepks",
			data: {
				id_pks: $('#id_pks').val(),
				id_pksno: $('#id_pksno').val(),
				id_pksppn: $('#id_pksppn').val(),
				id_pkspic: $('#id_pkspic').val(),
				id_pkscorp: $('#id_pkscorp').val(),
				id_pksst: $('#id_pksst').val(),
				id_pksen: $('#id_pksen').val(),
				id_pksctpi: $('#id_pksctpi:checked').val(),
				id_pksctpc: $('#id_pksctpc:checked').val(),
				id_pksttpi: $('#id_pksttpi:checked').val(),
				id_pksttpc: $('#id_pksttpc:checked').val()			
			},
            success: function(res) {
				$('#modal-default').modal('hide');
				alert("Data saved!" + res);
				GenDataPks();
			},
            error: function(xhr){
               $('#id_DivPks').html("error");
            }
        });
		})
	}
	
	//Saat Tombol Edit di Klik
	function EditPks(id_pks){
		$('#modal-default').modal('show');
		jQuery.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>" + "index.php/ccrudpks/showeditpks",
				data: {
					id_pks: id_pks
				},
				success: function(res) {
					$('#id_MdlDefault').html(res);
					$('#id_pksst, #id_pksen').datetimepicker({
						showClose: true,
						showTodayButton: true
					});
				},
				error: function(xhr){
				   $('#id_DivPks').html("error");
				}
			});
	}
	
	// show combobox select pimpinan PKS
	function ShowCbxPimpTlk(){
		$('#id_SelPimpTlk').css('display','block');
		$('#id_BtnSvSelPimpTlk').css('display','block');
		$('#id_BtnCxSelPimpTlk').css('display','block');
	}
	// save combobox select pimpinan PKS
	function id_BtnSvSelPimpTlk(){
		// update pimpinan telkomsel
		var id_pks = $('#id_pks').val();
		var id_SelPimpTlk = $('#id_SelPimpTlk').val();
		alert("update tb_pks set id_pimpinan_telkomsel = " + id_SelPimpTlk + " where id_pks = "  +  id_pks);
	}
	// cancel combobox select pimpinan PKS
	function id_BtnCxSelPimpTlk(){
		$('#id_SelPimpTlk').css('display','none');
		$('#id_BtnSvSelPimpTlk').css('display','none');
		$('#id_BtnCxSelPimpTlk').css('display','none');
	}
	
	//Saat tombol save change di klik
	function UpdPks(){
		jQuery.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>" + "index.php/ccrudpks/editpks",
			data: {
				id_pks: $('#id_pks').val(),
				id_pksno: $('#id_pksno').val(),
				id_pksppn: $('#id_pksppn').val(),
				id_pkspic: $('#id_pkspic').val(),
				id_pkscorp: $('#id_pkscorp').val(),
				id_pksst: $('#id_pksst').val(),
				id_pksen: $('#id_pksen').val(),
				id_pksctpi: $('#id_pksctpi:checked').val(),
				id_pksctpc: $('#id_pksctpc:checked').val(),
				id_pksttpi: $('#id_pksttpi:checked').val(),
				id_pksttpc: $('#id_pksttpc:checked').val()		
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
	
	function DelPks(id_pks){
		var delconf = confirm("Hapus data?");
		if(delconf){
			jQuery.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>" + "index.php/ccrudpks/delpks",
				data: {
					id_pks: id_pks
				},
				success: function(res) {
					$('#modal-default').modal('hide');
					alert("Data Terhapus!");
					GenDataPks();
				},
				error: function(xhr){
				   $('#id_DivPks').html("error");
				}
			});
		}		
	}
	
</script>